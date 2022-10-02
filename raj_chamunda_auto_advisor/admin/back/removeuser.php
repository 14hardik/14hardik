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

     $q = "delete from vehicle_details where uid='$uid'";
     $sql = mysqli_query($con, $q) or die(mysqli_error($con)); 

     if ($result ) {
?>
          <script>
                alert('User Deleted...!');
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