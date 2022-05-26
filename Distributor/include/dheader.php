<?php
// session_start();
    include("DbConnect.php");
    if(isset($_SESSION['dlogin']))
{
          
          $lmail= $_SESSION['dlogin'];


          $sqli = "select Name from tbl_staffregister where Email = '$lmail'";
          $resulti = mysqli_query($con,$sqli);
          $row = mysqli_fetch_array($resulti);

         
          $sql = "select * from tbl_staffregister where Email = '$lmail' ";
          $resulti = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($resulti);
          $type_id =  $row['Type_Id'];
           // $data = "select * from tbl_product where  ";

                

}



?>

<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
            <i class="icon-reorder shaded"></i>
        </a>

          <a class="brand" href="">
              Madayikkal Poultries | Distributor
          </a>

        <div class="nav-collapse collapse navbar-inverse-collapse">
            <ul class="nav pull-right">
                <li><a href="#">
                   Welcome <?php echo $_SESSION['dlogin'];?>
                </a></li>
                <li class="nav-user dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="images/user.png" class="nav-avatar" />
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="change-password.php"><i class = "fas-fa-key">Change Password</i></a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div>
</div><!-- /navbar-inner -->
</div><!-- /navbar -->
