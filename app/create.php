<?php
    require_once __DIR__ . '/../const.php';
    require_once __DIR__ . '/../part/source.php';
    require_once __DIR__ . '/../part/navi.php';
    require_once __DIR__ . '/../part/header.php';
    require_once __DIR__ . '/../function/kintoneAPI.php';

    if(!isset($_GET['record'])){
        header('Location:https://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/hp.php');
        exit;
    }
    $where = 'record =' . $_GET['record']; 
    $datas = kintone_select(KINTONE_DOMAIN, API_TOKEN_READING, APP_ID_READING, $where);
    $record = $datas['records'][0]['record']['value'];
    $update = $datas['records'][0]['更新日時']['value'];
    $creat = $datas['records'][0]['作成日時']['value'];
    $BookName = $datas['records'][0]['書籍名']['value'];
    $author = $datas['records'][0]['作者']['value'];
    $bookType = $datas['records'][0]['タイプ']['value'];
    $coment = $datas['records'][0]['感想']['value'];
    $file = $datas['records'][0]['link']['value'];

?>

<div class="container-sm">
    <form class="form-horizontal" method="POST" action="/book/part/creat_insert.php">
        <div class="form-group">

            <div class="row">
                <div class="text-center">
                    <img src="/book/images/title.png" class="rounded" style="width: 10%;" alt="...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile02" name="link">
                        <!-- <button type="submit" class="btn btn-primary">upload</button> -->
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
                        <option value="社会・政治">社会・政治</option>
                        <option value="ビジネス・経済">ビジネス・経済</option>
                        <option value="小説">小説</option>
                        <option value="漫画">漫画</option>
                        <option value="雑誌">雑誌</option>
                    </select>
                </div>
            </div>
            <br>

            <br>
            <div class="col">
                <label for="coment" class="form-label">感想</label>
                <textarea class="form-control" id="coment" rows="3" name="coment"><?php echo $coment; ?></textarea>
            </div>
            <br>

        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-primary" href="./hp.php">戻る</a>
            <button class="btn btn-primary" type="submit">保存</button>
        </div>
    </form>
</div>
