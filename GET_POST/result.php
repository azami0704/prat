<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI計算結果</title>
</head>
<body>
<?php
if(!empty($_GET)){
    $h = $_GET['height'];
    $w = $_GET['weight'];
}else if(!empty($_POST)){
    $h = $_POST['height'];
    $w = $_POST['weight'];
}else {
    echo '資料有誤請回表單重新輸入';
    echo '<a href="bmi.php">回表單</a>';
    exit();
}

if(is_numeric($w) && is_numeric($h) && $w > 0 && $h > 0){
    $bmi = round($w/($h/100)**2,1);
    if($bmi <= 0){
        $range = '資料有誤,請再確認!';
    }else if($bmi<18.5){
        $range ='過輕';
    }else if($bmi<24){
        $range ='正常';
    }else if($bmi<27){
        $range ='過重';
    }else if($bmi<30){
        $range ='輕度肥胖';
    }else if($bmi<35){
        $range ='中度肥胖';
    }else{
        $range ='重度肥胖';
    }
    ?>
        <p>您的BMI計算結果為:<?=$bmi?></p>
        <p>您的體位判定為:<?=$range?></p>
<?php
}else{
    echo '資料有誤請回表單重新輸入';
    echo '<a href="bmi.php">回表單</a>';
    exit();
}
?>


</body>
</html>

