<?php 
    include_once '../../../LapTrinhWebNangCao_INT4241/backend/config/db.php';
    
    function showMauSac() : void {
        global $conn;

        try {
            if (isset($_GET['MaSP'])) { 
                $maSP = $_GET['MaSP'];

            // Dùng prepare để chống SQL Injection
            $stmt = $conn->prepare("SELECT * FROM BienTheSP WHERE MaSP = ?");
            $stmt->execute([$maSP]);

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '    
                    <div class="flex items-center justify-center p-4 flex-col rounded-xl border-1 border-black cursor-pointer hover:scale-105 duration-200">                                                  
                        <span class="inline-block w-8 h-8 rounded-full bg-' . htmlspecialchars($row['MaMau']) . '"></span>
                        <span class="mt-3">' . htmlspecialchars($row['MauSac']) . '</span>
                    </div>
                    '; 
                }
            } else {
                echo '
                    
                    Không có dữ liệu
                    
                ';
            }
            }
            
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
        }

    }

    function showHinhAnh() : void {
        global $conn;

        try {
            if (isset($_GET['MaSP'])) { 
                $maSP = $_GET['MaSP'];

            // Dùng prepare để chống SQL Injection
            $stmt = $conn->prepare("SELECT * FROM BienTheSP WHERE MaSP = ?");
            $stmt->execute([$maSP]);

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img class="max-h-full max-w-full object-contain m-auto" src="'.$row['HinhAnhBienThe'].'" alt="...">
                        </div>

                    '; 
                }
            } else {
                echo '
                    
                    Không có dữ liệu
                    
                ';
            }
            }
            
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
        }

    }

    function showProduct(): void {
        global $conn;
        if (isset($_GET['MaSP'])) {
            $maSP = $_GET['MaSP'];

            // Truy vấn lấy thông tin sản phẩm từ MaSP
            $stmt = $conn->prepare("SELECT * FROM SanPham WHERE MaSP = ?");
            $stmt->execute([$maSP]);
            $product = $stmt->fetch();
            
            if ($product) {
                echo '
                    <div class="container">
                        <div class="grid md:grid-cols-2 w-full">
                            <div class="bg-[#f5f5f5] flex items-center justify-center">
                                <div id="controls-carousel" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative flex items-center justify-center m-auto h-56 overflow-hidden rounded-lg md:h-96">
                                <!-- Item XX -->
                ';
                showHinhAnh();
                echo '
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                            </div>
                            <div class="xl:p-15 p-10 flex flex-col">
                                <span class="xl:text-4xl text-3xl font-bold xl:mb-5 text-[#ff6900]">' . $product['TenSP'] . '</span>
                                <div class="flex items-center mt-3">
                                    <span class="text-2xl font-bold xl:text-4xl xl:font-bold text-[#ff6900]">' . number_format($product['GiaHienTai'], 0, ',', '.') . 'đ</span>
                                    <span class="text-lg xl:text-4xl text-[#757575] line-through ml-3">' . number_format($product['GiaBase'], 0, ',', '.') . 'đ</span>
                                </div>
                                <span class="font-bold text-2xl mt-6 mb-5">Màu sắc</span>
                                <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">  
                ';
                showMauSac();
                echo '
                                </div>
                                <hr class="mt-3">
                                <div class="flex items-center justify-between w-full mt-5 mb-5">
                                    <span class="font-black text-xl">Tổng cộng</span>
                                    <span class="font-bold text-xl">' . number_format($product['GiaHienTai'], 0, ',', '.') . 'đ</span>
                                </div>
                                <div class="w-full">
                                    <button class="bg-red-500 text-white font-bold rounded-xl w-full p-4 hover:bg-red-800 duration-200 cursor-pointer">Thêm vào giỏ hàng</button>
                                </div> 
                            </div>
                        </div>   
                                          
                    </div>
                    
                ';

            } else {
                echo '
                    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
                    <div class="text-center">
                        <p class="text-8xl font-semibold text-indigo-600">404</p>
                        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Page not found</h1>
                        <p class="mt-6 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Sorry, we couldn’t find the page you’re looking for.</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="/LapTrinhWebNangCao_INT4241/frontend/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</a>
                        <a href="#" class="text-sm font-semibold text-gray-900">Contact support <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                    </main>
                ';
            }
        } else {
            echo '
                <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
                <div class="text-center">
                    <p class="text-base font-semibold text-indigo-600">404</p>
                    <h1 class="mt-4 text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Page not found</h1>
                    <p class="mt-6 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Sorry, we couldn’t find the page you’re looking for.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/LapTrinhWebNangCao_INT4241/frontend/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</a>
                    <a href="#" class="text-sm font-semibold text-gray-900">Contact support <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                </main>
            ';
        }
    }

    function showThongSoKyThuat(): void {
        global $conn;   
        try {
            if (isset($_GET['MaSP'])) { 
                $maSP = $_GET['MaSP'];

            // Dùng prepare để chống SQL Injection
            $stmt = $conn->prepare("SELECT * FROM ThongSoKyThuat WHERE MaSP = ?");
            $stmt->execute([$maSP]);

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-gray-700 font-bold md:text-xl">' . htmlspecialchars($row['TenLinhKien']) . '</td>
                            <td class="px-4 py-2 md:text-xl">' . htmlspecialchars($row['NoiDungLinhKien']) . '</td>
                        </tr>
                    ';
                }
            } else {
                echo '
                    <tr>
                        <td colspan="2" class="px-4 py-2 text-center text-gray-500">Không có dữ liệu</td>
                    </tr>
                ';
            }
            }
            
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
        }
    }
?>