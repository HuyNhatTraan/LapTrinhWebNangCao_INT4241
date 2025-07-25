<h1 class="flex justify-center text-xl md:text-3xl font-bold mt-10 mb-10">Điện thoại</h1>
<div class="w-[90%] lg:w-[80%] justify-center m-auto mt-5 rounded-2xl cursor-pointer">
    <?php foreach ($phoneList1 as $row): 
        $giaBase = $row['GiaBase'];
        $giaHienTai = $row['GiaHienTai'];
        $giaCuoi = $giaBase - $giaHienTai;
    ?>
    <a class="w-full" href="product?MaSP=<?= $row['MaSP']?> ">  
        <div class="bg-white rounded-xl flex justify-between p-3 shadow-lg items-center">                          
            <div class="p-4 md:w-80">
                <h2 class="text-lg font-bold sm:text-3xl mb-3"><?=$row['TenSP']?> </h2>
                <h3 class="text-sm p-2 rounded-xl bg-[#fbeed5] w-fit text-[#895a25]">Tiết kiệm <?= number_format($giaCuoi, 0, ',', '.') ?>đ</h3>
                <div class="text-sm flex flex-col text-gray-600 mt-2">
                    <span class="text-lg">Từ: </span>
                    <div class="flex flex-col gap-2 md:flex-row md:items-center">
                        <p class="text-black text-lg md:text-2xl font-bold"><?= number_format($row['GiaHienTai'], 0, ',', '.') ?>đ</p>
                        <p class="text-sm font-bold text-[#757575] md:text-lg line-through"><?= number_format($row['GiaBase'], 0, ',', '.') ?>đ</p>
                    </div>                                
                </div>
            </div>
            <a href="product/?MaSP=<?= $row['MaSP'] ?>">
                <img src="<?= $row['HinhAnhSP'] ?>" alt="<?= $row['TenSP'] ?>" class="w-30 h-30 sm:w-50 sm:h-50 md:w-60 md:h-60">
            </a>                            
        </div>
    </a>             
    <?php endforeach; ?>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mt-4 mb-4">
        <?php 
            foreach ($phoneList4 as $row): 
            $giaBase = $row['GiaBase'];
            $giaHienTai = $row['GiaHienTai'];
            $giaCuoi = $giaBase - $giaHienTai;
        ?>
        <a class="w-full" href="product?MaSP=' . <?= $row['MaSP'] ?> . '">  
            <div class="bg-white rounded-xl flex justify-between p-3 shadow-lg items-center">                          
                <div class="p-4 md:w-80">
                    <h2 class="text-lg font-bold sm:text-3xl mb-3"><?=$row['TenSP']?> </h2>
                    <h3 class="text-sm p-2 rounded-xl bg-[#fbeed5] w-fit text-[#895a25]">Tiết kiệm <?= number_format($giaCuoi, 0, ',', '.') ?>đ</h3>
                    <div class="text-sm flex flex-col text-gray-600 mt-2">
                        <span class="text-lg">Từ: </span>
                        <div class="flex flex-col gap-2 md:flex-row md:items-center">
                            <p class="text-black text-lg md:text-2xl font-bold"><?= number_format($row['GiaHienTai'], 0, ',', '.') ?>đ</p>
                            <p class="text-sm font-bold text-[#757575] md:text-lg line-through"><?= number_format($row['GiaBase'], 0, ',', '.') ?>đ</p>
                        </div>                                
                    </div>
                </div>
                <a href="product/?MaSP=<?= $row['MaSP'] ?>">
                    <img src="<?= $row['HinhAnhSP'] ?>" alt="<?= $row['TenSP'] ?>" class="w-30 h-30 sm:w-50 sm:h-50 md:w-60 md:h-60">
                </a>                            
            </div>
        </a>             
        <?php endforeach; ?>
    </div>
    <div
        class="flex bg-gradient-to-r from-slate-200 to-slate-400 items-center justify-center text-center m-auto p-4 rounded-xl shadow-lg mb-20">
        <a href="mobile" class="px-10 py-10">
            <span class="text-gray-600 font-bold text-4xl">Tất cả sản phẩm</span>
        </a>
    </div>
</div>