<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        table,td {
            margin: 0 auto;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <?php
    $cal=[];
    $month = (isset($_GET['m']))?$_GET['m']:date('n');
    $year = (isset($_GET['y']))?$_GET['y']:date('Y');
    
    // echo $month;

    if($month==13){
        $year = $year + 1;
        $month = 1;
    }else if($month==0){
        $year = $year -1;
        $month = 12;
    }
   

    


    $firstDay = $year.'-'.$month.'-1';
    $firstDayWeek = date('N',strtotime($firstDay));
    $monthDays = date('t',strtotime($firstDay));
    $lastDay = $year.'-'.$month.'-'. $monthDays;
    $spaceDays = $firstDayWeek-1;
    $week = ceil(($monthDays+$spaceDays)/7);



    for($i=0;$i<$spaceDays;$i++){
        $cal[]='';
    }
    for($i=0;$i<$monthDays;$i++){
        $cal[]=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));
    }

     
    $preMonth = $month - 1;
    $nextMonth = $month + 1;

    ?>
    <div class="title">
        <a href="?y=<?=$year?>&m=<?=$preMonth;?>">pre</a>
        <h1><?=$year;?>年<?=$month?>月</h1>
        <a href="?y=<?=$year?>&m=<?=$nextMonth;?>">next</a>
    </div>
    <a href="./calendar_arr.php">today</a>

    <table>
        <tr>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
            <td>日</td>
        </tr>
        <?php
    foreach($cal as $i =>$day){
        if($i%7==0){
            echo "<tr>";
        }
        echo "<td>".$day."</td>";

        if($i%7==6){
            echo "</td>";
        }
    }
        ?>
    </table>
</body>
</html>