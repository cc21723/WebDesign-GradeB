<?php
include_once "db.php";

// if (!empty($_FILES['img']['tmp_name'])) {
//     move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $_FILES['img']['name']);
//     $_POST['img'] = $_FILES['img']['name'];
//     $_POST['sh'] = 0;
// }


// $table = $_POST['table'];
// $db = ${ucfirst($table)};


// switch ($table) {
//     case 'title':
//         $_POST['sh'] = 0;
//         break;
//     case 'admin':
//         break;
//     default:
//         $_POST['sh'] = 1;
// }

// unset($_POST['table']); //拿掉 table

// $db->save($_POST);


// to("../backend.php?do=$table");

$table = $_POST['table'];
$image = $_FILES['image']['name'];

// 上傳邏輯 ...
move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

// 儲存進資料表
$sql = "INSERT INTO `product` (`img`, `uploaded_at`) VALUES (?, NOW())";
$pdo->prepare($sql)->execute([$image]);

if (move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image)) {
    $sql = "INSERT INTO `product` (`img`, `uploaded_at`) VALUES (?, NOW())";
    $pdo->prepare($sql)->execute([$image]);
    header("Location: /backend/product.php");
} else {
    echo "上傳失敗";
}

header("Location: /backend/product.php");

