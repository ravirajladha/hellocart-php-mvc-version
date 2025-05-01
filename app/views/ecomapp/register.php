<?php 
require APPROOT . "/views/inc_ecomapp/header.php"; 
?>
   <body>
   <div class="bg-primary d-flex align-items-center justify-content-center vh-100 index-page">
        
         <div class="p-4">
            <h2 class="text-white my-0">Welcome Here!</h2>
            <p class="text-white text-50">Sign up to continue</p>
            <form action="<?php echo URLROOT; ?>/ecomapp/user_register" method="post" autocomplete="off">
            <div class="form-group">
                  <label for="exampleInputEmail1" class="text-white">Name</label>
                  <input type="text" placeholder="Enter Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-white">Email</label>
                  <input type="email" placeholder="Enter Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
               </div><div class="form-group">
                  <label for="exampleInputEmail1" class="text-white">Phone</label>
                  <input type="number" placeholder="Enter Phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-white">Password</label>
                  <input type="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1" name="password">
               </div>
               <button class="btn btn-primary btn-lg btn-block" type="submit">SIGN UP</button>
               
            </form>
           
         </div>
         <div class="fixed-bottom d-flex align-items-center justify-content-center" style="background-color:#fff;">
            <a href="<?php echo URLROOT; ?>/ecomapp/login">
               <p class="text-center m-0">Already have an account? Sign In</p>
            </a>
         </div>
      </div>
   
      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo URLROOT; ?>/assets_ecom/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo URLROOT; ?>/assets_ecom/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo URLROOT; ?>/assets_ecom/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo URLROOT; ?>/assets_ecom/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo URLROOT; ?>/assets_ecom/js/kods.js"></script>
   </body>
</html>