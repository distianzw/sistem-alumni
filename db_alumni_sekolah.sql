-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Apr 2026 pada 00.27
-- Versi server: 8.4.3
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tahun_lulus` year DEFAULT NULL,
  `alamat` text,
  `no_telepon` varchar(20) DEFAULT NULL,
  `angkatan_id` int DEFAULT NULL,
  `jurusan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id`, `user_id`, `jenis_kelamin`, `tahun_lulus`, `alamat`, `no_telepon`, `angkatan_id`, `jurusan_id`) VALUES
(18, 34, 'L', '2027', 'Jl.Handil Bakti', '08345549390', 31, 8),
(19, 35, 'P', '2027', 'Jl.Handil Bakti', '0809293028', 31, 9),
(20, 36, 'L', '2027', 'Jl.Handil Bakti', '08927839329', 31, 9),
(21, 37, 'L', '2027', 'Jl.pahlawan', '0812893008', 31, 10),
(22, 38, 'L', '2027', 'Jl.sungai miai', '089704805930', 31, 9),
(23, 39, 'L', '2027', 'Jl.tri sakti', '0892385386', 31, 9),
(24, 40, 'L', '2027', 'Jl.sungai miai', '08928937390', 31, 9),
(25, 41, 'L', '2027', 'Jl.sungai andai', '08923793639', 31, 9),
(26, 42, 'L', '2027', 'Jl.Handil Bakti', '0896565789', 31, 9),
(27, 43, 'L', '2027', 'Jl.benua anyar', '08997293629', 31, 10),
(28, 44, 'L', '2027', 'Jl.sungai lulut', '0845637477', 31, 9),
(29, 45, 'L', '2027', 'Jl.sungai miai', '0897986868', 31, 9),
(30, 46, 'L', '2027', 'Jl.gatot', '0894759368', 31, 9),
(31, 47, 'L', '2027', 'Jl.sungai miai', '0892723936', 31, 9),
(32, 48, 'L', '2031', 'Jl.kelayan', '08967755746', 31, 9),
(33, 49, 'P', '2027', 'Jl.pekapuran', '08965064849', 31, 9),
(34, 50, 'P', '2027', 'Jl.Pemangkih', '0897268352', 31, 7),
(35, 51, 'L', '2027', 'Jl.Handil Bakti', '0896846386', 31, 9),
(36, 52, 'L', '2027', 'Jl.vetran', '081234256789', 31, 9),
(37, 53, 'L', '2027', 'Jl.Mantuil', '08970807207', 31, 9),
(38, 54, 'L', '2027', 'amd.perdagangan', '083836462516', 31, 12),
(39, 55, 'P', '2027', 'handel bakte.geriya', '083110618583', 31, 9),
(40, 56, 'P', '2027', 'Jl.Handil Bakti', '08990279369', 31, 9),
(41, 57, 'P', '2027', 'Jl.Berangas', '089711456727', 31, 11),
(42, 58, 'P', '2027', 'Jl.Handil Bakti', '087708625836', 31, 9),
(43, 59, 'L', '2027', 'Jl.Sungai Andai', '08992638626', 31, 9),
(44, 60, 'L', '2027', 'Jl.plamboyan', '08219279636', 31, 9),
(45, 61, 'L', '2027', 'Jl.vetran', '089926468263', 31, 10),
(46, 62, 'P', '2027', 'surya gemilang hksn', '47824732874', 31, 10),
(47, 63, 'L', '2027', 'jl.pramuka no 12', '9384840923809', 31, 13),
(48, 64, 'L', '2027', 'Jl. Veteran RT 15, RW 02', '088809230551', 11, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int NOT NULL,
  `tahun_angkatan` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`id`, `tahun_angkatan`) VALUES
(3, '2000'),
(4, '2001'),
(5, '2002'),
(6, '2003'),
(7, '2004'),
(8, '2005'),
(9, '2005'),
(10, '2006'),
(11, '2007'),
(12, '2008'),
(13, '2009'),
(14, '2010'),
(15, '2011'),
(16, '2012'),
(17, '2013'),
(18, '2014'),
(19, '2015'),
(20, '2016'),
(21, '2017'),
(22, '2018'),
(23, '2019'),
(24, '2020'),
(25, '2021'),
(26, '2022'),
(27, '2023'),
(28, '2024'),
(29, '2025'),
(30, '2026'),
(31, '2027'),
(32, '2028'),
(33, '2029'),
(34, '2030');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi_berita`, `gambar`, `tanggal_post`, `user_id`) VALUES
(13, 'penerimaan peserta didik baru (PPDB)', ' smk isfi banjarmasin secara resmi mengumumkan pembukaan Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027 secara online. Langkah ini diambil untuk memberikan kemudahan, kecepatan, serta menjamin transparansi dalam proses seleksi bagi calon peserta didik baru dan orang tua/wali.', '1776819663_Cuplikan layar 2026-04-10 075542.png', '2026-04-09 23:55:59', 6),
(14, 'Peserta didik SMK ISFI Banjarmasin yang telah diterima di Perguruan Tinggi Swasta (ubaya)', 'Kepada Peserta Didik SMK ISFI Banjarmasin yang telah diterima di Perguruan Tinggi Swasta.\r\n\r\nSemoga keberhasilan ini menjadi awal perjalanan yang penuh prestasi, pengalaman berharga, dan kontribusi nyata bagi masyarakat.\r\n\r\nTeruslah belajar, berkembang, dan menginspirasi.\r\nLangkah kalian hari ini adalah harapan besar untuk masa depan.\r\n\r\n🎓 Bangga menjadi bagian dari perjalanan kalian\r\n\r\n✨ Sukses selalu di jenjang pendidikan berikutnya!\r\n', '1776819639_Cuplikan layar 2026-04-10 075648.png', '2026-04-09 23:58:35', 6),
(15, 'lolos seleksi snbp 2026', 'SELAMAT & SUKSES🎉\r\n\r\nKepada Peserta Didik SMK ISFI Banjarmasin yang telah berhasil LOLOS Seleksi Nasional Berdasarkan Prestasi (SNBP) 2026\r\n\r\nSemoga ini menjadi wasilah kesuksesan dan keberkahan nya untuk masa depan.\r\n\r\nBagi yang BELUM lulus SNBP 2026 tetap SEMANGAT, SABAR, IKHLAS. InsyaAllah kegagalan BISA menjadikan KEBERHASILAN.✨\r\n_________________________________\r\n\r\nSMK ISFI Banjarmasin\r\nBerkarakter, Berakhlak, Berkualitas, Profesional.\r\n🌟 Terakreditasi “A”', '1776819610_Cuplikan layar 2026-04-14 111005.png', '2026-04-14 03:11:24', 6),
(16, 'lolos seleksi PASKIBRAKA kot banjarmasin tahun 2026', 'Selamat & Sukses untuk prestasi membanggakan siswa SMK ISFI Banjarmasin 🇮🇩\r\n\r\nSiswi atas nama Fahryana Syafira\r\nKelas XA - Farmasi\r\nLolos Seleksi PASKIBRAKA Kota Banjarmasin Tahun 2026\r\n\r\nSemoga amanah, menginspirasi, dan membawa nama baik sekolah ke tingkat yang lebih tinggi.', '1776820186_Cuplikan layar 2026-04-22 090846.png', '2026-04-22 01:09:46', 6),
(17, 'workshop edukatif smk isfi banjarmasin', '✨WORKSHOP EDUKATIF di SMK ISFI Banjarmasin untuk siswa SMP/MTs✨\r\n\r\nPenasaran gimana rasanya jadi siswa SMK? 🤔\r\n\r\nYuk ikutan Workshop Seru di SMK ISFI Banjarmasin!\r\n✨ Banyak praktik langsung\r\n✨ Nambah pengalaman & skill baru\r\n✨ Kenalan sama jurusan-jurusan keren di SMK\r\n\r\nMelalui kegiatan ini, peserta akan mendapatkan pengalaman praktik langsung serta mengenal berbagai kompetensi keahlian yang ada di SMK.', '1776820315_Cuplikan layar 2026-04-22 091108.png', '2026-04-22 01:11:55', 6),
(18, 'in house training smk isfi banjarmasin', 'Terimakasih @direktoratsmk sudah memberikan kepercayaan kepada SMK ISFI Banjarmasin sebagai salah satu SMK Penerima Bantuan Pemerintah SMK Pusat Keunggulan Skema Pembelajaran Mendalam Tahap 5 tahun 2025\r\nSalah satu kegiatan yang merupakan Rangkaian dari Seluruh Kegiatan SMK PK PM adalah In House Training (IHT) Meningkatkan jiwa kewirausahaan bagi pendidik Program SMK Pusat Keunggulan Skema Penguatan Pembelajaran Mendalam Tahun 2025 dengan Narasumber Ibu Ika Yuliana,S.Pd.,M.Pd (Kepala SMKN 2 Simpang Empat Tanah Bumbu) Beliau berbagi praktik baik tentang pendidik di SMK harus memiliki skill _enterpreneur_ agar siswa terbiasa dengan kegiatan kewirausahaan sehingga terbiasa dan siap kerja serta diharapkan bisa mandiri dan membuka usaha setelah lulus SMK\r\nSelain itu sekolah juga terbantu jika banyak produk yang dihasilkan sehingga ada penghasilan tambahan untuk operasional Sekolah.\r\nHarapannya banyak enterpreneur sukses yang dihasilkan dari SMK ISFI Banjarmasin\r\n', '1776820464_Cuplikan layar 2026-04-22 091316.png', '2026-04-22 01:14:24', 6),
(19, 'penyerahan piagam penghargaan  juara LKS', '🏆 Penyerahan Piagam Penghargaan Juara LKS\r\nSelamat dan sukses kepada Ahmad Ridho Ramadhan atas prestasi membanggakan sebagai Juara Nasional LKS Bidang Lomba Teknik Desain Laman.\r\n\r\nPiagam penghargaan ini diserahkan sebagai bentuk apresiasi atas kerja keras, dedikasi, dan semangat juang yang telah ditunjukkan.\r\n\r\nSemoga prestasi ini menjadi motivasi untuk terus berkarya, menginspirasi, dan meraih pencapaian yang lebih tinggi di masa depan. 🌟', '1776820740_Cuplikan layar 2026-04-22 091813.png', '2026-04-22 01:19:00', 6),
(20, ' Kontingen LKS SMK Kalimantan Selatan 2025', '🎉 Kontingen LKS SMK Kalimantan Selatan 2025 resmi diberangkatkan!\r\nSelamat berjuang untuk seluruh peserta, termasuk\r\n💻 Ahmad Ridho Ramadhan – siswa Rekayasa Perangkat Lunak SMK ISFI Banjarmasin yang akan mewakili Banua di bidang Web Technology!\r\n\r\nDengan semangat SMK Bisa – SMK Hebat, Ridho dan kontingen Kalsel siap membawa pulang prestasi dari ajang bergengsi tingkat nasional.\r\nTunjukkan kemampuan terbaikmu, harumkan nama daerah, dan buktikan bahwa:\r\n🔥 Anak SMK Bisa Hebat!\r\n🔥 Kalsel Bisa Juara!\r\n', '1776820879_Cuplikan layar 2026-04-22 092021.png', '2026-04-22 01:21:19', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tipe` enum('foto','video') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `file`, `tipe`, `created_at`) VALUES
(10, 'ulang tahun bapak Dwi Jimmy H., S.Pd yang ke-35 tahun', 'WhatsApp Image 2026-04-22 at 09.33.43.jpeg', 'foto', '2026-04-22 01:48:39'),
(11, 'lomba voli smk isfi banjarmasin', 'WhatsApp Image 2026-04-22 at 09.33.41 (1).jpeg', 'foto', '2026-04-22 01:50:05'),
(13, 'lomba 17 agustus 1945', 'WhatsApp Image 2026-04-22 at 09.33.47.jpeg', 'foto', '2026-04-22 01:51:39'),
(14, 'penyerahan penghargaan menang lomba X RPL', 'WhatsApp Image 2026-04-22 at 09.33.35 (1).jpeg', 'foto', '2026-04-22 01:52:57'),
(15, 'foto bersama wali kota banjarmasin (bpk H.M.Yamin HR)', 'WhatsApp Image 2026-04-22 at 09.34.01.jpeg', 'foto', '2026-04-22 01:54:52'),
(17, 'foto terakhir bersama ibu Yunika Perdana S.Pd Gr M.Pd CIP', 'WhatsApp Image 2026-04-22 at 09.33.57.jpeg', 'foto', '2026-04-22 02:00:47'),
(18, 'kebersamaan kelas X RPL', 'WhatsApp Image 2026-04-22 at 09.33.33.jpeg', 'foto', '2026-04-22 02:02:32'),
(20, 'malam tahun baru 2026', 'WhatsApp Image 2026-04-22 at 09.59.31.jpeg', 'foto', '2026-04-22 02:04:51'),
(22, 'selamat hari kartini ', 'WhatsApp Image 2026-04-22 at 10.05.47.jpeg', 'foto', '2026-04-22 02:08:53'),
(24, 'Touring bersama ke tahura', 'WhatsApp Image 2026-04-22 at 10.04.40.jpeg', 'foto', '2026-04-22 02:11:50'),
(27, 'awal masuk kelas X RPL', 'WhatsApp Image 2026-04-22 at 10.23.12.jpeg', 'foto', '2026-04-22 02:30:18'),
(28, 'foto bersama bpk khaidir querencia kelulusan angkatan 58', 'WhatsApp Image 2026-04-22 at 10.27.56.jpeg', 'foto', '2026-04-22 02:33:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
(7, 'PERAWAT'),
(8, 'DKV'),
(9, 'RPL'),
(10, 'FARMASI'),
(11, 'KECANTIKAN'),
(12, 'ALAT BERAT'),
(13, 'perkantoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int NOT NULL,
  `alumni_id` int NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `tahun_mulai` year DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `alumni_id`, `nama_perusahaan`, `jabatan`, `tahun_mulai`) VALUES
(4, 39, 'pt free port', 'c i o', '2031'),
(5, 38, 'pt free port', 'supervisor', '2031'),
(6, 27, 'rs ulin', 'ob', '2027');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `alumni_id` int NOT NULL,
  `nama_institusi` varchar(150) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `tahun_masuk` year DEFAULT NULL,
  `tahun_lulus` year DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `alumni_id`, `nama_institusi`, `jenjang`, `tahun_masuk`, `tahun_lulus`) VALUES
(5, 39, 'unair', 's1 hukum', NULL, '2029'),
(6, 38, 'unlam', 's1 alat berat', NULL, '2027'),
(7, 27, 'itb', 's1 sastra', NULL, '2027');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('admin','alumni') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `fullname`, `password`, `foto`, `role`) VALUES
(5, 'admin@sekolah.id', 'Administrator', '$2y$10$V7g5kR9xQJZ7m2c0KJ8UOeZ8W5kZbY2QkqgXnE3dKz8s1qO6c2F9a\n', NULL, 'admin'),
(6, 'admin@admin.com', 'Administrator', '$2y$10$.mHjXlLgZYdp.mmicy8YGugUOWfRJHhxE6SSbvVhCn.L6.9ken8EG', NULL, 'admin'),
(34, 'rizqiahmad32@gmail.com', 'rizqi ahmad', '$2y$10$PyovORPODso8j8IEm1pSf.sQoBtvbdZK7iATJXx9SZPEuu0yzT8Dq', NULL, 'alumni'),
(35, 'reny31aulia@gmail.com', 'reny aulia putri', '$2y$10$AHGVBjgr5tdybKcqmhwfbODkyDAAR9M2u6ImWRjbqkIs8iuyblDzS', NULL, 'alumni'),
(36, 'rama30@gmail.com', 'ramadhani fadillah', '$2y$10$AxXnB9BFbZRbCe2NzzUIXehjrAtCNYamO09kC0MhFvJcuAlo8CPMG', NULL, 'alumni'),
(37, 'rahmatiilahi@gmail.com', 'rahmatullah', '$2y$10$hT8klSV.hBr9y9wo8gYCtuuMMouz5qrPcpwyB9A/oV9/styns9f8.', NULL, 'alumni'),
(38, 'rafi098@gmail.com', 'rafi hafizh wahyudi', '$2y$10$dYrqWMxv5SXNCNHxnrJ/puwQ5MVYKWTfuxglml614ySh6J10ukJC.', NULL, 'alumni'),
(39, 'basith@gmail.com', 'nur rayhan basith', '$2y$10$GJzK/QkoOX2ofqyo1xynLuam4a0j/m1p4dkvxW0EAAdI1d/KW69NW', NULL, 'alumni'),
(40, 'ziyad654@gmail.com', 'muhammad ziyad', '$2y$10$bjwq5F901KYOvSiUd/HUbO0/sfw6/.p.UVo6EPGR/eNSidgIeCJhu', NULL, 'alumni'),
(41, 'ridho216@gmail.com', 'muhammad ridho', '$2y$10$uEibDqbQib48sDGMi90Bu.Z7MRAVHo9.1kP6elRz3lJA0K9ldsV3a', NULL, 'alumni'),
(42, 'rasyid.dho23@gmail.com', 'muhammad rasyid ridho', '$2y$10$qmBpfYhD3gqevRjPQitfEeOFoOSfGxrbzzr3vaKjcU6ASiuNterf.', NULL, 'alumni'),
(43, 'muhyi.AAT123@gmail.com', 'Muhammad Muhyi Noor Rizky', '$2y$10$MnhgegRkeEyMh.JGU59PsuLNr2dbDALQ7RueiB2z1.5a6T.MLkVRa', '1776826143_WhatsApp Image 2026-04-22 at 10.45.35.jpeg', 'alumni'),
(44, 'ghilbransgrt@gmail.com', 'muhammad ghilbran sugiarto', '$2y$10$1QTgTxDq82EzkXLRzUpwEeHmlvaF5csYStazpKkFabbqFSaxWc/uG', NULL, 'alumni'),
(45, 'dika321@gmail.com', 'muhammad andika pratama', '$2y$10$4gMCWTWSel0BXm5tRdpT1unIwt39lufQDBp4g5Ac715pUsij9DRDi', '1776826102_WhatsApp Image 2026-04-22 at 10.45.34.jpeg', 'alumni'),
(46, 'rahel@gmail.com', 'm.rahil aditya', '$2y$10$1eElEJKByWWxau9IYCWv6.uhf9IQ5/l6ZcFveV27ux9vtJ730za8m', NULL, 'alumni'),
(47, 'fitrikhairi@gmail.com', 'm.fitri fahrezi', '$2y$10$Zzl2SwdGg.qxfOvOI68MKe076x04HvvH6au1g0wdFUuyaUQ59jdZy', NULL, 'alumni'),
(48, 'addigcor@gmail.com', 'm.addi maulana', '$2y$10$3id15psh3sMKL6MSduekTOXbMPvLjwqEDf5vjaGx6N9snxLOc3vFi', NULL, 'alumni'),
(49, 'karima07@gmail.com', 'karima azzahra', '$2y$10$m9fFScjLNBK0C6KPHa.bSOJ4pANCDjsad2XIeOSV3zwl2tYJekLlW', NULL, 'alumni'),
(50, 'morienaga@gmail.com', 'jahra amellia', '$2y$10$r6xILWJ8SJPG5ri/zA3Ob.0Dkpf5ZxnxhQubFrl7PgB0f3IES6Mne', '1776826653_WhatsApp Image 2026-04-22 at 10.56.12.jpeg', 'alumni'),
(51, 'irfanjeje23@gmail.com', 'irfan nuraini', '$2y$10$Gd6V.tW7XL1dI5n7gd8MUO6xkBWeR5XOao/Xp3Vlo4vRPCbcNcWIe', NULL, 'alumni'),
(52, 'ibra12345@gmail.com', 'ibra shaumi sutana', '$2y$10$QMKxXUT/Vi0kS8YzNhVuO.UY4VdNmLzg0XEZDwprevi8Fc5T.Db4a', NULL, 'alumni'),
(53, 'palennnn@gmail.com', 'falenthino dhimas putranto nugroho', '$2y$10$r6d.0yrdJmA0ZN/Z.GdcGOw3wIIQPbyndMWRWB2ZEOxx/Jri2pnZ6', NULL, 'alumni'),
(54, 'fabianrizki001@gmail.com', 'Fabian Rizki Fandiya', '$2y$10$Riks1F2IYHE1pOGkrinSxenN6V.M5txJuXrzyhQG59YhdwSu36oXe', '1776863084_WIN_20260409_14_10_19_Pro.jpg', 'alumni'),
(55, 'distia.imup@gmail.com', 'Distia Nazwa Adiba', '$2y$10$0xvcedDiQpM29i/nSG1TOugbfUAZR9v/GTngmQqI9WBrRhVq5d3lC', '1776826273_WhatsApp Image 2026-04-22 at 10.50.21.jpeg', 'alumni'),
(56, 'diny1005@gmail.com', 'diny fitriani atmaja', '$2y$10$XmPh9DmiHVvycEcsqXId1.GrhFkulHtpQhBTdlyuZ91MjBFvV2N/S', NULL, 'alumni'),
(57, 'desyemon@gmail.com', 'desy rahmawati', '$2y$10$ZQp4MlI6iBgRA5EYucJDFO6t4JPQa1v/DorEKHCEKvePUIBGXJVVO', NULL, 'alumni'),
(58, 'inaynayah70@gmail.com', 'bunga inayah', '$2y$10$SnK1IIFgZeR8rByMAYNYsuoA.ywxh9hMZIH.pfMupsIl10eL2lrxK', NULL, 'alumni'),
(59, 'arya@gmail.com', 'arya putra pratama', '$2y$10$hFKNNv0wmwuqbGzB.KFguu4DJNdtMz10d0.ufrmQzJTqmE6EwxIxW', NULL, 'alumni'),
(60, 'arifinja@gmail.com', 'arifin ilham', '$2y$10$ApgtfeIZUTEUiEyp3C120OUqnPA3hvNjyPouKhayLwA7pxyDw//h2', NULL, 'alumni'),
(61, 'andi99@gmail.com', 'andi muhammaad ridho', '$2y$10$b1qnqZtTh2l619CzaO840Oks0P8yHHzeIFKgckcu31.jxXEecodmy', NULL, 'alumni'),
(62, 'amellia987@gmail.com', 'amellia nur saidah', '$2y$10$U8GY0UCfO0t4KVDwl/js.uQOpQfQYo88LLsn3uU/Hs4cLWk6QopVu', '1776826346_WhatsApp Image 2026-04-22 at 10.50.27.jpeg', 'alumni'),
(63, 'aldi.123@gmail.com', 'aldi maulana', '$2y$10$FL7lD9wCKwnul0CxWbDRk.Yy3DLgWHk8K1Yo.sDVM3bhem0zIFc02', NULL, 'alumni'),
(64, 'lionhelppp@gmail.com', 'ahmad rifa\'i', '$2y$10$hKpNOnqwyI.4RVg5oq1wB.9/xWECLJI/Etq1I/X0gb16J6WOJS4Q6', NULL, 'alumni');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `angkatan_id` (`angkatan_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`angkatan_id`) REFERENCES `angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_3` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
