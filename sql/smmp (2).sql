-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2022 pada 05.46
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smmp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cplmks`
--

CREATE TABLE `cplmks` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cpl` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpls`
--

CREATE TABLE `cpls` (
  `id` int(11) NOT NULL,
  `aspek` enum('sikap','pengetahuan','umum','keterampilan') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `kurikulum` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_09_03_162818_create_users_table', 1),
(2, '2022_09_16_080822_create_mks_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mks`
--

CREATE TABLE `mks` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rumpun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prasyarat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_teori` int(11) NOT NULL,
  `bobot_praktikum` int(11) NOT NULL,
  `dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pustaka_utama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pustaka_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mks`
--

INSERT INTO `mks` (`id`, `kode`, `nama`, `deskripsi`, `rumpun`, `prasyarat`, `bobot_teori`, `bobot_praktikum`, `dosen`, `materi`, `pustaka_utama`, `pustaka_pendukung`, `created_at`, `updated_at`) VALUES
(1, 'COM010101', 'tesu', '<p>tes</p>\r\n<ul>\r\n<li>tes</li>\r\n<li>tes</li>\r\n</ul>', 'Wajib', 'Tidak ada', 2, 1, 'Anggie Tamara', '<p>tes</p>\r\n<ol>\r\n<li>tes</li>\r\n<li>tes</li>\r\n</ol>', 'tes', '-', '2022-09-18 20:44:43', '2022-09-23 02:55:23'),
(4, 'COMtBGejy', '8uFR EKfQj', 'JHOOXKQdzU8Nad6jU40N3aglZ7ijFPZe6kCtd9ahqV0Bcl0r4zQTPGWI0gLTrTcwaDyQzLSM8Ir877qxi7qjnKuSKWyfGbHWI9cFaXnPwjFSs4N6MFC89Oua59hHx4Pt3HCZgpN8vTAZk9tkyWQprDST4td8EUdSSEEVEKa7HLCdrF94cKgi1pbwq8UsnXaxvvZvVRkDXSLHqd1K3pK1YPADVRWX2K6xsn1Te9TvjgI1MM7JziWgDa1NgO410wF', 'Wajib', '0Yq2 KsNaQ', 2, 1, 'Romdoni', '1N6RHi4onESbtW4zlMOWDXYpyymdSyELKZ2L3tJsEx3OkUXrORjfswnzYZ93ki0T4qHQcZGIYQQtzKYiYLNj5HZ9aE1N5FUobDJI6ELgiKsNLW4YOLhBHPhpwZy15za9fZ2ViRvUsWjz7cc8UWbzJBTTH482UfJt7eTuWaq6cCa19XRGlB5q4U0FVmfxctyvUdFcnA48s42ss6CknxcsAcMwJkayEGII2mb9AFnVS1GIjJtciZbHH2UQO0E4Sky', '9KP78qAZY xE41Ws5E0hLn', 's3QqiEECK SFvZvebWQfO7', '2022-09-19 00:20:12', '2022-09-19 00:20:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rpss`
--

CREATE TABLE `rpss` (
  `id` int(11) NOT NULL,
  `id_mk` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pengembang` varchar(255) NOT NULL,
  `koordinator` varchar(255) NOT NULL,
  `kaprodi` varchar(255) NOT NULL,
  `id_cplmk` int(11) NOT NULL,
  `sub_cpmk` text NOT NULL,
  `metode` text NOT NULL,
  `indikator` text NOT NULL,
  `kriteria` text NOT NULL,
  `bobot` int(11) NOT NULL,
  `materi` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `otoritas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `img`, `otoritas`, `created_at`, `updated_at`) VALUES
