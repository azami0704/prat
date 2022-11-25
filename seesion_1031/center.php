<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['error']='非法登入，請輸入帳號密碼';
    header('location:login2.php');
}


switch($_SESSION['login']['level']){
    case "admin":
        $color="#00F";
    break;
    case "user":
        $color="#0F0";
    break;
    case "vip":
        $color="pink";
    break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?=$color?>;
        }
    </style>
</head>
<body>
    
</body>
</html>

<h1><?=$_SESSION['login']['name']?>，午安!</h1>
<a href="./logout.php">登出</a>