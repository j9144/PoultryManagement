<?php
// session_start();
include 'DbConnect.php';
$id = $_POST['uid'];
// $cs = $_POST['cs'];
 $sql = "select tbl_orders.Order_Id,tbl_orders.User_Id,tbl_orders.Product_Id,tbl_orders.Quantity,tbl_orders.PaymentMethod,tbl_orders.OrderDate,tbl_orders.Reference_Number,tbl_orders.status,tbl_users.Name,tbl_products.name,tbl_products.productShippingcharge,tbl_products.productPrice from tbl_orders join tbl_users on tbl_orders.User_Id = tbl_users.User_Id join tbl_products on tbl_orders.Product_Id = tbl_products.id where Order_Id = '$id'";
$res = mysqli_query($con,$sql);
$totalprice=0;
$row = mysqli_fetch_array($res);

              $status_arr = array("Unsuccessfull
			  <br />
			  Delivery Attempt","Shipped","In-Transit",
                    
                    "Out for Delivery","Delivered"); foreach($status_arr as $k =>$v): 
                    endforeach;
?>
<div class="container-fluid">
	<form action="update_order.php" method="post" id="update_status">
		<div class="form-group">
            <input type="hidden" name="orderId" value="<?php echo $id;?>">
			<label for="">Update Status of : <?php echo $row['Reference_Number'];?></label>
			<select name="status" id="" class="custom-select custom-select-sm">
				<?php foreach($status_arr as $k => $v): ?>
					<option value="<?php echo $k ?>" <?php echo $v == $k ? "selected" :'' ?>><?php echo $v; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</form>
</div>

<div class="modal-footer display p-0 m-0">
        <button class="btn btn-primary" form="update_status">Update</button>
        
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
<script>
	$('#update_status').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'update_order.php',
			method:'POST',
			data:$(this).serialize(),
			error:(err)=>{
				console.log(err)
				alert_toast('An error occured.',"error")
				end_load()
			},
			success:function(resp){
				if(resp==1){
					alert_toast("Parcel's Status successfully updated",'success');
					setTimeout(function(){
						location.reload()
					},750)
				}
			}
		})
	})

//     $(document).ready(function(){
//       $('#update_status').click(function(){
//          var uid = $(this).data('id');
// 		 console.log(uid);
//          $.ajax({
//           url: 'order_list.php',
//           type: 'post',
//           data: {uid:uid},
//           success: function(response){
//             $('.modal-body').html(response);
//             $('#exampleModal').modal('show');
//           }
//         });
//       });
//   });
</script>