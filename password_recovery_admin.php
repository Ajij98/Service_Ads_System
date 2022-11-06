<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['admin_username']))
  {
    header('location:admin_login.php');
  }
 ?>

 <!--USER RECOVERY PASSWORD PART-->
 <?php
   $admin_username = $_SESSION['admin_username'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['update']))
  {
    if(matchPassword())
    {
      $admin_password = $_POST['admin_password'];

      $sql = "UPDATE tb_admin SET admin_password='$admin_password' WHERE admin_username = '$admin_username'";

      $update_password = $db->update($sql);

      if($update_password)
      {
        header('location:password_recovery_logout_admin.php');
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissable w-50 m-auto" id="flash-msg"><strong>Error! </strong>Username or Email is incorrect!</div><br />';
      }
    }
  }

  function matchPassword(){
    if($_POST['admin_password'] !== $_POST['confirm_password'])
    {
      $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">Password and Confirm password should match!</div><br />';
      echo $msg;
    }
    else
    {
      return true;
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
  <title>Password Recovery</title>
</head>
<body style="background-color: #3eaabb26;">


  <br><br><br><br>

  <?php
    echo $msg;
   ?>
  <section id="user_password_recovery">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card m-auto" style="width: 28rem;">
            <div class="card-header">
              Set New Password
            </div>
            <div class="card-body">
              <form action="" method="post" id="passowrd_recovery_from" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label for="admin_password">Password</label>
                  <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter Password" required>
                </div>
                <input class="btn px-4 mb-3" style="background-color: #ED502E; color: white;" type="submit" name="update" value="Update">
                <a href="password_recovery_logout.php" class="text-danger" style="margin-left: 185px;">Back to Login</a>
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
