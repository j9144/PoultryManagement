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
      <title>Admin| Notifications</title>
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
      <?php include('include/header.php');?>
      <div class="wrapper">
      <div class="container">
         <div style = "margin-left:-30px">
            <?php include('include/sidebar.php');?>				
            <div class="span9">
               <div class="content">
                  <div class="module" style = "margin-top:10px;margin-left:50px;width:900px;">
                     <div class="module-head">
                        <h3>Notification List</h3>
                     </div> <br>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				
			</div>
		</div>
		<div class="card-body">
            <center>
			<table class="table tabe-hover table-bordered">
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
						<th>Customer Name</th>
						<th>Product Name</th>
						<th>Status</th>
                        <th>Update Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
                       

						$sql = "select tbl_products.name as pname,tbl_users.Name as name,tbl_notify.status as stat,tbl_products.id as proid,tbl_products.image as pimage,tbl_notify.Product_Id as pid,tbl_notify.update_status as ustatus,tbl_notify.id as nid from tbl_notify join tbl_products join tbl_users on tbl_products.id=tbl_notify.Product_Id and tbl_notify.UserId = tbl_users.User_Id";
						$res = mysqli_query($con,$sql);
						$totalprice=0;
						while($row = mysqli_fetch_array($res)){
						?>
					<tr>
						
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['pname'];?></td>
						<td class="text-center">
							<?php 
							switch ($row['stat']) {
								case '0':
									echo "<span class='badge badge-pill badge-info'> Out of Stock</span>";
									break;

								case '1':
									echo "<span class='badge badge-pill badge-primary'> In Stock</span>";
									break;	
							}

							?>
						</td>
                        <td><form method="post"><select name="ustatus">
                        <option value="">Select One</option>
                            <option value="In Stock">In Stock</option>
                        </select></td>
						<!-- <?php echo $row['Order_Id']; ?> -->

					<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="submit" name="usubmit"  value="<?php echo $row['proid']; ?>" class="btn btn-info btn-flat mbtn">
		                          <i class="icon-eye-open"> Update</i>
		                        </button> 
                                </form>
	                      </div>
						</td>
					</tr>	
					<?php }
						?>
				</tbody>
			</table>
            </center> 
		</div>
	</div>
</div>
</div>
<?php
if(isset($_POST['usubmit']))
{
    $id = $_POST['usubmit'];
    $ustatus = $_POST['ustatus'];
    $res = "UPDATE `tbl_notify` SET `update_status` = '$ustatus', `status` = 1";
    $query = mysqli_query($con,$res);
    $res1 = "UPDATE `tbl_products` SET `productAvailability` = '$ustatus'";
    $query1 = mysqli_query($con,$res1);
    if(($query)&&($query1))
    {
        echo"
        <script>
        window.alert('Status Updated');
        window.reload(1);
        </script>
        ";
    }
}
?>        


</div>
               </div>
            </div>
         </div>
      </div>

	 <div class="modal fade" id="exampleModal" tabindex="-1" style="width: 900px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width:50%;">
    <div class="modal-content">
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
      $('.mbtn').click(function(){
         var uid = $(this).data('id');
		 console.log(uid);
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

  $(document).ready(function(){
      $('.delete_order').click(function(){
         var uid = $(this).data('id');
		 console.log(uid);
         $.ajax({
          url: 'deleteorder.php',
          type: 'post',
          data: {uid:uid},
          success: function(response){
            alert("Are you sure want to delete this?");

			if(response==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
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

	.modal.show .modal-dialog {
    transform: none;
}
.modal-content {
    width: 900px;
}

/* .modal.fade .modal-dialog {
    transition: transform .3s ease-out;
    transform: translate(0,-50px);
}
.modal-dialog.large {
    width: 80% !important;
    max-width: unset;
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: 0.5rem;
    pointer-events: none;
} */

</style>

