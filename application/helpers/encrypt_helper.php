<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function encrypt_id($openid){
	$key = 'E72pf0P';
	$change0 = substr($openid, 0,6);
	$change1 = substr($openid, 7,13);
	$change2 = substr($openid, 14,20);
	$change3 = substr($openid, 21,27);
	$en_id = $change1.$key.$change2.$change4;
	$en_change0 = substr($en_id, 0,2);
	$en_change1 = substr($en_id, 3,9);
	$en_change2 = substr($en_id, 10,17);
	$en_change3 = substr($en_id, -10,-3);
	$en_change4 = substr($en_id, -3);
	return $en_id_f = $en_change0.$en_change3.$en_change2.$en_change1.$en_change4;

}

function decrypt_id($en_id_f){


}
