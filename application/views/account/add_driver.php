
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

          <div class="row">
            <div class="col-lg-5">
          <?= $this->session->flashdata('message'); ?>
         	<?= form_open_multipart('account/adddriver'); ?>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="phonenumber" name="phonenumber" placeholder="Nomor Handphone (WhatsApp)" value="<?= set_value('phonenumber'); ?>">
                  <?= form_error('phonenumber', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password (min: 8 karakter)">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ketik Ulang Password">
                  </div>
                </div>

                <div class="form-group">
	                <div class="custom-file">
	                  <input type="file" class="custom-file-input" id ="image" name="image" >
	                  <label class="custom-file-label" for="image">Pilih gambar profil</label>
	                  <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
	                </div>
	              </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Akun
                </button>
              </form>
          </div>
      </div>

        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->



      
