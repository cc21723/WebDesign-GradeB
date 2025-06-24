<?php
include_once "db.php";

$_POST['sh']=1;
// dd($_POST);
$Ad->save($_POST);

to("../backend.php?do=ad");

?>