<?php
include_once "db.php";

$table = $_POST['table'];
$db = ${ucfirst($table)};
// $row = $db->find($_POST['id']);
// $row = $db->find(1);
// $row['total']=$_POST['total'];
// $db->save($row);
unset($_POST['table']);
$db->save($_POST);

to("../backend.php?do=$table");
