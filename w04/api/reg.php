<!-- 註冊api -->
 <!-- 修改會員 -->
<?php
include_once "db.php";

if(!isset($_POST['id'])){
    $_POST['regdate'] = date("Y-m-d");
}
// dd($_POST);
$User->save($_POST);