<!-- 註冊api -->
<?php
include_once "db.php";

$_POST['regdate'] = date("Y-m-d");
dd($_POST);
$User->save($_POST);