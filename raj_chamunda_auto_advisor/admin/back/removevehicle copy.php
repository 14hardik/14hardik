<?php
include("../db/connection.php");

if (isset($_POST['id'])) {
     $id = mysqli_real_escape_string($con, $_POST['id']);
     $id = htmlspecialchars($id);

     $sel = "select * from user_details where id='$id'";
     $result = mysqli_query($con, $sel) or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result)) {
          
          $uid = $row['uid'];
          // $v_id = $row['v_id'];
     }

     $sel1 = "select * from vehicle_details where v_id='$v_id'";
     $result1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result1)) {

          $document_path = $row['document'];
     }

     if ($document_path != 'Upload Document') {

          if (file_exists($document_path)) {
               if (unlink($document_path)) {
                    ?>
                         <script>
                              alert('Vehicle ...!');
                         </script>
                    <?php
                    $q = "delete from vehicle_details where id='$id'";
                    $sql = mysqli_query($con, $q) or die(mysqli_error($con));

                    if ($sql) {
?>
                         <script>
                              alert('Vehicle Deleted...!');
                         </script>
                    <?php
                    } else {
                    ?>
                         <script>
                              alert('Failed...!');
                         </script>
                    <?php
                    }
               } else {

                    ?>

                    <script type="text/javascript">
                         alert('Error in deleting vehicle document... !');
                         window.location = './userdetails';
                    </script>



               <?php
               }
          }
     } else {
          $q = "delete from vehicle_details where id='$id'";
          $sql = mysqli_query($con, $q) or die(mysqli_error($con));

          if ($sql) {
               ?>
               <script>
                    alert('Vehicle Deleted...!');
               </script>
          <?php
          } else {
          ?>
               <script>
                    alert('Failed...!');
               </script>
     <?php
          }
     }
} else {
     ?>
     <script>
          alert('Somthing Went Wrong...!');
     </script>
<?php
}

$con->close();
?>