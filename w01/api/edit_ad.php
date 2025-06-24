<?php
include_once "db.php";

foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        //delete
        $Ad->del($id);
    }else{
        $row = $Ad->find($id);
        // dd($row);
        $row['text'] = $_POST['text'][$key]; //[$key] 對應的索引值
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $Ad->save($row);
        // dd($row);
    }
}

to("../backend.php?do=ad");


?>