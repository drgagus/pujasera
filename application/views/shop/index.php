
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

          <?php if ($shop): ?>
            <div style="max-width: 25rem;" ><?= $this->session->flashdata('message'); ?></div>
            <div class="card border-dark mb-3" style="max-width: 25rem;">
              <div class="card-header text-uppercase"><strong><?= $shop['name']; ?></strong>
                <?php if ($shop['is_active']==1) : ?>
                    <label class="text-primary" > (Toko Aktif)</label>
                  <?php else : ?>
                    <label class="text-danger" > (Toko Non Aktif)</label>
                  <?php endif ; ?>
              </div>
              <div class="card-body text-dark">
                <h5 class="card-title">OPEN : <?= $shop['open']." - ".$shop['closed']; ?></h5>
                <p class="card-text"><?= $shop['about']; ?></p>
                 <p class="card-text"><?= $shop['address']; ?></p>
                <p class="card-text">+62 <?= $shop['phonenumber']; ?></p>
                <div class="text-right">
                <a href="<?= base_url('shop/edit_shop') ;?>"  class="btn btn-primary" >UBAH</a></div>
              </div>
            </div>
           <?php else : ?>
            <a href="<?= base_url(); ?>shop/create_shop" class="btn btn-primary">BUAT TOKO</a>
          <?php endif ; ?>

        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Button trigger modal -->


      
