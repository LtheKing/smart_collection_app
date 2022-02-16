-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 06:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_collection_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2021_12_12_130929_create_nasabahs_table', 2),
(12, '2021_12_20_105735_create_users_table', 3),
(13, '2021_12_21_102335_users_add_username', 4),
(16, '2021_12_23_104749_nasabahs_add_bank', 5),
(17, '2021_12_23_145925_create_banks_table', 6),
(19, '2022_01_02_143439_create_desc_hold_models_table', 7),
(20, '2022_02_13_152445_nasabah_add_deskcoll_id', 8),
(21, '2022_02_16_170045_create_customers_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sm_bank`
--

CREATE TABLE `sm_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_customer`
--

CREATE TABLE `sm_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `NumberCard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TypeCard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NameCustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PIC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AssignmentDate` date NOT NULL,
  `ExpireDate` date NOT NULL,
  `DateOfBirth` date NOT NULL,
  `OpenDate` date NOT NULL,
  `WODate` date NOT NULL,
  `LastPayDate` date NOT NULL,
  `LastTransactionDate` date NOT NULL,
  `LastPayment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastTransactionNominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Principal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MinPay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OSBalance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficeAddress1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficeAddress2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficeAddress3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficeAddress4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HomePhone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HomePhone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficePhone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfficePhone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ECPhone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ECPhone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ECName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ECName2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StatusEC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StatusEC2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MotherName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VirtualAccount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VirtualAccountName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Komoditi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KomoditiType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Produsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoanTerm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstallmentAlreadyPaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MonthlyPaymentNominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DPD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bucket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BillingNoPenalty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DendaBelumDibayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastVisitDate` datetime NOT NULL,
  `LastVisitResult` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastReport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastVisitAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OTSOffer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherData1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherData2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherData3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherData4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherData5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PermanentMessage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_deskcoll`
--

CREATE TABLE `sm_deskcoll` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoTelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sm_deskcoll`
--

INSERT INTO `sm_deskcoll` (`id`, `Nama`, `NoTelepon`, `Alamat`, `Email`, `NIP`, `created_at`, `updated_at`) VALUES
(1, 'Raina Palastri S.Sos', '0865-9613-5203', 'Dk. PHH. Mustofa No. 572, Solok 46196, Jateng', 'wulandari.mutia@mustofa.biz.id', '885389357', NULL, NULL),
(2, 'Putri Hastuti', '0883-2933-8058', 'Gg. Adisumarmo No. 276, Lubuklinggau 73632, Sulteng', 'putra.danuja@gmail.co.id', '878724182', NULL, NULL),
(3, 'Martana Bajragin Thamrin S.Ked', '0839-1300-5853', 'Dk. Agus Salim No. 726, Bitung 80045, Papua', 'elaksmiwati@irawan.biz.id', '284067061', NULL, NULL),
(4, 'Kamila Hastuti', '0826-8251-6735', 'Gg. Baiduri No. 1, Madiun 30068, Papua', 'dzulaika@yahoo.co.id', '406267807', NULL, NULL),
(5, 'Aurora Wastuti', '0898-9418-5287', 'Kpg. Jend. Sudirman No. 212, Balikpapan 26774, Jatim', 'taufik.winarno@andriani.ac.id', '620895542', NULL, NULL),
(6, 'Siska Novitasari', '0851-2815-9939', 'Ds. Yos Sudarso No. 442, Cirebon 38880, Maluku', 'digdaya74@manullang.or.id', '127492203', NULL, NULL),
(7, 'Harto Adriansyah', '0898-8754-7859', 'Ds. Jagakarsa No. 180, Sungai Penuh 37717, Sumsel', 'lintang.kuswandari@yahoo.com', '989707382', NULL, NULL),
(8, 'Gantar Mangunsong M.M.', '0892-4225-4012', 'Ki. Sentot Alibasa No. 688, Tidore Kepulauan 91756, Babel', 'wibowo.cakrabirawa@yahoo.com', '672859042', NULL, NULL),
(9, 'Uchita Andriani', '0812-2553-5721', 'Gg. Daan No. 24, Subulussalam 56106, Kalteng', 'queen.thamrin@yahoo.co.id', '272155899', NULL, NULL),
(10, 'Reza Adriansyah', '0871-9562-7514', 'Ki. Cikutra Timur No. 806, Salatiga 64308, Kaltim', 'yulianti.baktiadi@yahoo.com', '928519996', NULL, NULL),
(11, 'Salimah Diana Safitri', '0866-2961-7166', 'Jln. Gajah Mada No. 760, Solok 54366, Sulbar', 'tnovitasari@yahoo.com', '088482134', NULL, NULL),
(12, 'Ihsan Gambira Hidayanto', '0839-2318-1775', 'Ds. Yos No. 220, Salatiga 77368, NTB', 'uyainah.salimah@gmail.co.id', '393212926', NULL, NULL),
(13, 'Jayeng Ganjaran Saptono S.Farm', '0839-5759-1632', 'Ki. Soekarno Hatta No. 848, Surabaya 68737, Papua', 'pwahyuni@astuti.info', '427070085', NULL, NULL),
(14, 'Puti Padmasari S.H.', '0825-2159-9925', 'Ds. Pelajar Pejuang 45 No. 801, Pematangsiantar 92784, Sulsel', 'permadi.cindy@januar.co.id', '260865196', NULL, NULL),
(15, 'Cengkir Prakasa', '0889-3384-5955', 'Jr. Baranang No. 984, Kediri 20048, Kepri', 'nwijayanti@gmail.com', '992996081', NULL, NULL),
(16, 'Gamani Simbolon', '0818-5052-0879', 'Jr. Honggowongso No. 526, Administrasi Jakarta Pusat 62363, Papua', 'dgunawan@gmail.co.id', '641059792', NULL, NULL),
(17, 'Marwata Maheswara', '0847-1623-2125', 'Ki. Karel S. Tubun No. 107, Palangka Raya 18174, Kepri', 'embuh.pudjiastuti@gmail.com', '118996267', NULL, NULL),
(18, 'Rini Yuniar', '0842-9859-1963', 'Jln. Sutoyo No. 811, Banjar 73228, Kalsel', 'waluyo.farida@gmail.co.id', '384546821', NULL, NULL),
(19, 'Hairyanto Dongoran', '0895-0328-8128', 'Dk. Peta No. 42, Magelang 42638, Babel', 'tiara21@permata.in', '754105127', NULL, NULL),
(20, 'Wawan Dongoran', '0822-8016-5629', 'Jln. Kyai Mojo No. 290, Tanjungbalai 29454, DIY', 'saragih.fathonah@gmail.com', '536582597', NULL, NULL),
(21, 'Anita Rahayu', '0856-1043-8000', 'Kpg. Pahlawan No. 728, Cirebon 79833, Jambi', 'prabu77@yahoo.com', '425531831', NULL, NULL),
(22, 'Makuta Mitra Tampubolon M.Ak', '0866-3963-8884', 'Ds. Bara Tambar No. 816, Pangkal Pinang 96893, Maluku', 'emas27@gmail.co.id', '261298382', NULL, NULL),
(23, 'Kenes Jefri Megantara', '0829-6442-9766', 'Jln. Setiabudhi No. 432, Banda Aceh 79903, DKI', 'bakiadi.nababan@yahoo.co.id', '088006728', NULL, NULL),
(24, 'Melinda Lintang Uyainah', '0847-7944-8600', 'Ki. Hang No. 489, Kotamobagu 18835, Kaltara', 'hariyah.ghaliyati@gmail.com', '262711393', NULL, NULL),
(25, 'Eman Gadang Marpaung S.Sos', '0867-5531-9709', 'Psr. K.H. Maskur No. 973, Probolinggo 24783, Jatim', 'wsaptono@pradana.my.id', '111074447', NULL, NULL),
(26, 'Lutfan Firmansyah', '0822-4395-3897', 'Dk. Cihampelas No. 874, Yogyakarta 35289, Kalteng', 'gada.damanik@gmail.co.id', '055515147', NULL, NULL),
(27, 'Hardi Hairyanto Nashiruddin S.Farm', '0896-7061-4582', 'Jln. Kyai Gede No. 479, Magelang 35858, Gorontalo', 'glailasari@rahayu.asia', '187544899', NULL, NULL),
(28, 'Sakti Prayitna Siregar S.Sos', '0898-6099-5653', 'Ki. Perintis Kemerdekaan No. 159, Langsa 79714, NTB', 'wadi.prasasta@mandasari.net', '839413213', NULL, NULL),
(29, 'Gamblang Waluyo', '0866-0547-7024', 'Ds. Industri No. 267, Palembang 60750, Sulut', 'wandriani@gmail.co.id', '452357097', NULL, NULL),
(30, 'Bagus Hakim', '0832-9867-2664', 'Ki. Laswi No. 574, Administrasi Jakarta Selatan 71494, Kepri', 'wijayanti.prabawa@yahoo.co.id', '356840510', NULL, NULL),
(31, 'Maya Kuswandari', '0825-5099-1266', 'Gg. Suprapto No. 641, Sorong 85156, Kepri', 'yulia77@santoso.co', '231310275', NULL, NULL),
(32, 'Dariati Omar Sihotang S.I.Kom', '0806-6646-7272', 'Ds. Bagis Utama No. 141, Samarinda 38500, Bali', 'ihsan.prayoga@yahoo.co.id', '153841457', NULL, NULL),
(33, 'Karen Kani Safitri M.Ak', '0827-7053-4016', 'Psr. Bakau Griya Utama No. 568, Administrasi Jakarta Pusat 23543, Lampung', 'fitria01@gmail.com', '263229721', NULL, NULL),
(34, 'Mustofa Candrakanta Kuswoyo S.H.', '0893-5171-2650', 'Ds. Basuki Rahmat  No. 161, Payakumbuh 40638, Bengkulu', 'vanesa.gunawan@yahoo.co.id', '839988185', NULL, NULL),
(35, 'Farah Ella Fujiati', '0831-0540-1724', 'Psr. Teuku Umar No. 659, Padang 61667, Sulut', 'kurnia74@gmail.com', '565440211', NULL, NULL),
(36, 'Putri Wulandari', '0841-1826-9549', 'Kpg. Cikapayang No. 924, Madiun 60355, Jateng', 'kpuspita@yahoo.com', '456018878', NULL, NULL),
(37, 'Cemani Saefullah', '0814-4399-0147', 'Dk. Baranangsiang No. 11, Tual 31056, Sultra', 'dfujiati@gmail.co.id', '230251482', NULL, NULL),
(38, 'Tiara Ghaliyati Agustina S.IP', '0857-0700-1257', 'Psr. Kusmanto No. 244, Pangkal Pinang 80571, Sumut', 'lpalastri@gmail.co.id', '444598319', NULL, NULL),
(39, 'Jane Halimah', '0887-6448-8853', 'Kpg. Otista No. 721, Sawahlunto 31649, Bali', 'pratiwi.marwata@zulkarnain.co', '576161017', NULL, NULL),
(40, 'Dodo Natsir', '0862-7716-7782', 'Gg. Orang No. 577, Administrasi Jakarta Timur 54880, Bali', 'fpudjiastuti@yahoo.com', '180933926', NULL, NULL),
(41, 'Yunita Nasyiah S.Ked', '0872-7758-8565', 'Gg. Baranang Siang Indah No. 694, Langsa 51940, Kalbar', 'rajata.restu@ardianto.name', '932487709', NULL, NULL),
(42, 'Sidiq Ardianto', '0882-7509-0533', 'Ki. Untung Suropati No. 323, Tangerang 50428, Banten', 'naradi.utama@yahoo.co.id', '424954150', NULL, NULL),
(43, 'Cakrabuana Saefullah', '0860-7004-7978', 'Jr. Suryo No. 337, Parepare 86062, NTB', 'koko.yulianti@yahoo.co.id', '229211077', NULL, NULL),
(44, 'Dinda Maya Palastri S.I.Kom', '0856-3851-6972', 'Psr. Acordion No. 522, Bekasi 96713, NTT', 'ihsan48@winarsih.org', '812871343', NULL, NULL),
(45, 'Cecep Latupono S.Pd', '0845-1187-2676', 'Ki. Barasak No. 354, Banjarbaru 53529, Kalteng', 'kemba.prayoga@yahoo.co.id', '561694361', NULL, NULL),
(46, 'Ratna Halimah', '0827-0881-2404', 'Ki. Dipenogoro No. 386, Banda Aceh 41933, Kalteng', 'lanang99@kusmawati.co', '824375849', NULL, NULL),
(47, 'Gilda Andriani', '0873-6794-8446', 'Ds. Dipenogoro No. 682, Sorong 24886, Kalteng', 'indra20@yahoo.co.id', '911830997', NULL, NULL),
(48, 'Jaga Jailani S.Sos', '0865-7169-0188', 'Psr. Yoga No. 714, Medan 65419, Jatim', 'hastuti.nabila@kusmawati.or.id', '957169227', NULL, NULL),
(49, 'Maryadi Omar Kurniawan', '0877-4767-7857', 'Jr. Sutoyo No. 872, Tomohon 63364, Sulbar', 'lulut82@yahoo.com', '885172385', NULL, NULL),
(50, 'Widya Rahayu M.Farm', '0825-0816-1745', 'Ds. Raden Saleh No. 570, Cilegon 23619, Riau', 'inasyidah@nasyidah.web.id', '025761273', NULL, NULL),
(51, 'Maya Zamira Puspasari', '0810-3238-2913', 'Jr. Basoka Raya No. 660, Binjai 74292, Sulsel', 'siregar.yance@putra.co.id', '037733837', NULL, NULL),
(52, 'Maria Fujiati', '0898-5836-5193', 'Kpg. Ciumbuleuit No. 259, Cimahi 93990, Jatim', 'yprastuti@wacana.go.id', '584821157', NULL, NULL),
(53, 'Dina Mulyani', '0811-4682-8808', 'Psr. Muwardi No. 311, Kendari 76197, Aceh', 'dalimin.wijayanti@rahimah.sch.id', '705056525', NULL, NULL),
(54, 'Elvina Hasanah M.Kom.', '0882-4754-4035', 'Ds. Honggowongso No. 867, Jambi 77999, Aceh', 'farah.ardianto@gmail.co.id', '923158760', NULL, NULL),
(55, 'Warta Marwata Saptono', '0894-9373-4520', 'Ds. Pelajar Pejuang 45 No. 684, Bandung 77694, Jatim', 'bhutapea@yahoo.com', '314617275', NULL, NULL),
(56, 'Karman Prasetya', '0841-6818-4059', 'Ds. Yos No. 968, Administrasi Jakarta Selatan 84139, Jabar', 'soleh02@gmail.com', '969811407', NULL, NULL),
(57, 'Talia Indah Novitasari M.Pd', '0822-2424-3318', 'Jln. Basmol Raya No. 581, Magelang 33555, DKI', 'violet62@rahimah.web.id', '874830014', NULL, NULL),
(58, 'Opung Mustofa', '0891-9672-4072', 'Ds. Wahidin Sudirohusodo No. 469, Sibolga 53550, Riau', 'anggraini.ade@mulyani.name', '014392410', NULL, NULL),
(59, 'Jasmin Paulin Pertiwi S.Kom', '0868-9755-9800', 'Gg. Babakan No. 360, Pagar Alam 45209, Babel', 'csaefullah@wahyuni.biz', '659491194', NULL, NULL),
(60, 'Cahyanto Napitupulu', '0853-0690-0755', 'Kpg. Baya Kali Bungur No. 257, Padangsidempuan 78250, Sultra', 'bnovitasari@hutapea.in', '722016936', NULL, NULL),
(61, 'Nadia Gina Oktaviani S.E.I', '0852-0871-9947', 'Ds. Abdul Muis No. 544, Padang 75883, Aceh', 'hrahmawati@gmail.com', '038582875', NULL, NULL),
(62, 'Ophelia Syahrini Utami', '0847-8252-0920', 'Gg. Bah Jaya No. 935, Tangerang Selatan 57518, DIY', 'usada.violet@gmail.co.id', '310227701', NULL, NULL),
(63, 'Danu Tamba', '0818-5054-8993', 'Ds. Suprapto No. 12, Lhokseumawe 85140, Aceh', 'bahuwirya37@permadi.org', '354905622', NULL, NULL),
(64, 'Ellis Palastri', '0856-3950-2525', 'Dk. Baja No. 789, Langsa 43724, Riau', 'cnuraini@gmail.com', '535898870', NULL, NULL),
(65, 'Ilsa Alika Mandasari', '0863-4034-7399', 'Dk. Nanas No. 188, Administrasi Jakarta Timur 40886, Pabar', 'asirwada22@halimah.org', '986778060', NULL, NULL),
(66, 'Winda Ratih Purnawati', '0826-1255-4308', 'Dk. Abang No. 316, Palangka Raya 44357, Sulut', 'tirawan@gmail.co.id', '639768988', NULL, NULL),
(67, 'Puput Yulianti', '0876-6211-9569', 'Kpg. Surapati No. 424, Padangsidempuan 59754, NTB', 'rajasa.zalindra@gmail.com', '029760840', NULL, NULL),
(68, 'Lembah Setiawan', '0807-9310-1610', 'Dk. Samanhudi No. 858, Banjar 98657, Jateng', 'clara09@gmail.co.id', '537692658', NULL, NULL),
(69, 'Emong Tarihoran', '0879-8729-7996', 'Ds. Jend. Sudirman No. 107, Samarinda 29357, Kepri', 'cemani91@manullang.tv', '037311508', NULL, NULL),
(70, 'Gara Hutagalung', '0835-6160-0742', 'Psr. Sugiono No. 589, Tasikmalaya 19053, Sumsel', 'putri.mandasari@yahoo.com', '447531537', NULL, NULL),
(71, 'Raisa Fujiati S.I.Kom', '0845-4844-2810', 'Ds. Babadan No. 140, Bogor 13364, Jambi', 'hastuti.elvin@widiastuti.desa.id', '920326554', NULL, NULL),
(72, 'Dwi Situmorang', '0891-3193-4977', 'Ds. Jakarta No. 857, Surakarta 69052, Bengkulu', 'wibowo.lasmono@gmail.co.id', '551802604', NULL, NULL),
(73, 'Nurul Hani Susanti S.Psi', '0841-7794-6206', 'Gg. Baranang Siang Indah No. 475, Lubuklinggau 10425, Gorontalo', 'latika06@gmail.co.id', '815494632', NULL, NULL),
(74, 'Cinta Purnawati', '0809-2057-0259', 'Jln. Bass No. 103, Surakarta 18475, Papua', 'zprayoga@hakim.desa.id', '800571695', NULL, NULL),
(75, 'Hartana Sihombing', '0870-7904-5134', 'Kpg. Bazuka Raya No. 13, Batu 28447, Sulbar', 'winarsih.surya@gmail.com', '588099761', NULL, NULL),
(76, 'Ian Winarno', '0829-8312-3571', 'Dk. Baladewa No. 550, Medan 42471, Malut', 'hartaka67@gmail.com', '933440643', NULL, NULL),
(77, 'Suci Olivia Suartini', '0843-6031-4313', 'Kpg. Bahagia  No. 554, Kediri 51404, Sulbar', 'zfarida@yuliarti.tv', '840410517', NULL, NULL),
(78, 'Arsipatra Wibisono S.IP', '0835-9594-6541', 'Jln. Monginsidi No. 815, Pasuruan 75336, Jatim', 'oni69@sitompul.desa.id', '278924972', NULL, NULL),
(79, 'Eko Halim', '0898-1472-3745', 'Dk. Eka No. 554, Metro 18682, DKI', 'khandayani@prastuti.mil.id', '877818443', NULL, NULL),
(80, 'Dinda Haryanti', '0809-7957-6261', 'Kpg. Rajawali Barat No. 200, Bengkulu 82294, Babel', 'usafitri@gmail.com', '296327079', NULL, NULL),
(81, 'Tami Sudiati', '0847-8632-4150', 'Ds. Cikutra Barat No. 854, Sukabumi 56179, Kaltim', 'pwidiastuti@yahoo.com', '507882814', NULL, NULL),
(82, 'Niyaga Ilyas Mandala', '0809-8468-9630', 'Ki. Bawal No. 992, Banjarbaru 21306, Kaltara', 'agnes.saefullah@januar.or.id', '873641369', NULL, NULL),
(83, 'Aurora Kasiyah Usada S.E.', '0836-3749-0021', 'Psr. Otista No. 542, Batam 72864, Sumbar', 'nusada@gmail.co.id', '613190220', NULL, NULL),
(84, 'Vicky Puspasari', '0859-5233-7782', 'Dk. Qrisdoren No. 396, Balikpapan 37374, Jabar', 'pardi46@gmail.co.id', '252699077', NULL, NULL),
(85, 'Wakiman Saputra S.Ked', '0883-0749-0735', 'Jr. Baan No. 482, Pematangsiantar 76778, Lampung', 'widiastuti.azalea@natsir.desa.id', '796444406', NULL, NULL),
(86, 'Farah Nabila Wulandari M.Pd', '0857-9588-4202', 'Dk. Bak Mandi No. 727, Pontianak 20521, Sumsel', 'prasasta.harto@gmail.co.id', '724641615', NULL, NULL),
(87, 'Winda Aryani', '0816-8672-7749', 'Ki. Moch. Toha No. 829, Magelang 43489, Bali', 'ade.suwarno@siregar.go.id', '466467451', NULL, NULL),
(88, 'Olga Hidayat', '0872-5058-9027', 'Ds. Taman No. 535, Batam 13550, Jateng', 'azalea.januar@wacana.net', '726426829', NULL, NULL),
(89, 'Anom Firgantoro S.Kom', '0817-5559-1405', 'Jr. Badak No. 3, Pekanbaru 84347, Papua', 'anggraini.kemal@gmail.com', '184639845', NULL, NULL),
(90, 'Luluh Lazuardi', '0829-7720-5614', 'Jr. Achmad No. 318, Sukabumi 12258, Jateng', 'najib.wibowo@mandasari.go.id', '030682606', NULL, NULL),
(91, 'Perkasa Dabukke', '0808-1066-7032', 'Gg. Banal No. 834, Sawahlunto 28805, Riau', 'winarno.raisa@gmail.co.id', '744978004', NULL, NULL),
(92, 'Raden Prasetyo', '0819-8026-7045', 'Ds. Gatot Subroto No. 363, Tasikmalaya 99361, Sumut', 'qhariyah@usamah.or.id', '006108036', NULL, NULL),
(93, 'Ivan Pangestu S.Kom', '0839-4362-8909', 'Gg. Laksamana No. 813, Pagar Alam 85247, Kalbar', 'damu51@simbolon.id', '139372464', NULL, NULL),
(94, 'Balapati Cahyono Situmorang', '0867-9732-0768', 'Dk. Bacang No. 437, Padangsidempuan 18527, Maluku', 'keisha06@puspita.my.id', '195805792', NULL, NULL),
(95, 'Jono Hutagalung', '0898-8152-2670', 'Ds. Astana Anyar No. 288, Gorontalo 74801, Sulbar', 'vpalastri@gmail.com', '670265937', NULL, NULL),
(96, 'Rahman Permadi', '0873-0674-2846', 'Gg. Rajawali Barat No. 528, Administrasi Jakarta Pusat 88559, Kalbar', 'wijayanti.budi@nasyidah.net', '887855116', NULL, NULL),
(97, 'Setya Sitorus', '0821-0917-0956', 'Psr. Ters. Buah Batu No. 9, Bau-Bau 51858, NTB', 'oardianto@zulaika.sch.id', '031151591', NULL, NULL),
(98, 'Belinda Tami Wahyuni', '0827-2709-7009', 'Gg. Ir. H. Juanda No. 73, Probolinggo 48388, DKI', 'danggriawan@lazuardi.info', '649196009', NULL, NULL),
(99, 'Betania Jessica Palastri', '0860-7502-9261', 'Gg. S. Parman No. 630, Gorontalo 80427, Kalteng', 'samosir.qori@hassanah.go.id', '956694440', NULL, NULL),
(100, 'Hasna Yuniar S.IP', '0832-0821-7051', 'Jln. Tambun No. 480, Cirebon 94201, Jatim', 'wibowo.tasnim@yahoo.co.id', '043611553', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sm_nasabah`
--

CREATE TABLE `sm_nasabah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoRekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoTelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskcoll_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sm_nasabah`
--

INSERT INTO `sm_nasabah` (`id`, `Nama`, `NoRekening`, `NIK`, `NoTelepon`, `Alamat`, `Email`, `Bank`, `Deskcoll_id`) VALUES
(603, 'Pia Agustina', '8886 5293 71410', '3264 9750 0949 7744', '0891-3749-7194', 'Ki. Siliwangi No. 262, Solok 37467, Gorontalo', 'lardianto@hariyah.id', 'OCBC NISP', '1'),
(604, 'Najwa Wijayanti', '4322 8043 13279', '9063 3406 5854 0033', '0872-9869-2744', 'Ki. BKR No. 326, Bekasi 85293, Riau', 'susanti.dipa@gmail.co.id', 'DBS', '1'),
(605, 'Gawati Tantri Prastuti M.M.', '6481 1117 21877', '3539 2180 2060 2027', '0859-7700-7303', 'Gg. Krakatau No. 877, Tarakan 61566, Banten', 'aditya48@yahoo.com', 'DBS', ''),
(606, 'Banawa Simbolon', '9301 6512 95267', '9421 3588 6620 9240', '0803-8215-4518', 'Jln. Ciwastra No. 636, Palangka Raya 97837, Pabar', 'kpuspita@yahoo.com', 'BCA', ''),
(607, 'Soleh Manullang', '0932 6825 40425', '2883 2395 1774 3996', '0842-5164-4440', 'Dk. Bayan No. 576, Sungai Penuh 53365, Pabar', 'halima.mulyani@gmail.co.id', 'Mandiri', ''),
(608, 'Mulyanto Prasetyo Adriansyah S.H.', '8820 0377 34202', '5649 9236 8308 3315', '0870-3409-8201', 'Ki. Cokroaminoto No. 226, Prabumulih 20066, Sumbar', 'laila.anggraini@gmail.com', 'Nobu Bank', ''),
(609, 'Jagapati Lukita Mandala S.Farm', '9207 5621 52018', '7306 8503 0437 5304', '0860-7472-4742', 'Kpg. Achmad Yani No. 115, Tebing Tinggi 19907, Sumut', 'ozy69@hastuti.co', 'DBS', ''),
(610, 'Raisa Purwanti', '2208 8014 21437', '8435 5131 2059 2023', '0824-2651-8260', 'Jr. Ahmad Dahlan No. 985, Cirebon 67822, Lampung', 'carub.kurniawan@gmail.co.id', 'BCA', ''),
(611, 'Putri Suartini', '5481 9869 36931', '0528 8707 3571 3364', '0866-0452-8057', 'Psr. Qrisdoren No. 22, Surakarta 24550, Gorontalo', 'wahyuni.bakti@gmail.co.id', 'OCBC NISP', ''),
(612, 'Vera Oktaviani', '3928 9867 28696', '9847 9481 3379 3958', '0894-2542-7230', 'Dk. Gegerkalong Hilir No. 884, Langsa 42694, DKI', 'keisha01@gmail.com', 'BCA', ''),
(613, 'Padmi Hani Oktaviani', '2509 5550 21859', '2881 9641 1594 7915', '0829-5885-0309', 'Jr. Honggowongso No. 454, Tebing Tinggi 55684, Jateng', 'ani17@purnawati.asia', 'OCBC NISP', ''),
(614, 'Ratih Puspasari M.Pd', '5291 7942 79050', '1839 7744 1392 7898', '0827-5453-5578', 'Ki. Raya Ujungberung No. 65, Sibolga 20028, Sulteng', 'gmanullang@jailani.desa.id', 'BCA', ''),
(615, 'Alika Wani Wastuti M.Farm', '7041 1463 79446', '9079 3409 4487 6988', '0869-6122-5606', 'Ds. R.M. Said No. 818, Sukabumi 95961, Kalbar', 'dwinarsih@yahoo.co.id', 'Mandiri', ''),
(616, 'Balijan Banawi Siregar', '2983 0161 34573', '8972 5847 5727 0958', '0881-0635-6411', 'Gg. Veteran No. 248, Pariaman 26247, NTB', 'tirta.hakim@nasyidah.co', 'Mandiri', ''),
(617, 'Tina Aurora Uyainah', '8782 0730 84646', '6359 3438 2952 2777', '0898-4176-7976', 'Jr. Sugiono No. 355, Banda Aceh 42660, Kaltara', 'kmanullang@sudiati.co.id', 'OCBC NISP', ''),
(618, 'Makuta Mangunsong', '8557 1267 73070', '6816 5094 0068 0666', '0817-5855-0175', 'Jln. Bappenas No. 160, Subulussalam 43730, Sumsel', 'irsad.maryati@sitorus.ac.id', 'Maybank', ''),
(619, 'Baktianto Dimas Nainggolan S.Farm', '9360 4010 21026', '1460 4290 0770 3915', '0802-6789-9143', 'Dk. Rajiman No. 650, Bogor 19701, Sulsel', 'uhartati@yahoo.co.id', 'BCA', ''),
(620, 'Citra Fujiati', '6936 7214 10792', '2396 5899 7617 3120', '0833-2696-4893', 'Jln. Nangka No. 621, Batam 78086, Malut', 'carla.ardianto@gmail.com', 'Mandiri', ''),
(621, 'Ulva Jamalia Utami', '6966 2112 15335', '4737 5495 8524 0635', '0809-8662-8507', 'Dk. Suharso No. 530, Sawahlunto 73767, Kepri', 'hmelani@gmail.com', 'OCBC NISP', ''),
(622, 'Uli Susanti', '2819 9923 21209', '8220 9099 0143 1473', '0841-1340-2728', 'Gg. Sam Ratulangi No. 732, Semarang 21872, DKI', 'lkuswoyo@gmail.co.id', 'BNI', ''),
(623, 'Jaka Maryadi Maheswara', '4642 0781 66841', '0844 1940 0315 6929', '0892-2754-8744', 'Jr. Rajawali Barat No. 394, Kendari 67171, Kalsel', 'waskita.bahuraksa@yahoo.co.id', 'OCBC NISP', ''),
(624, 'Jail Gangsa Sihombing', '6658 3000 50051', '4371 4235 1789 9593', '0852-2447-2720', 'Ki. Bah Jaya No. 914, Palu 78877, Sulsel', 'harimurti23@laksmiwati.tv', 'Nobu Bank', ''),
(625, 'Tasdik Bakiadi Najmudin', '0912 6645 54609', '8936 0172 7757 9160', '0879-7019-9006', 'Jln. Aceh No. 425, Administrasi Jakarta Timur 88438, Kaltim', 'pudjiastuti.elisa@yahoo.co.id', 'Mandiri', ''),
(626, 'Jelita Lailasari', '7308 1621 67296', '2834 3058 3706 7361', '0811-8011-2443', 'Ds. Yogyakarta No. 45, Singkawang 42144, Sumsel', 'dian.rahimah@simbolon.mil.id', 'OCBC NISP', ''),
(627, 'Ridwan Raharja Situmorang M.Ak', '3872 4249 59261', '6158 5822 6221 9321', '0850-8241-5998', 'Gg. Villa No. 817, Pasuruan 30609, Babel', 'nainggolan.kiandra@suartini.biz', 'OCBC NISP', ''),
(628, 'Ganep Hidayat', '1445 1630 98023', '9487 8319 8152 5163', '0884-3959-5963', 'Gg. Kalimalang No. 142, Palu 13408, Jabar', 'yulianti.farhunnisa@sudiati.web.id', 'BRI', ''),
(629, 'Wisnu Napitupulu S.Ked', '8684 3686 05519', '6558 4791 0877 2789', '0875-6561-6229', 'Jr. Pasteur No. 290, Kupang 70984, Lampung', 'hpurnawati@yahoo.com', 'BCA', ''),
(630, 'Raditya Hardiansyah', '8604 3818 37988', '5355 6626 6160 4598', '0896-2616-3653', 'Jr. Setiabudhi No. 562, Malang 20149, Malut', 'bakti65@sitompul.in', 'BRI', ''),
(631, 'Nadine Nasyiah', '2867 7421 13579', '4546 1601 9350 2652', '0838-5822-3894', 'Ds. Babadan No. 519, Administrasi Jakarta Pusat 94897, Sultra', 'qhabibi@yahoo.com', 'BRI', ''),
(632, 'Hendri Murti Kurniawan M.Kom.', '9673 4590 50064', '4857 2601 6199 3693', '0866-3182-8787', 'Psr. Bara No. 454, Banda Aceh 98959, Jatim', 'ganep.andriani@marpaung.or.id', 'Maybank', ''),
(633, 'Nadine Pertiwi', '4750 5713 74214', '7255 8019 6025 7313', '0888-6524-3386', 'Gg. Gardujati No. 182, Pematangsiantar 83824, Sultra', 'galih11@yahoo.co.id', 'BCA', ''),
(634, 'Michelle Shakila Prastuti S.Pt', '1039 0059 07327', '5738 1565 1842 7003', '0887-6075-0444', 'Gg. Tambun No. 48, Semarang 83600, Lampung', 'prasetya.prakosa@yahoo.co.id', 'Nobu Bank', ''),
(635, 'Cornelia Yuliarti', '3288 5186 00257', '8252 1227 5529 6360', '0811-4951-9072', 'Jr. Jaksa No. 886, Salatiga 65464, Bali', 'permadi.galih@permadi.biz', 'BCA', ''),
(636, 'Tri Galang Waluyo M.Ak', '9072 7301 82422', '6390 7895 6411 5896', '0856-3021-3555', 'Kpg. Bakit  No. 181, Banjar 88555, Sumut', 'mandasari.laila@melani.ac.id', 'BRI', ''),
(637, 'Raharja Thamrin', '9135 7569 43669', '9174 9626 5611 4299', '0869-6550-8301', 'Dk. Baabur Royan No. 101, Kediri 16615, Lampung', 'nyoman.najmudin@megantara.web.id', 'OCBC NISP', ''),
(638, 'Pardi Anggriawan', '6660 8127 98165', '1277 6873 5039 1081', '0856-4821-5707', 'Ds. Moch. Yamin No. 944, Pekanbaru 39191, Jabar', 'salimah55@yahoo.co.id', 'Nobu Bank', ''),
(639, 'Karimah Uyainah', '7290 3088 23888', '8202 9695 4182 6893', '0819-0811-1131', 'Gg. Untung Suropati No. 527, Probolinggo 90283, Sulsel', 'dian.kusumo@maulana.web.id', 'Maybank', ''),
(640, 'Luthfi Pradipta', '3215 1177 14727', '9912 8235 9931 9362', '0813-1234-2315', 'Jr. Cokroaminoto No. 451, Batu 70465, Maluku', 'vicky80@prasetya.asia', 'OCBC NISP', ''),
(641, 'Zamira Puspita', '7878 5633 54103', '0099 9725 2662 0014', '0861-2461-8297', 'Jln. Bambon No. 91, Banjar 65981, NTB', 'hprasetya@yahoo.co.id', 'DBS', ''),
(642, 'Hasim Pangestu', '3930 0880 60278', '5027 1388 6027 8690', '0871-8143-4240', 'Kpg. Bakau Griya Utama No. 401, Tegal 27527, Riau', 'arahimah@gmail.co.id', 'Mandiri', ''),
(643, 'Gandi Prasetya M.TI.', '8900 1879 50004', '6408 4914 6596 1819', '0890-6746-1411', 'Jln. Muwardi No. 397, Pasuruan 21560, Banten', 'wijayanti.ina@yahoo.com', 'DBS', ''),
(644, 'Okto Joko Wasita', '5167 8049 99410', '6843 3160 4758 7280', '0802-6568-0901', 'Gg. Dr. Junjunan No. 983, Gorontalo 57501, Kalbar', 'gunawan.prima@natsir.net', 'BRI', ''),
(645, 'Ivan Gunawan', '4767 7887 83645', '7513 8457 4351 6805', '0876-3182-7024', 'Ds. Acordion No. 106, Pagar Alam 40667, Sumut', 'rahmi.laksmiwati@yahoo.com', 'OCBC NISP', ''),
(646, 'Ulva Kezia Usamah S.Psi', '8753 4294 85680', '0349 4309 3148 1468', '0893-5789-7523', 'Ki. Jambu No. 184, Cilegon 28128, Sulbar', 'balapati21@nababan.desa.id', 'Nobu Bank', ''),
(647, 'Cici Usada', '2101 0929 57581', '2938 1235 6699 2437', '0883-9099-4010', 'Psr. S. Parman No. 295, Pematangsiantar 94974, Malut', 'ygunawan@yahoo.com', 'BCA', ''),
(648, 'Tugiman Lazuardi', '9005 7237 47699', '3007 7004 1900 2604', '0876-9550-3956', 'Gg. Basmol Raya No. 164, Pekalongan 44685, Sulteng', 'aslijan68@megantara.co.id', 'OCBC NISP', ''),
(649, 'Gangsa Waluyo', '4170 7678 76205', '2327 0562 2911 7428', '0804-2722-9207', 'Gg. Jaksa No. 773, Lhokseumawe 13805, Kaltim', 'padmasari.caturangga@yahoo.co.id', 'BCA', ''),
(650, 'Prabu Prasetyo', '4871 9123 69477', '9800 5787 4529 2262', '0877-1438-5237', 'Dk. Hasanuddin No. 15, Singkawang 96282, Kepri', 'sitompul.lamar@yahoo.com', 'BRI', ''),
(651, 'Endra Simbolon', '2737 4789 37262', '5586 4999 2315 8575', '0843-7682-0858', 'Gg. Ki Hajar Dewantara No. 824, Tanjungbalai 96427, Sulteng', 'marpaung.elvina@gmail.co.id', 'Nobu Bank', ''),
(652, 'Yono Jailani', '7745 9546 97941', '1459 3981 1895 2161', '0881-5667-9858', 'Ki. Madrasah No. 144, Kupang 15708, Sultra', 'naradi.rajata@yahoo.com', 'BNI', ''),
(653, 'Tari Halimah', '7278 8055 50144', '1571 9157 9676 9631', '0856-3285-5385', 'Gg. Samanhudi No. 544, Parepare 22538, Sulteng', 'damanik.kalim@mustofa.tv', 'BRI', ''),
(654, 'Nabila Handayani', '1424 3883 94207', '8515 0351 7904 4548', '0890-2176-0540', 'Kpg. Ki Hajar Dewantara No. 294, Bogor 98428, Banten', 'prasetyo.ardianto@yahoo.com', 'BRI', ''),
(655, 'Danang Mansur', '6937 2736 91114', '3879 0935 8364 5298', '0829-3447-0956', 'Psr. Soekarno Hatta No. 31, Pekalongan 83150, Maluku', 'purwa58@yahoo.com', 'BRI', ''),
(656, 'Malik Simanjuntak', '9944 4667 64387', '2303 2630 1566 3876', '0852-0856-4688', 'Dk. Setia Budi No. 672, Jambi 65292, Bali', 'fhariyah@gmail.com', 'Nobu Bank', ''),
(657, 'Adinata Dwi Prakasa S.Pd', '5917 2413 03744', '5020 7908 9826 3179', '0895-8898-6679', 'Ki. Ikan No. 820, Tasikmalaya 29785, Bali', 'saragih.daliman@yahoo.com', 'Maybank', ''),
(658, 'Yessi Michelle Usamah', '0623 2603 00166', '7081 4752 9871 5251', '0841-2689-5887', 'Kpg. Pahlawan No. 77, Padangpanjang 25064, Babel', 'qagustina@jailani.com', 'Nobu Bank', ''),
(659, 'Hana Salwa Handayani', '2459 6444 49007', '9689 2798 6614 6340', '0838-6014-1022', 'Dk. Flores No. 972, Bengkulu 33250, Sulsel', 'artawan46@gmail.com', 'BNI', ''),
(660, 'Alika Nasyiah S.Farm', '5956 5067 43914', '2932 7650 2831 0336', '0892-6844-9211', 'Psr. Sukajadi No. 414, Sungai Penuh 70229, Papua', 'samiah18@nashiruddin.name', 'OCBC NISP', ''),
(661, 'Puput Jessica Andriani S.I.Kom', '3692 4078 09411', '9793 3507 9179 4414', '0822-7745-7645', 'Jr. Wahid Hasyim No. 499, Lhokseumawe 16898, Gorontalo', 'endah06@yuliarti.co', 'Maybank', ''),
(662, 'Baktiono Radit Mandala M.TI.', '1010 7931 25686', '4281 4316 0428 5166', '0880-3681-9050', 'Ds. Raden No. 813, Parepare 60390, NTB', 'adikara.hasanah@gmail.com', 'Nobu Bank', ''),
(663, 'Gilda Anggraini', '2451 8356 02026', '7186 6454 3782 0868', '0892-1489-9297', 'Jln. Mahakam No. 244, Pekalongan 32057, Sulsel', 'roktaviani@pratiwi.net', 'Maybank', ''),
(664, 'Cecep Liman Budiman', '0408 8891 16076', '4313 3148 6991 9726', '0805-2142-0359', 'Psr. Bakin No. 211, Semarang 67409, Pabar', 'dinda.jailani@nababan.tv', 'Mandiri', ''),
(665, 'Maida Padmi Wastuti S.H.', '7347 1986 19382', '3807 3624 0578 8528', '0868-0962-7511', 'Dk. Zamrud No. 294, Bitung 27198, Sumut', 'titin41@rahimah.tv', 'Mandiri', ''),
(666, 'Puji Laksita', '8130 9900 07060', '1534 7584 4243 0328', '0862-2298-4527', 'Ki. Rajawali Timur No. 788, Surakarta 24273, Pabar', 'darman.gunarto@hidayanto.co.id', 'BCA', ''),
(667, 'Harto Pangestu', '7905 7943 45837', '3753 2763 9336 7949', '0880-6758-0432', 'Dk. Qrisdoren No. 918, Semarang 35923, NTB', 'waluyo.anggriawan@gmail.co.id', 'BNI', ''),
(668, 'Bakijan Tirtayasa Irawan', '3439 8090 20126', '5747 6003 0990 0069', '0834-2413-4442', 'Kpg. Pasteur No. 879, Tidore Kepulauan 94973, Bali', 'dimas63@gmail.com', 'Maybank', ''),
(669, 'Zizi Paulin Pratiwi S.Kom', '3125 7194 32740', '6838 0385 1987 8062', '0888-4713-5266', 'Psr. Pelajar Pejuang 45 No. 356, Bitung 38719, Banten', 'faizah29@rahimah.id', 'BCA', ''),
(670, 'Edward Kanda Hidayanto S.I.Kom', '3755 8153 49494', '6207 3462 0293 6116', '0860-2898-1929', 'Psr. Ciwastra No. 848, Bekasi 79958, Banten', 'halimah.aurora@yahoo.co.id', 'Nobu Bank', ''),
(671, 'Fathonah Zaenab Novitasari S.H.', '0580 9518 08443', '9774 4436 0046 7117', '0810-1819-7962', 'Gg. Supomo No. 921, Bengkulu 10471, Pabar', 'chelsea.sihombing@gmail.com', 'BNI', ''),
(672, 'Sarah Melani', '0541 3359 05789', '5125 9875 6728 5744', '0847-1574-8635', 'Kpg. Juanda No. 550, Administrasi Jakarta Pusat 26100, Jatim', 'oni99@namaga.asia', 'Nobu Bank', ''),
(673, 'Erik Kusumo', '0155 2262 37796', '7875 0769 6844 5401', '0809-7727-6180', 'Psr. Jaksa No. 870, Banjarmasin 16876, Sulsel', 'ina.farida@yolanda.go.id', 'Nobu Bank', ''),
(674, 'Indah Ayu Maryati S.Pt', '6262 9449 99711', '1486 7214 3490 9632', '0863-0043-9969', 'Gg. Flores No. 139, Bau-Bau 82721, NTT', 'glazuardi@budiyanto.info', 'DBS', ''),
(675, 'Asmuni Eko Sirait M.TI.', '3416 8299 02289', '8685 0302 1752 4225', '0892-3335-6801', 'Kpg. Tubagus Ismail No. 837, Bontang 58655, Kaltim', 'titi.fujiati@gmail.com', 'Mandiri', ''),
(676, 'Shania Putri Agustina M.Ak', '4645 8875 68488', '8919 0175 2726 7264', '0887-7603-7283', 'Ki. Kyai Gede No. 120, Batam 94049, Sumut', 'hartati.hardi@sihombing.web.id', 'OCBC NISP', ''),
(677, 'Rahmi Yulianti', '6035 5464 21350', '5579 8936 4559 1709', '0833-4568-8614', 'Jr. Jend. A. Yani No. 773, Padangpanjang 41298, Papua', 'imardhiyah@hardiansyah.com', 'Nobu Bank', ''),
(678, 'Jelita Andriani S.Pt', '1820 3915 93352', '8598 2028 4323 5065', '0864-6933-1251', 'Psr. Imam Bonjol No. 106, Ternate 75754, Bengkulu', 'ssaefullah@hassanah.co', 'Maybank', ''),
(679, 'Vero Candra Marbun S.Kom', '7054 9481 25215', '0678 7531 5004 9655', '0830-8080-0255', 'Ds. Wahid No. 228, Palembang 75149, DKI', 'rachel73@yahoo.co.id', 'BRI', ''),
(680, 'Endra Hutagalung', '8977 8793 87916', '7227 9911 9966 4135', '0831-4007-3293', 'Kpg. Gegerkalong Hilir No. 334, Tangerang 25321, Babel', 'wijayanti.halima@kurniawan.go.id', 'OCBC NISP', ''),
(681, 'Lantar Lazuardi', '3340 3179 08508', '2908 5523 3122 7133', '0847-0474-3103', 'Ds. Laksamana No. 150, Sorong 79566, Sultra', 'nasyiah.bakiadi@damanik.com', 'DBS', ''),
(682, 'Aditya Januar', '6061 4952 48012', '0212 1768 1403 5030', '0822-6510-4889', 'Jln. Pelajar Pejuang 45 No. 764, Dumai 97784, Sultra', 'dmayasari@dabukke.or.id', 'BNI', ''),
(683, 'Dina Mardhiyah', '8406 9496 31098', '3895 9098 4722 0626', '0815-4595-4844', 'Dk. Barat No. 486, Batu 43828, Sulteng', 'mhabibi@yahoo.co.id', 'Maybank', ''),
(684, 'Bala Kuswoyo', '3192 7172 92867', '5658 8692 9315 3811', '0859-3546-9829', 'Jr. Sam Ratulangi No. 873, Bekasi 11086, Kalteng', 'novitasari.yulia@mustofa.net', 'Mandiri', ''),
(685, 'Gangsa Jailani', '7360 3989 50686', '6942 3192 3218 9163', '0878-7511-2944', 'Ds. M.T. Haryono No. 82, Palembang 20027, Sulsel', 'violet50@gmail.com', 'Mandiri', ''),
(686, 'Eva Zulaika', '3338 5103 40967', '6281 9350 4157 5327', '0801-3528-8408', 'Jr. Raden No. 87, Palopo 14964, Bengkulu', 'michelle.riyanti@mardhiyah.desa.id', 'Maybank', ''),
(687, 'Asmianto Umaya Megantara M.Ak', '2318 6819 85112', '3985 2601 3636 3712', '0853-3649-7061', 'Psr. Salam No. 667, Magelang 40224, DKI', 'raden63@padmasari.go.id', 'BCA', ''),
(688, 'Kairav Tampubolon', '9736 3793 47815', '8126 0495 7154 5865', '0873-2969-0561', 'Jr. Tambak No. 190, Tegal 29481, Kepri', 'rahayu.gunarto@anggriawan.co.id', 'BRI', ''),
(689, 'Prima Embuh Nashiruddin S.Pt', '5153 8208 40632', '0680 9558 7562 9793', '0878-8010-6540', 'Ds. Kusmanto No. 436, Makassar 73510, NTB', 'vpratiwi@yolanda.biz.id', 'OCBC NISP', ''),
(690, 'Diah Rahimah M.Kom.', '3149 7156 97279', '5262 6957 0501 0952', '0865-6756-3969', 'Dk. Suprapto No. 284, Mojokerto 98817, Kaltara', 'lailasari.dimaz@yahoo.co.id', 'DBS', ''),
(691, 'Radika Nababan', '2311 0860 65136', '1952 2866 3084 9420', '0813-1936-6643', 'Jr. Wahid Hasyim No. 969, Pagar Alam 67053, NTB', 'rafi01@yahoo.co.id', 'Mandiri', ''),
(692, 'Ratna Anggraini', '7277 1238 03474', '6295 2041 1692 0689', '0841-0625-3558', 'Gg. Labu No. 812, Bogor 35719, Riau', 'gmaryati@gmail.com', 'Maybank', ''),
(693, 'Bakiadi Prakasa', '5000 3687 87632', '9194 7684 7579 8993', '0815-5776-3360', 'Psr. Baja No. 433, Bekasi 38331, Pabar', 'utama.novi@gmail.co.id', 'DBS', ''),
(694, 'Michelle Handayani', '6780 5256 55253', '9656 7757 1598 8616', '0856-3901-6955', 'Jln. Ki Hajar Dewantara No. 867, Cirebon 70431, Kalteng', 'hutasoit.galur@gmail.co.id', 'BCA', ''),
(695, 'Najam Megantara', '6808 5441 60831', '9003 4838 4998 9582', '0881-4180-8669', 'Kpg. Gajah Mada No. 236, Cimahi 46329, Jatim', 'danuja.mardhiyah@gmail.co.id', 'Mandiri', ''),
(696, 'Kartika Wulandari M.M.', '2657 1081 20010', '2689 5532 8540 8729', '0848-8772-2813', 'Ds. Muwardi No. 820, Batu 18210, Sulbar', 'marpaung.mala@safitri.co.id', 'Mandiri', ''),
(697, 'Catur Haryanto', '7467 4730 01897', '8876 2838 8282 0305', '0823-9513-6925', 'Gg. Sam Ratulangi No. 666, Semarang 27503, Malut', 'wsimanjuntak@widiastuti.sch.id', 'BRI', ''),
(698, 'Wirda Riyanti', '3457 9236 54437', '2322 4471 0288 9782', '0844-0390-6107', 'Jr. Nanas No. 305, Lubuklinggau 12968, Kepri', 'kuswandari.bambang@uyainah.net', 'Maybank', ''),
(699, 'Vanya Rahmawati M.Farm', '3574 2650 94356', '5117 0920 5727 0741', '0883-2883-4227', 'Kpg. Suryo Pranoto No. 918, Bogor 62175, NTB', 'rsuartini@hidayanto.mil.id', 'OCBC NISP', ''),
(700, 'Marsito Jono Hakim', '0435 8275 88049', '5879 7992 3033 9881', '0859-3816-4048', 'Ki. Diponegoro No. 835, Metro 17022, Kalteng', 'prasasta.kasiyah@yahoo.com', 'BRI', ''),
(701, 'Kasiyah Clara Riyanti M.Pd', '3947 6801 81536', '7814 2660 6388 8295', '0870-7869-3969', 'Ki. Cemara No. 44, Administrasi Jakarta Selatan 86515, Sulteng', 'juli.salahudin@yahoo.co.id', 'DBS', ''),
(702, 'Kartika Aryani', '2640 8428 28811', '0348 0514 5651 2667', '0811-0806-5259', 'Gg. Suniaraja No. 754, Serang 27143, DKI', 'dasa.purwanti@hartati.in', 'BRI', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `username`) VALUES
(1, 'admin', 'admin.utama@pranatacorps.com', '$2y$10$BXI3zN0GjVozDNPxqI2NjO/hP09VaQqAs6tiH6IXRz5LWuNIIxQoe', 'admin', 'admin'),
(4, 'Sania', 'sania.soslo@xtremax.com', '$2y$10$bopgVLE1xApio8PXmcXe../BHnChgfzuZfYCH7Hpvu3OJrvXPEM8e', 'tl', 'sania_saphiere'),
(5, 'mutiara', 'mutiara@pranatacorps.com', '$2y$10$m6eGh8mkfE.4zpAvgBHNO.acmy8AQNaas1XvaVc.DnnhjvW/zris2', 'dh', 'mutiara.pc_dh'),
(6, 'anton', 'anton@pranatacorps.com', '$2y$10$Hy1oWfXYfSozA0WyeBSWXOeUXapxRXUFwEDv4eAX0EO0i/qoMcQiK', 'tl', 'anton.pc_tl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_bank`
--
ALTER TABLE `sm_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_customer`
--
ALTER TABLE `sm_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_deskcoll`
--
ALTER TABLE `sm_deskcoll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_nasabah`
--
ALTER TABLE `sm_nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sm_bank`
--
ALTER TABLE `sm_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_customer`
--
ALTER TABLE `sm_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_deskcoll`
--
ALTER TABLE `sm_deskcoll`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `sm_nasabah`
--
ALTER TABLE `sm_nasabah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
