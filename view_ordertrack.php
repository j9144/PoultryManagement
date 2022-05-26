<?php
session_start();
include 'DbConnect.php';
$id = $_POST['uid'];
?>

<div class="modal-header">
					  <?php
                        $sql = "select `Reference_Number`,`status` from tbl_orders where `Order_Id` = '$id'";
                        $res = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($res)){
                        
					  ?>
                    <h4 class="modal-title mx-auto" >Order Status<br>Order Number - <?php echo $row['Reference_Number'];?></h4>
                    
 </div>

 <div class="modal-body" style = "width:100%">
                    <div class="progress-track">
                        <ul id="progressbar" >
                        <?php
                        if($row['status'] == 1)
                        {
                            echo('
                            <li class="step0 active " id="step1" style = "font-size:20px">Shipped</li>
                            <li class="step0 text-center" id="step2" style = "font-size:20px" >In Transit</li>
                            <li class="step0 text-right" id="step3" style = "font-size:20px">Out for Delivery</span></li>
                            <li class="step0 text-right" id="step4" style = "font-size:20px">Delivered</li>
                            ');
                        }
                        if($row['status'] == 2)
                        {
                            echo('
                            <li class="step0 active " id="step1" style = "font-size:20px">Shipped</li>
                            <li class="step0 active text-center" id="step2" style = "font-size:20px" >In Transit</li>
                            <li class="step0 text-right" id="step3" style = "font-size:20px">Out for Delivery</span></li>
                            <li class="step0 text-right" id="step4" style = "font-size:20px">Delivered</li>
                            ');
                        }
                        if($row['status'] == 3)
                        {
                            echo('
                            <li class="step0 active " id="step1" style = "font-size:20px">Shipped</li>
                            <li class="step0 active text-center" id="step2" style = "font-size:20px" >In Transit</li>
                            <li class="step0 active text-right" id="step3" style = "font-size:20px">Out for Delivery</span></li>
                            <li class="step0 text-right" id="step4" style = "font-size:20px">Delivered</li>
                            ');
                        }
                        if($row['status'] == 4)
                        {
                            echo('
                            <li class="step0 active " id="step1" style = "font-size:20px">Shipped</li>
                            <li class="step0 activetext-center" id="step2" style = "font-size:20px" >In Transit</li>
                            <li class="step0 activetext-right" id="step3" style = "font-size:20px">Out for Delivery</span></li>
                            <li class="step0 active text-right" id="step4" style = "font-size:20px">Delivered</li>
                            ');
                        }

                        
                        
                        ?>
                            
                            
                            
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="row">
                      <div class="col-9">
                        <div class="details d-table">
                          <div class="d-table-row">
                            <div class="d-table-cell">
                              Shipped with
                            </div>
                            <div class="d-table-cell">
                              UPS Expedited
                            </div>
                          </div>
                          <div class="d-table-row">
                            <div class="d-table-cell">
                              Estimated Delivery
                            </div>
                            <div class="d-table-cell">
                              02/12/2017
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="d-table-row">
                          <a href=#><i class="fa fa-phone" aria-hidden="true"></i></a>
                        </div>
                        <div class="d-table-row">
                          <a href=#><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>      
                  </div>                  
              </div>
            </div>
            </div>
