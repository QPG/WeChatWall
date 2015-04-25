<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Write extends CI_controller {

	protected $openid=false;

	public function __construct(){
		parent::__construct();
		$this->openid = strval($_GET['user']);
		if(!$this->openid){
			exit('No direct script access allowed');
		}
		session_start();
		$_SESSION['openid'] = $this->openid;
		$this->load->model('write_model');

	}

	public function index(){
		$fid = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		if(!$fid){
			exit('No direct script access allowed');
		}
		
		$data['res'] = $this->write_model->get_question($fid);
		$data['info'] = $this->write_model->get_info($fid);
		$this->load->view('write',$data);
	}

	public function handle(){
		
	}

}
