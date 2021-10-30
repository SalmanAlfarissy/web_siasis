-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2021 pada 04.57
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_siasismobile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_univ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alumnis`
--

INSERT INTO `alumnis` (`id`, `siswa_id`, `pekerjaan`, `jabatan`, `tahun_lulus`, `jurusan`, `email`, `nohp`, `nama_univ`, `alamat`, `foto`, `updated_at`, `created_at`) VALUES
(1, 2, 'Mahasiswa', '-', 2018, 'Teknologi Informasi', 'alfa@gmail.com', '082285032741', 'Politeknik Negeri Padang', 'hutan jura tempest', '1635346914100.jpeg', '2021-10-27 08:01:54', '2021-10-27 08:01:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_post` date NOT NULL DEFAULT current_timestamp(),
  `isi_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informasis`
--

INSERT INTO `informasis` (`id`, `judul_info`, `tgl_post`, `isi_info`, `gambar_info`, `updated_at`, `created_at`) VALUES
(1, 'KMI EXPO 2021', '2021-10-27', '<p>[ PENDAFTARAN KMI EXPO 2021 ]</p>\r\n\r\n<p>Halo Mahasiswa Indonesia</p>\r\n\r\n<p>Kewirausahaan Mahasiswa Indonesia (KMI) Expo kembali hadir di tahun 2021 dengan tema &ldquo;Sinergy Collaboration&rdquo; atau kolaborasi sinergi.</p>\r\n\r\n<p>KMI Expo XII 2021 membuka peluang kepada seluruh mahasiswa di Indonesia untuk ikut serta dalam kegiatan-kegiatan kewirausahaan dengan berbagai jenis lomba kewirausahaan mahasiswa.</p>\r\n\r\n<p>KMI Expo 2021 akan diselenggarakan oleh @univeristasbrawijaya bersama @kemdikbud.RI pada 17-19 November 2021.</p>\r\n\r\n<p>Kegiatan-kegiatan KMI Expo XII 2021 akan dilakukan secara daring dan luring dengan menerapkan protokol kesehatan. Rangkaian kegiatan akan ditayangkan pada platform-platform media Universitas Brawijaya.</p>\r\n\r\n<p>Join Us, Be Entrepreneur for The Bright Future</p>\r\n\r\n<p>Info lebih lanjut, kunjungi wesbsite&nbsp;https://kmiexpo2021.ub.ac.id/</p>\r\n\r\n<p>Find Us On :<br />\r\nInstagram : @kmiexpo2021<br />\r\nTwitter : @kmiexpo2021<br />\r\nFacebook page : KMI Expo 2021<br />\r\nTiktok : @kmiexpo2021<br />\r\nWebsite : https://kmiexpo2021.ub.ac.id</p>', '163534669999.jpeg', '2021-10-27 07:58:19', '2021-10-27 07:58:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `updated_at`, `created_at`) VALUES
(1, 'X.1', '2021-10-27 07:34:21', '2021-10-27 07:34:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matpel`
--

CREATE TABLE `matpel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matpel`
--

INSERT INTO `matpel` (`id`, `nama_pelajaran`, `updated_at`, `created_at`) VALUES
(1, 'Matematika', '2021-10-27 07:34:38', '2021-10-27 07:34:38'),
(2, 'B.indonesia', '2021-10-27 07:34:48', '2021-10-27 07:34:48'),
(3, 'Biologi', '2021-10-27 07:34:58', '2021-10-27 07:34:58'),
(4, 'Kimia', '2021-10-27 07:35:06', '2021-10-27 07:35:06'),
(5, 'Fisika', '2021-10-27 07:35:14', '2021-10-27 07:35:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajarans`
--

CREATE TABLE `pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staf_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `matpel_id` bigint(20) UNSIGNED NOT NULL,
  `kkm` bigint(20) NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal_masuk` time DEFAULT NULL,
  `jadwal_keluar` time DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelajarans`
--

INSERT INTO `pelajarans` (`id`, `staf_id`, `kelas_id`, `semester_id`, `matpel_id`, `kkm`, `hari`, `jadwal_masuk`, `jadwal_keluar`, `updated_at`, `created_at`) VALUES
(1, 2, 1, 1, 4, 75, 'Senen', '07:30:00', '10:00:00', '2021-10-27 08:43:48', '2021-10-27 07:36:36'),
(2, 3, 1, 1, 1, 75, 'Senen', '10:30:00', '12:00:00', '2021-10-27 09:12:40', '2021-10-27 09:12:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raports`
--

CREATE TABLE `raports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `tahun`, `semester`, `updated_at`, `created_at`) VALUES
(1, 2021, 'Semester 1', '2021-10-27 07:35:54', '2021-10-27 07:35:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staf_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_siswa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `staf_id`, `kelas_id`, `nis`, `nama`, `jurusan`, `gender`, `password`, `email`, `alamat`, `tgl_lahir`, `tempat_lahir`, `status`, `foto_siswa`, `updated_at`, `created_at`) VALUES
(1, 2, 1, '03035', 'Salman Alfarissy', '', 'pria', '$2y$10$kyqD2Ga337lDrZ3wpu2bfOrTkfVK/ANa0IlEUyhwD6th86tQ09tG.', 'salman.alfarissy@gmail.com', NULL, '2021-10-27', NULL, 'Siswa', '1635346774100.jpeg', '2021-10-27 07:59:34', '2021-10-27 07:59:34'),
(2, 2, 1, '10202', 'Beni maru', 'IPA', 'pria', '$2y$10$py.qOOu.Cq6WNcDsb6Iv/eIeG2QM6OBW6GO1B23aSsntSem7J7T.y', 'salman@gmail.com', NULL, '2021-10-27', NULL, 'Alumni', '163534684199.jpeg', '2021-10-27 08:00:41', '2021-10-27 08:00:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stafs`
--

CREATE TABLE `stafs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat_gol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_guru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stafs`
--

INSERT INTO `stafs` (`id`, `nip`, `nama`, `level`, `password`, `email`, `gender`, `alamat`, `tgl_lahir`, `tempat_lahir`, `jabatan`, `pangkat_gol`, `foto_guru`, `updated_at`, `created_at`) VALUES
(1, '261019991210199901', 'Salman Alfarissy', 'admin', '$2y$10$2QRCYe5SHXgmKAVArcpubuyrOUCJrqvEjfyUBOJ.YpiTYht0IzkuS', 'salman.alfarissy26@gmail.com', 'pria', 'kampuang tanjuang', '1999-10-26', 'koto mambang', 'Kepala sekolah', 'A1/4', '1633797789100.jpg', '2021-10-09 10:50:33', '2021-10-09 09:43:09'),
(2, '261019991210199902', 'Richy azura', 'guru', '$2y$10$VCbnmtqAp/P1W8WACqu1HuvP1IAOQ2DHakSLU5WOI1K47F4aY5iea', 'richy@gmail.com', 'wanita', 'Pesisir selatan', '1999-10-12', 'pesel', 'Guru Kimia', 'A1/4', '1635345204100.jpg', '2021-10-27 07:33:24', '2021-10-27 07:33:24'),
(3, '261019991210199903', 'Novita Aulia', 'guru', '$2y$10$HJr5zt12Z5CYVV1bkaIR2.xqy6fEnQwC6hDDsmHtFdjG/ZtmdVEnm', 'novi@gmail.com', 'wanita', 'guguak', '2000-09-04', 'guguak', 'Guru Matematika', 'A1/4', '1635351109100.jpeg', '2021-10-27 09:11:49', '2021-10-27 09:11:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnis_email_unique` (`email`),
  ADD KEY `alumnis_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelajarans_staf_id_foreign` (`staf_id`),
  ADD KEY `pelajarans_kelas_id_foreign` (`kelas_id`),
  ADD KEY `semester_id` (`semester_id`,`matpel_id`),
  ADD KEY `matpel_id` (`matpel_id`);

--
-- Indeks untuk tabel `raports`
--
ALTER TABLE `raports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raports_siswa_id_foreign` (`siswa_id`),
  ADD KEY `raports_pelajaran_id_foreign` (`pelajaran_id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`),
  ADD UNIQUE KEY `siswas_email_unique` (`email`),
  ADD KEY `siswas_staf_id_foreign` (`staf_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `stafs`
--
ALTER TABLE `stafs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stafs_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `raports`
--
ALTER TABLE `raports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stafs`
--
ALTER TABLE `stafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alumnis`
--
ALTER TABLE `alumnis`
  ADD CONSTRAINT `alumnis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  ADD CONSTRAINT `pelajarans_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelajarans_ibfk_2` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelajarans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelajarans_staf_id_foreign` FOREIGN KEY (`staf_id`) REFERENCES `stafs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `raports`
--
ALTER TABLE `raports`
  ADD CONSTRAINT `raports_pelajaran_id_foreign` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raports_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswas_staf_id_foreign` FOREIGN KEY (`staf_id`) REFERENCES `stafs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
