

DROP TABLE IF EXISTS `mpmc_activity_logs`;
CREATE TABLE IF NOT EXISTS `mpmc_activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(30) NOT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;



INSERT INTO `mpmc_activity_logs` (`id`, `user_id`, `activity_type`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'login', '103.168.207.238', '2023-12-09 03:32:33', '2023-12-09 03:32:33'),
(2, 1, 'logout', '103.168.207.238', '2023-12-09 09:48:23', '2023-12-09 09:48:23');


DROP TABLE IF EXISTS `mpmc_categories`;
CREATE TABLE IF NOT EXISTS `mpmc_categories` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;


TRUNCATE TABLE `mpmc_categories`;

INSERT INTO `mpmc_categories` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Rebar or Rod', 3, '2024-01-03 12:45:47', '2024-01-03 04:45:47'),
(2, 'Cement', 3, '2024-01-03 12:45:59', '2024-01-03 04:45:59');



DROP TABLE IF EXISTS `mpmc_departments`;
CREATE TABLE IF NOT EXISTS `mpmc_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;



INSERT INTO `mpmc_departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Human resources department(HR)', '2024-01-03 12:44:20', '2024-01-03 12:44:20'),
(2, 'Finance and accounting department', '2023-10-17 15:21:30', '2023-10-17 15:21:30'),
(3, 'Civil Engineering Department', '2024-01-03 12:45:06', '2024-01-03 12:45:06'),
(4, 'IT', '2023-10-17 16:20:52', '2023-10-17 16:20:52');

DROP TABLE IF EXISTS `mpmc_password_resets`;
CREATE TABLE IF NOT EXISTS `mpmc_password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;



DROP TABLE IF EXISTS `mpmc_permissions`;
CREATE TABLE IF NOT EXISTS `mpmc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;



INSERT INTO `mpmc_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES


(1, 'Create User', 'This permission allows the user to create new user accounts within the system.', '2023-12-10 17:27:24', '2023-12-10 17:27:24'),
(2, 'Manage User', 'Users with this permission can oversee and control various aspects of user management, such as assigning roles, updating profiles, and handling permissions.', '2023-12-10 17:27:14', '2023-12-10 17:27:14'),
(3, 'Edit User', 'Users with this permission can modify the details and settings of existing user accounts.', '2023-12-10 17:26:50', '2023-12-10 17:26:50'),
(4, 'Show User', 'This permission grants the ability to view the details and information of user accounts.', '2023-12-10 17:26:35', '2023-12-10 17:26:35'),
(5, 'Delete User', 'Users with this permission can delete user accounts from the system.', '2023-12-10 17:26:18', '2023-12-10 17:26:18'),
(6, 'Manage Roles', 'Roles Manages', '2023-12-08 22:56:45', '2023-12-08 22:56:45'),
;


DROP TABLE IF EXISTS `mpmc_roles`;
CREATE TABLE IF NOT EXISTS `mpmc_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `permission_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;



TRUNCATE TABLE `mpmc_roles`;

INSERT INTO `mpmc_roles` (`id`, `name`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 1, '2023-12-09 00:38:17', '2023-12-09 00:38:17'),
(2, 'Admin', 1, '2023-12-09 00:55:29', '2023-12-09 00:55:29'),
(3, 'User', 1, '2023-12-09 01:25:07', '2023-12-09 01:25:07');


DROP TABLE IF EXISTS `mpmc_role_permissions`;
CREATE TABLE IF NOT EXISTS `mpmc_role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`)
) ;





INSERT INTO `mpmc_role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-09 00:38:17', '2023-12-09 00:38:17'),
(2, 1, 2, '2023-12-09 00:38:17', '2023-12-09 00:38:17'),
(3, 1, 3, '2023-12-09 00:38:17', '2023-12-09 00:38:17'),
(4, 1, 4, '2023-12-09 00:38:17', '2023-12-09 00:38:17'),
(5, 1, 5, '2023-12-09 00:38:17', '2023-12-09 00:38:17'),
(6, 2, 1, '2023-12-09 00:39:28', '2023-12-09 00:39:28'),
(7, 2, 2, '2023-12-09 00:39:28', '2023-12-09 00:39:28'),
(9, 2, 5, '2023-12-09 00:39:28', '2023-12-09 00:39:28'),
(10, 2, 3, '2023-12-09 00:55:29', '2023-12-09 00:55:29'),
(11, 3, 1, '2023-12-09 01:25:07', '2023-12-09 01:25:07'),
(12, 3, 5, '2023-12-09 01:25:07', '2023-12-09 01:25:07');



DROP TABLE IF EXISTS `mpmc_suppliers`;
CREATE TABLE IF NOT EXISTS `mpmc_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;


