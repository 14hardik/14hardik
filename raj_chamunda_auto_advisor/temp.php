<?php

include_once("./admin/db/connection.php");

$cmd = "select * from vehicle_details ";
$result = mysqli_query($con, $cmd) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {

      $end_date = $row['end_date'];
      $start_date = $row['start_date'];


      $sd = strtotime($start_date);
      $ed = strtotime($end_date);

      $diffs = $sd - $ed;
      $temp = abs(floor($diffs / (60 * 60 * 24)));

      // echo 'SD :' . $start_date . '<br><br>';
      // echo 'ED :' . $end_date . '<br><br>';
      // echo $diffs;
      // echo $temp . '<br><br>';

      $exp = $temp - 5;
      // echo $exp;

      if ($exp == '0') {
            echo 'SD :' . $start_date . '<br><br>';
            echo 'ED :' . $end_date . '<br><br>';
      }
      // echo 'SD :'. $sd . '<br><br>';
      // echo 'ED :'. $ed . '<br>';
}
