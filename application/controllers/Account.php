<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('company_model');
		$this->load->model('account_model');
	}

	public function index()
	{
		$data['account']= $this->account_model->getAllAccount();
		$data['title'] = 'Akun';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('account/index', $data);
		$this->load->view('templates/footer',$data);

	}

	public function seller()
	{
		$data['account']= $this->account_model->getSellerAccount();
		$data['title'] = 'Akun Penjual';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('account/seller', $data);
		$this->load->view('templates/footer',$data);
	}

	public function addseller()
	{
		
		$data['title'] = 'Akun Penjual';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->form_validation->set_rules('name', 'Fullname', 'required|trim', [
			'required' => 'Nama Lengkap harus diisi'
			]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'required'=>'Email harus diisi',
			'is_unique'=> 'Email ini telah terdaftar sebelumnya',
			'valid_email'=> 'Email yang dimasukkan salah'
			]);
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required|trim|integer',[
			'required'=>'No handphone (WhatsApp) harus diisi',
			'integer' => 'Masukkan hanya angka saja'
			]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required'=>'Password harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Password tidak sama'
			]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('account/add_seller', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phonenumber' => $this->input->post('phonenumber'),
					'image' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 1,
					'date_created' => time()
			];
			$this->db->insert('user',$data);

			// $this->_sendEmail();

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Membuat Akun.</div>');
			redirect('account/seller');
		}
		
	}

	public function buyer()
	{
		$data['account']= $this->account_model->getBuyerAccount();
		$data['title'] = 'Akun Pembeli';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('account/buyer', $data);
		$this->load->view('templates/footer',$data);
	}

	public function driver()
	{
		$data['account']= $this->account_model->getDriverAccount();
		$data['title'] = 'Akun Driver';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('account/driver', $data);
		$this->load->view('templates/footer',$data);
	}

	public function adddriver()
	{
		
		$data['title'] = 'Akun Driver';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->form_validation->set_rules('name', 'Fullname', 'required|trim', [
			'required' => 'Nama Lengkap harus diisi'
			]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'required'=>'Email harus diisi',
			'is_unique'=> 'Email ini telah terdaftar sebelumnya',
			'valid_email'=> 'Email yang dimasukkan salah'
			]);
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required|trim|integer',[
			'required'=>'No handphone (WhatsApp) harus diisi',
			'integer' => 'Masukkan hanya angka saja'
			]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required'=>'Password harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Password tidak sama'
			]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('account/add_driver', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$upload_image = $_FILES['image']['name'];
			if ($upload_image){
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image'))
                {
                	$image = $this->upload->data('file_name');

					$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phonenumber' => $this->input->post('phonenumber'),
					'image' => $image,
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 4,
					'is_active' => 1,
					'date_created' => time()
			];
			$this->db->insert('user',$data);

			// $this->_sendEmail();

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Membuat Akun.</div>');
			redirect('account/driver');


                }
                else
                {
                   echo $this->upload->display_errors();
                }

			}else{
				$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phonenumber' => $this->input->post('phonenumber'),
					'image' => 'driver.jpg',
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 4,
					'is_active' => 1,
					'date_created' => time()
			];
			$this->db->insert('user',$data);

			// $this->_sendEmail();

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Membuat Akun.</div>');
			redirect('account/driver');
			}


			
		}
	}

	public function editdriver($driver_id)
	{
		
		$data['title'] = 'Akun Driver';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		$data['driver'] = $this->account_model->getDriverById($driver_id);
		
		$this->form_validation->set_rules('name', 'Fullname', 'required|trim', [
			'required' => 'Nama Lengkap harus diisi'
			]);
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required|trim|integer',[
			'required'=>'No handphone (WhatsApp) harus diisi',
			'integer' => 'Masukkan hanya angka saja'
			]);
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('account/edit_driver', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$email = $this->input->post('email');
			$name = $this->input->post('name');
			$phonenumber = $this->input->post('phonenumber');

			$upload_image = $_FILES['image']['name'];

			if ($upload_image){
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image'))
                {
                	$old_image = $data['user']['image'];
                	if ($old_image != 'driver.jpg'){
                		unlink (FCPATH.'assets/img/profile/'.$old_image);
                	}
                	$new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);
					$this->db->where('email',$email);
					$this->db->update('user');
                }
                else
                {
                   echo $this->upload->display_errors();
                }

			}
			
			$this->account_model->editDriverById($name,$phonenumber,$email,$driver_id);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Akun Driver berhasil diubah</div>');
			redirect('account/driver');
		}
	}

	public function selleraccountactived($user_id,$id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('account_model');
		$this->account_model->accountActived($user_id,$id);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Aktivasi Akun Berhasil Diubah.</div>');
		redirect('account/seller');
	}

	public function buyeraccountactived($user_id,$id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('account_model');
		$this->account_model->accountActived($user_id,$id);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Aktivasi Akun Berhasil Diubah.</div>');
		redirect('account/buyer');
	}

	public function driveraccountactived($user_id,$id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('account_model');
		$this->account_model->accountActived($user_id,$id);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Aktivasi Akun Berhasil Diubah.</div>');
		redirect('account/driver');
	}

	
}