<?php
session_start();
include_once("./db/connection.php");

$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);

if ($_SESSION['username'] && $_SESSION['password']) {

      if (isset($_GET['v_id']) && isset($_GET['uid'])) {

            $v_id = mysqli_real_escape_string($con, $_GET['v_id']);
            $v_id = htmlspecialchars($v_id);

            $uid = mysqli_real_escape_string($con, $_GET['uid']);
            $uid = htmlspecialchars($uid);

            $cmd = "select * from vehicle_details where v_id='$v_id'";

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
            }

?>



            <!DOCTYPE html>

            <html lang="en">



            <head>

                  <meta charset="UTF-8">

                  <meta http-equiv="X-UA-Compatible" content="IE=edge">

                  <meta name="viewport" content="width=device-width, initial-scale=1.0">

                  <title>Edit Vehicle Details</title>

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

                              <h3 class="logo-img">Raj chamunda auto adviser</h3>


                              <h3><span></span></h3>

                              <hr>

                        </div>

                        <div class="sidebar-menu">

                              <ul>

                                    <li><a href="dash"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                                    <li><a href="adduser" class="active"><span class="fa fa-user-plus"></span><span>Add User</span></a></li>

                                    <li><a href="userdetails"><span class="fa fa-list-alt"></span><span>User Details</span></a></li>

                                    <li><a href="select"><span class="fa fa-comments"></span><span>Expiry</span></a></li>





                              </ul>



                        </div>










                  </div>



                  <div class="main-content">

                        <header>



                              <h2>

                                    <label for="nav-toggle">

                                          <span class="fa fa-align-justify"></span>

                                    </label>

                                    Edite Vehicle Details

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
                                          <!-- <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                                <a href="addvehicle.php?uid=<?php echo $uid; ?>" itemprop="item">
                                                      <span itemprop="name">Add Vehicle</span>
                                                </a>
                                                <meta itemprop="position" content="1" />
                                          </li> -->
                                          <li> Edite Vehicle Details</li>
                                    </ol>
                              </nav>
                        </div>
                  </div>



                  <div id="return"></div>

                  <!-- main-content -->

                  <h2 class="title">
                        <!-- Fill the information of User -->
                  </h2><br><br><br>

                  <form onsubmit="return submitData(this);" id='vehicledata' class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="container" id="emi">

                              <div class="form-group">

                                    <div class="row">
                                          <input type="hidden" name="uid" id="uid" class="form-control" value="<?php echo $uid; ?>"><br><br>
                                          <input type="hidden" name="v_id" id="v_id" class="form-control" value="<?php echo $v_id; ?>"><br><br>

                                          <div class="col">

                                                <label>Select Type <sup style="color:white;">*</sup></label>

                                                <div class="col">

                                                      <select name="service_type" id="service_type">

                                                            <option value="<?php echo $service_type; ?>"><?php echo $service_type; ?></option>
                                                            <?php
                                                            $q = "select * from service_type where service_name!='$service_type' order by id asc";
                                                            $result = mysqli_query($con, $q);
                                                            ?>

                                                            <?php
                                                            while ($rows = mysqli_fetch_array($result)) {
                                                            ?>
                                                                  <option value="<?php echo $rows['service_name']; ?>"><?php echo $rows['service_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>



                                                      </select><br><br>

                                                </div>

                                          </div>


                                          <div class="col">

                                                <label>Vehicle No.<sup style="color:white;">*</sup></label>

                                          </div>

                                          <div class="col">

                                                <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="Enter Vehicle No." value="<?php echo $vehicle_no; ?>"><br><br>

                                          </div>


                                          <div class="col">

                                                <label>Start Date.<sup style="color:white;">*</sup></label>

                                          </div>

                                          <div class="col">

                                                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Starting Date " value="<?php echo $start_date; ?>"><br><br>

                                          </div>

                                          <div class="col">

                                                <label>Last Date.<sup style="color:white;">*</sup></label>

                                          </div>

                                          <div class="col">

                                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Ending Date " value="<?php echo $end_date; ?>"><br><br>

                                          </div>
                                          <div class="col">

                                                <label>Upload Document.</label>

                                          </div>
                                          <br>
                                          <div class="col">

                                                <!-- <input type="file" name="doc" id="doc" style="height:40px;color:white;" class="form-control" aria-describedby="helpId" /><br /> -->
                                                <!-- <img src="<?php echo $document; ?>" alt="" style="width:50%;height:50%;"> -->
                                                <img src="<?php echo $document; ?>" alt="" style="width:70%;height:150px;">


                                                <input type="file" name="doc" id="doc" style="height:40px;color:white;" class="form-control" aria-describedby="helpId" /><br />

                                          </div>




                                          <!-- <br> -->
                                          <small style="color:white; font-size:1rem;font-weight:bold;">* Fields are
                                                Mandatory</small>


                                          <br>
                                          <!-- <hr> -->
                                          <br>



                                          <div class="col">

                                                <button type="submit" name="submit" id="submit" class="submit">SUBMIT</button>

                                          </div>

                                          <div id="return"></div>
                                    </div>

                              </div>


                        </div>



                  </form>
                  <div id="return"></div>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                  <!-- custom javascript -->
                  <script src="./js/editevdetails.js"></script>



            </body>



            </html>

      <?php
      } else {
      ?>
            <script>
                  alert('Page not found!');
            </script>
<?php
      }
} else {
      echo header('Location: ../login.php');
}
?>