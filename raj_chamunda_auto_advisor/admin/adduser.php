<?php
session_start();
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

            <title>Dashboard</title>

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

                              <li><a href="adduser" class="active"><span class="fa fa-user-plus"></span><span>Add User</span></a></li>

                              <li><a href="userdetails"><span class="fa fa-list-alt"></span><span>User Details</span></a></li>

                              <li><a href="expiry"><span class="fa fa-comments"></span><span>Expiry</span></a></li>





                        </ul>



                  </div>










            </div>



            <div class="main-content">

                  <header>



                        <h2>

                              <label for="nav-toggle">

                                    <span class="fa fa-align-justify"></span>

                              </label>

                              Add User

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



            <!-- main-content -->

            <h2 class="title">Fill the information of User</h2><br><br><br>

            <form action="./back/add_customer.php" class="form-horizontal" method="post">

                  <div class="container" id="emi">

                        <div class="form-group">

                              <div class="row">

                                    <div class="col">

                                          <label>Customer Name :</label>

                                    </div>

                                    <div class="col">

                                          <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required><br><br>

                                    </div>



                                    <div class="col">

                                          <label>Contact no. :</label>

                                    </div>

                                    <div class="col">

                                          <input type="text" minlength="10" maxlength="10" name="contact_no" class="form-control" placeholder="Enter Contact Number" required><br><br>

                                    </div>





                                    <div class="col">

                                          <input type="submit" name="submit" class="submit" id="submit"></input>

                                    </div>

                              </div>

                        </div>

                  </div>



            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

           


      </body>



      </html>

<?php
} else {
      echo header('Location: ../login.php');
}
?>