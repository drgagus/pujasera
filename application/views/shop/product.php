
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

         <!--  <div class="row">
          	<div clss="col-sm-12"> -->
          		
          		 <?= $this->session->flashdata('message'); ?>

          <?php if ($shop): ?>

          	<?php if ($shop['is_active'] == 1 ) : ?>
          	<a href="<?= base_url(); ?>shop/add_product" class="btn btn-primary mb-3">BUAT PRODUK</a>
          	<?php else : ?>
          	<a href="" class="btn btn-danger mb-3">TOKO NON AKTIF</a>
          <?php endif ; ?>
            <div class="table-responsive-lg">
            <table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No.</th>
				      <th scope="col">Gbr</th>
				      <th scope="col">Nama Produk</th>
				      <th scope="col">Deskripsi</th>
				      <th scope="col">Harga</th>
				      <th scope="col">Status</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no=1 ; ?>
				  	<?php foreach ($product as $product) : ?>
				    <tr>
				      <th scope="row"><?= $no++ ; ?></th>
				      <td><a href="<?= base_url('assets/img/product/').$product['image'];?>" target=_blank><img class="img-tumbnail" src="<?= base_url('assets/img/product/').$product['image'];?>" style="width:50px" ></a></td>
				      <td><?= $product['name'] ; ?></td>
				      <td><?= $product['about'] ; ?></td>
				      <td>Rp. <?= number_format($product['price'], 0, ",", "."); ?>,-</td>
				      <td>
				      	<?php if ($product['is_active']==1) : ?>
                    <label class="text-primary" >Aktif</label>
                  <?php else : ?>
                    <label class="text-danger" >Non Aktif</label>
                  <?php endif ; ?>
				      </td>
				      <td><a href="<?= base_url();?>shop/edit_product/<?= $product['product_id']; ?>" class='badge badge-primary'>UBAH</a> <a href="<?= base_url();?>shop/delete_product/<?= $product['product_id']; ?>" class='badge badge-danger' onclick="return confirm('Yakin Hapus Produk Ini?');">HAPUS</a>
				      </td>
				    </tr>
				<?php endforeach ; ?>
				  </tbody>
				</table>
			</div>
           
           <?php else : ?>
            
           	<a href="<?= base_url(); ?>shop/create_shop" class="btn btn-primary">BUAT TOKO</a>

          <?php endif ; ?>

		      <!-- </div>
		  </div> -->

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
