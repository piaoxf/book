<?php
/* ユーザーパスワード変更処理API */

require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../function/kintoneAPI.php';
require_once __DIR__ . '/../function/function.php';

//リダイレクト先のURLを取得
$index = getFullUrl('../index.php');
$url = '../index.php';
if(empty($_POST['email']) || empty($_POST['password'])){
    header($index, true, 301);
    exit;
}
//データ取得
$datas = array(); //kintoneから取得してデータを格納
$datas = kintone_select(KINTONE_DOMAIN, API_TOKEN_USER, APP_ID_USER);

//既存のemailデータを取得
$email = array();
foreach ($datas['records'] as $key => $value) {
    $email[] = $value['username']['value'];
}

if(in_array($_POST['email'], $email)){ //既にemailが存在する場合、以降処理は中止
    header($index .  errorMessageSet('Emailアドレスが既に存在しています。'), true, 301);
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

header($index .  errorMessageSet('正常にユーザー登録ができました。ログインしてください。'), true, 301);
exit;