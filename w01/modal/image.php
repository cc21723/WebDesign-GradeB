<style>
    .tac {
        width: 50%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
    }
    .tac input{
        margin: 10px auto;
    }
</style>

<h3 style="text-align: center;">新增校園映像圖片</h3>
<hr>
<form action="./api/insert.php" method='post' enctype="multipart/form-data">
    <div class="tac">
        <lable>校園映像圖片：</lable>
        <input type="file" name="img" id="">
    </div>

    <div class="tac">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>