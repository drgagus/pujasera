<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('company_model');
		
	}

	public function index()
	{
		$data['company']= $this->company_model->getCompany();
		$this->form_validation->set_rules('email', 'Email', 'required|trim',[
			'required'=>'Email belum diisi'
			]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'=>'Password belum diisi'
			]);

		if ($this->form_validation->run() == false){
			$data['tittle'] = "FORM LOGIN" ;
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login',$data);
			$this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}
		
	}

	private function _login()
	{
		$data['company']= $this->company_model->getCompany();
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user',['email'=> $email])->row_array();
		if($user){
			if ($user['is_active']==1){
				if (password_verify($password, $user['password'])){
					$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id']==1){
						redirect('admin');
					}elseif ($user['role_id']==2){
						redirect('shop');
					}elseif ($user['role_id']==3){
						$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Berhasil Masuk</div>');
						redirect('buy');
					}elseif ($user['role_id']==4){
						redirect('driver');
					}else{
						redirect('auth');
					}
					
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang dimasukkan salah</div>');
					redirect('auth');
				}

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi</div>');
				redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang dimasukkan belum terdaftar</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
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
			$data['tittle'] = "FORM REGISTRATION";
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		}else{
			$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phonenumber' => $this->input->post('phonenumber'),
					'image' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 3,
					'is_active' => 1,
					'date_created' => time()
			];
			$this->db->insert('user',$data);

			// $this->_sendEmail();

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Membuat Akun.</div>');
			redirect('auth');
		}
		
	}

	private function _sendEmail()
	{
		$data['company']= $this->company_model->getCompany();
		$config=[
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_user' => 'pujasera.natuna@gmail.com',
				'smtp_pass' => 'Pujaser4',
				'smtp_port' => 465,
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				// 'newline'   => "\r\n"
		];
		
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('natuna.pujasera@gmail.com', $data['company']['name']);
		$this->email->to('agsur137@gmail.com');
		$this->email->subject($data['company']['name'].' - Aktivasi');
		$this->email->message('selamat datang di '.$data['company']['name']);

		if($this->email->send())
		{
			return true ;

		}else{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function logout()
	{
		// $data = [
		// 			'email' => $this->session->userdata('email'),
		// 			'role_id' => $this->session->userdata('role_id')
		// 		];
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Keluar</div>');
		redirect('buy');
	}

	public function blocked()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Access Blocked';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('auth/blocked', $data);
		$this->load->view('templates/footer',$data);
	}

}
