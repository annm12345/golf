<?php
    require('../connection.php');
   
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_EMAIL']);
    unset($_SESSION['USER_ID']);
    header('location:login.php');
    die();
?>