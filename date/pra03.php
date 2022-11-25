<h1>date函式的參數練習</h1>
<div>2021/10/05</div>
<div>10月5日 Tuesday</div>
<div>2021-10-5 12:9:5</div>
<div>2021-10-5 12:09:05</div>
<div>今天是西元2021年10月5日 上班日(或假日)</div>
<hr>
<?php

$day = strtotime("2021-10-05 12:09:05");
echo date("Y/m/d", $day) . '<br>';
echo date("m月d日 l", $day) . '<br>';
echo str_replace(':0', ':', date("Y-n-j G:i:s", $day)) . '<br>';
echo date("Y-n-j G:i:s", $day) . '<br>';

// if (date("N", $day)> 5) {
//     echo date("今天是西元Y年n月d日 假日", $day);
// } else {
//     echo date("今天是西元Y年n月d日 上班日", $day);
// }

echo (date("N",$day)>5)?date("今天是西元Y年n月d日 假日", $day):date("今天是西元Y年n月d日 上班日", $day);
echo "<br>";
?>