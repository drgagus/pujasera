<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Ya" jika kamu yakin ingin keluar dari halaman ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

<br><br><br>
 <!-- Footer -->
  <footer class="bg-dark fixed-bottom">
    <div class="container">
      <small>
      <p class="m-0 text-center text-white">Copyright &copy; <?= $company['name']; ?> <?= date('Y');?></p>
      <p class="m-0 text-center text-white">Created by <a href="http://www.drgagus.com" class="card-link" target=_blank >drg.agus</a></p>
      <p class="m-0 text-center text-white">
        <a href="https://wa.me/6285264659191" target=_blank class="badge badge-light" >WhatsApp Me</a> <a href="mailto:agsur137@gmail.com" target=_blank class="badge badge-light">E-mail Me</a>
      </p>
    </small>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

</body>

</html>
