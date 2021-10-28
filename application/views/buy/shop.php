
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

        <div class="row">
          <?php foreach ($shop as $shop) : ?>
            <?php
              $userid=$shop['user_id'];;
              
              $queryUser = "    SELECT `user`.`image`
                                FROM `user`
                                WHERE `user_id` = $userid  
                            ";
              $user = $this->db->query($queryUser)->row_array();
              ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              
              <div class="card-body">
                <h4 class="card-title">
                  <a href="<?= base_url(); ?>buy/shopbyid/<?= $shop['shop_id']; ?>"><?= $shop['name'] ?></a>
                </h4>
                <h5><?= $shop['address'] ?></h5>
                <p class="card-text"><?= $shop['about'] ?></p>
              </div>
              <div class="card-footer text-right">
                OPEN  <?= date("H:i", strtotime($shop['open']))." - ".date("H:i", strtotime($shop['closed'])); ?>
              </div>
            </div>
          </div>
        <?php endforeach ;?>
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 