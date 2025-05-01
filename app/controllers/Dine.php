<?php
class Dine extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');  
        $this->adminModel = $this->model('Admins'); 
     
    }

    public function index()
    {
            $this->view('dine/index');
        
    }


    public function payment_update($id)
    {
        $active_orders = $this->pageModel->get_dine_active_orders_pay($_SESSION['table_id']); 
        foreach($active_orders as $order){
            $this->pageModel->order_paid_dine($order->id,$id); 
        }
        redirect('dine/order/'.$_SESSION['table_id']);
    }



    public function order($id,$cat=NULL)
    {             
        $table_detail = $this->pageModel->get_table_detail($id); 
        $vendor_id = $table_detail->vendor_id;
        $vendor_detail = $this->pageModel->getVendorById($vendor_id); 
        $all_items = $this->pageModel->get_all_vendor_items_dine($vendor_id);
        $all_cat = $this->pageModel->get_vendor_category($vendor_id); 
        $all_cart = $this->pageModel->getcart_items_dine($id); 
        $dine_orders = $this->pageModel->get_dine_order($id); 
        $active_orders = $this->pageModel->get_dine_active_orders($id); 
        $cur_orders = $this->pageModel->get_dine_cur_orders($id); 
        $data = [
                    'vendor' => $vendor_detail,
                    'table' => $table_detail,
                    'items' => $all_items,
                    'cat' => $all_cat,
                    'curcat' => $cat,
                    'cart' => $all_cart,
                    'orders' => $dine_orders,
                ];
                
                if(!$active_orders && !$cur_orders){
                 $this->view('dine/order',$data);
                }else{
                redirect('dine/active_order/'.$id);
                }
        
    }



    public function active_order($id)
    {             
        $table_detail = $this->pageModel->get_table_detail($id); 
        $vendor_id = $table_detail->vendor_id;
        $vendor_detail = $this->pageModel->getVendorById($vendor_id); 
        $data = [
                    'vendor' => $vendor_detail,
                    'table' => $table_detail
                ];
        
        $this->view('dine/active_order',$data);
        
    }




    public function create_dine_order($id)
    {
        $cart_name = $_POST['cart_name'];
        $cart_phone = $_POST['cart_phone'];
        
        if(isset($_POST['cart_online'])){
            $payment_mode = "1";

        } else {
            $payment_mode = "2"; 
        }
        $table_detail = $this->pageModel->get_table_detail($id); 
        $vendorid = $table_detail->vendor_id;
        $all_cart = $this->pageModel->getcart_items_dine($id); 

        foreach($all_cart as $cart){
        $this->pageModel->dine_cart_item($cart->item_id,$id,$_POST[$cart->item_id],$cart->item_name,$cart->item_price);
        }

        $all_cart_new = $this->pageModel->getcart_items_dine($id); 

        $count =0;
        $total_price = 0;
        foreach($all_cart_new as $cart){
        if($count==0){
            $count =1;
            $items = $cart->item_id;
        }else{
            $items = $items.",".$cart->item_id;
        }

        $total_price = $total_price + $cart->item_total_price;
        
        ${$cart->item_id}= [
             'item_price' => $cart->item_price,
             'item_qty' => $cart->item_qty,
             'item_total_price' => $cart->item_total_price,
             'item_status' => 0,
         ];
         $val_data["$cart->item_id"] = ${$cart->item_id};
         
        }

        $order_val= json_encode($val_data);


        if($this->pageModel->dine_order_create($vendorid,$id,$items,$order_val,$total_price,$cart_name,$cart_phone,$payment_mode))
        {    
        $this->pageModel->dine_cart_del($id);
        $_SESSION['success'] = "Order Created";
        redirect('dine/order/'.$id); 
        } else {
            $_SESSION['success'] = "Order Not Created";
            redirect('dine/order/'.$id); 
        }
        
    }




    public function create_dineorder($id)
    {
        $table = $this->pageModel->get_table_detail($id); 
        $vendorid = $table_detail->vendor_id;
        $all_cart = $this->pageModel->getcart_items_dine($id); 
        $less_stock = 0;
        foreach($all_cart as $cart){
        $this_item = $this->pageModel->getItemById($cart->item_id); 
      
        if($_POST[$cart->item_id] <= $this_item->stock){
        $this->pageModel->dine_cart_item($cart->item_id,$id,$_POST[$cart->item_id],$cart->item_name,$cart->item_price);
        } else {
            $this->pageModel->dine_cart_item_del($cart->item_id);
            $less_stock = 1;
        }
        }

        if(!$less_stock){
        $all_cart_new = $this->pageModel->getcart_items_dine($id); 

        $count =0;
        $total_price = 0;
        foreach($all_cart_new as $cart){
       
        $total_price = $total_price + $cart->item_total_price;
        
        ${$cart->item_id}= [
             'item_price' => $cart->item_price,
             'item_qty' => $cart->item_qty,
             'item_total_price' => $cart->item_total_price,
             'item_status' => 0,
         ];
         $val_data["$cart->item_id"] = ${$cart->item_id};
         
        }

        $order_val= json_encode($val_data);
     
        $subtotal = $total_price;
        $total = $total_price;
        $net_total = $total_price;

        if($this->pageModel->order_create_dine($_SESSION['rexkod_user_id'], $table->vendor_id, $id,$_SESSION['rexkod_user_name'], $_SESSION['rexkod_user_email'], $_SESSION['rexkod_user_phone'], $order_val, $subtotal, $total, $net_total ))
        {   

        foreach($val_data as $cur_id => $val){
            $this->pageModel->update_stock_order($cur_id,$val[item_qty]);
        }

        $this->pageModel->dine_cart_del($id);
        $_SESSION['success'] = "Order Created";
        redirect('dine/order/'.$id); 
        } else {
            $_SESSION['success'] = "Order Not Created";
            redirect('dine/order/'.$id); 
        }
    } else {
        $_SESSION['success'] = "1 or more items removed from cart for low stocks.";
        redirect('dine/order/'.$id); 
    }
        
}




    public function logout($tid)
    {
       session_destroy();
       redirect('dine/order/'.$tid);
    }


    



    public function dine_cart_add($id,$table,$cat=NULL)
    {
        $item = $this->pageModel->getItemById($id);
        $qty = 1;
        if($item->item_discount_price_dine != 0){
            $item_price = $item->item_discount_price_dine;
        }else {
            $item_price = $item->item_price_dine;
        }

        $update_cart = $this->pageModel->dine_cart_item($id,$table,$qty,$item->item_name,$item_price);

        if($update_cart){
            $_SESSION['success'] = "Item added to Cart";
        }else{
            $_SESSION['success'] = "Not Added";
        }
        redirect('dine/order/'.$table.'/'.$cat);
    }



    public function dine_cart_delete($cart_val)
    {
        $cart_item = explode(',', $cart_val);
        $id = $cart_item[0];
        $table = $cart_item[1];

        $this->pageModel->dine_cart_item_del($id);
        redirect('dine/order/'.$table);
    }









    public function address()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [ 

            'get_user_details' =>$get_user_details,
        ];

        $this->view('dine/address',$data);

    }


    public function pay_cash($id)
    {
        $orders = $this->pageModel->get_dine_orders_cash($id);
 
        foreach($orders as $order){
            $this->pageModel->pay_cash($order->id);
        }
        redirect('dine/order/'.$id); 
    }
    

    public function pay_for_payment()
    {
        if(isset($_SESSION['rexkod_user_id']))
        {

                $data_checkout = (object) unserialize($_SESSION['data_checkout']);
                //unset($_SESSION['data_checkout']);

                $i_total = $this->pageModel->get_sum_cart_for_payment();

                $i_total = round($i_total);
                $_SESSION['order_id'] = "ORDS" . rand(10000,99999999);   

                $tx = $this->pageModel->get_userinfo($_SESSION['rexkod_user_id']);
                $txuser = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']);

                $data = [

                    'name' => $txuser->user_name,
                    'email' => $tx->email,
                    'phone' => $tx->phone,
                    'tprice' => $i_total,
                    'ORDERID' => $_SESSION['order_id'],
                    'add' => $txuser->user_address,
                    'zipcode' => $txuser->user_pincode,
                    'city' => $txuser->user_city,
                    'state' => $txuser->user_state,
                    'country' => $txuser->user_country,
                    
                ];

                $res = $this->pageModel->add_cart_for_paymentPayAtdel($data['name'], $data['email'], $data['phone'], $data['add'], $data['city'], $data['state'], $data['zipcode'], $data['country'], $data, $data_checkout);  

                if($res){
                $_SESSION['success'] = "order placed successfully";
                redirect('dine/sucess');  
                } 


             
           
        }else
        {
            $_SESSION['success'] = "login and continue";
            redirect('dine/login');
        }
    } 





    public function user_login($tid)
    {
       
        if(!isset($_POST['username']))
        {
            
            redirect('dine/login/'.$tid);
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                redirect('dine/login/'.$tid);
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
                    redirect('dine/login/'.$tid);
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
                       redirect('dine/login/'.$tid);
                       
                    }else
                    {
                        if($user->type=="user")
                        {
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_name'] = $user->name;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('dine/order/'.$tid);
                        }
                        else {
                            redirect('dine/index');
                        }

                        
                        
                    }
                    
                }
               
            }
        }
    }


    public function login($tid)
    {
        $data = [
            'table_id' => $tid
        ];
            $this->view('dine/login', $data);
        
    }


    public function register($tid)
    {
        $data = [
            'table_id' => $tid
        ];
            $this->view('dine/register', $data);
        
    }

    public function user_register($tid)
    {

       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phno = $_POST['phone'];
            $pass = $_POST['password'];

     
 
            if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                redirect('dine/register/'.$tid);
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              redirect('dine/register/'.$tid);
            } 
            else 
            {


                if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('dine/register/'.$tid);
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
                        redirect('dine/order/'.$tid);
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('dine/register/'.$tid);
                    }
                }
            }
        } 
        else 
        {
          redirect('dine/register/'.$tid);
        }
    }




}




                            
                            
