<?php
//用戶瀏覽計數
if(!isset($_COOKIE['times'])){
    //如果沒有times的cookie就設定cookie
    setcookie('times',0,time()+(60*60*24*360));
}else{
    //如果有,就把目前的設定加入cookie並加長時間
    $times = $_COOKIE['times'];
    setcookie('times',$times,time()+(60*60*24*360));
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
            background-color: <?=$color;?>;
        }
    </style>
</head>
<body>
    <h1>會員登入-使用SESSION</h1>
    <?php
    session_start();
    if(!isset($_SESSION['login'])){
       if(isset($_GET['error'])){
        echo '<p style="color:red;">';
        echo $_GET['error'];
        echo '</p>';
       }
    ?>

    <form action="./check2.php" method="post">
        <label for="">帳號:<input type="text" name="acc" id=""></label>
        <br>
        <label for="">密碼:<input type="text" name="pw" id=""></label>
        <br>
        <input type="submit" value="登入">
    </form>
<?php
    }else{
        echo $_SESSION['login']['name'];
        echo '，登入成功!';
        echo '您的等級為';
        echo $_SESSION['login']['level'].'<br>';
        echo '這是你第';
        echo $_COOKIE['times'].'次回來';
        ?>   
        <a href="./center.php">會員中心</a>
        <a href="./logout.php">登出</a>
 <?php       
    }
    ?>

</body>
</html>