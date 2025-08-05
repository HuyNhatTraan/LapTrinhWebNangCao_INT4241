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
    public function themDiaChi() {
        $email = $_SESSION['user'];
        // Kiểm tra xem người dùng đã gửi dữ liệu từ form thêm địa chỉ chưa
        if (isset($_POST['TenNguoiNhan']) && isset($_POST['SDTNhanHang']) && isset($_POST['DiaChiKH'])) {
            $TenNguoiNhan = trim($_POST['TenNguoiNhan']);
            $SDTNhanHang = trim($_POST['SDTNhanHang']);
            $DiaChiKH = trim($_POST['DiaChiKH']);
            $GhiChu = trim($_POST['GhiChu']) ?? 'NULL'; // Nếu không có ghi chú thì để trống

            $addressItems = UserInfoModel::addUserAddresses($email, $TenNguoiNhan, $SDTNhanHang, $DiaChiKH, $GhiChu);
            $_SESSION['addressItems'] = $addressItems;
            $_SESSION['themDiaChiThanhCong'] = 1;

            header('Location:'. $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo 'Vui lòng nhập đầy đủ thông tin địa chỉ.';
            $_SESSION['themDiaChiThanhCong'] = 0;
        }        
    }   
    public function suaDiaChi() {
        // Kiểm tra xem người dùng đã gửi dữ liệu từ form thêm địa chỉ chưa
        if (isset($_POST['TenNguoiNhan']) && isset($_POST['SDTNhanHang']) && isset($_POST['DiaChiKH'])) {
            $MaDiaChiKH = $_POST['MaDiaChiKH'];
            $TenNguoiNhan = trim($_POST['TenNguoiNhan']);
            $SDTNhanHang = trim($_POST['SDTNhanHang']);
            $DiaChiKH = trim($_POST['DiaChiKH']);
            $GhiChu = trim($_POST['GhiChu']) ?? 'NULL'; // Nếu không có ghi chú thì để trống

            $addressItems = UserInfoModel::editUserAddresses($MaDiaChiKH, $TenNguoiNhan, $SDTNhanHang, $DiaChiKH, $GhiChu);
            $_SESSION['addressItems'] = $addressItems;
            $_SESSION['suaDiaChiThanhCong'] = 1;

            header('Location:'. $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo 'Vui lòng nhập đầy đủ thông tin địa chỉ.';
            $_SESSION['suaDiaChiThanhCong'] = 0;
        }        
    }   

    public function xoaDiaChi() {
        // Kiểm tra xem người dùng đã gửi dữ liệu từ form thêm địa chỉ chưa
        if (isset($_POST['MaDiaChiKH'])) {
            $MaDiaChiKH = $_POST['MaDiaChiKH'];
            UserInfoModel::deleteUserAddress($MaDiaChiKH);
            $addressItems = UserInfoModel::getUserAddresses($_SESSION['user']);
            $_SESSION['addressItems'] = $addressItems;
            $_SESSION['suaDiaChiThanhCong'] = 1;

            header('Location:'. $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo 'Vui lòng nhập đầy đủ thông tin địa chỉ.';
            $_SESSION['suaDiaChiThanhCong'] = 0;
        }        
    }   
}