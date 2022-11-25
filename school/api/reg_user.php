<?php
$db = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo =new PDO($db,'root','');

$acc = trim($_POST['acc']);
$pw = trim($_POST['pw']);
$email = trim($_POST['email']);
$name = trim($_POST['name']);
$last_login=null;

$sql = "INSERT INTO `users`( `acc`, `pw`, `email`, `last_login`,`name`) VALUES ('$acc','$pw','$email','$last_login','$name')";
echo 'acc'.$acc;
echo 'pw'.$pw;
echo 'email'.$email;
echo 'name'.$name;
// echo $sql;
$res = $pdo->exec($sql);
$result = $res?'reg_success':'reg_fail';
header("location:../login.php?status={$result}");
?>