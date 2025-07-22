<?php include_once "db.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    $Porster->save([
        'name'=>$_POST['name'],
        'img'=>$_FILES['img']['name'],
        'sh'=>1,
        'rank'=>$Porster->max('id')+1,  //排序 現在存在的最大id值+1就是下一個
        'ani'=>rand(1,3)  //動畫一到三
    ]);
}
to("../back.php?do=poster");
?>