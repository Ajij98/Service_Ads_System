<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>


 <!-- Total published ads count -->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_upload_ads";
   $read1 = $db->select($sql);
   if($read1)
   {
     $total_published_ads = $read1->num_rows;
   }
   else
   {
     $total_published_ads = 0;
   }
  ?>

  <!-- Total active ads count -->
  <?php
    $db   = new Database();
    $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1";
    $read1 = $db->select($sql);
    if($read1)
    {
      $total_active_ads = $read1->num_rows;
    }
    else
    {
      $total_active_ads = 0;
    }
   ?>

   <!-- Total pending ads count -->
   <?php
     $db   = new Database();
     $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 0";
     $read1 = $db->select($sql);
     if($read1)
     {
       $total_pending_ads = $read1->num_rows;
     }
     else
     {
       $total_pending_ads = 0;
     }
    ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
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
      <a href="logout_admin.php" onclick="return confirm('Are You sure you want to logout?');" class="get-started-btn"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

    </div>
  </header><!-- End Header -->
  <br><br>

  <!-- ======= Hero Section ======= -->
  <section id="admin_home" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i> Dashboard</h5><hr>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="ads_details" class="p-0 m-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-3">
            <div class="card border-info mb-3">
                <div class="card-body bg-info text-light">
                  <p class="card-text text-left pb-0 mb-0"><i class="fa fa-pencil-square-o fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                  <p class="card-text text-right py-0 my-0" style="font-size: 25px;"><?php echo $total_published_ads; ?></p>
                  <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Published Ads</p>
                </div>
              <div class="card-footer"><a class="text-info" href="published_ads.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card border-success mb-3">
                <div class="card-body bg-success text-light">
                  <p class="card-text text-left pb-0 mb-0"><i class="fa fa-check-square-o fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                  <p class="card-text text-right py-0 my-0" style="font-size: 25px;"><?php echo $total_active_ads; ?></p>
                  <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Active Ads</p>
                </div>
              <div class="card-footer"><a class="text-info" href="active_ads.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card border-warning mb-3">
                <div class="card-body bg-warning text-light">
                  <p class="card-text text-left pb-0 mb-0"><i class="fa fa-spinner fa-fw fa-3x fa-spin pb-0 mb-0" aria-hidden="true"></i></p>
                  <p class="card-text text-right py-0 my-0" style="font-size: 25px;"><?php echo $total_pending_ads; ?></p>
                  <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Pending Ads</p>
                </div>
              <div class="card-footer"><a class="text-info" href="pending_ads.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br><br><br>

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>SAS</h3>
                <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
                <p>
                  New Market, Chittagong<br>
                  Bangladesh<br><br>
                  <strong>Phone:</strong> +01845745965<br>
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

            <div class="col-lg-4 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="admin_home.php">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#published_ads.php">Published Ads</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="active_ads.php">Active Ads</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="pending_ads.php">Pending Ads</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="user_list.php">User</a></li>
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
