<?php

$con = mysqli_connect("localhost","root","","rto") or die("Error in connection");
if(mysqli_connect_errno()){
     echo "Connection Fail".mysqli_connect_error();
}
?>