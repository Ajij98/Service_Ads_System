<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>

 <!-- VIEW USER DETAILS -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['ad_id']))
   {

     $ad_id  = $_GET['ad_id'];

     $sql    = "SELECT * FROM tb_upload_ads WHERE ad_id = $ad_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $ad_id       = $getData['ad_id'];
       $ad_title       = $getData['ad_title'];
       $ad_category    = $getData['ad_category'];
       $area           = $getData['area'];
       $ad_fixed_price_or_not = $getData['ad_fixed_price_or_not'];
       $ad_price       = $getData['ad_price'];
       $ad_brand_name  = $getData['ad_brand_name'];
       $ad_description = $getData['ad_description'];
       $product_code   = $getData['product_code'];
       $u_name         = $getData['u_name'];
       $ad_image       = $getData['ad_image'];
       $ad_status      = $getData['ad_status'];
       $entry_time     = $getData['entry_time'];
     }
   }
  ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Active Ads</title>
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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Service Ads</a></h1>

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
  <section id="view_ads_adminside" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-eye fa-fw" aria-hidden="true"></i> View Active Ads</h5><hr>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->


    <!-- ======= Services Section ======= -->
    <section id="ads_view" class="p-0 m-0">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 mb-3">
            <div class="card">
              <img src="<?php echo $ad_image; ?>" class="card-img" alt="...">
            </div>
          </div>

          <div class="col-lg-6 mb-3">
            <div class="card">
              <div class="card-header font-weight-bold">Ad Detail</div>
              <div class="card-body">
                <p class="card-text"><strong>Ad Id: </strong> <?php echo $ad_id; ?></p><hr>
                <p class="card-text"><strong>Title: </strong> <?php echo $ad_title; ?></p><hr>
                <p class="card-text"><strong>Category: </strong> <?php echo $ad_category; ?></p><hr>
                <p class="card-text"><strong>Area: </strong> <?php echo $area; ?></p><hr>
                <p class="card-text"><strong>Fixed: </strong> <?php echo $ad_fixed_price_or_not; ?></p><hr>
                <p class="card-text"><strong>Price: </strong> <?php echo $ad_price." BDT"; ?></p><hr>
                <p class="card-text"><strong>Brand Name: </strong> <?php echo $ad_brand_name; ?></p><hr>
                <p class="card-text"><strong>Description: </strong> <?php echo $ad_description; ?></p><hr>
                <p class="card-text"><strong>Product Code: </strong> <?php echo $product_code; ?></p><hr>
                <p class="card-text"><strong>Author Name: </strong> <?php echo $u_name; ?></p><hr>
                <p class="card-text"><strong>Entry Time: </strong> <?php echo $entry_time; ?></p><hr>
              </div>
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
