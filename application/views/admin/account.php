
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

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
				      <th scope="col">User</th>
				      <th scope="col">Status</th>
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
				      <td><?php $role_id = $account['role_id']; 
				      			$user_id = $account['user_id']; 
				      			if ($role_id == 2){ 
				      				echo "<a href='".base_url()."admin/changeroleid/".$user_id."/3' class='badge badge-info' >PENJUAL</a>"; 
				      			}elseif ($role_id == 3){ 
				      				echo "<a href='".base_url()."admin/changeroleid/".$user_id."/2' class='badge badge-warning' >PEMBELI</a>"; 
				      			}elseif($role_id == 4){ 
				      				echo "<a href='' class='badge badge-success'>PENGANTAR</a>"; 
				      			}else{ 
				      				echo "<a href='' class='badge badge-dark'>ADMIN</a>"; 
				      			} ?>
		      		   </td>

				      <td><?php $user_id = $account['user_id']; if ($account['is_active'] == 1){ echo "<a href='accountactived/".$user_id."/0' class='badge badge-primary' >Aktif</a>"; }else{ echo "<a href='accountactived/".$user_id."/1' class='badge badge-danger'>NonAktif</a>"; } ?></td>
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



      
