<?php

include_once("../db/connection.php");

if (isset($_POST['user_name']) && isset($_POST['user_name']) && isset($_POST['contact_no'])) {

      $uid = mysqli_real_escape_string($con, $_POST['uid']);
      $uid = htmlspecialchars($uid);
      $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
      $user_name = htmlspecialchars($user_name);
      $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
      $contact_no = htmlspecialchars($contact_no);

      $sel = "update user_details set user_name='$user_name',contact_no='$contact_no' where uid='$uid'";
      $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
      if ($sql) {

?>

            <script type="text/javascript">
                  alert('User Updated Successfully... !');
                  window.location = './userdetails';
            </script>



      <?php



      } else {

      ?>

            <script type="text/javascript">
                  alert('Failed... !');
                  window.location = './edituser';
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