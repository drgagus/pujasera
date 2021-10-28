<?php
class shop_model extends CI_model{

	public function getAllShop()
	{
		return $this->db->get('shop')->result_array();
	}

	public function shopActived($shop_id,$id)
	{
		$this->db->set('is_active',$id);
		$this->db->where('shop_id',$shop_id);
		$this->db->update('shop');
	}

	public function productActived($shop_id,$product_id,$id)
	{
		$this->db->set('is_active',$id);
		$this->db->where('shop_id',$shop_id);
		$this->db->where('product_id',$product_id);
		$this->db->update('product');
	}

	public function getShopById($shop_id)
	{
		return $this->db->get_where('shop',['shop_id'=>$shop_id])->result_array();
	}

	
}




?>