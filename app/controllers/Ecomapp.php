<?php

require_once(APPROOT."/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class Ecomapp extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');  
        $this->adminModel = $this->model('Admins');  
     
    }

    public function index()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors1();
        $get_banners = $this->pageModel->get_all_banners();
        $this->pageModel->update_page_count(1);

        $data = [

            'all_vendors' => $get_all_vendors,
            'banners' => $get_banners,
        ];
            $this->view('ecomapp/index',$data);
        
    }


    public function restaurant($vendorid)
    {
        if(isset($_POST['search_menu'])){
          $search = $_POST['search_menu'];
        }else{ $search = NULL; }
        $vendor_detail = $this->pageModel->getVendorById($vendorid); 
        $all_items = $this->pageModel->get_all_vendor_items($vendorid);
        $all_cat = $this->pageModel->get_vendor_category($vendorid); 
        
        $data = [
                    'vendor' => $vendor_detail,
                    'items' => $all_items,
                    'cat' => $all_cat,
                    'search' => $search
                ];

        $this->view('ecomapp/restaurant',$data);
        
    }


    public function rating($orderid,$vendorid)
    {
      $rating =0;
         if($_POST['rating5']=="on"){
             $rating = 5;
         }else if($_POST['rating4']=="on"){
            $rating = 4;
        }else if($_POST['rating3']=="on"){
            $rating = 3;
        }else if($_POST['rating2']=="on"){
            $rating = 2;
        }else if($_POST['rating1']=="on"){
            $rating = 1;
        }
        
        $review = $_POST['review'];
        $this->pageModel->create_rating($orderid,$vendorid,$rating,$review); 
        redirect('ecom/orders'); 
        
    }
    
    public function create_order_backup($type,$transaction_id)
    {
        $address_id = 4;
        $cart = $this->pageModel->getcart_items();
          $items = json_decode($cart->items, true); 
          $total_price = 0;
          foreach($items as $item_id => $item){ 
          $total_price = $total_price + $item['item_total_price'];
          }
          $subtotal = $total_price;
          $total = $total_price;
          $net_total = $total_price;
          
        if($this->pageModel->order_create($type, $_SESSION['rexkod_user_id'], $cart->cart_vendor_id, $address_id, $_SESSION['rexkod_user_name'], $_SESSION['rexkod_user_email'], $_SESSION['rexkod_user_phone'], $cart->items, $subtotal, $total, $net_total, $transaction_id))
        {    
        $this->pageModel->cart_del();

        //create dunzo order
        $new_order = $this->pageModel->getneworder();
        $order_vendor = $this->pageModel->getVendorById($new_order->vendor_id);
        $order_address = $this->pageModel->getAddressById($new_order->address_id);
        $vendor_detail = $this->pageModel->get_userinfo($order_vendor->vendor_id);


        $vendor_latlong= explode(',', $order_vendor->vendor_latlong);
        $vendor_lat = $vendor_latlong[0];
        $vendor_lon = $vendor_latlong[1];


        
        $url = "https://apis-staging.dunzo.in/api/v2/tasks";

        $curl = curl_init();
        $stime = time();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                'client-id: e44802e5-d855-493b-a6fa-e81ae6eadd71',
                'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkIjp7InJvbGUiOjEwMCwidWlkIjoiYTJmNjc4NTYtNTZmZS00MTNiLThjNWQtZTMyMzk3ZmMyYmE5In0sIm1lcmNoYW50X3R5cGUiOm51bGwsImNsaWVudF9pZCI6ImU0NDgwMmU1LWQ4NTUtNDkzYi1hNmZhLWU4MWFlNmVhZGQ3MSIsImF1ZCI6Imh0dHBzOi8vaWRlbnRpdHl0b29sa2l0Lmdvb2dsZWFwaXMuY29tL2dvb2dsZS5pZGVudGl0eS5pZGVudGl0eXRvb2xraXQudjEuSWRlbnRpdHlUb29sa2l0IiwibmFtZSI6IkhFTExPVyBDQVJUIiwidXVpZCI6ImEyZjY3ODU2LTU2ZmUtNDEzYi04YzVkLWUzMjM5N2ZjMmJhOSIsInJvbGUiOjEwMCwiZHVuem9fa2V5IjoiM2I1ODE4YjQtMTMxYi00OGVhLWE1NzUtOGVkNzRmMjBhOGI2IiwiZXhwIjoxODAxMjAxNDk5LCJ2IjowLCJpYXQiOjE2NDU2ODE0OTksInNlY3JldF9rZXkiOiI5ZWM3Nzg4OS01NWQ2LTQwOTgtOWM4Mi1kMjRiNjg0MGQxNmUifQ.UBnxQgP8y_mBcXvqEJe1x8Ft7dDkOLvppZkMussvjfg',
                'Accept-Language: en_US',
                'Content-Type: application/json', 
                
            ),
        ));
        $data = '{
            "request_id": "HC'.$new_order->id.'",
            "reference_id": "HCD'.$new_order->id.'",

            "pickup_details": [{
            "reference_id": "Order Id: '.$new_order->id.'",
            "address": {
            "apartment_address": "'.$order_vendor->vendor_name.'",
            "street_address_1": "'.$order_vendor->vendor_address.'",
            "street_address_2": "",
            "landmark": "",
            "city": "Bengaluru",
            "state": "Karnataka",
            "pincode": "",
            "country": "India",
            "lng": '.$vendor_lon.',
            "lat": '.$vendor_lat.',
            "contact_details": {
            "name": "'.$vendor_detail->name.'",
            "phone_number": "'.$vendor_detail->phone.'",
            }
            },
            "otp_required": false
            }],

            "optimised_route": true,
            "drop_details": [{
            "reference_id": "Order Id: '.$new_order->id.'",
            "address": {
            "apartment_address": "",
            "street_address_1": "'.$order_address->area.'",
            "street_address_2": "'.$order_address->address.'",
            "landmark": "",
            "city": "Bangalore",
            "state": "Karnataka",
            "pincode": "",
            "lat": '.$_SESSION['user_lat'].',
            "lng": '.$_SESSION['user_lon'].',
            "country": "India",
            "contact_details": {
            "name": "'.$_SESSION['rexkod_user_name'].'",
            "phone_number": "'.$_SESSION['rexkod_user_phone'].'"
            }
            },
            "otp_required": false,
            "special_instructions": "Order Id: '.$new_order->id.'",
            }],
            "payment_method": "DUNZO_CREDIT",
            "delivery_type": "",
            "schedule_time": '.$stime.'
            }';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        function url($url)
        {
            $result = parse_url($url);
            return $result['host'];
        }
        $response = curl_exec($curl);
        curl_close($curl);

        $delivery = json_decode($response, TRUE);
        echo $delivery['task_id'];
        echo "<br>";
        print_r($delivery);
        echo "<br>";
        echo $response;

        die();



        // create entity for dunzo 
        //send sms






        $_SESSION['success'] = "Order Created";
        redirect('ecomapp/orders'); 
        } else {
            $_SESSION['success'] = "Order Not Created";
            redirect('ecomapp/payment'); 
        }
        
    }






    public function create_order($type,$transaction_id)
    {
        //$this->view('/ecomapp/create_order');
        $address_id = $_SESSION['order_address'];
        $cart = $this->pageModel->getcart_items();

          $items = json_decode($cart->items, true); 
          $total_price = 0;
          foreach($items as $item_id => $item){ 
          $total_price = $total_price + $item['item_total_price'];
          }
          $subtotal = $_SESSION['sub_total'];
          $total = $total_price;
          $net_total = $_SESSION['net_total'];

        if($this->pageModel->order_create($type, $_SESSION['rexkod_user_id'], $cart->cart_vendor_id, $address_id, $_SESSION['rexkod_user_name'], $_SESSION['rexkod_user_email'], $_SESSION['rexkod_user_phone'], $cart->items, $subtotal, $total, $net_total, $transaction_id))
        {    

        foreach($items as $id => $val){
            $this->pageModel->update_stock_order($id,$val[item_qty]);
        }


        if($this->pageModel->cart_del($_SESSION['rexkod_user_id'])){


        //create dunzo order
        $new_order = $this->pageModel->getneworder();
        $order_vendor = $this->pageModel->getVendorById($new_order->vendor_id);
        $order_address = $this->pageModel->getAddressById($new_order->address_id);
        $vendor_detail = $this->pageModel->get_userinfo($order_vendor->vendor_id);


        $vendor_latlong= explode(',', $order_vendor->vendor_latlong);
        $vendor_lat = $vendor_latlong[0];
        $vendor_lon = $vendor_latlong[1];



        $cust_latlong= explode(',', $order_address->latlong);
        $cust_lat = $cust_latlong[0];
        $cust_lon = $cust_latlong[1];


   
        
        $url = "https://api.dunzo.in/api/v2/tasks";

        $curl = curl_init();
        $stime = time();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                'client-id: e44802e5-d855-493b-a6fa-e81ae6eadd71',
                'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkIjp7InJvbGUiOjEwMCwidWlkIjoiYTJmNjc4NTYtNTZmZS00MTNiLThjNWQtZTMyMzk3ZmMyYmE5In0sIm1lcmNoYW50X3R5cGUiOm51bGwsImNsaWVudF9pZCI6ImU0NDgwMmU1LWQ4NTUtNDkzYi1hNmZhLWU4MWFlNmVhZGQ3MSIsImF1ZCI6Imh0dHBzOi8vaWRlbnRpdHl0b29sa2l0Lmdvb2dsZWFwaXMuY29tL2dvb2dsZS5pZGVudGl0eS5pZGVudGl0eXRvb2xraXQudjEuSWRlbnRpdHlUb29sa2l0IiwibmFtZSI6IkhFTExPVyBDQVJUIiwidXVpZCI6ImEyZjY3ODU2LTU2ZmUtNDEzYi04YzVkLWUzMjM5N2ZjMmJhOSIsInJvbGUiOjEwMCwiZHVuem9fa2V5IjoiM2I1ODE4YjQtMTMxYi00OGVhLWE1NzUtOGVkNzRmMjBhOGI2IiwiZXhwIjoxODAxNzM3ODU1LCJ2IjowLCJpYXQiOjE2NDYyMTc4NTUsInNlY3JldF9rZXkiOiI5ZWM3Nzg4OS01NWQ2LTQwOTgtOWM4Mi1kMjRiNjg0MGQxNmUifQ.7FXJOy7C2ssyuICXxleSb1s19dqz5gqjTzp_mIYIkmI"}',
                'Accept-Language: en_US',
                'Content-Type: application/json', 
                
            ),
        ));

        $data = '{
            "request_id": "HC'.$new_order->id.'",
            "reference_id": "HCD'.$new_order->id.'",
        
            "pickup_details": [{
            "reference_id": "Order from Hellow Cart",
            "address": {
            "apartment_address": "'.$order_vendor->vendor_name.'",
            "street_address_1": "'.$order_vendor->vendor_address.'",
            "street_address_2": "",
            "landmark": "",
            "city": "Bangalore",
            "state": "Karnataka",
            "pincode": "",
            "country": "India",
            "lat": '.$vendor_lat.',
            "lng": '.$vendor_lon.',
            "contact_details": {
            "name": "'.$vendor_detail->name.'",
            "phone_number": "'.$vendor_detail->phone.'"
            }
            },
            "otp_required": false
            }],
        
            "optimised_route": true,
            "drop_details": [{
            "reference_id": "Order from Hellowcart",
            "address": {
            "apartment_address": "'.$order_address->area.'",
            "street_address_1": "'.$order_address->address.'",
            "street_address_2": "",
            "landmark": "",
            "city": "Bangalore",
            "state": "Karnataka",
            "pincode": "",
            "country": "India",
            "lat": '.$cust_lat.',
            "lng": '.$cust_lon.',
            "contact_details": {
            "name": "'.$_SESSION['rexkod_user_name'].'",
            "phone_number": "'.$_SESSION['rexkod_user_phone'].'"
            }
            },
            "otp_required": false,
            "special_instructions": "Order from Hellow Cart"
            }],
            "payment_method": "DUNZO_CREDIT",
            "delivery_type": "",
            "schedule_time": '.$stime.'
            }';
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        
        $response = curl_exec($curl);
        curl_close($curl);

        $delivery = json_decode($response, TRUE);
        

        $this->pageModel->delivery_task($new_order->id, $delivery['task_id']);

        $url2 = "http://pro.icubesms.com/app/smsapi/index.php?key=46145CA66DF68C&campaign=0&routeid=3&type=text&contacts=".$_SESSION['rexkod_user_phone']."&%20senderid=HLOCRT&msg=%22Your%20order%20has%20been%20placed%20successfully.%20Your%20Order%20Id:%20".$new_order->id.".%20Enjoy%20eating!%20Hellow%20Cart.%22&template_id=1207161916062386704";
        $crl = curl_init();
        curl_setopt_array($crl, array(
            CURLOPT_URL => $url2,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "",
        ));
        
        $response2 = curl_exec($crl);
        curl_close($crl);

        redirect('/ecomapp/orders'); 
        
            
        }
        else {
            $_SESSION['success'] = "Order Not Created";
            redirect('/ecomapp/payment'); 
        }
        
        } else {
            $_SESSION['success'] = "Order Not Created";
            redirect('/ecomapp/payment'); 
        }
        
    }





    public function instruction()
    {               
        $_SESSION['instruction'] = $_POST['instruction'];
    }

    public function check_coupon()
    {               
        $coupon_code = $_POST['coupon'];
        $subtotal = $_POST['subtotal'];
        $coupon = $this->pageModel->get_coupon($coupon_code);
        $coupon_usable = 1;
        if($coupon->coupon_usage ==1){
            $coupon_used = $this->pageModel->check_coupon_usage($coupon->coupon_id);
            if($coupon_used){
                $coupon_usable = 0;
            }
        }
        if($subtotal>=$coupon->coupon_min_order && $coupon_usable){
        $discount = 0;
        if($coupon->coupon_type==1){
        $perc = $coupon->coupon_value;
        $discount = ($perc * $subtotal)/100;
        if($discount > $coupon->coupon_cap){$discount = $coupon->coupon_cap;}
        }else{
            $discount = $coupon->coupon_value;
        }
        }
        $discount = round($discount,0);
        $_SESSION['net_total'] = $subtotal-$discount;
        $_SESSION['coupon_id'] = $coupon->coupon_id;
        $_SESSION['coupon_val'] = $discount;

        echo $discount;
    }

    public function payment($type)
    {
        $cartitems = $this->pageModel->getcart_items();
        $vendor_detail = $this->pageModel->getVendorById($cartitems->cart_vendor_id); 
        $address = $this->pageModel->get_address();

        $data = [ 
            'cart'=>$cartitems,
            'vendor'=>$vendor_detail,
            'address'=>$address,
            'type'=>$type
        ];
        $this->view('ecomapp/payment', $data);
    }

    public function profile()
    {   $orders = $this->pageModel->get_orders_all_user();  
        $order_count = count($orders);
        $data = [ 
            'order_count'=>$order_count,
        ];
        $this->view('ecomapp/profile',$data);
    }




    public function location()
    {               
        $this->view('ecomapp/location');
    }


    public function user_location()
    {               
        $_SESSION['user_lat'] = $_POST['lat'];
        $_SESSION['user_lon'] = $_POST['lon'];
        $_SESSION['user_city'] = $_POST['city'];
    }




    public function add_address($type)
    {
        $area = $_POST['area'];
        $address = $_POST['address'];
        $name = $_POST['name'];
        
        
        if($this->pageModel->add_address($area,$address,$name))
        {    
        $_SESSION['success'] = "Address Added";
        redirect('ecomapp/payment/'.$type); 
        } else {
            $_SESSION['success'] = "Address not Added";
            redirect('ecomapp/payment/'.$type); 
        }
        
    }


    public function logout()
    {
        session_destroy();
        redirect('ecomapp/index');
    }
        
    



    public function add_to_cart($vendor_id)
    {   
        $items = $this->pageModel->get_all_vendor_items($vendor_id);
        $foundpro =0;
        foreach ($items as $item) {
            if($_POST['quantity_'.$item->item_id] > 0){
                $foundpro =1;
                if($item->item_discount_price != 0){
                    $iprice = $item->item_discount_price;
                }else {
                    $iprice = $item->item_price;
                }
                $iqty = $_POST['quantity_'.$item->item_id];
                $total_iprice = $iprice * $iqty;

                ${$item->item_id}= [
                    'item_price' => $iprice,
                    'item_qty' => $iqty,
                    'item_total_price' => $total_iprice,
                    'item_status' => 0,
                ];
                $val_data["$item->item_id"] = ${$item->item_id}; 
            }
            
        }
        if($foundpro == 1){
            $items_all= json_encode($val_data);
            $this->pageModel->create_cart($vendor_id,$items_all); 
            redirect('ecomapp/confirm');  
        } else {
            redirect('ecomapp/restaurant/'.$vendor_id);   
        }
        
        
    }



    public function update_cart($vendor_id)
    {   
        $items = $this->pageModel->get_all_vendor_items($vendor_id);
        $foundpro =0;
        $stock_less =0;
        foreach ($items as $item) {
            if($_POST['quantity_'.$item->item_id] > 0){
                $foundpro =1;
                if($_POST['quantity_'.$item->item_id] <= $item->stock){
                    if($item->item_discount_price != 0){
                        $iprice = $item->item_discount_price;
                    }else {
                        $iprice = $item->item_price;
                    }
                    $iqty = $_POST['quantity_'.$item->item_id];
                    $total_iprice = $iprice * $iqty;
    
                    ${$item->item_id}= [
                        'item_price' => $iprice,
                        'item_qty' => $iqty,
                        'item_total_price' => $total_iprice,
                        'item_status' => 0,
                    ];
                    $val_data["$item->item_id"] = ${$item->item_id}; 
                }else {$stock_less=1;}
                
            } 
            
        }
        if($foundpro == 1){
            $items_all= json_encode($val_data);
            $this->pageModel->create_cart($vendor_id,$items_all); 
            if($stock_less == 0){
                redirect('ecomapp/checkout');  
            }else {
                $_SESSION['less_stock']="1 or more items removed from cart due to low stock";
                redirect('ecomapp/confirm');  
            }        
        } else {
            redirect('ecomapp/restaurant/'.$vendor_id);   
        }
        
    }



    public function update_cart_coupon($id)
    {
        $cart_coupon = $this->pageModel->update_cartCoupon($id);

        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']); 

        $data = [ 
            's'=>$s,
            'sum' =>$this->pageModel->get_sum_cart(),
            'userinfo'=>$usr,
        ];
        if($cart_coupon){
            $_SESSION['success'] = "Coupon added successfully";
        }else {
            $_SESSION['success'] = "Coupon not added";
        }
        redirect('ecomapp/checkout', $data);
    }



    public function checkout($type=NULL)
    {
        $cartitems = $this->pageModel->getcart_items();
        $vendor_detail = $this->pageModel->getVendorById($cartitems->cart_vendor_id); 
        $coupons = $this->pageModel->get_all_coupons($cartitems->cart_vendor_id);
        $address = $this->pageModel->get_address();

        $data = [ 
            'cart'=>$cartitems,
            'vendor'=>$vendor_detail,
            'coupons'=>$coupons,
            'address'=>$address,
            'type' =>$type
        ];
         if($cartitems){
            $this->view('ecomapp/checkout', $data);
        } else {
            redirect('ecomappindex');
        }
    }



    public function login($rid)
    {
        $data = [ 

            'rid' =>$rid
        ];
        $this->view('ecomapp/login',$data);
    }






    public function user_login($rid)
    {
       
        if(!isset($_POST['username']))
        {
            
            redirect('ecomapp/login/'.$rid);
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                redirect('ecomapp/login/'.$rid);
            }
            else
            {
                $user = "";

                if ( is_numeric($_POST['username']) ) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                }
                

                if(empty($check_email) && empty($email_verify_phone))
                {
                    $_SESSION['success'] = "Invalid Username";
                    redirect('ecomapp/login/'.$rid);
                }
                else
                {
                    if(!empty($check_email))
                    {
                        $user_results  = $check_email;

                        $password_res = $check_email->password;
                    }
                    elseif(!empty($email_verify_phone))
                    {
                        $user_results  = $email_verify_phone;

                        $password_res = $email_verify_phone->password;
                    }


                    if(password_verify($_POST['password'], $password_res))
                    {
                        $user = $user_results;
                    }
                    else
                    {
                         $user = "";
                    }
                    if(empty($user))
                    {

                       $_SESSION['success'] = "Invalid Credential!";
                       redirect('ecomapp/login/'.$rid);
                       
                    }else
                    {
                        if($user->type=="user")
                        {
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_name'] = $user->name;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;

                            if($rid ==0){
                                redirect('ecomapp/index');
                            }else {
                                redirect('ecomapp/restaurant/'.$rid);
                            }
                        }

                        
                        
                    }
                    
                }
               
            }
        }
    }


    

    public function search()
    {

        $res = $this->pageModel->get_search_results($_POST['search_input']);
        $data = [ 
            'results'=>$res,
            'search_input' =>$_POST['search_input'],
        ];
       

        $this->view('ecomapp/search',$data);
    }

    

    public function orders()
    {
      
        $orders = $this->pageModel->get_orders(); 
        $data = [
                    'orders' => $orders,
                ];

        $this->view('ecomapp/orders',$data);
    }

    public function all_orders()
    {
      
        $orders = $this->pageModel->get_orders_all_user(); 
        $data = [
                    'orders' => $orders,
                ];

        $this->view('ecomapp/all_orders',$data);
    }



    public function register($rid)
    {
        $data = [ 

            'rid' =>$rid
        ];
        $this->view('ecomapp/register',$data);
         
    }

    public function confirm()
    {
        $cartitems = $this->pageModel->getcart_items();
        $vendor_detail = $this->pageModel->getVendorById($cartitems->cart_vendor_id); 
        $data = [ 
            'cart'=>$cartitems,
            'vendor'=>$vendor_detail
        ];
        $this->view('ecomapp/confirm', $data);
    }

    public function user_register($rid=NULL)
    {
        if(!$rid){
            $rid=0;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phno = $_POST['phone'];
            $pass = $_POST['password'];


            if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                redirect('ecomapp/ecomapp/'.$rid);
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              redirect('ecomapp/ecomapp/'.$rid);
            } 
            else 
            {


                if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('ecomapp/ecomapp/'.$rid);
                } 
                else 
                {

                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                    if ($this->pageModel->add_user($name, $email, $phno, $pass)) 
                    {
                        
                            $user = $this->pageModel->ulogin($email, $_POST['password']);
                        
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_name'] = $user->name;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;

                        $_SESSION['success'] = "Registered Successfully..! ";

                        
                        if($rid ==0){
                            redirect('ecomapp/index');
                        }else {
                            redirect('ecomapp/restaurant/'.$rid);
                        }
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('ecomapp/ecomapp/'.$rid);
                    }
                }
            }
        } 
        else 
        {
          redirect('ecomapp/ecomapp/'.$rid);
        }
    }




    public function pay_dine($total,$table)
	{
          $api = new Api(RPKID, RPKS);
          $_SESSION['table_id'] = $table;
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
	    $_SESSION['payable_amount'] = $total;

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' =>  1
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);

		$this->view('ecomapp/rezorpay_dine',$data);
	}




    public function pay()
	{
          $_SESSION['order_address'] = $_POST['address'];
          $api = new Api(RPKID, RPKS);
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
	    $_SESSION['payable_amount'] = $_SESSION['net_total'];

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' =>  1
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);

		$this->view('ecomapp/rezorpay',$data);
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RPKID, RPKS);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
            $order_type= $_SESSION['order_type'];
            unset($_SESSION['order_type']);
			redirect('ecomapp/create_order/'.$order_type.'/'.$_SESSION['razorpay_order_id']);
		}
		else {
			redirect('ecomapp/error');
		}
	}



    public function verify_dine()
	{
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RPKID, RPKS);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
			redirect('dine/payment_update/'.$_SESSION['razorpay_order_id']);
		}
		else {
			redirect('ecomapp/error');
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId)
	{
        $user =$this->pageModel->get_userinfo($_SESSION['rexkod_user_id']);
		$data = array(
			"key" => RPKID,
			"amount" => $amount,
			"name" => "Hellow Cart",
			"description" => "Hellow Cart India Pvt. Ltd.",
			"image" => URLROOT."/assets/images/logo.png",
			"prefill" => array(
				"name"  => $_SESSION['rexkod_user_name'],
				"email"  => $_SESSION['rexkod_user_email'],
				"contact" => $_SESSION['rexkod_user_phone'],
			),
			"notes"  => array(
				"address"  => "Bangalore",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#ff6a00"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	public function paymentFailed()
	{
		$this->view('ecomapp/error');
	}



}




                            
                            
