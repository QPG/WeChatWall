<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Wall_model');
	}

	public function index(){
		$rid = intval($_GET['id'])?intval($_GET['id']):exit('no access!');
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
			exit('{"id":null}');
		}
		if($msg['headimg']==''){
			$msg['headimg'] = base_url().'static/wall/display/images/avatar.png';
		}
			echo json_encode($msg);
	}

	public function lottery(){
		$rid = intval($_GET['id']);
		$data['list'] = json_encode($this->Wall_model->lottery($rid));
		$this->load->view('wall/display/lottery',$data);
	}

	/***
	*@单独后台管理
	***/
	public function mng(){
		session_start();
		if(!$this->is_login()){
			return $this->load->view('wall/mng/login');
		}

		$rid = intval($_GET['id'])?intval($_GET['id']):exit('no access!');
		$setting = $this->Wall_model->get_setting($rid);
		if(!$setting['review']){
			exit('审核未开启');
		}
		$data['list'] = $this->Wall_model->get_review_list($rid);
		//没有满足条件者返回empty array 可做0/1判断
		$data['lastTime'] = $data['list']?current($data['list'])['create_time']:1430656946;
		$this->load->view('wall/mng/index',$data);
	}

	public function mng_ajax(){
		$rid = intval($_GET['id']);
		$time = intval($_GET['time']);
		$result = $this->Wall_model->mng_ajax($rid,$time);
		echo json_encode($result);
	}
	/* TODO 权限判断 */
	public function mng_allow(){
		$id = intval($_GET['id']);
		$res = $this->Wall_model->mng_allow($id);
		echo $res;
	}

	public function mng_delete(){
		$id = intval($_GET['id']);
		echo $this->Wall_model->mng_delete($id);
	}

	public function mng_blacklist(){
		$id = intval($_GET['id']);
		$this->Wall_model->mng_blacklist($id);
		echo 1;
	}

	public function lottery_report(){
		$id = intval($_GET['id']);
		
	}

	private function is_login(){
		return isset($_SESSION['admin']) ? true : false;
	}

	public function validate(){
		$username = strval($_POST['username']);
		$password = strval($_POST['password']);
		if($rid = $this->Wall_model->validate($username,$password)){
			session_start();
			$_SESSION['admin'] = $username;
			header('Location:'.site_url('wall/mng?id='.$rid));
		}else{
			exit('wrong!');
		}
	}

	public function logout(){
		session_start();
		unset($_SESSION['admin']);
		session_destroy();
		header('Location:'.site_url('wall/mng'));
	}
}