<?php require APPROOT . "/views/inc_ecomapp/header.php"; ?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
            <div class="text-white">
               <div class="title d-flex align-items-center">
                  <img src="<?php echo URLROOT; ?>/assets_ecomapp/img/logo.png" alt="" width='30' style="margin-right:10px;">
                  <h6 class="m-0 border-dashed-bottom">Kengeri, Bengaluru 560060
                  <a class="toggle togglew toggle-2" href="#"><span></span></a>
                  
               </div>
            </div><br>
            <form action="<?php echo URLROOT; ?>/ecomapp/search" method="POST" >
             <div class="input-group rounded shadow-sm overflow-hidden">
              <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
              </div>
                  <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes" aria-label="" aria-describedby="basic-addon1" name="search_input">
               </div>
            </form>
         </div>
         <!-- Filters -->
         <div class="most_sale px-3 pb-3">
               <div class="row">

               <?php 
               $total = 0;
               foreach($data['results'] as $result): 
               $curModel = New Page;
               $vendor = $curModel->getVendorById($result->vendor_id);
               $total++;
               ?>
               

                  <div class="col-md-12 pt-2">
                  <a href="<?php echo URLROOT;?>/ecomapp/restaurant/<?php echo $vendor->vendor_id; ?>">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           
                          
                           
                          <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecomapp/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                                 </a>
                              </h6>
                              <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                              <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> 300 FOR TWO</span></p>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <?php endforeach; ?>


               </div>
               <?php if($total==0){echo "<br><h5>No Results</h5>";}else if($total==1){echo "<br><h6>Found ".$total."  Restaurant</h6>";}else {echo "<br><h6>Found ".$total."  Restaurants</h6>";}?>
            </div>

         <!-- Footer -->
         <div class="kods-menu-fotter fixed-bottom bg-white px-3 py-2 text-center" style="background-color:#666">

         </div>

      </div>
          <br><br><br><br><br><br>
         <!-- Footer -->
         <?php require APPROOT . "/views/inc_ecomapp/nav.php";  ?>
      
      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo URLROOT; ?>/assets_ecomapp/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo URLROOT; ?>/assets_ecomapp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo URLROOT; ?>/assets_ecomapp/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo URLROOT; ?>/assets_ecomapp/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo URLROOT; ?>/assets_ecomapp/js/kods.js"></script>
   </body>
</html>