(2, 'achieto', 'achieto.17210@gmail.com', NULL, '$2y$10$Jk00BcsHnMJxxMew7WJrUeob8XwZvDGjkNqPdyafkco4mTbdmPH6u', NULL, '1664033421975-WhatsApp-Image-2021-11-30-at-10.22.04.jpeg', 'Admin', '2022-09-03 12:05:23', '2022-09-24 15:30:22'),
(12, 'Hibiki, S.Kom., M.Kom.', 'hibiki.17210@gmail.com', NULL, '$2y$10$l2WmI6y79VAHx5MFwX1UNO8BcsLHVfSzENhuGG6jVoa4y927IOwYu', NULL, '1662621480059-wp5488502-jibaku-shounen-hanako-kun-wallpapers.jpg', 'Dosen', '2022-09-07 11:04:33', '2022-09-23 02:50:41'),
(13, 'Romdoni', 'romdoni@gmail.com', NULL, '$2y$10$Mzg8zcISH7Z/6h8zDEniJ.HC/Bra8arBH1q6/fB.z4aYtwXujKdoS', NULL, '1662619345125-wp5488531-jibaku-shounen-hanako-kun-wallpapers.jpg', 'Dosen', '2022-09-07 11:06:40', '2022-09-07 23:43:06'),
(14, 'Anggie Tamara', 'anggie.t17210@gmail.com', NULL, '$2y$10$Pnv3K5OqtzNhdAwD0SwIj.jeUTBNzRk60arZTH.L11j649le0insu', NULL, '1662968664210-Red.(Arknights).full.2831158.jpg', 'Dosen', '2022-09-07 11:22:10', '2022-09-12 00:54:18'),
(15, 'Jes Jele', 'jesjele@gmail.com', NULL, '$2y$10$vSqgBZv0zdpU3di3CY/nW.6G9P3EvlmYcvkWJxJHBjjhyjJjcDB8.', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 11:31:28', '2022-09-07 11:31:28'),
(21, 'Irpan Jele', 'irpan@gmail.com', NULL, '$2y$10$NMmM9MkabbbmEdC9uEaMHuoio5m/318sbqpfVg50eK065AP2Vnsy2', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 11:44:39', '2022-09-15 20:23:28'),
(32, 'Daffa', 'daffa@gmail.com', NULL, '$2y$10$PtHxMA6Du7B80ZlVL4VTKOfJYo.bQJv6PkOi2Zos.q.zI82IiGQYS', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 11:57:46', '2022-09-07 11:57:46'),
(34, 'Papa', 'papa@gmail.com', NULL, '$2y$10$JGeb1p3cvHALSWMLoOGmluOhBwChLOHDhm0X4xXrzgQtcSgn/8HIa', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 11:59:52', '2022-09-07 11:59:52'),
(35, 'Mama', 'mama@gmail.com', NULL, '$2y$10$8kDmusGwbTrcFSlRxsl6muVGq.QzN3B0dsBU5N6uNT6L7smgthQVa', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:01:00', '2022-09-07 12:01:00'),
(39, 'Hans', 'hans@gmail.com', NULL, '$2y$10$1fBBiQuHpah4eTWe/0w0heWNzxEnNClXdE3dkK3b/g6vOFPLL.2vO', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:04:56', '2022-09-07 12:04:56'),
(40, 'Abi', 'abi@gmail.com', NULL, '$2y$10$IaPUtXwHp.i2Se6HQQhrNeTHUx4w5YNL9bwiqu6EJNJgnweC.Q.YG', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:05:37', '2022-09-07 12:05:37'),
(41, 'Nopri', 'nopri@gmail.com', NULL, '$2y$10$YiU0KTEhMHOsae03G9OQo.NClETVSq6mfjSuTCKzbI1aG1WLv2l7C', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:06:42', '2022-09-07 12:06:42'),
(42, 'Remonk', 'emon@gmail.com', NULL, '$2y$10$Lj4YnmUvPsACl3u5gBdOu.sswSxEiO5GSyLCxL/3IsLXesUTh8bYy', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:08:14', '2022-09-07 12:08:14'),
(43, 'Krisna', 'kris@gmail.com', NULL, '$2y$10$VC1knzjDmwP89lSdNomDcuc2QZGWIBS/y2N1O1w/9QpL.BGt5P7Di', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:08:53', '2022-09-07 12:08:53'),
(44, 'Bintang', '2ntng@gmail.com', NULL, '$2y$10$0qdICm5SPQOD8PzoJXEt0uzO0boH5qsplsblPIHgYwwcTv36m7J5G', NULL, 'User-Profile.png', 'Dosen', '2022-09-07 12:09:26', '2022-09-07 12:09:26'),
(45, 'Ardella Dean Awalia', 'abangardel@gmail.com', NULL, '$2y$10$5YdRpdYS2QIUSOn8rG9FUuORTuRInAG8wFOLvPEu9jgRt6DwrmfwW', NULL, 'User-Profile.png', 'Dosen', '2022-09-15 19:45:31', '2022-09-15 19:45:31'),
(46, 'Irpan Elek', 'elek@gmail.com', NULL, '$2y$10$nEx/62kqcBaQhFbHhsZEYeSlMHvi.lWoIjo5Ub73CLs56c6P9Jibq', NULL, 'User-Profile.png', 'Dosen', '2022-09-15 20:22:58', '2022-09-15 20:22:58'),
(60, 'Ahmad Saleh, S.Kom.', 'ahmad@gmail.com', NULL, '$2y$10$fv3qtv8ycKBal5nmVnLroORdAdX8x6JShxwaMUaPIf0p8D.kweejO', NULL, 'User-Profile.png', 'Dosen', '2022-09-20 23:00:36', '2022-09-20 23:00:36'),
(61, 'siti bad', 'siti@gmail.com', NULL, '$2y$10$PZN1cQhy3CAR1GO6/mquju7En/ArWfvgMF7pZhbElkT5GSIzl2Kje', NULL, 'User-Profile.png', 'Dosen', '2022-09-20 23:00:36', '2022-09-20 23:00:36'),
(62, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$DmGV2u/wa6bOtWsDIBlJUOYNqIjXqAeyPXCYNIBwEkNjiH0aYenKG', NULL, 'User-Profile.png', 'Dosen', '2022-09-20 23:00:36', '2022-09-20 23:00:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cplmks`
--
ALTER TABLE `cplmks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cpl` (`id_cpl`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- Indeks untuk tabel `cpls`
--
ALTER TABLE `cpls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mks`
--
ALTER TABLE `mks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mks_kode_unique` (`kode`);

--
-- Indeks untuk tabel `rpss`
--
ALTER TABLE `rpss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cplmk` (`id_cplmk`),
  ADD KEY `id_mk` (`id_mk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cplmks`
--
ALTER TABLE `cplmks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cpls`
--
ALTER TABLE `cpls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mks`
--
ALTER TABLE `mks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rpss`
--
ALTER TABLE `rpss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cplmks`
--
ALTER TABLE `cplmks`
  ADD CONSTRAINT `cplmks_ibfk_1` FOREIGN KEY (`id_cpl`) REFERENCES `cpls` (`id`),
  ADD CONSTRAINT `cplmks_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `mks` (`kode`);

--
-- Ketidakleluasaan untuk tabel `rpss`
--
ALTER TABLE `rpss`
  ADD CONSTRAINT `rpss_ibfk_1` FOREIGN KEY (`id_cplmk`) REFERENCES `cplmks` (`id`),
  ADD CONSTRAINT `rpss_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `mks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
