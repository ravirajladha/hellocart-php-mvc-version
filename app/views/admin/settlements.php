<?php require APPROOT . '/views/inc_admin/header.php'; ?> 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Settlements</h4>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="table-reponsive">
								<form action="<?php echo URLROOT; ?>/admin/vendor_settlements" method="POST">
                              <div class="row">
                                  <div class="col-md-9">
                                  <select name="vendor_id" id="" class="form-control">
											 
											 <?php foreach($data['vendors'] as $vendor){ ?>
											 	<option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
											<?php } ?>
									</select>
                                  </div>
                                  <div class="col-md-3">
                                      <button class="btn btn-primary">
                                        Get Settlement
                                      </button>
                                  </div>
                              </div>
                              </form>	
									
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                              
                                    <div class="col-md-6">
                                        <h3>All Settlements : <?php echo $data['vendor']->vendor_name; ?></h3>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
									
                                <table class="table table-responsive-md">
								<thead>
									<tr>
										
										<th>Restaurant</th>
										<th>Amount</th>
										<th>Commission</th> 
										<th>Transaction Detail</th>
                                        <th>Reciept</th>
                                        <th>Date & Time</th>


									</tr>
								</thead>
								<tbody>
                                <?php 

									$curModel = New Page; 
                                    $grand_total = 0;
									foreach($data['settlements'] as $settlement):
                                        $grand_total = $grand_total + $settlement->amount;
										$curvendor = $curModel->getVendorById($settlement->vendor_id);	
									?>
									<tr>
                                   
                                    <td><strong><?php echo $curvendor->vendor_name; ?></strong></td>
                                    <td><strong><i class="fa fa-inr"></i><?php echo $settlement->amount; ?></strong></td>
                                    <td><strong><i class="fa fa-inr"></i><?php echo $settlement->commission; ?></strong></td>
                                    <td><strong><?php echo $settlement->transaction_id; ?></strong></td>
                                    <td><strong><a target="_BLANK" href="<?php echo URLROOT; ?>/uploads/<?php echo $settlement->reciept_file; ?>">View Reciept</a></strong></td>
                                    <td><strong> <?php echo  date("M jS Y, h:m a", strtotime($settlement->datetime)); ?></strong></td>
                                   
									</tr>
                                    <?php endforeach; ?>
                                    </tr>
                                   
                                   <tr>
                                  
                                 
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