<?php require APPROOT . '/views/inc/header.php'; ?> 
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div id="user-activity" class="card">
							<div class="card-header border-0 pb-0 -sm-flex d-block">
								<div>
									<h2 class="main-title mb-1">Add Table</h2><hr><br>

                                    <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/pages/add_table" method="POST" autocomplete="OFF">
                                    <div class="form-group mb-3 pb-3 row">
												<label class="font-w600 col-md-2">Table Name</label>
												<input type="text" class="form-control solid col-md-7"   name="table_name">
                                                <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary btn-block rounded">Add Table</button>
                                    </div>
                                </form>
								</div>
                                            
<hr>
								</div>
								
							</div>
							
						</div>
					</div>
					<div class="col-xl-12">
						<div class="row">

                        <?php foreach($data['all_tables'] as $table){ 
                            if($table->status==0){$status="Available";}else{$status="Occupied";}?>
							<div class="col-sm-6">
								<div class="widget-card-1 card">
									<div class="card-body">
										<div class="media">
											<img src="<?php echo URLROOT; ?>/assets2/images/table.png" alt="" class="mr-4" width="100">
											<div class="media-body">
												<h3 class="mb-sm-3 mb-2 text-black"><?php echo $table->table_name; ?></h3>
												<a target="_BLANK" href="<?php echo URLROOT; ?>/pages/print_qr/<?php echo $table->table_id; ?>"><button class="btn btn-xs btn-success"> Print QR</button></a>
											</div>
                                                <a href="<?php echo URLROOT; ?>/pages/download_qr/<?php echo $table->table_id; ?>">
                                                <img src="<?php echo'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.URLROOT.'/dine/order/'.$table->table_id;?>" width="100" class="mr-4" /></a>
										</div>
									</div>
								</div>
							</div>
                            <?php }; ?>


						</div>
					</div>
					
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

		<?php require APPROOT . '/views/inc/footer.php'; ?>