<?php 

require_once __DIR__ . '/../models/userInfoModel.php';

class UserInfoController {

    public function __construct() {}

    public function hientThiThongTinTaiKhoan() {
        $email = $_SESSION['user'];
        $userInfo = UserInfoModel::getUserInfo($email);

        $_SESSION['userInfo'] = $userInfo;
        // Hiển thị thông tin người dùng
        require_once 'views/services/editAccount.php';
    }

    public function capNhatThongTinTaiKhoan() {
        if (isset($_POST['TenKH']) && isset($_POST['DiaChiGiaoHang']) && isset($_POST['SDT']) && isset($_POST['Email'])) {
            $tenKH = $_POST['TenKH'];
            $emailMoi = $_POST['Email'];
            $diaChiGiaoHang = $_POST['DiaChiGiaoHang'];
            $sdt = $_POST['SDT'];
            $email = $_SESSION['user'];
            // Cập nhật thông tin người dùng
            UserInfoModel::updateUserInfo($email, $emailMoi, $tenKH, $diaChiGiaoHang, $sdt);
            $_SESSION['capNhatThanhCong'] = 1;
            // Hiển thị thông tin người dùng
            header('Location: '. $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['capNhatThanhCong'] = 0;
            echo 'Vui lòng nhập đầy đủ thông tin.';
        }

        
    }
}