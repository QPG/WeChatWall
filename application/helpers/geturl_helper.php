<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('get_img_url') ){

	function get_img_url($filename){

		return base_url().'uploads/img/'.$filename;

	}
}