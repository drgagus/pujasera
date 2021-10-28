<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('company_model');

		// if (!$this->session->userdata('email')){
		// 	redirect('auth');
		// }
	}


	public function index()
	{
		$data['company']= $this->company_model->getCompany();
		$this->load->model('buy_model');
		$data['product']= $this->buy_model->getAllProduct();
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header_public', $data);
		$this->load->view('buy/index', $data);
		$this->load->view('templates/footer_public', $data);
	}

	public function shop()
	{
		$data['company']= $this->company_model->getCompany();
		$this->load->model('buy_model');
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Pujasera Natuna';

			$data['shop']= $this->buy_model->getAllShop();
			$this->load->view('templates/header_public', $data);
			$this->load->view('buy/shop', $data);
			$this->load->view('templates/footer_public',$data);
	}

	public function shopbyid($id)
	{
		$data['company']= $this->company_model->getCompany();

		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = $data['company']['name'];

		$this->load->model('buy_model');
		$data['shop']= $this->buy_model->getShopByShopId($id);
		$data['product']= $this->buy_model->getProductByShopId($id);
		$data['image']= $this->buy_model->getImageUser($data['shop']['user_id']);

		$this->load->view('templates/header_public', $data);
		$this->load->view('buy/shopbyid', $data);
		$this->load->view('templates/footer_public',$data);
	}

	public function product()
	{
		$data['company']= $this->company_model->getCompany();
		$this->load->model('buy_model');
		$data['product']= $this->buy_model->getAllProduct();

		$data['title'] = 'Buy Product';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_public', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('buy/product', $data);
		$this->load->view('templates/footer',$data);

	}

	public function email_me()
	{
		$data['company']= $this->company_model->getCompany();
		
		$data['title'] = 'Email Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_public', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('buy/email_me', $data);
		$this->load->view('templates/footer',$data);

	}

	public function whatsapp_me()
	{
		$data['company']= $this->company_model->getCompany();
		
		$data['title'] = 'Email Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_public', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('buy/whatsapp_me', $data);
		$this->load->view('templates/footer',$data);

	}

	public function buy()
	{
		$data['company']= $this->company_model->getCompany();
		$this->load->model('buy_model');
		$data['product']= $this->buy_model->getAllProduct();
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header_public', $data);
		$this->load->view('buy/buy', $data);
		$this->load->view('templates/footer_public', $data);
		
	}

}