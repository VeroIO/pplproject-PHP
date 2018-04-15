<?php
    require_once '../core/config.php';
    ob_start();
    session_start();
    if ( $_GET['message'] ){
        header("Location:".PHP_BASE."/dangnhap.html?message=".$_GET['message']);
    }else{
        $token = $_GET['token'];
        $_SESSION["jwt"] = $token;
        header("Location:".PHP_BASE."/index.html".$_GET['message']);
    }
?>