<?php
    session_start();
    if(!isset($_SESSION['userID'])){//認証されていない場合、indexに遷移
        echo "セッションが切れた";
        header("Location: http://" . $_SERVER["HTTP_HOST"] . "/book");
        exit;
    }
?>