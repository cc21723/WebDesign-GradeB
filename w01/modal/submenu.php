<?php include_once "../api/db.php" ?>
<h3 style="text-align: center;">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method='post' enctype="multipart/form-data">
    <table class="cent" width=90% style="margin: auto;">
        <thead>
            <tr>
                <td style="width:40%">
                    次選單名稱：
                </td>
                <td style="width:40%">
                    次選單連結網址
                </td>
                <td style="width:20%">
                    刪除
                </td>
            </tr>
        </thead>
        <?php
        $rows = $Menu->all(['main_id' => $_GET['id']]);
        foreach ($rows as $row):
        ?>
            <!-- <tbody> -->
            <tr>
                <td>
                    <input type="text" name="text[]" value="<?= $row['text']; ?>">
                </td>
                <td>
                    <input type="text" name="href[]" value="<?= $row['href']; ?>">
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                </td>
                <input type="hidden" name='id[]' value="<?= $row['id']; ?>">
            </tr>
        <?php endforeach; ?>

        <!-- </tbody> -->
    </table>
    <table class="cent" width=90% style="margin: auto;">
        <tr id="add">
            
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name='main_id' value="<?= $_GET['id']; ?>">
        <input type="hidden" name='table' value="<?= $_GET['table']; ?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>

<script>
    function more() {
        let item = `
        <tr>
            <td style="width:40%">
                <input type="text" name="text2[]" id="">
            </td>
            <td style="width:40%">
                <input type="text" name="href2[]" id="">
            </td>
            <td>
               
            </td>
        </tr>
        `;
        $("#add").append(item);
    }
</script>