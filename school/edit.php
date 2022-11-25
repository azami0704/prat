<?php
$db = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo =new PDO($db,'root','');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>編輯學生</title>
</head>
<body>
    <div class="container info">
    <h1>編輯學生</h1>
    <?php
    if(isset($_GET['id'])){
        $sql ="SELECT * FROM `students` WHERE `id`='{$_GET['id']}'";
        $student = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }else{
        header("location:index.php?status=edit_fail");
    }
    ?>
    <form action="./api/edit_student.php" method="post" class="info-table">
        <table>
            <tr>
                <!-- 給修改頁吃的id -->
                <input type="hidden" name="id" value=<?=$_GET['id']?>>
                <!-- school_num -->
                <td>學號：</td>
                <td style="font-weight:700;"><?=$student['school_num']?></td>
            </tr>
            <tr>
                <!-- name -->
                <td>姓名：</td>
                <td><input type="text" name="name" value=<?=$student['name']?>></td>
            </tr>
            <tr>
                <!-- birthday -->
                <td>生日：</td>
                <td><input type="date" name="birthday" value=<?=$student['birthday']?>></td>
            </tr>
            <tr>
                <!-- uni_id -->
                <td>證號：</td>
                <td><input type="text" name="uni_id" value=<?=$student['uni_id']?>></td>
            </tr>
            <tr>
                <!-- addr -->
                <td>地址：</td>
                <td><input type="text" name="addr" value=<?=$student['addr']?>></td>
            </tr>
            <tr>
                <!-- parents -->
                <td>家長姓名：</td>
                <td><input type="text" name="parents" value=<?=$student['parents']?>></td>
            </tr>
            <tr>
                <!-- tel -->
                <td>電話：</td>
                <td><input type="text" name="tel" value=<?=$student['tel']?>></td>
            </tr>
            <tr>
                <!-- dept -->
                <td>科別：</td>
                <td>
                    <select name="dept">
                        <?php
                        $sql = "SELECT * FROM `dept`";
                        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) {
                            $selected = ($row['id']==$student['dept'])?'selected':'';
                            echo "<option value={$row['id']} {$selected}>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <!-- graduate_at -->
                <td>畢業國中：</td>
                <td>
                    <select name="graduate_at">
                        <?php
                        $sqlGraduate = "SELECT * FROM `graduate_school`";
                        $graduateRows = $pdo->query($sqlGraduate)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($graduateRows as $row) {
                            $selected = ($row['id']==$student['graduate_at'])?'selected':'';
                            echo "<option value={$row['id']} {$selected}>{$row['county']}{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <!-- status_code -->
                <td>畢業狀態：</td>
                <td>
                    <select name="status_code">
                        <?php
                        $sqlStatus = "SELECT `code`, `status` FROM `status`";
                        $statusRows = $pdo->query($sqlStatus)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($statusRows as $row) {
                            $selected = ($row['code']==$student['status_code'])?'selected':'';
                            echo "<option value={$row['code']} {$selected}>{$row['status']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>班級</td>
                <td>
                    <select name="class_code" id="">
                    <?php
                        $stu_class = $pdo->query("SELECT * FROM `class_student` WHERE `school_num`={$student['school_num']}")->fetch(PDO::FETCH_ASSOC);
                        $sql = "SELECT * FROM `classes`";
                        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) {
                            $selected = ($row['code']==$stu_class['class_code'])?'selected':'';
                            echo "<option value={$row['code']} {$selected}>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="btn-box">
            <input type="submit" value="確認修改" class="btn del-form">
            <input type="reset" value="重新填寫" class="btn cancel">
        </div>
    </form>
    <a href="./admin_center.php" class="back-btn">回首頁</a>
    </div>
</body>
</html>