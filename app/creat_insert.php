<?php
    require_once __DIR__ . '/../common/session_check.php';
    require_once __DIR__ . '/../common/const.php';
    require_once __DIR__ . '/../part/source.php';
    require_once __DIR__ . '/../part/navi.php';
    require_once __DIR__ . '/../part/header.php';
    require_once __DIR__ . '/../function/kintoneAPI.php';
    require_once __DIR__ . '/../function/function.php';

//データ加工
$record = postInit($_POST['record']);
$bookName = postInit($_POST['BookName']);
$author = postInit($_POST['author']);
$bookType = postInit($_POST['bookType']);
$comment = postInit($_POST['coment']);
$file = postInit($_POST['link']);

//リダイレクト先のURLを取得
$fullURL = getFullUrl('hp.php');

// header("Location: " . $fullURL, true, 302);
if($record == ''){
    //insert
        $data = [
            'app' => APP_ID_READING,
            'record' => [
                '書籍名' => array('value' => $_POST['BookName']),
                '作者' => array('value' => $_POST['author']),
                '感想' => array('value' => $_POST['coment']),
                'タイプ' => array('value' => $_POST['bookType']),
            ],
        ];
        $rtn = kintone_insert_multi(KINTONE_DOMAIN, API_TOKEN_READING, $data);
        
        header("Location: " . $fullURL);
        exit;
} else {
    //upsert
    $data = [
        'app' => APP_ID_READING,
        'id'  => $record,
        'record' => [
            '書籍名' => array('value' => $bookName),
            '作者' => array('value' => $author),
            '感想' => array('value' => $comment),
            'タイプ' => array('value' => $bookType),
        ],
    ];
    
    $rtn = kintone_update(KINTONE_DOMAIN, API_TOKEN_READING, $data);
    
    header("Location: " . $fullURL);
    exit;
}
