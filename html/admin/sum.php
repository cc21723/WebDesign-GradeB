<?php

header("Access-Control-Allow-Origin: *");

function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";


}

$input = $_POST;

$sum = $input['num1'] + $input['num2'];

$data = [
    // [
    //     'id' =>1,
    //     'name' => 'amy'
    // ],
    // [
    //     'id' =>2,
    //     'name' => 'bob'
    // ],
    // [
    //     'id' =>3,
    //     'name' => 'cc'
    // ],
    'num1'=> $input['num1'],
    'num2'=> $input['num2'],
    'sum'=> $sum,

];

dd($data);
echo json_encode($data);