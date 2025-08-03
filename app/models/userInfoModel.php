<?php 
require_once __DIR__ . '/../config/db.php';

class UserInfoModel {
    public function __construct() {
        // Khởi tạo kết nối cơ sở dữ liệu nếu cần
    }

    public static function getUserInfo($email) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM KhachHang WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function updateUserInfo($email, $emailMoi, $tenKH, $diaChiGiaoHang, $sdt) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE KhachHang SET Email = :emailMoi, TenKH = :tenKH, DiaChiGiaoHang = :diaChiGiaoHang, SDT = :sdt WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':emailMoi', $emailMoi);
        $stmt->bindParam(':tenKH', $tenKH);
        $stmt->bindParam(':diaChiGiaoHang', $diaChiGiaoHang);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getUserOrders($email) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT  D.MaDonHang, S.TenSP, B.HinhAnhBienThe, C.GiaTien, C.SoLuong, SUM(C.GiaTien * C.SoLuong) AS TongTien, DL.TenDLSP , B.MauSac
        FROM DonHang D            
        INNER JOIN ChiTietDonHang C ON D.MaDonHang = C.MaDonHang
        INNER JOIN KhachHang K ON K.MaKH = D.MaKH
        INNER JOIN BienTheSP B ON B.MaBienThe = C.MaBienThe
        INNER JOIN SanPham S ON S.MaSP = B.MaSP
        INNER Join DungLuongSP DL ON DL.MaDLSP = C.MaDLSP
        Where K.Email = :email
        GROUP BY S.TenSP, B.HinhAnhBienThe, C.GiaTien, C.SoLuong, DL.TenDLSP, B.MauSac, D.MaDonHang");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // Lấy tất cả đơn hàng của người dùng 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
