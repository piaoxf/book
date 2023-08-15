<?php
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../function/kintoneAPI.php';
require_once __DIR__ . '/../function/function.php';
//リダイレクト先のURLを取得
// $fullURL = getFullUrl(); //index.php

session_start();
$data = array();
$userName = postInit($_POST['Email']);
$passWord = postInit($_POST['Password']);

$where = 'username ="' . $userName . '"';
$data = kintone_select(KINTONE_DOMAIN, API_TOKEN_USER, APP_ID_USER, $where);

//ユーザー認証 成功した場合セッション開始、かつセッション変数設定
if($data['records'][0]['username']['value'] == $userName && $data['records'][0]['password']['value'] == $passWord){
    echo "ログイン成功です";  
    $_SESSION['userID'] = $data['records'][0]['record']['value'];
    require __DIR__ . '/hp.php';
    // require('hp.php');
    // exit;
} else{
    echo "ユーザー名またはパスワードが間違っています。";
    header("Location: http://" . $_SERVER["HTTP_HOST"] . "/book");
    exit;
}
