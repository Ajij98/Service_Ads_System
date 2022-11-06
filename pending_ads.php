<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>


 <!--PENDING ADS TABLE DATA LOAD-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_upload_ads WHERE ad_status = 0";
   $read = $db->select($sql);
  ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pending Ads</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Fontawsome -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- jQuery Datatable Plugin -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

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
  <section id="pending_ads_adminside" class="pb-1 mb-1">
    <div class="container">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Pending Ads</h5><hr>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="pending_ads_view" class="p-0 m-0">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header"><strong>Pending Ads</strong></div>
              <div class="card-body">
                <form action="" method="post">
                  <table id="pending_ads_table" class="table table-bordered display nowrap" style="width:100%">
                    <thead class="bg-secondary text-light">
                      <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Area</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php if($read){ $i = 0; ?>
                      <?php while($result = $read->fetch_assoc()){ $i = $i + 1; ?>
                      <tr>

                        <td><?php echo $i; ?></td>
                        <td><img src="<?php echo $result['ad_image']; ?>" weight="60" height="60"></td>
                        <td><?php echo $result['ad_title']; ?></td>
                        <td><?php echo $result['ad_category']; ?></td>
                        <td><?php echo $result['ad_price']." BDT"; ?></td>
                        <td><?php echo $result['area']; ?></td>
                        <td><?php echo $result['u_name']; ?></td>

                        <td>
                          <a href="verify_user_ads.php?ad_id=<?php echo $result['ad_id']; ?>&product_code=<?php echo $result['product_code']; ?>" class="btn btn-success btn-sm">Make Active</a>
                        </td>

                        <td><a href="pending_ads_view.php?ad_id=<?php echo $result['ad_id']; ?>" title="view" class="btn btn-info btn-sm"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a> <a href="delete_data.php?pending_ad_id=<?php echo $result['ad_id']; ?>" onclick="return confirm('Are you sure you want to delete this item')" title="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a></td>

                      </tr>
                      <?php } ?>
                      <?php }else{ ?>
                      <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                        echo $msg; ?>
                      <?php } ?>

                    </tbody>
                  </table>
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


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
  <script src="script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

</body>

</html>


<script>

  $(document).ready(function() {
    $('#pending_ads_table').DataTable( {
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },

            { "width": "10%", "targets": 0 }
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  } );

</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
