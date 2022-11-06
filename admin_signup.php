<?php
  include 'include/Config.php';
  include 'include/Database.php';
?>

<!--ADMIN REGISTRATION PART-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkUsername())
    {
      if(checkEmail())
      {
        if(matchPassword())
        {

          $admin_username = $_POST['admin_username'];
          $admin_email    = $_POST['admin_email'];
          $admin_phone    = $_POST['admin_phone'];
          $admin_password = $_POST['admin_password'];
          $admin_verification_code = md5(rand());

          $tmp = md5(time());
          $admin_image = $_FILES["admin_image"]["name"];
          $dst    = "./admin_images/".$tmp.$admin_image;
          $dst_db = "admin_images/".$tmp.$admin_image;
          move_uploaded_file($_FILES["admin_image"]["tmp_name"],$dst);

          $sql = "INSERT INTO          tb_admin(admin_username,admin_email,admin_phone,admin_password,admin_image,admin_verification_code,entry_time)values('$admin_username','$admin_email','$admin_phone','$admin_password','$dst_db','$admin_verification_code','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            require 'phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer();

            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'armun.hossain@gmail.com';
            $mail->Password = 'Armn99@@';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

             //Recipients Email
            $mail->setFrom('armun.hossain@gmail.com');
            $mail->addAddress($_POST['admin_email'], $_POST['admin_username']);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'SAS Mail Verification';
            $mail->Body    = "<br>Thank you for registering.<br><br>This is a verification Email, Please click the link(Verify Account) below to verify your account.<br><br><a href='http://localhost/Service_Ads_System/admin_verify_email.php?verification_code=$admin_verification_code'>Verify Account</a>";

            if(!$mail->send()) {
              $msg = '<div class="alert alert-danger w-50 m-auto">Message could not be sent!</div>';
              echo $msg;
              echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            else {
              //$msg = '<div class="alert alert-success w-50 m-auto"><strong>Registration Successfull.</strong> Please check your email for account verification.</div><br />';
              //echo $msg;
              ?>

              <script>
		             alert("Registration Successful. Need to check email for account verification.");
              </script>

              <?php
            }
          }
        }
      }
    }
  }

  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_admin WHERE admin_username='".$_POST['admin_username']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
      //$msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">Username already Exist!</div><br />';
      //echo $msg;
      ?>

      <script>
         alert("Warning! Username already Exist.");
      </script>

      <?php
      return false;
    }
    else
    {
      return true;
    }
  }

  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_admin WHERE admin_email='".$_POST['admin_email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
      //$msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">Email already Exist!</div><br />';
      //echo $msg;
      ?>

      <script>
         alert("Warning! Email already Exist.");
      </script>

      <?php
      return false;
    }
    else
    {
      return true;
    }
  }

  function matchPassword(){
    if($_POST['admin_password'] !== $_POST['admin_confirm_password'])
    {
      //$msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg">Password and Confirm password should match!</div><br />';
      //echo $msg;
      ?>

      <script>
         alert("Warning! Password and Confirm password should match.");
      </script>

      <?php
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Signup</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Multi - v2.2.0
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Service Ads</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="admin_home.php">HOME</a></li>
          <li><a href="published_ads.php">PUBLISHED ADS</a></li>
          <li><a href="active_ads.php">ACTIVE ADS</a></li>
          <li><a href="pending_ads.php">PENDING ADS</a></li>
          <li><a href="user_list.php">USERS</a></li>
          <li><a href="admin_account.php"><i class="fa fa-user-circle-o fa-fw"></i> My Account</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="admin_signup.php" class="get-started-btn">Sign Up</a>
      <a href="#" class="get-started-btn"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

    </div>
  </header><!-- End Header -->
  <br><br>

  <!-- ======= Hero Section ======= -->
  <section id="admin_account" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> Admin Signup</h5><hr>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="ads_view" class="p-0 m-0 w-50 m-auto">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header"><strong>Create Account</strong></div>
              <div class="card-body">
                <form action="" method="post" id="admin_signup_form" enctype="multipart/form-data" autocomplete="off">
                  <div class="form-group">
                    <label for="admin_username">Username</label>
                    <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Enter Username" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_email">Email</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_phone">Phone</label>
                    <input type="number" class="form-control" id="admin_phone" name="admin_phone" placeholder="Enter Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_password">Password</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="admin_confirm_password" name="admin_confirm_password" placeholder="Re-enter Password" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_image">Image</label>
                    <input type="file" class="form-control" id="admin_image" name="admin_image" required>
                  </div>
                  <input class="btn px-3" style="background-color: #ED502E; color: white;" type="submit" name="submit" value="Sign Up">
                </form>
              </div>
            </div>
        </div>
      </div>
    </section><br><br>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Multi</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +880 1831144838<br>
                <strong>Email:</strong> arman@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <hr>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/multi-responsive-bootstrap-template/ -->
        Developed by <a href="#">Hossain Arman</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
