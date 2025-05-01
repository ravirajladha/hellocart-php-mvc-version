

    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="<?php echo URLROOT; ?>/pages/index"><img src="<?php echo URLROOT; ?>/assets/images/log.png" alt="" style="height:30px;"></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
          <form method="post" action="<?php echo URLROOT; ?>/pages/search" enctype="multipart/form-data" autocomplete="OFF">
            <input class="form-control" type="text" placeholder="Search a Product" name="search_input">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper" id="sidenavWrapper">
      <!-- Sidenav Profile-->
      <div class="sidenav-profile">
        <div class="user-profile"><img src="<?php echo URLROOT; ?>/assets/images/user_grey.jpg" alt=""></div>
        <div class="user-info">

            <?php
        if(isset($_SESSION['rexkod_user_id']))
        {
        ?>
                <h6 class="user-name mb-0"><?php echo $_SESSION['rexkod_user_email']; ?></h6>
          <p class="available-balance">User</p>

        <?php
        }
        else
        {
        ?>  
                <h6 class="user-name mb-0">Guest</h6>
          <p class="available-balance">User</p>

        <?php
        }
        ?>

          
        </div>
      </div>


      
      <!-- Sidenav Nav-->
      <ul class="sidenav-nav ps-0">
        <li><a href="<?php echo URLROOT; ?>/pages/index"><i class="lni lni-home"></i>Home</a></li>

        <?php
        if(isset($_SESSION['rexkod_user_id']))
        {
        ?>

            <li><a href="<?php echo URLROOT; ?>/pages/orders"><i class="lni lni-life-ring"></i>Orders</a></li>

        <?php
        }
        else
        {
        ?>  
            
            <li><a href="<?php echo URLROOT; ?>/pages/login"><i class="lni lni-life-ring"></i>Orders</a></li>

        <?php
        }
        ?>

        <li><a href="<?php echo URLROOT; ?>/pages/cart" style="margin-top: -3px;"><i class="lni lni-shopping-basket"></i>Cart</a></li>

        <li><a href="#" style="margin-top: -3px;"><i class="lni lni-user"></i>My Profile</a></li>

        <li><a href="#" style="margin-top: -3px;"><i class="lni lni-user"></i>Export from India</a></li>


        

        <?php
        if(isset($_SESSION['rexkod_user_id']))
        {
        ?>
            <li>
          <a href="<?php echo URLROOT; ?>/user/logout"><i class="lni lni-power-switch"></i>Log Out</a>
        </li>

        <?php
        }
        else
        {
        ?>  
            <li>
          <a href="<?php echo URLROOT; ?>/pages/login"><i class="lni lni-power-switch"></i>Log In</a>
        </li>

        <?php
        }
        ?>


        
      </ul>
            <!-- Go Back Button-->
            <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
