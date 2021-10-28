<?php
class cart_model extends CI_model{

	public function getProductByProductId($product_id)
	{
		return $this->db->get_where('product',['product_id' => $product_id, 'is_active' => 1 ])->row_array();
	}

	public function getShop($user_id)
	{
		
		$this->db->distinct();
		$this->db->select('shop_id');
		$this->db->where('user_id', $user_id);
		return $this->db->get('cart')->result_array();

	}

	public function getProductByUserIdProductId($user_id, $product_id)
	{
		return $this->db->get_where('cart',['user_id' => $user_id, 'product_id' => $product_id])->result_array();
	}

	public function getCartByUserIdAndShopId($user_id,$shop_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('shop_id', $shop_id);
		return $this->db->get('cart')->result_array();

	}

	public function insertOrderCheckout($user_id,$shop_id,$product_id,$quantity,$destination,$cost,$time)
	{
		$data = [
			'user_id' => $user_id,
			'shop_id' => $shop_id,
			'product_id' => $product_id,
			'quantity' => $quantity,
			'destination' => $destination,
			'cost' => $cost,
			'time' => $time
		];

		$this->db->insert('order_checkout', $data);
	}

	public function deleteCart($user_id,$shop_id,$product_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('shop_id', $shop_id);
		$this->db->where('product_id', $product_id);
		$this->db->delete('cart');
		
	}

	public function selectOrder($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->result_array();
	}

	public function getShopOrder($user_id)
	{
		$this->db->distinct();
		$this->db->select('shop_id');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->row_array();
	}

	public function getDestinationOrder($user_id)
	{
		$this->db->distinct();
		$this->db->select('destination');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->row_array();
	}

	public function getDriverOrder($user_id)
	{
		$this->db->distinct();
		$this->db->select('driver_id');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->row_array();
	}

	public function getCostOrder($user_id)
	{
		$this->db->distinct();
		$this->db->select('cost');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->row_array();
	}

	public function getShopName($shop_id)
	{
		$this->db->select('*');
		$this->db->where('shop_id', $shop_id);
		return $this->db->get('shop')->row_array();

	}

	public function cekOrder($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		return $this->db->get('order_checkout')->row_array();

	}

	public function deleteorder($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete('order_checkout');
	}



	
}

?>