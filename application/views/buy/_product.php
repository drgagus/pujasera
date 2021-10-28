

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Pilih Makanan</h1>
          <div class="row">

              <?php foreach ($product as $product) : ?>
            <div class="col-sm-4">
            <div class="card">
              <img src="<?= base_url('assets/img/product/').$product['image'];?>" class="card-img-top" >
              <div class="card-body">
                <h5 class="card-title">Rp. <?= number_format($product['price'], 0, ",", "."); ?>,-</h5>
                <p class="card-text"><?= $product['name'] ?></p>
               <a href="<?= base_url('cart/add_cart/').$product['product_id']; ?>" class="badge badge-primary">beli</a>
              </div>
            </div>
           </div>
           <?php endforeach ; ?>
         
       </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
