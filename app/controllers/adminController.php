<?php 

include __DIR__.'/../models/adminModel.php';

class AdminController {
    public static function hienThiTongDonHang() {
        // SoLuongDonHang là tên cột
        $items = AdminModel::getSoLuongDonHang(); 
        $_SESSION['SoLuongDonHang'] = $items['SoLuongDonHang']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongDanhMuc() {
        $items = AdminModel::getSoLuongDanhMuc(); 
        $_SESSION['SoLuongDanhMuc'] = $items['SoLuongDanhMuc']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongKH() {
        $items = AdminModel::getSoLuongKH(); 
        $_SESSION['SoLuongKH'] = $items['SoLuongKH']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongSP() {
        $items = AdminModel::getSoLuongSP(); 
        $_SESSION['SoLuongSP'] = $items['SoLuongSP']; // Lưu vào session để sử dụng sau này
    }
}