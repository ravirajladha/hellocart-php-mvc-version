<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');  
        $this->adminModel = $this->model('Admins');  
     
    }

    public function index()
    {

        if(isset($_SESSION['rexkod_vendor_id']))
        {  

        $tables = count($this->pageModel->get_tables_vendor($_SESSION['rexkod_vendor_id'])); 
        $vendor = $this->pageModel->getVendorById($_SESSION['rexkod_vendor_id']); 

        if(!$vendor->vendor_verified){
            redirect('pages/not_verified');
        }

        $items = count($this->pageModel->get_all_vendor_items($_SESSION['rexkod_vendor_id']));
        $orders = count($this->pageModel->get_vendor_orders_all()); 

        $sales = (array) $this->pageModel->sum_vendor_orders_all(); 
        $revenue = $sales['total'];

        $sales = (array) $this->pageModel->count_vendor_orders_delivery(); 
        $count_delivery = $sales['total'];

        $sales = (array) $this->pageModel->count_vendor_orders_dine(); 
        $count_dine = $sales['total'];

        $sales = (array) $this->pageModel->count_vendor_orders_pickup(); 
        $count_pickup = $sales['total'];

        $staffs = (array)$this->pageModel->count_vendor_staffs();
        $staffs = $staffs['total'];

        $customers = (array)$this->pageModel->count_vendor_customers();
        $customers = $customers['total'];

        $data = [
                    'tables' => $tables,
                    'items' => $items,
                    'orders' => $orders,
                    'revenue' => $revenue,
                    'count_delivery' => $count_delivery,
                    'count_dine' => $count_dine,
                    'count_pickup' => $count_pickup,
                    'staffs' => $staffs,
                    'customers' => $customers

                    
                ];
        
        $this->view('pages/index',$data);          
        
        }
        else
        {
            redirect('pages/landing');
        }   

        
    }


    public function print_qr($id)
    {               
        $table_detail = $this->pageModel->get_table_detail($id); 
        $vendor_id = $table_detail->vendor_id;
        $vendor_detail = $this->pageModel->getVendorById($vendor_id); 
        $data = [
                    'vendor' => $vendor_detail,
                    'table' => $table_detail
                ];
                
        $this->view('pages/print_qr',$data);
    }



    public function coupons()
    {

        $get_all_coupons = $this->adminModel->get_vendor_coupons();

        $data = [
                    'all_coupons' => $get_all_coupons,
        ];

        $this->view('pages/coupons',$data);

    }

    public function landing()
    {
        $this->view('pages/landing');

    }




    public function payments()
    {         
        
        $all_tables = $this->pageModel->get_tables_vendor($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'tables' => $all_tables,
                ];
  
        $this->view('pages/payments', $data);
    }


    public function completed_orders()
    {         
        $orders = $this->pageModel->get_vendor_all_orders_today(); 
        
        $data = [
                    'orders' => $orders,
                ];      
        $this->view('pages/completed_orders', $data);
    }


    public function cancelled_orders()
    {         
       
        $orders = $this->pageModel->get_vendor_all_orders_today(); 
        
        $data = [
                    
                    'orders' => $orders,
                ];      
        $this->view('pages/cancelled_orders', $data);
    }


    public function users()
	{
        $name = $_POST['user_name'];
        if(isset($name)){
            $get_customers = $this->adminModel->get_all_customers_vendor_name($name);
        }else {
            $get_customers = $this->adminModel->get_all_customers_vendor();
        }
        
        
        $data = [
            'customers' =>$get_customers
        ];

	   $this->view('pages/users',$data);
        
	}


    public function reports() 
	{
	   $this->view('pages/reports');
        
	}


    public function not_verified() 
	{
	   $this->view('pages/not_verified');
        
	}






    
    
    public function add_staff()
    {
        $type = $_POST['type'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

       if ($this->pageModel->findUserByemail($email)) 
        {
          $_SESSION['test_msg'] = 'Email already taken';
          redirect('pages/staff');
        } 
        else if ($this->pageModel->findUserByphno($phone)) 
        {
          $_SESSION['test_msg'] = 'Phone number already taken';
          redirect('pages/staff');
        } 
        else {
            $result = $this->pageModel->add_vendor_staff($name, $email, $phone, $type);


            if($result)
            {
                $_SESSION['test_msg'] = "Staff added successfully";
                redirect('pages/staff');
            }else
            {
                    $_SESSION['test_msg'] = "Staff not added";
                redirect('pages/staff');
            }
        }    
            
        
    }


    public function update_staff($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $staff = $this->pageModel->get_userinfo($id); 

       if ($this->pageModel->findUserByemail($email) && $staff->email != $email) 
        {
          $_SESSION['test_msg'] = 'Email already taken';
          redirect('pages/edit_staff/'.$id);
        } 
        else if ($this->pageModel->findUserByphno($phone) && $staff->phone != $phone)  
        {
          $_SESSION['test_msg'] = 'Phone number already taken';
          redirect('pages/edit_staff/'.$id);
        } 
        else {
            $result = $this->pageModel->update_vendor_staff($name, $email, $phone, $id);


            if($result)
            {
                $_SESSION['test_msg'] = "Staff updated successfully";
                redirect('pages/edit_staff/'.$id);
            }else
            {
                    $_SESSION['test_msg'] = "Staff not updated";
                redirect('pages/edit_staff/'.$id);
            }
        }    
            
        
    }



    public function update_item_discount($id)
    {
        $discount_cost = $_POST['discount_cost'];
        $this->pageModel->update_item_discount($id,$discount_cost);
        redirect('pages/menu'); 
    }

    public function update_item_stock($id)
    {
        $stock = $_POST['stock'];
        $this->pageModel->update_item_stock($id,$stock);
        redirect('pages/menu'); 
    }

    public function update_item_discount_dine($id)
    {
        $discount_cost = $_POST['discount_cost'];
        $this->pageModel->update_item_discount_dine($id,$discount_cost);
        redirect('pages/menu'); 
    }

    public function update_item_status($id,$status)
    {
        $this->pageModel->update_item_status($id,$status);
        redirect('pages/menu'); 
    }


    public function order_picked($id)
    {
        $order = $this->pageModel->getOrderById($id); 
        
        $this->pageModel->order_picked($id);

        $url = "http://pro.icubesms.com/app/smsapi/index.php?key=46145CA66DF68C&campaign=0&routeid=3&type=text&contacts=".$order->phone."%20senderid=HLOCRT&msg=Thank%20you%20for%20picking%20Your%20Order%20id%20".$order->id.".%20We%20hope%20you%20will%20enjoy%20the%20food.%20For%20any%20help%20call%209886002046%20or%20mail%20us%20on%20support@hellowcart.com.%20Regards%20Hellow%20Cart&template_id=1207164636140836965";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        ));

        function url($url)
        {
            $result = parse_url($url);
        }
        curl_exec($curl);
        curl_close($curl);

        
        redirect('pages/completed_orders'); 
    }

    public function update_category_status($id,$status)
    {
        $this->pageModel->update_category_status($id,$status);
        redirect('pages/category'); 
    }


    public function update_vendor_status($id,$status)
    {
        $this->pageModel->update_vendor_status($id,$status);
        redirect('pages/settings'); 
    }



    public function add_table()
    {
        $table_name = $_POST['table_name'];
        
    if($this->pageModel->add_table($table_name))
    {    
    $_SESSION['test_msg'] = "Table Added";
    redirect('pages/tables'); 
    } else {
        $_SESSION['test_msg'] = "Table not Added";
        redirect('pages/tables'); 
    }
        
    }


    
        public function report_sales()
	{
        $sdate  = $_POST['start_date'];
        $edate  = $_POST['end_date'];
        $type = $_POST['order_type'];
      
        if($type=="all"){
            $orders = $this->pageModel->get_vendor_report_sale_all($sdate,$edate); 
        }else if($type=="online"){
            $orders = $this->pageModel->get_vendor_report_sale_online($sdate,$edate); 
        }else if($type=="dine"){
            $orders = $this->pageModel->get_vendor_report_sale_dine($sdate,$edate); 
        }else if($type=="self"){
            $orders = $this->pageModel->get_vendor_report_sale_self($sdate,$edate); 
        }
       
        $data = [
                    'orders' => $orders,
                    'sdate' => $sdate,
                    'edate' => $edate,
                ];   

	   $this->view('pages/report_sales',$data);
        
	}


    
    public function reviews()
    {               
        $ratings = $this->pageModel->get_ratings_vendor($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'ratings' => $ratings,
                ];
                
        $this->view('pages/reviews', $data);
    }

    public function settings()
    {               
        $vendor_detail = $this->pageModel->getVendorById($_SESSION['rexkod_vendor_id']); 
        $user_detail = $this->pageModel->get_userinfo($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'vendor' => $vendor_detail,
                    'user' => $user_detail,
                ];

        $this->view('pages/settings', $data);
    }
    

    public function support()
    {               
        $this->view('pages/support');
    }

    public function menu()
    {
        $food_name = $_POST['food_name'];
        if(isset($food_name)){
            $all_items = $this->pageModel->get_all_vendor_items_food($_SESSION['rexkod_vendor_id'],$food_name); 
        }else {
            $all_items = $this->pageModel->get_all_vendor_items($_SESSION['rexkod_vendor_id']); 
        }
        
        $data = [
                    'all_items' => $all_items,
                ];

        $this->view('pages/menu',$data);
    }


    public function stock_refresh()
    {
        $all_items = $this->pageModel->get_all_vendor_items($_SESSION['rexkod_vendor_id']); 
        foreach($all_items as $item){
            $this->pageModel->update_item_stock($item->item_id,99);
        }
        redirect('pages/menu');
    }


    public function tables()
    {
        $all_tables = $this->pageModel->get_tables_vendor($_SESSION['rexkod_vendor_id']); 
        
        $data = [
                    'all_tables' => $all_tables,
                ];

        $this->view('pages/tables',$data);
    }


    public function staff()
    {
        $all_staff = $this->pageModel->get_staff_vendor(); 
        
        $data = [
                    'all_staff' => $all_staff,
                ];

        $this->view('pages/staff',$data);
    }



    public function edit_staff($id)
    {
        $staff = $this->pageModel->get_userinfo($id); 
        
        $data = [
                    'staff' => $staff,
                ];

        $this->view('pages/edit_staff',$data);
    }


    public function edit_category($id)
    {
        $category = $this->pageModel->getCategoryById($id); 
        
        $data = [
                    'category' => $category,
                ];

        $this->view('pages/edit_category',$data);
    }

    public function edit_food($id)
    {
        $item = $this->pageModel->getItemById($id); 
        $get_all_category = $this->adminModel->get_all_category();
        $data = [
                    'item' => $item,
                    'all_category' => $get_all_category,
                ];

        $this->view('pages/edit_food',$data);
    }

        

    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];

        $this->view('pages/category',$data);

    }


    public function add_food()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];
        

        $this->view('pages/add_food', $data);
    }


    public function create_food()
    {
        
        $name = $_POST['item_name'];
        $type = $_POST['item_type'];
        $cat = $_POST['item_cat'];
        $desc = $_POST['item_description'];
        $price = $_POST['item_price'];
        $discount_price = 0;
        $price_dine = $_POST['item_price_dine'];
        $discount_price_dine = 0;

        $result = $this->adminModel->create_item_db($name, $type, $cat, $desc, $price, $discount_price, $price_dine, $discount_price_dine);


        if($result)
        {
            $_SESSION['test_msg'] = "Food added successfully..!";
            redirect('pages/menu');
        }else
        {
             $_SESSION['test_msg'] = "Food not added";
            redirect('pages/meny');
        }
    }



    public function update_food($id)
    {
        
        $item = $this->pageModel->getItemById($id); 
        
        if(!empty($_FILES['item_image']['name']))
        {
            $f_name = $_FILES['item_image']['name'];
            $f_temp = $_FILES['item_image']['tmp_name'];
            $size = $_FILES['item_image']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp1=$f_newfile;
        }
        else
        {
            $temp1=$item->item_img;
        }

        $name = $_POST['item_name'];
        $type = $_POST['item_type'];
        $cat = $_POST['item_cat'];
        $desc = $_POST['item_description'];
        $price = $_POST['item_price'];
        $price_dine = $_POST['item_price_dine'];

        $result = $this->pageModel->update_item($name, $type, $cat, $desc, $price, $price_dine, $temp1, $id);


        if($result)
        {
            $_SESSION['test_msg'] = "Food updated successfully..!";
            redirect('pages/edit_food/'.$id);
        }else
        {
             $_SESSION['test_msg'] = "Food not updated";
            redirect('pages/edit_food/'.$id);
        }
    }


    

    public function add_category()
    {
        $this->view('pages/add_category');
    }


    public function create_category()
    {

        if(!empty($_FILES['category_image']['name']))
        {
            $f_name = $_FILES['category_image']['name'];
            $f_temp = $_FILES['category_image']['tmp_name'];
            $size = $_FILES['category_image']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $category_img=$f_newfile;
        }
        else
        {
            $category_img = cat_img.png;
        }


        $category_name = $_POST['category_name'];
        $category_start_time = $_POST['category_start_time'];
        $category_end_time = $_POST['category_end_time'];

        $this->adminModel->create_category($category_name,$category_img,$category_start_time,$category_end_time);

        $_SESSION['test_msg'] = "Category created Successfully";
        redirect('pages/category'); 
    }



    public function update_category($id)
    {
        $category = $this->pageModel->getCategoryById($id); 

        if(!empty($_FILES['category_image']['name']))
        {
            $f_name = $_FILES['category_image']['name'];
            $f_temp = $_FILES['category_image']['tmp_name'];
            $size = $_FILES['category_image']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $category_img=$f_newfile;
        }
        else
        {
            $category_img = $category->category_img;
        }


        $category_name = $_POST['category_name'];
        $category_start_time = $_POST['category_start_time'];
        $category_end_time = $_POST['category_end_time'];

        $this->pageModel->update_category($category_name,$category_img,$category_start_time,$category_end_time,$id);

        $_SESSION['test_msg'] = "Category updated Successfully";
        redirect('pages/edit_category/'.$id); 
    }



    public function download_qr($url)
    {
        $this->view('pages/download_qr', $url);
    }



    public function login()
    {
        $this->view('pages/login');
    }



    public function logout()
    {
       session_destroy();
       redirect('pages/login');
    }


    public function user_login()
    {
       
        if(!isset($_POST['username']))
        {
            
            $this->view('pages/login');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['test_msg'] = "Enter Password";
                $this->view('pages/login');
            }
            else
            {
                $user = "";

                if ( is_numeric($_POST['username'])) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                }
                

                if(empty($check_email) && empty($email_verify_phone))
                {
                    $_SESSION['test_msg'] = "Invalid Username";
                    $this->view('pages/login');
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

                       $_SESSION['test_msg'] = "Invalid Credential!";
                       $this->view('pages/login');
                       
                    }else
                    {
                        if($user->type=="vendor")
                        {
                            if($user->sub_type){
                                $_SESSION['rexkod_vendor_id'] = $user->vendor_id;
                                $_SESSION['rexkod_staff_id'] = $user->id;
                                $_SESSION['rexkod_staff_type'] = $user->sub_type;
                            } else {
                                $_SESSION['rexkod_vendor_id'] = $user->id;
                                $_SESSION['rexkod_staff_type'] = "admin";
                            }
                            $_SESSION['rexkod_vendor_name'] = $user->name;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            $vendor = $this->pageModel->getVendorById($_SESSION['rexkod_vendor_id']); 
                            $_SESSION['rexkod_vendor_img'] = $vendor->vendor_img;
                            redirect('pages/index');
                        }

                        else
                        {
                            $_SESSION['test_msg'] = "You do not have access!";
                            redirect('pages/login');
                            
                        }
                        
                    }
                    
                }
               
            }
        }
    }


    public function orders()
    {
        $orders = $this->pageModel->get_vendor_orders(); 
        
        $data = [
                    'orders' => $orders,
                ];
        $this->view('pages/orders',$data);
    }

    public function live()
    {
        $orders = $this->pageModel->get_vendor_orders_accept(); 
        
        $data = [
                    'orders' => $orders,
                ];
        $this->view('pages/live',$data);
    }


    public function accept_order($id)
    {
        $this->pageModel->accept_order($id);
        $_SESSION['test_msg'] = "Order Accepted";
        redirect('pages/orders');
    }


    public function complete_order($id)
    {
        $this->pageModel->complete_order($id);
        $_SESSION['test_msg'] = "Order Completed";
        redirect('pages/live');
    }

    public function order_paid($id)
    {
        $orders = $this->pageModel->get_dine_orders_pay($id);
 
        foreach($orders as $order){
            $this->pageModel->order_paid($order->id);
        }
        $_SESSION['test_msg'] = "Order Paid";
        redirect('pages/payments');
    }

    public function reject_order($id)
    {
        $this->pageModel->reject_order($id);
        $_SESSION['test_msg'] = "Order Rejected";
        redirect('pages/orders');
    }



    public function settlements()
	{
        $id = $_SESSION['rexkod_vendor_id'];
        $dine_orders = $this->pageModel->get_vendor_orders_settlements_dine($id); 
        $delivery_orders = $this->pageModel->get_vendor_orders_settlements_delivery($id); 
        $pickup_orders = $this->pageModel->get_vendor_orders_settlements_pickup($id); 
        $settlements = $this->pageModel->get_vendor_settlements($id);   
        $data = [
                    'dine_orders' => $dine_orders,
                    'delivery_orders' => $delivery_orders,
                    'pickup_orders' => $pickup_orders,
                    'settlements' => $settlements,
                ];   
                
	    $this->view('pages/settlements',$data);
	}


    public function item_update($order,$item,$status)
    {
        $curorder = $this->pageModel->getOrderById($order); 

            $val = json_decode($curorder->items, TRUE);
            $val[$item]['item_status'] = $status;
            $order_val= json_encode($val);

            $this->pageModel->item_update($order,$order_val);
            $_SESSION['test_msg'] = "Order Updated";
            redirect('pages/live');
    }
}




                            
                            
