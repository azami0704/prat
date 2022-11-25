<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>COOKIE</h1>
    <?php
    setcookie('age',36,time()+120);

    echo $_COOKIE['age'];
    ?>
</body>
</html>