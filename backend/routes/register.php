<?php
require_once('../config/db.php'); 
session_start();

// Kiểm tra kết nối PDO
if (!$conn) {
    die("Kết nối thất bại!");
}

// Đăng ký
if (isset($_POST['register'])) {
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Kiểm tra email đã tồn tại chưa (dùng prepared statement)
    $stmt = $conn->prepare("SELECT * FROM Account WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Email đã được sử dụng!";
    } else {
        // Chèn dữ liệu (dùng prepared statement)
        $stmt = $conn->prepare("INSERT INTO Account (Email, Password, full_name) VALUES (:email, :password, :full_name)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':full_name', $full_name);

        if ($stmt->execute()) {
            header("Location: /LapTrinhWebNangCao_INT4241/frontend/");
            exit(); // Đừng quên dừng script sau header
        } else {
            echo "Lỗi khi đăng ký!";
        }
    }
}
?>
