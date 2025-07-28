<?php
require_once __DIR__ . '/../models/authModel.php';

class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                echo "<h1>Email hoặc mật khẩu không được để trống!</h1>";
                return;
            }

            $user = AuthModel::getUserByEmail($email);
            

            if ($user && password_verify($password, $user['Password'])) {
                session_regenerate_id(true);
                $_SESSION['user'] = $user['Email'];
                $_SESSION['last_activity'] = time();
                $_SESSION['isLoginSuccess'] = 1;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                
                exit();
            } else {
                $_SESSION['isLoginSuccess'] = 0;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    
    public function register() {
        if (isset($_POST['register'])) {
            $full_name = $_POST['fullName'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sdt = $_POST['sdt'] ?? '';

            $model = new AuthModel();

        if ($model->isEmailExists($email)) {
            echo "❌ Email đã được sử dụng!";
            exit;
        }

        try {
            $model->registerAccount($email, $password, $full_name, $sdt);
            $_SESSION['isRegisterSuccess'] = 1;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } catch (Exception $e) {
            echo "❌ Lỗi khi đăng ký: " . $e->getMessage();
            $_SESSION['isRegisterSuccess'] = 0;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        }
    }
}