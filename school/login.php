<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>教師登入</title>
</head>
<body>
    <div class="container info">
    <h1>教師登入</h1>
    <?php
    session_start();
    date_default_timezone_set("Asia/Taipei");
    $disable='';
    $lockTime='5 minutes';
    if(isset($_SESSION['login_try'])){
        //如果還沒設最後錯誤時間
        if(!isset($_SESSION['last_try_time'])){
            //錯誤超過三次,隱藏登入欄並設定最後登入時間SESSION及顯示預計解鎖時間
            if($_SESSION['login_try']>3){
                $disable = 'style=display:none;';
                $date = strtotime("+{$lockTime}");
                $_SESSION['last_try_time']=$date;
                echo "登入錯誤超過三次，請於".date('Y-m-d H:i:s',$date)."後再嘗試登入";
                echo "<br>";
            }else{
            //未超過三次，繼續讓用戶try   
                echo "帳號或密碼錯誤";
                echo "登入錯誤".$_SESSION['login_try']."次，超過三次將鎖定5分鐘";
            }
        }else if($_SESSION['last_try_time']<strtotime('now')){
            //鎖定時間已過，清除記錄相關SESSION
            unset($_SESSION['login_try']);
            unset($_SESSION['last_try_time']);
        }else{
            //鎖定時間還沒過，繼續鎖定並顯示預計解鎖時間
            $disable = 'style=display:none;';
            $date=$_SESSION['last_try_time'];
            echo "登入錯誤超過三次，請於".date('Y-m-d H:i:s',$date)."後再嘗試登入";
            echo "<br>";
        }
    }
    ?>
    <form action="./api/login.php" method="post" class="info-table" <?=$disable?>>
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" required></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" required></td>
            </tr>
        </table>
        <div class="btn-box">
            <input type="submit" value="登入" class="btn del-form">
            <input type="reset" value="重填" class="btn cancel">
        </div>
    </form>
    <a href="./index.php" class="back-btn">回首頁</a>
    </div>
</body>
</html>