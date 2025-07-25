<?php
    session_start();
    session_unset(); // Xoá toàn bộ session
    session_destroy(); // Hủy phiên
    header("Location: /LapTrinhWebNangCao_INT4241/frontend/"); // hoặc homepage
    exit();
