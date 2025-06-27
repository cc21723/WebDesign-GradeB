<style>
    .tac {
        width: 50%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
    }

    .tac input {
        margin: 10px auto;
    }
</style>

    <?php
    $str = [
        'title' => [
            'header' => '更新標題區圖片',
            'label' => '標題區圖片'
        ],
        'mvim' => [
            'header' => '更換動畫圖片',
            'label' => '動畫圖片'
        ],
        'image' => [
            'header' => '更換校園映像圖片',
            'label' => '校園映像圖片'
        ],
    ];
    // echo $str['title']['header'];
    //echo $str[$_GET['table']]['header'];
    // switch ($_GET['table']) {
    //     case 'title':
    //         echo "更新標題區圖片";
    //         break;

    //     case 'mvim':
    //         echo "更換動畫圖片";
    //         break;

    //     case 'image':
    //         echo "更換校園映像圖片";
    //         break;
    // }

    ?>
<h3 style="text-align: center;"><?=$str[$_GET['table']]['header'];?></h3>
<hr>
<form action="./api/update.php" method='post' enctype="multipart/form-data">
    <div class="tac">
        <lable><?=$str[$_GET['table']]['label'];?>：</lable>
        <input type="file" name="img">
    </div>
    <div class="tac">
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>