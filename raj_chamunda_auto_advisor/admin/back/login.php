<?php
session_start();
include '../db/connection.php';
date_default_timezone_set("Asia/Kolkata");

//test
if (isset($_POST['submit'])) {
      if (!empty($_POST['uname']) && !empty($_POST['password'])) {
            $uname = mysqli_real_escape_string($con, $_POST['uname']);
            $uname = htmlspecialchars($uname);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $password = htmlspecialchars($password);


            $sel = "select * from admin_data where username='$uname'";
            $ex = mysqli_query($con, $sel) or die(mysqli_error($con));


            if (mysqli_num_rows($ex) > 0) {
                  while ($row = mysqli_fetch_array($ex)) {
                        $username = $row['username'];
                        $password1 = $row['password'];
                  }
                  if (($password === $password1)) {
                        $_SESSION['username'] = base64_encode($username);
                        $_SESSION['password'] = base64_encode($password1);

?>

                        <script>
                              // alert('Login Successfully... !');
                              window.location = './../dash';
                        </script>


                  <?php
                  } else {
                  ?>

                        <script>
                              alert('Invalid Password...!');
                              window.location = './../account';
                        </script>


                  <?php
                  }
            } else {
                  ?>

                  <script>
                        alert('Invalid Information...!');
                        window.location = './../account';
                  </script>


            <?php
            }
      } else if (empty($_POST['uname'])) {
            ?>
            <script>
                  alert('Please enter Username ...!');
                  window.location = './../account';
            </script>
      <?php
      } else if (empty($_POST['password'])) {
      ?>
            <script>
                  alert('Please enter Password ...!');
                  window.location = './../account';
            </script>
      <?php
      } else if (empty($_POST['uname']) && empty($_POST['password'])) {
      ?>
            <script>
                  alert('Please enter Username and Password ...!');
                  window.location = './../account';
            </script>
<?php
      } else {
      }
}
$con->close();
?>