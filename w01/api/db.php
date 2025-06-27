<?php
// 啟用 session
session_start();

//設定時區
date_default_timezone_set("Asia/Taipei");

//查詢
function q($sql){
    $dsn = "mysql:host=localhost;dbname=db15;charset=utf8";
    $pdo = new PDO ($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 輸出
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

//頁面跳轉
function to($url){
    header("location:".$url);
}

class DB{
    private $dsn = "mysql:host=localhost;dbname=db15;charset=utf8";
    private $pdo;
    private $table;

    function __construct($table){
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');        
    }

    function all(...$arg){
        $sql = "select * from $this->table";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arraytosql($arg[0]);
                $sql=$sql." where ".join(" AND ", $tmp);

            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id){
        $sql = "select * from $this->table ";
        
            if(is_array($id)){
                $tmp=$this->arraytosql($id);
                $sql=$sql." WHERE ".join(" AND ", $tmp);

            }else{
                $sql .= " WHERE `id`='$id'";
            }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array){
        if(isset($array['id'])){
            //update
            $sql = "update $this->table set ";
            $tmp = $this->arraytosql($array);
            $sql.= join(" , ",$tmp) . "where `id`= '{$array['id']}'";
        }else{
            //insert
            $cols = join("`,`",array_keys($array));
            $values = join("','",$array);
            $sql = "insert into $this->table(`$cols`) values('$values')";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id){
         $sql = "delete from $this->table";
        
            if(is_array($id)){
                $tmp = $this->arraytosql($id);
                $sql=$sql." where ".join(" AND ", $tmp);

            }else{
                $sql .= " WHERE `id`='$id'";
            }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    private function arraytosql($array){
        $tmp=[];
        foreach($array as $key => $vaule){
            $tmp[]="`$key`='$vaule'";
        }
        return $tmp;
    }
}

$Title = new DB('title');  //網站標題管理
$Ad = new DB('ad');        //動態文字廣告管理
$Mvim = new DB('mvim');    //動畫圖片管理

$Images = new DB('images'); //校園映像資料管理
$Total = new DB('total');   //進站總人數管理
$Footer = new DB('footer'); //頁尾版權資料管理
$News = new DB('news');     //最新消息資料管理
$Acc = new DB('acc');       //管理者帳號管理
$Navs = new DB('navs');     //選單管理

















?>