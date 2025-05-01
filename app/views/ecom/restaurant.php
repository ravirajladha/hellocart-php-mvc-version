<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
$vendor = $data['vendor'];
?>
     <body class="fixed-bottom-bar">
      <div class="kods-restaurant">
            <div class="bg-primary p-3">
           
            



<style>.navbar-dark .navbar-nav .nav-link {
    color: #ffffff;
}</style>
<div class="row">
               <div class="col-md-3">
                  <div class="text-white">
                   <div class="title d-fex align-items-center">
                  <a href="<?php echo URLROOT;?>/ecom/index">
                  <img src="<?php echo URLROOT; ?>/assets/images/logo.gif" alt="" width="50" style="position:absolute">
                  <img style="margin-left:60px" src="<?php echo URLROOT; ?>/assets/images/logo_text.png" alt="" width='150'></a><br>
                  <h6 style="font-size:12px;padding:10px;margin-left:60px !important;" class="m-0 border-dashed-bottom"><i class='fa fa-map-marker'></i> <?php echo $_SESSION['user_city']?>
                 </div>
                  </div>
               </div>
               <div class="col-md-6 mt-4">

               </div>
               <div class="col-md-3 mt-3">
               <nav class="navbar navbar-expand-sm navbar-dark pull-right">
                     <!-- Brand/logo -->
                

                     <?php if(isset($_SESSION['rexkod_user_id'])){ ?>
                     <!-- Links -->
                     <ul class="navbar-nav">
                    
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/profile">Hi <?php echo $_SESSION['rexkod_user_name']; ?>!</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/checkout">Cart</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/orders">Orders</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/logout">Logout</a>
                        </li>
                     </ul>
                     <?php } else { ?>
                     <!-- Links -->
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/index">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/login/0">Sign In</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/register/0">Sign Up</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://blog.hellowcart.in" target="_BLANK">Blog</a>
                        </li>
                     </ul>
                     <?php } ?>



                     </nav>

                    
               </div>
            
            </div>
                       
           
         </div></div>






            </div>

          <div class="kods-restaurant-detail" style="background:#fff;padding: 0px">
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
                     <p class="font-weight-bold col-md-9" style="font-size:25px;font-weight:bolder;">Menu
                        <br>
                        <?php if($data['search']){ ?>
                        <span style="font-size:15px;">Showing Results for "<?php echo $data['search'];?>" <a href="<?php echo URLROOT; ?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>"> X </a></span>
                        <?php } ?>
                     </p>


                     <form class='col-md-3' action="<?php echo URLROOT; ?>/ecom/restaurant/<?php echo $vendor->vendor_id?>" method="POST" >
                        <div class="input-group rounded shadow-sm overflow-hidden" style="border:#777 !important;">
                           <div class="input-group-prepend">
                              <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                           </div>
                           <input type="text" class="shadow-none border-0 form-control" placeholder="Search Menu" aria-label="" aria-describedby="basic-addon1" name="search_menu">
                        </div>
                     </form>
                     
               </div>
               
            </div>
            
             
            <form action="<?php echo URLROOT; ?>/ecom/add_to_cart/<?php echo $vendor->vendor_id?>" method="post" style="padding:0 20px;">
               <div class="row">
                  <div class="col-md-12 px-0 bode">

                        <?php 
                        $sale_count = 0;
                        foreach($data['cat'] as $cat): 
                        $sale_count++; 
                        ?>
                        
                        <?php if($sale_count == 1){echo "<h5 class='col-md-12'>ON SALE</h5>";}?>
                  
                        <div class="bg-white mb-4">
                              <?php 
                              $curModel = New Page; 
                              $cat_items  = $curModel->getItemByCat_sale($cat->category_id); 
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
                                             }
                                          ?>

                                          <br><span><?php echo $cat_item->item_desc; ?></span>
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
                                       } 
                                    ?>
                                    <br><span><?php echo $cat_item->item_desc; ?></span>
                                    </p>
                                 </div>
                           </div>
                        </div>

                        <?php } endforeach; ?>

                     </div>
                  </div>
               </div>

               
               <?php endforeach; ?>



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
                              <br><span><?php echo $cat_item->item_desc; ?></span>
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
                              <br><span><?php echo $cat_item->item_desc; ?></span>
                              </p>
                              </div>
                           </div>
                        </div>

                     <?php } endforeach; ?>
                     </div>
                  </div>
               </div>

               
               <?php endforeach; ?>
            


                  <br><br>
                  <?php if($_SESSION['rexkod_user_id']){ ?>
                     <button id="btncart" type="submit" style="background:#444; display:none;" class="btn btn-success btn-block btn-lg fixed-bottom">Add to Cart<i class="icofont-long-arrow-right"></i></button>
                  <?php }else{ ?>
                     <a href="<?php echo URLROOT; ?>/ecom/login/<?php echo $vendor->vendor_id; ?>" style="background:#444" class="btn btn-success btn-block btn-lg fixed-bottom">Login to Create Order<i class="icofont-long-arrow-right"></i></a>
                  <?php } ?>
               </form>
              
            </div>


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
if(document.getElementById('quantity_'+itemid).value >0){
document.getElementById('quantity_'+itemid).value--;
}
}
 

</script>

