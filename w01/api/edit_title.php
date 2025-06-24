<?php
include_once "db.php";

dd($_POST);

foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        //delete
        $Title->del($id);
    }else{
        $row = $Title->find($id);
        $row['text'] = $_POST['text'][$key]; //[$key] 對應的索引值
        $row['sh'] = ($_POST['sh']==$id)?1:0;
        $Title->save($row);
    }
    dd($row);
}

// to("../backend.php?do=title");


?>