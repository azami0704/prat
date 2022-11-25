<?php
session_start();

unset($_SESSION['login']);
// unset($_SESSION['error']);
header('location:login2.php');

?>