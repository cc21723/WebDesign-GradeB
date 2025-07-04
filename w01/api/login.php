<?php
include_once "db.php";

if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
    to("../backend.php");
}else{
    echo "<script>alert('帳號或密碼錯誤');location.replace('../index.php?do=login')</script>";
}

?>