<?php require APPROOT . '/views/inc_admin/header.php'; 
$vendor = $data['vendor'];
$user = $data['user'];
?> 

<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-xl-12 col-md-12">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Restaurant Details</h4>
									</div>
									<div class="card-body">
                                    <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/admin/update_vendor/<?php echo $vendor->vendor_id; ?>" method="POST" enctype="multipart/form-data" autocomplete="OFF">
									        <div class="form-group mb-3 pb-3">
												<label class="font-w600">Admin Name</label>
												<input type="text" class="form-control solid" name="admin_name" value="<?php echo $user->name; ?>">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Name</label>
												<input type="text" class="form-control solid" name="vendor_name" value="<?php echo $vendor->vendor_name; ?>">
											</div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Image</label>
												<input type="file" class="form-control solid" name="vendor_image" >
											</div>
                                                </div>
                                                <div class="col-md-3">
                                                <img width="100" src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" alt="">
                                                </div>
                                            </div>
                                            
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Address</label>
												<input type="text" class="form-control solid" name="vendor_address" value="<?php echo $vendor->vendor_address; ?>">
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Google LatLong</label>
												<input type="text" class="form-control solid" name="vendor_latlong" value="<?php echo $vendor->vendor_latlong; ?>">
											</div>
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant GST</label>
												<input type="text" class="form-control solid" name="vendor_gst" value="<?php echo $vendor->vendor_gst; ?>">
											</div>


                                            <div class="row">
                                                <div class="col-md-9">
                                                <div class="form-group mb-3 pb-3">
												<label class="font-w600">Upload GST Certificate</label>
												<input type="file" class="form-control solid" name="vendor_gst_file" >
											</div>
                                                </div>
                                                <div class="col-md-3">
                                                <a href="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->gst_file; ?>" target="_BLANK"><span class="btn btn-primary" style="padding:5px;font-size:12px">View File</span> </a>
                                                </div>
                                            </div>

                                            
											
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant FSSAI No.</label>
												<input type="text" class="form-control solid" name="vendor_fssai" value="<?php echo $vendor->vendor_fssai; ?>">
											</div>


                                            <div class="row">
                                                <div class="col-md-9">
                                                <div class="form-group mb-3 pb-3">
												<label class="font-w600">Upload FSSAI Certificate</label>
												<input type="file" class="form-control solid" name="vendor_fssai_file" >
											</div>
                                                </div>
                                                <div class="col-md-3">
                                                <a href="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->fssai_file; ?>" target="_BLANK"><span class="btn btn-primary" style="padding:5px;font-size:12px">View File</span> </a>
                                                </div>
                                            </div>

                                          
											
                                          
									
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card h-auto">
									<div class="card-header">
										<h4 class="card-title">Restaurant More Details</h4>
									</div>
									<div class="card-body">
									
									<div class="loadmore-content" id="uploadItemContent">
										<div class="row">
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Opening Time</label>
												<input type="time" class="form-control solid"   name="vendor_start_time" value="<?php echo $vendor->vendor_start_time; ?>">
											     </div>
											</div>
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Clossing Time</label>
												<input type="time" class="form-control solid"   name="vendor_end_time" value="<?php echo $vendor->vendor_end_time; ?>">
											</div>
                                          </div>
									    </div>
									
										<div class="row">
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Opening Time</label>
												<input type="time" class="form-control solid"   name="vendor_start_time2" value="<?php echo $vendor->vendor_start_time2; ?>">
											     </div>
											</div>
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Clossing Time</label>
												<input type="time" class="form-control solid"   name="vendor_end_time2" value="<?php echo $vendor->vendor_end_time2; ?>">
											</div>
                                          </div>
									    </div>


											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Email</label>
												<input type="text" class="form-control solid"   name="vendor_email" value="<?php echo $user->email; ?>">
											     </div>
													</div>
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Phone</label>
												<input type="text" class="form-control solid"   name="vendor_phone" value="<?php echo $user->phone; ?>">
										    	</div>
													</div>
												</div>
											</div>
											
										
										
									</div>
<hr> 
                                    <div class="card-body">
									
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Bank Account No.</label>
												<input type="text" class="form-control solid"   name="vendor_bank_number" value="<?php echo $vendor->vendor_bank_account; ?>">
											     </div>
													</div>
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Bank IFCS No.</label>
												<input type="text" class="form-control solid"   name="vendor_bank_ifsc" value="<?php echo $vendor->vendor_bank_ifsc; ?>">
											</div>
													</div>
												</div>
											</div>
											
										
										
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-block rounded">Update Restaurant</button>
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
        Main wrapper end
    ***********************************-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>



	   
    <?php require APPROOT . '/views/inc_admin/footer.php'; ?> 

	
</body>
</html>