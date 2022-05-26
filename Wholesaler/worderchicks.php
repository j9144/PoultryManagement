<?php

session_start();
   include('DbConnect.php');
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
      <title>Wholesaler| Order Bird</title>
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
      <?php include('include/wheader.php');?>
      <div class="wrapper">
      <div class="container">
         <div style = "margin-left:-30px">
            <?php include('include/wsidebar.php');?>				
            <div class="span9">
               <div class="content">
                  <div class="module" style = "margin-top:5px;margin-left:50px;width:900px;">
                     <div class="module-head">
                        <h3>Order Birds from Farmer</h3>
                     </div> <br>
    
   
    <div class="tm-main-section light-gray-bg">
      
      <div class="container" id="main" style = "margin-top:5px;margin-left:-180px;width:900px;">
         
          <div id="cat">
            <form action="worderchickspayment.php" method="post">
              <CENTER><h3>ORDER BIRDS FROM FARMERS</h3></CENTER>
               <label for="hhatchery_id">Select Farmer</label>
             <?php
                $sql1="SELECT StaffReg_Id, Name FROM tbl_staffregister WHERE Type_Id=1";
                $res1=mysqli_query($con,$sql1);
                ?>
              <select class="form-control input-lg" name="farmer" id="farmer">
                <?php
                 while($row=mysqli_fetch_array($res1))
                {
                  ?>
                  <option value="<?php echo $row['StaffReg_Id'];?>"><?php echo $row['Name']; ?></option>
                  <?php
                $id=$row['StaffReg_Id'];
                }
                ?>
              </select>
            
              <label for="farmer_id">Select Batch</label>
             <?php
                $sql="SELECT Bird_Id, BirdDate,BirdCount FROM `tbl_addbird`;";
                $res=mysqli_query($con,$sql);
                ?>
              <select class="form-control input-lg" name="batch" id="batch">
                <?php
                 while($row1=mysqli_fetch_array($res))
                {
                  ?>
                  <option value="<?php echo $row1['Bird_Id'];?>"><?php echo $row1['BirdDate']." Stock available : ".$row1['BirdCount']; ?></option>
                  <?php
                
                }
                ?>
              </select>
              
              
            <label for="quantity">No. of Chicks</label>

              <input type="number" class="form-control input-lg" id="count" name="count" placeholder="Enter Count " required="please" onchange="myFunction()">

              <!-- <label for="ddate">Date of Delivery</label>

              <input class="form-control input-lg" type="date" id="hdate" name="hdate" placeholder="Date of Delivery of order " required="please">
              <label for="weight">Delivery Address</label>

             <textarea   class="form-control input-lg" id="address" name="address" placeholder="Enter address to Deliver" required="please enter address"></textarea> -->

              <input type="submit" value="Order" name = "sub">
              
            </form>
          </div>
      </div>
    </div> 
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
    
 </body>
 <script>
function myFunction() {
  var x = document.getElementById("count");
  var y = document.getElementById("batch");

  var count = x.value;
  var stock = y.value;
  window.alert (count);

  

}
</script>
 </html>