<?php 
require_once __DIR__ . '/../models/donHangModel.php';

class DonHangController {
    public function xoaDonHang() {
        if (isset($_POST['MaDonHang'])) {
            $maDH = $_POST['MaDonHang'];

            // Validate input
            if (empty($maDH)) {
                echo "Vui lòng cung cấp mã đơn hàng.";
                return;
            }

            // Xoá đơn hàng
            DonHangModel::xoaDonHang($maDH);
            $_SESSION['force_refresh'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước đó
            exit;
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
    }
    public function editDonHang() {       
        
        if (isset($_POST['MaDonHang']) && isset($_POST['TrangThai'])) {
            $maDH = $_POST['MaDonHang'];
            $trangThaiDH = $_POST['TrangThai'];
            
            // Validate input
            if (empty($maDH)) {
                echo "Vui lòng cung cấp mã đơn hàng.";
                return;
            }

            // Cập nhật trạng thái đơn hàng
            DonHangModel::editDonHang($maDH, $trangThaiDH);
            $_SESSION['force_refresh'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước đó
            exit;
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
    }
}