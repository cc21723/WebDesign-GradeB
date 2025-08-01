<?php include_once "db.php"?>

<style>
    .booking-box {
        width: 540px;
        height: 370px;
        background: url("./icon/03D04.png") no-repeat center;
        margin: 0 auto;
    }

    .info-box {
        background: #fff;
        width: 540px;
        margin: 10px auto;
        padding: 5px 70px;
        box-sizing: border-box;
    }

    #seats {
        display: flex;
        flex-wrap: wrap;
        width: 320px;
        height: 344px;
        margin: 0 auto;
        padding-top: 18px;
    }

    .seat {
        width: 64px;
        height: 86px;
        box-sizing: border-box;
        text-align: center;
        padding: 2px;
        position: relative;
    }

    .seat input[type="checkbox"] {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }
    .booked{
        background: url("./icon/03D03.png") no-repeat center;
    }
    .null{
        background: url("./icon/03D02.png") no-repeat center;
    }
</style>
<div class="booking-box">
    <div id="seats">
        <?php
        for ($i = 0; $i < 20; $i++):

            $booked = 'null';
        ?>
            <div class="seat <?=$booked;?>">
                <div><?= floor($i / 5) + 1; ?>排<?= floor($i % 5) + 1; ?>號</div>
                <input type="checkbox" name="seat" value="<?= $i; ?>">
            </div>
        <?php
        endfor;
        ?>
    </div>
</div>


<div class="info-box">
    <div class="order-info">
        <div>您選擇的電影是：<?=$Movie->find($_GET['id'])['name'];?></div>
        <div>您選擇的時刻是：<?=$_GET['date'];?> <?=$_GET['session'];?></div>
        <div>您以勾選<span id="tickets">0</span>張票，最多可以購買四張票</div>
    </div>

    <div class="ct">
        <button class="btn-prev">上一步</button>
        <button class="btn-order" >訂購</button>
    </div>
</div>

<script>
    let selectedSeats = [];
    $(".seat input[type='checkbox']").on("change",function () { 
        console.log($(this).prop("checked"),$(this).val());
        
        if($(this).prop("checked")){
            //點完的當下是否小於4
            if(selectedSeats.length<4){
                selectedSeats.push($(this).val());
                $(this).parent().removeClass("null").addClass("booked");
            }else{
                alert("最多只能選擇四張票");
                $(this).prop("checked",false);
            }
        }else{
            //selectedSeats.indexOf($(this).val()) 找出第幾個
            selectedSeats.splice(selectedSeats.indexOf($(this).val()),1);
            $(this).parent().removeClass("booked").addClass("null");
        }
        console.log(selectedSeats);
        //顯示勾選幾張票
        $("#tickets").text(selectedSeats.length);
     })

     $('.btn-order').on("click",function () { 
        $.post("./api/booking.php",{
            //帶過去api的資料
            movie:"<?=$Movie->find($_GET['id'])['name'];?>",
            date:"<?=$_GET['date'];?>",
            session:"<?=$_GET['session'];?>",
            seats:selectedSeats
        },(no)=>{
            // (no) 拿回傳值
            console.log(no);
            location.href=`?do=result&no=${no}`;
        })
      })
</script>