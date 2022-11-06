<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--ADMIN LOGIN PART-->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $sql = "SELECT * FROM tb_admin WHERE BINARY admin_username = '$admin_username' AND BINARY admin_password = '$admin_password' LIMIT 1";

    $result = $db->link->query($sql) or die($this->link->error.__LINE__);

    if($result->num_rows != 0)
    {
      $row      = $result->fetch_assoc();
      $verified = $row['verified'];
      $admin_email = $row['admin_email'];

      if($verified == 1)
      {
        //$msg = '<div class="alert alert-success alert-dismissable w-50 m-auto" id="flash-msg">Your account is verified and you can login.</div><br />';
        $_SESSION['user_name'] = $admin_username;
        header('location:admin_home.php');
      }
      else
      {
        $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">This account has not been verified yet!</div><br />';
      }
    }
    else
    {
      $msg = '<div class="alert alert-danger alert-dismissable w-50 m-auto" id="flash-msg">Username or Password is incorrect!</div><br />';
    }
  }
  ?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/uikit.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Admin_Login</title>
</head>
<body style="background-color: #3eaabb26;">


  <br><br><br><br>

  <?php
    echo $msg;
   ?>
  <section id="admin_login">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card m-auto" style="width: 28rem;">
            <div class="card-header">
              Admin Login
            </div>
            <div class="card-body py-4">
              <form action="" method="post" id="admin_login_form">
                <div class="form-group">
                  <label for="admin_username">Username</label>
                  <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <label for="admin_password">Password</label>
                  <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Your Password" required>
                </div>
                <input class="btn px-4" style="background-color: #ED502E; color: white;" type="submit" name="submit" value="Login">
                <a href="forgotPassword_admin.php" class="text-danger" style="margin-left: 185px;">Forgot Password?</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <br><br><br><br><br><br>



  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



</body>
</html>
