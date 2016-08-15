<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	var $table = 'users';

	function validate($username, $password){
		$query = $this->db->get_where("users",array("username"=>$username, "password"=>$password));
		if($query->num_rows){
			return $query->result_array();
		} else {
			return false;
		}
	}

}

 ?>