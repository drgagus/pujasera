<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('company_model');
	}

	public function index()
	{
		$data['title'] = 'Profil Perusahaan';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();

		$this->form_validation->set_rules('name', 'name', 'required|trim', [
			'required'=>'Nama perusahaan harus diisi'
			]);
		$this->form_validation->set_rules('about1', 'about1', 'required|trim', [
			'required'=>'Deskripsi perusahaan harus diisi'
			]);
		$this->form_validation->set_rules('about2', 'about2', 'required|trim', [
			'required'=>'Deskripsi perusahaan harus diisi'
			]);
		$this->form_validation->set_rules('about3', 'about3', 'required|trim', [
			'required'=>'Deskripsi perusahaan harus diisi'
			]);

		if ($this->form_validation->run()==false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/index', $data);
			$this->load->view('templates/footer',$data);
		}else{
				$data['company']= $this->company_model->editCompany();
				$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Profil Perusahaan Berhasil Diubah</div>');
				redirect('admin');
		}
		

	}

	public function account()
	{
		$this->load->model('account_model');
		$data['account']= $this->account_model->getAllAccount();
		$data['title'] = 'Daftar Akun';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/account', $data);
		$this->load->view('templates/footer',$data);

	}

	public function accountactived($user_id,$id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('account_model');
		$this->account_model->accountActived($user_id,$id);
		redirect('admin/account');
	}

	public function changeRoleId($user_id,$role_id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('account_model');
		$this->account_model->changeRoleId($user_id,$role_id);
		redirect('admin/account');
	}

	public function shop()
	{
		$this->load->model('shop_model');
		$data['shop']= $this->shop_model->getAllShop();
		$data['title'] = 'Daftar Toko';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/shop', $data);
		$this->load->view('templates/footer',$data);

	}

	public function shopactived($shop_id,$id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('shop_model');
		$this->shop_model->shopActived($shop_id,$id);
		redirect('admin/shop');
	}

	public function productactived($shop_id,$product_id,$id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->model('shop_model');
		$this->shop_model->productActived($shop_id,$product_id,$id);
		redirect('admin/product');
	}

	public function product()
	{
		$this->load->model('product_model');
		$data['product']= $this->product_model->getAllProduct();
		$data['title'] = 'Daftar Produk';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['company']= $this->company_model->getCompany();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/product', $data);
		$this->load->view('templates/footer',$data);

	}

}