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
}
