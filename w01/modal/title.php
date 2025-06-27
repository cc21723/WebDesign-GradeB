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

<h3 style="text-align: center;">新增標題區圖片</h3>
<hr>
<form action="./api/insert.php" method='post' enctype="multipart/form-data">
    <div class="tac">
        <lable>標題區圖片：</lable>
        <input type="file" name="img" id="">
    </div>
    <div class="tac">
        <lable>標題區替代文字：</lable>
        <input type="text" name="text" id="" value="卓越科技大學校園資訊系統">
    </div>
    <div class="tac">
        <input type="hidden" name="table" value="title">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>