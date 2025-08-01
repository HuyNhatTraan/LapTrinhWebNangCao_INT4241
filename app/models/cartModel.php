<?php 
require_once __DIR__ . '/../config/db.php';

class cartModel {
    // private $maGH;
    // private $maKH;
    // private $maSP;
    // private $maBienThe;
    // private $MaDLSP;

    public function __construct() {
        
    }

    // public function getMaGH() {
    //     return $this->maGH;
    // }

    public function showGioHang($MaSP, $MaBienThe, $MaDLSP) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            Select S.MaSP, TenSP, GiaHienTai, TenDLSP, HinhAnhBienThe, MauSac, MaMau, B.MaBienThe 
            From SanPham S 
            Join BienTheSP B ON S.MaSP = B.MaSP
            Join DungLuongSP D ON S.MaSP = D.MaSP
            Where S.MaSP = :MaSP AND B.MaBienThe = :MaBienThe AND D.MaDLSP = :MaDLSP"
        );
        $stmt->bindValue(':MaSP', $MaSP, PDO::PARAM_STR);
        $stmt->bindValue(':MaBienThe', $MaBienThe, PDO::PARAM_STR);
        $stmt->bindValue(':MaDLSP', $MaDLSP, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}