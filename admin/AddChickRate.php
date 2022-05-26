<?php
session_start();
include('DbConnect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
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
	<title>Admin| Add Chick Rate</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poultry Farm</title> -->
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstraps.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet"> -->
  
  <!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" /> -->
<style type="text/css">
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
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.tm-main-section { padding: 150px; }
</style>

  </head>
  <body>
<?php include('include/header.php');?>

<div class="wrapper">
    <div class="container">
        <div style = "margin-left:-30px">
<?php include('include/sidebar.php');?>				
        <div class="span9">
                <div class="content">
<div class="module" style = "width:900px;margin-top:2px">
                        <div class="module-head">
                            <h3>Add Chick Rate</h3>
                        </div>
   
    <div class="tm-main-section light-gray-bg">
      <div class="container" id="main" >
          <div id="cat" style="width:500px;margin-left:-40px">
            <form action="AddRate.php" method="post">
              <CENTER><h3>ADD CHICK RATE TODAY</h3></CENTER>
              <label for="fname">RATE (per kg)</label>
              <input type="text" id="rate" name="rate" placeholder="Rate Today in KG">
              <input type="submit" value="Add Rate">
            </form>
          </div>
      </div>
    </div> 
    <div style="padding: 10px;"></div>
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