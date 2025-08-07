<?php
include_once 'db.php';

$todos = $pdo->query("SELECT * FROM todo ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($todos);
