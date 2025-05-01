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
					<h2 class="dashboard-title mr-auto">Food Items
						<a  href="<?php echo URLROOT; ?>/pages/add_food" class="btn btn-success btn-rounded ml-4  d-inline-block">Add New</a>
						<a  href="<?php echo URLROOT; ?>/pages/stock_refresh" class="btn btn-warning btn-rounded ml-4  d-inline-block">Stock Refresh</a>
					</h2>
					<div class="input-group search-area">
						<form action="<?php echo URLROOT; ?>/pages/menu" method="POST">
						<input type="text" class="form-control" placeholder="Search here..." name="food_name">
						</form>
						<div class="input-group-append">
							<button class="input-group-text"><i class="flaticon-381-search-2"></i></button>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="menu" class="display mb-4 defaul\tTable  dataTablesCard" style="min-width: 845px;">
								<thead>
									<tr>
										<th>Item</th>
										<th>Name</th>
										<th>Category</th>
										<th>Price</th>
										<th>Dine In Price</th>
										<th style="min-width:150px">Online Discount</th>
										<th style="min-width:150px">Dine Discount</th>
										<th style="min-width:150px">Stock</th>
										<th>Status</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
                                <?php 
                                   $curModel = New Admins; 
                                    foreach($data['all_items'] as $item){
                                    $curcat  = $curModel->getCategoryById($item->item_cat_id);
									$cursubcat  = $curModel->getSubcategoryById($item->item_subcat_id); ?>
									<tr>
                                    <td><img src="<?php echo URLROOT; ?>/uploads/<?php echo $item->item_img; ?>" width="100" ></td>
                                    <td><strong><?php echo $item->item_name; ?></strong></td>
                                    <td><strong><?php echo $curcat->category_name; ?></strong></td>
                                    <td><strong><i class="fa fa-inr"></i><?php echo $item->item_price; ?></strong></td>
									<td><strong><i class="fa fa-inr"></i><?php echo $item->item_price_dine; ?></strong></td>
									<td>
									<form method="POST" id="f<?php echo $item->item_id?>" action="<?php echo URLROOT; ?>/pages/update_item_discount/<?php echo $item->item_id?>" name="f<?php echo $item->item_id?>">
									<strong><i class="fa fa-inr"></i><input name="discount_cost" style="width:75px" type="number" value="<?php echo $item->item_discount_price; ?>"></strong> 
									<button class='btn btn-primary btn-xs'><i class="fa fa-check"></i></button>
									</form>
									</td>
									<td>
									<form method="POST" id="f<?php echo $item->item_id?>" action="<?php echo URLROOT; ?>/pages/update_item_discount_dine/<?php echo $item->item_id?>" name="f<?php echo $item->item_id?>">
									<strong><i class="fa fa-inr"></i><input name="discount_cost" style="width:75px" type="number" value="<?php echo $item->item_discount_price_dine; ?>"></strong> 
									<button class='btn btn-primary btn-xs'><i class="fa fa-check"></i></button>
									</form>
									</td>
									<td>
									<form method="POST" id="f<?php echo $item->item_id?>" action="<?php echo URLROOT; ?>/pages/update_item_stock/<?php echo $item->item_id?>" name="f<?php echo $item->item_id?>">
									<strong><i class="fa fa-inr"></i><input name="stock" style="width:75px" type="number" value="" placeholder="<?php echo $item->stock; ?>"></strong> 
									<button class='btn btn-primary btn-xs'><i class="fa fa-check"></i></button>
									</form>
									</td>
									<td>
										<?php 
										if($item->item_status){
											echo "<a href='".URLROOT."/pages/update_item_status/".$item->item_id."/0'><button class='btn btn-primary btn-xs'>Active</button></a>";
										}else{
											echo "<a href='".URLROOT."/pages/update_item_status/".$item->item_id."/1'><button class='btn btn-warning btn-xs'>Inactive</button></a>";
										}
										
										?></td>
										<td>
										<a href="<?php echo URLROOT; ?>/pages/edit_food/<?php echo $item->item_id; ?>"><button class='btn btn-primary btn-xs'>Edit</button></a>
									    </td>
									
									</tr>
                                    <?php }?>

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
	 
		var table = $('#menu').DataTable({
			searching: false,
			paging: false,
			select: false,
			//info: false,         
			lengthChange:true 
			
		});
		$('#example tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
			
		});
	   
	})(jQuery);
	</script>
	
</body>
</html>