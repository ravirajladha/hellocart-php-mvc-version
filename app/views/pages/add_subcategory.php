<?php require APPROOT . '/views/inc/header.php'; ?> 
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">

        
					<div class="col-xl-12 col-md-12">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
                            <form action="<?php echo URLROOT; ?>/pages/create_subcategory" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Subcategory</h4>
									</div>
									<div class="card-body">
										
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Subcategory Name</label>
												<input type="text" class="form-control solid" name="subcategory_name">
											</div>
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Subcategory Image</label>
												<input type="file" class="form-control solid" name="subcategory_image" >
											</div>
											
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Subcategory Tax</label>
												<input type="number" class="form-control solid" name="subcategory_tax">
											</div>
											
                                            <div class="card-footer">
										<button type="submit" class="btn btn-primary btn-block rounded">Add subcategory</button>
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
        <!--**********************************
            Content body end
        ***********************************-->

       


    </div>
    
    <?php require APPROOT . '/views/inc/footer.php'; ?> 
	
</body>
</html>