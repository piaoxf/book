<?php
  define("SYSNAME", "読書アプリ" )  ;
  require_once __DIR__ . '/part/source.php';

  // require_once __DIR__ . '/app/login.php';
  // require_once __DIR__  . '/../function/kintoneAPI.php';
?>

<body>
  <div class="colorchange_bg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <br><br><br><br>
  <?php
    require_once __DIR__ . '/part/navi.php';
    // echo '<div class="alert alert-warning text-center text-danger" role="alert">';
    // // echo '<p class="text-danger">〇〇が間違ってます</p>';
    // echo '〇〇が間違ってます';
    // echo '</div>';  
    // var_dump($_GET['error']);exit;
    if(isset($_GET['error'])){
      echo '<div class="alert alert-warning text-center text-danger" role="alert">';
      echo $_GET['error'];
      echo '</div>';
    }
    require_once __DIR__ . '/part/header.php';
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

</body>
</html>