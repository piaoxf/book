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
 * urlを返却（絶対パス）
 * 
 * @param string $fileName リダイレクトするファイル名 (default:空)
 * 
 * @return string $fullURL ファイルパス
 */
function getFullUrl2($fileName=''){
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $fullURL = $protocol . '://' . $host . $path . '/' .$fileName;
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
function fileUpload($uploadedFile, $reading_record){

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // $target_dir = __DIR__ . "/../app/files/" . $reading_record . "/";  // アップロードされたファイルの保存先ディレクトリ
        $target_dir = __DIR__ . "/../../image/" . $reading_record . "/";  // アップロードされたファイルの保存先ディレクトリ
        
        if(!file_exists($target_dir)){ //dirが存在しない場合、dirを作成
            mkdir($target_dir, 0777, true);     
        }
        $target_file = $target_dir . basename($_FILES[$uploadedFile]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



        // ファイルが実際にアップロードされたかを確認
        if (isset($_FILES[$uploadedFile])) {
            // 類似のファイルが存在するかを確認
            if (file_exists($target_file)) {
                // echo "ファイルがすでに存在します。";
                $uploadOk = 0;
            }
    
            // ファイルサイズ制限を設定 (ここでは10MB以下)
            if ($_FILES[$uploadedFile]["size"] > 10000000) {
                // echo "ファイルサイズが大きすぎます。";
                $uploadOk = 0;
            }
    
            // 特定のファイル形式のみを許可 (ここでは画像のみ)
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                // echo "対応していないファイル形式です。";
                $uploadOk = 0;
            }
    
            // $uploadOkが0でなければファイルをアップロード
            if ($uploadOk == 0) {
                // echo "ファイルはアップロードされませんでした。";
            } else {
                if (move_uploaded_file($_FILES[$uploadedFile]["tmp_name"], $target_file)) {
                    // echo "ファイルがアップロードされました。";
                } else {
                    // echo "ファイルのアップロード中にエラーが発生しました。";
                }
            }
            
        }

        $file = [
            'name' => $_FILES[$uploadedFile]["name"],
            'url'  => $target_file,
        ];

        return $file;
    }
}