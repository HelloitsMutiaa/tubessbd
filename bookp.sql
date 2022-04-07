-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2022 pada 06.29
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `childs`
--

CREATE TABLE `childs` (
  `id_child` int(11) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `child_uname` varchar(100) NOT NULL,
  `child_pass` varchar(20) NOT NULL,
  `child_lahir` date DEFAULT NULL,
  `id_level` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `code_course` char(5) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `vid_course` varchar(200) DEFAULT NULL,
  `course_cover` varchar(50) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'ortu'),
(3, 'guru'),
(4, 'anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongoing`
--

CREATE TABLE `ongoing` (
  `id_ongoing` int(11) NOT NULL,
  `id_child` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id_child` int(11) DEFAULT NULL,
  `id_selesai` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `selesai`
--

CREATE TABLE `selesai` (
  `id_selesai` int(11) NOT NULL,
  `id_ongoing` int(11) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `pass_user` varchar(20) NOT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `childs`
--
ALTER TABLE `childs`
  ADD PRIMARY KEY (`id_child`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `code_course` (`code_course`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  ADD PRIMARY KEY (`id_ongoing`),
  ADD KEY `id_child` (`id_child`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD KEY `id_child` (`id_child`),
  ADD KEY `id_selesai` (`id_selesai`);

--
-- Indeks untuk tabel `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`id_selesai`),
  ADD KEY `id_ongoing` (`id_ongoing`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `childs`
--
ALTER TABLE `childs`
  MODIFY `id_child` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  MODIFY `id_ongoing` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `selesai`
--
ALTER TABLE `selesai`
  MODIFY `id_selesai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `childs`
--
ALTER TABLE `childs`
  ADD CONSTRAINT `childs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `childs_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  ADD CONSTRAINT `ongoing_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `childs` (`id_child`),
  ADD CONSTRAINT `ongoing_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

--
-- Ketidakleluasaan untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `childs` (`id_child`),
  ADD CONSTRAINT `poin_ibfk_2` FOREIGN KEY (`id_selesai`) REFERENCES `selesai` (`id_selesai`);

--
-- Ketidakleluasaan untuk tabel `selesai`
--
ALTER TABLE `selesai`
  ADD CONSTRAINT `selesai_ibfk_1` FOREIGN KEY (`id_ongoing`) REFERENCES `ongoing` (`id_ongoing`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
