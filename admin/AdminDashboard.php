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
<html>
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin|View Staff</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
      
      <style>
          .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  width:30%;
  margin-top:50px;
          }
  .card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  width:30%;
  margin-top:-105px;
  margin-left:280px;
  
          }

.fa {font-size:50px;}
</style>
      <div>
         <br>
   <body>
   <?php include('include/header.php');?>
   <div class="wrapper">
   <div class="container">
   <div style = "margin-left:-30px">
   <?php include('include/sidebar.php');?>				
   <div class="span9">
   <div class="content">
   <div class="module" style = "margin-top:10px;margin-left:100px;width:100%;height:500px">
   <div class="module-head">
   <h3>Dashboard</h3>
   </div>
   <div class="row" style = "margin-left:50px;">
        
   <section class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
              <div class = "card">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner" >
                <h3 style = "margin-left:-170px">
                 <?php
                 $sql = "Select Name from tbl_users";
                 $res = mysqli_query($con,$sql);
                 $row = mysqli_num_rows($res);
                 echo $row;
                 ?>

                </h3>
</div>    
<!-- <div class="icon" >
                
              </div> -->

                <p style = "margin-left:-80px;margin-top:-5px"><i class="icon-group">  Total Customers </i></p>
              
              
              </div>
            </div>
          </div>
          </div>
          </div>
          
</section>
<div class="row" style = "margin-left:50px;">
<section class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
              <div class = "card1" >
            <div class="small-box bg-light shadow-sm border">
              <div class="inner" >
                <h3 style = "margin-left:-170px">
                 <?php
                 $sql = "Select * from tbl_orders";
                 $res = mysqli_query($con,$sql);
                 $row = mysqli_num_rows($res);
                 echo $row;
                 ?>

                </h3>
</div>    
<!-- <div class="icon" >
                
              </div> -->

                <p style = "margin-left:-95px;margin-top:-5px"><i class="icon-shopping-cart">  Total Orders </i></p>
              
              
              </div>
            </div>
          </div>
          </div>
          </div>
          
</section>
</div>
</div>
</div>
</div>
</div>
</div>
</div>    
          
<?php } ?> 
