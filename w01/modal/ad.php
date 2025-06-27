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

<h3 style="text-align: center;">新增動態文字廣告</h3>
<hr>
<form action="./api/insert.php" method='post' enctype="multipart/form-data">
    <div class="tac">
        <lable>動態文字廣告：</lable>
        <input type="text" name="text">
    </div>
    <div class="tac">
        <input type="hidden" name="table" value="ad">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>