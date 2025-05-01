<!DOCTYPE html>
<html lang="en">
   <head>
      <script type="text/javascript">
        if (screen.width >= 700) {
        window.location = "<?php echo URLROOT; ?>/ecom";
        }
      </script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <link rel="icon" type="image/png" href="<?php echo URLROOT; ?>/assets_ecom/img/fav.png">
      <title>Hellow Cart</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/assets_ecom/vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/assets_ecom/vendor/slick/slick-theme.min.css"/>
      <!-- Feather Icon-->
      <link href="<?php echo URLROOT; ?>/assets_ecom/vendor/icons/feather.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo URLROOT; ?>/assets_ecom/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo URLROOT; ?>/assets_ecom/css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?php echo URLROOT; ?>/assets_ecom/vendor/sidebar/demo.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>

   <?php if(!$_SESSION['user_lat'] || !$_SESSION['user_lon'] || !$_SESSION['user_city']){
     echo "<script>window.location.href = '".URLROOT."/ecomapp/location';</script>";

   }?>
