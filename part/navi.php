<?php
const URL = [
  '0' => 'hp.php', //一覧画面
  '1' => 'password_change.php', //パスワード変更
  '2' => '../index.php', //ログアウト index
  '3' => 'help.php', //問い合わせ画面
  '4' => 'search.php', //検索
];

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">読書アプリ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL['0'] ?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ユーザー
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL['1'] ?>">パスワード変更</a></li>
            <li><a class="dropdown-item" href="<?= URL['2'] ?>">ログアウト</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= URL['3'] ?>">お問い合わせ</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" method="POST" enctype="multipart/form-data" action="<?= URL['4'] ?>">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>