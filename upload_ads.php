<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:user_login.php');
  }
 ?>


<!-- UPLOAD ADS -->
<?php
  $user_name = $_SESSION['user_name'];
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {

      $ad_title              = $_POST['ad_title'];
      $ad_category           = $_POST['ad_category'];
      $area                  = $_POST['area'];
      $ad_fixed_price_or_not = $_POST['ad_fixed_price_or_not'];
      $ad_price              = $_POST['ad_price'];
      $ad_brand_name         = $_POST['ad_brand_name'];
      $ad_description        = $_POST['ad_description'];
      $upload_date           = $_POST['upload_date'];
      $u_name                = $user_name;
      $product_code          = md5(rand());

      //6 digit er random value generate korar jonno
      //$code = rand(100000, 999999);

      $tmp = md5(time());
      $ad_image = $_FILES["ad_image"]["name"];
      $dst    = "./ad_images/".$tmp.$ad_image;
      $dst_db = "ad_images/".$tmp.$ad_image;
      move_uploaded_file($_FILES["ad_image"]["tmp_name"],$dst);


      $sql = "INSERT INTO          tb_upload_ads(ad_title,ad_category,area,ad_fixed_price_or_not,ad_price,ad_brand_name,ad_description,product_code,ad_image,upload_date,u_name,entry_time)values('$ad_title','$ad_category','$area','$ad_fixed_price_or_not','$ad_price','$ad_brand_name','$ad_description','$product_code','$dst_db','$upload_date','$u_name','$current_datetime')";
      $insert_row = $db->insert($sql);

      if($insert_row)
      {
      ?>

      <script type="text/javascript">

        window.alert("Ad inserted successfully.");
        window.location='user_ads_list.php';

      </script>

      <?php
        return true;
      }
      else
      {
        ?>

        <script type="text/javascript">

          window.alert("Error! Something went wrong.");

        </script>

        <?php
        return false;
      }
  }


 ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Upload Products</title>
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
  <br><br>

  <!-- ======= Hero Section ======= -->
  <section id="upload_ads" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-upload fa-fw" aria-hidden="true"></i> Upload Products</h5><hr>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="ads_view" class="p-0 m-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mb-3">
            <div class="card mb-2 text-center text-light" style="background-color: #ED502E;">
              <div class="card-body">
                <p class="card-text py-0 my-0 mt-1" style="font-size: 15px;">Username: <?php echo $_SESSION['user_name']; ?></p>
              </div>
            </div>
            <div class="card">
              <div class="card-header text-light" style="background-color: #ED502E;">
                MENU
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="user_account.php" class="text-dark"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i> My Account</a></li>
                <li class="list-group-item"><a href="user_ads_list.php" class="text-dark"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i> My Ads</a></li>
                <li class="list-group-item"><a href="upload_ads.php" class="text-dark"><i class="fa fa-upload fa-fw" aria-hidden="true"></i> Upload Ads</a></li>
                <li class="list-group-item"><a href="logout_user.php" onclick="return confirm('Are You sure you want to logout?');" class="text-dark"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Logout</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header"><strong>Ad Detail</strong></div>
              <div class="card-body">
                <form action="" method="post" id="upload_ads_from" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="ad_title">Ad Title</label>
                    <input type="text" class="form-control" id="ad_title" name="ad_title" placeholder="Enter ad title" required>
                  </div>
                  <div class="form-group">
                    <label for="ad_category">Category</label>
                    <select class="form-control" id="ad_category" name="ad_category" required>
                      <option selected>Select</option>
                      <option>Vehicle</option>
                      <option>Mobiles</option>
                      <option>Watch</option>
                      <option>House</option>
                      <option>Bag</option>
                      <option>Mobile Accesories</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="area">Area</label>
                    <select class="form-control" id="area" name="area" required>
                      <option selected>Select</option>
                      <option>Agrabad</option>
                      <option>New Market</option>
                      <option>2 No Gate</option>
                      <option>Muradpur</option>
                      <option>Boddarhat</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ad_fixed_price_or_not">Fixed Price or Not</label>
                    <select class="form-control" id="ad_fixed_price_or_not" name="ad_fixed_price_or_not" required>
                      <option selected>Select fixed or not...</option>
                      <option>YES</option>
                      <option>NO</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ad_price">Price (BDT)</label>
                    <input type="number" class="form-control" id="ad_price" name="ad_price" placeholder="Enter price" required>
                  </div>
                  <div class="form-group">
                    <label for="ad_brand_name">Brand Name (If Any)</label>
                    <input type="text" class="form-control" id="ad_brand_name" name="ad_brand_name" placeholder="Enter brand name">
                  </div>
                  <div class="form-group">
                    <label for="ad_description">Product Description</label>
                    <textarea class="form-control" id="ad_description" name="ad_description" rows="4" cols="80" placeholder="Short description about product" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="ad_image">Product Image</label>
                    <input type="file" class="form-control" id="ad_image" name="ad_image" required>
                  </div>
                  <div class="form-group">
                    <label for="upload_date">Upload Date</label>
                    <input type="date" class="form-control" id="upload_date" name="upload_date" required>
                  </div>
                  <input class="btn px-3" style="background-color: #ED502E; color: white;" type="submit" name="submit" value="Upload">
                </form>
              </div>
            </div>
        </div>
      </div>
    </section><br><br>

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
