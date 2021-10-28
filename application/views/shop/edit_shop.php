
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">UBAH TOKO</h1>

          <div class="row">
            <div class="col-lg-5">
              

          <form method="post" action="<?= base_url('shop/edit_shop'); ?>">

           <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama Toko</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="<?= $shop['name']; ?>" readonly>
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="about" class="col-sm-3 col-form-label">Deskripsi Toko</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="about" name="about" value="<?= $shop['about']; ?>">
            <?= form_error('about', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Alamat Toko</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="address" name="address" value="<?= $shop['address']; ?>">
            <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="handphone" class="col-sm-3 col-form-label">Nomor Handphone</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="handphone" name="handphone" value="<?= $shop['handphone']; ?>">
            <?= form_error('handphone', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
           <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="open">OPEN : </label>
              <input type="time" class="form-control" id="open" name="open" value="<?= $shop['open']; ?>">
              <?= form_error('open', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
                  
            <div class="col-sm-4">
              <label for="closed">CLOSED : </label>
              <input type="time" class="form-control" id="closed" name="closed" value="<?= $shop['closed']; ?>">
              <?= form_error('closed', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
       </div>

       

        <div class="form-group row text-right">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">UBAH</button>
          </div>
        </div>

        </div>
      </div>

         



          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
