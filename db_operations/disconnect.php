<?php
    session_start();
    require_once './db_operations/connect.php';
    session_destroy();
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
?>