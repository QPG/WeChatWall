<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	protected $openid = '';

	public function index(){
		$this->openid = strval($_GET['user']);
		session_start();
		$_SESSION['openid'] = $this->openid;
	}
}