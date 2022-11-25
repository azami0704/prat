<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>日期基礎函式</h1>
    <ul>
        <li><a href="./pra01.php">練習1-計算時間間隔</a></li>
        <li><a href="./pra02.php">練習2-計算自己的生日還有幾天</a></li>
        <li><a href="./pra03.php">練習3-date函式的參數練習</a></li>
        <li><a href="./pra04.php">練習4-利用迴圈計算連續五個週一的日期</a></li>
    </ul>
</body>
</html>

<?php
$tomorrow = strtotime("+1 days");
echo date("Y-m-d H:i:s");
echo '<br>';
echo date("Y-m-d H:i:s",$tomorrow);


?>


