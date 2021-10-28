

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php if ($shop) : ?>
            <h1 class="h3 mb-4 text-gray-800">Selamat Datang Di <?= $shop['name']; ?></h1>
          <?php else : ?>
            <h1 class="h3 mb-4 text-gray-800">Warung Tidak Ada</h1>
          <?php endif ; ?>

         <div class="row">
        <?php if ($product) : ?>
              <?php foreach ($product as $product) : ?>
            <div class="col-sm-2">
            <div class="card">
              <img src="<?= base_url('assets/img/product/').$product['image'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rp. <?= number_format($product['price'], 0, ",", "."); ?>,-</h5>
                <p class="card-text"><?= $product['name'] ?></p>
               <a href="<?= base_url('cart/add_cart/').$product['product_id']; ?>" class="badge badge-primary">beli</a>
              </div>
            </div>
           </div>
           <?php endforeach ; ?>
        <?php else : ?>
          <h5 class="ml-3">Maaf, Warung Sedang Kosong</h5>
        <?php endif ;?>
       </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
