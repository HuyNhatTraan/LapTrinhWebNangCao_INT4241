<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <title><?php echo $_GET['MaSP']; ?></title>
</head>
<body>
    <?php include '../components/nav.php' ?>
    <?php
        include_once '../../backend/views/viewProduct.php'; // kết nối CSDL
        showProduct(); // gọi hàm hiển thị sản phẩm
        
    ?>
    <br><br><br>
    <span class="flex justify-center mt-10 text-2xl md:text-4xl font-bold">Thông Số Kỹ Thuật</span>
    <div class="ThongSo flex w-[70%] justify-center m-auto mt-6">
        <table class="table-auto w-full border border-gray-300 text-left">
            <tbody>        
                <?php 
                    showThongSoKyThuat();
                ?>     
                 
            </tbody>
        </table>
    </div>
                
    <?php include '../components/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>