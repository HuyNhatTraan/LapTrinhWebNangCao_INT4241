<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/output.css">
    <title>Sản phẩm</title>
</head>

<body>
    <?php include 'views/components/nav.php' ?>
    <div class="w-full">
        <div class="w-full">
            <div class="grid md:grid-cols-2">
                <div class="bg-[#f5f5f5] flex items-center justify-center">
                    <div id="controls-carousel" class="relative w-full h-75 md:h-auto" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div
                            class="relative flex items-center justify-center m-auto h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item XX -->
                            <?php foreach ($mauSacHinhAnh as $item): ?>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img class="max-h-full max-w-full object-contain m-auto"
                                        src="<?= htmlspecialchars($item['HinhAnhBienThe']) ?>" alt="...">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom left-1/2">
                            <?php foreach ($mauSacHinhAnh as $item): ?>
                                <button type="button" class="w-12 h-12 rounded-lg border-2 border-gray-500"
                                    aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0">
                                    <img class="max-h-full max-w-full object-contain m-auto"
                                        src="<?= htmlspecialchars($item['HinhAnhBienThe']) ?>" alt="...">
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <form action="cart" method="POST">
                    <div class="xl:p-15 p-6 flex flex-col">
                        <?php foreach ($products as $product): ?>
                            <input type="hidden" name="MaSP" value="<?= htmlspecialchars($product['MaSP']) ?>">
                            <span class="xl:text-4xl text-4xl font-bold xl:mb-5 text-orange-500"><?= htmlspecialchars($product['TenSP']) ?></span>
                            <div class="flex items-center mt-3">
                                <span class="text-2xl font-bold xl:text-4xl xl:font-bold"><?= number_format($product['GiaHienTai'], 0, ',', '.') ?>đ</span>
                                <span class="text-lg xl:text-4xl text-[#757575] line-through ml-3"><?= number_format($product['GiaBase'], 0, ',', '.') ?>đ</span>
                            </div>
                        <?php endforeach; ?>
                        <span class="font-bold text-2xl mt-6 mb-5">Dung lượng</span>
                        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                            <?php foreach ($dungLuong as $item): ?>
                                <label class="flex text-center items-center justify-center p-4 flex-col rounded-xl border-2 peer-checked:border-orange-500 peer-checked:shadow-lg cursor-pointer duration-200 shadow-md relative group">
                                    <input type="radio" name="MaDLSP" value="<?= htmlspecialchars($item['MaDLSP']) ?>" class="hidden peer" required>
                                    <span class="px-2 py-2"><?= htmlspecialchars($item['TenDLSP']) ?></span>
                                    <svg class="absolute top-2 right-2 w-5 h-5 text-orange-500 opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <span class="font-bold text-2xl mt-6 mb-5">Màu sắc</span>
                        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                            <?php foreach ($mauSacHinhAnh as $item): ?>
                                <label class="flex text-center items-center justify-center p-4 flex-col rounded-xl border-2 peer-checked:border-orange-500 peer-checked:shadow-lg cursor-pointer duration-200 shadow-md relative group">
                                    <input type="radio" name="MaBienThe" value="<?= htmlspecialchars($item['MaBienThe']) ?>" class="hidden peer" required>
                                    <span class="inline-block w-8 h-8 rounded-full bg-<?= htmlspecialchars($item['MaMau']) ?> peer-checked:ring-4 peer-checked:ring-orange-500 transition duration-200"></span>
                                    <span class="mt-3"><?= htmlspecialchars($item['MauSac']) ?></span>
                                    <svg class="absolute top-2 right-2 w-5 h-5 text-orange-500 opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <hr class="mt-5">
                        <div class="flex items-center justify-between w-full mt-5 mb-5">
                            <span class="font-bold text-2xl">Số lượng</span>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="text" name="SoLuong" value="1" id="quantity-input" data-input-counter data-input-counter-min="1" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between w-full mt-5 mb-5">
                            <span class="font-bold text-2xl">Tổng cộng</span>
                            <span class="font-bold text-red-500 text-xl"><?= number_format($product['GiaHienTai'], 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="w-full">
                            <button type="submit" class="bg-red-500 text-white font-bold rounded-xl w-full p-4 hover:bg-red-800 duration-200 cursor-pointer">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <br><br><br>
        <span class="flex justify-center mt-10 text-2xl md:text-4xl font-bold">Thông Số Kỹ Thuật</span>
        <div class="ThongSo flex w-[70%] justify-center m-auto mt-6">
            <table class="table-auto w-full border border-gray-300 text-left">
                <tbody>
                    <?php foreach ($thongSoKyThuat as $item): ?>
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-gray-700 font-bold md:text-xl">
                                <?= htmlspecialchars($item['TenLinhKien']) ?>
                            </td>
                            <td class="px-4 py-2 md:text-xl"><?= htmlspecialchars($item['NoiDungLinhKien']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php include 'views/components/footer.php' ?>

</body>

</html> 