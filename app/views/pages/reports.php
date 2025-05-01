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
					<h2 class="dashboard-title mr-auto">Reports</h2>
				
				</div>
				
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            <th scope="col">Report</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Order Type</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
										<form action="<?php echo URLROOT; ?>/pages/report_sales" method="POST">
                                         <td class="digits"><strong>Sales Report</strong></td>
										 <td class="digits"><input type="date" required class="form-control" name="start_date"></td>
										 <td class="digits"><input type="date" required class="form-control" name="end_date"></td>
										 <td class="digits">
											 <select name="order_type" id="" class="form-control">
											 <option value="all">All</option>
											 	<option value="online">Online</option>
												<option value="dine">Dine In</option>
												<option value="self">Self Pickup</option>
											 </select>
										 </td>
										 <td class="digits"><button type="submit" class="btn btn-sm btn-primary">Generate</button></td>
										 </form>
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