<h1>利用迴圈計算連續五個週一的日期</h1>
<p>接下來的五個週一為:</p>
<?php
$day = strtotime("now");
$days = date("N",$day);
$mon = 7 - $days;
    for($i=0;$i<5;$i++){
        echo date("Y-m-d l",strtotime("+".($mon+1)+(7*$i) . "day",$day)) .'<br>';
    }

?>