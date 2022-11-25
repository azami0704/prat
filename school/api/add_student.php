<?php
$db ="mysql:host=localhost;charset=utf8;dbname=school;";
$pdo = new PDO($db,'root','');

$school_num = $_POST['school_num'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$uni_id = $_POST['uni_id'];
$addr = $_POST['addr'];
$parents = $_POST['parents'];
$tel = $_POST['tel'];
$dept = $_POST['dept'];
$graduate_at = $_POST['graduate_at'];
$status_code = $_POST['status_code'];
$class_code = $_POST['classes'];
$year = 2000;

$seat_num = $pdo->query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code`='$class_code'")->fetchColumn()+1;

$sql = "INSERT INTO `students`(`id`, `school_num`, `name`, `birthday`, `uni_id`, `addr`, `parents`, `tel`, `dept`, `graduate_at`, `status_code`) 
VALUES ('NULL','$school_num','$name','$birthday','$uni_id','$addr','$parents','$tel','$dept','$graduate_at','$status_code')";

$sql_class = "INSERT INTO `class_student`(`id`,`school_num`, `class_code`, `seat_num`, `year`) 
VALUES ('NULL','$school_num','$class_code','$seat_num','$year')";


$res=$pdo->exec($sql);
$res_class=$pdo->exec($sql_class);

($res && $res_class)?$status = 'add_success': $status = 'add_fail';

header("location:../admin_center.php?status={$status}");
