<?php 
require APPROOT . "/views/inc_ecomapp/header.php"; 
$cart= $data['cart'];
$vendor= $data['vendor'];
$type = $data['type'];
if(!$cart){
   header('Location: '.URLROOT.'/ecomapp/home');
}
?> 
<style>
   .hc-nav-trigger.toggle-2 span, .hc-nav-trigger.toggle-2 span::before, .hc-nav-trigger.toggle-2 span::after {
    background: #fff !important;
} 
</style>
<div class="bg-primary border-bottom px-3 pb-5 d-flex align-items-center">
     
     </div>
     <!-- checkout -->

 

     <div class="p-3 kods-cart-item">
        <div class="d-flex mb-3 kods-cart-item-profile bg-white shadow rounded p-3 mt-n5">
        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50" class="mr-3 rounded-circle img-fluid">
           <div class="d-flex flex-column">
              <h6 class="mb-1 font-weight-bold"><?php echo $vendor->vendor_name ?></h6>
              <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> <?php echo $vendor->vendor_address; ?></p>
           </div>
        </div>
        <div class="bg-white rounded shadow mb-3 py-2">

      <?php 
      $curModel = New Page; 
      $items = json_decode($cart->items, TRUE);
      $total_price = 0;
      foreach($items as $item_id => $item){ 
      $curitem  = $curModel->getItemById($item_id);
      $total_price = $total_price + $item['item_total_price'];
      ?>
           <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
              <div class="media align-items-center">
                 <div class="mr-2 text-danger">&middot;</div>
                 <div class="media-body">
                    <p class="m-0"><?php echo $curitem->item_name; ?></p>
                 </div>
              </div>
              <div class="d-flex align-items-center">
              
              <p class="text-gray mb-0 float-right ml-2 text-muted"><?php echo $item['item_qty']. " x ".$item['item_price']." = "; ?><i class='fa fa-inr'></i><?php echo $item['item_total_price']; ?></p>
              </div>
           </div>
        <?php } ?>   



        </div>
      
      <br><br>
      <br>
      <div class="kods-cart-item-profile bg-white rounded shadow p-3 mt-n5">
               <div class="d-flex flex-column">
                  <div class="custom-control custom-radio mb-2 px-0">
                  <input type="radio" id="delivery" value="0" name="order_type" class="custom-control-input" <?php if(!$type){echo "checked=''";} ?> onclick="javascript:location.href='<?php echo URLROOT; ?>/ecomapp/checkout'">
                  <label class="custom-control-label border kods-check p-3 w-100 rounded border-primary" for="delivery">
                  <b><i class="fa fa-motorcycle"></i> Delivery</b> <br>
                     </label>
                  </div>
               </div>
            </div><br>
            <div class="kods-cart-item-profile bg-white rounded shadow p-3 mt-n5">
               <div class="d-flex flex-column">
                  <div class="custom-control custom-radio mb-2 px-0">
                     
                  <input type="radio" id="self_pickup" value="2" name="order_type" class="custom-control-input" <?php if($type){echo "checked=''";} ?> onclick="javascript:location.href='<?php echo URLROOT; ?>/ecomapp/checkout/1'">
                  <label class="custom-control-label border kods-check p-3 w-100 rounded border-primary" for="self_pickup">
                  <b><i class="fa fa-shopping-bag"></i> Self Pickup</b> <br>
                     </label>
                  </div>
               </div>
            </div>

        <div class="mb-3 shadow bg-white rounded p-3 py-3 mt-3 clearfix">
        <div class="mb-0 input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="feather-message-square"></i></span></div>
              <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control" onchange="instruction(this.value)"></textarea>
           </div><br>
             <div class="input-group-sm mb-2 input-group">
              <input placeholder="Enter promo code" type="text" class="form-control" id="coupon">
              <div class="input-group-append"><button onclick="coupon(document.getElementById('coupon').value)" type="button" class="btn btn-primary"><i class="feather-percent"></i> APPLY</button></div>
           </div>
              <p id="response"></p>
         
        </div>


        <?php 
                   
                   $vend = array();
                   $radius = 6378137;
                   $vendor_latlong= explode(',', $vendor->vendor_latlong);
                   $lat1 = $_SESSION['user_lat'];
                   $lon1 =  $_SESSION['user_lon'];
                   $lat2 = $vendor_latlong[0];
                   $lon2 = $vendor_latlong[1];
                   static $x = M_PI / 180;
                   $lat1 *= $x; $lon1 *= $x;
                   $lat2 *= $x; $lon2 *= $x;
                   $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
                   $distance = ($distance * $radius)/1000;
                   $distance = round($distance,2);
                   $delivery_cost = 0;
                   if(!$type){
                   $distance_val = round($distance,0);
                   if($distance<=4){
                      $delivery_cost = 49;
                   }else if($distance<=8){
                     $delivery_cost = 49;
                     $delivery_cost = $delivery_cost + ($distance_val * 15);
                  }else{
                     $delivery_cost = 49;
                     $delivery_cost = $delivery_cost + ($distance_val * 20);
                  }
                  }
                  $total_val = $total_price + $delivery_cost;
                  $tax_val = (5*$total_val)/100;
                  $subtotal = $total_val;
                  $_SESSION['delivery_cost'] = $delivery_cost;
                  $_SESSION['tax_val'] = $tax_val;
                  $_SESSION['sub_total'] = $subtotal;
                  $nettotal = $subtotal + $tax_val;
                  $nettotal = round($nettotal);
                  $_SESSION['net_total'] = $nettotal;
            ?>
 
 <div class="shadow bg-white rounded p-3 clearfix">
               <p class="mb-1">Item Total <span class="float-right text-dark"><i class='fa fa-inr'></i><?php echo $total_price; ?></span></p>

               
               <p class="mb-1">Packing & Convenience<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark"><i class='fa fa-inr'></i><?php  echo $delivery_cost; ?></span></p>

               <p class="mb-1">Discount<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark" id='discount'>0</span></p> 

               <p class="mb-1 text-success">Sub Total<span class="float-right text-success" id='sub_val'><i class='fa fa-inr'></i><?php  echo $subtotal; ?></span></p>

               <p class="mb-1">Taxes<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark" id="tax_val"><i class='fa fa-inr'></i><?php  echo $tax_val; ?></span></p>
              
               <hr>
               <h6 class="pb-5 font-weight-bold mb-0">Net Total <span class="float-right" id='net_total'><i class='fa fa-inr'></i><?php echo $nettotal; ?></span></h6>
            </div>
            <button id='pay_total' style="background:#444" class="btn btn-success btn-block btn-lg fixed-bottom" onclick="payment()">PAY <i class='fa fa-inr'></i><?php echo $nettotal; ?><i class="icofont-long-arrow-right"></i></button>
     </div>
  </div>
  <?php 

