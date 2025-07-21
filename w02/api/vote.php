<?php include_once "db.php";


$option = $Que->find($_POST['option']);
$subject =$Que->find($option['subject_id']); //找subject_id
$option['vote']++; //投票數+1
$subject['vote']++;

$Que->save($option);
$Que->save($subject);

//回到投票的題目的頁面
to("../index.php?do=result&id={$subject['id']}");
