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

        public function showStorePage() {
            // Gọi model lấy tất cả sản phẩm
            $phoneList1 = ProductModel::getStorePhoneLimit(1);
            $phoneList4 = ProductModel::getStorePhoneLimit(4);
            $tabletList1 = ProductModel::getStoreTabletsLimit(1);
            $tabletList4 = ProductModel::getStoreTabletsLimit(4);
            $smartTVList1 = ProductModel::getStoreSmartHomeLimit(1);
            $smartTVList4 = ProductModel::getStoreSmartHomeLimit(4);
        
            // Gửi sang view để hiển thị
            include 'views/pages/store/index.php';
        }
    }
?>
