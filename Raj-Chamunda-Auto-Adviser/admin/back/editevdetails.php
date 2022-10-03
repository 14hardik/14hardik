<?php

include_once("../db/connection.php");

if (isset($_POST['uid']) && isset($_POST['v_id']) && isset($_POST['service_type']) && isset($_POST['vehicle_no']) && isset($_POST['start_date']) && isset($_POST['end_date']) || isset($_FILES['doc'])) {


      $uid = mysqli_real_escape_string($con, $_POST['uid']);
      $uid = htmlspecialchars($uid);
      $v_id = mysqli_real_escape_string($con, $_POST['v_id']);
      $v_id = htmlspecialchars($v_id);
      $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
      $service_type = htmlspecialchars($service_type);
      $vehicle_no = mysqli_real_escape_string($con, $_POST['vehicle_no']);
      $vehicle_no = htmlspecialchars($vehicle_no);
      $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
      $start_date = htmlspecialchars($start_date);
      $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
      $end_date = htmlspecialchars($end_date);

      $img_name = $_FILES['doc']['name'];
      $imgtmpname = $_FILES['doc']['tmp_name'];
      $imgsize = $_FILES['doc']['size'];
      $imgerror = $_FILES['doc']['error'];
      $imgtype = $_FILES['doc']['type'];



      if (!empty($_POST['uid']) && !empty($_POST['v_id']) && !empty($_POST['service_type']) && !empty($_POST['vehicle_no']) && !empty($_POST['start_date']) && !empty($_POST['end_date']) && $_FILES['doc']['name'] =='') {

    
            $cmd = "update vehicle_details set vehicle_no='$vehicle_no',service_type='$service_type' , start_date='$start_date',end_date='$end_date' where v_id='$v_id' ";
            $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

            if ($result) {

            ?>

                  <script type="text/javascript">
                        alert('Vehicle Details Updated Successfully... !');
                        // window.location = './addvehicle';
                        // window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                        history.go(-1)
                  </script>

            <?php

            } else {

            ?>

                  <script type="text/javascript">
                        alert('Failed... !');
                        window.location.href = "./editevdetails.php?v_id=<?php echo $v_id; ?>?uid=<?php echo $uid; ?>";
                  </script>

            <?php

            }
      } else if (!empty($_POST['uid']) && !empty($_POST['v_id']) && !empty($_POST['service_type']) && !empty($_POST['vehicle_no']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])   && $_FILES['doc']['name'] !='') {

           
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

                              $cmd = "update vehicle_details set vehicle_no='$vehicle_no',service_type='$service_type', start_date='$start_date',end_date='$end_date', document='$doc_path' where v_id='$v_id' ";
                              $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                              if ($result) {

            ?>

                                    <script type="text/javascript">
                                          alert('Vehicle Details Updated Successfully... !');
                                          // window.location.href = "./addvehicle.php?uid=<?php echo $uid; ?>";
                                          history.go(-1)
                                    </script>



                              <?php



                              } else {

                              ?>

                                    <script type="text/javascript">
                                          alert('Failed... !');
                                          window.location.href = "./editevdetails.php?v_id=<?php echo $v_id; ?>?uid=<?php echo $uid; ?>";
                                    </script>

                              <?php

                              }
                        } else {
                              ?>

                              <script type="text/javascript">
                                    alert('Large file...!');
                                    window.location.href = "./editevdetails.php?v_id=<?php echo $v_id; ?>?uid=<?php echo $uid; ?>";
                              </script>

                        <?php
                        }
                  } else {
                        ?>

                        <script type="text/javascript">
                              alert('Error...!');
                              window.location.href = "./editevdetails.php?v_id=<?php echo $v_id; ?>?uid=<?php echo $uid; ?>";
                        </script>

                  <?php
                  }
            } else {
                  ?>

                  <script type="text/javascript">
                        alert('Invalid File Extension...!');
                        window.location.href = "./editevdetails.php?v_id=<?php echo $v_id; ?>?uid=<?php echo $uid; ?>";
                  </script>

      <?php
            }
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