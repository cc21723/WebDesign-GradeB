<?php
// 啟用 session
// session_start();

//設定時區
date_default_timezone_set("Asia/Taipei");
//連線
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

//查詢
function q($sql)
{
    $dsn = "mysql:host=localhost;dbname=hanami;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 輸出
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

//頁面跳轉
function to($url)
{
    header("location:" . $url);
}

class DB
{
    private $dsn = "mysql:host=localhost;dbname=hanami;charset=utf8";
    private $pdo;
    private $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->arraytosql($arg[0]);
                $sql = $sql . " where " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->arraytosql($arg[0]);
                $sql = $sql . " where " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }


    function find($id)
    {
        $sql = "select * from $this->table ";

        if (is_array($id)) {
            $tmp = $this->arraytosql($id);
            $sql = $sql . " WHERE " . join(" AND ", $tmp);
        } else {
            $sql .= " WHERE `id`='$id'";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            //update
            $sql = "update $this->table set ";
            $tmp = $this->arraytosql($array);
            $sql .= join(" , ", $tmp) . "where `id`= '{$array['id']}'";
        } else {
            //insert
            $cols = join("`,`", array_keys($array));
            $values = join("','", $array);
            $sql = "insert into $this->table(`$cols`) values('$values')";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id)
    {
        $sql = "delete from $this->table";

        if (is_array($id)) {
            $tmp = $this->arraytosql($id);
            $sql = $sql . " where " . join(" AND ", $tmp);
        } else {
            $sql .= " WHERE `id`='$id'";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    private function arraytosql($array)
    {
        $tmp = [];
        foreach ($array as $key => $vaule) {
            $tmp[] = "`$key`='$vaule'";
        }
        return $tmp;
    }
}



$Product = new DB('product');
$Place = new DB('place');
$Date = new DB('date');
$User = new DB('users');

?>