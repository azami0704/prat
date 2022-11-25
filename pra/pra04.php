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
for($i = 1; $i < 6; $i ++){
    for($j = 0; $j < $i; $j ++){
        echo '*';
    }
    echo '<br>';
}
echo '<br>';
for($i = 5; $i >= 0; $i --){
    for($j = 0; $j < $i; $j ++){
        echo '*';
    }
    echo '<br>';
}
echo '<br>';
for($i = 0; $i < 5; $i ++){
    for($j = 4; $j > $i; $j --){
        echo '&ensp;';
    }
    for($k = 0; $k < ($i * 2 + 1); $k ++){
        echo '*';
    }
    echo '<br>';
}
echo '<br>';
for($i = 0; $i < 5; $i ++){
    for($j = 4; $j > $i; $j --){
        echo '&ensp;';
    }
    for($k = 0; $k < ($i * 2 + 1); $k ++){
        echo '*';
    }
    echo '<br>';
}
for($i = 1; $i <=4; $i ++){
    for($j = 1; $j <= $i; $j ++){
        echo '&ensp;';
    }
    for($k = 1; $k <= ((5-$i) * 2 - 1); $k ++){
        echo '*';
    }
    echo '<br>';
}

$scale = 9;
$scale = ($scale % 2 ==0)?$scale + 1:$scale;
$mid = ($scale - 1) / 2;
for($i = 0; $i < $scale; $i ++){
    if($i <= $mid){
        $spaces = $mid -$i;
        $stars = ($i * 2) + 1;

    }else{
        $spaces = $i - $mid;
        $stars = ($mid -$spaces) *2 +1;
    }

    for($j = 0; $j < $spaces ; $j ++){
        echo '&ensp;';
    }
    for($k = 0; $k < $stars; $k ++){
        echo '*';
    }

    echo '<br>';
}
echo 'test';
?>
</body>
</html>