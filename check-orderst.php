 <?php include('partials-front/menu.php'); ?>


<div class="main-content"  >
    <div class="wrapper">
        <h1>Check Order Status </h1>

                <br /><br /><br />

                <?php

                      if(isset( $_SESSION['order'] ))
                    {
                        echo  $_SESSION['order'] ;
                        unset( $_SESSION['order'] );
                    }

                     

                     if(isset( $_SESSION['delete']  ))
                    {
                        echo  $_SESSION['delete'] ;
                        unset( $_SESSION['delete'] );
                    }
                ?>

                <br><br>

             


 <table class="tbl-full">

    <form action="" method="POST" >


                <tr>
                    <td><h3>Contact No</h3> </td>
                    <td>
<!-- 
                        <td><b> <?php echo $contact; ?> </b></td> -->
                           <input  class="size" type="tel" name="contact"  placeholder="Enter your Phone Number "required>
                    </td>
                </tr>

 <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Check Status" class="btn-secondary">
                    </td>
                </tr>
</form>
 </table>




<table class="tbl-full customers">
                    <tr>
                        <th>S.N.</th>
                        <th>&nbsp;Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                       <!--  <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th> -->
                        <th>Actions</th>
                    </tr>


<?php 


 if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['contact'];
        
       
        // 2. SQL Query to Save the data into database
        $sql = "SELECT *FROM  tbl_order WHERE  customer_contact=$full_name" ;
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql);


         if ($res==TRUE)
         {
                        //Count the Rows
     $count = mysqli_num_rows($res);




     $sn = 1; //Create a Serial Number and set its initail value as 1

       if($count>0)
       {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];

                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                       <!--  <td><?php //echo $customer_name; ?></td>
                                        <td><?php //echo $customer_contact; ?></td>
                                        <td><?php //echo $customer_email; ?></td>
                                        <td><?php //echo $customer_address; ?></td> -->
                                        <td>
                                            <a href=" <?php echo SITEURL; ?>admin/cancel-order.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>" class="btn-danger" >cancel Order</a>




                                         

                                         
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available

               $_SESSION['delete'] = "<div class='error'>No Order Available</div>";
        //Redirect to Manage Admin Page
         header('location:'.SITEURL.'check-orderst.php');

                        }




                    }

        else{
              $_SESSION['delete'] = "<div class='error'>Contact no incorrect</div>";
        //Redirect to Manage Admin Page
         header('location:'.SITEURL.'check-orderst.php');


            
        }


   }



                    ?>
         
 
                </table>
    </div>




<br>
<br>
<br>
<br>
  </div>

  <?php include('partials-front/footer.php'); ?>