<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆-撈資料版</title>
    <style>
        .header-bar {
            width: 500px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php
    $cal = [];
    $month = (isset($_GET['m']))?$_GET['m']:date("n");
    $year = (isset($_GET['y']))?$_GET['y']:date('n');
    $nextMonth =$month+1;
    $prevMonth =$month-1;
    ?>
    <div class="header-bar">
        <a href="?y=2022&m=<?=$prevMonth?>">上一個月</a>
        <h1><?=$month?>月份</h1>
        <a href="?y=2022&m=<?=$nextMonth?>">下一個月</a>
    </div>
</body>
</html>