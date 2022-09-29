-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 06:50 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yamaha_assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `import_user_temp`
--

CREATE TABLE `import_user_temp` (
  `ID_User_Temp` int(11) NOT NULL,
  `NikUser_Temp` varchar(255) DEFAULT NULL,
  `NamaUser_Temp` varchar(255) DEFAULT NULL,
  `DeptUser_Temp` varchar(255) DEFAULT NULL,
  `Username_Temp` varchar(255) DEFAULT NULL,
  `PassUser_Temp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `import_user_temp`
--

INSERT INTO `import_user_temp` (`ID_User_Temp`, `NikUser_Temp`, `NamaUser_Temp`, `DeptUser_Temp`, `Username_Temp`, `PassUser_Temp`) VALUES
(1, '1234', 'hasan1', 'gudang', 'hasan1', 'adcd7048512e64b48da55b027577886ee5a36350'),
(2, '1235', 'hasan2', 'produksi', 'hasan2', 'adcd7048512e64b48da55b027577886ee5a36350'),
(3, '1236', 'hasan3', 'coloring', 'hasan3', 'adcd7048512e64b48da55b027577886ee5a36350'),
(4, '1237', 'hasan4', 'packing', 'hasan4', 'adcd7048512e64b48da55b027577886ee5a36350'),
(5, '1238', 'hasan5', 'finishing', 'hasan5', 'adcd7048512e64b48da55b027577886ee5a36350'),
(6, '1239', 'hasan6', 'eksport', 'hasan6', 'adcd7048512e64b48da55b027577886ee5a36350'),
(7, '1240', 'hasan7', 'eksport', 'hasan7', 'adcd7048512e64b48da55b027577886ee5a36350'),
(8, '1241', 'hasan8', 'coloring', 'hasan8', 'adcd7048512e64b48da55b027577886ee5a36350'),
(9, '1242', 'hasan9', 'gudang', 'hasan9', 'adcd7048512e64b48da55b027577886ee5a36350'),
(10, '1243', 'hasan10', 'packing', 'hasan10', 'adcd7048512e64b48da55b027577886ee5a36350'),
(11, '1244', 'hasan11', 'produksi', 'hasan11', 'adcd7048512e64b48da55b027577886ee5a36350'),
(12, '1245', 'hasan12', 'finishing', 'hasan12', 'adcd7048512e64b48da55b027577886ee5a36350');

-- --------------------------------------------------------

--
-- Table structure for table `m_asset`
--

CREATE TABLE `m_asset` (
  `ID_Asset` int(11) NOT NULL,
  `KodeAsset` varchar(255) DEFAULT NULL,
  `NamaAsset` varchar(255) DEFAULT NULL,
  `LokasiAsset` int(11) DEFAULT NULL,
  `ImageAsset` text,
  `QrAsset` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_asset`
--

INSERT INTO `m_asset` (`ID_Asset`, `KodeAsset`, `NamaAsset`, `LokasiAsset`, `ImageAsset`, `QrAsset`) VALUES
(3, '12345', 'Tiang Bendera', 2, '7bdc38e0e3817272c80349fe6ef5fb59.jpg', '3.png'),
(8, '423523', 'Mesin Bubut', 4, '41d90ad05a51e3746951ccaad03e0d35.jpg', '8.png'),
(9, '918255209234', 'Tank Anti Bom', 6, 'd3f6f3e766ffea38746a3c1985f6ba1e.jpg', '9.png'),
(10, '898232', 'Kendaraan Amfibi', 6, 'c9d8dfbfd2cc40fc06943475ae02252a.jpg', '10.png'),
(11, '3456332', 'Kendaraan Lapis Baja', 6, '39fe51c9fdd5793ee5f49f70eff0f0fe.jpg', '11.png'),
(12, '9293142', 'Kapal Induk', 6, 'adbf35b58a7043b50b396fbd8ec0a029.jpg', '12.png'),
(14, '43563453', 'Kapal Perang', 6, '952580493e3c5069611107e0b065fdab.jpg', '14.png'),
(15, '123456', 'Palu', 7, '6da39f24593f53632c72af0b84794e4e.jpg', '15.png'),
(16, '2312412', 'Kerdus Berisi Bahan Peledak', 5, 'db51c1da89c87c9e914e34d0f1b85d1e.jpg', '16.png'),
(18, '234234', 'Boba Hitam Meledak', 5, '090a9679005b33967f57c2d160b4a243.jpg', '18.png'),
(19, '325234', 'Solasi Tahan Api Neraka', 5, '56c46f14579ebb98045be3426263570d.jpg', '19.png'),
(20, '324743', 'Solasi Keras ', 5, '6b7b12915b799b67ad00a62433d91359.jpg', '20.png'),
(21, '3142352', 'Pelastik Pembungkus Aib', 5, 'bb144f7bcbfb26668b1d56209ec3cb20.jpg', '21.png'),
(22, '133464354', 'Obeng', 7, '05fbde93f9f5623cbb76e4c0d68d7008.jpg', NULL),
(23, '22242334', 'Baut', 7, '0092dab95ab65357734159be2410dd13.jpg', '23.png'),
(24, '4355542', 'Tang', 7, 'f81c33df715b2bf0d25986afbb50c166.jpeg', '24.png'),
(25, '535345643', 'Tangga', 7, '2f3cd43e27fede7a054382115cc87095.jpg', '25.png'),
(26, '3455545433', 'Kursi', 8, '0e889b118c902f4bfaaaeb6b45f5d856.jpg', '26.png'),
(27, '646663346346', 'Meja', 8, 'c97244895aa16029df6c945431a7aeed.jpg', '27.png'),
(28, '53546363', 'Kaca', 8, 'ecf2c5d67a2e68ef8294e17cc46c96ac.jpg', '28.png'),
(29, '56436623', 'Plitur', 8, '85028f8c824695c34ca56aeb697840d6.jpg', '29.png'),
(30, '4637352', 'Amplas', 8, 'cd6d29c1c713dc5059e134a6c7f8bf21.png', '30.png'),
(31, '63453', 'Mesin Press', 4, 'bcbf90ebb15fbb70998a52a834b9a4dd.jpg', '31.png');

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi`
--

CREATE TABLE `m_lokasi` (
  `ID_Lokasi` int(11) NOT NULL,
  `NamaLokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_lokasi`
--

INSERT INTO `m_lokasi` (`ID_Lokasi`, `NamaLokasi`) VALUES
(1, 'Parkir'),
(2, 'Lapangan'),
(4, 'Produksi'),
(5, 'Packing'),
(6, 'Export'),
(7, 'Gudang '),
(8, 'Finishing');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `ID_User` int(11) NOT NULL,
  `NikUser` varchar(255) DEFAULT NULL,
  `NamaUser` varchar(255) DEFAULT NULL,
  `DeptUser` varchar(255) DEFAULT NULL,
  `StatusUser` int(11) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `PassUser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`ID_User`, `NikUser`, `NamaUser`, `DeptUser`, `StatusUser`, `Username`, `PassUser`) VALUES
