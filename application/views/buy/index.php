
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="<?= base_url('assets/img/banner/banner1.jpg');?>">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?= base_url('assets/img/banner/banner2.jpg');?>">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?= base_url('assets/img/banner/banner3.jpg');?>">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

       <?= $this->session->flashdata('message'); ?>
        <div class="row">
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
                <a href="<?= base_url('buy/shopbyid/').$product['shop_id']; ?>" class="badge badge-info ">WARUNG</a>
                <a href="<?= base_url('cart/add_cart/').$product['product_id']; ?>" class="badge badge-primary ">BELI</a>
              </div>
            </div>
          </div>
        <?php endforeach ;?>
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 