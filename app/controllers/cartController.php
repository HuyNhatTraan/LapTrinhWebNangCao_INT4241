<?php
require_once __DIR__ . '/../models/cartModel.php';
require_once __DIR__ . '/../models/userInfoModel.php';
session_start();

class CartController
{

    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new cartModel();
    }

    public function deleteItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maSP = $_POST['MaSP'] ?? null;
            $maBienThe = $_POST['MaBienThe'] ?? null;
            
            print_r($_SESSION['cart']); // Debug đã hen
            foreach ($_SESSION['cart'] as $index => $item) {
                if (
                    $item['MaSP'] === $maSP &&
                    $item['MaBienThe'] === $maBienThe 
                ) {
                    unset($_SESSION['cart'][$index]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // reset index
                    print_r($_SESSION['cart']);
                    break;
                }
            }
            // Redirect lại giỏ hàng
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
            exit;
        }
    }
    public function updateItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maSP = $_POST['MaSP'] ?? null;
            $maBienThe = $_POST['MaBienThe'] ?? null;
            $SoLuong = isset($_POST['SoLuong']) ? (int)$_POST['SoLuong'] : 1;
            echo "Cập nhật số lượng: $SoLuong cho sản phẩm $maSP, biến thể $maBienThe";
            foreach ($_SESSION['cart'] as $index => $item) {
                if (
                    $item['MaSP'] === $maSP &&
                    $item['MaBienThe'] === $maBienThe                 
                ) {
                    $_SESSION['cart'][$index]['SoLuong'] = $SoLuong;               
                    print_r($_SESSION['cart']); // Nó không thực hiện 
                    break;
                }
            }

            // Quay lại trang giỏ hàng
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    public function xuLyVaHienThiGioHang() {
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
            $_SESSION['cartItems'] = $cartItems; // Lưu lại để dùng trong view
            include 'views/pages/cart/index.php';           
        }
    }

    public function xuLyVaHienThiCheckOut()
    {
        // Luôn luôn đảm bảo session cart tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        } else {
            // Hiển thị giỏ hàng như cũ
            $cartItems = [];
            foreach ($_SESSION['cart'] as $product) {                
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
            UserInfoController::hienThiDiaChiCheckOut();
            include 'views/pages/checkout/index.php';
        }
    }

    public function placedOrder() {
        $maDiaChiKH = $_POST['MaDiaChiKH'];
        $maSPList = $_POST['MaSP'];
        $maBienTheList = $_POST['MaBienThe'];  // Mấy thằng này là Array: ví dụ: ['BT019', 'BT009']
        $maDLSPList = $_POST['MaDLSP'];        
        $soLuongList = $_POST['SoLuong'];      
        $maDiaChiKH = $_POST['MaDiaChiKH'];
        $phuongThucThanhToan = $_POST['phuongThucThanhToan'];
        $giaHienTai = $_POST['GiaHienTai'];
        $tongCong = $_POST['TongCong'];        
        $user = UserInfoModel::getUserInfo($_SESSION['user']);
        $maKH = $user[0]['MaKH'];

        $items = [];
        foreach ($maSPList as $i => $maSP) {
            $items[] = [
                'MaSP' => $maSP,
                'MaBienThe' => $maBienTheList[$i],
                'MaDLSP' => $maDLSPList[$i],
                'SoLuong' => $soLuongList[$i],
                'GiaHienTai' => $giaHienTai[$i]
            ];
        }
        $order = cartModel::insertIntoDonHang($maDiaChiKH, $maKH, $items, $phuongThucThanhToan);
        // Xóa giỏ hàng sau khi đặt hàng thành công
        $cartItems = [];
        $_SESSION['cartItems'] = [];
        $_SESSION['order_id'] = $order; // Lưu mã đơn hàng vào session để hiển thị sau này
        unset($_SESSION['cart']);
        // Quay lại trang giỏ hàng
        header('Location: ./order-success');
        exit;
    }
}
