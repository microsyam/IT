-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 08:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `c_id` int(11) NOT NULL,
  `c_d_id` int(11) DEFAULT NULL,
  `c_cmptd` int(11) DEFAULT NULL,
  `c_u_id` int(11) DEFAULT NULL,
  `c_u_name` varchar(30) DEFAULT NULL,
  `c_u_to_id` int(11) DEFAULT NULL,
  `c_u_to_name` varchar(40) DEFAULT NULL,
  `c_message` varchar(300) DEFAULT NULL,
  `c_s_id` int(11) DEFAULT NULL,
  `c_s_name` varchar(50) DEFAULT NULL,
  `c_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_dev_id` int(11) NOT NULL,
  `p_ip` varchar(20) DEFAULT NULL,
  `p_owner_id` int(5) DEFAULT NULL,
  `p_model` varchar(30) DEFAULT NULL,
  `p_type` varchar(20) DEFAULT NULL,
  `p_loc_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connectivity`
--

CREATE TABLE `connectivity` (
  `con_id` int(11) NOT NULL,
  `con_u_id` int(11) NOT NULL,
  `con_loc_id` int(11) NOT NULL,
  `con_number` varchar(20) NOT NULL,
  `con_type` varchar(30) NOT NULL,
  `con_plan_id` int(5) NOT NULL,
  `con_status` varchar(30) NOT NULL,
  `con_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `connectivity_plans`
--

CREATE TABLE `connectivity_plans` (
  `conp_id` int(11) NOT NULL,
  `conp_name` varchar(60) NOT NULL,
  `conp_price` float NOT NULL,
  `conp_qouta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custody`
--

CREATE TABLE `custody` (
  `c_id` int(8) NOT NULL,
  `c_item_id` int(11) NOT NULL,
  `c_qty` int(11) NOT NULL,
  `c_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_usage`
--

CREATE TABLE `data_usage` (
  `data_id` int(11) NOT NULL,
  `data_u_id` int(11) NOT NULL,
  `data_con_id` int(11) NOT NULL,
  `data_per_id` int(11) NOT NULL,
  `data_usage` int(11) NOT NULL,
  `data_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `datecustody`
--

CREATE TABLE `datecustody` (
  `d_id` int(11) NOT NULL,
  `d_c_id` int(5) NOT NULL,
  `d_date` longtext CHARACTER SET utf8 NOT NULL,
  `d_u_id` int(5) NOT NULL,
  `d_qty` int(5) NOT NULL,
  `d_status` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(45) DEFAULT NULL,
  `d_display` int(11) DEFAULT '1',
  `d_loc_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `dev_id` int(11) NOT NULL,
  `dev_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) DEFAULT NULL,
  `e_department_id` int(11) DEFAULT NULL,
  `e_type` varchar(20) NOT NULL,
  `e_code` int(10) DEFAULT NULL,
  `e_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `gift_id` int(11) NOT NULL,
  `gift_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `gift_name` varchar(50) NOT NULL,
  `gift_active` int(1) NOT NULL DEFAULT '0',
  `gift_part_id` int(11) NOT NULL,
  `gift_u_id` int(11) DEFAULT NULL,
  `gift_date` varchar(60) NOT NULL,
  `gift_creation_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gift_partners`
--

CREATE TABLE `gift_partners` (
  `gp_id` int(11) NOT NULL,
  `gp_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `legal`
--

CREATE TABLE `legal` (
  `leg_id` int(11) NOT NULL,
  `leg_loc_id` int(5) NOT NULL,
  `leg_reg_type` varchar(15) NOT NULL,
  `leg_contract` varchar(15) NOT NULL,
  `leg_taxs` varchar(15) NOT NULL,
  `leg_comm_reg` varchar(15) NOT NULL,
  `leg_added_fees_reg` varchar(15) NOT NULL,
  `leg_no_added_fees` varchar(15) NOT NULL,
  `leg_follower` int(5) NOT NULL,
  `leg_license` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `leg_end_rant_date` varchar(60) NOT NULL,
  `leg_rent_price` int(6) NOT NULL,
  `leg_elect_type` varchar(15) NOT NULL,
  `leg_reales_taxs` varchar(15) NOT NULL,
  `leg_observation` varchar(100) NOT NULL,
  `leg_owner_name` int(50) NOT NULL,
  `leg_owner_number` int(11) NOT NULL,
  `leg_contract_copy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(60) NOT NULL,
  `loc_name_ar` varchar(40) DEFAULT NULL,
  `loc_code` int(6) NOT NULL,
  `loc_brand` varchar(20) NOT NULL,
  `loc_region` varchar(30) NOT NULL,
  `loc_district` varchar(30) NOT NULL,
  `loc_type` varchar(30) NOT NULL,
  `loc_opening_date` varchar(60) NOT NULL,
  `loc_u_id` int(11) NOT NULL,
  `loc_number` varchar(11) DEFAULT NULL,
  `loc_display` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `loc_name`, `loc_name_ar`, `loc_code`, `loc_brand`, `loc_region`, `loc_district`, `loc_type`, `loc_opening_date`, `loc_u_id`, `loc_number`, `loc_display`) VALUES
(1, 'Town Sadat', 'محسن', 10, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-19', 1, '01101101277', 1),
(2, 'Sadat Factory10', NULL, 11, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-19', 1, '01148181977', 0),
(11, 'Town Sadat1', NULL, 10, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-19', 1, '01101101277', 1),
(12, 'Town Sadat2', NULL, 10, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-19', 1, '01101101277', 1),
(13, '12', NULL, 121, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-16', 1, '12', 0),
(14, '12', NULL, 121, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-16', 1, '12', 0),
(15, '12a', NULL, 121, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-16', 1, '12', 0),
(16, '12', NULL, 121, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-16', 1, '12', 0),
(17, 'Town Tanta1', NULL, 123, 'TownGroup', 'region1', 'dist1', 'Branch', '2020-12-16', 1, '01234567891', 0);

-- --------------------------------------------------------

--
-- Table structure for table `off_dvr`
--

CREATE TABLE `off_dvr` (
  `off_id` int(11) NOT NULL,
  `off_u_id` int(11) NOT NULL,
  `off_per_id` int(11) NOT NULL,
  `off_dev_id` int(11) NOT NULL,
  `off_loc_id` int(11) NOT NULL,
  `off_reason` varchar(60) NOT NULL,
  `off_causing` varchar(60) NOT NULL,
  `off_status` varchar(30) NOT NULL,
  `off_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opclass`
--

CREATE TABLE `opclass` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(50) NOT NULL,
  `o_display` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `op_id` int(11) NOT NULL,
  `o_e_id` int(11) NOT NULL,
  `o_u_id` int(11) NOT NULL,
  `o_class_id` int(11) NOT NULL,
  `o_subject` varchar(100) NOT NULL,
  `o_status` varchar(20) NOT NULL,
  `o_piriority` varchar(10) NOT NULL,
  `o_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operation_details`
--

CREATE TABLE `operation_details` (
  `o_id` int(11) NOT NULL,
  `o_o_id` int(11) NOT NULL,
  `o_u_id` int(11) NOT NULL,
  `o_direction_flag` int(1) NOT NULL DEFAULT '1',
  `o_description` varchar(500) NOT NULL,
  `od_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `peroid`
--

CREATE TABLE `peroid` (
  `per_id` int(11) NOT NULL,
  `per_year` int(4) NOT NULL,
  `per_month` int(2) NOT NULL,
  `per_week` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE `printers` (
  `print_id` int(11) NOT NULL,
  `print_dev_id` int(11) NOT NULL,
  `print_model` varchar(50) NOT NULL,
  `print_sn` varchar(50) NOT NULL,
  `print_color_type` varchar(15) DEFAULT NULL,
  `print_loc_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `printer_usage`
--

CREATE TABLE `printer_usage` (
  `pus_id` int(11) NOT NULL,
  `pus_u_id` int(11) NOT NULL,
  `pus_per_id` int(11) NOT NULL,
  `pus_print_id` int(11) NOT NULL,
  `pus_date` varchar(60) NOT NULL,
  `pus_usage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `p_id` int(11) NOT NULL,
  `p_u_id` int(11) NOT NULL,
  `p_new_task` int(11) DEFAULT '0',
  `p_new_service` int(11) DEFAULT '0',
  `p_activity_report` int(11) DEFAULT '0',
  `p_cust_activity_report` int(11) DEFAULT '0',
  `p_privilages` int(11) DEFAULT '0',
  `p_edit_user` int(11) DEFAULT '0',
  `p_add_user` int(11) DEFAULT '0',
  `p_easy_share` int(11) DEFAULT '0',
  `p_cust_task` int(11) DEFAULT '0',
  `p_assign_task` int(11) DEFAULT '0',
  `p_view_computers` int(11) DEFAULT '0',
  `p_add_computer` int(11) DEFAULT '0',
  `p_edit_computer` int(11) DEFAULT '0',
  `p_open_ticket` int(11) DEFAULT '0',
  `p_view_tickets` int(11) DEFAULT '0',
  `p_view_cust_tickets` int(11) DEFAULT '0',
  `p_ticket_cases` int(11) DEFAULT '0',
  `p_departments` int(11) DEFAULT '0',
  `p_general` int(11) DEFAULT '0',
  `p_plants` int(11) DEFAULT '0',
  `p_branches` int(11) DEFAULT '0',
  `p_warehouses` int(11) DEFAULT '0',
  `p_manage_items` int(11) DEFAULT '0',
  `p_make_transaction` int(11) DEFAULT '0',
  `p_report` int(11) DEFAULT '0',
  `p_stock_board` int(11) DEFAULT '0',
  `p_vendors` int(11) DEFAULT '0',
  `p_new_emp` int(1) NOT NULL DEFAULT '0',
  `p_edit_emp` int(1) NOT NULL DEFAULT '0',
  `p_custodies` int(1) NOT NULL DEFAULT '0',
  `p_operation` int(11) NOT NULL DEFAULT '0',
  `p_op_class` int(11) NOT NULL DEFAULT '0',
  `p_gift_redeem` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`p_id`, `p_u_id`, `p_new_task`, `p_new_service`, `p_activity_report`, `p_cust_activity_report`, `p_privilages`, `p_edit_user`, `p_add_user`, `p_easy_share`, `p_cust_task`, `p_assign_task`, `p_view_computers`, `p_add_computer`, `p_edit_computer`, `p_open_ticket`, `p_view_tickets`, `p_view_cust_tickets`, `p_ticket_cases`, `p_departments`, `p_general`, `p_plants`, `p_branches`, `p_warehouses`, `p_manage_items`, `p_make_transaction`, `p_report`, `p_stock_board`, `p_vendors`, `p_new_emp`, `p_edit_emp`, `p_custodies`, `p_operation`, `p_op_class`, `p_gift_redeem`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL, 0, 0, 0, 1, 0, 0),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) DEFAULT NULL,
  `s_logo` varchar(70) DEFAULT NULL,
  `s_timezone` varchar(50) DEFAULT NULL,
  `s_timezone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `s_name`, `s_logo`, `s_timezone`, `s_timezone_id`) VALUES
(1, 'Town Group', 'a95d6fe6c41b30d05eed3303dc5dc893.JPG', 'Africa/Cairo', 13);

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `s_qty` float(24,0) DEFAULT '0',
  `s_warehouse_id` int(11) DEFAULT NULL,
  `s_display` int(11) DEFAULT '1',
  `s_asset` int(1) NOT NULL DEFAULT '0',
  `s_notwork` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_trans`
--

CREATE TABLE `stock_trans` (
  `st_id` int(11) NOT NULL,
  `s_item_id` int(11) DEFAULT NULL,
  `s_owner_id` int(11) NOT NULL,
  `s_wh_id` int(11) DEFAULT NULL,
  `s_date` longtext,
  `s_u_id` int(11) DEFAULT NULL,
  `s_status` varchar(5) DEFAULT NULL,
  `st_qty` float(24,0) DEFAULT NULL,
  `s_vendor` int(11) DEFAULT NULL,
  `s_details` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timezone`
--

CREATE TABLE `timezone` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timezone`
--

INSERT INTO `timezone` (`t_id`, `t_name`) VALUES
(1, 'Africa/Abidjan'),
(2, 'Africa/Accra'),
(3, 'Africa/Addis_Ababa'),
(4, 'Africa/Algiers'),
(5, 'Africa/Asmara'),
(6, 'Africa/Bamako'),
(7, 'Africa/Bangui'),
(8, 'Africa/Banjul'),
(9, 'Africa/Bissau'),
(10, 'Africa/Blantyre'),
(11, 'Africa/Brazzaville'),
(12, 'Africa/Bujumbura'),
(13, 'Africa/Cairo'),
(14, 'Africa/Casablanca'),
(15, 'Africa/Ceuta'),
(16, 'Africa/Conakry'),
(17, 'Africa/Dakar'),
(18, 'Africa/Dar_es_Salaam'),
(19, 'Africa/Djibouti'),
(20, 'Africa/Douala'),
(21, 'Africa/El_Aaiun'),
(22, 'Africa/Freetown'),
(23, 'Africa/Gaborone'),
(24, 'Africa/Harare'),
(25, 'Africa/Johannesburg'),
(26, 'Africa/Juba'),
(27, 'Africa/Kampala'),
(28, 'Africa/Khartoum'),
(29, 'Africa/Kigali'),
(30, 'Africa/Kinshasa'),
(31, 'Africa/Lagos'),
(32, 'Africa/Libreville'),
(33, 'Africa/Lome'),
(34, 'Africa/Luanda'),
(35, 'Africa/Lubumbashi'),
(36, 'Africa/Lusaka'),
(37, 'Africa/Malabo'),
(38, 'Africa/Maputo'),
(39, 'Africa/Maseru'),
(40, 'Africa/Mbabane'),
(41, 'Africa/Mogadishu'),
(42, 'Africa/Monrovia'),
(43, 'Africa/Nairobi'),
(44, 'Africa/Ndjamena'),
(45, 'Africa/Niamey'),
(46, 'Africa/Nouakchott'),
(47, 'Africa/Ouagadougou'),
(48, 'Africa/Porto-Novo'),
(49, 'Africa/Sao_Tome'),
(50, 'Africa/Timbuktu'),
(51, 'Africa/Tripoli'),
(52, 'Africa/Tunis'),
(53, 'Africa/Windhoek'),
(54, 'America/Adak'),
(55, 'America/Anchorage'),
(56, 'America/Anguilla'),
(57, 'America/Antigua'),
(58, 'America/Araguaina'),
(59, 'America/Argentina/Buenos_Aires'),
(60, 'America/Argentina/Catamarca'),
(61, 'America/Argentina/ComodRivadavia'),
(62, 'America/Argentina/Cordoba'),
(63, 'America/Argentina/Jujuy'),
(64, 'America/Argentina/La_Rioja'),
(65, 'America/Argentina/Mendoza'),
(66, 'America/Argentina/Rio_Gallegos'),
(67, 'America/Argentina/Salta'),
(68, 'America/Argentina/San_Juan'),
(69, 'America/Argentina/San_Luis'),
(70, 'America/Argentina/Tucuman'),
(71, 'America/Argentina/Ushuaia'),
(72, 'America/Aruba'),
(73, 'America/Asuncion'),
(74, 'America/Atikokan'),
(75, 'America/Atka'),
(76, 'America/Bahia'),
(77, 'America/Bahia_Banderas'),
(78, 'America/Barbados'),
(79, 'America/Belem'),
(80, 'America/Belize'),
(81, 'America/Blanc-Sablon'),
(82, 'America/Boa_Vista'),
(83, 'America/Bogota'),
(84, 'America/Boise'),
(85, 'America/Buenos_Aires'),
(86, 'America/Cambridge_Bay'),
(87, 'America/Campo_Grande'),
(88, 'America/Cancun'),
(89, 'America/Caracas'),
(90, 'America/Catamarca'),
(91, 'America/Cayenne'),
(92, 'America/Cayman'),
(93, 'America/Chicago'),
(94, 'America/Chihuahua'),
(95, 'America/Coral_Harbour'),
(96, 'America/Cordoba'),
(97, 'America/Costa_Rica'),
(98, 'America/Creston'),
(99, 'America/Cuiaba'),
(100, 'America/Curacao'),
(101, 'America/Danmarkshavn'),
(102, 'America/Dawson'),
(103, 'America/Dawson_Creek'),
(104, 'America/Denver'),
(105, 'America/Detroit'),
(106, 'America/Dominica'),
(107, 'America/Edmonton'),
(108, 'America/Eirunepe'),
(109, 'America/El_Salvador'),
(110, 'America/Ensenada'),
(111, 'America/Fort_Nelson'),
(112, 'America/Fort_Wayne'),
(113, 'America/Fortaleza'),
(114, 'America/Glace_Bay'),
(115, 'America/Godthab'),
(116, 'America/Goose_Bay'),
(117, 'America/Grand_Turk'),
(118, 'America/Grenada'),
(119, 'America/Guadeloupe'),
(120, 'America/Guatemala'),
(121, 'America/Guayaquil'),
(122, 'America/Guyana'),
(123, 'America/Halifax'),
(124, 'America/Havana'),
(125, 'America/Hermosillo'),
(126, 'America/Indiana/Indianapolis'),
(127, 'America/Indiana/Knox'),
(128, 'America/Indiana/Marengo'),
(129, 'America/Indiana/Petersburg'),
(130, 'America/Indiana/Tell_City'),
(131, 'America/Indiana/Vevay'),
(132, 'America/Indiana/Vincennes'),
(133, 'America/Indiana/Winamac'),
(134, 'America/Indianapolis'),
(135, 'America/Inuvik'),
(136, 'America/Iqaluit'),
(137, 'America/Jamaica'),
(138, 'America/Jujuy'),
(139, 'America/Juneau'),
(140, 'America/Kentucky/Louisville'),
(141, 'America/Kentucky/Monticello'),
(142, 'America/Knox_IN'),
(143, 'America/Kralendijk'),
(144, 'America/La_Paz'),
(145, 'America/Lima'),
(146, 'America/Los_Angeles'),
(147, 'America/Louisville'),
(148, 'America/Lower_Princes'),
(149, 'America/Maceio'),
(150, 'America/Managua'),
(151, 'America/Manaus'),
(152, 'America/Marigot'),
(153, 'America/Martinique'),
(154, 'America/Matamoros'),
(155, 'America/Mazatlan'),
(156, 'America/Mendoza'),
(157, 'America/Menominee'),
(158, 'America/Merida'),
(159, 'America/Metlakatla'),
(160, 'America/Mexico_City'),
(161, 'America/Miquelon'),
(162, 'America/Moncton'),
(163, 'America/Monterrey'),
(164, 'America/Montevideo'),
(165, 'America/Montreal'),
(166, 'America/Montserrat'),
(167, 'America/Nassau'),
(168, 'America/New_York'),
(169, 'America/Nipigon'),
(170, 'America/Nome'),
(171, 'America/Noronha'),
(172, 'America/North_Dakota/Beulah'),
(173, 'America/North_Dakota/Center'),
(174, 'America/North_Dakota/New_Salem'),
(175, 'America/Ojinaga'),
(176, 'America/Panama'),
(177, 'America/Pangnirtung'),
(178, 'America/Paramaribo'),
(179, 'America/Phoenix'),
(180, 'America/Port_of_Spain'),
(181, 'America/Port-au-Prince'),
(182, 'America/Porto_Acre'),
(183, 'America/Porto_Velho'),
(184, 'America/Puerto_Rico'),
(185, 'America/Punta_Arenas'),
(186, 'America/Rainy_River'),
(187, 'America/Rankin_Inlet'),
(188, 'America/Recife'),
(189, 'America/Regina'),
(190, 'America/Resolute'),
(191, 'America/Rio_Branco'),
(192, 'America/Rosario'),
(193, 'America/Santa_Isabel'),
(194, 'America/Santarem'),
(195, 'America/Santiago'),
(196, 'America/Santo_Domingo'),
(197, 'America/Sao_Paulo'),
(198, 'America/Scoresbysund'),
(199, 'America/Shiprock'),
(200, 'America/Sitka'),
(201, 'America/St_Barthelemy'),
(202, 'America/St_Johns'),
(203, 'America/St_Kitts'),
(204, 'America/St_Lucia'),
(205, 'America/St_Thomas'),
(206, 'America/St_Vincent'),
(207, 'America/Swift_Current'),
(208, 'America/Tegucigalpa'),
(209, 'America/Thule'),
(210, 'America/Thunder_Bay'),
(211, 'America/Tijuana'),
(212, 'America/Toronto'),
(213, 'America/Tortola'),
(214, 'America/Vancouver'),
(215, 'America/Virgin'),
(216, 'America/Whitehorse'),
(217, 'America/Winnipeg'),
(218, 'America/Yakutat'),
(219, 'America/Yellowknife'),
(220, 'Antarctica/Casey'),
(221, 'Antarctica/Davis'),
(222, 'Antarctica/DumontDUrville'),
(223, 'Antarctica/Macquarie'),
(224, 'Antarctica/Mawson'),
(225, 'Antarctica/McMurdo'),
(226, 'Antarctica/Palmer'),
(227, 'Antarctica/Rothera'),
(228, 'Antarctica/South_Pole'),
(229, 'Antarctica/Syowa'),
(230, 'Antarctica/Troll'),
(231, 'Antarctica/Vostok'),
(232, 'Arctic/Longyearbyen'),
(233, 'Asia/Aden'),
(234, 'Asia/Almaty'),
(235, 'Asia/Amman'),
(236, 'Asia/Anadyr'),
(237, 'Asia/Aqtau'),
(238, 'Asia/Aqtobe'),
(239, 'Asia/Ashgabat'),
(240, 'Asia/Ashkhabad'),
(241, 'Asia/Atyrau'),
(242, 'Asia/Baghdad'),
(243, 'Asia/Bahrain'),
(244, 'Asia/Baku'),
(245, 'Asia/Bangkok'),
(246, 'Asia/Barnaul'),
(247, 'Asia/Beirut'),
(248, 'Asia/Bishkek'),
(249, 'Asia/Brunei'),
(250, 'Asia/Calcutta'),
(251, 'Asia/Chita'),
(252, 'Asia/Choibalsan'),
(253, 'Asia/Chongqing'),
(254, 'Asia/Chungking'),
(255, 'Asia/Colombo'),
(256, 'Asia/Dacca'),
(257, 'Asia/Damascus'),
(258, 'Asia/Dhaka'),
(259, 'Asia/Dili'),
(260, 'Asia/Dubai'),
(261, 'Asia/Dushanbe'),
(262, 'Asia/Famagusta'),
(263, 'Asia/Gaza'),
(264, 'Asia/Harbin'),
(265, 'Asia/Hebron'),
(266, 'Asia/Ho_Chi_Minh'),
(267, 'Asia/Hong_Kong'),
(268, 'Asia/Hovd'),
(269, 'Asia/Irkutsk'),
(270, 'Asia/Istanbul'),
(271, 'Asia/Jakarta'),
(272, 'Asia/Jayapura'),
(273, 'Asia/Jerusalem'),
(274, 'Asia/Kabul'),
(275, 'Asia/Kamchatka'),
(276, 'Asia/Karachi'),
(277, 'Asia/Kashgar'),
(278, 'Asia/Kathmandu'),
(279, 'Asia/Katmandu'),
(280, 'Asia/Khandyga'),
(281, 'Asia/Kolkata'),
(282, 'Asia/Krasnoyarsk'),
(283, 'Asia/Kuala_Lumpur'),
(284, 'Asia/Kuching'),
(285, 'Asia/Kuwait'),
(286, 'Asia/Macao'),
(287, 'Asia/Macau'),
(288, 'Asia/Magadan'),
(289, 'Asia/Makassar'),
(290, 'Asia/Manila'),
(291, 'Asia/Muscat'),
(292, 'Asia/Novokuznetsk'),
(293, 'Asia/Novosibirsk'),
(294, 'Asia/Omsk'),
(295, 'Asia/Oral'),
(296, 'Asia/Phnom_Penh'),
(297, 'Asia/Pontianak'),
(298, 'Asia/Pyongyang'),
(299, 'Asia/Qatar'),
(300, 'Asia/Qyzylorda'),
(301, 'Asia/Rangoon'),
(302, 'Asia/Riyadh'),
(303, 'Asia/Saigon'),
(304, 'Asia/Sakhalin'),
(305, 'Asia/Samarkand'),
(306, 'Asia/Seoul'),
(307, 'Asia/Shanghai'),
(308, 'Asia/Singapore'),
(309, 'Asia/Srednekolymsk'),
(310, 'Asia/Taipei'),
(311, 'Asia/Tashkent'),
(312, 'Asia/Tbilisi'),
(313, 'Asia/Tehran'),
(314, 'Asia/Tel_Aviv'),
(315, 'Asia/Thimbu'),
(316, 'Asia/Thimphu'),
(317, 'Asia/Tokyo'),
(318, 'Asia/Tomsk'),
(319, 'Asia/Ujung_Pandang'),
(320, 'Asia/Ulaanbaatar'),
(321, 'Asia/Ulan_Bator'),
(322, 'Asia/Urumqi'),
(323, 'Asia/Ust-Nera'),
(324, 'Asia/Vientiane'),
(325, 'Asia/Vladivostok'),
(326, 'Asia/Yakutsk'),
(327, 'Asia/Yangon'),
(328, 'Asia/Yekaterinburg'),
(329, 'Asia/Yerevan'),
(330, 'Atlantic/Azores'),
(331, 'Atlantic/Bermuda'),
(332, 'Atlantic/Canary'),
(333, 'Atlantic/Cape_Verde'),
(334, 'Atlantic/Faeroe'),
(335, 'Atlantic/Faroe'),
(336, 'Atlantic/Jan_Mayen'),
(337, 'Atlantic/Madeira'),
(338, 'Atlantic/Reykjavik'),
(339, 'Atlantic/South_Georgia'),
(340, 'Atlantic/St_Helena'),
(341, 'Atlantic/Stanley'),
(342, 'Australia/ACT'),
(343, 'Australia/Adelaide'),
(344, 'Australia/Brisbane'),
(345, 'Australia/Broken_Hill'),
(346, 'Australia/Canberra'),
(347, 'Australia/Currie'),
(348, 'Australia/Darwin'),
(349, 'Australia/Eucla'),
(350, 'Australia/Hobart'),
(351, 'Australia/LHI'),
(352, 'Australia/Lindeman'),
(353, 'Australia/Lord_Howe'),
(354, 'Australia/Melbourne'),
(355, 'Australia/North'),
(356, 'Australia/NSW'),
(357, 'Australia/Perth'),
(358, 'Australia/Queensland'),
(359, 'Australia/South'),
(360, 'Australia/Sydney'),
(361, 'Australia/Tasmania'),
(362, 'Australia/Victoria'),
(363, 'Australia/West'),
(364, 'Australia/Yancowinna'),
(365, 'Brazil/Acre'),
(366, 'Brazil/DeNoronha'),
(367, 'Brazil/East'),
(368, 'Brazil/West'),
(369, 'Canada/Atlantic'),
(370, 'Canada/Central'),
(371, 'Canada/Eastern'),
(372, 'Canada/Mountain'),
(373, 'Canada/Newfoundland'),
(374, 'Canada/Pacific'),
(375, 'Canada/Saskatchewan'),
(376, 'Canada/Yukon'),
(377, 'CET'),
(378, 'Chile/Continental'),
(379, 'Chile/EasterIsland'),
(380, 'CST6CDT'),
(381, 'Cuba'),
(382, 'EET'),
(383, 'Egypt'),
(384, 'Eire'),
(385, 'EST'),
(386, 'EST5EDT'),
(387, 'Etc/GMT'),
(388, 'Etc/GMT+0'),
(389, 'Etc/GMT+1'),
(390, 'Etc/GMT+10'),
(391, 'Etc/GMT+11'),
(392, 'Etc/GMT+12'),
(393, 'Etc/GMT+2'),
(394, 'Etc/GMT+3'),
(395, 'Etc/GMT+4'),
(396, 'Etc/GMT+5'),
(397, 'Etc/GMT+6'),
(398, 'Etc/GMT+7'),
(399, 'Etc/GMT+8'),
(400, 'Etc/GMT+9'),
(401, 'Etc/GMT0'),
(402, 'Etc/GMT-0'),
(403, 'Etc/GMT-1'),
(404, 'Etc/GMT-10'),
(405, 'Etc/GMT-11'),
(406, 'Etc/GMT-12'),
(407, 'Etc/GMT-13'),
(408, 'Etc/GMT-14'),
(409, 'Etc/GMT-2'),
(410, 'Etc/GMT-3'),
(411, 'Etc/GMT-4'),
(412, 'Etc/GMT-5'),
(413, 'Etc/GMT-6'),
(414, 'Etc/GMT-7'),
(415, 'Etc/GMT-8'),
(416, 'Etc/GMT-9'),
(417, 'Etc/Greenwich'),
(418, 'Etc/UCT'),
(419, 'Etc/Universal'),
(420, 'Etc/UTC'),
(421, 'Etc/Zulu'),
(422, 'Europe/Amsterdam'),
(423, 'Europe/Andorra'),
(424, 'Europe/Astrakhan'),
(425, 'Europe/Athens'),
(426, 'Europe/Belfast'),
(427, 'Europe/Belgrade'),
(428, 'Europe/Berlin'),
(429, 'Europe/Bratislava'),
(430, 'Europe/Brussels'),
(431, 'Europe/Bucharest'),
(432, 'Europe/Budapest'),
(433, 'Europe/Busingen'),
(434, 'Europe/Chisinau'),
(435, 'Europe/Copenhagen'),
(436, 'Europe/Dublin'),
(437, 'Europe/Gibraltar'),
(438, 'Europe/Guernsey'),
(439, 'Europe/Helsinki'),
(440, 'Europe/Isle_of_Man'),
(441, 'Europe/Istanbul'),
(442, 'Europe/Jersey'),
(443, 'Europe/Kaliningrad'),
(444, 'Europe/Kiev'),
(445, 'Europe/Kirov'),
(446, 'Europe/Lisbon'),
(447, 'Europe/Ljubljana'),
(448, 'Europe/London'),
(449, 'Europe/Luxembourg'),
(450, 'Europe/Madrid'),
(451, 'Europe/Malta'),
(452, 'Europe/Mariehamn'),
(453, 'Europe/Minsk'),
(454, 'Europe/Monaco'),
(455, 'Europe/Moscow'),
(456, 'Europe/Nicosia'),
(457, 'Europe/Oslo'),
(458, 'Europe/Paris'),
(459, 'Europe/Podgorica'),
(460, 'Europe/Prague'),
(461, 'Europe/Riga'),
(462, 'Europe/Rome'),
(463, 'Europe/Samara'),
(464, 'Europe/San_Marino'),
(465, 'Europe/Sarajevo'),
(466, 'Europe/Saratov'),
(467, 'Europe/Simferopol'),
(468, 'Europe/Skopje'),
(469, 'Europe/Sofia'),
(470, 'Europe/Stockholm'),
(471, 'Europe/Tallinn'),
(472, 'Europe/Tirane'),
(473, 'Europe/Tiraspol'),
(474, 'Europe/Ulyanovsk'),
(475, 'Europe/Uzhgorod'),
(476, 'Europe/Vaduz'),
(477, 'Europe/Vatican'),
(478, 'Europe/Vienna'),
(479, 'Europe/Vilnius'),
(480, 'Europe/Volgograd'),
(481, 'Europe/Warsaw'),
(482, 'Europe/Zagreb'),
(483, 'Europe/Zaporozhye'),
(484, 'Europe/Zurich'),
(485, 'GB'),
(486, 'GB-Eire'),
(487, 'GMT'),
(488, 'GMT+0'),
(489, 'GMT0'),
(490, 'GMT?0'),
(491, 'Greenwich'),
(492, 'Hongkong'),
(493, 'HST'),
(494, 'Iceland'),
(495, 'Indian/Antananarivo'),
(496, 'Indian/Chagos'),
(497, 'Indian/Christmas'),
(498, 'Indian/Cocos'),
(499, 'Indian/Comoro'),
(500, 'Indian/Kerguelen'),
(501, 'Indian/Mahe'),
(502, 'Indian/Maldives'),
(503, 'Indian/Mauritius'),
(504, 'Indian/Mayotte'),
(505, 'Indian/Reunion'),
(506, 'Iran'),
(507, 'Israel'),
(508, 'Jamaica'),
(509, 'Japan'),
(510, 'Kwajalein'),
(511, 'Libya'),
(512, 'MET'),
(513, 'Mexico/BajaNorte'),
(514, 'Mexico/BajaSur'),
(515, 'Mexico/General'),
(516, 'MST'),
(517, 'MST7MDT'),
(518, 'Navajo'),
(519, 'NZ'),
(520, 'NZ-CHAT'),
(521, 'Pacific/Apia'),
(522, 'Pacific/Auckland'),
(523, 'Pacific/Bougainville'),
(524, 'Pacific/Chatham'),
(525, 'Pacific/Chuuk'),
(526, 'Pacific/Easter'),
(527, 'Pacific/Efate'),
(528, 'Pacific/Enderbury'),
(529, 'Pacific/Fakaofo'),
(530, 'Pacific/Fiji'),
(531, 'Pacific/Funafuti'),
(532, 'Pacific/Galapagos'),
(533, 'Pacific/Gambier'),
(534, 'Pacific/Guadalcanal'),
(535, 'Pacific/Guam'),
(536, 'Pacific/Honolulu'),
(537, 'Pacific/Johnston'),
(538, 'Pacific/Kiritimati'),
(539, 'Pacific/Kosrae'),
(540, 'Pacific/Kwajalein'),
(541, 'Pacific/Majuro'),
(542, 'Pacific/Marquesas'),
(543, 'Pacific/Midway'),
(544, 'Pacific/Nauru'),
(545, 'Pacific/Niue'),
(546, 'Pacific/Norfolk'),
(547, 'Pacific/Noumea'),
(548, 'Pacific/Pago_Pago'),
(549, 'Pacific/Palau'),
(550, 'Pacific/Pitcairn'),
(551, 'Pacific/Pohnpei'),
(552, 'Pacific/Ponape'),
(553, 'Pacific/Port_Moresby'),
(554, 'Pacific/Rarotonga'),
(555, 'Pacific/Saipan'),
(556, 'Pacific/Samoa'),
(557, 'Pacific/Tahiti'),
(558, 'Pacific/Tarawa'),
(559, 'Pacific/Tongatapu'),
(560, 'Pacific/Truk'),
(561, 'Pacific/Wake'),
(562, 'Pacific/Wallis'),
(563, 'Pacific/Yap'),
(564, 'Poland'),
(565, 'Portugal'),
(566, 'PRC'),
(567, 'PST8PDT'),
(568, 'ROC'),
(569, 'ROK'),
(570, 'Singapore'),
(571, 'Turkey'),
(572, 'UCT'),
(573, 'Universal'),
(574, 'US/Alaska'),
(575, 'US/Aleutian'),
(576, 'US/Arizona'),
(577, 'US/Central'),
(578, 'US/Eastern'),
(579, 'US/East-Indiana'),
(580, 'US/Hawaii'),
(581, 'US/Indiana-Starke'),
(582, 'US/Michigan'),
(583, 'US/Mountain'),
(584, 'US/Pacific'),
(585, 'US/Pacific-New'),
(586, 'US/Samoa'),
(587, 'UTC'),
(588, 'WET'),
(589, 'W-SU'),
(590, 'Zulu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(45) DEFAULT NULL,
  `u_name` varchar(45) DEFAULT NULL,
  `u_phone` varchar(20) DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_password` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `u_department` int(11) DEFAULT NULL,
  `u_department_name` varchar(40) DEFAULT NULL,
  `u_active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_name`, `u_phone`, `u_email`, `u_password`, `u_department`, `u_department_name`, `u_active`) VALUES
(1, 'mohamedsyam', 'Syam', '01101101277', 'syamgro@gmail.com', '0121441689', 1, 'IT', 1),
(2, 'amr.salem', 'Amr Salem', '01000286606', 'amr.salem@townteam.com', '103', 1, 'IT', 1),
(3, 'khaled.tarek', 'Khaled Tarek', '01101101277', 'khaled.tark@townteam.com', 'Town123', 1, 'IT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(30) DEFAULT NULL,
  `v_display` int(11) DEFAULT '1',
  `v_phone` varchar(50) DEFAULT NULL,
  `v_address` varchar(50) DEFAULT NULL,
  `v_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`v_id`, `v_name`, `v_display`, `v_phone`, `v_address`, `v_email`) VALUES
(3, 'HQ - Tanta', 1, '777', 'Tanta', 'it@townteam.com'),
(4, 'Sadat-Purchase', 1, '', 'Sadat City', ''),
(5, 'Sadat - Office', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `vs_id` int(11) NOT NULL,
  `vs_u_id` int(11) NOT NULL COMMENT 'For log',
  `vs_per_id` int(11) NOT NULL,
  `vs_tech_id` int(11) NOT NULL COMMENT 'Technician ID',
  `vs_follower_id` int(11) NOT NULL COMMENT 'Follower ID',
  `vs_timein` varchar(60) NOT NULL,
  `vs_timeout` varchar(60) NOT NULL,
  `vs_target_time` varchar(30) NOT NULL,
  `vs_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `w_id` int(11) NOT NULL,
  `w_name` varchar(30) DEFAULT NULL,
  `w_display` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `dev1` (`p_dev_id`),
  ADD KEY `loc1` (`p_loc_id`),
  ADD KEY `emp1` (`p_owner_id`);

--
-- Indexes for table `connectivity`
--
ALTER TABLE `connectivity`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `con_loc_id` (`con_loc_id`),
  ADD KEY `con_plan_id` (`con_plan_id`),
  ADD KEY `con_u_id` (`con_u_id`);

--
-- Indexes for table `connectivity_plans`
--
ALTER TABLE `connectivity_plans`
  ADD PRIMARY KEY (`conp_id`);

--
-- Indexes for table `custody`
--
ALTER TABLE `custody`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_e_id` (`c_e_id`),
  ADD KEY `c_item_id` (`c_item_id`);

--
-- Indexes for table `data_usage`
--
ALTER TABLE `data_usage`
  ADD KEY `data_u_id` (`data_u_id`),
  ADD KEY `data_id` (`data_id`);

--
-- Indexes for table `datecustody`
--
ALTER TABLE `datecustody`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `d_c_id` (`d_c_id`),
  ADD KEY `datecustody_ibfk_2` (`d_u_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `d_loc_id` (`d_loc_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`dev_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `e_department_id` (`e_department_id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `gift_partners`
--
ALTER TABLE `gift_partners`
  ADD PRIMARY KEY (`gp_id`);

--
-- Indexes for table `legal`
--
ALTER TABLE `legal`
  ADD PRIMARY KEY (`leg_id`),
  ADD KEY `leg_loc_id` (`leg_loc_id`),
  ADD KEY `leg_follower` (`leg_follower`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `loc_u_id` (`loc_u_id`);

--
-- Indexes for table `off_dvr`
--
ALTER TABLE `off_dvr`
  ADD KEY `off_u_id` (`off_u_id`),
  ADD KEY `off_per_id` (`off_per_id`),
  ADD KEY `off_dev_id` (`off_dev_id`),
  ADD KEY `off_loc_id` (`off_loc_id`);

--
-- Indexes for table `opclass`
--
ALTER TABLE `opclass`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `operation_details`
--
ALTER TABLE `operation_details`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `Operation data` (`o_o_id`);

--
-- Indexes for table `peroid`
--
ALTER TABLE `peroid`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
  ADD PRIMARY KEY (`print_id`),
  ADD KEY `print_dev_id` (`print_dev_id`),
  ADD KEY `print_loc_id` (`print_loc_id`);

--
-- Indexes for table `printer_usage`
--
ALTER TABLE `printer_usage`
  ADD PRIMARY KEY (`pus_id`),
  ADD KEY `pus_u_id` (`pus_u_id`),
  ADD KEY `pus_per_id` (`pus_per_id`),
  ADD KEY `pus_print_id` (`pus_print_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_warehouse_id` (`s_warehouse_id`);

--
-- Indexes for table `stock_trans`
--
ALTER TABLE `stock_trans`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `s_item_id` (`s_item_id`),
  ADD KEY `s_wh_id` (`s_wh_id`),
  ADD KEY `s_vendor` (`s_vendor`);

--
-- Indexes for table `timezone`
--
ALTER TABLE `timezone`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`vs_id`),
  ADD KEY `vs_u_id` (`vs_u_id`),
  ADD KEY `vs_per_id` (`vs_per_id`),
  ADD KEY `vs_tech_id` (`vs_tech_id`),
  ADD KEY `vs_follower_id` (`vs_follower_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connectivity`
--
ALTER TABLE `connectivity`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connectivity_plans`
--
ALTER TABLE `connectivity_plans`
  MODIFY `conp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custody`
--
ALTER TABLE `custody`
  MODIFY `c_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datecustody`
--
ALTER TABLE `datecustody`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_partners`
--
ALTER TABLE `gift_partners`
  MODIFY `gp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legal`
--
ALTER TABLE `legal`
  MODIFY `leg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `opclass`
--
ALTER TABLE `opclass`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operation_details`
--
ALTER TABLE `operation_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peroid`
--
ALTER TABLE `peroid`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `printers`
--
ALTER TABLE `printers`
  MODIFY `print_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `printer_usage`
--
ALTER TABLE `printer_usage`
  MODIFY `pus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_trans`
--
ALTER TABLE `stock_trans`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timezone`
--
ALTER TABLE `timezone`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connectivity`
--
ALTER TABLE `connectivity`
  ADD CONSTRAINT `connectivity_ibfk_1` FOREIGN KEY (`con_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `connectivity_ibfk_2` FOREIGN KEY (`con_plan_id`) REFERENCES `connectivity_plans` (`conp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `connectivity_ibfk_3` FOREIGN KEY (`con_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `custody`
--
ALTER TABLE `custody`
  ADD CONSTRAINT `custody_ibfk_1` FOREIGN KEY (`c_e_id`) REFERENCES `employees` (`e_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `custody_ibfk_2` FOREIGN KEY (`c_item_id`) REFERENCES `stock_items` (`s_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `data_usage`
--
ALTER TABLE `data_usage`
  ADD CONSTRAINT `data_usage_ibfk_1` FOREIGN KEY (`data_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `data_usage_ibfk_2` FOREIGN KEY (`data_id`) REFERENCES `connectivity` (`con_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `datecustody`
--
ALTER TABLE `datecustody`
  ADD CONSTRAINT `datecustody_ibfk_1` FOREIGN KEY (`d_c_id`) REFERENCES `custody` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `datecustody_ibfk_2` FOREIGN KEY (`d_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`d_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`e_department_id`) REFERENCES `departments` (`d_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `legal`
--
ALTER TABLE `legal`
  ADD CONSTRAINT `legal_ibfk_1` FOREIGN KEY (`leg_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `legal_ibfk_2` FOREIGN KEY (`leg_follower`) REFERENCES `employees` (`e_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`loc_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `off_dvr`
--
ALTER TABLE `off_dvr`
  ADD CONSTRAINT `off_dvr_ibfk_1` FOREIGN KEY (`off_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `off_dvr_ibfk_2` FOREIGN KEY (`off_per_id`) REFERENCES `peroid` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `off_dvr_ibfk_3` FOREIGN KEY (`off_dev_id`) REFERENCES `devices` (`dev_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `off_dvr_ibfk_4` FOREIGN KEY (`off_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `printers`
--
ALTER TABLE `printers`
  ADD CONSTRAINT `printers_ibfk_1` FOREIGN KEY (`print_dev_id`) REFERENCES `devices` (`dev_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `printers_ibfk_2` FOREIGN KEY (`print_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `printer_usage`
--
ALTER TABLE `printer_usage`
  ADD CONSTRAINT `printer_usage_ibfk_1` FOREIGN KEY (`pus_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `printer_usage_ibfk_2` FOREIGN KEY (`pus_per_id`) REFERENCES `peroid` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `printer_usage_ibfk_3` FOREIGN KEY (`pus_print_id`) REFERENCES `printers` (`print_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD CONSTRAINT `stock_items_ibfk_1` FOREIGN KEY (`s_warehouse_id`) REFERENCES `warehouse` (`w_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_trans`
--
ALTER TABLE `stock_trans`
  ADD CONSTRAINT `stock_trans_ibfk_1` FOREIGN KEY (`s_item_id`) REFERENCES `stock_items` (`s_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stock_trans_ibfk_2` FOREIGN KEY (`s_wh_id`) REFERENCES `warehouse` (`w_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stock_trans_ibfk_3` FOREIGN KEY (`s_vendor`) REFERENCES `vendors` (`v_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`vs_u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`vs_per_id`) REFERENCES `peroid` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visit_ibfk_3` FOREIGN KEY (`vs_tech_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visit_ibfk_4` FOREIGN KEY (`vs_follower_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
