
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

          <!-- <div class="row">
          	<div clss="col-sm-12"> -->
          		<div class="table-responsive-lg">
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No.</th>
				      <th scope="col">Gambar Produk</th>
				      <th scope="col">Nama Produk</th>
				      <th scope="col">Deskripsi</th>
				      <th scope="col">Harga</th>
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1 ; ?>
				  	<?php foreach ($product as $product) : ?>
				  	<?php	$shop_id = $product['shop_id'] ; 
				  			$product_id = $product['product_id'] ; 
				  	?>
				    <tr>
				      <th scope="row"><?= $no++ ?></th>
				      <td><a href="<?= base_url('assets/img/product/').$product['image'];?>" ><img class="img-tumbnail" src="<?= base_url('assets/img/product/').$product['image'];?>" style="width:50px" ></a></td>
				      <td><?= $product['name']; ?></td>
				      <td><?= $product['about']; ?></td>
				      <td>Rp. <?= number_format($product['price'], 0, ",", "."); ?>,-</td>
				      <td><?php if ($product['is_active'] == 1){ echo "<a href='".base_url()."admin/productactived/".$shop_id."/".$product_id."/0' class='badge badge-primary' >Aktif</a>"; }else{ echo "<a href='".base_url()."admin/productactived/".$shop_id."/".$product_id."/1' class='badge badge-danger'>NonAktif</a>"; } ?></td>
				    </tr>
				<?php endforeach; ?>
				  </tbody>
				</table>
			</div>

          	<!-- </div>
          </div> -->

        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->



      
