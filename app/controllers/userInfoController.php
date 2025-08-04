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
        if (isset($_POST['TenKH']) && isset($_POST['SDT'])) {
            $tenKH = $_POST['TenKH'];
            $emailMoi = $_POST['Email'];            
            $sdt = $_POST['SDT'];
            $email = $_SESSION['user'];
            // Cập nhật thông tin người dùng
            UserInfoModel::updateUserInfo($email, $tenKH);
            $_SESSION['capNhatThanhCong'] = 1;
            // Hiển thị thông tin người dùng
            header('Location: '. $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['capNhatThanhCong'] = 0;
            echo 'Vui lòng nhập đầy đủ thông tin.';
        }        
    }

    public function hienThiDonHang() {
        $email = $_SESSION['user'];
        $orderItems = UserInfoModel::getUserOrders($email);
        $_SESSION['orderItems'] = $orderItems;
        // Hiển thị đơn hàng của người dùng
        require_once 'views/services/userOrder.php';
    }

    public function hienThiDiaChi() {
        $email = $_SESSION['user'];
        $addressItems = UserInfoModel::getUserAddresses($email);
        $_SESSION['addressItems'] = $addressItems;
        // Hiển thị địa chỉ của người dùng
        require_once 'views/services/userAddress.php';
    }
}