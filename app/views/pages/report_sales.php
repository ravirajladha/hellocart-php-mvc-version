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
					<h2 class="dashboard-title mr-auto">Sales Report</h2>
					
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
                                        
                                       
									</tr>
								</thead>
								<tbody>
                                <?php 

$curModel = New Page; 
$grand_total = 0;
foreach($data['orders'] as $order):
    $grand_total = $grand_total + $order->total;

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
								
								
									
									</tr>
                                    <?php endforeach; ?>

                                   

								</tbody>


                                <tr>
                                   
                                   <td></td>
                                   
                                  
                                   <td></td>
                                   
                               
                                    <td>Grand Total:</td>
                                    <td><strong><i class="fa fa-inr"></i><?php echo $grand_total; ?></strong></td>
                                   </tr>
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