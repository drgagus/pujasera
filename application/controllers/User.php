<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('company_model');
	}

	public function index()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Profil Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer',$data);

	}

	public function edit()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Ubah Profil';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('name', 'name', 'required|trim',[
			'required'=>'Nama lengkap tidak boleh kosong'
		]);
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required|trim|is_natural_no_zero',[
			'required'=>'No handphone (WhatsApp) harus diisi',
			'is_natural_no_zero' => 'Masukkan nomor tanpa angka nol'
			]);

		if ($this->form_validation->run()==false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
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
                	if ($old_image != 'default.jpg'){
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
			
			$this->db->set('name',$name);
			$this->db->set('phonenumber',$phonenumber);
			$this->db->where('email',$email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Akun berhasil diubah</div>');
			redirect('user');
		}
		

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
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/password', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$current_password = $data['user']['password'];
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password1');
				if (!password_verify($old_password,$current_password)){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
					redirect('user/password');
				}else{
							if (password_verify($new_password,$current_password)){
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
							redirect('user/password');
							}else{
								$this->db->set('password',password_hash($new_password,PASSWORD_DEFAULT));
								$this->db->where('email',$this->session->userdata('email'));
								$this->db->update('user');
								$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Password Berhasil Diubah</div>');
							redirect('user/password');

							}
				}

		}
		
	}

}