-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 05:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alur_pendaftaran`
--

CREATE TABLE `alur_pendaftaran` (
  `id` int(11) NOT NULL,
  `alur_pendaftaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alur_pendaftaran`
--

INSERT INTO `alur_pendaftaran` (`id`, `alur_pendaftaran`) VALUES
(1, 'http://localhost/kursus_setir/uploads/photos/we61ag4qohzs5k0.png');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_pendaftaran`
--

CREATE TABLE `formulir_pendaftaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_paket_kursus` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alasan_mengikuti_kursus` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `harga_pendaftaran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kursus`
--

CREATE TABLE `jadwal_kursus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_paket_id` int(11) NOT NULL,
  `pertemuan_1` datetime NOT NULL,
  `act_pertemuan_1` varchar(255) NOT NULL,
  `pertemuan_2` datetime NOT NULL,
  `act_pertemuan_2` varchar(255) NOT NULL,
  `pertemuan_3` datetime NOT NULL,
  `act_pertemuan_3` varchar(255) NOT NULL,
  `pertemuan_4` datetime NOT NULL,
  `act_pertemuan_4` varchar(255) NOT NULL,
  `pertemuan_5` datetime NOT NULL,
  `act_pertemuan_5` varchar(255) NOT NULL,
  `pertemuan_6` datetime NOT NULL,
  `act_pertemuan_6` varchar(255) NOT NULL,
  `pertemuan_7` datetime NOT NULL,
  `act_pertemuan_7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket_kursus`
--

CREATE TABLE `paket_kursus` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_kursus`
--

INSERT INTO `paket_kursus` (`id`, `nama_paket`, `durasi`, `pertemuan`, `harga`) VALUES
(1, 'Manual 1', '6 Jam', '3 Kali', '520000'),
(2, 'Manual 2', '8 Jam', '4 Kali', '650000'),
(3, 'Manual 3', '10 Jam', '5 Kali', '800000'),
(4, 'Manual 4', '12 Jam', '6 kali', '960000'),
(5, 'Manual 5', '14 Jam', '7 Kali', '1120000');

-- --------------------------------------------------------

--
-- Table structure for table `profile_tempat_kursus`
--

