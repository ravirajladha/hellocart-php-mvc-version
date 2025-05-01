<!DOCTYPE php>
<php lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <title>Hellow Cart</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT; ?>/assets/images/favicon.png">
    <link href="<?php echo URLROOT; ?>/assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/vendor/chartist/css/chartist.min.css">
    
	<link href="<?php echo URLROOT; ?>/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets/css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?php echo URLROOT; ?>/admin/index" class="brand-logo">
                <img class="logo-abbr" src="<?php echo URLROOT;  ?>/assets/images/logo.png" alt="">
                <img class="logo-compact" src="<?php echo URLROOT;  ?>/assets/images/logo_text.png" alt="" style="max-width:180px !important;margin-left:0px;">
                <img class="brand-title" src="<?php echo URLROOT;  ?>/assets/images/logo_text.png" alt="" style="max-width:180px !important;margin-left:0px;">
            </a>

           
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                          
                        </div>

                    </div>
                </nav>
            </div>
        </div>


<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body" style="margin-left:0px;">
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
                                    <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/home/add_vendor" method="POST" enctype="multipart/form-data" autocomplete="OFF">
									        <div class="form-group mb-3 pb-3">
												<label class="font-w600">Admin Name</label>
												<input type="text" class="form-control solid" name="admin_name" >
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Name</label>
												<input type="text" class="form-control solid" name="vendor_name" >
											</div>
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Image</label>
												<input type="file" class="form-control solid" name="vendor_image" >
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Address</label>
												<input type="text" class="form-control solid" name="vendor_address" >
											</div>
											
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant GST</label>
												<input type="text" class="form-control solid" name="vendor_gst" >
											</div>
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Upload GST Certificate</label>
												<input type="file" class="form-control solid" name="vendor_gst_file" >
											</div>
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant FSSAI No.</label>
												<input type="text" class="form-control solid" name="vendor_fssai" >
											</div>
                                          
											<div class="form-group mb-3 pb-3">
												<label class="font-w600">Upload FSSAI Certificate</label>
												<input type="file" class="form-control solid" name="vendor_fssai_file" >
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
												<input type="time" class="form-control solid"   name="vendor_start_time">
											     </div>
											</div>
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Clossing Time</label>
												<input type="time" class="form-control solid"   name="vendor_end_time">
											</div>
                                          </div>
									    </div>
									
										<div class="row">
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Opening Time</label>
												<input type="time" class="form-control solid"   name="vendor_start_time2">
											     </div>
											</div>
											<div class="col-xl-6">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Clossing Time</label>
												<input type="time" class="form-control solid"   name="vendor_end_time2">
											</div>
                                          </div>
									    </div>


											<div class="loadmore-content" id="uploadItemContent">
												<div class="row">
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Email</label>
												<input type="text" class="form-control solid"   name="vendor_email">
											     </div>
													</div>
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Phone</label>
												<input type="text" class="form-control solid"   name="vendor_phone">
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
												<input type="text" class="form-control solid"   name="vendor_bank_number">
											     </div>
													</div>
													<div class="col-xl-12">
                                                    <div class="form-group mb-3 pb-3">
												<label class="font-w600">Bank IFCS No.</label>
												<input type="text" class="form-control solid"   name="vendor_bank_ifsc">
											</div>
                                            <div class="form-group mb-3 pb-3">
												<label class="font-w600">Restaurant Google LatLong</label>
												<input type="text" class="form-control solid" name="vendor_latlong">
											</div>
													</div>
												</div>
											</div>
											
										
										
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-block rounded">Create Restaurant</button>
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
  
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Hellow Cart, 2022</p>
            </div>
        </div>



    </div>

    <!-- Required vendors -->
    <script src="<?php echo URLROOT ?>/assets/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/custom.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets/js/kodsnav-init.js"></script>
	<!-- Datatable -->
    <script src="<?php echo URLROOT ?>/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
	
	<!-- Counter Up -->
    <script src="<?php echo URLROOT ?>/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo URLROOT ?>/assets/vendor/jquery.counterup/jquery.counterup.min.js"></script>	
		
	<!-- Apex Chart -->
	<script src="<?php echo URLROOT ?>/assets/vendor/apexchart/apexchart.js"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="<?php echo URLROOT ?>/assets/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?php echo URLROOT ?>/assets/js/dashboard/dashboard-1.js"></script>

    
	
	
</body>
</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>
