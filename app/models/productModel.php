<?php
require_once __DIR__ . '/../config/db.php';

class productModel {
    public $MaSP;
    public $TenSP;
    public $Gia;
    public $MoTa;
    public $HinhAnh;
    public $MaDM;

    public function __construct($MaSP, $TenSP, $Gia, $MoTa, $HinhAnh, $MaDM) {
        $this->MaSP = $MaSP;
        $this->TenSP = $TenSP;
        $this->Gia = $Gia;
        $this->MoTa = $MoTa;
        $this->HinhAnh = $HinhAnh;
        $this->MaDM = $MaDM;
    }

    // Lấy toàn bộ sản phẩm là điện thoại và tablets
    public static function getAllPhones() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaDM = 'DM001' OR MaDM = 'DM002'");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAllSmartTV() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaDM = 'DM003'");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    // Tìm sản phẩm theo mã
    public static function findSP($MaSP) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaSP = ?");
        $stmt->execute([$MaSP]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm mới
    public static function createSP($data) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO SanPham (MaSP, TenSP, Gia, MoTa, HinhAnh, MaDM) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['MaSP'], $data['TenSP'], $data['Gia'], $data['MoTa'], $data['HinhAnh'], $data['MaDM']
        ]);
    }

    // Cập nhật
    public static function updateSP($MaSP, $data) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE SanPham SET TenSP = ?, Gia = ?, MoTa = ?, HinhAnh = ?, MaDM = ? WHERE MaSP = ?");
        return $stmt->execute([
            $data['TenSP'], $data['Gia'], $data['MoTa'], $data['HinhAnh'], $data['MaDM'], $MaSP
        ]);
    }

    // Xoá
    public static function deleteSP($MaSP) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM SanPham WHERE MaSP = ?");
        return $stmt->execute([$MaSP]);
    }
}
