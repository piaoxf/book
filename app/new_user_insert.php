<?php
/* ユーザーパスワード変更処理API */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

//リダイレクト先のURLを取得
$fullURL = getFullUrl('index.php');

if(empty($_POST['email']) || empty($_POST['password'])){
    header($fullURL, true, 301);
    exit;
}
//データ取得
$datas = array(); //kintoneから取得してデータを格納
$datas = kintone_select(KINTONE_DOMAIN, API_TOKEN_USER, APP_ID_USER);

if(in_array($_POST['email'], $datas['records'])){ //既にemailが存在する場合、以降処理は中止
    header(getIndexUrl() .  errorMessageSet('Emailアドレスが既に存在しています。'), true, 301);
    exit;
}

$body = [//insert用データ
    'app'    => APP_ID_USER,
    'record' => [
        'username'       => ['value' => postInit($_POST['email'])],
        'password'       => ['value' => postInit($_POST['password'])],
        'nickname'       => ['value' => postInit($_POST['nickname'])],
        'Postcode'       => ['value' => postInit($_POST['zip'])],
        'Country'        => ['value' => postInit($_POST['Country'])],
        'State'          => ['value' => postInit($_POST['state'])],
        'City'           => ['value' => postInit($_POST['city'])],
        'Adress'         => ['value' => postInit($_POST['address'])],
        'Adress2'        => ['value' => postInit($_POST['address2'])],
        'FirstName'      => ['value' => postInit($_POST['firstname'])],
        'GivenName'      => ['value' => postInit($_POST['givenname'])],
    ],
];
$rtn = kintone_insert(KINTONE_DOMAIN, API_TOKEN_USER, $body);

header(getIndexUrl() .  errorMessageSet('正常にユーザー登録ができました。ログインしてください。'), true, 301);
exit;