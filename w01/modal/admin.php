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

<h3 style="text-align: center;">新增管理者帳號</h3>
<hr>
<form action="./api/insert.php" method='post' enctype="multipart/form-data">
    <div class="tac">
        <lable>帳號：</lable>
        <input type="text" name="acc">
    </div>
    <div class="tac">
        <lable>密碼：</lable>
        <input type="password" name="pw">
    </div>
    <div class="tac">
        <lable>確認密碼：</lable>
        <input type="password">
    </div>
    <div class="tac">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>