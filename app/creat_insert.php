<?php
/* 読書のデータ登録及び更新処理API */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';
require_once __DIR__ . '/../function/function.php';

//データ加工
$body = array(); //kintoneにruquestする配列
$record = postInit($_POST['record']);
$crud = postInit($_POST['crud']);
var_dump($crud);exit;
$bookName = postInit($_POST['BookName']);
$author = postInit($_POST['author']);
$bookType = postInit($_POST['bookType']);
$comment = postInit($_POST['coment']);
// $file = postInit($_POST['uploadedFile']);

fileUpload('uploadedFile');
// var_dump($_FILES['uploadedFile']);exit;

//リダイレクト先のURLを取得
$fullURL = getFullUrl('hp.php');

if($crud == 'insert'){//新規追加の場合：insertモード

    $body = [//insert用データ
        'app'    => APP_ID_READING,
        'record' => [
            '書籍名'       => ['value' => $bookName],
            '作者'         => ['value' => $author],
            '感想'         => ['value' =>$comment],
            'タイプ'       => ['value' => $bookType],
            'user_record' => ['value' => $_SESSION['userID']],
        ],
    ];
    $rtn = kintone_insert(KINTONE_DOMAIN, API_TOKEN_READING, $body);

    header($fullURL, true, 301);
    exit;
} 
if($crud == 'update') {//それ以外：updateモード

    $body = [//insert用データ
        'app'    => APP_ID_READING,
        'id'     => $record, //読書テーブルのキー
        'record' => [
            '書籍名'       => ['value' => $bookName],
            '作者'         => ['value' => $author],
            '感想'         => ['value' => $comment],
            'タイプ'       => ['value' => $bookType],
            'user_record' => ['value' => $_SESSION['userID']],
        ],
    ];
    $rtn = kintone_update(KINTONE_DOMAIN, API_TOKEN_READING, $body);
    
    header($fullURL, true, 301);
    exit;
}
if($crud == 'delete'){

    $body = [//delete用データ
        'app'    => APP_ID_READING,
        'id'     => $record, //読書テーブルのキー
    ];

    $rtn = kintone_delete(KINTONE_DOMAIN, API_TOKEN_READING, $body);
    
    header($fullURL, true, 301);
    exit;
}
