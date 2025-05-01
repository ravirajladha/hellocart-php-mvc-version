<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
         <?php 
         require APPROOT . "/views/inc_ecom/nav-header.php"; 
         ?>
         <div class="bg-light border-bottom p-3">
            <a class="toggle toggle-2" href="#"><span></span></a>
            <h6 class="font-weight-bold m-0" style="color:#444;">Searched for "<?php echo $data['search_input'];?>"</h6>
         </div>
         
         <div class="most_sale px-3 pb-3">
               <div class="row">

               <?php 
               $total = 0;
               foreach($data['results'] as $result): 
               $curModel = New Page;
               $vendor = $curModel->getVendorById($result->vendor_id);
               $total++;
               ?>
               

                  <div class="col-4 pt-2">
                  <a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           
                          
                           
                          <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
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
      <?php 
require APPROOT . "/views/inc_ecom/footer.php"; 
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>