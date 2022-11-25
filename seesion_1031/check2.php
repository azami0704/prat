<?php
session_start();

$acc = 'amy';
$pw = 'zxcvbn';

$user=[
    [
        "name"=>'mack',
        "pw"=>'1234',
        "level"=>'admin'
    ],
    [
        "name"=>'john',
        "pw"=>'5678',
        "level"=>'user'
    ],
    [
        "name"=>'mary',
        "pw"=>'1111',
        "level"=>'vip'
    ],
];

$formAcc = $_POST['acc'];
$formPw = $_POST['pw'];


    foreach($user as $item){
        if($item["name"]==$_POST['acc']){
            if($item["pw"]==$_POST['pw']){
                $_SESSION['login']=$item;
                //累加登入計數
                $times=$_COOKIE['times']+1;
                setcookie('times',$times,time()+(60*60*24*360));
            }else{
                $error = '密碼錯誤';
                break;
            }
        }else{
            $error = '帳號錯誤';
            
        }
    }

// if($formAcc == $acc && $formPw == $pw){
//     $_SESSION['login']=$formAcc;
// }else {
//     $_SESSION['error']='帳號密碼錯誤';
// }
if(isset($error)){
    header("location:login2.php?error=$error");
}else {
    header("location:login2.php");
}

?>