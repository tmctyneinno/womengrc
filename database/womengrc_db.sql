-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2025 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `womengrc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `header_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `image`, `header_image`, `created_at`, `updated_at`) VALUES
(4, 'About us', '<p><strong>Women in Governance, Risk, Compliance, Financial Crime, and Fraud Prevention </strong>is a pioneering initiative founded by Dr. Foluso Amusa, PhD, dedicated to empowering women professionals in these critical fields. Our mission is to foster leadership, inspire innovation, and create a collaborative platform for women to thrive, lead, and make a lasting impact across industries.</p><p>We believe in the power of diversity and inclusion to drive ethical practices, enhance professional excellence, and tackle the complex challenges of today\'s global landscape. Our community is committed to shaping the future of Governance, Risk, Compliance (GRC), and Financial Crime Prevention by supporting women at all career stages, from emerging leaders to seasoned professionals.</p>', 'assets/images/about/1733752498_image.jpg', 'assets/images/about/1733841740_header.jpg', '2024-12-09 11:41:46', '2024-12-10 13:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `last_login`, `login_ip`, `otp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@gmail.com', NULL, '$2y$10$SDWpI4m9YUWunhV9hP/spuxDlU25RYtkN52ts4CzC5fZjnHxv.Zwq', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advisories`
--

CREATE TABLE `advisories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advisories`
--

INSERT INTO `advisories` (`id`, `name`, `position`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Elliott Prince', 'General Manager', '<p>Content</p>', 'advisorys/1740132387.png', '2025-02-21 09:06:27', '2025-02-21 09:06:27'),
(2, 'Sold outtbjj', 'ADVISORY BOARD MEMBER', '<p>ADVISORY BOARD MEMBER</p>', 'advisorys/1741171210.png', '2025-03-05 09:35:59', '2025-03-05 09:40:10'),
(3, 'Home', 'ADVISORY BOARD MEMBER', '<p>ADVISORY BOARD MEMBER</p>', 'advisorys/1741171007.png', '2025-03-05 09:36:47', '2025-03-05 09:36:47'),
(4, 'Sold outtbjj', 'ADVISORY BOARD MEMBER', '<p>ADVISORY BOARD MEMBER</p>', 'advisorys/1741171032.png', '2025-03-05 09:37:12', '2025-03-05 09:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Theme: \"Digital Frontiers in Governance, Risk & Compliance: Addressing Financial Crime and Economic Challenges Across Global Sectors 2025 and Beyond\"', 'theme-digital-frontiers-in-governance-risk-compliance-addressing-financial-crime-and-economic-challenges-across-global-sectors-2025-and-beyond', '<p><strong>🎯 This conference: </strong>This event promises to be one of the most impactful summits on governance, risk management, and compliance (GRC), specifically addressing the evolving threats posed by financial crime in an increasingly digital and interconnected global economy. This year\'s theme is set to explore the increasing intersection between digital innovation and financial crime , fraud prevention, focusing on how emerging technologies and regulatory frameworks can tackle financial crime and fraud in a rapidly evolving global economy. As we move toward 2025, financial institutions, regulators, and global businesses face mounting challenges from cyber threats, fraud, and cross-border economic crimes. The summit aims to provide a platform for thought leaders and experts to share insights on how digital transformation can be leveraged to enhance governance, risk management, and compliance, while addressing the global economic impact of financial crime.</p><p><strong>💡 Key Focus Areas:</strong></p><p><br><strong>Adapting Governance Strategies for a Digital World:</strong></p><p>Emphasis on how organizations can build resilient governance frameworks to handle emerging digital risks.</p><p><strong>Financial Crime &amp; Fraud Prevention Through Innovation:</strong></p><p>Exploring the role of artificial intelligence, blockchain, and big data in detecting and mitigating fraud, money laundering, and cybercrime.</p><p><strong>Global Economic Implications:</strong></p><p>A focus on the economic challenges financial crime and fraud presents, particularly for emerging markets, and the necessary cross-sector collaboration for a stronger global economy.</p><p>&nbsp;</p><p><strong>💡 Why Attend:</strong></p><p>&nbsp;</p><p>Attendees will have the unique opportunity to gain actionable insights from global experts, explore cutting-edge technologies, and understand the future trends in governance, risk, and compliance. This summit is an essential gathering for professionals who aim to stay ahead of regulatory challenges, strengthen their risk frameworks, and combat financial crime in an increasingly digital world.</p><p><strong>Why You Must Attend:</strong></p><p>&nbsp;</p><p>As the world continues to embrace rapid technological advancements, businesses, regulators, and financial institutions face unprecedented risks and opportunities. The 2024 summit provides a critical platform for stakeholders across various industries to come together and discuss innovative strategies for preventing financial crime, improving governance, and adapting to global economic challenges. By attending, you\'ll have the chance to:</p><p><strong>Gain Insights from Global Experts:</strong> Learn directly from industry leaders, regulators, and technologists about how they are tackling today\'s most pressing financial crime issues.</p><p><strong>Expand Your Network:</strong> Connect with decision-makers, experts, and peers in GRC, financial crime prevention, and risk management from Nigeria and around the world</p><p><strong>Stay Ahead of Compliance Trends:</strong>Discover how the latest in AI, machine learning, and big data is shaping the future of compliance and how your organization can stay ahead of regulatory challenges.</p><p><strong>Benefits of Attending:</strong></p><p>&nbsp;</p><p><strong>Practical Knowledge:</strong> Attendees will walk away with actionable insights into effective governance frameworks, risk management practices, and compliance solutions, especially suited to Nigerian and African business environments.</p><p><strong>Real-World Case Studies:</strong> Learn from real-life examples and case studies from top financial institutions, demonstrating how they\'ve successfully navigated digital transformation while combating financial crime.</p><p><strong>New Technologies:</strong>Explore cutting-edge technologies designed to detect, prevent, and manage financial crime in both local and international markets.</p><p><strong>Global Perspectives:</strong>Benefit from a global perspective on regulatory trends, compliance issues, and risk mitigation strategies that are critical for staying competitive in the financial sector.</p><p><strong>Expectations::</strong></p><p>&nbsp;</p><p>Attendees can expect a highly interactive and engaging event, with keynote presentations, panel discussions, and networking sessions that foster collaboration. Experts will share their knowledge on key topics such as digital currency regulations, AI-powered financial crime detection tools, and cross-border regulatory cooperation. This is a must-attend event for professionals looking to strengthen their organizations’ governance and risk frameworks while addressing emerging financial crime threats in a post-2025 world. Mark your calendar for the 2024 GRC and Financial Crime Prevention Summit, and be prepared to deepen your expertise, expand your network, and enhance your organization\'s compliance strategies in an ever-changing digital landscape!</p>', 'assets/images/blog/1733829783.jpg', '2024-12-10 10:23:03', '2024-12-10 11:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `parent_id`, `author_name`, `author_email`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'samuel', 'eshanokpe@gmail.com', 'messsage', '2024-12-10 11:59:18', '2024-12-10 11:59:18'),
(2, 1, 1, 'samuel', 'eshanokpe@gmail.com', 'commit', '2024-12-10 12:15:13', '2024-12-10 12:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `first_phone` varchar(255) DEFAULT NULL,
  `second_phone` varchar(255) DEFAULT NULL,
  `first_email` varchar(255) DEFAULT NULL,
  `second_email` varchar(255) DEFAULT NULL,
  `first_address` text DEFAULT NULL,
  `second_address` text DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `company_name`, `first_phone`, `second_phone`, `first_email`, `second_email`, `first_address`, `second_address`, `website_link`, `site_logo`, `footer_logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Women in GRC', '+1 (687) 584-3691', NULL, 'duvonabexa@mailinator.com', 'nujy@mailinator.com', '<p><strong>EUROPE:&nbsp;</strong></p><p>International House 24 Holborn Viaduct London, EC1A 2BN, United Kingdom</p>', '21 Gillabbey Terrace, Gillabbey Street, Cork, T12 KPN4, Republic of Ireland', 'https://www.womengrc.com', 'assets/images/logo/6762d93338a73.jpg', 'assets/images/logo/67600b4798854.png', 'assets/images/logo/675856e35ea33.png', '2024-12-09 12:05:15', '2025-01-07 11:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_items`
--

CREATE TABLE `dropdown_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdown_items`
--

INSERT INTO `dropdown_items` (`id`, `menu_item_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 2, 'Vision', 'vision', '2024-12-10 01:55:46', '2024-12-10 01:55:46'),
(2, 2, 'Purpose', 'purpose', '2024-12-10 01:55:46', '2024-12-10 01:55:46'),
(3, 2, 'Mission', 'mission', '2024-12-10 01:55:46', '2024-12-10 01:55:46'),
(11, 4, 'Facilitators', 'facilitators', '2025-01-07 14:05:28', '2025-01-07 14:05:28'),
(12, 4, 'Mentorship', 'mentorship', '2025-01-07 14:05:28', '2025-01-07 14:05:28'),
(13, 4, 'Community Forum', 'community-forum', '2025-01-07 14:05:28', '2025-01-07 14:05:28'),
(14, 4, 'Event', 'event', '2025-01-07 14:05:28', '2025-01-07 14:05:28'),
(15, 4, 'FAQs', 'faqs', '2025-01-07 14:05:28', '2025-01-07 14:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Nomination/Voting Process', 'nominationvoting-process', '<p>Voting is open to the public. The participants with the highest number of votes in every category in various sectors will shortlisted.</p>', 'assets/images/event/1733839693.jpg', '2024-12-10 13:08:13', '2024-12-10 13:08:13'),
(2, 'Shortlisting and Judging Process', 'shortlisting-and-judging-process', '<p>The Votes are counted inorder to shortlist top 3 nominees under every category. Afterwhich, further screening and examination is done by the Judges to select the winners.</p>', 'assets/images/event/1733839826.jpg', '2024-12-10 13:10:26', '2024-12-10 13:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `facilitator_contents`
--

CREATE TABLE `facilitator_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitator_contents`
--

INSERT INTO `facilitator_contents` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Women in GRC and Financial Crime, Fraud Prevention Initiative', '<p><strong>Introduction</strong></p><p>The Event Facilitators Scheme is an integral part of the Women in Governance, Risk, Compliance (GRC), and Financial Crime, Fraud Prevention Initiative. This scheme is designed to empower members with opportunities to lead, organize, and facilitate impactful events that align with the initiative\'s mission of advancing gender diversity and professional<br>development within the industry.<br>&nbsp;</p><p><strong>Objectives of the Scheme</strong></p><ol><li>Leadership Development: Provide opportunities for members to develop and showcase their leadership and event management skills.</li><li>Community Engagement: Foster collaboration among members, industry stakeholders, and partners through dynamic events.&nbsp;</li><li>Advocacy and Awareness: Highlight key issues and advancements in GRC and<br>Financial Crime sectors.</li><li>Professional Networking: Create platforms for meaningful connections between<br>professionals, mentors, and emerging leaders.</li></ol>', 'assets/images/facilitator/1736263621.jpg', '2025-01-07 14:27:01', '2025-01-07 14:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `facilitator_events`
--

CREATE TABLE `facilitator_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_date_time` datetime NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitator_events`
--

INSERT INTO `facilitator_events` (`id`, `event_name`, `event_description`, `event_type`, `event_date_time`, `event_location`, `created_at`, `updated_at`) VALUES
(1, 'dd', 'd', 'Webinar', '2025-01-16 09:26:00', 'location', '2025-01-16 07:26:48', '2025-01-16 07:26:48'),
(2, 'c', 'c', 'Conference/Summit', '2025-01-16 09:28:00', 'cc', '2025-01-16 07:28:10', '2025-01-16 07:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Tempore neque rem d', '<p>nnn</p>', '2024-12-10 03:01:07', '2024-12-10 03:01:07'),
(2, 'What is the purpose of this initiative', '<p>The initiative aims to empower women in Governance, Risk, Compliance (GRC), financial crime prevention, and fraud prevention, fostering leadership and creating opportunities for professional growth and collaboration.</p>', '2024-12-10 03:03:26', '2024-12-10 03:03:26'),
(3, 'Who can become a member of the platform?', '<p>Any professional passionate about advancing women in GRC and financial crime prevention, including women leaders, aspiring professionals, and allies from all industries and sectors.</p>', '2024-12-10 03:03:47', '2024-12-10 03:03:47'),
(4, 'How can I join the membership portal?', '<p>You can sign up through our user-friendly membership portal by creating an account, providing your professional details, and selecting your area of interest.</p>', '2024-12-10 03:04:05', '2024-12-10 03:04:05'),
(5, 'Are there any membership fees?', '<p>Membership details, will be specified during the registration process. We aim to keep it accessible to a wide audience.</p>', '2024-12-10 03:05:02', '2024-12-10 03:05:02'),
(6, 'How does the mentorship program work?', '<p>The mentorship program pairs experienced professionals with mentees based on their expertise, goals, and interests. Regular sessions, progress tracking, and feedback tools ensure meaningful connections.</p>', '2024-12-10 03:05:19', '2024-12-10 03:05:19'),
(7, 'What resources are available in the Resource Library?', '<p>The Resource Library offers blogs, white papers, toolkits, case studies, and industry insights to help members stay informed and succeed in their fields.</p>', '2024-12-10 03:05:35', '2024-12-10 03:05:35'),
(8, 'Are the events virtual or in-person?', '<p>Our events include a mix of virtual webinars and in-person conferences, ensuring accessibility and global reach. Check the Events section for details on upcoming activities.</p>', '2024-12-10 03:06:04', '2024-12-10 03:06:04'),
(9, 'How can I contribute to the initiative?', '<p>You can contribute by volunteering, mentoring, sponsoring events, or making donations. Visit the \"Get Involved\" section for more details.</p>', '2024-12-10 03:06:25', '2024-12-10 03:06:25'),
(10, 'What is the purpose of the Diversity & Inclusion metrics?', '<p>The metrics showcase stories and initiatives promoting women’s advancement in GRC and financial crime prevention, highlighting the impact of diversity in leadership.</p>', '2024-12-10 03:06:41', '2024-12-10 03:06:41'),
(11, 'How are women leaders recognized on this platform?', '<p>The Recognition section features profiles of accomplished women, their achievements, and awards, including a link to the GRCFINCRIME Awards website.</p>', '2024-12-10 03:07:02', '2024-12-10 03:07:02'),
(12, 'Can I access the platform globally?', '<p>Yes, the platform is designed for global accessibility, welcoming members from all regions and industries.</p>', '2024-12-10 03:07:25', '2024-12-10 03:07:25'),
(13, 'How is privacy and data security handled?', '<p>We are committed to safeguarding your data with robust privacy and security measures. For details, refer to our Privacy Policy on the website.</p>', '2024-12-10 03:07:37', '2024-12-10 03:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `faq_stores`
--

CREATE TABLE `faq_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_stores`
--

INSERT INTO `faq_stores` (`id`, `name`, `email`, `phone_number`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Eshanokpe Daniel', 'eshanokpe@gmail.com', '08139267960', 'How is privacy and data security handled?', 'xxx', '2025-01-10 09:13:38', '2025-01-10 09:13:38'),
(2, 'Eshanokpe Daniel', 'eshanokpe@gmail.com', '08139267960', 'How is privacy and data security handled?', 'xxx', '2025-01-10 09:13:54', '2025-01-10 09:13:54'),
(3, 'Eshanokpe Daniel', 'eshanokpe@gmail.com', '08139267960', 'How is privacy and data security handled?', 'xxx', '2025-01-10 09:20:48', '2025-01-10 09:20:48'),
(4, 'Eshanokpe Daniel', 'eshanokpe@gmail.com', '08139267960', 'How is privacy and data security handled?', 'xxx', '2025-01-10 09:23:23', '2025-01-10 09:23:23'),
(5, 'Brynne Watkins', 'kyqip@mailinator.com', '+1 (413) 189', 'How is privacy and data security handled?', 'Quod nemo quo iure d', '2025-01-10 09:24:59', '2025-01-10 09:24:59'),
(6, 'Brynne Watkins', 'kyqip@mailinator.com', '+1 (413) 189', 'How is privacy and data security handled?', 'Quod nemo quo iure d', '2025-01-10 09:26:21', '2025-01-10 09:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `membership_contents`
--

CREATE TABLE `membership_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_contents`
--

INSERT INTO `membership_contents` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Membership Information', '<p>Women in GRC and Financial Crime, Fraud Prevention is a professional initiative dedicated to empowering women in Governance, Risk, Compliance (GRC), and Financial Crime &amp; Fraud Prevention sectors. Our mission is to provide members with resources, networks, and opportunities to advance their careers and foster innovation in the industry.</p><p><strong>Description of Membership</strong></p><p>Membership with Women in GRC and Financial Crime, Fraud Prevention provides access to:<br>&nbsp;</p><ol><li>A global network of professionals and leaders in the GRC and Financial Crime, Fraud across all sectors or Industries in the world</li><li>Exclusive training programs, certifications, and industry resources. Opportunities to participate in events, webinars, and thought leadership discussions.</li><li>Mentorship programs tailored to support career growth.</li><li>Advocacy and support for gender diversity and leadership opportunities.</li></ol><p>&nbsp;</p><p><strong>Organizational Structure</strong></p><ol><li>Executive Board: Responsible for overall strategy and governance of the initiative.</li><li>Advisory Committees: Focused on mentorship, events, professional development, and advocacy.</li><li>Regional Chapters: Local groups to facilitate networking and engagement in various geographies.Members:</li><li>Individuals and organizations actively contributing to and benefiting from the initiative.<br>&nbsp;</li></ol><p><strong>Membership Categories</strong></p><ol><li>Student Membership: For university students studying fields related to GRC, financial crime, and fraud prevention.</li><li>Individual Membership: For professionals in the industry seeking personal development and networking.</li><li>Corporate Membership: For organizations supporting the initiative\'s mission and providing their employees with access to resources.</li><li>Mentor Membership: For experienced professionals committed to guiding and mentoring others.</li><li>Affiliate Membership: For those in related industries who support the objectives of the initiative.<br>&nbsp;</li></ol><p><strong>Membership Registration Process Application:</strong></p><p>Membership Registration Process Application:<br><br>Visit our official website Fill out the online membership application form.<br><strong>Review</strong>:<br>Applications will be reviewed by the Membership Committee.<br>Applicants may be contacted for additional information if necessary.<br><br><strong>Approval</strong>:<br>Approved applicants will receive an official membership welcome email with further instructions.&nbsp;</p><p>Membership fees, if applicable, must be paid before activation.</p><p>&nbsp;</p><p><strong>Benefits by Membership Category</strong></p><p>Students: Scholarships, internships, and access to educational resources.<br>Individuals: Training discounts, career support, and professional networking.<br>Corporates: Branding opportunities, access to talent, and collaboration on industry initiatives.<br>Mentors: Recognition, exclusive networking, and opportunity to contribute to professional development.<br><br>Affiliates: Collaboration on events and advocacy initiatives.<br><br>Contact Us<br>For questions about membership or to begin your application, please contact:</p><p>Email: <a href=\"mailto:info@grcfp.org\">info@grcfp.org</a> Website: <a href=\"http://www.grcfp.org/\">www.grcfp.org</a></p>', 'assets/images/membership/1736257642.jpg', '2025-01-07 12:41:57', '2025-01-07 13:21:19'),
(2, 'facilitator', '<p>facilitator</p>', 'assets/images/membership/1736263530.jpg', '2025-01-07 14:25:30', '2025-01-07 14:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `mentorship_contents`
--

CREATE TABLE `mentorship_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentorship_contents`
--

INSERT INTO `mentorship_contents` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Women in GRC and Financial Crime, Fraud Prevention Mentorship Programme', '<p><strong>Introduction</strong><br>The Mentorship Programme under the Women in Governance, Risk, Compliance (GRC), and Financial Crime, Fraud Prevention Initiative is designed to empower, guide, and support women professionals. By fostering meaningful mentor-mentee relationships, the program aims to accelerate career growth, enhance skills, and create a collaborative community dedicated to advancing diversity and excellence in the industry.<br><br><strong>Programme Objectives</strong></p><ol><li><strong>Career Development:</strong> Provide guidance for professional advancement and leadership growth.</li><li><strong>Skill Enhancement:</strong> Support mentees in developing essential industry skills.</li><li><strong>Networking Opportunities</strong>: Facilitate connections with experienced professionals and industry leaders.</li><li><strong>Diversity Advocacy</strong>: Encourage gender equality and representation in senior roles across GRC and Financial Crime sectors.</li><li><strong>Knowledge Sharing:</strong> Promote the exchange of ideas, best practices, and industry insights.</li></ol><p><strong>Programme Structure</strong></p><ul><li>Eligibility:<br>Mentors: Experienced professionals with 8+ years in GRC, financial crime, or related industries.<br>Mentees: Women at any career stage, including students, entry-level professionals, and mid-level managers seeking growth.</li></ul><p><strong>Programme Duration:</strong></p><p>A structured 6- to 12-month engagement period, with an option to extend<br>based on mutual agreement.</p><p>&nbsp;</p><p><strong>Matching Process:</strong><br>Participants complete an application form highlighting their goals, expertise, and preferences.<br>The programme committee pairs mentors and mentees based on compatibility, goals, and areas of expertise.</p>', 'assets/images/mentorship/1736260922.jpg', '2025-01-07 13:42:02', '2025-01-07 14:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_invitations`
--

CREATE TABLE `mentor_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentor_invitations`
--

INSERT INTO `mentor_invitations` (`id`, `user_id`, `mentor_id`, `status`, `created_at`, `updated_at`) VALUES
(19, 11, 10, 'accepted', '2024-12-30 09:54:35', '2024-12-30 10:01:36'),
(20, 9, 10, 'accepted', '2025-01-06 09:25:01', '2025-01-06 09:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_users`
--

CREATE TABLE `mentor_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', '2024-12-10 01:54:50', '2024-12-10 01:54:50'),
(2, 'About', 'about', '2024-12-10 01:55:46', '2024-12-10 01:55:46'),
(3, 'Membership', 'membership', '2024-12-10 01:56:00', '2024-12-10 01:56:00'),
(4, 'Resource', 'resource', '2024-12-10 01:57:05', '2024-12-10 01:57:05'),
(5, 'Blog', 'blog', '2024-12-10 01:57:14', '2024-12-10 01:57:14'),
(6, 'Recognition', 'recognition', '2024-12-10 01:57:36', '2024-12-10 01:57:36'),
(7, 'Advisory Board', 'advisory-board', '2024-12-10 01:57:46', '2025-02-21 08:30:18'),
(8, 'Contact', 'contact', '2025-02-21 08:30:34', '2025-02-21 08:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `file_path`, `file_type`, `user_id`, `receiver_id`, `created_at`, `updated_at`) VALUES
(40, 'How are you', NULL, NULL, 10, 9, '2025-01-06 10:07:15', '2025-01-06 10:07:15'),
(41, 'Hop you day is going fine', NULL, NULL, 10, 9, '2025-01-06 10:08:07', '2025-01-06 10:08:07'),
(42, 'ITs going well', NULL, NULL, 9, 10, '2025-01-06 10:08:28', '2025-01-06 10:08:28'),
(44, '', 'http://127.0.0.1:8000/assets/uploads/1736735856_WhatsApp Image 2025-01-12 at 11.19.50.jpeg', NULL, 9, 10, '2025-01-13 01:37:36', '2025-01-13 01:37:36'),
(45, '', 'http://127.0.0.1:8000/storage/uploads/1736736168_WhatsAppImage2025-01-12at11.19.50.jpeg', NULL, 9, 10, '2025-01-13 01:42:48', '2025-01-13 01:42:48'),
(46, '   n', 'http://127.0.0.1:8000/app/public/uploads/1736736292_WhatsAppImage2025-01-12at11.19.50.jpeg', NULL, 9, 10, '2025-01-13 01:44:52', '2025-01-13 01:44:52'),
(47, 'nm', 'http://127.0.0.1:8000/storage/uploads/1736736529_WhatsAppImage2025-01-12at11.19.50.jpeg', NULL, 9, 10, '2025-01-13 01:48:49', '2025-01-13 01:48:49'),
(48, 'check', NULL, NULL, 9, 10, '2025-01-13 01:53:48', '2025-01-13 01:53:48'),
(49, 'img', 'http://127.0.0.1:8000/storage/uploads/1736737065_WhatsAppImage2025-01-12at11.19.50.jpeg', NULL, 9, 10, '2025-01-13 01:57:45', '2025-01-13 01:57:45'),
(50, 'cjec too', 'http://127.0.0.1:8000/storage/uploads/1736737244_product_ui.png', NULL, 10, 9, '2025-01-13 02:00:44', '2025-01-13 02:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_09_091814_create_contact_us_table', 1),
(6, '2024_12_09_091856_create_admins_table', 1),
(7, '2024_12_09_094956_create_sliders_table', 2),
(8, '2024_12_09_114823_create_abouts_table', 3),
(9, '2024_12_09_130309_create_contact_us_table', 4),
(10, '2024_12_09_142134_create_testimonials_table', 5),
(11, '2024_12_09_154450_create_sociallinks_table', 6),
(12, '2024_12_09_155109_create_vision_missions_table', 7),
(13, '2024_12_10_025143_create_menu_items_table', 8),
(14, '2024_12_10_025259_create_dropdown_items_table', 8),
(15, '2024_12_10_035605_create_faqs_table', 9),
(16, '2024_12_10_111523_create_blogs_table', 10),
(17, '2024_12_10_121621_create_comments_table', 11),
(18, '2024_12_10_135231_create_events_table', 12),
(19, '2024_12_10_194209_create_recognitions_table', 13),
(20, '2024_12_11_081205_create_privacy_policies_table', 14),
(21, '2024_12_11_081222_create_terms_conditions_table', 14),
(22, '2024_12_20_120257_create_newsletters_table', 15),
(23, '2024_12_27_124919_create_mentor_users_table', 16),
(24, '2024_12_27_125218_create_mentor_invitations_table', 16),
(25, '2024_12_27_133505_create_notifications_table', 17),
(26, '2025_01_03_093415_create_messages_table', 18),
(27, '2025_01_03_105723_create_messages_table', 19),
(28, '2025_01_06_091858_add_last_login_at_to_users_table', 20),
(29, '2025_01_07_133711_create_membership_contents_table', 21),
(30, '2025_01_07_143726_create_mentorship_contents_table', 22),
(31, '2025_01_07_151817_create_facilitator_contents_table', 23),
(32, '2025_01_10_100221_create_faq_stores_table', 24),
(33, '2025_01_13_013349_add_file_path_to_messages_table', 25),
(34, '2025_01_16_082150_create_facilitator_events_table', 26),
(35, '2025_02_21_091834_create_advisories_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('55280096-ccf0-4a7a-b2f4-f4ffc3dc9817', 'App\\Notifications\\MentorInvitationSentNotification', 'App\\Models\\User', 9, '{\"message\":\"You have sent an invitation to Victor Lewis to become a mentor.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/dashboard\"}', NULL, '2025-01-06 09:24:59', '2025-01-06 09:24:59'),
('73b3d82a-68c1-400d-aa5b-db3972e10ad6', 'App\\Notifications\\MentorInvitationNotification', 'App\\Models\\User', 10, '{\"message\":\"Victoria Wade has invited you to become a mentor.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/accept-mentor-invitation\\/eyJpdiI6ImVtQTl2VHJwR1VFYkxFTjJyUDQzbmc9PSIsInZhbHVlIjoiU29BTTdYc1JvU29uYVk2Tk0zUERuUT09IiwibWFjIjoiZjQ2ODQzNmRiYzllNTc3ODUyYmI2Yjk4MTc2YjZlOGZmNzE0ZDYyNTI1ZTcxZTE0MWZkNzg5NDg2ZmM4MzJlOCIsInRhZyI6IiJ9\"}', NULL, '2024-12-30 09:54:33', '2024-12-30 09:54:33'),
('8bfd71f1-80de-407b-b458-a4be78dab8a9', 'App\\Notifications\\MentorInvitationNotification', 'App\\Models\\User', 10, '{\"message\":\"Jenette Chapman has invited you to become a mentor.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/accept-mentor-invitation\\/eyJpdiI6IkR1Qy9VMVZwMlkwemxZWW83TnFQdmc9PSIsInZhbHVlIjoieExUeEQ3bmE5N2xzVGQwUndOR2s5QT09IiwibWFjIjoiMzlhYmUxNDcxNjAxMjE1MDBlNmRlZDM2OGY2NWVmYzRmMjJlMTZjZmNiNWU4ZDI0ODM4OGQwMGMzZjY3NzU2OCIsInRhZyI6IiJ9\"}', NULL, '2025-01-06 09:24:59', '2025-01-06 09:24:59'),
('b0b16d5e-40ed-4988-8b4a-0d88ff2130c5', 'App\\Notifications\\MentorInvitationSentNotification', 'App\\Models\\User', 11, '{\"message\":\"You have sent an invitation to Victor Lewis to become a mentor.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/dashboard\"}', NULL, '2024-12-30 09:54:33', '2024-12-30 09:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nyty@mailinator.com', '$2y$10$c54uK0h8lO69Le4Y72gqTeCYUYkrBnRrTvSETukVCcrpdmLp5.6We', '2025-01-06 07:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p>Coming soon</p>', '2024-12-11 07:22:12', '2024-12-11 07:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `recognitions`
--

CREATE TABLE `recognitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recognitions`
--

INSERT INTO `recognitions` (`id`, `name`, `position`, `content`, `image`, `created_at`, `updated_at`) VALUES
(3, 'FUNKE FEYISETAN LADIMEJI', 'Executive Director at Coronation Merchant Bank', '<p>Funke holds a Master\'s degree in Globalisation and a Bachelor\'s degree in Economics from Queen Mary and Brunel Universities respectively.<br>Funke is a Fellow of the Institute of Chartered Accountants of England &amp; Wales.<br>She was once the Executive Director and Chief Operating Officer at FBN Quest Merchant Bank Group<br>Funke is a transformational business leader in banking and financial services with nearly 30 years\' experiences<br>international&nbsp;</p><p>She has 14 years with global responsibilities in managing businesses at JP Morgan Chase in London<br>She also has eight years leading the development of an African investment bank.<br>She has a detailed knowledge of global markets and<br>investment banking products<br>She is presently the Executive Director at Coronation Merchant Bank<br>&nbsp;</p>', 'recognitions/1733899597.jpg', '2024-12-11 05:46:37', '2024-12-11 06:14:13'),
(4, 'DOROTHY JEFF NNAMANI', 'MD/CEO of Novo Health Africa Ltd.', '<p>Dorothy has technical and administrative expertise in managing large and complex health programmes spanning over 20 years with an in-depth knowledge of the Nigerian health sector acquired through research, programming, and managerial experience.<br>She was the former MD/CEO PHB Healthcare limited, a subsidiary of Bank PHB (HMO). &nbsp;</p><p>She holds a M.B.B.S in Medicine and Surgery from the University of Nsuka, Nigeria, MPH degree from the College of Medicine, University of Lagos, Nigeria, and an M.Sc. in Infectious Diseases, London, UK Dorothy is the MD/CEO of Novo Health Africa Ltd.<br>Her health care (Novo Health Africa Ltd), is accredited by the National Health Insurance Scheme (NHIS)</p>', 'recognitions/1733899786.jpg', '2024-12-11 05:49:46', '2024-12-11 06:14:24'),
(5, 'FURERA ISMA JUMARE', 'Member of the Board of Northern Nigeria Renewable Energy Company Limited', '<p>Furera had worked with the Central Bank of Nigeria for 21 years in the Development Finance and Other Financial Institutions Departments.<br>She retired from the CBN in 2009 to found her consulting firm, Micro Development Consulting Limited, where she led the firm\'s research, project management and capacity development activities.<br>She was also an Independent Director on the Board of Union Bank of Nigeria Plc. from 2017 until her appointment as Director General of InvestJigawa in September 2020.<br><br>She holds a Postgraduate Diploma in Financial Management from Abubakar Tafawa Balewa University<br>She holds a Bachelor of Science (B.Sc.) degree in Botany and three Master\'s degrees M.Sc. Crop Physiology and M.Sc. Rural Development from Ahmadu Bello University in Zaria, and M.A. International Development Management from University of Manchester for which she was awarded the Joint Japan/World Bank Graduate Scholarship<br>Furera Isma Jumare is the Director General of the Jigawa State Investment Promotion Agency (InvestJigawa)</p><p>She is currently a Member of the Board of Northern Nigeria Renewable Energy Company Limited by In March 2022 Furera was featured as one of 50 inspiring Nigerian women Business Day Newspaper</p>', 'recognitions/1733901000.jpg', '2024-12-11 06:10:00', '2024-12-11 06:10:00'),
(6, 'TINUOLA AKINBOLAGBE', 'Mentoring students and young professionals', '<p>She holds a degree in Medicine &amp; Surgery, graduating from the College of Medicine, University of Lagos<br>She also has a post-graduate Diploma and Master\'s in Public Health from the London School of Hygiene &amp; Tropical Medicine, University of London<br>Dr. Tinuola Akinbolagbe is the Chief Executive Officer (CEO) at Private Sector Health Alliance of Nigeria (PSHAN)<br>She moved to GlobeMed Healthcare Solutions, as the Medical Director<br>She joined Health Assur Ltd, as the pioneer MD/CEO</p><p>She also moved to the health diagnostics sector at Synlab Nigeria where she served as the Chief Executive Officer before joining the PSHAN team.<br>She is actively involved in mentoring students and young professionals and works with several charities and non- profits to raise funds for community health initiatives</p>', 'recognitions/1733901474.jpg', '2024-12-11 06:17:54', '2024-12-11 06:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `caption` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Empowering Women in GRC', 'Fostering Leadership and Innovation in Governance, Risk, and Compliance', 'assets/images/slider/1740414175-1StockCake-Corporate Presentation Engagement_1740413683.jpg', '2024-12-09 10:00:38', '2025-02-24 15:22:55'),
(5, 'Breaking Barriers in Financial Crime Prevention', 'Shaping a Future of Diversity, Excellence, and Inclusion', 'assets/images/slider/1733742409.jpg', '2024-12-09 10:06:49', '2024-12-09 10:06:49'),
(6, 'Collaborate. Lead. Inspire.', 'Building a Global Network for Women in Governance and Compliance', 'assets/images/slider/1733742542.jpg', '2024-12-09 10:09:02', '2024-12-09 10:09:02'),
(7, 'Join the Movement', 'Creating Opportunities for Women in GRC and Financial Crime Prevention', 'assets/images/slider/1733742814.jpg', '2024-12-09 10:13:34', '2024-12-09 10:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `facebook`, `twitter`, `whatsapp`, `instagram`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'www.facebook.com', 'www.twitter.com', 'www', 'instagram', 'linkedin', 'youtube', '2024-12-09 14:46:44', '2024-12-09 14:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p>Coming soon</p><p>&nbsp;</p>', '2024-12-11 07:17:23', '2024-12-11 07:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `content`, `image`, `author_name`, `author_title`, `created_at`, `updated_at`) VALUES
(2, '<p>\"Joining this initiative has been a transformative experience. The mentorship program helped me connect with inspiring leaders in GRC and financial crime prevention, guiding my career to new heights.\"</p>', NULL, 'Jane Doe', 'Compliance Officer, FinanceCorp', '2024-12-09 14:21:02', '2024-12-09 14:21:02'),
(3, '<p>\"The resource library is a game-changer. The blogs and case studies provide actionable insights that I’ve used to enhance my organization\'s governance practices.\"</p>', NULL, 'Mary Smith', 'Risk Manager, SafeBank', '2024-12-09 14:21:35', '2024-12-09 14:21:35'),
(4, '<p>\"Being part of this community has opened doors I never thought possible. The events and networking opportunities have connected me with like-minded professionals across industries.\"</p>', NULL, 'Anna Johnson', 'Fraud Analyst, SecureTech', '2024-12-09 14:22:06', '2024-12-09 14:22:06'),
(5, '<p>\"This initiative inspired me to take on leadership roles within my organization. The mentorship program truly empowers women to excel in governance and compliance.\"</p>', NULL, 'Susan Clark', 'GRC Consultant, InnovateCorp', '2024-12-09 14:22:36', '2024-12-09 14:22:36'),
(6, '<p>\"The diversity and inclusion initiatives showcased here give hope for a balanced future in boardrooms and executive teams worldwide.\"</p>', NULL, 'Emily Brown', 'Policy Advisor, GlobalEthics', '2024-12-09 14:23:08', '2024-12-09 14:23:08'),
(7, '<p>\"I’ve attended webinars and training sessions that were incredibly insightful and practical. They’ve improved my understanding of financial crime prevention strategies.\"</p>', NULL, 'Rachel Green', 'Senior Analyst, TrustBank', '2024-12-09 14:23:40', '2024-12-09 14:23:40'),
(8, '<p>\"The recognition awards inspired me to push boundaries in my career. This platform celebrates and uplifts women in remarkable ways.\"</p>', NULL, 'Linda Taylor', 'Head of Compliance, FinSafe', '2024-12-09 14:24:07', '2024-12-09 14:24:07'),
(9, '<p>\"I’ve connected with mentors and peers who have challenged me to grow both personally and professionally. This initiative is a beacon of empowerment for women in GRC.\"</p>', NULL, 'Nicole Walker', 'Fraud Investigator, InsightGroup', '2024-12-09 14:24:38', '2024-12-09 14:24:38'),
(10, '<p>\"The community forum is my go-to place for staying updated on trends in governance and financial crime prevention. The discussions are always engaging and thought-provoking.\"</p>', NULL, 'Olivia Carter', 'Compliance Specialist, ProSecure', '2024-12-09 14:25:05', '2024-12-09 14:25:05'),
(11, '<p>\"This platform not only provides resources but also inspires women like me to lead change within our organizations. It’s a must-join for anyone in the field.\"</p>', NULL, 'Patricia Lewis', 'Director, RiskPro', '2024-12-09 14:25:32', '2024-12-09 14:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` text DEFAULT NULL,
  `profile_picture` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `profile_picture`, `created_at`, `updated_at`, `last_login_at`) VALUES
(9, 'Jenette Chapman', 'eshanokpe@gmail.com', '2024-12-30 08:06:39', '$2y$10$q8EFS/TAt4c5z07NnQpJtOobkcZYRI8JlqBYuDjOM3aqDt2oQC6ra', 'b4TtVYMMOeNytbMcqIK7tTCDwX7AdEYUXTofCA4evhWHEWzMD8VATEmlSHap', 'advisory', NULL, '2024-12-16 12:03:27', '2025-01-06 07:50:22', NULL),
(10, 'Victor Lewis', 'nyty@mailinator.com', '2024-12-27 11:45:59', '$2y$10$Ak/4Wsp3FRhZCDPryu0qJujlJ81zZ4HEXBAaJyDfS/6XQIwjXTUs2', NULL, 'mentor', NULL, '2024-12-16 12:06:38', '2024-12-16 12:06:38', NULL),
(11, 'Victoria Wade', 'raqoruw@mailinator.com', '2024-12-27 11:45:35', '$2y$10$Ak/4Wsp3FRhZCDPryu0qJujlJ81zZ4HEXBAaJyDfS/6XQIwjXTUs2', NULL, 'mentor', NULL, '2024-12-16 12:08:14', '2024-12-16 12:08:14', NULL),
(12, 'Gloria Maynard', 'sirodav908@owube.com', '2024-12-16 13:05:01', '$2y$10$Ak/4Wsp3FRhZCDPryu0qJujlJ81zZ4HEXBAaJyDfS/6XQIwjXTUs2', NULL, 'mentor', NULL, '2024-12-16 12:31:32', '2024-12-16 13:05:01', NULL),
(13, 'Castor Huffman', 'lebequ@mailinator.com', NULL, '$2y$10$8ZujqvTI.QPACXqeBphRCegkvekorCB4AO8VKUEojd1BHACoD.mra', NULL, NULL, NULL, '2025-01-09 13:01:37', '2025-01-09 13:01:37', NULL),
(14, 'Edward Browning', 'qybaf@mailinator.com', NULL, '$2y$10$FPOCUQcMR9nzcvqdydnNNeMsDyBq2FLDqNBIaGrpO3WD8sCb8U/pW', NULL, NULL, NULL, '2025-01-09 13:03:59', '2025-01-09 13:03:59', NULL),
(15, 'Mary Stanton', 'wehakuves@mailinator.com', NULL, '$2y$10$sCA8QO10jgJ5bGqMr4rCTOrYDxjO45xR8Llrv6sRyGrIMJRpyMmzW', NULL, NULL, NULL, '2025-01-09 13:18:40', '2025-01-09 13:18:40', NULL),
(16, 'September Goodman', 'eshanokpe77@gmail.com', '2025-01-13 10:19:25', '$2y$10$jWZ3ez2mTnAAiAVDjZAdoeET6Fx7rf8Bj7t5B5rA6X88iv680PLaO', NULL, 'advisory', NULL, '2025-01-09 13:22:09', '2025-01-09 13:22:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vision_missions`
--

CREATE TABLE `vision_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mission` text NOT NULL,
  `mission_img` text NOT NULL,
  `vision` text NOT NULL,
  `vision_img` text NOT NULL,
  `purpose` text DEFAULT NULL,
  `purpose_img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vision_missions`
--

INSERT INTO `vision_missions` (`id`, `mission`, `mission_img`, `vision`, `vision_img`, `purpose`, `purpose_img`, `created_at`, `updated_at`) VALUES
(1, '<p>To advance the role of women in GRC and financial crime prevention by:</p><ul><li><strong>Promoting Leadership:</strong> Providing mentorship, training, and networking opportunities to prepare women for leadership roles.</li><li><strong>Advancing Expertise:</strong> Offering access to cutting-edge knowledge, resources, and best practices in governance, compliance, and fraud prevention.</li><li><strong>Fostering Inclusion:</strong> Advocating for diversity and equity in all sectors, driving systemic change to create a more balanced workforce.</li><li><strong>Upholding Integrity:</strong> Encouraging ethical practices and professional excellence to combat financial crime and build trust in organizations.</li><li><strong>Driving Collaboration:</strong> Connecting professionals across industries to share insights, develop solutions, and shape the future of GRC and financial crime prevention.</li></ul><p>This initiative will serve as a beacon of excellence, nurturing a community of empowered women who make meaningful contributions to their organizations, industries, and societies.</p><p><br>&nbsp;</p>', 'assets/images/mission/67585c36f245e.jpg', '<p>To empower and inspire women in Governance, Risk, Compliance (GRC), Financial Crime, and Fraud Prevention to lead with integrity, drive innovation, and shape a more ethical, inclusive, and secure global community</p>', 'assets/images/vision/675854b8a6bc5.jpg', 'To create a supportive platform that champions the advancement of women in GRC, financial crime, and fraud prevention by fostering leadership, professional growth, and collaboration across industries and sectors.', 'assets/images/purpose/675863da7b1a6.jpg', '2024-12-09 14:58:46', '2024-12-10 14:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advisories`
--
ALTER TABLE `advisories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`blog_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropdown_items_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitator_contents`
--
ALTER TABLE `facilitator_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitator_events`
--
ALTER TABLE `facilitator_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_stores`
--
ALTER TABLE `faq_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_contents`
--
ALTER TABLE `membership_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentorship_contents`
--
ALTER TABLE `mentorship_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_invitations`
--
ALTER TABLE `mentor_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_invitations_user_id_foreign` (`user_id`),
  ADD KEY `mentor_invitations_mentor_id_foreign` (`mentor_id`);

--
-- Indexes for table `mentor_users`
--
ALTER TABLE `mentor_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_users_user_id_foreign` (`user_id`),
  ADD KEY `mentor_users_mentor_id_foreign` (`mentor_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recognitions`
--
ALTER TABLE `recognitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vision_missions`
--
ALTER TABLE `vision_missions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advisories`
--
ALTER TABLE `advisories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilitator_contents`
--
ALTER TABLE `facilitator_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilitator_events`
--
ALTER TABLE `facilitator_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faq_stores`
--
ALTER TABLE `faq_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership_contents`
--
ALTER TABLE `membership_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mentorship_contents`
--
ALTER TABLE `mentorship_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mentor_invitations`
--
ALTER TABLE `mentor_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mentor_users`
--
ALTER TABLE `mentor_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recognitions`
--
ALTER TABLE `recognitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vision_missions`
--
ALTER TABLE `vision_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  ADD CONSTRAINT `dropdown_items_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mentor_invitations`
--
ALTER TABLE `mentor_invitations`
  ADD CONSTRAINT `mentor_invitations_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mentor_invitations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mentor_users`
--
ALTER TABLE `mentor_users`
  ADD CONSTRAINT `mentor_users_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mentor_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
