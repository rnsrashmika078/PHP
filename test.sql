-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 10:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `email`, `password`, `admin_code`, `created_at`) VALUES
(39, 'nimsara12327@gmail.com', '123', '1', '2024-12-04 20:35:01'),
(40, 'abc@gmail.com', '123', '123', '2024-12-04 20:38:31'),
(41, '', '', '', '2024-12-05 08:04:04'),
(42, 'rnsrashmika@gmail.com', '123', '123', '2024-12-05 08:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `person` varchar(255) NOT NULL,
  `device_type` varchar(50) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `hard_drive_capacity` varchar(20) DEFAULT NULL,
  `keyboard_status` enum('Working','Not Working') NOT NULL,
  `mouse_status` enum('Working','Not Working') DEFAULT NULL,
  `network_connectivity` enum('Connected','Disconnected') DEFAULT NULL,
  `printer_connectivity` enum('Connected','Disconnected') DEFAULT NULL,
  `virus_guard` enum('Installed','Not Installed') DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `monitor` varchar(255) DEFAULT NULL,
  `cpu` varchar(255) NOT NULL,
  `laptop` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `section` enum('Manager','Engineer','Account','Commercial','Supply','HR','Sociologist','Workshop','IT','Reception','OM','Audit','LAB') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `person`, `device_type`, `os`, `processor`, `ram`, `hard_drive_capacity`, `keyboard_status`, `mouse_status`, `network_connectivity`, `printer_connectivity`, `virus_guard`, `ip_address`, `monitor`, `cpu`, `laptop`, `purchase_date`, `section`) VALUES
