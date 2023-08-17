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
/**
 * fileアップロード処理
 * 
 * @param object $uploadedFile uploadされたファイルのname属性
 * 
 * @return boolean 「true」：成功 「false」：失敗
 */
function fileUpload($uploadedFile){

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $target_dir = "/files/";  // アップロードされたファイルの保存先ディレクトリ
        // var_dump(__DIR__);exit;
        // var_dump($target_dir);exit;
        // $target_file = $target_dir . basename($_FILES[$uploadedFile]["name"]);
        $target_file = $target_dir . 'a.png';
        // var_dump($target_file);exit;
        // var_dump($_FILES[$uploadedFile]["name"], $_FILES[$uploadedFile]["tmp_name"]);exit;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // var_dump($imageFileType);exit;
        // var_dump(move_uploaded_file($_FILES[$uploadedFile]["tmp_name"], $target_file));exit;
        move_uploaded_file($_FILES[$uploadedFile]["tmp_name"], $target_file);
        var_dump($_FILES[$uploadedFile]["error"]);exit;
        // ファイルが実際にアップロードされたかを確認
        // if (isset($_FILES[$uploadedFile])) {
        //     // 類似のファイルが存在するかを確認
        //     if (file_exists($target_file)) {
        //         echo "ファイルがすでに存在します。";
        //         $uploadOk = 0;
        //     }
    
        //     // ファイルサイズ制限を設定 (ここでは10MB以下)
        //     if ($_FILES[$uploadedFile]["size"] > 10000000) {
        //         echo "ファイルサイズが大きすぎます。";
        //         $uploadOk = 0;
        //     }
    
        //     // 特定のファイル形式のみを許可 (ここでは画像のみ)
        //     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        //         && $imageFileType != "gif") {
        //         echo "対応していないファイル形式です。";
        //         $uploadOk = 0;
        //     }
    
            // $uploadOkが0でなければファイルをアップロード
            if ($uploadOk == 0) {
                echo "ファイルはアップロードされませんでした。";
            } else {
                if (move_uploaded_file($_FILES[$uploadedFile]["tmp_name"], $target_file)) {
                    echo "ファイルがアップロードされました。";
                } else {
                    echo "ファイルのアップロード中にエラーが発生しました。";
                }
            }
        // }
    }
}