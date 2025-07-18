<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="/LapTrinhWebNangCao_INT4241/frontend/scripts/index.js"></script>
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title><?php echo $_GET['MaSP']; ?></title>
</head>
<body>
    <?php include '../components/nav.php' ?>
    <?php
        include_once '../../backend/config/db.php'; // kết nối CSDL

        if (isset($_GET['MaSP'])) {
            $maSP = $_GET['MaSP'];

            // Truy vấn lấy thông tin sản phẩm từ MaSP
            $stmt = $conn->prepare("SELECT * FROM SanPham WHERE MaSP = ?");
            $stmt->execute([$maSP]);
            $product = $stmt->fetch();

            if ($product) {
                echo '
                    <div class="container flex">
                        <div class="grid md:grid-cols-2 w-full">
                            <div class="bg-[#f7f8fa] flex items-center justify-center">
                                <img class="w-100" src="' . $product['HinhAnhSP'] . '" alt="' . $product['TenSP'] . '">
                            </div>
                            <div class="xl:p-15 p-6 flex flex-col">
                                <span class="xl:text-4xl text-3xl font-bold xl:mb-5">' . $product['TenSP'] . '</span>
                                <div class="flex items-center mt-3">
                                    <span class="text-2xl font-bold xl:text-4xl xl:font-bold text-[#ff6900]">' . number_format($product['GiaHienTai'], 0, ',', '.') . 'đ</span>
                                    <span class="text-lg xl:text-4xl text-[#757575] line-through ml-3">' . number_format($product['GiaBase'], 0, ',', '.') . 'đ</span>
                                </div>
                                <span class="font-bold text-2xl mt-6">Màu sắc</span>
                                <div class="grid grid-cols-2 lg:grid-cols-3 gap-2">
                                    <div class="flex items-center justify-center p-4 flex-col rounded-xl border-1 border-black mt-3">                                           
                                        <span class="inline-block w-8 h-8 rounded-full bg-red-500 mr-2"></span>
                                        <span class="mt-3">Màu XXX</span>
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="flex items-center justify-between w-full mt-5 mb-5">
                                    <span class="font-black text-xl">Tổng cộng</span>
                                    <span class="font-bold text-xl">' . number_format($product['GiaHienTai'], 0, ',', '.') . 'đ</span>
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
    ?>
    <span class="flex justify-center mt-10 text-2xl xl:text-4xl font-bold">Thông Số Kỹ Thuật</span>
    <div class="ThongSo flex w-[70%] mx-auto mt-6">
        <table class="table-auto w-full border border-gray-300 text-left">
            <tbody>        
                <?php 
                    try {
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
                    } catch (PDOException $e) {
                        echo "Lỗi truy vấn: " . $e->getMessage();
                    }
                ?>     
            </tbody>
        </table>
    </div>
                
    <div class="" id="footer"></div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>