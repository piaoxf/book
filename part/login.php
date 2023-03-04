<?php
  // require_once __DIR__ . '/../function/kintone.php';
  require_once __DIR__ . '/../function/kintoneAPI.php';
  // require("/../function/kintone.php");
  // $data = get_record('1');
  // var_dump($result);
  // var_dump($options);
  // var_dump($context);
  // var_dump($data);
  // var_dump($response);
  var_dump(select('password'));
?>

<br><br><br><br>
<div class="container-md">
  <form>

    <!-- <div class="row"> -->
      <div class="row d-flex justify-content-center">
        <!-- <div class="col-4"></div> -->
        <div class="col-md-4">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4">
        </div>
      </div>

      <!-- <div class="row"> -->
      <div class="row d-flex justify-content-center">
        <!-- <div class="col-4"></div> -->
        <div class="col-md-4">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
      </div>
      <br>

      <br>
      <div class="row d-flex justify-content-center text-center">
      <!-- <div class="row"> -->
        <!-- <div class="col-5"></div> -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>

  </form>
</div>
</div>