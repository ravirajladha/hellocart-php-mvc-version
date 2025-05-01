<?php require APPROOT . '/views/inc_admin/header.php'; ?> 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Users</h4>
							
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
				


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
                                               
                                                <th style="width:300px;"><strong>Name</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Phone</strong></th>
                                                <th><sßtrong>Joined</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach($data['customers'] as $cust): ?>
                                            <tr>
                                              
                                                <td><?php echo $cust->name; ?></td>
                                                <td><?php echo $cust->email; ?></td>
                                                <td><?php echo $cust->phone; ?></td>
                                                <td><?php echo date('D m Y, h:i a', strtotime($cust->created_at));?></td>
                                                
                                              
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