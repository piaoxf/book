<?php
    require_once __DIR__ . '/../const.php';
    require_once __DIR__ . '/../part/source.php';
    require_once __DIR__ . '/../part/navi.php';
    require_once __DIR__ . '/../part/header.php';
    require_once __DIR__ . '/../function/kintoneAPI.php';

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
    // var_dump($data);exit;
    $rtn = kintone_insert_multi(KINTONE_DOMAIN, API_TOKEN_READING, $data);
    var_dump($rtn);exit;



    header("http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['PHP_SELF']) . "/hp.php");
    exit;
