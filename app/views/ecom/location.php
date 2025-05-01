<html>
  <center> <img src="<?php echo URLROOT; ?>/assets/images/hellow2.gif" width="250" alt="" style="margin-top:10%"></center>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function () {      
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
});

function showPosition(position) {
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;
  var city;

  var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&key=AIzaSyDQ69wZR1GPEeLAxyu-vkSSo_dzpZTOV2c";

  $.getJSON(geocodingAPI, function (json) {
      if (json.status == "OK") {
          //Check result 0

          var result = json.results[0];
           store_info(result.address_components[2].long_name);
               
      }    
  });

  function store_info(city) {
   $.ajax({
   url  : '<?php echo URLROOT; ?>/ecom/user_location',
   type : 'POST',
   data : {lat,lon,city},

   success : function(res)
   {
      window.location.href = "<?php echo URLROOT; ?>/ecom";
      location.assign("<?php echo URLROOT; ?>/ecom")
   }

   });
                       
                    
}}
</script>




