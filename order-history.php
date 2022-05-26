<?php 
session_start();
error_reporting(0);
include('DbConnect.php');
if(strlen($_SESSION['Email'])==0)
    {   
header('location:login.php');
}
else{

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

	    <title>Order History</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">

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
		<link rel="stylesheet" href="project/assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="project/assets/images/favicon.ico">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

<style>
	/* body{
    min-height: 50vh;
    font-family: 'Exo 2';
    font-size: 14px;   
    color: #fff;
    background:#eee;	
} */
.modal-content{
    background-color: #42469d;
    border-color: #42469d;
    border-radius: 1rem;
}
@media (min-width: 576px){
.modal-dialog {
    max-width: 750px;
    margin: 1.75rem auto;
}
}
.show{
    padding: 0;
}
.modal-header{
    border-bottom: none;
    text-align: center;
	/* background-color: #fff; */
}
.modal-header .close {
    padding: 1rem 1rem;
    margin: -1rem -1rem -1rem 0;
    color: #fff;
}
:-moz-any-link:focus {
    outline: none;
}
.modal-title{
    line-height: 3rem;
}
.modal-body{
    padding: 1rem;
	color:orange;
	
}
#progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: white;
    padding-left: 0px;
    margin-top: 3vh
}

#progressbar li {
    list-style-type: none;
    font-size: 0.8rem;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: orange;
}

#progressbar #step1:before {
    content: "";
    color: orange;
    width: 20px;
    height: 20px;
    margin-left: 0px !important;
}

#progressbar #step2:before {
    content: "";
    color: orange;
    width: 20px;
    height: 20px;
    margin-left: 32%;
}

#progressbar #step3:before {
    content: "";
    color: orange;
    width: 20px;
    height: 20px;
    margin-right: 32% ; 
}

#progressbar #step4:before {
    content: "";
    color: rgb(151, 149, 149, 0.651);
    width: 20px;
    height: 20px;
    margin-right: 0px !important;
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: rgb(151, 149, 149);
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh;
}

#progressbar li:after {
    content: '';
    height: 3px;
    background: rgb(151, 149, 149, 0.651);
    position: absolute;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 8px;
    z-index: 1;
	color:white;
}
.progress-track{
    padding: 0 8%;
}
#progressbar li:nth-child(2):after {
    margin-right: auto;
}

#progressbar li:nth-child(1):after {
    margin: auto;
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%;
}
#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: white;
}

#three{
    font-size: 1.2rem;
}
@media (max-width: 767px){
    #three{
        font-size: 1rem;
    } 
}
.details{
    padding: 2rem;
    font-size: 1.4rem;
    line-height: 3.5rem;
}

@media (max-width: 767px){
.details {
    padding: 2rem 0;
    font-size: 1rem;
    line-height: 2.5rem;
}
}
.d-table{
    width: 100%;
}
.d-table-row{
    width: 100%;
}
.d-table-cell{
    padding-left: 3rem;
}
@media (max-width: 767px){
    .d-table-cell{
        padding-left: 1rem;
    } 
}
.col-3{
    display: grid;
    text-align: end;
}
.col-3 .d-table-row{
    align-self: flex-end;
}
.fa{
    font-size: xx-large;
    text-align: center;
    width: 3rem;
    padding: 0.5rem;
    color: #42469d;
    background-color: #fff;
    border-radius: 2rem;
    bottom: 0;
    right: 0;
}
button:active{
    outline: none;
}
button:focus{
   outline: none;
}
button{
    margin-top: 50vh
}
</style>
	
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
				<li><a href="Homeindex.php">Home</a></li>
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
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total item">Grandtotal</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-description item">Order Date</th>
					<th class="cart-total last-item">Action</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>

<?php $query=mysqli_query($con,"select tbl_products.image as pimg,tbl_products.name as pname,tbl_products.id as proid,tbl_orders.Product_Id as opid,tbl_orders.Quantity as qty,tbl_products.productPrice as pprice,tbl_products.productShippingcharge as shippingcharge,tbl_orders.PaymentMethod as paym,tbl_orders.OrderDate as odate,tbl_orders.Order_Id as orderid from tbl_orders join tbl_products on tbl_orders.Product_Id=tbl_products.id where tbl_orders.User_Id='".$_SESSION['userid']."' and tbl_orders.PaymentMethod is not null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
				<tr>
					<td><?php echo $cnt;?></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="product-details.php">
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
					
					<td>
					<button  data-id = "<?php echo $row['orderid'];?>"  type="button" style = "margin-top:40px" class="btn btn-primary d-flex mx-auto btn-lg mbtn" data-toggle="modal" data-target="#myModal">
                          Track your order
                    </button>
					
 					</td>
				</tr>
<?php $cnt=$cnt+1;} ?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->

		<!-- The Modal -->
		
		<div class="modal fade" id="exampleModal" tabindex="-1" style="width: 900px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-lg" role="document">
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
          url: 'view_ordertrack.php',
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