-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 05:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nomor` varchar(14) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `hotel_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booklog`
--

CREATE TABLE `tb_booklog` (
  `id` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nomer` varchar(14) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `hotel_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_booklog`
--

INSERT INTO `tb_booklog` (`id`, `nama`, `email`, `nomer`, `tanggal_pesan`, `tanggal_pulang`, `hotel_id`, `user_id`) VALUES
(40, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-28', '2021-01-01', 16, 7),
(41, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-28', '2020-12-30', 16, 7),
(42, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-20', '2020-12-27', 19, 7),
(43, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-28', '2020-12-30', 23, 7),
(44, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-28', '2020-12-30', 20, 7),
(45, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-30', '2021-01-03', 18, 7),
(46, 'Mitsal Fabian ', 'mitsal01@yahoo.com', '081226612321', '2020-12-28', '2020-12-29', 18, 7),
(47, 'adhri', 'adhri@mail.com', '08122661232', '2020-12-28', '2020-12-30', 20, 8),
(48, '', 'adhri@mail.com', '08122661232', '2020-12-29', '2020-12-29', 24, 8),
(49, 'adhri', 'Leo@gmail.com', '08122661232', '2020-12-29', '2020-12-30', 24, 8),
(50, 'adhri', 'adhri@mail.com', '08122661232', '2020-12-30', '2020-12-31', 24, 8),
(51, 'fabian', 'mitsalf1@gmail.com', '08122661232', '2020-12-31', '2021-01-02', 19, 7),
(52, 'bellu', 'mitsalf1@gmail.com', '081226612321', '2020-12-21', '2020-12-26', 19, 10),
(53, 'fabian', 'mitsalf1@gmail.com', '081226612321', '2020-12-30', '2020-12-31', 23, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `id` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `fasilitas_1` varchar(40) NOT NULL,
  `fasilitas_2` varchar(40) NOT NULL,
  `fasilitas_3` varchar(40) NOT NULL,
  `fasilitas_4` varchar(40) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `rating` int(11) NOT NULL,
  `deskripsi` varchar(999) NOT NULL,
  `harga` int(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `foto2` varchar(20) NOT NULL,
  `foto3` varchar(20) NOT NULL,
  `foto4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hotel`
--

INSERT INTO `tb_hotel` (`id`, `nama`, `tipe`, `fasilitas_1`, `fasilitas_2`, `fasilitas_3`, `fasilitas_4`, `tempat`, `rating`, `deskripsi`, `harga`, `foto`, `foto2`, `foto3`, `foto4`) VALUES
(16, 'Bobobox', 'house', 'King-bed size', 'Private room', 'swimming pool', 'Wi-fi', 'Bandung, Indonesia', 9, 'Bobobox adalah hotel kapsul di Indonesia yang mengedepankan teknologi modern. Kamu bisa memesan kamar melalui website dan aplikasi Bobobox. Setelah memesan, kamu bisa melakukan pembayaran otomatis karena Bobobox sudah terhubung dengan beberapa mitra pembayaran.', 490, '5fde4c5cd40c1.jfif', '5fde4c5cd42c9.jfif', '5fde4c5cd44d2.jpg', '5fde4c5cd46a6.jpg'),
(17, 'Green Lake', 'hotel', 'King-size Bed', 'Bathtub', 'Balcon', 'Private Swimming pool', 'Jakarta, Indonesia', 9, 'Green Lake is a freshwater lake in north central Seattle, Washington, within Green Lake Park. The park is surrounded by the Green Lake neighborhood to the north and east, the Wallingford neighborhood to the south, the Phinney Ridge neighborhood to the west, and Woodland Park to the southwest.', 700, '5fde415da11ec.jpg', '5fde415da16e4.jpg', '5fde415da191e.jpg', '5fde415da1b7e.jpg'),
(18, 'Long Living', 'apartment', 'King-size Bed', 'Balcon', 'swimming pool', 'Bathtub', 'semarang, Indonesia', 7, 'An apartment (American English), or flat (British English, Indian English), is a self-contained housing unit (a type of residential real estate) that occupies only part of a building, generally on a single story. There are many names for these overall buildings, see below. The housing tenure of apartments also varies considerably, from large-scale public housing, to owner occupancy within what is legally a condominium (strata title or commonhold), to tenants renting from a private landlord (see ', 1000, '5fde62cfad89d.jfif', '5fde62cfadb90.jpg', '5fde62cfade8a.jpg', '5fde62cfae151.jpg'),
(19, 'Santika', 'hotel', 'King-size Bed', 'Swimming pool', 'Wi-fi', 'Sauna', 'Pekalongan, Indonesia', 8, 'Santika Indonesia Hotels &amp; Resorts is one of the largest hotel chains in Indonesia and managed under PT Grahawita Santika, a subsidiary of mass media conglomerate Kompas Gramedia. It was established on 22 August 1981 and has over 40 hotels across Indonesia. Since 2006, the company has changed its strategy based on market segmentation and divided its brands into The Royal Collection, Hotel Santika Premiere, Hotel Santika, and Amaris Hotel.', 570, '5fdedf7e36d32.jpg', '5fdedee6bc443.jpg', '5fdedee6bc891.jpg', '5fdedee6bccfc.jpg'),
(20, 'Aston Hotel', 'hotel', 'King-size Bed', 'Sauna', 'Swimming pool', 'Bathtub', 'Purwokerto, Indonesia', 7, 'Archipelago International is the largest privately owned and independent hotel operator in Southeast Asia, one of the most dynamic and fastest growing regions for both domestic and outbound tourism. We are the market leader in Bali, one of the world’s most popular travel destinations.', 760, '5fdef4b07ebce.jpg', '5fdee1487e408.jpg', '5fdee1487e968.jpg', '5fdee1487ee85.jpg'),
(21, 'Black ventura', 'house', 'King-size Bed', 'Bathtub', 'Backyard', 'Wi-fi', 'Bandung, Indonesia', 7, 'Every president since John Adams has occupied the White House, and the history of this building extends far beyond the construction of its walls. The White House is both the home of the President of the United States and his family, and a museum of American history.', 390, '5fdef4c58b9df.jfif', '5fdee5ede0f2c.jfif', '5fdee5ede14be.jfif', '5fdee5ede19c5.jfif'),
(22, 'The Villagers', 'house', 'King-size Bed', 'Bathtub', 'Backyard', 'Sauna', 'Wonogiri, Indonesia', 9, 'Villagers came to prominence in 2010 with the release of the debut album, Becoming a Jackal. Released to critical acclaim, the album was shortlisted for the 2010 Mercury Prize and the Choice Music Prize. The second studio album, {Awayland} was released in 2013. It won the Choice Music Prize that year and was also shortlisted for the 2013 Mercury Prize.', 230, '5fdef4a112d07.jfif', '5fdeedfe5916e.jfif', '5fdeedfe595c8.jfif', '5fdeedfe5990a.jfif'),
(23, 'Kuningan City', 'apartment', 'King-size Bed', 'Bathtub', 'Swimming pool', 'Sauna', 'Jakarta, Indonesia', 8, 'Kuningan City in Jakarta, Indonesia is a mixed-use complex including a shopping mall, two apartment towers and one office tower.[1] It is located in South Jakarta. The mall is called Kuningan City Mall, the apartment complex is named Denpasar Residence[2] and the office tower is named AXA Tower.[3][4] The residential complex Denpasar Residence has two towers, named Kintamani Tower and Ubud Tower.', 880, '5fdef4e110bfe.jfif', '5fdeefcc318bb.jfif', '5fdeefcc31d1a.jfif', '5fdeefcc321f5.jfif'),
(24, 'L Avanue', 'apartment', 'King-size Bed', 'Bathtub', 'Swimming pool', 'Sauna', 'Jakarta, Indonesia', 9, 'One of the guidelines in choosing a place to live is the complete facilities. If you are looking for an apartment that is cheap but complete with amenities, come to Lavenue. This apartment provides a variety of your life necessities so it is very suitable for housing. This prestigious apartment is located in the Poncoran area, one of the strategic areas in Jakarta.', 790, '5fdef4ecab976.jfif', '5fdef3bc642ad.jfif', '5fdef3bc64ade.jfif', '5fdef3bc65236.jfif'),
(25, 'Dafam', 'hotel', 'King-size Bed', 'Swimming pool', 'Balcon', 'Sauna', 'Cilacap, Indonesia', 8, 'Hotel Dafam Cilacap is the shining Three-Star hotel in Cilacap. The hotel is ideally located near government and business district, shopping center as well as the exotic Teluk Penyu beach. Hotel Dafam Cilacap is just a few minutes drive from railway station and airport. 10 minutes boat ride to Nusa Kambangan Island from Teluk Penyu Beach and 15 minutes drive from Benteng Pendem fortress. It’s a reliable hotel for travelers who look for the exceptionally good value, luxurious and comfortable accommodation.', 405, '5fe9c2527bc60.jpg', '5fe9c2527bec8.jpg', '5fe9c2527c12b.jpg', '5fe9c2527c388.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paymentapproval`
--

CREATE TABLE `tb_paymentapproval` (
  `id` int(20) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `hotel_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paymentapproval`
--

INSERT INTO `tb_paymentapproval` (`id`, `nama_pengirim`, `nama_bank`, `bukti_bayar`, `jumlah_bayar`, `user_id`, `hotel_id`) VALUES
(30, 'Fabian', 'BRI', '5fea081ed923d.jpg', 2850, 10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_payments`
--

CREATE TABLE `tb_payments` (
  `id` int(20) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `hotel_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_payments`
--

INSERT INTO `tb_payments` (`id`, `nama_pengirim`, `nama_bank`, `bukti_bayar`, `jumlah_bayar`, `user_id`, `hotel_id`) VALUES
(3, 'Fabian', 'BRI', '5fe792b1868e2.jpg', 980, 7, 16),
(9, 'Fabian', 'BRI', '5fe8c079379f3.jpg', 1520, 8, 20),
(11, 'Fabian', 'Mandiri', '5fe9a5b50367e.png', 790, 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(7, 'fabian', '$2y$10$Hw8b.lChUbdzz5n6RcmetuZ1gf5ks/EglkpLVOwV5vdwfIooFSdLq'),
(8, 'adhri', '$2y$10$.Sja1hv7Z9A4IJDpCHwIEOwP1BItNjAaXUGuEkHaoJEj4.wwFZhka'),
(9, 'jaka', '$2y$10$hpSUEda3qkegjMM102LqLOFv/cVoi2V4Kks8Wzvlm.hYjqs6hHjqK'),
(10, 'bellu', '$2y$10$fBP6i7jaU0T2AcyUWNv5quK6FfX38pMpF.zkfFqa/gy8FQPowKAQm'),
(11, 'mitsalfabian', '$2y$10$JrGy/vebKQajEyqe7.G4xO1G.oXNmMYdc0LuAVRXbv0/bFjt8tF/S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_booklog`
--
ALTER TABLE `tb_booklog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paymentapproval`
--
ALTER TABLE `tb_paymentapproval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tb_booklog`
--
ALTER TABLE `tb_booklog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_paymentapproval`
--
ALTER TABLE `tb_paymentapproval`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_payments`
--
ALTER TABLE `tb_payments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `tb_hotel` (`id`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tb_booklog`
--
ALTER TABLE `tb_booklog`
  ADD CONSTRAINT `tb_booklog_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `tb_hotel` (`id`),
  ADD CONSTRAINT `tb_booklog_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tb_paymentapproval`
--
ALTER TABLE `tb_paymentapproval`
  ADD CONSTRAINT `tb_paymentapproval_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_paymentapproval_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `tb_hotel` (`id`);

--
-- Constraints for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD CONSTRAINT `tb_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_payments_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `tb_hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
