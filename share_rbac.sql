-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 03:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share_rbac`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `idpermissions` int(11) NOT NULL,
  `idpermissions_group` int(11) NOT NULL,
  `code_class` varchar(100) NOT NULL,
  `code_method` varchar(100) NOT NULL,
  `code_url` varchar(100) NOT NULL,
  `display_name` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `display_icon` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES
(2, 1, 'rbac', 'index', 'index', 'Dashboard', 'icon-home5', 1, '0000-00-00 00:00:00', '2019-12-09 13:51:31', 'TRUE'),
(6, 4, 'rbac', 'list_users', 'list-users', 'Users', 'icon-users', 1, '0000-00-00 00:00:00', '2019-12-09 12:43:33', 'TRUE'),
(7, 4, 'rbac', 'list_departement', 'list-departement', 'Departement', 'icon-tree6', 1, '0000-00-00 00:00:00', '2019-12-09 12:43:39', 'TRUE'),
(8, 9, 'rolespermissions', 'roles', 'roles', 'Roles', 'icon-key', 1, '0000-00-00 00:00:00', '2019-12-09 13:23:27', 'TRUE'),
(9, 9, 'rolespermissions', 'insert_roles', 'insert_roles', 'Insert Roles', '', 1, '0000-00-00 00:00:00', '2019-12-09 13:49:48', 'FALSE'),
(10, 9, 'rolespermissions', 'update_roles', 'update_roles', 'Update Roles', '', 1, '0000-00-00 00:00:00', '2019-12-09 13:48:41', 'FALSE'),
(11, 9, 'rolespermissions', 'permissions_group', 'permissions-group', 'Permissions Group', 'icon-grid6', 1, '0000-00-00 00:00:00', '2019-12-09 13:23:40', 'TRUE'),
(12, 9, 'rolespermissions', 'insert_permissions_group', 'insert_permissions_group', 'Insert Permissions Group', '', 1, '0000-00-00 00:00:00', '2019-12-09 13:50:52', 'FALSE'),
(13, 9, 'rolespermissions', 'update_permissions_group', 'update_permissions_group', 'Update Permissions Group', '', 1, '0000-00-00 00:00:00', '2019-12-09 13:59:34', 'FALSE'),
(14, 9, 'rolespermissions', 'permissions', 'permissions', 'Permissions', 'icon-list', 1, '0000-00-00 00:00:00', '2019-12-09 13:23:50', 'TRUE'),
(15, 9, 'rolespermissions', 'roles_permissions', 'roles-permissions', 'Roles Permissions', '', 1, '0000-00-00 00:00:00', '2019-12-09 13:49:12', 'FALSE'),
(17, 9, 'rolespermissions', 'insert_roles_permissions', 'insert_roles_permissions', 'Insert Matrix Roles', '', 1, '2019-12-09 15:50:25', '2019-12-09 13:49:35', 'FALSE'),
(20, 4, 'rbac', 'list_users', 'list-users', 'Users', 'icon-user', 0, '2019-12-09 20:26:09', '2019-12-09 13:26:38', 'TRUE'),
(21, 4, 'rbac', 'insert_user', 'insert_user', 'Insert User', '', 1, '2019-12-09 20:27:25', '2019-12-09 13:29:13', 'FALSE'),
(22, 4, 'rbac', 'update_user', 'update_user', 'Update User', '', 1, '2019-12-09 20:28:54', '0000-00-00 00:00:00', 'FALSE'),
(23, 4, 'rbac', 'delete_user', 'delete_user', 'Delete User', '', 1, '2019-12-09 20:29:34', '0000-00-00 00:00:00', 'FALSE'),
(24, 4, 'rbac', 'update_password_user', 'update_password_user', 'Update Password User', '', 1, '2019-12-09 20:29:58', '0000-00-00 00:00:00', 'FALSE'),
(25, 4, 'rbac', 'insert_departement', 'insert_departement', 'Insert Departement', '', 1, '2019-12-09 20:31:17', '0000-00-00 00:00:00', 'FALSE'),
(26, 4, 'rbac', 'update_departement', 'update_departement', 'Update Departement', '', 1, '2019-12-09 20:31:47', '0000-00-00 00:00:00', 'FALSE'),
(27, 4, 'rbac', 'delete_departement', 'delete_departement', 'Delete Departement', '', 1, '2019-12-09 20:32:07', '0000-00-00 00:00:00', 'FALSE'),
(28, 9, 'rolespermissions', 'insert_permissions', 'insert_permissions', 'Insert Permissions', '', 1, '2019-12-09 20:44:37', '2019-12-09 13:44:45', 'FALSE'),
(29, 9, 'rolespermissions', 'update_permissions', 'update-permissions', 'Update Permissions', '', 1, '2019-12-09 20:45:38', '0000-00-00 00:00:00', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_group`
--

