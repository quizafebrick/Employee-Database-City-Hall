/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `detailed_offices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` bigint unsigned NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gsis_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `philhealth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detailed_office_id` bigint unsigned NOT NULL,
  `link_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_link_token_unique` (`link_token`),
  UNIQUE KEY `employees_emp_token_unique` (`emp_token`),
  UNIQUE KEY `employees_employee_no_unique` (`employee_no`),
  KEY `employees_office_id_foreign` (`office_id`),
  KEY `employees_detailed_office_id_foreign` (`detailed_office_id`),
  CONSTRAINT `employees_detailed_office_id_foreign` FOREIGN KEY (`detailed_office_id`) REFERENCES `detailed_offices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `offices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `super_admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `super_admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, '@dminCHALL', '$2y$10$P5ROjS4sqC5AExhbu7j97OyV8CkrZVbAKy0uCyjdNwE98WZC0HN8C', '2022-07-18 11:00:24', '2022-07-18 11:00:24');


INSERT INTO `detailed_offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Office of the Mayor', '2022-07-18 11:00:24', '2022-07-18 11:00:24');
INSERT INTO `detailed_offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Office of the City Administrator', '2022-07-18 11:00:24', '2022-07-18 11:00:24');
INSERT INTO `detailed_offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Office of the Secretary of the Mayor', '2022-07-18 11:00:24', '2022-07-18 11:00:24');
INSERT INTO `detailed_offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Internal Audit Services', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(5, 'Barangay Secretariat', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(6, 'General Services Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(7, 'City Legal Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(8, 'City Development and Planning Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(9, 'Human Resource and Management Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(10, 'City Accounting Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(11, 'City Budget Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(12, 'City Assessors Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(13, 'Business Permint and Licensing Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(14, 'City Auditors Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(15, 'DPSTM', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(16, 'City Enviromental Management Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(17, 'Public Information Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(18, 'City Engineers Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(19, 'Office of City Building Official', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(20, 'City Legal Officer', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(21, 'Cultural Affairs and Tourism Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(22, 'Community Relations Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(23, 'Oversight Commitee for Brgy. Affairs', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(24, 'City Veterinarian', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(25, 'Parks Administration Services', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(26, 'Civil Registrar', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(27, 'Information Technology Development Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(28, 'Caloocan City Public Library', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(29, 'Caloocan Health Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(30, 'Caloocan City Medical Center', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(31, 'CCDRRMO', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(32, 'Office of the Senior Citizens Affairs', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(33, 'Peoples Law Enforcement Board', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(34, 'Sports Development Services', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(35, 'Labor and Industrial Relations Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(36, 'Social Welfare Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(37, 'Urban Poor Affairs Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24');

INSERT INTO `employees` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `home_address`, `birthday`, `contact_person`, `contact_address`, `contact_no`, `applicant_no`, `position`, `office_id`, `division`, `gsis_no`, `tin_no`, `philhealth`, `blood_type`, `detailed_office_id`, `link_token`, `emp_token`, `_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EMP-4c7v0', 'Kattie', 'Greenholt', 'Kautzer', '933 Cole Underpass\nKunzeberg, MT 96961-7781', '25/09/2002', 'Shemar Sipes', '4238 Bennett Islands Apt. 328\nBaileyland, MA 43910-7241', '16361306384', '21253555401', 'Dot Etcher', 8, 'Ohio', '42267807182', '959349651', '375163350820', 'B+', 36, 'Mu2hlDpCtAgNwmI9Ky7BPeACN7plkkGytRY0MjKaXh7d8JOdwR', 'GVuw4MT8WJl7rYPBhI3ZSMEbL', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL);
INSERT INTO `employees` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `home_address`, `birthday`, `contact_person`, `contact_address`, `contact_no`, `applicant_no`, `position`, `office_id`, `division`, `gsis_no`, `tin_no`, `philhealth`, `blood_type`, `detailed_office_id`, `link_token`, `emp_token`, `_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'EMP-8z2o5', 'Derick', 'Wiza', 'McLaughlin', '6467 Toni Rapids Apt. 955\nKilbackchester, OH 51197', '21/01/2020', 'Coralie Kub', '2759 Mattie Loop Suite 342\nKlockoshire, AZ 98239-4484', '13203461986', '00302171334', 'Ophthalmic Laboratory Technician', 3, 'New York', '41872980047', '321795616', '791134002322', 'B-', 12, 'OkiBNSRwfB5mgwMoceO9a0s0W6qyYapEcQw7U331seIaiCGc3B', 'iECTepOwiIsD2aIUKR8P9seUF', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL);
INSERT INTO `employees` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `home_address`, `birthday`, `contact_person`, `contact_address`, `contact_no`, `applicant_no`, `position`, `office_id`, `division`, `gsis_no`, `tin_no`, `philhealth`, `blood_type`, `detailed_office_id`, `link_token`, `emp_token`, `_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'EMP-6o9f6', 'Alec', 'Windler', 'Gorczany', '54754 Hyatt Underpass Suite 038\nTheafort, MN 16401-1596', '10/07/2002', 'Asia Dooley', '77549 Ettie Spring\nWest Leanneberg, VT 15923-8039', '17649591109', '91238274148', 'Automotive Specialty Technician', 23, 'Vermont', '85031814779', '505135385', '138766844074', 'AB', 19, 'zkpEkFsycl8EIGi1QtTww6beJJXRjy0KyUGGPTEhOSbSRTGMVl', 'PiQtYeHG2tRHLxwyMflepiM9T', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL);
INSERT INTO `employees` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `home_address`, `birthday`, `contact_person`, `contact_address`, `contact_no`, `applicant_no`, `position`, `office_id`, `division`, `gsis_no`, `tin_no`, `philhealth`, `blood_type`, `detailed_office_id`, `link_token`, `emp_token`, `_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'EMP-2l5r2', 'Arvel', 'Kuhn', 'Hayes', '7186 Mraz Way\nRutherfordhaven, AR 88918-4786', '14/06/2021', 'Mauricio Olson I', '7288 Oceane Course Apt. 347\nSouth Remingtontown, TX 24660', '58099511006', '59836853615', 'Soil Scientist OR Plant Scientist', 8, 'Kentucky', '89963008693', '426218052', '146240310233', 'B-', 1, 'JkqPB4gWhjpuxPhHOflUeM3F1xXAOj9d30ZEk3rlxKfKsCJh1e', 'k6jo8pJMTvnNhbQUhEh6d11y2', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(5, 'EMP-1w2j2', 'Salvatore', 'Terry', 'Bins', '77711 Cassin View Suite 589\nEast Justinetown, DC 06654-7170', '08/06/2022', 'Mrs. Heidi Hane III', '60809 Marielle Unions\nLabadieville, MD 13743-5165', '09000745292', '03030170745', 'Drywall Ceiling Tile Installer', 5, 'Delaware', '09293585037', '477480704', '785692186866', 'B-', 25, 'UVL8cYjJ3zUGKpAM1jBGKxTX1BlQKEIJoKgW2A1FazFKMwA7rH', 'RIslxsQmFiToVbx54CbkvYGOr', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(6, 'EMP-3l9n9', 'Icie', 'Gorczany', 'West', '2555 Hand Estate\nBaileyhaven, RI 40329', '10/03/2011', 'Emory Keebler', '4082 Adams Flats\nNorth Hettie, WV 80129', '99794926815', '33171620277', 'Healthcare', 23, 'North Dakota', '40113063946', '001788878', '348748774019', 'A+', 16, 'yLkIoCoZ6gHw8RjgPKfFcwb8G03yoIDbUigODaiRgNTLYHe3pp', 'JaGBQmrSIQF1JrDZzwtISxUDQ', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(7, 'EMP-6o4f5', 'Candido', 'Yundt', 'Zemlak', '13066 Skye Island Suite 180\nNew Kane, OH 38688', '07/01/1990', 'Dr. Deondre Little DVM', '2316 Deontae Stream Suite 121\nJordonbury, DE 79329-0965', '78032764684', '61800519928', 'Railroad Switch Operator', 18, 'Virginia', '52137154617', '698653976', '794671260314', 'A', 11, '5WisQYJPFsggYTyUNCkY9IafK1CNvNrb10hO1WBWouLfd8K1Ry', 'GUbLAkvwuuPx0ILZtQ0NOknxH', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(8, 'EMP-6b4p0', 'Tito', 'Legros', 'Bergnaum', '297 Russel Mission\nNew Idellaburgh, NE 72250-9145', '12/02/1996', 'Lulu Stoltenberg', '68192 Friedrich Drive Apt. 238\nSawaynmouth, NM 43738', '65372959474', '80723581082', 'Librarian', 1, 'Florida', '90537265816', '986960287', '728200589343', 'AB-', 7, 'Uh292RkHg3sXiwkYuZr1MvLlckoqL0iSgsDC3SiNe8LvSsNaLb', 'dti03az8oMYHex9Xvml50ecXW', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(9, 'EMP-1h3w2', 'Mallie', 'Funk', 'Smith', '7022 Mitchell Tunnel\nElizabury, SD 34066-5370', '22/06/2002', 'Mr. Lenny Hermiston', '3085 Deckow Locks Suite 605\nMilesside, WA 32096', '85120731600', '66409249544', 'Command Control Center Officer', 26, 'Virginia', '99004353082', '682644564', '887028949415', 'O-', 21, 'QWzwHudhyMiEFFea42cym6hPbr9DfgVhbgAl2QEAmAgiXktx0H', 'YuAHrFarVoN62fRy1vPcSHcYi', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(10, 'EMP-3x8g1', 'Asia', 'Parisian', 'Steuber', '93603 Lincoln Mews Apt. 547\nNew Unashire, VT 91688', '31/12/2021', 'Dr. Erin Schmeler DDS', '65856 Gorczany Shore\nEast Letitia, UT 59447-2762', '08762732796', '21646143552', 'Concierge', 26, 'Michigan', '43541986977', '089593684', '812304011667', 'A-', 1, 'zqa7IxCAWM6hIa2tzUiVmfIiD2pSYfyHGwUeUxsbkrheITsZgt', '0uIyn0JwrPpERBDBoXKWNWEy5', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(11, 'EMP-0i2r1', 'Hector', 'Medhurst', 'Hartmann', '16974 Fahey Garden\nManteshire, NM 42838', '13/01/1990', 'Lucio Price', '20868 Legros Plaza Apt. 499\nKossport, FL 43264', '21224358482', '23255999415', 'Adjustment Clerk', 29, 'Alabama', '68197994270', '102403203', '889032530695', 'B-', 20, '0smd1Se6eOoKZYY38euZq5B1f1xiKhJLBRoLQZSDiwwjKynfPq', 'f4SpQTvfD0drqUEH3B9dTuWOo', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(12, 'EMP-8k1n8', 'Jackie', 'Schuppe', 'Dietrich', '5250 Hintz Crest\nAlectown, WY 56550', '16/11/2002', 'Marlee Schiller', '896 Tillman View\nStarkton, NV 62563-7009', '36093455630', '29375626569', 'Massage Therapist', 9, 'Oklahoma', '20464858178', '296710349', '828959028311', 'O', 3, 'MuOlUxep5Iu5R2mkNyvVuqPKSIXF1Ar9Am8lCXTEjceEJTEO0v', 'agyaACtz50PP9zALEwQPxcek2', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(13, 'EMP-5r4u2', 'Melvina', 'Bauch', 'Franecki', '81291 Eichmann Courts\nFritzbury, WI 68652', '07/03/2000', 'Jessyca Hirthe', '15326 Blair Shoal Apt. 071\nWatsonport, TN 67206-3172', '61076197475', '99912908329', 'Electrical Parts Reconditioner', 12, 'New Hampshire', '49819835754', '903833816', '405591109510', 'A+', 16, 'yEOE8xheBFBRyxrj167SF3lOB75CXCZTqJ9LS0IKxQWqzto5pU', 'XXGumvTfKO4jl0B0k8iJJwn8l', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(14, 'EMP-5t0n9', 'Bulah', 'Renner', 'Beatty', '225 Stamm Mews Apt. 482\nHuelsmouth, MS 00065-5681', '29/03/2007', 'Hosea Schultz', '29790 Walsh Coves Apt. 124\nWindlerview, WY 40031', '83191102259', '05819129793', 'Night Shift', 20, 'New Hampshire', '58181888884', '209774867', '864935917687', 'O', 21, 'sEGEd2ORwAgxJCJV83EWnUHB4h0mZNXZeBTbdBjOLmUPFMHr2n', 'S3ylTTL6PEdKLhuorDSuf4YWy', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(15, 'EMP-2y4q7', 'Hilma', 'Shanahan', 'Bashirian', '21985 Gisselle Islands Suite 320\nEast Earlinechester, VA 88843', '19/07/2008', 'Mrs. Madge Stark', '2682 Wehner Course Suite 026\nVolkmanland, OH 02884-1960', '18410042931', '47925357024', 'Well and Core Drill Operator', 23, 'Arkansas', '98842788915', '343688972', '522653093986', 'AB', 20, 'CBoMdILUtVJfGIYOfSfBHtDCZ6Xf1zuqhtaR6nPteHi3L3Fnt7', 'LLWhPQkHznvuEKP41a4XZShrm', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(16, 'EMP-3h1j4', 'Keira', 'Jones', 'Marquardt', '9629 Birdie Forks\nPagachaven, OR 65562-1270', '02/12/1990', 'Jerrell Kerluke Jr.', '429 Simonis Forest\nLake Maegan, RI 38399', '29408788341', '22918548067', 'Restaurant Cook', 1, 'Alabama', '32776248610', '166719543', '554064902973', 'AB+', 7, 'o4fM160lSGt9Qdnx3HGuJY1POaeueCdEX28oE9LGY3hDsfOdjE', 'Ux1gAXqLA8N8nyoOI6HCrBaSl', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(17, 'EMP-1i8o3', 'Garrison', 'Schuppe', 'Skiles', '97533 Madeline Way Apt. 134\nLake Lorenzo, OR 20275', '04/10/2015', 'Prof. Darrell Towne', '317 Hayes Stravenue\nLakinport, MT 83556-1204', '98463125161', '41204124696', 'Medical Sales Representative', 8, 'Louisiana', '75565763762', '803119489', '685450586240', 'A', 37, 'piRXntnB2mk4Hm5rrlu6GFl7AXRj45vTV6Vy0I8m1cILQ1tuFr', 'qzvJbcM3q0zEcoQX0ywex3hSa', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(18, 'EMP-8m0r9', 'Caesar', 'Ebert', 'Mraz', '243 Johan Locks\nPasqualemouth, MA 28101', '22/11/1991', 'Ian Willms I', '74836 Mante Rapids Suite 176\nNew Edward, MT 57448-8510', '93481073495', '95990222361', 'Gas Appliance Repairer', 9, 'Maine', '60783742156', '531228135', '981903363101', 'O-', 25, 'Kn7jNMDrtrXrZ4raBe7BFS0jCK6OTBXkpdjCwgh4691ofdnrLa', 'aATdSkhirQgIAYYY2rfTLoWnj', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(19, 'EMP-7w0q6', 'Dangelo', 'Sipes', 'Douglas', '8559 Gusikowski Spur Suite 214\nNorth Audreybury, ME 07398', '11/08/2009', 'Dr. Micheal O\'Kon', '7202 Sammy Summit\nSouth Faustino, LA 96486-2822', '87224302016', '55922101427', 'Customer Service Representative', 34, 'South Dakota', '87636351548', '329911252', '437613729583', 'A+', 14, 'yagvQCH6DW80TFLGtt2EmXNCr0ncdctouVdv4emZHsbeSOOJcs', 'KaYIswNaxkLeRZiyu70uJlob3', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(20, 'EMP-0h1j7', 'Hellen', 'Doyle', 'Stoltenberg', '24440 Fay Plaza\nEdgarberg, SD 75966-8987', '07/04/2006', 'Felicita Wilderman MD', '4634 Lemke Square\nWest Domenicashire, OH 01645', '87895246678', '02184060601', 'Semiconductor Processor', 18, 'Vermont', '44704945306', '559151890', '272609608240', 'O', 33, 'UezfNY2P5xJ2b1IPLVXXOaHXDKoZLx0DTCmGofLGxqZSFc8S3Q', 'U5KkpMlDyJByciN8MhtxnVOLY', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(21, 'EMP-1y7r6', 'Judson', 'Nolan', 'Marquardt', '28215 Lindgren Ports Apt. 825\nNew Nicola, WV 85370-9528', '14/09/1990', 'Prof. Elliot Mante', '6058 Klein Parkways Apt. 758\nJayceview, NV 76600', '66974812374', '44990437886', 'Police and Sheriffs Patrol Officer', 27, 'Virginia', '86745893287', '614009252', '983110318784', 'A+', 37, 'ZjQ7hKzwmVcMo5T6ujS0KERbpDcoViKKiR9Xtx1v6hYHOUsBl9', 'iRZCG2U7CgbN9Bs4Yv10kXMvj', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(22, 'EMP-5f0y8', 'Eugenia', 'Morissette', 'Kuvalis', '30158 Camila Radial\nNikkistad, TX 54822-7303', '16/06/1996', 'Miss Alycia Kunde', '6118 Ondricka Forge\nNorth Maryjaneside, KS 24636-6462', '95248375855', '59917188863', 'CTO', 13, 'New Jersey', '44187810007', '274507254', '125834541301', 'B', 34, '8NdYXeRN59mJVT7VvSAI5URwMTGsKyFgcnukJuv1whbsatqXNL', '8urpQjsiwJzBkXf2oZeVXfXKV', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(23, 'EMP-3h9u4', 'Herminia', 'Gaylord', 'Haley', '980 Wendell Squares\nNew Juvenal, IN 77558', '16/05/2009', 'Dr. Joelle Williamson PhD', '45736 Fisher Garden\nMarksville, LA 17680', '73102887163', '15882381825', 'Drywall Ceiling Tile Installer', 4, 'New York', '68339330259', '756200614', '049554689476', 'A', 34, 'zGOyGNvvOjtwl4AQBstTcmMWwANyWsFR77qWeCJGLrtNTikKrJ', 'P6PHvpfcr3hva2jtoHFZygMGC', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(24, 'EMP-5v2f5', 'Dax', 'Howell', 'Waters', '11355 Vella Burgs\nPriceburgh, AR 22284-2165', '18/07/2018', 'Bernice Dach', '3355 Darius Pine Apt. 014\nSouth Dinamouth, IL 72707-1954', '89624905572', '75920967740', 'Cost Estimator', 29, 'Arkansas', '15699528638', '200053310', '325214713596', 'AB-', 4, 'Q47Xw9iJGEg1BmAC8m7DmK2UH8I6TP4ixXj0h4ggPFG9veOBYc', 'JRnCmh8XCuv2XzEc6Mwvr8xRj', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(25, 'EMP-8m5h2', 'Sylvan', 'Bechtelar', 'Stroman', '90330 Meaghan Lights\nMariahshire, LA 30215', '04/03/2008', 'Tyrell Smith', '90513 Antoinette Oval\nSouth Jakob, GA 10355-9574', '54026884766', '70347963158', 'Surgeon', 30, 'Mississippi', '38379619581', '541553866', '227373156565', 'AB', 31, 'Gjd7c9saIxOZHu2V0F2dBVnTUJh1jmKJ8tZJkNb2u0hscTPPHy', 'zWYygq3IX6oM0bnAi8B9NYZXP', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(26, 'EMP-0q6r4', 'Jenifer', 'Mayert', 'Veum', '58530 Minnie Harbor\nYvonneshire, NC 06498-7853', '04/03/1995', 'Mr. Edmond Willms', '33995 Prosacco Cliffs\nLake Geovanny, TX 74850-5345', '83342962603', '36400631595', 'Petroleum Engineer', 13, 'South Carolina', '99010791625', '464702261', '963184077936', 'B-', 13, 'cWIhcPu4VfnvN3KEd7MntUQnojeugDXLYe8Hb1UU3dwgvzB2vL', 'ChEzOrSAHhV6K3uznXZt2oIVG', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(27, 'EMP-2l7d9', 'Daisy', 'Kunze', 'Greenfelder', '516 Brooke Mountain\nPatsyville, DE 75926', '30/05/2007', 'Crystal Ritchie MD', '192 Gianni Knoll\nLake Mertieside, TX 72439-7464', '03477344043', '34579321228', 'Emergency Medical Technician and Paramedic', 10, 'North Dakota', '42929300491', '005367212', '430125711518', 'B-', 29, 'ed2vCogo5AM0JUOm9Z7cmvY9nX4OzvncOR3Kr7XSaMPTPFfrjP', '4Cjgc2nAzpxP9H2ccIwuahQsz', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(28, 'EMP-3i4l9', 'Mathias', 'Bartoletti', 'Brekke', '97597 Wisozk Plain Suite 568\nNew Napoleon, TN 90411', '14/04/2013', 'Jeanne Daniel', '8804 Kuhlman Freeway\nRempelchester, AZ 94218', '03131523017', '42907801279', 'Account Manager', 6, 'Pennsylvania', '50117215376', '956763354', '469186361622', 'O+', 9, 'ffIZj09a3mIJgW5nMdmrrRYOoYtNE8hzjAwWcDFjBBlMOoUod0', 'fpoNLlJyQhAmBnEMjeBti4n7g', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(29, 'EMP-6m7w8', 'Koby', 'Roberts', 'Marquardt', '5550 Batz Meadow\nLake Ruthie, NE 49456', '17/09/2009', 'Ms. Marlene McLaughlin', '6869 Maximilian Station Suite 011\nPort Owen, NH 90129', '86074047460', '02107060054', 'Athletes and Sports Competitor', 2, 'Montana', '60225004084', '255189559', '407613745846', 'O+', 7, 'txhaKM4h9ZQFmUaqHcg2uQaq7Sy0MMmUr8rijwt6wzGDTnSmM2', 'I14vMtxwVQZLeOAX54wh7qu7t', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(30, 'EMP-5t7y6', 'Sarah', 'Wolff', 'Williamson', '8107 Aron Crossing Suite 733\nEast Kennedifort, WY 99826', '20/10/2002', 'Dr. Heather Klocko V', '232 Bailey Corner\nKathlynmouth, NJ 34108', '95172652147', '86908980802', 'Archeologist', 36, 'Kansas', '51519445741', '057785420', '820150031690', 'B', 27, 'bojblJsQtMod2dnvac7PCKKQcIlEOQL078bYbAZQQRXlTOYEj1', 'h9OgmcMJkKWUbILs68WTMa8PP', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(31, 'EMP-4e2b1', 'Judd', 'Langworth', 'Hickle', '72274 Libby Roads\nEast Antoinette, MD 40582-1440', '09/02/1990', 'Eda Turner', '3817 Harold Fort Suite 514\nLake Vincentstad, CA 18308-1005', '28858502759', '31280486677', 'Gaming Cage Worker', 10, 'Wisconsin', '36435947765', '249150556', '905119756309', 'AB', 2, 'fhY9jB37Tmq8dzDJXftAnubK0ILbXquq60O8KZmjTbSvuhKogi', 'x7QjOl2qJrAn6OvxrnsEUp2Qq', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(32, 'EMP-6l1q8', 'Lydia', 'Schmitt', 'Sawayn', '380 Larson Grove Apt. 262\nPort Tremaine, VA 64237-0478', '24/11/2009', 'Miss Belle Hermann Jr.', '17008 Erna Estate Apt. 685\nNew Joe, GA 33804', '23752715218', '16232329108', 'Biological Technician', 19, 'South Carolina', '05238824316', '380680829', '580663468910', 'A+', 9, '9eXMqn6gmpDkPTOg53fpQLgqQq7S0rS92wQTxDXtWGJw2Q0e5E', 'WwQZajektRdLbHJcDPjUaFUOP', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(33, 'EMP-1h7d7', 'Colton', 'Bauch', 'Davis', '32196 Gorczany Key\nSatterfieldbury, MD 63053', '02/06/2021', 'Reyes Klein', '729 Janiya Centers\nPort Susana, IL 49435-9939', '83280011928', '80993099608', 'Commercial Pilot', 4, 'Tennessee', '30141316243', '449837884', '924845089046', 'B+', 34, 'BzTdQf4qQfB4eSPnYpcRwu7ceZeW3zjgfEKkuBeHxari0MSlci', 'vd8VYMjPMT6EAigtleCWAdnk7', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(34, 'EMP-7y6u1', 'Liliane', 'Price', 'Ebert', '281 Kristy Shore\nDestinyfort, MT 48443', '01/12/2007', 'Bernadine O\'Connell', '81400 Reba Ridges Suite 025\nLake Gilbertoport, KY 61988-8894', '15934025519', '66803845724', 'Railroad Inspector', 7, 'Missouri', '20412203341', '116754345', '239029623522', 'A+', 22, 'xqEg1uJ5tz7GwGbzZ0p3u58WXMR8HTxVVBXsDmmwvPb2fxLu4U', 'vn6vpEl3hRre5ZMn03HRvzR49', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(35, 'EMP-4z6d9', 'Nichole', 'Romaguera', 'Koch', '9993 Gaetano Bridge Apt. 330\nDennistown, MN 80978', '29/03/2022', 'Harley Wehner PhD', '39380 Sanford Greens Apt. 046\nEbertmouth, NY 87569-1755', '94576438490', '63631973612', 'Fire-Prevention Engineer', 29, 'Vermont', '44532797639', '481991084', '854993736553', 'A', 37, 'aj4SHFjlgn49dJmwkSkRHE5Tm9dMR1SdDuGEomsQ1uOI6f23wi', 'kExG5KbxGLePzj3f6ic00DLpW', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(36, 'EMP-5m8a5', 'Larissa', 'Larkin', 'Treutel', '3281 Wava Stream\nLeonoraside, ME 28860', '05/02/2014', 'Marianne Spinka MD', '255 Abigayle Center Apt. 585\nLeilamouth, WA 98665-0899', '29244295893', '37768498551', 'Forging Machine Setter', 11, 'Florida', '13767532764', '311349737', '363048699879', 'B', 24, 'IYKSVkxnUjYWxxhdEhLY5QxOnuoPfZ6CIsn3oiXdfOjEBXGY6E', 'CHgzANt88n4dkWvVWIOhNP1WA', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(37, 'EMP-2y8t6', 'Alayna', 'Rohan', 'Shields', '32214 Kovacek Branch Apt. 687\nShaniaberg, DE 13586', '15/04/2012', 'Alexzander Lemke', '152 Heller Street Suite 714\nNorth Caraville, CT 21464', '12007056423', '44516974756', 'Food Preparation Worker', 18, 'Maine', '54191548317', '292749448', '435866324949', 'AB-', 10, '0lPEdjQUJJwnkwVBCszKAX3hKSFGEHsDWT6lrOoaRdtkKoAHvL', 'iSFkQRzxrk7SCAIfvUatLciCX', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(38, 'EMP-7b8r5', 'Adrianna', 'Kunde', 'Rowe', '938 Kristoffer Walk\nNew Brandyn, MD 69900-3054', '21/06/1999', 'Stacey Rowe', '219 Kennedy Crescent\nIanhaven, WV 04868-0429', '36432417981', '35261554866', 'Command Control Center Officer', 10, 'Arkansas', '07285246561', '703597857', '831028129961', 'AB-', 35, 'KLMjyrdKVRuHXwUrMSsyMzXFYRboTYN6Dhlsf8kWIuqM4sQHgi', 'KRhK0EZvYROqL6qiCn2tSBN38', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(39, 'EMP-5a7z0', 'Marquis', 'Heller', 'Oberbrunner', '93744 Ruben Mountain\nNew Christy, ND 80920', '01/05/2007', 'Dr. Carmella Auer I', '1008 Quinn Alley\nPort Axelfurt, HI 92842', '25439927972', '15431273215', 'Rough Carpenter', 23, 'Rhode Island', '70321058272', '388838548', '421660194459', 'A', 27, 'xHfklVQ6Y3NgIBBsk7EA1x8pTqlkJafUvBPk7KZy3QLJUTq5cN', 'mVOLOjUfBiOXImVBZ2ArCbtvx', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(40, 'EMP-1n3a0', 'Alan', 'Baumbach', 'Dooley', '1986 Raul Inlet Suite 265\nFayburgh, TX 30939-8969', '30/01/2013', 'Presley Ullrich', '8108 Konopelski Junction Apt. 921\nNew Mireille, ME 75014', '95342802337', '82471948657', 'Travel Agent', 29, 'Maryland', '71775151448', '051581579', '062312422887', 'AB+', 9, 'DbPhAKgMNsQQGJStOntmQjy4l8wInu3f76Py2V5uBxvFCrKLZS', 'hENg7TP6nfWd12xZIz4CEWBMu', NULL, '2022-07-18 11:00:24', '2022-07-18 11:00:24', NULL),
(41, 'EMP-7n8k0', 'Maribel', 'Fritsch', 'Baumbach', '61689 Beier Road\nHaydenland, WV 05916-7714', '18/06/1995', 'Dr. Nikko Klocko', '79200 Carroll Street\nPacochashire, NC 01179', '48959843368', '48975210206', 'Purchasing Agent', 9, 'Colorado', '97266664738', '209653446', '687777995336', 'O+', 10, 'OHMAYgBcmpvD2m8S3ayke0VQh4s8al7CM0Y0aNQ2PIjbjFw9BN', 'MxN50QTo8S18uYosZHYGsI0Zn', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(42, 'EMP-9l5x3', 'Brionna', 'Considine', 'Nader', '1656 McClure Mountain\nVelmaton, UT 11734', '20/05/1998', 'Jarrett D\'Amore PhD', '5279 Marion Inlet\nPort Eliseview, CO 94620-0499', '53386261650', '44726685962', 'Electric Meter Installer', 4, 'Maryland', '33197092719', '613602011', '021508518697', 'AB', 9, 'S86zEkf7JM2HnzihWSJ4Mud435NX0fSG8WNMkQztKpHFdStvX2', 'sMKXxdEJym6woqhDmYp2cQcDK', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(43, 'EMP-6u1z6', 'Vernie', 'D\'Amore', 'Walsh', '1608 Dietrich Crescent Suite 813\nStiedemannborough, ID 52135-5108', '18/08/2003', 'Cicero Douglas', '228 Demond Forges\nJodyview, WV 59810', '83718805163', '68797820944', 'Spraying Machine Operator', 26, 'Rhode Island', '67169844021', '867844141', '376539933483', 'B', 29, 'wOXPVuyI329b2woDHeAkLTMQR70A2wET6HMfkkNOuG9yZneQLr', 'vJTjPsNazs9D9HutMocyengvI', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(44, 'EMP-4r5h4', 'Granville', 'Howe', 'Stehr', '7564 Luettgen Stream\nGabeview, PA 48929', '24/05/2010', 'Judge Koepp', '39743 Klocko Estates Suite 055\nEast Halie, GA 15586-9769', '77651853122', '97444194728', 'Cartographer', 31, 'Wisconsin', '48491983242', '131827557', '966900436391', 'A+', 9, '9wDLUmthxodBBdZ8nohyx9ybSyfRZN8ju1LyEZvtwuYtzbhUc0', 'TMOjR2SuwwycYl8z8JrPz6brv', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(45, 'EMP-1m7a6', 'Fleta', 'Waters', 'Lindgren', '420 Luettgen Skyway\nRyanland, OK 75389-8666', '29/06/2005', 'Daisha Langosh', '5860 Vincenza Squares Apt. 433\nLake Raymundostad, WI 11974-4710', '03458782248', '17609972589', 'Pharmaceutical Sales Representative', 2, 'Arizona', '32280589296', '482808913', '454847502539', 'O', 3, 'aO8dMAf1CitxTvsLw3vJ8L4b8YPfMuAgBxmq3Xc7ncGTscIrRI', '1Qm7IPQ8OOAPXwf9qMgi2x4PF', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(46, 'EMP-1w6y0', 'Clare', 'Volkman', 'Effertz', '2145 Jarrett Haven Suite 907\nSouth Jessyside, NH 20574-6619', '18/07/2020', 'Kurt Kunze', '7463 Rodriguez Knoll\nJonbury, SC 26299', '37418585027', '40594552075', 'Correctional Officer', 31, 'New Hampshire', '09915805967', '862282819', '739444435855', 'B-', 9, 'FkimMLvgWIGxfXrbVZFHBY0FdkSljJ7sPX9lbonXHcZMYNP5XP', 'YB4kkl9kuloCskPDfojMxX8KQ', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(47, 'EMP-2n3o8', 'Destin', 'Price', 'Dach', '284 Myra Trail Suite 912\nNorth Jonathon, NJ 71303-6704', '15/10/1997', 'Emiliano Jacobi', '14731 Jayda Inlet Suite 267\nWeimannside, VT 55611', '11981597971', '70814008413', 'Motor Vehicle Operator', 35, 'Connecticut', '40603398978', '309869653', '258155187349', 'AB+', 2, 'U1B1a29puL3RS3nXYWBY0sr1RslsfXd9fIa0a0J3eqds48j481', '7SUt9dQwv7AX1zPkLuuq9jfrB', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(48, 'EMP-8q7d2', 'Cesar', 'Leuschke', 'Wintheiser', '25238 Simonis Lodge\nBrakusfurt, CO 94485-9811', '30/06/2015', 'Matteo Rodriguez', '311 Araceli Branch\nLenoraburgh, NH 43347', '64901391698', '84521916251', 'Farm Equipment Mechanic', 1, 'New Hampshire', '44343267127', '645938229', '287899391419', 'O+', 25, 'z2fMC78asIWxAazS3l9zi5HlV3sIcBLDP1lLCuCDFRYbJWgJZh', 'YOOIVYuEQZd5KskVCCqtpvRsb', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(49, 'EMP-5u2e7', 'Sigurd', 'Grant', 'Kshlerin', '28629 Gaylord Expressway\nNew Talia, HI 13360-3276', '30/03/2018', 'Keagan Gulgowski', '6072 Kris Rue Suite 627\nEast Terence, AK 40549', '86835161849', '14798628577', 'Reporters OR Correspondent', 36, 'Michigan', '58232858760', '650232368', '229900245794', 'A-', 25, 'WKlQ7YY38hWX72OkSKdv2IezFZtz3T12DztOvBKnXhz49MYkNP', 'CGsMt9X97rS7HDHQRlD17dlkw', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(50, 'EMP-4x9h3', 'Luigi', 'Batz', 'Abbott', '6763 Schinner Terrace Suite 195\nEmeliefort, GA 36445', '11/08/2009', 'Gussie Donnelly IV', '1003 Adolphus Course\nKamilleborough, CA 64977-6727', '29082855369', '31300920471', 'Oral Surgeon', 3, 'Montana', '84947781678', '938651400', '458988157111', 'B', 17, 'mB8PjyQWCOldvR4mUXj0Z4GHQTBehYL2Tgu6opg29GIiqaxGjx', 'TtmnhkcQewHwrKaUFoLI1qaLy', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(51, 'EMP-4w1f7', 'Tressie', 'Abernathy', 'Becker', '182 Ryan Corner Suite 147\nHestermouth, IA 06266', '21/03/2014', 'Jennie Ritchie', '1416 Reinger Ridges Apt. 302\nEast Dasiamouth, KS 32062', '24928595983', '17705716699', 'Product Management Leader', 19, 'Delaware', '61605428031', '324953474', '677228815871', 'O-', 16, 'wmZtmg1cFhiEnmVyVBsTyNzcWtBwwj7BLQeAWHFTI9d1PXSpsk', 'wQmukbyNC4eTLhw752fErnUnq', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(52, 'EMP-7c8x1', 'Hillary', 'Hansen', 'Swift', '3047 Hodkiewicz Court Suite 225\nPort Cassidy, SD 39532-9324', '30/06/1990', 'Shany Volkman I', '55777 Mosciski Bypass Apt. 658\nSouth Timmothyfort, AZ 14938', '29793973248', '93920363877', 'Insurance Appraiser', 18, 'South Dakota', '72768570240', '959057079', '339785567543', 'AB-', 29, 'hIRtNzagNszjVaNzjmGJYOEOqbAZYUDji4wrOeMyhIS8J52eGC', 'Bzwcb58YYQYvneUNX0Or3azxg', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(53, 'EMP-4u9h7', 'Willa', 'Hahn', 'Ebert', '87142 Gerry Parkway\nJanetfurt, AZ 73030', '02/12/2017', 'Evans Waelchi', '8642 Farrell Expressway\nRachelview, GA 14257', '76791261778', '57384731943', 'Storage Manager OR Distribution Manager', 9, 'Wisconsin', '73940650168', '344213716', '478610388556', 'A-', 36, '5hcYsiSTiyNbJkhfGndzGynE8oxdgTltmM63RIHZ4F0s7syGXP', 'Z8CEV1Y4zVPFGeMcvVK2QxR3t', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(54, 'EMP-8x3o7', 'Courtney', 'Hill', 'Lemke', '56448 Susan Glen\nLangoshville, MA 62959', '20/07/1990', 'Vanessa McClure', '55300 Karl Wells Apt. 410\nLake Anne, KY 47226-3553', '47122413971', '79710256135', 'Hand Trimmer', 5, 'West Virginia', '50252045544', '126197143', '088182141203', 'B', 8, 'XAl89NPKjA17h559jsD9JztDt5f3yzcYMdAJ9XYqrVza5bDXE6', 'wjK874RqYgWms4nd4fgWcKD3X', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(55, 'EMP-2k0r8', 'Ozella', 'Beier', 'Torp', '165 Brown Cliffs Apt. 087\nCrooksfurt, MS 29295', '23/01/2016', 'Veronica Deckow I', '2243 Jeremy Isle\nLake Willyville, LA 14806-9353', '07062647239', '81238313153', 'Library Science Teacher', 16, 'Florida', '31874328809', '641585979', '768231110904', 'B+', 3, 'QE19BwkVAdi1eay87GzNBtGKpPg7tWj12LtNRJurkmKPRdhDJ5', 'ne2MA23DBQulp2psbqi8DCmmC', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(56, 'EMP-2w7l3', 'Holly', 'Hahn', 'Wehner', '5389 Rogahn Green Apt. 361\nParkerview, MI 02033-9665', '13/06/2010', 'Prof. Josefa Schroeder', '67203 Kerluke Common Suite 313\nFeestfurt, FL 90610', '06506215533', '29331435155', 'Chemical Equipment Controller', 17, 'District of Columbia', '02884419076', '735131966', '160166044229', 'O-', 25, 'VbK1e8ndDXLgpDMqROMUht6vIegtJHYpd76IXCDU4DQZWojV8r', 'w6n3bUB2gTnh1qTAZaw7HcGr7', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(57, 'EMP-2h3a2', 'Kyleigh', 'Thompson', 'McLaughlin', '3828 Alec Rapid\nNew Jon, AZ 06686-2034', '02/01/2017', 'Darrin Ritchie', '7406 Walter Plains\nNew Judsonberg, MN 80014-3762', '98471088123', '08305498479', 'Advertising Sales Agent', 21, 'Vermont', '84173362899', '716064454', '966422204473', 'A+', 2, 'BDYFXZPoudJlwdqRkDRZi0A98McqJDNUkESObIlwDzeY05Bw1r', '6s9uy3EsDWGhaTVbZUyG9BvOU', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(58, 'EMP-0f6v8', 'Jaquelin', 'Kunde', 'Blick', '9829 Gerhold Well\nLake Ricardofurt, UT 08254', '07/09/1995', 'Talon Bode DVM', '636 Anthony Hollow Apt. 866\nPort Elissa, AZ 13961-5464', '79081470226', '70148188520', 'Sales and Related Workers', 33, 'Rhode Island', '40514887108', '886641605', '406815187693', 'A-', 24, 'KXmuAuWzn2pHjuNX0Jh2n0nXcmtychK1ZxokdL9tevPiC2MJLu', 'wmk0cni18f9lqfifCIpMFAnaq', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(59, 'EMP-8f4t2', 'Dewayne', 'McKenzie', 'Kris', '573 Norwood Lane Apt. 291\nFisherchester, MA 04842', '24/03/2002', 'Mrs. Mina Kertzmann PhD', '430 Conner Neck\nStephenberg, IA 34849', '34621516424', '54929818267', 'Gas Pumping Station Operator', 29, 'Nebraska', '43266493129', '562092807', '796135925660', 'AB-', 28, 'DNweJWVkh9eSxpHBDcmJKXeYYVRuzl2qbVTnbGXyy0TzWOR1AB', 'wtx3GFL4JEwhebH0owgynVpqd', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(60, 'EMP-0w7r3', 'Joanne', 'Kemmer', 'Dare', '4751 Sporer Squares\nHahnfurt, IN 01640-7320', '20/06/2019', 'Dr. Eddie Runolfsson', '41392 Gulgowski Coves Apt. 236\nLake Ernaburgh, VA 07965-9456', '20397868850', '76133393128', 'Surgical Technologist', 22, 'Massachusetts', '05545394488', '493797851', '857668167817', 'O-', 2, 'ZsfN6UWZbdw3dELQTIHXDFohGrJmGkixEEQw2oppkTjAS64BJD', 'VW8Lf3wenYRLkyabhvs7zkN1k', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(61, 'EMP-1o3p9', 'Manley', 'VonRueden', 'Block', '70019 Tate Parkways Suite 714\nKaitlynton, KS 90877-3715', '07/06/2013', 'Nick Predovic', '7156 Emilie Haven\nSouth Devonteton, IN 83060', '35718973813', '65870005967', 'Obstetrician', 17, 'Idaho', '08310372474', '211295658', '574773547657', 'O+', 5, '4nloZvB42jr27DEyNJj4yjzyceLcGEBSSwkdqkbTX5dGdWIZqY', 'KL0na0EkCfA4UTNhkn97xko82', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(62, 'EMP-1f3c7', 'Clara', 'McKenzie', 'Schaden', '70424 Ervin Dale Suite 442\nPort Douglas, NE 47625', '27/11/2017', 'Dave Zboncak', '8889 Daniela Heights Suite 027\nPort Breannestad, DE 36184-0961', '23342467839', '71799570975', 'Petroleum Technician', 4, 'Nevada', '67364709316', '871446803', '798593525548', 'B-', 26, 'Zs6MdRCOBXntzosLM88CiqdCu68hHfkdHYqJfy6IWvkINry1of', 'RyHy8aX0a7oehkjaBVnimNwll', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL);
INSERT INTO `employees` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `home_address`, `birthday`, `contact_person`, `contact_address`, `contact_no`, `applicant_no`, `position`, `office_id`, `division`, `gsis_no`, `tin_no`, `philhealth`, `blood_type`, `detailed_office_id`, `link_token`, `emp_token`, `_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(63, 'EMP-8v0i4', 'Celia', 'Hansen', 'Wisoky', '85884 Mayer Cliffs\nGislasonview, RI 14903-2683', '08/04/1995', 'Quinten Farrell', '6694 Ward Drive\nJasthaven, OH 61619-6376', '54806760127', '49077781733', 'Marking Machine Operator', 5, 'Nevada', '02823388349', '453202403', '894115508891', 'B', 1, 'Kd7CZHRlH26PVhU0fm0Mh4fzA8jvtQ69Vv7Q75yUlBgOh2dOSN', 'dImKN8LISgxxZtBoIohH6yEM4', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(64, 'EMP-8h3r8', 'Darian', 'Prosacco', 'Kautzer', '935 Stacey Ferry Suite 984\nWest Else, PA 87722-5775', '22/03/2016', 'Benedict Dach', '3001 Schumm Freeway\nDarrelburgh, DE 66804-2127', '14195544147', '14921220457', 'Bridge Tender OR Lock Tender', 5, 'Alabama', '38513473151', '309358015', '495018279682', 'AB+', 29, 'Kd9TeR46zKKpgn9zR18nwgEJgw9jBfO0HQHQ1acBEqBkM3syu9', 'TMyOqzLn0Rsfk3q9LT2B3ahSl', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(65, 'EMP-8b7v0', 'Ervin', 'Thiel', 'Kshlerin', '992 Yundt Drives Suite 376\nJohnsonbury, NE 14455-3064', '24/03/2014', 'Prof. Kylie Jast DDS', '5263 Jacky Light\nSchummchester, MO 48599', '36708537997', '24173033898', 'Cafeteria Cook', 9, 'Oklahoma', '16513269833', '166892152', '710464944475', 'O', 30, '6i21dVBSiPqabxo4GpAa1A1mV7BSmUpAqa0LTuDV7NRlkkx5ev', 'SnfvJ8nGjTMopVwStKuFt7Htb', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(66, 'EMP-3o0q2', 'Lorenz', 'Krajcik', 'Stark', '807 Virgie Tunnel Suite 556\nMagdalenville, PA 99990-8393', '25/12/2014', 'Prof. Hannah Legros', '421 Lew Lock Apt. 237\nEast Roscoetown, LA 49181-5937', '02936969698', '74694242954', 'Electrical Parts Reconditioner', 9, 'Mississippi', '71330956455', '421271159', '725396248704', 'O-', 5, 'JSLDkIq9nGZzDsq6f2UqKMtBa1cFKSgMiHdt3DdfwOOh03nSwM', 'NBV2ZtvYdytHR7dsQARlVn7ph', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(67, 'EMP-5w3w6', 'Alexandrine', 'Homenick', 'Steuber', '55188 Emerald Cove\nWest Verniefurt, ID 06044', '18/01/1993', 'Mr. Colby Ratke', '125 Rosalyn Flat Suite 899\nNorth Addietown, SC 54604-3854', '70834758845', '15489722923', 'Statement Clerk', 19, 'New Hampshire', '93208832650', '618075671', '275670205601', 'O+', 9, 'dWRmtfBFvUtdwpTZAeuQIO8JPgcoEonG5NVp0YmZz95AFdn8Bk', 'S5lUcmF1lrtfiioWAuVZvsnGd', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(68, 'EMP-8a9z8', 'Theodora', 'Langworth', 'Cruickshank', '957 Koby Meadows\nAntoniettaport, MS 49311-1263', '12/05/2000', 'Noelia Williamson IV', '9947 Grady Place\nWest Samaraside, HI 58658', '87302489946', '96713693559', 'Pewter Caster', 28, 'Connecticut', '70683015141', '780637583', '071622781319', 'B-', 36, 'OS3tBh77XIzdb3UusuZmHhfyrDI2hOLWLUHesqXim6VX4HWZhj', 'Tto45eWCE9VyBjS848zfIrPwQ', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(69, 'EMP-7r8o5', 'Demarco', 'Wehner', 'Kuhn', '37881 Kobe Circle Suite 449\nPort Madisen, DC 00537-7862', '06/11/2013', 'Modesta Graham', '6582 Queenie Hill Suite 856\nPort Colefurt, MD 80372-0929', '17230611075', '94657727015', 'Custom Tailor', 21, 'Connecticut', '15668251685', '860731599', '078861994182', 'B', 25, 'Q8nrhSNU1Gx5ABhQnd7pvhOLGwzHF79eoiOv0JkTeJzUyWnm0S', '2tc0y6MUNs1rKRc4p7UiXHWSO', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(70, 'EMP-6c1l2', 'Osbaldo', 'Howell', 'Prosacco', '6134 Homenick Hill\nMannmouth, WI 88470-5170', '24/05/2021', 'Humberto Dicki', '103 Schoen Extensions Apt. 023\nSouth Brittany, GA 65546-9667', '03553497738', '06031428706', 'Anthropologist', 12, 'Alabama', '18352462067', '392302187', '740110474138', 'AB+', 37, '7XOfFw5ry8xO4nXHP97px4Zebtvwt2NoGAik82YScJp2PGpykp', 'qn6qqcbZ57zB5W1L63QTjLCoa', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(71, 'EMP-2m3p7', 'Willa', 'Dooley', 'Spencer', '6249 Schimmel Locks Suite 565\nNorth Brendenmouth, OH 20709', '24/04/1994', 'Omer Hermiston DVM', '90594 Brannon Isle\nNorth Jaquanmouth, AL 34534', '12011806067', '11388812267', 'Command Control Center Officer', 27, 'West Virginia', '38934344461', '406491538', '552905658275', 'B+', 3, 'b212WGFYnV3MH65O8XkY9wfZYCNXEGEFVkaDci09UKtX6ksmIi', '6POLEvjh9cHK1pidol7VXxsdu', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(72, 'EMP-7d1w4', 'Melody', 'Casper', 'Douglas', '33565 Borer Ranch Suite 620\nNew Manley, NH 87186', '15/10/1997', 'Freda Ward III', '6686 Serena Streets\nChelseybury, OK 22127', '99961713778', '86404003291', 'Freight Inspector', 26, 'West Virginia', '54610690661', '754052469', '008701845959', 'AB', 32, '5vRzC3w0M2xJ3cWFyCbUIOcg0Ll6UwqUQlf0RNdR5UYlmS2Fhq', 'Kpm9UPZRD391957xID15X7eeE', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(73, 'EMP-4e0s1', 'Marley', 'Lakin', 'Dietrich', '134 Durgan Mount Apt. 732\nVelmaburgh, AR 94291', '09/04/1993', 'Dr. Ellis Grimes III', '582 Mann Islands\nSouth Germanfort, AZ 16831-1228', '57179558478', '12952927334', 'Scanner Operator', 26, 'Wyoming', '09013168467', '435866392', '980173936770', 'AB+', 36, 'bwdNqEyEtfbikFgPAGflKCrExVEZbDuzb75hMWCmq0wzG7gJYr', 'zWdsI9rHmbzpQbF0V74Onl0kq', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(74, 'EMP-0z8l6', 'Vernie', 'Bruen', 'Schinner', '76318 Braun Terrace\nPort Haleymouth, OR 71648-1075', '29/08/1996', 'Prof. Dorthy Kuphal', '66230 Myrtis Crest Suite 324\nPort Gladyce, MD 03500-4276', '31931599550', '27584675524', 'Lay-Out Worker', 36, 'Iowa', '38827764117', '960055649', '088383649186', 'A+', 17, 'DzPqPc9t36rqqgOqoLWcNkTlelTAhDA9DfaCyQKkq2KKyf4JxW', 'lZjDJk03qON3MSclkrU7roIln', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(75, 'EMP-1v0l3', 'Hubert', 'Hodkiewicz', 'Hintz', '90187 Trantow Orchard\nLake Trentonhaven, UT 34027-9148', '24/01/1999', 'Ella Schmeler', '7845 Kuphal Parkways Suite 731\nKarsonton, SC 51113', '27302666870', '36687961894', 'Industrial Machinery Mechanic', 2, 'Oklahoma', '25355323154', '829219385', '619954487853', 'AB+', 37, 'ZqXX8HuG49Zh9OjFb8FXqN8SOc0OPdcJPTuja5vxalipqsHkH0', 'PEjUiKD5XB454S0jysluSxzy4', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(76, 'EMP-0t1y2', 'Hallie', 'Leffler', 'Hintz', '625 Kertzmann Meadows Apt. 299\nEast Sabrinamouth, OH 84272-1392', '04/03/2019', 'Dr. Easton Waters', '522 Huels Islands\nFletcherstad, MO 20090', '75437150262', '79734145597', 'Purchasing Agent', 24, 'Mississippi', '69957319897', '214729045', '034509063980', 'AB', 13, 'z6MoPLnTks2spS7Do7FgKSE5NEt37toVGYVPUbg8Xzu4JraaHs', 'ZVmrBru2UNGG7Yd7W76PzNG6L', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(77, 'EMP-6x4w3', 'Nakia', 'Jones', 'Blick', '8138 Quigley Groves Suite 739\nPierrefort, WI 85778-5765', '30/11/1992', 'Gage Adams', '971 Alan Pines\nHeaneyville, GA 36258-4700', '41354679311', '80145350285', 'Oral Surgeon', 23, 'Mississippi', '33687173354', '428607232', '977595769826', 'B+', 10, 'uLyBUGjwb7JsFzVjouWkNel5i4TPZFJwGCHilt7NjEdXe3j418', '06j3GGVVVE9EZyVYcCN96lAEo', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(78, 'EMP-5o2c0', 'Jamar', 'Wyman', 'Rogahn', '43530 Hulda Extensions Suite 873\nSouth Eunicemouth, NM 92506', '11/12/2015', 'Erick Mayert', '5192 Guido Neck\nStromanview, WV 16686', '22280213128', '84239537595', 'Police Detective', 2, 'Pennsylvania', '99397579300', '339432986', '479579640588', 'A-', 13, '02127CZM7CGWuknxPRjej4guKFIJxT08vCVNHfsRml165KXjL0', '0ejOOAL6MrZvx5K9r2kGSdKkH', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(79, 'EMP-0p8u6', 'Amelie', 'Quitzon', 'Kling', '86697 Cooper Key Apt. 421\nEast Izaiah, KY 64061-2194', '01/04/2004', 'Ms. Romaine Schuppe', '30931 Marvin Lakes\nKuphalside, WV 19840', '02820364233', '65200748866', 'CSI', 30, 'Louisiana', '28696278989', '817454027', '080315504703', 'A', 10, 'azhBa9UQoJTHlzOVRDwfqkWhj4ffw4Nbp0jBZnopDlXRZn1aIF', 'B0nb46GOqNtyau5qPCYhVgMXL', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(80, 'EMP-4e9t5', 'Woodrow', 'Kuhn', 'Hackett', '63913 Kieran Dale Suite 681\nSouth Omaview, TX 09472', '09/04/2011', 'Cheyanne Hessel', '140 Rau Lodge\nMavisstad, LA 29931', '82687029662', '59075460389', 'Personal Service Worker', 22, 'Kentucky', '91384708055', '921738839', '127718138581', 'A', 14, '4LW3mWCQwwuMgov0QaFp5oHp9mauqKFOwucOeJxJwsh1AD1dqn', '4VSp57xFTld78zoLYKy6Wj4VV', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(81, 'EMP-7i3n2', 'Emelia', 'O\'Keefe', 'Rutherford', '8418 Lamont Throughway\nMcClurehaven, TX 02302', '26/05/1990', 'Roel Padberg', '1601 Rohan Prairie Suite 447\nEast Eldonview, NY 58670', '80524656569', '54107248169', 'Usher', 12, 'Delaware', '86564100061', '221620419', '383092813082', 'B+', 33, 'rsFoZJ57FzlVaGyD2pGvYlqOMNz0ZfMOrVkCbk0OWmcofn8Rud', '6T0ADlUgWCHoe7QJ6rKVGjBRT', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(82, 'EMP-6e6b5', 'Jaycee', 'Hansen', 'Conroy', '707 Merle Locks\nRutherfordfurt, VA 61093', '05/09/2006', 'Prof. Wilton Shanahan MD', '140 Lucas Parkway Suite 132\nEmardside, NH 79949', '76726456571', '30764686201', 'Construction Manager', 15, 'South Carolina', '74951314921', '637172148', '932362776683', 'O+', 5, 'dVRzGPlvR1z0B7uEK2hckdB8hdaDazt4PfXATLac7kfr8Maxyp', 'FXRyRL1GhAu2ozvN0cuzca7nm', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(83, 'EMP-7t0j1', 'Broderick', 'Abbott', 'Ward', '6711 Luettgen Drive Apt. 589\nEast Jeffrymouth, NY 44122', '25/02/2006', 'Prof. Jillian Jacobson', '546 Hermiston Greens\nNorth Angus, UT 78346', '02894356624', '01858099815', 'Emergency Medical Technician and Paramedic', 2, 'California', '26553940017', '108935630', '561101442694', 'O-', 28, 'Jh19zoxbq6fumKEZWEWy0sMXFKu9T7RWsaj4Wb68PpatCNtjvL', 'zXepyhr1wLvOC6bmn53hPdSDa', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(84, 'EMP-4g9d0', 'Winnifred', 'Haag', 'Cole', '8914 Harber Hollow Apt. 853\nNew Erik, WV 90895-3559', '19/07/2019', 'Jaida Luettgen', '42912 Mertz Plains\nNorth Alford, NC 56342', '08594014291', '65479072388', 'Transportation Manager', 23, 'Montana', '75107755004', '699626546', '263109193062', 'B+', 4, 'H8YJrJsTJiqkOVotcX2KecLILWMwtjyzOpgQLtTyocPR7z6gOK', 'P3flKGYmJL9ueV58GnzRRaYsv', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(85, 'EMP-2c7f3', 'Astrid', 'Graham', 'Hudson', '42960 Eichmann Garden Apt. 242\nBayerborough, MI 78663', '14/05/2001', 'Martin Friesen II', '83408 Huel Harbor\nBechtelarport, NE 67411', '56186635164', '00815071356', 'Audio and Video Equipment Technician', 5, 'North Carolina', '45333449520', '888120412', '789370319385', 'AB', 19, 'ltamZ8sDdIBxUAQ6amCEBwoImcAOpPLCBBk7Ov1o31qqrZB6DT', 'XT8L1zPpgtN4C4ygMXJzuB6sL', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(86, 'EMP-6w9p9', 'Soledad', 'Spinka', 'Kemmer', '176 Effertz Ville\nNorth Curtis, IN 92738-8737', '03/01/2007', 'Newell Huels', '675 Loraine Pass Suite 545\nLake Jamie, HI 13564', '68822918089', '24906747008', 'Clinical Psychologist', 10, 'New Mexico', '96136971709', '792624614', '851577943711', 'AB', 34, 'EMSaQCcnfJxkJG7n9cJ8ZoDKEaYDhUVuhMMJYuY5E77BO4Danz', 'Rlr7TBkbFX6NYiPDSqCFVHlLN', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(87, 'EMP-5r6k4', 'Torrey', 'Kunze', 'Huel', '6673 Darien Plains\nDeannaborough, CO 03547-0465', '07/02/2000', 'Pauline Lakin', '6059 Denesik Extension\nGerholdchester, WA 18412', '76064215035', '32018903516', 'Social Service Specialists', 3, 'Michigan', '25826429489', '625934751', '780426710998', 'AB', 27, 'J8AFo8JhFJTGnCAV3U9RUOGjswcGAVuYHGUJJesqqwZpzfChQj', '19uZVZCwJik4cbyMF5E1S9IHg', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(88, 'EMP-9l3q1', 'Ebba', 'Langosh', 'Raynor', '851 Charley Lodge Suite 721\nPort Irma, KY 75039', '15/07/2006', 'Prof. Edwardo Hartmann I', '587 Hermiston Union Suite 885\nWestport, DC 14338-2232', '24982119087', '42945478661', 'Office Machine Operator', 8, 'Oregon', '47123013806', '365061150', '691900175694', 'A+', 35, 'qclwLdWyzun44UO6qETUxqDtmIW6xva6hCWW2uTK3e8DY0X8Es', 'hN0oZnopICoUQrzemLkXIiL5f', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(89, 'EMP-4z5i6', 'Catharine', 'Crist', 'Kulas', '328 Glover Dam\nDarefurt, NC 12491', '04/06/1994', 'Jamaal Leuschke', '274 Purdy Spring Apt. 156\nSouth Ubaldo, NH 97277', '70589245823', '56806598210', 'Police Detective', 10, 'New Mexico', '21764482523', '452449222', '955152723194', 'B', 5, 'jIIQxDAPwzWpGtujPCynQ7wdgCNpS5dke6sy2QMCO855PlQkuW', 'OvqE5XBkiU1IdqgNgw9tS66H2', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(90, 'EMP-6y4c9', 'Marisa', 'Paucek', 'Cole', '2176 Bashirian Inlet Suite 826\nSophiabury, CA 77992', '02/06/2004', 'Rosalyn Bauch', '3546 Fae Haven\nNorth Narcisohaven, DE 53755', '50953577836', '33076274355', 'Captain', 31, 'Iowa', '01671007174', '231882007', '117942529260', 'AB-', 9, 'r41efAmoWyVfVoeAAji9lpGWnI9iIEoWYhZrZoUn0JJrhFTEGZ', 'B8LKLmujz922avkpkNFRw8vy8', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(91, 'EMP-9r2h1', 'Emie', 'Altenwerth', 'Stehr', '7889 Blanda Groves Apt. 592\nNorth Davon, AR 33016-6877', '26/03/2018', 'Rosario Little', '434 Beatty Highway Apt. 585\nWayneport, OH 97729', '32691243534', '27687274920', 'Lay-Out Worker', 19, 'Nevada', '64075970803', '760394484', '001724611166', 'B', 19, '5bJyjOJxBJKsveXGKXv6inoRu6oVk7E3vRRmFZ4eys4zQxlfro', 'pRpHzPO0TJkewe9dg2PUZdVxh', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(92, 'EMP-2l1l8', 'Clarabelle', 'Schneider', 'Bayer', '6637 D\'Amore Spur Suite 637\nNevamouth, OK 08384-7511', '30/11/1994', 'Dr. Clark Wiegand Sr.', '3035 Rice Corner Apt. 930\nLennaberg, KS 90470-6006', '57787302494', '30859642925', 'Business Manager', 36, 'Mississippi', '82558888911', '027308097', '414047350776', 'B-', 22, 'usrAdR36eqbiPYUxvZ4KGbj0YlfMNzUE6ENShQZSPAc3hlf8CR', '0o3N37CoL3J2bxwrXnch511gQ', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(93, 'EMP-0q2k4', 'Nelle', 'Fritsch', 'Harvey', '1198 Viviane Wells\nPort Aminatown, ND 09672', '10/12/2016', 'Dr. Deondre Anderson', '2481 Murazik Plaza\nEast Minnie, CA 94413-1868', '94396453238', '19615555781', 'Landscape Artist', 28, 'Hawaii', '84713311659', '726585649', '802823235099', 'O', 10, 'F4fg4S8vtVeMGsYA1VEsMOABwu5KPcpMqYWaAW2naOpGtGTJmK', 'hDRjYYUb9a0kc4HCm1tGwpCoI', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(94, 'EMP-0b7a5', 'Baron', 'Marks', 'Sawayn', '7385 Hintz Lodge Apt. 567\nKarianeshire, MT 74867-6376', '20/01/2006', 'Desiree Hilpert', '19226 Winifred Glens Suite 183\nEast Shany, AR 59053', '11754469910', '26611365967', 'Telephone Operator', 27, 'New Mexico', '98191286735', '099307292', '299379185648', 'O+', 34, 'GKUVgMg3VM3LzdJH8ihkNm4tzLVFhazVTwWNUUJ2nvJOsJZWGT', 'OXRuBwL30QHXakYN2jMvqyhYl', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(95, 'EMP-3j5c2', 'Jo', 'Lehner', 'Schaefer', '67530 Ankunding Forks Suite 701\nWest Kian, DE 07274', '13/12/2001', 'August Kautzer', '5521 Lexus Forge\nGerhardfort, RI 08110', '66809768800', '49443285359', 'Marine Architect', 11, 'Oklahoma', '56519489022', '319966529', '949750938296', 'B+', 30, 'TK6QK7ayzq2pCBGQLlmvue7oFN26iwyrFx5r7A8Nnjs2Dkvhw8', 'VIwTxsF1T1IYnwl45g6fmD0Eq', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(96, 'EMP-4n1w5', 'Chester', 'Frami', 'Blick', '9212 Matilde Spring\nHannahland, WI 23624', '13/05/2014', 'Samanta Mohr Sr.', '8021 Luettgen Divide\nRunteport, ND 63621-8248', '63999431852', '03630246295', 'School Bus Driver', 33, 'Washington', '20763948439', '060784065', '164763613515', 'O-', 36, '2QYoEHyc0hGwkobwWz2CpGv2uwCTVvq1qCkrN6TjV3yOwOBp2R', 'E4SXs9gSTrYzFucZiTSdCuhTx', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(97, 'EMP-7e4o6', 'Thalia', 'Mitchell', 'Morissette', '83784 Pamela Rapid Suite 652\nPort Thaliamouth, WA 61203', '13/03/2013', 'Miss Ivah Smitham', '998 Ernser Run\nFerrystad, MO 77398-2749', '42285693135', '57595718886', 'Airline Pilot OR Copilot OR Flight Engineer', 35, 'Delaware', '19986229589', '371080459', '665039498809', 'AB+', 29, 'Dazgl7iuF0r7cmKGYWbLBsR8ccXb9DIXCYi6otXFezouBdIl8c', 'M2RxukQ630VRh7mobJKIxfpSQ', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(98, 'EMP-5p2x0', 'Rylan', 'Roberts', 'Grant', '74522 Lincoln Crossroad Suite 885\nDickichester, LA 16620-8597', '05/09/1995', 'Ms. Meggie Ullrich', '51813 Norwood Well\nFrancescomouth, FL 22595', '86238768093', '39111011187', 'Logging Tractor Operator', 24, 'Hawaii', '23021126650', '954948429', '367072669573', 'B-', 22, 'MV5QHHud3LaITscJPKcleagxSNxxgAyyqYt3gduQFlgw2A8ut4', 'r0ml996bBZJT7CVMi7Yack0V4', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(99, 'EMP-5p8b0', 'Troy', 'Dickinson', 'Reichert', '41755 Danika Wells Apt. 854\nSouth Ianport, HI 18009-1181', '07/09/2007', 'Ms. Gia Mills Jr.', '8489 Everette Creek Suite 353\nNorth Rosafurt, AL 41919-5770', '48011494222', '19302635795', 'Precision Etcher and Engraver', 34, 'New Jersey', '81917160470', '272355985', '878206911443', 'AB+', 34, 'IooXAtf9urpUSeyu5Fyz2OcTXlClmsIpYZcdw3nodzKpcyXkFN', 'WLi3agLcTv6ga7fx4FH4Q439e', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(100, 'EMP-8a3g7', 'Adele', 'Brakus', 'Schmidt', '288 Corene Stravenue\nJonesberg, AR 22726', '11/10/2004', 'Miss Elinor Harvey V', '14355 Gislason Union Apt. 813\nGardnerhaven, NC 61887-0667', '27825891000', '38427053670', 'Sawing Machine Setter', 24, 'Pennsylvania', '16003497501', '224419919', '164229971605', 'AB+', 27, 'IqXxDfwYoQaoEhiMDI87jneHufLrZFioX2AbjeSjFGIoQ5HVPP', 'ZQvUVnLE9Fs3ZyQoAu3eWX5gw', NULL, '2022-07-18 11:00:25', '2022-07-18 11:00:25', NULL),
(101, 'ITDO-02', 'Febrick', '—', 'Quiza', '14 A. Stotsenburg St. Caloocan City', '02/10/2001', 'Liecel Andrea Rebolledo', 'Blk 32 Lot 92 Sabalo St. Dagat-Dagatan, Caloocan City', '09122333690', '09122333690', 'Developer', 28, 'No Division', '123456789012', '123-456-789-012', '12-345678901-2', 'A+', 27, 'Vfh1K8V5OXMMxvmAgG0AHMQmpC0oMIl2nBQFFXBAoRjQ3N1RaV', 'hkkgm6fW8m1TjKSNczUj7nqeQ', 'HnBWshgF3J7u13hZ79K3378i3Pl32XcBqVtJ8VfG', '2022-07-18 11:13:55', '2022-07-30 03:11:43', NULL),
(102, NULL, 'Liecel Andrea', 'Rebolledo', 'Quiza', 'Blk 32 Lot 92 Sabalo St. Dagat-Dagatan, Caloocan City', '01/09/2001', 'Febrick Quiza', '14 A. Stotsenburg St. Caloocan City', '09122333690', '09122333690', 'Developer', 27, 'Second Division', '123456789012', '123-456-789-012', '12-345678901-2', NULL, 26, 'XvbE6EfAbNbQpdXA0ipnMCWeThlfXidqpZPSd2KjG0fkewcsYA', '2VS1elyKL8AhzHCsS9weBvINd', '3sp0SXctAGqKvewZcMvW100TViiBckdgET9F1Kml', '2022-07-18 11:17:40', '2022-07-18 12:31:41', NULL);



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(154, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(155, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(156, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(157, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(158, '2022_06_24_055904_create_offices_table', 1),
(159, '2022_06_24_140830_create_detailed_offices_table', 1),
(160, '2022_06_24_140852_create_employees_table', 1),
(161, '2022_06_29_135204_create_admins_table', 1),
(162, '2022_07_01_051723_create_super_admins_table', 1);

INSERT INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Office of the Mayor', '2022-07-18 11:00:24', '2022-07-18 11:00:24');
INSERT INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Office of the City Administrator', '2022-07-18 11:00:24', '2022-07-18 11:00:24');
INSERT INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Office of the Secretary of the Mayor', '2022-07-18 11:00:24', '2022-07-18 11:00:24');
INSERT INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Internal Audit Services', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(5, 'Barangay Secretariat', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(6, 'General Services Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(7, 'City Legal Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(8, 'City Development and Planning Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(9, 'Human Resource and Management Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(10, 'City Accounting Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(11, 'City Budget Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(12, 'City Assessors Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(13, 'Business Permit and Licensing Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(14, 'City Auditors Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(15, 'City Treasurers Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(16, 'DPSTM', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(17, 'City Enviromental Management Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(18, 'Public Information Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(19, 'City Engineers Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(20, 'Office of City Building Official', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(21, 'City Legal Officer', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(22, 'Cultural Affairs and Tourism Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(23, 'Community Relations Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(24, 'Oversight Commitee for Brgy. Affairs', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(25, 'City Veterinarian', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(26, 'Parks Administration Services', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(27, 'Civil Registrar', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(28, 'Information Technology Development Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(29, 'Caloocan City Public Library', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(30, 'Caloocan Health Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(31, 'Caloocan City Medical Center', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(32, 'CCDRRMO', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(33, 'Office of the Senior Citizens Affairs', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(34, 'Peoples Law Enforcement Board', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(35, 'Sports Development Services', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(36, 'Labor and Industrial Relations Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(37, 'Social Welfare Department', '2022-07-18 11:00:24', '2022-07-18 11:00:24'),
(38, 'Urban Poor Affairs Office', '2022-07-18 11:00:24', '2022-07-18 11:00:24');





INSERT INTO `super_admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'super@dminCHALL', '$2y$10$KWQcD9riaToGqcUcup/iAe9IlR1KjkRObp20b/mKjFu0oYhGUrEsa', '2022-07-18 11:00:24', '2022-07-18 11:00:24');





/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;