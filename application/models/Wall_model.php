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
		//isshow字段：0待上墙 1已上墙 3待审核 4拒绝上墙
		$this->db->from('wall_msg')->where(array('rid'=>$request['rid'],'create_time >'=>$request['time'],'isshow'=>'0'))->order_by('create_time','desc')->limit(1);
		return $result = $this->db->get()->row_array();
	}
}
