<?php 
require APPROOT . "/views/inc_ecom/header.php"; 
?>
    <body class="fixed-bottom-bar">
      <div class="kods-home-page">
         <div class="bg-primary p-3">
         <?php 
         require APPROOT . "/views/inc_ecom/nav-header.php"; 
         $otp_new = str_pad(rand(0,9999), 4, "0", STR_PAD_LEFT);
         $_SESSION['cur_otp'] = $otp_new;
         ?>

 
         <div class="p-4 mt-5 col-md-offest-3" style="text-align:center; display: block; margin-left: auto;margin-right: auto; width: 40%;">
            <h2 class="text-wite my-0 mt-5">Create New password</h2>
            <p class="text-whie text-50">Verify your phone</p>
            <form action="<?php echo URLROOT; ?>/ecom/update_password" method="post" autocomplete="off">
             
             
               <div class="form-group" id="cur_phone">
                 
                  <input type="number" placeholder="Enter Phone Number" class="form-control" id="phone_new" name="phone" required>
               </div>
               
               <div class="form-group" id="new_password" style="display:none">
                
                  <input type="password" placeholder="Enter New Password" class="form-control" name="password" required>
               </div>


               <button id="signup_btn" style="display:none;" class="btn btn-primary btn-block" type="submit">Create</button>
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
                     <input type="number" placeholder="Enter OTP sent to your phone" id="postOTP" class="form-control" onkeyup="checkotp(this.value)">
                     </div> 
                  </div>
               </div>
         
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
                        url  : "<?php echo URLROOT; ?>/ecom/send_otp_forgot/"+phone+"/<?php echo $otp_new; ?>",
                        type : 'POST',

                    });

            
        });
    });


function checkotp(val,otp = <?php echo $_SESSION['cur_otp']; ?>){
if(val == otp){
document.getElementById("signup_btn").style.display = "block";
document.getElementById("new_password").style.display = "block";
document.getElementById("getOTP").style.display = "none";
document.getElementById("cur_phone").style.display = "none";
document.getElementById("postOTP").style.display = "none";
}
}
</script>