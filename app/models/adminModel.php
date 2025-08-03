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

    public static function getSPBanGanDay() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT S.TenSP, D.NgayTao, C.SoLuong, B.HinhAnhBienThe
            FROM DonHang AS D 
            JOIN ChiTietDonHang AS C ON D.MaDonHang = C.MaDonHang 
            JOIN BienTheSP AS B ON B.MaBienThe = C.MaBienThe 
            JOIN SanPham AS S ON B.MaSP = S.MaSP
            ORDER BY D.NgayTao DESC LIMIT 5");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getDanhSachDonHang() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT D.MaDonHang, K.TenKH, K.Email, D.NgayTao, SUM(C.SoLuong * C.GiaTien) AS TongTien, D.TrangThai FROM DonHang D
            JOIN ChiTietDonHang C ON D.MaDonHang = C.MaDonHang 
            JOIN KhachHang K ON K.MaKH = D.MaKH
            GROUP BY D.MaDonHang");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getDanhSachDanhMuc() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT D.MaDM, D.TenDanhMucSP
            FROM DanhMucSP D");
            
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getDanhSachKH() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT MaKH, TenKH, Email, SDT, NgaySinh, TrangThaiKH FROM KhachHang");

        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function getDanhSachSP() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT MaSP, MaDM, TenSP, HinhAnhSP, TrangThaiSP, GiaBase, GiaHienTai FROM SanPham");

        $stmt->execute();

        return $stmt->fetchAll();
    }
    public static function getDonHangKhachHang($email) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT DISTINCT D.MaDonHang, Count(K.Email) AS TongDH
            FROM DonHang D
            JOIN ChiTietDonHang C ON D.MaDonHang = C.MaDonHang
            JOIN KhachHang K ON K.MaKH = D.MaKH
            Where K.Email = :email
            Group By K.Email, D.MaDonHang");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getTongDoanhThuThang() {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT SUM(C.SoLuong * C.GiaTien) AS TongDoanhThuThang 
        FROM DonHang D JOIN ChiTietDonhang C ON D.MaDonHang = C.MaDonHang
        WHERE MONTH(D.NgayTao) = MONTH(NOW()) AND YEAR(D.NgayTao) = YEAR(NOW())");
  
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