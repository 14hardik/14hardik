<?php

include_once("../db/connection.php");

if (isset($_POST['uid'])  && isset($_POST['service_type']) && isset($_POST['vehicle_no']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {

      $uid = mysqli_real_escape_string($con, $_POST['uid']);
      $uid = htmlspecialchars($uid);
      $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
      $service_type = htmlspecialchars($service_type);
      $vehicle_no = mysqli_real_escape_string($con, $_POST['vehicle_no']);
      $vehicle_no = htmlspecialchars($vehicle_no);
      $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
      $start_date = htmlspecialchars($start_date);
      $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
      $end_date = htmlspecialchars($end_date);

      // $v_id = uniqid();
      $vid = random_bytes(4);
      $v_id = bin2hex($vid);



      $sel = "select * from vehicle_details where service_type='$service_type' and vehicle_no='$vehicle_no' and start_date='$start_date' and end_date='$end_date' ";
      $ex = mysqli_query($con, $sel) or die(mysqli_error($con));


      if (mysqli_num_rows($ex) < 1) {

            $cmd = "INSERT INTO `vehicle_details` (`id`, `uid`, `v_id`, `vehicle_no`,
                                     `service_type`, `start_date`, `end_date`, `document`, `status`) VALUES 
                                     (NULL, '$uid', '$v_id','$vehicle_no', '$service_type',  '$start_date', '$end_date', 'Not Set', '0')";
            $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

            if ($result) {

?>

                  <script type="text/javascript">
                        alert('Vehicle added Successfully... !');
                        window.location = './addvehicle';
                  </script>

            <?php

            } else {

            ?>

                  <script type="text/javascript">
                        alert('Failed... !');
                        window.location = './addvehicle';
                  </script>

            <?php

            }
      } else {
            ?>

            <script>
                  alert('This Data already exist...!');
                  window.location = './addvehicle';
            </script>


      <?php
      }
} else {
      ?>
      <script>
            alert('Somthing Went Wrong...!');
            window.location = './addvehicle';
      </script>
<?php
}

$con->close();

?>