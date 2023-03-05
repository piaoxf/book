
<?php
echo "hp";
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
?>

<!-- <script type="text/javascript" src="/js/main.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
    $('#fav-table').tablesorter();
});
</script>

<table class="table" id="fav-table">
  <thead>
    <tr>
      <th scope="col">選択</th>
      <th scope="col">#</th>
      <th scope="col">画像</th>
      <th scope="col">書籍</th>
      <th scope="col">作者</th>
      <th scope="col">category</th>
      <th scope="col">登録</th>
      <th scope="col">更新日</th>
      <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody>
<?php 
    for($i=0; $i<5; $i++){
?>
    <tr>
      <th width=60px>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div>
      </th>
      <!-- <input class="control-form" type="checkbox"></th> -->
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <a class="btn btn-primary btn-sm" href="creat.php" role="button">編集</a>  
      </td>
    </tr>
<?php
    }
?>
  </tbody>
</table>











<?php
require("footer.php");