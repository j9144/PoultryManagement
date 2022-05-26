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
      <title>Supplier| View Stock</title>
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
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
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
                  <div class="module" style = "margin-top:5px;margin-left:50px;width:900px;height:700px">
                     <div class="module-head">
                        <h3>View Stock</h3>
                     </div> <br>
    
 
          <section class="tm-welcome-section" style="padding: 100px;">
    <div class="" style="text-align: center; padding-left:50px; color:black">
      <h1 style="color: black;padding-top: 30px; ">BIRD STOCK</h1>

  <?php

  //include("dbconnection.php");
    //$login=$_SESSION['id'];
  $sql1="select * from `tbl_hatchery` where Hatchery_Count>0";
  $res1=mysqli_query($con,$sql1);
   $n=mysqli_num_rows($res1);
if($n==0)
{
  echo "<div class='container' id='cont'><h1>Your Stock is empty Please add Birds</h1></div>";
}
else
{
  echo "<table class='table table-responsive' id='tbl' class='table' style='display:block; padding:50px;padding-left:500px; color:black; font-size:20px;'>";
  echo "<tr>";
  echo"<th> COUNT</th>";
  echo"<th>BATCH DATE</th>";
  echo"<th>PRICE</th>";

  echo"</tr>";
  while($row=mysqli_fetch_array($res1))
  {
     
  echo"<tr >";
  echo"<td>",$row['Hatchery_Count'],"</td><td>&nbsp;",$row['Hatchery_Date'],"</td>";
  
     echo "<td>&nbsp;",$row['Hatchery_Price'],"</td>";
     // $id=$row['hbird_id']
  ?>
  <!-- <td><a href='farmerupdate_stock.php?id=<?php echo $id?>' class='button button1'>Update</a></td> -->
   
 <?php echo"</tr>";

  }
  echo"  </table>";
  }?>
</div>

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