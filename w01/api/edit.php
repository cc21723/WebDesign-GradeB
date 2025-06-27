<?php
include_once "db.php";

$table = $_POST['table'];
$db = ${ucfirst($table)};

foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        //delete
        $db->del($id);
    } else {
        $row = $db->find($id);
        // dd($row);

        switch ($table) {
            case 'title':
                $row['text'] = $_POST['text'][$key]; //[$key] 對應的索引值
                $row['sh'] = ($_POST['sh'] == $id) ? 1 : 0;
                break;
            case 'admin':

                break;
            case 'menu':

                break;
            // case 'ad':
            // case 'news':
            // case 'mvim':
            // case 'image':

            default:
                if (isset($row['text'])) {
                    $row['text'] = $_POST['text'][$key]; //[$key] 對應的索引值
                }
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
        }


        $db->save($row);
        // dd($row);
    }
}

to("../backend.php?do=$table");
