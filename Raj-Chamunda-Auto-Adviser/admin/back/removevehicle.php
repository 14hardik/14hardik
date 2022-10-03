<?php
session_start();
include("../db/connection.php");

if (isset($_GET['v_id'])) {
     $v_id = mysqli_real_escape_string($con, $_GET['v_id']);
     $v_id = htmlspecialchars($v_id);

     //     echo $v_id;

     $sel1 = "select * from vehicle_details where v_id='$v_id'";
     $result1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result1)) {

          $document_path = $row['document'];
     }

     if ($document_path != 'Upload Document') {
          if (file_exists('./../' . $document_path)) {
               // echo 'here';

               if (unlink('./../' . $document_path)) {

                    $q = "delete from vehicle_details where v_id='$v_id'";
                    $sql = mysqli_query($con, $q) or die(mysqli_error($con));

                    if ($sql) {
?>
                         <script>
                              alert('Vehicle Deleted...!');
                              history.go(-1)
                         </script>
                    <?php
                    } else {
                    ?>
                         <script>
                              alert('Failed...!');
                              history.go(-1)
                         </script>
                    <?php
                    }
               } else {

                    ?>

                    <script type="text/javascript">
                         alert('Error in deleting vehicle document... !');
                         history.go(-1)
                    </script>



               <?php
               }
          }
     } else {
          $q = "delete from vehicle_details where v_id='$v_id'";
          $sql = mysqli_query($con, $q) or die(mysqli_error($con));

          if ($sql) {
               ?>
               <script>
                    alert('Vehicle Deleted...!');
                    history.go(-1)
               </script>
          <?php
          } else {
          ?>
               <script>
                    alert('Failed...!');
                    history.go(-1)
               </script>
     <?php
          }
     }
} else {
     ?>
     <script>
          alert('Somthing Went Wrong...!');
          history.go(-1)
     </script>
<?php
}

$con->close();
?>