<?php require APPROOT . '/views/inc/header.php'; ?> 
		
	
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">

        
					<div class="col-xl-12 col-md-12">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
                            <form action="<?php echo URLROOT; ?>/pages/create_category" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Category</h4>
									</div>
									<div class="card-body">
										
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Name</label>
												<input type="text" class="form-control solid" name="category_name" required>
											</div>
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Image</label>
												<input type="file" class="form-control solid" name="category_image" required>
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Opening</label>
												<input type="time" class="form-control solid" name="category_start_time" required>
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Closing</label>
												<input type="time" class="form-control solid" name="category_end_time" required>
											</div>
											
                                            <div class="card-footer">
										<button type="submit" class="btn btn-primary btn-block rounded">Add Category</button>
									</div>
										
									</div>
								</div>
							</div>

                    </form>
						
						</div>
					</div>
				</div>
            </div>
        </div>
       
    </div>
   

    <?php require APPROOT . '/views/inc/footer.php'; ?> 
	
</body>
</html>