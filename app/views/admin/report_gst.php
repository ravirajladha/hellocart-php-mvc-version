<?php require APPROOT . '/views/inc_admin/header.php'; ?> 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>GST Report</h4>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>Order Type</th>
										<th>Customer Name</th>
										<th>Total</th> 
										<th>GST</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>

									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $grand_total = 0;
									foreach($data['orders'] as $order):
                                        $grand_total = $grand_total + $order->tax_value;
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
                                   
                                    <td><strong></i><?php echo $order->name; ?></strong></td> 
									 <td><strong><i class="fa fa-inr"></i><?php echo $order->total; ?></strong></td>
									 <td><strong><i class="fa fa-inr"></i><?php echo $order->tax_value; ?></strong></td>
									<td><strong><?php echo $payment_status; ?></strong></td>
                                    <td><strong> <?php echo  date("M jS Y, h:m a", strtotime($order->created_at)); ?></strong></td>
                                    <td>
									<?php if($payment_status=="Not Paid"){ ?>
								
									<?php }?>
									</tr>
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
                                  <td></td>
                                  <td></td>
                                  <td>Grand Total</td>
                                   <td><strong><i class="fa fa-inr"></i><?php echo $grand_total; ?></strong></td>
                                  
                                  
                                  <td></td>
                                 
                                  </tr>
								</tbody>


							

							</table>
									
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