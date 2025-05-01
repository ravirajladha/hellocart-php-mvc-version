<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
$vendor = $data['vendor'];
$cart = $data['cart'];
?>
     <body class="fixed-bottom-bar">
      <div class="kods-restaurant">
         <div class="bg-primary p-3">
         <?php 
require APPROOT . "/views/inc_ecom/nav-header.php"; ?>
           
           
         </div>
         <div class="kods-restaurant-detail" style="background:#fff;">
            <div class="p-3">
               
               
               
               <div class="pt-2">
                  <div class="row">

                  <div class="col-1">
                  <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="200" class="img-fluid item-img w-100">
                   </div>

                   <div class="col-4" style="text-align:left;">
                     <h2 class="font-weight-bold"><?php echo $vendor->vendor_name; ?></h2>
                     <p class="font-weight-light text-dark m-0"><?php echo $vendor->vendor_address; ?></p>
                   </div>

                  <div class="col-2">
                        <p class="font-weight-bold m-0">Delivery</p>
                        <p class="text-muted m-0">Charges Apply</p>
                     </div>
                     <div class="col-2">
                        <p class="font-weight-bold m-0">Timing</p>
                        <p class="text-muted m-0"><?php echo date('h:i A', strtotime($vendor->vendor_start_time));?> to <?php echo date('h:i A', strtotime($vendor->vendor_end_time));?></p>
                     </div>
                     <div class="col-3">
                        <p class="font-weight-bold m-0"><img src="<?php echo URLROOT; ?>/assets3/images/fssai.png" alt="" width="40"> <?php echo $vendor->vendor_fssai; ?></p>
                        <p class="text-muted m-0"> GST: <?php echo $vendor->vendor_gst; ?></p>
                     </div>
                  </div>
               </div>
            </div>
          <hr>
         </div>


         

         <div class="px-3 pt-3 pb-5">
            
            <div class="d-flex item-aligns-center row">
               <p class="font-weight-bold col-md-9" style="font-size:20px">Confirm Cart
               
               <?php
               if($_SESSION['less_stock']){
                  echo " <span style='color:red;font-size:12px'> ( ".$_SESSION['less_stock']." )</span>";
                  unset($_SESSION['less_stock']);
               }
               ?>
                
               </p>
           
                   
            </div>
           
            <form action="<?php echo URLROOT; ?>/ecom/update_cart/<?php echo $vendor->vendor_id?>" method="post">
            
            
            <div class="row">
             
               <div class="col-md-12 px-0 border-top">
                  <div class="bg-white mb-4">

                        <?php 
                        $curModel = New Page; 
                        $items = json_decode($cart->items, TRUE);
                        foreach($items as $item_id => $item):
                        $curitem  = $curModel->getItemById($item_id);
                        ?>

                        <div class="p-3 border-bottom menu-list" id="prod_<?php echo $curitem->item_id;?>">
                         <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary quantity-left-minus" onclick="qtydown(<?php echo $curitem->item_id; ?>)"> <i class="feather-minus"></i> </button>
                        
                        <input type="text" id="quantity_<?php echo $curitem->item_id;?>" name="quantity_<?php echo $curitem->item_id;?>" class="count-number-input" value="<?php echo $item['item_qty']; ?>" min="1" max="100">
                        
                        <button type="button" class="btn-sm right inc btn btn-outline-secondary quantity-right-plus" onclick="qtyup(<?php echo $curitem->item_id; ?>)"> <i class="feather-plus"></i> </button></span>
                        <div class="media">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $curitem->item_img; ?>" width="10" class="img-fluid item-img w-3" style='margin-right:10px;'>
                           <div class="media-body">
                              <h6 class="mb-1"> <?php echo $curitem->item_name; ?></h6>
                              <p class="text-muted mb-0"> 
                             
                              <?php if($curitem->item_type ==1){ ?>
											<img src="<?php echo URLROOT; ?>/assets3/images/veg.png" style="width:10px;height:10px;">
											<?php } else {?>
											<img src="<?php echo URLROOT; ?>/assets3/images/nonveg.png" style="width:10px;height:10px;">
											<?php }?>

                              <?php 
											if($curitem->item_discount_price !=0) {
												echo "<span style='text-decoration: line-through;font-size:12px;'><i class='fa fa-inr'> </i>
												".$curitem->item_price."</span> <i class='fa fa-inr'> </i>".$curitem->item_discount_price;	
											}else {
												echo "<i class='fa fa-inr'> </i>".$curitem->item_price;	
											} ?>
                            <br><span><?php echo $curitem->item_desc; ?></span>
                           </p>
                           </div>
                        </div>
                     </div>

                  <?php endforeach; ?>
                  </div>
               </div>
            </div>

            
     



          <?php if($_SESSION['rexkod_user_id']){ ?>
            <button id="btncart" type="submit" style="background:#444; displa:none;" class="btn btn-success btn-block btn-lg fixed-bottom">Confirm<i class="icofont-long-arrow-right"></i></button>
          <?php } else{ ?>
            <a href="<?php echo URLROOT; ?>/ecom/login/<?php echo $vendor->vendor_id; ?>" style="background:#444" class="btn btn-success btn-block btn-lg fixed-bottom">Login to Create Order<i class="icofont-long-arrow-right"></i></a>
         <?php } ?>
           </form>
         </div>


         
         
         <!-- Footer -->
       
      </div>
     
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

<script>
var btnshow =0;
function qtyup(itemid){
var user_val = <?php if($_SESSION['rexkod_user_id']){echo $_SESSION['rexkod_user_id'];} else {echo "0";}?>;
if(user_val == 0){
   window.location.href = "<?php echo URLROOT;?>/ecom/login/<?php echo $vendor->vendor_id; ?>";
}
document.getElementById('quantity_'+itemid).value++;
}
function qtydown(itemid){
var cur_qty = document.getElementById('quantity_'+itemid).value;
if(document.getElementById('quantity_'+itemid).value >0){
document.getElementById('quantity_'+itemid).value--;
if(document.getElementById('quantity_'+itemid).value == 0){
   document.getElementById('prod_'+itemid).style.display = "none";
}
}
}
 

</script>

