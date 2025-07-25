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

$routes = [
    '/' => 'views/home.php',
    '/store' => ['controller' => 'ProductController', 'action' => 'showStorePage'],
    '/mobile' => ['controller' => 'ProductController', 'action' => 'showPhones'],
    '/smart-home' => ['controller' => 'ProductController', 'action' => 'showSmartTV'],
    '/discover' => 'views/pages/discover/index.php',
    '/support' => 'views/pages/support/index.php',
    '/account' => 'views/services/account.php',
    '/register' => 'views/services/register.php',
    '/login' => 'views/services/login.php',
    '/admin' => 'views/admin/index.php',
    '/product' => 'views/product/index.php',
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
    include 'views/pages/404.php'; // Hiển thị trang 404
}

