<?php require APPROOT . '/views/inc_admin/header.php'; 
$vendor = $data['vendor'];?> 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>New Settlement</h4>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->


             


             

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                              
                                    <div class="col-md-6">
                                        <h3>Delivery Orders</h3>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>Order Type</th>
										<th>Customer Name</th>
										<th>Customer Phone</th> 
										<th>Total</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>
                                        <th>Items</th>



									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $delivery_total = 0;
									foreach($data['delivery_orders'] as $order):
                                        $delivery_total = $delivery_total + $order->total;
										if($order->payment_status == 1){
											$payment_status = "Paid";
												} else {
											$payment_status = "Not Paid";
										}	
										if($order->order_type == 0){
											$type = "Online";
										} else if($order->order_type == 1){
													$type = "Dine In";
										} else if($order->order_type == 2){
											$type = "Self Pickup";
								        }	
									?>
									<tr>
                                   
                                    <td><strong><?php echo $type; ?></strong></td>
                                   
                                    <td><strong></i><?php echo $order->name; ?></strong></td> <td><strong><?php echo $order->phone; ?></strong></td>
									 <td><strong><i class="fa fa-inr"></i><?php echo $order->total; ?></strong></td>
									
									<td><strong><?php echo $payment_status; ?></strong></td>
                                    <td><strong> <?php echo  date("M jS Y, h:m a", strtotime($order->created_at)); ?></strong></td>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/admin/vendor_order/<?php echo $order->id; ?>"><button class='btn btn-success btn-xs'>View</button></a>
									
                                     </td>
									<?php if($payment_status=="Not Paid"){ ?>
								
									<?php }?>
									</tr>
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
                                  <td></td>
                                  <td></td>
                                  <td>Grand Total</td>
                                   <td><strong><i class="fa fa-inr"></i><?php echo $delivery_total; ?></strong></td>
                                  
                                  
                                  <td></td>
                                 
                                  </tr>
								</tbody>


							

							</table>
									
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                              
                                    <div class="col-md-6">
                                        <h3>Self Pickup Orders</h3>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>Order Type</th>
										<th>Customer Name</th>
										<th>Customer Phone</th> 
										<th>Total</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>
                                        <th>Items</th>


									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $pickup_total = 0;
									foreach($data['pickup_orders'] as $order):
                                        $pickup_total = $pickup_total + $order->total;
										if($order->payment_status == 1){
											$payment_status = "Paid";
												} else {
											$payment_status = "Not Paid";
										}	
										if($order->order_type == 0){
											$type = "Online";
										} else if($order->order_type == 1){
													$type = "Dine In";
										} else if($order->order_type == 2){
											$type = "Self Pickup";
								        }	
									?>
									<tr>
                                   
                                    <td><strong><?php echo $type; ?></strong></td>
                                   
                                    <td><strong></i><?php echo $order->name; ?></strong></td> <td><strong><?php echo $order->phone; ?></strong></td>
									 <td><strong><i class="fa fa-inr"></i><?php echo $order->total; ?></strong></td>
									
									<td><strong><?php echo $payment_status; ?></strong></td>
                                    <td><strong> <?php echo  date("M jS Y, h:m a", strtotime($order->created_at)); ?></strong></td>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/admin/vendor_order/<?php echo $order->id; ?>"><button class='btn btn-success btn-xs'>View</button></a>
									
                                     </td>
									<?php if($payment_status=="Not Paid"){ ?>
								
									<?php }?>
									</tr>
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
                                  <td></td>
                                  <td></td>
                                  <td>Grand Total</td>
                                   <td><strong><i class="fa fa-inr"></i><?php echo $pickup_total; ?></strong></td>
                                  
                                  
                                  <td></td>
                                 
                                  </tr>
								</tbody>


							

							</table>
									
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                              
                                    <div class="col-md-6">
                                        <h3>Dine Orders</h3>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>Order Type</th>
										<th>Customer Name</th>
										<th>Customer Phone</th> 
										<th>Total</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>
                                        <th>Items</th>


									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $dine_total = 0;
									foreach($data['dine_orders'] as $order):
                                        $dine_total = $dine_total + $order->total;
										if($order->payment_status == 1){
											$payment_status = "Paid";
												} else {
											$payment_status = "Not Paid";
										}	
										if($order->order_type == 0){
											$type = "Online";
										} else if($order->order_type == 1){
													$type = "Dine In";
										} else if($order->order_type == 2){
											$type = "Self Pickup";
								        }	
									?>
									<tr>
                                   
                                    <td><strong><?php echo $type; ?></strong></td>
                                   
                                    <td><strong></i><?php echo $order->name; ?></strong></td> <td><strong><?php echo $order->phone; ?></strong></td>
									 <td><strong><i class="fa fa-inr"></i><?php echo $order->total; ?></strong></td>
									
									<td><strong><?php echo $payment_status; ?></strong></td>
                                    <td><strong> <?php echo  date("M jS Y, h:m a", strtotime($order->created_at)); ?></strong></td>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/admin/vendor_order/<?php echo $order->id; ?>"><button class='btn btn-success btn-xs'>View</button></a>
									
                                     </td>
									<?php if($payment_status=="Not Paid"){ ?>
								
									<?php }?>
									</tr>
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
                                  <td></td>
                                  <td></td>
                                  <td>Grand Total</td>
                                   <td><strong><i class="fa fa-inr"></i><?php echo $dine_total; ?></strong></td>
                                  
                                  
                                  <td></td>
                                 
                                  </tr>
								</tbody>


							

							</table>
									
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="table-reponsive">

                                <h4>Payable Details</h4><br>
