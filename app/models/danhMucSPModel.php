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
}
