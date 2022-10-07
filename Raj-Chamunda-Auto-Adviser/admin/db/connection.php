<?php

$con = mysqli_connect("localhost","root","","rto") or die("Error in connection");
if(mysqli_connect_errno()){
     echo "Connection Fail".mysqli_connect_error();
}

// $con = mysqli_connect("localhost","dharmikG","RajChamunda@@01","rajchamunda") or die("Error in connection");
// if(mysqli_connect_errno()){
//      echo "Connection Fail".mysqli_connect_error();
// }
?>