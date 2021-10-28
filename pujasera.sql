-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2021 pada 07.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pujasera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `shop_id`, `product_id`, `quantity`) VALUES
(59, 8, 1, 10, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `about1` varchar(1000) NOT NULL,
  `about2` varchar(1000) NOT NULL,
  `about3` varchar(1000) NOT NULL,
  `created` varchar(128) NOT NULL,
  `aboutme` varchar(2000) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `name`, `about1`, `about2`, `about3`, `created`, `aboutme`, `email`) VALUES
(1, 'Pujasera Medan', 'Ini adalah aplikasi e-pujasera yang menjual berbagai macam jajanan rakyat di Natuna.', 'Aplikasi ini masih banyak kekurangan di sana sini. Kritik dan saran yang membangun sangat saya butuhkan untuk pengembangan aplikasi ini. Ke depannya, saya akan membuat aplikasi androidnya untuk mempermudah mengakses melalui smartphone android.', 'Terima kasih Pak Ricky yang telah mendorong saya untuk terus belajar sehingga adanya aplikasi ini.', 'drg. Teuku Agus Surya', 'I am a dentist, husband, father, and programmer ....', 'agsur137@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_checkout`
--

CREATE TABLE `order_checkout` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `destination` varchar(128) NOT NULL,
  `cost` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_checkout`
--

INSERT INTO `order_checkout` (`order_id`, `user_id`, `shop_id`, `product_id`, `quantity`, `destination`, `cost`, `time`, `driver_id`) VALUES
(37, 13, 1, 8, 2, 'jl. M. Nuh Kelarik Puskesmas', 20000, 1584326791, 0),
(38, 13, 1, 9, 3, 'jl. M. Nuh Kelarik Puskesmas', 20000, 1584326791, 0),
(41, 3, 1, 10, 1, 'Puskesmas Ranai', 20000, 1585136370, 9),
(42, 3, 1, 9, 1, 'Puskesmas Ranai', 20000, 1585136370, 9),
(43, 3, 1, 8, 1, 'Puskesmas Ranai', 20000, 1585136370, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `about` varchar(512) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `shop_id`, `name`, `about`, `price`, `image`, `is_active`) VALUES
(8, 1, 'Kebab', 'Kebab dengan berbagai rasa', 50000, 'images_mancanegara_Resep_Kebab_00.jpg', 1),
(9, 1, 'Roti Bakar Bandung', 'Roti sedap mantap', 23000, 'resep_roti_bakar_1.jpg', 1),
(10, 1, 'Thai Tea', 'Teh mantap', 9000, 'f32624bc-9f6d-4d28-9633-bde315f6de5d.jpg', 1),
(11, 8, 'Lontong', 'Lontong Sayur mantap', 17000, '104127_1423633018_0.jpg', 1),
(12, 8, 'Bubur Ayam', 'Bubur Ayam yammy', 12000, 'Resep-Bubur-Ayam.jpg', 1),
(14, 9, 'Kopi Hitam', 'Kopi Anti Ngantuk', 10000, '50de339f-7e20-4738-b9a4-a2ba49991add1.jpg', 1),
(15, 9, 'Sate Ayam', 'Sate ayam kampung mantap', 20000, 'Resep-Sate-Ayam-Madura-1.jpg', 1),
(16, 9, 'Mie Bakso', 'Bakso gaoyang lidah goyang kantong', 35000, 'resep-mie-bakso-780x440.jpg', 1),
(17, 10, 'Bubur Kacang Hijau', 'Bubur kacang hijau dengan mata ikan dan santan mantap', 17000, 'bubur-kacang-ijo-jagung-kesukaan-foto-resep-utama.jpg', 1),
(18, 10, 'Bubur Ayam', 'Bubur Ayam kota', 13000, 'Resep-Bubur-Ayam1.jpg', 1),
(19, 9, 'Martabak Mesir', 'Martabak Mesir Isi Daging', 28000, '27539.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `about` varchar(512) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phonenumber` bigint(15) NOT NULL,
  `open` time NOT NULL,
  `closed` time NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop`
--

INSERT INTO `shop` (`shop_id`, `user_id`, `name`, `about`, `address`, `phonenumber`, `open`, `closed`, `is_active`) VALUES
(1, 4, 'ayra arya dan asyfa', 'menjual makanan khas padang dan minang', 'jl M. Nuh no. 17 Kelarik Bunguran Utara', 236657435, '08:00:00', '23:00:00', 1),
(8, 5, 'Warung Yanti', 'Menjual makanan sarapan pagi', 'jl. soekarno hatta', 8037498374, '06:22:00', '12:22:00', 1),
(9, 6, 'Warung Buk Lila', 'Warung mantap la pokoknya', 'jalan Merak no 69 Ranai', 734982875672, '08:00:00', '17:00:00', 1),
(10, 7, 'Warung buk titi', 'menjual berbagai macam bubur', 'jl bubur no 88 tanjung', 8766743, '05:20:00', '10:25:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phonenumber` bigint(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phonenumber`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Ricky', 'Ricky@gmail.com', 0, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 1, 1, 1582829982),
(3, 'Muhammad Adlin, AMK', 'adlin@gmail.com', 8994956161, '23_.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 3, 1, 1582830540),
(4, 'fadia', 'yusfa@gmail.com', 68546544535, '23_1.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2, 1, 1582915364),
(5, 'sri suryanti', 'yanti@gmail.com', 81211010103, '20_.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2, 1, 1583039185),
(6, 'Dalilawati', 'lila@gmail.com', 0, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2, 1, 1583521374),
(7, 'titi rahman', 'titi@gmail.com', 0, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2, 1, 1583677123),
(8, 'mastari', 'mastari@gmail.com', 0, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 3, 1, 1583677756),
(9, 'Edi Kusnadi Siregar', 'edi@gmail.com', 7678567453, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 4, 1, 1582830540),
(10, 'Hanapi Hurairah', 'hanapi@gmail.com', 876877686857, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 4, 1, 1582830540),
(13, 'kusnadi', 'kusnadi@gmail.com', 81375726159, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 3, 1, 1584326715),
(15, 'munira', 'ira@gmail.com', 81567564, 'default.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2, 1, 1584471301),
(16, 'yahya napitupulu', 'yahya@gmail.com', 81375726159, 'driver.jpg', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 4, 1, 1584471660);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(3, 1, 1),
(4, 1, 4),
(5, 2, 2),
(6, 2, 4),
(7, 3, 4),
(13, 3, 6),
(15, 4, 7),
(16, 4, 8),
(18, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `menu_uri` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `menu_uri`) VALUES
(1, 'Dashboard', 'admin'),
(2, 'Toko', 'shop'),
(3, 'Akun', 'account'),
(4, 'Profil', 'user'),
(5, '', 'buy'),
(6, 'Keranjang', 'cart'),
(7, 'Profil', 'driver'),
(8, 'Pesanan', 'driver');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Seller'),
(3, 'User'),
(4, 'Driver');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Profil Perusahaan', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 4, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 4, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 2, 'Toko Saya', 'shop', 'fas fa-fw fa-store-alt', 1),
(5, 2, 'Produk Saya', 'shop/product', 'fas fa-fw fa-utensils', 1),
(6, 3, 'Akun Penjual', 'account/seller', 'fas fa-fw fa-folder', 1),
(7, 99, 'Daftar Akun', 'admin/account', 'fas fa-fw fa-folder', 1),
(8, 1, 'Daftar Toko', 'admin/shop', 'fas fa-fw fa-store-alt', 1),
(9, 3, 'Akun Pembeli', 'account/buyer', 'fas fa-fw fa-folder-open', 1),
(10, 1, 'Daftar Produk', 'admin/product', 'fas fa-fw fa-utensils', 1),
(11, 4, 'Ubah Password', 'user/password', 'fas fa-fw fa-key', 1),
(12, 6, 'Keranjang Saya', 'cart', 'fas fa-fw fa-cart-arrow-down', 1),
(13, 6, 'Pesanan Saya', 'cart/myorder', 'fas fa-fw fa-cart-arrow-down', 1),
(14, 7, 'Profil Saya', 'driver', 'fas fa-fw fa-user', 1),
(15, 7, 'Ubah Password', 'driver/password', 'fas fa-fw fa-key', 1),
(16, 8, 'Daftar Pesanan', 'driver/customerorder', 'fas fa-fw fa-list', 1),
(17, 8, 'Antar Pesanan', 'driver/mydelivery', 'fas fa-fw fa-motorcycle', 1),
(18, 3, 'Akun Driver', 'account/driver', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `user_id` (`cart_id`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_checkout`
--
ALTER TABLE `order_checkout`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_checkout`
--
ALTER TABLE `order_checkout`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
