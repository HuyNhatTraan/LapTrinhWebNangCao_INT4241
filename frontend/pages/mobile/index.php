<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png"/>
    <title>HT Tech Official Store</title>
</head>
<body class="bg-gray-[#f7f7f7]">
    <?php require '../../components/nav.php'?>
    <div class="">
        <span class="flex justify-center font-bold text-2xl md:text-4xl mt-5 mb-5">Điện thoại</span>
        <div class="w-[90%] m-auto ">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 w-full gap-5 xl:gap-10 ">
                <?php 
                    require '../../../backend/views/viewProduct.php'; // kết nối CSDL
                    showAllPhone(); // gọi hàm hiển thị sản phẩm
                ?>
            </div>
        </div>
        
    </div>
    <?php require '../../components/footer.php'?>
</body>
</html>