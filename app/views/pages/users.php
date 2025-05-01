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
					<h2 class="dashboard-title mr-auto">Users</h2>
					<div class="input-group search-area">
                    <form action="<?php echo URLROOT; ?>/pages/users" method="POST">
						<input type="text" class="form-control" placeholder="Search here..." name="user_name">
						</form>
						<div class="input-group-append">
							<button class="input-group-text"><i class="flaticon-381-search-2"></i></button>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="example5" class="display mb-4 defaul\tTable  dataTablesCard" style="min-width: 845px;">
							<thead>
                                            <tr>
                                               
                                                <th style="width:300px;"><strong>Name</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Phone</strong></th>
                                               
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $curModel = New Page; 
                                            foreach($data['customers'] as $customer):
                                            $cust  = $curModel->get_userinfo($customer->user_id);
                                            ?>
                                            <tr>
                                              
                                                <td><?php echo $cust->name; ?></td>
                                                <td><?php echo $cust->email; ?></td>
                                                <td><?php echo $cust->phone; ?></td>
                                               
                                                
                                              
                                            </tr>
											<?php endforeach;?>
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