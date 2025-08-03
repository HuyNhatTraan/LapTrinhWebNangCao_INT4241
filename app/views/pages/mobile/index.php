<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png"/>
    <title>HT Tech Official Store</title>
</head>

<body class="bg-[#f7f7f7]">
    <?php require 'views/components/nav.php'?>
    <div class="p-10 flex flex-col">
        <div class="flex font-bold text-2xl md:text-4xl">Smartphone & Tablets</div>
        <div class="flex w-full md:gap-10 mt-3 text-md justify-between md:justify-start md:text-2xl">
            <a href="?related" class="text-gray-800">Liên quan</a>
            <span class="text-gray-800 font-bold">|</span>
            <a href="?new" class="text-gray-800">Mới</a>
            <span class="text-gray-800 font-bold">|</span>
            <div class="flex items-center">
                <a href="?priceLowToHigh" class="text-gray-800">Giá</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18"></path>
                </svg>
            </div>
        </div>
    </div> 
    <div class="w-full m-auto ">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 w-full sm:gap-3 md:gap-3">
            <?php foreach ($products as $row): 
                $giaBase = $row['GiaBase'];
                $giaHienTai = $row['GiaHienTai'];
                $giam = round((($giaBase - $giaHienTai) / $giaBase) * 100);
            ?>
                <div class="flex bg-white group product-line">
                    <a href="product?MaSP=<?= $row['MaSP'] ?>" class="relative flex flex-row sm:flex-col w-full bg-white p-4 sm:py-15">
                        <div class="flex sm:justify-center flex-col items-center text-center">
                            <h2 class="hidden text-md font-bold xl:text-4xl sm:text-2xl md:text-2xl sm:flex"><?= htmlspecialchars($row['TenSP']) ?></h2>
                            <h3 class="hidden sm:flex text-lg font-bold mt-2"><?= number_format($row['GiaHienTai'], 0, ',', '.') ?>đ</h3>
                        <img src="<?= $row['HinhAnhSP'] ?>" alt="<?= $row['TenSP'] ?>" class="group-hover:scale-110 duration-150 w-30 h-30 sm:w-50 sm:h-50 md:w-60 "> 
                        <h3 class="absolute hidden sm:flex top-3 left-3 border-2 border-[#ffa566] font-bold text-xs p-2 rounded-lg bg-[#fbeed5] mt-1 w-fit text-[#ffa566]">Giảm <?= $giam ?>%</h3>                     
                    </div>                                              
                    <div class="md:p-2 lg:m-auto lg:text-center lg:items-center lg:justify-center">
                        <h2 class="text-md font-bold sm:text-xl md:text-2xl sm:hidden"><?= htmlspecialchars($row['TenSP']) ?></h2>
                        <h3 class="text-xs p-2 rounded-xl bg-[#fbeed5] mt-1 w-fit font-black border-2 border-[#ffa566] text-[#ffa566] sm:hidden">Giảm <?= $giam ?>%</h3>
                        <h3 class="text-lg font-bold mt-2 sm:hidden"><?= number_format($row['GiaHienTai'], 0, ',', '.') ?>đ</h3>
                    </div>
                </a>
                </div>                  
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
    var slideUp = {
        distance: '50%',
        origin: 'bottom',
        opacity: '30%',
        reset: true
    };
    ScrollReveal().reveal('.product-line', slideUp);
    </script>
    <?php require 'views/components/footer.php' ?>
</body>

</html>