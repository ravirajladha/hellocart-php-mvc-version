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
					<h2 class="dashboard-title mr-auto">Coupons</h2>
				
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="example5" class="display mb-4 defaul\tTable  dataTablesCard" style="min-width: 845px;">
								<thead>
									<tr>
										<th>Coupon</th>
										<th>Title</th>
										<th>Type</th>
										<th>Value</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach($data['all_coupons'] as $coupon): ?>
									<tr>
                                  
                                    <td><strong><?php echo $coupon->coupon_code; ?></strong></td>
                                    <td><strong><?php echo $coupon->coupon_title; ?></strong></td>
                                    <td><strong><?php if($coupon->coupon_type=="1"){echo "Percentage";}else{echo "Fixed";}?></strong></td>
                                    <td><strong><?php echo $coupon->coupon_value; ?></strong></td>
                                    <td><strong><?php if($coupon->coupon_status=="1"){echo "Active";}else{echo "Inactive";}?></strong></td>
                                 									
									</tr>
                                    <?php endforeach; ?>

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