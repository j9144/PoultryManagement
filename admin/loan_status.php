<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$c_date = date("d/m/Y");
include 'header1.php';
?>
<div class="container1">
<div id="hide_div">
<section class="py-5 my-3">
        <center><h3 class="mb-3 mt-n4"><b>Home Loan Application status</b></h3></center>
        <div class="container">
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <?php
                  $no = 1;
									$r = "SELECT * FROM `tbl_loanapplication` WHERE `user_id` = '$email'";
									$s = mysqli_query($conn,$r);
									if(mysqli_num_rows($s))
									{
										echo '
										<table class="table table-bordered m-3">
										<thead>
											<tr>
											<th scope="col">#</th>
											<th scope="col">Name</th>
											<th scope="col">District</th>
											<th scope="col">Mobile</th>
											<th scope="col">Bank</th>
                      <th scope="col">Applied Date</th>
                      <th scope="col">Action</th>
											</tr>
										</thead>';
										while ($row = mysqli_fetch_array($s))
										{
										echo'<tbody>
											<tr>
											<td>'.$no.'</td>
											<td>'.$row['name'].'</td>
											<td>'.$row['district'].'</td>
                      <td>'.$row['mobile'].'</td>
											<td>'.$row['bank'].'</td>
											<td>'.$row['date'].'</td>';
                      if($row['loan_status']=='Processing')
                      {
                        echo '<td><button type="button" class="btn btn-warning btn-sm" style="padding: 3px;font-size: 12px;font-weight:500;">Processing</button></td>';
                      }
                      if($row['loan_status']=='Approved')
                      {
                        echo '<td><button type="button" class="btn btn-success btn-sm" style="padding: 2\3px;font-size: 12px;font-weight:500;>Approved</button></td>';
                      }
                      if($row['loan_status']=='Rejected')
                      {
                        echo '<td><button type="button" class="btn btn-info btn-sm" style="padding: 3px;font-size: 12px;font-weight:500;>Rejected</button></td>';
                      }
                      echo '<td>
                      <button data-id="'.$row['id'].'" class="btn btn-info btn-sm" id="mbtn">View <i class="fa fa-eye"></i></button>
                      </td>';
											echo '</tr>';
                      $no++;
										}
										echo '</tbody>
										</table>';
									}
									else
									{
										echo'<h6 class="m-3"><font color="red"><center>No applications submitted yet</center></font></h6>';
									}
									?>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width:100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Home Loan Application Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>


<div id="show_div" style="display:none">
<div class="container">
  <div class="alert alert-success mx-5 w-75 p-4 my-3 mb-6 mt-5" role="alert">
    <h4 class="alert-heading">Success!</h4>
    <p>Your Loan Application has been submitted successfully</p>
  </div>
</div>
</div>
<div id="error_div" style="display:none">
<div class="container">
  <div class="alert alert-danger mx-5 w-75 p-4 my-3 mb-6 mt-5" role="alert">
    <h4 class="alert-heading">Alert!</h4>
    <p>You have already submitted a loan application, wait till the application been processed.</p>
  </div>
</div>
</div>
</div>
<script>
  var loadFile1 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output1');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile2 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output2');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile3 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output3');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
<script type="text/javascript">
  function goBack()
  {
    window.location.href = "home.php";
  }
  $(document).ready(function(){
      $('#mbtn').click(function(){
         var uid = $(this).data('id');
         $.ajax({
          url: 'server.php',
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
<script src="../assets/js/jquery_validator.js"></script>
<?php
include 'userloanController.php';
include 'footer.php';

?> 