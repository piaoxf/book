<?php
/* ユーザーパスワード変更処理API */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

//リダイレクト先のURLを取得
$fullURL = getFullUrl('hp.php');

if(empty($_POST['password']) || empty($_POST['confrimPassword'])){
    header($fullURL, true, 301);
    exit;
}
if($_POST['password'] != $_POST['confrimPassword']){
    header($fullURL, true, 301);
    exit;
}

$body = [//updatet用データ
    'app'    => APP_ID_USER,
    'id'     => $_SESSION['userID'], //ユーザーテーブルのキー
    'record' => [
        'password' => ['value' => postInit($_POST['password'])],
    ],
];
$rtn = kintone_update(KINTONE_DOMAIN, API_TOKEN_USER, $body);

header($fullURL, true, 301);
exit;