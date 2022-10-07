<?php

include_once("../db/connection.php");

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['admin_id'])) {

      $admin_id = mysqli_real_escape_string($con, $_POST['admin_id']);
      $admin_id = htmlspecialchars($admin_id);
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $username = htmlspecialchars($username);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $password = htmlspecialchars($password);

      $sel = "update admin_data set username='$username',password='$password' where admin_id='$admin_id'";
      $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
      if ($sql) {

?>

            <script type="text/javascript">
                  alert('User Updated Successfully... !');
                  history.go(-1)

            </script>



      <?php



      } else {

      ?>

            <script type="text/javascript">
                  alert('Failed... !');
                  history.go(-1)
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