<?php require APPROOT . "/views/inc_ecomapp/header.php"; 
$vendor = $data['vendor'];?>
   <body class="fixed-bottom-bar">
      <div class="kods-restaurant">
         <div class="kods-restaurant-detail">
            <div class="p-3">
               <div class="forgot-page">
                  <a class="toggle toggle-2" href="#"><span></span></a>
                  <a class="text-primary font-weight-bold" href="<?php echo URLROOT; ?>/ecomapp/home"><i class="feather-chevron-left"></i> Back</a>
               </div>
               <div class="pt-3">
               <h2 class="font-weight-bold"><?php echo $vendor->vendor_name; ?></h2>
                     <p class="font-weight-light text-dark m-0"><?php echo $vendor->vendor_address; ?></p>
                 
               </div>
               <div class="pt-2">
                  <div class="row">
                     <div class="col-6">
                     <p class="font-weight-bold m-0">Open time</p>
                        <p class="text-muted m-0"><?php echo date('h:i A', strtotime($vendor->vendor_start_time));?></p>
                     </div>
                     <div class="col-6">
                     <p class="font-weight-bold m-0">Close time</p>
                        <p class="text-muted m-0"><?php echo date('h:i A', strtotime($vendor->vendor_end_time));?></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-primary p-3">
               <div class="d-flex align-items-center">
                  <div class="feather_icon">
                     
                    <!-- <a href="#ratings-and-reviews" class="text-decoration-none text-dark mx-2"><i class="p-2 bg-light rounded-circle font-weight-bold  feather-star"></i></a>-->
                     <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i class="p-2 bg-light rounded-circle font-weight-bold feather-map-pin"></i></a>
                  </div>
                  <a href="contact-us.html" class="btn btn-sm btn-outline-light ml-auto">Navigate</a>
               </div>
            </div>
          
         </div>
         <!-- Menu -->
         <div class="px-3 pt-3 pb-5">
            
            <div class="d-flex item-aligns-center row">
               <p class="font-weight-bold col-md-9">Menu
                 <br>
               <?php if($data['search']){ ?>
                 <span>Showing Results for "<?php echo $data['search'];?>" <a href="<?php echo URLROOT; ?>/ecomapp/restaurant/<?php echo $vendor->vendor_id; ?>"> X </a></span>
                 <?php } ?>
               </p>
               <form class='col-md-3' action="<?php echo URLROOT; ?>/ecomapp/restaurant/<?php echo $vendor->vendor_id?>" method="POST" >
                 <div class="input-group rounded shadow-sm overflow-hidden" style="border:#777 !important;">
                  <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                 </div>
                    <input type="text" class="shadow-none border-0 form-control" placeholder="Search Menu" aria-label="" aria-describedby="basic-addon1" name="search_menu">
                     </div>
                    </form>
               
            </div>
       
            <form action="<?php echo URLROOT; ?>/ecomapp/add_to_cart/<?php echo $vendor->vendor_id?>" method="post">
            <?php foreach($data['cat'] as $cat): ?>
            
            
            <div class="row">
               <h6 class="mb-4 mt-3 col-md-12"><?php echo $cat->category_name; ?></h6>
               <div class="col-md-12 px-0 border-top">
                  <div class="bg-white mb-4">

                  <?php 
                  $curModel = New Page; 
						$cat_items  = $curModel->getItemByCat($cat->category_id); 
                  foreach($cat_items as $cat_item): 
                  if($data['search']){
                  if(strpos(strtolower($cat_item->item_name), $data['search']) !== false){
                  ?>

                     <div class="p-3 border-bottom menu-list">
                     <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary quantity-left-minus" onclick="qtydown(<?php echo $cat_item->item_id; ?>)"> <i class="feather-minus"></i> </button>
                        
                        <input type="text" id="quantity_<?php echo $cat_item->item_id;?>" name="quantity_<?php echo $cat_item->item_id;?>" class="count-number-input" value="0" min="1" max="100">
                        
                        <button type="button" class="btn-sm right inc btn btn-outline-secondary quantity-right-plus" onclick="qtyup(<?php echo $cat_item->item_id; ?>)"> <i class="feather-plus"></i> </button></span>
                        <div class="media">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $cat_item->item_img; ?>" width="10" class="img-fluid item-img w-3" style='margin-right:10px;'>
                           <div class="media-body">
                              <h6 class="mb-1"> <?php echo $cat_item->item_name; ?></h6>
                              <p class="text-muted mb-0"> 

                              <?php if($cat_item->item_type ==1){ ?>
											<img src="<?php echo URLROOT; ?>/assets3/images/veg.png" style="width:10px;height:10px;">
											<?php } else {?>
											<img src="<?php echo URLROOT; ?>/assets3/images/nonveg.png" style="width:10px;height:10px;">
											<?php }?>

                              <?php 
											if($cat_item->item_discount_price !=0) {
												echo "<span style='text-decoration: line-through;font-size:12px;'><i class='fa fa-inr'> </i>
												".$cat_item->item_price."</span> <i class='fa fa-inr'> </i>".$cat_item->item_discount_price;	
											}else {
												echo "<i class='fa fa-inr'> </i>".$cat_item->item_price;	
											} ?>
                           
                           </p>
                           </div>
                        </div>
                     </div>


                     <?php }} else {?>

                        <div class="p-3 border-bottom menu-list">
                     <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary quantity-left-minus" onclick="qtydown(<?php echo $cat_item->item_id; ?>)"> <i class="feather-minus"></i> </button>
                        
                        <input type="text" id="quantity_<?php echo $cat_item->item_id;?>" name="quantity_<?php echo $cat_item->item_id;?>" class="count-number-input" value="0" min="1" max="100">
                        
                        <button type="button" class="btn-sm right inc btn btn-outline-secondary quantity-right-plus" onclick="qtyup(<?php echo $cat_item->item_id; ?>)"> <i class="feather-plus"></i> </button></span>
                        <div class="media">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $cat_item->item_img; ?>" width="10" class="img-fluid item-img w-3" style='margin-right:10px;'>
                           <div class="media-body">
                              <h6 class="mb-1"> <?php echo $cat_item->item_name; ?></h6>
                              <p class="text-muted mb-0"> 

                              <?php if($cat_item->item_type ==1){ ?>
											<img src="<?php echo URLROOT; ?>/assets3/images/veg.png" style="width:10px;height:10px;">
											<?php } else {?>
											<img src="<?php echo URLROOT; ?>/assets3/images/nonveg.png" style="width:10px;height:10px;">
											<?php }?>

                              <?php 
											if($cat_item->item_discount_price !=0) {
												echo "<span style='text-decoration: line-through;font-size:12px;'><i class='fa fa-inr'> </i>
												".$cat_item->item_price."</span> <i class='fa fa-inr'> </i>".$cat_item->item_discount_price;	
											}else {
												echo "<i class='fa fa-inr'> </i>".$cat_item->item_price;	
											} ?>
                           
                           </p>
                           </div>
                        </div>
                     </div>

                  <?php } endforeach; ?>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         



          <?php if($_SESSION['rexkod_user_id']){ ?>
            <button id="btncart" type="submit" style="background:#444; displa:none;" class="btn btn-success btn-block btn-lg fixed-bottom">Add to Cart<i class="icofont-long-arrow-right"></i></button>
          <?php } else{ ?>
            <a href="<?php echo URLROOT; ?>/ecomapp/login/<?php echo $vendor->vendor_id; ?>" style="background:#444" class="btn btn-success btn-block btn-lg fixed-bottom">Login to Create Order<i class="icofont-long-arrow-right"></i></a>
         <?php } ?>
           </form>
         </div>
         <!-- Footer -->
   
      </div>
   
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

<script>
 
function qtyup(itemid){
document.getElementById('quantity_'+itemid).value++;
}
function qtydown(itemid){
if(document.getElementById('quantity_'+itemid).value >0){
document.getElementById('quantity_'+itemid).value--;
}
}
    

</script>