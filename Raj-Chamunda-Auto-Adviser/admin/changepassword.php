<?php
session_start();
include_once("./db/connection.php");

$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);

if ($_SESSION['username'] && $_SESSION['password']) {

      if (isset($_GET['admin_id'])) {

            $admin_id = mysqli_real_escape_string($con, $_GET['admin_id']);
            $admin_id = htmlspecialchars($admin_id);

            // echo $admin_id;

            $cmd = "select * from admin_data where admin_id='$admin_id' order by admin_id asc";

            $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

            while ($row = mysqli_fetch_array($result)) {

                  $id = $row['id'];
                  $admin_id = $row['admin_id'];

                  $username = $row['username'];

                  $password = $row['password'];
            }

?>



            <!DOCTYPE html>

            <html lang="en">



            <head>

                  <meta charset="UTF-8">

                  <meta http-equiv="X-UA-Compatible" content="IE=edge">

                  <meta name="viewport" content="width=device-width, initial-scale=1.0">

                  <title>Edit Admin Details</title>

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


                                    <li><a href="admindetails" class="active" ><span class="fas fa-user-edit"></span><span>Admin Details</span></a></li>



                              </ul>



                        </div>










                  </div>



                  <div class="main-content">

                        <header>



                              <h2>

                                    <label for="nav-toggle">

                                          <span class="fa fa-align-justify"></span>

                                    </label>

                                    Update Admin Details

                              </h2>



                              <div class="user-wrapper">

                                    <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                                    <div>

                                    <h4><?php echo $username ?></h4>

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
                                          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                                <a href="admindetails" itemprop="item">
                                                      <span itemprop="name">Admin  Details</span>
                                                </a>
                                                <meta itemprop="position" content="1" />
                                          </li>
                                          <li> Edite Admin Details</li>
                                    </ol>
                              </nav>
                        </div>
                  </div>



                  <div id="return"></div>

                  <!-- main-content -->

                  <h2 class="title">
                        <!-- Fill the information of User -->
                  </h2><br><br><br>

                  <form action="./back/adduser" id='edituser' class="form-horizontal" method="post">

                        <div class="container" id="emi">

                              <div class="form-group">

                                    <div class="row">
                                          <input type="hidden" name="admin_id" id="admin_id" class="form-control" value="<?php echo $admin_id; ?>"><br><br>

                                          <div class="col">

                                                <label>User Name<sup style="color:white;">*</sup></label>

                                          </div>

                                          <div class="col">

                                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Admin Username" value="<?php echo $username; ?>"><br><br>

                                          </div>



                                          <div class="col">

                                                <label>Password<sup style="color:white;">*</sup></label>

                                          </div>

                                          <div class="col">

                                                <input type="text"  name="password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo $password; ?>"><br><br>

                                          </div>


                                          <!-- <br> -->
                                          <small style="color:white; font-size:1rem;font-weight:bold;">* Fields are
                                                Mandatory</small>


                                          <!-- <br> -->
                                          <!-- <hr> -->
                                          <!-- <br> -->



                                          <div class="col">

                                                <button type="submit" name="edit" id="edit" class="submit">SAVE</button>

                                          </div>
                                          <div id="return"></div>

                                    </div>

                              </div>

                        </div>



                  </form>
                  <div id="return"></div>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                  <!-- custom javascript -->
                  <!-- <script src="./js/edituser.js"></script> -->
                  <script src="./js/editadmin.js"></script>



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
      echo header('Location: ./account');
}
?>