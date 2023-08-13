<?php

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../function/kintoneAPI.php';


$data = array();
$where = 'record = 1';
$data = kintone_select(KINTONE_DOMAIN, API_TOKEN_USER,APP_ID_USER, $where);

//ユーザー認証 成功した場合セッション開始、かつセッション変数設定
if($data['records'][0]['username']['value'] == $_POST['Email'] && $data['records'][0]['password']['value'] == $_POST['Password']){
    echo "ログイン成功です";
    $_SESSION['userID'] = $data['records'][0]['record']['value'];
    require __DIR__ . '/hp.php';
    exit;
} else{
    echo "ユーザー名またはパスワードが間違っています。";
    header("Location: http://" . $_SERVER["HTTP_HOST"] . "/book");
    exit;
}
