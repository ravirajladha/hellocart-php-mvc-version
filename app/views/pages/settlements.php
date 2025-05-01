<?php require APPROOT . '/views/inc/header.php'; 
?> 
<style>
    .dataTables_info{
        display:none;
    }
    .dataTables_paginate{
        display:none;
    }
</style>
	
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
					<h2 class="dashboard-title mr-auto">Settlements</h2>
				
				</div>
				
				 <?php 
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
					endforeach;	
					?>

					<?php 
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
						endforeach;	
						?>
					<?php 
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
						endforeach;	
						?>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="table-reponsive">

                                <h4>Recevable Details</h4><br>
                                <div class="row">

                                    <div class="col-md-4">
                                        Delivery Total: <i class="fa fa-inr"></i><b><?php echo $delivery_total; ?></b><br>
                                        <?php
                                        $recevable_total = 0;
                                        $delivery_recevable = 0; 
                                        $pickup_recevable = 0; 
                                        $dine_recevable = 0;


                                        $delivery_commission = ($delivery_total * 10)/100;
                                        $delivery_recevable = $delivery_total - $delivery_commission;
                                        ?>
                                        Commission (10%): <i class="fa fa-inr"></i><b><?php echo $delivery_commission; ?></b><br>
                                        Recevable : <i class="fa fa-inr"></i><b><?php echo $delivery_recevable; ?></b>
                                    </div>
                                    <div class="col-md-4">
                                        Pickup Total: <i class="fa fa-inr"></i><b><?php echo $pickup_total; ?></b><br>
                                        <?php
                                        $pickup_commission = ($pickup_total * 10)/100;
                                        $pickup_recevable = $pickup_total - $pickup_commission;
                                        ?>
                                        Commission (10%): <i class="fa fa-inr"></i><b><?php echo $pickup_commission; ?></b><br>
                                        Recevable : <i class="fa fa-inr"></i><b><?php echo $pickup_recevable; ?></b>
                                    </div>
                                    <div class="col-md-4">
                                        Dine Total: <i class="fa fa-inr"></i><b><?php echo $dine_total; ?></b><br>
                                        <?php
                                        $dine_commission = ($dine_total * 2)/100;
                                        $dine_recevable = $dine_total - $dine_commission;
                                        ?>
                                        Commission (2%): <i class="fa fa-inr"></i><b><?php echo $dine_commission; ?></b><br>
                                        Recevable : <i class="fa fa-inr"></i><b><?php echo $dine_recevable; ?></b>
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
                                        $recevable_total = $delivery_recevable + $pickup_recevable + $dine_recevable;
                                        ?>
                                        <h5>Total Recevable: <i class="fa fa-inr"></i><b><?php echo $recevable_total; ?></b></h5>
                                    </div>
                                </div>
                           	
									
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
                                        <h3>All Settlements</h3>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>ID</th>
										<th>Amount</th>
                                        <th>Recieved</th>
										<th>Commission</th> 
										<th>Transaction Detail</th>
                                        <th>Reciept</th>
                                        <th>Date & Time</th>


									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $grand_total = 0;
									foreach($data['settlements'] as $settlement):
                                        $grand_total = $grand_total + $settlement->amount;
                                        $settlement_total = $settlement->amount + $settlement->commission;
										//$vendor = $curModel->getVendorById($settlement->vendor_id);	
									?>
									<tr>
                                   
                                    <td><strong><?php echo $settlement->id; ?></strong></td>
                                    <td><strong><?php echo $settlement_total; ?></strong></td>
                                    <td><strong><i class="fa fa-inr"></i><?php echo $settlement->amount; ?></strong></td>
                                    <td><strong><i class="fa fa-inr"></i><?php echo $settlement->commission; ?></strong></td>
                                    <td><strong><?php echo $settlement->transaction_id; ?></strong></td>
                                    <td><strong><a target="_BLANK" href="<?php echo URLROOT; ?>/uploads/<?php echo $settlement->reciept_file; ?>">View Reciept</a></strong></td>
                                    <td><strong> <?php echo  date("M jS Y, h:m a", strtotime($settlement->datetime)); ?></strong></td>
                                   
									</tr>
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
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
        

    </div>
    
    <!-- Required vendors -->
    <script src="<?php echo URLROOT ?>/assets2/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo URLROOT ?>/assets2/js/custom.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets2/js/kodsnav-init.js"></script>
	
	<!-- Counter Up -->
    <script src="<?php echo URLROOT ?>/assets2/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo URLROOT ?>/assets2/vendor/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Datatable -->
    <script src="<?php echo URLROOT ?>/assets2/vendor/datatables/js/jquery.dataTables.min.js"></script>
	
	
	<script>
	(function($) {
	 
		var table = $('#example5').DataTable({
			searching: false,
			paging:true,
			select: false,
			//info: false,         
			lengthChange:false 
			
		});
		$('#example tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
			
		});
	   
	})(jQuery);
	</script>
	
</body>
</html>