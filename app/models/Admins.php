<?php
class Admins
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function get_all_orders() 
    {
        $this->db->query('SELECT * FROM orders ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
    }
      public function get_all_userinfo()
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->single();
    }

  
    public function get_report_sale_all($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $result = $this->db->resultSet();
        return $result;
    }



    public function get_report_sale_online($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 0);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_report_sale_dine($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 1);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_report_sale_self($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 2);
        $result = $this->db->resultSet();
        return $result;
    }

  


    
    public function pay_get_report_sale_all($sdate,$edate,$vendor_id) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND status=2 AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $vendor_id);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $result = $this->db->resultSet();
        return $result;
    }





    
  
    public function vend_get_report_sale_all($sdate,$edate,$vendor_id) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND status=9 AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $vendor_id);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $result = $this->db->resultSet();
        return $result;
    }



    public function vend_get_report_sale_online($sdate,$edate,$vendor_id) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND status=9 AND order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $vendor_id);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 0);
        $result = $this->db->resultSet();
        return $result;
    }

    public function vend_get_report_sale_dine($sdate,$edate,$vendor_id) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND status=9 AND order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $vendor_id);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 1);
        $result = $this->db->resultSet();
        return $result;
    }

    public function vend_get_report_sale_self($sdate,$edate,$vendor_id) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND status=9 AND order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $vendor_id);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 2);
        $result = $this->db->resultSet();
        return $result;
    }







    public function get_all_category()
    {
        $this->db->query('SELECT * FROM category WHERE category_vendor_id = :vid order by category_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        return $this->db->resultSet();
    }

    public function get_all_coupons()
    {
        $this->db->query('SELECT * FROM coupons WHERE coupon_vendor_id = :val OR coupon_vendor_id = :vid order by coupon_id DESC');
        $this->db->bind(':val', '1');
        $this->db->bind(':vid', $vid);
        return $this->db->resultSet();
    }


    public function get_all_coupons_admin()
    {
        $this->db->query('SELECT * FROM coupons order by coupon_id DESC');
        return $this->db->resultSet();
    }


    public function get_vendor_coupons()
    {
        $this->db->query('SELECT * FROM coupons WHERE coupon_vendor_id = :vid order by coupon_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        return $this->db->resultSet();
    }


    public function get_all_subcategory()
    {
        $this->db->query('SELECT * FROM subcategory WHERE subcategory_vendor_id = :vid order by subcategory_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        
        return $this->db->resultSet();
    }



   

    
    public function create_item_db($name, $type, $cat, $desc, $price, $discount_price, $price_dine, $discount_price_dine)
    {
        
        
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
            $temp1 = NULL;
        }


        $this->db->query('INSERT INTO items(item_type, item_name, item_vendor_id, item_cat_id, item_img, item_desc, item_price, item_discount_price, item_price_dine, item_discount_price_dine) VALUES (:types, :name, :vid, :catid, :image, :desc, :price, :disprice, :pricedine, :dispricedine)');

        //bind our parameters
        $this->db->bind(':types',$type);
        $this->db->bind(':name',$name);
        $this->db->bind(':vid',$_SESSION['rexkod_vendor_id']);
        $this->db->bind(':catid',$cat);
        $this->db->bind(':image',$temp1);
        $this->db->bind(':desc',$desc);

        $this->db->bind(':price',$price);
        $this->db->bind(':disprice',$discount_price);
        $this->db->bind(':pricedine',$price_dine);
        $this->db->bind(':dispricedine',$discount_price_dine);



        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }


    public function getSubcategoryById($id)
    {
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_all_customers()
    {
        $this->db->query("SELECT * FROM auth WHERE type = :type");
        $this->db->bind(':type', 'user');
        return $result = $this->db->resultSet();
    }

    public function get_all_customers_vendor()
    {
        $this->db->query("SELECT DISTINCT user_id FROM orders WHERE vendor_id = :id");
        $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
        return $result = $this->db->resultSet();
    }

    public function get_all_customers_vendor_name($name)
    {
        $this->db->query("SELECT DISTINCT user_id FROM orders WHERE vendor_id = :id AND name LIKE :name");
        $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':name', "%".$name."%");
        return $result = $this->db->resultSet();
    }



    public function find_all_order()
    {
        $this->db->query("SELECT * FROM orders where user_id = :id order by id DESC");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->resultSet();
    }

    public function get_order_details($id)
    {
        $this->db->query("SELECT * FROM orders where id = :id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }


   

    public function get_all_by_ID($id)
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }


    public function get_page_count($id)
    {
        $this->db->query("SELECT * FROM page_counter where pc_id = :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }




   

    public function create_category($category_name,$category_img,$category_start_time,$category_end_time)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
        
        

        $this->db->query('INSERT INTO category(category_name, category_vendor_id, category_img, category_start_time, category_end_time) VALUES (:category_name, :vid, :category_img, :starttime, :endtime)');
        //bind our parameters
        $this->db->bind(':category_name',$category_name);
        $this->db->bind(':vid',$_SESSION['rexkod_vendor_id']);
        $this->db->bind(':category_img',$category_img);
        $this->db->bind(':starttime',$category_start_time);
        $this->db->bind(':endtime',$category_end_time);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }


    public function create_coupon($coupon_title, $coupon_vendor, $coupon_code, $coupon_type, $coupon_usage, $coupon_value, $coupon_cap,$coupon_min_order)
    {
        $this->db->query('INSERT INTO coupons(coupon_title, coupon_code, coupon_type, coupon_usage,coupon_value, coupon_cap, coupon_status,coupon_vendor_id, coupon_min_order) VALUES (:coupon_title, :coupon_code, :coupon_type, :coupon_usage, :coupon_value, :coupon_cap, :coupon_status, :coupon_vendor, :coupon_min_order)');
        //bind our parameters
        
        $this->db->bind(':coupon_title',$coupon_title);
        $this->db->bind(':coupon_code',$coupon_code);
        $this->db->bind(':coupon_type',$coupon_type);
        $this->db->bind(':coupon_usage',$coupon_usage);
        $this->db->bind(':coupon_value',$coupon_value);
        $this->db->bind(':coupon_cap',$coupon_cap);
        $this->db->bind(':coupon_status',1);
        $this->db->bind(':coupon_vendor',$coupon_vendor);
        $this->db->bind(':coupon_min_order',$coupon_min_order);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }





    public function create_subcategory($subcategory_name,$subcategory_img,$subcategory_tax)
    {
        $this->db->query('INSERT INTO subcategory(subcategory_name, subcategory_vendor_id, subcategory_img, subcategory_tax) VALUES (:subcategory_name, :vid, :subcategory_img, :subcategory_tax)');
        //bind our parameters
        $this->db->bind(':subcategory_name',$subcategory_name);
        $this->db->bind(':vid',$_SESSION['rexkod_vendor_id']);
        $this->db->bind(':subcategory_img',$subcategory_img);
        $this->db->bind(':subcategory_tax',$subcategory_tax);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }







    public function add_vendor($email, $phone, $pass)
    {
        $this->db->query('INSERT INTO auth (type, email, phone, password, status, created_at) VALUES(:type,:email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':type', 'vendor');
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

    }



    public function getCategoryById($id)
    {
        $this->db->query("SELECT * FROM category where category_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function update_category($id,$category_name, $img)
    {

        $temp = 0;
        if(!empty($_FILES['files']['name']))
        {
            $f_name = $_FILES['files']['name'];
            $f_temp = $_FILES['files']['tmp_name'];
            $size = $_FILES['files']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = $img;
        }


        $this->db->query('UPDATE category set category_name = :category_name, img = :img  WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':category_name', $category_name);
        $this->db->bind(':img', $temp);

        
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function update_status_category($id,$status)
    {

        $this->db->query('UPDATE category set hide_status = :hide_status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':hide_status', $status);


        
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }








    public function get_categoryBy_name($category_name)
    {
        $this->db->query("SELECT * FROM category where category_name = :category_name");

        $this->db->bind(':category_name', $category_name);

        return $results = $this->db->single();
    }

    


    public function change_status_coupon($id,$st)
    {

        $this->db->query('UPDATE coupons set coupon_status = :status WHERE coupon_id = :id');
        // Bind values
        $this->db->bind(':status', $st);
        $this->db->bind(':id', $id);


        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function sum_orders_all() {
        $this->db->query('SELECT SUM(sub_total) as total FROM orders WHERE DATE(created_at)=:today AND (status=1 OR status=2)');
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->single();
        return $result;
    }

    public function count_orders_all() {
        $this->db->query('SELECT COUNT(id) as total FROM orders WHERE DATE(created_at)=:today');
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->single();
        return $result;
    }

    public function count_delivery_all() {
        $this->db->query('SELECT COUNT(id) as total FROM orders WHERE order_type=:type AND DATE(created_at)=:today');
        $this->db->bind(':type', 0);
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->single();
        return $result;
    }

    public function count_dine_all() {
        $this->db->query('SELECT COUNT(id) as total FROM orders WHERE order_type=:type AND DATE(created_at)=:today');
        $this->db->bind(':type', 1);
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->single();
        return $result;
    }

    public function count_live_all() {
        $this->db->query('SELECT COUNT(id) as total FROM orders WHERE status=:val AND DATE(created_at)=:today');
        $this->db->bind(':val', 1);
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->single();
        return $result;
    }

    public function count_vendors_all() {
        $this->db->query('SELECT COUNT(vendor_id) as total FROM vendors');
        $result = $this->db->single();
        return $result;
    }

    public function count_users_all() {
        $this->db->query('SELECT COUNT(id) as total FROM auth WHERE type=:type AND DATE(created_at)=:today');
        $this->db->bind(':type', 'user');
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->single();
        return $result;
    }

  
   
}