(521, '', 'Laptop', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'OM'),
(522, '', 'Server', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Audit'),
(523, '', 'Server', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'LAB'),
(524, '', 'Server', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'LAB'),
(525, '', 'Server', '', '', '', '', '', '', 'Connected', '', '', '', '', '', '', '0000-00-00', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `hardwaremain`
--

CREATE TABLE `hardwaremain` (
  `id` int(11) NOT NULL,
  `Person` varchar(255) NOT NULL,
  `DeviceType` varchar(100) NOT NULL,
  `OperatingSystem` varchar(100) NOT NULL,
  `Processor` varchar(100) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `HardDiskCapacity` varchar(50) DEFAULT NULL,
  `KeyboardStatus` varchar(50) DEFAULT NULL,
  `MouseStatus` varchar(50) DEFAULT NULL,
  `NetworkConnectivity` varchar(50) DEFAULT NULL,
  `PrinterConnectivity` varchar(50) DEFAULT NULL,
  `VirusGuard` varchar(100) DEFAULT NULL,
  `IPAddress` varchar(50) DEFAULT NULL,
  `Monitor` varchar(50) DEFAULT NULL,
  `CPU` varchar(50) DEFAULT NULL,
  `Laptop` varchar(255) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `Branch` enum('Ettampitiya','Keppetipola','Divithotawela','Ambagasdowa','Welimada','Diyathalawa','Bandarawela','Makulella','Demodara','BadullaDE','Badulla','Mahiyanganaya','GiraduruKotte') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hardwareother`
--

CREATE TABLE `hardwareother` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(100) DEFAULT NULL,
  `rvpn_user` varchar(100) DEFAULT NULL,
  `employee_no` varchar(50) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `working_location` varchar(100) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `serial_no_RVPN` varchar(100) DEFAULT NULL,
  `rvpn_username` varchar(100) DEFAULT NULL,
  `connection_required` enum('yes','no') DEFAULT NULL,
  `branch` enum('Ettampitiya','Keppetipola','Divithotawela','Ambagasdowa','Welimada','Diyathalawa','Bandarawela','Makulella','Demodara','BadullaDE','Badulla','Mahiyanganaya','GiraduruKotte') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hardwareprinters`
--

CREATE TABLE `hardwareprinters` (
  `id` int(11) NOT NULL,
  `Branch` enum('Ettampitiya','Keppetipola','Divithotawela','Ambagasdowa','Welimada','Diyathalawa','Bandarawela','Makulella','Demodara','BadullaDE','Badulla','Mahiyanganaya','GiraduruKotte') NOT NULL,
  `Make` varchar(100) DEFAULT NULL,
  `Model` varchar(100) DEFAULT NULL,
  `SerialNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hardwaresummary`
--

CREATE TABLE `hardwaresummary` (
  `id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `etampitiya` int(11) DEFAULT NULL,
  `keppetipola` int(11) DEFAULT NULL,
  `divithotawela` int(11) DEFAULT NULL,
  `ambagasdowa` int(11) DEFAULT NULL,
  `welimda` int(11) DEFAULT NULL,
  `diyathalawa` int(11) DEFAULT NULL,
  `bandarawela` int(11) DEFAULT NULL,
  `makulella` int(11) DEFAULT NULL,
  `demodara` int(11) DEFAULT NULL,
  `badullade` int(11) DEFAULT NULL,
  `badulla` int(11) DEFAULT NULL,
  `mahiyanganaya` int(11) DEFAULT NULL,
  `giradurukotte` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL,
  `device_category` varchar(50) DEFAULT NULL,
  `person` varchar(100) NOT NULL,
  `network_connectivity` varchar(50) DEFAULT NULL,
  `printer_connectivity` varchar(50) DEFAULT NULL,
  `virus_guard` varchar(50) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `branch` enum('Ettampitiya WSS','Keppetipola WSS','Divithotawela WSS','Ambagasdowa WSS','Welimada WSS','Diyathalawa WSS','Bandarawela WSS','Makulella WSS','Demodara WTP','Badulla DE Office','Badulla WSS','Mahiyanganaya WSS','Giraduru Kotte WSS') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`id`, `device_category`, `person`, `network_connectivity`, `printer_connectivity`, `virus_guard`, `ip_address`, `branch`) VALUES
(6, 'person_1', 'Device_type', 'Fiber-Cable', 'Connected', 'Avast', '10.2.1.19', 'Badulla WSS'),
(7, 'person_1', 'Device_type', 'Fiber-Cable', 'Connected', 'Avast', '10.2.1.19', 'Badulla WSS');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(11) NOT NULL,
  `branch` enum('Manager','Engineer','Account','Commercial','Supply','HR','Sociologist','Workshop','IT','Reception','OM','Audit','LAB') NOT NULL,
  `kva` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `s_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE `printers` (
  `id` int(11) NOT NULL,
  `branch` enum('Manager','Engineer','Account','Commercial','Supply','HR','Sociologist','Workshop','IT','Reception','OM','Audit','LAB') NOT NULL,
  `printer_name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `person` varchar(255) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `repair` text NOT NULL,
  `repaired_date` date DEFAULT NULL,
  `section` enum('Manager','Engineer','Account','Commercial','Supply','HR','Sociologist','Workshop','IT','Reception','OM','Audit','LAB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `Id` int(11) NOT NULL,
  `Section` varchar(255) DEFAULT NULL,
  `Regional_Manager` int(11) DEFAULT NULL,
  `Regional_Engineer` int(11) DEFAULT NULL,
  `Account_Section` int(11) DEFAULT NULL,
  `Commercial_Section` int(11) DEFAULT NULL,
  `Human_Resources` int(11) DEFAULT NULL,
  `Sociologist` int(11) DEFAULT NULL,
  `Workshop` int(11) DEFAULT NULL,
  `IT_Branch` int(11) DEFAULT NULL,
  `OM` int(11) DEFAULT NULL,
  `Audit_Branch` int(11) DEFAULT NULL,
  `Laboratory` int(11) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`Id`, `Section`, `Regional_Manager`, `Regional_Engineer`, `Account_Section`, `Commercial_Section`, `Human_Resources`, `Sociologist`, `Workshop`, `IT_Branch`, `OM`, `Audit_Branch`, `Laboratory`, `Total`) VALUES
(28, 'PC', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(39, 'Laptop', 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(40, 'Laptop', 1, 1, NULL, 1, 1, 1, 2, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testtable`
--

CREATE TABLE `testtable` (
  `id` int(11) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testtable`
--

INSERT INTO `testtable` (`id`, `column_name`, `created_at`) VALUES
(1, 'asd', '2024-11-11 11:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `ups`
--

CREATE TABLE `ups` (
  `id` int(11) NOT NULL,
  `person` varchar(255) NOT NULL,
  `ups_model` varchar(255) NOT NULL,
  `kva` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `other_details` text NOT NULL,
  `section` enum('Manager','Engineer','Account','Commercial','Supply','HR','Sociologist','Workshop','IT','Reception','OM','Audit','LAB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`) VALUES
(30, 'rnsrashmika078@gmail.com', '123', '2024-12-04 20:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `virusguard`
--

CREATE TABLE `virusguard` (
  `id` int(11) NOT NULL,
  `AssetID` varchar(50) NOT NULL,
  `VirusGuardKeyType` varchar(50) DEFAULT NULL,
  `InstalledDate` date DEFAULT NULL,
  `ValidDays` int(11) DEFAULT NULL,
  `ValidTill` date DEFAULT NULL,
  `InstalledStatus` enum('Installed','Not Installed') DEFAULT 'Not Installed',
  `Branch` enum('Ettampitiya','Keppetipola','Divithotawela','Ambagasdowa','Welimada','Diyathalawa','Bandarawela','Makulella','Demodara','BadullaDE','Badulla','Mahiyanganaya','GiraduruKotte') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardwaremain`
--
ALTER TABLE `hardwaremain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardwareother`
--
ALTER TABLE `hardwareother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardwareprinters`
--
ALTER TABLE `hardwareprinters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardwaresummary`
--
ALTER TABLE `hardwaresummary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `testtable`
--
ALTER TABLE `testtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ups`
--
ALTER TABLE `ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `virusguard`
--
ALTER TABLE `virusguard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT for table `hardwaremain`
--
ALTER TABLE `hardwaremain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `hardwareother`
--
ALTER TABLE `hardwareother`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hardwareprinters`
--
ALTER TABLE `hardwareprinters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `hardwaresummary`
--
ALTER TABLE `hardwaresummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `printers`
--
ALTER TABLE `printers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `testtable`
--
ALTER TABLE `testtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ups`
--
ALTER TABLE `ups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `virusguard`
--
ALTER TABLE `virusguard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
