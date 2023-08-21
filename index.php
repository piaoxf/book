<?php
/* index画面 */
  define("SYSNAME", "読書アプリ" )  ;
  require_once __DIR__ . '/function/function.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>読書アプリ</title>
    <link rel="icon" type="image/x-icon" href="images/title.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/sidebars.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">   
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </head>
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