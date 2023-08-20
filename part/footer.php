<?php
  $url = getFullUrl2('app/new_user.php');
?>

<section class="footer-container">
  <footer class="text-center text-white" style="background-color: #0a4275;">

<?php
if(!isset($_SESSION['userID'])){ //index画面でのみ、新規ユーザー登録ボタンを表示する
  echo '<div class="container p-4 pb-0">';
  echo '<section class="">';
  echo '<p class="d-flex justify-content-center align-items-center">';
  echo '<span class="me-3">Register for free</span>';
  echo '<button type="button" class="btn btn-outline-light btn-rounded" onclick="location.href=\'' . $url . '\'">';
  echo 'Sign up!';
  echo '</button>';
  echo '</p>';
  echo '</section>';
  echo '</div>';
}
?>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white">読書アプリ</a>
    </div>
  </footer>
</section>