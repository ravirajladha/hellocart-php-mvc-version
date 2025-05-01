<?php require APPROOT . '/views/inc_admin/header.php'; 
$order = $data['order'];
?> 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Order #<?php echo $order->id; ?> </h4>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                              
                                    <div class="col-md-4">
Restaurant : <?php echo $data['vendor']->vendor_name; ?> 
                                    </div>
                                    <div class="col-md-4">
Customer : <?php echo $data['user']->name; ?> 
                                    </div>
                                    <div class="col-md-4">
Phone : <?php echo $data['user']->phone; ?> 
                                    </div>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>Item ID</th>
										<th>Item Name</th>
										<th>Item Quantity</th> 
										<th>Total</th>


									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $grand_total =0;
                                    $items = json_decode($order->items, TRUE);
                                    foreach($items as $item_id => $item):
                                    $grand_total = $grand_total + $item['item_total_price'];
                                    $curitem  = $curModel->getItemById($item_id);

									?>
									<tr>
                                   
                                    <td><strong><?php echo $curitem->item_id; ?></strong></td>
                                    <td><strong><?php echo $curitem->item_name; ?></strong></td>
                                    <td><strong><?php echo $item['item_qty']; ?></strong></td>
                                    <td><strong><?php echo $item['item_total_price']; ?></strong></td>
								
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
                                  <td></td>
                                  <td></td>
                                  <td>Grand Total</td>
                                   <td><strong><i class="fa fa-inr"></i><?php echo $grand_total; ?></strong></td>
                                  
                                  
                                  <td></td>
                                 
                                  </tr>
								</tbody>


							

							</table>
									
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?> 