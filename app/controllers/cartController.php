<?php 
require_once __DIR__ . '/../models/cartModel.php';
    session_start();

// Xử lý thêm sản phẩm vào giỏ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['MaSP'], $_POST['MaBienThe'], $_POST['MaDLSP'])) {
    $maSP = $_POST['MaSP'];
    $maBienThe = $_POST['MaBienThe'];
    $MaDLSP = $_POST['MaDLSP'];

    // Tạo sản phẩm
    $newProduct = [
        'MaSP' => $maSP,
        'MaBienThe' => $maBienThe,
        'MaDLSP' => $MaDLSP,
        'SoLuong' => 1
    ];

    // Khởi tạo giỏ nếu chưa có
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;

    // Duyệt xem sản phẩm đã tồn tại chưa
    foreach ($_SESSION['cart'] as &$item) {
        if (
            $item['MaSP'] === $maSP &&
            $item['MaBienThe'] === $maBienThe &&
            $item['MaDLSP'] === $MaDLSP
        ) {
            $item['SoLuong'] += 1;
            $found = true;
            break;
        }
    }

    // Nếu chưa có thì thêm mới
    if (!$found) {
        $_SESSION['cart'][] = $newProduct;
    }

    // Debug thử
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "</pre>";
}

class CartController {

    public function __construct() {}

    public function hienThiGioHang() {
        

        $cartModel = new cartModel();
        $cartItems = [];
        $cart = $_SESSION['cart'];
        foreach ($cart as $product) {
        $chiTietList = $cartModel->showGioHang($product['MaSP'], $product['MaBienThe'], $product['MaDLSP']);
        
        foreach ($chiTietList as $chiTiet) {
            
            $cartItems[] = $chiTiet;
        }
}

        include 'views/pages/cart/index.php';
    }

}
