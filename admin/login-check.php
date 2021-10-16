<?php



if(!isset($_SESSION['user']))

{
      

  $_SESSION['no-login-massage'] = "<div class='error'> <h3>Please Login to Acces</h3> </div>";

        header('location:'.SITEURL.'admin/login.php');

}


?>