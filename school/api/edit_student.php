<?php
$db ="mysql:host=localhost;charset=utf8;dbname=school;";
$pdo = new PDO($db,'root','');

$id = $_POST['id'];
// $school_num = $_POST['school_num'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$uni_id = $_POST['uni_id'];
$addr = $_POST['addr'];
$parents = $_POST['parents'];
$tel = $_POST['tel'];
$dept = $_POST['dept'];
$graduate_at = $_POST['graduate_at'];
$status_code = $_POST['status_code'];
$class_code = $_POST['class_code'];

$sql = "UPDATE
`students`
SET
`name` = '$name',
`birthday` = '$birthday',
`uni_id` = '$uni_id',
`addr` = '$addr',
`parents` = '$parents',
`tel` = '$tel',
`dept` = '$dept',
`graduate_at` = '$graduate_at',
`status_code` = '$status_code'
WHERE
`id` = '$id'";

$school_num = $pdo->query("SELECT * FROM `students` WHERE `id`='$id'")->fetch(PDO::FETCH_ASSOC);
//先從students資料表撈修改對象的資料
//再從該筆修改資料的學號撈class_student對應的那筆資料
//再以該筆資料去改class_student的class_code
$class=$pdo->query("SELECT * FROM `class_student` WHERE `school_num`='{$school_num['school_num']}'")->fetch(PDO::FETCH_ASSOC);


$sql_class_student = "UPDATE
`class_student`
SET
`class_code` = '$class_code'
WHERE
`id` = '{$class['id']}'";

// print_r($class);
echo $sql;
echo $sql_class_student;
$res=$pdo->exec($sql);
$res_class=$pdo->exec($sql_class_student);

if($class_code==$class['class_code']){
    ($res)?$status = 'edit_success': $status = 'edit_fail';
}else{
    ($res && $res_class)?$status = 'edit_success': $status = 'edit_fail';
}


header("location:../admin_center.php?status={$status}");
// echo '修改成功'.$res;
// echo '修改成功'.$res_class;
?>