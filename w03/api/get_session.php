<?php
include_once "db.php";

$id = $_GET['movieId'];
$date = $_GET['date'];

$movie = $Movie->find($id);
// $ondate=strtotime($movies['ondate']);
$today=strtotime(date("Y-m-d"));

$start = 0;
$hr = date("G");

if($date==date("Y-m-d") && $hr>13){
    $start = ceil(($hr-13)/2); // ceil 無條件進位
}


for($i=$start;$i<5;$i++){
    // $剩餘 = 20;
    $remaining = 20 - $Order->sum('tickets',['movie'=>$movie['name'] ,'date'=>$date ,'session'=>$sessStr[$i]]); //假設每場剩餘20個座位 20-已被訂走的座位數
    echo "<option value='{$sessStr[$i]}'>";
    echo $sessStr[$i];
    echo " 剩餘座位 ";
    // echo "$剩餘 人";
    echo "$remaining 人";
    echo "</option>";

}
