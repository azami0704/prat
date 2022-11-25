<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $year = (isset($_GET['y'])) ? $_GET['y'] : date('Y');
    $month = (isset($_GET['m'])) ? $_GET['m'] : date('n');

    $prevMonth = $month - 1;
    $nextMonth = $month + 1;
    $prevYear = $year;
    $nextYear = $year;

    if ($nextMonth > 12) {
        $nextMonth = 1;
        $nextYear = $year + 1;
    } else if ($prevMonth < 1) {
        $prevMonth = 12;
        $prevYear = $year - 1;
    }

    $cal = [];
    $calPre = [];
    $calNext = [];
    $setDay = "$year-$month-1";
    $firstDayWeek = date('w', strtotime($setDay));
    $lastDays = date('t', strtotime($setDay));
    $monthWeek = ceil(($firstDayWeek + $lastDays) / 7);
    $modDays = $monthWeek * 7 - ($firstDayWeek + $lastDays);
    //設定上個月變數
    $setPreMonth = date('Y-m-d',strtotime('-1 month',strtotime($setDay)));
    $PreMonthLastDay = date('t',strtotime($setPreMonth));
    //設定下個月變數
    $setNextMonth = date('Y-m-d',strtotime('+1 month',strtotime($setDay)));
    $nextMonthLastDay = date('t',strtotime($setNextMonth));

    //上個月
    for ($i= 0;$i<$PreMonthLastDay;$i++){
        $calPre[] = date('Y-m-d',strtotime("+$i day", strtotime($setPreMonth)));
    }

    //這個月
    for ($i = 0; $i < $lastDays; $i++) {
        $cal[] = date('Y-m-d', strtotime("+$i day", strtotime($setDay)));
    }

    //下個月
    for($i=0;$i<$nextMonthLastDay;$i ++) {
        $calNext[]= date('Y-m-d',strtotime("+$i day",strtotime($setNextMonth)));
    }

    for($i=0;$i<$firstDayWeek;$i++){
        array_unshift($cal,$calPre[(count($calPre)-1)-$i]);
    }
    
    for($i=0;$i<$modDays;$i++){
        array_push($cal,$calNext[$i]);
    }

    print_r($cal);

    ?>


    <div class="button">
        <a href="?y=<?= $prevYear ?>&m=<?= $prevMonth ?>&EN=true">上一個月</a>
        <h1><?= $year ?></h1>
        <a href="?y=<?= $nextMonth ?>&m=<?= $nextMonth ?>&EN=true">下一個月</a>
    </div>
    <table>
        <tr>
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
        </tr>
        <?php
        foreach($cal as $i=>$days){
            if($i%7==0){
                echo '<tr>';
            }
            echo'<td>';
            echo $days;
            echo '</td>';
            if($i%7 ==6){
                echo '</tr>';
            }
        }
        ?>
    </table>










</body>

</html>