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
                  <div class="module" style = "margin-top:10px;margin-left:50px;width:900px;">
                     <div class="module-head">
                        <h3>Order List</h3>
                     </div> <br>


<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
            
			<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
			<?php 
			$status_arr = array("Unsuccessfull Delivery Attempt","Shipped","In-Transit","Out for Delivery","Delivered"); ?>
				<label for="date_from" class="mx-1">Status</label>
				<select name="" id="status" class="custom-select custom-select-sm col-sm-3">
					<option value="all" <?php echo $status == 'all' ? "selected" :'' ?>>All</option>
					<?php foreach($status_arr as $k => $v): ?>
						<option value="<?php echo $k ?>" <?php echo $status != 'all' && $status == $k ? "selected" :'' ?>><?php echo $v; ?></option>
					<?php endforeach; ?>
				</select>
				<label for="date_from" class="mx-1">From</label>
                <input type="date" id="date_from" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_from']) ? date("Y-m-d",strtotime($_GET['date_from'])) : '' ?>">
                <label for="date_to" class="mx-1">To</label>
                <input type="date" id="date_to" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_to']) ? date("Y-m-d",strtotime($_GET['date_to'])) : '' ?>">
                <button class="btn btn-sm btn-primary mx-1 bg-gradient-primary" type="button" id='view_report'>View Report</button>
			</div>
                    
		</div>
	</div>
                    
	<div class="row">
		<div class="col-md-12 ">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
        					<button type="button" class="btn btn-success float-right" style="display: none" id="print"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>	
					
					<table class="table table-bordered" id="report-list">
						<thead>
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Sender</th>
								<th>Recepient</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
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
<div class="details d-none">
		<p><b>Date Range:</b> <span class="drange"></span></p>
		<p><b>Status:</b> <span class="status-field">All</span></p>
	</div>
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
	function load_report(){
		start_load()
		var date_from = $('#date_from').val()
		var date_to = $('#date_to').val()
		var status = $('#status').val()
			$.ajax({
				url:'ajax.php?action=get_report',
				method:'POST',
				data:{status:status,date_from:date_from,date_to:date_to},
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error')
					end_load()
				},
				success:function(resp){
					if(typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) === 'object'){
						resp = JSON.parse(resp)
						if(Object.keys(resp).length > 0){
							$('#report-list tbody').html('')
							var i =1;
							Object.keys(resp).map(function(k){
								var tr = $('<tr></tr>')
								tr.append('<td>'+(i++)+'</td>')
								tr.append('<td>'+(resp[k].date_created)+'</td>')
								tr.append('<td>'+(resp[k].sender_name)+'</td>')
								tr.append('<td>'+(resp[k].recipient_name)+'</td>')
								tr.append('<td>'+(resp[k].price)+'</td>')
								tr.append('<td>'+(resp[k].status)+'</td>')
								$('#report-list tbody').append(tr)
							})
							$('#print').show()
						}else{
							$('#report-list tbody').html('')
								var tr = $('<tr></tr>')
								tr.append('<th class="text-center" colspan="6">No result.</th>')
								$('#report-list tbody').append(tr)
							$('#print').hide()
						}
					}
				}
				,complete:function(){
					end_load()
				}
			})
	}
$('#view_report').click(function(){
	if($('#date_from').val() == '' || $('#date_to').val() == ''){
		alert_toast("Please select dates first.","error")
		return false;
	}
	load_report()
	var date_from = $('#date_from').val()
	var date_to = $('#date_to').val()
	var status = $('#status').val()
	var target = './index.php?page=reports&filtered&date_from='+date_from+'&date_to='+date_to+'&status='+status
	window.history.pushState({}, null, target);
})

$(document).ready(function(){
	if('<?php echo isset($_GET['filtered']) ?>' == 1)
	load_report()
})
$('#print').click(function(){
		start_load()
		var ns = $('noscript').clone()
		var details = $('.details').clone()
		var content = $('#report-list').clone()
		var date_from = $('#date_from').val()
		var date_to = $('#date_to').val()
		var status = $('#status').val()
		var stat_arr = '<?php echo json_encode($status_arr) ?>';
			stat_arr = JSON.parse(stat_arr);
		details.find('.drange').text(date_from+" to "+date_to )
		if(status>-1)
		details.find('.status-field').text(stat_arr[status])
		ns.append(details)

		ns.append(content)
		var nw = window.open('','','height=700,width=900')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)

	})
</script>
<?php } ?>