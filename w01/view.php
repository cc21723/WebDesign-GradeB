
<?php

switch ($_GET['do'] ?? 'title') {
    case 'title':
?>
        

    <?php

        break;
    case 'ad':
    ?>
        <h3 style="text-align: center;">新增動態文字廣告</h3>
        <hr>
        <form action="">
            <div class="tac">
                <lable>動態文字廣告：</lable>
                <input type="text" name="text" id="">
            </div>
            <div class="tac">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </div>
        </form>

<?php
        break;
    case 'mvim':
        $file = './backend/mvim.php';
        break;
    case 'image':
        $file = './backend/image.php';
        break;
    case 'total':
        $file = './backend/total.php';
        break;
    case 'bottom':
        $file = './backend/bottom.php';
        break;
    case 'news':
        $file = './backend/news.php';
        break;
    case 'admin':
        $file = './backend/admin.php';
        break;
    case 'menu':
        $file = './backend/menu.php';
        break;
    default:
        $file = './backend/title.php';
}

?>