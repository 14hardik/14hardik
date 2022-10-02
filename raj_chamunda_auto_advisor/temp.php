<?php 
 if (file_exists('./admin/images/documents/3aca5a10_Doc.pdf')) {
      if (unlink('./admin/images/documents/3aca5a10_Doc.pdf')) {
           ?>
                <script>
                     alert('Vehicle ...!');
                </script>
                <?php 
      }
}

?>
<?php
include("../db/connection.php");
$v_id = base64_decode($_SESSION['v_id']);
echo '////////////////////////'.$v_id;

if (isset($_POST['id'])) {
     $id = mysqli_real_escape_string($con, $_POST['id']);
     $id = htmlspecialchars($id);

     $q = "delete from vehicle_details where id='$id'";
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
          </script>
     <?php
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
<?php
include("../db/connection.php");

if (isset($_POST['id'])) {
     $id = mysqli_real_escape_string($con, $_POST['id']);
     $id = htmlspecialchars($id);

     $sel = "select * from user_details where id='$id'";
     $result = mysqli_query($con, $sel) or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result)) {

          $uid = $row['uid'];
          $v_id = $row['v_id'];
     }

     $sel1 = "select * from vehicle_details where id='$id'";
     $result1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result1)) {

          $uid = $row['uid'];
          $v_id = $row['v_id'];
     }



     $data = "delete from user_details where id='$id'";
     $result = mysqli_query($con, $data) or die(mysqli_error($con));

     if ($result) {
          $sel = "select * from vehicle_details where uid='$uid'";

          $run = mysqli_query($con, $sel) or die(mysqli_error($con));

          while ($row = mysqli_fetch_array($run)) {

               $document_path = $row['document'];

               if ($document_path != 'Upload Document') {
                    if (file_exists('./../' . $document_path)) {
                         // echo 'here';

                         if (unlink('./../' . $document_path)) {

                              $q = "delete from vehicle_details where uid='$uid'";
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
                    $q = "delete from vehicle_details where uid='$uid'";
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
          }
     } else {

          ?>
          <script>
               alert('Error in deleting User...!');
          </script>
     <?php
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