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
   
//    $id = $_GET['id'];
//    $sql1 = mysqli_query($con,"select * from tbl_branch where Branch_Id = '$id' ");
//    $row1 = mysqli_fetch_array($sql1);

//    if(isset($_POST['sub'])){
//      $branch_code = $_POST["branch_code"];
//      $street = $_POST["street"];
//      $city = $_POST["city"];
//      $state = $_POST["state"];
//      $zip_code = $_POST["zip_code"];
//      $country = $_POST["country"];
//      $contact = $_POST["contact"];
   
//      $sql = "update `tbl_branch` set `Branch_code` = ' $branch_code', `Street` =  '$street', `City` =  '$city', `State` =  '$state', `Zipcode` =  '$zip_code', `Country` =  '$country', `Contact` =  '$contact' where `Store_Id` = '$id'";
//      $result = mysqli_query($con,$sql);
//      if($result){
//        header('location:viewstore.php');
//      }
//    }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin| Order List</title>
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
   </head>
   <body>
      <?php include('include/header.php');?>
      <div class="wrapper">
      <div class="container">
         <div style = "margin-left:-30px">
            <?php include('include/sidebar.php');?>				
            <div class="span9">
               <div class="content">
                  <div class="module" style = "margin-top:5px;margin-left:30px;width:100%;">
                     <div class="module-head">
                        <h3>Order List</h3>
                     </div> <br>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" style = "width:100%">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th class="text-center">Reference Number</th>
						<th>Customer Name</th>
						<th>Product Name</th>
						<th>Store Name</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th>Payment Method</th>
						<th>Ordered Date</th>
						<!-- <th>Status</th>
						<th>Action</th> -->
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = "select tbl_orders.Order_Id,tbl_orders.User_Id,tbl_orders.Product_Id,tbl_orders.Quantity,tbl_orders.PaymentMethod,tbl_orders.OrderDate,tbl_users.Name,tbl_products.name,tbl_products.productShippingcharge,tbl_products.productPrice from tbl_orders join tbl_users on tbl_orders.User_Id = tbl_users.User_Id join tbl_products on tbl_orders.Product_Id = tbl_products.id ";
						$res = mysqli_query($con,$sql);
						// $sql1 = "select date(OrderDate) from tbl_orders";
						// $res1 = mysqli_query($con,$sql1);
						// $row1 = mysqli_fetch_array($res1);
						$totalprice=0;
						while($row = mysqli_fetch_array($res)){
						$totalprice = $row['Quantity']*$row['productPrice'] + $row['productShippingcharge'];
						?>
					<tr>
						
						<td><?php echo $row['Order_Id'];?></td>
						<td><?php echo $row['Name'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['Quantity'];?></td>
						<td><?php echo $totalprice;?></td>
						<td><?php echo $row['PaymentMethod'];?></td>
						
						<td><?php echo $row['OrderDate'];?></td>
						<?php } ?>
						
						<!-- <td class="text-center">
							<?php 
							switch ($row['status']) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Collected</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;
								case '3':
									echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
									break;
								case '4':
									echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
									break;
								case '5':
									echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
									break;
								case '6':
									echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
									break;
								case '7':
									echo "<span class='badge badge-pill badge-success'>Delivered</span>";
									break;
								case '8':
									echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
									break;
								case '9':
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								
								default:
									echo "<span class='badge badge-pill badge-info'> Item Accepted</span>";
									
									break;
							}

							?>
						</td>

					<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_parcel" data-id="<?php echo $row['Order_Id']; ?>">
		                          <i class="icon-eye-open"></i>
		                        </button> -->
		                        <!-- <a href="edit_order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="icon-edit"></i>
		                        </a> -->
		                        <!-- <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['Order_Id'] ?>">
		                          <i class="icon-trash"></i>
		                        </button>
	                      </div>
						</td> -->
					</tr>	
					
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
                  </div>
               </div>
            </div>
         </div>
      </div>

	 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width:100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

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

<script type="text/javascript">
  function goBack()
  {
    window.location.href = "home.php";
  }
  $(document).ready(function(){
      $('#mbtn').click(function(){
         var uid = $(this).data('id');
         $.ajax({
          url: 'view_order.php',
          type: 'post',
          data: {uid:uid},
          success: function(response){
            $('.modal-body').html(response);
            $('#exampleModal').modal('show');
          }
        });
      });
  });
</script>

<script>
      $(document).ready(function() {
          $('#list').DataTable( {
              "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
          } );
      } );
   </script>
</html>
<?php } ?>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>

