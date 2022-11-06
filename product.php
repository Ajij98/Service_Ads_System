<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:user_login.php');
  }
 ?>

 <!--PRODUCT ADD TO CART DATA LOAD-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1";
   $read = $db->select($sql);
  ?>

  <!--PRODUCT ADD TO CART (SELECTED CATEGORY & SELECTED AREA) DATA LOAD-->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['search']))
    {

      $ad_category = $_POST['ad_category'];
      $area        = $_POST['area'];

      $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1 AND ad_category = '$ad_category' AND area = '$area' ";
      $read = $db->select($sql);

    }
   ?>

   <!--PRODUCT ADD TO CART (VIEW ALL) DATA LOAD-->
   <?php
     if(isset($_POST['view_all']))
     {
       $db   = new Database();
       $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1";
       $read = $db->select($sql);
     }
    ?>



    <!--PRODUCT ADD TO CART DATA LOAD-->
    <?php
      error_reporting( error_reporting() & ~E_NOTICE );
      $current_date = date("Y-m-d");

      $db   = new Database();
      $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1 AND upload_date = '$current_date'";
      $read_new = $db->select($sql);
     ?>

       <!--PRODUCT ADD TO CART (SELECTED CATEGORY & SELECTED AREA) DATA LOAD-->
       <?php
         error_reporting( error_reporting() & ~E_NOTICE );
         $db = new Database();
         $current_date = date("Y-m-d") ;

         if(isset($_POST['search1']))
         {

           $ad_category = $_POST['ad_category'];
           $area        = $_POST['area'];

           $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1 AND ad_category = '$ad_category' AND area = '$area' AND upload_date = '$current_date' ";
           $read_new = $db->select($sql);

         }
        ?>


        <!--PRODUCT ADD TO CART (VIEW ALL) DATA LOAD-->
        <?php
          error_reporting( error_reporting() & ~E_NOTICE );
          $current_date = date("Y-m-d") ;

          if(isset($_POST['view_all1']))
          {
            $db   = new Database();
            $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 1 AND upload_date = '$current_date'";
            $read_new = $db->select($sql);
          }
         ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Products</title>
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
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="user_home.php">HOME</a></li>
          <li><a href="product.php">PRODUCTS</a></li>
          <li><a href="#contact">CONTACT</a></li>
          <li><a href="user_account.php"><i class="fa fa-user-circle-o fa-fw"></i> My Account</a></li>
          <li><a href="logout_user.php" onclick="return confirm('Are You sure you want to logout?');"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="upload_ads.php" class="get-started-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Ads</a>

    </div>
  </header><!-- End Header -->

  <br><br><br>

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="latest_product">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Products</h2>
          <p>Leatest Products</p>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-lg-5">
                  <label for="ad_category">Select Category <small>(What are you looking for?)</small></label>
                  <select class="form-control" id="ad_category" name="ad_category">
                    <option selected></option>
                    <option>Vehicle</option>
                    <option>Mobiles</option>
                    <option>Watch</option>
                    <option>House</option>
                    <option>Bag</option>
                    <option>Mobile Accesories</option>
                  </select>
                </div>
                <div class="col-lg-5">
                  <label for="area">Select Area</label>
                  <select class="form-control" id="area" name="area">
                    <option selected></option>
                    <option>Agrabad</option>
                    <option>New Market</option>
                    <option>Chawkbazar</option>
                    <option>Muradpur</option>
                    <option>Boddarhat</option>
                  </select>
                </div>
                <div class="col-lg-1 mt-2">
                  <br>
                  <input type="submit" class="btn" style="background-color: #ED502E; color: white;" class="form-control" name="search1" value="Search">
                </div>
                <div class="col-lg-1 mt-2">
                  <br>
                  <input type="submit" class="btn" style="background-color: #ED502E; color: white;" class="form-control" name="view_all1" value="View All">
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row">

          <?php if($read_new){ ?>
          <?php while($result = $read_new->fetch_assoc()){ ?>

          <div class="col-6 col-sm-6 col-md-4 col-lg-3  d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="card my-2">
              <img src="<?php echo $result['ad_image']; ?>" class="card-img-top" style="height: 12rem;" alt="...">
              <div class="card-body">
                <h6 style="font-size: 12px; margin-bottom: 10px;"><?php echo $result['ad_category']; ?></h6>
                <h5 class="card-title text-bold" style="color: #ED502E;"><?php echo $result['ad_title']; ?></h5>
                <p style="font-size: 12px;"><i class="fa fa-user fa-fw" aria-hidden="true"></i><?php echo $result['u_name']; ?> <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i><?php echo $result['area']; ?></p>
                <p class="card-text" style="font-size: 13px;"><?php echo $result['ad_description']; ?></p>
                <hr>
                <a href="ads_view.php?ad_id=<?php echo $result['ad_id']; ?>" style="background-color: #ED502E; color: white;" class="btn btn-sm px-3">View</a>
                <h6 class="d-inline" style="font-size: 13px; color: #ED502E;"><?php echo $result['ad_price']." BDT"; ?></h6>
              </div>
            </div>
          </div>

        <?php } ?>
        <?php }else{ ?>
        <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
          echo $msg; ?>
        <?php } ?>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Services Section ======= -->
    <section id="product">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Products</h2>
          <p>All Products</p>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-lg-5">
                  <label for="ad_category">Select Category <small>(What are you looking for?)</small></label>
                  <select class="form-control" id="ad_category" name="ad_category">
                    <option selected></option>
                    <option>Vehicle</option>
                    <option>Mobiles</option>
                    <option>Watch</option>
                    <option>House</option>
                    <option>Bag</option>
                    <option>Mobile Accesories</option>
                  </select>
                </div>
                <div class="col-lg-5">
                  <label for="area">Select Area</label>
                  <select class="form-control" id="area" name="area">
                    <option selected></option>
                    <option>Agrabad</option>
                    <option>New Market</option>
                    <option>Chawkbazar</option>
                    <option>Muradpur</option>
                    <option>Boddarhat</option>
                  </select>
                </div>
                <div class="col-lg-1 mt-2">
                  <br>
                  <input type="submit" class="btn" style="background-color: #ED502E; color: white;" class="form-control" name="search" value="Search">
                </div>
                <div class="col-lg-1 mt-2">
                  <br>
                  <input type="submit" class="btn" style="background-color: #ED502E; color: white;" class="form-control" name="view_all" value="View All">
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row">

          <?php if($read){ ?>
          <?php while($result = $read->fetch_assoc()){ ?>

          <div class="col-6 col-sm-6 col-md-4 col-lg-3  d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="card my-2">
              <img src="<?php echo $result['ad_image']; ?>" class="card-img-top" style="height: 12rem;" alt="...">
              <div class="card-body">
                <h6 style="font-size: 12px; margin-bottom: 10px;"><?php echo $result['ad_category']; ?></h6>
                <h5 class="card-title text-bold" style="color: #ED502E;"><?php echo $result['ad_title']; ?></h5>
                <p style="font-size: 12px;"><i class="fa fa-user fa-fw" aria-hidden="true"></i><?php echo $result['u_name']; ?> <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i><?php echo $result['area']; ?></p>
                <p class="card-text" style="font-size: 13px;"><?php echo $result['ad_description']; ?></p>
                <hr>
                <a href="ads_view.php?ad_id=<?php echo $result['ad_id']; ?>" style="background-color: #ED502E; color: white;" class="btn btn-sm px-3">View</a>
                <h6 class="d-inline" style="font-size: 13px; color: #ED502E;"><?php echo $result['ad_price']." BDT"; ?></h6>
              </div>
            </div>
          </div>

        <?php } ?>
        <?php }else{ ?>
        <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
          echo $msg; ?>
        <?php } ?>

        </div>

      </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>New Market, Chittagong</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>arman@gmail.com<br>mlflooper@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+01854584755<br>+01845745965</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
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
