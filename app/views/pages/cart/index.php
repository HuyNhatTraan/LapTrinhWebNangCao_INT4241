<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png" />
    <title>Giỏ hàng</title>
</head>

<body>
    <?php require __DIR__ . '/../../components/nav.php' ?>
    <h1 class="text-3xl font-bold mb-6 flex justify-center mt-10 text-orange-500">Giỏ hàng</h1>
    <div class="w-[80%] flex m-auto border-2 border-gray-300 rounded-lg p-4 bg-white shadow-md flex-col">
        <?php foreach ($cartItems as $item): ?>
            <div class="">
                <div class="border-2 rounded-2xl mb-3 border-gray-300 flex justify-between p-5">
                    <a href="product?MaSP=<?php echo $item['MaSP']; ?>" class="flex">
                        <img class="w-40 inline-block" src="<?php echo $item['HinhAnhBienThe']; ?>"
                            alt="<?php echo $item['HinhAnhBienThe']; ?>">

                        <div class="flex flex-col">

                            <span class="ml-4 font-bold text-2xl text-orange-500"><?php echo $item['TenSP']; ?></span>
                            <span class="ml-4">Màu sắc: <?php echo $item['MauSac']; ?></span>
                            <span class="ml-4">Dung lượng: <?php echo $item['TenDLSP']; ?></span>

                        </div>
                    </a>
                    <div class="">
                        <form class="max-w-xs mx-auto">
                            <label for="counter-input"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Choose
                                quantity:</label>
                            <div class="relative flex items-center">
                                <button type="button" id="decrement-button" data-input-counter-decrement="counter-input"
                                    class="shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="counter-input" data-input-counter
                                    class="shrink-0 text-gray-900 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                    placeholder="" value="1" required />
                                <button type="button" id="increment-button" data-input-counter-increment="counter-input"
                                    class="shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <span class="cursor-pointer">Xoá</span>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    </div>
    <div class="flex justify-center mt-6">
        <button class="bg-orange-500 text-white p-4 rounded-lg text-4xl font-bold cursor-pointer">Tiến hành thanh
            toán</button>
    </div>
    <?php require 'views/components/footer.php' ?>
</body>

</html>