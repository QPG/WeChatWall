<?php

class Wall_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_setting($rid){
		$this->db->where('rid',$rid)->where('rid',$rid);
		return $setting = $this->db->get('wall_setting')->row_array();
	}

	public function get_msg($request){
		//isshow字段：0待上墙 1已上墙 2待审核 3拒绝上墙
		$this->db->from('wall_msg')->where(array('rid'=>$request['rid'],'create_time >'=>$request['time'],'isshow'=>'0'))->order_by('id','asc')->limit(1);
		$result = $this->db->get()->row_array();
		$this->db->where('id',$result['id'])->update('wall_msg',array('isshow'=>1));
		return $result;
	}

	public function get_review_list($rid){
		$this->db->from('wall_msg')->where(array('rid'=>$rid,'isshow'=>'2'))->order_by('id','desc');
		return $result = $this->db->get()->result_array();
	}

	public function mng_ajax($rid,$time){
		$this->db->from('wall_msg')->where(array('rid'=>$rid,'create_time>'=>$time,'isshow'=>2))->order_by('id','asc');
		return $this->db->get()->result_array();
	}

	public function mng_allow($id){
		$res = $this->db->where('id',$id)->update('wall_msg',array('isshow'=>'0'));
		return $res;
	}

	public function mng_delete($id){
		return $this->db->where('id',$id)->update('wall_msg',array('isshow'=>'3'));
	}

	public function mng_blacklist($id){
		return $this->db->where('id',$id)->update('wall_msg',array('isshow'=>'3'));
	//	$openid = $this->db->select('openid')->where('id',$id)->get('wall_msg')->row_array();
	//	$openid = $openid['openid'];
	//	$this->db->where('openid',$openid)->update('wall_msg',array('isshow'=>'3'));
	}

	public function lottery($rid){
		return $this->db->select('id,nickname,headimg')->where(array('rid' => $rid,'isshow' => 1))->group_by('openid')->get('wall_msg')->result_array();
	}

	public function lottery_award($id,$order){
		$this->db->select('rid,nickname,openid')->where('id',$id);
		$res = $this->db->get('wall_msg')->row_array();
		$data = array(
				'openid' => $res['openid'],
				'nickname' => $res['nickname'],
				'create_time' => time(),
				'order_num' => $order,
				'rid' => $res['rid']
			);
		$this->db->insert('wall_lottery',$data);
	}

	public function validate($username,$password){
		$row = $this->db->select('rid,password')->where('username',$username)->get('wall_admin')->row_array();
		$pwd = $row['password'];
		if($pwd == md5($password)){
			return $row['rid'];
		}else{
			return false;
		}
	}
}
