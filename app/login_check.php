<?php
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../function/kintoneAPI.php';
require_once __DIR__ . '/../function/function.php';
//リダイレクト先のURLを取得
$URL_hp = getFullUrl('hp.php'); //hp.php
$URL_index = getIndexUrl(); //index.php

session_start();
$data = array();
$userName = postInit($_POST['Email']);
$passWord = postInit($_POST['Password']);

$where = 'username ="' . $userName . '"';
$data = kintone_select(KINTONE_DOMAIN, API_TOKEN_USER, APP_ID_USER, $where);

//ユーザー認証 成功した場合、セッション変数設定 & hpに遷移
if($data['records'][0]['username']['value'] == $userName && $data['records'][0]['password']['value'] == $passWord){
    // echo "ログイン成功です";  
    $_SESSION['userID'] = $data['records'][0]['record']['value'];
    header($URL_hp, true, 301);
    exit;
} else{//失敗の場合、ログイン画面に遷移
    header($URL_index . errorMessageSet('ユーザー名またはパスワードに誤りがあります。') , true, 301);
    exit;
}
