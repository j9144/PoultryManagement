<?php
//session_start();
//if(!isset($_SESSION['id'])){
  //header('login.php');
//}
//if ($_SESSION["role"]!=1)
 //{
  //header("Location: index.html");
//}
include "DbConnect.php";
include "supplierview.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poultry Farm</title>
    <!-- pdf download -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<!-- pdf download -->
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstraps.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
 
  <!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" /> -->
<style type="text/css">
  .buttonn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
 .buttonn1 {
background-color: #cc0000; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}



  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#cat{
  width: 600px;
    margin: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.tm-main-section { padding: 100px; padding-left: 150px; }
div.main {
  width: 100px;
  margin: auto;
}
#cont
{
  padding:50px;
  font-weight: bolder;
  color: white;
}

 .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }

            /** RTL **/
            .invoice-box.rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .invoice-box.rtl table {
                text-align: right;
            }

            .invoice-box.rtl table tr td:nth-child(2) {
                text-align: left;
            }
</style>

  </head>
  <body>
    <!-- Preloader -->
    
 
        <section class="tm-welcome-section" style="padding: 50px;">
<div class="" style="text-align: center; padding-left:50px; color:white; ">
      <h1 style="color: black;padding-top: 30px;padding-bottom: 10px; ">YOUR BILL OF ORDERS FROM FARMERS</h1>

  <?php

  include("DbConnect.php");
  //$login=$_SESSION['id'];
   // echo $login;
   // 
   $id = $_GET['id'];
  $sql1="SELECT tbl_supplierbill.SBill_Id,tbl_orderfeedsupplier.SOrderDate,tbl_orderfeedsupplier.SDDate,tbl_orderfeedsupplier.SAddress,tbl_staffregister.Name,tbl_staffregister.Address,tbl_staffregister.Email, tbl_staffregister.Phone_No, tbl_orderfeedsupplier.SQuantity,tbl_feedsupplier.Feed_Price,tbl_orderfeedsupplier.Supplier_Id,tbl_supplierbill.SPrice FROM `tbl_orderfeedsupplier` JOIN  tbl_staffregister ON tbl_orderfeedsupplier.Supplier_Id = tbl_staffregister.StaffReg_Id  JOIN`tbl_supplierbill` ON tbl_orderfeedsupplier.SOrder_Id = tbl_supplierbill.SOrder_Id  JOIN `tbl_feedsupplier` ON tbl_orderfeedsupplier.SType_Id = tbl_feedsupplier.SFeed_Type";
  $res1=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res1))
  {


?>
      <div class="invoice-box" style="background-color: white" id="d1">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                     <h1 class="tm-site-name tm-handwriting-font" style="font-size: 50px;">Poultry Farm</h1>
                                </td>

                                <td>
                                    Invoice #: <?php echo $row['SBill_Id'];?><br />
                                    Order Date: <?php echo $row['SOrderDate'];?><br />
                                    Delivered Date: <?php echo $row['SDDate'];?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                  <?php
                                  //$login=$row['login'];
                                    $s="SELECT * FROM `tbl_staffregister` where Type_Id = 1";
                                     $r1=mysqli_query($con,$s);
                                    while($row1=mysqli_fetch_array($r1))
                                      {
                                
                                    echo "",$row1['Name'],"<br />";
                                    echo "",$row['Address'],"<br />";
                                    echo "",$row1['Email'],"<br />";
                                    echo "",$row1['Phone_No'],"<br />";
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php echo $row['Name'];?><br />
                                    <?php echo $row['Email'];?><br />
                                   <?php echo $row['Phone_No'];?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr class="heading">
                    <td>Item</td>

                    <td>#</td>
                </tr>

                <tr class="item">
                    <td>Supplies Quantity</td>

                    <td> <?php echo $row['SQuantity'];?></td>
                </tr>

                <tr class="item">
                    <td>Price Per Kg</td>

                    <td> <?php echo $row['Feed_Price'];?></td>
                </tr>

                

                <tr class="total">
                    <td></td>

                    <td>Total: <?php echo $row['SPrice'];?></td>
                </tr>
            </table>
        </div>
        <div style="padding: 20px;">
  <center><button class="buttonn" id="btnExport" ><i class="fa fa-download"></i> Download</button></center>

</div>
</div>
<?php break;}?>
    </section>
         





       
    <div style="padding: 50x;"></div>
    

 </body>
 </html>
  <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#d1')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("bill.pdf");
                }
            });
        });
    </script>