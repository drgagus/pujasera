<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <?= $this->session->flashdata('message'); ?>
<?php if ($shop_order) : ?>          
              <?php
              
               $shop_id = $shop_order['shop_id'] ;
               $queryshop = "    SELECT *
                          FROM `shop`
                         WHERE `shop`.`shop_id` = $shop_id
                      ";
                $shop = $this->db->query($queryshop)->row_array();
         ?>
      <div class="row">
        <div class="col-sm-4">
         <div class="alert alert-warning" role="alert"><table><tr><td>PEMESAN</td><td> : </td><td><?= $user['name'] ; ?></td></tr><tr><td></td><td></td><td><?= $destination_order['destination'] ; ?></td></tr></table></div>
       </div>
        <div class="col-sm-4">   
         <div class="alert alert-warning" role="alert"><table><tr><td>WARUNG</td><td> : </td><td><?= $shop['name'] ; ?></td></tr><tr><td></td><td></td><td><?= $shop['address'] ; ?></td></tr></table></div>
         </div>
     </div>
          
          
        
          <div class="table-responsive-lg">
                      <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama Makanan</th>
                      <th scope="col">@ Harga</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total Harga</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ; $total = 0 ?>
                   <?php foreach ($order_checkout as $order) : ?>
                      <tr>
                      <th scope="row"><?= $no++ ?></th>
            <?php
                $product_id = $order['product_id'];
                
                $queryProduct = "    SELECT *
                                  FROM `product`
                                 WHERE `product_id` = $product_id
                              ";
                $product = $this->db->query($queryProduct)->row_array();
            ?>
                      <td><?= $product['name'];?></td>
                      <td>@ Rp. <?= number_format($product['price'], 0, ",", ".");?>,-</td>
                      <td><?= $order['quantity'];?></td>
                      <td>Rp. <?= number_format(($product['price'] * $order['quantity']), 0, ",", ".") ;?>,-</td>
                      <?php $total += ($product['price'] * $order['quantity']) ; ?>
                    </tr>

                <?php endforeach; ?>
                <tr><th scope="row">Total Harga</th><td></td><td></td><td></td><td>Rp. <?= number_format($total, 0, ",", "."); ?> ,-</td></tr>
                <tr><th scope="row">Ongkos</th><td></td><td></td><td></td><td>Rp. <?= number_format($cost_order['cost'], 0, ",", "."); ?> ,-</td></tr>
                <tr><th scope="row">Yang Harus Dibayar</th><td></td><td></td><td></td><th>Rp. <?= number_format(($total+$cost_order['cost']), 0, ",", "."); ?> ,-</th></tr>
                  </tbody>
                </table>
              </div>

          <?php if ($driver_order['driver_id'] != 0) : ?>
          <?php
                $driver_id = $driver_order['driver_id'];
                
                $queryDriver = "    SELECT *
                                  FROM `user`
                                 WHERE `user_id` = $driver_id
                              ";
                $driver = $this->db->query($queryDriver)->row_array();
            ?>
        <!-- <a href="" class="btn btn-info" >CHECK-DRIVER</a> -->
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/').$driver['image']; ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Pengantar : <?= $driver['name']; ?></h5>
                  <p class="card-text"><a href="https://wa.me/62<?= $driver['phonenumber'] ; ?>" target=_blank>Hubungi Pengantar</a></p>
                  <p class="card-text"><small class="text-muted">Driver Since : <?= date('d F Y', $driver['date_created']) ; ?></small></p>
                </div>
              </div>
            </div>
          </div>
        <?php else : ?>
        <!-- <a href="" class="btn btn-info mb-3">CHECK-DRIVER</a>
        <br> -->
        <?php endif ;?>

          <a href="<?= base_url('cart/deleteorder');?>" class="btn btn-danger" onclick="return confirm('Yakin Pesanan Anda Dibatalkan?');">BATAL</a>
          <a href="<?= base_url('cart/finishorder');?>" class="btn btn-primary" onclick="return confirm('Yakin Pesanan Anda Sudah Diantar?');">SELESAI</a>
<?php else : ?>
              <a href="" class="btn btn-primary" >ANDA TIDAK ADA PESANAN</a>
<?php endif ; ?>
          
            


         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
