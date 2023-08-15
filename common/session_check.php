<?php
    require_once __DIR__ . '/../function/function.php';
    
    session_start();
    if(!isset($_SESSION['userID'])){//認証されていない場合、indexに遷移
        header(getIndexUrl() .  errorMessageSet('セッションが切れました。ログインしてください。'), true, 301);
        exit;
    }
