<!-- Footer Nav-->
<style>

    .btn-cart {
        margin-top:10px;
    }
</style>
<div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <div class="d-flex align-itms-center justify-content-between ps-0">

            

          <div class="col-md-9">
          <div class="p-specification mb-3 py-3">
          <div class="container">
            <h6><?php echo $cart_count; if($cart_count>1){echo ' Items';}else{echo ' Item';} ?>  |  <i class='fa fa-inr'> </i> <?php echo $total; ?></h6>

            
          </div>
        </div>
          </div>
          <div class="col-md-3">
          <a href="<?php echo URLROOT. '/pages/cart'; ?>"><button class="btn-cart btn btn-danger mx-2">View Cart <i class='fa fa-shopping-cart'></i></button></a>
          </div>
          




            
</div>
        </div>
      </div>
    </div>

    