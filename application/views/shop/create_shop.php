
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">BUAT TOKO</h1>

          <div class="row">
          	<div class="col-sm-6">

          		<form class="user" method="post" action="<?= base_url(); ?>shop/create_shop">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Toko" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Alamat toko" value="<?= set_value('address'); ?>">
                  <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="about" name="about" placeholder="Deskripsi toko" value="<?= set_value('about'); ?>">
                  <?= form_error('about', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Nomor phonenumber" value="<?= set_value('phonenumber'); ?>">
                  <?= form_error('phonenumber', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label>OPEN : </label><input type="time" class="form-control" id="open" name="open" placeholder="Jam Buka">
                  </div>
                  <?= form_error('open', '<small class="text-danger pl-3">', '</small>'); ?>
                  <div class="col-sm-4">
                    <label>CLOSED : </label><input type="time" class="form-control" id="closed" name="closed" placeholder="Jam Tutup">
                  </div>
                  <?= form_error('closed', '<small class="text-danger pl-3">', '</small>'); ?>

                </div>


                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Buat Toko
                </button>
            </div>
              </form>

          	</div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
