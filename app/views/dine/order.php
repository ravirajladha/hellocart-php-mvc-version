<?php require APPROOT . '/views/inc_dine/header.php'; ?> 
<?php 
$table = $data['table'];
$vendor = $data['vendor']; 
?>	
<style>
	thead{
  background: #ddd;
}
.toph {
	width:100%;
	background:#444;
	color:#fff;
	padding: 10px;
}
</style>	
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper" style="padding-top:0px;">
            <!-- row -->
			<div class="listcontent-area">
			<form action="<?php echo URLROOT; ?>/dine/create_dineorder/<?php echo $table->table_id ?>" method="POST" autocomplete="OFF">
				<aside class="cart-area">
					<div class="tab-content h-100">
						<div class="tab-pane  h-100 active show" id="home-counter">
							<div class="card">
								<div class="card-body container-fluid">
									<div class="row">
									<div style="display: inline-block;">
										<img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img ?>" class="img-fluid " alt="" width="120">
								    	
										</div>
										<div style="display: inline-block;margin-left:10px;">
										<h3 style="max-width:150px;word-wrap:break-word;" class="title mb-4"><?php echo $vendor->vendor_name; ?></h3>
										<h5>Table: <?php echo $table->table_name; ?></h5>
										</div>

										<div style="display: inline-block">
										<p style="max-width: 200ch;" class="mb-sm-5 mb-3"><?php echo $vendor->vendor_address; ?></p>
										
										</div>

									</div>
								
									
									
								
									

								    <?php if($_SESSION['rexkod_user_id']){ ?>
									<a href="#add-order" data-toggle="tab" class="" id="my_cart_dine"></a>
									<a href="#myorder" data-toggle="tab" class="" id="my_order_dine"></a>
									<a style="padding:8px;" href="<?php echo URLROOT; ?>/dine/logout/<?php echo $table->table_id; ?>" class="" style="color:#333;background:#eee;"></a>
									<?php } else {?>
									<a href="<?php echo URLROOT; ?>/dine/login/<?php echo $table->table_id; ?>" class=""></a>
									<a href="<?php echo URLROOT; ?>/dine/register/<?php echo $table->table_id; ?>" class=""></a>
									<?php }?>


								</div>
							</div>
						</div>
					
						<div class="tab-pane  h-100" id="add-order">
							<div class="card rounded-0">
								<div class="card-body p-0">
									<div class="table-responsive">
										<table class="table text-black">
											<thead>
												<tr>
													<th>ITEM</th>
													<th>PRICE</th>
													<th>QNT.</th>
													<th>TOTAL(<i class="fa fa-inr"></i>)</th>
												</tr>
											</thead>
											<tbody>
											
											<?php 
											$total=0;
											$cart_active =0;
											foreach($data['cart'] as $cart){ 
											$cart_active=1;
											$total = $total + $cart->item_price;
											?>	
											<tr id="ci<?php echo $cart->item_id; ?>">
													<td><span class="font-w500"><?php echo $cart->item_name; ?></span></td>
													<td><?php echo $cart->item_price; ?></td>

													<td><div class="quantity btn-quantity style-1">
													<input id="<?php echo $cart->item_id; ?>" type="text" value="<?php echo $cart->item_qty; ?>" name="<?php echo $cart->item_id ?>" onchange="item_update(this.id,this.value,<?php echo $cart->item_price; ?>,<?php echo $table->table_id; ?>)"/>
													</div></td>
													<td><span class="totval" id="t<?php echo $cart->item_id?>"><?php echo $cart->item_total_price; ?></span>
													
												    </td>
											</tr>
											<?php } if($total == 0){echo "<tr><td>No Items in Cart</td></tr>";} ?>

											
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card-order-footer">
								
								<div class="amount-payble">
									<h5 class="d-flex text-right mb-0">
										<span class="text">Amount to Pay</span>
										<span class="mr-0 ml-auto pull-right"><i class="fa fa-inr"></i></span>
										<span class="mr-0 ml-aut pull-left" id="final_total"><?php echo $total; ?></span>
									</h5>
								</div>
                     
								<div class="btn_box">
									<div class="row no-gutter mx-0">
										<a data-toggle="tab" href="#home-counter" id="home-counter-tab" class="btn btn-danger btn-block col-6 m-0 rounded-0">Cancel</a>
										<?php if($cart_active == 1){ ?>
										<button type="submit" class="btn btn-primary btn-block col-6 m-0 rounded-0">Place Order</button>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					
					</form>


					<div class="tab-pane  h-100" id="myorder">
							<div class="card rounded-0">

							<?php 
					$curModel = New Page; 
					$total=0;
					$table_total=0;
					foreach($data['orders'] as $order){
					if($order->status ==0){	
						$order_status = "Placed";
					}else if($order->status ==1){	
						$order_status = "Accepted";
					} else if($order->status ==2){	
						$order_status = "Completed";
					} else if($order->status ==9){	
						$order_status = "Cancelled";
					}
					?>	
					<div class="toph">#<?php echo $order->id; ?> Order Status <span class="pull-right"><?php echo $order_status; ?> </spam></div>
							<div class="card-body p-0">
									<div class="table-responsive">
										<table class="table text-black">
											<thead>
												<tr>
													<th>ITEM</th>
													<th>PRICE</th>
													<th>QNT.</th>
													<th>STATUS</th>
												</tr>
											</thead>
											<tbody>
											
											<?php 
											$items = json_decode($order->items, TRUE);
											foreach($items as $item_id => $item){ 
											
											$curitem  = $curModel->getItemById($item_id);
										
											$item_status = $item['item_status'];
											if($item_status==0){
												$status = "Placed";
											}else if($item_status==1){
												$status = "Preparing";
											}else if($item_status==2){
												$status = "Ready";
											}
											if(!$order->payment_status){
											$total = $total + $item['item_total_price'];
											}
											$table_total = $table_total + $item['item_total_price'];
											?>

											
											<tr>
											<td><span class="font-w500"><?php echo $curitem->item_name; ?></span></td>
											<td><?php echo $item['item_price'];?></td>

                                             <td><?php echo $item['item_qty'];?></td>
                                             <td><span><?php echo $status; ?></span></td>
											</tr>
											<?php }  ?>

											
											</tbody>
										</table>

										
									</div>
								</div>
						<?php } ?>		
							</div>
							<div class="card-order-footer">
								
							<?php 
							$_SESSION['net_total'] = $total;
							$_SESSION['table_id'] = $table->table_id; ?>

								<div class="amount-payble">
									<h5 class="d-flex text-rght mb-0">
									<a data-toggle="tab" href="#home-counter" id="home-counter-tab" class="btn btn-danger rounded-0" style="padding: 5px;">X</a>
										<span class="text" style="margin-left:25px;">Total<br>Balance </span>
										<span style="margin-left:5px !important" class="mr-0 ml-auto pull-right"> <i class="fa fa-inr"></i> <br> <i class="fa fa-inr"></i> </span>
										<span class="mr-0 ml-aut pull-lft"><?php echo $table_total; ?><br><?php echo $total; ?> </span>
										<span class="mr-0 ml-auto pull-riht">
											<?php if(!$order->payment_status): ?>
											<a href="<?php echo URLROOT; ?>/ecom/pay_dine/<?php echo $total;?>/<?php echo $table->table_id;?>">
											<span class='btn btn-sm btn-success' style='width:120px;padding:2px;margin-left:50px'> Pay Online</span>
										    </a>
											<?php endif; ?>

											<?php if($order->payment_status): ?>
											
											<span class='btn btn-sm btn-success' style='width:120px;padding:2px;margin-left:50px'> Paid</span>
										   
											<?php endif; ?>

									</span>
									</h5>
								</div>
								<?php if(!$order->payment_status): ?>
								<span style="font-size:15px">You can also Pay directly to restaurant.<a href="<?php echo URLROOT; ?>/dine/pay_cash/<?php echo $table->table_id;?>">
											<span class='btn btn-sm btn-warning' style='width:100px;padding:2px;'> Pay Cash</span>
										    </a></span>
								<?php endif; ?>
							</div>
						</div>
						



					</div>
				</aside>
			</form>
                <div class="row">
					<div class="col-xl-12">
						<div class="owl-carousel item-carousel">
						    <div class="items">
								<a href='<?php echo URLROOT; ?>/dine/order/<?php echo $table->table_id;?>/<?php echo $cat->category_id;?>'><div class="item-box">
									<img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" alt="">
									<h5 class="title mb-0">Full Menu</h5>
								</div></a>
							</div>
							<?php 
							$time2= date('Y-m-d H:i:s');
							$time = date("H:i:s",strtotime($time2));
							foreach($data['cat'] as $cat){ 
							
							if($cat->category_start_time < $time && $cat->category_end_time > $time){?>
							
						    <div class="items">
								<a href='<?php echo URLROOT; ?>/dine/order/<?php echo $table->table_id;?>/<?php echo $cat->category_id;?>'><div class="item-box">
									<img src="<?php echo URLROOT; ?>/uploads/<?php echo $cat->category_img; ?>" alt="">
									<h5 class="title mb-0"><?php echo $cat->category_name; ?></h5>
								</div></a>
							</div>
							<?php }} ?>
							
						</div>
					</div>
			
						
						<div class="row">
						<?php
							$curModel = New Page; 
						    foreach($data['items'] as $item){ 
							if($data['curcat']){ if($data['curcat'] != $item->item_cat_id){continue;}}
						    $curcat  = $curModel->getCategoryById($item->item_cat_id);
							if($curcat->category_start_time < $time && $curcat->category_end_time > $time){	
						?>
							
							<div class="col-sx-4">
								<div class="card item-card" style="max-width:180px !important;margin-left:15px !important">
									<div class="card-body p-0">
										<img src="<?php echo URLROOT; ?>/uploads/<?php echo $item->item_img;?>" class="img-fluid" alt="">
										<div class="info">
											
												<h5 class="name"><?php echo $item->item_name; ?><br><span style="font-size:12px;color:#555;font-weight:litter"><?php echo $item->item_desc; ?></span></h5><br>
											<h6 class="mb-0 price">
											<?php if($item->item_type ==1){ ?>
											<img src="<?php echo URLROOT; ?>/assets3/images/veg.png" alt="">
											<?php } else {?>
											<img src="<?php echo URLROOT; ?>/assets3/images/nonveg.png" alt="">
											<?php }?>
					
											<?php 
											if($item->item_discount_price_dine !=0) {
												echo "<span style='text-decoration: line-through;font-size:12px;'><i class='fa fa-inr'> </i>
												".$item->item_price_dine."</span> <i class='fa fa-inr'> </i>".$item->item_discount_price_dine;	
											}else {
												echo "<i class='fa fa-inr'> </i>".$item->item_price_dine;	
											} ?>
											
											<?php if($_SESSION['rexkod_user_id']){?>
											<a href="<?php echo URLROOT; ?>/dine/dine_cart_add/<?php echo $item->item_id; ?>/<?php echo $table->table_id; ?>/<?php echo $data['cursubcat'];?>">

											
											<button style='margin-top:-20px' class="pull-right btn btn-primary"><i class="fa fa-shopping_cart"></i>ADD</button>
							               </a>
										   <?php } else {?>
											<a href="<?php echo URLROOT; ?>/dine/login/<?php echo $table->table_id; ?>"><button style='margin-top:-20px' class="pull-right btn btn-primary"><i class="fa fa-shopping_cart"></i>Add</button>
											<?php } ?>
										</h6>
												
											
										</div>
									</div>
								</div>
							</div>
							<?php }}?>



						


						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<br><br><br><br><br><br><br><br><br>
     
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php if(isset($_SESSION['success'])){ ?>
<script type="text/javascript">
swal("<?php echo $_SESSION['success']; ?>");
</script>
<?php } unset($_SESSION['success']); ?>

<script>
function item_update(id,qty,price,table){
if(qty<1){

var cart_val =id+","+table;
$.ajax({
	url  : "<?php echo URLROOT; ?>/dine/dine_cart_delete/" + cart_val,
	type : 'POST',
});
document.getElementById("ci"+id).style.display = "none";
}

totval = qty * price;
document.getElementById("t"+id).innerHTML = totval;

var totval_ele = document.getElementsByClassName('totval');
tot_val_final = 0;
for (var i = 0; i < totval_ele.length; ++i) {
    tot = totval_ele[i].id;
	tot_val = Number(document.getElementById(tot).innerText);
    tot_val_final = tot_val_final + tot_val;
}
document.getElementById("final_total").innerHTML = tot_val_final;
document.getElementById("final_total2").innerHTML = tot_val_final;


}

</script>

<?php require APPROOT . '/views/inc_dine/footer.php'; ?> 



		