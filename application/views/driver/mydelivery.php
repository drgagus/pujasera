

    
          

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <?= $this->session->flashdata('message'); ?>
<?php if ($delivery) : ?>
          <div class="row">
            <div class="col-sm-4">   
             <div class="alert alert-warning" role="alert"><table><tr><td>PEMESAN</td><td> : </td><td><?= $customer['name'] ; ?></td></tr><tr><td></td><td></td><td><?= $delivery[0]['destination'] ; ?></td></tr><tr><td></td><td></td><td><a href="https://wa.me/62<?= $customer['phonenumber'] ; ?>" target=_blank>Hubungi Saya</a></td></tr></table></div>
             </div>
              <div class="col-sm-4">
             <div class="alert alert-warning" role="alert"><table><tr><td>WARUNG</td><td> : </td><td><?= $shop['name'] ; ?></td></tr><tr><td></td><td></td><td><?= $shop['address'] ; ?></td></tr><tr><td></td><td></td><td><a href="https://wa.me/62<?= $shop['phonenumber'] ; ?>" target=_blank>Hubungi Saya</a></td></tr></table></div>
           </div>
         </div>
       

         <!--  <div class="row">
            <div clss="col-sm-12"> -->
              <div class="table-responsive-lg">
              <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Makanan</th>
              <th scope="col">@ Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ; 
                  $total = 0 ;
            ?>
            <?php foreach ($delivery as $d) : ?>
              <?php
                $product_id = $d['product_id'] ;
                $queryproduct = "SELECT *
                            FROM `product`
                           WHERE `product`.`product_id` = $product_id
                        ";
                    $product = $this->db->query($queryproduct)->row_array();
              ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $product['name']; ?></td>
              <td>@ Rp. <?= number_format($product['price'], 0, ",", "."); ?></td>
              <td><?= $d['quantity']; ?></td>
              <td>Rp. <?= number_format($product['price']*$d['quantity'], 0, ",", ".") ; ?></td>
              <?php $total += ($product['price']*$d['quantity']) ; ?>
            </tr>
            <?php endforeach ; ?>
            <tr><th>TOTAL HARGA</th><td></td><td></td><td></td><td>Rp. <?= number_format($total, 0, ",", ".") ; ?>,-</td></tr>
            <tr><th>ONGKOS</th><td></td><td></td><td></td><td>Rp. <?= number_format($d['cost'], 0, ",", ".") ; ?>,-</td></tr>
            <tr><th>YANG HARUS DIBAYARKAN</th><td></td><td></td><td></td><td>Rp. <?= number_format($total+$d['cost'], 0, ",", ".") ; ?>,-</td></tr>
          </tbody>
        </table>
      </div>

      <a href="<?= base_url('driver/deletedelivery');?>" class="btn btn-danger" onclick="return confirm('Yakin Dibatalkan?');">BATAL</a>

            <!-- </div>
          </div> -->
<?php endif ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
