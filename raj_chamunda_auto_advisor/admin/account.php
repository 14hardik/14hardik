
<!DOCTYPE html>

<html lang="en">
 


<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    
    <link rel="icon" href="./../Images/shiv-finance logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./design/css/loginform.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>



<body>

    <img class="logo-img" src="./../Images/logo.webp" width="200" height="200" align box" align="center">

    <form action="./back/login" class="form-horizontal" method="post">
          
          <div class="container">
      


         
            <div class="form-group">

                <div class="row">

                    <div class="col">

                        <label><span class="fa fa-user-circle"></span>User Name :</label>

                    </div>

                    <div class="col">

                        <input type="text" class="form-control" name="uname" placeholder="Enter Username"  ><br><br>

                    </div>



                    <div class="col">

                        <label><span class="fa fa-lock"></span>Password :</label>

                    </div>

                    <div class="col">

                        <input type="password" class="form-control" name="password" placeholder="Enter Password" ><br><br>

                    </div>








                    <div class="col">

                        <button type="submit" name="submit" class="submit" id="submit">Login</button>

                    </div>

                </div>

            </div>

        </div>



    </form>


    





</body>



</html>