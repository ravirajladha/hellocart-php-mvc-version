<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #3498DB;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>

<body>
<div class="card" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, #ffaa00 0%, #ff6a00 100%) repeat scroll 0 0;">
<center><img src="<?php echo'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.URLROOT.'/dine/order/'.$data['table']->table_id; ?>" width="100" class="mr-4" style="margin-top:50px;" /></center>
  <br>
  <h3><b><?php echo $data['vendor']->vendor_name; ?></b></h3>
  <p class="title" style="color:#fff">Scan QR code for menu</p>
  <p>Table No. <?php echo $data['table']->table_name; ?></p>
  
  <div style="background:#fff;color:#fff" class="button">  <center><img src="<?php echo URLROOT; ?>/assets4/img/logo/logo.png" width="200" class="mr-4" /></center></div>
  <div>
  <p><span style="background:#555;color:#fff;font-size:15px" class="button">Download Hellow Cart App</span></p>

  </div>
</div>


</body>
</html>
