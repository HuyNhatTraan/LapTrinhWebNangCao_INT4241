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
    <span class="flex items-center justify-center font-bold text-lg md:text-3xl mt-10 mb-10">Chỉnh sửa thông tin tài khoản</span>
    <div class="flex items-center justify-center">
        <form class="bg-white w-[95%] md:w-[80%] p-5 md:p-10 rounded-2xl shadow-lg border-2 border-gray-300" method="POST" action="edit-user-info/submit">
            <?php foreach($_SESSION['userInfo'] as $userInfo): ?>
            <div class="grid gap-6 mb-6 md:grid-cols-2">                
                <div>
                    <label for="TenKH" class="block mb-2 text-sm font-medium text-gray-900 ">Họ và tên của bạn</label>
                    <input type="text" name="TenKH" value="<?php echo $userInfo['TenKH']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Họ và tên của bạn" required />
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email address</label>
                    <input type="email" name="Email" id="Email" value="<?php echo $userInfo['Email']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="EmailCuaBan@gmail.com" readonly />
                </div>
                <div>
                    <label for="DiaChiGiaoHang" class="block mb-2 text-sm font-medium text-gray-900 ">Địa chỉ</label>
                    <input type="text" id="DiaChiGiaoHang" name="DiaChiGiaoHang" value="<?php echo $userInfo['DiaChiGiaoHang']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Địa chỉ của bạn" required />
                </div>  
                <div>
                    <label for="SDT" class="block mb-2 text-sm font-medium text-gray-900 ">Số điện thoại</label>
                    <input type="tel" id="SDT" name="SDT" value="<?php echo $userInfo['SDT']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Số điện thoại của bạn" pattern="0[0-9]{9}"" required />
                </div>               
            </div>
            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Thêm hình ảnh</label>
                <input type="file" id="image" class="text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 flex w-full dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cập nhật thông tin</button>
            </div>            
            <?php endforeach; ?>   
        </form>
    </div>

    <?php require_once 'views/components/footer.php'; ?>
</body>
</html>