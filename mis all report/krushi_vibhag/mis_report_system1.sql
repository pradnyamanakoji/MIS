-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2025 at 07:00 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis_report_system1`
--

-- --------------------------------------------------------

--
-- Table structure for table `biogas_development_report`
--

CREATE TABLE `biogas_development_report` (
  `id` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `zilla_parishad` varchar(100) NOT NULL,
  `annual_target_general` int(11) DEFAULT NULL,
  `annual_target_sc` int(11) DEFAULT NULL,
  `annual_target_st` int(11) DEFAULT NULL,
  `annual_target_total` int(11) DEFAULT NULL,
  `achieved_month_general` int(11) DEFAULT NULL,
  `achieved_month_sc` int(11) DEFAULT NULL,
  `achieved_month_st` int(11) DEFAULT NULL,
  `achieved_month_total` int(11) DEFAULT NULL,
  `achieved_till_general` int(11) DEFAULT NULL,
  `achieved_till_sc` int(11) DEFAULT NULL,
  `achieved_till_st` int(11) DEFAULT NULL,
  `achieved_till_total` int(11) DEFAULT NULL,
  `completion_percentage` varchar(20) DEFAULT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biogas_development_report`
--

INSERT INTO `biogas_development_report` (`id`, `serial_no`, `zilla_parishad`, `annual_target_general`, `annual_target_sc`, `annual_target_st`, `annual_target_total`, `achieved_month_general`, `achieved_month_sc`, `achieved_month_st`, `achieved_month_total`, `achieved_till_general`, `achieved_till_sc`, `achieved_till_st`, `achieved_till_total`, `completion_percentage`, `report_date`) VALUES
(1, 1, 'Akkalkot', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(2, 2, 'Barshi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(3, 3, 'Mohol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(4, 4, 'Madha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(5, 5, 'North Solapur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(6, 6, 'South Solapur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(7, 7, 'Karmala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(8, 8, 'Malshiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(9, 9, 'Mangalvedha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(10, 10, 'Pandharpur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(11, 11, 'Sangola', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(12, 1, 'Akkalkot', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(13, 2, 'Barshi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(14, 3, 'Mohol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(15, 4, 'Madha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(16, 5, 'North Solapur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(17, 6, 'South Solapur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(18, 7, 'Karmala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(19, 8, 'Malshiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(20, 9, 'Mangalvedha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(21, 10, 'Pandharpur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09'),
(22, 11, 'Sangola', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0%', '2025-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `construction_new_well`
--

CREATE TABLE `construction_new_well` (
  `id` int(11) NOT NULL,
  `taluka` varchar(255) NOT NULL,
  `selected_in_lottery` float DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` float DEFAULT '0',
  `amount_disbursed_2` float DEFAULT '0',
  `amount_disbursed_3` float DEFAULT '0',
  `amount_disbursed_4` float DEFAULT '0',
  `amount_disbursed_5` float DEFAULT '0',
  `amount_disbursed_6` float DEFAULT '0',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `construction_new_well`
--

INSERT INTO `construction_new_well` (`id`, `taluka`, `selected_in_lottery`, `rejected_applications`, `canceled_applications`, `application_in_process`, `farmer_doc_pending`, `farmer_doc_uploaded`, `aoscp_doc_scrutiny_pending`, `bdo_doc_scrutiny_pending`, `bdo_site_inspection_report_pending`, `ado_admin_tech_approval`, `ado_construction_bill_approved`, `ado_construction_bill_disbursed`, `payment_in_process`, `amount_disbursed_1`, `amount_disbursed_2`, `amount_disbursed_3`, `amount_disbursed_4`, `amount_disbursed_5`, `amount_disbursed_6`, `updated_at`) VALUES
(1, 'Akkalkot', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(2, 'Barshi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(3, 'Karmala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(4, 'Madha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(5, 'Malshiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(6, 'Mangalvedhe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(7, 'Mohol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(8, 'Pandharpur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(9, 'Sangole', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(10, 'Solapur North', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45'),
(11, 'Solapur South', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-08-09 22:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `construction_of_new_well_2`
--

CREATE TABLE `construction_of_new_well_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `construction_of_new_well_2`
--

INSERT INTO `construction_of_new_well_2` (`taluka`, `selected_in_lottery`, `rejected_applications`, `canceled_applications`, `application_in_process`, `farmer_doc_pending`, `farmer_doc_uploaded`, `aoscp_doc_scrutiny_pending`, `bdo_doc_scrutiny_pending`, `bdo_scrutiny_site_inspection_report_estimate`, `ado_admin_tech_approval_work_order_presanction`, `ado_construction_bill_approved_for_payment`, `ado_construction_bill_disbursed`, `payment_in_process`, `amount_discharged_12012024`, `amount_discharged_05012024`, `amount_discharged_22122023`, `amount_discharged_15122023`, `amount_discharged_11122023`, `amount_discharged_08122023`, `updated_at`) VALUES
('', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 23:08:52'),
('', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 23:08:52'),
('', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 23:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `diesel_engine_2`
--

CREATE TABLE `diesel_engine_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `electricity_connection_charges`
--

CREATE TABLE `electricity_connection_charges` (
  `id` int(11) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `selected_in_lottery` int(11) DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_2` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_3` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_4` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_5` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_6` decimal(15,2) DEFAULT '0.00',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electricity_connection_charges`
--

INSERT INTO `electricity_connection_charges` (`id`, `taluka`, `selected_in_lottery`, `rejected_applications`, `canceled_applications`, `application_in_process`, `farmer_doc_pending`, `farmer_doc_uploaded`, `aoscp_doc_scrutiny_pending`, `bdo_doc_scrutiny_pending`, `bdo_site_inspection_report_pending`, `ado_admin_tech_approval`, `ado_construction_bill_approved`, `ado_construction_bill_disbursed`, `payment_in_process`, `amount_disbursed_1`, `amount_disbursed_2`, `amount_disbursed_3`, `amount_disbursed_4`, `amount_disbursed_5`, `amount_disbursed_6`, `updated_at`) VALUES
(1, 'Akkalkot', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(2, 'Barshi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(3, 'Karmala', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(4, 'Madha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(5, 'Malshiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(6, 'Mangalvedhe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(7, 'Mohol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(8, 'Pandharpur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(9, 'Sangole', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(10, 'Solapur North', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51'),
(11, 'Solapur South', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `electricity_connection_charges_2`
--

CREATE TABLE `electricity_connection_charges_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inwell_boring`
--

CREATE TABLE `inwell_boring` (
  `id` int(11) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `selected_in_lottery` int(11) DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_2` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_3` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_4` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_5` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_6` decimal(15,2) DEFAULT '0.00',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inwell_boring`
--

INSERT INTO `inwell_boring` (`id`, `taluka`, `selected_in_lottery`, `rejected_applications`, `canceled_applications`, `application_in_process`, `farmer_doc_pending`, `farmer_doc_uploaded`, `aoscp_doc_scrutiny_pending`, `bdo_doc_scrutiny_pending`, `bdo_site_inspection_report_pending`, `ado_admin_tech_approval`, `ado_construction_bill_approved`, `ado_construction_bill_disbursed`, `payment_in_process`, `amount_disbursed_1`, `amount_disbursed_2`, `amount_disbursed_3`, `amount_disbursed_4`, `amount_disbursed_5`, `amount_disbursed_6`, `updated_at`) VALUES
(1, 'Akkalkot', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(2, 'Barshi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(3, 'Karmala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(4, 'Madha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(5, 'Malshiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(6, 'Mangalvedhe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(7, 'Mohol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(8, 'Pandharpur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(9, 'Sangole', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(10, 'Solapur North', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55'),
(11, 'Solapur South', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `inwell_boring_2`
--

CREATE TABLE `inwell_boring_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_garden_2`
--

CREATE TABLE `kitchen_garden_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lining_to_farm_pond`
--

CREATE TABLE `lining_to_farm_pond` (
  `id` int(11) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `selected_in_lottery` int(11) DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_2` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_3` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_4` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_5` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_6` decimal(15,2) DEFAULT '0.00',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lining_to_farm_pond`
--

INSERT INTO `lining_to_farm_pond` (`id`, `taluka`, `selected_in_lottery`, `rejected_applications`, `canceled_applications`, `application_in_process`, `farmer_doc_pending`, `farmer_doc_uploaded`, `aoscp_doc_scrutiny_pending`, `bdo_doc_scrutiny_pending`, `bdo_site_inspection_report_pending`, `ado_admin_tech_approval`, `ado_construction_bill_approved`, `ado_construction_bill_disbursed`, `payment_in_process`, `amount_disbursed_1`, `amount_disbursed_2`, `amount_disbursed_3`, `amount_disbursed_4`, `amount_disbursed_5`, `amount_disbursed_6`, `updated_at`) VALUES
(1, 'Akkalkot', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(2, 'Barshi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(3, 'Karmala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(4, 'Madha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(5, 'Malshiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(6, 'Mangalvedhe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(7, 'Mohol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(8, 'Pandharpur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(9, 'Sangole', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(10, 'Solapur North', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01'),
(11, 'Solapur South', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-08-09 22:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `lining_to_farm_pond_2`
--

CREATE TABLE `lining_to_farm_pond_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pumpset`
--

CREATE TABLE `pumpset` (
  `id` int(11) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `selected_in_lottery` int(11) DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_2` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_3` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_4` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_5` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_6` decimal(15,2) DEFAULT '0.00',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pumpset_2`
--

CREATE TABLE `pumpset_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairing_old_well`
--

CREATE TABLE `repairing_old_well` (
  `id` int(11) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `selected_in_lottery` int(11) DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_2` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_3` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_4` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_5` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_6` decimal(15,2) DEFAULT '0.00',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reparing_of_old_well_2`
--

CREATE TABLE `reparing_of_old_well_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solar_pump`
--

CREATE TABLE `solar_pump` (
  `id` int(11) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `selected_in_lottery` int(11) DEFAULT '0',
  `rejected_applications` int(11) DEFAULT '0',
  `canceled_applications` int(11) DEFAULT '0',
  `application_in_process` int(11) DEFAULT '0',
  `farmer_doc_pending` int(11) DEFAULT '0',
  `farmer_doc_uploaded` int(11) DEFAULT '0',
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_doc_scrutiny_pending` int(11) DEFAULT '0',
  `bdo_site_inspection_report_pending` int(11) DEFAULT '0',
  `ado_admin_tech_approval` int(11) DEFAULT '0',
  `ado_construction_bill_approved` int(11) DEFAULT '0',
  `ado_construction_bill_disbursed` int(11) DEFAULT '0',
  `payment_in_process` int(11) DEFAULT '0',
  `amount_disbursed_1` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_2` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_3` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_4` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_5` decimal(15,2) DEFAULT '0.00',
  `amount_disbursed_6` decimal(15,2) DEFAULT '0.00',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solar_pump_2`
--

CREATE TABLE `solar_pump_2` (
  `taluka` varchar(100) DEFAULT NULL,
  `selected_in_lottery` int(11) DEFAULT NULL,
  `rejected_applications` int(11) DEFAULT NULL,
  `canceled_applications` int(11) DEFAULT NULL,
  `application_in_process` int(11) DEFAULT NULL,
  `farmer_doc_pending` int(11) DEFAULT NULL,
  `farmer_doc_uploaded` int(11) DEFAULT NULL,
  `aoscp_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_doc_scrutiny_pending` int(11) DEFAULT NULL,
  `bdo_scrutiny_site_inspection_report_estimate` int(11) DEFAULT NULL,
  `ado_admin_tech_approval_work_order_presanction` int(11) DEFAULT NULL,
  `ado_construction_bill_approved_for_payment` int(11) DEFAULT NULL,
  `ado_construction_bill_disbursed` int(11) DEFAULT NULL,
  `payment_in_process` int(11) DEFAULT NULL,
  `amount_discharged_12012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_05012024` decimal(15,2) DEFAULT NULL,
  `amount_discharged_22122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_15122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_11122023` decimal(15,2) DEFAULT NULL,
  `amount_discharged_08122023` decimal(15,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biogas_development_report`
--
ALTER TABLE `biogas_development_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `construction_new_well`
--
ALTER TABLE `construction_new_well`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taluka` (`taluka`);

--
-- Indexes for table `electricity_connection_charges`
--
ALTER TABLE `electricity_connection_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inwell_boring`
--
ALTER TABLE `inwell_boring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lining_to_farm_pond`
--
ALTER TABLE `lining_to_farm_pond`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pumpset`
--
ALTER TABLE `pumpset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repairing_old_well`
--
ALTER TABLE `repairing_old_well`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solar_pump`
--
ALTER TABLE `solar_pump`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biogas_development_report`
--
ALTER TABLE `biogas_development_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `construction_new_well`
--
ALTER TABLE `construction_new_well`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `electricity_connection_charges`
--
ALTER TABLE `electricity_connection_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `inwell_boring`
--
ALTER TABLE `inwell_boring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lining_to_farm_pond`
--
ALTER TABLE `lining_to_farm_pond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pumpset`
--
ALTER TABLE `pumpset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repairing_old_well`
--
ALTER TABLE `repairing_old_well`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solar_pump`
--
ALTER TABLE `solar_pump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
