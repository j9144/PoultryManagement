<?php 
session_start();
error_reporting(0);
include('DbConnect.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if (isset($_GET['id'])) {

		mysqli_query($con,"delete from tbl_orders  where User_Id='".$_SESSION['userid']."' and PaymentMethod is null and Order_Id='".$_GET['id']."' ");
		;

	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Pending Order History</title>
	    <link rel="stylesheet" href="project/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="project/assets/css/main.css">
	    <link rel="stylesheet" href="project/assets/css/green.css">
	    <link rel="stylesheet" href="project/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="project/assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="project/assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="project/assets/css/animate.min.css">
		<link rel="stylesheet" href="project/assets/css/rateit.css">
		<link rel="stylesheet" href="project/assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="project/assets/css/config.css">

		<link href="project/assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="project/assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="project/assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="project/assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="project/assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="project/assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="project/assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('project/includes/top-header.php');?>
<?php include('project/includes/main-header.php');?>
<?php include('project/includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="Homeindex">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">#</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
						<th class="cart-sub-total item">Shiping Charge</th>
					<th class="cart-total">Grandtotal</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-description item">Order Date</th>
					<th class="cart-total last-item">Action</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>

<?php $query=mysqli_query($con,"select tbl_products.image as pimg,tbl_products.name as pname,tbl_products.id as c,tbl_orders.Product_Id as opid,tbl_orders.Quantity as qty,tbl_products.productPrice as pprice,tbl_products.productShippingcharge as shippingcharge,tbl_orders.PaymentMethod as paym,tbl_orders.OrderDate as odate,tbl_orders.Order_Id as oid from tbl_orders join tbl_products on tbl_orders.Product_Id=tbl_products.id where tbl_orders.User_Id='".$_SESSION['userid']."' and tbl_orders.PaymentMethod is null");
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0)
{
while($row=mysqli_fetch_array($query))
{
?>
				<tr>
					<td><?php echo $cnt;?></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg'];?>" alt="" width="84" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid'];?>">
						<?php echo $row['pname'];?></a></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<?php echo $qty=$row['qty']; ?>   
		            </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
					<td class="cart-product-grand-total"><?php echo (($qty*$price)+$shippcharge);?></td>
					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
					
					<td><a href="pending-orders.php?id=<?php echo $row['oid']; ?> ">Delete</td>
				</tr>
<?php $cnt=$cnt+1;} ?>
<tr>
	<td colspan="9"><div class="cart-checkout-btn pull-right">
							<button type="submit" name="ordersubmit" class="btn btn-primary"><a href="payment-method.php">PROCEED To Payment</a></button>
						
						</div></td>

</tr>
<?php } else {?>
<tr>
<td colspan="10" align="center"><h4>No Result Found</h4></td>
</tr>
<?php } ?>

		
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</form>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php echo include('project/includes/brands-slider.php');?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<?php include('project/includes/footer.php');?>

	<script src="project/assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="project/assets/js/bootstrap.min.js"></script>
	
	<script src="project/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="project/assets/js/owl.carousel.min.js"></script>
	
	<script src="project/assets/js/echo.min.js"></script>
	<script src="project/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="project/assets/js/bootstrap-slider.min.js"></script>
    <script src="project/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="project/assets/js/lightbox.min.js"></script>
    <script src="project/assets/js/bootstrap-select.min.js"></script>
    <script src="project/assets/js/wow.min.js"></script>
	<script src="project/assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->
</body>
</html>
<?php } ?>