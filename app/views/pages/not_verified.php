<!DOCTYPE php>
<php lang="en">

<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
    <title>Hellow Cart</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT; ?>/assets2/images/favicon.png">
    
	<link href="<?php echo URLROOT; ?>/assets2/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets2/css/style.css" rel="stylesheet">
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
   
			<div class="container-fluid">
				
				
				
				
				<div class="row align-items-center">
					<div class="col-lg-3">
						<img src="<?php echo URLROOT; ?>/assets/images/not_verified.png" alt="" class="img-fluid" width="300">
					</div>
					<div class="col-lg-9">
						<div class="card">
							<div class="card-body">
							<h3 class="dashboard-title">Account not verified.</h3>
								<p>Contact us to know more.</p>
								<a href="mailto:care@hellowcart.com." class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="fa fa-envelope bg-danger text-white p-2 rounded-circle mr-2"></i> Mail Us</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               
               <a href="tel:+919886002046" data-rel="external"class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="fa fa-phone bg-primary text-white p-2 rounded-circle mr-2"></i> Call Us</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
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