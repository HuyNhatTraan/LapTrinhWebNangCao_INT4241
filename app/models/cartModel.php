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
            Select S.MaSP, D.MaDLSP, TenSP, GiaHienTai, TenDLSP, HinhAnhBienThe, MauSac, MaMau, B.MaBienThe 
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

    public static function insertIntoDonHang($MaDiaChiKH, $MaKH, $items, $PhuongThucThanhToan) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO DonHang (MaDiaChiKH, MaKH, NgayTao, TrangThai, PhuongThucThanhToan, GhiChu) VALUES (:MaDiaChiKH, :MaKH, NOW(), 'Chờ xử lý', :PhuongThucThanhToan, '')");
        $stmt->bindValue(':MaDiaChiKH', $MaDiaChiKH, PDO::PARAM_STR);
        $stmt->bindValue(':MaKH', $MaKH, PDO::PARAM_STR);
        $stmt->bindValue(':PhuongThucThanhToan', $PhuongThucThanhToan, PDO::PARAM_STR);
        $stmt->execute();

        $maDonHang = $db->lastInsertId();

        $stmtCT = $db->prepare("INSERT INTO ChiTietDonHang (MaDonHang, MaBienThe, MaDLSP, SoLuong, GiaTien) VALUES (:MaDonHang, :MaBienThe, :MaDLSP, :SoLuong, :GiaHienTai)");
        foreach ($items as $item) {
            $stmtCT->bindValue(':MaDonHang', $maDonHang, PDO::PARAM_INT);
            $stmtCT->bindValue(':MaBienThe', $item['MaBienThe'], PDO::PARAM_STR);
            $stmtCT->bindValue(':MaDLSP', $item['MaDLSP'], PDO::PARAM_STR);
            $stmtCT->bindValue(':SoLuong', $item['SoLuong'], PDO::PARAM_INT);
            $stmtCT->bindValue(':GiaHienTai', $item['GiaHienTai'], PDO::PARAM_STR);
            $stmtCT->execute();
        }
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $maDonHang;
    }
}