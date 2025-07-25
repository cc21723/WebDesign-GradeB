<style>
    .movie{
        display: flex;
        width: 95%;
        margin: auto;
        box-shadow: 0 0 3px #999;
        align-items: center;
    }
    .mm{
        display: flex;
        width: 100%;
        
    }
    .m33{
        width: 33%;
    }
    .overflow{
        width: 100%;
        height: 500px;
        overflow: auto;
    }
</style>


<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div class="overflow">
<?php
$movies=$Movie->all(' order by `rank`');
foreach($movies as $movie):
?>
    <div class="movie">
        <div style="width: 10%;">
            <img src="./images/<?=$movie['poster'];?>" style="width: 60px;height:80px;">
        </div>
        <div style="width: 10%;">
            分級：<img src="./icon/03C0<?=$movie['level'];?>.png" style="width: 20px;">
        </div>
        <div style="width: 80%;">
            <div class="mm">
                <div class="m33">片名：<?=$movie['name'];?></div>
                <div class="m33">片長：<?=$movie['length'];?></div>
                <div class="m33">上映時間：<?=$movie['ondate'];?></div>
            </div>
            <div style="text-align: right;">
                <button>顯示</button>
                <button>往上</button>
                <button>往下</button>
                <button>編輯電影</button>
                <button>刪除電影</button>
            </div>
            <div>劇情介紹:<?=$movie['intro'];?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>