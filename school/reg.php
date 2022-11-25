<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>教師註冊</title>
</head>
<body>
    <div class="container info">
    <h1>教師註冊</h1>
    <form action="./api/reg_user.php" method="post" class="info-table">
        <table class="reg-list">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" required></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" required></td>
        </tr>
        <tr>
            <td>電子信箱</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="password" name="name" required></td>
        </tr>
    </table>
        <div class="btn-box">
            <input type="submit" value="註冊" class="btn del-form">
            <input type="reset" value="重填" class="btn cancel">
        </div>
    </form>
    <a href="./index.php" class="back-btn">回首頁</a>
    </div>
</body>
</html>