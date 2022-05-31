<?php
session_start();
if(!isset($_SESSION['id'])){
      //echo("session id set");
  //header('stafflogin.html');
}
if ($_SESSION["Type_Id"]!=1)
 {
     echo($_SESSION["Type_Id"]);
 // header("Location:stafflogin.html");
}
  //  $id=$_SESSION['id'];

// echo $bid;
// echo $id;
    $total=0;?>
    <!DOCTYPE html>
<html>
<head>

     <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style type="text/css">
        body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: grey;
    background-image: url(" images/p-1.jpg");
    font-size: 0.8rem
}

.card {
    max-width: 1000px;
    margin: 2vh
}

.card-top {
    padding: 0.7rem 5rem
}

.card-top a {
    float: left;
    margin-top: 0.7rem
}

#logo {
    font-family: 'Dancing Script';
    font-weight: bold;
    font-size: 1.6rem
}

.card-body {
    padding: 0 5rem 5rem 5rem;
    background-image: url("https://i.imgur.com/4bg1e6u.jpg");
    background-size: cover;
    background-repeat: no-repeat
}

@media(max-width:768px) {
    .card-body {
        padding: 0 1rem 1rem 1rem;
        background-image: url("https://i.imgur.com/4bg1e6u.jpg");
        background-size: cover;
        background-repeat: no-repeat
    }

    .card-top {
        padding: 0.7rem 1rem
    }
}

.row {
    margin: 0
}

.upper {
    padding: 1rem 0;
    justify-content: space-evenly
}

#three {
    border-radius: 1rem;
    width: 22px;
    height: 22px;
    margin-right: 3px;
    border: 1px solid blue;
    text-align: center;
    display: inline-block
}

#payment {
    margin: 0;
    color: blue
}

.icons {
    margin-left: auto
}

form span {
    color: rgb(179, 179, 179)
}

