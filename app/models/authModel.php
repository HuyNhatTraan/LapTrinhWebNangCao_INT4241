<?php
require_once __DIR__ . '/../config/db.php';

class AuthModel {

    public function __construct() {}
        
    public static function getUserByEmail($email) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM Account WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin người dùng
        }

        return null; // Không tìm thấy
    }
    public function isEmailExists($email) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM Account WHERE LOWER(Email) = LOWER(:email)");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function generateNewCode($table, $column, $prefix) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT MAX($column) AS maxCode FROM $table WHERE $column LIKE ?");
        $stmt->execute(["$prefix%"]);
        $row = $stmt->fetch();

        $maxCode = $row['maxCode'];
        $newNumber = $maxCode ? ((int)substr($maxCode, strlen($prefix)) + 1) : 1;
        return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    public function registerAccount($email, $password, $fullName, $sdt = '') {
    $db = Database::getInstance()->getConnection();
    
    try {
        $db->beginTransaction();

        $maTK = $this->generateNewCode("Account", "MaTK", "TK");
        $maKH = $this->generateNewCode("KhachHang", "MaKH", "KH");

        $stmt1 = $db->prepare("INSERT INTO Account (MaTK, Email, Password, Role) VALUES (?, ?, ?, 'Khách hàng')");
        $stmt1->execute([$maTK, $email, $password]);

        $stmt2 = $db->prepare("INSERT INTO KhachHang (MaKH, MaTK, TenKH, Email, SDT) VALUES (?, ?, ?, ?, ?)");
        $stmt2->execute([$maKH, $maTK, $fullName, $email, $sdt]);

        $db->commit();  
        return true;
    } catch (Exception $e) {
        $db->rollBack();
        throw $e;
    }
}

}