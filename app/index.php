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

$routes = [
    '/' => 'views/home.php',
    '/store' => 'views/pages/store/index.php',
    '/mobile' => 'views/pages/mobile/index.php',
    '/smart-home' => 'views/pages/smart-home/index.php',
    '/discover' => 'views/pages/discover/index.php',
    '/support' => 'views/pages/support/index.php',
    '/account' => 'views/services/account.php',
    '/register' => 'views/services/register.php',
    '/login' => 'views/services/login.php',
    '/admin' => 'views/admin/index.php',
    '/product' => 'views/product/index.php',
];

if (array_key_exists($uri, $routes)) {
    $filePath = $routes[$uri];
    
    if (file_exists($filePath)) {
        require $filePath;
    } else {
        echo "File path không tồn tại: $filePath";
    }

} else {
    http_response_code(404);
    include 'views/pages/404.php';
}
