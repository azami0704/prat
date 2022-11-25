<?php
$db ="mysql:host=localhost;charset=utf8;dbname=school;";
$pdo = new PDO($db,'root','');

$id = $_POST['id'];
$student = $pdo->query("SELECT * FROM `students` WHERE `id`=$id")->fetch(PDO::FETCH_ASSOC);
$sql_class ="DELETE FROM `class_student` WHERE `school_num`={$student['school_num']}";
$sql = "DELETE FROM `students` WHERE `id`='$id'";
// echo $sql;
// echo $sql_class;
$res=$pdo->exec($sql);
$res_class=$pdo->exec($sql_class);

$status =($res && $res_class)?'del_success':'del_fail';
header("location:../admin_center.php?status={$status}&school_num={$student['school_num']}&name={$student['name']}");
// echo '刪除成功'.$res;
?>