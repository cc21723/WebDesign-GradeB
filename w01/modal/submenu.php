
<h3 style="text-align: center;">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method='post' enctype="multipart/form-data">
    <!-- <div style="display: flex; margin:auto;width:70%">
        <div style="width:50%">次選單名稱：</div>
        <div style="width:50%">次選單連結網址</div>
        <div style="width:10%">刪除</div>

    </div>
    <div style="display: flex; margin:auto;width:70%">
        <div style="width:50%">次選單名稱：</div>
        <div style="width:50%">次選單連結網址</div>
        <div style="width:10%">刪除</div>
    </div> -->
    <table class="cent" width=90% style="margin: auto;">
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
        <tr>
            <td>
                <input type="text" name="" id="">
            </td>
            <td>
                <input type="text" name="" id="">
            </td>
            <td>
                <input type="checkbox" name="" id="">
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name='id' value="<?=$_GET['id'];?>">
        <input type="hidden" name='table' value="<?=$_GET['table'];?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單">
    </div>
</form>