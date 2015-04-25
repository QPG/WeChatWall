<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Write extends CI_controller {

	protected $openid=false;

	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('write_model');

	}

	public function index(){
		$this->openid = strval($_GET['user']);
		$_SESSION['openid'] = $this->openid;
		if(!$this->openid){
			exit('No direct script access allowed');
		}
		$fid = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		if(!$fid){
			exit('No direct script access allowed');
		}
		$data['fid'] = $fid;
		$data['res'] = $this->write_model->get_question($fid);
		$data['info'] = $this->write_model->get_info($fid);
		$this->load->view('write',$data);
	}

	public function handle(){
		$data['fid'] = $_SESSION['openid'];
		unset($_SESSION['user']);
		$data['create_time'] = time();
		$data['qid'] = intval($_GET['id']);
		foreach($_POST['option'] as $k => $v){
			$data['option'] = $k;
			$this->write_model->submit_insert($data);
		}
		session_destroy();
		
	}

}
