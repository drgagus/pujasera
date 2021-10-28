
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

          <!-- <div class="row">
          	<div clss="col-sm-12"> -->
          		<div class="table-responsive-lg">
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No.</th>
				      <th scope="col">Nama Toko</th>
				      <th scope="col">Deskripsi</th>
				      <th scope="col">Handphone</th>
				      <th scope="col">Jam Buka</th>
				      <th scope="col">Status</th>
				      <th></th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1 ; ?>
				  	<?php foreach ($shop as $shop) : ?>
				    <tr>
				      <th scope="row"><?= $no++ ?></th>
				      <td><?= $shop['name']; ?></td>
				      <td><?= $shop['about']; ?></td>
				      <td><?= $shop['handphone']; ?></td>
				      <td><?= date("H:i", strtotime($shop['open']))." - ".date("H:i", strtotime($shop['closed'])); ?></td>
				      <td><?php $shop_id = $shop['shop_id']; if ($shop['is_active'] == 1){ echo "<a href='".base_url()."admin/shopactived/".$shop_id."/0' class='badge badge-primary' >Aktif</a>"; }else{ echo "<a href='".base_url()."admin/shopactived/".$shop_id."/1' class='badge badge-danger'>NonAktif</a>"; } ?></td>
				    </tr>
				<?php endforeach; ?>
				  </tbody>
				</table>
			</div>
<!-- 
          	</div>
          </div> -->

        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->



      
