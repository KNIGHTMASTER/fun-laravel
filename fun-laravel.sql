-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Agu 2016 pada 10.23
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fun-laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_address`
--

CREATE TABLE IF NOT EXISTS `mst_address` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `city_id` bigint(20) NOT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` bigint(20) NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Address Master';

--
-- Dumping data untuk tabel `mst_address`
--

INSERT INTO `mst_address` (`id`, `code`, `name`, `description`, `city_id`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'ABC', 'Jl Merapi', 'Jalam Merapi', 2, 'admin', 0, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_application_parameter`
--

CREATE TABLE IF NOT EXISTS `mst_application_parameter` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `group_parameter_id` bigint(20) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_application_parameter`
--

INSERT INTO `mst_application_parameter` (`id`, `code`, `name`, `description`, `created_by_username`, `group_parameter_id`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'application_date', '1/12/2016', 'Date for application', 'admin', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'report_date', '1/12/2016', 'Date for report', 'admin', 1, NULL, NULL, NULL, NULL, NULL),
(3, 'auth_login', '1', 'Logged into system', 'admin', 2, NULL, NULL, NULL, NULL, NULL),
(4, 'auth_login', '0', 'Logged out from system', 'admin', 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_bank`
--

CREATE TABLE IF NOT EXISTS `mst_bank` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_bank`
--

INSERT INTO `mst_bank` (`id`, `code`, `name`, `description`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'BCA', 'Bank Central Asia', 'Bank Central Asia', 'admin', NULL, NULL, NULL, NULL, NULL),
(3, 'BNI', 'Bank Negara Indonesia', 'Bank Negara Indonesia', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_city`
--

CREATE TABLE IF NOT EXISTS `mst_city` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `province_id` bigint(20) NOT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='City master';

--
-- Dumping data untuk tabel `mst_city`
--

INSERT INTO `mst_city` (`id`, `code`, `name`, `description`, `created_by_username`, `province_id`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(2, 'JBR', 'Jember', 'Kota Jember', 'admin', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_contact`
--

CREATE TABLE IF NOT EXISTS `mst_contact` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `telephone_number_1` varchar(50) DEFAULT NULL,
  `telephone_number_2` varchar(50) DEFAULT NULL,
  `fax_number` varchar(50) DEFAULT NULL,
  `personal_number` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Contact Master';

--
-- Dumping data untuk tabel `mst_contact`
--

INSERT INTO `mst_contact` (`id`, `code`, `name`, `description`, `created_by_username`, `postal_code`, `telephone_number_1`, `telephone_number_2`, `fax_number`, `personal_number`, `email`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'CUST', 'Customer', 'My Customer', 'admin', '78193', '081283812', '889381293', '13812012', '129301293', 'cust@motionpost.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_employee`
--

CREATE TABLE IF NOT EXISTS `mst_employee` (
`employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_parent` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(255) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_employee`
--

INSERT INTO `mst_employee` (`employee_id`, `user_id`, `employee_parent`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 2, 0, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-01 10:01:55'),
(2, 26, 2, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-01 11:01:41'),
(3, 17, 2, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-01 11:01:18'),
(4, 20, 0, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-02 12:01:52'),
(6, 21, 20, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-02 12:01:52'),
(7, 22, 20, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-02 12:01:52'),
(8, 23, 20, '1', NULL, NULL, NULL, 'sfandrianah', NULL, '2016-01-02 12:01:52'),
(34, 18, 2, '1', 'sfandrianah', NULL, '2016-01-02 12:01:31', NULL, NULL, NULL),
(75, 3, 0, '1', 'sfandrianah', NULL, '2016-01-03 07:01:18', NULL, NULL, NULL),
(76, 16, 3, '1', 'sfandrianah', NULL, '2016-01-03 07:01:26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_finance`
--

CREATE TABLE IF NOT EXISTS `mst_finance` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `bank_id` bigint(20) NOT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Master Finance for Supplier';

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_group_parameter`
--

CREATE TABLE IF NOT EXISTS `mst_group_parameter` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Group Parameter Aplikasi';

--
-- Dumping data untuk tabel `mst_group_parameter`
--

INSERT INTO `mst_group_parameter` (`id`, `code`, `name`, `description`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'sys_date', 'System Date', 'Date centralized by system', 'admin', NULL, NULL, NULL, NULL, NULL),
(2, 'eod', 'eod', 'Date centralized by system', 'admin', NULL, NULL, NULL, NULL, NULL),
(3, 'auth_status', 'Authentication Status', 'Status for Authentication', 'admin', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merchandise`
--

CREATE TABLE IF NOT EXISTS `mst_merchandise` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `type_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `price_id` bigint(20) NOT NULL,
  `guarantee_id` bigint(20) NOT NULL,
  `merchandise_image_url` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Barang yang akan dijual';

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merchandise_brand`
--

CREATE TABLE IF NOT EXISTS `mst_merchandise_brand` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Brand Master for Merchandise';

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merchandise_guarantee`
--

CREATE TABLE IF NOT EXISTS `mst_merchandise_guarantee` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarantee table for Merchandise';

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merchandise_price`
--

CREATE TABLE IF NOT EXISTS `mst_merchandise_price` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merchandise_type`
--

CREATE TABLE IF NOT EXISTS `mst_merchandise_type` (
`id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_merchandise_type`
--

INSERT INTO `mst_merchandise_type` (`id`, `name`, `code`, `description`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'Barang Kecil', 'bk', 'Barang yang bentuknya kecil', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Barang Besar', 'bb', 'Barang yang bentuknya besar', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merchandise_unit`
--

CREATE TABLE IF NOT EXISTS `mst_merchandise_unit` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Unit measurement for Merchandise';

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_pos`
--

CREATE TABLE IF NOT EXISTS `mst_pos` (
`pos_id` int(11) NOT NULL,
  `pos_code` varchar(25) DEFAULT NULL,
  `pos_name` varchar(25) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(255) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_pos`
--

INSERT INTO `mst_pos` (`pos_id`, `pos_code`, `pos_name`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, '001', 'POS 1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '002', 'POS 2', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '003', 'POS 3', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '004', 'POS 4', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '005', 'POS 5', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '006', 'POS 6', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '007', 'POS 7', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '008', 'POS 8', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_province`
--

CREATE TABLE IF NOT EXISTS `mst_province` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Province master';

--
-- Dumping data untuk tabel `mst_province`
--

INSERT INTO `mst_province` (`id`, `code`, `name`, `description`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'JATIM', 'Jawa Timur', 'Provinsi Jawa Timur', 'admin', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_religion`
--

CREATE TABLE IF NOT EXISTS `mst_religion` (
`id` smallint(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_religion`
--

INSERT INTO `mst_religion` (`id`, `code`, `name`, `description`) VALUES
(1, 'ISLAM', NULL, NULL),
(2, 'KRISTEN PROTESTAN', NULL, NULL),
(3, 'KATOLIK', NULL, NULL),
(4, 'HINDU', NULL, NULL),
(5, 'BUDDHA', NULL, NULL),
(6, 'KONG HU CU', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_supplier`
--

CREATE TABLE IF NOT EXISTS `mst_supplier` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `address_id` bigint(20) NOT NULL,
  `contact_id` bigint(20) NOT NULL,
  `finance_id` bigint(20) NOT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Supplier for Merchandise';

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_transaction_type`
--

CREATE TABLE IF NOT EXISTS `mst_transaction_type` (
`id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_transaction_type`
--

INSERT INTO `mst_transaction_type` (`id`, `code`, `name`, `description`) VALUES
(1, 'TRX_001', 'INCOME', 'Income Transaction'),
(2, 'TRX_002', 'EXPENSE', 'Expense Transaction');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_branch`
--

CREATE TABLE IF NOT EXISTS `security_branch` (
  `id` bigint(20) NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT '0',
  `modified_on` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_branch`
--

INSERT INTO `security_branch` (`id`, `code`, `name`, `company_id`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`, `description`) VALUES
(0, 'BRC002', 'Branch 2', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'Cabang Kedua'),
(1, 'BRC001', 'Branch 1', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'Cabang Pertama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_company`
--

CREATE TABLE IF NOT EXISTS `security_company` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(50) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(50) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_company`
--

INSERT INTO `security_company` (`id`, `code`, `name`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`, `description`) VALUES
(1, 'CP001', 'Telkomsigma', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'PT. Sigma Cipta Caraka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_friend`
--

CREATE TABLE IF NOT EXISTS `security_friend` (
  `friend_id` int(11) NOT NULL,
  `user_id_1` int(11) DEFAULT NULL,
  `user_id_2` int(11) DEFAULT NULL,
  `friend_status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_friend`
--

INSERT INTO `security_friend` (`friend_id`, `user_id_1`, `user_id_2`, `friend_status`) VALUES
(1, 2, 3, 'A'),
(2, 2, 10, 'D'),
(3, 2, 20, 'A'),
(4, 5, 6, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_function`
--

CREATE TABLE IF NOT EXISTS `security_function` (
  `id` bigint(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `function_url` varchar(500) DEFAULT NULL,
  `function_order` int(10) DEFAULT NULL,
  `function_level` int(10) DEFAULT NULL,
  `function_style` varchar(50) DEFAULT NULL,
  `function_parent_id` bigint(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(255) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_function`
--

INSERT INTO `security_function` (`id`, `code`, `name`, `function_url`, `function_order`, `function_level`, `function_style`, `function_parent_id`, `description`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'FNC001', 'Dashboard', 'dashboard', 1, 0, 'fa fa-dashboard', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'FNC003', 'Balance', '#', 0, 0, 'fa fa-balance-scale', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'FNC006', 'Expense', 'expense', 0, 1, 'fa fa-angle-right', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'FNC007', 'Income', 'income', 0, 1, 'fa fa-angle-right', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'FNC008', 'Security', '#', 0, 0, 'fa fa-lock', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'FNC009', 'Group', 'group', 0, 1, 'fa fa-angle-right', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'FNC010', 'User', 'user', 0, 1, 'fa fa-angle-right', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'FNC012', 'Master', '#', 0, 1, 'fa fa-database', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'FNC013', 'Bank', 'bank', 0, 1, 'fa fa-angle-right', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'FNC014', 'Company', 'company', 0, 1, 'fa fa-angle-right', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'FNC015', 'Branch', 'branch', 0, 1, 'fa fa-angle-right', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'FNC016', 'Saving', 'saving', 0, 1, 'fa fa-angle-right', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'FNC017', 'Saving History', 'saving-history', 0, 1, 'fa fa-angle-right', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'FNC018', 'Report', '#', 0, 1, 'fa fa-file-pdf-o', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'FNC019', 'Bank', 'report-bank', 0, 1, 'fa fa-angle-right', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'FNC020', 'Company', 'report-company', 0, 1, 'fa fa-angle-right', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'FNC021', 'Expense', 'report-expense', 0, 1, 'fa fa-angle-right', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_function_assignment`
--

CREATE TABLE IF NOT EXISTS `security_function_assignment` (
  `id` bigint(20) NOT NULL,
  `function_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `function_assigment_order` int(2) DEFAULT NULL,
  `action_type` varchar(300) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(255) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_function_assignment`
--

INSERT INTO `security_function_assignment` (`id`, `function_id`, `group_id`, `function_assigment_order`, `action_type`, `description`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`, `code`, `name`) VALUES
(1, 1, 2, 1, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 2, 2, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 7, 2, 7, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 8, 1, 5, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 9, 1, 10, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 10, 1, 11, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 11, 1, 12, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 6, 2, 6, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, 1, 3, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, 1, 10, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, 1, 11, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, 1, 12, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 16, 2, 8, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 17, 2, 9, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 18, 2, 4, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 19, 2, 9, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 20, 2, 9, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 21, 2, 9, 'view', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_function_group`
--

CREATE TABLE IF NOT EXISTS `security_function_group` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `function_url` varchar(50) DEFAULT NULL,
  `function_order` int(11) DEFAULT NULL,
  `function_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_group`
--

CREATE TABLE IF NOT EXISTS `security_group` (
`id` bigint(20) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(255) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_group`
--

INSERT INTO `security_group` (`id`, `code`, `name`, `description`, `branch_id`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`) VALUES
(1, 'admin', 'Administrator', 'Admin Aplikasi', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'user', 'user', 'User Biasa', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_user`
--

CREATE TABLE IF NOT EXISTS `security_user` (
`id` bigint(20) NOT NULL,
  `user_code` varchar(25) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `user_expired_date` date DEFAULT NULL,
  `user_login_status` int(1) DEFAULT NULL,
  `user_failed_login` int(2) DEFAULT NULL,
  `user_first_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_last_login` datetime DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by_username` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by_username` varchar(255) DEFAULT NULL,
  `modified_by_id` bigint(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_user`
--

INSERT INTO `security_user` (`id`, `user_code`, `password`, `user_expired_date`, `user_login_status`, `user_failed_login`, `user_first_login`, `user_last_login`, `group_id`, `description`, `status`, `created_by_username`, `created_by_id`, `created_on`, `modified_by_username`, `modified_by_id`, `modified_on`, `name`, `remember_token`) VALUES
(39, 'fauzi', '$2y$10$Olw6WCeI.D0g75pvqlT8mO343jg3BLJvCWZE4y2UZabC35K1J1uBO', '2016-09-02', 1, NULL, '2016-07-19 23:21:05', '2016-01-28 07:43:28', 2, 'USER', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Achmad Fauzi', '6jY63RG0OdDqHNUboLgu5BTnLd7eKRmSfBwRGcl99A0M7tndfhBTEuRMnp5l'),
(74, 'admin', '$2y$10$gr2cBykp./fF9Mac2NVakeqD.8D6ScWj4UemVinQvZd798gNx/Hce', '2016-06-29', NULL, NULL, '2016-08-05 07:22:55', NULL, 1, 'ADMINISTRATOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '6ah1q0aSSq3t9ibWFusgYWfAYv9Pyiy1zHWwDsrmiJFefvyIQBNXAn2r7dNq'),
(75, 'zuna', '$2y$10$E0I/o3RNPmfoDdrMvcl66.Q3PPUVhBGYcGC2ZaL1/B1Yd4w.pqRwC', '2017-09-30', NULL, NULL, '2016-07-19 23:20:47', NULL, 1, 'Admin Zuna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Zuna', '1ZtBpe5bKyWJt6guTlg6jXfUWsmXICykOMoyRfDrkaJ3aFBjYQsBWVpwj7lj'),
(76, 'achmad', '$2y$10$bBXqHxGBCF4/VtIX0pE0XeGLi5U9QHNXSjpg1ECTnLuWYLCHW8Xx2', '2016-08-31', NULL, NULL, '2016-08-05 07:23:14', NULL, 2, 'Achmad is a User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Achmad', 'pK6kvaimyN7uyv26cCFAYTEmSuq43DZey92JoBjqxERiHqeiaDXAEkqYGQoh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `security_user_profile`
--

CREATE TABLE IF NOT EXISTS `security_user_profile` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_place_of_birth` varchar(50) DEFAULT NULL,
  `user_profile_img` varchar(255) DEFAULT NULL,
  `user_gender` varchar(1) DEFAULT NULL,
  `religion_id` int(10) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_marriage` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_type` smallint(6) NOT NULL,
  `security_user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `security_user_profile`
--

INSERT INTO `security_user_profile` (`id`, `code`, `name`, `user_birthdate`, `user_email`, `user_place_of_birth`, `user_profile_img`, `user_gender`, `religion_id`, `user_address`, `user_marriage`, `description`, `user_type`, `security_user_id`) VALUES
(1, '2014141121', 'Administrator', NULL, 'admin@motion.co.id', 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, '2014141125', 'Syahrial Fandrianah', '1994-05-26', 'sfandrianah@motion.co.id', 'Jakarta', 'assets/img/placeholders/avatars/syahrial.jpg', 'L', 1, 'Pondok Aren', '1', NULL, 0, NULL),
(3, '2014141122', 'Achmad Fauzi', NULL, 'fauzi@motion.co.id', 'Jember', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(10, '2014141123', 'Adi Sunardi', '2015-12-04', 'adi@gmail.com', 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(16, '2014141124', 'kasir2', '2015-05-05', 'sfandrianah@yahoo.co.id', 'jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(17, '2014141126', 'Nurul Hidayat', '1990-12-29', 'nurul.hidayat@gmail.com', 'Tangerang', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(18, '2014141127', 'Aji Ginanjar', '1992-11-12', 'ginanjar.sanjaya@gmail.com', 'Surabaya', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(20, ' 2014141128', 'Ridla Fadilah', '1990-12-29', 'ridla.fadillah@gmail.com', 'Bandung', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(21, ' 2014141129', 'Tes User', '1990-07-19', 'sfandrianah4@gmail.com', 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(22, '2014141130', 'Hasanah Nasution', '1992-07-16', 'hana.nasution@gmail.com', 'Medan', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(23, ' 2014141131', 'Hasanah Nasution', '1990-12-29', 'hana.nasution@gmail.com', 'Medan', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(24, '2014141132', 'Ginanjar Sanjaya SPV', '1992-11-12', 'ginanjar.sanjaya@gmail.com', 'Surabaya', '', '', NULL, '', '', NULL, 0, NULL),
(25, ' 2014141133', 'Wawan Setiawan', '1993-01-12', 'wawansetiawan273@gmail.com', 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(26, ' 2014141134', 'Wawan Setiawan kasir', '1993-01-12', 'wawansetiawan273@gmail.com', 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_expense`
--

CREATE TABLE IF NOT EXISTS `trx_expense` (
`id` bigint(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expense_source` bigint(11) NOT NULL,
  `bank_expense_dest` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_expense`
--

INSERT INTO `trx_expense` (`id`, `code`, `name`, `description`, `amount`, `timestamp`, `expense_source`, `bank_expense_dest`) VALUES
(135, 'nDKYFj', 'Beli nasi buka puasa', 'Wuenaak', 32000, '2016-06-13 17:00:00', 17, NULL),
(136, 'JwUVbI', 'AV', '', 50000, '2016-06-26 17:00:00', 17, NULL),
(137, 'H03Cq7', 'A', 'Oke', 2000, '2016-06-28 02:29:00', 17, NULL),
(138, '6XpBY0', 'Beli Makan Soto', '', 50000, '2016-07-05 13:00:00', 17, NULL),
(139, 'lCM5XQ', 'Beli Bensin', 'Beli Bensin di Jember', 50000, '2016-06-06 09:00:00', 17, NULL),
(140, 'GjK409', 'Beli Paket Internet', 'Untuk Lek Saiful', 50000, '2016-07-05 11:50:00', 17, NULL),
(141, 'RYvyjR', 'Ambil Uang ATM', 'Biaya Wedding Tambahan', 500000, '2016-07-19 02:00:00', 17, NULL),
(142, 'zx72ut', 'Biaya Mobil Bondowos', 'Sewa mobil = 200000\r\nHalah = 200000', 500000, '2016-07-19 02:00:00', 17, NULL),
(143, '5KmeGA', 'VVTI', 'ABC', 1000000, '2016-08-02 08:37:00', 17, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_income`
--

CREATE TABLE IF NOT EXISTS `trx_income` (
`id` bigint(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank_income` bigint(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_income`
--

INSERT INTO `trx_income` (`id`, `code`, `name`, `description`, `amount`, `timestamp`, `bank_income`) VALUES
(2, 'INC_001', 'Init Income', NULL, 2000000, '2016-06-09 17:00:00', 1),
(45, 'KU', 'Kiriman Umi', 'Banyak Banget', 10000000, '2016-06-21 07:31:34', 1),
(46, 'INC_002', 'Income 2', 'Addition From Salary', 2000000, '2016-07-05 13:57:22', 1),
(56, 'mjlAwu', 'AB', 'ABC', 2000, '2016-08-02 11:06:18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_saving`
--

CREATE TABLE IF NOT EXISTS `trx_saving` (
`id` bigint(20) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bank_saving` bigint(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_on` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_saving`
--

INSERT INTO `trx_saving` (`id`, `code`, `name`, `description`, `bank_saving`, `amount`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(17, 'SVG_001', 'Tabungan 1', NULL, 1, 17898000, NULL, '2016-08-02 11:06:18', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_saving_history`
--

CREATE TABLE IF NOT EXISTS `trx_saving_history` (
`id` bigint(20) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `saving_id` bigint(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_on` datetime DEFAULT '0000-00-00 00:00:00',
  `trx_expense_id` bigint(20) DEFAULT NULL,
  `trx_income_id` bigint(20) DEFAULT NULL,
  `trx_type` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_saving_history`
--

INSERT INTO `trx_saving_history` (`id`, `code`, `name`, `description`, `saving_id`, `amount`, `created_by`, `created_on`, `modified_by`, `modified_on`, `trx_expense_id`, `trx_income_id`, `trx_type`) VALUES
(27, 'KU', 'Kiriman Umi', 'Banyak Banget', NULL, 10000000, NULL, '2016-06-21 07:31:34', NULL, '0000-00-00 00:00:00', NULL, 45, 1),
(28, 'nDKYFj', 'Beli nasi buka puasa', 'Wuenaak', NULL, 32000, NULL, '2016-06-21 07:32:22', NULL, '0000-00-00 00:00:00', 135, NULL, 2),
(29, 'JwUVbI', 'AV', '', NULL, 50000, NULL, '2016-06-27 04:10:37', NULL, '0000-00-00 00:00:00', 136, NULL, 2),
(30, 'H03Cq7', 'A', 'Oke', NULL, 2000, NULL, '2016-06-28 02:30:13', NULL, '0000-00-00 00:00:00', 137, NULL, 2),
(31, 'INC_002', 'Income 2', 'Addition From Salary', NULL, 2000000, NULL, '2016-07-05 13:57:22', NULL, '0000-00-00 00:00:00', NULL, 46, 1),
(32, '6XpBY0', 'Beli Makan Soto', '', NULL, 50000, NULL, '2016-07-05 13:59:17', NULL, '0000-00-00 00:00:00', 138, NULL, 2),
(33, 'lCM5XQ', 'Beli Bensin', 'Beli Bensin di Jember', NULL, 50000, NULL, '2016-07-06 11:50:16', NULL, '0000-00-00 00:00:00', 139, NULL, 2),
(34, 'lCM5XQ', 'Beli Bensin', 'Beli Bensin di Jember', NULL, 50000, NULL, '2016-07-06 11:50:46', NULL, '0000-00-00 00:00:00', 139, NULL, 2),
(35, 'RYvyjR', 'Ambil Uang ATM', 'Biaya Wedding Tambahan', NULL, 500000, NULL, '2016-07-19 02:19:48', NULL, '0000-00-00 00:00:00', 141, NULL, 2),
(36, 'zx72ut', 'Biaya Mobil Bondowos', 'Sewa mobil = 200000\r\nHalah = 200000', NULL, 500000, NULL, '2016-07-19 23:15:28', NULL, '0000-00-00 00:00:00', 142, NULL, 2),
(37, '5KmeGA', 'VVTI', 'ABC', NULL, 1000000, NULL, '2016-08-02 08:37:21', NULL, '0000-00-00 00:00:00', 143, NULL, 2),
(47, 'mjlAwu', 'AB', 'ABC', NULL, 2000, NULL, '2016-08-02 11:06:18', NULL, '0000-00-00 00:00:00', NULL, 56, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AchmadF', 'achmad@gmail.com', '$2y$10$34MUEniNySekqEbEiqR9k.tFNlU6YJhnJo0NW59RwQfmEj4JE9zV.', NULL, '2016-01-03 23:35:36', '2016-01-03 23:35:36'),
(2, 'fauzi', 'fauzi@gmail.com', '$2y$10$knVKx2IRjNSsPE0JT96gleiNaPBp.bkZY22D3A9mTqF2dorw1rAdq', NULL, '2016-08-04 03:17:05', '2016-08-04 03:17:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_address`
--
ALTER TABLE `mst_address`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_city` (`city_id`);

--
-- Indexes for table `mst_application_parameter`
--
ALTER TABLE `mst_application_parameter`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_parameter_group` (`group_parameter_id`);

--
-- Indexes for table `mst_bank`
--
ALTER TABLE `mst_bank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_city`
--
ALTER TABLE `mst_city`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_province` (`province_id`);

--
-- Indexes for table `mst_contact`
--
ALTER TABLE `mst_contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_employee`
--
ALTER TABLE `mst_employee`
 ADD PRIMARY KEY (`employee_id`,`user_id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `mst_finance`
--
ALTER TABLE `mst_finance`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bank` (`bank_id`);

--
-- Indexes for table `mst_group_parameter`
--
ALTER TABLE `mst_group_parameter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_merchandise`
--
ALTER TABLE `mst_merchandise`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_supplier` (`supplier_id`), ADD KEY `fk_brand` (`brand_id`), ADD KEY `fk_guarantee` (`guarantee_id`), ADD KEY `fk_price` (`price_id`), ADD KEY `fk_type` (`type_id`);

--
-- Indexes for table `mst_merchandise_brand`
--
ALTER TABLE `mst_merchandise_brand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_merchandise_guarantee`
--
ALTER TABLE `mst_merchandise_guarantee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_merchandise_price`
--
ALTER TABLE `mst_merchandise_price`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_merchandise_type`
--
ALTER TABLE `mst_merchandise_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_merchandise_unit`
--
ALTER TABLE `mst_merchandise_unit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_pos`
--
ALTER TABLE `mst_pos`
 ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `mst_province`
--
ALTER TABLE `mst_province`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_religion`
--
ALTER TABLE `mst_religion`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_address` (`address_id`), ADD KEY `fk_contact` (`contact_id`), ADD KEY `fk_finance` (`finance_id`);

--
-- Indexes for table `mst_transaction_type`
--
ALTER TABLE `mst_transaction_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `security_branch`
--
ALTER TABLE `security_branch`
 ADD PRIMARY KEY (`id`), ADD KEY `company_id` (`company_id`), ADD KEY `branch_id` (`id`);

--
-- Indexes for table `security_company`
--
ALTER TABLE `security_company`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_friend`
--
ALTER TABLE `security_friend`
 ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `security_function`
--
ALTER TABLE `security_function`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_function_assignment`
--
ALTER TABLE `security_function_assignment`
 ADD PRIMARY KEY (`id`), ADD KEY `function_id` (`function_id`) USING BTREE, ADD KEY `group_id` (`group_id`) USING BTREE;

--
-- Indexes for table `security_function_group`
--
ALTER TABLE `security_function_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_group`
--
ALTER TABLE `security_group`
 ADD PRIMARY KEY (`id`), ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `security_user`
--
ALTER TABLE `security_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_code` (`user_code`), ADD KEY `group_id` (`group_id`) USING BTREE;

--
-- Indexes for table `security_user_profile`
--
ALTER TABLE `security_user_profile`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_security_user` (`security_user_id`);

--
-- Indexes for table `trx_expense`
--
ALTER TABLE `trx_expense`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bank` (`expense_source`), ADD KEY `fk_expense_dest` (`bank_expense_dest`);

--
-- Indexes for table `trx_income`
--
ALTER TABLE `trx_income`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bank_income` (`bank_income`);

--
-- Indexes for table `trx_saving`
--
ALTER TABLE `trx_saving`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bank_saving` (`bank_saving`);

--
-- Indexes for table `trx_saving_history`
--
ALTER TABLE `trx_saving_history`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_saving_id_history` (`saving_id`), ADD KEY `fk_expense_saving_history` (`trx_expense_id`), ADD KEY `fk_income_saving_history` (`trx_income_id`), ADD KEY `fk_trx_type_saving_history` (`trx_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_address`
--
ALTER TABLE `mst_address`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_application_parameter`
--
ALTER TABLE `mst_application_parameter`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mst_bank`
--
ALTER TABLE `mst_bank`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_city`
--
ALTER TABLE `mst_city`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_contact`
--
ALTER TABLE `mst_contact`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_employee`
--
ALTER TABLE `mst_employee`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `mst_finance`
--
ALTER TABLE `mst_finance`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_group_parameter`
--
ALTER TABLE `mst_group_parameter`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_merchandise`
--
ALTER TABLE `mst_merchandise`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_merchandise_brand`
--
ALTER TABLE `mst_merchandise_brand`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_merchandise_guarantee`
--
ALTER TABLE `mst_merchandise_guarantee`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_merchandise_price`
--
ALTER TABLE `mst_merchandise_price`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_merchandise_type`
--
ALTER TABLE `mst_merchandise_type`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mst_merchandise_unit`
--
ALTER TABLE `mst_merchandise_unit`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_pos`
--
ALTER TABLE `mst_pos`
MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mst_province`
--
ALTER TABLE `mst_province`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_religion`
--
ALTER TABLE `mst_religion`
MODIFY `id` smallint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_transaction_type`
--
ALTER TABLE `mst_transaction_type`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `security_group`
--
ALTER TABLE `security_group`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `security_user`
--
ALTER TABLE `security_user`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `trx_expense`
--
ALTER TABLE `trx_expense`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `trx_income`
--
ALTER TABLE `trx_income`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `trx_saving`
--
ALTER TABLE `trx_saving`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `trx_saving_history`
--
ALTER TABLE `trx_saving_history`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trx_expense`
--
ALTER TABLE `trx_expense`
ADD CONSTRAINT `fk_expense_dest` FOREIGN KEY (`bank_expense_dest`) REFERENCES `mst_bank` (`id`),
ADD CONSTRAINT `fk_expense_source` FOREIGN KEY (`expense_source`) REFERENCES `trx_saving` (`id`);

--
-- Ketidakleluasaan untuk tabel `trx_income`
--
ALTER TABLE `trx_income`
ADD CONSTRAINT `fk_bank_income` FOREIGN KEY (`bank_income`) REFERENCES `mst_bank` (`id`);

--
-- Ketidakleluasaan untuk tabel `trx_saving`
--
ALTER TABLE `trx_saving`
ADD CONSTRAINT `fk_bank_saving` FOREIGN KEY (`bank_saving`) REFERENCES `mst_bank` (`id`);

--
-- Ketidakleluasaan untuk tabel `trx_saving_history`
--
ALTER TABLE `trx_saving_history`
ADD CONSTRAINT `fk_expense_saving_history` FOREIGN KEY (`trx_expense_id`) REFERENCES `trx_expense` (`id`),
ADD CONSTRAINT `fk_income_saving_history` FOREIGN KEY (`trx_income_id`) REFERENCES `trx_income` (`id`),
ADD CONSTRAINT `fk_saving_id_history` FOREIGN KEY (`saving_id`) REFERENCES `trx_saving` (`id`),
ADD CONSTRAINT `fk_trx_type_saving_history` FOREIGN KEY (`trx_type`) REFERENCES `mst_transaction_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
