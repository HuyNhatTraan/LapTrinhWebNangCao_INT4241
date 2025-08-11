<?php 

include __DIR__.'/../models/adminModel.php';

class AdminController {
    public static function hienThiTongDonHang() {
        // SoLuongDonHang là tên cột
        $items = AdminModel::getSoLuongDonHang(); 
        $_SESSION['SoLuongDonHang'] = $items['SoLuongDonHang']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongDanhMuc() {
        $items = AdminModel::getSoLuongDanhMuc(); 
        $_SESSION['SoLuongDanhMuc'] = $items['SoLuongDanhMuc']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongKH() {
        $items = AdminModel::getSoLuongKH(); 
        $_SESSION['SoLuongKH'] = $items['SoLuongKH']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongSP() {
        $items = AdminModel::getSoLuongSP(); 
        $_SESSION['SoLuongSP'] = $items['SoLuongSP']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongDoanhThuThangNay() {
        $items = AdminModel::getTongDoanhThuThang();        
        $_SESSION['TongDoanhThuThang'] = $items['TongDoanhThuThang']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiTongDoanhThuThangTruoc() {
        $items = AdminModel::getTongDoanhThuThangTruoc(); 
        $_SESSION['TongDoanhThuThangTruoc'] = $items['TongDoanhThuThangTruoc']; // Lưu vào session để sử dụng sau này
    }
    public static function hienThiSPBanGanDay() {
        $items = AdminModel::getSPBanGanDay(); 
        $_SESSION['SPBanGanDay'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }
    public static function hienThiDanhSachDonhang() {
        $items = AdminModel::getDanhSachDonHang(); 
        $_SESSION['DanhSachDonHang'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }    

    public static function hienThiDanhSachDanhMuc() {
        $items = AdminModel::getDanhSachDanhMuc(); 
        $_SESSION['DanhSachDanhMuc'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }
    public static function hienThiDanhSachKH() {
        $items = AdminModel::getDanhSachKH(); 
        $_SESSION['DanhSachKH'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }
    public static function editThongTinDanhSachKH() {
        if (isset($_POST['MaKH']) && isset($_POST['TenKH']) && isset($_POST['SDT']) && isset($_POST['TrangThaiKH']) && isset($_POST['NgaySinh'])) {
            $maKH = $_POST['MaKH'];
            $tenKH = $_POST['TenKH'];
            $sdt = $_POST['SDT'];
            $trangThaiKH = $_POST['TrangThaiKH'];
            $ngaySinh = $_POST['NgaySinh'];

            // Validate input
            if (empty($maKH) || empty($tenKH) || empty($sdt) || empty($trangThaiKH) || empty($ngaySinh)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }
            $items = AdminModel::suaKhachHang($maKH, $tenKH, $sdt, $trangThaiKH, $ngaySinh); 
            $_SESSION['force_refresh'] = true;
            $_SESSION['DanhSachKH'] = $items; // Lưu vào session để sử dụng sau này
            header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước đó
            exit;
        // echo $items;
        } else {
            echo "Yêu cầu không hợp lệ.";
            return;

        }
        
    }
    public static function hienThiDanhSachSP() {
        $items = AdminModel::getDanhSachSP(); 
        $_SESSION['DanhSachSP'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }
    public static function getDonHangKhachHang($email)   {        
        $items = AdminModel::getDonHangKhachHang($email); 
        $_SESSION['SoLuongOrder'] = $items; // Lưu vào session để sử dụng sau này
        // echo $items;
    }
    
}