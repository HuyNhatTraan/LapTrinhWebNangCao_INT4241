<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Đặt hàng thành công</title>
</head>
<body>
    <?php include_once 'views/components/nav.php'?>
    <div class="flex flex-col justify-center items-center m-auto mt-20 mb-20 gap-4">
        <svg class="size-24" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#59ff00" d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z"></path></g></svg>
        <h1 class="text-2xl font-bold">Đặt hàng thành công</h1>
        
        <p>Mã đơn hàng của bạn là: #<?php echo $_SESSION['order_id']; ?></p>
        <p>Cảm ơn bạn đã đặt hàng!</p>
        <a href="./" class="text-white p-3 rounded-xl duration-150 border-2 border-gray-300 bg-blue-400 hover:bg-blue-700">Quay lại trang chủ</a>
    </div>
    <?php include_once 'views/components/footer.php'?>
</body>
</html>