<?php require_once "header.php" ?>
		
		
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-2 col-md-3">
						<a href="front-food-items.php" class="back-btn d-block mb-5"><i class="fa fa-arrow-left"></i>Back</a>
						<div class="row">
							<div class="col-md-12 col-6">
								<div class="upload-item-box">
									<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
									<label for="imageUpload">
										<div id="imagePreview"></div>
										<div class="content">
											<i class="fa fa-picture-o"></i>
											<span>Upload <br> items image</span>
										</div>
									</label>
								</div>
							</div>
							<div class="col-md-12 col-6">
								<div class="upload-video-box">
									<input type='file' id="videoUpload" accept=".png, .jpg, .jpeg" />
									<label for="vidoUpload">
										<div class="content">
											<i class="fa fa-list"></i>
											<span>Upload <br> Documenta</span>
										</div>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-10 col-md-9">
						<div class="row">
							<div class="col-xl-7 col-lg-7 col-md-6">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Create Restraunt</h4>
									</div>
									<div class="card-body">
										<form>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restraunt Name</label>
												<input type="text" class="form-control solid" value="Cheese burger">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restraunt Location</label>
												<input type="text" class="form-control solid" value="Cheese burger">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restraunt Registration ID</label>
												<input type="text" class="form-control solid" value="9896">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restraunt Category</label>
												<select class="form-control default-select solid">
													<option>Fast Foot</option>
													<option>Dinner Foot</option>
												</select>
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restraunt Information</label>
												<textarea rows="5" class="form-control solid"></textarea>
											</div>
											<div class="form-group">
												<label class="font-w600">Restraunt Select</label>
												<select multiple class="form-control default-select solid" id="sel2">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
												</select>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-5 col-lg-5 col-md-6">
								<div class="card h-auto">
									<div class="card-header">
										<h4 class="card-title">Restraunt Banks Details</h4>
									</div>
									<div class="card-body">
										<form>
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-7">
														<div class="form-group mb-3 pb-3">
															<label class="font-w600">2345678990786</label>
															<input type="text" class="form-control solid" value="Extra masala">
														</div>
													</div>
													<div class="col-xl-5">
														<div class="form-group mb-3 pb-3">
															<label class="font-w600">Banks</label>
															<input type="text" class="form-control solid" value="22">
														</div>
													</div>
												</div>
											</div>
											
										</form>
										<hr>
										<div class="d-flex align-items-center">
											<h4 class="mr-auto">Active</h4>
											<div class="custom-control custom-switch toggle-switch text-right mr-3 mb-2">
												<input type="checkbox" class="custom-control-input" id="customSwitch2">
												<label class="custom-control-label" for="customSwitch2">Yes</label>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<a href="javascript:void(0);" class="btn btn-primary btn-block rounded">Create Restraunt</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
        

    </div>
    
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/kodsnav-init.js"></script>
	
	<!-- Counter Up -->
    <script src="./vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
	
	
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