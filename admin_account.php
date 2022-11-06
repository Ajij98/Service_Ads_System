<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>


 <!-- Select Admin profile data -->
 <?php
   $username = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   $sql    = "SELECT * FROM tb_admin WHERE admin_username = '$username'";

   $result = $db->select($sql);

   if($result)
   {
      while($getData = $result->fetch_assoc())
      {
        $admin_username = $getData['admin_username'];
        $admin_email    = $getData['admin_email'];
        $admin_phone    = $getData['admin_phone'];
        $admin_password = $getData['admin_password'];
        $admin_image    = $getData['admin_image'];
      }
    }
  ?>

  <!--Update Admin Account -->
  <?php
    $admin_username = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {

     $admin_username = $_POST['admin_username'];
     $admin_email    = $_POST['admin_email'];
     $admin_phone    = $_POST['admin_phone'];
     $admin_password = $_POST['admin_password'];

     $admin_image = $_FILES["admin_image"]["name"];
     $tmp = md5(time());

     if($admin_image != "")
     {
       $dst    = "./admin_images/".$tmp.$admin_image;
       $dst_db = "admin_images/".$tmp.$admin_image;
       move_uploaded_file($_FILES["admin_image"]["tmp_name"],$dst);

       $sql = "UPDATE tb_admin SET admin_username='$admin_username',admin_email='$admin_email',admin_phone='$admin_phone',admin_password='$admin_password',admin_image='$dst_db',entry_time='$current_datetime' WHERE admin_username = '$admin_username'";

       $update_row = $db->update($sql);
     }

      $sql = "UPDATE tb_admin SET admin_username='$admin_username',admin_email='$admin_email',admin_phone='$admin_phone',admin_password='$admin_password',admin_image='$dst_db',entry_time='$current_datetime' WHERE admin_username = '$admin_username'";

      $update_row = $db->update($sql);

         if($update_row)
         {
           ?>
           <script type="text/javascript">
             window.alert("Success. Your profile updated successfully. Thank You!");
             window.location.href = window.location.href;
           </script>
           <?php
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong!</div><br />';
           echo $msg;
           return false;
         }
   }
   ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Account</title>
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
  <section id="admin_account" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> My Account</h5><hr>
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
                <img src="<?php echo $admin_image; ?>" height="140" class="rounded" alt="...">
                <p class="card-text py-0 my-0 mt-1" style="font-size: 15px;">Username: <?php echo $_SESSION['user_name']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header"><strong>Account Detail</strong></div>
              <div class="card-body">
                <form action="" method="post" id="admin_signup_form" enctype="multipart/form-data" autocomplete="off">
                  <div class="form-group">
                    <label for="admin_username">Username</label>
                    <input type="text" class="form-control" id="admin_username" name="admin_username"   value="<?php echo $admin_username; ?>" placeholder="Enter Username" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_email">Email</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?php echo $admin_email; ?>" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_phone">Phone</label>
                    <input type="number" class="form-control" id="admin_phone" name="admin_phone" value="<?php echo $admin_phone; ?>" placeholder="Enter Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label for="admin_password">Password</label>
                    <input type="text" class="form-control" id="admin_password" name="admin_password" value="<?php echo $admin_password; ?>" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group">
                    <img src="<?php echo $admin_image; ?>" height="100"><br>
                    <label for="admin_image">Image</label>
                    <input type="file" class="form-control" id="admin_image" name="admin_image">
                  </div>
                  <input class="btn px-3" style="background-color: #ED502E; color: white;" type="submit" name="update" value="Update">
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
