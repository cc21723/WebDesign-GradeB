<?php
include_once "db.php";

$table = $_POST['table'] ?? '';
$ids = $_POST['id'] ?? [];

// ✅ 確保安全，只允許特定 table
$allowTables = ['product', 'place', 'date'];
if (!in_array($table, $allowTables)) {
    exit("非法資料表！");
}

// ✅ 刪除勾選的
if (isset($_POST['del'])) {
    foreach ($_POST['del'] as $delId) {
        $sql = "DELETE FROM `$table` WHERE id=?";
        $pdo->prepare($sql)->execute([$delId]);
    }
}

// ✅ 處理每一筆資料
foreach ($ids as $idx => $id) {
    // 如果這筆已被刪除，就跳過
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        continue;
    }

    // ✅ 取得文字欄位，欄位名稱可能是 title 或 text
    $textCol = ($table === 'product') ? 'title' : 'text';
    $text = $_POST['text'][$idx] ?? '';

    // ✅ 是否顯示
    $sh = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;

    $sql = "UPDATE `$table` SET `$textCol`=?, `sh`=? WHERE `id`=?";
    $pdo->prepare($sql)->execute([$text, $sh, $id]);
}

header("Location: ../dashboard.php?do={$table}");
?>
