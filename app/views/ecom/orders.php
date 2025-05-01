<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
$vendor = $data['vendor'];
?>
     <body class="fixed-bottom-bar">
      <div class="kods-restaurant">
         <div class="bg-primary p-3">
         <?php 
require APPROOT . "/views/inc_ecom/nav-header.php"; 
$orders= $data['orders'];
$order_found = 0;
?>
 
<style>

.stepwizard-step p {
    margin-top: 10px;    
}

.process-row {
    display: table-row;
}

.process {
    display: table;     
    width: 100%;
    position: relative;
}

.process-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.process-row:before {
    top: 40px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background: #eee;
    z-order: 0;
    
}

.process-step {    
    display: table-cell;
    text-align: center;
    position: relative;
}

.process-step p {
    margin-top:10px;
    
}

.btn-circle {
  width: 50px;
  height: 50px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
  color:#fff !important;
}




.rating {
    display: flex;
    flex-direction: row-reverse;
  }
  
  .rating-0 {
    filter: grayscale(100%);
  }
  
  .rating > input {
    display: none;
  }
  
  .rating > label {
    cursor: pointer;
    width: 40px;
    height: 40px;
    margin-top: auto;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 76%;
    transition: .3s;
  }
  
  .rating > input:checked ~ label,
  .rating > input:checked ~ label ~ label {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  }
  
  
  .rating > input:not(:checked) ~ label:hover,
  .rating > input:not(:checked) ~ label:hover ~ label {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  }
  
  
  #rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
  #rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
  #rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
  #rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
  #rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }
