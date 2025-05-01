<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
         <?php 
         require APPROOT . "/views/inc_ecom/nav-header.php"; 
         $otp_new = str_pad(rand(0,9999), 4, "0", STR_PAD_LEFT);
         ?>

 
         <div class="p-4 mt-5 col-md-offest-3" style="text-align:center; display: block; margin-left: auto;margin-right: auto; width: 40%;">
            <h2 class="text-wite my-0 mt-5">Register with Us!</h2>
            <p class="text-whie text-50">Create Account</p>
            <form action="<?php echo URLROOT; ?>/ecom/user_register/<?php echo $data['rid']; ?>" method="post" autocomplete="off" id="regform">
               <div class="form-group">
                 
                  <input type="text" placeholder="Enter Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
               </div>
               <div class="form-group">
                
                  <input type="email" placeholder="Enter Email" class="form-control" name="email" required>
               </div>
               <div class="form-group">
                 
                  <input type="number" placeholder="Enter Phone" class="form-control" id="phone_new" name="phone" required>
               </div>
               
               <div class="form-group">
                
                  <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
               </div>


               <button id="signup_btn" style="display:none;" class="btn btn-primary btn-block" type="submit">SIGN UP</button>
               <div class="py-2">
                  
               </div>
            </form>
            <div class="row">
                  <div class="col-md-4">
                     <div class="form-group pull-left">
                     <button onclick="this.disabled=true;" class="btn btn-primary" id="getOTP">Generate OTP</button>
                     </div> 
                  </div>
                  <div class="col-md-8">
                     <div class="form-group">
                     <input type="number" placeholder="Enter OTP sent to your phone" id="postOTP" class="form-control" onkeyup="checkotp(this.value,<?php echo $otp_new; ?>)">
                     </div> 
                  </div>
               </div>
         
         </div>
         <div class="fixd-bottom d-flex align-items-center justify-content-center">
            <a href="<?php echo URLROOT; ?>/ecom/login/<?php echo $data['rid']; ?>">
               <p class="text-center text-hite m-0">Alredy have an account? Sign In</p>
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

<script>


$(document).ready(function(){
        $('#getOTP').click(function(){
        
         var phone = document.getElementById("phone_new").value;

                  $.ajax({
                        url  : "<?php echo URLROOT; ?>/ecom/send_otp/"+phone+"/<?php echo $otp_new; ?>",
                        type : 'POST',

                    });

            
        });
    });


function checkotp(val,otp){
if(val == otp){
document.getElementById("signup_btn").click();
document.getElementById("getOTP").style.display = "none";
document.getElementById("postOTP").style.display = "none";
}
}
</script>