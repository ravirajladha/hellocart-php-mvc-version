<?php require APPROOT . '/views/inc/header.php'; ?>

	
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid bg-gray">
				<div class="row order-row" id="masonry">

				

				<?php 
					$curModel = New Page; 
					foreach($data['orders'] as $order):
					
						$order_items = explode(',', $order->order_items);
						$curtable  = $curModel->get_table_detail($order->table_id);
					?>	

					<div class="card-container">
						<div class="card  shadow-sm">
							
						
						    
						<?php if($order->order_type == 0){ ?>
							<div class="card-header bg-success text-white">
								<div>
									<h4 class="text-white"><?php echo $order->name; ?></h4>
									<span class="fs-12 op9">Order Placed</span>
								</div>
								<h3 class="text-white">Delivery</h3>
							</div>
						<?php } else if($order->order_type == 1){ ?>
							<div class="card-header bg-success text-white">
								<div>
									<h4 class="text-white"><?php echo $order->name; ?></h4>
									<span class="fs-12 op9">Order Placed</span>
								</div>
								<h3 class="text-white">Dine In</h3>
							</div>
							<?php } else if($order->order_type == 2){ ?>
							<div class="card-header bg-warning text-white">
								<div>
								<h4 class="text-white"><?php echo $order->name; ?></h4>
									<span class="fs-12 op9">Order Placed</span>
								</div>
								<h3 class="text-white">Self Pickup</h3>
							</div>
						<?php } ?>



							<div class="card-body">
								<ul class="order-list">
								<?php 
											$total=0;
											$items = json_decode($order->items, TRUE);
											foreach($items as $item_id => $item){ 
											
											$curitem  = $curModel->getItemById($item_id);
											$item_status = $order_val[$order_item]['item_status'];
											if($item_status==0){
												$status = "Placed";
											}else if($item_status==1){
												$status = "Preparing";
											}else if($item_status==2){
												$status = "Delivered";
											}
											?>
									<li>
									<span><?php echo $item['item_qty']; ?></span>
									<span><?php echo $curitem->item_name; ?></span>
									<span class='pull-right'> <i class='fa fa-inr'></i> <?php echo 
									$item['item_total_price']; ?></span>
								    </li>
									<?php } ?>
								</ul>
							</div>
							<div class="card-footer bg-default">
								<div class="pull-right">
									<a href="<?php echo URLROOT; ?>/pages/accept_order/<?php echo $order->id; ?>"><button class="btn btn-success btn-xs">Accept</button></a>
									<a href="<?php echo URLROOT; ?>/pages/reject_order/<?php echo $order->id; ?>"><button class="btn btn-warning btn-xs">Reject</button></a>
								</div>
							</div>
						</div>
					</div>

					<?php endforeach; ?>

					


					
				
				</div>
            </div>
        </div>
      


    </div>
   
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>


	<script src="<?php echo URLROOT; ?>/assets2/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets2/vendor/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
	<script src="<?php echo URLROOT; ?>/assets2/vendor/masonry/masonry-4.2.2.js"></script><!-- MASONRY -->
    <script src="<?php echo URLROOT; ?>/assets2/js/custom.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets2/js/kodsnav-init.js"></script>

	
</body>
</html>


<script>
    setInterval(function(){
   window.location.reload(1);
}, 15000);
</script>