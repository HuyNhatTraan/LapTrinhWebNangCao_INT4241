<?php
require_once __DIR__ . '/../config/db.php';
session_start(); // Đặt ở đầu file!

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo "<h1>Email hoặc mật khẩu không được để trống!</h1>";
        return;
    }

    $db = Database::getInstance();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT * FROM Account WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $row['Password'])) {
            session_regenerate_id(true); // 🔒 Ngăn session fixation
            $_SESSION['user'] = $row['Email'];
            $_SESSION['last_activity'] = time();

            header("Location: ../");
            exit();
        } else {
            echo "<h1>Sai mật khẩu!</h1>";
        }
    } else {
        echo "<h1>Không tìm thấy tài khoản!</h1>";
    }
}
