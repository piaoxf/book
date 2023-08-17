<?php
/* 読書のデータ登録及び更新処理API */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';
require_once __DIR__ . '/../function/function.php';

$record = postInit($_POST['record']);
$where = 'record ="' . $record . '"'; 
$readingData = array();
$readingData = kintone_select(KINTONE_DOMAIN, API_TOKEN_READING, APP_ID_READING, $where);

//データ加工
$body = array(); //kintoneにruquestする配列
$bookName = postInit($_POST['BookName']);
$author = postInit($_POST['author']);
$bookType = postInit($_POST['bookType']);
$comment = postInit($_POST['comment']);

$file = fileUpload('uploadedFile', $record);

//リダイレクト先のURLを取得
$fullURL = getFullUrl('hp.php');

if(count($readingData['records']) == 0){//新規追加の場合：insertモード

    $body = [//insert用データ
        'app'    => APP_ID_READING,
        'record' => [
            '書籍名'       => ['value' => $bookName],
            '作者'         => ['value' => $author],
            '感想'         => ['value' =>$comment],
            'タイプ'       => ['value' => $bookType],
            'filename'    => ['value' => $file['name']],
            'fileURL'     => ['value' => $file['url']],
            'user_record' => ['value' => $_SESSION['userID']],
        ],
    ];
    $rtn = kintone_insert(KINTONE_DOMAIN, API_TOKEN_READING, $body);

    header($fullURL, true, 301);
    exit;
} else {//それ以外：updateモード

    $body = [//insert用データ
        'app'    => APP_ID_READING,
        'id'     => $record, //読書テーブルのキー
        'record' => [
            '書籍名'       => ['value' => $bookName],
            '作者'         => ['value' => $author],
            '感想'         => ['value' => $comment],
            'タイプ'       => ['value' => $bookType],
            'filename'    => ['value' => $file['name']],
            'fileURL'     => ['value' => $file['url']],
            'user_record' => ['value' => $_SESSION['userID']],
        ],
    ];
    $rtn = kintone_update(KINTONE_DOMAIN, API_TOKEN_READING, $body);

    header($fullURL, true, 301);
    exit;
}