<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
$curModel = New Page; 
?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
         <?php 
         require APPROOT . "/views/inc_ecom/nav-header.php"; 
         ?>
           
           
       
         <!-- Filters -->
         <div class="bg-light">
           
            <!-- Trending this week -->
            <div class="px-3 pt-3 title d-flex align-items-center">
               <h5 class="m-0">Restaurants</h5>
               
            </div>
            <!-- slider -->
            <div class="trending-slider">

            <?php 
                   
                   $vend = array();
                   foreach($data['all_vendors'] as $vendor): 
                   $ratings  = $curModel->get_ratings_vendor($vendor->vendor_id); 
                   $total_rate = 0;
                   $rate_count = 0;
                   foreach($ratings as $rate){
                      $total_rate = $total_rate + $rate->rating;
                      $rate_count++;
                   }
                   $rating = 0;
                  if($rate_count>0){
                  $rating = $total_rate/$rate_count;
                  $rating = round($rating,1);
                  }
                   $radius = 6378137;
                   $vendor_latlong= explode(',', $vendor->vendor_latlong);
                   $lat1 = $_SESSION['user_lat'];
                   $lon1 =  $_SESSION['user_lon'];
                   $lat2 = $vendor_latlong[0];
                   $lon2 = $vendor_latlong[1];
                   static $x = M_PI / 180;
                   $lat1 *= $x; $lon1 *= $x;
                   $lat2 *= $x; $lon2 *= $x;
                   $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
                   $distance = ($distance * $radius)/1000;
                   $distance = round($distance,2);
                   if($distance<20 && $vendor->featured){
                   
            ?>
                                              
                                         
										


               <div class="kods-slider-item py-3 px-1" style="display:block; height:375px;">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image" style="height: 220px !important; background-color:#eee;">
                                           
                        <a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50," class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative bg-light">
                        <div class="list-card-body">
                           <h6 class="mb-1">
                              <a style="width:50px !important;" href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?></a>
                           </h6>
                           <span class="pull-right btn btn-primary" style="padding:0px 10px !important; font-size:10px;">Featured</span>
                           <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                           <p class="text-gray mb-3 time"><span class="text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="fa fa-map-marker"></i> <?php echo $distance; ?> KM Away</span>  <?php if($rating > 0){ ?> 
                              <span class="float-ight text-dark"> <i class="fa fa-star" style="color:gold"></i><?php echo $rating; ?></span>
                           <?php } ?>
                        </p>
                        </div>
                        <div class="list-card-badge">
                           
                        </div>
                     </div>
                  </div>
               </div>

               <?php } endforeach; ?>



              <?php 
                   
                   $vend = array();
                   foreach($data['all_vendors'] as $vendor): 
                   $ratings  = $curModel->get_ratings_vendor($vendor->vendor_id); 
                   $total_rate = 0;
                   $rate_count = 0;
                   foreach($ratings as $rate){
                      $total_rate = $total_rate + $rate->rating;
                      $rate_count++;
                   }
                   $rating = 0;
                  if($rate_count>0){
                  $rating = $total_rate/$rate_count;
                  $rating = round($rating,1);
                  }
                   $radius = 6378137;
                   $vendor_latlong= explode(',', $vendor->vendor_latlong);
                   $lat1 = $_SESSION['user_lat'];
                   $lon1 =  $_SESSION['user_lon'];
                   $lat2 = $vendor_latlong[0];
                   $lon2 = $vendor_latlong[1];
                   static $x = M_PI / 180;
                   $lat1 *= $x; $lon1 *= $x;
                   $lat2 *= $x; $lon2 *= $x;
                   $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
                   $distance = ($distance * $radius)/1000;
                   $distance = round($distance,2);
                   if($distance<3 && !$vendor->featured){
                   $vend[] = $vendor->vendor_id;
            ?>
                                              
                                         
										


               <div class="kods-slider-item py-3 px-1" style="display:block; height:350px;">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image" style="height: 220px !important; background-color:#eee;">
                                           
                        <a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50," class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative bg-light">
                        <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                              </a>
                           </h6>
                           <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                           <p class="text-gray mb-3 time"><span class="text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="fa fa-map-marker"></i> <?php echo $distance; ?> KM Away</span>  <?php if($rating > 0){ ?> 
                              <span class="float-ight text-dark"> <i class="fa fa-star" style="color:gold"></i><?php echo $rating; ?></span>
                           <?php } ?>
                        </p>
                        </div>
                        <div class="list-card-badge">
                           
                        </div>
                     </div>
                  </div>
               </div>

               <?php } endforeach; ?>


               <?php 
                  foreach($data['all_vendors'] as $vendor): 
                  $ratings  = $curModel->get_ratings_vendor($vendor->vendor_id); 
                  $total_rate = 0;
                  $rate_count = 0;
                  foreach($ratings as $rate){
                     $total_rate = $total_rate + $rate->rating;
                     $rate_count++;
                  }
                  $rating = 0;
                  if($rate_count>0){
                  $rating = $total_rate/$rate_count;
                  $rating = round($rating,1);
                  }
                   $radius = 6378137;
                   $vendor_latlong= explode(',', $vendor->vendor_latlong);
                   $lat1 = $_SESSION['user_lat'];
                   $lon1 =  $_SESSION['user_lon'];
                   $lat2 = $vendor_latlong[0];
                   $lon2 = $vendor_latlong[1];
                   static $x = M_PI / 180;
                   $lat1 *= $x; $lon1 *= $x;
                   $lat2 *= $x; $lon2 *= $x;
                   $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
                   $distance = ($distance * $radius)/1000;
                   $distance = round($distance,2);
                   if($distance<20 && !in_array($vendor->vendor_id, $vend) && !$vendor->featured){
            ?>
                                              
                                         
										


               <div class="kods-slider-item py-3 px-1" style="display:block; height:350px;">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image" style="height: 220px !important; background-color:#eee;">
                                           
                        <a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50," class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative bg-light">
                        <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                              </a>
                           </h6>
                           <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                           <p class="text-gray mb-3 time"><span class="text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="fa fa-map-marker"></i> <?php echo $distance; ?> KM Away</span>  <?php if($rating > 0){ ?> 
                              <span class="float-ight text-dark"> <i class="fa fa-star" style="color:gold"></i><?php echo $rating; ?></span>
                           <?php } ?>
                        </p>
                        </div>
                        <div class="list-card-badge">
                           
                        </div>
                     </div>
                  </div>
               </div>

               <?php } endforeach; ?>

            </div>

            <div class="offer-slider bg-white border-top border-bottom">
             <?php foreach($data['banners'] as $banner){?>
               <div class="cat-item px-1 py-3">
                  <a class="bg-white d-block text-center shadow" href="#">
                  <img src="<?php echo URLROOT; ?>/uploads/<?php echo $banner->banner_file; ?>" class="img-fluid rounded">
                  </a>
               </div>
              <?php } ?>
            </div>
           
            <!-- Most sales -->
            <div class="p-3 title d-flex align-items-center">
               <h5 class="m-0 pt-3">Restaurants Near You</h5>
            </div>
            <!-- Most sales -->
            <div class="most_sale px-3 pb-3">
               <div class="row">

               <?php 
                  foreach($data['all_vendors'] as $vendor): 
                 
                  $ratings  = $curModel->get_ratings_vendor($vendor->vendor_id); 
                  $total_rate = 0;
                  $rate_count = 0;
                  foreach($ratings as $rate){
                     $total_rate = $total_rate + $rate->rating;
                     $rate_count++;
                  }
                  $rating = 0;
                  if($rate_count>0){
                  $rating = $total_rate/$rate_count;
                  $rating = round($rating,1);
                  } 
                   $radius = 6378137;
                   $vendor_latlong= explode(',', $vendor->vendor_latlong);
                   $lat1 = $_SESSION['user_lat'];
                   $lon1 =  $_SESSION['user_lon'];
                   $lat2 = $vendor_latlong[0];
                   $lon2 = $vendor_latlong[1];
                   static $x = M_PI / 180;
                   $lat1 *= $x; $lon1 *= $x;
                   $lat2 *= $x; $lon2 *= $x;
                   $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
                   $distance = ($distance * $radius)/1000;
                   $distance = round($distance,2);
                   if($distance<3.1){
                  ?>

                  <div class="col-4 pt-2">
                  <a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           
                          
                           
                          <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                                 </a>
                              </h6>
                              <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                              <p class="text-gray time"><span class="text-dark rounded-sm"><i class="fa fa-map-marker"></i> <?php echo $distance; ?> KM Away</span> <br>
                            <?php if($rating > 0){ ?> 
                              <span class="float-ight text-dark"> <i class="fa fa-star" style="color:gold"></i><?php echo $rating; ?></span>
                           <?php } ?>
                           </p>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <?php } endforeach; ?>


               </div>
            </div>

            <div class="most_sale px-3 pb-3">
               <div class="row">

               <?php 
                  foreach($data['all_vendors'] as $vendor): 
                 
                  $ratings  = $curModel->get_ratings_vendor($vendor->vendor_id); 
                  $total_rate = 0;
                  $rate_count = 0;
                  foreach($ratings as $rate){
                     $total_rate = $total_rate + $rate->rating;
                     $rate_count++;
                  }
                  $rating = 0;
                  if($rate_count>0){
                  $rating = $total_rate/$rate_count;
                  $rating = round($rating,1);
                  } 
                   $radius = 6378137;
                   $vendor_latlong= explode(',', $vendor->vendor_latlong);
                   $lat1 = $_SESSION['user_lat'];
                   $lon1 =  $_SESSION['user_lon'];
                   $lat2 = $vendor_latlong[0];
                   $lon2 = $vendor_latlong[1];
                   static $x = M_PI / 180;
                   $lat1 *= $x; $lon1 *= $x;
                   $lat2 *= $x; $lon2 *= $x;
                   $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
                   $distance = ($distance * $radius)/1000;
                   $distance = round($distance,2);
                   if($distance > 3 && $distance < 20){
                  ?>

                  <div class="col-4 pt-2">
                  <a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           
                          
                           
                          <img src="<?php echo URLROOT; ?>/uploads/<?php echo $vendor->vendor_img; ?>" width="50" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo URLROOT;?>/ecom/restaurant/<?php echo $vendor->vendor_id; ?>" class="text-black"><?php echo $vendor->vendor_name; ?>
                                 </a>
                              </h6>
                              <p class="text-gray mb-3"><?php echo $vendor->vendor_address; ?></p>
                              <p class="text-gray time"><span class="text-dark rounded-sm"><i class="fa fa-map-marker"></i> <?php echo $distance; ?> KM Away</span> <br>
                            <?php if($rating > 0){ ?> 
                              <span class="float-ight text-dark"> <i class="fa fa-star" style="color:gold"></i><?php echo $rating; ?></span>
                           <?php } ?>
                           </p>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <?php } endforeach; ?>


               </div>
            </div>

         </div>
         <!-- Footer -->
         <div class="kods-menu-fotter fixed-bottm bg-white px-3 py-2 text-center">
           
         </div>
      </div>




<?php 
require APPROOT . "/views/inc_ecom/footer.php"; 
?>
    
      
    <script src="//code.tidio.co/wfbar1s15qbj28hm7hsfpynu3ivwsy28.js" async></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YXTCQXYZVN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXTCQXYZVN');
</script>