<div class="row">

    <div class="col-md-4">
        Delivery Total: <i class="fa fa-inr"></i><b><?php echo $delivery_total; ?></b><br>
        <?php
        $payable_total = 0;
        $delivery_payable = 0; 
        $pickup_payable = 0; 
        $dine_payable = 0;


        $delivery_commission = ($delivery_total * 10)/100;
        $delivery_payable = $delivery_total - $delivery_commission;
        ?>
        commission (10%): <i class="fa fa-inr"></i><b><?php echo $delivery_commission; ?></b><br>
        Payable : <i class="fa fa-inr"></i><b><?php echo $delivery_payable; ?></b>
    </div>
    <div class="col-md-4">
        Pickup Total: <i class="fa fa-inr"></i><b><?php echo $pickup_total; ?></b><br>
        <?php
        $pickup_commission = ($pickup_total * 10)/100;
        $pickup_payable = $pickup_total - $pickup_commission;
        ?>
        commission (10%): <i class="fa fa-inr"></i><b><?php echo $pickup_commission; ?></b><br>
        Payable : <i class="fa fa-inr"></i><b><?php echo $pickup_payable; ?></b>
    </div>
    <div class="col-md-4">
        Dine Total: <i class="fa fa-inr"></i><b><?php echo $dine_total; ?></b><br>
        <?php
        $dine_commission = ($dine_total * 2)/100;
        $dine_payable = $dine_total - $dine_commission;
        ?>
        commission (2%): <i class="fa fa-inr"></i><b><?php echo $dine_commission; ?></b><br>
        Payable : <i class="fa fa-inr"></i><b><?php echo $dine_payable; ?></b>
    </div>
</div>
<hr>
<div class="row">

    <div class="col-md-4">
    <?php
        $commission_total = $delivery_commission + $pickup_commission + $dine_commission;
        ?>
        <h5>Total Commission: <i class="fa fa-inr"></i><b><?php echo $commission_total; ?></b></h5>
    </div>
    <div class="col-md-4">
        
    </div>
    <div class="col-md-4">
        <?php
        $payable_total = $delivery_payable + $pickup_payable + $dine_payable;
        ?>
        <h5>Total Payable: <i class="fa fa-inr"></i><b><?php echo $payable_total; ?></b></h5>
    </div>
</div>
<hr>
								<form action="<?php echo URLROOT; ?>/admin/create_settlement/<?php echo $vendor->vendor_id; ?>/<?php echo $payable_total; ?>/<?php echo $commission_total; ?>" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                 
                                <div class="col-md-4">
                                <label for="">Transaction Details (TYPE : ID)</label>
                                 <input type="text" class="form-control" name="transaction_id" placeholder="Enter Transaction Details" required>
                                 </div>
                                 
                                 <div class="col-md-4">
                                <label for="">Upload Reciept</label>
                                 <input type="file" class="form-control" name="reciept_file">
                                  </div>
                                  <div class="col-md-4">
                                 <br>
                                      <button class="btn btn-primary">
                                        Settle Balance (<i class="fa fa-inr"></i><b><?php echo $payable_total; ?></b>)
                                      </button>
                                  </div>
                              </div>
                              </form>	
									
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?> 