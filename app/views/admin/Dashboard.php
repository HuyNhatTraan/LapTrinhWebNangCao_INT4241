<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-5">
    <a href="?page=don-hang" class="flex flex-col bg-white p-6 rounded-lg shadow gap-3 text-white bg-gradient-to-r from-cyan-500 to-teal-600">
        <div class="flex flex-row justify-between items-center">
        <span class="text-xl font-bold">Tổng đơn hàng</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
        </div>
        <span class="text-5xl"><?php echo $_SESSION['SoLuongDonHang'];?></span>
        <span>Bỏ hàm so sánh số lượng đơn hàng tháng trước so với tháng này</span>
    </a>
    <a href="?page=danh-muc" class="flex flex-col bg-white p-6 rounded-lg shadow gap-3 text-black">
        <div class="flex flex-row justify-between items-center">
        <span class="text-xl font-bold">Số lượng danh mục</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
        </div>
        <span class="text-5xl"><?php echo $_SESSION['SoLuongDanhMuc'];?></span>
        <span>Bỏ hàm so sánh số lượng đơn hàng tháng trước so với tháng này</span>
    </a>
    <a href="?page=khach-hang" class="flex flex-col bg-white p-6 rounded-lg shadow gap-3 text-black">
        <div class="flex flex-row justify-between items-center">
        <span class="text-xl font-bold">Số lượng khách hàng</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
        </div>
        <span class="text-5xl"><?php echo $_SESSION['SoLuongKH'];?></span>
        <span>Bỏ hàm so sánh số lượng đơn hàng tháng trước so với tháng này</span>
    </a>
    <a href="?page=san-pham" class="flex flex-col bg-white p-6 rounded-lg shadow gap-3 text-black">
        <div class="flex flex-row justify-between items-center">
        <span class="text-xl font-bold">Số lượng sản phẩm</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
        </div>
        <span class="text-5xl"><?php echo $_SESSION['SoLuongSP'];?></span>
        <span>Bỏ hàm so sánh số lượng đơn hàng tháng trước so với tháng này</span>
    </a>
</div>
<div class="mt-5 grid grid-cols-1 lg:grid-cols-2 gap-5">
    <div class="bg-white p-6 rounded-lg shadow gap-5 flex flex-col">
        <span class="text-2xl font-bold">Tổng doanh thu tháng này</span>
        <span class="text-2xl md:text-5xl font-bold text-red-500"><?php echo number_format($_SESSION['TongDoanhThuThang'], 0, '', '.') . 'đ'; ?></span>
        <?php             
            $tongDoanhThuThang = $_SESSION['TongDoanhThuThang'] ?? 0;
            $tongDoanhThuThangTruoc = $_SESSION['TongDoanhThuThangTruoc'] ?? 0;

            if ($tongDoanhThuThangTruoc == 0) {
                if ($tongDoanhThuThang == 0) {
                    $growthText = "Không thay đổi so với tháng trước";
                } else {
                    $growthText = "Tăng 100% so với tháng trước"; // Giả định mặc định khi tháng trước là 0
                }
            } else {
                $growthPercent = (($tongDoanhThuThang - $tongDoanhThuThangTruoc) / $tongDoanhThuThangTruoc) * 100;

                if ($growthPercent > 0) {
                    $growthText = "Tăng " . round($growthPercent, 2) . "% so với tháng trước";
                } elseif ($growthPercent < 0) {
                    $growthText = "Giảm " . abs(round($growthPercent, 2)) . "% so với tháng trước";
                } else {
                    $growthText = "Không thay đổi so với tháng trước";
                }
            }

            
        ?>
        <span class="text-md md:text-xl font-semibold"><?php echo $growthText; ?></span>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <span class="text-2xl font-bold">Các sản phẩm bán gần đây</span>
        <div class="mt-3 flex flex-col">    
            <?php if (!empty($_SESSION['SPBanGanDay'])): ?>               
                <?php foreach ($_SESSION['SPBanGanDay'] as $product): ?>   
                    <div class="hidden md:flex justify-between items-center">     
                        <div class="flex w-[40%]">
                            <img src="<?php echo htmlspecialchars($product['HinhAnhBienThe']); ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>" class="w-16 h-16 object-cover rounded-md inline-block ml-2">                
                            <span class="font-semibold"><?php echo htmlspecialchars($product['TenSP']); ?></span>
                        </div>                                                                                       
                        <span class="text-gray-500"><?php echo date('d-m-Y H:i', strtotime($product['NgayTao'])); ?></span>                    
                        <span class="text-gray-600"><?php echo number_format($product['SoLuong'], 0, '', '.') . ' sản phẩm'; ?></span>                    
                    </div>
                    <div class="flex flex-col md:hidden justify-between">     
                        <div class="flex ">
                            <div class="">
                                <img src="<?php echo htmlspecialchars($product['HinhAnhBienThe']); ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>" class="w-16 h-16 object-cover rounded-md inline-block ml-2">
                            </div>  
                            <div class="flex flex-col">
                                <span class="font-semibold"><?php echo htmlspecialchars($product['TenSP']); ?></span>                                                                                                           
                                <span class="text-gray-500"><?php echo date('d-m-Y H:i', strtotime($product['NgayTao'])); ?></span>                    
                                <span class="text-gray-600">Số lượng: <?php echo number_format($product['SoLuong'], 0, '', '.'); ?></span>                
                            </div>
                        </div>
                    </div>
                    <hr class="mt-2 mb-2 text-gray-400">
                <?php endforeach; ?>               
            <?php else: ?>
                <p class="text-gray-500">Không có sản phẩm bán gần đây.</p>
            <?php endif; ?>
        </div>
    </div>
</div>