<?php
session_start();
include 'DbConnect.php';
$id = $_POST['uid'];



// foreach($qry as $k => $v){
// 	$$k = $v;
// }
// if($to_branch_id > 0 || $from_branch_id > 0){
// 	$to_branch_id = $to_branch_id  > 0 ? $to_branch_id  : '-1';
// 	$from_branch_id = $from_branch_id  > 0 ? $from_branch_id  : '-1';
// $branch = array();
//  $branches = mysqli_query($con,"SELECT *,concat(Street,', ',City,', ',State,', ',Zipcode,', ',Country) as address FROM tbl_branch where Branch_Id in ($to_branch_id,$from_branch_id)");
//     while($row = mysqli_fetch_array($branches)){
//     	$branch[$row['Branch_Id']] = $row['address'];
// 	}
// }

?>
<style>
	
		.callout.callout-info {
    border-left-color: #117a8b;
}

.callout {
    border-radius: 0.25rem;
    box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
    background-color: #fff;
    border-left: 5px solid #e9ecef;
    margin-bottom: 1rem;
    padding: 1rem;
}

.bg-gradient-primary {
    background: #007bff linear-gradient(180deg,#268fff,#007bff) repeat-x!important;
    color: #fff;
}
	</style>
<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12"  style="margin-left: 50px;">
				<div class="callout callout-info">
					<?php
                        
							$sql = "select tbl_orders.Order_Id,tbl_orders.User_Id,tbl_orders.Product_Id,tbl_orders.Quantity,tbl_orders.PaymentMethod,tbl_orders.OrderDate,tbl_orders.Reference_Number,tbl_orders.status,tbl_users.Name,tbl_users.billingAddress,tbl_users.Phone_No,tbl_products.name,tbl_products.productShippingcharge,tbl_products.productPrice from tbl_orders join tbl_users on tbl_orders.User_Id = tbl_users.User_Id join tbl_products on tbl_orders.Product_Id = tbl_products.id where Order_Id = '$id'";
							$res = mysqli_query($con,$sql);
							$totalprice=0;
							while($row = mysqli_fetch_array($res)){
							$totalprice = $row['Quantity']*$row['productPrice'] + $row['productShippingcharge'];

							
						?>
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b><?php echo $row['Reference_Number']; ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6"  style="margin-left: 50px;">
				
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($row['Name']); ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($row['billingAddress']); ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($row['Phone_No']); ?></dd>
					</dl>
				</div>
			</div>
			
			<div class="col-md-6" style="margin-left: 50px;">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Order Details</b>
						<div class="row">
							<div class="col-sm-6" style="margin-left: 50px;">
								<dl>
									<dt>Product Name:</dt>
									<dd><?php echo $row['name']; ?></dd>
									<dt>Product Quantity:</dt>
									<dd><?php echo $row['Quantity']; ?></dd>
									<dt>Product Unit Price:</dt>
									<dd><?php echo $row['productPrice']; ?></dd>
									<dt>Product Shipping Charge:</dt>
									<dd><?php echo $row['productShippingcharge']; ?></dd>
									<dt>Total Price:</dt>
									<dd><?php echo number_format($totalprice,2) ?></dd>
								</dl>	
							</div>
							
							
						</div>
						
					<dl>
						
						<dt>Status:</dt>
						<dd>
							<?php 
							switch ($row['status']) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;

								case '2':
									echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
									break;
								
								case '3':
									echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
									break;
								
								case '4':
									echo "<span class='badge badge-pill badge-success'>Delivered</span>";
									break;
								
								default:
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								
								
							}

							?>
							 
							<button value="<?php echo $row['Order_Id'];?>" class="btn badge badge-primary bg-gradient-primary" data-id = "<?php echo $row['Order_Id'];?>&cs=<?php echo $row['status']; ?>"  id='update_status'><i class="icon-edit"></i> Update Status</button>
						</dd>

					</dl>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" style="width: 900px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width:50%;">
    <div class="modal-content" style = "height:50%">
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



<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
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
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
	

	$(document).ready(function(){
      $('#update_status').click(function(){
         var uid = document.getElementById('update_status').value;
		 
		 console.log(uid);
         $.ajax({
          url: 'manage_parcel_status.php',
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