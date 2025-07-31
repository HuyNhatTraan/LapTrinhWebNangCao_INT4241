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
    public static function hienThiTongDoanhThuThangNay() {
        $items = AdminModel::getTongDoanhThuThang(); 
        $_SESSION['TongDoanhThuThang'] = $items['TongDoanhThuThang']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongDoanhThuThangTruoc() {
        $items = AdminModel::getTongDoanhThuThangTruoc(); 
        $_SESSION['TongDoanhThuThangTruoc'] = $items['TongDoanhThuThangTruoc']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiSPBanGanDay() {
        $items = AdminModel::getSPBanGanDay(); 
        $_SESSION['SPBanGanDay'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }
}