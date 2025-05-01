<?php require APPROOT . '/views/inc/header.php'; ?> 
		
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
									<h2 class="main-title mb-1">Add Staff</h2><hr><br>

                                    <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/pages/add_staff" method="POST" autocomplete="OFF">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card h-auto">
									<div class="card-header">
										<h4 class="card-title">Staff Details</h4>
									</div>
									<div class="card-body">
									
									<div class="loadmore-content" id="uploadItemContent">
											
										
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Select Staff Type</label>
												<select name="type" id="" class='form-control'>
                                                    <option value="cashier">Cashier</option>
													<option value="supervisor">Supervisor</option>
													<option value="manager">Manager</option>
													
                                                </select>
											     </div>
													</div>
													<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Name</label>
												<input type="text" class="form-control solid"   name="name" placeholder="Enter Name">
											</div>
</div></div>
											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Email</label>
												<input type="email" class="form-control solid" name="email" placeholder="Enter Email">
											     </div>
													</div>
													<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Phone</label>
												<input type="number" class="form-control solid"   name="phone" placeholder="Enter Phone">
											</div>
													</div>



												</div>
											</div>
                                            <div class='row'
                                           ><div class='col-md-10'> 
</div>
<div class='col-md-2'><button type="submit" class="btn btn-primary btn-block rounded">Add Staff</button></div>								
									</div>

                                   
										
							

									</form>
								</div>
                                            

								</div>
								
							</div>
							
						</div>
					</div>
					<div class="col-xl-12">
						<div class="row">

                        <?php foreach($data['all_staff'] as $staff){ ?>
							<div class="col-sm-4">
								<div class="widget-card-1 card">
									<div class="card-body">
										<div class="media">
											<img src="<?php echo URLROOT; ?>/assets/images/<?php echo $staff->sub_type; ?>.png" alt="" class="mr-4" width="100">
										
											<div class="media-body">
												<h4 class="text-black"><?php echo $staff->name; ?></h4>
												<p class="mb-0"><?php echo $staff->sub_type; ?></p>
												<p class="mb-0"><?php echo $staff->email; ?></p>
												<p class="mb-0"><?php echo $staff->phone; ?></p>
												
											</div>
											<a href="<?php echo URLROOT; ?>/pages/edit_staff/<?php echo $staff->id;?>"><button class="btn btn-primary btn-xs" style="padding: 1px 3px !important;">Edit</button></a>   
										</div>
									</div>
								</div>
							</div>
                            <?php }; ?>





							
						</div>
					</div>
					
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

		<?php require APPROOT . '/views/inc/footer.php'; ?>


