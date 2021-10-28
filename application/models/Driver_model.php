<?php
class driver_model extends CI_model{

	public function getAllOrder()
	{
		$this->db->order_by('order_id', 'ASC');
		return $this->db->get('order_checkout')->result_array();
	}

	public function getShop()
	{
		
		$this->db->distinct();
		$this->db->select('shop_id');
		return $this->db->get('order_checkout')->result_array();

	}

	public function getShopByUser($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->row_array();

	}

	public function getcustomer()
	{
		
		$this->db->distinct();
		$this->db->select('user_id');
		$this->db->where('driver_id', 0);
		return $this->db->get('order_checkout')->result_array();

	}
	
	public function getOrder($customer_id,$shop_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $customer_id);
		$this->db->where('shop_id', $shop_id);
		return $this->db->get('order_checkout')->result_array();

	}

	public function takeorder($customer_id,$shop_id,$driver_id)
	{
		$this->db->set('driver_id',$driver_id);
		$this->db->where('user_id',$customer_id);
		$this->db->where('shop_id',$shop_id);
		$this->db->update('order_checkout');
	}

	public function cekOrder($driver_id)
	{
		$this->db->select('*');
		$this->db->where('driver_id', $driver_id);
		return $this->db->get('order_checkout')->row_array();
	}

	public function cekDriver($customer_id,$shop_id)
	{
		$this->db->select('driver_id');
		$this->db->where('user_id', $customer_id);
		$this->db->where('shop_id', $shop_id);
		return $this->db->get('order_checkout')->row_array();
	}

	public function getDelivery($driver_id)
	{
		$this->db->select('*');
		$this->db->where('driver_id', $driver_id);
		return $this->db->get('order_checkout')->result_array();
	}

	public function getShopNameAddress($shop_id)
	{
		$this->db->select('*');
		$this->db->where('shop_id', $shop_id);
		return $this->db->get('shop')->row_array();
	}

	public function getCustomerName($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		return $this->db->get('user')->row_array();
	}

	public function deleteDelivery($driver_id)
	{
		$this->db->set('driver_id',0);
		$this->db->where('driver_id',$driver_id);
		$this->db->update('order_checkout');
	}
}

?>