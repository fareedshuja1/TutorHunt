-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: coursesandtutors.co.uk.mysql:3306
-- Generation Time: Oct 03, 2016 at 11:35 AM
-- Server version: 5.5.52-MariaDB-1~wheezy
-- PHP Version: 5.4.45-0+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coursesandtutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(25) NOT NULL,
  `admin_lname` varchar(25) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `is_active` int(2) NOT NULL,
  `is_sup_admin` int(2) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_password`, `is_active`, `is_sup_admin`) VALUES
(1, 'Farid', 'Khan', 'fareedshuja@gmail.com', 'bc180dbc583491c00f8a1cd134f7517b', 1, 1),
(2, 'Sitwat ', 'Ali', 'info@realanimationworks.com', 'bc9600ae65118029b46b70fc8008f965', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(100) NOT NULL,
  `ad_pic` varchar(100) NOT NULL,
  `ad_link` varchar(100) NOT NULL,
  `ad_description` text NOT NULL,
  `ad_publish_date` date NOT NULL,
  `ad_expire_date` date NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`ad_id`, `ad_title`, `ad_pic`, `ad_link`, `ad_description`, `ad_publish_date`, `ad_expire_date`) VALUES
(1, 'Advertise With US', '1-dummy_ad_one.jpg', '', '<p><span style="font-size:14px">You can now sent us your ad and we will post it for you. Please email us your details at <span style="color:#0000ff">info@coursesandtutors.co.uk</span></span></p>\r\n', '2016-08-25', '2016-12-12'),
(4, 'Real Animation Works Ltd', '4-Real_Animation_works_ltd.jpg', 'http://www.realanimationworks.com/', '<p><strong>About us</strong></p>\n\n<p>At Real Animation Works all our trainings are one to one you can call us at anytime to book your lessons. We believe in one to one training in AutoCAD, 3ds max, Maya and any other training/tuition platforms to be private rather than in a group of 20 people. We believe professionals can concentrate and are more confident in a private session. We are very flexible in payments, timings and sessions. We try our level best to track ourselves according to the client&#39;s availability.</p>\n\n<p><br />\n<strong>Our Team</strong></p>\n\n<p>Our team is talented and passionate design experts who bring a wealth of knowledge, experience and empathy to the Real Animation works teaching environment.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Our Birth</strong></p>\n\n<p>Real Animation Works Ltd was founded with the focus of fast track one to one training in London combined with professional theory which is more effective than a 2 year theoretical instruction. This unique way of training model has proven to be successful after completing training with more than 100&#39;s of professionals allowing them to achieve more in 3 months or less. In 3 to 4 months or less, our clients receive a rigorous and comprehensive tuition including lectures, tutorials, productions, and working with us using their projects and it makes Real Animation Works training perfect for people who need help before or after starting their careers in the entertainment, Film, advertising, interior/exterior and architectural industrie</p>\n', '2016-08-29', '2025-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_link` text NOT NULL,
  `blog_image` text NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_link`, `blog_image`) VALUES
(21, 'Real Animation works ltd', 'http://www.realanimationworks.com/', '21-Blog-21.jpg'),
(22, 'At the heart of connecting people to higher education', 'https://www.ucas.com/', '22-Blog-22.png'),
(23, 'Parent Pay Amazing way to pay', 'https://www.parentpay.com/', '23-Blog-23.jpg'),
(24, 'Explore learning', 'http://www.explorelearning.co.uk/', '24-Blog-24.jpg'),
(25, 'Kumon', 'http://www.kumon.co.uk/find-a-tutor/london.htm', '25-Blog-25.png'),
(26, 'Net Mums', 'http://www.netmums.com/lewisham/local/view/after-school-activities/academic-and-languages/english-and-maths-tutor-bromley-beckenham-lewisham-1', '26-Blog-26.png'),
(27, 'Mathletics', 'http://uk.mathletics.com/', '27-Blog-27.png'),
(28, 'Maths tutor London', 'http://www.mathtutor.ac.uk/', '28-Blog-28.png'),
(29, 'Owl tutors', 'http://owltutors.co.uk/tutors/london/maths/', '29-Blog-29.png'),
(30, 'Tuition Fee Costs at London Universities', 'http://www.studylondon.ac.uk/application-advice/tuition-fees-at-london-universities', '30-Blog-30.jpg'),
(31, 'Find a London University Scholarship', 'http://www.studylondon.ac.uk/application-advice/london-university-scholarships', '31-Blog-31.jpg'),
(32, 'Summer School Programmes in London', 'http://www.studylondon.ac.uk/application-advice/faqs/london-summer-school', '32-Blog-32.jpg'),
(33, 'Education for students aged 16 and under', 'http://www.educationuk.org/global/articles/16-and-under-education-path/', '33-Blog-33.jpg'),
(34, 'The boarding school system, subjects and qualifications', 'http://www.educationuk.org/global/articles/uk-boarding-school-system/', '34-Blog-34.jpg'),
(35, 'UK teaching and education', 'http://www.educationuk.org/global/articles/teaching-and-education/', '35-Blog-35.jpg'),
(36, 'Building a school system that works for everyone', 'https://www.gov.uk/government/news/building-a-school-system-that-works-for-everyone', '36-Blog-36.jpg'),
(37, 'Primary teaching jobs', 'https://jobs.theguardian.com/jobs/primary-teaching/direct-employer/?INTCMP=mernw1', '37-Blog-37.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'UNITED KINGDOM');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_email` varchar(50) NOT NULL,
  `login_password` varchar(100) NOT NULL,
  `login_account_type` varchar(10) NOT NULL,
  `login_account_status` varchar(10) NOT NULL,
  `account_created_date` date NOT NULL,
  PRIMARY KEY (`login_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_email`, `login_password`, `login_account_type`, `login_account_status`, `account_created_date`) VALUES
