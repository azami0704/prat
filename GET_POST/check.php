<?php
$acc = 'amy';
$pw = 'zxcvbn';

$formAcc = $_POST['acc'];
$formPw = $_POST['pw'];

if($formAcc == $acc && $formPw == $pw){
    header("location:login.php?result=success");
    // echo "帳密正確";
}else{
    header("location:login.php?result=fail");
    // echo '帳密錯誤';
}

?>