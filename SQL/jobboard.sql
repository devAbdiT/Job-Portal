

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `created_at`) VALUES
(1, 'adminar@gmail.com', 'adminar@gmail.com', '$2y$10$oSSxP40KtZa5nFD8.D1fyuj6DvP6ELeAxC578tcqt6X914uCVDBte', '2026-01-03 17:03:25'),
(2, 'Admin1', 'admin!@gmail.com', '$2y$10$rGqPddKC3Pytf3Sp6/D/dua4.XdaHiP46PFDA2NJtzwE5rxcgiSIa', '2026-01-09 19:52:07'),
(3, 'Admin2', 'a@gmail.com', '$2y$10$X4wXLhfohvZnu5cPzhqisu/tC/d6GgSLamqalByDpxzQ2ShtEYIpC', '2026-01-09 19:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Designer', '2026-01-01 11:06:47'),
(2, 'Developer', '2026-01-01 10:55:21'),
(3, 'Tester', '2026-01-01 10:54:34'),
(4, 'Manager', '2026-01-01 10:54:34'),
(7, 'Data Science', '2026-01-09 22:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(3) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_region` varchar(200) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `vacancy` int(3) NOT NULL,
  `job_category` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `application_deadline` varchar(200) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `education_experience` text NOT NULL,
  `other_benifits` text NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_id` int(3) NOT NULL,
  `company_image` varchar(200) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_region`, `job_type`, `vacancy`, `job_category`, `experience`, `salary`, `gender`, `application_deadline`, `job_description`, `responsibilities`, `education_experience`, `other_benifits`, `company_email`, `company_name`, `company_id`, `company_image`, `status`, `created_at`) VALUES