('animatrs@hotmail.com', 'bc9600ae65118029b46b70fc8008f965', 'STUDENT', 'ACTIVE', '2016-08-22'),
('celine.lepicard@laposte.net', '7b823410611a72b44f5f2de484a2ec18', 'TUTOR', 'ACTIVE', '2016-09-29'),
('fareedshuja@gmail.com', '287991bc0a634b67a92c2c5881d2abff', 'STUDENT', 'ACTIVE', '2016-07-04'),
('faridshuja@yahoo.com', 'bc180dbc583491c00f8a1cd134f7517b', 'TUTOR', 'ACTIVE', '2016-07-12'),
('henrygovil@yahoo.co.uk', '9f876785ec5425a0511339bed7230c2a', 'TUTOR', 'ACTIVE', '2016-09-14'),
('info@realanimationworks.com', 'bc9600ae65118029b46b70fc8008f965', 'TUTOR', 'ACTIVE', '2016-08-02'),
('maya_sitwat@yahoo.com', '593368f778a724452dce46cd2f22116f', 'TUTOR', 'ACTIVE', '2016-09-15'),
('ritochka2007@ya.ru', 'cc0c90fc2d1d1dcee9ed5b1e87650bfe', 'TUTOR', 'ACTIVE', '2016-09-26'),
('rusbogdana@yahoo.com', 'af9502201f5a93e8b604682bd6cb0baf', 'TUTOR', 'ACTIVE', '2016-09-26'),
('s.taimur@se15.qmul.ac.uk', '7eeac41ba85ba29cd7474ede574f4274', 'STUDENT', 'ACTIVE', '2016-09-09'),
('sambrandman@gmail.com', '2163c17ca50bb0fcd227460c4f682a40', 'TUTOR', 'ACTIVE', '2016-09-15'),
('sengupta.kajal@gmail.com', '62167b4425701f906c3b71f5e3f236ba', 'TUTOR', 'ACTIVE', '2016-09-30'),
('sohail_696@hotmail.com', '671a91792a48838bf5a248d242e99021', 'TUTOR', 'ACTIVE', '2016-09-28'),
('sumera_saleem5@yahoo.com', '1828baf0209ea35eb09fd75b9a0887f9', 'TUTOR', 'ACTIVE', '2016-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `main_subjects`
--

CREATE TABLE IF NOT EXISTS `main_subjects` (
  `mains_id` int(11) NOT NULL,
  `mains_title` varchar(50) NOT NULL,
  `mains_visibility` varchar(10) NOT NULL,
  PRIMARY KEY (`mains_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_subjects`
--

INSERT INTO `main_subjects` (`mains_id`, `mains_title`, `mains_visibility`) VALUES
(1, 'AGRICULTURE', 'VISIBLE'),
(2, 'ART AND CRAFTS', 'VISIBLE'),
(3, 'BEAUTY', 'VISIBLE'),
(4, 'BUSINESS AND MANAGEMENT', 'VISIBLE'),
(5, 'COMMUNICATION AND MEDIA', 'VISIBLE'),
(6, 'COMPUTING AND IT', 'VISIBLE'),
(7, 'CONSERVATION', 'VISIBLE'),
(8, 'CONSTRUCTION', 'VISIBLE'),
(9, 'COOKERY', 'VISIBLE'),
(10, 'DRIVING AND ROAD SAFETY', 'VISIBLE'),
(11, 'ENGINEERING', 'VISIBLE'),
(12, 'ENGLISH', 'VISIBLE'),
(13, 'FASHION TEXTILES AND CLOTHING', 'VISIBLE'),
(14, 'FILM AND TV', 'VISIBLE'),
(15, 'GARDENING AND FLORISTRY', 'VISIBLE'),
(16, 'HAIRDRESSING', 'VISIBLE'),
(17, 'HEALTH CARE', 'VISIBLE'),
(18, 'HISTORY', 'VISIBLE'),
(19, 'INTERIOR DESIGN', 'VISIBLE'),
(20, 'LANGUAGE', 'VISIBLE'),
(21, 'LAW AND SOCIAL SCIENCES', 'VISIBLE'),
(22, 'LEISURE SERVICES AND TOURISM', 'VISIBLE'),
(23, 'LOGISTICS DISTRIBUTION AND TRANSPORT', 'HIDDEN'),
(24, 'MUSIC AND PERFORMING ARTS', 'VISIBLE'),
(25, 'PERSONAL CARE AND DEVELOPMENT', 'VISIBLE'),
(26, 'PHOTOGRAPHY', 'VISIBLE'),
(27, 'PLUMBING', 'VISIBLE'),
(28, 'SALES MARKETING AND RETAILING', 'VISIBLE'),
(29, 'SCIENCES AND MATHEMATICS', 'VISIBLE'),
(30, 'SPORTS', 'VISIBLE'),
(31, 'WRITING', 'VISIBLE'),
(32, 'LANGUAGES', 'HIDDEN'),
(33, 'ACADEMICS', 'VISIBLE'),
(34, 'ARCHITECTURE', 'VISIBLE');

-- --------------------------------------------------------

--
-- Table structure for table `messages_main`
--

CREATE TABLE IF NOT EXISTS `messages_main` (
  `msg_id` int(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `msg_subject` varchar(50) NOT NULL,
  `msg_description` text NOT NULL,
  `is_read` varchar(6) NOT NULL,
  `sent_by_student` varchar(3) NOT NULL,
  `sent_by_tutor` varchar(3) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `FK_messages_main` (`student_id`),
  KEY `FK_messages_tutor` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message_reply`
--

CREATE TABLE IF NOT EXISTS `message_reply` (
  `msg_reply_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `reply_description` text NOT NULL,
  `reply_date_time` date NOT NULL,
  `reply_is_read` varchar(6) NOT NULL,
  PRIMARY KEY (`msg_reply_id`),
  KEY `FK_message_reply` (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(25) NOT NULL,
  `page_content` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_content`) VALUES
(1, 'home', '<p><img alt="" src="http://coursesandtutors.co.uk/images/Capture.JPG" style="height:25%; width:100%" /></p>\r\n\r\n<p><span style="font-size:16px">Courses and Tutors is an excellent platform that makes the whole process of locating tutors close to your home quick and efficient. By using our easy search feature, you can look for tutors for your selected subjects,&nbsp;operating in your selected town.</span></p>\r\n\r\n<p><span style="font-size:16px">If you are a tutor and possess some good tutoring skills in your area of expertise, <strong><a href="http://coursesandtutors.co.uk/signup">Signup</a></strong> today and let the students find you. Likewise, if you are a student, or parents and looking for a skilled tutor to teach you or your child a subject of your choice, then join us, locate the tutor, sent unlimited messages and purchase the contact details for your selected tutor.</span></p>\r\n\r\n<p><span style="font-size:16px">You pay a <strong>One-off-Payment&nbsp;</strong>for tutor&#39;s contact details and we charge a small amount of only <strong>&pound;5</strong>, as compared to the typical tuition academies who charge ongoing commissions from both students and tutors.&nbsp;&nbsp;</span></p>\r\n\r\n<p><span style="font-size:16px"><strong>We do not charge any commision from tutors.</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(2, 'faqs', '<p><span style="color:#0000cd"><span style="font-size:16px"><strong>1. What is &nbsp;Courses and Tutors</strong></span></span></p>\r\n\r\n<p>Courses and Tutors: Mission is to&nbsp; bring tutors and students under one single umbrella.</p>\r\n\r\n<p>Any subject you are motivated to learn or for your own self progress, we believe we have the perfect registered tutors for you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#0000cd"><span style="font-size:16px"><strong>2. How much do I need to pay for tutor&#39;s contact details?</strong></span></span></p>\r\n\r\n<p>You have to pay an amount of &pound;5 for tutor&#39;s contact details.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#0000cd"><span style="font-size:16px"><strong>3. How much does the tutor charge?</strong></span></span></p>\r\n\r\n<p>You can see the hourly rate displayed on each tutor&#39;s profile page.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#0000cd"><span style="font-size:16px"><strong>4. Where will the tuition take place?</strong></span></span></p>\r\n\r\n<p>This will be totally up to you and the tutor.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, 'contact_us', '<p><span style="font-size:18px">We would be happy to recieve your enquiries and we will reply to them.&nbsp;</span></p>\n\n<p><span style="font-size:18px">For general enquiries please email us at: &nbsp;&nbsp;<span style="color:#0000ff">info@coursesandtutors.co.uk</span>&nbsp;</span>&nbsp;</p>\n'),
(4, 'resources', '<h1><a href="http://www.telegraph.co.uk/education/secondaryeducation/9942791/Private-tutoring-time-well-invested.html" target="_blank">Private tutoring: time well invested</a></h1>\r\n\r\n<h2><a href="http://www.telegraph.co.uk/education/secondaryeducation/9942791/Private-tutoring-time-well-invested.html" target="_blank">A tutor can provide the help your child needs to progress, says Nick Morrison.</a><br />\r\n<br />\r\n&nbsp;</h2>\r\n\r\n<p>When you are paying upwards of &pound;15,000 a year to have your child privately educated, the prospect of forking out for extra tuition may not sit well with you. But that is exactly what seems to be happening as an increasing number of parents look to &ldquo;top-up&rdquo; their child&rsquo;s already expensive education with a private tutor.</p>\r\n\r\n<p>According to managing director Nevil Chiles of Kensington &amp; Chelsea Tutors, around 60-70 per cent of its students are from private schools, and numbers have been rising ever since the west London agency was established 10 years ago. The agency&rsquo;s students tend to fall into two groups, says Chiles. There are those who are struggling with a particular subject and benefit from one-to-one tuition. This does not necessarily imply a problem with the school, as even with the smaller classes of an independent establishment, teachers cannot always give all their pupils the attention they need. Or it may be that a different approach can provide that &ldquo;eureka&rdquo; moment, when it starts to make sense.</p>\r\n\r\n<p>The second group consists of students who are already excelling but whose parents want to ensure they go on to their preferred school or university. For both groups, extra tuition is particularly popular in the run-up to exams, with maths and sciences the most commonly chosen subjects, although foreign languages are also high on the priority list.</p>\r\n\r\n<p>&ldquo;Rather than trying to cover a wide range of subjects, it makes sense to focus on one or two &mdash; whether those are the students&rsquo; weakest or those in which they excel. You can only do so much,&rdquo; says Chiles.</p>\r\n\r\n<p>Parents may worry that a school will feel put-out if they opt for private tuition, assuming it is a sign of dissatisfaction, but this is often not the case, according to William Stadlen, director of Holland Park Tuition, also in west London. Independently educated children, he explains, make up &ldquo;the core&rdquo; of the agency&rsquo;s students and many are referred by their school, often when the child is having difficulty with a particular subject. &ldquo;We have seen a sea change and schools are now harnessing the idea of private tutoring for pupils. It is an extra service,&rdquo; says Stadlen.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p>Many parents believe that getting their child into the right prep school is a pivotal moment in their education and, in the eight years since he founded the agency, Stadlen has seen the focus shift from GCSE-age pupils to 13-plus to 11-plus, and now to seven- and eight-year-olds.</p>\r\n\r\n<p>Some schools, however, express reservations about private tutoring and believe parents should be able to rely entirely on the school. &ldquo;If you&rsquo;re sending a child to a good independent school and they need extra help, this should be provided in-house, through excellent teachers and support staff,&rdquo; says Jane Grubb, head of Dunhurst, the preparatory school for Bedales in Hampshire. &ldquo;The children are already under a lot of pressure, it&rsquo;s a long day as it is and there&rsquo;s a danger that children will lose the love of learning.&rdquo;</p>\r\n\r\n<p>But for struggling pupils, tutoring can boost confidence and give previously underperforming children a track record of success. This creates a momentum of its own, says Stadlen. For pupils who are already doing well, tutoring can offer scope for fine-tuning exam and revision technique.</p>\r\n\r\n<p>David Boddy, head of St James Senior Boys&rsquo; School in Ashford, Surrey, recognises the danger of putting pressure on pupils but believes tutoring can be useful, particularly for A-level students wanting to ensure they get into their first choice of university. He estimates that around 10 per cent of sixth-form and Year 11 boys at St James have private tutors, and the school has a list of recommended tutors. &ldquo;Securing top grades to meet your offers is now much more crucial than in the past as offers tend to be quite high,&rdquo; says Boddy. &ldquo;Tutoring is also useful for boys who need a bit of a confidence boost &mdash; for example, pupils with special needs &mdash; or for those who require help with work discipline.&rdquo;</p>\r\n\r\n<p>For some parents, peer pressure is a factor. With so many hiring a tutor, the concern that neglecting to do so could leave your child at a disadvantage can be a powerful motivator.</p>\r\n\r\n<p>&ldquo;It&rsquo;s not always enough to have a private school education, students also need to keep up with the competition,&rdquo; says Joanne Kashmina, academic registrar at Carfax Private Tutors, an agency based in Oxford and London. The bulk of its work is with children who are struggling, often where English is not their first language, while around 20 per cent is with students who are doing well but perhaps want extra help preparing for exams.</p>\r\n\r\n<p>If you do hire a tutor, regular sessions maintain momentum. Once a week is typical, once a fortnight at a push but any less frequent and the benefits are likely to be lost in between meetings. At Kensington &amp; Chelsea Tutors, Chiles recommends two hours as the optimum length of each session, with one hour for under-13s, although Holland Park Tuition advises one hour, and at Carfax Private Tutors the standard length is 90 minutes.</p>\r\n\r\n<p>The cost? Holland Park Tuition charges &pound;58 an hour, and the standard rate at Carfax Private Tutors is &pound;55 an hour. Kensington &amp; Chelsea Tutors charges &pound;40 an hour, or &pound;60 for two students, and has developed a package to provide secure online tutoring. Individually booked tutors usually cost upwards of &pound;20 an hour.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Securing top grades to meet your offers is much more crucial than \r\nin the past\r\n" src="http://i.telegraph.co.uk/multimedia/archive/02514/is0313-p12-HOLLAND_2514824b.jpg" /></p>\r\n\r\n<p><strong>Steps to choosing a suitable tutor</strong></p>\r\n\r\n<p>Often the best way to find a tutor is to go on the personal recommendation of someone you know. It may be worth approaching your child&rsquo;s school to ask if they can suggest someone.</p>\r\n\r\n<p>The most important factor is whether the tutor can develop a rapport with your child. Just because a tutor has worked wonders with a friend&rsquo;s offspring doesn&rsquo;t mean they will be able to do the same for yours.</p>\r\n\r\n<p>Interview the tutor first. Ask for references and check that their qualifications are appropriate and that they&rsquo;ve been screened by the Criminal Records Bureau (CRB). Book an initial session before committing further.</p>\r\n\r\n<p>Sharing a tutor between friends reduces the cost but also removes one of the main advantages of tutoring, namely one-to-one attention. The exception is foreign languages, where groups could help in conversation practice, provided pupils are at a similar level.</p>\r\n\r\n<p>There should be no need to supervise sessions and your presence in the room may be off-putting, although for younger children you may want to be in an adjoining room.</p>\r\n\r\n<p>Any time you feel it is not working out you should be able to cancel your sessions, or change tutor if you are with an agency.</p>\r\n\r\n<p><strong>Mica Bowman, 18</strong></p>\r\n\r\n<p>Michele Bowman first hired tutors to help her daughter get through her GCSEs. A student at Prior&rsquo;s Field in Godalming, Surrey, she will be taking A-levels this summer, bolstered by weekend tutorials in history of art and psychology.</p>\r\n\r\n<p>&ldquo;We felt Mica needed help with exam technique and we also realised that she does much better one-on-one than in a classroom,&rdquo; explains Bowman, who contacted Kensington &amp; Chelsea Tutors on the advice of a friend who used them for her sons, including one who was attending Eton.</p>\r\n\r\n<p>&ldquo;Mica has established a good rapport with her tutors and has gained in confidence as a result of the tutoring,&rdquo; adds Bowman.</p>\r\n\r\n<p><em>This article first appeared in the Daily Telegraph &#39;Independent Schools&#39; supplement on Saturday 16 March.<br />\r\n<br />\r\n<br />\r\nhttp://www.telegraph.co.uk/education/secondaryeducation/9942791/Private-tutoring-time-well-invested.html</em></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `date_time` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `FK_payment_student` (`student_id`),
  KEY `FK_payment_tutor` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_settings`
--

CREATE TABLE IF NOT EXISTS `paypal_settings` (
  `pay_id` int(11) NOT NULL,
  `paypal_account` varchar(50) NOT NULL,
  `purchase_amount` int(5) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paypal_settings`
--

INSERT INTO `paypal_settings` (`pay_id`, `paypal_account`, `purchase_amount`) VALUES
(1, 'faridshuja@live.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `qualification_level`
--

CREATE TABLE IF NOT EXISTS `qualification_level` (
  `qual_level_id` int(11) NOT NULL,
  `qual_level_title` varchar(25) NOT NULL,
  PRIMARY KEY (`qual_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qualification_level`
--

INSERT INTO `qualification_level` (`qual_level_id`, `qual_level_title`) VALUES
(3, 'ACCA'),
(4, 'ABRSM'),
(5, 'AS LEVEL'),
(6, 'A LEVEL'),
(7, 'ACA'),
(8, 'AAT'),
(9, 'BA'),
(10, 'BED'),
(11, 'BENG'),
(12, 'BMUS'),
(13, 'BSC'),
(14, 'BTEC'),
(15, 'CELTA'),
(16, 'CERTED'),
(17, 'CIMA'),
(18, 'DEGREE'),
(19, 'DIPABRSM'),
(20, 'DIPLOMA'),
(21, 'GCSE'),
(22, 'GRADUATE DIPLOMA IN LAW'),
(23, 'HND'),
(24, 'IB'),
(25, 'IELTS'),
(26, 'IGCSE'),
(27, 'INTERNATIONAL BACCALAUREA'),
(28, 'LLB'),
(29, 'LLM'),
(30, 'LPC'),
(31, 'MA'),
(32, 'MASTERS'),
(33, 'MBA'),
(34, 'MBBS'),
(35, 'MBCHB'),
(36, 'MCHEM'),
(37, 'MED'),
(38, 'MENG'),
(39, 'MMATH'),
(40, 'MMUS'),
(41, 'MPHARM'),
(42, 'MPHIL'),
(43, 'MPHYS'),
(44, 'MRES'),
(45, 'MSC'),
(46, 'MSCI'),
(47, 'NVQ'),
(48, 'O LEVEL'),
(49, 'OTHER'),
(50, 'OVERSEAS QUALIFICATION'),
(51, 'PGCE'),
(52, 'PGCERT'),
(53, 'PGDE'),
(54, 'PGDIP'),
(55, 'PHD'),
(56, 'PROFESSIONAL'),
(57, 'PTLLS'),
(58, 'QTLS'),
(59, 'QTS'),
(60, 'TEFL');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` int(11) NOT NULL,
  `resource_title` varchar(200) NOT NULL,
  `resource_link` text NOT NULL,
  `resource_details` text NOT NULL,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_title`, `resource_link`, `resource_details`) VALUES
(1, 'Private tutoring: time well invested testing', 'http://www.telegraph.co.uk/education/secondaryeducation/9942791/Private-tutoring-time-well-invested.html', '<p>When you are paying upwards of &pound;15,000 a year to have your child privately educated, the prospect of forking out for extra tuition may not sit well with you. But that is exactly what seems to be happening as an increasing number of parents look to &ldquo;top-up&rdquo; their child&rsquo;s already expensive education with a private tutor.</p>\r\n\r\n<p>According to managing director Nevil Chiles of Kensington &amp; Chelsea Tutors, around 60-70 per cent of its students are from private schools, and numbers have been rising ever since the west London agency was established 10 years ago. The agency&rsquo;s students tend to fall into two groups, says Chiles. There are those who are struggling with a particular subject and benefit from one-to-one tuition. This does not necessarily imply a problem with the school, as even with the smaller classes of an independent establishment, teachers cannot always give all their pupils the attention they need. Or it may be that a different approach can provide that &ldquo;eureka&rdquo; moment, when it starts to make sense.</p>\r\n\r\n<p>The second group consists of students who are already excelling but whose parents want to ensure they go on to their preferred school or university. For both groups, extra tuition is particularly popular in the run-up to exams, with maths and sciences the most commonly chosen subjects, although foreign languages are also high on the priority list.</p>\r\n\r\n<p>Rather than trying to cover a wide range of subjects, it makes sense to focus on one or two &mdash; whether those are the students&rsquo; weakest or those in which they excel. You can only do so much,&rdquo; says Chiles.</p>\r\n\r\n<p>Parents may worry that a school will feel put-out if they opt for private tuition, assuming it is a sign of dissatisfaction, but this is often not the case, according to William Stadlen, director of Holland Park Tuition, also in west London. Independently educated children, he explains, make up &ldquo;the core&rdquo; of the agency&rsquo;s students and many are referred by their school, often when the child is having difficulty with a particular subject. &ldquo;We have seen a sea change and schools are now harnessing the idea of private tutoring for pupils. It is an extra service,&rdquo; says Stadlen.<br />\r\n&nbsp;</p>\r\n\r\n<p>Many parents believe that getting their child into the right prep school is a pivotal moment in their education and, in the eight years since he founded the agency, Stadlen has seen the focus shift from GCSE-age pupils to 13-plus to 11-plus, and now to seven- and eight-year-olds.</p>\r\n\r\n<p>Some schools, however, express reservations about private tutoring and believe parents should be able to rely entirely on the school. &ldquo;If you&rsquo;re sending a child to a good independent school and they need extra help, this should be provided in-house, through excellent teachers and support staff,&rdquo; says Jane Grubb, head of Dunhurst, the preparatory school for Bedales in Hampshire. &ldquo;The children are already under a lot of pressure, it&rsquo;s a long day as it is and there&rsquo;s a danger that children will lose the love of learning.&rdquo;</p>\r\n\r\n<p>But for struggling pupils, tutoring can boost confidence and give previously underperforming children a track record of success. This creates a momentum of its own, says Stadlen. For pupils who are already doing well, tutoring can offer scope for fine-tuning exam and revision technique.</p>\r\n\r\n<p>David Boddy, head of St James Senior Boys&rsquo; School in Ashford, Surrey, recognises the danger of putting pressure on pupils but believes tutoring can be useful, particularly for A-level students wanting to ensure they get into their first choice of university. He estimates that around 10 per cent of sixth-form and Year 11 boys at St James have private tutors, and the school has a list of recommended tutors. &ldquo;Securing top grades to meet your offers is now much more crucial than in the past as offers tend to be quite high,&rdquo; says Boddy. &ldquo;Tutoring is also useful for boys who need a bit of a confidence boost &mdash; for example, pupils with special needs &mdash; or for those who require help with work discipline.&rdquo;</p>\r\n\r\n<p>For some parents, peer pressure is a factor. With so many hiring a tutor, the concern that neglecting to do so could leave your child at a disadvantage can be a powerful motivator.</p>\r\n\r\n<p>&ldquo;It&rsquo;s not always enough to have a private school education, students also need to keep up with the competition,&rdquo; says Joanne Kashmina, academic registrar at Carfax Private Tutors, an agency based in Oxford and London. The bulk of its work is with children who are struggling, often where English is not their first language, while around 20 per cent is with students who are doing well but perhaps want extra help preparing for exams.</p>\r\n\r\n<p>If you do hire a tutor, regular sessions maintain momentum. Once a week is typical, once a fortnight at a push but any less frequent and the benefits are likely to be lost in between meetings. At Kensington &amp; Chelsea Tutors, Chiles recommends two hours as the optimum length of each session, with one hour for under-13s, although Holland Park Tuition advises one hour, and at Carfax Private Tutors the standard length is 90 minutes.</p>\r\n\r\n<p>The cost? Holland Park Tuition charges &pound;58 an hour, and the standard rate at Carfax Private Tutors is &pound;55 an hour. Kensington &amp; Chelsea Tutors charges &pound;40 an hour, or &pound;60 for two students, and has developed a package to provide secure online tutoring. Individually booked tutors usually cost upwards of &pound;20 an hour.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Securing top grades to meet your offers is much more crucial than \r\nin the past\r\n" src="http://i.telegraph.co.uk/multimedia/archive/02514/is0313-p12-HOLLAND_2514824b.jpg" /></p>\r\n\r\n<p><strong>Steps to choosing a suitable tutor</strong></p>\r\n\r\n<p>Often the best way to find a tutor is to go on the personal recommendation of someone you know. It may be worth approaching your child&rsquo;s school to ask if they can suggest someone.</p>\r\n\r\n<p>The most important factor is whether the tutor can develop a rapport with your child. Just because a tutor has worked wonders with a friend&rsquo;s offspring doesn&rsquo;t mean they will be able to do the same for yours.</p>\r\n\r\n<p>Interview the tutor first. Ask for references and check that their qualifications are appropriate and that they&rsquo;ve been screened by the Criminal Records Bureau (CRB). Book an initial session before committing further.</p>\r\n\r\n<p>Sharing a tutor between friends reduces the cost but also removes one of the main advantages of tutoring, namely one-to-one attention. The exception is foreign languages, where groups could help in conversation practice, provided pupils are at a similar level.</p>\r\n\r\n<p>There should be no need to supervise sessions and your presence in the room may be off-putting, although for younger children you may want to be in an adjoining room.</p>\r\n\r\n<p>Any time you feel it is not working out you should be able to cancel your sessions, or change tutor if you are with an agency.</p>\r\n\r\n<p><strong>Mica Bowman, 18</strong></p>\r\n\r\n<p>Michele Bowman first hired tutors to help her daughter get through her GCSEs. A student at Prior&rsquo;s Field in Godalming, Surrey, she will be taking A-levels this summer, bolstered by weekend tutorials in history of art and psychology.</p>\r\n\r\n<p>&ldquo;We felt Mica needed help with exam technique and we also realised that she does much better one-on-one than in a classroom,&rdquo; explains Bowman, who contacted Kensington &amp; Chelsea Tutors on the advice of a friend who used them for her sons, including one who was attending Eton.</p>\r\n\r\n<p>&ldquo;Mica has established a good rapport with her tutors and has gained in confidence as a result of the tutoring,&rdquo; adds Bowman.</p>\r\n\r\n<p><em>This article first appeared in the Daily Telegraph &#39;Independent Schools&#39; supplement on Saturday 16 March.<br />\r\n<br />\r\nhttp://www.telegraph.co.uk/education/secondaryeducation/9942791/Private-tutoring-time-well-invested.html</em></p>\r\n'),
(2, 'Private tutors ''must face criminal records checks''', 'http://www.bbc.co.uk/news/education-36775437', '<p>All self-employed tutors should be legally required to have a criminal records check before they can offer private lessons to children in the UK, children&#39;s charity the NSPCC says.</p>\r\n\r\n<p>A current loophole means self-employed tutors do not have to undergo Disclosure and Barring Service checks.</p>\r\n\r\n<p>The NSPCC says this loophole creates an &quot;ideal scenario&quot; for &quot;any predatory adult seeking to harm children&quot;.</p>\r\n\r\n<p>The Home Office said it would &quot;carefully consider&quot; the comments.</p>\r\n\r\n<p>Teachers working in schools must have a&nbsp;<a href="https://www.gov.uk/government/organisations/disclosure-and-barring-service">DBS check</a>, which looks for criminal records and ensures they have not been banned from working with children or suspended from the profession.</p>\r\n\r\n<p>Many tutoring agencies will insist on an up-to-date check on their staff, but some do not - and individuals setting up privately are not legally required to have a DBS certificate.</p>\r\n\r\n<p>Employers and licensed bodies can request DBS checks, but individuals cannot, meaning parents and tutors cannot run such checks.</p>\r\n\r\n<p>Now, the NSPCC is calling for a tightening of the law to ensure every individual giving private tuition undergoes a check, saying the same rules should apply for self-employed tutors as for classroom teachers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="tutor and child" src="http://ichef-1.bbci.co.uk/news/660/cpsprodpb/11E0A/production/_90362237_thinkstockphotos-184416720.jpg" /></p>\r\n\r\n<hr />\r\n<h2>Analysis by Home Affairs correspondent Danny Shaw</h2>\r\n\r\n<p>The vast majority of people who tutor children have the best of intentions and present no risk.</p>\r\n\r\n<p>But there are a small number who will exploit the lax controls that so evidently exist, particularly for those who are self-employed.</p>\r\n\r\n<p>Even using an agency to source a tutor is no guarantee of honesty or safety.</p>\r\n\r\n<p>One website I came across says the tutors it supplies are not required to undergo a criminal records check, while the questionable standard of some of those offering their services on the site, who charge as little as &pound;15 per hour, simply reinforces the call for tighter regulation.</p>\r\n\r\n<p>Of course, using a fully-vetted tutor does not mean that your child is safe - some paedophiles manage to stay off the police radar for years - so it&#39;s best to follow the advice set out by the NSPCC.</p>\r\n\r\n<hr />\r\n<p>The NSPCC recommends:</p>\r\n\r\n<ul>\r\n	<li>parents employ tutors through reputable agencies</li>\r\n	<li>parents should also take additional steps to check a tutor is suitable, such as interviewing prospective tutors, following up references and speaking to previous employers</li>\r\n	<li>making sure that their children understand how to keep themselves safe from abuse, for example by teaching them the&nbsp;<a href="https://www.nspcc.org.uk/preventing-abuse/keeping-children-safe/underwear-rule/">Underwear Rule</a>.</li>\r\n</ul>\r\n\r\n<p>Peter Wanless, chief executive of the NSPCC, said many parents would consider employing a tutor over the summer.</p>\r\n\r\n<p>&quot;Clearly the vast majority of private tutors are not child abusers, but the current legal loophole makes it an ideal scenario for any predatory adult seeking to harm children,&quot; he said.</p>\r\n\r\n<p>&quot;Children have a right to be educated in safety, and parents need to know that every care has been taken to ensure unsuitable people cannot practise as tutors.</p>\r\n\r\n<p>&quot;The rules on applying for criminal record checks need to apply to self-employed tutors just as they do for teachers employed in schools.&quot;</p>\r\n\r\n<h2>&#39;Vital role&#39;</h2>\r\n\r\n<p>Research conducted by education charity the Sutton Trust last year estimates about 25% of school pupils in England and Wales have received some form of private tuition.</p>\r\n\r\n<p>A Home Office spokesman said: &quot;The Disclosure and Barring Service checks play a vital role in helping to keep the public safe.</p>\r\n\r\n<p>&quot;Private tutors - like others working or volunteering with children and vulnerable adults - are able to apply for a check through a &#39;registered body&#39; whose staff are qualified to verify a candidate&#39;s eligibility and identity.</p>\r\n\r\n<p>&quot;This service is offered by a range of agencies used by tutors to find employment... Tutors can also supply the check to parents or guardians of their prospective pupils.&quot;</p>\r\n'),
(3, 'Exam pressure: What the private tutor saw', 'http://www.bbc.co.uk/news/business-27087941', '<p>Levels of exam angst will be steadily rising for many students. Their ordeal by exam paper is about to begin.</p>\r\n\r\n<p>It&#39;s also the time when many families will be thinking about some last-minute assistance. They will be searching for the emergency breakdown service of the education world, the private tutor.</p>\r\n\r\n<p>Tutoring is one of the great invisible forces in the education sector. It&#39;s difficult to measure its impact because it operates outside the formal, state-regulated education system.</p>\r\n\r\n<p>But this &quot;shadow education&quot; is big business. In places such as South Korea and Hong Kong high proportions of pupils have private lessons. The most successful&nbsp;<a href="http://www.bbc.co.uk/news/business-20085558">tutors have rock star status</a>&nbsp;with glossy advertising campaigns.</p>\r\n\r\n<p>It might not be fair, but tutoring is an inescapable feature of competitive education systems across the world. If there&#39;s a race for better grades, from London to Los Angeles, Moscow to Manila, someone will be offering private lessons.</p>\r\n\r\n<h2>Helicopter tutors</h2>\r\n\r\n<p>But what is it like from the other side of the fence? What do the tutors see when they look at the families they&#39;ve been hired to help? And who are these &quot;super tutors&quot; who have sprung up alongside the super rich?</p>\r\n\r\n<p><img alt="Lessons at home" src="http://ichef-1.bbci.co.uk/news/624/media/images/74358000/jpg/_74358778_86488468.jpg" style="height:261px; width:464px" /></p>\r\n\r\n<p>Image captionParents can get caught up in a tutoring &quot;arms race&quot;</p>\r\n\r\n<p>Murray Morrison probably wouldn&#39;t like the title super tutor. And he would be too discreet to mention any A-list families he has worked with.</p>\r\n\r\n<p>But after 15 years teaching and tutoring, based in London, he has first-hand insight into how it looks when the tutor rings on the door-bell and steps inside.</p>\r\n\r\n<p>Is it all really about the parents? Are they trying to succeed through their children?</p>\r\n\r\n<p>&quot;The whole thing about &#39;pushy parents&#39; is that everyone wants the best for their child. And they want their child to come out of school with the best grades, because the system measures your performance in terms of those stark numbers,&quot; he says.</p>\r\n\r\n<p>&quot;But helicoptering in an expensive tutor to do hours of extra work can make the kid miserable, it can put undue pressure on them.&quot;</p>\r\n\r\n<h2>&#39;Lack of confidence&#39;</h2>\r\n\r\n<p>It might not even be the parents doing the hiring.</p>\r\n\r\n<p>&quot;You come across tutoring jobs, maybe an international business person or oligarch, where you&#39;re hired by proxy by a concierge service, to essentially babysit. They want a London super tutor for their kids.</p>\r\n\r\n<p>&quot;And you come across lonely children. They spend their time with tutors rather than friends. There are 10-year-olds with personal trainers who take them to a park.</p>\r\n\r\n<p><img alt="Murray Morrison" src="http://ichef-1.bbci.co.uk/news/200/media/images/74358000/jpg/_74358773_photo.jpg" style="height:144px; width:144px" /></p>\r\n\r\n<blockquote>It&#39;s always the child&#39;s practice that makes a difference, not the tutor alone... It&#39;s not rocket science, it&#39;s about organised, rigorous practice\r\n<p>Murray Morrison</p>\r\n</blockquote>\r\n\r\n<p>&quot;I get asked to find tutors for three-year-olds. Absolute madness.&quot;</p>\r\n\r\n<p>Before hiring a tutor, he says, parents should talk to the child&#39;s teacher.</p>\r\n\r\n<p>&quot;If children are unhappy about their ability or struggling, it&#39;s important to address it.&quot; But, he says, parents should get the teachers&#39; advice before reaching for a tutor.</p>\r\n\r\n<p>&quot;Getting a tutor in too early confirms the idea that a child isn&#39;t good at a subject. The psychological impact can be quite negative.</p>\r\n\r\n<p>&quot;I&#39;ve seen this quite a lot recently, where I&#39;ve been asked to find a tutor for a child who is &#39;really lacking in confidence&#39;. But getting lots of tutoring can be the cause of the lack of confidence.</p>\r\n\r\n<p>&quot;It&#39;s a case of using with caution.&quot;</p>\r\n\r\n<p>If parents do want a tutor, he says, it is important to have a &quot;really clear game plan about what you want to achieve&quot;.</p>\r\n\r\n<p>And any improvement is going to depend on the child working hard. Mr Morrison says for every hour of tuition there should be five hours of practice.</p>\r\n\r\n<p>&quot;It&#39;s always the child&#39;s practice that makes a difference, not the tutor alone.&quot;</p>\r\n\r\n<p>But he says that grades can be raised. &quot;It&#39;s not rocket science, it&#39;s about organised, rigorous practice.&quot;</p>\r\n\r\n<p>Mr Morrison formerly represented Great Britain at fencing, even though he wasn&#39;t good at games at school, and he says tutoring is another case of well-organised, targeted effort.</p>\r\n\r\n<h2>Parents under pressure</h2>\r\n\r\n<p>Mr Morrison says that the hyper-rich have a &quot;sort of relaxation&quot; about their children&#39;s results in school. But the real pressure is on parents who are not so rich and famous.</p>\r\n\r\n<p><img alt="Failing an exam" src="http://ichef-1.bbci.co.uk/news/624/media/images/74358000/jpg/_74358406_78773735.jpg" style="height:261px; width:464px" /></p>\r\n\r\n<p>Image captionToo much tutoring can take away confidence, says Mr Morrison</p>\r\n\r\n<p>&quot;They are putting all their money into getting their children the best education they can. They are under enormous financial pressure.&quot;</p>\r\n\r\n<p>The extra lessons might be targeted at getting a child into a sought-after, high-achieving school. They get caught up in a tutoring &quot;arms race&quot;, but, he says, this can be tough for a child who isn&#39;t really that clever.</p>\r\n\r\n<p>&quot;Where you get real dangers is when a short, sharp, shock of tutoring is successful enough to get a child into an academic school and then they&#39;re stuck there under enormous pressure to keep up.</p>\r\n\r\n<p>&quot;It can be the parents who are picking a school for themselves, rather than for the child. You see children in these hot-housing schools, after a hard day they come home and need more tutoring. You have children with no outside life at all.</p>\r\n\r\n<p>&quot;Parents would do well to protect their children from that kind of competition.&quot;</p>\r\n\r\n<h2>Uniform approach</h2>\r\n\r\n<p>There can also be some odd insights into wealthy international households.</p>\r\n\r\n<p><img alt="exam pressure" src="http://ichef.bbci.co.uk/news/624/media/images/74354000/jpg/_74354008_158570101.jpg" style="height:261px; width:464px" /></p>\r\n\r\n<p>Image captionThe exam season can pile on the pressure for families</p>\r\n\r\n<p>&quot;I was asked once on arriving at someone&#39;s house to put on a uniform. It was a kind of livery of the house.&quot; He refused and says it&#39;s important that tutors are not treated as a &quot;servant or a nanny&quot;.</p>\r\n\r\n<p>&quot;It has to be someone a child looks up to for guidance. It&#39;s important to instil a respect for academic authority.&quot;</p>\r\n\r\n<p>Another suspect request, from someone with &quot;a lot of resources at their disposal&quot;, was to spend a whole term helping a university student.</p>\r\n\r\n<p>&quot;I was asked if I could tutor someone at university who needed to go through a maths course, and could I go and live there for a term? Which I didn&#39;t do.</p>\r\n\r\n<p>&quot;Reading between the lines,&quot; the implication was the tutor would do all the work.</p>\r\n\r\n<p>He is also annoyed at parents who think tutors might be useful to get good marks in homework or coursework.</p>\r\n\r\n<p>&quot;If you&#39;re doing a child&#39;s homework you&#39;re doing them a massive disservice. You&#39;re not helping, you&#39;re damaging them,&quot; he says.</p>\r\n\r\n<p>He is also sceptical about the amount that &quot;super tutors&quot; are meant to be charging.</p>\r\n\r\n<p>&quot;I see articles about super tutors with astronomical rates. But I certainly see those same tutors working for a lot less.&quot;</p>\r\n\r\n<p>In an unregulated business it&#39;s also quite possible that some tutors hike their fee depending on the client.</p>\r\n\r\n<p>The best tutors? It&#39;s not those who charge the most, he says, but those good enough to make sure their services are eventually not needed.</p>\r\n'),
(4, 'Does your child need a tutor?', 'http://www.bbc.co.uk/schools/parents/does_child_need_tutor/', '<p><strong><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">What does a tutor do?</span></span></strong></p>\r\n\r\n<p>A tutor is a teacher you pay to work with your child, either on a one-to-one basis or as part of a small group. Usually the tutor focuses on a particular academic subject, or they may coach your child in a particular exam technique.</p>\r\n\r\n<p>A tutor often helps a child who is struggling with their studies, or needs a boost to do better at school or do well in an exam (perhaps an entrance exam or a particular subject at GCSE or A-level). But sometimes a tutor is taken on to stretch a child with an exceptional ability in a subject.</p>\r\n\r\n<p>Because the tutor is working with your child in a more focused way than would be possible in a class of 25 or 30 children, a lot can often be achieved in a short time.</p>\r\n\r\n<p>But tutors can be expensive - they can charge around &pound;20-&pound;50 an hour. Some tutors work online using instant messaging or Skype (which allows you to see and speak to each other). Online tutoring costs less, typically around &pound;15 an hour.</p>\r\n\r\n<p>A cheaper option is to sign up for an online automated tutoring service which will provide on-screen exercises. It costs around &pound;100 a year to subscribe for this kind of service.</p>\r\n\r\n<p><strong><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Could my child benefit from tutoring?</span></span></strong></p>\r\n\r\n<p>Your child might benefit from being tutored if:</p>\r\n\r\n<ul>\r\n	<li>Results/grades/achievements are lower than expected.</li>\r\n	<li>Your child&rsquo;s confidence is slipping and they could do with a boost in a particular subject (or across the board).</li>\r\n	<li>They need to improve their grades in order to pass a forthcoming exam.</li>\r\n</ul>\r\n\r\n<p>However, it&rsquo;s very important to talk to your child&rsquo;s teacher before you make the decision to hire a tutor. There may be extra help that could be provided free of charge in their school. Or the teacher may have other ideas about how to help your child.</p>\r\n\r\n<h2>How to find the right tutor</h2>\r\n\r\n<p>Many different people work as tutors. They include:</p>\r\n\r\n<ul>\r\n	<li>Teachers who want to earn extra cash</li>\r\n	<li>Retired teachers</li>\r\n	<li>University and college students, or recent graduates</li>\r\n</ul>\r\n\r\n<p>Many work through a tutoring agency. To find an agency in your area, search online. You can also ask your child&rsquo;s teacher, or other parents, to recommend an agency or a tutor.</p>\r\n\r\n<p>Tutors have different styles and approaches to working. It&rsquo;s worth thinking about what approach you feel would work for your child, and talking it through with a possible tutor. You should also think about where the tutoring would take place. Some tutors come to you, while others work in their own homes. What would best suit you and your child?</p>\r\n\r\n<p>It&rsquo;s vital to make sure a private tutor has had a CRB (Criminal Records Bureau) check. Remember, you are placing your child in a vulnerable position, and you must do all you can to ensure the tutor can be trusted. Don&rsquo;t take anyone else&rsquo;s word for it - check them out yourself.</p>\r\n\r\n<p>If you feel your child would benefit from tutoring, but are daunted by the cost, consider the online or website options.</p>\r\n\r\n<p>Alternatively, think about whether you or your partner could provide regular one-to-one help for your child (but bear in mind that this is often difficult, because you are emotionally involved). Or perhaps you have a friend who&rsquo;s a teacher, or who speaks a language your child needs help with, who might agree to help your child?</p>\r\n\r\n<p>Tutoring is controversial because it comes down to paying out potentially large sums of money - but if you feel strongly that your child would benefit from it, explore all the options.</p>\r\n'),
(5, 'GCSE tutors', 'http://news.bbc.co.uk/1/hi/education/7012482.stm', '<p>Indian GCSE tutor for monthly fee</p>\r\n\r\n<p><br />\r\nGCSE students will be able to call tutors in India</p>\r\n\r\n<p>A company which has made its name with revision guides is offering a round-the clock online personal tuition service for GCSE students.<br />\r\nLetts Educational is charging &pound;49.99 per month for an unlimited support service, using tutors based in India.</p>\r\n\r\n<p>Tuition is offered for maths and science, communicating through text, voice and interactive whiteboard.</p>\r\n\r\n<p>The provision of such support by India is a growing trend and reflects the country&#39;s educational confidence.</p>\r\n\r\n<p>Outsourcing</p>\r\n\r\n<p>This latest move sees one of the UK&#39;s most familiar exam revision brands moving into the international online market - using a subscription model to appeal to GCSE students wanting on-demand help.</p>\r\n\r\n<p><br />\r\nTutors based in India are assisting pupils in the UK</p>\r\n\r\n<p>It will link up with the Bangalore-based company, TutorVista, which provides Indian teachers who can give one-to-one lessons to pupils in the UK.</p>\r\n\r\n<p>Letts says that the 500 tutors, working from their own homes, are all qualified, subject-specialist teachers.</p>\r\n\r\n<p>They will provide hour-long lessons as frequently as required, communicating through instant messaging, internet telephony and interactive screens.</p>\r\n\r\n<p>This flat-rate approach to coaching, using tutors in India, has already been established in the USA - and Letts says that it is aiming to recruit &quot;a few thousand&quot; subscribers in the UK in its first year.</p>\r\n\r\n<p>Research from the University of London&#39;s Institute of Education has estimated that 27% of state school pupils - across primary and secondary - receive lessons from private tutors.</p>\r\n\r\n<p>And researchers found that in some secondary schools, almost two thirds of pupils were receiving additional support from private tutors.</p>\r\n'),
(6, 'Summer of tutoring ''awaiting many pupils''', 'http://www.bbc.co.uk/news/education-23465178', '<p>School may be out for summer, but a survey suggests many parents are unwilling to let their children have a holiday from studying at all.</p>\r\n\r\n<p>More than a quarter plan to hire tutors to help prevent the so-called &quot;summer slide&quot; in academic ability, the poll of 1,000 primary school parents suggests.</p>\r\n\r\n<p>A fifth hire tutors so their child can be &quot;the best in the class&quot;, the survey for a maths tutoring website adds.</p>\r\n\r\n<p>Research has long shown pupils&#39; grades slip back over the summer break.</p>\r\n\r\n<p>This is especially the case if they do not engage in educational activities.</p>\r\n\r\n<p><img alt="Tutoring" src="http://ichef-1.bbci.co.uk/news/304/media/images/68970000/jpg/_68970940_tutoring.jpg" /></p>\r\n\r\n<h2>&#39;Slipping back&#39;</h2>\r\n\r\n<p>Students typically do less well in tests set at the end of the summer holiday than they do in the same tests at the beginning.</p>\r\n\r\n<p>And some say much of the achievement gap between lower- and higher-income pupils can be explained by unequal access to summer learning opportunities.</p>\r\n\r\n<p>But the independent survey carried out for www.themathsfactor.com, which offers online tutoring courses, suggests more than a third of parents are unaware that their child&#39;s learning may slip back during the holidays.</p>\r\n\r\n<p>However, most of the parents were planning to undertake some low-cost learning activity with their children over the six-week break.</p>\r\n\r\n<p>These included reading books (29%), tapping into the latest literacy and numeracy mobile apps (14%), Sats revision (8%) and online courses to keep children&#39;s minds active (7%), according to the online poll.</p>\r\n\r\n<p>The finding that 27% were planning to hire tutors for their primary-age children, surprised the firm that commissioned the poll, but is in line with earlier estimates of pre-GCSE tutoring.</p>\r\n\r\n<p>Research from London University&#39;s Institute of Education has suggested more than a quarter of students have private tuition before their exams.</p>\r\n\r\n<p>Many schools do not set much, if any, homework over the summer. However, it is a time when many, especially working parents, have more time to help their children with it.</p>\r\n\r\n<h2>&#39;Time to play&#39;</h2>\r\n\r\n<p>Dr Mary Bousted, general secretary of the Association of Teachers and Lecturers, said &quot;kids should be allowed to be kids&quot; during the holidays.</p>\r\n\r\n<p>&quot;Children need a break from learning pressure and time to play - which is itself educational.&quot;</p>\r\n\r\n<p>She added that the minority of parents who did not let their offspring relax during holidays should not feel obliged to pay for what she described as &quot;unnecessary services&quot;.</p>\r\n\r\n<p>Tuition company Explore Learning said the summer holiday was one of its busiest times.</p>\r\n\r\n<p>Heather Garrick, the firm&#39;s marketing director, said: &quot;July is by far our busiest sign up month. Last year for example, we had 2,600 new members sign up in July compared with 988 in June 2012. As a result we have longer opening hours throughout the summer to deal with this increased demand.&quot;</p>\r\n\r\n<p>William Stadlen, founder and director of Holland Park Tuition and Education Consultants, said he had seen an increase in parents with younger children seeking tuition at this time of year.</p>\r\n\r\n<p>&quot;It&#39;s a very good opportunity to do some catch-up work because the parents have more time and the children are not at school.</p>\r\n\r\n<p>&quot;If there are a couple of issues that just need to be ironed out, you can go through it in a stress-free way rather than spending five hours struggling.</p>\r\n\r\n<p>&quot;The idea of tuition is to take the stress out of a child&#39;s life - then they can go off and play football or whatever else they would much prefer to be doing.&quot;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `restricted_words`
--

CREATE TABLE IF NOT EXISTS `restricted_words` (
  `rest_word_id` int(11) NOT NULL,
  `rest_word` varchar(50) NOT NULL,
  PRIMARY KEY (`rest_word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restricted_words`
--

INSERT INTO `restricted_words` (`rest_word_id`, `rest_word`) VALUES
(2, 'number'),
(3, 'address'),
(4, 'phone'),
(5, 'postcode');

-- --------------------------------------------------------

--
-- Table structure for table `sending_msgs_error_msg`
--

CREATE TABLE IF NOT EXISTS `sending_msgs_error_msg` (
  `error_msg_id` int(11) NOT NULL,
  `msgs_error_msg` text NOT NULL,
  PRIMARY KEY (`error_msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sending_msgs_error_msg`
--

INSERT INTO `sending_msgs_error_msg` (`error_msg_id`, `msgs_error_msg`) VALUES
(1, '<p><span style="color:#ff0000"><strong>It is vital to note that exchanging any type of contact elements or planning meeting points here is strickly NOT ALLOWED.</strong></span></p>\r\n\r\n<p><span style="color:#ff0000">Please do not include any email ID, phone number,&nbsp;post codes or any other data that permit contact&nbsp;in this message.&nbsp;&nbsp;Users who do so will immediately be removed from site.</span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student_main`
--

CREATE TABLE IF NOT EXISTS `student_main` (
  `student_id` int(11) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `std_title` varchar(10) NOT NULL,
  `std_fname` varchar(25) NOT NULL,
  `std_lname` varchar(25) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `std_address_line1` text NOT NULL,
  `std_address_line2` text,
  `town_id` int(11) NOT NULL,
  `std_postcode` varchar(25) NOT NULL,
  `country_id` int(11) NOT NULL,
  `std_phone_home` varchar(25) DEFAULT NULL,
  `std_phone_mobile` varchar(25) NOT NULL,
  `std_distance_travel` varchar(25) NOT NULL,
  `std_personal_stat` text,
  `std_availability` text,
  `std_profile_pic` varchar(50) DEFAULT NULL,
  `std_dob` date DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `FK_country` (`country_id`),
  KEY `FK_student_email` (`login_email`),
  KEY `FK_student_town` (`town_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_main`
--

INSERT INTO `student_main` (`student_id`, `login_email`, `std_title`, `std_fname`, `std_lname`, `student_gender`, `std_address_line1`, `std_address_line2`, `town_id`, `std_postcode`, `country_id`, `std_phone_home`, `std_phone_mobile`, `std_distance_travel`, `std_personal_stat`, `std_availability`, `std_profile_pic`, `std_dob`) VALUES
(1, 'fareedshuja@gmail.com', 'Mr', 'Fareed', 'Shuja', 'Male', 'Flat 12, Hazel House', 'Wickam Road', 1, 'SE42NA', 1, '0044786799873', '0044786799873', 'More than 10 Miles', 'I am a confident and hardworking individual, with an enthusiasm for programming along with good knowledge of object oriented paradigm and software engineering principles. I have excellent verbal and written communication skills, both in office environment and with external stakeholders. I take my work seriously and always keep the bar high for myself. I challenge myself at what I do and that always brings out the best in me.', 'I am available on Monday, Tuesday, Thursday and Sunday, from 12pm to 8pm.', '1-Fareed-Shuja.jpg', NULL),
(2, 'animatrs@hotmail.com', 'Mr', 'Baba', 'Babn', 'Male', 'Hindi Skid ', '', 1, 'SE64AF', 1, '', '07970325184', 'More than 10 Miles', ' Help ', ' Anytime ', 'no_pic.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE IF NOT EXISTS `student_subjects` (
  `std_sub_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sub_level_id` int(11) NOT NULL,
  `subs_id` int(11) NOT NULL,
  `std_rate_per_hour` int(11) DEFAULT NULL,
  `std_sub_notes` text,
  PRIMARY KEY (`std_sub_id`),
  KEY `FK_student_subjects` (`student_id`),
  KEY `FK_student_sub` (`subs_id`),
  KEY `FK_student_level` (`sub_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`std_sub_id`, `student_id`, `sub_level_id`, `subs_id`, `std_rate_per_hour`, `std_sub_notes`) VALUES
(1, 1, 2, 1, NULL, NULL),
(2, 1, 3, 1, NULL, NULL),
(3, 1, 1, 619, NULL, NULL),
(4, 1, 2, 619, NULL, NULL),
(5, 1, 3, 619, NULL, NULL),
(6, 1, 1, 495, NULL, NULL),
(7, 1, 2, 495, NULL, NULL),
(8, 1, 3, 495, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_level`
--

CREATE TABLE IF NOT EXISTS `subject_level` (
  `sub_level_id` int(11) NOT NULL,
  `sub_level_title` varchar(25) NOT NULL,
  PRIMARY KEY (`sub_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_level`
--

INSERT INTO `subject_level` (`sub_level_id`, `sub_level_title`) VALUES
(1, 'BEGINNER'),
(2, 'MID-LEVEL'),
(3, 'ADVANCE');

-- --------------------------------------------------------

--
-- Table structure for table `sub_subjects`
--

CREATE TABLE IF NOT EXISTS `sub_subjects` (
  `subs_id` int(11) NOT NULL,
  `mains_id` int(11) NOT NULL,
  `subs_title` varchar(100) NOT NULL,
  PRIMARY KEY (`subs_id`),
  KEY `FK_sub_subjets` (`mains_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_subjects`
--

INSERT INTO `sub_subjects` (`subs_id`, `mains_id`, `subs_title`) VALUES
(1, 6, 'Php'),
(5, 2, 'Art'),
(6, 2, 'Art Techniques'),
(7, 2, 'Ceramics And Glass Crafts'),
(8, 2, 'Decorative Crafts'),
(9, 2, 'Design'),
(10, 2, 'Fabric Crafts'),
(11, 2, 'Graphic Design'),
(12, 2, 'Jewellery'),
(13, 2, 'Toy Making'),
(14, 2, 'Wood Cane And Furniture Crafts'),
(15, 6, 'Autocad'),
(17, 6, 'CLAIT'),
(18, 6, 'Computer Graphics'),
(19, 6, 'Computer Hardware'),
(20, 6, 'Computer Programming Languages'),
(21, 6, 'Computer Software'),
(22, 6, 'Computer Systems'),
(23, 6, 'Computing'),
(24, 6, 'Computing Methodologies'),
(25, 6, 'ECDL'),
(26, 6, 'Information Systems'),
(27, 6, 'Information Work And Information Use'),
(28, 6, 'Information And Communications Technology'),
(29, 6, 'Internet Software'),
(30, 6, 'Libraries And Librarianship'),
(31, 6, 'Multimedia'),
(32, 6, 'Network And Systems Management'),
(33, 6, 'Software Development'),
(34, 6, 'Software Engineering'),
(35, 6, 'Specialised Software'),
(36, 6, 'Web Design'),
(37, 20, 'Arabic'),
(38, 20, 'Pashto'),
(39, 20, 'Urdu'),
(40, 1, 'Agricultural Horticultural Engineering And Farm Machinery'),
(41, 1, 'Agriculture And Horticulture'),
(42, 1, 'Amenity Horticulture'),
(43, 1, 'Animal Husbandry'),
(44, 1, 'Crop Husbandry'),
(45, 1, 'Crop Protection Fertilisers And Byproducts'),
(46, 1, 'Forestry Timber Production'),
(47, 1, 'General Horticulture'),
(48, 1, 'Land Based Studies'),
(49, 1, 'Pets And Domestic Animal Care'),
(50, 1, 'Rural And Agricultural Business Organisation'),
(51, 1, 'Veterinary'),
(52, 3, 'Beauty Therapy'),
(53, 3, 'Epilation And Electrolysis'),
(54, 3, 'Facial Care'),
(55, 3, 'Make Up'),
(56, 3, 'Manicure'),
(57, 3, 'Pedicure'),
(58, 3, 'Salon'),
(59, 4, 'Accounting'),
(60, 4, 'Banking'),
(61, 4, 'Bookkeeping (AAT)'),
(62, 4, 'Business'),
(63, 4, 'Business Software'),
(64, 4, 'Call Centres'),
(65, 4, 'Enterprises'),
(66, 4, 'Events Management'),
(67, 4, 'Finance'),
(68, 4, 'Financial Services'),
(69, 4, 'Human Resources'),
(70, 4, 'International Business'),
(71, 4, 'MBA'),
(72, 4, 'Management'),
(73, 4, 'Management Planning And Control'),
(74, 4, 'Management Skills'),
(75, 4, 'Office Skills'),
(76, 4, 'Office Software'),
(77, 4, 'Project Management'),
(78, 4, 'Public Administration'),
(79, 4, 'Start Your Own Business'),
(80, 5, 'Broadcasting'),
(81, 5, 'Communication Skills'),
(82, 5, 'Communication And Media'),
(83, 5, 'Journalism'),
(84, 5, 'Media Studies'),
(85, 5, 'Multimedia Design'),
(86, 5, 'Print And Publishing'),
(87, 5, 'Radio'),
(88, 5, 'Television'),
(89, 6, 'Animation'),
(90, 7, 'Art Conservation'),
(91, 7, 'Book Conservation'),
(92, 7, 'Building Conservation'),
(93, 7, 'Conservation Skills'),
(94, 7, 'Nature Conservation'),
(95, 7, 'Wildlife Conservation'),
(96, 8, 'Bricklaying'),
(97, 8, 'Brickwork And Masonry'),
(98, 8, 'Building Construction Operations'),
(99, 8, 'Building Design And Architecture'),
(100, 8, 'Building Maintenance Services'),
(101, 8, 'Built Environment'),
(102, 8, 'Civil Engineering'),
(103, 8, 'Construction Management'),
(104, 8, 'Construction Site Work'),
(105, 8, 'Construction Studies'),
(106, 8, 'Electrical'),
(107, 8, 'Interior Fitting And Decoration'),
(108, 8, 'Plastering'),
(109, 8, 'Property Planning Development'),
(110, 8, 'Security'),
(111, 8, 'Security Guard'),
(112, 8, 'Structural Engineering'),
(113, 8, 'Tiling'),
(115, 9, 'Bakery'),
(116, 9, 'Baking And Confectionery'),
(117, 9, 'Brewing And Winemaking'),
(118, 9, 'Cake Decoration'),
(119, 9, 'Cake Making'),
(120, 9, 'Cake Making And Decorating'),
(121, 9, 'Catering'),
(122, 9, 'Chef'),
(123, 9, 'Chocolate Craft'),
(124, 9, 'Classical And Modern Cooking'),
(125, 9, 'Cookery Of Specific Foods'),
(126, 9, 'Cultural Cookery'),
(127, 9, 'Domestic Cooking'),
(128, 9, 'Food And Wine Appreciation'),
(129, 9, 'Healthy Cooking'),
(130, 9, 'Pastry Craft'),
(131, 9, 'Professional Cookery'),
(132, 9, 'Wine Tasting'),
(133, 10, 'Car Van Driving'),
(134, 10, 'Driving'),
(135, 10, 'Driving Test Theory'),
(136, 10, 'Driving Towing'),
(137, 10, 'Lgv Driving'),
(138, 10, 'Pcv Driving'),
(139, 10, 'Road Safety'),
(140, 10, 'Vehicle Maintenance Repair Servicing'),
(141, 11, 'Aerospace Defence Engineering'),
(142, 11, 'Electrical Electronic Servicing'),
(143, 11, 'Electrical Engineering'),
(144, 11, 'Electronic Engineering'),
(145, 11, 'Engineering Technology'),
(146, 11, 'Mechanical Engineering'),
(147, 11, 'Metals Working Finishing'),
(148, 11, 'Power Energy Engineering'),
(149, 11, 'Rail Vehicle Engineering'),
(150, 11, 'Road Vehicle Engineering'),
(151, 11, 'Ship Boat Marine Offshore Engineering'),
(152, 11, 'Telecommunications'),
(153, 11, 'Tools And Machining'),
(154, 11, 'Welding And Joining'),
(155, 12, 'EAL'),
(156, 12, 'EFL'),
(157, 12, 'ESOL'),
(158, 12, 'English Studies'),
(159, 12, 'TEFL'),
(160, 12, 'TESOL'),
(161, 12, 'TESP'),
(162, 12, 'Teaching English'),
(163, 13, 'Clothes Making'),
(164, 13, 'Dressmaking'),
(165, 13, 'Fashion'),
(166, 13, 'Fashion Accessory'),
(167, 13, 'Fashion Consulting'),
(168, 13, 'Footwear Design'),
(169, 13, 'Hand Knitting'),
(170, 13, 'Hand Sewing'),
(171, 13, 'Hat Making Millinery'),
(172, 13, 'Knitting'),
(173, 13, 'Knitwear Design'),
(174, 13, 'Leather Design'),
(175, 13, 'Machine Knitting'),
(176, 13, 'Millinery Design'),
(177, 13, 'Sewing Machine Use'),
(178, 13, 'Tailoring'),
(179, 13, 'Weaving'),
(180, 14, 'Audio And Visual Media'),
(181, 14, 'Film Photography'),
(182, 14, 'Film Studies'),
(183, 14, 'Film Video Directing'),
(184, 14, 'Film Video Editing'),
(185, 14, 'Film Video Lighting'),
(186, 14, 'Film Video Television Production'),
(187, 14, 'Film And Video Special Effects'),
(188, 14, 'Media 100 Suite'),
(189, 14, 'Media Production'),
(190, 14, 'Premiere Editing'),
(191, 14, 'Shake (Image Composition)'),
(192, 14, 'Radio Programme Production'),
(193, 14, 'Sound Recording'),
(194, 14, 'Television Programme Production'),
(195, 14, 'Television Radio Programme Production'),
(196, 15, 'Bottle Gardening'),
(197, 15, 'Floristry'),
(198, 15, 'Flower Arranging'),
(199, 15, 'Flower Crafts'),
(200, 15, 'Garden Design'),
(201, 15, 'Garden Flower Growing'),
(202, 15, 'Garden Lawn Grass '),
(203, 15, 'Care'),
(204, 15, 'Garden Pond Construction'),
(205, 15, 'Gardening'),
(206, 15, 'Garden Vegetable Growing'),
(207, 15, 'Indoor Gardening'),
(208, 15, 'Landscape Architecture'),
(209, 15, 'Landscape Gardening'),
(210, 16, 'Afro Caribbean Asian Hairdressing'),
(211, 16, 'Barbering'),
(212, 16, 'Womens Hairdressing'),
(213, 16, 'Wig Making'),
(214, 17, 'Caring Skills'),
(215, 17, 'Complementary Medicine'),
(216, 17, 'Counselling'),
(217, 17, 'Dental'),
(218, 17, 'First Aid'),
(219, 17, 'Health Care Management And Studies'),
(220, 17, 'Health And Safety'),
(221, 17, 'Medical Physical Psycho Therapies'),
(222, 17, 'Medical Technology And Pharmacology'),
(223, 17, 'Medical Sciences'),
(224, 17, 'Medicine'),
(225, 17, 'Midwifery'),
(226, 17, 'Nursing'),
(227, 17, 'Ophthalmic'),
(228, 17, 'Paramedical Services And Supplementary Medicine'),
(229, 17, 'Physiotherapy'),
(230, 17, 'Psychology'),
(231, 17, 'Social Family Community Work'),
(232, 17, 'Support Advice Work'),
(233, 18, 'Archaeological'),
(234, 18, 'Art History'),
(235, 18, 'British History'),
(236, 18, 'Classical Studies'),
(237, 18, 'Family History'),
(238, 18, 'Egyptology'),
(239, 18, 'Genealogy'),
(240, 18, 'History Of Countries'),
(241, 18, 'History Of Ideas'),
(242, 18, 'History Of Philosophy'),
(243, 18, 'History Of Specific Periods'),
(244, 18, 'Humanities'),
(245, 18, 'International Comparative History'),
(246, 18, 'Local History'),
(247, 18, 'Modern History'),
(248, 18, 'Prehistory'),
(249, 18, 'Philosophy'),
(250, 18, 'Social History'),
(251, 18, 'Theoretical History'),
(252, 18, 'War'),
(253, 19, 'Carpentry'),
(254, 19, 'Curtain Making'),
(255, 19, 'DIY'),
(256, 19, 'Decorative Paintwork'),
(257, 19, 'Feng Shui'),
(258, 19, 'Home Improvement'),
(259, 19, 'Furniture Design'),
(260, 19, 'Lampshade Making'),
(261, 19, 'Painting And Decorating'),
(262, 19, 'Soft Furnishings Design'),
(263, 19, 'Soft Furnishings'),
(264, 19, 'Upholstery'),
(265, 19, 'Wallpaper Hanging'),
(266, 20, 'Brazilian Portuguese'),
(267, 20, 'Celtic Language'),
(268, 20, 'Chinese Language'),
(269, 20, 'Esperanto'),
(270, 20, 'French'),
(271, 20, 'German'),
(272, 20, 'Indic Languages'),
(273, 20, 'Interpreting'),
(274, 20, 'Iranian Language'),
(275, 20, 'Italian'),
(276, 20, 'Japanese Language'),
(277, 20, 'Latin American Spanish'),
(278, 20, 'Linguistics'),
(279, 20, 'Polish'),
(280, 20, 'Portuguese'),
(281, 20, 'Spanish'),
(282, 20, 'Japanese'),
(283, 20, 'Hindi'),
(284, 21, 'Building Law And Regulations'),
(285, 21, 'Civil Law'),
(286, 21, 'Criminal Law'),
(287, 21, 'European Union Law'),
(288, 21, 'Forensic Science'),
(289, 21, 'Government And Politics'),
(290, 21, 'International Law'),
(291, 21, 'Law'),
(292, 21, 'Legal Practice And Procedures'),
(293, 21, 'Legal Studies'),
(294, 21, 'Planning Law Regulations'),
(295, 21, 'Public Law'),
(296, 21, 'Social Science'),
(297, 21, 'Social Studies'),
(298, 21, 'UK Law'),
(299, 22, 'Arts Culture And Heritage Administration'),
(300, 22, 'Bartender'),
(301, 22, 'Door Supervisor'),
(302, 22, 'Drinks Service'),
(303, 22, 'Food Science And Technology'),
(304, 22, 'Food Service'),
(305, 22, 'Food And Drink Services'),
(306, 22, 'Hospitality Management'),
(307, 22, 'Hospitality Operations'),
(308, 22, 'Hospitality And Catering'),
(309, 22, 'Leisure And Sports Facilities Work'),
(310, 22, 'Tourism'),
(311, 22, 'Travel'),
(312, 23, 'Aviation'),
(313, 23, 'Distribution'),
(314, 23, 'Logistics'),
(315, 23, 'Marine Transport'),
(316, 23, 'Purchasing Procurement And Sourcing'),
(317, 23, 'Rail Transport'),
(318, 23, 'Road Transport'),
(319, 23, 'Transport Services'),
(320, 24, 'Acting'),
(321, 24, 'Amateur Dramatics'),
(322, 24, 'Dance'),
(323, 24, 'Drama Studies'),
(324, 24, 'General Performing Arts'),
(325, 24, 'Music'),
(326, 24, 'Music Performance And Playing'),
(327, 24, 'Music Studies'),
(328, 24, 'Music Technology Production'),
(329, 24, 'Musical Instrument Making And Repair'),
(330, 24, 'Musical Theatre'),
(331, 24, 'Singing'),
(332, 24, 'Theatre Production'),
(333, 24, 'Theatre And Dramatic Arts'),
(334, 24, 'Variety And Circus'),
(335, 24, 'Vocal'),
(336, 24, 'Voice Studies'),
(337, 25, 'Aromatherapy'),
(338, 25, 'Career Change Access'),
(339, 25, 'Chinese Medicine'),
(340, 25, 'Disability'),
(341, 25, 'Massage'),
(342, 25, 'Parenting'),
(343, 25, 'Personal Appearance'),
(344, 25, 'Personal Care'),
(345, 25, 'Personal Finance'),
(346, 25, 'Personal Health'),
(347, 25, 'Personal And Self Development'),
(348, 25, 'Reflexology'),
(349, 25, 'Reiki'),
(350, 25, 'Self Help'),
(351, 25, 'Skills For Life'),
(352, 25, 'Therapeutic'),
(353, 25, 'Weight Loss'),
(354, 26, 'Digital Photography'),
(355, 26, 'Documentary Photography'),
(356, 26, 'Fashion Photography'),
(357, 26, 'Landscape Photography'),
(358, 26, 'Photographic Processing'),
(359, 26, 'Photographic Techniques'),
(360, 26, 'Portrait Photography'),
(361, 26, 'Still Life Photography'),
(362, 27, 'Gas Plumbing'),
(363, 27, 'Installation Plumbing'),
(364, 27, 'Plumbing Water Supply'),
(365, 27, 'Professional Plumbing'),
(366, 28, 'Advertising'),
(367, 28, 'ECommerce'),
(368, 28, 'EMarketing'),
(369, 28, 'Import Export'),
(370, 28, 'International Marketing'),
(371, 28, 'Market Research'),
(372, 28, 'Marketing'),
(373, 28, 'Product Management'),
(374, 28, 'Public Relations'),
(375, 28, 'Retail'),
(376, 28, 'Retailing Wholesaling Distribution'),
(377, 28, 'Sales'),
(378, 29, 'Astronomy And Space Science'),
(379, 29, 'Biology'),
(380, 29, 'Botany'),
(381, 29, 'Chemistry'),
(382, 29, 'Earth Sciences'),
(383, 29, 'Geography'),
(384, 29, 'Geology'),
(385, 29, 'Life Sciences'),
(386, 29, 'Materials Science'),
(387, 29, 'Maths'),
(388, 29, 'Natural Science'),
(389, 29, 'Physics'),
(390, 29, 'General Science'),
(391, 29, 'Statistics'),
(392, 29, 'Zoology'),
(393, 30, 'Athletics And Gymnastics'),
(394, 30, 'Ball And Related Games'),
(395, 30, 'Basketball'),
(396, 30, 'Combined Sports And Studies'),
(397, 30, 'Community Sports'),
(398, 30, 'Country And Animal Sports'),
(399, 30, 'Cycling'),
(400, 30, 'Fitness'),
(401, 30, 'Football'),
(402, 30, 'Hockey'),
(403, 30, 'Horse Riding'),
(404, 30, 'Indoor Games'),
(405, 30, 'Martial Arts'),
(406, 30, 'Physical Education'),
(407, 30, 'Sports Coaching'),
(408, 30, 'Sports Injuries'),
(409, 30, 'Sports Medicine'),
(410, 30, 'Sports Physiotherapy'),
(411, 30, 'Swimming'),
(412, 30, 'Tennis'),
(413, 30, 'Water Sports'),
(414, 30, 'Wheeled Sports'),
(415, 30, 'Winter Sports'),
(417, 31, 'Broadcast Writing'),
(418, 31, 'Comedy Writing'),
(419, 31, 'Creative Writing'),
(420, 31, 'Diary Writing'),
(421, 31, 'Literature'),
(422, 31, 'Narrative Prose Writing'),
(423, 31, 'Novel Writing'),
(424, 31, 'Non Fiction Writing'),
(425, 31, 'Play Writing'),
(426, 31, 'Poetry Writing'),
(427, 31, 'Screenplay Writing'),
(428, 31, 'Short Story Writing'),
(429, 31, 'Script Writing'),
(430, 31, 'Technical Authorship'),
(431, 31, 'Travel Writing'),
(432, 31, 'Writing For Children'),
(433, 31, 'Writing For Newspapers And Magazines'),
(434, 31, 'Writing For Radio'),
(435, 31, 'Writing For Television'),
(436, 33, 'Accounting'),
(437, 33, 'Art'),
(439, 33, 'Basic Skills'),
(441, 33, 'Business Studies'),
(443, 33, 'Citizenship Studies'),
(445, 33, 'Design And Technology'),
(446, 33, 'Design And Craft'),
(447, 33, 'Drama'),
(448, 33, 'Economics'),
(449, 33, 'Electronics'),
(450, 33, 'Eleven Plus'),
(451, 33, 'General Studies'),
(452, 33, 'General Science'),
(454, 33, 'Home Economics'),
(455, 33, 'IELTS'),
(456, 33, 'Law'),
(457, 33, 'Leisure Studies'),
(458, 33, 'Media'),
(459, 33, 'Music'),
(460, 33, 'Music Technology'),
(461, 33, 'Philosophy'),
(462, 33, 'Photography'),
(464, 33, 'Psychology'),
(465, 33, 'Physical Education'),
(466, 33, 'Politics'),
(467, 33, 'Religious Studies'),
(468, 33, 'Sociology'),
(469, 33, 'Medicine'),
(470, 33, 'Special Needs'),
(472, 33, 'Ancient History'),
(474, 33, 'Humanities'),
(476, 33, 'Seven Plus'),
(480, 33, 'Criminology'),
(481, 33, 'Dentistry'),
(482, 33, 'Entrance Exams'),
(483, 33, 'Early Years'),
(484, 33, 'Personal Statements'),
(485, 33, 'Technical Writing'),
(486, 6, 'Adobe'),
(487, 6, 'Adobe Acrobat'),
(488, 6, 'Adobe Bridge'),
(489, 6, 'Adobe Dreamweaver'),
(490, 6, 'Adobe Fireworks'),
(491, 6, 'Adobe Flash'),
(492, 6, 'Adobe Illustrator'),
(493, 6, 'Adobe Indesign'),
(494, 6, 'Adobe Lightroom'),
(495, 6, 'Adobe Photoshop'),
(496, 6, 'Adobe Premiere'),
(497, 6, 'Agile'),
(498, 6, 'AJAX'),
(499, 6, 'Android Development'),
(500, 6, 'Apache'),
(501, 6, 'Aperture'),
(502, 6, 'Apple'),
(503, 6, 'Asp.net'),
(504, 6, 'Autodesk'),
(505, 6, 'AWS'),
(506, 6, 'Basic IT Skills'),
(507, 6, 'Blogging'),
(508, 6, 'BPEL'),
(509, 6, 'Business Intelligence'),
(510, 6, 'C Plus Plus'),
(511, 6, 'Camtasia'),
(512, 6, 'Cisco'),
(513, 6, 'Citrix'),
(514, 6, 'COBOL'),
(515, 6, 'Computer Literacy'),
(516, 6, 'Computer Training'),
(517, 6, 'Crystal Reports'),
(518, 6, 'C Sharp'),
(519, 6, 'CSS'),
(520, 6, 'Cubase'),
(521, 6, 'Database'),
(522, 6, 'Digital Audio'),
(523, 6, 'Dreamweaver'),
(524, 6, 'Ebay'),
(525, 6, 'Final Cut Pro'),
(526, 6, 'Fortran'),
(527, 6, 'Game Development'),
(528, 6, 'Geographic Information Systems'),
(529, 6, 'Graphic Design'),
(530, 6, 'HTML'),
(531, 6, 'IIS'),
(532, 6, 'Information Security'),
(533, 6, 'Internet Of Things'),
(534, 6, 'IPhone Development'),
(535, 6, 'Java'),
(536, 6, 'Javascript'),
(537, 6, 'JSP'),
(538, 6, 'JSON'),
(539, 6, 'Linux'),
(540, 6, 'Mathematica'),
(541, 6, 'MATLAB'),
(542, 6, 'Maya'),
(543, 6, 'MCSA'),
(544, 6, 'Microsoft Access'),
(545, 6, 'Microsoft Azure'),
(546, 6, 'Microsoft Excel'),
(547, 6, 'Microsoft Exchange Server'),
(548, 6, 'Microsoft FrontPage'),
(549, 6, 'Microsoft Office'),
(550, 6, 'Microsoft Outlook'),
(551, 6, 'Microsoft PowerPoint'),
(552, 6, 'Microsoft Project'),
(553, 6, 'Microsoft Publisher'),
(554, 6, 'Microsoft Sharepoint'),
(555, 6, 'Microsoft Visio'),
(556, 6, 'Microsoft Sql Server'),
(557, 6, 'Microsoft Visual Studio 2008'),
(558, 6, 'Microsoft Windows'),
(559, 6, 'Microsoft Windows 7'),
(560, 6, 'Microsoft Windows 8'),
(561, 6, 'Microsoft Windows Server'),
(562, 6, 'Microsoft Windows Vista'),
(563, 6, 'Microsoft Word'),
(564, 6, 'Middleware'),
(565, 6, 'MySQL'),
(566, 6, 'Network Infrastructure'),
(567, 6, 'Network Security'),
(568, 6, 'Objective-C'),
(569, 6, 'OLAP'),
(570, 6, 'Oracle'),
(571, 6, 'Pascal'),
(572, 6, 'Penetration Testing'),
(573, 6, 'Perl'),
(574, 6, 'Photo Retouching'),
(575, 6, 'Podcasting'),
(576, 6, 'Postgresql'),
(577, 6, 'Programming'),
(578, 6, 'Python'),
(579, 6, 'QuickBooks'),
(580, 6, 'Quicken'),
(581, 6, 'Sage'),
(582, 6, 'SAP'),
(583, 6, 'Search Engine Optimisation'),
(584, 6, 'Solaris'),
(585, 6, 'SPSS'),
(586, 6, 'SQL'),
(587, 6, 'Telecommunications'),
(588, 6, 'Twitter'),
(589, 6, 'Unix'),
(590, 6, 'Video Production'),
(591, 6, 'Virtualization Software'),
(592, 6, 'Visual Basic'),
(593, 6, 'VOIP'),
(594, 6, 'WordPress'),
(595, 6, 'Xml'),
(596, 6, 'Joomla'),
(597, 2, 'Acting'),
(598, 2, 'Ballet'),
(599, 2, 'Ballroom Dance'),
(600, 2, 'Belly Dancing'),
(601, 2, 'Bollywood Dance'),
(602, 2, 'Break Dancing'),
(603, 2, 'Classics'),
(604, 2, 'Creative Writing'),
(605, 2, 'Dance'),
(606, 2, 'Drawing'),
(607, 2, 'Elocution'),
(608, 2, 'Film Making'),
(609, 2, 'Hip Hop Dance'),
(610, 2, 'Hula'),
(611, 2, 'Magic'),
(612, 2, 'Metalworking'),
(613, 2, 'Painting'),
(614, 2, 'Photography'),
(615, 2, 'Salsa Dance'),
(616, 2, 'Sculpture'),
(619, 6, '3ds Max '),
(620, 6, 'Unity 3d Game Engine'),
(621, 6, 'Unreal Engine'),
(622, 6, 'Blender'),
(623, 20, 'Chinese'),
(624, 29, 'Biochemistry'),
(625, 29, 'Neuroscience'),
(626, 29, 'Pathology'),
(627, 29, 'Archaeology'),
(628, 29, 'Anthropology'),
(629, 34, 'Interior Architecture '),
(630, 34, 'Building Design And Architecture'),
(631, 34, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `town_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `town_name` varchar(25) NOT NULL,
  PRIMARY KEY (`town_id`),
  KEY `FK_town` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`town_id`, `country_id`, `town_name`) VALUES
(1, 1, 'London'),
(2, 1, 'Bedfordshire'),
(3, 1, 'Berkshire'),
(4, 1, 'Buckinghamshire'),
(5, 1, 'Cambridgeshire'),
(6, 1, 'Ceredigion'),
(7, 1, 'Cheshire'),
(8, 1, 'Cleveland'),
(9, 1, 'Cornwall'),
(10, 1, 'Cumbria'),
(11, 1, 'Derbyshire'),
(12, 1, 'Devone'),
(13, 1, 'Dorset'),
(14, 1, 'Birmingham'),
(15, 1, 'Bradford'),
(16, 1, 'Brighton'),
(17, 1, 'Bristol'),
(18, 1, 'Bolton'),
(19, 1, 'Bury'),
(20, 1, 'Durham'),
(21, 1, 'Essex'),
(22, 1, 'Exeter'),
(23, 1, 'Gateshead'),
(24, 1, 'Gloucestershire'),
(25, 1, 'Hampshire'),
(26, 1, 'Kent'),
(27, 1, 'Lancashire'),
(28, 1, 'Leeds'),
(29, 1, 'Leicester'),
(30, 1, 'Liverpool'),
(31, 1, 'Sheffield'),
(32, 1, 'Manchester'),
(33, 1, 'Stockport'),
(34, 1, 'Southampton'),
(35, 1, 'Surrey'),
(36, 1, 'Wiltshire');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_accept_students`
--

CREATE TABLE IF NOT EXISTS `tutor_accept_students` (
  `accept_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `accepted_date` date NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`accept_id`),
  KEY `FK_tutor_accept_students` (`student_id`),
  KEY `FK_tutor_accept_students2` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_experience`
--

CREATE TABLE IF NOT EXISTS `tutor_experience` (
  `tut_experience_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_level` varchar(25) NOT NULL,
  `employer_name` varchar(50) NOT NULL,
  `years_experience` int(11) NOT NULL,
  `job_description` text NOT NULL,
  `still_doing_job` varchar(5) NOT NULL,
  PRIMARY KEY (`tut_experience_id`),
  KEY `FK_tutor_experience` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_experience`
--

INSERT INTO `tutor_experience` (`tut_experience_id`, `tutor_id`, `job_title`, `job_level`, `employer_name`, `years_experience`, `job_description`, `still_doing_job`) VALUES
(1, 2, 'PHP WEB DEVELOPER', 'ENTRY LEVEL', 'TECH-WIZARDS', 2, 'Working on a variety of projects both individually and as part of a team.\r\n- Meeting with business clients, understanding requirements and advising on options.\r\n- Analysing the technical & graphical aspect of the application – how the site looks and how it works.\r\n- Preparing specifications for development.\r\n- Communicating with clients throughout the development process.\r\n- Problem solving to resolve challenging technical issues.\r\n- Identifying opportunities for process and technical improvement and proposing solutions.', 'NO'),
(4, 4, 'LEAD TRAINER FOR ARCHITECTURE ', 'CEO / OWNER', 'REAL ANIMATION WORKS LTD', 10, 'Director and Lead Trainer for Architecture ', 'YES'),
(5, 5, 'ONLINE TUTOR', 'SENIOR LEVEL', 'UK, USA BASED COMPANIES', 4, 'I had done work as an online line tutor in the UK, USA based companies', 'NO'),
(6, 10, 'CELLO TEACHER', 'SENIOR LEVEL', 'CEM (CENTRE OF MUSICAL EXPRESSION)', 2, 'Teaching the cello and musicianship both on a classical background and in popular music', 'NO'),
(7, 10, 'CELLO TEACHER', 'SENIOR LEVEL', 'AMH (LE HAVRE MUSIC ASSOCIATION)', 2, 'Teaching the cello and musicianship both on a classical background and in popular music', 'NO'),
(8, 10, 'CELLO TEACHER', 'SENIOR LEVEL', 'SAINT-ROMAIN SCHOOL OF MUSIC', 4, 'Teaching the cello in a conservatoire-type school of music, including weekly lessons and preparation for exams (equivalent: grades)', 'NO'),
(9, 10, 'CELLO & PIANO TEACHER', 'SENIOR LEVEL', 'LONDON MUSIC CENTRE', 1, 'One-to-one cello and piano tuitions', 'YES'),
(10, 10, 'CELLO & PIANO TEACHER', 'SENIOR LEVEL', 'MUSIC TEACHERS LONDON', 1, 'One-to-one cello and piano tuitions', 'YES'),
(11, 10, 'CELLO TEACHER', 'SENIOR LEVEL', 'HMDT - HACKNEY MUSIC DEVELOPMENT TRUST', 1, 'One-to-one cello tuitions', 'YES'),
(12, 10, 'SINGING & PIANO TEACHER', 'SENIOR LEVEL', 'JUNIOR MUSIC SCHOOL', 1, 'One-to-one as well as group lessons for young children: singing, musical awakening, piano', 'YES'),
(13, 10, 'SINGING TEACHER/VOICE COACH', 'SENIOR LEVEL', 'FREELANCE (E.G. BGM ARTIST MANAGEMENT AGENCY, PRIV', 1, 'One-to-one sessions on spoken voice (elocution, pronunciation, speak in public) as well as singing', 'YES'),
(14, 10, 'CHAMBER MUSIC TEACHER', 'SENIOR LEVEL', 'CéCILE EMERY SUMMER MUSIC ACADEMY', 1, 'Chamber music group lessons to teach teenagers how to play together: how to listen to each other and built something together', 'NO'),
(15, 10, 'SOLFEGGIO/MUSICIANSHIP TEACHER', 'SENIOR LEVEL', 'CONSERVATOIRE RACHMANINOV - PARIS 16E', 1, 'Group lessons on solfeggio and musicianship (reading music, sightreading,singing, music theory...)', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_feedbacks`
--

CREATE TABLE IF NOT EXISTS `tutor_feedbacks` (
  `tut_feedback_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `feedback_description` text NOT NULL,
  `feedback_date_time` date NOT NULL,
  `tutor_rating` int(11) NOT NULL,
  PRIMARY KEY (`tut_feedback_id`),
  KEY `FK_tutor` (`tutor_id`),
  KEY `FK_student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_main`
--

CREATE TABLE IF NOT EXISTS `tutor_main` (
  `tutor_id` int(11) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `tut_title` varchar(10) NOT NULL,
  `tut_fname` varchar(25) NOT NULL,
  `tut_lname` varchar(25) NOT NULL,
  `tut_gender` varchar(10) NOT NULL,
  `tut_address_line1` text NOT NULL,
  `tut_address_line2` text,
  `town_id` int(11) NOT NULL,
  `tut_postcode` varchar(25) NOT NULL,
  `country_id` int(11) NOT NULL,
  `tut_phone_home` varchar(25) DEFAULT NULL,
  `tut_phone_mobile` varchar(25) NOT NULL,
  `tut_skype` varchar(25) DEFAULT NULL,
  `tut_ver_docs` varchar(50) DEFAULT NULL,
  `tut_profile_pic` varchar(50) DEFAULT 'no_pic.jpg',
  `tut_dob` date DEFAULT NULL,
  `tut_distance_travel` varchar(25) NOT NULL,
  `tut_personal_stat` text,
  `tut_availability` text,
  `is_verified` varchar(3) NOT NULL,
  PRIMARY KEY (`tutor_id`),
  KEY `FK_tutor_country` (`country_id`),
  KEY `FK_tutor_email` (`login_email`),
  KEY `FK_tutor_town` (`town_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_main`
--

INSERT INTO `tutor_main` (`tutor_id`, `login_email`, `tut_title`, `tut_fname`, `tut_lname`, `tut_gender`, `tut_address_line1`, `tut_address_line2`, `town_id`, `tut_postcode`, `country_id`, `tut_phone_home`, `tut_phone_mobile`, `tut_skype`, `tut_ver_docs`, `tut_profile_pic`, `tut_dob`, `tut_distance_travel`, `tut_personal_stat`, `tut_availability`, `is_verified`) VALUES
(2, 'faridshuja@yahoo.com', 'Mr', 'Fareed', 'Shuja', 'Male', 'House 12, Hazel House', 'Wickam Road, Lewisham', 1, 'SE41NA', 1, '', '07492899957', 'fareedshuja', '2-TUTOR-Javed-Shuja.jpg', '2-Fareed-Shuja.jpg', NULL, '3 Miles', '<p>I have done my MSc in Computer Science from Queen Mary Univeristy of London. I have more than 3 years of working experience as &#39;Web&nbsp;Developer&#39; and I currently work as a Senior Web Developer at Real Animation Works, located in South London.</p>\r\n\r\n<p>I am a confident and hardworking individual, with an enthusiasm for programming along with good knowledge of object oriented paradigm and software engineering principles. I have excellent verbal and written communication skills, both in office environment and with external stakeholders. I take my work seriously and always keep the bar high for myself. I challenge myself at what I do and that always brings out the best in me.</p>\r\n\r\n<p>&nbsp;</p>\r\n', ' I am available to tutor on Friday, Saturday and Sunday.', 'YES'),
(4, 'info@realanimationworks.com', 'Mr', 'Sitwat', 'Ali', 'Male', 'Chester House  Unit 1.02', '', 1, 'SW96DE', 1, '07970325184', '07970325184', '', '4-Ver-Sitwat-Ali.JPG', '4-Sitwat-Ali.jpg', NULL, 'More than 10 Miles', '<p>Architecture and Design tutor 3ds max training in London One to one Autocad lessons in London.<br />\r\n<br />\r\nWe can help complete your University assignments from start to finish. I teach the following:<br />\r\n1. One to one 2D and 3D Animations tutor<br />\r\n2. One to one Graphics Design tutor<br />\r\n3. Motion Graphics tutor<br />\r\n4. 3DS Max tutor<br />\r\n5. Maya tutor<br />\r\n6. Adobe PhotoShop tutor<br />\r\n7. Adobe Premiere<br />\r\n8. Interior and Exterior Design tutor<br />\r\n9 Mudbox and Zbrush tutor<br />\r\n10. Adobe Aftereffects tutor<br />\r\n11. Hand Drawings for Architectures tutor<br />\r\n12. AutoCad tutor<br />\r\n13. Rhino tutor<br />\r\n14. Vectorworks tutor<br />\r\n15. 3d studio max tutor Architectural Plans Sections Elevations Detailing Isometric and AxoDrawings Autocad win and mac 2D and 3D, 3D visualization.</p>\r\n\r\n<p>Adobe Illustrator, Indesign and Photoshop</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>MA Digital Moving Image 3D (UK) Master in computer Sciences Autodesk Certification of 3DS Max</p>\r\n\r\n<p>What kind of experience do you have?</p>\r\n\r\n<p>I have been teaching AutoCAD as one to one tutor in London, both as a trainer at private institutions and as an one-to-one tutor.</p>\r\n\r\n<p>15 yrs of teaching and animation work experience.</p>\r\n\r\n<p>10 years of Autocad tutor in London 10 years of 3ds max and Rhino tutor in London 10 years of Maya tutor in London &nbsp;we are open 7 days a week 9 am to 8 pm.</p>\r\n\r\n<p>How much do you charge? One-to-one tuition = 25 per hour.</p>\r\n\r\n<p>Group of 3 = 25&nbsp;per hour. If I travel = 30 per hour. http://www.realanimationworks.com/</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Where do you teach? I have my own registered company with a proper office fully equipped with the latest computers and machines for students and professionals.</p>\r\n\r\n<p>It&rsquo;s located in Oval. The nearby stations are Oval and Vauxhall we are only 3 minutes away from Oval tube and 5 minutes from Kennington park tube .</p>\r\n\r\n<p>I can travel only within London.&nbsp;</p>\r\n\r\n<p>At Real Animation Works all our training are one to one you can call us at anytime to book your lessons. We believe in one to one training in AutoCAD, 3ds max, Maya and any other training/tuition platform to be private rather than in a group of 20 students.</p>\r\n\r\n<p>We believe students can concentrate and more confident in a private session. We are very flexible in payments, timings and sessions we try our level best to track ourselves according to the client&#39;s availability. When are you available? I am available 7 days a week even evenings providing one to one tutoring for Autocad and 3ds max Which ages and levels do you teach? Age 16 and Above. Level Any (Basic to Advance). Which qualifications do you prepare your students for? Undergraduate and postgraduates. Where and with whom did you train? Our Company is a registered company in UK we train students and professionals along with our professional team. Tell me about some of your current students. Please visit this link you can find the information about my students</p>\r\n', ' We are open 7 days a week 9 am to 8 pm.', 'YES'),
(5, 'sumera_saleem5@yahoo.com', 'Miss', 'Sumera ', 'Saleem ', 'Female', 'Cc5, 2nd Floor Defence View Karachi Pakistan', '', 32, '00000000', 1, '', '923662092062', 'sumera.saleem38', '5-Ver-Sumera_Saleem-Saleem_Akhter.jpg', '5-Sumera-Saleem-Saleem-Akhter.jpg', NULL, 'From Home', '<p>I am online tutor . I had done bachelor in computer science</p>\r\n\r\n<p>now I am doing masters in computer science .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I had done MCSA (Window server 2012 ) certification .</p>\r\n\r\n<p>I had also done CCNA (Routing and switching ) certification&nbsp; .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I am also video instructor . I have four-year online tutoring experience .</p>\r\n\r\n<p>I had taught online&nbsp; many subjects ( Discrete mathematics, Calculus ,</p>\r\n\r\n<p>probability and statistics, dissertation , Research design and analysis</p>\r\n\r\n<p>and&nbsp; MCSA etc).</p>\r\n\r\n<p>&nbsp;</p>\r\n', ' Every time', 'YES'),
(6, 'henrygovil@yahoo.co.uk', 'Mr', 'Henry', 'Govind', 'Male', '5 Stoney Croft Lane', '', 1, 'SE62UN', 1, '0208690256', '07473938605', '', '6-Ver-Henry-Govind.png', '6-Henry-Govind.jpg', NULL, '4 Miles', '<p>I teach Aniamtion and 3d modeling using Maya and 3ds max and Zbrush.</p>\r\n', ' 7 days', 'YES'),
(7, 'sambrandman@gmail.com', 'Mr', 'Sam', 'Brandman', 'Male', 'East Finchley', '', 1, 'N2', 1, '', '07795974707', '', NULL, '7-Sam-Brandman.jpg', NULL, 'More than 10 Miles', '<p>I am able to to teach Maths, Physics and French, with other subjects below GCSE. I only tutor where I believe I can materially improve a person&#39;s performance.</p>\r\n\r\n<p>There are three reasons your child will benefit from my tuition:</p>\r\n\r\n<ol>\r\n	<li>The tutee&#39;s&nbsp;personality is the most important thing - my style is first to understand what makes a person tick, what they find fun, how they like to be taught, to form a strong connection that facilitates learning.</li>\r\n	<li>I love finding ways to explain difficult concepts to people who have previously not understood from other tutors / teachers in a way that not only helps the child learn but also means they enjoy learning.</li>\r\n	<li>I have a strong academic background which means I have a comprehensive understanding of the subjects I teach.</li>\r\n</ol>\r\n\r\n<p>If you&#39;d like to contact me I would be happy to discuss the tutee&#39;s needs directly on a free phone consultation.</p>\r\n\r\n<p><u style="line-height: 1.6em;">Case Studies</u></p>\r\n\r\n<p><em>French (GCSE):</em></p>\r\n\r\n<p>A student was struggling with French GCSE, consistently achieving an E. With a few lessons spaced out over a few weeks in the Easter holidays, she achieved a B on her final exam.</p>\r\n\r\n<p><em>Physics (undergraduate degree):</em></p>\r\n\r\n<p>The student was struggling to understand a number of topics. I helped provide a structure and framework to his learning as well as working through some of the most difficult concepts in Academia with him. His grades rose by 2 levels as a result.</p>\r\n', 'Currently have good weekday availability, only a few Sunday slots still free, Saturday full', 'YES'),
(8, 'ritochka2007@ya.ru', 'Mrs', 'Margarita', 'Gradinar', 'Female', '55 Woodland Gardens', '', 1, 'N103UE', 1, '', '07565202613', '', NULL, '8-Margarita-Gradinar.jpg', NULL, 'More than 10 Miles', '<p>I am happy to offer you English, French and Russian lessons.&nbsp;<br/>\r\nI am an English and French Teacher with 8 years&#39; experience in Moscow and London. Additionally, I have recently passed the CELTA course in Paris.</p>\r\n\r\n<p>I am a well-organised strong classroom performer who is able to effectively communicate with students from diverse backgrounds or varying degrees of ability. By using my enthusiasm felt by learners and readiness to experiment, I can maintain a positive climate where pupils can reach their full potential. As an inspirational teacher with high personal standards, I am committed to the learning and development of my students. I have high expectations of both myself and my pupils, and show an interest in every student as an individual.</p>\r\n\r\n<p>I feel that my greatest strengths are my ability to inspire a love of language in pupils, to understand and meet the needs of individual children and families, to motivate them in developing a lifelong enthusiasm for learning.</p>\r\n\r\n<p>I prefer teaching language through culture, teaching with project-based learning, preparing and performing short plays during class-time. The most important duties are those of helping students to improve their conversational English/French and Vocabulary skills, arranging interesting homework for schoolchildren, teaching grammar through conversation, giving appropriate feedback to pupils and encouraging them to ask questions and to express their difficulties, preparing students for external examinations, keeping up to date with development in the world of teaching.</p>\r\n\r\n<p>I work with students of different levels (Beginner, Elementary, Pre-intermediate, Intermediate, Upper-Intermediate, Advanced) and age groups (preschool children, schoolchildren, students, adults).</p>\r\n\r\n<p>I also prepare students for Cambridge (Starters, Movers, Flyers, KET, PET, FCE, IELTS/TOEFL) exams and Oxford (SELT) exams as well as DELF in French.</p>\r\n', 'Mon-Sun 9a.m. - 10 p.m.', 'YES'),
(9, 'rusbogdana@yahoo.com', 'Mr', 'BOGDANA', 'RUS', 'Male', 'EASTERN AVENUE ', '', 1, 'IG26NT', 1, '', '07459737608', '', NULL, '9-BOGDANA-RUS.jpg', NULL, 'More than 10 Miles', '<p>I would like to share my knowledge of Maths &nbsp;with you</p>\r\n', '', 'YES'),
(10, 'celine.lepicard@laposte.net', 'Miss', 'Céline', 'Lepicard', 'Female', '33 Ranelagh Road', 'Leytonstone', 1, 'E113JW', 1, '', '07754363694', '', NULL, '10-Céline-Lepicard.jpg', NULL, '5 Miles', '<p>&nbsp;* About me *</p>\r\n\r\n<p><span style="line-height: 1.6em;">&nbsp;I </span><span style="line-height: 1.6em;">&nbsp;am a French cellist now settled in London. I started the Conservatoire in Normandy at the age of 6 and got my certificates there before studying in Paris suburbs, including the &lsquo;Conservatoire de Versailles&rsquo; where I obtained a certificate in Pedagogy.&nbsp;</span></p>\r\n\r\n<p>&nbsp;Playing in orchestras is a real passion for me - as teaching - and this is why&nbsp;I have been principal cello of the Symphony Orchestra of Royal Holloway (London) fort he past two years.&nbsp;<br />\r\n&nbsp;My musical activities as a cellist and singer allow me to teach both in classical music and popular music, as I equally play and sing in classical orchestras or folk rock bands.<br />\r\n&nbsp;Plus, I graduated in Music &sect; Musicology at La Sorbonne University in Paris and got my certificates in Musicianship/Solfeggio and History of Music from the &lsquo;Conservatoire de Rouen&rsquo; so that I can help in these areas of studies as well.</p>\r\n\r\n<p>&nbsp;* About my pedagogy *</p>\r\n\r\n<p>&nbsp;<span style="line-height: 20.8px;">My two main subjects are cello and singing, and&nbsp;</span>as long as I can remember, I always wanted to teach music! So I found some ways to do it as soon as I could (by doing musical animations in primary schools when I was still a teenager for example). &nbsp;I think that every tutee is unique, so it seems important to me to adapt my pedagogy to each personality I have in front of me. It is essential to define the best way to teach someone.&nbsp;<span style="line-height: 20.8px;">I really do think that music learning has a very important role in one&#39;s personal development. It will foster students&#39; self-esteem through expressing their inner selves.</span></p>\r\n\r\n<p>&nbsp;Playing in different kinds of styles (classical and popular music) allows me to use different techniques and sometimes to mix them to find the best way for the student to perform. I have taught the cello both in classical schools of music as well as popular music associations, which gave&nbsp;me a new angle in my approach of pedagogy.</p>\r\n\r\n<p>&nbsp;About singing more specifically, I&#39;ve also studied at Acting International in order to learn how to use my voiceS - both spoken and sung - so that I could link different techniques and mechanics. This way the student can get the best of his voice without getting hurt.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Weekdays anytime from Wednesday till Friday, Tuesday evenings and Saturday afternoons/evenings', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_qualification`
--

CREATE TABLE IF NOT EXISTS `tutor_qualification` (
  `tut_qual_id` int(11) NOT NULL,
  `qual_level_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `university_name` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `grades` varchar(10) NOT NULL,
  `grades_type` varchar(10) NOT NULL,
  `graduation_year` year(4) NOT NULL,
  `still_in_progress` varchar(3) NOT NULL,
  PRIMARY KEY (`tut_qual_id`),
  KEY `FK_tutor_qualification` (`qual_level_id`),
  KEY `FK_tutor_education` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_qualification`
--

INSERT INTO `tutor_qualification` (`tut_qual_id`, `qual_level_id`, `tutor_id`, `university_name`, `course`, `grades`, `grades_type`, `graduation_year`, `still_in_progress`) VALUES
(4, 45, 2, 'QUEEN MARY UNIVERSITY OF LONDON', 'SOFTWARE ENGINEERING', '70+ %', 'Obtained', 2015, 'NO'),
(5, 13, 2, 'IQRA UNIVERSITY, PAKISTAN', 'COMPUTER SCIENCE', '50-59 %', 'Obtained', 2013, 'NO'),
(8, 32, 4, 'LONDON METROPOLITAN UNIVERSITY ', 'DIGITAL MOVING IMAGE', '70+ %', 'Obtained', 2006, ''),
(9, 56, 4, 'AUTODESK', '3DS MAX CERTIFICATION ', '70+ %', 'Obtained', 2013, ''),
(10, 56, 4, 'AUTODESK', 'AUTOCAD', '70+ %', 'Obtained', 2014, ''),
(11, 13, 5, 'PETROMAN TRANING AND INSTITUTE ', 'BSCS', '70+ %', 'Obtained', 2005, 'NO'),
(12, 32, 5, 'UNIVERSITY ', 'MSCS', '70+ %', 'Predicted', 2016, 'YES'),
(13, 16, 5, 'MICROSOFT', 'MCSA', '70+ %', 'Obtained', 2016, 'NO'),
(14, 16, 5, 'CISCO', 'CCNA', '70+ %', 'Obtained', 2016, 'NO'),
(15, 7, 7, 'ICAEW', 'CHARTERED ACCOUNTANT', '70+ %', 'Obtained', 2007, 'NO'),
(16, 46, 7, 'IMPERIAL COLLEGE LONDON', 'PHYSICS WITH A YEAR IN EUROPE', '70+ %', 'Obtained', 2004, 'NO'),
(17, 6, 7, 'CITY OF LONDON SCHOOL', 'MATHS', '70+ %', 'Obtained', 2000, 'NO'),
(18, 6, 7, 'CITY OF LONDON SCHOOL', 'PHYSICS', '70+ %', 'Obtained', 2000, 'NO'),
(19, 6, 7, 'CITY OF LONDON SCHOOL', 'FRENCH', '70+ %', 'Obtained', 2000, 'NO'),
(20, 6, 7, 'CITY OF LONDON SCHOOL', 'SPANISH', '70+ %', 'Obtained', 2000, 'NO'),
(21, 27, 10, 'LYCéE FRANçOIS IER', 'BACCALAURéAT LITTéRAIRE', '70+ %', 'Obtained', 2007, 'NO'),
(22, 56, 10, 'CONSERVATOIRES à RAYONNEMENT RéGIONAL DE ROUEN / à RAYONNEMENT DéPARTEMENTAL DU HAVRE', 'DIPLOMA OF MUSICAL STUDIES (DEMR)', '70+ %', 'Obtained', 2009, 'NO'),
(23, 56, 10, 'CONSERVATOIRE D''ASNIèRES (PROX. PARIS)', 'END OF MUSICAL STUDIES - CELLO', '70+ %', 'Obtained', 2009, 'NO'),
(24, 49, 10, 'CONSERVATOIRE à RAYONNEMENT RéGIONAL DE VERSAILLES', 'PEDAGOGY', '70+ %', 'Obtained', 2010, 'NO'),
(25, 18, 10, 'LA SORBONNE UNIVERSITY OF PARIS', 'MUSIC & MUSICOLOGY', '50-59 %', 'Obtained', 2014, 'NO'),
(26, 49, 10, 'ACTING INTERNATIONAL (SCHOOL OF THEATRE AND CINEMA)', 'A YEAR OF TRAINING IN THEATRE & CINEMA', '70+ %', 'Obtained', 2012, 'NO'),
(27, 54, 10, 'ROYAL HOLLOWAY UNIVERSITY OF LONDON', 'POSTGRADUATE DIPLOMA IN PERFORMANCE', '70+ %', 'Predicted', 2016, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_references`
--

CREATE TABLE IF NOT EXISTS `tutor_references` (
  `tut_reference_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `ref_title` varchar(10) DEFAULT NULL,
  `ref_fname` varchar(25) NOT NULL,
  `ref_lname` varchar(25) NOT NULL,
  `ref_email` varchar(50) NOT NULL,
  `ref_phone` varchar(20) NOT NULL,
  `ref_relation` varchar(25) NOT NULL,
  `ref_organization` text,
  PRIMARY KEY (`tut_reference_id`),
  KEY `FK_tutor_references` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_references`
--

INSERT INTO `tutor_references` (`tut_reference_id`, `tutor_id`, `ref_title`, `ref_fname`, `ref_lname`, `ref_email`, `ref_phone`, `ref_relation`, `ref_organization`) VALUES
(1, 2, 'Mr', 'Tony', 'Stockman', 'tony.stockman@qmul.ac.uk', '02007894461', 'Professor', 'Queen Mary University of London'),
(2, 5, NULL, 'Rozina Saleem', 'Saleem Akhter', 'rozinasaleem.saleemakhter@gmail.com', '03312473163', 'Colleague', 'educational'),
(3, 10, NULL, 'Mauro', 'Vergani', 'info@juniormusicschool.com', '07427441782', 'Employer', 'Junior Music School');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_subjects`
--

CREATE TABLE IF NOT EXISTS `tutor_subjects` (
  `tut_sub_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subs_id` int(11) NOT NULL,
  `sub_level_id` int(11) NOT NULL,
  `rate_per_hour` int(11) NOT NULL,
  `tut_sub_notes` text,
  PRIMARY KEY (`tut_sub_id`),
  KEY `FK_tutor_subjects` (`tutor_id`),
  KEY `FK_tutor_sub` (`subs_id`),
  KEY `FK_tutor_level` (`sub_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_subjects`
--

INSERT INTO `tutor_subjects` (`tut_sub_id`, `tutor_id`, `subs_id`, `sub_level_id`, `rate_per_hour`, `tut_sub_notes`) VALUES
(11, 4, 15, 3, 30, 'Good'),
(12, 4, 18, 3, 30, 'Good'),
(22, 4, 619, 1, 25, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(23, 4, 619, 2, 25, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(24, 4, 619, 3, 25, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(25, 4, 620, 1, 30, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(26, 4, 620, 2, 30, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(27, 4, 620, 3, 30, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(28, 4, 259, 1, 30, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(29, 4, 259, 2, 30, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(30, 4, 259, 3, 30, 'All our training are provided by Autodesk Certified Professional and the courses are designed in such a way that anyone can learn 3d Studio Max in the selected time and start working on their own projects. Even if someone is working in a design company, these training programs will definitely enhance their skills and they will be able to work in a much better way with new techniques.'),
(31, 2, 1, 1, 15, ''),
(32, 2, 1, 2, 20, ''),
(33, 2, 1, 3, 20, ''),
(34, 2, 530, 1, 15, ''),
(35, 2, 530, 2, 20, ''),
(36, 2, 519, 1, 15, ''),
(37, 2, 519, 2, 20, ''),
(38, 2, 594, 1, 15, ''),
(39, 2, 594, 2, 20, ''),
(40, 2, 594, 3, 20, ''),
(44, 5, 543, 1, 20, 'I had done MCSA. I am Microsoft certified trainer . \r\nI am tutoring online MCSA '),
(45, 5, 543, 2, 20, 'I had done MCSA. I am Microsoft certified trainer . \r\nI am tutoring online MCSA '),
(46, 5, 543, 3, 20, 'I had done MCSA. I am Microsoft certified trainer . \r\nI am tutoring online MCSA '),
(50, 5, 391, 1, 20, 'I am online tutoring probability and statistics'),
(51, 5, 391, 2, 20, 'I am online tutoring probability and statistics'),
(52, 5, 391, 3, 20, 'I am online tutoring probability and statistics'),
(53, 5, 387, 1, 20, 'I am online tutoring Calculus '),
(54, 5, 387, 2, 20, 'I am online tutoring Calculus '),
(55, 5, 387, 3, 20, 'I am online tutoring Calculus '),
(56, 5, 445, 1, 30, 'I am tutoring online dissertation . \r\nI will provide you complete help for choose topic for your dissertation  and also \r\nhelp you in course knowledge which require for dissertation . .'),
(57, 5, 445, 2, 30, 'I am tutoring online dissertation . \r\nI will provide you complete help for choose topic for your dissertation  and also \r\nhelp you in course knowledge which require for dissertation . .'),
(58, 5, 445, 3, 30, 'I am tutoring online dissertation . \r\nI will provide you complete help for choose topic for your dissertation  and also \r\nhelp you in course knowledge which require for dissertation . .'),
(59, 5, 386, 1, 20, 'I am tutoring online research design and inferential analysis course . \r\nThis course is necessary for the dissertation .'),
(60, 5, 386, 2, 20, 'I am tutoring online research design and inferential analysis course . \r\nThis course is necessary for the dissertation .'),
(61, 5, 386, 3, 20, 'I am tutoring online research design and inferential analysis course . \r\nThis course is necessary for the dissertation .'),
(62, 7, 387, 1, 20, ''),
(63, 7, 387, 2, 20, ''),
(64, 7, 387, 3, 20, ''),
(65, 7, 270, 1, 20, ''),
(66, 7, 270, 2, 20, ''),
(67, 7, 270, 3, 20, ''),
(68, 7, 389, 1, 20, ''),
(69, 7, 389, 2, 20, ''),
(70, 7, 389, 3, 20, ''),
(71, 4, 630, 1, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(72, 4, 630, 2, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(73, 4, 630, 3, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(74, 4, 631, 1, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(75, 4, 631, 2, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(76, 4, 631, 3, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(77, 4, 629, 1, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(78, 4, 629, 2, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(79, 4, 629, 3, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(80, 4, 259, 1, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(81, 4, 259, 2, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(82, 4, 259, 3, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(83, 4, 258, 1, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(84, 4, 258, 2, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(85, 4, 258, 3, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(86, 4, 18, 1, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(87, 4, 18, 2, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(88, 4, 18, 3, 30, 'have already trained student from Many Major universities in UK we help in all university assignments please email us or call us for assistance in help in making plans sections elevation CAD detailing and 3d visualization using \r\n\r\nYou can bring you complicated brief here and we will start the project with you and by the end of this training you will be done with your project and also you will learn a lot of software such as, \r\n\r\n1. 3ds max and Maya (Interior design and Animation training one to one) \r\n2. Autocad PC and MAC 2D and 3D both \r\n3. Revit BIM \r\n4. Vray Realistic Rendering \r\n5. Photoshop \r\n6. Vectorworks 2D and 3D \r\n7. Indesign \r\n8. Sketchup Advance modeling (Rendering Podium and Vray) \r\n9. Rhino Advance modeling (Rendering Vray) \r\n10. Physical Model making and Laser cutting Techniques Also 3D printing facility is available. \r\n11. Complete help in making Amazing portfolio \r\n12. Help in Report writing \r\n13. Site Analysis and Environmental analysis including CAD detailed drawings and BIM. \r\nWe are a registered company in UK providing One to one tuition so you and your money both are in safe hands. \r\nLearn 1 on 1 Autocad Vectorworks 3dsmax Rhino Vray Photoshop Sketchup Help with university projects \r\n\r\nOpen 7 days 9 am to 9 Pm...Book your first session ASAP. '),
(89, 8, 270, 1, 25, ''),
(90, 8, 270, 2, 25, ''),
(91, 8, 270, 3, 25, ''),
(92, 8, 162, 1, 25, 'Transport costs incl.'),
(93, 8, 162, 2, 25, 'Transport costs incl.'),
(94, 8, 162, 3, 25, 'Transport costs incl.'),
(95, 2, 489, 1, 20, ''),
(96, 2, 489, 2, 15, ''),
(100, 10, 325, 1, 35, 'This rate includes travel expenses'),
(101, 10, 325, 2, 35, 'This rate includes travel expenses'),
(102, 10, 325, 3, 35, 'This rate includes travel expenses'),
(103, 10, 326, 1, 35, 'This rate includes travel expenses'),
(104, 10, 326, 2, 35, 'This rate includes travel expenses'),
(105, 10, 326, 3, 35, 'This rate includes travel expenses'),
(106, 10, 327, 1, 35, 'This rate includes travel expenses'),
(107, 10, 327, 2, 35, 'This rate includes travel expenses'),
(108, 10, 327, 3, 35, 'This rate includes travel expenses'),
(109, 10, 330, 1, 35, 'This rate includes travel expenses'),
(110, 10, 330, 2, 35, 'This rate includes travel expenses'),
(111, 10, 330, 3, 35, 'This rate includes travel expenses'),
(112, 10, 331, 1, 35, 'This rate includes travel expenses'),
(113, 10, 331, 2, 35, 'This rate includes travel expenses'),
(114, 10, 331, 3, 35, 'This rate includes travel expenses'),
(115, 10, 335, 1, 35, 'This rate includes travel expenses'),
(116, 10, 335, 2, 35, 'This rate includes travel expenses'),
(117, 10, 335, 3, 35, 'This rate includes travel expenses'),
(118, 10, 336, 1, 35, 'This rate includes travel expenses'),
(119, 10, 336, 2, 35, 'This rate includes travel expenses'),
(120, 10, 336, 3, 35, 'This rate includes travel expenses'),
(121, 10, 333, 1, 35, 'This rate includes travel expenses'),
(122, 10, 333, 2, 35, 'This rate includes travel expenses'),
(123, 10, 333, 3, 35, 'This rate includes travel expenses');

-- --------------------------------------------------------

--
-- Table structure for table `tut_feedback_response`
--

CREATE TABLE IF NOT EXISTS `tut_feedback_response` (
  `tut_response_id` int(11) NOT NULL,
  `tut_feedback_id` int(11) NOT NULL,
  `response_description` text NOT NULL,
  `response_date_time` date NOT NULL,
  PRIMARY KEY (`tut_response_id`),
  KEY `FK_tut_response` (`tut_feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `warning_msgs`
--

CREATE TABLE IF NOT EXISTS `warning_msgs` (
  `warning_msg_id` int(11) NOT NULL,
  `warning_msg_type` varchar(50) NOT NULL,
  `warning_msg_detail` text NOT NULL,
  PRIMARY KEY (`warning_msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warning_msgs`
--

INSERT INTO `warning_msgs` (`warning_msg_id`, `warning_msg_type`, `warning_msg_detail`) VALUES
(1, 'payment', '<h4><span style="color:#b22222"><strong>PURCHASE CONTACT DETAILS</strong></span></h4>\r\n\r\n<p><span style="font-size:14px">We accept payment via&nbsp;<strong>PayPal</strong>&nbsp;only. Upon purchase, you will be able to view the contact details of the selected tutor here under the &#39;Contact Details&#39; tab. </span></p>\r\n\r\n<p><span style="font-size:14px">We do not charge any commission or tution fee like the typical tution academies do.</span></p>\r\n'),
(2, 'unverified_account', '<p><span style="font-size:14px"><span style="color:#ff0000">You have an unverified account. We are in the process of verifying your account.</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#ff0000">Please note that we will not verify your account if you have uploaded a fake, blur or&nbsp;unclear profile image..</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#ff0000"><strong>Your Profile will not be visible to students until&nbsp;we verify your account.</strong></span></span></p>\r\n');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages_main`
--
ALTER TABLE `messages_main`
  ADD CONSTRAINT `FK_messages_main` FOREIGN KEY (`student_id`) REFERENCES `student_main` (`student_id`),
  ADD CONSTRAINT `FK_messages_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `message_reply`
--
ALTER TABLE `message_reply`
  ADD CONSTRAINT `FK_message_reply` FOREIGN KEY (`msg_id`) REFERENCES `messages_main` (`msg_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment_student` FOREIGN KEY (`student_id`) REFERENCES `student_main` (`student_id`),
  ADD CONSTRAINT `FK_payment_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `student_main`
--
ALTER TABLE `student_main`
  ADD CONSTRAINT `FK_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `FK_student_email` FOREIGN KEY (`login_email`) REFERENCES `login` (`login_email`),
  ADD CONSTRAINT `FK_student_town` FOREIGN KEY (`town_id`) REFERENCES `town` (`town_id`);

--
-- Constraints for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD CONSTRAINT `FK_student_level` FOREIGN KEY (`sub_level_id`) REFERENCES `subject_level` (`sub_level_id`),
  ADD CONSTRAINT `FK_student_sub` FOREIGN KEY (`subs_id`) REFERENCES `sub_subjects` (`subs_id`),
  ADD CONSTRAINT `FK_student_subjects` FOREIGN KEY (`student_id`) REFERENCES `student_main` (`student_id`);

--
-- Constraints for table `sub_subjects`
--
ALTER TABLE `sub_subjects`
  ADD CONSTRAINT `FK_sub_subjets` FOREIGN KEY (`mains_id`) REFERENCES `main_subjects` (`mains_id`);

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `FK_town` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `tutor_accept_students`
--
ALTER TABLE `tutor_accept_students`
  ADD CONSTRAINT `FK_tutor_accept_students` FOREIGN KEY (`student_id`) REFERENCES `student_main` (`student_id`),
  ADD CONSTRAINT `FK_tutor_accept_students2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `tutor_experience`
--
ALTER TABLE `tutor_experience`
  ADD CONSTRAINT `FK_tutor_experience` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `tutor_feedbacks`
--
ALTER TABLE `tutor_feedbacks`
  ADD CONSTRAINT `FK_student` FOREIGN KEY (`student_id`) REFERENCES `student_main` (`student_id`),
  ADD CONSTRAINT `FK_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `tutor_main`
--
ALTER TABLE `tutor_main`
  ADD CONSTRAINT `FK_tutor_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `FK_tutor_email` FOREIGN KEY (`login_email`) REFERENCES `login` (`login_email`),
  ADD CONSTRAINT `FK_tutor_town` FOREIGN KEY (`town_id`) REFERENCES `town` (`town_id`);

--
-- Constraints for table `tutor_qualification`
--
ALTER TABLE `tutor_qualification`
  ADD CONSTRAINT `FK_tutor_education` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`),
  ADD CONSTRAINT `FK_tutor_qualification` FOREIGN KEY (`qual_level_id`) REFERENCES `qualification_level` (`qual_level_id`);

--
-- Constraints for table `tutor_references`
--
ALTER TABLE `tutor_references`
  ADD CONSTRAINT `FK_tutor_references` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `tutor_subjects`
--
ALTER TABLE `tutor_subjects`
  ADD CONSTRAINT `FK_tutor_level` FOREIGN KEY (`sub_level_id`) REFERENCES `subject_level` (`sub_level_id`),
  ADD CONSTRAINT `FK_tutor_sub` FOREIGN KEY (`subs_id`) REFERENCES `sub_subjects` (`subs_id`),
  ADD CONSTRAINT `FK_tutor_subjects` FOREIGN KEY (`tutor_id`) REFERENCES `tutor_main` (`tutor_id`);

--
-- Constraints for table `tut_feedback_response`
--
ALTER TABLE `tut_feedback_response`
  ADD CONSTRAINT `FK_tut_response` FOREIGN KEY (`tut_feedback_id`) REFERENCES `tutor_feedbacks` (`tut_feedback_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
