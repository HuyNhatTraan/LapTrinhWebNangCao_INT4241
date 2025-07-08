<?php
session_start();

// ⏰ Thiết lập thời gian session expire (1 phút = 60 giây)
$expire_time = 10;

// Kiểm tra nếu đã đăng nhập
if (isset($_SESSION['user'])) {
    // Kiểm tra thời gian hoạt động
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $expire_time)) {
        // Quá hạn → hủy session và chuyển về login
        session_unset();
        session_destroy();
        header("Location: login.php?msg=session_expired");
        exit();
    }

    // Nếu còn hạn thì cập nhật thời gian hoạt động
    $_SESSION['last_activity'] = time();
} else {
    // Nếu chưa login → về lại login
    header("Location: /LapTrinhWebNangCao_INT4241/frontend/services/login.php?msg=not_logged_in");
    exit();
}
?>