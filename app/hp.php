<?php
/* 読書の一覧画面 */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

//kintoneからデータ取得
$data_reading = array();
$where = 'user_record =' . $_SESSION['userID'];
$data_reading = kintone_select(KINTONE_DOMAIN, API_TOKEN_READING, APP_ID_READING, $where);
$url_insert = 'create.php?crud=insert';
?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#fav-table').tablesorter();
});
</script>

<input type="button" class="btn btn-secondary" value="履歴一覧" disabled>
<a class="btn btn-warning btn-sm mx-3" href="<?= $url_insert ?>" role="button">新規</a> 
<div class="table">
    <table class="table-info" id="fav-table">
        <thead>
            <tr>
                <th scope="col">選択</th>
                <th scope="col">#</th>
                <th scope="col">画像</th>
                <th scope="col">書籍名</th>
                <th scope="col">作者</th>
                <th scope="col">category</th>
                <th scope="col">感想</th>
                <th scope="col">更新日</th>
                <th scope="col" width="120px">操作</th>
            </tr>
        </thead>

        <tbody>
    <?php 
        //読書アプリのレコード数分表示する
        for($i=0; $i<count($data_reading['records']); $i++){
        $record = $data_reading['records'][$i]['record']['value'];
        $fileName = $data_reading['records'][$i]['filename']['value'];
        $url_update = 'create.php' . '?record=' . $record . '&crud=update';
        $url_delete = 'create_registration.php' . '?record=' . $record . '&crud=delete';

        $update = isset($data_reading['records'][0]['更新日時']['value']) ? date('Y-m-d H:i:s', strtotime($data_reading['records'][0]['更新日時']['value'])) : '';

        $img = 'files/' . $record .'/' . $fileName;
    ?>
            <tr>
                <th width=60px>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </th>
                <th scope="row"><?= $i+1 ?></th>
                <td>
                <img src="<?= $img ?? '' ?>" class="img-thumbnail" style="width: 100px; height: 100px;">       
                <!-- <img src="" class="img-responsive" >        -->
                </td>
                    <td><?= $data_reading['records'][$i]['書籍名']['value'] ?></td>
                    <td><?= $data_reading['records'][$i]['作者']['value'] ?></td>
                    <td><?= $data_reading['records'][$i]['タイプ']['value'] ?></td>
                    <td><?= $data_reading['records'][$i]['感想']['value'] ?></td>
                    <td><?= $update ?></td>
                <td>
                
                    <a class="btn btn-primary btn-sm" href="<?= $url_update ?>" role="button">編集</a>  
                    <a class="btn btn-danger btn-sm" href="<?= $url_delete ?>" role="button">削除</a>  
                </td>
            </tr>
    <?php
        }
    ?>
        </tbody>
    </table>
</div>

<?php
require_once("../part/footer.php");