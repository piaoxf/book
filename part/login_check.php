<?php
require_once __DIR__ . '/../function/kintoneAPI.php';
if(select('username')==$_POST['Email'] && select('password')==$_POST['Password']){
    echo "ログイン成功です";
    require_once __DIR__ . '/../part/hp.php';
}
$_POST['Email'];
$_POST['Password'];

// header('Location: login.php');