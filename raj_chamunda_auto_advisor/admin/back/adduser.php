<?php

include_once("../db/connection.php");

if (isset($_POST['user_name']) && isset($_POST['contact_no'])) {

     $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
     $user_name = htmlspecialchars($user_name);
     $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
     $contact_no = htmlspecialchars($contact_no);
     $user_id = uniqid();
     // echo "///////////////////////////////////////////////////////////". $user_name;

     $sel = "select * from user_details where user_name='$user_name' and contact_no='$contact_no'";
     $ex = mysqli_query($con, $sel) or die(mysqli_error($con));


     if (mysqli_num_rows($ex) < 1) {

     $cmd = "INSERT INTO `user_details` (`id`, `uid`, `user_name`, `contact_no`, `status`) VALUES 
     (NULL, '$user_id', '$user_name', '$contact_no', '0')";
     $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

     if ($result) {

?>

          <script type="text/javascript">
               alert('User added Successfully... !');
               window.location = './dash';
          </script>

        

     <?php



     } else {

     ?>

          <script type="text/javascript">
               alert('Failed... !');
               window.location = './dash';
          </script>

<?php

     }
     
}else{
     ?>

     <script>
           alert('This User is already exist...!');
           window.location = './dash';
     </script>


<?php
}
}
else{
     ?>
     <script>
          alert('Somthing Went Wrong...!');
     </script>
<?php
}

$con->close();

?>