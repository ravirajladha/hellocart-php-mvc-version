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
							<div class="card-header bg-primary text-white">
								<div>
									<h4 class="text-white">Table: <?php echo $curtable->table_name; ?></h4>
									<span class="fs-12 op9">Order Placed</span>
								</div>
								<h3 class="text-white">Dine In</h3>
							</div>
							<div class="card-body">
								<ul class="order-list">
								<?php 
											$total=0;
											$order_items = explode(',', $order->order_items);
											$order_val = json_decode($order->order_val, TRUE);
											foreach($order_items as $order_item){ 
											
											$curitem  = $curModel->getItemById($order_item);
										
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
									<span><?php echo $order_val[$order_item]['item_qty']; ?></span>
									<span><?php echo $curitem->item_name; ?></span>
									<span class='pull-right'> <i class='fa fa-inr'></i> <?php echo $order_val[$order_item]['item_total_price']; ?></span>
								    </li>
									<?php } ?>
								</ul>
							</div>
							<div class="card-footer bg-default">
								<div class="pull-right">
									<a href="<?php echo URLROOT; ?>/pages/accept_dine_order/<?php echo $order->dine_order_id; ?>"><button class="btn btn-success btn-xs">Accept</button></a>
									<a href="<?php echo URLROOT; ?>/pages/reject_dine_order/<?php echo $order->dine_order_id; ?>"><button class="btn btn-warning btn-xs">Reject</button></a>
								</div>
							</div>
						</div>
					</div>

					<?php endforeach; ?>

					


					
				
				</div>
            </div>
        </div>
        


    </div>
    
    <!-- Required vendors -->

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