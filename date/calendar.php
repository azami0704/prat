<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP月曆</title>
    <style>
        table {
            border: 3px double blue;
        }

        td {
            border: 1px solid #ccc;
        }

        td:nth-child(6),
        td:nth-child(7) {
            background-color: pink;
        }
    </style>
</head>

<body>
    <h1>月曆</h1>
    <?php
    $day = "2022-10-24";
    //輸入用的變數
    $year=  date("Y",strtotime($day));
    // 抓出指定的年份
    $mon = date("n",strtotime($day));
    // 抓出指定的月份
    $firstDate = date("Y-m-1", strtotime($day));
    //  先抓出當月第一天
    echo date("n", strtotime($day)) . "月";
    // 標題
    $firstDateWeek = date('N', strtotime($firstDate));
    // 再抓當月第一天是星期幾
    $lastDate = date('t', strtotime($firstDate));
    $weekNum = ceil(($lastDate + ($firstDateWeek - 1)) / 7);
    //算出一個禮拜有幾週=整月天數+(1號的星期幾-1)再除7再無條件進位
    $today = strtotime('today');

    ?>
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
        for ($i = 1; $i <= $weekNum; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 7; $j++) {
                // 算式太長用變數簡化
                $date = ($i - 1) * 7 + $j - ($firstDateWeek - 1);
                if ($i == 1 && $j < $firstDateWeek || $date > $lastDate) {
                    echo "<td>&nbsp;</td>";
                } else if (floor(strtotime('today')/86400) == floor(strtotime($year.'-'. $mon .'-'.$date)/86400)) {
                    // 將日期轉為秒數比對
                    echo '<td style="color:green; font-weight:700; background-color:yellow;">';
                    echo $date;
                    echo "</td>";
                } else if ($date <= $lastDate) {
                    echo "<td>";
                    echo $date;
                    echo "</td>";
                }
            }
            echo "</tr>";
        }



        ?>
    </table>
</body>

</html>