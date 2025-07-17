<?php
require_once('../config/db.php'); 
session_start();

// Kiểm tra kết nối PDO
if (!$conn) {
    die("❌ Kết nối thất bại!");
}

// HÀM SINH MÃ TỰ ĐỘNG (TK001, KH001,...)
function generateNewCode($conn, $table, $column, $prefix) {
    // Tìm mã lớn nhất có prefix tương ứng (VD: TK%)
    $stmt = $conn->prepare("SELECT MAX($column) AS maxCode FROM $table WHERE $column LIKE ?");
    $stmt->execute(["$prefix%"]);
    $row = $stmt->fetch();

    $maxCode = $row['maxCode'];
    
    if (!$maxCode) {
        $newNumber = 1; // Nếu chưa có mã nào thì bắt đầu từ 1
    } else {
        // Cắt phần số ra rồi +1
        $numberPart = (int)substr($maxCode, strlen($prefix));
        $newNumber = $numberPart + 1;
    }

    // Trả về mã mới có padding 0 (VD: TK007)
    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
}

// XỬ LÝ ĐĂNG KÝ TÀI KHOẢN + KHÁCH HÀNG
if (isset($_POST['register'])) {
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // 1. Kiểm tra xem email đã tồn tại chưa
    $stmt = $conn->prepare("SELECT * FROM Account WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "⚠️ Email đã được sử dụng!";
        exit;
    }

    try {
        // 2. Bắt đầu transaction để đảm bảo dữ liệu nhất quán
        $conn->beginTransaction();

        // 3. Tạo mã tài khoản và mã khách hàng mới
        $maTK = generateNewCode($conn, "Account", "MaTK", "TK");
        $maKH = generateNewCode($conn, "KhachHang", "MaKH", "KH");

        // 4. Chèn tài khoản mới vào bảng Account
        $stmt1 = $conn->prepare("INSERT INTO Account (MaTK, Email, Password, Role) VALUES (?, ?, ?, 'Khách hàng')");
        $stmt1->execute([$maTK, $email, $password]);

        // 5. Chèn khách hàng mới vào bảng KhachHang (gắn với tài khoản vừa tạo)
        $stmt2 = $conn->prepare("INSERT INTO KhachHang (MaKH, MaTK, TenKH, SDT) VALUES (?, ?, ?, ?)");
        $stmt2->execute([$maKH, $maTK, $full_name, $_POST['sdt'] ?? '']);

        // 6. Commit transaction nếu không có lỗi
        $conn->commit();

        // 7. Redirect về trang chính
        header("Location: /LapTrinhWebNangCao_INT4241/frontend/");
        exit;
    } catch (Exception $e) {
        // Rollback nếu có lỗi xảy ra
        $conn->rollBack();
        echo "❌ Lỗi khi đăng ký: " . $e->getMessage();
    }
}
?>
