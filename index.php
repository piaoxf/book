<?php
/* index画面 */
  define("SYSNAME", "読書アプリ" )  ;
  require_once __DIR__ . '/part/source.php';
  require_once __DIR__ . '/function/function.php';

?>

<body>
  <div class="colorchange_bg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <br><br><br><br>
  <?php
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

<?php 
require_once('part/footer.php');
?>

</body>
</html>