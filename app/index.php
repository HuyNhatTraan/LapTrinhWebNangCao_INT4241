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
    '/store' => 'views/pages/store/index.php',
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

// Kiểm tra route có tồn tại không
if (array_key_exists($uri, $routes)) {
    $route = $routes[$uri];

    if (is_array($route)) {
        $controllerName = $route['controller'];
        $action = $route['action'];

        
        $controller = new $controllerName();
        $controller->$action();
    } else {
        if (file_exists($route)) {
            require $route;
        } else {
            echo "File path không tồn tại: $route";
        }
    }
} else {
    http_response_code(404);
    include 'views/pages/404.php';
}
