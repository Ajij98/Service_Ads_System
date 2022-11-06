<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>




 <!--Booking VERIFICATION PART-->
 <?php
  $db = new Database();

    if(isset($_GET['ad_id']))
    {
      $ad_id = $_GET['ad_id'];
      $product_code = $_GET['product_code'];

      $sql = "SELECT ad_status FROM tb_upload_ads WHERE ad_status = 0 AND ad_id = '$ad_id' AND product_code = '$product_code' LIMIT 1";

      $result = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($result->num_rows == 1)
      {
        $sql = "UPDATE tb_upload_ads SET ad_status = 1 WHERE ad_id = '$ad_id' AND product_code = '$product_code' LIMIT 1";

        $update = $db->link->query($sql) or die($this->link->error.__LINE__);

        if($update)
        {
          ?>
          <script type="text/javascript">

            window.location='pending_ads.php';

          </script>
          <?php
        }
        else
        {
          echo $db->link->error;
        }
      }
      else
      {
        $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
        echo $msg;
      }
    }
    else
    {
      die("Something went wrong!");
    }
  ?>
