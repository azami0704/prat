<h1>計算自己的生日</h1>

<?php
$birth = "2022-07-04";
$birth_UNIX = strtotime($birth);
$today = strtotime('now');
$diff = $today - $birth_UNIX;
$day = abs(floor($diff/86400)); //計算天數
$hour = abs(floor(($diff%86400)/3600)); //取一天的餘數再算有幾個小時
$min = abs(floor(($diff%3600)/60)); //取一小時的餘數再算有幾分鐘
$s = abs(floor($diff%60)); //取一分鐘的餘數再算有幾秒
?>
<?php
if($diff>0){
    ?>
    
<p>我的生日已經過了<?=$day?>天<?=$hour?>小時<?=$min?>分<?=$s?>秒</p>
<?php
}else{
 ?>
 <p>距離我的生日還有<?=$day?>天<?=$hour?>小時<?=$min?>分<?=$s?>秒</p>
 <?php
}
?>