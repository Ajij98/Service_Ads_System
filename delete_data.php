<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>


<!-- DELETE ADS BY USER -->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_GET['ad_id']))
  {
    $ad_id = $_GET['ad_id'];

    $sql = "DELETE FROM tb_upload_ads WHERE ad_id = $ad_id";
    $delete_row = $db->delete($sql);
    if($delete_row)
    {
      ?>

      <script type="text/javascript">

        window.location='user_ads_list.php';

      </script>

      <?php
    }
    else
    {
      $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
      echo $msg;
      return false;
    }
  }
  ?>



  <!-- DELETE PUBLISHED ADS BY ADMIN -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['published_ad_id']))
    {
      $published_ad_id = $_GET['published_ad_id'];

      $sql = "DELETE FROM tb_upload_ads WHERE ad_id = $published_ad_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>

        <script type="text/javascript">

          window.location='published_ads.php';

        </script>

        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- DELETE ACTIVE ADS BY ADMIN -->
    <?php
      error_reporting( error_reporting() & ~E_NOTICE );
      $db = new Database();
      $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
      date_default_timezone_set('Asia/Dhaka');

      if(isset($_GET['active_ad_id']))
      {
        $active_ad_id = $_GET['active_ad_id'];

        $sql = "DELETE FROM tb_upload_ads WHERE ad_id = $active_ad_id";
        $delete_row = $db->delete($sql);
        if($delete_row)
        {
          ?>

          <script type="text/javascript">

            window.location='active_ads.php';

          </script>

          <?php
        }
        else
        {
          $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
          echo $msg;
          return false;
        }
      }
      ?>



      <!-- DELETE PENDING ADS BY ADMIN -->
      <?php
        error_reporting( error_reporting() & ~E_NOTICE );
        $db = new Database();
        $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
        date_default_timezone_set('Asia/Dhaka');

        if(isset($_GET['pending_ad_id']))
        {
          $pending_ad_id = $_GET['pending_ad_id'];

          $sql = "DELETE FROM tb_upload_ads WHERE ad_id = $pending_ad_id";
          $delete_row = $db->delete($sql);
          if($delete_row)
          {
            ?>

            <script type="text/javascript">

              window.location='pending_ads.php';

            </script>

            <?php
          }
          else
          {
            $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
            echo $msg;
            return false;
          }
        }
        ?>
