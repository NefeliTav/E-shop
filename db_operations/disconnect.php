<?php
    session_start();
    require_once './connect.php';
    session_destroy();
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
?>