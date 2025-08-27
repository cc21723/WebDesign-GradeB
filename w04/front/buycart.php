<!-- 建立購物車頁面的登入判斷 -->
<?php
if(!isset($_SESSION['login'])){
    to("?do=login");
}

?>

<!-- 建立購物車session -->
 <h2 class="ct"><?=$_SESSION['login'];?>的購物車</h2>

<?php
if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
    dd($_SESSION['cart']);
}else{
    
    echo "購物車是空的";
}    
    

?>