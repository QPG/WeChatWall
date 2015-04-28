<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit extends CI_Controller {

	protected $openid=false;

	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('write_model');
	}

	public function index(){
		$this->load->database();
		$this->db->select('fid,title,organizer,about,start_time,end_time');
		$this->db->from('twt_vote_list');
		$this->db->where('isshow',1);
		$res = $this->db->get()->result_array();
		$data['res'] = $res;
		$this->load->view('vote/visit',$data);
	}

	public function write(){
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
		$this->load->view('vote/write',$data);
	}

	public function handle(){
		$data['uid'] = $_SESSION['openid'];
		unset($_SESSION['user']);
		$data['fid'] = intval($_GET['id']);
		if($this->write_model->is_exist($data['fid'],$data['uid'])){
			session_destroy();
			exit('你已经投过票了');
		}
		$data['create_time'] = time();
		foreach($_POST['option'] as $k => $v){
			$data['qid'] = $k;
			$this->write_model->submit_insert($data);
		}
	}

	public function manage(){
		$this->load->view('vote/manage');
	}


}
