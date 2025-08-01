<?php 
require_once __DIR__ . '/../models/danhMucSPModel.php';

class DanhMucSPController {
    

    public function __construct() {}
        
    public function themDanhMucSP() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maDM = $_POST['MaDM'];
            $tenDM = $_POST['TenDanhMucSP'];

            // Validate input
            if (empty($maDM) || empty($tenDM)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }

            // Thêm danh mục sản phẩm
            DanhMucSPModel::themDanhMucSP($maDM, $tenDM);
            header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước đó
            exit;
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
    }
}
