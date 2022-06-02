<?php
error_reporting(0);
include_once("DbConnect.php");
extract($_POST);
$sql1=mysqli_query($con,"SELECT * FROM tbl_orders WHERE OrderDateselect tbl_orders.Order_Id,tbl_orders.User_Id,tbl_orders.Product_Id,tbl_orders.Quantity,tbl_orders.PaymentMethod,tbl_orders.OrderDate,tbl_orders.Reference_Number,tbl_orders.status,tbl_users.Name,tbl_products.name,tbl_products.productShippingcharge,tbl_products.productPrice from tbl_orders join tbl_users on tbl_orders.User_Id = tbl_users.User_Id join tbl_products on tbl_orders.Product_Id = tbl_products.id WHERE OrderDate  between '".$from_date."' AND '".$to_date."'");
echo "<table class='table table-bordered'  style ='margin-left:5px;width:100%' >
	  <tr>
      <th>Reference No</th>
      <th>Date</th>
      <th>Customer Name</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Amount</th>
      <th>Payment Method</th>
      <th>Status</th>
		
	 </tr>";
		while($row = mysqli_fetch_array($sql1))
		{
            $totalprice = $row['Quantity']*$row['productPrice'] + $row['productShippingcharge'];
		  echo "<tr>";
			  echo "<td>" . $row['Reference_Number'] . "</td>";
			  echo "<td>" . $row['OrderDate'] . "</td>";
              echo "<td>" . $row['Name'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
			  echo "<td>" . $row['Quantity'] . "</td>";
              echo "<td>" . $totalprice . "</td>";
			  echo "<td>" . $row['PaymentMethod'] . "</td>";
              ?>
			  <td class="text-center">
							<?php 
							switch ($row['status']) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;

								case '2':
									echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
									break;
						
								case '3':
									echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
									break;
								
								case '4':
									echo "<span class='badge badge-pill badge-success'>Delivered</span>";
									break;
								
								default:
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								
								
							}

							
			  
		  echo "</tr>";
		}
echo "</table>";
?>