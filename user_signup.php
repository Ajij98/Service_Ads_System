<?php
  session_start();
  include 'include/Config.php';
  include 'include/Database.php';
?>

<!--USER REGISTRATION PART-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name           = $_POST['name'];
          $user_gender    = $_POST['user_gender'];
          $user_email     = $_POST['user_email'];
          $user_contact   = $_POST['user_contact'];
          $user_address   = $_POST['user_address'];
          $user_birthdate = $_POST['user_birthdate'];
          $user_username  = $_POST['user_username'];
          $user_password  = $_POST['user_password'];
          $user_verification_code = md5(rand());

          $sql = "INSERT INTO          tb_user(name,user_gender,user_email,user_contact,user_address,user_birthdate,user_username,user_password,user_verification_code,entry_time)values('$name','$user_gender','$user_email','$user_contact','$user_address','$user_birthdate','$user_username','$user_password','$user_verification_code','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            require 'phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer();

            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'abdulajij.pciu@gmail.com';
            $mail->Password = '!#12pciu';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

             //Recipients Email
            $mail->setFrom('abdulajij.pciu@gmail.com');
            $mail->addAddress($_POST['user_email'], $_POST['user_username']);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'SAS Mail Verification';
            $mail->Body    = "<br>Thank you for registering.<br><br>This is a verification Email, Please click the link(Verify Account) below to verify your account.<br><br><a href='http://localhost:7882/Service_Ads_System/Verify_Email.php?verification_code=$user_verification_code'>Verify Account</a>";

            if(!$mail->send()) {
              $msg = '<div class="alert alert-danger w-50 m-auto">Message could not be sent!</div>';
              echo $msg;
              echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            else {
              $msg = '<div class="alert alert-success w-50 m-auto"><strong>Registration Successfull.</strong> Please check your email for account verification.</div><br />';
              echo $msg;
            }
          }
        }
      }
    }
  }

  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_email='".$_POST['user_email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
      $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">Email already Exist!</div><br />';
      echo $msg;
      return false;
    }
    else
    {
      return true;
    }
  }

  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_username='".$_POST['user_username']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
      $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">Username already Exist!</div><br />';
      echo $msg;
      return false;
    }
    else
    {
      return true;
    }
  }

  function matchPassword(){
    if($_POST['user_password'] !== $_POST['user_confirmpass'])
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/uikit.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>User Signup</title>
</head>
<body style="background-color: #3eaabb26;">


  <!--USER SIGNUP FORM-->
  <br><br>
  <section id="user_signup_form">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card w-75 m-auto px-2">
            <div class="card-header">
              <h6 class="text-lg-left text-center mt-2 p-0"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>CREATE YOUR ACCOUNT</h6>
              <p class="text-lg-right text-center p-0 mb-1">Already have an account?<a style="color: #ED502E;" class="ml-2" href="user_login.php">Login Here</a></p>
            </div>
            <div class="card-body">
              <form id="student_signup_form" action="" method="post">
                <div class="form-row p-0 m-0">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter your full name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="user_gender">Select Gender<span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="user_gender" name="user_gender" required>
                      <option selected>Choose...</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Others</option>
                    </select>
                  </div>
                </div>
                <div class="form-row p-0 m-0">
                  <div class="form-group col-md-6">
                    <label for="user_email">Email<span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter email" aria-describedby="mail" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="user_contact">Mobile Number<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="user_contact" name="user_contact" placeholder="Enter mobile number" required>
                  </div>
                </div>
                <div class="form-row p-0 m-0">
                  <div class="form-group col-md-12">
                    <label for="user_address">Address<span class="text-danger">*</span></label>
                    <textarea id="user_address" name="user_address" class="form-control" rows="2" cols="80" placeholder="Enter address" required></textarea>
                  </div>
                </div>
                <div class="form-row p-0 m-0">
                  <div class="form-group col-md-6">
                    <label for="user_birthdate">Birth Date<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="user_birthdate" name="user_birthdate" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="user_username">User Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter username" required>
                  </div>
                </div>
                <div class="form-row p-0 m-0">
                  <div class="form-group col-md-6">
                    <label for="user_password">Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter password" required>
                    <small id="student_password" class="form-text text-muted">
                      Your password must be 6-20 characters long.
                    </small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="user_confirmpass">Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="user_confirmpass" name="user_confirmpass" placeholder="Enter confirm password" required>
                  </div>
                  <div class="form-row p-0 m-0">
                    <div class="form-group col-md-12">
                      <input style="background-color: #ED502E; color: white;" class="btn px-4 m-auto" type="submit" name="submit" value="SIGN UP">
                    </div>
                  </div>
              </form>
            </div>
            <div class="card-footer text-center text-muted">
              Have a good day! <i class="fa fa-smile-o" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

  </body>
</html>
