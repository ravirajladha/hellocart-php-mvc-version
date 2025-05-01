<!-- Footer Nav-->
<div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li <?php if($home_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/index"><i class="lni lni-home"></i>Home</a></li>


            <?php
        if(isset($_SESSION['rexkod_user_id']))
        {
        ?>
             <li <?php if($order_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/orders"><i class="lni lni-life-ring"></i>Orders</a></li>

        <?php
        }
        else
        {
        ?>  
             <li <?php if($order_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/login"><i class="lni lni-life-ring"></i>Orders</a></li>

        <?php
        }
        ?>


            
            <li <?php if($cart_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/cart"><i class="lni lni-shopping-basket"></i>Cart</a></li>
            <li <?php if($vendor_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/vendors"><i class="lni lni-heart"></i>Vendors</a></li>

            <?php
        if(isset($_SESSION['rexkod_user_id']))
        {
        ?>


            <li <?php if($profile_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/profile"><i class="lni lni-user"></i>Profile</a></li>

        <?php
        }
        else
        {
        ?>  
            <li <?php if($profile_active==1){echo "class='active'";} ?>><a href="<?php echo URLROOT; ?>/pages/login"><i class="lni lni-user"></i>Profile</a></li>

        <?php
        }
        ?>

            
          </ul>
        </div>
      </div>
    </div>

    