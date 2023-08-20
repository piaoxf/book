<?php
/* 読書の一覧画面 */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';

?>
<h1>新規ユーザー登録</h1>
<!-- username -->
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="new_user_insert.php">
  
  <div class="row m-5">
      <div class="col-md-6">
        <div class="badge bg-primary text-wrap " style="width: 8rem;">必須項目</div>
      </div>
      <div class="col-md-6"></div>

      <div class="col-md-6">
        <label for="nickname" class="form-label">ニックネーム</label>
        <input type="text" class="form-control" name="nickname" id="nickname" maxlength="10" required>
      </div>
    </div>

    <div class="row m-5">
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="invalid-feedback" id="email-feedback">
        有効なemailを入力してください。
      </div>
  </div>
  <div class="row m-5">
      <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="invalid-feedback" id="password-feedback">
      パスワードは少なくとも8文字以上である必要があります。
      </div>
    </div>
  </div>

  <div class="row m-5">
    <div class="col-md-6">
        <div class="badge bg-primary text-wrap " style="width: 6rem;">基本情報</div>
      </div>
      <div class="col-md-6"></div>
    <div class="col-12">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" name="address" id="address" placeholder="東京都新宿区西新宿1-2-2">
    </div>
    <div class="col-12">
      <label for="address2" class="form-label">Address 2</label>
      <input type="text" class="form-control" name="address2" id="address2" placeholder="〇〇マンション 5階">
    </div>
    <div class="col-md-6">
      <label for="city" class="form-label">City</label>
      <input type="text" class="form-control" name="city" id="city">
    </div>
    <div class="col-md-4">
      <label for="state" class="form-label">State</label>
      <select id="state" class="form-select" name="state">
        <option value="" selected>Choose...</option>
  <?php
  foreach (JAPAN_STATE as $key => $value) {
    echo "<option value='" . $value . "' " . ">" . $value . "</option>";
  }
  ?>
      </select>
    </div>
    <div class="col-md-2">
      <label for="zip" class="form-label">Zip</label>
      <input type="text" class="form-control" name="zip" id="zip">
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Check me out
        </label>
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
  <script src="../js/new_user.js"></script>
</form>