<?php
include_once "db.php";

// $user=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
$user=$Admin->count($_POST);

//考試寫死就好
// if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
if($user){
    to("../backend.php");
}else{
    echo "<script>alert('帳號或密碼錯誤');location.replace('../index.php?do=login')</script>";
}

// if($user){
//     $_SESSION['login']=1;
//     to("../backend.php");
// }else{
//     echo "<script>alert('帳號或密碼錯誤');location.replace('../index.php?do=login')</script>";
// }

?>