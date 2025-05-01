<?php require APPROOT . '/views/inc_admin/header.php'; ?> 


<div class="content-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Reports</h4>
							
                        </div>
                    </div>
                   
                </div></div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            <th scope="col">Report</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Filter</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
										<form action="<?php echo URLROOT; ?>/admin/report_sales" method="POST">
                                         <td class="digits"><strong>Sales Report</strong></td>
										 <td class="digits"><input type="date" required class="form-control" name="start_date"></td>
										 <td class="digits"><input type="date" required class="form-control" name="end_date"></td>
										 <td class="digits">
										    <select name="vendor_id" id="" class="form-control">
											 <option hidden>Select Restaurant</option>
											 <?php foreach($data['all_vendors'] as $vendor){ ?>
											 	<option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
											<?php } ?>
											 </select>

											 <select name="order_type" id="" class="form-control">
											 <option value="all">All</option>
											 	<option value="online">Delivery</option>
												<option value="dine">Dine In</option>
												<option value="self">Self Pickup</option>
											 </select>
										 </td>
										 <td class="digits"><button type="submit" class="btn btn-sm btn-primary">Generate</button></td>
										 </form>
                                        </tr>  


										<tr>
										<form action="<?php echo URLROOT; ?>/admin/report_gst" method="POST">
                                         <td class="digits"><strong>GST Report</strong></td>
										 <td class="digits"><input type="date" required class="form-control" name="start_date"></td>
										 <td class="digits"><input type="date" required class="form-control" name="end_date"></td>
										 <td class="digits">
										    <select name="vendor_id" id="" class="form-control">
											 <option hidden>Select Restaurant</option>
											 <?php foreach($data['all_vendors'] as $vendor){ ?>
											 	<option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
											<?php } ?>
											 </select>

											 <select name="order_type" id="" class="form-control">
											 <option value="all">All</option>
											 	<option value="online">Delivery</option>
												<option value="self">Self Pickup</option>
											 </select>
										 </td>
										 <td class="digits"><button type="submit" class="btn btn-sm btn-primary">Generate</button></td>
										 </form>
                                        </tr>  

										<tr>
										<form action="<?php echo URLROOT; ?>/admin/report_delivery" method="POST">
                                         <td class="digits"><strong>Delivery Report</strong></td>
										 <td class="digits"><input type="date" required class="form-control" name="start_date"></td>
										 <td class="digits"><input type="date" required class="form-control" name="end_date"></td>
										 <td class="digits">
										    <select name="vendor_id" id="" class="form-control">
											 <option hidden>Select Restaurant</option>
											 <?php foreach($data['all_vendors'] as $vendor){ ?>
											 	<option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
											<?php } ?>
											 </select>

											 <select name="order_type" id="" class="form-control">
											 	<option value="online">Delivery</option>
											 </select>
										 </td>
										 <td class="digits"><button type="submit" class="btn btn-sm btn-primary">Generate</button></td>
										 </form>
                                        </tr>  
 

										<tr>
										<form action="<?php echo URLROOT; ?>/admin/report_cancelled" method="POST">
                                         <td class="digits"><strong>Cancellation Report</strong></td>
										 <td class="digits"><input type="date" required class="form-control" name="start_date"></td>
										 <td class="digits"><input type="date" required class="form-control" name="end_date"></td>
										 <td class="digits">
										    <select name="vendor_id" id="" class="form-control">
											 <option hidden>Select Restaurant</option>
											 <?php foreach($data['all_vendors'] as $vendor){ ?>
											 	<option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
											<?php } ?>
											 </select>

											 <select name="order_type" id="" class="form-control">
											 <option value="all">All</option>
											 	<option value="online">Online</option>
												<option value="dine">Dine In</option>
												<option value="self">Self Pickup</option>
											 </select>
										 </td>
										 <td class="digits"><button type="submit" class="btn btn-sm btn-primary">Generate</button></td>
										 </form>
                                        </tr>  



									
                                        
                    

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>


		<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 


		