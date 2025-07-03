<?php

// $host = 'sql109.infinityfree.com';
// $db   = 'if0_39375073_hanami';
// $user = 'if0_39375073';
// $pass = 'KK394Gr0uwilX80';

$host = 'localhost';
$db   = 'hanami';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("連線失敗: " . $e->getMessage());
}


?>