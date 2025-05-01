<div class="kods-menu-fotter fixed-bottom bg-white px-3 py-2 text-center">
            <div class="row">
               <div class="col">
                  <a id="homehome" href="<?php echo URLROOT; ?>/ecomapp/index" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-home"></i></p>
                     Home
                  </a>
               </div>
               <div class="col">
                  <a href="<?php echo URLROOT; ?>/ecomapp/orders" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                     Orders
                  </a>
               </div>
               
               <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
                  <div class="bg-danger rounded-circle mt-n0 shadow">
                     <a href="<?php echo URLROOT; ?>/ecomapp/checkout" class="text-white small font-weight-bold text-decoration-none">
                     <i class="feather-shopping-cart"></i>
                     </a>
                  </div>
               </div>
               <div class="col">
                  <a href="<?php echo URLROOT; ?>/ecomapp/all_orders" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="fa fa-exchange"></i></p>
                     Payment
                  </a>
               </div>
               <div class="col">
                  <a href="<?php echo URLROOT; ?>/ecomapp/<?php if($_SESSION['rexkod_user_id']){echo "profile";}else{echo "login/0";}?>" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-user"></i></p>
                     Profile
                  </a>
               </div>
            </div>
      </div>
</div>
      <nav id="main-nav">
      
         <ul class="bottom-nav">
            <li class="email">
               <a class="text-danger" href="#">
                  <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                  Home
               </a>
            </li>
            <li class="github">
               <a href="#">
                  <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                  FAQ
               </a>
            </li>
            <li class="ko-fi">
               <a href="#">
                  <p class="h5 m-0"><i class="feather-phone"></i></p>
                  Help
               </a>
            </li>
         </ul>
      </nav>