CREATE TABLE `profile_tempat_kursus` (
  `id` int(11) NOT NULL,
  `nama_tempat_kursus` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `foto_tempat_kursus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_tempat_kursus`
--

INSERT INTO `profile_tempat_kursus` (`id`, `nama_tempat_kursus`, `alamat`, `no_telpon`, `logo`, `foto_tempat_kursus`) VALUES
(1, 'CV SETIR BERSAMA', 'Lewiliang Bogor', 8123, 'http://localhost/kursus_setir/uploads/photos/k0it9zm5c26_rws.jpg', 'http://localhost/kursus_setir/uploads/photos/zh6rdwi3jbe17n0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(2, 'Administrator'),
(13, 'Pelatih Kursus'),
(1, 'Super Admin'),
(4, 'User Baru'),
(3, 'User Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`permission_id`, `role_id`, `page_name`, `action_name`) VALUES
(1785, 7, 'formulir_pendaftaran', 'list'),
(1786, 7, 'formulir_pendaftaran', 'view'),
(1787, 8, 'formulir_pendaftaran', 'list'),
(1788, 8, 'formulir_pendaftaran', 'view'),
(1789, 8, 'formulir_pendaftaran', 'add'),
(1790, 8, 'formulir_pendaftaran', 'edit'),
(1791, 8, 'formulir_pendaftaran', 'editfield'),
(1792, 8, 'formulir_pendaftaran', 'delete'),
(1793, 8, 'formulir_pendaftaran', 'import_data'),
(1794, 8, 'paket_kursus', 'list'),
(1795, 8, 'paket_kursus', 'view'),
(1796, 8, 'paket_kursus', 'add'),
(1797, 8, 'paket_kursus', 'edit'),
(1798, 8, 'paket_kursus', 'editfield'),
(1799, 8, 'paket_kursus', 'delete'),
(1800, 8, 'paket_kursus', 'import_data'),
(1801, 8, 'profile_tempat_kursus', 'list'),
(1802, 8, 'profile_tempat_kursus', 'view'),
(1803, 8, 'profile_tempat_kursus', 'add'),
(1804, 8, 'profile_tempat_kursus', 'edit'),
(1805, 8, 'profile_tempat_kursus', 'editfield'),
(1806, 8, 'profile_tempat_kursus', 'delete'),
(1807, 8, 'profile_tempat_kursus', 'import_data'),
(1808, 8, 'role_permissions', 'list'),
(1809, 8, 'role_permissions', 'view'),
(1810, 8, 'role_permissions', 'add'),
(1811, 8, 'role_permissions', 'edit'),
(1812, 8, 'role_permissions', 'editfield'),
(1813, 8, 'role_permissions', 'delete'),
(1814, 8, 'role_permissions', 'import_data'),
(1815, 8, 'roles', 'list'),
(1816, 8, 'roles', 'view'),
(1817, 8, 'roles', 'add'),
(1818, 8, 'roles', 'edit'),
(1819, 8, 'roles', 'editfield'),
(1820, 8, 'roles', 'delete'),
(1821, 8, 'roles', 'import_data'),
(1822, 8, 'user', 'list'),
(1823, 8, 'user', 'view'),
(1824, 8, 'user', 'userregister'),
(1825, 8, 'user', 'accountedit'),
(1826, 8, 'user', 'accountview'),
(1827, 8, 'user', 'add'),
(1828, 8, 'user', 'edit'),
(1829, 8, 'user', 'editfield'),
(1830, 8, 'user', 'delete'),
(1831, 8, 'user', 'import_data'),
(1832, 8, 'profile_tempat_kursus', 'list'),
(1833, 8, 'profile_tempat_kursus', 'view'),
(1834, 8, 'profile_tempat_kursus', 'add'),
(1835, 8, 'profile_tempat_kursus', 'edit'),
(1836, 8, 'profile_tempat_kursus', 'editfield'),
(1837, 8, 'profile_tempat_kursus', 'delete'),
(1838, 8, 'jadwal_kursus', 'list'),
(1839, 8, 'jadwal_kursus', 'view'),
(1840, 8, 'jadwal_kursus', 'add'),
(1841, 8, 'jadwal_kursus', 'edit'),
(1842, 8, 'jadwal_kursus', 'editfield'),
(1843, 8, 'jadwal_kursus', 'delete'),
(1844, 9, 'formulir_pendaftaran', 'add'),
(1902, 10, 'formulir_pendaftaran', 'list'),
(1903, 10, 'formulir_pendaftaran', 'view'),
(1904, 10, 'jadwal_kursus', 'list'),
(1905, 10, 'jadwal_kursus', 'view'),
(1906, 11, 'formulir_pendaftaran', 'list'),
(1907, 11, 'formulir_pendaftaran', 'view'),
(1908, 11, 'formulir_pendaftaran', 'add'),
(1909, 11, 'formulir_pendaftaran', 'edit'),
(1910, 11, 'formulir_pendaftaran', 'editfield'),
(1911, 11, 'formulir_pendaftaran', 'delete'),
(1912, 11, 'formulir_pendaftaran', 'import_data'),
(1913, 11, 'paket_kursus', 'list'),
(1914, 11, 'paket_kursus', 'view'),
(1915, 11, 'paket_kursus', 'add'),
(1916, 11, 'paket_kursus', 'edit'),
(1917, 11, 'paket_kursus', 'editfield'),
(1918, 11, 'paket_kursus', 'delete'),
(1919, 11, 'paket_kursus', 'import_data'),
(1920, 11, 'profile_tempat_kursus', 'list'),
(1921, 11, 'profile_tempat_kursus', 'view'),
(1922, 11, 'profile_tempat_kursus', 'add'),
(1923, 11, 'profile_tempat_kursus', 'edit'),
(1924, 11, 'profile_tempat_kursus', 'editfield'),
(1925, 11, 'profile_tempat_kursus', 'delete'),
(1926, 11, 'profile_tempat_kursus', 'import_data'),
(1927, 11, 'role_permissions', 'list'),
(1928, 11, 'role_permissions', 'view'),
(1929, 11, 'role_permissions', 'add'),
(1930, 11, 'role_permissions', 'edit'),
(1931, 11, 'role_permissions', 'editfield'),
(1932, 11, 'role_permissions', 'delete'),
(1933, 11, 'role_permissions', 'import_data'),
(1934, 11, 'roles', 'list'),
(1935, 11, 'roles', 'view'),
(1936, 11, 'roles', 'add'),
(1937, 11, 'roles', 'edit'),
(1938, 11, 'roles', 'editfield'),
(1939, 11, 'roles', 'delete'),
(1940, 11, 'roles', 'import_data'),
(1941, 11, 'user', 'list'),
(1942, 11, 'user', 'view'),
(1943, 11, 'user', 'userregister'),
(1944, 11, 'user', 'accountedit'),
(1945, 11, 'user', 'accountview'),
(1946, 11, 'user', 'add'),
(1947, 11, 'user', 'edit'),
(1948, 11, 'user', 'editfield'),
(1949, 11, 'user', 'delete'),
(1950, 11, 'user', 'import_data'),
(1951, 11, 'profile_tempat_kursus', 'list'),
(1952, 11, 'profile_tempat_kursus', 'view'),
(1953, 11, 'profile_tempat_kursus', 'add'),
(1954, 11, 'profile_tempat_kursus', 'edit'),
(1955, 11, 'profile_tempat_kursus', 'editfield'),
(1956, 11, 'profile_tempat_kursus', 'delete'),
(1957, 11, 'jadwal_kursus', 'list'),
(1958, 11, 'jadwal_kursus', 'view'),
(1959, 11, 'jadwal_kursus', 'add'),
(1960, 11, 'jadwal_kursus', 'edit'),
(1961, 11, 'jadwal_kursus', 'editfield'),
(1962, 11, 'jadwal_kursus', 'delete'),
(1963, 12, 'formulir_pendaftaran', 'add'),
(3017, 2, 'formulir_pendaftaran', 'list'),
(3018, 2, 'formulir_pendaftaran', 'view'),
(3019, 2, 'formulir_pendaftaran', 'add'),
(3020, 2, 'formulir_pendaftaran', 'edit'),
(3021, 2, 'formulir_pendaftaran', 'editfield'),
(3022, 2, 'formulir_pendaftaran', 'delete'),
(3023, 2, 'formulir_pendaftaran', 'import_data'),
(3024, 2, 'paket_kursus', 'list'),
(3025, 2, 'paket_kursus', 'view'),
(3026, 2, 'paket_kursus', 'add'),
(3027, 2, 'paket_kursus', 'edit'),
(3028, 2, 'paket_kursus', 'editfield'),
(3029, 2, 'paket_kursus', 'delete'),
(3030, 2, 'paket_kursus', 'import_data'),
(3031, 2, 'profile_tempat_kursus', 'list'),
(3032, 2, 'profile_tempat_kursus', 'view'),
(3033, 2, 'profile_tempat_kursus', 'add'),
(3034, 2, 'profile_tempat_kursus', 'edit'),
(3035, 2, 'profile_tempat_kursus', 'editfield'),
(3036, 2, 'profile_tempat_kursus', 'delete'),
(3037, 2, 'profile_tempat_kursus', 'import_data'),
(3038, 2, 'role_permissions', 'list'),
(3039, 2, 'role_permissions', 'view'),
(3040, 2, 'role_permissions', 'add'),
(3041, 2, 'role_permissions', 'edit'),
(3042, 2, 'role_permissions', 'editfield'),
(3043, 2, 'role_permissions', 'delete'),
(3044, 2, 'role_permissions', 'import_data'),
(3045, 2, 'roles', 'list'),
(3046, 2, 'roles', 'view'),
(3047, 2, 'roles', 'add'),
(3048, 2, 'roles', 'edit'),
(3049, 2, 'roles', 'editfield'),
(3050, 2, 'roles', 'delete'),
(3051, 2, 'roles', 'import_data'),
(3052, 2, 'user', 'list'),
(3053, 2, 'user', 'view'),
(3054, 2, 'user', 'add'),
(3055, 2, 'user', 'edit'),
(3056, 2, 'user', 'editfield'),
(3057, 2, 'user', 'delete'),
(3058, 2, 'user', 'import_data'),
(3059, 2, 'user', 'userregister'),
(3060, 2, 'user', 'accountedit'),
(3061, 2, 'user', 'accountview'),
(3062, 2, 'profile_tempat_kursus', 'list'),
(3063, 2, 'profile_tempat_kursus', 'view'),
(3064, 2, 'profile_tempat_kursus', 'add'),
(3065, 2, 'profile_tempat_kursus', 'edit'),
(3066, 2, 'profile_tempat_kursus', 'editfield'),
(3067, 2, 'profile_tempat_kursus', 'delete'),
(3068, 2, 'jadwal_kursus', 'list'),
(3069, 2, 'jadwal_kursus', 'view'),
(3070, 2, 'jadwal_kursus', 'add'),
(3071, 2, 'jadwal_kursus', 'edit'),
(3072, 2, 'jadwal_kursus', 'editfield'),
(3073, 2, 'jadwal_kursus', 'delete'),
(3074, 2, 'alur_pendaftaran', 'list'),
(3075, 2, 'alur_pendaftaran', 'view'),
(3076, 2, 'alur_pendaftaran', 'add'),
(3077, 2, 'alur_pendaftaran', 'edit'),
(3078, 2, 'alur_pendaftaran', 'editfield'),
(3079, 2, 'alur_pendaftaran', 'delete'),
(3080, 3, 'formulir_pendaftaran', 'list'),
(3081, 3, 'profile_tempat_kursus', 'list'),
(3082, 3, 'profile_tempat_kursus', 'view'),
(3083, 3, 'jadwal_kursus', 'list'),
(3084, 3, 'jadwal_kursus', 'view'),
(3085, 3, 'alur_pendaftaran', 'list'),
(3086, 3, 'alur_pendaftaran', 'view'),
(3087, 1, 'formulir_pendaftaran', 'list'),
(3088, 1, 'formulir_pendaftaran', 'view'),
(3089, 1, 'formulir_pendaftaran', 'add'),
(3090, 1, 'formulir_pendaftaran', 'edit'),
(3091, 1, 'formulir_pendaftaran', 'editfield'),
(3092, 1, 'formulir_pendaftaran', 'delete'),
(3093, 1, 'formulir_pendaftaran', 'import_data'),
(3094, 1, 'paket_kursus', 'list'),
(3095, 1, 'paket_kursus', 'view'),
(3096, 1, 'paket_kursus', 'add'),
(3097, 1, 'paket_kursus', 'edit'),
(3098, 1, 'paket_kursus', 'editfield'),
(3099, 1, 'paket_kursus', 'delete'),
(3100, 1, 'paket_kursus', 'import_data'),
(3101, 1, 'profile_tempat_kursus', 'list'),
(3102, 1, 'profile_tempat_kursus', 'view'),
(3103, 1, 'profile_tempat_kursus', 'add'),
(3104, 1, 'profile_tempat_kursus', 'edit'),
(3105, 1, 'profile_tempat_kursus', 'editfield'),
(3106, 1, 'profile_tempat_kursus', 'delete'),
(3107, 1, 'profile_tempat_kursus', 'import_data'),
(3108, 1, 'role_permissions', 'list'),
(3109, 1, 'role_permissions', 'view'),
(3110, 1, 'role_permissions', 'add'),
(3111, 1, 'role_permissions', 'edit'),
(3112, 1, 'role_permissions', 'editfield'),
(3113, 1, 'role_permissions', 'delete'),
(3114, 1, 'role_permissions', 'import_data'),
(3115, 1, 'roles', 'list'),
(3116, 1, 'roles', 'view'),
(3117, 1, 'roles', 'add'),
(3118, 1, 'roles', 'edit'),
(3119, 1, 'roles', 'editfield'),
(3120, 1, 'roles', 'delete'),
(3121, 1, 'roles', 'import_data'),
(3122, 1, 'user', 'list'),
(3123, 1, 'user', 'view'),
(3124, 1, 'user', 'userregister'),
(3125, 1, 'user', 'accountedit'),
(3126, 1, 'user', 'accountview'),
(3127, 1, 'user', 'add'),
(3128, 1, 'user', 'edit'),
(3129, 1, 'user', 'editfield'),
(3130, 1, 'user', 'delete'),
(3131, 1, 'user', 'import_data'),
(3132, 1, 'profile_tempat_kursus', 'list'),
(3133, 1, 'profile_tempat_kursus', 'view'),
(3134, 1, 'profile_tempat_kursus', 'add'),
(3135, 1, 'profile_tempat_kursus', 'edit'),
(3136, 1, 'profile_tempat_kursus', 'editfield'),
(3137, 1, 'profile_tempat_kursus', 'delete'),
(3138, 1, 'jadwal_kursus', 'list'),
(3139, 1, 'jadwal_kursus', 'view'),
(3140, 1, 'jadwal_kursus', 'add'),
(3141, 1, 'jadwal_kursus', 'edit'),
(3142, 1, 'jadwal_kursus', 'editfield'),
(3143, 1, 'jadwal_kursus', 'delete'),
(3144, 1, 'alur_pendaftaran', 'list'),
(3145, 1, 'alur_pendaftaran', 'view'),
(3146, 1, 'alur_pendaftaran', 'add'),
(3147, 1, 'alur_pendaftaran', 'edit'),
(3148, 1, 'alur_pendaftaran', 'editfield'),
(3149, 1, 'alur_pendaftaran', 'delete'),
(3150, 4, 'formulir_pendaftaran', 'add'),
(3151, 4, 'paket_kursus', 'list'),
(3152, 4, 'paket_kursus', 'view'),
(3153, 4, 'profile_tempat_kursus', 'list'),
(3154, 4, 'profile_tempat_kursus', 'view'),
(3155, 4, 'alur_pendaftaran', 'list'),
(3156, 4, 'alur_pendaftaran', 'view'),
(3157, 13, 'formulir_pendaftaran', 'list'),
(3158, 13, 'formulir_pendaftaran', 'view'),
(3159, 13, 'formulir_pendaftaran', 'add'),
(3160, 13, 'formulir_pendaftaran', 'edit'),
(3161, 13, 'formulir_pendaftaran', 'editfield'),
(3162, 13, 'formulir_pendaftaran', 'delete'),
(3163, 13, 'formulir_pendaftaran', 'import_data'),
(3164, 13, 'paket_kursus', 'list'),
(3165, 13, 'paket_kursus', 'view'),
(3166, 13, 'paket_kursus', 'add'),
(3167, 13, 'paket_kursus', 'edit'),
(3168, 13, 'paket_kursus', 'editfield'),
(3169, 13, 'paket_kursus', 'delete'),
(3170, 13, 'paket_kursus', 'import_data'),
(3171, 13, 'jadwal_kursus', 'list'),
(3172, 13, 'jadwal_kursus', 'view'),
(3173, 13, 'jadwal_kursus', 'add'),
(3174, 13, 'jadwal_kursus', 'edit'),
(3175, 13, 'jadwal_kursus', 'editfield'),
(3176, 13, 'jadwal_kursus', 'delete'),
(3177, 13, 'jadwal_kursus', 'import_data');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2021-08-06 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `foto`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `user_role_id`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$DRbNFhLwZoDgqqwJHh5v6.DMdBgV.Ol35JhU9KhEqPHwnP7.87re.', 'http://localhost/kursus_setir/uploads/files/dakh8x7vz1il3r6.png', NULL, NULL, '2021-08-06 00:00:00', NULL, 2),
(6, 'superadmin', 'superadmin@superadmin.com', '$2y$10$I7qyE9Wkp3P5fgy9gFbhverRScVjIM6P9CDmDbjC2Xhj7OxXCgs4a', 'http://localhost/kursus_setir/uploads/files/eycrvdf_7i5oq4n.png', NULL, NULL, '2021-08-06 00:00:00', NULL, 1),
(20, 'pelatih', 'pelatih@pelatih.com', '$2y$10$JV24iJ5aO4omDYjo8KUOquSjxjPA9NSmoP6LDXWWPnmxnbT/nRtzC', 'http://localhost/kursus_setir/uploads/files/lny_zr7dpqjvomx.jpg', NULL, NULL, '2021-08-06 00:00:00', NULL, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alur_pendaftaran`
--
ALTER TABLE `alur_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulir_pendaftaran`
--
ALTER TABLE `formulir_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kursus`
--
ALTER TABLE `jadwal_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_kursus`
--
ALTER TABLE `paket_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_tempat_kursus`
--
ALTER TABLE `profile_tempat_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur_pendaftaran`
--
ALTER TABLE `alur_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formulir_pendaftaran`
--
ALTER TABLE `formulir_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwal_kursus`
--
ALTER TABLE `jadwal_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paket_kursus`
--
ALTER TABLE `paket_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile_tempat_kursus`
--
ALTER TABLE `profile_tempat_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3178;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
