<?php
   session_start();
   include('DbConnect.php');
   if(strlen($_SESSION['dlogin'])==0)
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
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Distributor|Home</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
      <link type="text/css" href="css/theme.css" rel="stylesheet" />
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet" />
      <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
   </head>
   <body>
      <?php include('include/dheader.php');?>
      <div class="wrapper">
         <div class="container">
            <div style="margin-left: -58px;">
               <?php include('include/dsidebar.php');?>
               <div class="span9">
                  <div class="content" style="margin-top: -750px; margin-left: 350px; width: 90%;">
                     <div class="module">
                        <div class="module-head">
                           <h3>Distributor</h3>
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
      $(document).ready(function () {
          $(".datatable-1").dataTable();
          $(".dataTables_paginate").addClass("btn-group datatable-pagination");
          $(".dataTables_paginate > a").wrapInner("<span />");
          $(".dataTables_paginate > a:first-child").append('<i class="icon-chevron-left shaded"></i>');
          $(".dataTables_paginate > a:last-child").append('<i class="icon-chevron-right shaded"></i>');
      });
   </script>
</html>
<?php } ?>
