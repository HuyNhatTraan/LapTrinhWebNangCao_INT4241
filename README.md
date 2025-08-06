# Author: HuyNhatTran
- Github: [Github.com/HuyNhatTraan](https://github.com/HuyNhatTraan)
- Repo: 
# Cách sử dụng:
1. Clone lại Repo này: 
2. Tải MySQL Workbench bản mới nhất và file MyDB.sql về máy và thực thi query này để tạo ra Database với tên: HT_Tech_LTWNC
3. Bỏ folder LapTrinhWebNangCao_INT4241 vào xammp/htdocs
4. Đảm bảo đường dẫn vẫn là htdocs/LapTrinhWebNangCao_INT4241/app
    4.1. Nếu bạn đã tên lại folder thành abcxyz/app <--- thì chúng ta sẽ cần đổi lại đường dẫn ở 3 file.
        4.1.1. /app/.htaccess 
        - Chỉnh lại RewriteBase /LapTrinhWebNangCao_INT4241/app/ đúng theo đường dẫn bạn muốn lưu ý vẫn giữa '/' ở đầu đường dẫn.
        4.1.2. /app/routes/router.php
        - Chỉnh lại $basePath = '/LapTrinhWebNangCao_INT4241/app'; đúng theo đường dẫn /xxx/app (vẫn giữa '/' ở đầu đường dẫn).
    4.2. Chỉnh lại phần đăng nhập đến MySQL 
    - /YourFolder/app/config/db.php
    private $host = "x";
    private $dbName = "x";
    private $username = "x"; 
    private $password = "x";
    Chỉnh lại host, db name và username, pass theo ý của bạn.
5. Dùng Xammp Start apache services và tuy cập đến localhost/đường_dẫn/app bên trong htdocs
# Cảm ơn bạn đã sử dụng ❤