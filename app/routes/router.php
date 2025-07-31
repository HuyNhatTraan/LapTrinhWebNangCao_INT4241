<?php
$basePath = '/LapTrinhWebNangCao_INT4241/app'; // ← chính xác folder của project trên URL

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Cắt basePath ra khỏi đường dẫn
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

$uri = '/' . trim($uri, '/'); // Chuẩn hoá: nếu rỗng thì là '/'

// Debug thử xem ra gì
// echo "URI: " . $uri;

require_once 'controllers/productController.php'; // Nạp controller cần dùng
require_once 'controllers/cartController.php'; // Nạp controller cần dùng
require_once 'controllers/authController.php'; // Nạp controller cần dùng

$routes = [
    '/' => ['controller' => 'ProductController', 'action' => 'showHomepageStore'],
    '/store' => ['controller' => 'ProductController', 'action' => 'showStorePage'],
    '/mobile' => ['controller' => 'ProductController', 'action' => 'showPhones'],
    '/smart-home' => ['controller' => 'ProductController', 'action' => 'showSmartTV'],
    '/discover' => 'views/pages/discover/index.php',
    '/support' => 'views/pages/support/index.php',
    '/account' => ['controller' => 'AuthController', 'action' => 'hienThiDivToAdmin'],
    '/register' => 'views/services/register.php',
    '/return-policy' => 'views/pages/support/return-policy.php',
    '/chinh-sach-bao-hanh' => 'views/pages/support/chinh-sach-bao-hanh.php',
    '/chinh-sach-thanh-toan' => 'views/pages/support/chinh-sach-thanh-toan.php',
    '/phi-sua-chua' => 'views/pages/support/phi-sua-chua.php',
    '/register/submit' => ['controller' => 'AuthController', 'action' => 'register'],
    '/login' => 'views/services/login.php',
    '/login/submit' => ['controller' => 'AuthController', 'action' => 'login'],
    '/admin' => ['controller' => 'AuthController', 'action' => 'getAdminDashboard'],
    '/checkout' => ['controller' => 'CartController', 'action' => 'xuLyVaHienThiCheckOut'],
    '/cart' => ['controller' => 'CartController', 'action' => 'xuLyVaHienThiGioHang'],
    '/search' => ['controller' => 'ProductController', 'action' => 'showSearchResults'],
    '/product' => ['controller' => 'ProductController', 'action' => 'showChiTietSP'],
    
];

// Kiểm tra xem đường dẫn URI người dùng truy cập có tồn tại trong mảng routes không
if (array_key_exists($uri, $routes)) {
    $route = $routes[$uri];

    // Nếu route là một mảng => dùng mô hình MVC gọi Controller và Action tương ứng
    if (is_array($route)) {
        $controllerName = $route['controller']; // Tên controller (ví dụ: 'ProductController')
        $action = $route['action'];             // Tên phương thức trong controller (ví dụ: 'index')

        $controller = new $controllerName();    // Khởi tạo đối tượng controller
        $controller->$action();                 // Gọi phương thức (action) tương ứng
    } else {
        // Nếu route là chuỗi => load trực tiếp file view (thường cho các trang tĩnh)
        if (file_exists($route)) {
            require $route; // Nhúng file vào để hiển thị nội dung
        } else {
            // Nếu file không tồn tại, hiển thị lỗi
            echo "File path không tồn tại: $route";
        }
    }
} else {
    // Nếu route không khớp với bất kỳ key nào trong mảng routes => trả về lỗi 404
    http_response_code(404); 
    include  'views/errors/404.php'; // Hiển thị trang 404
}
