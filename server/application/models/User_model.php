<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class User_model extends CI_Model{

	function get_user($q) {
		return $this->db->get_where('tbl_user',$q);
	}	
}