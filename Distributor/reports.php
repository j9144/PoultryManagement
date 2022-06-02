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
   
 $status = isset($_GET['status']) ? $_GET['status'] : 'all'
  ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Distributor| Order List</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	  <script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
	  <script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
	  <link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="css/datatables/datatables.css">

      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel = "stylesheet" href = "https://bootstrap.bundle.min.js/bootstrap.bundle.js"> -->
	  <style>
.content-wrapper>.content {
    padding: 0 0.5rem;
}

.container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
    margin-right: auto;
    margin-left: auto;
}

.card-primary.card-outline {
    border-top: 3px solid #007bff;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}

py-2 {
    padding-bottom: 0.5rem!important;
}
.pt-2, .py-2 {
    padding-top: 0.5rem!important;
}
.pl-1, .px-1 {
    padding-left: 0.25rem!important;
}
.pr-1, .px-1 {
    padding-right: 0.25rem!important;
}
.w-100 {
    width: 100%!important;
}
.align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
}
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;

}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}
body {
    margin: 0;
    font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
.callout {
    border-radius: 0.25rem;
    box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
    background-color: #fff;
    border-left: 5px solid #e9ecef;
    margin-bottom: 1rem;
    padding: 1rem;
}
user agent stylesheet
div {
    display: block;
}

.col-md-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
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
                  <!-- <div class="module" style = "margin-top:10px;margin-left:50px;width:1000px;"> -->
                     <div class="module-head" style="width: 930px;">
                        <h3>Order List</h3>
                     </div> <br>


<div class="col-lg-12">
	<div class="card card-outline card-primary" style="width:950px">
		<div class="card-body" style = "width :800px">
            
			<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
                <form method="post">
			<?php 
			$status_arr = array("Unsuccessfull Delivery Attempt","Shipped","In-Transit","Out for Delivery","Delivered"); ?>
				<label for="date_from" class="mx-1" >Status</label>
				<select name="" id="status" class="custom-select custom-select-sm col-sm-3" style = "width:100px">
					<option value="all" <?php echo $status == 'all' ? "selected" :'' ?>>All</option>
					<?php foreach($status_arr as $k => $v): ?>
						<option value="<?php echo $k ?>" <?php echo $status != 'all' && $status == $k ? "selected" :'' ?>><?php echo $v; ?></option>
					<?php endforeach; ?>
				</select>
				From date: <input type="date" id="fromdate" value="<?php $fdate=$_POST['fromdate'];?>" onChange="showUser()">   To date: <input type="date" id="todate" value="<?php $tdate=$_POST['todate'];?>" onChange="showUser()"> 
				<!-- <label for="date_from" class="mx-1">From</label>
                <input type="date" id="date_from" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_from']) ? date("Y-m-d",strtotime($_GET['date_from'])) : '' ?>">
                <label for="date_to" class="mx-1">To</label>
                <input type="date" id="date_to" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_to']) ? date("Y-m-d",strtotime($_GET['date_to'])) : '' ?>"> -->
                &nbsp;&nbsp;<button class="btn btn-sm btn-primary mx-1 bg-gradient-primary" type="button" id='view_report'>View Report</button>
				
                </form>
			</div>
					
                    
		</div>
	</div>
                    <br>
	<div class="row">
		<div class="col-md-12 ">
			<div class="card" style = "margin-left:25px;width:950px">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
        					<button type="button" class="btn btn-success float-right" style="margin-left:800px" id="print"><i class="icon-print"></i> Print</button>
						</div>
					</div>	
					<br>
                    <div id="txtHint"><b>User informathions will be listed here.</b></div>

					
				</div>
			</div>
			
		</div>
	</div>
</div>

<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Report</b></h3>
</noscript>
<!-- <div class="details d-none">
		<p><b>Date Range:</b> <span class="drange"></span></p>
		<p><b>Status:</b> <span class="status-field">All</span></p>
	</div> -->
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
   <script>
 $(function() {
    $( "#fromdate" ).datepicker();
    $( "#todate" ).datepicker();
  });
  </script>

<script type="text/javascript">
function showUser()
{

var fromdate = $( "#fromdate" ).val();
var todate= $( "#todate" ).val();
  if (fromdate =="" && todate=="")
    {
     document.getElementById("txtHint").innerHTML="";
     return;
    } 

    if (window.XMLHttpRequest)
     {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
	}
  else
    {// code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

  xmlhttp.onreadystatechange=function()
    {
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","reportgens.php?fromdate="+fromdate+"&todate="+todate,true);
    xmlhttp.send();
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#view_report").click(function(){
	  var from_date=jQuery("#fromdate").val();
	  var to_date=jQuery("#todate").val();
	  var data =
	  {		
	  	from_date	 : from_date,
		to_date		 : to_date
	  }
	jQuery.ajax({	
					type: "POST",
					url: "repgen.php",
					data: data,
					success: function(responce){
						$("#txtHint").after(responce);
				  }	
			 });
  });
});
</script>
<?php } ?>