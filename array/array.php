<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>陣列宣告</h1>
<?php
$a=['1','B','三'];
$b=['Day1'=>'Mon',
    'Day2'=>'Tue',
    'Day3'=>'Wen',
    'Day4'=>'Thu',
    'Day5'=>'Fri'];

// $chk = (is_array($a))?'是陣列':'不是陣列';
// echo $chk;

if(is_array($a)){
    echo '$a是陣列';
    print_r($a);
    echo '<br>';
    echo $a[1];
    echo '<br>';
    for($i=0;$i<count($a);$i++){
        echo $a[$i];
    }
}else{
    echo '不是陣列';
}

if(is_array($b)){
    echo '$b是陣列';
    echo '<br>';
    for($i=0;$i<count($b);$i++){
        echo $b['Day'.$i+1];
    }
}else{
    echo '不是陣列';
}
echo'<br>';
$search = 'Mon';
if(in_array($search,$b)){
    echo $search . '已找到';
}else{
    echo $search . '不存在';
}
echo'<br>';

echo array_search('Wed',$b);

echo serialize($a);

$join = join('--',$b);
echo $join;
print_r(explode('--',$join));


$sco
?>
</body>
</html>