(1, '12', 'administrator', '-', 0, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad'),
(2, NULL, 'useradmin', NULL, 0, 'user', 'adcd7048512e64b48da55b027577886ee5a36350'),
(3, '87654321', 'isaf', 'OMD', 1, 'isaf', 'adcd7048512e64b48da55b027577886ee5a36350'),
(4, '1234', 'hasan1', 'gudang', 1, 'hasan1', 'adcd7048512e64b48da55b027577886ee5a36350'),
(5, '1235', 'hasan2', 'produksi', 1, 'hasan2', 'adcd7048512e64b48da55b027577886ee5a36350'),
(6, '1236', 'hasan3', 'coloring', 1, 'hasan3', 'adcd7048512e64b48da55b027577886ee5a36350'),
(7, '1237', 'hasan4', 'packing', 1, 'hasan4', 'adcd7048512e64b48da55b027577886ee5a36350'),
(8, '1238', 'hasan5', 'finishing', 1, 'hasan5', 'adcd7048512e64b48da55b027577886ee5a36350'),
(9, '1239', 'hasan6', 'eksport', 1, 'hasan6', 'adcd7048512e64b48da55b027577886ee5a36350'),
(10, '1240', 'hasan7', 'eksport', 1, 'hasan7', 'adcd7048512e64b48da55b027577886ee5a36350'),
(11, '1241', 'hasan8', 'coloring', 1, 'hasan8', 'adcd7048512e64b48da55b027577886ee5a36350'),
(12, '1242', 'hasan9', 'gudang', 1, 'hasan9', 'adcd7048512e64b48da55b027577886ee5a36350'),
(13, '1243', 'hasan10', 'packing', 1, 'hasan10', 'adcd7048512e64b48da55b027577886ee5a36350'),
(14, '1244', 'hasan11', 'produksi', 1, 'hasan11', 'adcd7048512e64b48da55b027577886ee5a36350'),
(15, '1245', 'hasan12', 'finishing', 1, 'hasan12', 'adcd7048512e64b48da55b027577886ee5a36350'),
(16, NULL, 'bagas', NULL, 0, 'bagas', 'adcd7048512e64b48da55b027577886ee5a36350'),
(17, NULL, 'idris', NULL, 0, 'idris', 'adcd7048512e64b48da55b027577886ee5a36350'),
(18, '7823', 'Idris 1', 'Export', 1, 'idris 1', 'bf0d54d69d329b62b399a6714c9b5634463a0e07'),
(19, '89233', 'idris 2', 'Lapangan', 1, 'idris 2', '7b9dc869f51ef1b3183df8a06db42143cecfe679'),
(20, '8923', 'idris 3', 'Produksi', 1, 'idris 3', '4975be80964c5352cc704bea8a158451245c55ab'),
(21, '0923', 'idris 4', 'Packing', 1, 'idris 4', 'a562c67187f697d9e6d723cd615775b22f3b5d7f'),
(23, '4234', 'kapal induk', '5234', 1, 'kapal induk', '6f1889a39a9286cfeb8e1a9e271e02f9c5069db3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailasset`
--

CREATE TABLE `tbl_detailasset` (
  `ID_DetailAsset` int(11) NOT NULL,
  `TglRepair` date DEFAULT NULL,
  `ID_Asset` int(11) DEFAULT NULL,
  `PelaksanaRepair` int(11) DEFAULT NULL,
  `ID_User_Input` int(11) DEFAULT NULL,
  `NamaRepair` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailasset`
--

INSERT INTO `tbl_detailasset` (`ID_DetailAsset`, `TglRepair`, `ID_Asset`, `PelaksanaRepair`, `ID_User_Input`, `NamaRepair`) VALUES
(1, '2022-09-27', 6, 14, 2, 'perbaikan pompa'),
(3, '2022-09-28', 6, 13, 0, 'test cat'),
(4, '2022-09-29', 6, 13, 0, 'test3'),
(5, '2022-09-28', 8, 13, 1, 'perbaiki mata bor'),
(6, '2022-09-27', 8, 15, 0, 'perbaikan konesnya\r\n'),
(7, '2022-09-29', 3, 13, 1, 'pengelasan tiang'),
(8, '2022-09-29', 21, 10, 17, 'Bila Barang Tidak Sampai Rumah Maka Akan Di Kembalikan Kurang Dan Plus Sama Measkipun Anda Belum Bayar'),
(10, '2022-09-28', 21, 4, 17, 'Bila Barang Tiba Tiba Sampai Di Rumah Walaupun Anda Belum Bayar Anda Akan Di Tagihkan 10kali lipat Jangan Lupa Bayar Yaa'),
(11, '2022-09-28', 21, 13, 17, 'asdawdasdasfdjagsdhwgas dwyabsdwa sdwasdwafudwa'),
(12, '2022-09-28', 20, 6, 17, 'sdnwbaksndwakmnsdkwansdwam sdwajksadwad'),
(13, '2022-09-28', 20, 10, 17, 'saldwnalmsdwal sdwamsdmlwakdwasldwadwa'),
(14, '2022-09-28', 20, 7, 17, 'sdwkasdhkwanskdwasdwa sdwahsdwoja'),
(15, '2022-09-28', 19, 15, 17, 'sdwbaksbdwuashduwahusdhwiasdwa'),
(16, '2022-09-28', 19, 14, 17, 'sdkwalmsdkwamsdkwamlksdnwlas'),
(17, '2022-09-28', 19, 13, 17, 'jahskjdnajsndjwajlsndwanskdjwasd'),
(18, '2022-09-28', 18, 12, 17, 'sdsnasmdn walsndlwasndlwansldjwasda'),
(19, '2022-09-28', 18, 11, 17, 'sdlkwamsldkwanlsdnwalksdwasdwasdwa'),
(20, '2022-09-28', 18, 10, 17, 'sndkahdwjasjdwansdwalsdbiwa'),
(21, '2022-09-28', 16, 9, 17, 'kdjw alsdkwjanksdjnwaksndkjwasndwjakndwa'),
(22, '2022-09-28', 16, 8, 17, 'smndkwlamlskdwakwdasdwa'),
(23, '2022-09-28', 16, 7, 17, 'sdwasdwasdwnalksndwlkasdwa'),
(24, '2022-09-28', 14, 6, 17, 'ajsdwakjsndwakjsndkwajsdukwjanskjdwadwa'),
(25, '2022-09-28', 14, 15, 17, 'sjdnwlansdiwlanskjdwawdasdwagasdwa'),
(26, '2022-09-29', 14, 14, 17, 'sdjwnasjndwjanskjdmwansdnwalmsnkdwa'),
(27, '2022-09-30', 12, 13, 17, 'sadnwajlsndlkwanskldnwalsndiowamsndwa'),
(28, '2022-09-08', 12, 12, 17, 'asdwanmsndkwanskldnwalksdwa'),
(29, '2022-09-16', 12, 11, 17, 'sjkdwaknsdjwansjdnwaksn dbwaksndjwa'),
(30, '2022-09-17', 11, 10, 17, 'nsajldnwlajsndlwjansmd wasmdwa'),
(31, '2022-09-19', 11, 9, 17, 'sdnwansldnwalsdlwka sdwasadwasdwa'),
(32, '2022-09-25', 11, 8, 17, 'snjdwalnsdlkwansdknwalksndklwasdwa'),
(33, '2022-09-24', 10, 7, 17, 'asnlajdnwlajnlsjdnwlajsnldwasdgsd'),
(34, '2022-09-28', 10, 10, 17, 'sdaasdwanslkdnwalksndlwasda'),
(35, '2022-09-17', 10, 9, 17, 'sadwajlksdnwlkanskdwasdwa'),
(36, '2022-09-10', 9, 15, 17, 'askjdlkwanslkdnwkjansdkwnalksdwasdwa'),
(37, '2022-09-26', 9, 14, 17, 'asdwjaklsdmwlkanslkdnwalkjsnldkwasdwa'),
(38, '2022-09-17', 9, 13, 17, 'asudhwajksdjkwabsjkdbwajksbdkjwabkjsdbwajkbsdwa'),
(39, '2022-08-28', 30, 15, 16, 'fwegweegw'),
(40, '2022-09-17', 15, 12, 17, 'asjdnwalkksndlwansldwadwa'),
(41, '2022-09-23', 15, 11, 17, 'asdnwalsdnwlajnsdlw adwaasdwasfaw'),
(42, '2022-10-27', 15, 10, 17, 'sjdhwajksbdjkwabsjdwjkansdkwkasdwa'),
(43, '2022-09-16', 15, 9, 17, 'askdnwlkansldkwnalskdnwalsdwa'),
(44, '2022-09-17', 15, 8, 17, 'adajsndljwnaljsdnwljansldwadwa'),
(45, '2022-08-29', 30, 14, 16, 'efwetwgwfewf'),
(46, '2022-09-28', 30, 12, 16, 'fwegwegeegewg'),
(47, '2022-09-28', 29, 11, 16, 'sawtehhagqtt'),
(48, '2022-09-28', 29, 10, 16, 'z svweffqw'),
(49, '2022-09-28', 29, 9, 16, 'qdqwefqf'),
(50, '2022-09-24', 28, 20, 17, 'asdwkansdljwaansldwnalksdwasd'),
(51, '2022-09-12', 28, 18, 17, 'asdwkamskdmwaksmd;kwas'),
(52, '2022-09-17', 29, 10, 21, 'Kami Tidak Menerima Kembalian Saat Pembayaran Saya Perotes'),
(53, '2022-09-17', 12, 10, 0, 'Kapal nya kecil tidak sesuai gambar, dan bagian lambung bocor penipu'),
(54, '2022-09-28', 31, 13, 1, 'Maintenance'),
(55, '2022-09-29', 31, 11, 1, 'Perbaikan Roller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `import_user_temp`
--
ALTER TABLE `import_user_temp`
  ADD PRIMARY KEY (`ID_User_Temp`);

--
-- Indexes for table `m_asset`
--
ALTER TABLE `m_asset`
  ADD PRIMARY KEY (`ID_Asset`);

--
-- Indexes for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  ADD PRIMARY KEY (`ID_Lokasi`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `tbl_detailasset`
--
ALTER TABLE `tbl_detailasset`
  ADD PRIMARY KEY (`ID_DetailAsset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `import_user_temp`
--
ALTER TABLE `import_user_temp`
  MODIFY `ID_User_Temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `m_asset`
--
ALTER TABLE `m_asset`
  MODIFY `ID_Asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  MODIFY `ID_Lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_detailasset`
--
ALTER TABLE `tbl_detailasset`
  MODIFY `ID_DetailAsset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
