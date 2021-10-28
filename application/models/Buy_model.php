<?php
class buy_model extends CI_model{

	public function getAllShop()
	{
		return $this->db->get_where('shop',['is_active' => 1 ])->result_array();
	}

	public function getShopByShopId($shop_id)
	{
		return $this->db->get_where('shop',['shop_id' => $shop_id, 'is_active' => 1 ])->row_array();
	}

	public function getImageUser($user_id)
	{
		return $this->db->get_where('user',['user_id' => $user_id])->row_array();
	}

	public function getAllProduct()
	{
		$this->db->order_by('name', 'RANDOM');
		return $this->db->get_where('product',['is_active' => 1 ])->result_array();
	}

	public function getProductByProductId($product_id)
	{
		return $this->db->get_where('product',['product_id' => $product_id, 'is_active' => 1 ])->result_array();
	}

	public function getProductByShopId($shop_id)
	{
		return $this->db->get_where('product',['shop_id' => $shop_id, 'is_active' => 1 ])->result_array();
	}

	
}




?>