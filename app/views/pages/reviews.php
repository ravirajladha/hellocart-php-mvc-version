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
					<h2 class="dashboard-title mr-auto">Reviews</h2>
				
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table .table-striped" style="min-width: 845px;">
								<thead>
									<tr>
										<th>Rating</th>
										<th>Review</th>
										<th>Order</th>
										<th style="width:200px">Date</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach($data['ratings'] as $rating): ?>
									<tr>
                                  
                                    <td><strong><?php echo $rating->rating; ?><i class="fa fa-star" style="color:orange"></i></strong></td>
                                    <td><strong><?php echo $rating->review; ?></strong></td>
                                   
                                    <td><strong>#<?php echo $rating->order_id; ?></strong></td>
                                    <td><strong><?php echo  date("d/m/y, h:m a", strtotime($rating->datetime)); ?></strong></td>
                                 									
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
			paging: false,
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