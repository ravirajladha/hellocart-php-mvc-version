<?php
  class Home extends Controller{
    public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
        $this->adminModel = $this->model('Admins');
	}

    public function index(){
      $this->pageModel->update_page_count(2);
      $this->view('home/index', $data);
    }

    public function about(){
      $this->view('home/about');
    }

    public function privacy_policy(){
      $this->view('home/privacy_policy');
    }

    public function tnc(){
      $this->view('home/tnc');
    }

    public function restaurant(){
      $this->view('home/restaurant');
    }


    public function add_vendor(){




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
          $this->view('home/restaurant'); 
      } else if ($this->pageModel->findUserByemail($email)) 
      {
        $_SESSION['show_msg'] = 'Email already taken';
        $this->view('home/restaurant'); 
      } 
      else 
      {


              if ($this->pageModel->email_verify_phone($phone)) 
              {
                $_SESSION['show_msg'] = 'Phone number already taken';
                redirect('home/restaurant'); 
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
              $unqname = $unqdate."".$unqtime;
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
              $unqname = $unqdate."".$unqtime;
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


                  if ($this->pageModel->add_vendor($name, $rname, $img, $email, $phone, $pass, $address, $latlong, $gst, $fssai, $start_time, $end_time, $start_time2, $end_time2, $bank_number, $bank_ifsc, $gst_file, $fssai_file, 0)) 
                  {
                      $_SESSION['show_msg'] = "Registered Successfully..! ";
                      $this->view('home/restaurant'); 
                  }
                  else
                  {
                      $_SESSION['show_msg'] = 'Registeration Failed';
                      $this->view('home/restaurant'); 
                  }
              }
          }
      } 
     

  }