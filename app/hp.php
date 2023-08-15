
<?php
require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

if(!isset($_SESSION['userID'])){//認証されていない場合、indexに遷移
  echo "セッションが切れた";
  header("Location: http://" . $_SERVER["HTTP_HOST"] . "/book");
  exit;
}
//kintoneからデータ取得
$data_reading = array();
$where = 'record =' . $_SESSION['userID'];
$data_reading = kintone_select(KINTONE_DOMAIN, API_TOKEN_READING, APP_ID_READING, $where);

?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#fav-table').tablesorter();
});
</script>

<input type="button" class="btn btn-secondary" value="履歴一覧" disabled>
<a class="btn btn-warning btn-sm mx-3" href="create.php" role="button">新規</a> 
<table class="table" id="fav-table">
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
      <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody>
<?php 
    //読書アプリのレコード数分表示する
    for($i=0; $i<count($data_reading['records']); $i++){
    $record = $data_reading['records'][$i]['record']['value'];
    $url = 'create.php' . '?record=' . $record;
?>
    <tr>
      <th width=60px>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div>
      </th>
      <th scope="row"><?= $i+1 ?></th>
      <td>
        <!-- <img src="<?= $data_reading['records'][$i]['file']['value'] ??'' ?>" class="img-responsive" >        -->
        <img src="" class="img-responsive" >       
      </td>
      <td><?= $data_reading['records'][$i]['書籍名']['value'] ?></td>
      <td><?= $data_reading['records'][$i]['作者']['value'] ?></td>
      <td><?= $data_reading['records'][$i]['タイプ']['value'] ?></td>
      <td><?= $data_reading['records'][$i]['感想']['value'] ?></td>
      <td><?= $data_reading['records'][$i]['更新日時']['value'] ?></td>
      <td>
        
        <a class="btn btn-primary btn-sm" href="<?= $url ?>" role="button">編集</a>  
      </td>
    </tr>
<?php
    }
?>
  </tbody>
</table>

<?php
require_once("../part/footer.php");