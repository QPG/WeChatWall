<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Wall_model');
	}

	public function index(){
		$rid = 1;
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
		echo 1;
	}
}