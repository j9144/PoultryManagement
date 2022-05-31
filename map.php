<?php
session_start();
error_reporting(0);
include('DbConnect.php');
if(strlen($_SESSION['Email'])==0)
    {   
header('location:login.php');
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

	    <title>Location</title>
	    <link rel="stylesheet" href="project/assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
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
			<ul class="list-inline list-unstyled">
				<li><a href="Homeindex">Home</a></li>
				<li class='active'>Locations</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="my-wishlist-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4">Location</th>
				</tr>
                
    

    </thead>
			<tbody>
            <div class="card text-center bg-maincolor m-auto" style="width: 95%;">
       
       <div class="card-body" style = "margin-left:250px">
           <div class="row">
               <div class="col-sm-6">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3906.936253923343!2d76.18309311475755!3d11.698927491699585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba609d06843c927%3A0x9d6c000265840d12!2zV2F5YW5hZGFucyBNb29ubmFuYWt1emh5LCBTS00gZmVlZHMsIOC0leC0vuC0suC0v-C0pOC1jeC0pOC1gOC0seC1jeC0sSwg4LSV4LWL4LS04LS_4LSk4LWN4LSk4LWA4LSx4LWN4LSxLCDgtIbgtJ_gtY0g4LSk4LWA4LSx4LWN4LSxLCDgtJXgtYvgtLTgtL_gtK7gtYHgtJ_gtY3gtJ8!5e0!3m2!1sen!2sin!4v1653545987113!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
               <div class="col-sm-6 d-flex justify-content-center">
                   
               </div>
           </div>
       </div>
   </div>
			</tbody>
		</table>
	</div>
</div>	
    
    
					</div><!-- /.row -->
		</div><!-- /.sigin-in-->

</div>
</div>
</body>
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

</html>

    

    

    

</body>

</html>
