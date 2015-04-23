<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->db->select('fid,title,organizer,about,start_time,end_time');
		$this->db->from('twt_vote_list');
		$this->db->where('isshow',1);
		$res = $this->db->get()->result_array();
		$data['res'] = $res;
		$this->load->view('visit',$data);
	}
}
