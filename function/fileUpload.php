<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $target_dir = "uploads/";  // アップロードされたファイルの保存先ディレクトリ
    $target_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ファイルが実際にアップロードされたかを確認
    if (isset($_FILES["uploaded_file"])) {
        // 類似のファイルが存在するかを確認
        if (file_exists($target_file)) {
            echo "ファイルがすでに存在します。";
            $uploadOk = 0;
        }

        // ファイルサイズ制限を設定 (ここでは10MB以下)
        if ($_FILES["uploaded_file"]["size"] > 10000000) {
            echo "ファイルサイズが大きすぎます。";
            $uploadOk = 0;
        }

        // 特定のファイル形式のみを許可 (ここでは画像のみ)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "対応していないファイル形式です。";
            $uploadOk = 0;
        }

        // $uploadOkが0でなければファイルをアップロード
        if ($uploadOk == 0) {
            echo "ファイルはアップロードされませんでした。";
        } else {
            if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
                echo "ファイルがアップロードされました。";
            } else {
                echo "ファイルのアップロード中にエラーが発生しました。";
            }
        }
    }
}