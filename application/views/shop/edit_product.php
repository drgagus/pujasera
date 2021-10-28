
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">UBAH PRODUK</h1>

          <div class="row">

            <div class="col-sm-2">
              <img class="img-thumbnail" src="<?= base_url('assets/img/product/').$product['image'] ?>" />
            </div>

          	<div class="col-sm-4">
               <?= $this->session->flashdata('message'); ?>

          		<?= form_open_multipart('shop/edit_product/'.$product["product_id"]); ?>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" value="<?= $product['name']; ?>">
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="about" name="about" placeholder="Deskripsi Produk" value="<?= $product['about']; ?>">
                  <?= form_error('about', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="row">
                  <div class="col-sm-4">

                <div class="form-group">
                  <input type="text" class="form-control" id="price" name="price" placeholder="Harga" value="<?= $product['price']; ?>">
                  <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                   <div class="custom-file">
                  <input type="file" class="custom-file-input" id ="image" name="image" >
                  <label class="custom-file-label" for="image">Pilih gambar produk</label>
                </div>
                </div>
              </div>
            </div>

        <div class="form-group row text-right">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">UBAH</button>
          </div>
        </div>



          	</div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
