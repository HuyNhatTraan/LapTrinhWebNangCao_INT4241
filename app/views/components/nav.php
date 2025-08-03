<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="/icon.png" type="image/png" />
</head>

<body>
    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <nav class="bg-white border-gray-200 top-0 z-40 sticky">
        <div class="lg:w-[85%] md:w-[95%] flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="./" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img class="w-8 h-8" src="icon.png" alt="HT Tech Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">HT Tech</span>
            </a>
            <div class="flex items-center">                
                <a href="./cart" class=" flex md:hidden items-center justify-between py-2 px-3 text-gray-900 rounded-sm md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                    <div class="relative items-center">
                        <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span id="cart-number"
                            class="absolute top-3 right-2 z-50 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full shadow-md">
                            <?php
                            $cartCount = 0;
                            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    if (isset($item['SoLuong'])) {
                                        $cartCount += $item['SoLuong'];
                                    }
                                }
                            }
                            echo $cartCount;
                            ?>
                        </span>
                        
                    </div>                    
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">                
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="md:items-center lg:gap-10 md:gap-5 font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:border-gray-700">
                    <li class="mr-0">
                        <a href="./store"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Cửa hàng</a>
                    </li>
                    <li class="mr-0">
                        <a href="./mobile"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Di
                            động</a>
                    </li>
                    <li class="mr-0">
                        <a href="./smart-home"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Nhà
                            thông minh</a>
                    </li>
                    <!-- <li>
                        <a href="./discover"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Khám
                            Phá</a>
                    </li> -->
                    <li class="mr-0">
                        <a href="./support"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Hỗ
                            trợ</a>
                    </li>
                    <li class="mr-0">
                        <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown"
                            class=" flex items-center w-full py-2 px-3 text-gray-900 rounded-sm md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <span class="text-black ms-2 md:hidden">Tìm kiếm</span>
                        </button>
                        
                    </li>
                    <li class="w-fit mr-0">
                        <a href="./cart"
                            class=" flex items-center justify-between py-2 px-3 text-gray-900 rounded-sm md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            <div class="relative items-center">
                                <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <span id="cart-number"
                                    class="absolute top-3 right-2 z-50 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full shadow-md">
                                    <?php
                                    $cartCount = 0;
                                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $item) {
                                            if (isset($item['SoLuong'])) {
                                                $cartCount += $item['SoLuong'];
                                            }
                                        }
                                    }
                                    echo $cartCount;
                                    ?>
                                </span>
                                
                            </div>
                            <span class="text-black ms-2 md:hidden">Giỏ hàng</span>
                        </a>
                    </li>
                    <li class="mr-0 w-fit">
                        <?php if (!empty($_SESSION['user'])): ?>
                            <a href="account" class="w-fit flex p-2 md:p-0 items-center">
                                <?php
                                require_once __DIR__ . '/../../config/db.php';
                                $user = $_SESSION['user'];

                                // Dùng prepare để chống SQL Injection
                                $db = Database::getInstance();
                                $conn = $db->getConnection();
                                $stmt = $conn->prepare("SELECT K.Hinh AS Hinh FROM Account A Join KhachHang K ON A.MaTK = K.MaTK WHERE A.Email = ?");
                                $stmt->execute([$user]);

                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $HinhAnh = $row['Hinh'];
                                        echo '    
                                        <img src="' . $HinhAnh . '" alt="Avartar" class="w-8 h-8 rounded-full">
                                        <span class="text-black ms-2 md:hidden">Tài khoản</span>
                                        ';
                                    }
                                } else {
                                    echo '           
                                    Không có dữ liệu 
                                ';
                                }
                                ?>
                            </a>
                        <?php endif; ?>
                        <?php if (empty($_SESSION['user'])): ?>
                            <a href="login" class="flex p-2 w-fit h-fit">
                                <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <span class="text-black ms-2 md:hidden">Đăng nhập</span>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <div id="mega-menu-full-dropdown"
            class="hidden mt-1 animate__animated animate__faster animate__fadeInDown border-gray-200 shadow-xs bg-gray-50 md:bg-white border-y ">
            <div class="flex w-90%  m-auto px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:px-6">
                <form action="./search" method="GET" class="w-full flex justify-center items-center mb-4">
                    <label for="search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="flex relative w-[95%] md:w-[70%] items-center justify-center">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search" name="queryStr"
                            class="block w-full px-10 py-5 ps-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search" required />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-3.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    
</body>

</html>