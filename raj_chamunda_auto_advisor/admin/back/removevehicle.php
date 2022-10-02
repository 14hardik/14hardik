<?php
include("../db/connection.php");

if (isset($_POST['id'])) {
     $id = mysqli_real_escape_string($con, $_POST['id']);
     $id = htmlspecialchars($id);

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
     <script>
          alert('Somthing Went Wrong...!');
     </script>
<?php
}

$con->close();
?>