-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2022 pada 11.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_clinic_ff`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action`
--

CREATE TABLE `action` (
  `action_id` varchar(10) NOT NULL,
  `action_name` varchar(100) NOT NULL,
  `action_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `action`
--

INSERT INTO `action` (`action_id`, `action_name`, `action_price`) VALUES
('ACT2345', 'Pemeriksaan Biasa', '45000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` varchar(10) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_address` varchar(100) NOT NULL,
  `doctor_gender` varchar(2) NOT NULL,
  `doctor_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_address`, `doctor_gender`, `doctor_phone`) VALUES
('DOC1114', 'Dr. Sinta ', 'Jl. Sariasih', 'P', '085345678878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medical_record`
--

CREATE TABLE `medical_record` (
  `medical_id` varchar(10) NOT NULL,
  `medical_date` date NOT NULL,
  `medical_diagnose` varchar(100) NOT NULL,
  `medical_temperature` varchar(50) NOT NULL,
  `medical_blood_pressure` varchar(50) NOT NULL,
  `medical_price` varchar(100) NOT NULL,
  `medical_status` varchar(50) NOT NULL,
  `patience_id` varchar(10) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `action_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medical_record`
--

INSERT INTO `medical_record` (`medical_id`, `medical_date`, `medical_diagnose`, `medical_temperature`, `medical_blood_pressure`, `medical_price`, `medical_status`, `patience_id`, `doctor_id`, `action_id`) VALUES
('MED3456', '2022-07-19', 'Demam dan pusing', '37 derajat', '120/90', '75000', 'Sudah diperiksa', 'PTC1456', 'DOC1114', 'ACT2345'),
('MED3567', '2022-07-22', 'Demam ', '39 derajat', '130/100', '80000', 'diperiksa', 'PTC1722', 'DOC1114', 'ACT2345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` varchar(10) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `medicine_category` varchar(50) NOT NULL,
  `medicine_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_category`, `medicine_price`) VALUES
('MED1234', 'Paramex', 'Tablet', '4500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `patience`
--

CREATE TABLE `patience` (
  `patience_id` varchar(10) NOT NULL,
  `patience_name` varchar(100) NOT NULL,
  `patience_address` varchar(100) NOT NULL,
  `patience_blood` varchar(50) NOT NULL,
  `patience_age` varchar(50) NOT NULL,
  `patience_gender` varchar(2) NOT NULL,
  `patience_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `patience`
--

INSERT INTO `patience` (`patience_id`, `patience_name`, `patience_address`, `patience_blood`, `patience_age`, `patience_gender`, `patience_phone`) VALUES
('PTC1456', 'Marrisa', 'Bandung', 'A', '18', 'P', '085262774356'),
('PTC1722', 'Cha cha', 'Medan', 'B', '25', 'P', '085262777867'),
('PTC1789', 'Fadil Febriansyah', 'Sariasih', 'B', '20', 'L', '085262777878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` varchar(50) NOT NULL,
  `recipe_amount` varchar(50) NOT NULL,
  `recipe_total` varchar(50) NOT NULL,
  `medicine_id` varchar(50) NOT NULL,
  `medical_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_amount`, `recipe_total`, `medicine_id`, `medical_id`) VALUES
('REC1234', '1', '7500', 'MED1234', 'MED3456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registry`
--

CREATE TABLE `registry` (
  `registry_id` varchar(10) NOT NULL,
  `registry_date` date NOT NULL,
  `registry_time` time NOT NULL,
  `registry_price` varchar(100) NOT NULL,
  `patience_id` varchar(10) NOT NULL,
  `doctor_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registry`
--

INSERT INTO `registry` (`registry_id`, `registry_date`, `registry_time`, `registry_price`, `patience_id`, `doctor_id`) VALUES
('REG1245', '2022-07-19', '19:19:05', '10000', 'PTC1456', 'DOC1114');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_total` varchar(50) NOT NULL,
  `medical_id` varchar(10) NOT NULL,
  `registry_id` varchar(10) NOT NULL,
  `recipe_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_date`, `transaction_total`, `medical_id`, `registry_id`, `recipe_id`) VALUES
('TRAN2345', '2022-07-19', '100000', 'MED3456', 'REG1245', 'REC1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indeks untuk tabel `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indeks untuk tabel `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`medical_id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patience_id` (`patience_id`);

--
-- Indeks untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indeks untuk tabel `patience`
--
ALTER TABLE `patience`
  ADD PRIMARY KEY (`patience_id`);

--
-- Indeks untuk tabel `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `medical_id` (`medical_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indeks untuk tabel `registry`
--
ALTER TABLE `registry`
  ADD PRIMARY KEY (`registry_id`),
  ADD KEY `patience_id` (`patience_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `medical_id` (`medical_id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `registry_id` (`registry_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `action` (`action_id`),
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `medical_record_ibfk_3` FOREIGN KEY (`patience_id`) REFERENCES `patience` (`patience_id`);

--
-- Ketidakleluasaan untuk tabel `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`medical_id`) REFERENCES `medical_record` (`medical_id`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`);

--
-- Ketidakleluasaan untuk tabel `registry`
--
ALTER TABLE `registry`
  ADD CONSTRAINT `registry_ibfk_1` FOREIGN KEY (`patience_id`) REFERENCES `patience` (`patience_id`),
  ADD CONSTRAINT `registry_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`medical_id`) REFERENCES `medical_record` (`medical_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`registry_id`) REFERENCES `registry` (`registry_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
