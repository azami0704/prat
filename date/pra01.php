<h1>計算時間間隔</h1>
<p>註:從開始日的0:0:0開始算到結尾日的晚上23:59:59</p>

<form action="./pra01.php" method="get">
    <label for="startTime">起始日
        <input type="date" name="startTime"></label>
    <label for="endTime">結束日<input type="date" name="endTime"></label>
    <input type="submit" value="查詢" name="send">
</form>
<br>
<?php
if (isset($_GET["send"])) {
    $day1 = $_GET["startTime"];
    $day2 = $_GET["endTime"];
    $day1_UNIX = strtotime($day1);
    $day2_UNIX = strtotime($day2);
    if ($day1 <= 0 || $day2 <= 0) {
        echo '日期資料不完整,請確認';
    } else if ($day1_UNIX > $day2_UNIX) {
        echo '起始日需早於結束日';
    } else {
        $result =  (($day2_UNIX - $day1_UNIX) / 3600) / 24;
        $result_plus =  ((($day2_UNIX - $day1_UNIX) / 3600) / 24) + 1;
        $result_minus =  ((($day2_UNIX - $day1_UNIX) / 3600) / 24) - 1;
    }
}

?>
<div>包含起始日:<?= $result_plus ?>天</div>
<div>不包含起始日:<?= $result ?>天</div>
<div>不包含起始日及結束日:<?= $result_minus ?>天</div>