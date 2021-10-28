<?php
class company_model extends CI_model{

	public function getCompany()
	{
		
		return $this->db->get('company')->row_array();
	}

	public function editCompany()
	{
		$data = [
						'id' => 1,
						'name' => $this->input->post('name'),
						'about1' => $this->input->post('about1'),
						'about2' => $this->input->post('about2'),
						'about3' => $this->input->post('about3'),
				];

		
		$this->db->where('id', 1);
		$this->db->update('company', $data);
	}

}

?>