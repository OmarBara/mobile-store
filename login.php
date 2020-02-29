<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 17/01/2018
 * Time: 06:32 PM
 */
//include "header.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $GLOBALS['login']='';
    echo 'true';
    include 'admin.php';
    exit();
      // header("location: admin.php");
}else {
//if(isset($_SESSION['login'])){
//header("location: profile.php");
?>

  <body>
  <div id="container">
      <div id="row">
          <h2>Login Form</h2>
      <?php 
      echo '<form class="form-horizontal" action="login.php" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="firstname">User Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  placeholder="Enter ser Name" name="username" required>
                    </div>
                  </div>';

      echo '<div class="form-group">
            <label class="control-label col-sm-2" for="firstname">Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control"  placeholder="Enter Password" name="password" required>
              </div>
            </div>';


      echo '<div class="col-sm-offset-2 "><button type="submit" class="btn btn-success col-4">Login</button></div>
            </form>';
            //echo $_SESSION['login'];

  echo '</div>
       </div>
       </body>';
}
 //include 'footer.php';