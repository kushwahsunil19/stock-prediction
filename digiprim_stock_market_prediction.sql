-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 05:50 PM
-- Server version: 5.7.40
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiprim_stock_market_prediction`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). &nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>', '2024-06-14 02:46:44', '2024-06-20 10:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `sprint` int(11) NOT NULL DEFAULT '0',
  `token_no` int(11) NOT NULL DEFAULT '0',
  `token_expiry_date` datetime DEFAULT NULL,
  `rule_of_competition` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `news_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `startdate`, `enddate`, `sprint`, `token_no`, `token_expiry_date`, `rule_of_competition`, `summary`, `news_heading`, `created_at`, `updated_at`) VALUES
(31, 'Competion 1', '2024-07-09', '2024-07-12', 2, 10, NULL, '<p>test competion 1&nbsp;<br />\r\nRule 1</p>', '<p>test summary</p>', 'Test heading', '2024-07-09 06:06:09', '2024-07-09 06:06:09'),
(36, 'competition 2', '2024-07-16', '2024-07-17', 1, 5, NULL, '<p>Competition 2<br />\r\nRule 1</p>', '<p>Competiition 2<br />\r\nSummary</p>', 'testing heading', '2024-07-16 10:22:13', '2024-07-16 10:22:13'),
(37, 'competition3', '2024-07-18', '2024-07-19', 2, 10, NULL, '<p>competition3<br />\r\nRule 1</p>', '<p>competition3</p>', 'Test Heading', '2024-07-18 08:54:08', '2024-07-18 08:54:08'),
(38, 'competition4', '2024-07-20', '2024-07-22', 2, 10, NULL, '<p>competition4<br />\r\nRule 1<br />\r\nRule 2</p>', '<p>Summary&nbsp;<br />\r\ncompetition4&nbsp;</p>', 'Test Heading', '2024-07-20 01:27:36', '2024-07-20 01:27:36'),
(39, 'Compétition numéro 4', '2024-07-23', '2024-07-25', 2, 5, NULL, '<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">1</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">3</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">4</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">5</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">6</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">7</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">8</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">9</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">10</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">11</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">12</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">13</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">14</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">15</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">16</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">17</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">19</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">21</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">23</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">24</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">25</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">26</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">27</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">28</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">29</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">30</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">31</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">32</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">33</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">34</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">35</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">36</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">37</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">38</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">39</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">40</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">41</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">42</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">43</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">44</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">45</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">47</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">48</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">49</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">52</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">53</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">54</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">55</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">57</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">58</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">59</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">60</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">62</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">63</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">64</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">65</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">66</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">67</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">68</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">69</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">70</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">71</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">72</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">73</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; text-align:right\">74</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<ul>\r\n	<li>Message d&#39;information1,Message d&#39;information2,Message d&#39;information3,Message d&#39;information4</li>\r\n	<li>Message d&#39;information1,Message d&#39;information2,Message d&#39;information3,Message d&#39;information4</li>\r\n	<li>Message d&#39;information1,Message d&#39;information2,Message d&#39;information3,Message d&#39;information4</li>\r\n	<li>Message d&#39;information1,Message d&#39;information2,Message d&#39;information3,Message d&#39;information4</li>\r\n</ul>', 'Message d\'information1,Message d\'information2,Message d\'information3,Message d\'information4', '2024-07-22 13:29:55', '2024-07-22 13:29:55'),
(45, 'Compétition numéro 5', '2024-07-26', '2024-07-29', 2, 9, NULL, '<p>rules comp 5</p>', '<p>how could i add content here where there is no competition?&nbsp;</p>\r\n\r\n<p>I should be able to add coherent content here when there is no competition.&nbsp;<a href=\"http://www.google.com\"> click here!</a></p>\r\n\r\n<p>&nbsp;</p>', 'This should not be connected to competition phase', '2024-07-26 17:51:25', '2024-07-26 17:51:25'),
(46, 'competiton 7', '2024-07-29', '2024-07-31', 2, 1, NULL, '<p>fdsaf</p>', '<p>rsera</p>', 'test', '2024-07-29 09:40:27', '2024-07-29 09:47:18'),
(47, 'competition 8', '2024-08-04', '2024-08-06', 2, 10, NULL, '<p>competition 8<br />\r\nRole 1<br />\r\nRole 2</p>', '<p>&nbsp;summery competition 8</p>', 'Testing', '2024-08-04 06:55:42', '2024-08-04 06:55:42'),
(49, 'Competition 9', '2024-08-17', '2024-08-20', 2, 10, NULL, '<p>Competion 9&nbsp;<br />\r\nRule 1<br />\r\nRule 2</p>', '<p>Testing&nbsp; heading 1</p>', 'Testing heading', '2024-08-16 23:42:47', '2024-08-16 23:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'stock_market', 'dddvk541@gmail.com', '2222266666', 'b.tech', 'nbsa dbn', '2024-06-27 06:36:15', '2024-06-27 06:36:15'),
(4, 'sunil', 'kushwahsunil19@gmail.com', 'test', 'test', 'test', '2024-08-02 08:29:55', '2024-08-02 08:29:55'),
(5, 'Mona Combs', 'tizo@mailinator.com', '32143214354', 'Deserunt quasi volup', 'Corporis nesciunt o', '2024-08-02 10:41:18', '2024-08-02 10:41:18'),
(6, 'Kenyon Mullins', 'zenuwi@mailinator.com', '124254345643654', 'Molestiae commodo au', 'Consectetur est nul', '2024-08-02 10:43:10', '2024-08-02 10:43:10'),
(7, 'Giacomo Christian', 'pyke@mailinator.com', '1234567890987', 'Dolorum id voluptas', 'Cumque nihil quia mi', '2024-08-02 12:51:30', '2024-08-02 12:51:30'),
(8, 'Adele Leach', 'vologozo@mailinator.com', '123456789087654', 'Consequatur maxime', 'Harum qui velit plac', '2024-08-02 12:52:48', '2024-08-02 12:52:48'),
(9, 'Breanna Kerr', 'kyrecemy@mailinator.com', '1234567890678', 'Et ipsum enim ut qu', 'Similique maiores ut', '2024-08-02 13:04:00', '2024-08-02 13:04:00'),
(10, 'Dertd', 'mob.test@gmail.com', '123456789012', 'Fbzj', 'Hard, not EASY', '2024-08-03 03:22:26', '2024-08-03 03:22:26'),
(11, 'Test', 'tesr@tedt', '1234567890', 'A', 'Test', '2024-08-04 17:58:24', '2024-08-04 17:58:24'),
(12, 'Zoe Munoz', 'kinu@mailinator.com', '1324675432', 'Quia optio assumend', 'Consectetur totam er', '2024-08-05 02:08:07', '2024-08-05 02:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `end_competition`
--

CREATE TABLE `end_competition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `end_competition`
--

INSERT INTO `end_competition` (`id`, `news_heading`, `summary`, `created_at`, `updated_at`) VALUES
(1, 'Competition is now over but you will be informed when it will comes back // Get free token for predicting stocks values', '<p>Testing Summary&nbsp;<a href=\"http://www.google.com\">click here</a></p>\r\n\r\n<p><img alt=\"alternative text?\" src=\"https://finance.yahoo.com/chart/EURUSD%3DX#eyJsYXlvdXQiOnsiaW50ZXJ2YWwiOiJ3ZWVrIiwicGVyaW9kaWNpdHkiOjEsInRpbWVVbml0IjpudWxsLCJjYW5kbGVXaWR0aCI6My40OTY5MTYwMjkxODgzNjgsImZsaXBwZWQiOmZhbHNlLCJ2b2x1bWVVbmRlcmxheSI6dHJ1ZSwiYWRqIjp0cnVlLCJjcm9zc2hhaXIiOnRydWUsImNoYXJ0VHlwZSI6Im1vdW50YWluIiwiZXh0ZW5kZWQiOmZhbHNlLCJtYXJrZXRTZXNzaW9ucyI6e30sImFnZ3JlZ2F0aW9uVHlwZSI6Im9obGMiLCJjaGFydFNjYWxlIjoibGluZWFyIiwicGFuZWxzIjp7ImNoYXJ0Ijp7InBlcmNlbnQiOjEsImRpc3BsYXkiOiJFVVJVU0Q9WCIsImNoYXJ0TmFtZSI6ImNoYXJ0IiwiaW5kZXgiOjAsInlBeGlzIjp7Im5hbWUiOiJjaGFydCIsInBvc2l0aW9uIjpudWxsfSwieWF4aXNMSFMiOltdLCJ5YXhpc1JIUyI6WyJjaGFydCIsIuKAjHZvbCB1bmRy4oCMIl19fSwic2V0U3BhbiI6eyJtdWx0aXBsaWVyIjo1LCJiYXNlIjoieWVhciIsInBlcmlvZGljaXR5Ijp7InBlcmlvZCI6MSwidGltZVVuaXQiOiJ3ZWVrIn0sInNob3dFdmVudHNRdW90ZSI6ZmFsc2V9LCJvdXRsaWVycyI6ZmFsc2UsImFuaW1hdGlvbiI6dHJ1ZSwiaGVhZHNVcCI6eyJzdGF0aWMiOnRydWUsImR5bmFtaWMiOmZhbHNlLCJmbG9hdGluZyI6ZmFsc2V9LCJsaW5lV2lkdGgiOjIsImZ1bGxTY3JlZW4iOnRydWUsInN0cmlwZWRCYWNrZ3JvdW5kIjp0cnVlLCJjb2xvciI6IiMwMDgxZjIiLCJzdHVkeUxlZ2VuZCI6eyJleHBhbmRlZCI6dHJ1ZX0sInN5bWJvbHMiOlt7InN5bWJvbCI6IkVVUlVTRD1YIiwic3ltYm9sT2JqZWN0Ijp7InN5bWJvbCI6IkVVUlVTRD1YIiwicXVvdGVUeXBlIjoiQ1VSUkVOQ1kiLCJleGNoYW5nZVRpbWVab25lIjoiRXVyb3BlL0xvbmRvbiIsInBlcmlvZDEiOjE0MTQ5NjkyMDAsInBlcmlvZDIiOjE3MjQ0MDcyMDB9LCJwZXJpb2RpY2l0eSI6MSwiaW50ZXJ2YWwiOiJ3ZWVrIiwidGltZVVuaXQiOm51bGwsInNldFNwYW4iOnsibXVsdGlwbGllciI6NSwiYmFzZSI6InllYXIiLCJwZXJpb2RpY2l0eSI6eyJwZXJpb2QiOjEsInRpbWVVbml0Ijoid2VlayJ9LCJzaG93RXZlbnRzUXVvdGUiOmZhbHNlfX1dLCJzdHVkaWVzIjp7IuKAjHZvbCB1bmRy4oCMIjp7InR5cGUiOiJ2b2wgdW5kciIsImlucHV0cyI6eyJTZXJpZXMiOiJzZXJpZXMiLCJpZCI6IuKAjHZvbCB1bmRy4oCMIiwiZGlzcGxheSI6IuKAjHZvbCB1bmRy4oCMIn0sIm91dHB1dHMiOnsiVXAgVm9sdW1lIjoiIzBkYmQ2ZWVlIiwiRG93biBWb2x1bWUiOiIjZmY1NTQ3ZWUifSwicGFuZWwiOiJjaGFydCIsInBhcmFtZXRlcnMiOnsiY2hhcnROYW1lIjoiY2hhcnQiLCJlZGl0TW9kZSI6dHJ1ZSwicGFuZWxOYW1lIjoiY2hhcnQifSwiZGlzYWJsZWQiOmZhbHNlfX19LCJldmVudHMiOnsiZGl2cyI6dHJ1ZSwic3BsaXRzIjp0cnVlLCJ0cmFkaW5nSG9yaXpvbiI6Im5vbmUiLCJzaWdEZXZFdmVudHMiOltdfSwicHJlZmVyZW5jZXMiOnsiY3VycmVudFByaWNlTGluZSI6dHJ1ZSwiZGlzcGxheUNyb3NzaGFpcnNXaXRoRHJhd2luZ1Rvb2wiOmZhbHNlLCJkcmFnZ2luZyI6eyJzZXJpZXMiOnRydWUsInN0dWR5IjpmYWxzZSwieWF4aXMiOnRydWV9LCJkcmF3aW5ncyI6bnVsbCwiaGlnaGxpZ2h0c1JhZGl1cyI6MTAsImhpZ2hsaWdodHNUYXBSYWRpdXMiOjMwLCJtYWduZXQiOmZhbHNlLCJob3Jpem9udGFsQ3Jvc3NoYWlyRmllbGQiOm51bGwsImxhYmVscyI6dHJ1ZSwibGFuZ3VhZ2UiOm51bGwsInRpbWVab25lIjoiRXVyb3BlL0xvbmRvbiIsIndoaXRlc3BhY2UiOjUwLCJ6b29tSW5TcGVlZCI6bnVsbCwiem9vbU91dFNwZWVkIjpudWxsLCJ6b29tQXRDdXJyZW50TW91c2VQb3NpdGlvbiI6ZmFsc2V9fQ--\" /></p>', '2024-08-17 06:34:47', '2024-08-27 13:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legal_note`
--

CREATE TABLE `legal_note` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_note`
--

INSERT INTO `legal_note` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Legal Note', '<h2>Est ce que cela marche?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>The stock market today saw a blend of volatility and gains as investors reacted to a mix of economic data and corporate earnings reports. Major indices fluctuated throughout the day, with the S&amp;P 500 and Nasdaq Composite showing resilience despite global market uncertainties. Market analysts noted increased trading volumes in technology and healthcare sectors, highlighting investor confidence in these industries. Meanwhile, geopolitical tensions and interest rate speculations continued to play a pivotal role in shaping market sentiment. Overall, the trading day ended with a cautious optimism as investors awaited key economic indicators scheduled for release later in the week.</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>', '2024-06-19 08:22:19', '2024-07-22 13:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_04_24_064452_create_alter_column_user_table', 1),
(11, '2024_05_02_061845_create_otp_table', 1),
(12, '2024_05_08_073402_create_competitions_table', 1),
(13, '2024_05_10_093148_create_quiz_table', 1),
(14, '2024_05_18_061219_create_participants_table', 1),
(15, '2024_05_29_085113_create_participant_answer_table', 2),
(16, '2024_05_29_130313_create_participant_competition_table', 3),
(17, '2024_05_29_131608_create_participant_answer_table', 4),
(18, '2024_06_01_125121_create_question_type_table', 5),
(19, '2024_06_01_134813_create_question_type_table', 6),
(20, '2024_06_02_093727_create_question_type_table', 7),
(21, '2024_06_02_133315_create_question_type_table', 8),
(22, '2024_06_05_063648_create_user_register_dates_table', 9),
(23, '2024_06_06_110646_create_about_us_table', 10),
(24, '2024_06_12_120238_create_contact_us_table', 10),
(25, '2024_06_12_120712_create_about_us_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `used_token` smallint(6) UNSIGNED DEFAULT '0',
  `token_expiry_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `competition_id`, `user_id`, `token`, `used_token`, `token_expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(205, 31, 219, NULL, 1, '2024-07-12 23:59:59', 1, '2024-07-09 06:06:59', '2024-07-09 06:12:13'),
(206, 31, 220, NULL, 3, '2024-07-12 23:59:59', 1, '2024-07-09 06:27:54', '2024-07-09 06:43:21'),
(208, 31, 222, NULL, 1, '2024-07-10 23:59:59', 1, '2024-07-09 08:54:56', '2024-07-09 08:55:44'),
(209, 31, 223, NULL, 1, '2024-07-11 23:59:59', 1, '2024-07-09 08:57:58', '2024-07-09 08:58:44'),
(210, 31, 224, NULL, 2, '2024-07-10 23:59:59', 1, '2024-07-09 09:03:53', '2024-07-09 09:04:56'),
(212, 31, 226, NULL, 2, '2024-07-10 23:59:59', 1, '2024-07-09 09:57:51', '2024-07-09 10:15:23'),
(213, 31, 227, NULL, 7, '2024-07-10 23:59:59', 1, '2024-07-09 18:27:06', '2024-07-11 12:02:59'),
(214, 31, 228, NULL, 10, '2024-07-10 23:59:59', 1, '2024-07-09 18:37:20', '2024-07-09 18:43:34'),
(216, 31, 230, NULL, 1, '2024-07-10 23:59:59', 1, '2024-07-10 01:10:35', '2024-07-10 01:11:05'),
(218, 31, 231, NULL, 1, '2024-07-10 23:59:59', 1, '2024-07-10 05:51:04', '2024-07-10 05:53:56'),
(221, 31, 234, NULL, 2, '2024-07-10 23:59:59', 1, '2024-07-10 09:29:06', '2024-07-10 09:42:22'),
(222, 31, 235, NULL, 5, '2024-07-10 23:59:59', 1, '2024-07-10 19:08:03', '2024-07-13 11:09:19'),
(223, 31, 236, NULL, 1, '2024-07-10 23:59:59', 1, '2024-07-12 07:06:47', '2024-07-12 07:13:51'),
(235, 36, 235, NULL, 5, '2024-07-16 23:59:59', 1, '2024-07-16 10:23:14', '2024-07-16 21:31:13'),
(236, 36, 236, NULL, 2, '2024-07-16 23:59:59', 1, '2024-07-16 10:24:34', '2024-07-16 10:31:49'),
(238, 36, 235, NULL, 5, '2024-07-16 23:59:59', 1, '2024-07-16 10:26:11', '2024-07-16 21:31:13'),
(240, 36, 240, NULL, 1, '2024-07-16 23:59:59', 1, '2024-07-16 10:33:19', '2024-07-16 10:33:53'),
(242, 36, 226, NULL, 0, NULL, 0, '2024-07-16 10:43:26', '2024-07-16 10:43:26'),
(243, 36, 248, NULL, 4, '2024-07-16 23:59:59', 1, '2024-07-16 11:17:24', '2024-07-17 11:00:48'),
(244, 36, 249, NULL, 3, '2024-07-16 23:59:59', 1, '2024-07-16 11:19:17', '2024-07-16 11:20:29'),
(248, 36, 235, NULL, 5, '2024-07-16 23:59:59', 1, '2024-07-16 15:26:13', '2024-07-16 21:31:13'),
(250, 36, 250, NULL, 2, '2024-07-16 23:59:59', 1, '2024-07-16 21:17:55', '2024-07-17 06:30:16'),
(254, 36, 251, NULL, 1, '2024-07-16 23:59:59', 1, '2024-07-17 01:23:49', '2024-07-17 01:24:14'),
(261, 37, 236, NULL, 5, '2024-07-19 23:59:59', 1, '2024-07-18 08:55:07', '2024-07-18 10:01:31'),
(264, 37, 235, NULL, 0, NULL, 0, '2024-07-18 09:18:21', '2024-07-18 09:18:21'),
(270, 37, 236, NULL, 0, NULL, 0, '2024-07-18 10:21:48', '2024-07-18 10:21:48'),
(271, 37, 255, NULL, 3, '2024-07-20 23:59:59', 1, '2024-07-19 06:57:19', '2024-07-19 13:12:45'),
(272, 37, 256, NULL, 1, '2024-07-19 23:59:59', 1, '2024-07-19 07:04:02', '2024-07-19 07:11:59'),
(274, 37, 257, NULL, 0, NULL, 0, '2024-07-19 07:24:47', '2024-07-19 07:24:47'),
(275, 37, 259, NULL, 7, '2024-07-20 23:59:59', 1, '2024-07-19 08:48:59', '2024-07-19 12:00:51'),
(282, 37, 260, NULL, 1, '2024-07-20 23:59:59', 1, '2024-07-19 12:03:17', '2024-07-19 12:05:04'),
(283, 37, 240, NULL, 7, '2024-07-20 23:59:59', 1, '2024-07-19 12:06:32', '2024-07-19 13:32:16'),
(284, 38, 261, NULL, 3, '2024-07-20 23:59:59', 1, '2024-07-20 01:30:14', '2024-07-20 08:09:31'),
(285, 38, 236, NULL, 1, '2024-07-20 23:59:59', 1, '2024-07-20 08:09:51', '2024-07-20 08:10:01'),
(286, 38, 235, NULL, 4, '2024-07-20 23:59:59', 1, '2024-07-20 12:59:42', '2024-07-20 13:03:09'),
(287, 38, 255, NULL, 2, '2024-07-20 23:59:59', 1, '2024-07-20 13:05:53', '2024-07-20 13:09:05'),
(288, 38, 262, NULL, 1, '2024-07-22 23:59:59', 1, '2024-07-22 02:47:56', '2024-07-22 02:48:12'),
(289, 38, 260, NULL, 1, '2024-07-22 23:59:59', 1, '2024-07-22 10:00:12', '2024-07-22 10:00:20'),
(290, 39, 263, NULL, 3, '2024-07-23 23:59:59', 1, '2024-07-22 18:59:16', '2024-07-22 19:08:58'),
(291, 39, 235, NULL, 3, '2024-07-23 23:59:59', 1, '2024-07-22 19:11:11', '2024-07-22 19:18:48'),
(292, 39, 236, NULL, 2, '2024-07-23 23:59:59', 1, '2024-07-23 01:12:22', '2024-07-23 09:39:49'),
(293, 39, 228, NULL, 1, '2024-07-23 23:59:59', 1, '2024-07-23 10:09:46', '2024-07-23 10:09:57'),
(295, 45, 255, NULL, 3, '2024-07-29 23:59:59', 1, '2024-07-26 18:03:58', '2024-07-28 11:28:47'),
(296, 45, 235, NULL, 4, '2024-07-28 23:59:59', 1, '2024-07-26 18:05:17', '2024-07-27 12:41:43'),
(298, 45, 236, NULL, 3, '2024-07-29 23:59:59', 1, '2024-07-27 10:48:00', '2024-07-28 00:16:04'),
(299, 45, 264, NULL, 8, '2024-07-28 23:59:59', 1, '2024-07-27 12:48:20', '2024-07-27 12:50:02'),
(300, 45, 265, NULL, 2, '2024-07-28 23:59:59', 1, '2024-07-27 13:19:26', '2024-07-27 13:24:07'),
(301, 45, 266, NULL, 1, '2024-07-28 23:59:59', 1, '2024-07-27 13:50:55', '2024-07-27 13:51:27'),
(302, 45, 260, NULL, 1, '2024-07-30 23:59:59', 1, '2024-07-29 07:32:28', '2024-07-29 07:32:54'),
(303, 46, 236, NULL, 1, '2024-07-29 23:59:59', 1, '2024-07-29 09:44:35', '2024-07-29 09:44:53'),
(304, 46, 235, NULL, 1, '2024-07-29 23:59:59', 1, '2024-07-29 13:28:35', '2024-07-29 13:29:06'),
(305, 46, 240, NULL, 1, '2024-07-30 23:59:59', 1, '2024-07-30 03:42:21', '2024-07-30 03:42:47'),
(306, 47, 236, NULL, 2, '2024-08-05 23:59:59', 1, '2024-08-04 06:57:35', '2024-08-05 01:54:46'),
(307, 47, 268, NULL, 1, '2024-08-04 23:59:59', 1, '2024-08-04 10:27:54', '2024-08-04 10:33:11'),
(308, 47, 235, NULL, 5, '2024-08-05 23:59:59', 1, '2024-08-04 18:04:42', '2024-08-05 12:30:00'),
(309, 47, 269, NULL, 1, '2024-08-06 23:59:59', 1, '2024-08-06 03:51:15', '2024-08-06 03:51:43'),
(310, 47, 270, NULL, 1, '2024-08-06 23:59:59', 1, '2024-08-06 14:14:43', '2024-08-06 14:15:33'),
(314, 49, 236, NULL, 1, '2024-08-18 23:59:59', 1, '2024-08-17 00:03:52', '2024-08-17 00:04:15'),
(315, 49, 273, NULL, 2, '2024-08-18 23:59:59', 1, '2024-08-17 00:08:50', '2024-08-17 00:45:52'),
(316, 49, 274, NULL, 0, NULL, 0, '2024-08-17 01:14:41', '2024-08-17 01:14:41'),
(317, 49, 235, NULL, 1, '2024-08-19 23:59:59', 1, '2024-08-17 10:44:13', '2024-08-18 07:31:40'),
(318, 49, 275, NULL, 3, '2024-08-19 23:59:59', 1, '2024-08-18 06:54:53', '2024-08-18 06:55:31'),
(319, 49, 276, NULL, 2, '2024-08-21 23:59:59', 1, '2024-08-18 06:59:18', '2024-08-19 18:32:20'),
(320, 49, 277, NULL, 1, '2024-08-21 23:59:59', 1, '2024-08-18 07:04:00', '2024-08-19 18:33:49'),
(321, 49, 1, NULL, 0, NULL, 0, '2024-08-20 00:04:29', '2024-08-20 00:04:29'),
(322, 49, 278, NULL, 2, '2024-08-21 23:59:59', 1, '2024-08-20 06:00:19', '2024-08-20 06:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `participant_answer`
--

CREATE TABLE `participant_answer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `com_participant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `p_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participant_answer`
--

INSERT INTO `participant_answer` (`id`, `com_participant_id`, `question_id`, `p_answer`, `created_at`, `updated_at`) VALUES
(228, 284, 24, '102.00', '2024-07-09 06:12:43', '2024-07-09 06:12:43'),
(229, 284, 25, 'C', '2024-07-09 06:12:43', '2024-07-09 06:12:43'),
(230, 286, 24, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(231, 286, 25, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(232, 290, 24, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(233, 290, 25, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(234, 292, 24, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(235, 292, 25, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(236, 294, 24, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(237, 294, 25, NULL, '2024-07-09 10:00:06', '2024-07-09 10:00:06'),
(238, 303, 24, '100.00', '2024-07-09 18:30:17', '2024-07-09 18:30:17'),
(239, 303, 25, 'A', '2024-07-09 18:30:17', '2024-07-09 18:30:17'),
(240, 302, 24, '456', '2024-07-09 18:30:45', '2024-07-09 18:30:45'),
(241, 302, 25, 'B', '2024-07-09 18:30:45', '2024-07-09 18:30:45'),
(244, 324, 24, '101.00', '2024-07-10 09:42:34', '2024-07-10 09:42:34'),
(245, 324, 25, 'A', '2024-07-10 09:42:34', '2024-07-10 09:42:34'),
(246, 298, 24, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(247, 298, 25, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(248, 310, 24, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(249, 310, 25, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(250, 318, 24, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(251, 318, 25, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(252, 322, 24, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(253, 322, 25, NULL, '2024-07-10 10:00:03', '2024-07-10 10:00:03'),
(254, 326, 24, '455', '2024-07-10 19:11:11', '2024-07-10 19:11:11'),
(255, 326, 25, 'A', '2024-07-10 19:11:11', '2024-07-10 19:11:11'),
(256, 331, 24, '945', '2024-07-11 10:30:13', '2024-07-11 10:30:13'),
(257, 331, 25, 'D', '2024-07-11 10:30:13', '2024-07-11 10:30:13'),
(258, 334, 24, NULL, '2024-07-12 10:00:04', '2024-07-12 10:00:04'),
(259, 334, 25, NULL, '2024-07-12 10:00:04', '2024-07-12 10:00:04'),
(260, 336, 24, '456', '2024-07-13 11:09:42', '2024-07-13 11:09:42'),
(261, 336, 25, 'B', '2024-07-13 11:09:42', '2024-07-13 11:09:42'),
(266, 345, 29, '10.00', '2024-07-16 10:25:01', '2024-07-16 10:25:01'),
(267, 346, 29, '19', '2024-07-16 10:26:52', '2024-07-16 10:26:52'),
(268, 355, 29, '14', '2024-07-16 21:31:38', '2024-07-16 21:31:38'),
(269, 356, 29, '20.00', '2024-07-17 01:24:21', '2024-07-17 01:24:21'),
(270, 348, 29, NULL, '2024-07-17 10:00:09', '2024-07-17 10:00:09'),
(271, 349, 29, NULL, '2024-07-17 10:00:09', '2024-07-17 10:00:09'),
(272, 353, 29, NULL, '2024-07-17 10:00:09', '2024-07-17 10:00:09'),
(273, 358, 29, '12.0011', '2024-07-17 11:01:26', '2024-07-17 11:01:26'),
(274, 359, 29, '12.@', '2024-07-17 11:13:16', '2024-07-17 11:13:16'),
(275, 359, 29, '12.@', '2024-07-17 11:13:20', '2024-07-17 11:13:20'),
(294, 407, 31, 'Yes', '2024-07-20 01:51:12', '2024-07-20 01:51:12'),
(295, 407, 32, '100.00', '2024-07-20 01:51:12', '2024-07-20 01:51:12'),
(296, 408, 31, NULL, '2024-07-20 02:06:39', '2024-07-20 02:06:39'),
(297, 408, 32, NULL, '2024-07-20 02:06:39', '2024-07-20 02:06:39'),
(298, 409, 31, NULL, '2024-07-20 02:06:39', '2024-07-20 02:06:39'),
(299, 409, 32, NULL, '2024-07-20 02:06:39', '2024-07-20 02:06:39'),
(300, 410, 31, NULL, '2024-07-20 02:06:39', '2024-07-20 02:06:39'),
(301, 410, 32, NULL, '2024-07-20 02:06:39', '2024-07-20 02:06:39'),
(302, 413, 31, 'Yes', '2024-07-20 08:10:17', '2024-07-20 08:10:17'),
(303, 413, 32, '100.10', '2024-07-20 08:10:17', '2024-07-20 08:10:17'),
(304, 411, 31, NULL, '2024-07-20 08:10:25', '2024-07-20 08:10:25'),
(305, 411, 32, NULL, '2024-07-20 08:10:25', '2024-07-20 08:10:25'),
(306, 412, 31, NULL, '2024-07-20 08:10:25', '2024-07-20 08:10:25'),
(307, 412, 32, NULL, '2024-07-20 08:10:25', '2024-07-20 08:10:25'),
(308, 414, 31, NULL, '2024-07-20 08:10:25', '2024-07-20 08:10:25'),
(309, 414, 32, NULL, '2024-07-20 08:10:25', '2024-07-20 08:10:25'),
(310, 415, 31, 'Yes', '2024-07-20 13:01:05', '2024-07-20 13:01:05'),
(311, 415, 32, '454.00', '2024-07-20 13:01:05', '2024-07-20 13:01:05'),
(312, 416, 31, 'No', '2024-07-20 13:01:45', '2024-07-20 13:01:45'),
(313, 416, 32, '452.10', '2024-07-20 13:01:45', '2024-07-20 13:01:45'),
(314, 417, 31, 'Yes', '2024-07-20 13:03:32', '2024-07-20 13:03:32'),
(315, 417, 32, '222.00', '2024-07-20 13:03:32', '2024-07-20 13:03:32'),
(316, 418, 31, 'Yes', '2024-07-20 13:04:08', '2024-07-20 13:04:08'),
(317, 418, 32, '223.12', '2024-07-20 13:04:08', '2024-07-20 13:04:08'),
(318, 420, 31, 'No', '2024-07-20 13:09:56', '2024-07-20 13:09:56'),
(319, 420, 32, '165.20', '2024-07-20 13:09:56', '2024-07-20 13:09:56'),
(320, 419, 31, NULL, '2024-07-21 10:00:08', '2024-07-21 10:00:08'),
(321, 419, 32, NULL, '2024-07-21 10:00:08', '2024-07-21 10:00:08'),
(322, 421, 31, 'No', '2024-07-22 02:49:51', '2024-07-22 02:49:51'),
(323, 421, 32, '110.00', '2024-07-22 02:49:51', '2024-07-22 02:49:51'),
(324, 422, 31, NULL, '2024-07-22 02:58:21', '2024-07-22 02:58:21'),
(325, 422, 32, NULL, '2024-07-22 02:58:21', '2024-07-22 02:58:21'),
(326, 426, 33, '25997.10', '2024-07-22 19:05:38', '2024-07-22 19:05:38'),
(327, 426, 34, '@3', '2024-07-22 19:05:38', '2024-07-22 19:05:38'),
(328, 430, 33, '29999.68', '2024-07-22 19:09:38', '2024-07-22 19:09:38'),
(329, 430, 34, 'é1', '2024-07-22 19:09:38', '2024-07-22 19:09:38'),
(330, 431, 33, '28000.51', '2024-07-22 19:13:46', '2024-07-22 19:13:46'),
(331, 431, 34, 'é1', '2024-07-22 19:13:46', '2024-07-22 19:13:46'),
(332, 432, 33, '28000.52', '2024-07-22 19:13:46', '2024-07-22 19:13:46'),
(333, 432, 34, 'é1', '2024-07-22 19:13:46', '2024-07-22 19:13:46'),
(334, 433, 33, '28000.53', '2024-07-22 19:18:04', '2024-07-22 19:18:04'),
(335, 433, 34, 'à2', '2024-07-22 19:18:05', '2024-07-22 19:18:05'),
(336, 434, 33, '28000.54', '2024-07-22 19:18:05', '2024-07-22 19:18:05'),
(337, 434, 34, 'à2', '2024-07-22 19:18:05', '2024-07-22 19:18:05'),
(338, 437, 33, '10001.00', '2024-07-23 01:24:16', '2024-07-23 01:24:16'),
(339, 437, 34, '@3', '2024-07-23 01:24:16', '2024-07-23 01:24:16'),
(340, 423, 31, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(341, 423, 32, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(342, 424, 31, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(343, 424, 32, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(344, 425, 33, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(345, 425, 34, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(346, 427, 33, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(347, 427, 34, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(348, 428, 33, NULL, '2024-07-23 10:00:04', '2024-07-23 10:00:04'),
(349, 428, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(350, 429, 33, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(351, 429, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(352, 435, 33, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(353, 435, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(354, 436, 33, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(355, 436, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(356, 438, 33, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(357, 438, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(358, 439, 33, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(359, 439, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(360, 440, 33, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(361, 440, 34, NULL, '2024-07-23 10:00:05', '2024-07-23 10:00:05'),
(362, 442, 33, '25000.51', '2024-07-23 10:11:45', '2024-07-23 10:11:45'),
(363, 442, 34, '@3', '2024-07-23 10:11:45', '2024-07-23 10:11:45'),
(364, 441, 33, NULL, '2024-07-24 10:00:05', '2024-07-24 10:00:05'),
(365, 441, 34, NULL, '2024-07-24 10:00:05', '2024-07-24 10:00:05'),
(368, 446, 37, 'c', '2024-07-26 18:19:44', '2024-07-26 18:19:44'),
(369, 446, 38, '5678.91', '2024-07-26 18:19:44', '2024-07-26 18:19:44'),
(370, 447, 37, 'c', '2024-07-26 18:22:12', '2024-07-26 18:22:12'),
(371, 447, 38, '10000.10', '2024-07-26 18:22:12', '2024-07-26 18:22:12'),
(372, 448, 37, NULL, '2024-07-27 10:00:05', '2024-07-27 10:00:05'),
(373, 448, 38, NULL, '2024-07-27 10:00:05', '2024-07-27 10:00:05'),
(374, 445, 37, NULL, '2024-07-27 10:00:05', '2024-07-27 10:00:05'),
(375, 445, 38, NULL, '2024-07-27 10:00:05', '2024-07-27 10:00:05'),
(376, 449, 37, 'c', '2024-07-27 10:53:11', '2024-07-27 10:53:11'),
(377, 449, 38, '5000.00', '2024-07-27 10:53:11', '2024-07-27 10:53:11'),
(378, 451, 37, 'c', '2024-07-27 12:42:55', '2024-07-27 12:42:55'),
(379, 451, 38, '19508.89', '2024-07-27 12:42:55', '2024-07-27 12:42:55'),
(380, 453, 37, 'c', '2024-07-27 12:45:28', '2024-07-27 12:45:28'),
(381, 453, 38, '20000.00', '2024-07-27 12:45:28', '2024-07-27 12:45:28'),
(382, 455, 37, 'c', '2024-07-27 12:50:50', '2024-07-27 12:50:50'),
(383, 455, 38, '15000.20', '2024-07-27 12:50:50', '2024-07-27 12:50:50'),
(384, 457, 37, 'c', '2024-07-27 13:23:11', '2024-07-27 13:23:11'),
(385, 457, 38, '5000.00', '2024-07-27 13:23:11', '2024-07-27 13:23:11'),
(386, 450, 37, 'd', '2024-07-28 00:11:37', '2024-07-28 00:11:37'),
(387, 450, 38, '5001.00', '2024-07-28 00:11:37', '2024-07-28 00:11:37'),
(388, 461, 37, 'c', '2024-07-28 00:12:47', '2024-07-28 00:12:47'),
(389, 461, 38, '5002.00', '2024-07-28 00:12:47', '2024-07-28 00:12:47'),
(390, 462, 37, 'c', '2024-07-28 00:16:36', '2024-07-28 00:16:36'),
(391, 462, 38, '5004.00', '2024-07-28 00:16:36', '2024-07-28 00:16:36'),
(392, 454, 37, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(393, 454, 38, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(394, 452, 37, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(395, 452, 38, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(396, 465, 37, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(397, 465, 38, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(398, 456, 37, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(399, 456, 38, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(400, 459, 37, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(401, 459, 38, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(402, 463, 37, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(403, 463, 38, NULL, '2024-07-28 10:00:07', '2024-07-28 10:00:07'),
(404, 468, 37, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(405, 468, 38, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(406, 466, 37, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(407, 466, 38, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(408, 458, 37, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(409, 458, 38, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(410, 460, 37, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(411, 460, 38, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(412, 464, 37, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(413, 464, 38, NULL, '2024-07-29 10:00:04', '2024-07-29 10:00:04'),
(414, 469, 37, NULL, '2024-07-29 10:00:05', '2024-07-29 10:00:05'),
(415, 469, 38, NULL, '2024-07-29 10:00:05', '2024-07-29 10:00:05'),
(416, 471, 39, NULL, '2024-07-29 10:00:05', '2024-07-29 10:00:05'),
(417, 473, 39, '19.10', '2024-07-29 13:29:58', '2024-07-29 13:29:58'),
(418, 470, 37, NULL, '2024-07-30 10:00:04', '2024-07-30 10:00:04'),
(419, 470, 38, NULL, '2024-07-30 10:00:04', '2024-07-30 10:00:04'),
(420, 472, 39, NULL, '2024-07-30 10:00:04', '2024-07-30 10:00:04'),
(421, 475, 39, NULL, '2024-07-30 10:00:04', '2024-07-30 10:00:04'),
(422, 474, 39, NULL, '2024-07-31 10:00:05', '2024-07-31 10:00:05'),
(423, 476, 39, NULL, '2024-07-31 10:00:05', '2024-07-31 10:00:05'),
(424, 477, 40, '10.00', '2024-08-04 06:59:34', '2024-08-04 06:59:34'),
(425, 479, 40, '99.00', '2024-08-04 10:34:17', '2024-08-04 10:34:17'),
(426, 478, 40, '11.00', '2024-08-05 09:08:59', '2024-08-05 09:08:59'),
(427, 485, 40, NULL, '2024-08-05 10:00:05', '2024-08-05 10:00:05'),
(428, 480, 40, NULL, '2024-08-05 10:00:05', '2024-08-05 10:00:05'),
(429, 482, 40, NULL, '2024-08-05 10:00:05', '2024-08-05 10:00:05'),
(430, 483, 40, NULL, '2024-08-05 10:00:05', '2024-08-05 10:00:05'),
(431, 487, 40, '45h20', '2024-08-05 10:41:09', '2024-08-05 10:41:09'),
(432, 488, 40, '54.00', '2024-08-05 12:12:32', '2024-08-05 12:12:32'),
(433, 490, 40, '55.67', '2024-08-05 12:32:50', '2024-08-05 12:32:50'),
(434, 491, 40, '45.10', '2024-08-06 03:55:01', '2024-08-06 03:55:01'),
(435, 486, 40, NULL, '2024-08-06 10:00:05', '2024-08-06 10:00:05'),
(436, 484, 40, NULL, '2024-08-06 10:00:06', '2024-08-06 10:00:06'),
(437, 493, 40, '10.00', '2024-08-06 14:15:42', '2024-08-06 14:15:42'),
(438, 492, 40, NULL, '2024-08-07 10:00:04', '2024-08-07 10:00:04'),
(439, 494, 40, NULL, '2024-08-07 10:00:04', '2024-08-07 10:00:04'),
(440, 489, 40, '85.00', '2024-08-07 14:10:16', '2024-08-07 14:10:16'),
(441, 495, 41, '1000.00', '2024-08-17 00:04:38', '2024-08-17 00:04:38'),
(442, 495, 42, 'A', '2024-08-17 00:04:38', '2024-08-17 00:04:38'),
(443, 497, 41, '151.00', '2024-08-17 00:45:32', '2024-08-17 00:45:32'),
(444, 497, 42, 'B', '2024-08-17 00:45:32', '2024-08-17 00:45:32'),
(445, 499, 41, NULL, '2024-08-17 08:00:08', '2024-08-17 08:00:08'),
(446, 499, 42, NULL, '2024-08-17 08:00:08', '2024-08-17 08:00:08'),
(447, 502, 41, '400.22', '2024-08-18 06:56:39', '2024-08-18 06:56:39'),
(448, 502, 42, 'A', '2024-08-18 06:56:39', '2024-08-18 06:56:39'),
(449, 503, 41, '500.10', '2024-08-18 07:00:58', '2024-08-18 07:00:58'),
(450, 503, 42, 'A', '2024-08-18 07:00:58', '2024-08-18 07:00:58'),
(451, 496, 41, NULL, '2024-08-18 08:00:04', '2024-08-18 08:00:04'),
(452, 496, 42, NULL, '2024-08-18 08:00:04', '2024-08-18 08:00:04'),
(453, 505, 41, NULL, '2024-08-18 08:00:04', '2024-08-18 08:00:04'),
(454, 505, 42, NULL, '2024-08-18 08:00:04', '2024-08-18 08:00:04'),
(455, 501, 41, NULL, '2024-08-18 08:00:04', '2024-08-18 08:00:04'),
(456, 501, 42, NULL, '2024-08-18 08:00:04', '2024-08-18 08:00:04'),
(457, 498, 41, NULL, '2024-08-19 08:00:04', '2024-08-19 08:00:04'),
(458, 498, 42, NULL, '2024-08-19 08:00:04', '2024-08-19 08:00:04'),
(459, 506, 41, NULL, '2024-08-19 08:00:04', '2024-08-19 08:00:04'),
(460, 506, 42, NULL, '2024-08-19 08:00:04', '2024-08-19 08:00:04'),
(461, 504, 41, NULL, '2024-08-19 08:00:04', '2024-08-19 08:00:04'),
(462, 504, 42, NULL, '2024-08-19 08:00:04', '2024-08-19 08:00:04'),
(463, 509, 41, '400.13', '2024-08-19 18:35:12', '2024-08-19 18:35:12'),
(464, 509, 42, 'B', '2024-08-19 18:35:12', '2024-08-19 18:35:12'),
(465, 511, 41, '101.00', '2024-08-20 06:02:58', '2024-08-20 06:02:58'),
(466, 511, 42, 'B', '2024-08-20 06:02:58', '2024-08-20 06:02:58'),
(467, 512, 41, '1000.00', '2024-08-20 06:03:07', '2024-08-20 06:03:07'),
(468, 512, 42, 'B', '2024-08-20 06:03:07', '2024-08-20 06:03:07'),
(469, 513, 41, '100.45', '2024-08-20 06:05:23', '2024-08-20 06:05:23'),
(470, 513, 42, 'A', '2024-08-20 06:05:23', '2024-08-20 06:05:23'),
(471, 500, 41, NULL, '2024-08-20 08:00:04', '2024-08-20 08:00:04'),
(472, 500, 42, NULL, '2024-08-20 08:00:04', '2024-08-20 08:00:04'),
(473, 507, 41, NULL, '2024-08-20 08:00:04', '2024-08-20 08:00:04'),
(474, 507, 42, NULL, '2024-08-20 08:00:04', '2024-08-20 08:00:04'),
(475, 508, 41, NULL, '2024-08-21 08:00:04', '2024-08-21 08:00:04'),
(476, 508, 42, NULL, '2024-08-21 08:00:04', '2024-08-21 08:00:04'),
(477, 510, 41, NULL, '2024-08-21 08:00:04', '2024-08-21 08:00:04'),
(478, 510, 42, NULL, '2024-08-21 08:00:04', '2024-08-21 08:00:04'),
(479, 514, 41, NULL, '2024-08-21 08:00:04', '2024-08-21 08:00:04'),
(480, 514, 42, NULL, '2024-08-21 08:00:04', '2024-08-21 08:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `participant_competition`
--

CREATE TABLE `participant_competition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `competition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `day` date DEFAULT NULL,
  `participant_date` datetime DEFAULT NULL,
  `answer_date` datetime DEFAULT NULL,
  `token_used` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participant_competition`
--

INSERT INTO `participant_competition` (`id`, `participant_id`, `competition_id`, `user_id`, `day`, `participant_date`, `answer_date`, `token_used`, `created_at`, `updated_at`) VALUES
(284, 205, 31, 219, '2024-07-09', '2024-07-09 11:42:13', '2024-07-09 11:42:43', 1, '2024-07-09 06:12:13', '2024-07-09 06:12:43'),
(285, 205, 31, 219, '2024-07-12', '2024-07-09 11:42:13', '2024-07-09 15:30:06', 1, '2024-07-09 06:12:13', '2024-07-09 10:00:06'),
(286, 206, 31, 220, '2024-07-09', '2024-07-09 12:03:31', '2024-07-09 15:30:06', 1, '2024-07-09 06:33:31', '2024-07-09 10:00:06'),
(287, 206, 31, 220, '2024-07-12', '2024-07-09 12:03:31', '2024-07-09 15:30:06', 1, '2024-07-09 06:33:31', '2024-07-09 10:00:06'),
(288, 206, 31, 220, '2024-07-09', '2024-07-09 12:13:21', '2024-07-09 15:30:06', 2, '2024-07-09 06:43:21', '2024-07-09 10:00:06'),
(289, 206, 31, 220, '2024-07-10', '2024-07-09 12:13:21', '2024-07-09 15:30:06', 2, '2024-07-09 06:43:21', '2024-07-09 10:00:06'),
(290, 208, 31, 222, '2024-07-09', '2024-07-09 14:25:44', '2024-07-09 15:30:06', 1, '2024-07-09 08:55:44', '2024-07-09 10:00:06'),
(291, 208, 31, 222, '2024-07-10', '2024-07-09 14:25:44', '2024-07-09 15:30:06', 1, '2024-07-09 08:55:44', '2024-07-09 10:00:06'),
(292, 209, 31, 223, '2024-07-09', '2024-07-09 14:28:44', '2024-07-09 15:30:06', 1, '2024-07-09 08:58:44', '2024-07-09 10:00:06'),
(293, 209, 31, 223, '2024-07-12', '2024-07-09 14:28:44', '2024-07-09 15:30:06', 1, '2024-07-09 08:58:44', '2024-07-09 10:00:06'),
(294, 210, 31, 224, '2024-07-10', '2024-07-09 14:34:17', '2024-07-09 15:30:06', 1, '2024-07-09 09:04:17', '2024-07-09 10:00:06'),
(295, 210, 31, 224, '2024-07-12', '2024-07-09 14:34:17', '2024-07-09 15:30:06', 1, '2024-07-09 09:04:17', '2024-07-09 10:00:06'),
(296, 210, 31, 224, '2024-07-09', '2024-07-09 14:34:56', '2024-07-09 15:30:06', 1, '2024-07-09 09:04:56', '2024-07-09 10:00:06'),
(297, 210, 31, 224, '2024-07-12', '2024-07-09 14:34:56', '2024-07-09 15:30:06', 1, '2024-07-09 09:04:56', '2024-07-09 10:00:06'),
(298, 212, 31, 226, '2024-07-09', '2024-07-09 15:44:15', '2024-07-10 15:30:03', 1, '2024-07-09 10:14:15', '2024-07-10 10:00:03'),
(299, 212, 31, 226, '2024-07-12', '2024-07-09 15:44:15', '2024-07-10 15:30:03', 1, '2024-07-09 10:14:15', '2024-07-10 10:00:03'),
(300, 212, 31, 226, '2024-07-09', '2024-07-09 15:45:23', '2024-07-10 15:30:03', 1, '2024-07-09 10:15:23', '2024-07-10 10:00:03'),
(301, 212, 31, 226, '2024-07-12', '2024-07-09 15:45:23', '2024-07-10 15:30:03', 1, '2024-07-09 10:15:23', '2024-07-10 10:00:03'),
(302, 213, 31, 227, '2024-07-09', '2024-07-09 23:59:05', '2024-07-10 00:00:45', 1, '2024-07-09 18:29:05', '2024-07-09 18:30:45'),
(303, 213, 31, 227, '2024-07-10', '2024-07-09 23:59:05', '2024-07-10 00:00:17', 1, '2024-07-09 18:29:05', '2024-07-09 18:30:17'),
(304, 213, 31, 227, '2024-07-09', '2024-07-09 23:59:22', '2024-07-10 15:30:03', 2, '2024-07-09 18:29:22', '2024-07-10 10:00:03'),
(305, 213, 31, 227, '2024-07-10', '2024-07-09 23:59:22', '2024-07-10 15:30:03', 2, '2024-07-09 18:29:22', '2024-07-10 10:00:03'),
(306, 213, 31, 227, '2024-07-09', '2024-07-09 23:59:37', '2024-07-10 15:30:03', 1, '2024-07-09 18:29:37', '2024-07-10 10:00:03'),
(307, 213, 31, 227, '2024-07-11', '2024-07-09 23:59:37', '2024-07-10 15:30:03', 1, '2024-07-09 18:29:37', '2024-07-10 10:00:03'),
(308, 213, 31, 227, '2024-07-10', '2024-07-10 00:02:04', '2024-07-10 15:30:03', 1, '2024-07-09 18:32:04', '2024-07-10 10:00:03'),
(309, 213, 31, 227, '2024-07-11', '2024-07-10 00:02:04', '2024-07-10 15:30:03', 1, '2024-07-09 18:32:04', '2024-07-10 10:00:03'),
(310, 214, 31, 228, '2024-07-12', '2024-07-10 00:11:49', '2024-07-10 15:30:03', 1, '2024-07-09 18:41:49', '2024-07-10 10:00:03'),
(311, 214, 31, 228, '2024-07-13', '2024-07-10 00:11:49', '2024-07-10 15:30:03', 1, '2024-07-09 18:41:49', '2024-07-10 10:00:03'),
(312, 214, 31, 228, '2024-07-10', '2024-07-10 00:12:32', '2024-07-10 15:30:03', 1, '2024-07-09 18:42:32', '2024-07-10 10:00:03'),
(313, 214, 31, 228, '2024-07-11', '2024-07-10 00:12:32', '2024-07-10 15:30:03', 1, '2024-07-09 18:42:32', '2024-07-10 10:00:03'),
(314, 214, 31, 228, '2024-07-10', '2024-07-10 00:13:00', '2024-07-10 15:30:03', 1, '2024-07-09 18:43:00', '2024-07-10 10:00:03'),
(315, 214, 31, 228, '2024-07-13', '2024-07-10 00:13:00', '2024-07-10 15:30:03', 1, '2024-07-09 18:43:00', '2024-07-10 10:00:03'),
(316, 214, 31, 228, '2024-07-10', '2024-07-10 00:13:34', '2024-07-10 15:30:03', 7, '2024-07-09 18:43:34', '2024-07-10 10:00:03'),
(317, 214, 31, 228, '2024-07-12', '2024-07-10 00:13:34', '2024-07-10 15:30:03', 7, '2024-07-09 18:43:34', '2024-07-10 10:00:03'),
(318, 216, 31, 230, '2024-07-10', '2024-07-10 06:41:05', '2024-07-10 15:30:03', 1, '2024-07-10 01:11:05', '2024-07-10 10:00:03'),
(319, 216, 31, 230, '2024-07-11', '2024-07-10 06:41:05', '2024-07-10 15:30:03', 1, '2024-07-10 01:11:05', '2024-07-10 10:00:03'),
(322, 218, 31, 231, '2024-07-10', '2024-07-10 11:23:56', '2024-07-10 15:30:03', 1, '2024-07-10 05:53:56', '2024-07-10 10:00:03'),
(323, 218, 31, 231, '2024-07-11', '2024-07-10 11:23:56', '2024-07-10 15:30:03', 1, '2024-07-10 05:53:56', '2024-07-10 10:00:03'),
(324, 221, 31, 234, '2024-07-10', '2024-07-10 15:12:22', '2024-07-10 15:12:34', 2, '2024-07-10 09:42:22', '2024-07-10 09:42:34'),
(325, 221, 31, 234, '2024-07-11', '2024-07-10 15:12:22', '2024-07-10 15:30:03', 2, '2024-07-10 09:42:22', '2024-07-10 10:00:03'),
(326, 222, 31, 235, '2024-07-11', '2024-07-11 00:40:21', '2024-07-11 00:41:11', 1, '2024-07-10 19:10:21', '2024-07-10 19:11:11'),
(327, 222, 31, 235, '2024-07-12', '2024-07-11 00:40:21', '2024-07-11 15:30:03', 1, '2024-07-10 19:10:21', '2024-07-11 10:00:03'),
(328, 222, 31, 235, '2024-07-12', '2024-07-11 00:41:59', '2024-07-11 15:30:03', 2, '2024-07-10 19:11:59', '2024-07-11 10:00:03'),
(329, 222, 31, 235, '2024-07-13', '2024-07-11 00:41:59', '2024-07-11 15:30:03', 2, '2024-07-10 19:11:59', '2024-07-11 10:00:03'),
(330, 222, 31, 235, '2024-07-11', '2024-07-11 15:59:37', '2024-07-12 15:30:04', 1, '2024-07-11 10:29:37', '2024-07-12 10:00:04'),
(331, 222, 31, 235, '2024-07-12', '2024-07-11 15:59:37', '2024-07-11 16:00:13', 1, '2024-07-11 10:29:37', '2024-07-11 10:30:13'),
(332, 213, 31, 227, '2024-07-11', '2024-07-11 17:32:59', '2024-07-12 15:30:04', 2, '2024-07-11 12:02:59', '2024-07-12 10:00:04'),
(333, 213, 31, 227, '2024-07-12', '2024-07-11 17:32:59', '2024-07-12 15:30:04', 2, '2024-07-11 12:02:59', '2024-07-12 10:00:04'),
(334, 223, 31, 236, '2024-07-12', '2024-07-12 12:43:51', '2024-07-12 15:30:04', 1, '2024-07-12 07:13:51', '2024-07-12 10:00:04'),
(335, 223, 31, 236, '2024-07-13', '2024-07-12 12:43:51', '2024-07-12 15:30:04', 1, '2024-07-12 07:13:51', '2024-07-12 10:00:04'),
(336, 222, 31, 235, '2024-07-13', '2024-07-13 16:39:19', '2024-07-13 16:39:42', 1, '2024-07-13 11:09:19', '2024-07-13 11:09:42'),
(337, 222, 31, 235, '2024-07-14', '2024-07-13 16:39:19', '2024-07-14 15:30:04', 1, '2024-07-13 11:09:19', '2024-07-14 10:00:04'),
(345, 236, 36, 236, '2024-07-16', '2024-07-16 15:54:51', '2024-07-16 15:55:01', 1, '2024-07-16 10:24:51', '2024-07-16 10:25:01'),
(346, 235, 36, 235, '2024-07-16', '2024-07-16 15:56:11', '2024-07-16 15:56:52', 1, '2024-07-16 10:26:11', '2024-07-16 10:26:52'),
(347, 236, 36, 236, '2024-07-16', '2024-07-16 16:01:49', '2024-07-17 15:30:10', 1, '2024-07-16 10:31:49', '2024-07-17 10:00:10'),
(348, 240, 36, 240, '2024-07-16', '2024-07-16 16:03:53', '2024-07-17 15:30:10', 1, '2024-07-16 10:33:53', '2024-07-17 10:00:10'),
(349, 244, 36, 249, '2024-07-17', '2024-07-16 16:49:41', '2024-07-17 15:30:10', 1, '2024-07-16 11:19:41', '2024-07-17 10:00:10'),
(350, 244, 36, 249, '2024-07-16', '2024-07-16 16:50:29', '2024-07-17 15:30:10', 2, '2024-07-16 11:20:29', '2024-07-17 10:00:10'),
(351, 235, 36, 235, '2024-07-16', '2024-07-16 20:56:13', '2024-07-17 15:30:10', 1, '2024-07-16 15:26:13', '2024-07-17 10:00:10'),
(352, 235, 36, 235, '2024-07-17', '2024-07-16 20:56:37', '2024-07-17 15:30:10', 1, '2024-07-16 15:26:37', '2024-07-17 10:00:10'),
(353, 250, 36, 250, '2024-07-18', '2024-07-17 02:48:27', '2024-07-17 15:30:10', 1, '2024-07-16 21:18:27', '2024-07-17 10:00:10'),
(354, 235, 36, 235, '2024-07-17', '2024-07-17 03:00:58', '2024-07-17 15:30:10', 1, '2024-07-16 21:30:58', '2024-07-17 10:00:10'),
(355, 235, 36, 235, '2024-07-17', '2024-07-17 03:01:13', '2024-07-17 03:01:38', 1, '2024-07-16 21:31:13', '2024-07-16 21:31:38'),
(356, 254, 36, 251, '2024-07-17', '2024-07-17 06:54:14', '2024-07-17 06:54:21', 1, '2024-07-17 01:24:14', '2024-07-17 01:24:21'),
(357, 250, 36, 250, '2024-07-17', '2024-07-17 12:00:15', '2024-07-17 15:30:10', 1, '2024-07-17 06:30:15', '2024-07-17 10:00:10'),
(358, 243, 36, 248, '2024-07-17', '2024-07-17 16:30:13', '2024-07-17 16:31:26', 1, '2024-07-17 11:00:13', '2024-07-17 11:01:26'),
(359, 243, 36, 248, '2024-07-17', '2024-07-17 16:30:31', '2024-07-17 16:43:20', 2, '2024-07-17 11:00:31', '2024-07-17 11:13:20'),
(360, 243, 36, 248, '2024-07-17', '2024-07-17 16:30:48', '2024-07-18 15:30:04', 1, '2024-07-17 11:00:48', '2024-07-18 10:00:04'),
(361, 261, 37, 236, '2024-07-18', '2024-07-18 14:25:26', '2024-07-18 14:28:51', 1, '2024-07-18 08:55:26', '2024-07-18 08:58:51'),
(362, 261, 37, 236, '2024-07-19', '2024-07-18 14:25:26', '2024-07-18 14:29:40', 1, '2024-07-18 08:55:26', '2024-07-18 08:59:40'),
(363, 261, 37, 236, '2024-07-18', '2024-07-18 14:30:03', '2024-07-18 14:31:49', 1, '2024-07-18 09:00:03', '2024-07-18 09:01:49'),
(364, 261, 37, 236, '2024-07-19', '2024-07-18 14:30:03', '2024-07-18 15:03:18', 1, '2024-07-18 09:00:03', '2024-07-18 09:33:18'),
(365, 261, 37, 236, '2024-07-18', '2024-07-18 15:03:52', '2024-07-18 15:09:10', 1, '2024-07-18 09:33:52', '2024-07-18 09:39:10'),
(366, 261, 37, 236, '2024-07-19', '2024-07-18 15:03:52', '2024-07-18 15:30:04', 1, '2024-07-18 09:33:52', '2024-07-18 10:00:04'),
(367, 261, 37, 236, '2024-07-18', '2024-07-18 15:21:16', '2024-07-18 15:30:04', 1, '2024-07-18 09:51:16', '2024-07-18 10:00:04'),
(368, 261, 37, 236, '2024-07-19', '2024-07-18 15:21:16', '2024-07-18 15:30:04', 1, '2024-07-18 09:51:16', '2024-07-18 10:00:04'),
(369, 261, 37, 236, '2024-07-18', '2024-07-18 15:31:31', '2024-07-18 15:40:13', 1, '2024-07-18 10:01:31', '2024-07-18 10:10:13'),
(370, 261, 37, 236, '2024-07-19', '2024-07-18 15:31:31', '2024-07-19 17:49:30', 1, '2024-07-18 10:01:31', '2024-07-19 12:19:30'),
(371, 272, 37, 256, '2024-07-19', '2024-07-19 12:41:59', '2024-07-19 17:49:30', 1, '2024-07-19 07:11:59', '2024-07-19 12:19:30'),
(372, 272, 37, 256, '2024-07-20', '2024-07-19 12:41:59', '2024-07-19 17:49:30', 1, '2024-07-19 07:11:59', '2024-07-19 12:19:30'),
(373, 275, 37, 259, '2024-07-19', '2024-07-19 14:19:31', '2024-07-19 15:15:28', 1, '2024-07-19 08:49:31', '2024-07-19 09:45:28'),
(374, 275, 37, 259, '2024-07-20', '2024-07-19 14:19:31', '2024-07-19 15:19:48', 1, '2024-07-19 08:49:31', '2024-07-19 09:49:48'),
(375, 275, 37, 259, '2024-07-19', '2024-07-19 15:19:38', '2024-07-19 17:49:30', 1, '2024-07-19 09:49:38', '2024-07-19 12:19:30'),
(376, 275, 37, 259, '2024-07-20', '2024-07-19 15:19:38', '2024-07-19 17:49:30', 1, '2024-07-19 09:49:38', '2024-07-19 12:19:30'),
(377, 275, 37, 259, '2024-07-19', '2024-07-19 15:25:44', '2024-07-19 17:49:30', 1, '2024-07-19 09:55:44', '2024-07-19 12:19:30'),
(378, 275, 37, 259, '2024-07-20', '2024-07-19 15:25:44', '2024-07-19 17:49:30', 1, '2024-07-19 09:55:44', '2024-07-19 12:19:30'),
(379, 275, 37, 259, '2024-07-19', '2024-07-19 15:27:23', '2024-07-19 17:49:30', 1, '2024-07-19 09:57:23', '2024-07-19 12:19:30'),
(380, 275, 37, 259, '2024-07-20', '2024-07-19 15:27:23', '2024-07-19 17:49:30', 1, '2024-07-19 09:57:23', '2024-07-19 12:19:30'),
(381, 275, 37, 259, '2024-07-19', '2024-07-19 15:37:35', '2024-07-19 17:49:30', 1, '2024-07-19 10:07:35', '2024-07-19 12:19:30'),
(382, 275, 37, 259, '2024-07-20', '2024-07-19 15:37:35', '2024-07-19 17:49:30', 1, '2024-07-19 10:07:35', '2024-07-19 12:19:30'),
(383, 275, 37, 259, '2024-07-19', '2024-07-19 16:01:07', '2024-07-19 17:49:30', 1, '2024-07-19 10:31:07', '2024-07-19 12:19:30'),
(384, 275, 37, 259, '2024-07-20', '2024-07-19 16:01:07', '2024-07-19 17:49:30', 1, '2024-07-19 10:31:07', '2024-07-19 12:19:30'),
(385, 275, 37, 259, '2024-07-19', '2024-07-19 17:30:51', '2024-07-19 17:49:30', 1, '2024-07-19 12:00:51', '2024-07-19 12:19:30'),
(386, 275, 37, 259, '2024-07-20', '2024-07-19 17:30:51', '2024-07-19 17:49:30', 1, '2024-07-19 12:00:51', '2024-07-19 12:19:30'),
(387, 282, 37, 260, '2024-07-19', '2024-07-19 17:35:04', '2024-07-19 17:35:33', 1, '2024-07-19 12:05:04', '2024-07-19 12:05:33'),
(388, 282, 37, 260, '2024-07-20', '2024-07-19 17:35:04', '2024-07-19 17:49:30', 1, '2024-07-19 12:05:04', '2024-07-19 12:19:30'),
(389, 283, 37, 240, '2024-07-19', '2024-07-19 17:37:35', '2024-07-19 17:37:53', 1, '2024-07-19 12:07:35', '2024-07-19 12:07:53'),
(390, 283, 37, 240, '2024-07-20', '2024-07-19 17:37:35', '2024-07-19 17:40:21', 1, '2024-07-19 12:07:35', '2024-07-19 12:10:21'),
(391, 283, 37, 240, '2024-07-19', '2024-07-19 17:41:13', '2024-07-19 17:49:30', 1, '2024-07-19 12:11:13', '2024-07-19 12:19:30'),
(392, 283, 37, 240, '2024-07-20', '2024-07-19 17:41:13', '2024-07-19 17:49:30', 1, '2024-07-19 12:11:13', '2024-07-19 12:19:30'),
(393, 283, 37, 240, '2024-07-19', '2024-07-19 18:06:18', '2024-07-19 18:06:55', 1, '2024-07-19 12:36:18', '2024-07-19 12:36:55'),
(394, 283, 37, 240, '2024-07-20', '2024-07-19 18:06:18', '2024-07-19 18:06:55', 1, '2024-07-19 12:36:18', '2024-07-19 12:36:55'),
(395, 283, 37, 240, '2024-07-19', '2024-07-19 18:21:52', '2024-07-19 18:33:03', 1, '2024-07-19 12:51:52', '2024-07-19 13:03:03'),
(396, 283, 37, 240, '2024-07-20', '2024-07-19 18:21:52', '2024-07-19 18:33:03', 1, '2024-07-19 12:51:52', '2024-07-19 13:03:03'),
(397, 283, 37, 240, '2024-07-19', '2024-07-19 18:35:58', '2024-07-19 18:38:14', 1, '2024-07-19 13:05:58', '2024-07-19 13:08:15'),
(398, 283, 37, 240, '2024-07-20', '2024-07-19 18:35:58', '2024-07-19 18:38:14', 1, '2024-07-19 13:05:58', '2024-07-19 13:08:15'),
(399, 271, 37, 255, '2024-07-19', '2024-07-19 18:41:02', '2024-07-19 18:41:50', 1, '2024-07-19 13:11:02', '2024-07-19 13:11:50'),
(400, 271, 37, 255, '2024-07-20', '2024-07-19 18:41:02', '2024-07-19 18:42:28', 1, '2024-07-19 13:11:02', '2024-07-19 13:12:28'),
(401, 271, 37, 255, '2024-07-19', '2024-07-19 18:42:45', '2024-07-19 18:48:05', 2, '2024-07-19 13:12:45', '2024-07-19 13:18:05'),
(402, 271, 37, 255, '2024-07-20', '2024-07-19 18:42:45', '2024-07-19 18:43:32', 2, '2024-07-19 13:12:45', '2024-07-19 13:13:32'),
(403, 283, 37, 240, '2024-07-19', '2024-07-19 18:46:43', '2024-07-19 18:46:55', 1, '2024-07-19 13:16:43', '2024-07-19 13:16:55'),
(404, 283, 37, 240, '2024-07-20', '2024-07-19 18:46:43', '2024-07-19 18:48:05', 1, '2024-07-19 13:16:43', '2024-07-19 13:18:05'),
(405, 283, 37, 240, '2024-07-19', '2024-07-19 19:02:16', '2024-07-19 20:40:36', 1, '2024-07-19 13:32:16', '2024-07-19 15:10:36'),
(406, 283, 37, 240, '2024-07-20', '2024-07-19 19:02:16', '2024-07-19 20:40:36', 1, '2024-07-19 13:32:16', '2024-07-19 15:10:36'),
(407, 284, 38, 261, '2024-07-21', '2024-07-20 07:20:59', '2024-07-20 07:21:12', 1, '2024-07-20 01:50:59', '2024-07-20 01:51:12'),
(408, 284, 38, 261, '2024-07-22', '2024-07-20 07:20:59', '2024-07-20 07:36:39', 1, '2024-07-20 01:50:59', '2024-07-20 02:06:39'),
(409, 284, 38, 261, '2024-07-20', '2024-07-20 07:31:49', '2024-07-20 07:36:39', 1, '2024-07-20 02:01:49', '2024-07-20 02:06:39'),
(410, 284, 38, 261, '2024-07-21', '2024-07-20 07:31:49', '2024-07-20 07:36:39', 1, '2024-07-20 02:01:49', '2024-07-20 02:06:39'),
(411, 284, 38, 261, '2024-07-20', '2024-07-20 13:39:31', '2024-07-20 13:40:25', 1, '2024-07-20 08:09:31', '2024-07-20 08:10:25'),
(412, 284, 38, 261, '2024-07-21', '2024-07-20 13:39:31', '2024-07-20 13:40:25', 1, '2024-07-20 08:09:31', '2024-07-20 08:10:25'),
(413, 285, 38, 236, '2024-07-20', '2024-07-20 13:40:01', '2024-07-20 13:40:17', 1, '2024-07-20 08:10:01', '2024-07-20 08:10:17'),
(414, 285, 38, 236, '2024-07-21', '2024-07-20 13:40:01', '2024-07-20 13:40:25', 1, '2024-07-20 08:10:01', '2024-07-20 08:10:25'),
(415, 286, 38, 235, '2024-07-20', '2024-07-20 18:29:58', '2024-07-20 18:31:05', 3, '2024-07-20 12:59:58', '2024-07-20 13:01:05'),
(416, 286, 38, 235, '2024-07-21', '2024-07-20 18:29:58', '2024-07-20 18:31:45', 3, '2024-07-20 12:59:58', '2024-07-20 13:01:45'),
(417, 286, 38, 235, '2024-07-21', '2024-07-20 18:33:09', '2024-07-20 18:33:32', 1, '2024-07-20 13:03:09', '2024-07-20 13:03:32'),
(418, 286, 38, 235, '2024-07-22', '2024-07-20 18:33:09', '2024-07-20 18:34:08', 1, '2024-07-20 13:03:09', '2024-07-20 13:04:08'),
(419, 287, 38, 255, '2024-07-21', '2024-07-20 18:39:05', '2024-07-21 15:30:08', 2, '2024-07-20 13:09:05', '2024-07-21 10:00:08'),
(420, 287, 38, 255, '2024-07-22', '2024-07-20 18:39:05', '2024-07-20 18:39:56', 2, '2024-07-20 13:09:05', '2024-07-20 13:09:56'),
(421, 288, 38, 262, '2024-07-22', '2024-07-22 08:18:12', '2024-07-22 08:19:51', 1, '2024-07-22 02:48:12', '2024-07-22 02:49:51'),
(422, 288, 38, 262, '2024-07-23', '2024-07-22 08:18:12', '2024-07-22 08:28:21', 1, '2024-07-22 02:48:12', '2024-07-22 02:58:21'),
(423, 289, 38, 260, '2024-07-22', '2024-07-22 15:30:20', '2024-07-23 15:30:04', 1, '2024-07-22 10:00:20', '2024-07-23 10:00:04'),
(424, 289, 38, 260, '2024-07-23', '2024-07-22 15:30:20', '2024-07-23 15:30:04', 1, '2024-07-22 10:00:20', '2024-07-23 10:00:04'),
(425, 290, 39, 263, '2024-07-23', '2024-07-23 00:33:53', '2024-07-23 15:30:04', 1, '2024-07-22 19:03:53', '2024-07-23 10:00:04'),
(426, 290, 39, 263, '2024-07-24', '2024-07-23 00:33:53', '2024-07-23 00:35:38', 1, '2024-07-22 19:03:53', '2024-07-22 19:05:38'),
(427, 290, 39, 263, '2024-07-23', '2024-07-23 00:36:45', '2024-07-23 15:30:04', 1, '2024-07-22 19:06:45', '2024-07-23 10:00:04'),
(428, 290, 39, 263, '2024-07-24', '2024-07-23 00:36:45', '2024-07-23 15:30:04', 1, '2024-07-22 19:06:45', '2024-07-23 10:00:05'),
(429, 290, 39, 263, '2024-07-24', '2024-07-23 00:38:58', '2024-07-23 15:30:04', 1, '2024-07-22 19:08:58', '2024-07-23 10:00:05'),
(430, 290, 39, 263, '2024-07-25', '2024-07-23 00:38:58', '2024-07-23 00:39:38', 1, '2024-07-22 19:08:58', '2024-07-22 19:09:38'),
(431, 291, 39, 235, '2024-07-23', '2024-07-23 00:41:48', '2024-07-23 00:43:46', 1, '2024-07-22 19:11:48', '2024-07-22 19:13:46'),
(432, 291, 39, 235, '2024-07-24', '2024-07-23 00:41:48', '2024-07-23 00:43:46', 1, '2024-07-22 19:11:48', '2024-07-22 19:13:46'),
(433, 291, 39, 235, '2024-07-23', '2024-07-23 00:46:57', '2024-07-23 00:48:05', 1, '2024-07-22 19:16:57', '2024-07-22 19:18:05'),
(434, 291, 39, 235, '2024-07-24', '2024-07-23 00:46:57', '2024-07-23 00:48:05', 1, '2024-07-22 19:16:57', '2024-07-22 19:18:05'),
(435, 291, 39, 235, '2024-07-23', '2024-07-23 00:48:48', '2024-07-23 15:30:04', 1, '2024-07-22 19:18:48', '2024-07-23 10:00:05'),
(436, 291, 39, 235, '2024-07-25', '2024-07-23 00:48:48', '2024-07-23 15:30:04', 1, '2024-07-22 19:18:48', '2024-07-23 10:00:05'),
(437, 292, 39, 236, '2024-07-23', '2024-07-23 06:42:38', '2024-07-23 06:54:16', 1, '2024-07-23 01:12:38', '2024-07-23 01:24:16'),
(438, 292, 39, 236, '2024-07-24', '2024-07-23 06:42:38', '2024-07-23 15:30:04', 1, '2024-07-23 01:12:38', '2024-07-23 10:00:05'),
(439, 292, 39, 236, '2024-07-23', '2024-07-23 15:09:49', '2024-07-23 15:30:04', 1, '2024-07-23 09:39:49', '2024-07-23 10:00:05'),
(440, 292, 39, 236, '2024-07-24', '2024-07-23 15:09:49', '2024-07-23 15:30:04', 1, '2024-07-23 09:39:49', '2024-07-23 10:00:05'),
(441, 293, 39, 228, '2024-07-23', '2024-07-23 15:39:57', '2024-07-24 15:30:05', 1, '2024-07-23 10:09:57', '2024-07-24 10:00:05'),
(442, 293, 39, 228, '2024-07-24', '2024-07-23 15:39:57', '2024-07-23 15:41:45', 1, '2024-07-23 10:09:57', '2024-07-23 10:11:45'),
(445, 296, 45, 235, '2024-07-26', '2024-07-26 23:48:54', '2024-07-27 15:30:05', 2, '2024-07-26 18:18:54', '2024-07-27 10:00:05'),
(446, 296, 45, 235, '2024-07-27', '2024-07-26 23:48:54', '2024-07-26 23:49:44', 2, '2024-07-26 18:18:54', '2024-07-26 18:19:44'),
(447, 295, 45, 255, '2024-07-26', '2024-07-26 23:51:33', '2024-07-26 23:52:12', 1, '2024-07-26 18:21:33', '2024-07-26 18:22:12'),
(448, 295, 45, 255, '2024-07-27', '2024-07-26 23:51:33', '2024-07-27 15:30:05', 1, '2024-07-26 18:21:33', '2024-07-27 10:00:05'),
(449, 298, 45, 236, '2024-07-27', '2024-07-27 16:18:31', '2024-07-27 16:23:11', 1, '2024-07-27 10:48:31', '2024-07-27 10:53:11'),
(450, 298, 45, 236, '2024-07-28', '2024-07-27 16:18:31', '2024-07-28 05:41:37', 1, '2024-07-27 10:48:31', '2024-07-28 00:11:37'),
(451, 296, 45, 235, '2024-07-27', '2024-07-27 18:11:43', '2024-07-27 18:12:55', 2, '2024-07-27 12:41:43', '2024-07-27 12:42:55'),
(452, 296, 45, 235, '2024-07-28', '2024-07-27 18:11:43', '2024-07-28 15:30:06', 2, '2024-07-27 12:41:43', '2024-07-28 10:00:07'),
(453, 295, 45, 255, '2024-07-27', '2024-07-27 18:15:02', '2024-07-27 18:15:28', 1, '2024-07-27 12:45:02', '2024-07-27 12:45:28'),
(454, 295, 45, 255, '2024-07-28', '2024-07-27 18:15:02', '2024-07-28 15:30:06', 1, '2024-07-27 12:45:03', '2024-07-28 10:00:07'),
(455, 299, 45, 264, '2024-07-27', '2024-07-27 18:20:02', '2024-07-27 18:20:50', 8, '2024-07-27 12:50:02', '2024-07-27 12:50:50'),
(456, 299, 45, 264, '2024-07-28', '2024-07-27 18:20:02', '2024-07-28 15:30:06', 8, '2024-07-27 12:50:02', '2024-07-28 10:00:07'),
(457, 300, 45, 265, '2024-07-28', '2024-07-27 18:52:44', '2024-07-27 18:53:11', 1, '2024-07-27 13:22:44', '2024-07-27 13:23:11'),
(458, 300, 45, 265, '2024-07-29', '2024-07-27 18:52:44', '2024-07-29 15:30:04', 1, '2024-07-27 13:22:46', '2024-07-29 10:00:04'),
(459, 300, 45, 265, '2024-07-28', '2024-07-27 18:54:07', '2024-07-28 15:30:06', 1, '2024-07-27 13:24:07', '2024-07-28 10:00:07'),
(460, 300, 45, 265, '2024-07-29', '2024-07-27 18:54:07', '2024-07-29 15:30:04', 1, '2024-07-27 13:24:07', '2024-07-29 10:00:04'),
(461, 298, 45, 236, '2024-07-28', '2024-07-27 18:55:19', '2024-07-28 05:42:47', 1, '2024-07-27 13:25:19', '2024-07-28 00:12:47'),
(462, 298, 45, 236, '2024-07-29', '2024-07-27 18:55:19', '2024-07-28 05:46:36', 1, '2024-07-27 13:25:19', '2024-07-28 00:16:36'),
(463, 301, 45, 266, '2024-07-28', '2024-07-27 19:21:27', '2024-07-28 15:30:06', 1, '2024-07-27 13:51:27', '2024-07-28 10:00:07'),
(464, 301, 45, 266, '2024-07-29', '2024-07-27 19:21:27', '2024-07-29 15:30:04', 1, '2024-07-27 13:51:27', '2024-07-29 10:00:04'),
(465, 298, 45, 236, '2024-07-28', '2024-07-28 05:46:04', '2024-07-28 15:30:06', 1, '2024-07-28 00:16:04', '2024-07-28 10:00:07'),
(466, 298, 45, 236, '2024-07-29', '2024-07-28 05:46:04', '2024-07-29 15:30:04', 1, '2024-07-28 00:16:04', '2024-07-29 10:00:04'),
(467, 295, 45, 255, '2024-07-28', '2024-07-28 16:58:47', NULL, 1, '2024-07-28 11:28:47', '2024-07-28 11:28:47'),
(468, 295, 45, 255, '2024-07-29', '2024-07-28 16:58:47', '2024-07-29 15:30:04', 1, '2024-07-28 11:28:47', '2024-07-29 10:00:04'),
(469, 302, 45, 260, '2024-07-29', '2024-07-29 13:02:54', '2024-07-29 15:30:04', 1, '2024-07-29 07:32:54', '2024-07-29 10:00:05'),
(470, 302, 45, 260, '2024-07-30', '2024-07-29 13:02:54', '2024-07-30 15:30:04', 1, '2024-07-29 07:32:54', '2024-07-30 10:00:04'),
(471, 303, 46, 236, '2024-07-29', '2024-07-29 15:14:53', '2024-07-29 15:30:04', 1, '2024-07-29 09:44:53', '2024-07-29 10:00:05'),
(472, 303, 46, 236, '2024-07-30', '2024-07-29 15:14:53', '2024-07-30 15:30:04', 1, '2024-07-29 09:44:53', '2024-07-30 10:00:04'),
(473, 304, 46, 235, '2024-07-30', '2024-07-29 18:59:03', '2024-07-29 18:59:58', 1, '2024-07-29 13:29:03', '2024-07-29 13:29:58'),
(474, 304, 46, 235, '2024-07-31', '2024-07-29 18:59:03', '2024-07-31 15:30:04', 1, '2024-07-29 13:29:06', '2024-07-31 10:00:05'),
(475, 305, 46, 240, '2024-07-30', '2024-07-30 09:12:47', '2024-07-30 15:30:04', 1, '2024-07-30 03:42:47', '2024-07-30 10:00:04'),
(476, 305, 46, 240, '2024-07-31', '2024-07-30 09:12:47', '2024-07-31 15:30:04', 1, '2024-07-30 03:42:47', '2024-07-31 10:00:05'),
(477, 306, 47, 236, '2024-08-04', '2024-08-04 12:28:59', '2024-08-04 12:29:34', 1, '2024-08-04 06:58:59', '2024-08-04 06:59:34'),
(478, 306, 47, 236, '2024-08-05', '2024-08-04 12:28:59', '2024-08-05 14:38:59', 1, '2024-08-04 06:58:59', '2024-08-05 09:08:59'),
(479, 307, 47, 268, '2024-08-04', '2024-08-04 16:03:11', '2024-08-04 16:04:17', 1, '2024-08-04 10:33:11', '2024-08-04 10:34:17'),
(480, 307, 47, 268, '2024-08-05', '2024-08-04 16:03:11', '2024-08-05 15:30:05', 1, '2024-08-04 10:33:11', '2024-08-05 10:00:05'),
(481, 308, 47, 235, '2024-08-04', '2024-08-04 23:39:07', NULL, 1, '2024-08-04 18:09:07', '2024-08-04 18:09:07'),
(482, 308, 47, 235, '2024-08-05', '2024-08-04 23:39:07', '2024-08-05 15:30:05', 1, '2024-08-04 18:09:07', '2024-08-05 10:00:05'),
(483, 308, 47, 235, '2024-08-05', '2024-08-04 23:39:44', '2024-08-05 15:30:05', 2, '2024-08-04 18:09:44', '2024-08-05 10:00:05'),
(484, 308, 47, 235, '2024-08-06', '2024-08-04 23:39:44', '2024-08-06 15:30:05', 2, '2024-08-04 18:09:44', '2024-08-06 10:00:06'),
(485, 306, 47, 236, '2024-08-05', '2024-08-05 07:24:46', '2024-08-05 15:30:05', 1, '2024-08-05 01:54:46', '2024-08-05 10:00:05'),
(486, 306, 47, 236, '2024-08-06', '2024-08-05 07:24:46', '2024-08-06 15:30:05', 1, '2024-08-05 01:54:46', '2024-08-06 10:00:06'),
(487, 308, 47, 235, '2024-08-05', '2024-08-05 16:10:34', '2024-08-05 16:11:09', 1, '2024-08-05 10:40:34', '2024-08-05 10:41:09'),
(488, 308, 47, 235, '2024-08-06', '2024-08-05 16:10:34', '2024-08-05 17:42:32', 1, '2024-08-05 10:40:34', '2024-08-05 12:12:32'),
(489, 308, 47, 235, '2024-08-05', '2024-08-05 18:00:00', '2024-08-07 19:40:16', 1, '2024-08-05 12:30:00', '2024-08-07 14:10:16'),
(490, 308, 47, 235, '2024-08-06', '2024-08-05 18:00:00', '2024-08-05 18:02:50', 1, '2024-08-05 12:30:00', '2024-08-05 12:32:50'),
(491, 309, 47, 269, '2024-08-06', '2024-08-06 09:21:43', '2024-08-06 09:25:01', 1, '2024-08-06 03:51:43', '2024-08-06 03:55:01'),
(492, 309, 47, 269, '2024-08-07', '2024-08-06 09:21:43', '2024-08-07 15:30:04', 1, '2024-08-06 03:51:43', '2024-08-07 10:00:04'),
(493, 310, 47, 270, '2024-08-06', '2024-08-06 19:45:33', '2024-08-06 19:45:42', 1, '2024-08-06 14:15:33', '2024-08-06 14:15:42'),
(494, 310, 47, 270, '2024-08-07', '2024-08-06 19:45:33', '2024-08-07 15:30:04', 1, '2024-08-06 14:15:33', '2024-08-07 10:00:04'),
(495, 314, 49, 236, '2024-08-17', '2024-08-17 05:34:15', '2024-08-17 05:34:38', 1, '2024-08-17 00:04:15', '2024-08-17 00:04:38'),
(496, 314, 49, 236, '2024-08-18', '2024-08-17 05:34:15', '2024-08-18 13:30:04', 1, '2024-08-17 00:04:15', '2024-08-18 08:00:04'),
(497, 315, 49, 273, '2024-08-17', '2024-08-17 06:13:18', '2024-08-17 06:15:32', 1, '2024-08-17 00:43:18', '2024-08-17 00:45:32'),
(498, 315, 49, 273, '2024-08-19', '2024-08-17 06:13:18', '2024-08-19 13:30:04', 1, '2024-08-17 00:43:18', '2024-08-19 08:00:04'),
(499, 315, 49, 273, '2024-08-17', '2024-08-17 06:15:52', '2024-08-17 13:30:08', 1, '2024-08-17 00:45:52', '2024-08-17 08:00:08'),
(500, 315, 49, 273, '2024-08-20', '2024-08-17 06:15:52', '2024-08-20 13:30:04', 1, '2024-08-17 00:45:52', '2024-08-20 08:00:04'),
(501, 318, 49, 275, '2024-08-18', '2024-08-18 12:25:31', '2024-08-18 13:30:04', 3, '2024-08-18 06:55:31', '2024-08-18 08:00:04'),
(502, 318, 49, 275, '2024-08-19', '2024-08-18 12:25:31', '2024-08-18 12:26:39', 3, '2024-08-18 06:55:31', '2024-08-18 06:56:39'),
(503, 319, 49, 276, '2024-08-18', '2024-08-18 12:29:47', '2024-08-18 12:30:58', 1, '2024-08-18 06:59:47', '2024-08-18 07:00:58'),
(504, 319, 49, 276, '2024-08-19', '2024-08-18 12:29:47', '2024-08-19 13:30:04', 1, '2024-08-18 06:59:47', '2024-08-19 08:00:04'),
(505, 317, 49, 235, '2024-08-18', '2024-08-18 13:01:40', '2024-08-18 13:30:04', 1, '2024-08-18 07:31:40', '2024-08-18 08:00:04'),
(506, 317, 49, 235, '2024-08-19', '2024-08-18 13:01:40', '2024-08-19 13:30:04', 1, '2024-08-18 07:31:40', '2024-08-19 08:00:04'),
(507, 319, 49, 276, '2024-08-20', '2024-08-20 00:02:20', '2024-08-20 13:30:04', 1, '2024-08-19 18:32:20', '2024-08-20 08:00:04'),
(508, 319, 49, 276, '2024-08-21', '2024-08-20 00:02:20', '2024-08-21 13:30:04', 1, '2024-08-19 18:32:20', '2024-08-21 08:00:04'),
(509, 320, 49, 277, '2024-08-20', '2024-08-20 00:03:49', '2024-08-20 00:05:12', 1, '2024-08-19 18:33:49', '2024-08-19 18:35:12'),
(510, 320, 49, 277, '2024-08-21', '2024-08-20 00:03:49', '2024-08-21 13:30:04', 1, '2024-08-19 18:33:49', '2024-08-21 08:00:04'),
(511, 322, 49, 278, '2024-08-20', '2024-08-20 11:31:59', '2024-08-20 11:32:58', 1, '2024-08-20 06:01:59', '2024-08-20 06:02:58'),
(512, 322, 49, 278, '2024-08-23', '2024-08-20 11:31:59', '2024-08-20 11:33:07', 1, '2024-08-20 06:01:59', '2024-08-20 06:03:07'),
(513, 322, 49, 278, '2024-08-20', '2024-08-20 11:34:58', '2024-08-20 11:35:23', 1, '2024-08-20 06:04:58', '2024-08-20 06:05:23'),
(514, 322, 49, 278, '2024-08-21', '2024-08-20 11:34:58', '2024-08-21 13:30:04', 1, '2024-08-20 06:04:59', '2024-08-21 08:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Token name', '148c4aa6e4d0f5cfde42b9525c003ab6c13c43c3e72213bc52188731df9cbf01', '[\"*\"]', NULL, NULL, '2024-05-20 01:25:59', '2024-05-20 01:25:59'),
(2, 'App\\Models\\User', 1, 'Token name', 'f75db3026c17b313fdf522761cd6f2a1c801d612cdfd15a4602db68ebdbe6c07', '[\"*\"]', NULL, NULL, '2024-05-20 01:26:00', '2024-05-20 01:26:00'),
(3, 'App\\Models\\User', 1, 'Token name', 'a9bceba7de28aa786e8967bc14012982ea3222b7e11efd467163ffa82a066d7c', '[\"*\"]', NULL, NULL, '2024-05-20 01:26:01', '2024-05-20 01:26:01'),
(4, 'App\\Models\\User', 1, 'Token name', 'e5c1ff2d972af0b105d34fed6a0becb741b6d535b233b45f5bfcfa868ebe1705', '[\"*\"]', NULL, NULL, '2024-05-20 01:26:02', '2024-05-20 01:26:02'),
(5, 'App\\Models\\User', 1, 'Token name', '80a24ae19e9496a2f8219c6a80baf54ec9f57c6794e958ac593dbacff6e9f9cc', '[\"*\"]', NULL, NULL, '2024-05-20 01:26:11', '2024-05-20 01:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `question_id`, `option_value`, `created_at`, `updated_at`) VALUES
(55, 24, '100', '2024-07-09 06:11:23', '2024-07-09 06:11:23'),
(56, 24, '1000', '2024-07-09 06:11:23', '2024-07-09 06:11:23'),
(57, 25, 'A', '2024-07-09 06:11:53', '2024-07-09 06:11:53'),
(58, 25, 'B', '2024-07-09 06:11:53', '2024-07-09 06:11:53'),
(59, 25, 'C', '2024-07-09 06:11:53', '2024-07-09 06:11:53'),
(60, 25, 'D', '2024-07-09 06:11:53', '2024-07-09 06:11:53'),
(67, 29, '10', '2024-07-16 10:22:53', '2024-07-16 10:22:53'),
(68, 29, '20', '2024-07-16 10:22:53', '2024-07-16 10:22:53'),
(71, 31, 'Yes', '2024-07-20 01:28:07', '2024-07-20 01:28:07'),
(72, 31, 'No', '2024-07-20 01:28:07', '2024-07-20 01:28:07'),
(73, 32, '100', '2024-07-20 01:28:25', '2024-07-20 01:28:25'),
(74, 32, '500', '2024-07-20 01:28:25', '2024-07-20 01:28:25'),
(75, 33, '9990', '2024-07-22 13:31:54', '2024-07-22 13:32:36'),
(76, 33, '30000', '2024-07-22 13:31:54', '2024-07-22 13:32:36'),
(77, 34, 'é1', '2024-07-22 13:33:26', '2024-07-22 13:33:26'),
(78, 34, 'à2', '2024-07-22 13:33:26', '2024-07-22 13:33:26'),
(79, 34, '@3', '2024-07-22 13:33:26', '2024-07-22 13:33:26'),
(84, 37, 'c', '2024-07-26 18:17:03', '2024-07-26 18:17:03'),
(85, 37, 'd', '2024-07-26 18:17:03', '2024-07-26 18:17:03'),
(86, 38, '5000', '2024-07-26 18:17:22', '2024-07-26 18:17:22'),
(87, 38, '20000', '2024-07-26 18:17:22', '2024-07-26 18:17:22'),
(88, 39, '10', '2024-07-29 09:41:07', '2024-07-29 09:41:07'),
(89, 39, '20', '2024-07-29 09:41:07', '2024-07-29 09:41:07'),
(90, 40, '10', '2024-08-04 06:58:38', '2024-08-04 06:58:38'),
(91, 40, '100', '2024-08-04 06:58:38', '2024-08-04 06:58:38'),
(92, 41, '100', '2024-08-16 23:43:15', '2024-08-16 23:43:15'),
(93, 41, '1000', '2024-08-16 23:43:15', '2024-08-16 23:43:15'),
(94, 42, 'A', '2024-08-16 23:46:44', '2024-08-16 23:53:49'),
(95, 42, 'B', '2024-08-16 23:46:44', '2024-08-16 23:53:49'),
(96, 42, 'C', '2024-08-16 23:46:44', '2024-08-16 23:53:49'),
(97, 42, 'D', '2024-08-16 23:46:44', '2024-08-16 23:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `competition_id`, `day`, `title`, `type`, `answer`, `created_at`, `updated_at`) VALUES
(24, 31, NULL, 'Question 1', 'Decimal', NULL, '2024-07-09 06:11:23', '2024-07-09 06:11:23'),
(25, 31, NULL, 'Question 2', 'Option', NULL, '2024-07-09 06:11:53', '2024-07-09 06:11:53'),
(29, 36, NULL, 'Question 1', 'Decimal', NULL, '2024-07-16 10:22:53', '2024-07-16 10:22:53'),
(31, 38, NULL, 'Question 1', 'Option', NULL, '2024-07-20 01:28:07', '2024-07-20 01:28:07'),
(32, 38, NULL, 'Question 2', 'Decimal', NULL, '2024-07-20 01:28:25', '2024-07-20 01:28:25'),
(33, 39, NULL, 'question1', 'Decimal', NULL, '2024-07-22 13:31:53', '2024-07-22 13:32:36'),
(34, 39, NULL, 'question2', 'Option', NULL, '2024-07-22 13:33:25', '2024-07-22 13:33:25'),
(37, 45, NULL, 'question_option', 'Option', NULL, '2024-07-26 18:17:02', '2024-07-26 18:17:02'),
(38, 45, NULL, 'question numérique', 'Decimal', NULL, '2024-07-26 18:17:22', '2024-07-26 18:17:22'),
(39, 46, NULL, 'que1', 'Decimal', NULL, '2024-07-29 09:41:07', '2024-07-29 09:41:07'),
(40, 47, NULL, 'que', 'Decimal', NULL, '2024-08-04 06:58:38', '2024-08-04 06:58:38'),
(41, 49, NULL, 'Question 1', 'Decimal', NULL, '2024-08-16 23:43:15', '2024-08-16 23:43:15'),
(42, 49, NULL, 'Question 2', 'Option', NULL, '2024-08-16 23:46:44', '2024-08-16 23:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `reffer_logs`
--

CREATE TABLE `reffer_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reffer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reffer_logs`
--

INSERT INTO `reffer_logs` (`id`, `name`, `email`, `reffer_email`, `subject`, `created_at`, `updated_at`) VALUES
(2, 'mob20 TEST', 'mob20.test@gmail.com', 'luc.diallo@gmail.com', 'Account Reffer', '2024-08-04 10:38:48', '2024-08-04 10:38:48'),
(3, 'mob30 test', 'mob30.test@gmail.com', 'mob.test@gmail.com', 'Account Reffer', '2024-08-10 08:39:44', '2024-08-10 08:39:44'),
(8, 'sumit yadav', 'sumitupkart100@gmail.com', 'caqoqawax@mailinator.com', 'Account Reffer', '2024-08-17 00:05:02', '2024-08-17 00:05:02'),
(9, 'caqoqawax Test', 'caqoqawax@mailinator.com', 'kurij@mailinator.com', 'Account Reffer', '2024-08-17 00:59:23', '2024-08-17 00:59:23'),
(10, 'mob40 test', 'mob40.test@gmail.com', 'mob40.test@gmail.com', 'Account Reffer', '2024-08-18 06:57:08', '2024-08-18 06:57:08'),
(12, 'mob40 test', 'mob40.test@gmail.com', 'mob42.test@gmail.com', 'Account Reffer', '2024-08-18 07:05:48', '2024-08-18 07:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_type` enum('superadmin','user') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 = Active, 0 = Deactive',
  `is_validate` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `country_code`, `dob`, `gender`, `profile`, `role_type`, `email_verified_at`, `password`, `remember_token`, `activation_token`, `status`, `is_validate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'admin', 'admin@gmail.com', '9999999999', NULL, '1970-01-01', 'male', '1721132452.png', 'superadmin', NULL, '$2y$10$LK/Cav2rhv2RqYXSJMsRPOg3k1k8Cg3zSIIRjLhBr0pTJllmvNlEq', NULL, NULL, 1, 0, '2024-05-20 01:13:11', '2024-07-16 08:50:52', NULL),
(219, 'Madeline', 'Ethan', 'totujomiqu@mailinator.com', '+1 (956) 477-2563', NULL, '1974-07-24', 'male', NULL, NULL, NULL, '$2y$10$no8OZbhGwRCQa7w7nhisJe9K.6iG1hravNCpcEfW40UKYVbLijoja', NULL, 'U1xOkQ1XGHUVNbKXBpQl3zLIpOz2mXuOJbm6nL5sqgUfyBrZq0rjuFh79x4U', 1, 1, '2024-07-09 06:06:55', '2024-07-09 06:12:13', NULL),
(220, 'Rhiannon', 'Summer', 'qyxejuto@mailinator.com', '+1 (687) 552-8258', NULL, '2017-11-19', 'female', NULL, NULL, NULL, '$2y$10$51dBNsSR3tegF2rZMSmTGuOmPGPuu1lFZPooUoPX6BR.0AHR8CNLe', NULL, 'akYmRe5BVDzDlxcn3sgCNMtMwrdDBRuU7VJdqEFWzazfQm4dCffWcIraimsk', 1, 1, '2024-07-09 06:27:50', '2024-07-09 06:43:21', NULL),
(221, 'Jack', 'Lance', 'nidafe@mailinator.com', '+1 (554) 459-7213', NULL, '1999-05-10', 'other', NULL, NULL, NULL, '$2y$10$nTkvLMBWaVICigonWu36zeuCnKq4jHr3qHoPpW9WGY/RmaDAopyxO', NULL, '7HwNFOqixUDQCHbY7HRaWY5PDajiFPigjZhaVsmZbyAaWeEXFv15A1lu6wEY', 1, 0, '2024-07-09 08:33:02', '2024-07-09 08:33:02', NULL),
(222, 'Adria', 'Chantale', 'lener@mailinator.com', '+1 (147) 925-2542', NULL, '1995-05-26', 'other', NULL, NULL, NULL, '$2y$10$U7.jtUp5N/bnyslO0phi4uY3DPC66U4Gb87f9/XUrqN3jF2dTrNeG', NULL, 'p8GCGR7Au3CcZ7CkSmPJNdksVXNaE4B17QuZssvWOq1GaXPJpFFoJRzcJQgT', 1, 1, '2024-07-09 08:54:53', '2024-07-09 08:55:44', NULL),
(223, 'Ursula', 'Madeline', 'helud@mailinator.com', '+1 (454) 403-6144', NULL, '2011-05-10', 'female', NULL, NULL, NULL, '$2y$10$dkpUMaXYiGzB3ceeymJJfud7itxrgohiusCSk9VurhaYqYqXUJmfu', NULL, 'i9aAcS3AgqeRbEipy2mDo1r91sMNWXqMx6Z3YgE9wLSFzfcAo1hfxe8uaQ0I', 1, 1, '2024-07-09 08:57:54', '2024-07-09 08:58:44', NULL),
(224, 'Amery', 'Karina', 'tobef@mailinator.com', '+1 (272) 431-4002', NULL, '2011-05-01', 'male', NULL, NULL, NULL, '$2y$10$GhzCuy9pMZZxKLWmg57luOJ8DDOe5m7lwyZrXn/5.1r5dl8t5PGkm', NULL, 'dgN2t9jYbGWJHH3SBrQa8n1ExAHovRM0TjXEfo6hRx5cHTNp4IqmaGMeyMTt', 1, 1, '2024-07-09 09:03:50', '2024-07-09 09:04:56', NULL),
(225, 'Kylan', 'Demetria', 'qiviqavo@mailinator.com', '+1 (736) 648-7938', NULL, '2006-05-16', 'female', NULL, NULL, NULL, '$2y$10$OwCD6M8aIyGzDfNtcrJ0.OBs0zCbZmtKMhKaU3E60M49FMlJLD8E6', NULL, '6iUrd3vYt06TDwNMwTOSyW1tDmMbCo7rLuLPA18tb3ZOFjQ4ZHD8VklBKMnb', 1, 0, '2024-07-09 09:06:31', '2024-07-09 09:06:31', NULL),
(226, 'Tasha', 'Tamekah', 'cyjeg@mailinator.com', '+1 (341) 725-8737', NULL, '1987-08-27', 'male', NULL, NULL, NULL, '$2y$10$nS4Zhxpuy2GKastDTmEymeFgr5DdUlwkr3q8bjkIs/AZwJWuSHD0K', NULL, 'UlNMUd7lDOQ5rcjoh9YsP4KJBuvnOYZZS5j1IonDEiPtMECghAXmu6ltKoEP', 1, 1, '2024-07-09 09:57:47', '2024-07-09 10:15:23', NULL),
(227, 'Mob1', 'Test', 'mob1.test@gmail.com', '0896', NULL, '1995-07-09', 'male', NULL, NULL, NULL, '$2y$10$mVhXk19me0s/quvbNWlqW.cDFBaxaao9CCRNPHHCEMKAdZKKoAXF.', NULL, 'ZeTSqy0y9aTQilhse2B8bYhqyBGHtJpIaj1x0icQWgAeyFaRKne1ueaGFx42', 1, 1, '2024-07-09 18:27:02', '2024-07-11 12:02:59', NULL),
(228, 'Mob2', 'Test', 'mob2.test@gmail.com', '65423', NULL, '2007-07-10', 'male', NULL, NULL, NULL, '$2y$10$cWJ1Yk/G4FRETzVHTtRMFeaS6xUDMyvCfBOyrQukpEyuHNvtEbQcq', NULL, 'MhixVrW44JBXBd2iii8Il4t24w4fTAloElMCjJCRHNzITjHdfP1mOkRkhXMx', 1, 1, '2024-07-09 18:37:17', '2024-07-23 10:09:57', NULL),
(229, 'Mob3', 'Test', 'mob3.test@gmail.com', '56982', NULL, '2006-07-10', 'male', NULL, NULL, NULL, '$2y$10$1WV99fft1nsEBoAKYmK32OoQnh1kf9r3PtaEL3NAQuDAfjV1tEqNC', NULL, '$2y$10$1WV99fft1nsEBoAKYmK32OoQnh1kf9r3PtaEL3NAQuDAfjV1tEqNC', 1, 1, '2024-07-09 18:46:51', '2024-07-10 03:30:30', NULL),
(230, 'Lois', 'Otto', 'zaju@mailinator.com', '+1 (161) 456-7026', NULL, '1973-01-23', 'male', NULL, NULL, NULL, '$2y$10$1WV99fft1nsEBoAKYmK32OoQnh1kf9r3PtaEL3NAQuDAfjV1tEqNC', NULL, '6K7dpZrRn71jubxmwEqQQD1oSe0hsGOf4BFzMZp84CWZXEgZ3HG4qkUokoIw', 1, 1, '2024-07-10 01:10:31', '2024-07-10 01:11:05', NULL),
(231, 'Mob4', 'Test', 'mob4.test@gmail.com', '96558', NULL, '2013-07-10', 'male', NULL, NULL, NULL, '$2y$10$N/PJd0N6wfm.7dNZlWZdQePmF3sTEfHoN9cfE0BRSdTnew2.q2pQO', NULL, 'xJqmtPY0rvRbsWTmr66RKGgBeohNum750iVEwcfuh3xr7dWjrGgC67Z5AcT2', 1, 1, '2024-07-10 05:51:00', '2024-07-10 05:53:56', NULL),
(232, 'Mob5', 'Test', 'mob5.test@gmail.com', '89558', NULL, '2013-07-10', 'male', NULL, NULL, NULL, '$2y$10$gKTscBOG.0MjhYzWOWxE9.UAUNvo/kqERZS5BTX3eOBLMN2wveZ7K', NULL, 'bvnDlPEjSXv3rUwxsTqzC8pfQJ6LiwBaql0FuD04itKRIbjUD2coKk3s0YA5', 1, 0, '2024-07-10 05:57:46', '2024-07-10 05:57:46', NULL),
(233, 'Ariana', 'Alec', 'cyrufike@mailinator.com', '+1 (572) 116-5725', NULL, '2017-07-24', 'male', NULL, NULL, NULL, '$2y$10$PHxIoMWf5J27FPrZ31eneOLIdsjYlQY5iUeKP1vogZkDB98T2DuGW', NULL, 'vHJKcmXXmQw1Uqriizsj2sMz5pgutod142ihcbScADSveGXFUGaapsXgVw87', 1, 0, '2024-07-10 09:27:54', '2024-07-10 09:27:54', NULL),
(234, 'Bruce', 'Beatrice', 'dddvk541@gmail.com', '+1 (777) 809-9821', NULL, '2000-09-01', 'other', NULL, NULL, NULL, '$2y$10$idm.XH/y1ZerPZTDHGWos.SA8Sik0TlzTK0wxiceOuhcdduO1V2TG', NULL, 'cHDVKWaM1d4kQHnxXs314IpcGIKm2DmIJj5nOEh4Jo23zFQgVtaBqGKZkzZj', 1, 1, '2024-07-10 09:29:03', '2024-07-10 09:42:22', NULL),
(235, 'Mob', 'Test', 'mob.test@gmail.com', '8985', NULL, '2012-07-11', 'male', NULL, NULL, NULL, '$2y$10$ssS1VUUR/TuVhA1VAzwyX.nzHLfmVyUFtvLohuKJeggC6D0FROFem', NULL, '8tsSUXk4OAdHBjl84yT02dNkSkTbcLb4F2EDjoEjSjpiMGOReY7QtxAasUDw', 1, 1, '2024-07-10 19:07:59', '2024-08-18 07:31:40', NULL),
(236, 'sumit', 'yadav', 'sumitupkart100@gmail.com', '1234567890', NULL, '1990-11-28', 'male', NULL, NULL, NULL, '$2y$10$y28qrDQtXPzhSEd57ewg3Oo/xM6fkpRiJjWLMUzZ7tM.zFpaJIPde', NULL, 'p8giM0mkBVz6V4rMyMWvotPA8Nj1WX4tMMzIRIvVtouKpz2cfhaJ3HtnWPrA', 1, 1, '2024-07-12 07:06:43', '2024-08-17 00:04:15', NULL),
(237, 'Wesley', 'Aline', 'noruq@mailinator.com', '+1 (844) 989-1887', NULL, '1976-12-03', 'other', NULL, NULL, NULL, '$2y$10$dcEunNOfJsfCsYjRft/gZu3BJSVhIxTeuXRh8gmJ/nOl9G.0nTbki', NULL, 'CUvQH4SHEmXBa2LtGZlTfbZmmpQkynm7vcsANbOfo2RFxmuH4QmynunkXbyK', 1, 0, '2024-07-12 07:37:47', '2024-07-12 07:37:47', NULL),
(238, 'Mob50', 'Test', 'mob50.test@gmail.com', '69532', NULL, '2012-07-13', 'male', NULL, NULL, NULL, '$2y$10$Wqmw0QmCCiJYA7hCn9TMR.RWNcpBG3B9nDo1ecIkslEtyXrvcKht.', NULL, 'bR8EctBrFGvK2ykRpEQG9Eay3GT2aEzXQxvpjUNaS9cvx4f2nIlVAFvuJj2g', 1, 0, '2024-07-13 11:05:25', '2024-07-13 11:05:25', NULL),
(239, 'mob01', 'test', 'mob01.test@gmail.com', '854654', NULL, '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$L5AzmcbFVu2ElE.jGK3Au.wJ6h3Z3IlF5YKpwQEvwB6qNaTFBzQc.', NULL, 'GiC8OOZyyrG9G8WNK0lYihnMIEMQbQnZKudkwT3t8ak9oORu4CLmDgvwhHzb', 1, 0, '2024-07-14 10:05:15', '2024-07-14 10:05:15', NULL),
(240, 'mob02', 'test', 'mob02.test@gmail.com', '8469854', NULL, '2001-01-01', 'male', NULL, NULL, NULL, '$2y$10$y28qrDQtXPzhSEd57ewg3Oo/xM6fkpRiJjWLMUzZ7tM.zFpaJIPde', NULL, '3sDvO4BdIjaAu96VJDInm6CPW4BrxxsrJ9GEoQ1yLSzzfoPbAV1Q6Vlo8RFy', 1, 1, '2024-07-14 10:33:22', '2024-07-30 03:42:47', NULL),
(241, 'Ezekiel', 'Veda', 'pevyj@mailinator.com', '+1 (926) 626-3358', NULL, '1977-10-21', 'female', NULL, NULL, NULL, '$2y$10$l2Xfipz4Otu3j8b.tU6n0.YNiQsOO408i9o7pTgpFoaLqmrIzcpea', NULL, 'HymSimTTNjcbW2j5SMHfuyIDGMHDwEgTMHlFlkU5JwLVOqLKPVrM2lGEKmbR', 1, 0, '2024-07-15 02:44:34', '2024-07-15 02:44:34', NULL),
(242, 'Raphael', 'Jordan', 'wajiw@mailinator.com', '+1 (492) 315-9607', NULL, '2004-03-09', 'male', NULL, NULL, NULL, '$2y$10$sg7HF1tFrYuaBX1wt5cQ9OtQsuPFeAq.GKZNkK4T.1tv6tw1SdcYi', NULL, 'lLt9awZQCxhQbO0sMLeIaK7i8XzlWLvcMFAvthQL5smcQSW8qn3zLpt6wKqI', 1, 0, '2024-07-15 02:48:14', '2024-07-15 02:48:14', NULL),
(243, 'Stephen', 'Dominic', 'pehixuz@mailinator.com', '+1 (786) 221-1928', NULL, '1992-07-09', 'other', NULL, NULL, NULL, '$2y$10$VOulg1ED.HjVTiAKXIPCS.FjpxAo8yoVQUHyzq3TMOabx0Pcy8WE6', NULL, 'iWIgmzXUv3r54nFgmOoEpzJPLz7p52DK7LwjLBazi1ZjeZlTUUpgLcXy7vrd', 1, 0, '2024-07-15 03:02:41', '2024-07-15 03:02:41', NULL),
(244, 'Jaden', 'Aline', 'coryvyda@mailinator.com', '+1 (515) 883-1395', NULL, '1977-07-23', 'male', NULL, NULL, NULL, '$2y$10$rFTwjwaN.kDRK4hE16rmZuVh1jXBJu8SQwHoS99jZ2r4jUuRYrUIe', NULL, 'ozT4z7EKCLwWKdK1OmnDAOsqOTgu237poMOL2i4PypX2KYKFJ0hF33l3mhY3', 1, 0, '2024-07-15 06:10:51', '2024-07-15 06:10:51', NULL),
(245, 'Jesse', 'Todd', 'laguhuxy@mailinator.com', '+1 (327) 954-5169', NULL, '2020-03-20', 'other', NULL, NULL, NULL, '$2y$10$Q7zcAHyCgJhG9QIX22nrXeUOmz7xa3hpg1S737l11LZpXz4kOoj.m', NULL, 'ferY6okgytszTG5XUBcjZjw1ppiFJd5MXI4e9SwrSspue6oK6GV7pCkoj1Lg', 1, 0, '2024-07-15 06:36:42', '2024-07-15 06:36:42', NULL),
(246, 'Azalia', 'Emerald', 'qucuj@mailinator.com', '+1 (135) 535-3446', NULL, '2021-10-15', 'other', NULL, NULL, NULL, '$2y$10$G7KU6BvdaiVxZGpnzxC78ubdYhgvM30vNrxijcJTRNc/w167V8.T2', NULL, 'ohdKcTIUfBXkbXC5b4sn9u2Ij0qnK2JkpyfMCWip6W4xA9joHdZOA3NGnhjl', 1, 0, '2024-07-15 07:14:39', '2024-07-15 07:14:39', NULL),
(247, 'mob10', 'test', 'mob10.test@gmail.com', '85464', NULL, '2000-02-01', 'male', NULL, NULL, NULL, '$2y$10$Z2vpPcLrjNGybO/tQKvtweFjy2ff432UYYscrq8Stx6BPTJJMbXxe', NULL, 'aZL9SnQdY5roMKHv3akmGnfw0SvM4mUnFcnXXWRma1DybUmYoT4mcfLtmaGx', 1, 0, '2024-07-15 11:42:19', '2024-07-15 11:42:19', NULL),
(248, 'mob11', 'test', 'mob11.test@gmail.com', '5466', NULL, '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$z3YSbacIKk2ARumiJjfw4erPRR6UNUsDd3LQk.iqvk94bdwOOZTxK', NULL, '3y9iKUw6gnuiXdMUUexeM5cKsAWDAb7NTXRhBcuyqw89YO44vZeDkNfgh7g0', 1, 1, '2024-07-15 11:53:22', '2024-07-17 11:00:48', NULL),
(249, 'Mo', 'Test', 'mo.test@gmail.com', '5688', NULL, '2002-07-16', 'male', NULL, NULL, NULL, '$2y$10$m7QBWQWSDfmp6lOdVEA2FOFeFImuT6LiG9n7J1jSUc9aopBnbALE.', NULL, 'Lkx5yteV4cAhkIlc9FlJknsCW1oAu8b7jbEMEVB8bYKEdKM2xVXhQewPMsNc', 1, 1, '2024-07-16 11:13:21', '2024-07-16 11:20:29', NULL),
(250, 'Mo1', 'Test', 'mo1.test@gmail.com', '89764', NULL, '2010-07-17', 'male', NULL, NULL, NULL, '$2y$10$kPR1eedsVs8EZNTpYAzPruRD10rxsP5Lpd5wUhMaXKp54Yqphlk56', NULL, 'vQN3MqPfNp0aHQ0OY8g2llJOvaNQ5raizhJtjGPErq9FWMueqjFemvkSXyn2', 1, 1, '2024-07-16 21:12:53', '2024-07-17 06:30:16', NULL),
(251, 'user', 'test', 'user@gmail.com', '132145675687', NULL, '2000-07-17', 'male', NULL, NULL, NULL, '$2y$10$n4d1KP.HvCKBtnuSn52iPul34HdcZEhdoY0N02/dH9BD3/bh6P4E2', NULL, '2i2wYwh1oERSafZreYauxZXxAJ74MozMt5E7iD3296Kb9zIiaPXzu0soWKQx', 1, 1, '2024-07-17 01:23:29', '2024-07-17 01:24:14', NULL),
(252, 'Mo3', 'Test', 'mo3.test@gmail.com', '8965', NULL, '2009-07-17', 'male', NULL, NULL, NULL, '$2y$10$MAW7w9G52mPSotDvCx/NV.CPttus/hLvjokSYOUmo3ra3QB9FaiIO', NULL, 'TOIYN0CC73Yfxus3eJrxycpWxwNNHTKDu4zkIeIC57ZGoXfNjNNjYeEXW3sN', 1, 0, '2024-07-17 06:36:15', '2024-07-17 06:36:15', NULL),
(253, 'mob010', 'test', 'mob010.test@gmail.com', '6498', NULL, '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$tY5/vxAhCHLpchsv2WPP6OmmWzFkuQeXFzJYaSGxqhJ2I91YLn1TK', NULL, 'j0uv24kaK34ZH9uu8iKEcPnUFJ51wEQ23mpmaGpyiczwSQ3niFCdLOiI4U2A', 1, 0, '2024-07-17 11:17:46', '2024-07-17 11:17:46', NULL),
(254, 'Mob12', 'Test', 'mob12.test@gmail.com', '565', NULL, '2017-07-18', 'male', NULL, NULL, NULL, '$2y$10$jb1TYEBTqHylfCAJ1NIsiOk0PTZaT7ANQItBokbZAfoXBm10e9lTy', NULL, 'ZbnCe3SN62LInJvWDwjObatI5SUY4Oo6z5TyMakCLoPWdRcICuKUn7UNTyli', 1, 0, '2024-07-18 10:18:54', '2024-07-18 10:18:54', NULL),
(255, 'Mob13', 'Test', 'mob13.test@gmail.com', '9797', NULL, '2011-07-19', 'male', NULL, NULL, NULL, '$2y$10$B.5RtdkFDRJW.cQscxJHYuBBZe4DnElxGyjoK0O4c1LygmpjEZtvy', NULL, 'Vrti8dhKFGaHnGyw8htfttR9Dya9fsdFhvMeDhY7CJheVPfzzctnyaeBKkqv', 1, 1, '2024-07-19 06:56:32', '2024-07-28 11:28:47', NULL),
(256, 'Flynn', 'Nell', 'xowyxovijo@mailinator.com', '+1 (944) 388-5453', NULL, '1974-12-18', 'male', NULL, NULL, NULL, '$2y$10$/0bbF.NAxYiI7edOBMBdh.nYuKxxuYvyVpip8PPTvog.CV8RVmDYi', NULL, '1jlDNsW8qB80knbzEd7Y4wrJJmvr4Rpe9Mdu0tzefnpSu8Br6A4A0eqzwQcY', 1, 1, '2024-07-19 06:57:39', '2024-07-19 07:11:59', NULL),
(257, 'Zia', 'Logan', 'zujolowify@mailinator.com', '+1 (712) 297-3913', NULL, '2000-04-15', 'male', NULL, NULL, NULL, '$2y$10$X.iCnEItApHKX4HcRP9Hru4PnoDmRHhC4Vj7AQrQTdqwUnmgEwZjy', NULL, 'l3J2gu8WWWjdpKRAUhiD4gtxlusu5L6OiA9NXb2sMspGBK1OzoAZbS40wwJc', 1, 0, '2024-07-19 07:24:17', '2024-07-19 07:24:17', NULL),
(258, 'Baker', 'Alvin', 'jepav@mailinator.com', '+1 (597) 965-9527', NULL, '2009-05-09', 'female', NULL, NULL, NULL, '$2y$10$Y7.B62FfTxw1.5Vs.J.fOuE/WY8QOCjMZuAzqyvn9Ct4xc.6Dj6r6', NULL, '9vy6RmAut6lzd32hSmlhHcgvIHTZvL9n8tb5sUDiQJeeebMBWzKQAIxQ9tnL', 0, 0, '2024-07-19 07:35:32', '2024-07-19 07:36:42', NULL),
(259, 'Hilda', 'Carissa', 'zysonuty@mailinator.com', '+1 (318) 213-5614', NULL, '1997-12-06', 'other', NULL, NULL, NULL, '$2y$10$AAhVfxUYDxG8ihDxhO26Be4/SVYwtwju4sDo58f11Le/y8cc63WQm', NULL, 'WqEnk0qriOSKvOF87oLattBiCYy5y28e9WwTQOTkSPifsr8CPfO87zoXtJHM', 1, 1, '2024-07-19 07:38:11', '2024-07-19 12:00:51', NULL),
(260, 'Ahmed', 'Christopher', 'fulif@mailinator.com', '+1 (954) 861-3603', NULL, '1990-12-22', 'other', NULL, NULL, NULL, '$2y$10$hD0SzwTXKtipkLY6QNeGOeJBPhr3DR4CpaskmZUdbNVNKnkKX1vwu', NULL, 'FISwfqZzQQxWoI0o8UlJWyVuEe7u2QFTDvhqMJVLyZOSbV8p4B9sTORRN1NK', 1, 1, '2024-07-19 12:03:13', '2024-07-29 07:32:54', NULL),
(261, 'Yvonne', 'Damon', 'xofegycuwy@mailinator.com', '+1 (937) 795-5893', NULL, '2021-04-10', 'other', NULL, NULL, NULL, '$2y$10$ljf4hNg5Bfz9MlBab8sy6.mOcgIJfTKrrJ.UnAr7.NaZaf37ljPWC', NULL, '6uMBGstAfieCMjphZpWukZdXicuFIcEwPocpNsDj5bpxLinN8QMAgisMnDlp', 1, 1, '2024-07-20 01:30:11', '2024-07-20 08:09:31', NULL),
(262, 'Neve', 'Hammett', 'kaxez@mailinator.com', '+1 (444) 477-7412', NULL, '1979-10-10', 'other', NULL, NULL, NULL, '$2y$10$VWoj/OsXbdN/95pAp4e6FOFDWJ2ZQaDBI2.kRh/czflnL8NX5FgNu', NULL, 'KNdZ77BSZo9Oos1AdSYjOAHXYcQNHWFMODcOsHk2CsM1iPFymDc0lx755NZb', 1, 1, '2024-07-22 02:47:53', '2024-07-22 02:48:12', NULL),
(263, 'Mob14', 'Test', 'mob14.test@gmail.com', '58554', NULL, '2013-07-23', 'male', NULL, NULL, NULL, '$2y$10$0m86omi.FrcM8aGGB9l6dOZG59b5CiUCnALZMy4RrxdjbsL2HlvsC', NULL, '1bJ2lk9nygrVWGIIB9eyNM4n0Nsnex15TfzP9fPPfdRUp3uUJuAS4VoOfujV', 1, 1, '2024-07-22 18:59:13', '2024-07-22 19:08:58', NULL),
(264, 'mob16', 'test', 'mob16.test@gmail.com', '7896542', NULL, '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$SVSVN8Kqyv3zHyBzTJIogel44VSJ5gpASuzt7TjJNTLHF5Q2ut17q', NULL, 'ZGNbrymgixMz5fYNlqThOz5Yhy1bSCakQ17ijTJVSfA7wQ1My45ho8ipIy3k', 1, 1, '2024-07-27 12:48:17', '2024-07-27 12:50:02', NULL),
(265, 'Rogan', 'Neil', 'zadizemyki@mailinator.com', '+1 (911) 628-4437', NULL, '2021-03-05', 'female', NULL, NULL, NULL, '$2y$10$ssZyIq0R6wyLweiJfEe/gOdl/qsyIctWy6A6TslMwWXS7wElpIy9K', NULL, 'ecnMjVuy663GRw7j207Nv6VdVg4vuAg7PbdbfwYue9LvdchnStYMVzG1Xcbr', 1, 1, '2024-07-27 13:19:21', '2024-07-27 13:24:07', NULL),
(266, 'Ross', 'Madonna', 'tidiqiqyk@mailinator.com', '+1 (473) 411-7812', NULL, '1990-12-04', 'other', NULL, NULL, NULL, '$2y$10$iT.FTRrSctg8qEA1RFNSXeittcstnO3EtqmdCsUiWYOjfQdCy9I9m', NULL, 'yBy6umSXCHZ29z2rQjgkB8uKGU68mVryy8On21wQlwwvCIFvvejqLGD1StVe', 1, 1, '2024-07-27 13:50:50', '2024-07-27 13:51:27', NULL),
(267, 'sunil', 'kushwah', 'sunil@gmail.com', '432656554', NULL, '1990-07-29', 'male', NULL, NULL, NULL, '$2y$10$RmUYIW4dRyo.ZLfRjsA05uJlhqgx1w/prpRGrlT5s4RM8cO.lWb9q', NULL, NULL, 0, 0, '2024-07-29 01:44:21', '2024-07-29 01:44:21', NULL),
(268, 'mob20', 'TEST', 'mob20.test@gmail.com', '3121234569', '+34', '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$DDJeI/8a4QsTp4pIyBnCi..AHE.DA6w7GROuTllxO1/ebTA/WSdyK', NULL, 'UL4oM8SatprFSTUgHENQ1wVv2JOi0kVYqOlAE1TOl81MtL51d6V6M8XqtNas', 1, 1, '2024-08-04 10:27:50', '2024-08-04 10:33:11', NULL),
(269, 'Cade', 'Pena', 'relygyhyt@mailinator.com', '123432543544', '+351', '2015-09-18', 'female', NULL, NULL, NULL, '$2y$10$VdgIfHRpo6sCLVwclaeY2e0QRFDgb/5tq97QyIvn61Veruf8OH4Zm', NULL, '4cu97RLXjNPnu1VF8182Ifo9M2X2LkDzCHIqsgfWGAxEaesMLaDCtXXYpGuN', 1, 1, '2024-08-06 03:51:11', '2024-08-06 03:51:43', NULL),
(270, 'Celeste', 'Cortez', 'mizynoje@mailinator.com', '213456754321', '+44', '1997-10-26', 'female', NULL, NULL, NULL, '$2y$10$NYQm6tgGSgUJ27jpeCtX5u566eUi1YyvSGLGCgwF3saFftrEGmXzq', NULL, 'WksLz3TsVAqdJKcMjPPkRHOHUWaXXY9OmFmfGWUFHc6GDRv9EkLxjByL3Gm1', 1, 1, '2024-08-06 14:14:39', '2024-08-06 14:15:33', NULL),
(271, 'mob30', 'test', 'mob30.test@gmail.com', '3214567890', '+229', '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$dGBQddAPaYhb6TUoMczYGOEsVTuS1UwGTmB2d4RDuqQfxtXJXoWsy', NULL, 'yuce81kmSQ13XGV0ZdF1ObcRieFb7oNw3TuGAtf0Lg79XGq3GNrZFo83s3FP', 1, 0, '2024-08-10 08:38:21', '2024-08-10 08:38:21', NULL),
(272, 'Beatrice', 'Mayer', 'resez@mailinator.com', '12345678998', '+268', '1972-06-23', 'other', NULL, NULL, NULL, '$2y$10$dZJwDXZKFep3iZJKceqYo.mCttAf5LN4iUedCS/Zd2de8Haz3BUy6', NULL, 'Jt7smxFDzBinSxVOW32e0qtd6H3oh5U0Y817Bher6dKXBHpT1uXKQvdIRcFn', 1, 0, '2024-08-10 11:03:06', '2024-08-10 11:31:44', '2024-08-10 11:31:44'),
(273, 'caqoqawax', 'Test', 'caqoqawax@mailinator.com', '12345675464', '+382', '1985-03-09', 'male', NULL, NULL, NULL, '$2y$10$FqKVANobmQ8kiw.26VOqNef4rz7i7F2CGsImNtxwSX2w8CuEpqohC', NULL, 'MoTqv2n9QO8qL3FTavA8KiSbHzAjkKDIVr8l7tuikrMe5VUGBuzdVx1AbM0W', 1, 1, '2024-08-17 00:08:47', '2024-08-17 00:45:52', NULL),
(274, 'kurij', 'Test', 'kurij@mailinator.com', '98778686879', '+352', '1980-07-26', 'male', NULL, NULL, NULL, '$2y$10$xcplIfrK5V0Awwq4E4g6YOLoQFmryIrlbwbXSf0cIuLbCVUaToO7i', NULL, 'xENtNiVGBrnxxEeraKCp4t1X3UNKxVOjGOys34BBMWvoHFOqRf9DpEy2GmKe', 1, 0, '2024-08-17 01:14:38', '2024-08-17 01:14:38', NULL),
(275, 'mob40', 'test', 'mob40.test@gmail.com', '12345', '+33', '2000-01-01', 'male', NULL, NULL, NULL, '$2y$10$dH0C2.o.d5Nz4XDw2TRyNeX6tsWZRXbd4yO9olZb77cZapM8SoC/e', NULL, 'l1Kc9LV5SM8hgfT9Oz07zHUo0mYsBLVw6qDbDezIi8NW5UZeBaNM11HSnOvq', 1, 1, '2024-08-18 06:54:50', '2024-08-18 06:55:31', NULL),
(276, 'mob41', 'test', 'mob41.test@gmail.com', '123456', '+591', '2000-02-01', 'male', NULL, NULL, NULL, '$2y$10$FxE8BDY5x6hcIuHSf/SE2eXgUlEIzNekPl51AMmZyqLfO5qRWRR0C', NULL, '1VVVMDu0Jgpn331GJZp8wdBiVn05pHda7nlKCrzpFvt5btGcDyHrq9OL63Fq', 1, 1, '2024-08-18 06:59:15', '2024-08-19 18:32:20', NULL),
(277, 'mob42', 'test', 'mob42.test@gmail.com', '1234560', '+32', '2000-03-02', 'male', NULL, NULL, NULL, '$2y$10$xlJ/YaoPQOWYsCWiOKt0.OQC8fhwN2BxWL0wbt7a/uYp3bEZUYF0e', NULL, 'qmifESsB81k6uGUYqcSSiWLJRaszeNL0dtnVspzwkOg2hu0EQyAdKKEO1ku1', 1, 1, '2024-08-18 07:03:56', '2024-08-19 18:33:49', NULL),
(278, 'ghanshyam', 'nagar', 'ghanshyam.nagar@digiprima.com', '8959881548', '+91', '1993-08-06', 'male', NULL, NULL, NULL, '$2y$10$zhxS7TXlSrse9h91h0HTt.AXs98LlPhMIb01ajiVMH2vZKEZx8/Gq', NULL, '1RGldw9MKXZr7DD932nFoqU94ujNCIlDSE5zHReeqU8KEg0uwahKwK0MsHGV', 1, 1, '2024-08-20 06:00:15', '2024-08-20 06:04:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_register_dates`
--

CREATE TABLE `user_register_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_register_dates`
--

INSERT INTO `user_register_dates` (`id`, `participant_id`, `user_id`, `reg_date`, `created_at`, `updated_at`) VALUES
(1195, 205, 219, '2024-07-09 11:36:59', '2024-07-09 06:06:59', '2024-07-09 06:06:59'),
(1196, 205, 219, '2024-07-10 11:36:59', '2024-07-09 06:06:59', '2024-07-09 06:06:59'),
(1197, 205, 219, '2024-07-11 11:36:59', '2024-07-09 06:06:59', '2024-07-09 06:06:59'),
(1198, 205, 219, '2024-07-12 11:36:59', '2024-07-09 06:06:59', '2024-07-09 06:06:59'),
(1199, 206, 220, '2024-07-09 11:57:54', '2024-07-09 06:27:54', '2024-07-09 06:27:54'),
(1200, 206, 220, '2024-07-10 11:57:54', '2024-07-09 06:27:54', '2024-07-09 06:27:54'),
(1201, 206, 220, '2024-07-11 11:57:54', '2024-07-09 06:27:54', '2024-07-09 06:27:54'),
(1202, 206, 220, '2024-07-12 11:57:54', '2024-07-09 06:27:54', '2024-07-09 06:27:54'),
(1204, 208, 222, '2024-07-09 14:24:56', '2024-07-09 08:54:56', '2024-07-09 08:54:56'),
(1205, 208, 222, '2024-07-10 14:24:56', '2024-07-09 08:54:56', '2024-07-09 08:54:56'),
(1206, 208, 222, '2024-07-11 14:24:56', '2024-07-09 08:54:56', '2024-07-09 08:54:56'),
(1207, 209, 223, '2024-07-09 14:27:58', '2024-07-09 08:57:58', '2024-07-09 08:57:58'),
(1208, 209, 223, '2024-07-10 14:27:58', '2024-07-09 08:57:58', '2024-07-09 08:57:58'),
(1209, 209, 223, '2024-07-11 14:27:58', '2024-07-09 08:57:58', '2024-07-09 08:57:58'),
(1210, 209, 223, '2024-07-12 14:27:58', '2024-07-09 08:57:58', '2024-07-09 08:57:58'),
(1211, 210, 224, '2024-07-09 14:33:53', '2024-07-09 09:03:53', '2024-07-09 09:03:53'),
(1212, 210, 224, '2024-07-10 14:33:53', '2024-07-09 09:03:53', '2024-07-09 09:03:53'),
(1213, 210, 224, '2024-07-11 14:33:53', '2024-07-09 09:03:53', '2024-07-09 09:03:53'),
(1214, 210, 224, '2024-07-12 14:33:53', '2024-07-09 09:03:53', '2024-07-09 09:03:53'),
(1219, 212, 226, '2024-07-09 15:27:51', '2024-07-09 09:57:51', '2024-07-09 09:57:51'),
(1220, 212, 226, '2024-07-10 15:27:51', '2024-07-09 09:57:51', '2024-07-09 09:57:51'),
(1221, 212, 226, '2024-07-11 15:27:51', '2024-07-09 09:57:51', '2024-07-09 09:57:51'),
(1222, 212, 226, '2024-07-12 15:27:51', '2024-07-09 09:57:51', '2024-07-09 09:57:51'),
(1223, 213, 227, '2024-07-09 23:57:06', '2024-07-09 18:27:06', '2024-07-09 18:27:06'),
(1224, 213, 227, '2024-07-10 23:57:06', '2024-07-09 18:27:06', '2024-07-09 18:27:06'),
(1225, 213, 227, '2024-07-11 23:57:06', '2024-07-09 18:27:06', '2024-07-09 18:27:06'),
(1226, 213, 227, '2024-07-12 23:57:06', '2024-07-09 18:27:06', '2024-07-09 18:27:06'),
(1227, 214, 228, '2024-07-10 00:07:21', '2024-07-09 18:37:21', '2024-07-09 18:37:21'),
(1228, 214, 228, '2024-07-11 00:07:21', '2024-07-09 18:37:21', '2024-07-09 18:37:21'),
(1229, 214, 228, '2024-07-12 00:07:21', '2024-07-09 18:37:21', '2024-07-09 18:37:21'),
(1230, 214, 228, '2024-07-13 00:07:21', '2024-07-09 18:37:21', '2024-07-09 18:37:21'),
(1235, 216, 230, '2024-07-10 06:40:35', '2024-07-10 01:10:35', '2024-07-10 01:10:35'),
(1236, 216, 230, '2024-07-11 06:40:35', '2024-07-10 01:10:35', '2024-07-10 01:10:35'),
(1237, 216, 230, '2024-07-12 06:40:35', '2024-07-10 01:10:35', '2024-07-10 01:10:35'),
(1238, 216, 230, '2024-07-13 06:40:35', '2024-07-10 01:10:35', '2024-07-10 01:10:35'),
(1243, 218, 231, '2024-07-10 11:21:04', '2024-07-10 05:51:04', '2024-07-10 05:51:04'),
(1244, 218, 231, '2024-07-11 11:21:04', '2024-07-10 05:51:04', '2024-07-10 05:51:04'),
(1245, 218, 231, '2024-07-12 11:21:04', '2024-07-10 05:51:04', '2024-07-10 05:51:04'),
(1246, 218, 231, '2024-07-13 11:21:04', '2024-07-10 05:51:04', '2024-07-10 05:51:04'),
(1255, 221, 234, '2024-07-10 14:59:06', '2024-07-10 09:29:06', '2024-07-10 09:29:06'),
(1256, 221, 234, '2024-07-11 14:59:06', '2024-07-10 09:29:06', '2024-07-10 09:29:06'),
(1257, 221, 234, '2024-07-12 14:59:06', '2024-07-10 09:29:06', '2024-07-10 09:29:06'),
(1258, 221, 234, '2024-07-13 14:59:06', '2024-07-10 09:29:06', '2024-07-10 09:29:06'),
(1259, 222, 235, '2024-07-11 00:38:03', '2024-07-10 19:08:03', '2024-07-10 19:08:03'),
(1260, 222, 235, '2024-07-12 00:38:03', '2024-07-10 19:08:03', '2024-07-10 19:08:03'),
(1261, 222, 235, '2024-07-13 00:38:03', '2024-07-10 19:08:03', '2024-07-10 19:08:03'),
(1262, 222, 235, '2024-07-14 00:38:03', '2024-07-10 19:08:03', '2024-07-10 19:08:03'),
(1263, 223, 236, '2024-07-12 12:36:47', '2024-07-12 07:06:47', '2024-07-12 07:06:47'),
(1264, 223, 236, '2024-07-13 12:36:47', '2024-07-12 07:06:47', '2024-07-12 07:06:47'),
(1265, 223, 236, '2024-07-14 12:36:47', '2024-07-12 07:06:47', '2024-07-12 07:06:47'),
(1266, 223, 236, '2024-07-15 12:36:47', '2024-07-12 07:06:47', '2024-07-12 07:06:47'),
(1299, 235, 235, '2024-07-16 15:53:14', '2024-07-16 10:23:14', '2024-07-16 10:23:14'),
(1300, 235, 235, '2024-07-17 15:53:14', '2024-07-16 10:23:14', '2024-07-16 10:23:14'),
(1301, 236, 236, '2024-07-16 15:54:34', '2024-07-16 10:24:34', '2024-07-16 10:24:34'),
(1302, 236, 236, '2024-07-17 15:54:34', '2024-07-16 10:24:34', '2024-07-16 10:24:34'),
(1305, 238, 235, '2024-07-16 15:56:11', '2024-07-16 10:26:11', '2024-07-16 10:26:11'),
(1306, 238, 235, '2024-07-17 15:56:11', '2024-07-16 10:26:11', '2024-07-16 10:26:11'),
(1309, 240, 240, '2024-07-16 16:03:19', '2024-07-16 10:33:19', '2024-07-16 10:33:19'),
(1310, 240, 240, '2024-07-17 16:03:19', '2024-07-16 10:33:19', '2024-07-16 10:33:19'),
(1313, 242, 226, '2024-07-16 16:13:26', '2024-07-16 10:43:26', '2024-07-16 10:43:26'),
(1314, 242, 226, '2024-07-17 16:13:26', '2024-07-16 10:43:26', '2024-07-16 10:43:26'),
(1315, 243, 248, '2024-07-16 16:47:24', '2024-07-16 11:17:24', '2024-07-16 11:17:24'),
(1316, 243, 248, '2024-07-17 16:47:24', '2024-07-16 11:17:24', '2024-07-16 11:17:24'),
(1317, 244, 249, '2024-07-16 16:49:17', '2024-07-16 11:19:17', '2024-07-16 11:19:17'),
(1318, 244, 249, '2024-07-17 16:49:17', '2024-07-16 11:19:17', '2024-07-16 11:19:17'),
(1325, 248, 235, '2024-07-16 20:56:13', '2024-07-16 15:26:13', '2024-07-16 15:26:13'),
(1326, 248, 235, '2024-07-17 20:56:13', '2024-07-16 15:26:13', '2024-07-16 15:26:13'),
(1329, 250, 250, '2024-07-17 02:47:55', '2024-07-16 21:17:55', '2024-07-16 21:17:55'),
(1330, 250, 250, '2024-07-18 02:47:55', '2024-07-16 21:17:55', '2024-07-16 21:17:55'),
(1337, 254, 251, '2024-07-17 06:53:49', '2024-07-17 01:23:49', '2024-07-17 01:23:49'),
(1338, 254, 251, '2024-07-18 06:53:49', '2024-07-17 01:23:49', '2024-07-17 01:23:49'),
(1351, 261, 236, '2024-07-18 14:25:07', '2024-07-18 08:55:07', '2024-07-18 08:55:07'),
(1352, 261, 236, '2024-07-19 14:25:07', '2024-07-18 08:55:07', '2024-07-18 08:55:07'),
(1357, 264, 235, '2024-07-18 14:48:21', '2024-07-18 09:18:21', '2024-07-18 09:18:21'),
(1358, 264, 235, '2024-07-19 14:48:21', '2024-07-18 09:18:21', '2024-07-18 09:18:21'),
(1369, 270, 236, '2024-07-18 15:51:48', '2024-07-18 10:21:48', '2024-07-18 10:21:48'),
(1370, 270, 236, '2024-07-19 15:51:48', '2024-07-18 10:21:48', '2024-07-18 10:21:48'),
(1371, 271, 255, '2024-07-19 12:27:19', '2024-07-19 06:57:19', '2024-07-19 06:57:19'),
(1372, 271, 255, '2024-07-20 12:27:19', '2024-07-19 06:57:19', '2024-07-19 06:57:19'),
(1373, 272, 256, '2024-07-19 12:34:02', '2024-07-19 07:04:02', '2024-07-19 07:04:02'),
(1374, 272, 256, '2024-07-20 12:34:02', '2024-07-19 07:04:02', '2024-07-19 07:04:02'),
(1377, 274, 257, '2024-07-19 12:54:47', '2024-07-19 07:24:47', '2024-07-19 07:24:47'),
(1378, 274, 257, '2024-07-20 12:54:47', '2024-07-19 07:24:47', '2024-07-19 07:24:47'),
(1379, 275, 259, '2024-07-19 14:18:59', '2024-07-19 08:48:59', '2024-07-19 08:48:59'),
(1380, 275, 259, '2024-07-20 14:18:59', '2024-07-19 08:48:59', '2024-07-19 08:48:59'),
(1399, 282, 260, '2024-07-19 17:33:17', '2024-07-19 12:03:17', '2024-07-19 12:03:17'),
(1400, 282, 260, '2024-07-20 17:33:17', '2024-07-19 12:03:17', '2024-07-19 12:03:17'),
(1401, 283, 240, '2024-07-19 17:36:32', '2024-07-19 12:06:32', '2024-07-19 12:06:32'),
(1402, 283, 240, '2024-07-20 17:36:32', '2024-07-19 12:06:32', '2024-07-19 12:06:32'),
(1403, 284, 261, '2024-07-20 07:00:14', '2024-07-20 01:30:14', '2024-07-20 01:30:14'),
(1404, 284, 261, '2024-07-21 07:00:14', '2024-07-20 01:30:14', '2024-07-20 01:30:14'),
(1405, 284, 261, '2024-07-22 07:00:14', '2024-07-20 01:30:14', '2024-07-20 01:30:14'),
(1406, 285, 236, '2024-07-20 13:39:51', '2024-07-20 08:09:51', '2024-07-20 08:09:51'),
(1407, 285, 236, '2024-07-21 13:39:51', '2024-07-20 08:09:51', '2024-07-20 08:09:51'),
(1408, 285, 236, '2024-07-22 13:39:51', '2024-07-20 08:09:51', '2024-07-20 08:09:51'),
(1409, 286, 235, '2024-07-20 18:29:42', '2024-07-20 12:59:42', '2024-07-20 12:59:42'),
(1410, 286, 235, '2024-07-21 18:29:42', '2024-07-20 12:59:42', '2024-07-20 12:59:42'),
(1411, 286, 235, '2024-07-22 18:29:42', '2024-07-20 12:59:42', '2024-07-20 12:59:42'),
(1412, 287, 255, '2024-07-20 18:35:53', '2024-07-20 13:05:53', '2024-07-20 13:05:53'),
(1413, 287, 255, '2024-07-21 18:35:53', '2024-07-20 13:05:53', '2024-07-20 13:05:53'),
(1414, 287, 255, '2024-07-22 18:35:53', '2024-07-20 13:05:53', '2024-07-20 13:05:53'),
(1415, 288, 262, '2024-07-22 08:17:56', '2024-07-22 02:47:56', '2024-07-22 02:47:56'),
(1416, 288, 262, '2024-07-23 08:17:56', '2024-07-22 02:47:56', '2024-07-22 02:47:56'),
(1417, 288, 262, '2024-07-24 08:17:56', '2024-07-22 02:47:56', '2024-07-22 02:47:56'),
(1418, 289, 260, '2024-07-22 15:30:12', '2024-07-22 10:00:12', '2024-07-22 10:00:12'),
(1419, 289, 260, '2024-07-23 15:30:12', '2024-07-22 10:00:12', '2024-07-22 10:00:12'),
(1420, 289, 260, '2024-07-24 15:30:12', '2024-07-22 10:00:12', '2024-07-22 10:00:12'),
(1421, 290, 263, '2024-07-23 00:29:16', '2024-07-22 18:59:16', '2024-07-22 18:59:16'),
(1422, 290, 263, '2024-07-24 00:29:16', '2024-07-22 18:59:16', '2024-07-22 18:59:16'),
(1423, 290, 263, '2024-07-25 00:29:16', '2024-07-22 18:59:16', '2024-07-22 18:59:16'),
(1424, 291, 235, '2024-07-23 00:41:11', '2024-07-22 19:11:11', '2024-07-22 19:11:11'),
(1425, 291, 235, '2024-07-24 00:41:11', '2024-07-22 19:11:11', '2024-07-22 19:11:11'),
(1426, 291, 235, '2024-07-25 00:41:11', '2024-07-22 19:11:11', '2024-07-22 19:11:11'),
(1427, 292, 236, '2024-07-23 06:42:22', '2024-07-23 01:12:22', '2024-07-23 01:12:22'),
(1428, 292, 236, '2024-07-24 06:42:22', '2024-07-23 01:12:22', '2024-07-23 01:12:22'),
(1429, 292, 236, '2024-07-25 06:42:22', '2024-07-23 01:12:22', '2024-07-23 01:12:22'),
(1430, 293, 228, '2024-07-23 15:39:46', '2024-07-23 10:09:46', '2024-07-23 10:09:46'),
(1431, 293, 228, '2024-07-24 15:39:46', '2024-07-23 10:09:46', '2024-07-23 10:09:46'),
(1432, 293, 228, '2024-07-25 15:39:46', '2024-07-23 10:09:46', '2024-07-23 10:09:46'),
(1437, 295, 255, '2024-07-26 23:33:59', '2024-07-26 18:03:59', '2024-07-26 18:03:59'),
(1438, 295, 255, '2024-07-27 23:33:59', '2024-07-26 18:04:01', '2024-07-26 18:04:01'),
(1439, 295, 255, '2024-07-28 23:33:59', '2024-07-26 18:04:01', '2024-07-26 18:04:01'),
(1440, 295, 255, '2024-07-29 23:33:59', '2024-07-26 18:04:02', '2024-07-26 18:04:02'),
(1441, 296, 235, '2024-07-26 23:35:17', '2024-07-26 18:05:17', '2024-07-26 18:05:17'),
(1442, 296, 235, '2024-07-27 23:35:17', '2024-07-26 18:05:18', '2024-07-26 18:05:18'),
(1443, 296, 235, '2024-07-28 23:35:17', '2024-07-26 18:05:18', '2024-07-26 18:05:18'),
(1444, 296, 235, '2024-07-29 23:35:17', '2024-07-26 18:05:19', '2024-07-26 18:05:19'),
(1449, 298, 236, '2024-07-27 16:18:00', '2024-07-27 10:48:00', '2024-07-27 10:48:00'),
(1450, 298, 236, '2024-07-28 16:18:00', '2024-07-27 10:48:00', '2024-07-27 10:48:00'),
(1451, 298, 236, '2024-07-29 16:18:00', '2024-07-27 10:48:00', '2024-07-27 10:48:00'),
(1452, 298, 236, '2024-07-30 16:18:00', '2024-07-27 10:48:00', '2024-07-27 10:48:00'),
(1453, 299, 264, '2024-07-27 18:18:20', '2024-07-27 12:48:20', '2024-07-27 12:48:20'),
(1454, 299, 264, '2024-07-28 18:18:20', '2024-07-27 12:48:20', '2024-07-27 12:48:20'),
(1455, 299, 264, '2024-07-29 18:18:20', '2024-07-27 12:48:20', '2024-07-27 12:48:20'),
(1456, 299, 264, '2024-07-30 18:18:20', '2024-07-27 12:48:20', '2024-07-27 12:48:20'),
(1457, 300, 265, '2024-07-27 18:49:26', '2024-07-27 13:19:26', '2024-07-27 13:19:26'),
(1458, 300, 265, '2024-07-28 18:49:26', '2024-07-27 13:19:26', '2024-07-27 13:19:26'),
(1459, 300, 265, '2024-07-29 18:49:26', '2024-07-27 13:19:26', '2024-07-27 13:19:26'),
(1460, 300, 265, '2024-07-30 18:49:26', '2024-07-27 13:19:26', '2024-07-27 13:19:26'),
(1461, 301, 266, '2024-07-27 19:20:55', '2024-07-27 13:50:55', '2024-07-27 13:50:55'),
(1462, 301, 266, '2024-07-28 19:20:55', '2024-07-27 13:50:55', '2024-07-27 13:50:55'),
(1463, 301, 266, '2024-07-29 19:20:55', '2024-07-27 13:50:55', '2024-07-27 13:50:55'),
(1464, 301, 266, '2024-07-30 19:20:55', '2024-07-27 13:50:55', '2024-07-27 13:50:55'),
(1465, 302, 260, '2024-07-29 13:02:28', '2024-07-29 07:32:28', '2024-07-29 07:32:28'),
(1466, 302, 260, '2024-07-30 13:02:28', '2024-07-29 07:32:28', '2024-07-29 07:32:28'),
(1467, 302, 260, '2024-07-31 13:02:28', '2024-07-29 07:32:28', '2024-07-29 07:32:28'),
(1468, 302, 260, '2024-08-01 13:02:28', '2024-07-29 07:32:28', '2024-07-29 07:32:28'),
(1469, 303, 236, '2024-07-29 15:14:35', '2024-07-29 09:44:35', '2024-07-29 09:44:35'),
(1470, 303, 236, '2024-07-30 15:14:35', '2024-07-29 09:44:35', '2024-07-29 09:44:35'),
(1471, 303, 236, '2024-07-31 15:14:35', '2024-07-29 09:44:35', '2024-07-29 09:44:35'),
(1472, 304, 235, '2024-07-29 18:58:35', '2024-07-29 13:28:35', '2024-07-29 13:28:35'),
(1473, 304, 235, '2024-07-30 18:58:35', '2024-07-29 13:28:35', '2024-07-29 13:28:35'),
(1474, 304, 235, '2024-07-31 18:58:35', '2024-07-29 13:28:35', '2024-07-29 13:28:35'),
(1475, 305, 240, '2024-07-30 09:12:21', '2024-07-30 03:42:21', '2024-07-30 03:42:21'),
(1476, 305, 240, '2024-07-31 09:12:21', '2024-07-30 03:42:21', '2024-07-30 03:42:21'),
(1477, 305, 240, '2024-08-01 09:12:21', '2024-07-30 03:42:21', '2024-07-30 03:42:21'),
(1478, 306, 236, '2024-08-04 12:27:35', '2024-08-04 06:57:35', '2024-08-04 06:57:35'),
(1479, 306, 236, '2024-08-05 12:27:35', '2024-08-04 06:57:35', '2024-08-04 06:57:35'),
(1480, 306, 236, '2024-08-06 12:27:35', '2024-08-04 06:57:35', '2024-08-04 06:57:35'),
(1481, 307, 268, '2024-08-04 15:57:54', '2024-08-04 10:27:54', '2024-08-04 10:27:54'),
(1482, 307, 268, '2024-08-05 15:57:54', '2024-08-04 10:27:54', '2024-08-04 10:27:54'),
(1483, 307, 268, '2024-08-06 15:57:54', '2024-08-04 10:27:54', '2024-08-04 10:27:54'),
(1484, 308, 235, '2024-08-04 23:34:42', '2024-08-04 18:04:42', '2024-08-04 18:04:42'),
(1485, 308, 235, '2024-08-05 23:34:42', '2024-08-04 18:04:42', '2024-08-04 18:04:42'),
(1486, 308, 235, '2024-08-06 23:34:42', '2024-08-04 18:04:42', '2024-08-04 18:04:42'),
(1487, 309, 269, '2024-08-06 09:21:15', '2024-08-06 03:51:15', '2024-08-06 03:51:15'),
(1488, 309, 269, '2024-08-07 09:21:15', '2024-08-06 03:51:15', '2024-08-06 03:51:15'),
(1489, 309, 269, '2024-08-08 09:21:15', '2024-08-06 03:51:15', '2024-08-06 03:51:15'),
(1490, 310, 270, '2024-08-06 19:44:43', '2024-08-06 14:14:43', '2024-08-06 14:14:43'),
(1491, 310, 270, '2024-08-07 19:44:43', '2024-08-06 14:14:43', '2024-08-06 14:14:43'),
(1492, 310, 270, '2024-08-08 19:44:43', '2024-08-06 14:14:43', '2024-08-06 14:14:43'),
(1502, 314, 236, '2024-08-17 05:33:52', '2024-08-17 00:03:52', '2024-08-17 00:03:52'),
(1503, 314, 236, '2024-08-18 05:33:52', '2024-08-17 00:03:52', '2024-08-17 00:03:52'),
(1504, 314, 236, '2024-08-19 05:33:52', '2024-08-17 00:03:52', '2024-08-17 00:03:52'),
(1505, 314, 236, '2024-08-20 05:33:52', '2024-08-17 00:03:52', '2024-08-17 00:03:52'),
(1506, 315, 273, '2024-08-17 05:38:50', '2024-08-17 00:08:50', '2024-08-17 00:08:50'),
(1507, 315, 273, '2024-08-18 05:38:50', '2024-08-17 00:08:50', '2024-08-17 00:08:50'),
(1508, 315, 273, '2024-08-19 05:38:50', '2024-08-17 00:08:50', '2024-08-17 00:08:50'),
(1509, 315, 273, '2024-08-20 05:38:50', '2024-08-17 00:08:50', '2024-08-17 00:08:50'),
(1510, 316, 274, '2024-08-17 06:44:41', '2024-08-17 01:14:41', '2024-08-17 01:14:41'),
(1511, 316, 274, '2024-08-18 06:44:41', '2024-08-17 01:14:41', '2024-08-17 01:14:41'),
(1512, 316, 274, '2024-08-19 06:44:41', '2024-08-17 01:14:41', '2024-08-17 01:14:41'),
(1513, 316, 274, '2024-08-20 06:44:41', '2024-08-17 01:14:41', '2024-08-17 01:14:41'),
(1514, 317, 235, '2024-08-17 16:14:13', '2024-08-17 10:44:13', '2024-08-17 10:44:13'),
(1515, 317, 235, '2024-08-18 16:14:13', '2024-08-17 10:44:13', '2024-08-17 10:44:13'),
(1516, 317, 235, '2024-08-19 16:14:13', '2024-08-17 10:44:13', '2024-08-17 10:44:13'),
(1517, 317, 235, '2024-08-20 16:14:13', '2024-08-17 10:44:13', '2024-08-17 10:44:13'),
(1518, 318, 275, '2024-08-18 12:24:53', '2024-08-18 06:54:53', '2024-08-18 06:54:53'),
(1519, 318, 275, '2024-08-19 12:24:53', '2024-08-18 06:54:53', '2024-08-18 06:54:53'),
(1520, 318, 275, '2024-08-20 12:24:53', '2024-08-18 06:54:53', '2024-08-18 06:54:53'),
(1521, 318, 275, '2024-08-21 12:24:53', '2024-08-18 06:54:53', '2024-08-18 06:54:53'),
(1522, 319, 276, '2024-08-18 12:29:18', '2024-08-18 06:59:18', '2024-08-18 06:59:18'),
(1523, 319, 276, '2024-08-19 12:29:18', '2024-08-18 06:59:18', '2024-08-18 06:59:18'),
(1524, 319, 276, '2024-08-20 12:29:18', '2024-08-18 06:59:18', '2024-08-18 06:59:18'),
(1525, 319, 276, '2024-08-21 12:29:18', '2024-08-18 06:59:18', '2024-08-18 06:59:18'),
(1526, 320, 277, '2024-08-18 12:34:00', '2024-08-18 07:04:00', '2024-08-18 07:04:00'),
(1527, 320, 277, '2024-08-19 12:34:00', '2024-08-18 07:04:00', '2024-08-18 07:04:00'),
(1528, 320, 277, '2024-08-20 12:34:00', '2024-08-18 07:04:00', '2024-08-18 07:04:00'),
(1529, 320, 277, '2024-08-21 12:34:00', '2024-08-18 07:04:00', '2024-08-18 07:04:00'),
(1530, 321, 1, '2024-08-20 05:34:29', '2024-08-20 00:04:29', '2024-08-20 00:04:29'),
(1531, 321, 1, '2024-08-21 05:34:29', '2024-08-20 00:04:29', '2024-08-20 00:04:29'),
(1532, 321, 1, '2024-08-22 05:34:29', '2024-08-20 00:04:29', '2024-08-20 00:04:29'),
(1533, 321, 1, '2024-08-23 05:34:29', '2024-08-20 00:04:29', '2024-08-20 00:04:29'),
(1534, 322, 278, '2024-08-20 11:30:19', '2024-08-20 06:00:19', '2024-08-20 06:00:19'),
(1535, 322, 278, '2024-08-21 11:30:19', '2024-08-20 06:00:19', '2024-08-20 06:00:19'),
(1536, 322, 278, '2024-08-22 11:30:19', '2024-08-20 06:00:19', '2024-08-20 06:00:19'),
(1537, 322, 278, '2024-08-23 11:30:19', '2024-08-20 06:00:19', '2024-08-20 06:00:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_us_email_unique` (`email`),
  ADD UNIQUE KEY `contact_us_contact_unique` (`contact`);

--
-- Indexes for table `end_competition`
--
ALTER TABLE `end_competition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `legal_note`
--
ALTER TABLE `legal_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otp_user_id_foreign` (`user_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participants_competition_id_foreign` (`competition_id`);

--
-- Indexes for table `participant_answer`
--
ALTER TABLE `participant_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participant_answer_com_participant_id_foreign` (`com_participant_id`),
  ADD KEY `participant_answer_qustion_id_foreign` (`question_id`);

--
-- Indexes for table `participant_competition`
--
ALTER TABLE `participant_competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participant_competition_participant_id_foreign` (`participant_id`),
  ADD KEY `participant_competition_competition_id_foreign` (`competition_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_type_question_id_foreign` (`question_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_competition_id_foreign` (`competition_id`);

--
-- Indexes for table `reffer_logs`
--
ALTER TABLE `reffer_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_register_dates`
--
ALTER TABLE `user_register_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_register_dates_participant_id_foreign` (`participant_id`),
  ADD KEY `user_register_dates_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `end_competition`
--
ALTER TABLE `end_competition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legal_note`
--
ALTER TABLE `legal_note`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `participant_answer`
--
ALTER TABLE `participant_answer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `participant_competition`
--
ALTER TABLE `participant_competition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reffer_logs`
--
ALTER TABLE `reffer_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `user_register_dates`
--
ALTER TABLE `user_register_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1538;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant_answer`
--
ALTER TABLE `participant_answer`
  ADD CONSTRAINT `participant_answer_com_participant_id_foreign` FOREIGN KEY (`com_participant_id`) REFERENCES `participant_competition` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participant_answer_qustion_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participant_competition`
--
ALTER TABLE `participant_competition`
  ADD CONSTRAINT `participant_competition_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participant_competition_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_type`
--
ALTER TABLE `question_type`
  ADD CONSTRAINT `question_type_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_register_dates`
--
ALTER TABLE `user_register_dates`
  ADD CONSTRAINT `user_register_dates_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_register_dates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
