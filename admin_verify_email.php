<?php
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--Email Verification Part-->
 <?php
  $db = new Database();
  if(isset($_GET['verification_code']))
  {
    $verification_code = $_GET['verification_code'];

    $sql = "SELECT verified,admin_verification_code FROM tb_admin WHERE verified = 0 AND admin_verification_code = '$verification_code' LIMIT 1";

    $result = $db->link->query($sql) or die($this->link->error.__LINE__);

    if($result->num_rows == 1)
    {
      $sql = "UPDATE tb_admin SET verified = 1 WHERE admin_verification_code = '$verification_code' LIMIT 1";

      $update = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($update)
      {
        $msg = '<br /><br /><br /><br /><br /><br /><div class="alert alert-success w-50 m-auto text-center">Your account has been verified. You can now login.</div><br />';
        echo $msg;
      }
      else
      {
        echo $db->link->error;
      }
    }
    else
    {
      $msg = '<br /><br /><br /><br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">This account is invalid or already verified!</div><br />';
      echo $msg;
    }
  }
  else
  {
    die("Something went wrong");
  }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Verify Email</title>
</head>
<body>

  <div class="text-center">
    <a class="btn px-4" style="background-color: #ED502E; color: white;" href="admin_login.php">Login</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
