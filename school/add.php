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
    <title>新增學生</title>
</head>

<body>
    <div class="container info">
    <h1>新增學生</h1>
    <form action="./api/add_student.php" method="post" class="info-table">
        <table>
            <tr>
                <!-- school_num -->
                <td>學號：</td>
                <?php
                $sql = "SELECT max(`school_num`) FROM `students`";
                $max =$pdo->query($sql)->fetchColumn();
                $rows=$pdo->query($sql)->fetchAll();
                $row=$pdo->query($sql)->fetch(); 
                ?>
                <td><input type="text" name="school_num" value="<?=$max+1?>"></td>
            </tr>
            <tr>
                <!-- name -->
                <td>姓名：</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <!-- birthday -->
                <td>生日：</td>
                <td><input type="date" name="birthday"></td>
            </tr>
            <tr>
                <!-- uni_id -->
                <td>證號：</td>
                <td><input type="text" name="uni_id"></td>
            </tr>
            <tr>
                <!-- addr -->
                <td>地址：</td>
                <td><input type="text" name="addr"></td>
            </tr>
            <tr>
                <!-- parents -->
                <td>家長姓名：</td>
                <td><input type="text" name="parents"></td>
            </tr>
            <tr>
                <!-- tel -->
                <td>電話：</td>
                <td><input type="text" name="tel"></td>
            </tr>
            <tr>
                <!-- dept -->
                <td>科別：</td>
                <td>
                    <select name="dept">
                        <?php
                        $sql = "SELECT `id`,`name` FROM `dept` WHERE 1";
                        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) {
                            echo "<option value={$row['id']}>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <!-- graduate_at -->
                <td>畢業國中</td>
                <td>
                    <select name="graduate_at">
                        <?php
                        $sqlGraduate = "SELECT * FROM `graduate_school` WHERE 1";
                        $graduateRows = $pdo->query($sqlGraduate)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($graduateRows as $row) {
                            echo "<option value={$row['id']}>{$row['county']}{$row['name']}</option>";
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
                        $sqlStatus = "SELECT `code`, `status` FROM `status` WHERE 1";
                        $statusRows = $pdo->query($sqlStatus)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($statusRows as $row) {
                            echo "<option value={$row['code']}>{$row['status']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>班級</td>
                <td>
                    <select name="classes" id="">
                    <?php
                        $sql = "SELECT * FROM `classes`";
                        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) {
                            echo "<option value={$row['code']}>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="btn-box">
            <input type="submit" value="確認新增" class="btn del-form">
            <input type="reset" value="清除重填" class="btn cancel">
        </div>
    </form>
    <a href="./admin_center.php" class="back-btn">回首頁</a>
    </div>
</body>

</html>