CREATE TABLE `permissions_group` (
  `idpermissions_group` int(11) NOT NULL,
  `permissions_groupname` varchar(100) NOT NULL,
  `display_icon` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions_group`
--

INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `created_date`) VALUES
(1, 'Dashboard', 'icon-home4', 1, '0000-00-00 00:00:00'),
(4, 'Users', 'icon-users4', 1, '0000-00-00 00:00:00'),
(8, 'Reports', 'icon-graph', 1, '2019-12-09 20:18:54'),
(9, 'Roles & Permission', 'icon-key', 1, '2019-12-09 20:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_dept`
--

CREATE TABLE `rbac_dept` (
  `iddept` int(5) NOT NULL,
  `deptname` varchar(100) NOT NULL,
  `background_class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `rbac_dept`
--

INSERT INTO `rbac_dept` (`iddept`, `deptname`, `background_class`) VALUES
(1, 'Administration & General', 'bg-blue'),
(2, 'Accounting', 'bg-brown'),
(3, 'Front Office', 'bg-violet'),
(4, 'Food & Beverage', 'bg-green'),
(5, 'Human Resource', 'bg-grey'),
(6, 'Housekeeping', 'bg-indigo'),
(7, 'Engineering', 'bg-teal'),
(8, 'Sales & Marketing', 'bg-danger'),
(9, 'Information Technology', 'bg-slate'),
(10, 'Kitchen', 'bg-orange');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_users`
--

CREATE TABLE `rbac_users` (
  `iduser` int(11) NOT NULL,
  `iddept` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(1) DEFAULT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbac_users`
--

INSERT INTO `rbac_users` (`iduser`, `iddept`, `user_name`, `user_email`, `user_password`, `user_level`, `user_status`) VALUES
(33, 9, 'Eryan Fauzan', 'eryan@gmail.com', '4ec844dae165816ebad5cb5ed77840e2484047d6', '1', 1),
(93, 9, 'Superadmin', 'superadmin@admin.com', '889a3a791b3875cfae413574b53da4bb8a90d53e', '1', 1),
(94, 9, 'Manager ACL', 'manager@admin.com', '1a8565a9dc72048ba03b4156be3e569f22771f23', '2', 1),
(95, 9, 'Staff ACL', 'staff@admin.com', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idroles` int(5) UNSIGNED NOT NULL,
  `roles_name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idroles`, `roles_name`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Superadmin', 1, '0000-00-00 00:00:00', '2019-12-07 10:59:49'),
(2, 'Manager', 1, '0000-00-00 00:00:00', '2019-12-07 10:59:53'),
(3, 'Staff', 1, '0000-00-00 00:00:00', '2019-12-07 10:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` bigint(20) NOT NULL,
  `idroles` int(11) NOT NULL,
  `idpermissions` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES
(623, 4, 2, 1, '2019-12-09 15:51:16', '2019-12-09 08:51:16'),
(624, 4, 5, 1, '2019-12-09 15:51:16', '2019-12-09 08:51:16'),
(625, 4, 3, 1, '2019-12-09 15:51:16', '2019-12-09 08:51:16'),
(701, 1, 2, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(702, 1, 27, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(703, 1, 23, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(704, 1, 7, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(705, 1, 25, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(706, 1, 17, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(707, 1, 12, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(708, 1, 9, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(709, 1, 21, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(710, 1, 15, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(711, 1, 26, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(712, 1, 24, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(713, 1, 13, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(714, 1, 10, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(715, 1, 22, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(716, 1, 6, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(717, 1, 28, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(718, 1, 14, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(719, 1, 11, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(720, 1, 8, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(721, 1, 29, 1, '2019-12-09 20:46:48', '2019-12-09 13:46:48'),
(722, 2, 2, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(723, 2, 27, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(724, 2, 23, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(725, 2, 7, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(726, 2, 25, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(727, 2, 21, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(728, 2, 26, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(729, 2, 24, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(730, 2, 22, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(731, 2, 6, 1, '2019-12-09 21:03:32', '2019-12-09 14:03:32'),
(732, 3, 2, 1, '2019-12-09 21:03:49', '2019-12-09 14:03:49'),
(733, 3, 27, 1, '2019-12-09 21:03:49', '2019-12-09 14:03:49'),
(734, 3, 7, 1, '2019-12-09 21:03:49', '2019-12-09 14:03:49'),
(735, 3, 25, 1, '2019-12-09 21:03:49', '2019-12-09 14:03:49'),
(736, 3, 26, 1, '2019-12-09 21:03:49', '2019-12-09 14:03:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`idpermissions`),
  ADD KEY `idpermissions_group` (`idpermissions_group`),
  ADD KEY `code_method` (`code_method`),
  ADD KEY `status` (`status`),
  ADD KEY `code_url` (`code_url`),
  ADD KEY `code_class` (`code_class`);

--
-- Indexes for table `permissions_group`
--
ALTER TABLE `permissions_group`
  ADD PRIMARY KEY (`idpermissions_group`),
  ADD KEY `permissions_groupname` (`permissions_groupname`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `rbac_dept`
--
ALTER TABLE `rbac_dept`
  ADD PRIMARY KEY (`iddept`) USING BTREE;

--
-- Indexes for table `rbac_users`
--
ALTER TABLE `rbac_users`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `iddept` (`iddept`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idroles` (`idroles`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `idpermissions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions_group`
--
ALTER TABLE `permissions_group`
  MODIFY `idpermissions_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rbac_dept`
--
ALTER TABLE `rbac_dept`
  MODIFY `iddept` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rbac_users`
--
ALTER TABLE `rbac_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
