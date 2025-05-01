

<?php require APPROOT . '/views/inc/header.php'; ?> 


		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper"> 
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-xl-6">
						<div class="row">
							<div class="col-sm-6">
								<div class="widget-card-1 card">
									<a href="<?php echo URLROOT; ?>/pages/menu"><div class="card-body">
										<div class="media">
											<img src="<?php echo URLROOT; ?>/assets2/images/food-icon/1.png" alt="" class="mr-4" width="80">
											<div class="media-body">
												<h3 class="mb-sm-3 mb-2 text-black"><span class="counter ml-0"><?php echo $data['items']; ?></span></h3>
												<p class="mb-0">Total Menus</p>
											</div>
										</div>
									</div></a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="widget-card-1 card">
									<div class="card-body">
										<div class="media">
											<img src="<?php echo URLROOT; ?>/assets2/images/food-icon/2.png" alt="" class="mr-4" width="80">
											<div class="media-body">
												<h3 class="mb-sm-3 mb-2 text-black"><span class="counter ml-0"><?php echo $data['revenue']; ?></span></h3>
												<p class="mb-0">Revenue (<i class='fa fa-inr'></i>)</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="widget-card-1 card">
								<a href="<?php echo URLROOT; ?>/pages/tables"><div class="card-body">
										<div class="media">
											<img src="<?php echo URLROOT; ?>/assets2/images/table2.png" alt="" class="mr-4" width="80">
											<div class="media-body">
												<h3 class="mb-sm-3 mb-2 text-black"><span class="counter ml-0"><?php echo $data['tables']; ?></span></h3>
												<p class="mb-0">Total Tables</p>
											</div>
										</div>
									</div></a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="widget-card-1 card">
								<a href="<?php echo URLROOT; ?>/pages/payments"><div class="card-body">
										<div class="media">
											<img src="<?php echo URLROOT; ?>/assets2/images/food-icon/4.png" alt="" class="mr-4" width="80">
											<div class="media-body">
												<h3 class="mb-sm-3 mb-2 text-black"><span class="counter ml-0"><?php echo $data['orders']; ?></span></h3>
												<p class="mb-0">Total Orders</p>
											</div>
										</div>
									</div></a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="widget-card-1 card">
									<div class="card-body">
										<div class="media">
											
											<div class="media-body">
												<p class="mb-0">Total Staff: <span class="counter ml-0"><?php echo $data['staffs'];?></span></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="widget-card-1 card">
									<div class="card-body">
										<div class="media">
											
										<div class="media-body">
												<p class="mb-0">Total Customers: <span class="counter ml-0"><?php echo $data['customers'];?></span></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-6">
						<div class="row">
					
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 d-sm-flex d-block">
										<div>
											<h2 class="main-itle text-black mb-3">Orders from</h2>
										</div>
									</div>
									<div class="card-body">
										<div class="progress-bar-box">
											<div class="img-bx mr-3">
												<img src="<?php echo URLROOT; ?>/assets2/images/food-icon/8.png" alt="" class="img-fluid">
											</div>
											<div class="bar-box d-flex w-100 align-items-center">
												<h3 class="text-nowrap name mb-0">Dine-in</h3>
												<div class="progress" style="height: 20px;width: 100%">
													<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $data['count_dine']; ?>%;"></div>
												</div>
												<span class="text-right percentage"><?php echo $data['count_dine']; ?> </span>
											</div>
										</div>
										<div class="progress-bar-box">
											<div class="img-bx mr-3">
												<img src="<?php echo URLROOT; ?>/assets2/images/food-icon/10.png" alt="" class="img-fluid">
											</div>
											<div class="bar-box d-flex w-100 align-items-center">
												<h3 class="text-nowrap name mb-0">Delivery</h3>
												<div class="progress" style="height: 20px;width: 100%">
													<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $data['count_delivery']; ?>%;"></div>
												</div>
												<span class="text-right percentage"><?php echo $data['count_delivery']; ?> </span></span>
											</div>
										</div>
										<div class="progress-bar-box">
											<div class="img-bx mr-3">
												<img src="<?php echo URLROOT; ?>/assets2/images/food-icon/9.png" alt="" class="img-fluid">
											</div>
											<div class="bar-box d-flex w-100 align-items-center">
												<h3 class="text-nowrap name mb-0">Pickups</h3>
												<div class="progress" style="height: 20px;width: 100%">
													<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $data['count_pickup']; ?>%;"></div>
												</div>
												<span class="text-right percentage"><?php echo $data['count_pickup']; ?> </span>
											</div>
										</div>
										
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



		