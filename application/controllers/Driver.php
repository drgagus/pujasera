<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('company_model');
		$this->load->model('driver_model');
	}

	public function index()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Profil Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_driver', $data);
		$this->load->view('driver/index', $data);
		$this->load->view('templates/footer',$data);

	}

	

	public function password()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Ubah Password';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('old_password', 'old_password', 'required|trim',[
			'required'=>'Password lama harus diisi'
		]);
		$this->form_validation->set_rules('new_password1', 'new_password1', 'required|trim|min_length[3]|matches[new_password2]', [
			'required'=>'Password baru harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Password baru tidak sama'
			]);
		$this->form_validation->set_rules('new_password2', 'new_password2', 'required|trim|matches[new_password1]',[
			'required'=>'Password baru harus diisi',
			'matches' => 'Password baru tidak sama'
		]);


		if ($this->form_validation->run()==false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_driver', $data);
			$this->load->view('driver/password', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$current_password = $data['user']['password'];
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password1');
				if (!password_verify($old_password,$current_password)){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
					redirect('driver/password');
				}else{
							if (password_verify($new_password,$current_password)){
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
							redirect('driver/password');
							}else{
								$this->db->set('password',password_hash($new_password,PASSWORD_DEFAULT));
								$this->db->where('email',$this->session->userdata('email'));
								$this->db->update('user');
								$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Password Berhasil Diubah</div>');
							redirect('driver/password');

							}
				}

		}
		
	}

	public function customerorder()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Daftar Pesanan';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['customer_id']= $this->driver_model->getcustomer();
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_driver', $data);
		$this->load->view('driver/customerorder', $data);
		$this->load->view('templates/footer',$data);

	}

	public function takeorder()
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$driver_id = $data['user']['user_id'];

		$customer_id = $this->input->post('customer_id');
		$shop_id = $this->input->post('shop_id');

		$cekdriver = $this->driver_model->cekDriver($customer_id,$shop_id);
		if ($cekdriver['driver_id']){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesanan Sudah Diambil Pengantar Lain!</div>');
				redirect('driver/customerorder');
		}else{
			$cekorder = $this->driver_model->cekOrder($driver_id);
			if ($cekorder) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Masih Memiliki Pesanan Yang Belum Diantar!</div>');
				redirect('driver/customerorder');
			}else{
				$data['customerorder'] = $this->driver_model->getOrder($customer_id,$shop_id);
				foreach ($data['customerorder'] as $co){
					$this->driver_model->takeOrder($customer_id,$shop_id,$driver_id);	
				}
				$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Pesanan Berhasil Masuk!</div>');
				redirect('driver/mydelivery');
			}
		}

		
		
	}

	public function mydelivery()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Antar Pesanan';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['delivery'] = $this->driver_model->getDelivery($data['user']['user_id']);
		if ($data['delivery']){
			$data['shop'] = $this->driver_model->getShopNameAddress($data['delivery'][0]['shop_id']);
			$data['customer'] = $this->driver_model->getCustomerName($data['delivery'][0]['user_id']);
		}else{
			
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_driver', $data);
		$this->load->view('driver/mydelivery', $data);
		$this->load->view('templates/footer',$data);

	}

	public function deletedelivery()
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->driver_model->deleteDelivery($data['user']['user_id']);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Pengantaran Telah Dibatalkan!</div>');
		redirect('driver/mydelivery');

	}

}