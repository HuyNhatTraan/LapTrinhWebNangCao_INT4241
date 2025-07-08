<?php
    require_once('../config/db.php');
    session_start();
    // Đăng nhập
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $conn->query("SELECT * FROM Account WHERE email='$email'");
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user'] = $row['email'];
                $_SESSION['last_activity'] = time(); // dùng để kiểm tra session timeout
                header("Location: /LapTrinhWebNangCao_INT4241/frontend/");  
                echo "Đăng nhập thành công! <a href='/LapTrinhWebNangCao_INT4241/frontend/'>Vào trang chính</a>";                
            } else {
                echo "<h1>Sai mật khẩu!</h1>";
            }
        } else {
            echo "<h1>Không tìm thấy tài khoản!</h1>";
        }
    }
    exit();
?>