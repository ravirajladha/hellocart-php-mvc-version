
    </div>
	<div class="kods-menu-fotter fixed-bottom bg-white px-3 py-2 text-center" style="background-color:orange;">
            <div class="row">
            
               <div class="col">
                  <span  onclick="$('#my_order_dine').click()" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="fa fa-list"></i></p>
                     Orders
                  </span>
               </div>
               
               <div class="col bg-white rounded-circle mt-n4 px-3 py-2" style="max-width:100px">
                  <div class="bg-warning rounded-circle shadow">
                     <span onclick="$('#my_cart_dine').click()"  style="font-size:30px" href="#" class="text-white font-weight-bold text-decoration-none">
                     <i class="fa fa-shopping-cart"></i>
                    </span>
                  </div>
               </div>
               <div class="col">
                  <span <?php if(!$_SESSION['rexkod_user_id']){echo "onclick='login_redirect()'";} ?> class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="fa fa-user"></i></p>
                     Profile
                  </span>
               </div>
               
            </div>
      </div>
</div>
     
    <!-- Required vendors -->
    <script src="<?php echo URLROOT; ?>/assets3/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets3/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets3/vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Counter Up -->
    <script src="<?php echo URLROOT; ?>/assets3/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets3/vendor/jquery.counterup/jquery.counterup.min.js"></script>	
	
	<script src="<?php echo URLROOT; ?>/assets3/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="<?php echo URLROOT; ?>/assets3/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

    <script src="<?php echo URLROOT; ?>/assets3/js/custom.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets3/js/kodsnav-init.js"></script>
	<script src="vendor/swiper/js/swiper-bundle.min.js"></script>
	<script>
		  
	function ItemsCarousel()
	{
	
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.item-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			center:true,
			autoWidth:true,
			autoplay:true,
			dots: false,
			items:4,
			navText: ['', ''],
			breackpoint:[
			
			
			]
			
		})
	}
	
	jQuery(window).on('load',function(){
		setTimeout(function(){
			ItemsCarousel();
		}, 1000); 
	});

	function login_redirect(){
		window.location.replace("<?php echo URLROOT; ?>/dine/login/<?php echo $data['table']->table_id; ?>");
	}
	</script>
	
</body>
</html>