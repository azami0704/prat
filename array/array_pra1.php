<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td {
        border-collapse: collapse;
        border: 1px solid #000;
    }
</style>
<body>
<?php
// 二維陣列宣告
// $score = [
//             'judy'=>[
//                 '國文'=> 95,
//                 '英文'=> 64,
//                 '數學'=> 70,
//                 '地理'=> 90,
//                 '歷史'=> 84
//             ],
//             'amo'=>[
//                 '國文'=> 88,
//                 '英文'=> 78,
//                 '數學'=> 54,
//                 '地理'=> 81,
//                 '歷史'=> 71
//             ],
//             'john'=>[
//                 '國文'=> 45,
//                 '英文'=> 60,
//                 '數學'=> 68,
//                 '地理'=> 70,
//                 '歷史'=> 62
//             ],
//             'peter'=>[
//                 '國文'=> 59,
//                 '英文'=> 32,
//                 '數學'=> 77,
//                 '地理'=> 54,
//                 '歷史'=> 42
//             ],
//             'hebe'=>[
//                 '國文'=> 71,
//                 '英文'=> 62,
//                 '數學'=> 80,
//                 '地理'=> 62,
//                 '歷史'=> 64
//             ],
//         ];

// $name = 'peter';
// $course = '數學';

// print_r($score[$name][$course]);



// $score = [['','國文','英文','數學','地理','歷史'],
//           ['judy',95,64,70,90,84],
//           ['amo',88,78,54,81,71],
//           ['john',45,60,68,70,62];
//           ]

 $scores = [
    '國文'=>[
        'judy'=>95,
        'amo'=>88,
        'john'=>45,
        'peter'=>59,
        'hebe'=>71,
    ],
    '英文'=>[
        'judy'=>64,
        'amo'=>78,
        'john'=>60,
        'peter'=>32,
        'hebe'=>62,
    ],
    '數學'=>[
        'judy'=>70,
        'amo'=>54,
        'john'=>68,
        'peter'=>77,
        'hebe'=>80,
    ],
    '地理'=>[
        'judy'=>90,
        'amo'=>81,
        'john'=>70,
        'peter'=>54,
        'hebe'=>62,
    ],
    '歷史'=>[
        'judy'=>84,
        'amo'=>71,
        'john'=>62,
        'peter'=>42,
        'hebe'=>64,
    ],
];
 $title = array_keys($scores);
?>
<table>
        <?php

            // for($i=0;$i<count($score);$i ++){
            //     echo '<tr>';
            //     for($j=0;$j<count($score[$i]);$j ++){
            //         echo '<td>'.$score[$i][$j].'</td>';
            //     }
            //     echo '</tr>';
            // }
            // echo '<tr>'
            foreach($scores as $class => $students){
                echo $class;
                echo '<br>';
                foreach($students as $name => $score){
                    echo '&ensp;'.'&ensp;'.'&ensp;'.'&ensp;';
                    echo $name . '的成績為' . $score;
                    echo '<br>';
                }
            }
        ?>
 </table>
 </body>
</html>