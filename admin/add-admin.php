<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>  <?php  if(isset($_SESSION['add']))

               echo $_SESSION['add'];
               unset($_SESSION['add']) ;
        
               
     ?>

        <br><br>

<form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

</div>
</div>

<?php include('partials/footer.php'); ?>



<!-- get data from web -->

<?php 


 if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        // 2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            user_name='$username',
            password='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
// echo $db_select;



// echo $res;


if($res==TRUE)


{

    // echo "data inserted";

$_SESSION['add']= " <div class='success'> Admin added done</div> " ;

header("location:".SITEURL.'admin/manage-admin.php');



}

else
{

$_SESSION['add']= " Not add try again";

header("location:".SITEURL.'admin/manage-admin.php');


}
}

// }

 ?>



