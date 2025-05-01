<?php 
require APPROOT . "/views/inc_ecomapp/header.php"; 
?>
   <body class="fixed-bottom-bar bg-light">
      <div class="kods-profile">
         <div class="bg-primary border-bottom px-3 pt-3 pb-5 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Profile</h4>
         </div>
         <!-- profile -->
         <div class="p-3 kods-profile">
            <div class="bg-white rounded shadow mt-n5">
               <div class="d-flex align-items-center border-bottom p-3">
                 
                  <div class="right">
                     <h6 class="mb-1 font-weight-bold"><?php echo $_SESSION['rexkod_user_name']; ?><i class="feather-check-circle text-success"></i></h6>
                     <p class="text-muted m-0 small"><?php echo $_SESSION['rexkod_user_phone']; ?></p>
                  </div>
               </div>
               <div class="kods-credits d-flex align-items-center p-3">
                  <p class="m-0">Total Orders</p>
                  <h5 class="m-0 ml-auto text-primary"><?php echo $data['order_count'];?></h5>
               </div>
            </div>
            <!-- profile-details -->
            <div class="bg-white rounded shadow mt-3 profile-details">
               
               <a href="<?php echo URLROOT; ?>/ecomapp/orders" class="d-flex w-100 align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold mb-1 text-dark">Orders</h6>
                     <p class="small text-muted m-0">View recent orders</p>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               <a href="<?php echo URLROOT; ?>/ecomapp/all_orders" class="d-flex w-100 align-items-center border-bottom p-3">
               <div class="d-flex align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold mb-1">All Orders</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </div>
            </a>

               <a href="mailto:care@hellowcart.com." class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-truck bg-danger text-white p-2 rounded-circle mr-2"></i> Delivery Support</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               
               <a href="tel:+919886002046" data-rel="external"class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-phone bg-primary text-white p-2 rounded-circle mr-2"></i> Contact</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               <a href="<?php echo URLROOT; ?>/home/tnc" target="_BLANK" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-info bg-success text-white p-2 rounded-circle mr-2"></i> Term of use</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               <a href="<?php echo URLROOT; ?>/home/privacy_policy" target="_BLANK" class="d-flex w-100 align-items-center px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-lock bg-warning text-white p-2 rounded-circle mr-2"></i> Privacy policy</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
            </div>
         </div>
         <?php require APPROOT . "/views/inc_ecomapp/nav.php";  ?>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/kods.js"></script>
   </body>
</html>