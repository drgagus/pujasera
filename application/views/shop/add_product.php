
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">TAMBAH PRODUK</h1>

          <div class="row">
          	<div class="col-sm-6">
               <?= $this->session->flashdata('message'); ?>

          		<?= form_open_multipart('shop/add_product'); ?>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="about" name="about" placeholder="Deskripsi Produk" value="<?= set_value('about'); ?>">
                  <?= form_error('about', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="row">
                  <div class="col-sm-4">

                <div class="form-group">
                  <input type="text" class="form-control" id="price" name="price" placeholder="Harga" value="<?= set_value('price'); ?>">
                  <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                   <div class="custom-file">
                    <input type="file" class="custom-file-input" id ="image" name="image" >
                    <label class="custom-file-label" for="image">Pilih gambar produk</label>
                    <?= form_error('image', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>


                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Tambah Produk
                </button>
            </div>
              </form>

          	</div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
