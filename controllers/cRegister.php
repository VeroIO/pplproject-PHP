<?php
    require_once '../core/config.php';
    ob_start();
    session_start();
    if ( $_GET['message'] && $_GET['type'] == "fail" ){
        header("Location:".PHP_BASE."/signup.html?message=".$_GET['message']);
    }else{
        header("Location:".PHP_BASE."/login.html?message=".$_GET['message']."&type=". $_GET['type']);
    }
?>