<?php
// Kết nối đến cơ sở dữ liệu
require_once('../config/db.php'); 
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Đăng ký
if (isset($_POST['register'])) {
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Kiểm tra email đã tồn tại chưa
    $check = $conn->query("SELECT * FROM Account WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "Email đã được sử dụng!";
    } else {
        // Chèn vào DB
        $sql = "INSERT INTO Account (email, password, full_name)
                    VALUES ('$email', '$password', '$full_name')";
        if ($conn->query($sql)) {
            header("Location: /LapTrinhWebNangCao_INT4241/frontend/");
            echo "Đăng ký thành công! <a href='/LapTrinhWebNangCao_INT4241/frontend/services/login.php'>Đăng nhập</a>";
        } else {
            echo "Lỗi khi đăng ký: " . $conn->error;
        }
    }
}
?>  