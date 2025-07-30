<?php
    require_once __DIR__ .'/../models/productModel.php'; // hoặc đúng path đến model của ông

    class ProductController {
        // Hiển thị danh sách điện thoại và tablets
        public function showPhones() {
            if (isset($_GET['related'])) {
                $products = ProductModel::getAllPhones();
            } else if (isset($_GET['new'])) {
                $products = ProductModel::getAllPhonesNewest();
            } else if (isset($_GET['priceLowToHigh'])) {
                $products = ProductModel::getAllPhonesPriceLowToHigh();
            } else {
                $products = ProductModel::getAllPhones();
            }

            include __DIR__ .'/../views/pages/mobile/index.php'; 
        }


        // Hiển thị danh sách Nhà thông minh AKA Smart TV       
        public function showSmartTV() {
            // Gọi model lấy tất cả sản phẩm       
            if (isset($_GET['related'])) {
                $products = ProductModel::getAllSmartTV();
            } else if (isset($_GET['new'])) {
                $products = ProductModel::getAllSmartTVNewest();
            } else if (isset($_GET['priceLowToHigh'])) {
                $products = ProductModel::getAllSmartTVPriceLowToHigh();
            } else {
                $products = ProductModel::getAllSmartTV();
            }

            include __DIR__ .'/../views/pages/mobile/index.php'; 

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

        public function showChiTietSP() {
            $MaSP = $_GET['MaSP'];
            // Gọi model lấy tất cả sản phẩm
            $mauSacHinhAnh = ProductModel::getBienTheSP($MaSP);
            $dungLuong = ProductModel::getDungLuongSP($MaSP);
            $products = ProductModel::getProductById($MaSP);
            $thongSoKyThuat = ProductModel::getThongSoSP($MaSP);

            // Gửi sang view để hiển thị
            include __DIR__ .'/../views/product/index.php'; 
        }
    
        public function showSearchResults() {
            $TenSP = $_GET['queryStr'];
            // Gọi model lấy tất cả sản phẩm
            $products = ProductModel::findSP($TenSP);
            // Gửi sang view để hiển thị
            include __DIR__ .'/../views/pages/search/index.php'; 
        }        
    }
?>
