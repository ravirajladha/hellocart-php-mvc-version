<?php
class Admin extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
        $this->adminModel = $this->model('Admins');
	}

	public function index()
    {

        if(isset($_SESSION['rexkod_admin_id']))
        {  
         $orders = (array)$this->adminModel->count_orders_all(); 
         $orders = $orders['total'];
         $revenue = (array)$this->adminModel->sum_orders_all(); 
         $revenue =$revenue['total'];
         $vendors = (array)$this->adminModel->count_vendors_all();
         $vendors = $vendors['total'];
         $users = (array)$this->adminModel->count_users_all();
         $users = $users['total'];
         $live = (array)$this->adminModel->count_live_all();
         $live = $live['total'];
         $delivery = (array)$this->adminModel->count_delivery_all();
         $delivery = $delivery['total'];
         $dine = (array)$this->adminModel->count_dine_all();
         $dine = $dine['total'];
         $pickup = 0;
         $ecom_count = $this->adminModel->get_page_count(1);
         $home_count = $this->adminModel->get_page_count(2);

         $data = [
                    'orders' => $orders,
                    'revenue' => $revenue,
                    'vendors' => $vendors,
                    'users' => $users,
                    'live' => $live,
                    'delivery' => $delivery,
                    'pickup' => $pickup,
                    'dine' => $dine,
                    'ecom_count' => $ecom_count,
                    'home_count' => $home_count
                ];
        
        $this->view('admin/index',$data);          
        
        }
        else
        {
            redirect('admin/login');
        }   
    }



    public function login()
    {
        $this->view('admin/login');
    }




    public function user_login()
    {
       
        if(!isset($_POST['username']))
        {
            
            redirect('admin/index');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['test_msg'] = "Enter Password";
                redirect('admin/index');
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
                    $_SESSION['test_msg'] = "Invalid Username";
                    redirect('admin/index');
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
                       redirect('admin/index');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_name'] = $user->name;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }
                        else
                        {
                            $_SESSION['test_msg'] = "You do not have access!";
                            redirect('admin/login');
                            
                        }
                        
                    }
                    
                }
               
            }
        }
    }



    public function change_state_coupon($id)
    {
        
        $status  = $_POST['coupon_status'];
        $this->adminModel->change_status_coupon($id,$status);
        $_SESSION['show_msg'] = "Status changed";
        redirect('admin/coupons');
    }

    public function add_restaurant() 
	{
	   $this->view('admin/add_restaurant');
        
	}


    public function new_vendor() 
	{
	   $this->view('admin/new_vendor');
        
	}

    public function orders()
	{
        $orders = $this->pageModel->get_orders_all(); 
        
        $data = [
                    'orders' => $orders,
                ];   

	   $this->view('admin/orders',$data);
        
	}



    public function settlements()
	{
        $all_vendors = $this->pageModel->get_all_vendors();
        $settlements = $this->pageModel->get_settlements(); 
        $data = [
                    'vendors' => $all_vendors,
                    'settlements' => $settlements,
                ];   
	   $this->view('admin/settlements',$data);
	}


    public function vendor_settlements($id=NULL)
	{
        if(!$id){
            $id  = $_POST['vendor_id'];
        }
        $vendor = $this->pageModel->getVendorById($id);
        $settlements = $this->pageModel->get_vendor_settlements($id); 
        
        $data = [
                    'vendor' => $vendor,
                    'settlements' => $settlements,
                ];   

	   $this->view('admin/vendor_settlements',$data);
	}


    public function add_settlement($id)
	{
        $dine_orders = $this->pageModel->get_vendor_orders_settlements_dine($id); 
        $delivery_orders = $this->pageModel->get_vendor_orders_settlements_delivery($id); 
        $pickup_orders = $this->pageModel->get_vendor_orders_settlements_pickup($id); 
        $vendor = $this->pageModel->getVendorById($id);
        $data = [
                    'dine_orders' => $dine_orders,
                    'delivery_orders' => $delivery_orders,
                    'pickup_orders' => $pickup_orders,
                    'vendor' => $vendor,
                ];   
                
	    $this->view('admin/add_settlement',$data);
	}


    public function vendor_orders($id)
	{
        $vendor = $this->pageModel->getVendorById($id);
        $user = $this->pageModel->get_userinfo($id);
        $orders = $this->pageModel->get_vendor_orders_admin($id); 
        
        $data = [
                    'orders' => $orders,
                    'vendor' => $vendor,
                    'user' => $user,
                ];   

	   $this->view('admin/vendor_orders',$data);
        
	}


    public function vendor_order($id)
	{
        $order = $this->pageModel->getOrderById($id); 
        $vendor = $this->pageModel->getVendorById($order->vendor_id);
        $user = $this->pageModel->get_userinfo($order->user_id);
        
        $data = [
                    'order' => $order,
                    'vendor' => $vendor,
                    'user' => $user,
                ];   

	   $this->view('admin/vendor_order',$data);
        
	}

    

    public function reports() 
	{
        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
        $this->view('admin/reports',$data);
        
	}


    public function report_sales()
	{
        $sdate  = $_POST['start_date'];
        $edate  = $_POST['end_date'];
        $type = $_POST['order_type'];
      
        if($type=="all"){
            $orders = $this->adminModel->get_report_sale_all($sdate,$edate); 
        }else if($type=="online"){
            $orders = $this->adminModel->get_report_sale_online($sdate,$edate); 
        }else if($type=="dine"){
            $orders = $this->adminModel->get_report_sale_dine($sdate,$edate); 
        }else if($type=="self"){
            $orders = $this->adminModel->get_report_sale_self($sdate,$edate); 
        }
        $data = [
                    'orders' => $orders,
                    'sdate' => $sdate,
                    'edate' => $edate,
                ];   

	   $this->view('admin/report_sales',$data);
        
	}


    public function report_cancelled()
	{
        $sdate  = $_POST['start_date'];
        $edate  = $_POST['end_date'];
        $type = $_POST['order_type'];
        $vendor_id = $_POST['vendor_id'];

        if($type=="all"){
            $orders = $this->adminModel->vend_get_report_sale_all($sdate,$edate,$vendor_id); 
        }else if($type=="online"){
            $orders = $this->adminModel->vend_get_report_sale_online($sdate,$edate,$vendor_id); 
        }else if($type=="dine"){
            $orders = $this->adminModel->vend_get_report_sale_dine($sdate,$edate,$vendor_id); 
        }else if($type=="self"){
            $orders = $this->adminModel->vend_get_report_sale_self($sdate,$edate,$vendor_id); 
        }
        $data = [
                    'orders' => $orders,
                    'sdate' => $sdate,
                    'edate' => $edate,
                ];   

	   $this->view('admin/report_cancelled',$data);
        
	}


    public function report_payout()
	{
        $sdate  = $_POST['start_date'];
        $edate  = $_POST['end_date'];
        $type = $_POST['order_type'];
        $vendor_id = $_POST['vendor_id'];

        if($type=="all"){
            $orders = $this->adminModel->pay_get_report_sale_all($sdate,$edate,$vendor_id); 
        }

        $data = [
                    'orders' => $orders,
                    'sdate' => $sdate,
                    'edate' => $edate,
                ];   

	   $this->view('admin/report_payout',$data);
        
	}



    public function report_gst()
	{
        $sdate  = $_POST['start_date'];
        $edate  = $_POST['end_date'];
        $type = $_POST['order_type'];
      
        if($type=="all"){
            $orders = $this->adminModel->get_report_sale_all($sdate,$edate); 
        }else if($type=="online"){
            $orders = $this->adminModel->get_report_sale_online($sdate,$edate); 
        }else if($type=="dine"){
            $orders = $this->adminModel->get_report_sale_dine($sdate,$edate); 
        }else if($type=="self"){
            $orders = $this->adminModel->get_report_sale_self($sdate,$edate); 
        }
        $data = [
                    'orders' => $orders,
                    'sdate' => $sdate,
                    'edate' => $edate,
                ];   

	   $this->view('admin/report_gst',$data);
        
	}


    public function report_delivery()
	{
        $sdate  = $_POST['start_date'];
        $edate  = $_POST['end_date'];
        $type = $_POST['order_type'];
      
        if($type=="all"){
            $orders = $this->adminModel->get_report_sale_all($sdate,$edate); 
        }else if($type=="online"){
            $orders = $this->adminModel->get_report_sale_online($sdate,$edate); 
        }else if($type=="dine"){
            $orders = $this->adminModel->get_report_sale_dine($sdate,$edate); 
        }else if($type=="self"){
            $orders = $this->adminModel->get_report_sale_self($sdate,$edate); 
        }
        $data = [
                    'orders' => $orders,
                    'sdate' => $sdate,
                    'edate' => $edate,
                ];   

	   $this->view('admin/report_delivery',$data);
        
	}



    public function update_vendor_status($id,$status)
    {
        $this->pageModel->update_vendor_status($id,$status);
        redirect('admin/vendors'); 
    }

    public function update_vendor_featured($id,$status)
    {
        $this->pageModel->update_vendor_featured($id,$status);
        redirect('admin/vendors'); 
    }


    public function update_vendor_verified($id,$status)
    {
        $this->pageModel->update_vendor_verified($id,$status);
        redirect('admin/vendors'); 
    }

    

    public function transactions() 
	{
	    $orders = $this->pageModel->get_orders_all(); 
        
        $data = [
                    'orders' => $orders,
                ];   

	   $this->view('admin/transactions',$data);
        
	}

    public function users()
	{
        $get_customers = $this->adminModel->get_all_customers();
        $data = [
            'customers' =>$get_customers
        ]; 

	   $this->view('admin/users',$data);
        
	}


    public function add_coupon()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];

        $this->view('admin/add_coupon',$data);
    }


    public function logout()
    {
       session_destroy();
       redirect('admin/login');
    }


    public function vendors()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
       $this->view('admin/vendors',$data); 
    }



    public function edit_vendor($id)
    {
        $vendor = $this->pageModel->getVendorById($id);
        $user = $this->pageModel->get_userinfo($id);
        
        $data = [
                    'vendor' => $vendor,
                    'user' => $user,
                ];   

	   $this->view('admin/edit_vendor',$data);
    }

  



    public function add_vendor(){


            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {


                $name = $_POST['admin_name'];
                $rname = $_POST['vendor_name'];
                $email = $_POST['vendor_email'];
                $phone = $_POST['vendor_phone'];
                $pass = $_POST['vendor_phone'];
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $address = $_POST['vendor_address'];
                $latlong = $_POST['vendor_latlong'];
                $gst = $_POST['vendor_gst'];
                $fssai = $_POST['vendor_fssai'];
                $start_time = $_POST['vendor_start_time'];
                $end_time = $_POST['vendor_end_time'];
                $start_time2 = $_POST['vendor_start_time2'];
                $end_time2 = $_POST['vendor_end_time2'];
                $bank_number = $_POST['vendor_bank_number'];
                $bank_ifsc = $_POST['vendor_bank_ifsc'];
     
                if (empty($email)) 
            {
                $_SESSION['show_msg'] = 'Please enter email';
                $this->view('admin/add_vendor'); 
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['show_msg'] = 'Email already taken';
              $this->view('admin/add_vendor'); 
            } 
            else 
            {
    
    
                    if ($this->pageModel->email_verify_phone($phone)) 
                    {
                      $_SESSION['show_msg'] = 'Phone number already taken';
                      redirect('admin/add_vendor'); 
                    } 
                    else 
                    {

                        

                    if(!empty($_FILES['vendor_image']['name']))
                     {
                    $f_name = $_FILES['vendor_image']['name'];
                    $f_temp = $_FILES['vendor_image']['tmp_name'];
                    $size = $_FILES['vendor_image']['size'];
                    $f_extension=explode('.', $f_name);
                    $f_extension=strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $unqdate."".$unqtime;
                    $f_newfile=$unqname.'.' .$f_extension;
                    $store="uploads/" .$f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $store ="uploads/";
                    $img=$f_newfile;
                     }
                     else
                        {
                        $img = "vendor.png";
                    }

                    if(!empty($_FILES['vendor_gst_file']['name']))
                     {
                    $f_name = $_FILES['vendor_gst_file']['name'];
                    $f_temp = $_FILES['vendor_gst_file']['tmp_name'];
                    $size = $_FILES['vendor_gst_file']['size'];
                    $f_extension=explode('.', $f_name);
                    $f_extension=strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = "g".$unqdate."".$unqtime;
                    $f_newfile=$unqname.'.' .$f_extension;
                    $store="uploads/" .$f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $store ="uploads/";
                    $gst_file=$f_newfile;
                     }
                     else
                        {
                        $gst_file = "vendor.png";
                    }

                    if(!empty($_FILES['vendor_fssai_file']['name']))
                     {
                    $f_name = $_FILES['vendor_fssai_file']['name'];
                    $f_temp = $_FILES['vendor_fssai_file']['tmp_name'];
                    $size = $_FILES['vendor_fssai_file']['size'];
                    $f_extension=explode('.', $f_name);
                    $f_extension=strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = "f".$unqdate."".$unqtime;
                    $f_newfile=$unqname.'.' .$f_extension;
                    $store="uploads/" .$f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $store ="uploads/";
                    $fssai_file=$f_newfile;
                     }
                     else
                        {
                        $fssai_file = "vendor.png";
                    }
    

                        if ($this->pageModel->add_vendor($name, $rname, $img, $email, $phone, $pass, $address, $latlong, $gst, $fssai, $start_time, $end_time, $start_time2, $end_time2, $bank_number, $bank_ifsc, $gst_file, $fssai_file, 1)) 
                        {
                            $_SESSION['show_msg'] = "Registered Successfully..! ";
                            $this->view('admin/add_vendor'); 
                        }
                        else
                        {
                            $_SESSION['show_msg'] = 'Registeration Failed';
                            $this->view('admin/add_vendor'); 
                        }
                    }
                }
            } 
            else 
            {
                $this->view('admin/add_vendor'); 
            }
    }





    public function update_vendor($id)
    {

        $vendor = $this->pageModel->getVendorById($id);
        $user = $this->pageModel->get_userinfo($id);


            $name = $_POST['admin_name'];
            $rname = $_POST['vendor_name'];
            $email = $_POST['vendor_email'];
            $phone = $_POST['vendor_phone'];
            $pass = $_POST['vendor_phone'];
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $address = $_POST['vendor_address'];
            $latlong = $_POST['vendor_latlong'];
            $gst = $_POST['vendor_gst'];
            $fssai = $_POST['vendor_fssai'];
            $start_time = $_POST['vendor_start_time'];
            $end_time = $_POST['vendor_end_time'];
            $start_time2 = $_POST['vendor_start_time2'];
            $end_time2 = $_POST['vendor_end_time2'];
            $bank_number = $_POST['vendor_bank_number'];
            $bank_ifsc = $_POST['vendor_bank_ifsc'];
 
            if (empty($email)) 
        {
            $_SESSION['show_msg'] = 'Please enter email';
            redirect('admin/edit_vendor/'.$id); 
        } else if ($this->pageModel->findUserByemail($email) && $user->email != $email) 
        {
          $_SESSION['show_msg'] = 'Email already taken';
          redirect('admin/edit_vendor/'.$id); 
        } 
        else 
        {


                if ($this->pageModel->email_verify_phone($phone) && $user->phone != $phone) 
                {
                  $_SESSION['show_msg'] = 'Phone number already taken';
                  redirect('admin/edit_vendor/'.$id); 
                } 
                else 
                {

                    

                if(!empty($_FILES['vendor_image']['name']))
                 {
                $f_name = $_FILES['vendor_image']['name'];
                $f_temp = $_FILES['vendor_image']['tmp_name'];
                $size = $_FILES['vendor_image']['size'];
                $f_extension=explode('.', $f_name);
                $f_extension=strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $unqdate."".$unqtime;
                $f_newfile=$unqname.'.' .$f_extension;
                $store="uploads/" .$f_newfile;
                move_uploaded_file($f_temp, $store);
                $store ="uploads/";
                $img=$f_newfile;
                 }
                 else
                    {
                    $img = $vendor->vendor_img;
                }

                if(!empty($_FILES['vendor_gst_file']['name']))
                 {
                $f_name = $_FILES['vendor_gst_file']['name'];
                $f_temp = $_FILES['vendor_gst_file']['tmp_name'];
                $size = $_FILES['vendor_gst_file']['size'];
                $f_extension=explode('.', $f_name);
                $f_extension=strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = "g".$unqdate."".$unqtime;
                $f_newfile=$unqname.'.' .$f_extension;
                $store="uploads/" .$f_newfile;
                move_uploaded_file($f_temp, $store);
                $store ="uploads/";
                $gst_file=$f_newfile;
                 }
                 else
                    {
                    $gst_file = $vendor->gst_file;
                }

                if(!empty($_FILES['vendor_fssai_file']['name']))
                {
                $f_name = $_FILES['vendor_fssai_file']['name'];
                $f_temp = $_FILES['vendor_fssai_file']['tmp_name'];
                $size = $_FILES['vendor_fssai_file']['size'];
                $f_extension=explode('.', $f_name);
                $f_extension=strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = "f".$unqdate."".$unqtime;
                $f_newfile=$unqname.'.' .$f_extension;
                $store="uploads/" .$f_newfile;
                move_uploaded_file($f_temp, $store);
                $store ="uploads/";
                $fssai_file=$f_newfile;
                }
                 else
                    {
                    $fssai_file = $vendor->fssai_file;
                }


                    if ($this->pageModel->update_vendor($name, $rname, $img, $email, $phone, $pass, $address, $latlong, $gst, $fssai, $start_time, $end_time, $start_time2, $end_time2, $bank_number, $bank_ifsc, $gst_file, $fssai_file, $id)) 
                    {
                        $_SESSION['show_msg'] = "Updated Successfully..! ";
                        redirect('admin/edit_vendor/'.$id); 
                    }
                    else
                    {
                        $_SESSION['show_msg'] = 'Update Failed';
                        redirect('admin/edit_vendor/'.$id); 
                    }
                }
            }
       
}


    public function create_coupon()
    {
        $coupon_title = $_POST['coupon_title'];
        $coupon_vendor = $_POST['coupon_vendor'];
        $coupon_code = $_POST['coupon_code'];
        $coupon_type = $_POST['coupon_type'];
        $coupon_usage = $_POST['usage'];
        $coupon_value = $_POST['coupon_value'];
        $coupon_cap = $_POST['coupon_cap'];
        $coupon_min_order = $_POST['min_order'];
        $coupon_stat = $this->adminModel->create_coupon($coupon_title,$coupon_vendor,$coupon_code,$coupon_type,$coupon_usage,$coupon_value,$coupon_cap,$coupon_min_order);

        if($coupon_stat){
            $_SESSION['show_msg'] = "Coupon created Successfully";
             redirect('admin/coupons'); }

    else {
        $_SESSION['show_msg'] = "Coupon not created";
             redirect('admin/add_coupon'); }
             
    }
    

    public function coupons()
    {

        $get_all_coupons = $this->adminModel->get_all_coupons_admin();
        $data = [
                    'all_coupons' => $get_all_coupons,
        ];

        $this->view('admin/coupons',$data);

    }


    public function banners()
    {

        $get_all_banners = $this->pageModel->get_all_banners();

        $data = [
                    'banners' => $get_all_banners,
        ];

        $this->view('admin/banners',$data);

    }



    public function add_banner()
    {
       $this->view('admin/add_banner');

    }


    public function create_banner()
    {

        if(!empty($_FILES['banner_file']['name']))
        {
        $f_name = $_FILES['banner_file']['name'];
        $f_temp = $_FILES['banner_file']['tmp_name'];
        $size = $_FILES['banner_file']['size'];
        $f_extension=explode('.', $f_name);
        $f_extension=strtolower(end($f_extension));
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $unqdate."".$unqtime;
        $f_newfile=$unqname.'.' .$f_extension;
        $store="uploads/" .$f_newfile;
        move_uploaded_file($f_temp, $store);
        $store ="uploads/";
        $img=$f_newfile;
            }
            else
            {
            $img = "vendor.png";
        }

        if ($this->pageModel->add_banner($img)) 
        {
            $_SESSION['show_msg'] = 'New Banner Success';
            redirect('admin/banners'); 
        }
        else
        {
            $_SESSION['show_msg'] = 'New Banner Failed';
            redirect('admin/banners'); 
        }
}



