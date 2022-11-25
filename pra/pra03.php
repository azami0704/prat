<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表練習</title>
</head>
<style>
    td {
        padding: 4px 8px;
    }
    .border-1 {
        border: 1px solid 1px;
    }
</style>
<body>
<h1>練習1</h1>
<?php
// $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// $arr2 = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// foreach($arr as $val){
//     foreach($arr2 as $val2){
//         echo $val2 . 'x' . $val . '=' . ($val * $val2) . ' '; 
//     }
//     echo '<br>';
// }
echo '<table border="1">';
for($i = 1 ; $i < 10; $i ++){
    echo '<tr>';
    for($j = 1;$j < 10; $j ++){
        echo '<td>';
        echo $j . 'x' .$i . '=' . ($j * $i) . ' ';
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo '<br>';
echo '<table border="1" style="border-collapse: collapse; text-align: center;">';
// echo '<tr style="background-color: yellow;">';
// echo '<td>';
// echo ' ';
// echo '</td>';
// for($k = 1; $k < 10 ; $k ++){
//     echo '<td>';
//     echo $k;
//     echo '</td>';
// }
// echo '</tr>';

for($i = 0 ; $i < 10; $i ++){
    echo '<tr>';
    for($j = 0;$j < 10; $j ++){
        if($i == 0 && $j ==0){
            echo '<td style="background-color: yellow;"></td>';
        }else if($j == 0){
            echo '<td style="background-color: yellow;">';
            echo $i;
            echo '</td>';
        }else if($i == 0){
            echo '<td style="background-color: yellow;">';
            echo $j;
            echo '</td>';
        }else if($j < $i){
            echo '<td>';
            echo  '&ensp;';
            echo '</td>';
        }else if($j == $i){
            echo '<td>';
            echo  $j * $i;
            echo '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>'
?>
</body>
</html>



