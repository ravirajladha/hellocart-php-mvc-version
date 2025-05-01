<?php require APPROOT . '/views/inc/header.php'; 
$staff= $data['staff'];;
?> 
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div id="user-activity" class="crd">
							<div class="card-eader border-0 pb-0 -sm-flex d-block">
								<div>
									<h2 class="main-title mb-1">Edit Staff</h2><hr><br>

                                    <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/pages/update_staff/<?php echo $staff->id; ?>" method="POST" autocomplete="OFF">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card h-auto">
									<div class="card-header">
										<h4 class="card-title">Staff Details</h4>
									</div>
									<div class="card-body">
									
									<div class="loadmore-content" id="uploadItemContent">
											
										
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Name</label>
												<input type="text" class="form-control solid"   name="name" placeholder="Enter Name" value="<?php echo $staff->name; ?>">
											</div>
</div></div>
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Email</label>
												<input type="email" class="form-control solid" name="email" placeholder="Enter Email" value="<?php echo $staff->email; ?>">
											     </div>
													</div>
													<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Phone</label>
												<input type="number" class="form-control solid"   name="phone" placeholder="Enter Phone" value="<?php echo $staff->phone; ?>">
											</div>
													</div>



												</div>
											</div>
                                            <div class='row'
                                           ><div class='col-md-10'> 
</div>
<div class='col-md-2'><button type="submit" class="btn btn-primary btn-block rounded">Update Staff</button></div>								
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
        <!--**********************************
            Content body end
        ***********************************-->

		<?php require APPROOT . '/views/inc/footer.php'; ?>


