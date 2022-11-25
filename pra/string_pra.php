<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str = "學會PHP網頁程式設計，薪水會加倍，工作會好找";
    $target = "程式設計";
    $result = '<span style="color:red; font-weight: 700;">'.$target.'</span>';
    echo $str.'<br>';
    echo (str_replace($target,'<span style="color:red; font-weight: 700;">'.$target.'</span>',$str));
    explode($target,$str);
    echo join($result,explode($target,$str));
    $str2 = [];
    ?>
</body>
</html>