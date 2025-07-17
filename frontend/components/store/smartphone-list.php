<h1 class="flex justify-center text-xl md:text-3xl font-bold mt-10 mb-10">Điện thoại</h1>
<div class="w-[90%] lg:w-[80%] justify-center m-auto mt-5 rounded-2xl cursor-pointer">
    <?php 
        include_once '../../../backend/config/db.php';

        try {
            $sql = "SELECT MaSP, TenSP, HinhAnhSP, DonGia FROM SanPham Limit 1";
            $stmt = $conn->query($sql); // thực thi truy vấn trực tiếp
        
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                        <div class="bg-white rounded-xl flex justify-between p-3 shadow-lg">                         
                            <div class="p-4">
                                <h2 class="text-lg font-bold sm:text-3xl">' . $row['TenSP'] . '</h2>
                                <p class="flex text-gray-600 mt-2">Từ: <p class="text-black">' . number_format($row['DonGia'], 0, ',', '.') . ' VNĐ</p></p>
                            </div>
                            <img src="' . $row['HinhAnhSP'] . '" alt="' . $row['TenSP'] . '" class="w-40 h-40 sm:w-50 sm:h-50 md:w-60 md:h-60">
                        </div>
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
            $sql = "SELECT MaSP, TenSP, HinhAnhSP, DonGia FROM SanPham Limit 4";
            $stmt = $conn->query($sql); // thực thi truy vấn trực tiếp
        
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                        <div class="flex bg-white rounded-xl flex-col xl:flex-row justify-between p-4 shadow-lg">                         
                            <div class="p-4">
                                <h2 class="text-md font-bold sm:text-xl">' . $row['TenSP'] . '</h2>
                                <p class="flex text-gray-600 mt-2">Từ: <p class="text-black">' . number_format($row['DonGia'], 0, ',', '.') . ' VNĐ</p></p>
                            </div>
                            <img src="' . $row['HinhAnhSP'] . '" alt="' . $row['TenSP'] . '" class="xl:w-35 xl:h-35">
                        </div>                      
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
    <div class="flex bg-gradient-to-r from-slate-200 to-slate-400 items-center justify-center text-center m-auto p-4 rounded-xl shadow-lg mb-20">
        <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/mobile/" class="px-10 py-10">
            <span class="text-gray-600 font-bold text-4xl">Tất cả sản phẩm</span>
        </a>
    </div>
</div>