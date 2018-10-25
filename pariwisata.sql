-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2018 at 09:06 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_ads`
--

CREATE TABLE `cat_ads` (
  `idcat` int(11) NOT NULL,
  `namecat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_ads`
--

INSERT INTO `cat_ads` (`idcat`, `namecat`) VALUES
(1, 'HOTEL'),
(2, 'INFO KULINER'),
(3, 'EVENT');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `idcity` int(11) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`idcity`, `city`) VALUES
(1, 'Bandung'),
(2, 'Bandung Barat');

-- --------------------------------------------------------

--
-- Table structure for table `info_ads`
--

CREATE TABLE `info_ads` (
  `idinfoads` int(11) NOT NULL,
  `idmaininfo` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `telp` varchar(150) NOT NULL,
  `price` varchar(120) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = on, 1 = off, 2 = pendding',
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_ads`
--

INSERT INTO `info_ads` (`idinfoads`, `idmaininfo`, `iduser`, `idcat`, `title`, `desc`, `address`, `telp`, `price`, `image`, `status`, `link`) VALUES
(1, 1, 0, 1, 'Hotel a', 'ini hotel', 'jl. hotel', '022 - 9848485', '250000', '1.jpg', 0, ''),
(2, 1, 0, 1, 'Hotel b', 'ini hotel', 'jl. hotel', '022 - 9848485', '250000', '2.jpg', 0, ''),
(3, 1, 0, 2, 'Sega Kucing', 'Sega Kucing adalah makanan yang enak lezat dan bergizi', 'Jalan Hula', '0831092312', '12000', '0', 0, 'http://asik.asik.jos'),
(4, 1, 0, 3, 'Festival Taman Bunga', 'Festival taman bunga merupakan festival hits pada jaman now', 'Jalan Kalimantan', '0831203812038', '120000', '', 0, 'http://asikasdik.com');

-- --------------------------------------------------------

--
-- Table structure for table `maininfo`
--

CREATE TABLE `maininfo` (
  `idmaininfo` int(11) NOT NULL,
  `idcity` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `address` varchar(250) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `weekday` varchar(200) NOT NULL,
  `weekend` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `image5` varchar(200) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maininfo`
--

INSERT INTO `maininfo` (`idmaininfo`, `idcity`, `title`, `desc`, `address`, `telp`, `weekday`, `weekend`, `image`, `image1`, `image2`, `image3`, `image4`, `image5`, `link`) VALUES
(1, 1, 'Bukit Penjamur Bengkayang', 'Lokasi Bukit Jamur ini terletak di Kabupaten Bengkayang, tepatnya di Kelurahan Bumi Emas Jaku Malunu, Kalimantan Barat. Jarak Bukit Jamur kurang lebih 6 km dari pusat kota Bengkayang. Letak lokasi ini memang sangat strategis dan sangat mudah diakses. Dari Bukit Jamur ini Boboers dapat melihat indahnya lautan awan bak negeri dongeng, apalagi saat sang surya mulai menyembulkan sinarnya secara perlahan, dijamin pemandangan ini akan menjadi salah satu moment terbaik seumur hidup.', 'Bhakti Mulya, Kec. Bengkayang, Kabupaten Bengkayang, Kalimantan Barat 79213', '0229887655', '12.000', '15.000', '1.jpg', '2.jpg', '3.jpg', '', '', '', 'http://localhost/asik-asik'),
(2, 2, 'Pintu Masuk Air Terjun Tikalong', 'Air Terjun Banangar atau sering disebut juga Melanggar, Mananggar, dan Menaggar adalah patahan Sungai Landak yang menjadi wisata alam berupa air terjun yang berada di Kecamatan Air Besar, kabupaten Landak. Letak air terjun ini berada di hulu Sungai Landak, sekitar 290 kilometer arah timur laut Pontianak, ibu kota Provinsi Kalimantan Barat. Ada yang mengatakan bahwa Air Terjun Mananggar (sering juga disebut Air Terjun Melanggar, Menanggar, atau Banangar) merupakan Niagara dari Borneo.<br><br>\r\n\r\nAir Terjun Melanggar memiliki ketinggian sekitar 60 meter dan lebar lebih dari 60 meter yang menyajikan pesona alam yang sangat indah. Akses ke dasar air terjun ini masih sangat sulit sekali. Jalan yang hanya setapak itu tertutup belukar sehingga wisatawan lebih senang menikmati pesonanya dari atas air terjun. Untuk menikmati keindahannya, Anda harus memiliki kesabaran. Anda akan melintasi perjalanan yang panjang, jauh, dan berliku.<br><br>\r\n\r\nUntuk melihat air terjun ini, Anda membutuhkan waktu enam hingga tujuh jam perjalanan dari Pontianak hingga ke Kecamatan Air Besar. Dari sana, Anda harus melakukan perjalanan lagi menggunakan perahu. Akan tetapi, perjalanan panjang dan melelahkan itu akan terbayar kala Anda melihat keindahan buih air yang bertebaran di sekitar area, belum lagi suasana sejuk yang diberikan akan membuat lelah segera hilang. Tidak ada sarana dan prasarana di lokasi air tejun, jadi diharapkan membawa bekal yang cukup selama menempuh perjalanan.<br><br>\r\n\r\nKeunikan dari Air Terjun Banangar ini adalah terdapat danau yang cukup lebar berada di bawah air terjun yang berbentuk bulat dan dapat digunakan untuk mandi, berenang dan memancing ikan ataupun udang. Sedangkan di kiri atas terdapat sebuah tempat untuk memohon rezeki kepada Tuhan sang Pencipta, kegiatan yang sudah dilakukan ratusan tahun yang lalu sampai sekarang ini. Selanjutnya, di atas terdapat Gunung Pejapa dengan ketinggian 1.019 meter yang mengelilingi air terjun ini. Sekeliling lokasi masih terlindungi dengan lebatnya hutan basah khas Kalimantan yang masih utuh. Dan yang terakhir, di seberang sungai terdapat Gua Sanjan yang terdapat air terjun kecil dan sungai kecil.', 'Tunang, Mempawah Hulu, Kabupaten Landak, Kalimantan Barat 79363', '049585', 'Wekday : Rp 12.000<br>Wekend : Rp 15.000', '', '1.jpg', '2.jpg', '3.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '0 = super admin, 1 = admin, 2 = client',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = on, 1 = off'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `name`, `email`, `phone`, `type`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.admin', '0282', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_ads`
--
ALTER TABLE `cat_ads`
  ADD PRIMARY KEY (`idcat`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD UNIQUE KEY `city` (`city`),
  ADD KEY `idcity` (`idcity`);

--
-- Indexes for table `info_ads`
--
ALTER TABLE `info_ads`
  ADD PRIMARY KEY (`idinfoads`);

--
-- Indexes for table `maininfo`
--
ALTER TABLE `maininfo`
  ADD PRIMARY KEY (`idmaininfo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `iduser` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_ads`
--
ALTER TABLE `cat_ads`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `idcity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info_ads`
--
ALTER TABLE `info_ads`
  MODIFY `idinfoads` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maininfo`
--
ALTER TABLE `maininfo`
  MODIFY `idmaininfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
