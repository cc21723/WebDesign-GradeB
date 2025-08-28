<?php

header("Access-Control-Allow-Origin: *");

function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";


}

$input = $_POST;


$data = [
    'id' => 15,
    'name' => 'Snow',
    'msg' => '只要我想的少，快樂就會追著我跑'

];

// dd($data);
echo json_encode($data,JSON_UNESCAPED_UNICODE);