form {
    padding: 2vh 0
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

.header {
    font-size: 1.5rem
}

.left {
    background-color: #ffffff;
    padding: 2vh
}

.left img {
    width: 2rem
}

.left .col-4 {
    padding-left: 0
}

.right .item {
    padding: 0.3rem 0
}

.right {
    background-color: #ffffff;
    padding: 2vh
}

.col-8 {
    padding: 0 1vh
}

.lower {
    line-height: 2
}

.btn {
    background-color: rgb(23, 4, 189);
    border-color: rgb(23, 4, 189);
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin: 4vh 0 1.5vh 0;
    padding: 1.5vh;
    border-radius: 0
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

a {
    color: black
}

a:hover {
    color: black;
    text-decoration: none
}

input[type=checkbox] {
    width: unset;
    margin-bottom: unset
}

#cvv {
    background-image: linear-gradient(to left, rgba(200, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}
.tm-site-logo,
 .tm-site-name {
  vertical-align: bottom;
}
.tm-site-name {
  color: #c79c60;
  display: inline-block;
  font-size: 32px;
  margin: 0 10px;  
}
.tm-handwriting-font { font-family: 'Damion', cursive; }


    </style>
    <title></title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'><script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>
<body>
<?php

        include("DbConnect.php");
        $supplier= $_POST['supplier'];
       // $_SESSION['id']=$row['StaffReg_Id'];
        $type= $_POST['type'];
      //  echo $type,"  ",$suplier;
        $quantity= $_POST['quantity'];
        // $ddate= $_POST['ddate'];
        // $address= $_POST['address'];
       // $login=$_SESSION['id'];
        $d=date("Y/m/d");
        
        $sq="SELECT * FROM `tbl_feedsupplier` WHERE `SFeed_Type` = '$type'  AND Feed_Quantity > $quantity AND SFeed_Type in (SELECT SFeed_Type FROM tbl_feedsupplier)";
        $res1 = mysqli_query($con, $sq);
        // mysqli_close($con);
         $n=mysqli_num_rows($res1);
        if($n==0)
        {
            ?>
            <div> <h1>SUPPLY OUT OF STOCK PLEASE ORDER AFTER SOMETIME </h1>
            </div>
            <?php
        } 
        else 
        {
            $d=date("Y/m/d");
            ?>


<div class="card">

    <form action="ordersuppliesfarmer.php" method="post">
    <div class="card-top border-bottom text-center"> <a href="shop.php"> Back to shop</a> <span id="logo"> <h1 class="tm-site-name tm-handwriting-font">Poultry Farm</h1></span> </div>
    <div class="card-body">
        <div class="row upper">  <span><i class="fa fa-check-circle-o"></i> Order details</span> <span id="payment"><span id="three">3</span>Payment</span> </div>
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"> <span class="header">Payment</span>
                        <div class="icons"> <img src="Paypal.png" style = "height:100px; width:100px" />  </div>
                    </div>
                    <form> <span>Cardholder's name:</span> <input placeholder="JINTA SUSAN MATHEW" pattern="[A-Za-z]{1,32}" required="">
                     <span>Card Number:</span> <input placeholder="0125 6780 4567 9909" pattern= "[0-9]{13,16}" required="">
                        <div class="row">
                            <div class="col-4"><span>Expiry date:</span> <input placeholder="YY/MM" pattern="([0-9]{2}[/]?){2}" required=""> </div>
                            <div class="col-4"><span>CVV:</span> <input  type = "password" id="cvv" pattern="^[0-9]{3}$" required=""> </div>
                        </div> <input type="checkbox" id="save_card" class="align-left"> <label for="save_card">Save card details to wallet</label>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    <div class="header">Payment Summary</div>
                    
                                            <?php
                     

?>
<input type="hidden" name="supplier" value="<?php echo $supplier;?>">
<input type="hidden" name="type" value="<?php echo $type;?>">
<input type="hidden" name="quantity" value="<?php echo $quantity;?>">
<input type="hidden" name="ddate" value="<?php echo $ddate;?>">
<input type="hidden" name="address" value="<?php echo $address;?>">
                    <div class="row item">
                     
                        <div class="col" >
                            <div class="row">
                                <table>
                                    <tr>
                                        <td >
                                             Supplies Quantity
                                        </td>
                                        <td style="font-size: 20px;">
                                            <?php echo $quantity; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Booking Date
                                        </td>
                                        <td style="font-size: 20px;">
                                            <?php echo $d; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <!-- <td>
                                           Delivery Date
                                        </td>
                                        <td style="font-size: 20px;">
                                            <?php echo $ddate; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           Delivery Address
                                        </td>
                                        <td style="font-size: 20px;">
                                            <?php echo $address; ?>
                                        </td>
                                    </tr> -->
                                    
                                        <?php
                       require("DbConnect.php");
                   
                    $res1=mysqli_query($con,$sq);
                

                    $total=0;
                    $rate=0;
                     while($row=mysqli_fetch_array($res1))
                     {
                        $rate=$row['Feed_Price'];
                        $total=$quantity*$rate;
                    }
                    ?>
                                    <tr>
                                        <td>
                                            Average supplies rate per KG
                                        </td>
                                        <td style="font-size: 20px;">
                                            <?php echo $rate; ?>
                                        </td>
                                    </tr>
                                </table>
                                    
                                </div>
                                
                                    
                               
                            </div>
                            
                           
                        </div>
                    </div>

                    <hr>
                    
                   
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay(Rs)</b></div>
                        <div class="col text-right"><b> <?php echo " ".$total." /-"; ?></b></div>
                    </div>
                    <input type="submit" class="btn" name="submit" value="Place order">
                  
                    
                    <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                   
                </form>
                </div>

            <?php



        }

?>

           
</body>
</html>

<script>
 function logout()
 {
         var x=confirm("Click ok  to logout");
         if(x===true)
         {


             window.location.assign("StaffLogout.php");


         }
         else
         {
             return false;
         }
 }
 </script>
