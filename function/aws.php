<?php
/* s3にファイルを保存 */
require '../aws/aws.phar';

use Aws\S3\S3Client;

/**
 * S3にファイルを保存する
 * 
 * @param object $file アップロードファイル 
 * @param integer $record 読書レコード番号
 * 
 * @return boolean true:成功 false:失敗
 */
function s3PutObject($file, $record){
    // AWSの認証情報を設定
    $credentials = [
        'key'    => 'AKIA526UEC2BNQ2M6YPD',
        'secret' => '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',
    ];
    
    // S3クライアントを初期化
    $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'ap-northeast-1',  // 適切なリージョンに変更
        'credentials' => $credentials,
    ]);
    // $uploadedFile = $_FILES['uploadedFile'];
    $bucketName = 'php-book-bucket';
    $fileName = 'book/' . $_SESSION['userID'] . "/" .$record . "/" . $file['name'];  // アップロードするファイルの名前
    
    try {
        // ファイルをS3にアップロード
        $result = $s3->putObject([
            'Bucket' => $bucketName,
            'Key'    => $fileName,
            'Body'   => fopen($file['tmp_name'], 'rb'),
        ]);
        
        // 成功した場合の処理
        echo "ファイルがアップロードされました。";
        return true;
    
    } catch (Exception $e) {
        // エラー時の処理
        echo "エラー: " . $e->getMessage();
        return false;
    }

}
function s3GetObject($filename, $record){
    // AWSの認証情報を設定
    $credentials = [
        'key'    => 'AKIA526UEC2BNQ2M6YPD',
        'secret' => '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',
    ];
    
    // S3クライアントを初期化
    $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'ap-northeast-1',  // 適切なリージョンに変更
        'credentials' => $credentials,
    ]);
    // $uploadedFile = $_FILES['uploadedFile'];
    $bucketName = 'php-book-bucket';
    $fileName = 'book/' . $_SESSION['userID'] . "/" .$record . "/" . $filename;  // アップロードするファイルの名前
    
    try {
        // ファイルをS3にアップロード
        $result = $s3->getObject([
            'Bucket' => $bucketName,
            'Key'    => $fileName,
        ]);
        
        // 画像データをbase64エンコード
        $imageData = base64_encode($result['Body']);
        // var_dump($imageData);exit;
        return 'data:image/jpeg;base64' . $imageData . '\'';

        // 成功した場合の処理
        // echo "ファイルがアップロードされました。";
        // return true;
    
    } catch (Exception $e) {
        // エラー時の処理
        echo "エラー: " . $e->getMessage();
        return false;
    }

}

 
 