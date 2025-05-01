<?php require APPROOT . '/views/inc_admin/header.php'; ?> 


<div class="content-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-md-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Banner</h4>
							
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
                            <form action="<?php echo URLROOT; ?>/admin/create_banner" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Banner File</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom0" type="file" required="" name="banner_file">
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                               
                                                <div class="col-md-12">
                                                <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" value="Upload">
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
        

