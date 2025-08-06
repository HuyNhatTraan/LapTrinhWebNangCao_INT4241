<?php 
require_once  __DIR__. '/../config/db.php';
class DanhMucSPModel {
    public function __construct() {
        // Constructor logic if needed
    }

    public static function themDanhMucSP($MaDM, $TenDanhMucSP) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO DanhMucSP (MaDM, TenDanhMucSP) VALUES (:MaDM, :TenDanhMucSP)");
        $stmt->bindParam(':MaDM', $MaDM);
        $stmt->bindParam(':TenDanhMucSP', $TenDanhMucSP);
        $stmt->execute();        
    }
    
    public static function xoaDanhMucSP($MaDM) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM DanhMucSP WHERE MaDM = :MaDM");
        $stmt->bindParam(':MaDM', $MaDM);        
        $stmt->execute();        
    }

    public static function suaDanhMucSP($MaDM, $TenDanhMucSP) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE DanhMucSP SET TenDanhMucSP = :TenDanhMucSP WHERE MaDM = :MaDM");
        $stmt->bindParam(':MaDM', $MaDM);
        $stmt->bindParam(':TenDanhMucSP', $TenDanhMucSP);
        $stmt->execute();        
    }
}
