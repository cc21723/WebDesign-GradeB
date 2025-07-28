<style>
    .movie {
        display: flex;
        width: 95%;
        margin: auto;
        box-shadow: 0 0 3px #999;
        align-items: center;
    }

    .mm {
        display: flex;
        width: 100%;

    }

    .m33 {
        width: 33%;
    }

    .overflow {
        width: 100%;
        height: 500px;
        overflow: auto;
    }
</style>


<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div class="overflow">
    <?php
    $movies = $Movie->all(' order by `rank`');
    foreach ($movies as $idx => $movie):
        $prev = ($idx - 1 >= 0) ? $movies[$idx - 1]['id'] : $movie['id'];
        $next = ($idx + 1 < count($movies)) ? $movies[$idx + 1]['id'] : $movie['id'];
    ?>
        <div class="movie">
            <div style="width: 10%;">
                <img src="./images/<?= $movie['poster']; ?>" style="width: 60px;height:80px;">
            </div>
            <div style="width: 10%;">
                分級：<img src="./icon/03C0<?= $movie['level']; ?>.png" style="width: 20px;">
            </div>
            <div style="width: 80%;">
                <div class="mm">
                    <div class="m33">片名：<?= $movie['name']; ?></div>
                    <div class="m33">片長：<?= $movie['length']; ?></div>
                    <div class="m33">上映時間：<?= $movie['ondate']; ?></div>
                </div>
                <div style="text-align: right;">
                    <button class="show-btn" data-id="<?= $movie['sh'] == 1 ?>"><?= ($movie['sh'] == 1) ? '顯示' : '隱藏'; ?></button>
                    <button class="sw-btn" data-sw='<?= $prev; ?>' data-id="<?= $movie['id']; ?>">往上</button>
                    <button class="sw-btn" data-sw='<?= $next; ?>' data-id="<?= $movie['id']; ?>">往下</button>
                    <button onclick="location.href='do=edit_movie&id=<?=$movie['id']?>'">編輯電影</button>
                    <button class="del-btn" data-id="<?=$movie['id']?>">刪除電影</button>
                </div>
                <div>劇情介紹:<?= $movie['intro']; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    $(".show-btn").on("click", function() {
        let id = $(this).data("id");
        $.post("api/show_movie.php", {
            id
        }, () => {
            switch ($(this).text()) {
                case '顯示':
                    $(this).text('隱藏');
                    break;
                case '隱藏':
                    $(this).text('顯示');
                    break;
                
                }
        })
    })

    $(".sw-btn").on("click", function() {
        let id = $(this).data("id");
        let sw = $(this).data("sw");
        $.post("./api/sw.php", {
            table: 'Movie',
            id,
            sw
        }, (res) => {
            location.reload();
        })
    })

    $(".del-btn").on("click",function () { 
        let id = $(this).data("id");
        if(confirm("確定要刪除這部電影嗎?")){
            $.post("./api/del.php",{table:'Movie',id},()=>{
                location.reload();
            })
        }
     })
</script>