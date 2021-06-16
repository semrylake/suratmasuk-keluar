-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 11.32
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penelitian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2b$10$zMPPkkkguj21L0MBS7o0IOlIkgMlaYHR0FbQgltFG5JNf.8nxdpQe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengabdian`
--

CREATE TABLE `data_pengabdian` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `realisasi` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengabdian`
--

INSERT INTO `data_pengabdian` (`id`, `nama`, `kegiatan`, `tgl`, `tempat`, `realisasi`, `file`) VALUES
(2, 'Paulina ', 'Pembimbingan Rekoleksi', '2021-04-03', 'Desa Fatuleu', 'terlaksana', '98-272-1-PB.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_personalia`
--

CREATE TABLE `data_personalia` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_personalia`
--

INSERT INTO `data_personalia` (`id`, `nama_dosen`, `hari`, `tanggal`, `nama_dokumen`, `file`) VALUES
(6, 'DR.Phil. Norbertus Jegalus,MA', 'Senin', '2021-06-04', 'ijasah S1', '420-1077-2-PB.pdf'),
(7, 'DR.Phil. Norbertus Jegalus,MA', 'Sabtu', '2021-06-19', 'qwertyyyyy', 'Matematika_Diskrit.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jabatan` varchar(200) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `id_jabatan`, `jk`, `alamat`, `tlp`, `tempat_lahir`, `tanggal_lahir`, `foto`) VALUES
(9, '12334', 'DR.Phil. Norbertus Jegalus,MA', 'Dosen pengajar', 'Pria', 'Kelurahan Oesapa', '082235487304', 'manggarai', '1962-06-23', 'PAS_FOTO8.jpg'),
(10, '12345', 'DR. Watu Yohanes Vianey,M.HUM', 'Dosen pengajar', 'Pria', 'BTN Koluha K-22', '082235487304', 'Ngada', '1962-08-08', 'PAS_FOTO31.jpg'),
(11, '123456', 'MGR. DR. Dominikus Saku,Pr', 'Dosen pengajar', 'Pria', 'Lalian Tolu', '082235487304', 'Taekas', '1960-04-03', 'PAS_FOTO11.JPG'),
(12, '1234567', 'Rm. DR. Hermanus Punda Panda,Pr', 'Dosen pengajar', 'Pria', 'Seminari Tinggi St.Mikhael-Penfui', '2147483647', 'Weepangali', '1964-11-18', 'Pas_foto-1.jpg'),
(13, '12345678', 'Rm. DR. Oktavianus Naif,Pr', 'Dosen pengajar', 'Pria', 'Seminari Tinggi St.Mikhael-Penfui', '2147483647', 'Nifuboke', '1966-10-05', 'PAS_FOTO3.jpg'),
(14, '123478', 'Rm.DR. Hironimus Pakaenoi,Pr.L.TH', 'Dosen pengajar', 'Pria', 'Seminari Tinggi St.Mikhael-Penfui', '2147483647', 'Noemuti', '1969-04-14', 'PAS_FOTO5.jpg'),
(15, '12345679', 'Rm. Drs. Leonardus Mali, Pr.L.PH', 'Dosen pengajar', 'Pria', 'Seminari Tinggi St.Mikhael-Penfui', '8999999', 'Atambua', '1962-07-23', 'Pas_foto-11.jpg'),
(16, '123456', 'Rm. Drs. Mikhael Valens Boy, Pr.Lic', 'Dosen pengajar', 'Pria', 'Seminari Tinggi St.Mikhael-Penfui', '788990', 'Manufui', '1959-09-23', 'PAS_FOTO6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(2, 'Dosen pengajar'),
(3, 'Ketua Program Studi'),
(4, 'Dekan Fakultas'),
(5, 'Sekretaris Program Studi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_hari`
--

CREATE TABLE `jenis_hari` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_hari`
--

INSERT INTO `jenis_hari` (`id`, `nama`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id`, `nama`) VALUES
(2, 'Rekoleksi Bersama'),
(3, 'Rapat Senat Fakultas'),
(4, 'Pembinaan Iman Siswa SD'),
(5, 'Pembersihan Lingkungan Fakultas'),
(6, 'Rekoleksi di SMA Negeri Kupang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(50) NOT NULL DEFAULT '',
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jk`, `alamat`, `tlp`, `tempat_lahir`, `tanggal_lahir`, `foto`) VALUES
(5, '23117013', 'Josua Baksuni', 'Pria', 'Oebelo', '082333666777', 'Atambua', '1999-04-08', 'FB_IMG_1618363439724.jpg'),
(6, '23117015', 'Yohanista Tho Emin', 'Wanita', 'Liliba', '081222333444', 'Larantuka', '1990-10-25', 'IMG_2252.JPG'),
(7, '23117083', 'Maria Ida', 'Wanita', 'Liliba', '087222333444', 'Ende', '1999-12-20', 'FB_IMG_1611719360658.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_dosen`
--

CREATE TABLE `penelitian_dosen` (
  `id` int(11) NOT NULL,
  `id_dosen` varchar(200) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tahun_penelitian` year(4) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penelitian_dosen`
--

INSERT INTO `penelitian_dosen` (`id`, `id_dosen`, `judul`, `tempat`, `tahun_penelitian`, `file`) VALUES
(9, '7', 'Pelatihan Pemrograman Web', '', 2021, '42-Article_Text-78-1-10-20200105.pdf'),
(10, '6', 'Pembelajaran Big Data', '', 2021, '1__145610043_HALAMAN_DEPAN.pdf'),
(11, '8', 'Tutorial Pembelajaran Android ( Mahasiswa Undana )', '', 2022, '96-188-1-SM.pdf'),
(12, '6', 'hhhhh', '', 0000, 'BAB IV.pdf'),
(13, '9', 'Sistem Informasi', 'Kupang', 2021, 'SKRIPSI_MUH_FAUZI_NATSIR_PDF.pdf'),
(14, '16', 'Sistem Informasi', 'Sabu', 1999, 'jenis_kegiatan.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_mhs`
--

CREATE TABLE `penelitian_mhs` (
  `id` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun_penelitian` year(4) NOT NULL,
  `tempat_penelitian` varchar(255) NOT NULL,
  `pembimbing` varchar(255) NOT NULL,
  `penguji` varchar(255) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penelitian_mhs`
--

INSERT INTO `penelitian_mhs` (`id`, `id_mhs`, `judul`, `tahun_penelitian`, `tempat_penelitian`, `pembimbing`, `penguji`, `file`) VALUES
(1, 5, 'Sistem informasi penjualan kue berbasis android', 2022, 'kupang', 'Andi Nani', 'Paulina ', 'BAB_II.pdf'),
(2, 6, 'SISTEM PAKAR', 2010, 'KUPANG', 'Frengky Tedi', 'Paulina ', '357-696-2-PB.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `realisasi_kegiatan` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_kerja`
--

INSERT INTO `program_kerja` (`id`, `id_jenis`, `deskripsi`, `tanggal_pelaksanaan`, `tempat`, `realisasi_kegiatan`, `file`) VALUES
(3, 3, 'Rapat di lakukan besok siang JAM 12.00', '2021-06-15', 'Fakultas Filsafat', 'Terlaksana', '1_1_stefvy.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nomor_surat` varchar(50) NOT NULL DEFAULT '',
  `jenis` enum('surat masuk','surat keluar') NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `deskripsi`, `agenda`, `asal_surat`, `tanggal_surat`, `nomor_surat`, `jenis`, `file`) VALUES
(1, 'surat undangan pertemuan tanggal 12/12/2020 yang tertunda', '123', 'Mahasiswa Filsafat                                     </div>                                            <div class=', '2021-02-02', '1200000', 'surat keluar', '105314010_full.pdf'),
(2, 'untuk dosen dan mahasiswa agar segera melakukan Vaksinasi', '223', 'Fakultas Filsafat', '2021-06-01', '123.002/Vaksin', 'surat keluar', '1530-3467-1-SM_(1).pdf'),
(3, 'Penyampaian Pencegahan Penularan Covid di Wilayah Kampus 2021', '443', 'Rektor', '2021-04-06', 'N.20/IIB', 'surat keluar', 'Buku-Pedoman-Penulisan-Karya-Ilmiah-Skripsi-2020-2021.pdf'),
(6, 'KKN 2021', '321', 'Kepro', '2021-06-16', '5000', 'surat masuk', '1_1_stefvy.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pengabdian`
--
ALTER TABLE `data_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_personalia`
--
ALTER TABLE `data_personalia`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_hari`
--
ALTER TABLE `jenis_hari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penelitian_dosen`
--
ALTER TABLE `penelitian_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penelitian_mhs`
--
ALTER TABLE `penelitian_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_pengabdian`
--
ALTER TABLE `data_pengabdian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_personalia`
--
ALTER TABLE `data_personalia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_hari`
--
ALTER TABLE `jenis_hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penelitian_dosen`
--
ALTER TABLE `penelitian_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penelitian_mhs`
--
ALTER TABLE `penelitian_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
