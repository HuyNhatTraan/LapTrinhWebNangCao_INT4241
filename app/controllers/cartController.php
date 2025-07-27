<?php
require_once __DIR__ . '/../models/cartModel.php';
session_start();

class CartController
{

    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new cartModel();
    }

    public function xuLyVaHienThiGioHang()
    {
        // Luôn luôn đảm bảo session cart tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Xử lý nếu là POST hợp lệ
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maSP = $_POST['MaSP'] ?? null;
            $maBienThe = $_POST['MaBienThe'] ?? null;
            $maDLSP = $_POST['MaDLSP'] ?? null;
            $soLuong = isset($_POST['SoLuong']) ? max(1, intval($_POST['SoLuong'])) : 1;

            // Xử lý xóa sản phẩm
            if (isset($_POST['delete']) && $maSP && $maBienThe && $maDLSP) {
                foreach ($_SESSION['cart'] as $index => $item) {
                    if (
                        $item['MaSP'] === $maSP &&
                        $item['MaBienThe'] === $maBienThe &&
                        $item['MaDLSP'] === $maDLSP
                    ) {
                        unset($_SESSION['cart'][$index]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']); // reset key
                        break;
                    }
                }
                
                exit;
            }

            // Xử lý cập nhật số lượng
            if (isset($_POST['update']) && $maSP && $maBienThe && $maDLSP) {
                foreach ($_SESSION['cart'] as $index => $item) {
                    if (
                        $item['MaSP'] === $maSP &&
                        $item['MaBienThe'] === $maBienThe &&
                        $item['MaDLSP'] === $maDLSP
                    ) {
                        $_SESSION['cart'][$index]['SoLuong'] = $soLuong;
                        break;
                    }
                }
                
                exit;
            }

            // Xử lý thêm mới như cũ
            if (!$maSP || !$maBienThe || !$maDLSP) {
                return;
            }
            $newProduct = [
                'MaSP' => $maSP,
                'MaBienThe' => $maBienThe,
                'MaDLSP' => $maDLSP,
                'SoLuong' => $soLuong
            ];
            $foundIndex = -1;
            foreach ($_SESSION['cart'] as $index => $item) {
                if (
                    $item['MaSP'] === $maSP &&
                    $item['MaBienThe'] === $maBienThe &&
                    $item['MaDLSP'] === $maDLSP
                ) {
                    $foundIndex = $index;
                    break;
                }
            }
            if ($foundIndex !== -1) {
                $_SESSION['cart'][$foundIndex]['SoLuong'] += $soLuong;
            } else {
                $_SESSION['cart'][] = $newProduct;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Hiển thị thông báo thành công trên trang sản phẩm
            $_SESSION['add_to_cart_success'] = true;
            // Quay lại trang trước (sản phẩm)
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // Hiển thị giỏ hàng như cũ
            $cartItems = [];
            foreach ($_SESSION['cart'] as $product) {
                if (!is_array($product) || !isset($product['MaSP'], $product['MaBienThe'], $product['MaDLSP'])) {
                    continue;
                }
                $chiTietList = $this->cartModel->showGioHang(
                    $product['MaSP'],
                    $product['MaBienThe'],
                    $product['MaDLSP']
                );
                foreach ($chiTietList as $chiTiet) {
                    $chiTiet['SoLuong'] = $product['SoLuong'];
                    $cartItems[] = $chiTiet;
                }
            }
            include 'views/pages/cart/index.php';
        }
    }

    public function xuLyVaHienThiCheckOut()
    {
        // Luôn luôn đảm bảo session cart tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Xử lý nếu là POST hợp lệ
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maSP = $_POST['MaSP'] ?? null;
            $maBienThe = $_POST['MaBienThe'] ?? null;
            $maDLSP = $_POST['MaDLSP'] ?? null;
            $soLuong = isset($_POST['SoLuong']) ? max(1, intval($_POST['SoLuong'])) : 1;

            // Xử lý xóa sản phẩm
            if (isset($_POST['delete']) && $maSP && $maBienThe && $maDLSP) {
                foreach ($_SESSION['cart'] as $index => $item) {
                    if (
                        $item['MaSP'] === $maSP &&
                        $item['MaBienThe'] === $maBienThe &&
                        $item['MaDLSP'] === $maDLSP
                    ) {
                        unset($_SESSION['cart'][$index]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']); // reset key
                        break;
                    }
                }
                
                exit;
            }

            // Xử lý cập nhật số lượng
            if (isset($_POST['update']) && $maSP && $maBienThe && $maDLSP) {
                foreach ($_SESSION['cart'] as $index => $item) {
                    if (
                        $item['MaSP'] === $maSP &&
                        $item['MaBienThe'] === $maBienThe &&
                        $item['MaDLSP'] === $maDLSP
                    ) {
                        $_SESSION['cart'][$index]['SoLuong'] = $soLuong;
                        break;
                    }
                }
                
                exit;
            }

            // Xử lý thêm mới như cũ
            if (!$maSP || !$maBienThe || !$maDLSP) {
                return;
            }
            $newProduct = [
                'MaSP' => $maSP,
                'MaBienThe' => $maBienThe,
                'MaDLSP' => $maDLSP,
                'SoLuong' => $soLuong
            ];
            $foundIndex = -1;
            foreach ($_SESSION['cart'] as $index => $item) {
                if (
                    $item['MaSP'] === $maSP &&
                    $item['MaBienThe'] === $maBienThe &&
                    $item['MaDLSP'] === $maDLSP
                ) {
                    $foundIndex = $index;
                    break;
                }
            }
            if ($foundIndex !== -1) {
                $_SESSION['cart'][$foundIndex]['SoLuong'] += $soLuong;
            } else {
                $_SESSION['cart'][] = $newProduct;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Hiển thị thông báo thành công trên trang sản phẩm
            $_SESSION['add_to_cart_success'] = true;
            // Quay lại trang trước (sản phẩm)
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // Hiển thị giỏ hàng như cũ
            $cartItems = [];
            foreach ($_SESSION['cart'] as $product) {
                if (!is_array($product) || !isset($product['MaSP'], $product['MaBienThe'], $product['MaDLSP'])) {
                    continue;
                }
                $chiTietList = $this->cartModel->showGioHang(
                    $product['MaSP'],
                    $product['MaBienThe'],
                    $product['MaDLSP']
                );
                foreach ($chiTietList as $chiTiet) {
                    $chiTiet['SoLuong'] = $product['SoLuong'];
                    $cartItems[] = $chiTiet;
                }
            }
            include 'views/pages/checkout/index.php';
        }
    }
}
