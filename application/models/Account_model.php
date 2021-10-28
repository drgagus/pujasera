<?php
class account_model extends CI_model{

	public function getAllAccount()
	{
		$this->db->order_by('user_id', 'ASC');
		return $this->db->get('user')->result_array();
	}

	public function getDriverById($driver_id)
	{
		$this->db->where('role_id', 4);
		$this->db->where('user_id', $driver_id);
		return $this->db->get('user')->row_array();
	}

	public function accountActived($user_id,$id)
	{
		$this->db->set('is_active',$id);
		$this->db->where('user_id',$user_id);
		$this->db->update('user');
	}

	public function changeRoleId($user_id,$id)
	{
		$this->db->set('role_id',$id);
		$this->db->where('user_id',$user_id);
		$this->db->update('user');
	}

	public function getSellerAccount()
	{
		$this->db->order_by('user_id', 'ASC');
		$this->db->where('role_id', 2);
		return $this->db->get('user')->result_array();
	}

	public function getBuyerAccount()
	{
		$this->db->order_by('user_id', 'ASC');
		$this->db->where('role_id', 3);
		return $this->db->get('user')->result_array();
	}

	public function getDriverAccount()
	{
		$this->db->order_by('user_id', 'ASC');
		$this->db->where('role_id', 4);
		return $this->db->get('user')->result_array();
	}

	public function editDriverById($name,$phonenumber,$email,$driver_id)
	{
		$this->db->set('name',$name);
		$this->db->set('phonenumber',$phonenumber);
		$this->db->where('email',$email);
		$this->db->where('user_id',$driver_id);
		$this->db->update('user');
	}


	
}

?>