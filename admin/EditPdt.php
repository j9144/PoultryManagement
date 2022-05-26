<?php
include  "adminheader.php";
include "DbConnect.php";
$id = $_GET['id'];
$sql = mysqli_query($con,"select * from tbl_product where id='$id'");
$row = mysqli_fetch_array($sql);

if(isset($_POST["sub"])){
    $name = $_POST["name"];
    
    $price = $_POST["price"];

    $code = $_POST['code'];
     

   if($_FILES["image"]["tmp_name"]!=="")
       $image = $_FILES["image"]["name"];
       else
       $image = $row["image"];

    move_uploaded_file($_FILES["image"]["tmp_name"],"product-images/".$_FILES["image"]["name"]);
   $edit =  "update `tbl_product` set name ='$name ', code = '$code', price = '$price',image = '$image' where id='$id'";
   $result = mysqli_query($con,$edit);
   //header('location:ProductList.php');
   
   
}



?>

<html>
    <style>
        
.panel-default {
    border-color: #ddd;
}

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-left: 257px;
}

.panel-heading {
    padding: 10px 218px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body {
    padding: 15px;
}
.row {
    margin-right: -15px;
    margin-left: 228px;
}
    ul.resp-tabs-list, p {
    margin: 0px;
    padding: 0px;
}

        </style>
<div class="panel panel-default">
        <div class="panel-heading" style = "text-align : center">EDIT PRODUCT</div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">

                  
                  <div class="col-sm-3">

                  <label>Product Name</label>  
                   <input type="text" name="name" value ="<?php echo $row['name'];?> " class="form-control"/> <br>

                   <label>Product Code</label>  
                   <input type="text" name="code" value ="<?php echo $row['code'];?> " class="form-control"/> <br>
                   
                   <label>Price</label>  
                   <input type="text" name="price" value ="<?php echo $row['price'];?> " class="form-control"/> <br>

                   <label>Image</label> 
                    <input type="file" name="image" accept="image/*" id="image" class="form-control" onchange="preview_Image(event)"/> <br>
                   <img src="product-images/<?php echo $row['image'];?>" height = "100" width = "100"/>  &nbsp;
             
                   <input type = "submit" class="btn btn-success" name = "sub" value = "Update">

</div>
</form>


                     
                <div class="table-responsive" style = "margin-left:420px">  
                     <table class="table table-bordered usertable">  
                         <thead>
                         <tr class="bg-warning">
       


                    <tr>
                    
                    <th>Product</th>
                    <th>Price</th>
                    <th>Category</th>
                   <!-- <th>Edit</th>
                    <th>Delete</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        include ('DbConnect.php');
                        $result = mysqli_query($con,"select tbl_category.Category_name,tbl_product.name,tbl_product.price from tbl_category JOIN tbl_product
                         ON tbl_category.Category_Id = tbl_product.Category_Id");

                     
                     
                        while($row = mysqli_fetch_array($result)){?>
                        
                           <tr>
                           
                               <td><?php echo $row["name"];?> </td>
                               <td><?php echo $row["price"];?> </td>
                               <td>
                                   <?php 
                                        
                                       
                                        echo $row['Category_name'];
                                        
                                    
                                    ?> 
                                    </td>
                               
                                    </tr>
                      <?php
                     }
                     
                     ?>
                    </tbody>
                </table>
            </div>
</div>
</div>
</div>
<!--</div>
</div>-->
</table>

</html>

<script>
function preview_Image(event)
			{
				 var reader = new FileReader();
				 reader.onload = function()
				 {
				  	var output = document.getElementById('imageDis');
				  	output.src = reader.result;
				 }
 					reader.readAsDataURL(event.target.files[0]);
					document.CreatePdt.Quantity.focus();
			}
    
    
    </script>


    