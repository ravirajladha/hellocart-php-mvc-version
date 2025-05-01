<?php require APPROOT . '/views/inc/header.php'; 
$item = $data['item'];?> 


        <div class="content-wrapper container">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-xl-12 col-md-12">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Food</h4>
									</div>
									<div class="card-body">
                                    <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/pages/update_food/<?php echo $item->item_id; ?>" method="POST" enctype="multipart/form-data" autocomplete="OFF">
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Food Name</label>
												<input type="text" class="form-control solid" name="item_name" required value="<?php echo $item->item_name; ?>">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Food Type</label>
												<select  class="form-control"  id="select_change" required="" name="item_type" required>
                                                <option <?php if($item->item_type == 1){ echo "selected"; } ?> value="1">Veg</option>
												<option <?php if($item->item_type == 2){ echo "selected"; } ?> value="2">Non Veg</option>
                                             </select>
											</div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                <div class="form-group mb-3 pb-3">
												<label class="font-w600">Food New Image</label>
												<input type="file" class="form-control solid" name="item_image">
											</div>
                                                </div>
                                                <div class="col-md-3">
                                                <img width="100" src="<?php echo URLROOT; ?>/uploads/<?php echo $item->item_img; ?>" alt="">
                                                </div>
                                            </div>
                                            
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Food Category</label>
												<select  class="form-control"  id="select_change" required="" name="item_cat" required>
                            <option disabled="" selected="" value="">-SELECT-</option>
                            <?php foreach($data['all_category'] as $cat) {  ?>
                            <option <?php if($item->item_cat_id == $cat->category_id){ echo "selected";}?> value="<?php echo $cat->category_id; ?>"><?php echo ucwords($cat->category_name); ?></option>
                            <?php } ?>
                        </select>
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Food Description</label>
												<input type="text" class="form-control solid" name="item_description" required value="<?php echo $item->item_desc; ?>">
											</div>
                                          
									
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card h-auto">
									<div class="card-header">
										<h4 class="card-title">Price Details</h4>
									</div>
									<div class="card-body">
									
									<div class="loadmore-content" id="uploadItemContent">
											
										
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Cost (Dine In)</label>
												<input type="number" class="form-control solid"   name="item_price_dine" placeholder="0" required value="<?php echo $item->item_price; ?>">
											     </div>
													</div>
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Cost (Delivery)</label>
												<input type="number" class="form-control solid" name="item_price" placeholder="0" required value="<?php echo $item->item_price_dine; ?>">
											     </div>
													</div>
												
												</div>
											</div>
									
										
										
									</div>

                                   
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-block rounded">Add Food</button>
									</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
       

    </div>
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>



	   
    <?php require APPROOT . '/views/inc/footer.php'; ?> 

	
</body>
</html>