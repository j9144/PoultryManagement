<?php 
include 'adminheader.php';
include 'DbConnect.php';
 
if(isset($_POST['submit'])){
    $name = $_POST['user_name'];
    $user = $_POST['user_type'];
    $add = $_POST['address'];
    $email =$_POST['email'];
    $no = $_POST['number'];

    $sql = "insert into tbl_register (`Name`,`Address`,`Email`,`Phone_NO`) values ('$name','$add','$email','$no')";
    $result = mysqli_query($con,$sql);
}
 ?>  


<br>
<!DOCTYPE html>
<html>
<head>
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
    border: 1px solid transparent;
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
<center>
                  <div class="panel panel-default">
        <div class="panel-heading"> CUSTOMERS </div>
        <div class="panel-body" >
        <div class="row">
              
            <div class="col-sm-3">
            <form method="post" enctype="multipart/form-data">
                   <label> Name</label>  
                   <input type="text" name="user_name" class="form-control"/>  <br>
                   <label> User Type</label>  
                   <input type="text" name="user_type" class="form-control"/> <br>
                   <label>Address</label>  
                   <textarea  name="address" class="form-control"></textarea> <br>
                   <label> Email </label>  
                   <input type="email" name="email" class="form-control"/> <br>
                   <label> Phone Number</label>  
                   <input type="number" name="number" class="form-control"/> 
                   <br>
                   <input type="submit" id="insert" class="btn btn-success"  name="submit">
              </div>
              </form>
                <div class="table-responsive">
                <table id="product_table" class="table table-bordered">
                    <thead>
                    <tr>
                   
                    <th>Customer_Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Toggle</th>
                    </tr>
                    </thead>
                    <tbody>
                          <?php  
        
                          $result = mysqli_query($con,"SELECT * FROM `tbl_register` where Status = '0'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr>  
                                 
                               <td><?php echo $row["Name"]; ?></td>  
                               <td><?php echo $row["Address"]; ?></td> 
                               <td><?php echo $row["Email"]; ?></td> 
                               <td><?php echo $row["Phone_No"]; ?></td> 
                            
                               
                               <td><a href="EditCust.php?id=<?php echo $row["Reg_ID"]; ?>" class="edit btn btn-primary btn-xs"> <i class = "fas fa-edit"> </i> Edit</a></td>  
                               <td><?php 
                        
                        $id = $row['Reg_ID'];
                        $sql2 = "select * from tbl_register where Reg_ID = '$id'";
                        $res = mysqli_query($con,$sql2);
                        $row = mysqli_fetch_array($res);
                        if($row['Toggle']=="1") 
                            echo "Active";
                        else 
                            echo "Inactive";
                    ?>                          
                </td>
                <td>
                    <?php 
                    if($row['Toggle']=="1") 
                        echo 
                        "<a href=pdeactivate.php?id=".$row['Reg_ID']." class='btn red ' >Deactivate</a>";
                          else 
                        echo 
                        "<a href=pactivate.php?id=".$row['Reg_ID']." class='btn green'>Activate</a>";
                    ?>
            </tr>
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
            <!-- /.row -->
        <!-- /#page-wrapper -->

    </div>
 
</body>

</html>


<script>
$(document).ready(function() {
    $('#product_table').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>