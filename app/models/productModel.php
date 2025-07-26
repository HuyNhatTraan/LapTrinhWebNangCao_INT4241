<?php
require_once __DIR__ . '/../config/db.php';

class productModel {
    public $MaSP;
    public $TenSP;
    public $Gia;
    public $MoTa;
    public $HinhAnh;
    public $MaDM;

    // Constructor nè 
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

    // Lấy toàn bộ sản phẩm là Nhà thông minh AKA Smart TV
    public static function getAllSmartTV() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaDM = 'DM003'");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Lấy toàn bộ sản phẩm là Nhà thông minh AKA Smart TV
    public static function getStorePhoneLimit($limit) {
        $db = Database::getInstance()->getConnection();

        // Dùng bindValue để tránh SQL Injection cho LIMIT
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaDM = 'DM001' LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT); // Ép kiểu và gán giá trị LIMIT
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getStoreTabletsLimit($limit) {
        $db = Database::getInstance()->getConnection();

        // Dùng bindValue để tránh SQL Injection cho LIMIT
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaDM = 'DM002' LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT); // Ép kiểu và gán giá trị LIMIT
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getStoreSmartHomeLimit($limit) {
        $db = Database::getInstance()->getConnection();

        // Dùng bindValue để tránh SQL Injection cho LIMIT
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaDM = 'DM003' LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT); // Ép kiểu và gán giá trị LIMIT
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Lấy biến thể màu sắc và hình ảnh của sản phẩm truyền MaSP vào
    public static function getBienTheSP($MaSP) {
        $db = Database::getInstance()->getConnection();

        // Dùng bindValue để tránh SQL Injection cho LIMIT
        $stmt = $db->prepare("Select HinhAnhBienThe, MauSac, MaMau From SanPham S Join BienTheSP B ON S.MaSP = B.MaSP Where S.MaSP = :MaSP");
        $stmt->bindValue(':MaSP', $MaSP, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Lấy thông tin sản phẩm theo mã sản phẩm
    public static function getProductById($MaSP) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM SanPham WHERE MaSP = ?");
        $stmt->execute([$MaSP]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết dung lượng theo mã sản phẩm
    public static function getDungLuongSP($MaSP) {
        $db = Database::getInstance()->getConnection();

        // Dùng bindValue để tránh SQL Injection cho LIMIT
        $stmt = $db->prepare("SELECT MIN(MaDLSP) AS MaDLSP, TenDLSP FROM DungLuongSP WHERE MaSP = :MaSP GROUP BY TenDLSP;");
        $stmt->bindValue(':MaSP', $MaSP, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // Lấy thông số kỹ thuật của sản phẩm theo mã sản phẩm
    public static function getThongSoSP($MaSP) {
        $db = Database::getInstance()->getConnection();

        // Dùng bindValue để tránh SQL Injection cho LIMIT
        $stmt = $db->prepare("SELECT * FROM ThongSoKyThuat WHERE MaSP = :MaSP");
        $stmt->bindValue(':MaSP', $MaSP, PDO::PARAM_STR);
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

    // Cập nhật sản phẩm
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
