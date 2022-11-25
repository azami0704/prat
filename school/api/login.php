<?php
session_start();
$db = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo =new PDO($db,'root','');


$acc = $_POST['acc'];
$pw = $_POST['pw'];

$sql = "SELECT COUNT(`id`) FROM `users` WHERE `acc` = '$acc' AND `pw` = '$pw'";
$res = $pdo->query($sql)->fetchColumn();


if($res==1){
    $sql = "SELECT * FROM `users` WHERE `acc` = '$acc' AND `pw` = '$pw'";
    $user=$pdo->query($sql)->fetch();
    $_SESSION['login']=$user;
    header("location:../admin_center.php?status=login_success");
}else{
    if(isset($_SESSION['login_try'])){
        $_SESSION['login_try']++;
    }else{
        $_SESSION['login_try']=1;
    }
    header("location:../login.php");
}

?>