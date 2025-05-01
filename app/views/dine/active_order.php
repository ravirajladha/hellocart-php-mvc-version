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
        <div class="content-rapper">
            <!-- row -->
			<div class="listcontent-area">
			<form action="<?php echo URLROOT; ?>/dine/create_dineorder/<?php echo $table->table_id ?>" method="POST" autocomplete="OFF">
				<aside class="cart-area">
					<div class="tab-content h-100">
						<div class="tab-pane  h-100 active show" id="home-counter">
							<div class="card">
								<div class="card-body">
									<img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img ?>" class="img-fluid mb-5" alt="" width="200">
									<h5>Table: <?php echo $table->table_name; ?></h5>
									<h3 class="title mb-4"><?php echo $vendor->vendor_name; ?></h3>
									<p class="mb-sm-5 mb-3"><?php echo $vendor->vendor_address; ?></p>
								   
									<a style="color:#fff" class="btn btn-warning btn-rounded mr-3">Table not available</a>
									


								</div>
							</div>
						</div>
					
					
					</form>


					<div class="tab-pane  h-100" id="myorder">
							<div class="card rounded-0">

							<?php 
					$curModel = New Page; 
					$total=0;
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
											$total = $total + $item['item_total_price'];
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
								
								<div class="amount-payble">
									<h5 class="d-flex text-rght mb-0">
									<a data-toggle="tab" href="#home-counter" id="home-counter-tab" class="btn btn-danger rounded-0" style="padding: 5px;">X</a>
										<span class="text" style="margin-left:25px;">Total</span>
										<span class="mr-0 ml-auto pull-right"><i class="fa fa-inr"></i></span>
										<?php $_SESSION['net_total'] = $total; ?>
										
										<span class="mr-0 ml-aut pull-lft"><?php echo $total; ?> </span>
										<span class="mr-0 ml-auto pull-riht">
											<a href="<?php echo URLROOT; ?>/ecom/pay/<?php echo $_SESSION['net_total'];?>">
											<span class='btn btn-sm btn-success' style='width:120px;padding:2px;margin-left:50px'> Pay Online</span>
										    </a>
									</span>
									</h5>
								</div>
								<span style="font-size:15px">You can also Pay directly to restaurant.</span>
							</div>
						</div>
						



					</div>
				</aside>
			</form>
               
					</div>
				</div>
            </div>
        </div>
     


<?php require APPROOT . '/views/inc_dine/footer.php'; ?> 



		