<?php

session_start();
date_default_timezone_set("Asia/Taipei");

function dd($array){
    echo "<pre>";
    print_r ($array);
    echo "</pre>";
}

function q($sql){
    $dsn = 'mysql:host=localhost;dbname=db15_3;charset=utf8';
    $pdo = new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url){
    header("location:".$url);
}

class DB{
private $dsn="mysql:host=localhost;dbname=db15_3;charset=utf8";
private $pdo;   
private $table;

function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,"root",'');
}

//查詢整個資料表
function all(...$arg){
    $sql="select * from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            $tmp=$this->arraytosql($arg[0]);
            $sql=$sql." where ".join(" AND " , $tmp);

        }else{
            $sql .= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

//統計 table 中的資料筆數
function count(...$arg){
    // 建立初始 SQL 查詢語句，用於統計 table 中的資料筆數
    $sql = "select count(*) from $this->table ";

    if (isset($arg[0])) { // 判斷是否有第一個參數
        if (is_array($arg[0])) { // 如果第一個參數是陣列
            $tmp = $this->arraytosql($arg[0]); // 將陣列轉換成 SQL 條件語句陣列
            $sql = $sql . " where " . join(" AND ", $tmp); // 將條件以 AND 組合並加到 SQL 語句中
        } else {
            $sql .= $arg[0]; // 如果是字串條件就直接加到 SQL 語句中
        }
    }

    if (isset($arg[1])) { // 判斷是否有第二個參數
        $sql .= $arg[1]; // 加入第二個參數   //通常可用於排序或其他 SQL 附加語句
    }

    return $this->pdo->query($sql)->fetchColumn(); // 執行查詢並回傳結果筆數
    //fetchColumn() 只回傳一列一欄（例如統計筆數或單一欄位值）
}


//統計指定欄位的加總
function sum($col, ...$arg) {
    // 建立初始 SQL 語句，使用 SUM 函式來統計指定欄位的加總
    $sql = "select sum($col) from $this->table ";

    // 檢查是否有傳入第一個條件參數
    if (isset($arg[0])) {
        // 如果第一個參數是陣列，代表多個條件
        if (is_array($arg[0])) {
            $tmp = $this->arraytosql($arg[0]); // 將條件陣列轉換為 SQL 條件語句陣列
            $sql = $sql . " where " . join(" AND ", $tmp); // 將條件語句用 AND 串接成 where 子句
        } else {
            $sql .= $arg[0]; // 如果是字串，直接接在 SQL 語句後（可能是完整的 where 子句）
        }
    }

    // 檢查是否有傳入第二個參數（例如排序、limit 等附加語句）
    if (isset($arg[1])) {
        $sql .= $arg[1]; // 加入第二個參數到 SQL 語句末端
    }

    // 執行 SQL 查詢並回傳結果的單一欄位值（加總結果）
    return $this->pdo->query($sql)->fetchColumn();
}



//查詢指定欄位的最大值
function max($col, ...$arg) {
    // 建立初始 SQL 語句，使用 MAX 函式查詢指定欄位的最大值
    $sql = "select max($col) from $this->table ";

    // 檢查是否有第一個參數（條件）
    if (isset($arg[0])) {
        // 如果第一個參數是陣列，代表多個條件
        if (is_array($arg[0])) {
            $tmp = $this->arraytosql($arg[0]); // 將條件陣列轉換為 SQL 條件語句陣列
            $sql = $sql . " where " . join(" AND ", $tmp); // 將條件用 AND 串接並加入 WHERE 子句
        } else {
            $sql .= $arg[0]; // 如果是字串條件，就直接加到 SQL 語句中（可能是完整的 WHERE 子句）
        }
    }

    // 檢查是否有第二個參數（例如排序、LIMIT 等）
    if (isset($arg[1])) {
        $sql .= $arg[1]; // 將第二個參數加到 SQL 語句末尾
    }

    // 執行查詢並回傳結果的單一欄位值（最大值）
    return $this->pdo->query($sql)->fetchColumn();
}

//根據單筆 ID 來查詢資料表中的一筆資料
function find($id){
    // 建立初始 SQL 語句，預備查詢所有欄位內容
    $sql = "select * from $this->table ";

    // 檢查傳入的 $id 是否為陣列（表示複合條件查詢）
    if (is_array($id)) {
        $tmp = $this->arraytosql($id); // 將條件陣列轉換為 SQL 子句陣列
        $sql = $sql . " where " . join(" AND ", $tmp); // 用 AND 串接條件並加入 WHERE 子句
    } else {
        // 如果是單一 ID，則以該 ID 為查詢條件
        $sql .= " WHERE `id`='$id'";
    }

    // 開啟這行來印出 SQL 語句進行除錯
    // echo $sql;

    // 執行 SQL 查詢並以關聯式陣列方式回傳第一筆資料結果
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

// 執行更新（UPDATE）還是新增（INSERT）資料
function save($array){
    // 檢查傳入的陣列中是否包含 'id' 欄位，決定是更新還是新增
    if (isset($array['id'])) {
        // 執行 UPDATE 操作
        $sql = "update $this->table set "; // 建立初始 update 語句
        $tmp = $this->arraytosql($array);  // 將資料陣列轉換為欄位 = 值 的 SQL 陣列
        $sql .= join(" , ", $tmp) . " where `id`= '{$array['id']}'"; // 加入 WHERE 子句指定要更新的 ID
    } else {
        // 執行 INSERT 操作
        $cols = join("`,`", array_keys($array));   // 取得欄位名稱並組成字串，例如 name`,`email
        $values = join("','", $array);             // 將欄位值組成字串，例如 'Tom','tom@mail.com'
        $sql = "insert into $this->table (`$cols`) values('$values')"; // 組成完整 insert 語句
    }

    // 執行 SQL 語句，回傳受影響的筆數
    return $this->pdo->exec($sql);
}

// 根據 ID 或多個條件刪除資料表中的資料
function del($id){
    // 建立初始 SQL 語句，準備刪除資料
    $sql = "delete from $this->table ";

    // 如果傳入的是陣列，表示使用多個條件來刪除資料
    if (is_array($id)) {
        $tmp = $this->arraytosql($id); // 將條件陣列轉換為 SQL 語法片段
        $sql = $sql . " where " . join(" AND ", $tmp); // 將條件用 AND 串接並加入 WHERE 子句
    } else {
        // 如果是單一值，則以 ID 為主鍵刪除資料
        $sql .= " WHERE `id`='$id'";
    }

    // 印出 SQL 語句進行除錯
    // echo $sql;

    // 執行 SQL 語句，回傳受影響的筆數
    return $this->pdo->exec($sql);
}



private function arraytosql($array){
    $tmp=[];
    foreach($array as $key => $value){
        $tmp[]="`$key`='$value'";
    }

    return $tmp;
}

}



/* 測試資料庫連線及功能正常
$User->save(['acc'=>'test','pw'=>'5678','email'=>'test@labor.gov.tw']);
$User->save(['acc'=>'mem01','pw'=>'mem01','email'=>'mem01@labor.gov.tw']);
$User->save(['acc'=>'mem02','pw'=>'mem02','email'=>'mem02@labor.gov.tw'])
 */

$Poster = new DB('posters');
$Movie = new DB('movies');



// if(!isset($_SESSION['visit'])){
//     //第一次來訪
//     $today=$Visit->find(['date'=>date("Y-m-d")]);
//     if(empty($today)){
//         //沒有今天的資料
//         $Visit->save(['date'=>date("Y-m-d"),'visit'=>1]);
//     }else{
//         $today['visit']++;
//         $Visit->save($today);
//     }

//     $_SESSION['visit']=1;
// }

?>