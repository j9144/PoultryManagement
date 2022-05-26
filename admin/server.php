<?php
include "../config.php";
error_reporting(0);
$uid = $_POST['uid'];
$query = "SELECT * FROM `tbl_loanapplication` WHERE id = '$uid'";
$res = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($res))
{
?>
<table class="table" style="outline:none;">
<tbody>
<tr>
      <td colspan="2">
      <?php
      if($row['loan_status'] == 'Applied')
            {
                echo('
                <div class="card card-timeline ml-n4" style="border:none;">
                <ul class="bs4-order-tracking">
                    <li class="step active">
                        <div><i class="fa fa-check"></i></div> Applied
                    </li>
                    <li class="step">
                        <div><i class="fa fa-times"></i></div> Processing
                    </li>
                    <li class="step">
                        <div><i class="fa fa-times"></i></div> Approved
                    </li>
                </ul>
              </div>
                ');
            }
      if($row['loan_status'] == 'Processing')
      {
          echo('
          <div class="card card-timeline ml-n4" style="border:none;">
          <ul class="bs4-order-tracking">
              <li class="step active">
                  <div><i class="fa fa-check"></i></div> Applied
              </li>
              <li class="step active">
                  <div><i class="fa fa-check"></i></div> Processing
              </li>
              <li class="step">
                  <div><i class="fa fa-times"></i></div> Approved
              </li>
          </ul>
        </div>
          ');
      }
      if($row['loan_status'] == 'Approved')
      {
        echo('
        <div class="card card-timeline ml-n4" style="border:none;">
        <ul class="bs4-order-tracking">
            <li class="step active">
                <div><i class="fa fa-check"></i></div> Applied
            </li>
            <li class="step active">
                <div><i class="fa fa-check"></i></div> Processing
            </li>
            <li class="step active">
                <div><i class="fa fa-check"></i></div> Approved
            </li>
        </ul>
      </div>
        ');
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
      <td>State</td>
      <td><?php echo $row['state']; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $row['district']; ?></td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td><?php echo $row['mobile']; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><?php echo $row['age']; ?></td>
    </tr>
    <tr>
      <td>Occupation</td>
      <td><?php echo $row['occupation']; ?></td>
    </tr>
    <tr>
      <td>Loan amount</td>
      <td><?php echo $row['loan_amt']; ?></td>
    </tr>
    <tr>
      <td>Property Description</td>
      <td><?php echo $row['prop_des']; ?></td>
    </tr>
    <tr>
      <td>Bank</td>
      <td><?php echo $row['bank']; ?></td>
    </tr>
    <tr>
      <td>Income</td>
      <td><?php echo $row['income']; ?></td>
    </tr>
    <tr>
      <td>Applied date</td>
      <td><?php echo $row['date']; ?></td>
    </tr>
  </tbody>
</table>

    <!-- <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name:</label>
      <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
      <label for="message-text" class="col-form-label">Address:</label>
      <input type="text" value="<?php echo $row['address']; ?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">State:</label>
    <input type="text" value="<?php echo $row['state']; ?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">District:</label>
        <input type="text" value="<?php echo $row['district'];?>" class="form-control" id="recipient-name" readonly>
        </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Mobile:</label>
    <input type="text" value="<?php echo $row['mobile'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="message-text" class="col-form-label">Email:</label>
    <input type="text" value="<?php echo $row['email'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Age:</label>
    <input type="text" value="<?php echo $row['age'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="message-text" class="col-form-label">Occupation:</label>
    <input type="text" value="<?php echo $row['occupation'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Loan amount:</label>
    <input type="text" value="<?php echo $row['loan_amt'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="message-text" class="col-form-label">Property description:</label>
    <input type="text" value="<?php echo $row['prop_des'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Bank:</label>
    <input type="text" value="<?php echo $row['bank'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="message-text" class="col-form-label">Income:</label>
    <input type="text" value="<?php echo $row['income'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Applied date:</label>
    <input type="text" value="<?php echo $row['date'];?>" class="form-control" id="recipient-name" readonly>
    </div>
    <div class="form-group">
    <label for="message-text" class="col-form-label">Status:</label>
    <input type="text" value="<?php echo $row['loan_status'];?>" class="form-control" id="recipient-name" readonly>
    </div> -->
<?php
}
?>