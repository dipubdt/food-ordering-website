<?php 

    //Include constants.php file here
    include('../config/constants.php');

   

      if(isset($_GET['id']) && isset($_GET['status'])) 

{  

      $id = $_GET['id'];
        $status = $_GET['status'];


        if ($status == "Cancelled")

        {
         


    $sql= " DELETE FROM tbl_order WHERE id = $id  ";

    $res = mysqli_query($conn,$sql) ;


    if($res==TRUE)

    {

      $_SESSION['delete'] = "<div class='success'>Order Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-order.php');

    }

     else
    {
       

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Order. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    }


     }

     else {
                $_SESSION['delete'] = "<div class='error'> Order status Not Cancelled </div>";
        header('location:'.SITEURL.'admin/manage-order.php');

     }


}

else {
                $_SESSION['delete'] = "<div class='error'>try again </div>";
        header('location:'.SITEURL.'admin/manage-order.php');

     }



?>