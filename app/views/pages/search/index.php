<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png"/>
    <title>Tìm kiếm</title>
</head>
<body class="bg-[#f7f7f7]">
    <?php require 'views/components/nav.php' ?>
    <span class="flex font-bold text-2xl md:text-4xl p-10 gap-2">Kết quả tìm kiếm '<span class="text-[#ffa566]"><?= htmlspecialchars($_GET['queryStr']) ?></span>'</span>
    <div class="w-full m-auto ">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 w-full sm:gap-3 md:gap-3">
            <?php foreach ($products as $row): 
                $giaBase = $row['GiaBase'];
                $giaHienTai = $row['GiaHienTai'];
                $giam = round((($giaBase - $giaHienTai) / $giaBase) * 100);
            ?>
                <div class="flex bg-white">
                    <a href="product?MaSP=<?= $row['MaSP'] ?>" class="relative flex flex-row sm:flex-col w-full bg-white p-4 sm:py-15">
                        <div class="flex sm:justify-center flex-col items-center text-center">
                            <h2 class="hidden text-md font-bold xl:text-4xl sm:text-2xl md:text-2xl sm:flex"><?= htmlspecialchars($row['TenSP']) ?></h2>
                            <h3 class="hidden sm:flex text-lg font-bold mt-2"><?= number_format($row['GiaHienTai'], 0, ',', '.') ?>đ</h3>
                        <img src="<?= $row['HinhAnhSP'] ?>" alt="<?= $row['TenSP'] ?>" class="w-30 h-30 sm:w-50 sm:h-50 md:w-60 "> 
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
    <?php if (empty($products)): ?>
                <div class="w-full flex justify-center items-center flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>

                    <h2 class="text-5xl font-bold mt-4">Tiếc hen hong tìm thấy SP nào cả</h2>
                </div>
            <?php endif; ?>
    <?php require 'views/components/footer.php' ?>
</body>
</html>