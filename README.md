
# HT_Tech_LTWNC

**Author:** HuyNhatTran  
**GitHub:** [https://github.com/HuyNhatTraan](https://github.com/HuyNhatTraan)

## Giới thiệu
Đây là project website thương mại điện tử "HT Tech" được phát triển phục vụ môn Lập Trình Web Nâng Cao. Dự án sử dụng PHP thuần theo mô hình MVC, kết nối cơ sở dữ liệu MySQL.

## Cách cài đặt & sử dụng

### 1. Clone Repository
```bash
git clone https://github.com/HuyNhatTraan/LapTrinhWebNangCao_INT4241.git
```

### 2. Tạo Database
- Mở **MySQL Workbench** (bản mới nhất).
- Import file **`MyDB.sql`** để tạo database với tên:
  ```sql
  HT_Tech_LTWNC
  ```

### 3. Cấu hình XAMPP & Project
- Copy folder **`LapTrinhWebNangCao_INT4241`** vào thư mục:
  ```
  xampp/htdocs/
  ```
- Đảm bảo đường dẫn đầy đủ là:
  ```
  htdocs/LapTrinhWebNangCao_INT4241/app
  ```

### 4. Nếu đổi tên folder, cần chỉnh sửa lại đường dẫn ở các file sau:

#### 4.1. File: `/app/.htaccess`
- Tìm dòng:
  ```apache
  RewriteBase /LapTrinhWebNangCao_INT4241/app/
  ```
- Sửa lại đường dẫn tương ứng theo folder mới (Lưu ý phải có dấu `/` ở đầu).

#### 4.2. File: `/app/routes/router.php`
- Tìm dòng:
  ```php
  $basePath = '/LapTrinhWebNangCao_INT4241/app';
  ```
- Sửa lại tương ứng theo folder mới (giữ dấu `/` ở đầu).

#### 4.3. File: `/app/config/db.php`
- Chỉnh lại thông tin kết nối Database:
  ```php
  private $host = "localhost"; // Hoặc IP của MySQL Server
  private $dbName = "HT_Tech_LTWNC"; // Tên Database
  private $username = " "; // Tài khoản MySQL
  private $password = " "; // Mật khẩu MySQL
  ```

### 5. Khởi động XAMPP
- Start **Apache** và **MySQL** services.
- Mở trình duyệt và truy cập địa chỉ:
  ```
  http://localhost/LapTrinhWebNangCao_INT4241/app
  ```
  (hoặc theo đường dẫn bạn đã chỉnh sửa).

## Lưu ý
- Nếu gặp lỗi 404, hãy kiểm tra lại file **.htaccess** và đảm bảo **Apache mod_rewrite** đã được bật.
- Kiểm tra thông tin kết nối Database trong file **db.php** phải đúng.

## Liên hệ
Nếu có bất kỳ thắc mắc hay góp ý, vui lòng liên hệ qua GitHub: [HuyNhatTraan](https://github.com/HuyNhatTraan)

---

Cảm ơn bạn đã sử dụng ❤️
