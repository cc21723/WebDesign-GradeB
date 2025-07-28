    <style>
        .lists {
            width: 210px;
            height: 240px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .btns {
            width: 320px;
            height: 120px;
            display: flex;
            overflow: hidden;
        }

        .left,
        .right {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;

        }

        .left {
            border-left: 0px solid black;
            border-right: 30px solid black;

        }

        .right {
            border-left: 30px solid black;
            border-right: 0px solid black;

        }

        .controls {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .poster {
            text-align: center;
            position: absolute;
            width: 210px;
            height: 240px;
            display: none;
        }

        .poster img {
            width: 200px;
            height: 220px;

        }

        .poster-btn {
            width: 80px;
            height: 100px;
            display: inline-block;
            flex-shrink: 0;
            position: relative;
        }

        .poster-btn img {
            width: 70px;
            height: 90px;
        }

        .movie-list {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            height: 320px;
            align-content: space-evenly;
        }

        .movie {
            width: 48%;
            display: flex;
            box-sizing: border-box;
            border: 1px solid #ccc;
            min-height: 100px;
            border-radius: 3px;
            padding: 3px;
            font-size: 12px;
            flex-wrap: wrap;
        }
    </style>
    <?php
    $posters = $Poster->all(['sh' => 1], " order by `rank`");
    ?>
    <div class="half" style="vertical-align:top;">
        <h1>預告片介紹</h1>
        <div class="rb tab" style="width:95%;">
            <div>
                <div class="lists">
                    <?php
                    foreach ($posters as $poster):
                    ?>
                        <div class="poster" data-ani='<?= $poster['ani']; ?>' data-id='<?= $poster['id']; ?>'>
                            <img src="./images/<?= $poster['img']; ?>">
                            <div><?= $poster['name']; ?></div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>

                <div class="controls">
                    <div class="left"></div>
                    <div class="btns">
                        <?php
                        foreach ($posters as $poster):
                        ?>
                            <div class="poster-btn" data-ani='<?= $poster['ani']; ?>' data-id="<?= $poster['id']; ?>">
                                <img src="./images/<?= $poster['img']; ?>">
                                <div><?= $poster['name']; ?></div>
                            </div>
                        <?php
                        endforeach; ?>
                    </div>
                    <div class="right"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let rank = 0;
        $(".poster").eq(rank).show();
        let slider = setInterval(() => {
            rank++;
            if (rank > $(".poster").length - 1) {
                rank = 0;
            }
            animater(rank);

            //只能輪播
            // $(".poster").hide();
            // $(".poster").eq(rank).show();
            // animater();

        }, 2000)

        //滑鼠移到縮圖區時暫停上面動畫
        $(".btns").hover(
            function() {
                clearInterval(slider);
            },
            function() {
                slider = setInterval(() => {
                    animater();
                }, 2000);
            }
        )
        $(".poster-btn").on("click", function() {
            let idx = $(this).index();
            animater(idx);
        })

        function animater(r) {
            let now = $(".poster:visible");

            if (r == undefined) {
                rank++;
                if (rank > $(".poster").length - 1) {
                    rank = 0;
                }
            } else {
                rank = r;
            };

            let next = $(".poster").eq(rank);
            let ani = $(now).data('ani');
            console.log(ani);
            switch (ani) {
                case 1:
                    //淡入淡出
                    $(now).fadeOut(1000);
                    $(next).fadeIn(1000);
                    break;
                case 2:
                    //縮放
                    $(now).hide(1000);
                    $(next).show(1000);
                    break;
                case 3:
                    //滑入滑出
                    $(now).slideUp(1000);
                    $(next).slideDown(1000);
                    break;
            }

        }

        let p = 0;
        $(".left,.right").on("click", function() {
            let arrow = $(this).attr('class');
            switch (arrow) {
                case 'left':
                    if (p > 0) {
                        p--;
                    }
                    break;
                case 'right':
                    if (p < $(".poster-btn").length - 4) {
                        p++;
                    }
                    break;
            }
            $(".poster-btn").animate({
                right: p * 80
            }, 500);
        })
    </script>


    <div class="half">
        <h1>院線片清單</h1>
        <div class="rb tab" style="width:95%;">
            <div class='movie-list'>
                <?php
                $today = date("Y-m-d");
                $ondate = date("Y-m-d", strtotime("-2 days", strtotime($today)));

                $movies = $Movie->all(['sh' => 1], " and ondate between '$ondate' and '$today' order by `rank`");
                foreach ($movies as $movie):
                ?>
                    <div class="movie">
                        <div><img src="./images/<?= $movie['poster']; ?>" style="width:60px;height:70px;border:2px solid white"></div>
                        <div>
                            <div style='font-size:14px;'><?= $movie['name']; ?></div>
                            <div>分級:
                                <img src="./icon/03C0<?= $movie['level']; ?>.png" style="width:16px;">
                                <?= $levelStr[$movie['level']]; ?>
                            </div>
                            <div>上映日期:<?= $movie['ondate']; ?></div>
                        </div>
                        <div>
                            <button>劇情簡介</button>
                            <button>線上訂票</button>
                        </div>



                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <div class="ct">1 2 3 </div>
        </div>
    </div>