<?php require APPROOT . '/views/inc_admin/header.php'; ?> 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Restaurants <a href="<?php echo URLROOT; ?>/admin/add_vendor" class="pull-right btn btn-primary mb-1">Add Restaurant</a></h4>
							
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
			<style>
                .btn-warning, .btn-success{
                    margin-bottom:6px;
                    padding:2px;
                }
            </style>	


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
								
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>Restaurant</strong></th>
                                                <th style="width:300px;"><strong>Name</strong></th>
                                                <th><strong>GST</strong></th>
                                                <th><strong>FSSAI</strong></th>
                                                <th><strong>Opening</strong></th>
                                                <th><strong>Closing</strong></th>
                                                <th style="min-width:150px"><strong>Action</strong></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach($data['all_vendors'] as $vendor): ?>
                                            <tr>
                                                <td><img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50," ></td>
                                                <td><?php echo $vendor->vendor_name; ?></td>
                                                <td><a href="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->gst_file; ?>" target="_BLANK"><?php echo $vendor->vendor_gst; ?></a></td>
                                                <td><a href="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->fssai_file; ?>" target="_BLANK"><?php echo $vendor->vendor_fssai; ?></a></td>
                                                <td><?php echo date('h:i a', strtotime($vendor->vendor_start_time));?></td>
                                                <td><?php echo date('h:i a', strtotime($vendor->vendor_end_time));?></td>
                                                 <td>
                                         <?php 
										if($vendor->vendor_status){
											echo "<a href='".URLROOT."/admin/update_vendor_status/".$vendor->vendor_id."/0'><button class='btn btn-success btn-xs'>Active</button></a>";
										}else{
											echo "<a href='".URLROOT."/admin/update_vendor_status/".$vendor->vendor_id."/1'><button class='btn btn-warning btn-xs'>Inactive</button></a>";
										}
										
										?>
                                               
                                         <?php 
										if($vendor->featured){
											echo "<a href='".URLROOT."/admin/update_vendor_featured/".$vendor->vendor_id."/0'><button class='btn btn-success btn-xs'>Featured</button></a>";
										}else{
											echo "<a href='".URLROOT."/admin/update_vendor_featured/".$vendor->vendor_id."/1'><button class='btn btn-warning btn-xs'>Regular</button></a>";
										}
										
										?>

                                        <a href="<?php echo URLROOT; ?>/admin/edit_vendor/<?php echo $vendor->vendor_id; ?>"><button class='btn btn-success btn-xs'>Edit</button></a>


                                        <?php 
										if($vendor->vendor_verified){
											echo "<a href='".URLROOT."/admin/update_vendor_verified/".$vendor->vendor_id."/0'><button class='btn btn-success btn-xs'>Verified</button></a>";
										}else{
											echo "<a href='".URLROOT."/admin/update_vendor_verified/".$vendor->vendor_id."/1'><button class='btn btn-warning btn-xs'>Not Verified</button></a>";
										}
										
										?>
                                                
                                        <a href="<?php echo URLROOT; ?>/admin/vendor_orders/<?php echo $vendor->vendor_id; ?>"><button class='btn btn-success btn-xs'>Orders</button></a>

                                        
									
                                                 </td>

                                            </tr>
											<?php endforeach;?>
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