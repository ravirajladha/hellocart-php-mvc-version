<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

<meta name="viewport" content="width=device-width,initial-scale=1">    
    <title>Hellow Cart</title>
    <link href="<?php echo URLROOT;?>/assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<img src="<?php echo URLROOT; ?>/assets/images/logo2.png" alt="" width="200">
									</div>

                                    <h4 class="text-center mb-4">Sign in to your account</h4>

                                    <form method="post" action="<?php echo URLROOT;?>/dine/user_login/<?php echo $data['table_id']; ?>" autocomplete="off">
                                 
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="Enter Email ID" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                          
                                           
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                        </div>
                                    </form>
                                    <a href="<?php echo URLROOT; ?>/dine/register/<?php echo $data['table_id']; ?>"><center><p><br>Don't have an account? Sign Up.</p></center></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo URLROOT; ?>/assets/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/custom.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/kodsnav-init.js"></script>

</body>

</html>