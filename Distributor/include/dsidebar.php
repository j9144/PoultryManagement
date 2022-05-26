<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
   <link href="css/bootstraps.min.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">  -->
   <div class="span3">
   <div class="sidebar">
      <ul class="widget widget-menu unstyled" >
         <li >
            <a href="Admindashboard.php" style = "color:white" >
            <i class="menu-icon icon-dashboard" style = "color:white"></i>
            Dashboard
            </a>
         </li>
      </ul>
      <ul class="widget widget-menu unstyled">
         <li>
            <a class="collapsed" data-toggle="collapse" href="#togglePages" style = "color:white">
            <i class="menu-icon icon-shopping-cart" style = "color:white"></i>
            <i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
            Order Management
            </a>
            <ul id="togglePages" class="collapse unstyled">
               <li class="nav-item">
                  <a href="order_list.php" class="nav-link nav-parcel_list nav-sall tree-item">
                  <i class="icon-chevron-right pull-left"></i>
                  List All
                  </a>
               </li>
               <?php 
                  $status_arr = array("Unsuccessfull
                  <br />
                  Delivery Attempt","Shipped","In-Transit",
                        "Out for Delivery","Delivered"); foreach($status_arr as $k =>$v): ?>
               <li class="nav-item">
                  <a href="order_list.php?s=<?php echo $k ?>" class="nav-link nav-parcel_list_<?php echo $k ?> tree-item">
                  <i class="icon-chevron-right pull-left"></i>
                  <?php echo $v ?>
                  </a>
               </li>
               <?php endforeach; ?>
            </ul>
         </li>
      </ul>
      <ul class="widget widget-menu unstyled">
         <li class="nav-item dropdown">
            <a href="reports.php" class="nav-link nav-reports" style = "color:white">
            <i class="menu-icon icon-file" style = "color:white"></i>
            Reports
            </a>
         </li>
      </ul>
      <ul class="widget widget-menu unstyled">
         <li>
            <a href="Calendar.php" style = "color:white">
            <i class="menu-icon icon-calendar" style = "color:white"></i>
            Calendar
            </a>
         </li>
      </ul>
   </div>
</div>
