<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
         <?php 
         require APPROOT . "/views/inc_ecom/nav-header.php"; 
         ?>


         <div class="p-4 mt-5 col-md-offest-3" style="text-align:center; display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;">
            <h2 class="text-wite my-0">Welcome Back</h2>
            <p class="text-whie text-50">Sign in to continue</p>
            <form method="post" action="<?php echo URLROOT;?>/ecom/user_login/<?php echo $data['rid']; ?>" autocomplete="off">
               <div class="form-group">
                  
                  <input type="email" placeholder="Enter Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
               </div>
               <div class="form-group">
                 
                  <input type="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1" name="password">
               </div>
               <button class="btn btn-primary btn-lg btn-block" type="submit">SIGN IN</button>
               <div class="py-2">
                  
               </div>
            </form>
           
         </div>
         <a href="<?php echo URLROOT; ?>/ecom/forgot_password" class="text-decoration-none">
               <p class="text-whie text-center">Forgot your password?</p>
            </a>
         <div class="fixd-bottom d-flex align-items-center justify-content-center">
            <a href="<?php echo URLROOT; ?>/ecom/register/<?php echo $data['rid']; ?>">
               <p class="text-center text-hite m-0">Don't have an account? Sign up</p>
            </a>
         </div>
      </div>
      
      <?php 
require APPROOT . "/views/inc_ecom/footer.php"; 
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_SESSION['success'])){ ?>
 <script type="text/javascript">
     swal("<?php echo $_SESSION['success']; ?>");
 </script>
<?php } unset($_SESSION['success']); ?>


<?php 
require APPROOT . '/views/inc/footer.php'; 
?>