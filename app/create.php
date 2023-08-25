<?php
/* 読書のデータ登録及び編集画面 */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

//パラメータチェック あり：更新モード  なし：新規モード
$record = isset($_GET['record']) ? $_GET['record'] : ''; //読書アプリのレコード番号
$crud = isset($_GET['crud']) ? $_GET['crud'] : '';

//データ取得
$where = 'record ="' . $record . '"'; //検索条件 recordパラメータが設定なしの場合、０件
$datas = array(); //kintoneから取得してデータを格納
$datas = kintone_select(KINTONE_DOMAIN, API_TOKEN_READING, APP_ID_READING, $where);

//データ加工
$bookName = $datas['records'][0]['書籍名']['value'] ?? '';
$author = $datas['records'][0]['作者']['value'] ?? '';
$bookType = $datas['records'][0]['タイプ']['value'] ?? '';
$comment = $datas['records'][0]['感想']['value'] ?? '';
$fileURL = $datas['records'][0]['fileURL']['value'] ?? ''; //ファイルの保存path
$fileName = $datas['records'][0]['filename']['value'] ?? ''; //アップロードファイル名
$revision = $datas['records'][0]['$revision']['value'] ?? 0; //更新履歴
$img = 'files/' . $record .'/' . $fileName; //画像ファイルのpath
//日付データの編集 kintoneデータ構造'YYYY-MM-DDTHH:MM:SSZ'形式を'Y-m-d H:i:s'に変換 ※新規の場合「未作成」または「空」
$create = isset($datas['records'][0]['作成日時']['value']) ? date('Y-m-d H:i:s', strtotime($datas['records'][0]['作成日時']['value'])) : '未作成';
$update = isset($datas['records'][0]['更新日時']['value']) ? date('Y-m-d H:i:s', strtotime($datas['records'][0]['更新日時']['value'])) : '';

?>

<div class="container-sm">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="create_registration.php">
        <div class="form-group">
            <div class="col-md-8">
                <p class="badge bg-secondary" id="create" name="create">作成日時：<?= $create ?></p>
                <p class="badge bg-secondary" id="create" name="create">更新日時：<?= $update ?></p>
                <p class="badge bg-secondary" id="create" name="create">編集：<?= $revision ?>回</p>
            </div>
            <div class="row">
                <div class="text-center">
                    <img src="<?= $fileURL ?>" class="rounded" style="width: 10%;" alt="...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="file" class="form-control text-center" id="inputGroupFile02" name="uploadedFile">
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>

            <hr>
            <div class="badge bg-primary text-wrap" style="width: 6rem;">読書の詳細</div>
            <br>
            
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="BookName" class="form-label">書籍名</label>
                    <input type="BookName" class="form-control" id="BookName" name="BookName" value="<?php echo $bookName; ?>">
                </div>

                <div class="col-md-4">
                    <label for="author" class="form-label">作者</label>
                    <input type="author" class="form-control" id="author" name="author" value="<?php echo $author; ?>">
                </div>
                <div class="col-md-2">
                    <label for="dataList" class="form-label">タイプ</label>
                    <select class="form-select" name="bookType" aria-label="Default select example">
                        <option value="">選択してください</option>

<?php
foreach (BOOK_TYPE as $key => $value) {
    echo "<option value='" . $value . "' " .  ($bookType == $value ? 'selected' : "") . ">" . $value . "</option>";
}
?>
                    </select>
                </div>
            </div>
            <br>

            <br>
            <div class="col">
                <label for="coment" class="form-label">感想</label>
                <textarea class="form-control" id="coment" rows="3" name="comment"><?php echo $comment; ?></textarea>
            </div>
            <br>

            <input type="text" name="record" value="<?= $record ?>" hidden>
            <input type="text" name="crud" value="<?= $crud ?>" hidden>

        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-primary" href="./hp.php">戻る</a>
            <button class="btn btn-primary" type="submit">保存</button>
        </div>
    </form>
</div>