?>

<script>
function payment(){
if(document.getElementById('delivery').checked) {
window.location = "<?php echo URLROOT; ?>/ecomapp/payment/0";
}else if(document.getElementById('self_pickup').checked) {
window.location = "<?php echo URLROOT; ?>/ecomapp/payment/2";
}
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
   $(document).ready(function(){
      $('#apply_coupon').click(function(){
         var instruction = $('#instruction').val();
         var coupon = $('#coupon').val();
            alert(coupon);
               $.ajax({
                  url  : '<?php echo URLROOT; ?>/pages/check_coupon',
                  type : 'POST',
                  data : {coupon,instruction},

                  success : function(res)
                  {
                     if(res>0){
                        alert("Invalid");
                        } else {
                        alert(res);
                        }
                  }

               });
      });
   });
</script>

<script type="text/javascript">
function coupon(coupon,subtotal='<?php echo $total_price; ?>',delivery_cost='<?php echo $delivery_cost; ?>',tax_val='<?php echo $tax_val; ?>',vendor_id='<?php echo $vendor->vendor_id?>'){
 
   if(coupon){
   $.ajax({
        url  : '<?php echo URLROOT; ?>/ecom/check_coupon',
        type : 'POST',
        data : {coupon,subtotal,delivery_cost,tax_val,vendor_id},
        success : function(res)
        {
            if(res=="0"){
               document.getElementById("response").innerHTML = "<span style='color:red;'>Invalid Coupon</span>";
               sub_total = subtotal - res + parseInt(delivery_cost); 
               new_tax = ( 5 * sub_total)/100;
               net_total = sub_total + new_tax; 
               net_total = Math.round(net_total);
               document.getElementById("discount").innerHTML = "<i class='fa fa-inr'></i> " + res;
               document.getElementById("sub_val").innerHTML = "<i class='fa fa-inr'></i> " + sub_total;
               document.getElementById("net_total").innerHTML = "<i class='fa fa-inr'></i> " + net_total;
               document.getElementById("pay_total").innerHTML = "PAY <i class='fa fa-inr'></i>" + net_total;
            }else {
               document.getElementById("response").innerHTML = "<span style='color:green;'>Coupon Applied</span>";
               sub_total = subtotal - res + parseInt(delivery_cost); 
               new_tax = ( 5 * sub_total)/100;
               net_total = sub_total + new_tax; 
               net_total = Math.round(net_total);
               document.getElementById("discount").innerHTML = "<i class='fa fa-inr'></i> " + res;
               document.getElementById("sub_val").innerHTML = "<i class='fa fa-inr'></i> " + sub_total;
               document.getElementById("net_total").innerHTML = "<i class='fa fa-inr'></i> " + net_total;
               document.getElementById("tax_val").innerHTML = "<i class='fa fa-inr'></i>" + new_tax;
               document.getElementById("pay_total").innerHTML = "PAY <i class='fa fa-inr'></i>" + net_total;
            }
        }

    });
}}

function instruction(instruction){
   $.ajax({
        url  : '<?php echo URLROOT; ?>/ecom/instruction',
        type : 'POST',
        data : {instruction},
        success : function()
        {
            
        }

    });
}
</script>