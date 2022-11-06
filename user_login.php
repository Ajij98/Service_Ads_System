<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--USER LOGIN PART-->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
    $user_username     = $_POST['user_username'];
    $user_password  = $_POST['user_password'];

    $sql = "SELECT * FROM tb_user WHERE BINARY user_username = '$user_username' AND BINARY user_password = '$user_password' LIMIT 1";

    $result = $db->link->query($sql) or die($this->link->error.__LINE__);

    if($result->num_rows != 0)
    {
      $row      = $result->fetch_assoc();
      $verified = $row['verified'];
      $email    = $row['user_email'];

      if($verified == 1)
      {
        $_SESSION['user_name'] = $user_username;
        header('location:user_home.php');
      }
      else
      {
        $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">This account has not been verified yet!</div><br />';
      }
    }
    else
    {
      $msg = '<div class="alert alert-danger alert-dismissable w-50 m-auto" id="flash-msg"><strong>Error! </strong>Username or Password is incorrect!</div><br />';
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
  <title>User_Login</title>
</head>
<body style="background-color: #3eaabb26;">


  <br><br><br><br>

  <?php
    echo $msg;
   ?>
  <section id="user_login">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card m-auto" style="width: 28rem;">
            <div class="card-header">
              User Login
            </div>
            <div class="card-body">
              <form action="" method="post" id="user_login_form" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label for="user_username">Username</label>
                  <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <label for="user_password">Password</label>
                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Your Password" required>
                </div>
                <input class="btn px-4 mb-3" style="background-color: #ED502E; color: white;" type="submit" name="submit" value="Login">
                <a href="forgotPassword_user.php" class="text-danger" style="margin-left: 185px;">Forgot Password?</a>
                <p class="text-muted d-inline mt-2">Don't have an account? </p><a href="user_signup.php">Signup Now</a>
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
