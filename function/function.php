<?php
/* 共通関数 */

/**
 * $_POSTで送られたデータの初期化処理
 * 
 * @param string $postData 画面から転送されるデータ
 * 
 * @return string データありの場合:$postData それ以外：空
 */
function postInit($postData){
    if(isset($postData)){
        return $postData;
    } else {
        return '';
    }
}
/**
 * header()用のurlを返却
 * 
 * @param string $fileName リダイレクトするファイル名 (default:空)
 * 
 * @return string $fullURL 「Location: 」 + ファイルパス
 */
function getFullUrl($fileName=''){
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $fullURL = 'Location: ' . $protocol . '://' . $host . $path . '/' .$fileName;
    return $fullURL;
}
/**
 * header()用のurlを返却　（ログイン画面）
 * 
 * @return string $fullURL 「Location: 」 + ログイン画面ファイルパス
 */
function getIndexUrl(){
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $fullURL = 'Location: ' . $protocol . '://' . $host . '/book/';
    return $fullURL;
}
/**
 * 「error」パラメータにエラーメッセージを設定して返却
 * 
 * @param string $error_message エラーメッセージ
 * 
 * @return string $fullURL errorパラメータ
 */
function errorMessageSet($error_message){
    return '?error=' . $error_message;
}