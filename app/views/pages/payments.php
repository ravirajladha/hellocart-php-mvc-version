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
					<h2 class="dashboard-title mr-auto">Payments</h2>
				
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="example5" class="display mb-4 defaul\tTable  dataTablesCard" style="min-width: 845px;">
								<thead>
									<tr>
										
										<th>Order Type</th>
										<th>Customer Name</th>
										<th>Customer Phone</th> 
										<th>Total</th>
                                        <th>Status</th>
										<th>Mode</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
									foreach($data['tables'] as $table):
                                    $orders = $curModel->get_dine_orders_pay($table->table_id);
                                    $total = 0;
									$payment_mode = "";
                                    foreach($orders as $order){
										if(!$order->payment_status){

										$customer_name = $order->name;
										$customer_phone = $order->phone;
                                        $total = $total + $order->total;
										
										if($order->pay_cash == 1 || $payment_mode = "Cash"){
											$payment_mode = "Cash";
										}
										
										if($order->order_type == 0){
											$type = "Online";
										} else if($order->order_type == 1){
													$type = "Dine In";
										} else if($order->order_type == 2){
											$type = "Self Pickup";
								        }
									}
									}
									


											
									
									?>
									<tr>
                                  
                                    <td><strong><?php echo $type; ?></strong></td>
                                   
                                    <td><strong></i><?php echo $customer_name; ?></strong></td> <td><strong><?php echo $customer_phone; ?></strong></td>
									 <td><strong>
										 <?php if($total>0){echo "<i class='fa fa-inr'></i>". $total;} ?></strong></td>
									
									<td><strong><?php echo $payment_status; ?></strong></td>
									<td><strong><?php echo $payment_mode; ?></strong></td>
									<?php if($payment_status=="Not Paid"){ ?>
									<td><strong></i><a href="<?php echo URLROOT; ?>/pages/order_paid/<?php echo $table->table_id; ?>"> <button class='btn btn-primary btn-sm'>Mark Paid</button></a></strong></td>
									<?php }?>
									</tr>
                                    <?php }}endforeach; ?>

								</tbody>


							

							</table>
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