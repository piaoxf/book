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
    
    //ファイル保存先ディレクトリ
    $target_dir = '../var/img' . $_SESSION['userID'] . "/" .$reading_record . "/";
    $error_message = array();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        if(!file_exists($target_dir)){ //dirが存在しない場合、dirを作成
            mkdir($target_dir, 0777, true);     
        }
        $target_file = $target_dir . uniqid() . basename($uploadedFile["name"]); //保存先ファイルpath
        $uploadOk = 1; //アップロードflg
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //拡張子

        // ファイルが実際にアップロードされたかを確認
        if (isset($uploadedFile)) {
            // 類似のファイルが存在するかを確認
            if (file_exists($target_file)) {
                $error_message[] = "ファイルがすでに存在します。";
                $uploadOk = 0;
            }
    
            // ファイルサイズ制限を設定 (ここでは10MB以下)
            if ($uploadedFile["size"] > 10000000) {
                $error_message[] = "ファイルサイズが大きすぎます。";
                $uploadOk = 0;
            }
    
            // 特定のファイル形式のみを許可 (ここでは画像のみ)
            if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])){
                $error_message[] = "対応していないファイル形式です。";
                $uploadOk = 0;
            }
    
            // $uploadOkが0でなければファイルをアップロード
            if ($uploadOk == 0) {

            } else {
                if (move_uploaded_file($uploadedFile["tmp_name"], $target_file)) {
                    
                } else {
                    $error_message[] = "ファイルのアップロード中にエラーが発生しました。";
                }
            }
            
        }

        $file = [
            'name' => $uploadedFile["name"],
            'url'  => $target_file,
            'error'=> $error_message,
        ];

        return $file;
    }
}