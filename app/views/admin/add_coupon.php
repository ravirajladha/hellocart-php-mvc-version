<?php require APPROOT . '/views/inc_admin/header.php'; ?> 


<div class="content-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Coupons</h4>
							
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
                            <form action="<?php echo URLROOT; ?>/admin/create_coupon" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Coupon Title</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom0" type="text" required="" name="coupon_title">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4">Restaurant</label>
                                                <div class="col-md-7">
                                                <select  class="form-control"  id="select_change" required="" name="coupon_vendor">
                                            <option selected="" value="1">All</option>
                                            <?php foreach($data['all_vendors'] as $vendor) {  ?>
                                            <option value="<?php echo $vendor->vendor_id; ?>"><?php echo ucwords($vendor->vendor_name); ?></option>
                                            <?php } ?>
                                             </select>
                                                </div>
                                            </div>


                                            
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Coupon Code</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_code">
                                                </div>
                                                
                                            </div>
                                           
                                            
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span>*</span>Discount Type</label>
                                                <div class="col-md-7">
                                                    <select class="custom-select w-100 form-control" required="" name="coupon_type">
                                                        <option value="">--Select--</option>
                                                        <option value="1">Percent</option>
                                                        <option value="2">Fixed</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span>*</span>Usage</label>
                                                <div class="col-md-7">
                                                    <select name="usage" class="custom-select w-100 form-control" required="">
                                                        <option value="">--Select--</option>
                                                        <option value="1">Once</option>
                                                        <option value="2">Unlimited</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Discount Value</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_value">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Discount Cap</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_cap">
                                                </div>
                                                
                                            </div>
                                            

                                            <div class="form-group row" >
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Minimum Order Value</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="min_order" id="validationCustom1" type="text" required="">
                                                </div>
                                          
                                            </div>

                                            <div class="form-group row" >
                                               
                                                <div class="col-md-12">
                                                <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" value="Create">
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="pull-right">
                                              
                                                </div>
                                                </div>
                                          
                                            </div>
                                            
                                           


                                        </div>
                                    </div>
                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

 
        <?php require APPROOT . '/views/inc_admin/footer.php'; ?> 
        

