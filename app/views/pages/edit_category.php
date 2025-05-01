<?php require APPROOT . '/views/inc/header.php'; 
$category = $data['category']; ?> 
		
	
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">

        
					<div class="col-xl-12 col-md-12">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
                            <form action="<?php echo URLROOT; ?>/pages/update_category/<?php echo $category->category_id; ?>" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Category</h4>
									</div>
									<div class="card-body">
										
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Name</label>
												<input type="text" class="form-control solid" name="category_name" value="<?php echo $category->category_name; ?>" required>
											</div>
                                            <div class="row">
                                                <div class="col-md-9"> 
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Category New Image</label>
												<input type="file" class="form-control solid" name="category_image">
											</div></div>
                                                <div class="col-md-3">
                                                    <img width="100" src="<?php echo URLROOT; ?>/uploads/<?php echo $category->category_img; ?>" alt="">
                                                </div>
                                            </div>
                                           
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Opening</label>
												<input type="time" class="form-control solid" name="category_start_time" required value="<?php echo $category->category_start_time; ?>">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Category Closing</label>
												<input type="time" class="form-control solid" name="category_end_time" required value="<?php echo $category->category_end_time; ?>">
											</div>
											
                                            <div class="card-footer">
										<button type="submit" class="btn btn-primary btn-block rounded">Update Category</button>
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