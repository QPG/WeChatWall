<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Wall_model');
	}

	public function index(){
		$rid = 21;
		$data['setting'] = $this->Wall_model->get_setting($rid);
		$this->load->view('wall/display/index',$data);
	}

	public function ajax_request(){
		$rid = intval($_GET['id']);
		$time = intval($_GET['time']);
		$request = array();
		$request['rid'] = $rid;
		$request['time'] = $time;
		$msg = $this->Wall_model->get_msg($request);
		if($msg['id']==''){
			exit('null');
		}
		if($msg['headimg']==''){
			$msg['headimg'] = base_url().'static/wall/display/images/avatar.png';
		}
			echo json_encode($msg);
	}

	public function lottery(){
		
	}

	public function mng(){
		$rid = 21;
		$setting = $this->Wall_model->get_setting($rid);
		if(!$setting['review']){
			exit('审核未开启');
		}
		$data['list'] = $this->Wall_model->get_review_list($rid);
		$this->load->view('wall/mng/index',$data);
	}

	public function mng_ajax(){
		
	}
}