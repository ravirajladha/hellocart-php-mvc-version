<?php require APPROOT . '/views/inc/header.php'; ?> 
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
					<h2 class="dashboard-title mr-auto">Completed Orders</h2>
					
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="example5" class="display mb-4 defaul\tTable  dataTablesCard" style="min-width: 845px;">
								<thead>
									<tr>
										
										<th>Type</th>
										<th>Customer Name</th>
										<th>Customer Phone</th> 
										<th>Total</th>
                                        <th>Status</th>
										<th style="max-width:70px">Action</th>

									</tr>
								</thead>
								<tbody>
                                <?php 

$curModel = New Page; 
foreach($data['orders'] as $order):
	if($order->status ==2){
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
									<td>
									<?php if(($order->order_type=="0" || $order->order_type=="2") && !$order->picked){ ?>
									<strong></i><a href="<?php echo URLROOT; ?>/pages/order_picked/<?php echo $order->id; ?>"> <button class='btn btn-primary btn-sm'>Picked</button></a></strong>
									<?php }?>
									</td>
									</tr>
                                    <?php } endforeach; ?>

								</tbody>


								<tbody>
                                <?php 

$curModel = New Page; 
foreach($data['dine_orders'] as $dine_order):
	if($dine_order->order_status == 2){
	$dine_order_items = explode(',', $dine_order->order_items);
	$curtable  = $curModel->get_table_detail($dine_order->table_id);
	if($dine_order->payment_mode == 1){
$payment_mode = "Online";
	} else {
$payment_mode = "Cash";
	}	
	
	if($dine_order->status == 2){
		$payment_status = "Paid";
			} else {
		$payment_status = "Not Paid";
			}	
											?>
									<tr>
                                   
                                    <td><strong>Dine In</strong></td>
                                   
                                    <td><strong></i><?php echo $dine_order->order_name; ?></strong></td> <td><strong><?php echo $dine_order->order_phone; ?></strong></td>
									 <td><strong><i class="fa fa-inr"></i><?php echo $dine_order->order_total; ?></strong></td>
									<td><strong></i><?php echo $payment_mode; ?></strong></td>
									<td><strong><?php echo $payment_status; ?></strong></td>
									
									</tr>
                                    <?php } endforeach; ?>

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