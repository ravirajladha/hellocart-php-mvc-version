<?php 
require APPROOT . "/views/inc_ecomapp/header.php"; 
$vendor = $data['vendor'];
$cart= $data['cart'];
$vendor= $data['vendor'];
$addresses= $data['address'];
$_SESSION['order_type']=$data['type'];
?> 
   <body class="bg-light fixed-bottom-bar">
      <div class="kods-payment">
         <div class="bg-primary border-bottom px-3 pt-3 pb-5">
           
            <a class="text-white font-weight-bold" href="<?php echo URLROOT; ?>/ecomapp/checkout"><i class="feather-chevron-left"></i> Back</a>
            <h2 class="font-weight-bold m-0 text-white pt-3">Checkout</h2>
         </div>
         <!-- checkout -->
         <form action="<?php echo URLROOT; ?>/ecomapp/pay" method="post" autocomplete="off">
       
         <div class="p-3 kods-cart-item">
            <div class="kods-cart-item-profile bg-white rounded shadow p-3 mt-n5">
               <div class="d-flex flex-column">
                  

                  <?php if($data['type']==0){
                        echo "<h6 class='mb-2 font-weight-bold'>DELIVERY ADDRESS</h6>";
                        foreach($addresses as $address ){ ?>
                  <div class="custom-control custom-radio mb-2 px-0">
                     <input type="radio" id="<?php echo $address->address_id ?>" value="<?php echo $address->address_id ?>" name="address" class="custom-control-input" checked="">
                     <label class="custom-control-label border kods-check p-3 w-100 rounded border-primary" for="<?php echo $address->address_id ?>">
                        <b><i class="feather-home mr-2"></i> <?php echo $address->name; ?></b> <br>
                        <p class="small mb-0 pl-4"><?php echo $address->address; ?></p>
                     </label>
                  </div>
                  <?php }?>
            
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal"> ADD NEW ADDRESS </a>
                  <?php } else {?>
                   <h6 class='mb-2 font-weight-bold'>RESTAURANT ADDRESS <span style="font-size:12px;">(Self Pickup Order)</span></h6>
                  <div class="custom-control custom-radio mb-2 px-0">
                     
                     <label class="custom-control-abel border oshan-check p-3 w-100 rounded border-primary" for="<?php echo $address->address_id ?>">
                     <?php echo $data['vendor']->vendor_address; ?>
                     </label>
                  </div>
                  <?php }?>
                  
               </div>
            </div>
         </div>
    
         <div class="fixed-bottom"><button style="background-color:#444 !important" class="btn btn-success btn-lg btn-block" type="submit">MAKE PAYMENT <i class='fa fa-inr'></i> <?php echo $_SESSION['net_total']?> <i class="feather-arrow-right"></i></button></div>
         </form>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Delivery Address</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <form action="<?php echo URLROOT; ?>/ecomapp/add_address/<?php echo $data['type']; ?>" method="post" autocomplete="off">
                  <div class="modal-body">
                  
                        <div class="form-row">
                           <div class="col-md-12 form-group">
                              <label class="form-label">Delivery Area</label>
                              <div class="input-group">
                                 <input placeholder="Delivery Area" type="text" class="form-control" name="area">
                               
                              </div>
                           </div>
                           <div class="col-md-12 form-group"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control" name="address"></div>
                           
                           <div class="col-md-12 form-group">
                              <label class="form-label">Address Name</label>
                              <div class="input-group">
                                 <input placeholder="Address Name" type="text" class="form-control" name="name">
                                
                              </div>
                           </div>
                        </div>
                   
                  </div>
                  <div class="modal-footer p-0 border-0">
                     <div class="col-6 m-0 p-0">                 
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                     </div>
                     <div class="col-6 m-0 p-0">     
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Save changes</button>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php require_once 'nav.php' ?>
      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo URLROOT;  ?>/assets_ecom/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo URLROOT;  ?>/assets_ecom/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo URLROOT;  ?>/assets_ecom/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo URLROOT;  ?>/assets_ecom/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo URLROOT;  ?>/assets_ecom/js/kods.js"></script>
   </body>
</html>