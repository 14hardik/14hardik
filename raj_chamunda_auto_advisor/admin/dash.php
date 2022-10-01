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

                        <!-- <img class="logo-img" src="../Images/shiv-finance logo.png" alt="Raj chamunda auto adviser" align="left"> -->
                        <h1 class="logo-img">Raj chamunda auto adviser</h1>


                        <h3><span></span></h3>

                        <hr>

                  </div>

                  <div class="sidebar-menu">

                        <ul>

                              <li><a href="dash" class="active"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                              <li><a href="adduser" ><span class="fa fa-user-plus"></span><span>Add User</span></a></li>

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

                              Dashboard

                        </h2>

  



                        <div class="user-wrapper">

                              <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                              <div>

                                    <h4><?php echo $username ?></h4>
                              


                                    <small>Super Admin</small>



                              </div>

                              <div id="data-title" class="visible">

                                    <a href="./back/function/logout.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>

                              </div>

                        </div>

                  </header>



                  <main>

                        <div class="cards">

                              <a href="data.php?service_type='Insurance'" class="card-single1">

                                    <div>
                                          <h1>Insurance</h1>
                                          <span>12</span>
                                          

                                    </div>



                              </a>





                              <a href="car_loan.php" class="card-single2">

                                    <div>

                                          <h1>Tax</h1>

                                          <span>5</span>

                                    </div>



                              </a>

                              <a href="mortgage_loan.php" class="card-single3">

                                    <div>

                                          <h1>PUC</h1>

                                          <span>6</span>

                                    </div>

                              </a>

                        

                              <a href="top-up_loan.php" class="card-single4">

                                    <div>

                                          <h1>Parsing</h1>
                                          <span>8</span>

                                    </div>

                              </a>
                           

                                    
                                    <a href="personal_loan.php" class="card-single5">
                                          
                                          <div>
                                                
                                                <h1>Permit</h1>
                                                
                                                <span>9</span>
                                                
                                          </div>
                                          
                                    </a>
                                    
                          
                           

            </div>

            </main>

            </div>


            <!-- script -->

            <!-- custom javascript  -->

            <script src="./js/check_session.js"></script>




      </body>



      </html>



<?php
} else {
      echo header('Location: ./account');
}
?>