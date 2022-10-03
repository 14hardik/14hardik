<?php

include_once("../db/connection.php");

if (isset($_POST['uid']) && isset($_POST['service_type']) && isset($_POST['vehicle_no']) && isset($_POST['start_date']) && isset($_POST['end_date']) || isset($_FILES['doc'])) {


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

      $img_name = $_FILES['doc']['name'];
      $imgtmpname = $_FILES['doc']['tmp_name'];
      $imgsize = $_FILES['doc']['size'];
      $imgerror = $_FILES['doc']['error'];
      $imgtype = $_FILES['doc']['type'];

      // echo $img_name;


      $sel = "select * from vehicle_details where service_type='$service_type' and vehicle_no='$vehicle_no' and start_date='$start_date' and end_date='$end_date' ";
      $ex = mysqli_query($con, $sel) or die(mysqli_error($con));


      if (mysqli_num_rows($ex) < 1) {

            if (!empty($_POST['uid']) && !empty($_POST['service_type']) && !empty($_POST['vehicle_no']) && !empty($_POST['start_date']) && !empty($_POST['end_date']) && $_FILES['doc']['name'] =='') {

                  $cmd = "INSERT INTO `vehicle_details` (`id`, `uid`, `v_id`, `vehicle_no`,
                                     `service_type`, `start_date`, `end_date`, `document`, `status`) VALUES 
                                     (NULL, '$uid', '$v_id','$vehicle_no', '$service_type',  '$start_date', '$end_date', 'Upload Document', '0')";
                  $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                  if ($result) {

?>

                        <script type="text/javascript">
                              alert('Vehicle added Successfully... !');
                              // window.location = './addvehicle';
                              window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                        </script>

                  <?php

                  } else {

                  ?>

                        <script type="text/javascript">
                              alert('Failed... !');
                              window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                        </script>

                        <?php

                  }
            } else if (!empty($_POST['uid']) && !empty($_POST['service_type']) && !empty($_POST['vehicle_no']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])   && $_FILES['doc']['name'] !='') {

                  $img_name = $_FILES['doc']['name'];
                  $imgtmpname = $_FILES['doc']['tmp_name'];
                  $imgsize = $_FILES['doc']['size'];
                  $imgerror = $_FILES['doc']['error'];
                  $imgtype = $_FILES['doc']['type'];

                  $docname = pathinfo($img_name, PATHINFO_EXTENSION);
                  $docnewname = strtolower($docname);
                  $allowed = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG', 'pdf', 'PDF');

                  if (in_array($docnewname, $allowed)) {
                        if ($imgerror === 0) {
                              if ($imgsize < 1000000) {

                                    $doc_newname = $v_id . '_Doc.' . $docnewname;
                                    $upload_path = '../images/documents/' . $doc_newname;
                                    $doc_path = './images/documents/' . $doc_newname;

                                    move_uploaded_file($imgtmpname, $upload_path);

                                    $cmd = "INSERT INTO `vehicle_details` (`id`, `uid`, `v_id`, `vehicle_no`,
                               `service_type`, `start_date`, `end_date`, `document`, `status`) VALUES 
                               (NULL, '$uid', '$v_id','$vehicle_no', '$service_type',  '$start_date', '$end_date', '$doc_path', '0')";
                                    $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                                    if ($result) {

                        ?>

                                          <script type="text/javascript">
                                                alert('Vehicle added Successfully... !');
                                                window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                                          </script>



                                    <?php



                                    } else {

                                    ?>

                                          <script type="text/javascript">
                                                alert('Failed... !');
                                                window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                                          </script>

                                    <?php

                                    }
                              } else {
                                    ?>

                                    <script type="text/javascript">
                                          alert('Large file...!');
                                          window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                                    </script>

                              <?php
                              }
                        } else {
                              ?>

                              <script type="text/javascript">
                                    alert('Error...!');
                                    window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                              </script>

                        <?php
                        }
                  } else {
                        ?>

                        <script type="text/javascript">
                              alert('Invalid File Extension...!');
                              window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                        </script>

            <?php
                  }
            }
      } else {
            ?>

            <script>
                  alert('This Data already exist...!');
                  window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
            </script>


      <?php
      }
} else {
      ?>
      <script>
            alert('Somthing Went Wrong...!');
            window.location = './userdetails';
      </script>
<?php
}

$con->close();

?>