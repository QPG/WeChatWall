<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Write extends CI_Controller {

	public function index(){
		$this->load->database();
		$fid = !empty($_GET['id'])?intval($_GET['id']):0;
		$this->db->from('twt_vote_question');
		$this->db->select('qid,imgurl,text');
		$this->db->where('fid',$fid);
		$data['res'] = $this->db->get()->result_array();
		$this->load->view('write',$data);
	}

	public function handle(){
		
	}

}
