<?php

session_start();
   include('../DbConnect.php');
   if(strlen($_SESSION['Email'])==0)
   	{	
   header('location:..\stafflogin.html');
   }
   else{
   date_default_timezone_set('Asia/Kolkata');// change according timezone
   $currentTime = date( 'd-m-Y h:i:s A', time () );




?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Supplier| View Orders</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	  <script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
	  <script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
	  <link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="css/datatables/datatables.css">
 
  <!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" /> -->
<style type="text/css">
  .buttonn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
 .buttonn1 {
background-color: #cc0000; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
 .buttonn2 {
background-color: #99ff33; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 3px 1px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}

  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#cat{
  width: 600px;
    margin: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.tm-main-section { padding: 100px; padding-left: 150px; }
div.main {
  width: 100px;
  margin: auto;
}
#cont
{
  padding:50px;
  font-weight: bolder;
  color: white;
}
</style>

  </head>
  <body>
      <?php include('include/dheader.php');?>
      <div class="wrapper">
      <div class="container">
         <div style = "margin-left:-30px">
            <?php include('include/dsidebar.php');?>				
            <div class="span9">
               <div class="content">
                  <div class="module" style = "margin-top:5px;margin-left:50px;width:900px;">
                     <div class="module-head">
                        <h3>View Orders from Farmers</h3>
                     </div> <br>
   
 
          <section class="tm-welcome-section" style="padding: 100px;">
    <div class="" style="text-align: center; padding-left:100px; color:black">
      <h1 style="color: black;padding-top: 30px; "> ORDERS FROM FARMERS</h1>

  <?php

  include("../DbConnect.php");
  //$login=$_SESSION['id'];
  // echo $login;
// =9
  $sql1="SELECT tbl_staffregister.Name,tbl_feed.Feed_Type,tbl_orderfeedsupplier.SQuantity,tbl_orderfeedsupplier.SOrderDate,tbl_orderfeedsupplier.Status,tbl_orderfeedsupplier.SOrder_Id FROM tbl_staffregister  JOIN tbl_orderfeedsupplier ON tbl_staffregister.StaffReg_Id = tbl_orderfeedsupplier.Supplier_Id JOIN tbl_feed  ON  tbl_feed.Feed_Id = tbl_orderfeedsupplier.SType_Id where UStatus = 0";
  $res1=mysqli_query($con,$sql1);
  $n=mysqli_num_rows($res1);
if($n==0)
{
  echo "<div class='container' id='cont'><h1>Your Stock is empty Please add Birds</h1></div>";
}
else
{
  ?>
  <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" style = "width:150%">
 <?php
  echo "<tr style=width:70%;>";
  echo"<th style=width:70%;> FARMER NAME</th>";
  echo"<th>FOOD TYPE</th>";
  echo"<th>QUANTITY</th>";
echo"<th>ORDERED DATE</th>";

echo"<th>STATUS</th>";
echo"<th style=width:70%;>UPDATE STATUS</th>";
echo"<th>ACTION</th>";
  echo"</tr>";
  while($row=mysqli_fetch_array($res1))
  {
     
  echo"<tr >";
  //$l=$row['l'];
  $sql="SELECT `Name` FROM `tbl_staffregister`   WHERE  `Type_Id`= 1";
  $res=mysqli_query($con,$sql);

  // echo"<td>",$row['name'],"</td>";
   while($r1=mysqli_fetch_array($res))
  {
  echo "<td>&nbsp;",$r1['Name'],"</td>";
  }
  echo "<td>&nbsp;",$row['Feed_Type'],"</td>";   
  echo "<td>&nbsp;",$row['SQuantity'],"</td>";
     echo "<td>&nbsp;",$row['SOrderDate'],"</td>";
      ?>  
    <td style="width:70%;">
      <?php
       $id=$row['SOrder_Id'];
       
       if($row['Status']=='Approved'){
           echo "<span class='badge badge-pill badge-info'> Approved</span>";
           
       }
       else if($row['Status']=='Processing'){
           echo "<span class='badge badge-pill badge-primary'> Processing </span>";
       }
     
         
         
       else{
           echo "<span class='badge badge-pill badge-danger'> Rejected</span>";
       }
         
         
     

       ?>
     </td>
  

     <td><form method="post"><select class = "form-control" name="ustatus">
                 <option value="">Select One</option>
                 <option value="Rejected">Rejected</option>
                     <option value="Approved">Approved</option>
                     <option value="Processing">Processing</option>
                     
                    
                 </select></td>
     <!-- <?php echo $row['Order_Id']; ?> -->

   <td class="text-center">
                 <div class="btn-group">
                   <button value="<?php echo $row['SOrder_Id']; ?>" type="submit"  name="mbtn" class="btn btn-info btn-flat mbtn">
                       <i class="icon-edit"></i>Update
                     </button>
                  
                     <!-- <a href="edit_order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
                       <i class="icon-edit"></i>
                     </a> -->
                      <button value ="<?php echo $row['SOrder_Id'] ?>" type="submit" class="btn btn-danger btn-flat delete_order" name = "del" >
                       <i class="icon-trash"></i>Delete
                     </button>
                 </div>
     </td>
   </tr>	
   </form>              </tr>
                        <?php } } ?>
                        </div>
                  <?php      

                        if(isset($_POST['mbtn']))
{
    $sid = $_POST['mbtn'];
    $sstatus =$_POST['ustatus'];
    $sql = "update `tbl_orderfeedsupplier` set `Status`='$sstatus'  where `SOrder_Id` = $sid";
    $res = mysqli_query($con,$sql);
    if($res){
        echo ("<script>
        window.location.href='supplier_vieworder.php';
      </script>");
    }
}

if(isset($_POST['del']))
{
    $sid = $_POST['del'];
    //$wstatus =$_POST['ustatus'];
    $sql1 = "update `tbl_orderfeedsupplier` set `UStatus`='1'  where `SOrder_Id` = $sid";
    $res1 = mysqli_query($con,$sql1);
    if($res1){
     
      
    
      echo ("<script>
       window.location.href='supplier_vieworder.php';
       window.reload(1);
      </script>");
      
    }

    
}

?>
  
   
 
    </table>


    </section>
         





       
    <div style="padding: 50x;"></div>
   

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </body>
    <?php include('include/footer.php');?> 
   <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
   <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
   <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
   <script src="scripts/datatables/jquery.dataTables.js"></script>
   <script>
      $(document).ready(function() {
      	$('.datatable-1').dataTable();
      	$('.dataTables_paginate').addClass("btn-group datatable-pagination");
      	$('.dataTables_paginate > a').wrapInner('<span />');
      	$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
      	$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
      } );
   </script>


</html> 
<?php } ?>