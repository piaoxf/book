<?php
/* ユーザーパスワード変更画面 */

require_once __DIR__ . '/../common/session_check.php';
require_once __DIR__ . '/../common/const.php';
require_once __DIR__ . '/../part/source.php';
require_once __DIR__ . '/../part/navi.php';
require_once __DIR__ . '/../part/header.php';
require_once __DIR__ . '/../function/kintoneAPI.php';
?>

<div class="container-sm">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="password_change_update.php">
        <div class="form-group">
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">New Password</label>
            </div>
            <div class="invalid-feedback" id="password-feedback">
                パスワードは少なくとも8文字以上である必要があります。
            </div>
            <br>
            <div class="form-floating">
                <input type="password" class="form-control" name="confrimPassword" id="floatingConfirmPassword" placeholder="Password">
                <label for="floatingConfirmPassword">Confrim New Password</label>
            </div>
            <div class="invalid-feedback" id="passwordConfrim-feedback">
                パスワードと確認パスワードは同じである必要があります。
            </div>
        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit">保存</button>
        </div>
        <script src="../js/password_change.js"></script>
    </form>
</div>