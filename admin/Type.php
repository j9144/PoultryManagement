<?php
	        // include "adminheader.php";
			
           
            session_start();
        include('DbConnect.php');
        if(strlen($_SESSION['alogin'])==0)
            {	
        header('location:index.php');
        }
        else{
        date_default_timezone_set('Asia/Kolkata');// change according timezone
        $currentTime = date( 'd-m-Y h:i:s A', time () );		

          if (isset($_POST['sub'])){
           
            $role = $_POST['type_name'];
           
            $sql = "insert into tbl_type(Type) values('$role')";
            $result = mysqli_query($con,$sql);
            
           
               
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add Designation</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables/datatables.css">



<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.panel-default {
    border-color: #ddd;
}

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid black;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-left: 257px;
}

.panel-heading {
    padding: 10px 218px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body {
    padding: 15px;
}
.row {
    margin-right: -15px;
    margin-left: 228px;
}
    ul.resp-tabs-list, p {
    margin: 0px;
    padding: 0px;
}

.resp-tabs-list li {
    font-weight: 400;
    font-size: 20px;
    letter-spacing: 2px;
    display: inline-block;
    padding: 13px 15px;
    margin: 0 4px 0 0;
    list-style: none;
    cursor: pointer;
    float: none;
}

.resp-tabs-container {
    padding: 0px;
    background-color: #fff;
    clear: left;
}

h2.resp-accordion {
    cursor: pointer;
    padding: 5px;
    display: none;
}

.resp-tab-content {
    display: none;

    padding: 25px 60px;
}

.resp-tab-active {
    border: 1px solid #212121 !important;
	border-bottom: none;
	margin-bottom: -1px !important;
	padding: 12px 14px 14px 14px !important;
	border-bottom: 0px #fff solid !important;
}
.resp-vtabs .resp-tabs-list li i {
    color: #000000;
    margin-right: 20px;
    padding: 15px 10px;
    width:50px;
    height: 50px;
    text-align: center;
}
.resp-vtabs .resp-tabs-list li i.fa-mobile {
    padding: 10px 10px;
}
.resp-vtabs .resp-tabs-list li i.fa-mobile {
    font-size:28px;
}
.resp-vtabs li.resp-tab-active i {
    color: #fbfbfb;
    padding: 14px 10px;
    border-radius: 0px;
    width: 50px;
    background: #000;
    margin-right: 20px;
    height: 50px;
}
.resp-vtabs li.resp-tab-active i.fa-mobile {
    padding: 10px 10px;
}
.resp-tab-active {
    border-bottom: none;
    background-color: #212121!important;
    color: #fff;
}

.resp-content-active, .resp-accordion-active {
    display: block;
}

.resp-tab-content {
border: 1px solid #212121;
    border-top-color: #212121;
}

h2.resp-accordion {
    font-size: 13px;
    border: 1px solid #c1c1c1;
    border-top: 0px solid #c1c1c1;
    margin: 0px;
    padding: 10px 15px;
}

h2.resp-tab-active {
    border-bottom: 0px solid #c1c1c1 !important;
    margin-bottom: 0px !important;
    padding: 10px 15px !important;
}

h2.resp-tab-title:last-child {
    border-bottom: 12px solid #c1c1c1 !important;
    background: blue;
}

/*-----------Vertical tabs-----------*/
.agileits-tab_nav {
    float: left;
    width: 30%;
	margin-top: 0!important;
	min-height: 650px;
}
ul.resp-tabs-list.hor_1 {
    margin-top: 0!important;
}
a.w3ls-ads {
    text-decoration: none;
    color: #0099e5;
    font-size: 15px;
    margin: 25px 0 0px 0;
    display: block;
    text-align: center;
}
a.w3ls-ads:hover {
	color:#ff4c4c;
}
.resp-vtabs .resp-tabs-list li {
    display: block;
    padding: 0px 0px !important;
    margin: 0 0 20px;
    cursor: pointer;
    float: none;
    border: 1px solid #F5F5F5;
    border-color: rgb(241, 241, 241)!important;
    background-color: #ffffff!important;
}

.resp-vtabs .resp-tabs-container {
    padding: 0px;
    background-color: rgba(243, 243, 243, 0.25);
    border: none;
    float: left;
    width: 70%;
    border: 1px solid transparent !important;
    border-radius: 0;
    clear: none;
	min-height: 650px;
}

.resp-vtabs .resp-tab-content {
    border: none;
    word-wrap: break-word;
}
/*-- 
li.resp-tab-item.hor_1.resp-tab-active:after {
    content: '';
    position: absolute;
    right: -18px;
    top: 6px;
    border-left: 1px solid #5AB1D0;
    border-right: 0px solid #5AB1D0;
    border-bottom: 1px solid #FFFFFF;
    transform: rotate(134deg);
    border-top: 1px solid #5AB1D0;
    padding: 0 33px 33px 0px;
}
--*/

.resp-vtabs li.resp-tab-active { 
	position: relative;
    z-index: 1;
    margin-right: 0px !important;
    padding: 0px 0px 0px 0px !important;
    margin: 0 0 20px 0 !important;
    background-color: #28ece3! important;
    background: #28ece3;
    color: #fff;
    position: relative;
}
.resp-vtabs li.resp-tab-active:after {
    content: '';
    border-top: 36px solid #28ece3;
    border-right: 0px solid #28ece3;
    border-left: 36px solid rgba(40, 236, 227, 0);
    transform: rotate(45deg);
    position: absolute;
    top: 7px;
    right: -17px;
}
.resp-arrow {
    width: 0;
    height: 0;
    float: right;
    margin-top: 3px;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 12px solid #c1c1c1;
}

h2.resp-tab-active span.resp-arrow {
    border: none;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 12px solid #9B9797;
}

/*-----------Accordion styles-----------*/
h2.resp-tab-active {
    background: #DBDBDB;/* !important;*/
}

.resp-easy-accordion h2.resp-accordion {
    display: block;
}

.resp-easy-accordion .resp-tab-content {
    border: 1px solid #c1c1c1;
}

.resp-easy-accordion .resp-tab-content:last-child {
    border-bottom: 1px solid #c1c1c1;/* !important;*/
}

.resp-jfit {
    width: 100%;
    margin: 0px;
}

.resp-tab-content-active {
    display: block;
}

h2.resp-accordion:first-child {
    border-top: 1px solid #c1c1c1;/* !important;*/
}

/*Here your can change the breakpoint to set the accordion, when screen resolution changed*/
@media only screen and (max-width: 900px) {
	.resp-tabs-list li {
		font-size: 18px;	
	}
}
@media only screen and (max-width: 768px) {
	h2.resp-accordion.hor_1 i {
		width: 45px;
		text-align: center;
		color: #6d6d6d;
		font-size: 18px;
	}
    ul.resp-tabs-list {
        display: none;
    }

    h2.resp-accordion {
        display: block;
    }

    .resp-vtabs .resp-tab-content {
        border: 1px solid #C1C1C1;
    }

    .resp-vtabs .resp-tabs-container {
        border: none;
        width: 100%;
        min-height: 100px;
        clear: none;
    }

    .resp-accordion-closed {
        display: none !important;
    }

    .resp-vtabs .resp-tab-content:last-child {
        border-bottom: 1px solid #c1c1c1 !important;
    }
}
@media (max-width: 768px){
	h2.resp-accordion {
		font-size: 17px;
		border: 1px solid #c1c1c1;
		border-top: 0px solid #c1c1c1;
		margin: 0px;
		padding: 15px 15px;
	}
	.agileits-tab_nav {
		float: none;
		width: 100%;
		margin-top: 0!important;
		min-height: auto;
		margin-bottom: 0px;
	}
}
@media (max-width: 480px){
	.resp-tab-content {
		padding: 25px 35px;
	}
}
@media (max-width: 414px){
	.resp-tab-content {
		padding: 15px 25px;
	}
}
@media (max-width: 320px){
	.resp-tab-content {
		padding: 15px 15px;
	}
}

</style>



<body>
<?php include('include/header.php');?>
      <div class="wrapper">
      <div class="container">
         <div style = "margin-left:-30px">
            <?php include('include/sidebar.php');?>				
            <div class="span9">
               <div class="content">
                  <div class="module" style = "margin-top:-650px;margin-left:300px;width:80%">
							<div class="module-head">
								<h3>Add Designation</h3>
							</div><br>
              <form method="post" enctype="multipart/form-data">
              <label style = "margin-left:20px" >Staff Name</label>  
                          <input type="text" name="type_name" class="form-control" style = "margin-left:20px;  width :80%" />  
                          <br />  
                          <input type="submit" name="sub" class="btn btn-info" value="Submit"  style = "margin-left:20px"/>  
                      
                     <span class="text-success">  
                     <?php  
                     if(isset($success_message))  
                     {  
                          echo $success_message;  
                     }  
                     ?>  
                     </span>  
                </form>  <br>
                  
             
            <div class="col-sm-9" style = "width:80%;margin-left:20px;margin-top:30px">
                <div class="table-responsive">
                <table id="product_table" class="table table-bordered">
                    <thead>
                    <tr>
                    <th width="50px">#</th>
      
                    <th>Staff Name</th>
                    <th>Action</th>
                    
                    
                    
                    </tr>
                    </thead>
                    <tbody>
                    
                    
                    <?php
                        $result = mysqli_query($con,"select * from tbl_type");
                        while($row = mysqli_fetch_array($result)){?>
                        
                           <tr>
                           <td><?php echo $row["Type_Id"];?> </td>
                               
                               <td><?php echo $row["Type"];?> </td>
                               
                               
                         <td>
                            <a href="EditType.php?id=<?php echo $row["Type_Id"]; ?>" class="btn btn-primary btn-xs" ><i class = "fas fa-edit"> </i> Edit</a>
                            <a href="DelType.php?id=<?php echo $row["Type_Id"]; ?>" class="btn btn-danger btn-xs" ><i class = "fas fa-trash"> </i> Delete</a>
                         </td>
                         
                    </tr>  
                    <?php
                     }
                     
                    ?>
                    </tbody>
                </table>
            </div>
            </div>
         </div>
        </div>
        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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

</html>
<?php } ?>