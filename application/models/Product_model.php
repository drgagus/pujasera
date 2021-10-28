<?php
class product_model extends CI_model{

	public function getAllProduct()
	{
		return $this->db->get('product')->result_array();
	}

	
}




?>