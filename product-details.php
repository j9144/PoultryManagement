<?php

use Stripe\SubscriptionSchedule;

session_start();
error_reporting(0);
include('DbConnect.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM tbl_products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
					echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['Email'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into tbl_wishlist(User_Id,Product_Id) values('".$_SESSION['userid']."','".$_GET['pid']."')");
echo "<script>alert('Product added in wishlist');</script>";
header('location:my-wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into tbl_productreviews(Product_Id,Quality,Price,Value,Name,Summary,Review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	    <title>Product Details</title>
		
	    <link rel="stylesheet" href="project/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="project/assets/css/main.css">
	    <link rel="stylesheet" href="project/assets/css/green.css">
	    <link rel="stylesheet" href="project/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="project/assets/css/owl.transitions.css">
		<link href="project/assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="project/assets/css/animate.min.css">
		<link rel="stylesheet" href="project/assets/css/rateit.css">
		<link rel="stylesheet" href="project/assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="project/assets/css/config.css">

		<link href="project/assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="project/assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="project/assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="project/assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="project/assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="project/assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="project/assets/images/favicon.ico">

		

		
	</head>
    <body class="cnt-home">
	
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('project/includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('project/includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('project/includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
<?php
$ret=mysqli_query($con,"select tbl_category.Category_name as catname,tbl_products.name as pname from tbl_products join tbl_category on tbl_category.Category_Id=tbl_products.Category_Id  where tbl_products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>


			<ul class="list-inline list-unstyled">
				<li><a href="Homeindex.php">Home</a></li>
				<li><?php echo htmlentities($rw['catname']);?></a></li>
				<li class='active'><?php echo htmlentities($rw['pname']);?></li>
			</ul>
			<?php }?>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">


					<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

		            <?php $sql=mysqli_query($con,"select Category_Id,Category_name  from tbl_category");
while($row=mysqli_fetch_array($sql))
{
    ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="category.php?cid=<?php echo $row['Category_Id'];?>"  class="accordion-toggle collapsed">
	                   <?php echo $row['Category_name'];?>
	                </a>
	            </div>
	          
	        </div>
	        <?php } ?>
	    </div>
	</div>
</div>
	<!-- ============================================== CATEGORY : END ============================================== -->					<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
		
								   <?php
$ret=mysqli_query($con,"select * from tbl_products order by rand() limit 4 ");
while ($rws=mysqli_fetch_array($ret)) {

?>

								        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="admin/productimages/<?php echo htmlentities($rws['id']);?>/<?php echo htmlentities($rws['image']);?>"  width="200" height="334" alt="">
							</div>
							
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($rws['id']);?>"><?php echo htmlentities($rws['name']);?></a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
									Rs. <?php echo htmlentities($rws['productPrice']);?>.00
								</span>
									
							    <span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								
							</div><!-- /.action -->
						</div>
					</div>	
					</div>		
					<?php } ?> 
					
		

    </div><!-- /.sidebar-widget -->
</div>

<!-- ============================================== COLOR: END ============================================== -->
				</div>
			</div><!-- /.sidebar -->

			
<?php 
$ret=mysqli_query($con,"select * from tbl_products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>


			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

 <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['name']);?>" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>" width="370" height="350" />
                </a>
            </div>




            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['name']);?>" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>" width="370" height="350" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>" />
                </a>
            </div>

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive"  alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>" />
                    </a>
                </div>

            <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>"/>
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['image']);?>" height="200" />
                    </a>
                </div>

               
               
                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div>

    </div>
</div>     			




					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo htmlentities($row['name']);?></h1>
<?php $rt=mysqli_query($con,"select * from tbl_productreviews where Product_Id='$pid'");
$num=mysqli_num_rows($rt);
{
?>		
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(<?php echo htmlentities($num);?> Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->
<?php } ?>
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php echo htmlentities($row['productAvailability']);?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>





<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label">Shipping Charge :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php if($row['productShippingcharge']==0)
											{
												echo "Free";
											}
											else
											{
												echo htmlentities($row['productShippingcharge']);
											}

											?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">Rs. <?php echo htmlentities($row['productPrice']);?></span>
											<span class="price-strike">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
										</div>
									</div>




									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
											    <i class="fa fa-heart"></i>
											</a>
											
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

	




							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
<?php if($row['productAvailability']=='In Stock'){?>
										<a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
													<?php } else {?>
							<form action="" method="post">
							<button type="submit"  class="btn btn-primary d-flex mx-auto btn-lg mbtn" name="notify">
                          Notify Me
                    		</button>
							</form>
							
					<?php } ?>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							<div class="product-social-link m-t-20 text-right">
								<span class="social-label">Share :</span>
								<div class="social-icons">
						            <ul class="list-inline">
						                <li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
						                <li><a class="fa fa-twitter" href="#"></a></li>
						                <li><a class="fa fa-linkedin" href="#"></a></li>
						                <li><a class="fa fa-rss" href="#"></a></li>
						                <li><a class="fa fa-pinterest" href="#"></a></li>
						            </ul><!-- /.social-icons -->
						        </div>
							</div>

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->

				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $row['productDescription'];?></p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
<?php $qry=mysqli_query($con,"select * from tbl_productreviews where Product_Id='$pid'");
while($rvw=mysqli_fetch_array($qry))
{
?>

											<div class="reviews" style="border: solid 1px #000; padding-left: 2% ">
												<div class="review">
													<div class="review-title"><span class="summary"><?php echo htmlentities($rvw['Summary']);?></span><span class="date"><i class="fa fa-calendar"></i><span><?php echo htmlentities($rvw['ReviewDate']);?></span></span></div>

													<div class="text">"<?php echo htmlentities($rvw['Review']);?>"</div>
													<div class="text"><b>Quality :</b>  <?php echo htmlentities($rvw['Quality']);?> Star</div>
													<div class="text"><b>Price :</b>  <?php echo htmlentities($rvw['Price']);?> Star</div>
													<div class="text"><b>value :</b>  <?php echo htmlentities($rvw['Value']);?> Star</div>
                                                <div class="author m-t-15"><i class="fa fa-pencil-square-o"></i> <span class="name"><?php echo htmlentities($rvw['Name']);?></span></div>													</div>
											
											</div>
											<?php } ?><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										<form role="form" class="cnt-form" name="review" method="post">

										
										<div class="product-add-review"> <br>
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table table-bordered">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="price" class="radio" value="1"></td>
																<td><input type="radio" name="price" class="radio" value="2"></td>
																<td><input type="radio" name="price" class="radio" value="3"></td>
																<td><input type="radio" name="price" class="radio" value="4"></td>
																<td><input type="radio" name="price" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="value" class="radio" value="1"></td>
																<td><input type="radio" name="value" class="radio" value="2"></td>
																<td><input type="radio" name="value" class="radio" value="3"></td>
																<td><input type="radio" name="value" class="radio" value="4"></td>
																<td><input type="radio" name="value" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																<input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>

<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button name="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

				

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<?php $cid=$row['Category_Id'];
			 } ?>
				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Realted Products </h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	   
		<?php 
$qry=mysqli_query($con,"select * from tbl_products where  Category_Id='$cid'");
while($rw=mysqli_fetch_array($qry))
{

			?>	


		<div class="item item-carousel">
			<div class="products">
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"><img  src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($rw['id']);?>/<?php echo htmlentities($rw['image']);?>" width="150" height="240" alt=""></a>
			</div><!-- /.image -->			

			                   		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['name']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs.<?php echo htmlentities($rw['productPrice']);?>			</span>
										     <span class="price-before-discount">Rs.
										     <?php echo htmlentities($rw['productPriceBeforeDiscount']);?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
						<a href="product-details.php?page=product&action=add&id=<?php echo $rw['id']; ?>" class="lnk btn btn-primary">Add to cart</a>
													
						</li>
	                   
		              
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		<?php } ?>
	
		
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->


<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div>
<?php include('project/includes/brands-slider.php');?>
</div>
</div>



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
	
	<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Will inform later";
}


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
<?php
if(isset($_POST['notify']))
{
	$u_id = $_SESSION['userid'];
	$q = "SELECT `name` FROM `tbl_products` WHERE `id` = '$pid'";
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_array($r);
	$title = $row['name'];
	$res = "INSERT INTO `tbl_notify`(`Product_Id`, `UserId`, `title`) VALUES ('$pid','$u_id','$title')";
	$query = mysqli_query($con,$res);
	if($query)
	{
		echo("<script>
		window.alert('We will notify you when available');
		</script>");
	}
}
?>