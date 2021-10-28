<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

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
		$data['title'] = 'Toko Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('shop/index', $data);
		$this->load->view('templates/footer',$data);

	}

	public function product()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Produk Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();
		
		if ($data['shop']){
			$data['product']= $this->db->get_where('product', ['shop_id'=>$data['shop']['shop_id']])->result_array();
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('shop/product', $data);
		$this->load->view('templates/footer',$data);

	}

	public function create_shop()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Toko Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();

		if ($data['shop'] == null ){

			$this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[shop.name]',[
				'required'=>'Nama Toko belum diisi',
				'is_unique' => 'Nama Toko Sudah Ada Yang Punya'
				]);
			$this->form_validation->set_rules('address', 'Address', 'required|trim', [
				'required'=>'Alamat belum diisi'
				]);
			$this->form_validation->set_rules('about', 'About', 'required|trim', [
				'required'=>'Deskripsi toko belum diisi belum diisi'
				]);
			$this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|trim|integer', [
				'required'=>'Nomor handphone belum diisi',
				'integer' => 'Masukkan hanya angka saja'
				]);
			$this->form_validation->set_rules('open', 'Open', 'required|trim', [
				'required'=>'Jam toko buka belum diisi belum diisi'
				]);
			$this->form_validation->set_rules('closed', 'Closed', 'required|trim', [
				'required'=>'Jam toko tutup belum diisi belum diisi'
				]);

			if ($this->form_validation->run()==false){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('shop/create_shop', $data);
				$this->load->view('templates/footer',$data);
			}else{
				$data = [
						'user_id' => $data['user']['user_id'],
						'name' => $this->input->post('name'),
						'about' => $this->input->post('about'),
						'address' => $this->input->post('address'),
						'phonenumber' => $this->input->post('phonenumber'),
						'open' => $this->input->post('open'),
						'closed' => $this->input->post('closed'),
						'is_active' => 1
				];
				$this->db->insert('shop',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Toko Anda Berhasil Dibuat</div>');
				redirect('shop');
			}

		}else{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('shop/blocked', $data);
			$this->load->view('templates/footer',$data);
		}



	}

	public function add_product()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Produk Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();

		if ($data['shop']['is_active'] == 1) {

			$this->form_validation->set_rules('name', 'Name', 'required|trim',[
				'required'=>'Nama Toko belum diisi'
				]);
			$this->form_validation->set_rules('about', 'About', 'required|trim', [
				'required'=>'Deskripsi produk belum diisi'
				]);
			$this->form_validation->set_rules('price', 'Price', 'required|numeric|trim', [
				'required'=>'Harga belum diisi',
				'numeric' => 'Harga harus diisi dengan angka saja'
				]);
			// $this->form_validation->set_rules('image', 'Image', 'required', [
			// 	'required'=>'Foto Belum Dimasukkan'
			// 	]);

			if ($this->form_validation->run()==false){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('shop/add_product', $data);
				$this->load->view('templates/footer',$data);
			}else{

				$upload_image = $_FILES['image']['name'];

				if ($upload_image){
					$config['upload_path'] = './assets/img/product/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '2048';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image'))
	                {
	                	$image = $this->upload->data('file_name');
	                    $data = [
						'shop_id' => $data['shop']['shop_id'],
						'name' => $this->input->post('name'),
						'about' => $this->input->post('about'),
						'price' => $this->input->post('price'),
						'image' => $image,
						'is_active' => 0
				];
				$this->db->insert('product',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Produk Anda Berhasil Ditambahkan</div>');
				redirect('shop/product');
	                }
	                else
	                {
	                   echo $this->upload->display_errors();
	                }

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal! Foto Tidak Dimasukkan</div>');
					redirect('shop/add_product');
				}

			}

		}else{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('shop/blocked', $data);
			$this->load->view('templates/footer',$data);
		}

		
		

	}

	public function edit_shop()
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Toko Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();
		$shop_id = $data['shop']['shop_id'];

		// $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[shop.name]',[
		// 		'required'=>'Nama Toko belum diisi',
		// 		'is_unique' => 'Nama Toko Sudah Ada Yang Punya'
		// 		]);
		$this->form_validation->set_rules('address', 'Address', 'required|trim', [
				'required'=>'Alamat belum diisi'
				]);
		$this->form_validation->set_rules('about', 'About', 'required|trim', [
				'required'=>'Deskripsi toko belum diisi'
				]);
		$this->form_validation->set_rules('handphone', 'Handphone', 'required|trim', [
				'required'=>'Nomor handphone belum diisi'
				]);

		if ($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('shop/edit_shop', $data);
			$this->load->view('templates/footer',$data);
		}else{
			$data = [
						'user_id' => $data['user']['user_id'],
						'name' => $this->input->post('name'),
						'about' => $this->input->post('about'),
						'address' => $this->input->post('address'),
						'handphone' => $this->input->post('handphone'),
						'open' => $this->input->post('open'),
						'closed' => $this->input->post('closed'),
						'is_active' => 1
				];

			$this->db->where('shop_id', $shop_id);
			$this->db->update('shop', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Toko Berhasil Diubah</div>');
			redirect('shop');
		}

		

	}

	public function edit_product($id)
	{
		$data['company']= $this->company_model->getCompany();
		$data['title'] = 'Produk Saya';
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();
		$data['product']= $this->db->get_where('product', ['shop_id'=>$data['shop']['shop_id'],'product_id'=>$id])->row_array();

		if ($data['product']){
			$shop_id = $data['shop']['shop_id'];

			$this->form_validation->set_rules('name', 'Name', 'required|trim', [
				'required'=>'Nama harus diisi'
				]);
			$this->form_validation->set_rules('price', 'Price', 'required|trim', [
				'required'=>'Harga harus diisi'
				]);

        	if ($this->form_validation->run() == false){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('shop/edit_product', $data);
				$this->load->view('templates/footer',$data);
			}else{

				$upload_image = $_FILES['image']['name'];

			if ($upload_image){
				$config['upload_path'] = './assets/img/product/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
                	$old_image = $data['product']['image'];
                	unlink (FCPATH.'assets/img/product/'.$old_image);
                	$new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);
					$this->db->where('shop_id',$shop_id);
					$this->db->where('product_id',$id);
					$this->db->update('product');
                }else{
                   echo $this->upload->display_errors();
                }

			}

				$data = [
						'product_id' => $id,
						'shop_id' => $shop_id,
						'name' => $this->input->post('name'),
						'about' => $this->input->post('about'),
						'price' => $this->input->post('price'),
						'is_active' => 1
				];

			$this->db->where('shop_id', $shop_id);
			$this->db->where('product_id', $id);
			$this->db->update('product', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Produk Berhasil Diubah</div>');
			redirect('shop/product');
		}
        }else{
        	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk Gagal DiEdit</div>');
			redirect('shop/product');
        }
	}

	public function delete_product($id)
	{
		$data['user']= $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['shop']= $this->db->get_where('shop', ['user_id'=>$data['user']['user_id']])->row_array();
		$data['product']= $this->db->get_where('product', ['shop_id'=>$data['shop']['shop_id'],'product_id'=>$id])->row_array();

        if ($data['product']){
        	$image = $data['product']['image'];
        	unlink (FCPATH.'assets/img/product/'.$image);

	        $this->db->where('shop_id', $data['shop']['shop_id']);
			$this->db->where('product_id', $id);
			$this->db->delete('product');
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Produk Berhasil Dihapus</div>');
			redirect('shop/product');
        }else{
        	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk Gagal Dihapus</div>');
			redirect('shop/product');
        }
        
	
	}

}