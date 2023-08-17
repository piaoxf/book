<?php
/* 読書のデータ登録及び編集画面 */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

//データ加工
$record = '';
$update = '';
$create = '';
$BookName = '';
$author = '';
$bookType = '';
$comment = '';
$fileURL = '';
$fileName = '';
if(isset($_GET['record'])){//既存データの編集
    $where = 'record =' . $_GET['record']; 
    $datas = array();
    $datas = kintone_select(KINTONE_DOMAIN, API_TOKEN_READING, APP_ID_READING, $where);
    $record = $datas['records'][0]['record']['value'];
    $update = $datas['records'][0]['更新日時']['value'];
    $create = $datas['records'][0]['作成日時']['value'];
    $BookName = $datas['records'][0]['書籍名']['value'];
    $author = $datas['records'][0]['作者']['value'];
    $bookType = $datas['records'][0]['タイプ']['value'];
    $comment = $datas['records'][0]['感想']['value'];
    $fileURL = $datas['records'][0]['fileURL']['value'];
    $fileName = $datas['records'][0]['filename']['value'];
} 

$img = 'files/' . $record .'/' . $fileName;
?>

<div class="container-sm">
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="creat_insert.php">
    <div class="form-group">

        <div class="row">
            <div class="text-center">
                <!-- <img src="/book/images/title.png" class="rounded" style="width: 10%;" alt="..."> -->
                <img src="<?= $img ?>" class="rounded" style="width: 10%;" alt="...">
                <!-- <img src="/book/images/title.png" class="rounded" style="width: 10%;" alt="..."> -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-5">
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile02" name="uploadedFile">
                    <!-- <button type="submit" class="btn btn-primary">upload</button> -->
                </div>
            </div>
            <div class="col-md-4">
                <label for="BookName" class="form-label">作成日時</label>
                <p class="badge bg-primary" id="create" name="create"><?= $create ?></p>
                <!-- <div class="badge bg-primary text-wrap" style="width: 6rem;">
                        This text should wrap.
                </div> -->
            </div>
        </div>
        <br>

        <hr>
        <div class="badge bg-primary text-wrap" style="width: 6rem;">読書の詳細</div>
        <br>
        
        <br>
        <div class="row">
            <div class="col-md-6">
                <label for="BookName" class="form-label">書籍名</label>
                <input type="BookName" class="form-control" id="BookName" name="BookName" value="<?php echo $BookName; ?>">
            </div>

            <div class="col-md-4">
                <label for="author" class="form-label">作者</label>
                <input type="author" class="form-control" id="author" name="author" value="<?php echo $author; ?>">
            </div>
            <div class="col-md-2">
                <label for="dataList" class="form-label">タイプ</label>
                <select class="form-select" name="bookType" aria-label="Default select example">
                    <option value="">選択してください</option>
                    <option value="コンピューター・IT" <?= ($bookType == 'コンピューター・IT' ? 'selected' : '') ?>>コンピューター・IT</option>
                    <option value="社会・政治" <?= ($bookType == '社会・政治' ? 'selected' : '') ?>>社会・政治</option>
                    <option value="ビジネス・経済" <?= ($bookType == 'ビジネス・経済' ? 'selected' : '') ?>>ビジネス・経済</option>
                    <option value="小説" <?= ($bookType == '小説' ? 'selected' : '') ?>>小説</option>
                    <option value="漫画" <?= ($bookType == '漫画' ? 'selected' : '') ?>>漫画</option>
                    <option value="雑誌" <?= ($bookType == '雑誌' ? 'selected' : '') ?>>雑誌</option>
                </select>
            </div>
        </div>
        <br>

        <br>
        <div class="col">
            <label for="coment" class="form-label">感想</label>
            <textarea class="form-control" id="coment" rows="3" name="coment"><?php echo $comment; ?></textarea>
        </div>
        <br>

        <input type="text" name="record" value="<?= $record ?>" hidden>

    </div>
    <br>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="./hp.php">戻る</a>
        <button class="btn btn-primary" type="submit">保存</button>
    </div>
</form>
</div>
