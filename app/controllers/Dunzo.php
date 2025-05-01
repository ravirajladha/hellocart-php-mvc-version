<?php
class Dunzo extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
        $this->adminModel = $this->model('Admins');
	}

	public function index()
    {
    $$dunzo_update = file_get_contents('php://input');
    $dunzo = json_decode($dunzo_update, true);
    
    $delivery= $this->pageModel->get_delivery($dunzo['task_id']); 
    
    if(!$delivery->agent_name){
        $agent_name = $dunzo['runner']['name'];
    }else {
        $agent_name = $delivery->agent_name;
    }

    if(!$delivery->agent_phone){
        $agent_phone = $dunzo['runner']['phone_number'];
    }else {
        $agent_phone = $delivery->agent_phone;
    }

    $this->pageModel->delivery_update($dunzo['state'],$agent_name,$agent_phone,$dunzo['task_id']);


    die();  

    }

    

}