
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
         

          <!-- <div class="row">
          	<div class="col-sm-6"> -->
          		 <?= $this->session->flashdata('message'); ?>
          <?php foreach ($cart as $c) : ?>
          		<?php
	             $shop_id = $c['shop_id'] ;
	             $queryshop = "    SELECT *
	                        FROM `shop`
	                       WHERE `shop`.`shop_id` = $shop_id
	                    ";
	              $shop = $this->db->query($queryshop)->result_array();
	       ?>
	       
<!-------------FORM ORDER --------------------->
<form action="<?= base_url('cart'); ?>" method="post" >
	<div class="form-group">
		<input type="text" class="form-control form-control-user" id="destination" name="destination" placeholder="Masukkan Alamat Tujuan Pengiriman">
		<?= form_error('destination', '<small class="text-danger pl-3">', '</small>'); ?>
	</div>

	             <?php foreach ($shop as $s) : ?>
	             	 
	             	<a href="<?= base_url('buy/shopbyid/').$s['shop_id']; ?>" class="btn btn-primary"><?= $s['name']; ?></a>
	             	

		             	<?php
					      $shop_id = $s['shop_id'];
					      $user_id = $user['user_id'];
					      $queryProduct = "    SELECT *
					                        FROM `cart` JOIN `product` 
					                          ON `cart`.`product_id` = `product`.`product_id`
					                       WHERE `cart`.`shop_id` = $shop_id AND `cart`.`user_id` = $user_id
					                    ";
					      $product = $this->db->query($queryProduct)->result_array();
      					?>

      					<!-- <div class="row">
          					<div class="col-sm"> -->
          						<div class="table-responsive-lg">
          						<table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">No.</th>
								      <th scope="col">Gambar</th>
								      <th scope="col">Nama Makanan</th>
								      <th scope="col">Harga</th>
								      <th scope="col">Jumlah</th>
								      <th scope="col"></th>
								      <th></th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php $no = 1 ; ?>
								  	<?php foreach ($product as $p) : ?>
								  		
								  		<input type="hidden" name="<?= "shop_id".$s['shop_id'] ;?>" value="<?= $s['shop_id'] ; ?>">
								    <tr>
								      <th scope="row"><?= $no++ ?></th>
								      <td><a href="<?= base_url('assets/img/product/').$p['image'];?>" target=_blank ><img class="img-tumbnail" src="<?= base_url('assets/img/product/').$p['image'];?>" style="width:50px" ></a></td>
								      <td><?= $p['name'] ; ?></td>
								      <td>Rp. <?= number_format($p['price'], 0, ",", ".") ; ?>,-</td>
								      
								      <td>

								      <input type="number" class="col-sm-3" name="<?= "quantity".$p['cart_id'] ;?>" value=1>
								      <input type="hidden" name="<?= "product_id".$p['cart_id'] ;?>" value="<?= $p['product_id'] ; ?>">

								      </td>
								      <td><a href="<?= base_url('cart/delete/').$p['product_id'] ; ?>" class="badge badge-danger ml-3" onclick="return confirm('Yakin Hapus Dari Keranjang Ini?');" >hapus</a></td>
								    </tr>

								<?php endforeach; ?>
								<td></td><td></td><td></td><td></td><td></td><td><button  class="btn btn-secondary" type="submit" id="checkout" name="<?= "tombol".$s['shop_id'] ;?>" value="<?= $s['shop_id'] ;?>"><img src="<?= base_url('assets/img/cart/cart.png');?>" style="width:20px"> PESAN</button></td>
								  </tbody>
								</table>
							</div>
      						<!-- </div>
      					</div> -->

	             <?php endforeach ; ?>
</form>
<!-------------END FORM ORDER --------------------->
	             <br><br>
          		
          <?php endforeach ; ?>

     <!--  </div>
  </div> -->
         



          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
