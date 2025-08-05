<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="styles/output.css">
    <title>Chỉnh sửa tài khoản</title>
</head>

<body class="bg-[#f5f5f5]">
    <?php require 'views/components/nav.php'; ?>
    <span class="flex items-center justify-center font-bold text-lg md:text-3xl mt-10 mb-3 md:mb-10">Danh sách địa
        chỉ</span>
    <div class="flex flex-col justify-center items-center gap-3">
        <div
            class="grid grid-cols-1 md:grid-cols-2 bg-white w-[95%] md:w-[70%] border-2 border-gray-300 rounded-xl p-3 gap-3">
            <!-- Không có địa chỉ -->
            <?php if (empty($_SESSION['addressItems'])): ?>
                <div
                    class="flex col-span-2 flex-col justify-center items-center p-3 md:p-5 border-2 border-gray-300 rounded-xl gap-2">
                    <span class="text-center font-bold">Bạn chưa có địa chỉ nào cả</span>
                </div>
            <?php else: ?>
                <!-- Có địa chỉ -->
                <!-- Foreach bắt đầu từ đây -->
                <?php foreach ($_SESSION['addressItems'] as $index => $address): ?>
                    <div class="flex flex-col p-3 md:p-5 border-2 border-gray-300 rounded-xl gap-2">
                        <span class="text-xl md:text-3xl font-bold mb-3">Địa chỉ <?php echo $index + 1; ?></span>
                        <div class="text-sm font-bold md:text-lg">Tên người nhận:
                            <span class="font-normal"><?php echo $address['TenNguoiNhan']; ?></span>
                        </div>
                        <div class="text-sm font-bold md:text-lg">SDT:
                            <span class="font-normal"><?php echo $address['SDTNhanHang']; ?></span>
                        </div>
                        <div class="text-sm font-bold md:text-lg">Địa chỉ:
                            <span class="font-normal"><?php echo $address['DiaChiKH']; ?></span>
                        </div>
                        <div class="text-sm font-bold md:text-lg">Ghi chú:
                            <span class="font-normal"><?php echo $address['GhiChu']; ?></span>
                        </div>
                        <div class="flex gap-3 items-center justify-center">
                            <button data-modal-target="editAddress <?php echo $address['MaDiaChiKH'] ?>"
                                data-modal-toggle="editAddress <?php echo $address['MaDiaChiKH'] ?>"
                                class="cursor-pointer col-span-2 w-fit flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Chỉnh sửa
                            </button>
                            <div id="editAddress <?php echo $address['MaDiaChiKH'] ?>" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-[60%] max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Chỉnh sửa địa chỉ
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="editAddress <?php echo $address['MaDiaChiKH'] ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5" method="POST" action="./address/edit">
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2 sm:col-span-1">
                                                    <input type="hidden" name="MaDiaChiKH"
                                                        value="<?php echo $address['MaDiaChiKH']; ?>">
                                                    <label for="TenNguoiNhan"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ
                                                        tên người nhận</label>
                                                    <input type="text" name="TenNguoiNhan" id="name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Nhập tên người nhận"
                                                        value="<?php echo $addressItems[$index]['TenNguoiNhan']; ?>"
                                                        required="">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="SDTNguoiNhan"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số
                                                        điện thoại</label>
                                                    <input type="number" name="SDTNhanHang" id="SDT"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Nhập số điện thoại người nhận"
                                                        value="<?php echo $addressItems[$index]['SDTNhanHang']; ?>" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="DiaChiKH"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Địa
                                                        chỉ nhận hàng</label>
                                                    <input type="text" name="DiaChiKH" id="DiaChiKH"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Nhập địa chỉ ở đây"
                                                        value="<?php echo $addressItems[$index]['DiaChiKH']; ?>" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="GhiChu"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ghi
                                                        chú</label>
                                                    <textarea id="GhiChu" name="GhiChu" rows="4"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Nhập ghi chú ở đây"><?php echo $addressItems[$index]['GhiChu']; ?></textarea>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Hoàn thành chỉnh sửa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="popup-modal <?php echo $address['MaDiaChiKH'] ?>" data-modal-toggle="popup-modal <?php echo $address['MaDiaChiKH'] ?>"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Xoá địa chỉ
                            </button>
                            <div id="popup-modal <?php echo $address['MaDiaChiKH'] ?>" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-xl shadow-sm border-2 border-gray-300">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal <?php echo $address['MaDiaChiKH'] ?>">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-black"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-bold text-black ">Bạn có chắc là xoá địa chỉ này hong?</h3>
                                            <form method="POST" action="./address/delete">
                                                <input type="hidden" name="MaDiaChiKH" value="<?php echo $address['MaDiaChiKH']; ?>">                                                
                                                <button data-modal-hide="popup-modal <?php echo $address['MaDiaChiKH'] ?>" type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Yes Sirrrr
                                                </button>
                                                <button data-modal-hide="popup-modal <?php echo $address['MaDiaChiKH'] ?>" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Hong chịu
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="cursor-pointer col-span-2 w-fit flex m-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Thêm địa chỉ mới
            </button>
        </div>
    </div>
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-[60%] max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Thêm địa chỉ mới
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="./address/add">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="TenNguoiNhan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ tên người
                                nhận</label>
                            <input type="text" name="TenNguoiNhan" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nhập tên người nhận" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="SDTNguoiNhan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện
                                thoại</label>
                            <input type="number" name="SDTNhanHang" id="SDT"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nhập số điện thoại người nhận" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="DiaChiKH"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Địa chỉ nhận
                                hàng</label>
                            <input type="text" name="DiaChiKH" id="DiaChiKH"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nhập địa chỉ ở đây" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="GhiChu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ghi
                                chú</label>
                            <textarea id="GhiChu" name="GhiChu" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nhập ghi chú ở đây"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Thêm địa chỉ mới
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once 'views/components/footer.php'; ?>
</body>

</html>