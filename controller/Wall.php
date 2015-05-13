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
		$data['setting'] = $this->Wall_model->get_setting($rid);
		$list = $this->Wall_model->lottery($rid);
		foreach ($list as $k => &$v) { //修改数组元素需要引用赋值
			if($v['headimg'] == ''){
				$v['headimg'] = base_url().'static/wall/display/images/avatar.png';
			}
		}
		$data['list'] = json_encode($list);
		$this->load->view('wall/display/lottery',$data);
	}

	public function qrcode(){
		$rid = intval($_GET['id']);
		$data['setting'] = $this->Wall_model->get_setting($rid);
		$this->load->view('wall/display/qrcode',$data);
	}

	/***
	*@单独后台管理
	***/


	private function is_login(){
		session_start();
		if(isset($_SESSION['admin'])){
			return true;
		}else{
			session_destroy();
			return false;
		}
	}

	public function mng(){
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
		$crr = current($data['list']);
		$data['lastTime'] = $data['list'] ? $crr['create_time'] : 1430656946;
		$this->load->view('wall/mng/index',$data);
	}

	public function mng_ajax(){
		if(!$this->is_login()){
			exit('no access');
		}
		$rid = intval($_GET['id']);
		$time = intval($_GET['time']);
		$result = $this->Wall_model->mng_ajax($rid,$time);
		echo json_encode($result);
	}
	/* TODO 权限判断 */
	public function mng_allow(){
		if(!$this->is_login()){
			exit('no access');
		}
		$id = intval($_GET['id']);
		$res = $this->Wall_model->mng_allow($id);
		echo $res;
	}

	public function mng_delete(){
		if(!$this->is_login()){
			exit('no access');
		}
		$id = intval($_GET['id']);
		echo $this->Wall_model->mng_delete($id);
	}

	public function mng_blacklist(){
		if(!$this->is_login()){
			exit('no access');
		}
		$id = intval($_GET['id']);
		$this->Wall_model->mng_blacklist($id);
		echo 1;
	}

	public function lottery_report(){
		$id = intval($_GET['id']);
		$order = intval($_GET['order']);
		$this->Wall_model->lottery_award($id,$order);
	}

	public function validate(){
		$username = strval($_POST['username']);
		$password = strval($_POST['password']);
		if($rid = $this->Wall_model->validate($username,$password)){
			session_start();
			$_SESSION['admin'] = $username;
			header('Location:'.site_url('wall/mng?id='.$rid));
		}else{
			exit('<script>alert("NOT VALIDATED!");window.location = "'.site_url('wall/mng').'";</script>');
		}
	}

	public function logout(){
		session_start();
		unset($_SESSION['admin']);
		session_destroy();
		header('Location:'.site_url('wall/mng'));
	}
}