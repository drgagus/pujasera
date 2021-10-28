

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Selamat Datang Di Warung - Warung Kami</h1>

          <div class="row">
          <?php foreach ($shop as $shop) : ?>
            <div class="col-lg-3">
          <div class="col-lg-4" >
            <?= $this->session->flashdata('message'); ?></div>
            <div class="card border-dark mb-3" style="max-width: 25rem;">
              <div class="card-header text-uppercase"><?= $shop['name']; ?></div>
              <div class="card-body text-dark">
                <h5 class="card-title"><?= $shop['address']; ?></h5>
                <p class="card-text"><?= $shop['about']; ?></p>
                <div class="text-right">
                <a class="btn btn-primary" href='<?= base_url(); ?>buy/shopbyid/<?= $shop['shop_id']; ?>'>Kunjungi Warung</a></div>
              </div>
            </div>
          </div>
             <?php endforeach ; ?>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
