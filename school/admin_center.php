<?php
session_start();
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
    <title>後台管理中心</title>
</head>

<body>
    <div class="container">
        <?php
            if(!isset($_SESSION['login'])){
                header("location:./index.php?status=status_error");
            }
                if (isset($_GET['status'])) {
                    switch ($_GET['status']) {
                        case 'add_success':
                            echo '<p style="color:green;" class="attention">新增學生成功</p>';
                            break;
                        case 'add_fail':
                            echo '<p style="color:red;" class="attention">資料有誤，新增失敗!</p>';
                            break;
                        case 'edit_success':
                            echo '<p style="color:green;" class="attention">編輯成功</p>';
                            break;
                        case 'edit_fail':
                            echo '<p style="color:red;" class="attention">資料未儲存，請確認!</p>';
                            break;
                        case 'del_fail':
                            echo '<p style="color:red;" class="attention">刪除失敗</p>';
                            break;
                        case 'del_success':
                            $delected_num=$_GET['school_num'];
                            $delected_name=$_GET['name'];
                            echo "<p style='color:green;' class='attention'>學號:{$delected_num} {$delected_name}，資料刪除成功</p>";
                            break;
                        case 'login_success':
                        echo "<p style='color:green;' class='attention'>";
                        echo $_SESSION['login']['name'].'登入成功';
                        echo "</p>";
                        break;
                    }
                }
        ?>
        <h1>學生管理系統</h1>
        <nav>
            <a href="add.php">新增學生</a>
            <a href="./api/logout.php">教師登出</a>
        </nav>
        <nav class="nav-list">
            <ul class="class-list">
                <?php
                //班級選單
                $sql = "SELECT * FROM `classes`";
                $classes_list = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                echo "<li><a href='admin_center.php'>全部</a></li>";
                foreach ($classes_list as $classes) {
                    echo "<li><a href='?code={$classes['code']}'>{$classes['name']}</a></li>";
                }
                ?>
        </nav>
        </ul>
        <?php
        //班級篩選判斷
        if (isset($_GET['code'])) {
            $class_filter = "AND `class_student`.`class_code`='{$_GET['code']}'";
            $code = "&code={$_GET['code']}";
            $limit = '';
        } else {
            $class_filter = "";
            $code = "";
            $limit = '';
        }
        //控制一頁顯示幾筆的變數
        $rowsOfPage = 10;
        //頁數&當頁輸出資料筆數變數設定
        if (isset($_GET['page'])) {
            $pageActive = $_GET['page'];
            $pageStart = ($_GET['page'] - 1) * $rowsOfPage;
            $pageList = $_GET['page'] * $rowsOfPage;
        } else {
            $pageActive = 1;
            $pageStart = 0;
            $pageList = $rowsOfPage;
        }
        $sql = "SELECT `students`.`id` AS 'id',`students`.`school_num` AS 'school_num', `students`.`name` AS 'name',`class_student`.`class_code` AS 'class_code',`addr`, `birthday`, `uni_id`, `addr`, `parents`, `tel`, `dept`,CONCAT(`graduate_school`.`county`,`graduate_school`.`name`) AS 'graduate_school', `status_code` FROM `students`,`graduate_school`,`class_student` WHERE `students`.`graduate_at` =  `graduate_school`.`id` AND `class_student`.`school_num`= `students`.`school_num` $class_filter $limit";
        // $total = $pdo->query("SELECT COUNT(`students`.`id`) FROM `students`")->fetchColumn();
        // echo $sql;
        // 舊的寫法
        // $db=mysqli_connect('localhost','root','','school');
        // mysqli_set_charset($db,'utf8');
        // $sql="SELECT * FROM `students` LIMIT 5";
        // $result = mysqli_query($db,$sql);
        // $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        // print_r($rows);

        ?>
        <?php
        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // 計算總筆數
        $total = COUNT($rows);
        // 計算總頁數
        $pages = ceil($total / 10);
        // $now = (isset($_GET['page']))?$_GET['page']:1;
        
        //最終輸出用的陣列
        $rowsList = [];
        // 每頁輸出筆數
        for ($i = $pageStart; $i < $pageList; $i++) {
            //最後一頁不滿10筆會出錯,限制i小於陣列長度才會印
            if ($i < COUNT($rows)) {
                array_push($rowsList, $rows[$i]);
            }
        }

        ?>
        <section class="student-table">
        <table class="student-list">
            <thead>
                <tr>
                    <th>學號</th>
                    <th>姓名</th>
                    <th>生日</th>
                    <th>地址</th>
                    <th>電話</th>
                    <th>畢業國中</th>
                    <th>年齡</th>
                    <th>操作</th>
                </tr>
            </thead>
            <?php
            foreach ($rowsList as $row) {
                $age = floor((strtotime('now') - strtotime($row['birthday'])) / (60 * 60 * 24 * 365));
                echo '<tr>';
                echo "<td>{$row['school_num']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['birthday']}</td>";
                echo "<td>{$row['addr']}</td>";
                echo "<td>{$row['tel']}</td>";
                echo "<td>{$row['graduate_school']}</td>";
                echo "<td>{$age}</td>";
                echo "<td>";
                echo "<a href='edit.php?id={$row['id']}' class='btn cancel'>編輯</a>";
                echo "<a href='del.php?id={$row['id']}' class='btn del-form'>刪除</a>";
                echo "</td>";
                echo '</tr>';
            }




            ?>

        </table>
        </section>
        <?php
        echo "總筆數:{$total}，每頁{$rowsOfPage}筆，共{$pages}頁";
            // pagination輸出
            //上一頁&下一頁按鈕的變數
            $prePage = $pageActive - 1;
            $nextPage = $pageActive + 1;
            $preVisibleStatus = '';
            $nextVisibleStatus = '';
            if ($pageActive == 1) {
                $prePage = $pageActive;
                $preVisibleStatus = 'class="disable"';
            } else if ($pageActive == $pages) {
                $nextPage = $pageActive;
                $nextVisibleStatus = 'class="disable"';
            }
            //換頁輸出
            echo "<ul class='pagination'>";
            //小於10頁顯示10頁,另外pre跟next按鈕因為跳至第一頁與最後頁用的變數在判斷式內產,故移到判斷式內
            if ($pages <= 10) {
                //總頁數小於10
                echo "<li><a href='?page={$prePage}{$code}' {$preVisibleStatus}><</a></li>";
                for ($i = 1; $i <= $pages; $i++) {
                    $active = ($i == $pageActive) ? 'active' : '';
                    echo "<li><a href='?page={$i}{$code}' class='{$active}'>{$i}</a></li>";
                }
                echo "<li><a href='?page={$nextPage}{$code}' {$nextVisibleStatus}>></a></li>";
            } else {
                //總頁數大於10
                $firstPage = 1;
                $lastPage = 10;
                $pageInitial = 'style="display:none;"';
                $pageEnd = 'style="display:block;"';
                if ($pageActive > 5 && $pages - $pageActive >= 4) {
                    $firstPage = $pageActive - 5;
                    $lastPage = $pageActive + 4;
                    $pageInitial = 'style="display:block;"';
                } else if ($pageActive > 5) {
                    $firstPage = $pages - (10 - 1);
                    $lastPage = $pages;
                    $pageInitial = 'style="display:block;"';
                    $pageEnd = 'style="display:none;"';
                }
                echo "<li {$pageInitial}><a href='?page=1{$code}'><<</a></li>";
                echo "<li><a href='?page={$prePage}{$code}' {$preVisibleStatus}><</a></li>";
                for ($i = $firstPage; $i <= $lastPage; $i++) {
                    $active = ($i == $pageActive) ? 'active' : '';
                    echo "<li><a href='?page={$i}{$code}' class='{$active}'>{$i}</a></li>";
                }
                echo "<li><a href='?page={$nextPage}{$code}' {$nextVisibleStatus}>></a></li>";
                echo "<li {$pageEnd}><a href='?page={$pages}{$code}'>>></a></li>";
            }
            echo "</ul>";
        
        ?>
    </div>
</body>

</html>