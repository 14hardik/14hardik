
<?php
        if((!isset($_SESSION['branch'])))
        {
          header("location:back/function/logout.php"); 
          exit;
        }
?>
