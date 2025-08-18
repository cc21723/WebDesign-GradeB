<?php
if(isset($_POST['text'])){
    $Bot->save(['text'=>$_POST['text'],'id'=>1]);
}
?>

<!-- 頁尾版權管理 -->
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp">
                <input type="text" name="text" value="<?= $Bot->find(1)['text'];?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>