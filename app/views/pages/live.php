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


                        <?php if($order->order_type == "0"){ ?>
							<div class="card-header bg-success text-white">
								<div>
									<h4 class="text-white"><?php echo $order->name; ?></h4>
									<span class="fs-12 op9">Order Placed</span><br>
									<span class="fs-12 op9"><?php echo "[".$order->instruction."]"; ?></span>
								</div>
								<h3 class="text-white">Delivery<br>
								<span class="fs-12 op9">HC1000<?php echo $order->id?></span></h3>
							</div>
						<?php } else if($order->order_type == "1"){ ?>
							<div class="card-header bg-success text-white">
								<div>
									<h4 class="text-white"><?php echo $order->name; ?></h4>
									<span class="fs-12 op9">Order Placed</span>
								</div>
								<h3 class="text-white">Dine In (<?php echo $curtable->table_name; ?>)<br>
								<span class="fs-12 op9">#<?php echo $order->id?></span></h3>
							</div>
							<?php } else if($order->order_type == "2"){ ?>
							<div class="card-header bg-warning text-white">
								<div>
								<h4 class="text-white"><?php echo $order->name; ?></h4>
									<span class="fs-12 op9">Order Placed</span>
								</div>
								<h3 class="text-white">Self Pickup<br>
								<span class="fs-12 op9"><?php echo "[".$order->instruction."]"; ?></span>
								<span class="fs-12 op9">#<?php echo $order->id?></span></h3>
							</div>
						<?php } ?>



							<div class="card-body">
								<ul class="order-list">
								<?php 
											$total=0;
											$items = json_decode($order->items, TRUE);
											foreach($items as $item_id => $item){ 
											
											$curitem  = $curModel->getItemById($item_id);
										
											$status = $item['item_status'];
											?>
									<li>
									
									 
                                    
                            <?php 
                            $completed = 0;
                            if($status==0){
                                echo "
                                <span>".$item['item_qty']."</span>
                                <span>".$curitem->item_name."</span>
                                <a href='".URLROOT."/pages/item_update/".$order->id."/".$item_id."/1'><span class='pull-right'> <i class='fa fa-check-circle' style='color: #ff8300;'>Start</i></span><a>";
                                $completed = 0;
                            }else if($status==1){
                                echo "
                                <span>".$item['item_qty']."</span>
                                <span>".$curitem->item_name."</span>
                                <a href='".URLROOT."/pages/item_update/".$order->id."/".$item_id."/2'><span class='pull-right'> <i class='fa fa-check-circle' style='color: green;'>Done</i></span></a>";
                                $completed = 0;
                            }else if($status==2){
                                echo "
                               
                                <span> <del>".$item['item_qty']."</del></span>
                                <span><del>".$curitem->item_name."</del></span>
                                <span class='pull-right'><del> <i class='fa fa-cutlery'></i></del></span>";
                            }

                            ?>
								    </li>
									<?php } ?>
								</ul>
							</div>
                            <?php if($completed == 0){ ?>
                            <div class="card-footer bg-default">
                               <?php if($order->payment_stutus == 1){
                               echo "<div class='pull-left' style='color:#111'>Paid Online</div>";
                               }else{ 
                                echo "<div class='pull-left' style='color:#111'>Collect Cash<br><i class='fa fa-inr'></i>".$order->net_total."</div>";
                               } ?>

								<div class="pull-right">
									<a href="<?php echo URLROOT; ?>/pages/complete_order/<?php echo $order->id; ?>"><button class="btn btn-success btn-xs">Completed</button></a>
								</div>
							</div>
                            <?php } ?>
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