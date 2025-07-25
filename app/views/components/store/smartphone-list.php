<h1 class="flex justify-center text-xl md:text-3xl font-bold mt-10 mb-10">Điện thoại</h1>
<div class="w-[90%] lg:w-[80%] justify-center m-auto mt-5 rounded-2xl cursor-pointer">
    <?php
    include_once 'config/db.php';

    try {
        $sql = "SELECT MaSP, TenSP, HinhAnhSP, GiaBase, GiaHienTai FROM SanPham Limit 1";
        $stmt = $conn->query($sql); // thực thi truy vấn trực tiếp
    
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $giaBase = $row['GiaBase'];
                $giaHienTai = $row['GiaHienTai'];
                $giaCuoi = $giaBase - $giaHienTai;
                echo '
                    <a class="w-full" href="/LapTrinhWebNangCao_INT4241/frontend/product/?MaSP=' . $row['MaSP'] . '">  
                        <div class="bg-white rounded-xl flex justify-between p-3 shadow-lg items-center">                          
                            <div class="p-4 md:w-80">
                                <h2 class="text-lg font-bold sm:text-3xl mb-3">' . $row['TenSP'] . '</h2>
                                <h3 class="text-sm p-2 rounded-xl bg-[#fbeed5] w-fit text-[#895a25]">Tiết kiệm ' . number_format($giaCuoi, 0, ',', '.') . 'đ</h3>
                                <div class="text-sm flex flex-col text-gray-600 mt-2">
                                    <span class="text-lg">Từ: </span>
                                    <div class="flex flex-col gap-2 md:flex-row md:items-center">
                                        <p class="text-black text-lg md:text-2xl font-bold">' . number_format($row['GiaHienTai'], 0, ',', '.') . 'đ</p>
                                        <p class="text-sm font-bold text-[#757575] md:text-lg line-through">' . number_format($row['GiaBase'], 0, ',', '.') . 'đ</p>
                                    </div>                                
                                </div>
                            </div>
                            <a href="/LapTrinhWebNangCao_INT4241/frontend/product/?MaSP=' . $row['MaSP'] . '">
                                <img src="' . $row['HinhAnhSP'] . '" alt="' . $row['TenSP'] . '" class="w-30 h-30 sm:w-50 sm:h-50 md:w-60 md:h-60">
                            </a>                            
                        </div>
                    </a>
                ';
            }
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
    }
    ?>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mt-4 mb-4">
        <?php
        try {
            $sql = "SELECT MaSP, TenSP, HinhAnhSP, GiaBase, GiaHienTai FROM SanPham Limit 4";
            $stmt = $conn->query($sql); // thực thi truy vấn trực tiếp
        
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $giaBase = $row['GiaBase'];
                    $giaHienTai = $row['GiaHienTai'];
                    $giaCuoi = $giaBase - $giaHienTai;
                    echo '
                        <a class="h-full w-full" href="/LapTrinhWebNangCao_INT4241/frontend/product/?MaSP=' . $row['MaSP'] . '">      
                            <div class="flex bg-white rounded-xl flex-col xl:flex-row justify-between p-4 shadow-lg h-full">                                               
                                <div class="md:p-2">
                                    <h2 class="text-md font-bold sm:text-xl">' . $row['TenSP'] . '</h2>
                                    <h3 class="text-xs p-2 rounded-xl bg-[#fbeed5] mt-3 w-fit text-[#895a25]">Tiết kiệm ' . number_format($giaCuoi, 0, ',', '.') . 'đ</h3>
                                    <p class="text-sm flex text-gray-600 mt-2 ">Từ: 
                                        <p class="text-black font-bold text-sm xl:text-xl">' . number_format($row['GiaHienTai'], 0, ',', '.') . 'đ</p>
                                        <p class="text-xs font-bold text-[#757575] xl:text-md line-through">' . number_format($row['GiaBase'], 0, ',', '.') . 'đ</p>
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <img src="' . $row['HinhAnhSP'] . '" alt="' . $row['TenSP'] . '" class="xl:w-40 xl:h-35">
                                </div>                              
                            </div>  
                        </a>                    
                    ';
                }
            } else {
                echo "0 results";
            }
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
        }
        ?>

    </div>
    <div
        class="flex bg-gradient-to-r from-slate-200 to-slate-400 items-center justify-center text-center m-auto p-4 rounded-xl shadow-lg mb-20">
        <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/mobile/" class="px-10 py-10">
            <span class="text-gray-600 font-bold text-4xl">Tất cả sản phẩm</span>
        </a>
    </div>
</div>