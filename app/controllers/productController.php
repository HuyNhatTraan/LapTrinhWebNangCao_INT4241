<?php
    require_once __DIR__ .'/../models/productModel.php'; // hoặc đúng path đến model của ông

    class ProductController {
        // Hiển thị danh sách điện thoại và tablets
        public function showPhones() {
            // Gọi model lấy tất cả sản phẩm
            $products = ProductModel::getAllPhones();

            // Gửi sang view để hiển thị
            include __DIR__ .'/../views/pages/mobile/index.php'; 
        }

        // Hiển thị danh sách Nhà thông minh AKA Smart TV       
        public function showSmartTV() {
            // Gọi model lấy tất cả sản phẩm
            $products = ProductModel::getAllSmartTV();

            // Gửi sang view để hiển thị
            include __DIR__ .'/../views/pages/smart-home/index.php'; 
        }
    }
?>
