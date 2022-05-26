<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:stafflogin.html");
}
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


.sidebar {
  
  padding:0;
  width: 200px;
  background-color: green;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
  text-transform:uppercase;
}
 
.sidebar a.active {
  background-color: #3498db;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #3498db;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

.dropdown .dropdown-btn{
    display: block;
    color: white;
    padding: 16px;
    text-decoration: none;
    text-transform:uppercase;
    margin-top:20px;
    width:220px;
    
    

}

.dropdown .dropdown-btn:hover {
  color: #3498db;
}

.dropdown-container {
  display: none;
  background-color: green;
  padding-left: 0px;
  margin: top 20px;
}

.dropdown-container a {
  float: none;
  color:white;
  padding: 16px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-container a:hover {
    color: #3498db;
}

.dropdown:hover .dropdown-container {
  display: block;
}


/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.Navbar {
  display: flex;
}

.Navbar__Link {
  padding-right: 16px;
}

.Navbar {
  background-color: #46ACC2;
  display: flex;
  padding: 16px;
  font-family: sans-serif;
  color: white;
}

.Navbar__Items--right {
  margin-left:auto;
}

.Navbar a {
  color: white;
  padding:13px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

/* Style the hamburger menu */
.Navbar a.icon {
  
  display: block;
  
}

/* Add a grey background color on mouse-over */
.Navbar a:hover {
  /*background-color: #ddd;*/
  color: black;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 20px;
  margin-left: 50px;
}

/* The button used to open the sidebar */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #3498db;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s; /* If you want a transition effect */
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
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
  background-color: #3498db;;
  color: white;
}

.fa {font-size:50px;}

</style>
</head>

<script>
  function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
  </script>
<body>
  <div class="Navbar">
    <div class="Navbar__Link Navbar__Link-brand">
      Poultry Management
      <div id="main">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
      </div>
    </div>
   
      
    </a>
    
    <nav class="Navbar__Items Navbar__Items--right">
      <div class="Navbar__Link">
        
       <div class="dropdown">
          <button class="dropdown-btn"> <i class="fa fa-user"> </i>  Hatchery
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="Change.php"><i class="fa fa-lock"> </i> Change Password</a>
        <a href="StaffLogout.php"><i class="fa fa-sign-out"> </i> Log out</a>
        
      </div>
    </div>
        
     
      </div>
      
    </nav>
  </div>
  <div">
                  <?php
  include("DbConnect.php");
 $d=date("Y/m/d");
$sql="select * from `tbl_chickrate` where Rate_Date='$d'";
  $res=mysqli_query($con,$sql);
while($row1=mysqli_fetch_array($res))
  {
?>
<h1 class="white-text tm-handwriting-font tm-welcome-header" style="color: red;font-size: 40px; margin-left:600px;">&nbsp;Birds Rate Today <?php echo $row1['Rate'];?>/-&nbsp;</h1>
<div ></div>
<?php
}?>
  <div  id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href=""><i class="fas fa-tachometer-alt"></i> Dashboard </a>
    <a href="hatchery_addbird.php" class="button button1">Add Birds</a>
           <a href="hatchery_vieworder.php" class="button button1">View Orders</a>
           <a href="hatchery_orderrequests.php" class="button button1">Order Requests</a>
           <a href="hatchery_viewstock.php" class="button button1">View Stock</a>
   
    <a href = "StaffLogout.php"> <i class = "fa fa-sign-out"> </i> Logout </a> <br>
  </div>
  </div>
  
<br>


<div style="padding: 50x;"></div> 

</body>

</html> 
