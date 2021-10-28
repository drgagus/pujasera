<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('company_model');
		$this->load->model('cart_model');

	}

	public function index()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Keranjang Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['cart']= $this->cart_model->getShop($data['user']['user_id']);
		
		$this->form_validation->set_rules('destination', 'Destination', 'required|trim', [
			'required'=>'Alamat belum diisi'
			]);

		if ($this->form_validation->run()==false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('cart/index', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$this->_checkout();
		}
		

	}

	public function delete($product_id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$user_id = $data['user']['user_id'];

		$this->db->where('user_id', $user_id);
		$this->db->where('product_id', $product_id);
		$this->db->delete('cart');
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Makanan Berhasil Dihapus Dari Keranjang</div>');
		redirect('cart');
	}

	public function add_cart($product_id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$user_id = $data['user']['user_id'];
		$data['product']= $this->cart_model->getProductByProductId($product_id);
		$shop_id = $data['product']['shop_id'];
		
		$data['checkproduct']= $this->cart_model->getProductByUserIdProductId($user_id, $product_id);
		if ($data['checkproduct']){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Makanan Sudah Ada Di Keranjang</div>');
			redirect('cart');
		}else{
			$data = [
					'user_id' => $user_id,
					'shop_id' => $shop_id,
					'product_id' => $product_id,
			];
			$this->db->insert('cart',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Makanan Berhasil Masuk Keranjang</div>');
			redirect('cart');
		}	

	}

	public function _checkout()
	{

		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Pesanan Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['cart']= $this->cart_model->getShop($data['user']['user_id']);
		$data['order'] = $this->cart_model->cekOrder($data['user']['user_id']);

		if ($data['order']){
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf. Anda Tidak Dapat Melakukan Pemesanan Karena Pesanan Anda Sebelumnya Belum Selesai.</div>');
			redirect('cart/myorder');

		}else{

			foreach ($data['cart'] as $cart){
				if ($this->input->post('shop_id'.$cart["shop_id"])){
					//var_dump( $this->input->post('shop_id'.$cart["shop_id"]) );

					$data['product'] = $this->cart_model->getCartByUserIdAndShopId($data['user']['user_id'],$cart['shop_id']);

					foreach ($data['product'] as $product){

						//echo "<br>".$product['cart_id'] ;
						$user_id= $data['user']['user_id'];
						$shop_id = $this->input->post('shop_id'.$cart["shop_id"]);
						$product_id = $this->input->post('product_id'.$product["cart_id"]);
						$quantity = $this->input->post('quantity'.$product["cart_id"]);
						$destination = $this->input->post('destination');
						$cost = 20000 ;
						$time = time();
						
						$this->cart_model->insertOrderCheckout($user_id,$shop_id,$product_id,$quantity,$destination,$cost,$time);
						$this->cart_model->deleteCart($user_id,$shop_id,$product_id);
					}
					$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Terima Kasih. Pesanan Anda Akan Segera Dikirim Oleh Driver Kami</div>');
					redirect('cart/myorder');

				}else{
					
				}
			}

		}

		
	}

	public function myorder()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Pesanan Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop_order']= $this->cart_model->getShopOrder($data['user']['user_id']);
		$data['destination_order']= $this->cart_model->getDestinationOrder($data['user']['user_id']);
		$data['driver_order']= $this->cart_model->getDriverOrder($data['user']['user_id']);
		$data['cost_order']= $this->cart_model->getCostOrder($data['user']['user_id']);
		$data['order_checkout'] = $this->cart_model->selectOrder($data['user']['user_id']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('cart/myorder', $data);
		$this->load->view('templates/footer',$data);
	}

	public function deleteorder()
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->cart_model->deleteorder($data['user']['user_id']);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Pesanan Anda Telah Dibatalkan!</div>');
		redirect('cart/myorder');

	}

	public function finishorder()
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->cart_model->deleteorder($data['user']['user_id']);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Terima kasih, Pesanan Anda Telah Diantar!</div>');
		redirect('cart/myorder');

	}

}