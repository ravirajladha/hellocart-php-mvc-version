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
					<h2 class="dashboard-title mr-auto">Categories<a  href="<?php echo URLROOT; ?>/pages/add_category" class="btn btn-success btn-rounded ml-4  d-inline-block">Add New</a></h2>
					<div class="input-group search-area">
						<input type="text" class="form-control" placeholder="Search here...">
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
										<th>Category</th>
										<th>Name</th>
										<th>Opening Time</th>
										<th>Closing Time</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach($data['all_category'] as $category): ?>
									<tr>
                                    <td><img src="<?php echo URLROOT; ?>/uploads/<?php echo $category->category_img; ?>" width="100" ></td>
                                    <td><strong><?php echo $category->category_name; ?></strong></td>
                                    <td><?php echo date('h:i a', strtotime($category->category_start_time));?></td>
                                    <td><?php echo date('h:i a', strtotime($category->category_end_time));?></td>
									<td>
										<?php 
										if($category->category_status){
											echo "<a href='".URLROOT."/pages/update_category_status/".$category->category_id."/0'><button class='btn btn-primary btn-xs'>Active</button></a>";
										}else{
											echo "<a href='".URLROOT."/pages/update_category_status/".$category->category_id."/1'><button class='btn btn-warning btn-xs'>Inactive</button></a>";
										}
										
										?></td>		
										<td>
										<a href="<?php echo URLROOT; ?>/pages/edit_category/<?php echo $category->category_id; ?>"><button class='btn btn-primary btn-xs'>Edit</button></a>
									    </td>											
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