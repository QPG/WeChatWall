<?php

class Write_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_question($fid){
		$this->db->from('twt_vote_question')->select('qid,imgurl,text')->where('fid',$fid);
		return $this->db->get()->result_array();
	}

	public function get_info($fid){
		$this->db->from('twt_vote_list')->select('title,organizer,about,start_time,end_time,')->where('fid',$fid);
		return $this->db->get()->row_array();
	}

}