(1, 'Web Designer', 'New York', 'Full Time', 3, 'Designer', '1-3 years', '$50k - $70k', 'Any', '11-11-11', 'designging web', 'Designinning', 'worked for customers', 'nothing', 'as@1', 'aa', 6, 'Screenshot 2025-02-11 080534.png', 1, '2025-12-31 22:32:29'),
(3, 'Game Developer', 'Mountain View', 'Part Time', 2, 'Developer', '3-6 years', '$50k - $70k', 'Male', '20-1-26', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo nobis consequuntur hic cupiditate, aut impedit. Delectus quae facere officiis sequi tenetur nemo odit. Voluptas sapiente aspernatur vero officia minus quisquam.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo nobis consequuntur hic cupiditate, aut impedit. Delectus quae facere officiis sequi tenetur nemo odit. Voluptas sapiente aspernatur vero officia minus quisquam.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo nobis consequuntur hic cupiditate, aut impedit. Delectus quae facere officiis sequi tenetur nemo odit. Voluptas sapiente aspernatur vero officia minus quisquam.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo nobis consequuntur hic cupiditate, aut impedit. Delectus quae facere officiis sequi tenetur nemo odit. Voluptas sapiente aspernatur vero officia minus quisquam.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo nobis consequuntur hic cupiditate, aut impedit. Delectus quae facere officiis sequi tenetur nemo odit. Voluptas sapiente aspernatur vero officia minus quisquam.', 'as@1', 'aa', 6, 'Screenshot 2025-02-11 080534.png', 0, '2026-01-01 11:01:24'),
(4, 'Web Designer', 'New York', 'Part Time', 4, 'Designer', '1-3 years', '$70k - $100k', 'Female', '2-2-27', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit explicabo ratione veniam ipsa ipsam cumque perspiciatis tempore nobis, temporibus necessitatibus enim esse, blanditiis sint a nam dolore quod iure adipisci.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit explicabo ratione veniam ipsa ipsam cumque perspiciatis tempore nobis, temporibus necessitatibus enim esse, blanditiis sint a nam dolore quod iure adipisci.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit explicabo ratione veniam ipsa ipsam cumque perspiciatis tempore nobis, temporibus necessitatibus enim esse, blanditiis sint a nam dolore quod iure adipisci.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit explicabo ratione veniam ipsa ipsam cumque perspiciatis tempore nobis, ', 'tadesseabdi2@gmail.com', 'ABEX', 8, 'Screenshot 2025-03-22 224948.png', 0, '2026-01-01 11:12:20'),
(7, 'Game Designer', 'Anywhere', 'Full Time', 9, 'Designer', '3-6 years', '$100k - $150k', 'Male', '20-1-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto error fuga consectetur, libero provident officia eum?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto error fuga consectetur, libero provident officia eum?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto error fuga consectetur, libero provident officia eum?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto error fuga consectetur, libero provident officia eum?', 'co@gmail.com', 'Co', 10, 'Screenshot 2025-02-11 080520.png', 0, '2026-01-02 14:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `worker_id` int(3) NOT NULL,
  `job_id` int(3) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `company_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `username`, `email`, `cv`, `worker_id`, `job_id`, `job_title`, `company_id`, `created_at`) VALUES
(1, 'ak', 'ak@gmail.com', 'project guidline.docx', 7, 3, 'Game Developer', 6, '2026-01-01 22:34:19'),
(2, 'Abdi&@', 'abdibegna123@gmail.com', '', 5, 4, 'Web Designer', 8, '2026-01-01 23:55:30'),
(7, 'Abdi&@', 'abdibegna123@gmail.com', '', 5, 3, 'Game Developer', 6, '2026-01-01 23:57:16'),
(8, 'ak', 'ak@gmail.com', 'project guidline.docx', 7, 1, 'Web Designer', 6, '2026-01-02 02:53:57'),
(9, 'ak', 'ak@gmail.com', 'project guidline.docx', 7, 2, 'Coder', 6, '2026-01-02 02:54:13'),
(10, 'ak', 'ak@gmail.com', 'project guidline.docx', 7, 4, 'Web Designer', 8, '2026-01-02 02:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` int(3) NOT NULL,
  `job_id` int(3) NOT NULL,
  `worker_id` int(3) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `job_id`, `worker_id`, `created_at`) VALUES
(2, 3, 7, 2147483647),
(3, 3, 7, 2147483647),
(11, 3, 5, 2147483647),
(12, 4, 5, 2147483647),
(13, 1, 7, 2147483647),
(14, 2, 7, 2147483647),
(15, 4, 7, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(3) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `keyword`, `created_at`) VALUES
(0, 'Web Designer', '2026-01-02 22:42:44'),
(0, 'Web Designer', '2026-01-02 22:57:06'),
(0, 'Web developer', '2026-01-02 22:58:19'),
(0, 'Web developer', '2026-01-02 22:58:31'),
(0, 'Game Designer', '2026-01-02 22:58:45'),
(0, 'Web Designer', '2026-01-10 03:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `img`, `type`, `cv`, `title`, `bio`, `facebook`, `twitter`, `linkedin`, `created_at`) VALUES
(1, 'tadabdi', 'abdi@gmail.com', '$2y$10$Cq8Vid3mVbmk.5CKv0oSIOsPY8.ZDret3gxkfHOExI3gsDxs2oVDC', 'web-coding.png', 'Worker', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-29 22:55:08'),
(3, 'hhhh', 'ab@', '$2y$10$n0.s954NoQpAyhpjFxVrae7ILIyyp5RD63Y/h1KfR36Og7Mnu.me6', 'web-coding.png', 'Worker', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-31 00:18:04'),
(4, 'hhhh', 'ab@', '$2y$10$IwuOBeHdl4nyYuokvQrxS.nfcJpWd3hvU6dEMizE.z1S.7ve6p8ly', 'web-coding.png', 'Worker', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-31 00:21:24'),
(5, 'Abdi&@', 'abdibegna123@gmail.com', '$2y$10$mJaVx2xquXm1w.U7G.8t.uLamttcoxciN1ygnsKY4S4/XqGl6wyTa', 'person_transparent_2.png', 'Worker', NULL, 'Coder', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus itaque eius quisquam optio veniam dignissimos! Esse, fugit? Facere tenetur earum fugiat est doloribus minima nemo. Quo soluta expedita ut incidunt!', NULL, 'https://x.com/home', 'https://www.linkedin.com/in/abdi-tadesse-914a33372/', '2025-12-31 00:22:50'),
(6, 'aa', 'as@1', '$2y$10$UCOfDn7rUiemSR6aijDaMOkMQ3U9zG5MfWCP8b2zSeXwEw63HKE.a', 'Screenshot 2025-02-11 080534.png', 'Company', 'NULL', 'NULL', '      We want U', '', '', '', '2025-12-31 06:58:31'),
(7, 'ak', 'ak@gmail.com', '$2y$10$KY6Rkh66d.rNcjrRzal3Zu81EN/wSl18Xu2pC59FSvIuQMXSAbbRi', 'Screenshot 2025-01-11 212232.png', 'Worker', 'project guidline.docx', 'designer', '    I can do everything anything', '', 'https://x.com/i/flow/login?redirect_after_login=%2Fhome', 'https://www.linkedin.com/in/abdi-tadesse-914a33372/', '2025-12-31 11:05:57'),
(8, 'ABEX', 'tadesseabdi2@gmail.com', '$2y$10$YoBdL5Y4Cs.Tl5f3z3ox0e1kmbO52zfE1AfS5nUr2mIHICdqyR2WO', 'Screenshot 2025-03-22 224948.png', 'Company', 'NULL', 'NULL', '  Totam eaque adipisci fugiat tempore maxime officiis sit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis harum officia impedit sit earum odio. Sapiente, ducimus magni iusto, labore dolor rerum qui, laborum temporibus repellendus saepe adipisci accusamus iure!', '', '', '', '2026-01-01 11:10:57'),
(10, 'Co', 'co@gmail.com', '$2y$10$zqWKGCqVHstgnMyv8G2v3eYUXqS5Jx2nktF/57w8qazYXpT9.YOPG', 'Screenshot 2025-02-11 080520.png', 'Company', 'NULL', 'NULL', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem illum vel similique atque maiores odio dicta quae. Distinctio, perferendis, id doloremque tempore voluptatum nam nisi nostrum possimus est eveniet inventore?', '', '', '', '2026-01-01 12:15:04'),
(11, 'ar', 'ar@gmail.com', '$2y$10$oSSxP40KtZa5nFD8.D1fyuj6DvP6ELeAxC578tcqt6X914uCVDBte', 'Screenshot 2025-07-29 010245.png', 'Worker', 'all five scheduling algorithms correctly and clearly.docx', '', '   HHEYYYYYYYYYYYYYYYYYYY', '', '', '', '2026-01-03 16:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
