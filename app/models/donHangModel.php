<?php 
require_once __DIR__ . '/../config/db.php';

class DonHangModel {    

    public static function xoaDonHang($maDH) {
        $db = Database::getInstance()->getConnection();

        $stmt2 = $db->prepare("DELETE FROM ChiTietDonHang WHERE MaDonHang = :MaDH");
        $stmt2->bindParam(':MaDH', $maDH);
        $stmt2->execute();  

        $stmt = $db->prepare("DELETE FROM DonHang WHERE MaDonHang = :MaDH");
        $stmt->bindParam(':MaDH', $maDH);
        $stmt->execute();   
    }
    public static function editDonHang($maDH, $TrangThaiDH) {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("UPDATE DonHang SET TrangThai = :TrangThai WHERE MaDonHang = :MaDH");
        $stmt->bindParam(':MaDH', $maDH);
        $stmt->bindParam(':TrangThai', $TrangThaiDH);        
        $stmt->execute();   
    }
}