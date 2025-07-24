<?php
include_once "db.php";

$table = $_POST['table'] ?? '';

if (isset($_FILES['image'])) {
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $title = $_POST['title'] ?? ''; // 新增這行取得 title

    if ($image && move_uploaded_file($tmp_name, "../images/" . $image)) {
        $sql = "INSERT INTO `$table` (`img`, `title`, `uploaded_at`) VALUES (?, ?, NOW())";
        // $sql = "INSERT INTO `product` (`img`, `uploaded_at`) VALUES (?, ?, NOW())";
        $pdo->prepare($sql)->execute([$image, $title]);
        header("Location: ../dashboard.php?do={$table}");
    } else {
        echo "上傳失敗";
    }
} else {
    echo "沒收到檔案";
}
