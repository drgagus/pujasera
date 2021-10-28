
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <a href="<?= base_url('account/adddriver'); ?>" class="btn btn-primary">+ DRIVER</a>
          <?= $this->session->flashdata('message'); ?>
         <!--  <div class="row">
          	<div clss="col-sm-12"> -->
          		<div class="table-responsive-lg">
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No.</th>
				      <th scope="col">Poto Profil</th>
				      <th scope="col">Nama Lengkap</th>
				      <th scope="col">Email</th>
				      <th scope="col">Status</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1 ; ?>
				  	<?php foreach ($account as $account) : ?>
				    <tr>
				      <th scope="row"><?= $no++ ?></th>
				      <td><a href="<?= base_url('assets/img/profile/').$account['image'];?>" target=_blank ><img class="img-tumbnail" src="<?= base_url('assets/img/profile/').$account['image'];?>" style="width:50px" ></a></td>
				      <td><?= $account['name']; ?></td>
				      <td><?= $account['email']; ?></td>
				      <td><?php $user_id = $account['user_id']; if ($account['is_active'] == 1){ echo "<a href='driveraccountactived/".$user_id."/0' class='badge badge-primary' >Aktif</a>"; }else{ echo "<a href='driveraccountactived/".$user_id."/1' class='badge badge-danger'>NonAktif</a>"; } ?></td>
				      	<td><a href="" class="badge badge-danger" onclick="return confirm('Yakin Hapus Driver Ini?');">hapus</a>
				      	<a href="<?= base_url('account/editdriver/').$account['user_id']; ?>" class="badge badge-info">edit</a>
				      </td>
				    </tr>
				<?php endforeach; ?>
				  </tbody>
				</table>
			</div>

          	<!-- </div>
          </div> -->

        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->



      
