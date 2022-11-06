<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
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

  <title>Index</title>
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

      <h1 class="logo mr-auto"><a href="index.html">Service Ads</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#services">SERVICES</a></li>
          <li><a href="#contact">CONTACT</a></li>
          <li class="drop-down"><a href=""><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> LOGIN</a>
            <ul>
              <li><a href="admin_login.php">Admin Login</a></li>
              <li><a href="user_login.php">User Login</a></li>
            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="user_login.php" class="get-started-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Ads</a>
      <a href="user_signup.php" class="get-started-btn">Sign Up</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to The Largest Ads Website</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to Our Website</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">We are happy You are Here !</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

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
                <a href="user_login.php" style="background-color: #ED502E; color: white;" class="btn btn-sm px-3">View</a>
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
                <a href="user_login.php" style="background-color: #ED502E; color: white;" class="btn btn-sm px-3">View</a>
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



    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style="background-color: #F6F9FD;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Vehicle</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Mobiles</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Watch</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">House</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Electronics</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Mobile Accesories</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Working Procedure Section ======= -->
    <section id="work_porcedure" class="work_porcedure">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>working procedure</h2>
          <p>How it Works</p>
        </div>

        <div class="row faq-item d-flex align-items-stretch text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-4">
            <i class="fa fa-user-o fa-fw fa-4x mb-2" style="color: #ED502E;" aria-hidden="true"></i>
            <p>Create Account</p>
          </div>
          <div class="col-lg-4">
            <i class="fa fa-pencil-square-o fa-fw fa-4x mb-2" style="color: #ED502E;" aria-hidden="true"></i>
            <p>Post Ads</p>
          </div>
          <div class="col-lg-4">
            <i class="fa fa-check-square-o fa-fw fa-4x mb-2" style="color: #ED502E;" aria-hidden="true"></i>
            <p>Deal Done</p>
          </div>
        </div>

      </div>
    </section><!-- End Working Procedure Section -->


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
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
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
