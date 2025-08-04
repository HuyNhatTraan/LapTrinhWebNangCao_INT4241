<?php
require_once __DIR__ . '/../models/authModel.php';
include __DIR__ . '/../controllers/adminController.php';

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

    public function getRoleUser() {
        if (isset($_SESSION['user'])) {
            $user = AuthModel::getRoleUser($_SESSION['user']);
            if ($user && $user['Role'] === 'Khách hàng') {
                include './account.php';
                header('Location: ./admin/index.php');
            } else {
                echo "Bạn không có quyền truy cập vào trang quản trị.";
            }
        } else {
            exit();
        }
    }

    public function getAdminDashboard() {
        if (isset($_SESSION['user'])) {
            $user = AuthModel::getRoleUser($_SESSION['user']);
            if ($user && $user['Role'] === 'Admin') {
                require_once 'views/admin/index.php';
                AdminController::hienThiTongDonHang();
                AdminController::hienThiTongDanhMuc();
                AdminController::hienThiTongKH();
                AdminController::hienThiTongSP();
                AdminController::hienThiTongDoanhThuThangNay();
                AdminController::hienThiTongDoanhThuThangTruoc();
                AdminController::hienThiSPBanGanDay();
                AdminController::hienThiDanhSachDonhang();
                AdminController::hienThiDanhSachDanhMuc();
                AdminController::hienThiDanhSachKH();
                AdminController::hienThiDanhSachSP();
            } else {
                include 'views/errors/403.php';                
            }
        } else {
            exit();
        }
    }

    public function hienThiDivToAdmin() {
        if (isset($_SESSION['user'])) {
            $userRole = AuthModel::getRoleUser($_SESSION['user']);
            $userInfo = AuthModel::getKhachHangByEmail($_SESSION['user']);
            $email = $_SESSION['user'];
            $userOrder = AdminController::getDonHangKhachHang($email);
            $addressItems = UserInfoModel::getUserAddresses($email);
            $_SESSION['addressItems'] = $addressItems;

            if ($userRole && isset($userRole['Role'])) {
                $_SESSION['role'] = $userRole['Role'];             
            }

            if ($userInfo) {
                $_SESSION['user_info'] = $userInfo;
            }

            if ($userOrder) {
                $_SESSION['user_order'] = $userOrder;
            }
        }
        // Gọi view account, không phân biệt quyền
        require 'views/services/account.php';
    }
    
    public function register() {
        if (isset($_POST['register'])) {
            $full_name = $_POST['fullName'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sdt = $_POST['sdt'] ?? '';

            $model = new AuthModel();

        if ($model->isEmailExists($email)) {
            echo "Email đã được sử dụng!";
            exit;
        }

        try {
            $model->registerAccount($email, $password, $full_name, $sdt);
            $_SESSION['isRegisterSuccess'] = 1;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } catch (Exception $e) {
            echo "Lỗi khi đăng ký: " . $e->getMessage();
            $_SESSION['isRegisterSuccess'] = 0;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        }
    }
}