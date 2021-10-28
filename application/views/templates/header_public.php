<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $company['name'];?></title>

  <link href="<?= base_url('assets/') ;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/shop-homepage.css'); ?>" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('buy');?>"><?= $company['name'];?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('buy/shop');?>">Warung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('buy');?>">Makanan</a>
          </li>
          <?php if ($user) : ?>
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $user['name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url(); ?>user">
            <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
            Pengaturan
          </a>
                <?php if ($user['role_id'] == 3) : ?>
                    <a class="dropdown-item" href="<?= base_url(); ?>cart">
                    <i class="fas fa-cart-arrow-down fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keranjang Saya
                    </a>
                <?php endif ;?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
          </a>
        </div>
      </li>


          <?php else : ?>
         
      <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth');?>">Daftar/Login</a>
          </li>
          <?php endif;?>

        

        </ul>
      </div>
    </div>
  </nav>
