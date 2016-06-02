-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 05:11 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ds_fsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dataacara`
--

CREATE TABLE `dataacara` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `nama_acara` varchar(50) NOT NULL,
  `penyelenggara` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataacara`
--

INSERT INTO `dataacara` (`id`, `tanggal`, `jam`, `nama_acara`, `penyelenggara`) VALUES
(1, '2016-06-03', '20:57:00', 'jsdhsjhdjh', 'hjsdhsjdh'),
(2, '2016-06-17', '09:00:00', 'jasajshjah', 'jhjshj'),
(3, '2016-06-02', '16:00:00', 'ad', 'dsa'),
(4, '2016-06-18', '23:00:00', 'dsdsd', 'sddsdsd'),
(5, '2016-06-17', '00:24:00', 'ldsldklsdkldks', 'kdlsdklsdklskd'),
(6, '2016-06-02', '23:00:00', 'sdsdsd', 'ssddd'),
(7, '2016-06-02', '16:00:00', 'sdsdsd', 'sdsdsds'),
(8, '2016-06-02', '21:25:00', 'kjkjdkjdkjfkjdkjdkjqjkdjckdj', 'kjdkjdkcdkjckjdckdjc'),
(9, '2016-06-02', '17:00:00', 'ksdjskdjksdjk', 'kdjskdjksdjksdj');

-- --------------------------------------------------------

--
-- Table structure for table `datavideo`
--

CREATE TABLE `datavideo` (
  `video` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datavideo`
--

INSERT INTO `datavideo` (`video`) VALUES
('defaultvideo.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `informasiakademik`
--

CREATE TABLE `informasiakademik` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasiakademik`
--

INSERT INTO `informasiakademik` (`id`, `judul`, `isi`, `tanggal`, `gambar`) VALUES
(1, 'kskjkdjk', 'jdksjdksdjksjdksjd', '2016-06-09', ''),
(2, 'skaakj ajsk ajsk ajsk j', 'jkasj ka sjka jsk ajsk ask jask', '2016-06-08', '20160602043917.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resepsionis`
--

CREATE TABLE `resepsionis` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statuskehadiran`
--

CREATE TABLE `statuskehadiran` (
  `nip` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `foto` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuskehadiran`
--

INSERT INTO `statuskehadiran` (`nip`, `nama`, `jabatan`, `status`, `foto`) VALUES
('197005211999031001', 'Prof. Dr. Widowati, MSi', 'DEKAN FMIPA', 0, ''),
('196311051988031001', 'Drs. Bayu Surarso, M.Sc, Ph.D', 'PEMBANTU DEKAN I', 1, ''),
('195810141986032002', 'Dra. Manifatul Izzati, MSc', 'PEMBANTU DEKAN II', 0, ''),
('197907202003121002', 'Nurdin Bahtiar, SSi, M.Kom', 'PEMBANTU DEKAN III', 0, ''),
('196612261994031001', 'Drs. Sapto Purnomo Putro, MSi, Ph.D', 'KORDINATOR KERJASAMA DAN PENGEMBANGAN', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dataacara`
--
ALTER TABLE `dataacara`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `informasiakademik`
--
ALTER TABLE `informasiakademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `statuskehadiran`
--
ALTER TABLE `statuskehadiran`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataacara`
--
ALTER TABLE `dataacara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `informasiakademik`
--
ALTER TABLE `informasiakademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
