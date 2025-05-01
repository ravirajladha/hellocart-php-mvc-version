<?php require APPROOT . '/views/inc/header.php'; 
$vendor = $data['vendor'];
$user = $data['user'];
?>
		
	
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6">
						<div class="card">
							<div class="card-body">
								<h2 class="text-black main-title mb-sm-4 mb-0 pb-2">Settings</h2>
							
									<div class="d-flex align-items-center">
										<div class="avatar-upload">
											
											<div class="avatar-preview">
											<img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="150" >
											</div>
										</div>
										<span class="fs-13 ml-sm-5 ml-3">
										<?php 
										if($vendor->vendor_status){
											echo "<a href='".URLROOT."/pages/update_vendor_status/".$vendor->vendor_id."/0'><button class='btn btn-primary btn-xs'>Active</button></a>";
										}else{
											echo "<a href='".URLROOT."/pages/update_vendor_status/".$vendor->vendor_id."/1'><button class='btn btn-warning btn-xs'>Inactive</button></a>";
										}
										
										?>
										</span>
									</div>
									
									<div class="form-group mb-3 pb-3">
										<label class="font-w600">Restaurant Name</label>
										<input readonly=""  type="text" class="form-control solid" value="<?php echo $vendor->vendor_name; ?>">
									</div>
									
									<div class="form-group mb-3 pb-3">
										<label class="font-w600">Restaurant Phone Number</label>
										<input readonly=""  type="text" class="form-control solid" value="<?php echo $user->phone ?>">
									</div>
									<div class="form-group">
										<label class="font-w600">Restaurant Email Address</label>
										<input readonly=""  type="text" class="form-control solid" value="<?php echo $user->email ?>">
									</div>
							
								<hr>
								
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<h2 class="text-black main-title mb-4 pb-2">Restaurant Timings</h2>
										<form>
											<div class="row">
												<div class="col-xl-6">
													<div class="form-group">
														<label class="font-w600">Opening Time</label>
														<input readonly=""  class="form-control solid" type="time" id="opening-time" value="<?php echo $vendor->vendor_start_time ?>">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="form-group">
														<label class="font-w600">Closing Time</label>
														<input readonly=""  class="form-control solid" type="time" id="closing-time" value="<?php echo $vendor->vendor_end_time ?>">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
									<h2 class="text-black main-title mb-4 pb-2 mt-4">Bank Details</h2>
								<form class="mb-5">
									<div class="form-group mb-3 pb-3">
										<label class="font-w600">Account Number</label>
										<input readonly=""  type="text" class="form-control solid" value="<?php echo $vendor->vendor_bank_account; ?>">
									</div>
									<div class="form-group">
										<label class="font-w600">Bank IFSC</label>
										<input readonly=""  type="text" class="form-control solid" value="<?php echo $vendor->vendor_bank_ifsc; ?>">
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
      


    </div>
    

	<?php require APPROOT . '/views/inc/footer.php'; ?>

</body>
</html>