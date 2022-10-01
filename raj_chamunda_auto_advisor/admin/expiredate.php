<?php
session_start();
include_once("./db/connection.php");
$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);

if ($_SESSION['username'] && $_SESSION['password']) {




?>


      <!DOCTYPE html>

      <html lang="en">

      <head>

            <meta charset="UTF-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>ExpiredDate Records</title>

            <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

            <link rel="stylesheet" href="./design/css/dash.css">

            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



      </head>



      <body>

            <input type="checkbox" id="nav-toggle">

            <div class="sidebar">

                  <div class="sidebar-brand">

                        <img class="logo-img" src="../Images/shiv-finance logo.png" alt="align box" align="left">

                        <h3><span></span></h3>

                        <hr>

                  </div>

                  <div class="sidebar-menu">

                        <ul>

                              <li><a href="dash"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                              <li><a href="adduser"><span class="fa fa-user-plus"></span><span>Add User</span></a></li>

                              <li><a href="userdetails"><span class="fa fa-list-alt"></span><span>User Details</span></a></li>

                              <li><a href="expiredate" class="active"><span class="fa fa-comments"></span><span>Expiry</span></a></li>

                        </ul>



                  </div>

            </div>

            <div class="main-content">

                  <header>



                        <h2>

                              <label for="nav-toggle">

                                    <span class="fa fa-align-justify"></span>

                              </label>

                              ExpiredDate Records

                        </h2>



                        <div class="user-wrapper">

                              <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                              <div>

                                    <h4>Test</h4>


                                    <small>Admin</small>



                              </div>

                              <div id="data-title" class="visible">

                                    <a href="./back/function/logout.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>

                              </div>

                        </div>


                  </header>

            </div>


            <!-- <form id="form" class="form-details" method="post">
                  <div class="container">

                        <div class="form-groups">

                              <div class="rows">

                                    <div class="col">

                                          <label>Customer Name :</label>

                                          <p><?php echo $user_name; ?></p>

                                    </div><br>







                                    <div class="col">

                                          <label>Contact No. :</label>

                                          <p><?php echo $contact_no; ?></p>

                                    </div>
                                    


                              </div>

                        </div>

                  </div>
            </form> -->


            <div class="position">
                  <div class="container-breadcrumb">
                        <nav aria-label="Breadcrumb" class="breadcrumb">
                              <ol itemscope itemtype="https://schema.org/BreadcrumbList">
                                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                          <a href="dash" itemprop="item">
                                                <span itemprop="name">Dashboard</span>
                                          </a>
                                          <meta itemprop="position" content="1" />
                                    </li>

                                    <li> ExpiredDate Records</li>
                              </ol>
                        </nav>
                  </div>
            </div>



            <div class="responsive-table">


                  <table id="file_export" class="table table-striped table-bordered display">



                        <thead class="thead">

                              <tr align="center">



                                    <th>Index</th>

                                    <th>Vehicle Number</th>

                                    <th>Type</th>

                                    <th>Start Date</th>

                                    <th>End Date</th>
                                    <th>Document</th>

                                    <th>Edit</th>

                                    <th>Delete</th>
                              </tr>

                        </thead>

                        <tbody id="tbody" align="center">

                              <?php

                              $count = 0;

                              $cmd = "select * from vehicle_details order by end_date desc";

                              $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                              while ($row = mysqli_fetch_array($result)) {

                                    $id = $row['id'];
                                    $uid = $row['uid'];
                                    $v_id = $row['v_id'];
                                    $vehicle_no = $row['vehicle_no'];
                                    $service_type = $row['service_type'];
                                    $start_date = $row['start_date'];
                                    $end_date = $row['end_date'];
                                    $document = $row['document'];

                                    $today_date = date('Y-m-d');

                                    $sd = strtotime($today_date);
                                    $ed = strtotime($end_date);

                                    $diffs = $sd - $ed;
                                    $temp = abs(floor($diffs / (60 * 60 * 24)));

                                    $exp = $temp - 5;

                                    if ($exp == '0' || $exp <= '0') {



                              ?>



                                          <tr id="delete<?php echo $row['id'] ?>">



                                                <td><?php echo $count = $count + 1; ?></td>

                                                <td><?php echo $vehicle_no; ?></td>
                                                <td><?php echo $service_type; ?></td>

                                                <td><?php echo $start_date; ?></td>

                                                <td><?php echo $end_date; ?></td>
                                                <td>
                                                      <?php

                                                      if ($document === 'Upload Document') {
                                                            // echo $document;
                                                      ?>
                                                            <img src="<?php echo $document; ?>" alt="Upload Document" style="width:100%;height:100%;">
                                                      <?php
                                                      } else {

                                                      ?>
                                                            <a href="<?php echo $document; ?>" target="_blank">
                                                                  <img src="<?php echo $document; ?>" alt="" style="width:100%;height:100%;">
                                                            </a>
                                                      <?php
                                                      }
                                                      ?>
                                                </td>










                                                <td>

                                                      <form class="edit" action="editevdetails.php" method="get">

                                                            <input type="hidden" name="v_id" id="v_id" value="<?php echo $v_id; ?>">
                                                            <input type="hidden" name="uid" id="uid" value="<?php echo $uid; ?>">

                                                            <button type="submit" id="action" class="update">Edit</button>

                                                      </form>

                                                </td>




                                                <td>



                                                      <div id="return"></div>

                                                      <center>

                                                            <button type="button" class="delete" onclick="removeVehicle(<?php echo $row['id']; ?>)">Delete</button>

                                                      </center>

                                                </td>

                                          </tr>



                              <?php



                                    }
                              }
                              ?>





                        </tbody>

                  </table>

                  <div id="output"></div>



            </div>

            <script src="./../assets/libs/jquery/dist/jquery.min.js"></script>

            <script src="./../assets/extra-libs/DataTables/datatables.min.js"></script>

            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

            <script src="./../dist/js/pages/datatable/datatable-advanced.init.js"></script>




            <!-- custom javascript -->
            <!-- <script src="./js/addvehicle.js"></script> -->

            <script src="./js/removevehicle.js"></script>




      </body>



      </html>
<?php

} else {
      echo header('Location: ../login.php');
}
?>