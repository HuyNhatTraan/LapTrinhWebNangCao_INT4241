<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="/LapTrinhWebNangCao_INT4241/frontend/scripts/index.js"></script>
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png" />
    <title><?php echo $_GET['MaSP']; ?></title>
</head>
<body>
    <div class="" id="nav"></div>
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
                
                ';
                echo '<img class="w-30" src="' . $product['HinhAnhSP'] . '" alt="' . $product['TenSP'] . '">';
                echo '<p>Giá: ' . number_format($product['GiaHienTai'], 0, ',', '.') . 'đ</p>';
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
    <div class="" id="footer"></div>
</body>
</html>