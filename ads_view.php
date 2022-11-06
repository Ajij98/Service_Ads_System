<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:user_login.php');
  }
 ?>

 <!-- VIEW PRODUCT DETAILS -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['ad_id']))
   {

     $ad_id  = $_GET['ad_id'];

     $sql    = "SELECT a.*, b.user_email, b.user_contact FROM tb_upload_ads as a INNER JOIN tb_user as b ON a.u_name = b.user_username WHERE a.ad_id = $ad_id ";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {

       //From tb_upload_ads
       $ad_title       = $getData['ad_title'];
       $ad_price       = $getData['ad_price'];
       $ad_image       = $getData['ad_image'];
       $area           = $getData['area'];
       $ad_fixed_price_or_not = $getData['ad_fixed_price_or_not'];
       $entry_time     = $getData['entry_time'];
       $ad_description = $getData['ad_description'];
       $user_name      = $getData['u_name'];

       //From tb_user
       $user_email   = $getData['user_email'];
       $user_contact = $getData['user_contact'];
     }
   }
  ?>

  <!--MORE ADS BY SALLER-->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['ad_id']))
    {

      $ad_id  = $_GET['ad_id'];

      $sql    = "SELECT u_name FROM tb_upload_ads WHERE ad_id = $ad_id ";

      $result = $db->select($sql);

      while($getData = $result->fetch_assoc())
      {
        $user_name1 = $getData['u_name'];
      }

      $sql  = "SELECT * FROM tb_upload_ads WHERE u_name = 'salman'";
      $read_more_ads = $db->select($sql);

    }
   ?>

   <!--SEND MESSAGE TO SALLER TO BUY PRODUCT-->
   <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {
     require 'phpmailer/PHPMailerAutoload.php';
     $mail = new PHPMailer();

     //Server settings
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = $_POST['email'];
     $mail->Password = $_POST['password'];
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;

      //Recipients Email
     $mail->setFrom($_POST['email']);
     $mail->addAddress($user_email, $user_name);

     // Content
     $mail->isHTML(true);
     $mail->Subject = 'SAS. An email from Customer.';
     $mail->Body    = $_POST['message']."<br><br> My Contact: ".$_POST['phone']."<br /><br />Product Name: ".$ad_title."<br /><br />Price: ".$ad_price."Tk<br /><br />Location: ".$area ;

     if(!$mail->send()) {
       $msg = '<div class="alert alert-danger w-50 m-auto">Message could not be sent!</div>';
       echo $msg;
       echo 'Mailer Error: ' . $mail->ErrorInfo;
     }
     else {
       $msg = '<div class="alert alert-success w-50 m-auto"><strong>Your message has been sent to saller.</div><br />';
       echo $msg;
     }
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
  <section id="product_view" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-eye fa-fw" aria-hidden="true"></i> Product View</h5><hr>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="ads_view" class="p-0 m-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-3">
            <div class="card text-white">
              <img src="<?php echo $ad_image; ?>" class="card-img" alt="...">
              <div class="card-img-overlay">
                <b class="card-title px-4 py-2" style="background-color: #ED502E;"><?php echo $ad_title; ?></b><br><br>
                <b class="card-text px-4 py-2" style="background-color: #ED502E;"><?php echo "Tk ".$ad_price; ?></b>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header font-weight-bold">Ad Posted By</div>
              <div class="card-body">
                <h5 class="card-title"><img src="img/man.jpg" weight="40" height="70" class="rounded border border-danger" alt="..."></h5>
                <p class="my-1" style="font-size: 13px;"><?php echo $user_name; ?></p>
                <p class="text-primary" style="font-size: 13px;"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> <?php echo $user_email; ?></p>
                <p class="text-muted" style="font-size: 15px;">Call now for order or send message via email</p>
                <p class="text-primary" style="font-size: 15px;"><i class="fa fa-phone fa-fw" aria-hidden="true"></i> <?php echo $user_contact; ?></p>
                <form action="" method="post" id="mail_send_form" class="mt-4">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Email Password" required>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="message" rows="4" cols="80" placeholder="Message to saller" required></textarea>
                  </div>
                  <input class="btn" style="background-color: #ED502E; color: white;" type="submit" name="submit" value="Send Message">
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="ads_description" class="py-0 my-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-3">
            <div class="card">
              <div class="card-header "><strong>PRODUCT DETAIL (<b style="color: #ED502E;"><?php echo $ad_title; ?></b>)</strong></div>
              <div class="card-body text-muted">
                <h5 class="card-title" style="font-size: 14px;">Posted on <i class="fa fa-calendar-o fa-fw"></i> <?php echo $entry_time; ?>  <i class="fa fa-map-marker fa-fw ml-2"></i> <?php echo $area; ?>  <i class="fa fa-money fa-fw ml-2"></i> Fixed Price: <?php echo $ad_fixed_price_or_not; ?></h5><hr>
                <br>
                <p class="card-text"><?php echo $ad_description; ?></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ======= More Ads Section ======= -->
    <section id="more_ads" class="py-0 my-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header font-weight-bold">More Ads From Seller</div>
                <div class="card-body">

                  <div class="row">

                    <?php if($read_more_ads){ ?>
                    <?php while($result = $read_more_ads->fetch_assoc()){ ?>

                    <div class="col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                      <div class="card mb-3">
                        <img src="<?php echo $result['ad_image']; ?>" class="card-img-top" style="height: 13rem;" alt="...">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px; color: #ED502E;"><strong><?php echo $result['ad_title']; ?></strong></h5>
                          <p class="text-muted" style="font-size: 12px;"><i class="fa fa-map-marker fa-fw"></i><?php echo $result['area']; ?> <i class="fa fa-money fa-fw ml-2"></i> <?php echo $result['ad_price']." BDT"; ?></p>
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
            </div>
          </div>
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
