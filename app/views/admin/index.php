<?php 
    echo '
    <script>
    if (!sessionStorage.getItem("pageReloaded")) {
        sessionStorage.setItem("pageReloaded", "true");
        location.reload(); // chỉ gọi 1 lần refresh duy nhất
    }
    </script>
';
?>
<?php
// Xử lý routing
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$pageTitle = 'Dashboard';

switch ($page) {
    case 'don-hang':
        $pageTitle = 'Quản lý đơn hàng';
        break;
    case 'khach-hang':
        $pageTitle = 'Quản lý khách hàng';
        break;
    case 'danh-muc':
        $pageTitle = 'Quản lý danh mục';
        break;
    case 'san-pham':
        $pageTitle = 'Quản lý sản phẩm';
        break;
    case 'thong-ke':
        $pageTitle = 'Thống kê và báo cáo';
        break;
    default:
        $page = 'dashboard';
        $pageTitle = 'Dashboard';
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Tech Admin - <?php echo $pageTitle; ?></title>
    <link rel="icon" href="icon.png" type="image/png" />
    <link rel="stylesheet" href="styles/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-full">
        <nav class="bg-gray-800 top-0 z-10 sticky">
            <div class="mx-auto max-w px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="./">
                                <img src="icon.png" alt="HT Tech" class="size-8" />
                            </a>

                        </div>
                        <div class="hidden xl:block">
                            <div class="ml-10 flex space-x-4 items-center">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="?page=dashboard"
                                    class="rounded-md <?php echo $page == 'dashboard' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-sm font-medium">Dashboard</a>

                                <a href="?page=don-hang"
                                    class="rounded-md <?php echo $page == 'don-hang' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-sm font-medium">Quản
                                    lý đơn hàng</a>
                                <a href="?page=khach-hang"
                                    class="rounded-md <?php echo $page == 'khach-hang' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-sm font-medium">Quản
                                    lý khách hàng</a>
                                <a href="?page=danh-muc"
                                    class="rounded-md <?php echo $page == 'danh-muc' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-sm font-medium">Quản
                                    lý danh mục</a>
                                <a href="?page=san-pham"
                                    class="rounded-md <?php echo $page == 'san-pham' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-sm font-medium">Quản
                                    lý sản phẩm</a>
                                <a href="?page=thong-ke"
                                    class="rounded-md <?php echo $page == 'thong-ke' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-sm font-medium">Thống
                                    kê và báo cáo</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden xl:flex xl:items-center">
                        <div class="text-white">
                            <span class="text-sm font-medium">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo "Xin chào, " . $_SESSION['user'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="mr-2 flex xl:hidden items-center">

                    <span class="text-sm text-white font-medium">Xin chào, <?php echo $_SESSION['user']; ?></span>
                    <!-- Mobile menu button -->
                    <button type="button" id="mobile-menu-button" aria-controls="mobile-menu" aria-expanded="false"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg id="menu-open-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="block size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg id="menu-close-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="hidden size-6">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="xl:hidden hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3 ">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="./" class="block rounded-md text-white px-3 py-2 text-base font-medium">Về trang chủ</a>
            <a href="?page=dashboard"
                class="block rounded-md <?php echo $page == 'dashboard' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-base font-medium">Dashboard</a>
            <a href="?page=don-hang"
                class="block rounded-md <?php echo $page == 'don-hang' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-base font-medium">Quản
                lý đơn hàng</a>
            <a href="?page=khach-hang"
                class="block rounded-md <?php echo $page == 'khach-hang' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-base font-medium">Quản
                lý khách hàng</a>
            <a href="?page=danh-muc"
                class="block rounded-md <?php echo $page == 'danh-muc' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-base font-medium">Quản
                lý danh mục</a>
            <a href="?page=san-pham"
                class="block rounded-md <?php echo $page == 'san-pham' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-base font-medium">Quản
                lý sản phẩm</a>
            <a href="?page=thong-ke"
                class="block rounded-md <?php echo $page == 'thong-ke' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> px-3 py-2 text-base font-medium">Thống
                kê và báo cáo</a>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="" class="size-10 rounded-full" />
                </div>
                <div class="ml-3">
                    <div class="text-base/5 font-medium text-white">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                </div>
                <button type="button"
                    class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6">
                        <path
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
        </div>
    </div>
    </nav>

    <header class="bg-white shadow-sm">
        <div class="mx-auto w-[90%] px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?php echo $pageTitle; ?></h1>
        </div>
    </header>
    <main>
        <div class="mx-auto w-[95%] md:w-[90%]">
            <?php
            // Include nội dung theo page
            switch ($page) {
                case 'don-hang':
                    include 'QuanLyDonHang.php';
                    break;
                case 'khach-hang':
                    include 'QuanLyKhachHang.php';
                    break;
                case 'danh-muc':
                    include 'QuanLyDanhMuc.php';
                    break;
                case 'san-pham':
                    include 'QuanLySanPham.php';
                    break;
                case 'thong-ke':
                    include 'ThongKeBaoCao.php';
                    break;
                default:
                    include 'Dashboard.php';
                    
            }
            ?>
        </div>
    </main>
    </div>
</body>
<script>
    // JavaScript cho mobile menu
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');

        mobileMenuButton.addEventListener('click', function () {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';

            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);

            if (isExpanded) {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            } else {
                mobileMenu.classList.remove('hidden');
                menuOpenIcon.classList.add('hidden');
                menuCloseIcon.classList.remove('hidden');
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</html>