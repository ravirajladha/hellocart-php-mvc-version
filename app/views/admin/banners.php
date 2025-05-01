<?php require APPROOT . '/views/inc_admin/header.php'; ?> 


<div class="content-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Banners <a href="<?php echo URLROOT; ?>/admin/add_banner" class="pull-right btn btn-primary mb-1">Add Banner</a></h4>
							
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
                                            <th scope="col">Banner ID</th>
                                            <th scope="col">Banner</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                            <?php 
					            foreach($data['banners'] as $banner) :
                            ?>
                                        <tr>
                                         <td class="digits"><?php echo $banner->banner_id; ?></td>
                                         <td class="digits"><img src="<?php echo URLROOT;; ?>/uploads/<?php echo $banner->banner_file; ?>" alt="" width="300"></td>
                                         <td class="digits">
                                             <a href="<?php echo URLROOT; ?>/admin/delete_banner/<?php echo $banner->banner_id; ?>"><button class="btn btn-danger btn-sm btn-xs">Delete</button></a>
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
        

