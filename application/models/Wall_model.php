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
		$this->db->from('wall_msg')->where($request);
		return $result = $this->db->get()->row_array();
	}
}
