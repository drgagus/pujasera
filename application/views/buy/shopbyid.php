

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-12">
        <div class="card mt-4">
          <div class="card-body">
            <h3 class="card-title"><?= $shop['name'];?></h3>
            <h5><?= $shop['address'];?></h5>
            <p class="card-text"><?= $shop['about'];?></p>
            <p class="card-text"><a href="https://wa.me/62<?= $shop['phonenumber'];?>?text=<?= $shop['name'];?>" target=_blank>Hubungi Saya</a></p>
            <span class="text-danger"><?= "OPEN  ".date("H:i", strtotime($shop['open']))." - ".date("H:i", strtotime($shop['closed'])); ?></span>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-lg-12 -->

    </div>


    <div class="row mt-4">
          <?php foreach ($product as $product) : ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" src="<?= base_url('assets/img/product/').$product['image'];?>">
              <div class="card-body">
                <h4 class="card-title">
                  <?= $product['name'] ?>
                </h4>
                <h5>Rp. <?= number_format($product['price'], 0, ",", "."); ?>,-</h5>
                <p class="card-text"><?= $product['about'] ?></p>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('cart/add_cart/').$product['product_id']; ?>" class="badge badge-primary">BELI</a>
              </div>
            </div>
          </div>
        <?php endforeach ;?>
    </div>


  </div>
  <!-- /.container -->

 