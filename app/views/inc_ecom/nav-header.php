



<style>.navbar-dark .navbar-nav .nav-link {
    color: #ffffff;
}</style>
<div class="row">
               <div class="col-md-3">
                  <div class="text-white">
                   <div class="title d-fex align-items-center">
                  <a href="<?php echo URLROOT;?>/ecom/index">
                  <img src="<?php echo URLROOT; ?>/assets/images/logo.gif" alt="" width="50" style="position:absolute">
                  <img style="margin-left:60px" src="<?php echo URLROOT; ?>/assets/images/logo_text.png" alt="" width='150'></a><br>
                  <h6 style="font-size:12px;padding:10px;margin-left:60px !important;" class="m-0 border-dashed-bottom"><i class='fa fa-map-marker'></i> <?php echo $_SESSION['user_city']?>
                 </div>
                  </div>
               </div>
               <div class="col-md-6 mt-4">
                  <form action="<?php echo URLROOT; ?>/ecom/search" method="POST" >
                 <div class="input-group rounded shadow-sm overflow-hidden">
                  <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                 </div>
                    <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes" aria-label="" aria-describedby="basic-addon1" name="search_input">
                     </div>
</form>
               </div>
               <div class="col-md-3 mt-3">
               <nav class="navbar navbar-expand-sm navbar-dark pull-right">
                     <!-- Brand/logo -->
                

                     <?php if(isset($_SESSION['rexkod_user_id'])){ ?>
                     <!-- Links -->
                     <ul class="navbar-nav">
                    
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/profile">Hi <?php echo $_SESSION['rexkod_user_name']; ?>!</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/checkout">Cart</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/orders">Orders</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/logout">Logout</a>
                        </li>
                     </ul>
                     <?php } else { ?>
                     <!-- Links -->
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/index">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/login/0">Sign In</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo URLROOT;?>/ecom/register/0">Sign Up</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://blog.hellowcart.in" target="_BLANK">Blog</a>
                        </li>
                     </ul>
                     <?php } ?>



                     </nav>

                    
               </div>
            
            </div>
                       
           
         </div></div>




