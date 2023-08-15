<?php
  require_once __DIR__  . '/../function/kintoneAPI.php';
?>

  <br><br><br><br>
<?php
// var_dump($_GET['error']);exit;
if(isset($_GET['error'])){
  echo '<div class="alert alert-primary" role="alert">';
  echo $_GET['error'];
  echo '</div>';
}
?>
  <div class="container-sm">
    <form class="form-horizontal" method="POST" action="app/login_check.php">
      <div class="form-group">

        <div class="row d-flex justify-content-center">
          <div class="col-md-4">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email">
          </div>
        </div>
        <br>

        <div class="row d-flex justify-content-center">
          <div class="col-md-4">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password">
          </div>
        </div>
        <br>

        <br>
        <div class="row d-flex justify-content-center text-center">
          <div class="col">
              <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>

<section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Register for free</span>
          <button type="button" class="btn btn-outline-light btn-rounded" onclick="location.href='part/newUser.php'">
            Sign up!
          </button>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white">読書アプリ</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>
<?php
// require("footer.php");