</style>




         <!-- checkout -->
         <div class="p-3 kods-cart-item px-3 pt-3 pb-5" style="margin-top:25px">
            <div class="kods-cart-item-profile bg-white rounded shadow p-3 mt-n5">
               <div class="d-flex flex-column">
                  <h6 class="mb-2 font-weight-bold">ORDERS</h6>

                  
         <div class="accordion px-3 pb-3 pt-3" id="accordionExample">
                  <?php 
                  $order_count =0;
                  foreach ($orders as $order) {
                  $order_found = 1;
                  $order_count++;
                  $items = json_decode($order->items); 
                  $curModel = New Page;
                  $vendor = $curModel->getVendorById($order->vendor_id);
                  $delivery = $curModel->get_delivery_order($order->id);
                  $status = str_replace('_', ' ', ucwords($delivery->status));
                  $total = 0;
                  ?>
             <div class="kods-card mt-3 bg-white overflow-hidden shadow rounded active">
                  <div class="kods-card-header" id="<?php echo $order->id; ?>">
                     <h2 class="mb-0">
                        <button class="accordionButton d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#a<?php echo $order->id; ?>" aria-expanded="true" aria-controls="collapseThree">
                        <span style='color:#666;margin-right:5px;'> #<?php echo $order->id; ?> | Order from </span> <?php echo $vendor->vendor_name."<pre> </pre>"; if($order->order_type == 2){echo " <span style='color:#333;font-size:10px;'> (Self Pickup) </span> ";}?> 
                     
                     <span class="ml-auto"><?php echo  date("j M Y, h:m a", strtotime($order->created_at)); ?></span>
                        </button>
                     </h2>
                  </div>
                  <div id="a<?php echo $order->id; ?>" class="collapse" aria-labelledby="<?php echo $order->id; ?>" data-parent="#accordionExample">
                     <div class="card-body border-top">
                        <h6 class="mb-3 mt-0 mb-3 font-weight-bold">Paid <span class="pull-right" style="font-size:12px;"><?php if($order->order_type == 0){ ?>
                           Delivery: <?php echo $status; ?>
                           <?php } else { ?>
                              <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $vendor->vendor_latlong; ?>" target="_BLANK"> Navigate to Restaurant </a>
                           <?php } ?>
                           </span></h6>
      
                           <div class="process">
                           <div class="process-row">
                              <div class="process-step">
                                    <img src="<?php echo URLROOT; ?>/assets_ecom/img/a1.jpg" width="70">
                                    <p>Order Placed</p>
                              </div>
                              <div class="process-step">
                              <img src="<?php echo URLROOT; ?>/assets_ecom/img/a2.jpg" width="70" <?php if($order->status<1){echo "style='filter: grayscale(100%)'";}?> >
                                    <p>Preparing</p>
                              </div>
                              <div class="process-step">
                              <img src="<?php echo URLROOT; ?>/assets_ecom/img/a3.jpg" width="70" <?php if($order->status<2){echo "style='filter: grayscale(100%)'";}?>>
                                    <p>Ready</p>
                              </div> 
                                 <div class="process-step">
                                 <img src="<?php echo URLROOT; ?>/assets_ecom/img/a4.jpg" width="70" <?php if($order->status<3){echo "style='filter: grayscale(100%)'";}?>>
                                    <p>Delivered</p>
                              </div> 
                           </div>
                        </div>
                        <div class="shadow bg-white rounded p-3 clearfix">
                     <?php 
                     $curModel = New Page; 
                     $items = json_decode($order->items, TRUE);
                     $total_price = 0;
                     foreach($items as $item_id => $item){ 
                     $curitem  = $curModel->getItemById($item_id);
                     $total_price = $total_price + $item['item_total_price'];
                  
                     ?>

                     <div class="gold-members d-flex align-items-center justify-content-between py-2  border-bottom">
                     <div class="media align-items-center">
                        <div class="mr-2 text-danger">&middot;</div>
                        <div class="media-body">
                           <p class="m-0"><?php echo $curitem->item_name; ?></p>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                     
                     <p class="text-gray mb-0 float-right ml-2 text-muted"><?php echo $item['item_qty']. " x ".$item['item_price']." = "; ?><i class='fa fa-inr'></i><?php echo $item['item_total_price']; ?></p>
                     </div>
                  </div><br>
                  <?php }?>
              
                  <p class="mb-1">Item Total <span class="float-right text-dark"><i class='fa fa-inr'></i><?php echo $total_price; ?></span></p>
                  <p class="mb-1">Packing & Convenience<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark"><i class='fa fa-inr'></i><?php  echo $order->delivery_cost; ?></span></p>
                  <p class="mb-1">Taxes<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark"><i class='fa fa-inr'></i><?php  echo $order->tax_value; ?></span></p>
                  <p class="mb-1 text-success">Sub Total<span class="float-right text-success"><i class='fa fa-inr'></i><?php  echo $order->sub_total; ?></span></p>
                  <p class="mb-1">Discount<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark" id='discount'><i class='fa fa-inr'></i><?php  echo $order->coupon_value; ?></span></p> 
              
                     <hr>
                     <h6 class="pb-5 font-weight-bold mb-0">Paid  <span class="float-right" id='net_total'><i class='fa fa-inr'></i><?php echo $order->net_total; ?></span></h6>
             </div>
               <br>

                  
           

               
               <?php
                  $rating = $curModel->getrating_order($order->id);
                  if($rating):
                  ?>
               
               <div class="row">
                  <div class="col-md-3">
                    <div class="feedback">
                     <div class="rating">
                        <input type="radio" name="rating5" id="rating-5" <?php if($rating->rating==5){echo "checked";}?>>
                        <label for="rating-5"></label>
                        <input type="radio" name="rating4" id="rating-4" <?php if($rating->rating==4){echo "checked";}?>>
                        <label for="rating-4"></label>
                        <input type="radio" name="rating3" id="rating-3" <?php if($rating->rating==3){echo "checked";}?>>
                        <label for="rating-3"></label>
                        <input type="radio" name="rating2" id="rating-2" <?php if($rating->rating==2){echo "checked";}?>>
                        <label for="rating-2"></label>
                        <input type="radio" name="rating1" id="rating-1" <?php if($rating->rating==1){echo "checked";}?>>
                        <label for="rating-1"></label>
                     
                     </div>
                  </div>
                 
                  </div>
                  <div class="col-md-9"><input type="text" class="form-control" name="review" value="<?php echo $rating->review; ?>" readonly></div>
                  
               </div>
               <?php endif; if(!$rating && $order_count==1):?>
                  <form action="<?php echo URLROOT; ?>/ecom/rating/<?php echo $order->id; ?>/<?php echo $order->vendor_id; ?>" method="POST" id="rate<?php echo $order->id;?>" name="rate<?php echo $order->id;?>">
                      <div class="row">
                     <div class="col-md-3">
                     <div class="feedback">
                        <div class="rating">
                           <input type="radio" name="rating5" id="rating-5">
                           <label for="rating-5"></label>
                           <input type="radio" name="rating4" id="rating-4">
                           <label for="rating-4"></label>
                           <input type="radio" name="rating3" id="rating-3">
                           <label for="rating-3"></label>
                           <input type="radio" name="rating2" id="rating-2">
                           <label for="rating-2"></label>
                           <input type="radio" name="rating1" id="rating-1">
                           <label for="rating-1"></label>
                        
                        </div>
                     </div>
                  
                              </div>
                              <div class="col-md-7"><input type="text" class="form-control" name="review" placeholder="Write a review!"></div>
                              <div class="col-md-2"><button type="submit" class="btn btn-primary">Submit</button></div>
                           </div>
                           </form>
                        <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     

         
              
                      <?php } ?> 

            </div>
            <?php if(!$order_found){
               echo "<h6>No Orders</h6>";
            }?>
               </div>
            </div>
         </div>

  
       
        
         <!-- Modal -->
        
      </div>
    
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
$(document).ready(function() {
 $(".accordionButton:first").trigger("click");
});
</script>