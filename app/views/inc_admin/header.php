<!DOCTYPE php>
<php lang="en">
<?php if(!isset($_SESSION['rexkod_admin_id'])){
    header('Location: pages/login');
} ?>
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

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
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

                        <ul class="navbar-nav header-right">
						
						
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>Hello, <strong>Admin</strong></span>
									</div>
                                    <img src="<?php echo URLROOT; ?>/assets/images/logo.png" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                               
                                    <a href="<?php echo URLROOT; ?>/admin/logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="kodsnav">
            <div class="kodsnav-scroll">
            <ul class="metismenu" id="menu">
                    
                    <li><a href="<?php echo URLROOT; ?>/admin/index" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-home"></i>
                     <span class="nav-text">Dashboard</span>
                    </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/reports" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-file"></i>
                     <span class="nav-text">Reports</span>
                     </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/orders" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-shopping-cart"></i>
                     <span class="nav-text">Orders</span>
                     </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/transactions" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-inr"></i>
                     <span class="nav-text">Transactions</span>
                     </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/users" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-users"></i>
                     <span class="nav-text">Customers</span>
                     </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/vendors" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-handshake-o"></i>
                     <span class="nav-text">Restaurant</span>
                     </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/coupons" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-gift"></i>
                     <span class="nav-text">Coupons</span>
                     </a></li>

                     <li><a href="<?php echo URLROOT; ?>/admin/banners" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-file"></i>
                     <span class="nav-text">Banners</span>
                     </a></li>
                     <li><a href="<?php echo URLROOT; ?>/admin/settlements" class="ai-icon" aria-expanded="false">
                     <i class="fa fa-inr"></i>
                     <span class="nav-text">Settlements</span>
                     </a></li>


         </ul>
            
				<div class="copyright">
					<p><strong>Hellow Cart</strong> © 2022 All Rights Reserved</p>
					<p>Powered by Kods</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->