TRUNCATE TABLE `mpmc_suppliers`;


INSERT INTO `mpmc_suppliers` (`id`, `name`, `phone`, `email`, `company_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Aameir Alihussain', '+8802333360301', 'mail@bsrm.com', 'BSRM Corporate Office', 'Ali Mansion, 1207/ 1099, Sadarghat Road, Chattogram, Bangladesh', '2024-01-03 12:37:42', '2024-01-03 12:37:42');



DROP TABLE IF EXISTS `mpmc_teams`;
CREATE TABLE IF NOT EXISTS `mpmc_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);



DROP TABLE IF EXISTS `mpmc_uoms`;
CREATE TABLE IF NOT EXISTS `mpmc_uoms` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);



TRUNCATE TABLE `mpmc_uoms`;


INSERT INTO `mpmc_uoms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Piece', '2023-12-25 03:38:17', '2023-12-25 03:38:17'),
(2, 'KG', '2023-12-25 03:38:17', '2023-12-25 03:38:17'),
(3, 'Litter', '2023-12-25 03:38:17', '2023-12-25 03:38:17');






DROP TABLE IF EXISTS `mpmc_users`;
CREATE TABLE IF NOT EXISTS `mpmc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(80) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `department_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ;



INSERT INTO `mpmc_users` (`id`, `name`, `username`, `email`, `phone`, `address`, `password`, `role_id`, `status`, `department_id`, `photo`, `created_at`, `updated_at`) VALUES

(1, 'Mir Arman', 'CEO Director', 'mirarman123@gmail.com', '0165984875', 'Uttara-14', '$2y$10$HiCbbgHsYMTBhnqJxRzZP.gVHTJXl54N5ya441gaReX9qBTVtUpB2', 1, 1, 3, '8.jpg', '2023-12-20 10:41:18', '2023-12-20 10:41:18'),
(2, 'Zishan Mahmood', 'Head Of Department', 'zishanmahmood123@gmail.com', '01639854896', 'Gulshan-1', '$2y$10$kRQ2AY.6almClPV3m1y7pOrsPqTMFbCxDcea6xqKTCYHAPm07LFB6', 2, 1, 4, '9.jpg', '2023-12-20 10:56:01', '2023-12-20 10:56:01'),
(3, 'Emdadul Huque', 'Emdadul', 'emdadul123@gmail.com', '016589485596', 'Dhanmondi-27', '$2y$10$EUab6k82xwj633lqB4nn8.3dYnE1LDHk4LbxdswgLw/f9vRJxXGx.', 2, 1, 1, NULL, '2023-12-20 14:06:13', '2023-12-20 14:06:13'),
(4, 'Jannat', 'Jannatul Priyanka', 'jannatul15@gmail.com', '0136985455', 'Uttara-11', '$2y$10$C.Xm7iiVI7UsuXVChX9ivOHAqm1.v6mgA8PKo0GlwqCgxIwOe8Mta', 3, 1, 1, '6.png', '2023-12-09 12:52:51', '2023-12-09 12:52:51'),

(5, 'Tuhura', 'tahura', 'tahurin1922@gmail.com', '01684159493', 'Dhaka', '$2y$10$ldpEl6.DxEgyu32xLic4Ru16.uFo32Fk0RtLO.QnzgDl2gOdOP.SW', 2, 1, 6, '2.jpg', '2023-12-10 19:49:54', '2023-12-19 12:49:03'),

(6, 'Nishan Rohamn', 'Nishan', 'nishan1234@gmail.com', '01369857455', 'Mirpur-10', '$2y$10$CHFiF2IaH4ZUSdZjf4pNbOJK.EoyB9gxCgRT5gITk8S94mxtv409i', 3, 1, 4, '12.jpg', '2023-12-20 14:30:35', '2023-12-20 14:30:35');


ALTER TABLE `mpmc_role_permissions`
  ADD CONSTRAINT `mpmc_role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `mpmc_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mpmc_role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `mpmc_permissions` (`id`) ON DELETE CASCADE;
COMMIT;

