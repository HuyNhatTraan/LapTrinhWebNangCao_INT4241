<?php
    session_start();
    unset($_SESSION['isLoginSuccess']); // Xoá trạng thái check đăng nhập
    unset($_SESSION['user']); // Xoá user
    
    header("Location: ../"); // hoặc homepage
    exit();
