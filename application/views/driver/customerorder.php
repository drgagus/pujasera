
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

         <!--  <div class="row">
          	<div clss="col-sm-12"> -->
          		<?= $this->session->flashdata('message'); ?>
          		<?php foreach ($customer_id as $customer) : ?>
          			<div class="alert alert-success" role="alert">

          		<?php 

          		$customer_id = $customer['user_id'];

          		$querycustomer = "SELECT `user`.`name`, `user`.`phonenumber`
	                        FROM `user`
	                       WHERE `user`.`user_id` = $customer_id
	                    ";
	            $customer = $this->db->query($querycustomer)->row_array();
          		
	            $queryorder = "SELECT *
	                        FROM `order_checkout`
	                       WHERE `order_checkout`.`user_id` = $customer_id
	                    ";
	            $order = $this->db->query($queryorder)->row_array();

	            $shop_id = $order['shop_id'];
	            $queryshopcustomer = "SELECT *
	                        FROM `shop`
	                       WHERE `shop`.`shop_id` = $shop_id
	                    ";
	            $shopcustomer = $this->db->query($queryshopcustomer)->row_array();
	            $user_shop_id = $shopcustomer['user_id'];

	            $queryusershop = "SELECT `user`.`phonenumber`
	                        FROM `user`
	                       WHERE `user`.`user_id` = $user_shop_id
	                    ";
	            $usershop = $this->db->query($queryusershop)->row_array();

	            echo '<div class="row">
	            <div class="col-sm-4">';

					echo '<div class="alert alert-warning" role="alert"><table><tr><td>PEMESAN</td><td> : </td><td> '.$customer['name'].'</td></tr><tr><td></td><td></td><td> '.$order['destination'].'</td></tr><tr><td></td><td></td><td><a href="https://wa.me/62'.$customer['phonenumber'].'" target=_blank>Hubungi Saya</a></td></tr></table></div>';
					
					echo '</div>
							<div class="col-sm-4">';

					echo '<div class="alert alert-warning" role="alert"><table><tr><td>WARUNG</td><td> : </td><td> '.$shopcustomer['name'].'</td></tr><tr><td></td><td></td><td> '.$shopcustomer['address'].'</td></tr><tr><td></td><td></td><td><a href="https://wa.me/62'.$shopcustomer['phonenumber'].'" target=_blank>Hubungi Saya</a></td></tr></table></div>';
					
					echo '</div></div>';
					

					$queryproduct = "SELECT *
	                        FROM `order_checkout`
	                       WHERE `order_checkout`.`user_id` = $customer_id
	                       AND `order_checkout`.`shop_id` = $shop_id
	                    ";
	              $product = $this->db->query($queryproduct)->result_array();
	              ?>

	    <form method="post" action="<?= base_url(); ?>driver/takeorder">
                    <input type="hidden"  id="customer_id" name="customer_id" value="<?= $customer_id ;?>">
                    <input type="hidden"  id="shop_id" name="shop_id" value="<?= $shop_id ;?>">
                          
                
			
          		<div class="table-responsive-lg">
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No.</th>
				      <th scope="col">Nama Makanan</th>
				      <th scope="col">@ Harga</th>
				      <th scope="col">Jumlah</th>
				      <th scope="col">Total Harga</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1 ; 
				  		  $total = 0 ;
				  	?>
				  	<?php foreach ($product as $p) : ?>
				  		<?php
				  			$product_id = $p['product_id'] ;
					  		$queryproduct = "SELECT *
		                        FROM `product`
		                       WHERE `product`.`product_id` = $product_id
		                    ";
				            $product = $this->db->query($queryproduct)->row_array();
			            ?>
				    <tr>
				      <th scope="row"><?= $no++ ?></th>
				      <td><?= $product['name']; ?></td>
				      <td><?= number_format($product['price'], 0, ",", "."); ?></td>
				      <td><?= $p['quantity']; ?></td>
				      <td>Rp. <?= number_format($product['price']*$p['quantity'], 0, ",", ".");?>,-</td>
				      <?php $total += ($product['price']*$p['quantity']) ?>
				    </tr>
				<?php endforeach ?>
				<tr><td>TOTAL HARGA</td><td></td><td></td><td></td><td>Rp. <?= number_format($total, 0, ",", ".") ; ?>,-</td></tr>
				<tr><td>ONGKOS</td><td></td><td></td><td></td><td>Rp. <?= number_format($order['cost'], 0, ",", ".") ; ?>,-</td></tr>
				<tr><td>YANG HARUS DIBAYAR</td><td></td><td></td><td></td><td>Rp. <?= number_format(($total+$order['cost']), 0, ",", ".") ; ?>,-</td></tr>
				  </tbody>
				</table>
			</div>

			<div class="row mb-3">
                   	<div class="col-sm-8">
        				<button type="submit" class="btn btn-primary btn-user btn-block">ANTAR PESANAN</button>
				    </div>
				</div>
        </form>   
    </div>
		<?php endforeach ?>

          	<!-- </div>
          </div> -->

        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->



      