public function create_settlement($id,$amount,$commission)
{


    if(!empty($_FILES['reciept_file']['name']))
    {
    $f_name = $_FILES['reciept_file']['name'];
    $f_temp = $_FILES['reciept_file']['tmp_name'];
    $size = $_FILES['reciept_file']['size'];
    $f_extension=explode('.', $f_name);
    $f_extension=strtolower(end($f_extension));
    $unqdate = date("Ymd");
    $unqtime = time();
    $unqname = $unqdate."".$unqtime;
    $f_newfile=$unqname.'.' .$f_extension;
    $store="uploads/" .$f_newfile;
    move_uploaded_file($f_temp, $store);
    $store ="uploads/";
    $reciept_file=$f_newfile;
        }
        else
        {
        $reciept_file = "vendor.png";
    }
    

    $transaction_id = $_POST['transaction_id'];

    $orders = $this->pageModel->get_vendor_orders_settlements($id); 
    $order_val="";
    $order_count=0;
    foreach($orders as $order){
        if($order_count){
            $order_val=$order_val.",";
        }
        $this->pageModel->order_settled($order->id);
        $order_val=$order_val."".$order->id;
        $order_count++;
    }


    if ($this->pageModel->create_settlement($id,$order_val,$amount,$commission,$transaction_id,$reciept_file)) 
    {
        $_SESSION['show_msg'] = 'New Settlement Success';
        redirect('admin/vendor_settlements/'.$id); 
    }
    else
    {
        $_SESSION['show_msg'] = 'New Settlement  Failed';
        redirect('admin/vendor_settlements/'.$id); 
    }
}


public function delete_banner($id)
{

    if ($this->pageModel->delete_banner($id)) 
    {
        $_SESSION['show_msg'] = 'New Banner Success';
        redirect('admin/banners'); 
    }
    else
    {
        $_SESSION['show_msg'] = 'New Banner Failed';
        redirect('admin/banners'); 
    }
}









}