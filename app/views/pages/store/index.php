<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Cửa hàng</title>
</head>

<body class="bg-[#f7f7f7]">
    <?php require 'views/components/nav.php'; ?>
    <div class="flex justify-center m-auto mt-5 rounded-2xl">
        <div class="flex w-[90%] rounded-2xl h-40 md:h-50 xl:h-80 xl:w-[80%]">
            <div class="relative">
                <img class="h-full w-fit object-cover object-center rounded-xl"
                    src="https://i02.appmifile.com/745_operator_vn/23/05/2025/d58bf0cf902e1e8f4045b220bf81e32e.png?thumb=1&w=2560&f=webp&q=85"
                    alt="">
                <div class="absolute top-1/2 left-5 md:left-10 -translate-y-1/2 w-[70%]">
                    <div class="flex flex-col">
                        <span class="font-bold md:text-xl lg:text-3xl">Xiaomi TV A Pro 2026 Series</span>
                        <span class="text-sm md:text-md lg:text-xl mt-2">Tuyệt tác thị giác</span>
                        <button class="rounded-xl p-3 bg-black text-white w-fit mt-3 cursor-pointer hover:scale-105 duration-150">Tìm hiểu thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'views/components/store/smartphone-list.php';?>
    <?php include 'views/components/store/tablet-list.php';?>
    <?php include 'views/components/store/smartTV-list.php';?>
    <?php include 'views/components/footer.php'; ?>
</body>
</html>