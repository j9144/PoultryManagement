<?php
include 'adminheader.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}
.column {
  float: left;
  width: 35%;
  padding: 0 100px;
  margin-left: 150px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #3498db;
  color: white;
}

.fa {font-size:50px;}

</style>
</head>

<body>
    <h2 style = "margin-left: 220px;"> Dashboard</h2> <br>
<div class="row">
  <div class="column">
    <div class="card">
    <p> <i class="fa fa-user" style = "margin-left:-220px; padding-top:35px"> </i> </p>
      <h4 style = "margin-top : -70px; margin-left : 45px"> <?php include "DbConnect.php";

           $sql = " select Name from tbl_register";
           $result = mysqli_query($con,$sql);
           $row = mysqli_num_rows($result);
           echo "$row" ?> </h4>
      <h3 style = " margin-left : 60px"> Total Customers!</h3>
      
    </div>
    <div>
          <p style = "background-color: #e6e6ff; color : blue; height:50px; padding-left : 20px; padding-top:15px" > View Details <a href = "Customer.php"> <i style="font-size:24px; padding-left:190px" class= "fa fa-angle-double-right"> </i> </a>  </p>
      </div>
  </div>

  <div class="row">
  <div class="column" style = "margin-left:-180px">
    <div class="card" style = "background-color:#33cc33">
    <p> <i class="fa fa-shopping-cart" style = "margin-left:-220px; padding-top:35px"> </i> </p>
      <h4 style = "margin-top : -70px; margin-left : 45px"> <?php include "DbConnect.php";

           $sql = " select Order_Id from tbl_ordersinfo";
           $result = mysqli_query($con,$sql);
           $row = mysqli_num_rows($result);
           echo "$row" ?> </h4>
      <h3 style = " margin-left : 60px"> Total Orders!</h3>
      
    </div>
    <div>
          <p style = "background-color: #e6e6ff; color : blue; height:50px; padding-left : 20px; padding-top:15px" > View Details <a href = "Order.php"> <i style="font-size:24px; padding-left:190px" class= "fa fa-angle-double-right"> </i> </a>  </p>
      </div>
  </div>
</body>

</html>