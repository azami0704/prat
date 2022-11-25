<?php
    $db = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($db, 'root', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>移除學生</title>
</head>
<body>
    <div class="container info">
    <h1>移除學生</h1>
    <h3>您要刪除的資料如下</h3>
    <?php
        if(isset($_GET['id'])){
            $sql ="SELECT * FROM `students` WHERE `id`='{$_GET['id']}'";
            $student = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        }else{
            header("location:index.php?status=del_fail");
        }
    ?>
    <form action="./api/del_student.php" method="post" class="info-table">
     <table>
            <tr>
                <input type="hidden" name="id" value=<?=$_GET['id']?>>
                <!-- school_num -->
                <td>學號：</td>
                <td style="font-weight:700;"><?=$student['school_num']?></td>
            </tr>
            <tr>
                <!-- name -->
                <td>姓名：</td>
                <td><?=$student['name']?></td>
            </tr>
            <tr>
                <!-- birthday -->
                <td>生日：</td>
                <td><?=$student['birthday']?></td>
            </tr>
            <tr>
                <!-- uni_id -->
                <td>證號：</td>
                <td><?=$student['uni_id']?></td>
            </tr>
            <tr>
                <!-- addr -->
                <td>地址：</td>
                <td><?=$student['addr']?></td>
            </tr>
            <tr>
                <!-- parents -->
                <td>家長姓名：</td>
                <td><?=$student['parents']?></td>
            </tr>
            <tr>
                <!-- tel -->
                <td>電話：</td>
                <td><?=$student['tel']?></td>
            </tr>
            <tr>
                <!-- dept -->
                <td>科別：</td>
                <td>
                    <?php
                        // $dept = "SELECT `name` FROM `dept` WHERE `id`='{$student['dept']}'";
                        $dept = $pdo->query("SELECT `name` FROM `dept` WHERE `id`={$student['dept']}")->fetch(PDO::FETCH_ASSOC);
                        ?>
                    <?=$dept['name']?>
                </td>
            </tr>
            <tr>
                <!-- graduate_at -->
                <td>畢業國中</td>
                <td>
                        <?php
                        $sqlGraduate = $pdo->query("SELECT CONCAT(`county`,`name`) AS 'school_name' FROM `graduate_school` WHERE `id`={$student['graduate_at']}")->fetch(PDO::FETCH_ASSOC);
                        ?>
                    <?=$sqlGraduate['school_name']?>
                </td>
            </tr>
            <tr>
                <!-- status_code -->
                <td>畢業狀態</td>
                <td>
                        <?php
                        $sqlStatus = $pdo->query("SELECT * FROM `status` WHERE `code`={$student['status_code']}")->fetch(PDO::FETCH_ASSOC);
                        ?>
                    <?=$sqlStatus['status']?>
                </td>
            </tr>
            <tr>
                <!-- classes.code -->
                <td>班級</td>
                <td>
                    <?php
                        $stu_class = $pdo->query("SELECT * FROM `class_student` WHERE `school_num`={$student['school_num']}")->fetch(PDO::FETCH_ASSOC);
                        $class_name = $pdo->query("SELECT * FROM `classes` WHERE `code` = {$stu_class['class_code']}")->fetch(PDO::FETCH_ASSOC);
                        ?>
                    <?=$class_name['name']?>
                </td>
            </tr>
        </table>
        <div class="btn-box">
        <h3>確認刪除?</h3>
        <button type="submit" class="btn del-form">確定</button>
        <a href="./admin_center.php" class="btn cancel">取消</a>
    </div>
    </form>
    <a href="./admin_center.php" class="back-btn">回首頁</a>
    </div>
</body>
</html>