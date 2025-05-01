<?php require APPROOT . "/views/inc_ecomapp/header.php"; ?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
            <div class="text-white">
               <div class="title d-flex align-items-center">
                  <img src="<?php echo URLROOT; ?>/assets_ecom/img/logo.png" alt="" width='30' style="margin-right:10px;">
                  <h6 class="m-0 border-dashed-bottom">Kengeri, Bengaluru 560060
                  <a class="toggle togglew toggle-2" href="#"><span></span></a>
                  
               </div>
            </div>
            <div class="input-group mt-3 rounded shadow-sm overflow-hidden">
               <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
               </div>
               <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes" aria-label="" aria-describedby="basic-addon1">
            </div>
         </div>
         <!-- Filters -->
         <div class="bg-light">
          
            <!-- Trending this week -->
            <div class="px-3 pt-3 title d-flex align-items-center">
            <h5 class="m-0">New Restaurants</h5>
               <a class="font-weight-bold ml-auto" href="#">View all <i class="feather-chevrons-right"></i></a>
            </div>
            <!-- slider --> 
            <div class="trending-slider">
            <?php foreach($data['all_vendors'] as $vendor): ?>
               <div class="kods-slider-item py-3 px-1">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image">
                                           
                        <a href="<?php echo URLROOT;?>/ecomapp/restaurant/<?php echo $vendor->vendor_id; ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50," class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative">
                        <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecomapp/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                              </a>
                           </h6>
                           <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                           <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–30 min</span> <span class="float-right text-black-50"> 350 FOR TWO</span></p>
                        </div>
                        <div class="list-card-badge">
                           
                        </div>
                     </div>
                  </div>
               </div>

               <?php endforeach;?>

            </div>

            <div class="offer-slider bg-white border-top border-bottom">
               <div class="cat-item px-1 py-3">
                  <a class="bg-white d-block text-center shadow" href="#">
                  <img src="<?php echo URLROOT; ?>/assets_ecom/img/a.jpeg" class="img-fluid rounded">
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="bg-white d-block text-center shadow" href="#">
                  <img src="<?php echo URLROOT; ?>/assets_ecom/img/b.png" class="img-fluid rounded">
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="bg-white d-block text-center shadow" href="#">
                  <img src="<?php echo URLROOT; ?>/assets_ecom/img/c.jpg" class="img-fluid rounded">
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="bg-white d-block text-center shadow" href="#">
                  <img src="<?php echo URLROOT; ?>/assets_ecom/img/d.jpg" class="img-fluid rounded">
                  </a>
               </div>
            </div>
           
            <!-- Most sales -->
            <div class="p-3 title d-flex align-items-center">
               <h5 class="m-0 pt-3">Restaurants Near You</h5>
              
            </div>
            <!-- Most sales -->
            <div class="most_sale px-3 pb-3">
               <div class="row">
               <?php foreach($data['all_vendors'] as $vendor): ?>
                  <div class="col-12 pt-2">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           
                          
                           <a href="#">
                           <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecomapp/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                              </h6>
                              <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                              <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> 300 FOR TWO</span></p>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <?php endforeach; ?>

               </div>
            </div>
         </div>
        <style>
           #homehome{
              margin-top:-25px;
           }
        </style>
         <!-- Footer -->
         <?php require APPROOT . "/views/inc_ecomapp/nav.php";  ?>
      
      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo URLROOT; ?>/assets_ecom/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo URLROOT; ?>/assets_ecom/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo URLROOT; ?>/assets_ecom/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo URLROOT; ?>/assets_ecom/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo URLROOT; ?>/assets_ecom/js/kods.js"></script>
   </body>
</html>