
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <div class="row">
            <div class="col-sm-4">
              <?= $this->session->flashdata('message'); ?>
          <br><label class="text-uppercase"><?= $company['name'] ; ?></label>
          <br>
          <br><?= $company['about1'] ; ?>
          <br><?= $company['about2'] ; ?>
          <br><?= $company['about3'] ; ?>
          <br>
          <br><?= $company['created'] ; ?>
          <br><?= $company['aboutme'] ; ?>
          <br><?= $company['email'] ; ?>
        </div>

        <div class="col-sm-6">
          <label class="">Ubah Profil Perusahaan</label>
          <form action="<?= base_url(); ?>admin" method="post">

           <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama Perusahaan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" >
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="about1" class="col-sm-3 col-form-label">Deskripsi Paragrap 1</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="about1" name="about1" >
            <?= form_error('about1', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="about2" class="col-sm-3 col-form-label">Deskripsi Paragrap 2</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="about2" name="about2" >
            <?= form_error('about2', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="about3" class="col-sm-3 col-form-label">Deskripsi Paragrap 3</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="about3" name="about3" >
            <?= form_error('about3', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="created" class="col-sm-3 col-form-label">Created</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="created" name="created" value="<?= $company['created']; ?>" readonly>
            <?= form_error('created', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="aboutme" class="col-sm-3 col-form-label">Tentang Saya</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="aboutme" name="aboutme" value="<?= $company['aboutme']; ?>" readonly>
            <?= form_error('aboutme', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email Saya</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="email" name="email" value="<?= $company['email']; ?>" readonly>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
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

      
