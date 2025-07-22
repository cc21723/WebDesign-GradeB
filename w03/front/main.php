<style>
    .lists{
        width: 210px;
        height: 240px;
        background: rgba(0,255,0,0.5);
        margin: auto;
    }
    .controls{
        display: flex;
        align-items: center;
    }
    .btns{
        width: 320px;
        height: 120px;
        background: rgba(0,0,255,0.5);
        margin: auto;
    }
    .left,.right{
        width: 0;
        height: 0;
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
    }
    .left{
        border-left: 0px solid black;
        border-right: 30px solid black;
    }
    .right{
        border-left: 30px solid black;
        border-right: 0px solid black;
    }
    .poster{
        text-align: center;
    }
</style>
<?php
$posters = $Poster->all(['sh'=>1]," order by `rank` ");

?>

<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <div class="lists">
                <?php
                foreach($posters as $poster):
                ?>
            </div>
            <div class="controls">
                <div class="left"></div>
                <div class="btns">

                </div>
                <div class="right"></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>