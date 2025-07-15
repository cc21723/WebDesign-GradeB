<?php
include_once "db.php";

//收到的資料 哪篇文章 登入的帳號
// $_POST['news'];
// $_SESSION['login'];


$data = ['news'=>$_POST['news'],'user'=>$_SESSION['login']];
// $chk=$Log->count(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
$chk=$Log->count($data);

$news=$News->find($_POST['news']);

//如果讚存在 收回讚 或 按讚
if($chk){
    //del
    // $Log->del(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
    $Log->del($data);
    $news['good']-=1;
}else{
    // $Log->save(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
    $Log->save($data);
    $news['good']+=1;
}

$News->save($news);
?>