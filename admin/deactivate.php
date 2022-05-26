<?php
  
    
    include('DbConnect.php');
  
  
    if (isset($_GET['id'])){
  
        
        $id=$_GET['id'];
  
       
        
        $sql="UPDATE `tbl_product` SET 
            `status`= 0 WHERE id='$id'";
  
        
        mysqli_query($con,$sql);
    }
  
    
    header('location: addproduct.php');
?>