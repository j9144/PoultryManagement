<?php
// session_start();
include 'DbConnect.php';
$id = $_POST['uid'];
// $cs = $_POST['cs'];
 $sql = "select tbl_staffregister.Name,tbl_orderchickswholesaler.WOrder_Id,tbl_orderchickswholesaler.WCount,tbl_orderchickswholesaler.WOrderDate,tbl_orderchickswholesaler.Status from tbl_staffregister JOIN tbl_orderchickswholesaler
 ON tbl_staffregister.StaffReg_Id = tbl_orderchickswholesaler.Farmer_Id where WOrder_Id = '$id'";
$res = mysqli_query($con,$sql);
$totalprice=0;
$row = mysqli_fetch_array($res);
?>
<div class="container-fluid">
	<form action="#" method="post" id="update_status">
		<div class="form-group">
            <input type="hidden" name="worderId" value="<?php echo $id;?>">
			<label for="">Update Status of : <?php $sq=" SELECT `Name` from `tbl_staffregister` where Type_Id=2";
                            $res=mysqli_query($con,$sq);
                            $row = mysqli_fetch_array($res);
                            echo $row['Name'];?></label>
			<select name="pstatus" class="form-control">
            <option value="">Select One</option>
				<option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
                <option value="Processing">Processing</option>
			</select>
		</div>

</div>

<div class="modal-footer display p-0 m-0">
        <button type="submit" name="mbtn" value="<?php echo $id; ?>" class="btn btn-primary" form="update_status">Update</button>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

</div>
</form>

<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<script src="jquery-3.6.0.min.js"></script>
<?php
if(isset($_POST['mbtn']))
{
    $wid = $_POST['mbtn'];
    $wstatus =$_POST['pstatus'];
    echo $sql = "update `tbl_orderchickswholesaler` set `Status` = '$wstatus'  where `WOrder_Id` = '$wid'";
    $res = mysqli_query($con,$sql);
    if($res){
        header('location:farmer_vieworder.php');
    }
}

?>
<!-- <script>
	$('#update_status').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'update_worder.php',
			method:'POST',
			data:$(this).serialize(),
			error:(err)=>{
				console.log(err)
				alert_toast('An error occured.',"error")
				end_load()
			},
			success:function(resp){
				if(resp==1){
					alert_toast(" Status successfully updated",'success');
					setTimeout(function(){
						location.reload()
					},750);
				}
			}
		});
	}); -->

