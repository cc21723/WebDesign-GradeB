<div>
    <?php 
    $movie = $Movie->find($_GET['id']);
    $ondate = explode("-",$movie['ondate']);
    ?>
    <h2 class="ct">編輯電影</h2>
    <hr>
    <form action="./api/edit_movie.php" method="post" enctype="multipart/form-data">
        <div style="display: flex;">
            <div>影片資料</div>
            <div>
                <table>
                    <tr class="ct">
                        <td>片名：</td>
                        <td><input type="text" name="name" id="name" value="<?=$movie['name'];?>"></td>
                    </tr>
                    <tr>
                        <td class="ct">分級：</td>
                        <td>
                            <select name="level" id="level">
                                <option value="1" <?=($movie['level']==1)?'select':'';?>>普遍級</option>
                                <option value="2" <?=($movie['level']==2)?'select':'';?>>輔導級</option>
                                <option value="3" <?=($movie['level']==3)?'select':'';?>>保護級</option>
                                <option value="4" <?=($movie['level']==4)?'select':'';?>>限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="ct">
                        <td>片長：</td>
                        <td><input type="text" name="length" id="length" value="<?=$movie['length'];?>"></td>
                    </tr>
                    <tr class="ct">
                        <td>上映日期</td>
                        <td>
                            <select name="year" id="year">
                                <option selected disabled>西元年</option>
                                <option value="2025" <?=($ondate[0]==2025)?'select':'';?>>2025</option>
                                <option value="2026" <?=($ondate[0]==2026)?'select':'';?>>2026</option>
                            </select>年
                            <select name="month" id="month">
                                <option selected disabled>月</option>
                                <?php
                                for($i=1;$i<=12;$i++){
                                    $selected = ($ondate[1]==$i)?'selected':'';
                                    echo "<option value='$i' $selected>$i</option>";
                                }
                                ?>
                            </select>月
                            <select name="day" id="day">
                                <option selected disabled>日</option>
                                <?php
                                $selected = ($ondate[2]==$i)?'selected':'';
                                for($i=1;$i<=31;$i++){
                                    echo "<option value='$i' $selected>$i</option>";
                                }
                                ?>日
                            </select>
                        </td>
                    </tr>
                    <tr class="ct">
                        <td>發行商:</td>
                        <td><input type="text" name="publish" id="publish" value="<?=$movie['publish'];?>"></td>
                    </tr>
                    <tr class="ct">
                        <td>導演</td>
                        <td><input type="text" name="director" id="director" value="<?=$movie['director'];?>"></td>
                    </tr>
                    <tr class="ct">
                        <td>預告影片：</td>
                        <td><input type="file" name="trailer" id="trailer" value="<?=$movie['trailer'];?>"></td>
                    </tr>
                    <tr class="ct">
                        <td>電影海報：</td>
                        <td><input type="file" name="poster" id="poster" value="<?=$movie['poster'];?>"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="display: flex;">
            <div>劇情簡介</div>
            <div>
                <textarea name="intro" id="intro" value="<?=$movie['intro'];?>"></textarea>
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </div>
    </form>
</div>