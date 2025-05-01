<?php require APPROOT . '/views/inc_admin/header.php'; ?> 


<div class="content-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Coupons <a href="<?php echo URLROOT; ?>/admin/add_coupon" class="pull-right btn btn-primary mb-1">Add Coupon</a></h4>
							
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
                                            <th scope="col">Coupon Title</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Coupon Type</th>
                                            <th scope="col">Coupon Value</th>
                                            <th scope="col">Coupon Cap</th>
                                            <th scope="col">Restaurant</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                            <?php 
					            foreach($data['all_coupons'] as $coupon) :
                            ?>
                                        <tr>
                                         <td class="digits"><?php echo $coupon->coupon_title; ?></td>
                                         <td class="digits"><?php echo $coupon->coupon_code; ?></td>
                                         <td class="digits"><?php if($coupon->coupon_type==1){echo "Percentage";}else{echo "Fixed";} ?></td>
                                         <td class="digits"><?php echo $coupon->coupon_value; ?></td>
                                         <td class="digits"><?php echo $coupon->coupon_cap; ?></td>
                                         <td class="digits"><?php if($coupon->coupon_vendor_id==1){echo "All";}else{echo "#".$coupon->coupon_vendor_id;} ?></td>
                                         <td class="digits">
                                         <form action="<?php echo URLROOT; ?>/admin/change_state_coupon/<?php echo $coupon->coupon_id; ?>" method="post">
                                        <select class='form-control' name="coupon_status" onchange="this.form.submit()" style="font-size:12px;">
                                        <option value="1" <?php if($coupon->coupon_status==1){echo "selected";} ?> >Active</option>
                                        <option value="0" <?php if($coupon->coupon_status==0){echo "selected";} ?> >Inactive</option>
                                        </select>
                                        </form>

                                         </td>
                                        </tr>  
                                        
                            <?php 
                            endforeach;
                            ?>

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
        

