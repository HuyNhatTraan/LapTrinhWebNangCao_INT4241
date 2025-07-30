<?php 
class AdminModel {

    public function __construct() {}

    public static function getSoLuongDonHang() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT COUNT(*) AS SoLuongDonHang FROM DonHang");
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getSoLuongDanhMuc() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT COUNT(*) AS SoLuongDanhMuc FROM DanhMucSP");
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getSoLuongKH() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT COUNT(*) AS SoLuongKH FROM KhachHang");
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getSoLuongSP() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT COUNT(*) AS SoLuongSP FROM SanPham");
        $stmt->execute();

        return $stmt->fetch();
    }
    public static function getTongDoanhThuThang() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT SUM(C.SoLuong * C.GiaTien) AS TongDoanhThuThang 
        FROM DonHang D JOIN ChiTietDonhang C ON D.MaDonHang = C.MaDonHang
        WHERE MONTH(D.NgayTao) = MONTH(NOW()) AND YEAR(D.NgayTao) = YEAR(NOW());");
  
        $stmt->execute();

        return $stmt->fetch();
    }
    public static function getTongDoanhThuThangTruoc() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT SUM(C.SoLuong * C.GiaTien) AS TongDoanhThuThangTruoc 
        FROM DonHang D JOIN ChiTietDonhang C ON D.MaDonHang = C.MaDonHang
        WHERE MONTH(D.NgayTao) = MONTH(NOW() - INTERVAL 1 MONTH) AND YEAR(D.NgayTao) = YEAR(NOW());");

        $stmt->execute();

        return $stmt->fetch();
    }
}