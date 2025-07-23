<?php
// 執行登出邏輯
session_start();
session_destroy();

// 重新導向到首頁
header("Location: ../index.php");
exit();
?>