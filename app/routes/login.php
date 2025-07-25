<?php
require_once('../config/db.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM Account WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // PDO fetch chuẩn
    if ($stmt->rowCount() === 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $row['Password'])) {
            $_SESSION['user'] = $row['Email'];
            $_SESSION['last_activity'] = time();
            header("Location: /LapTrinhWebNangCao_INT4241/frontend/");
            exit(); // Dừng script sau khi chuyển trang
        } else {
            echo "<h1>Sai mật khẩu!</h1>";
        }
    } else {
        echo "<h1>Không tìm thấy tài khoản!</h1>";
    }
}
?>
