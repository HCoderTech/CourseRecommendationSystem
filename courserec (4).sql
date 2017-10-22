-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2017 at 04:24 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courserec`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ccourses`
--

DROP TABLE IF EXISTS `ccourses`;
CREATE TABLE IF NOT EXISTS `ccourses` (
  `CourseCode` varchar(20) NOT NULL,
  `CourseTitle` varchar(60) NOT NULL,
  PRIMARY KEY (`CourseCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ccourses`
--

INSERT INTO `ccourses` (`CourseCode`, `CourseTitle`) VALUES
('15MX11', 'Probability and Statistics'),
('15MX12', 'Mathematical Foundations of Computer Science'),
('15MX13', 'Principles of Programming Languages'),
('15MX14', 'Data Structures and Algorithm'),
('15MX15', 'Computer Architecture'),
('15MX21', 'Optimization Techiniques'),
('15MX22', 'Object Oriented Programming'),
('15MX23', 'Advanced Data Structures and Algorithm'),
('15MX24', 'Database Management System'),
('15MX25', 'Microprocessors and Embedded Systems'),
('15MX31', 'Java and .Net Programming'),
('15MX32', 'Operating Systems'),
('15MX33', 'Computer Networks'),
('15MX34', 'Principles of Compiler Design'),
('15MX41', 'Unix Architecture and Programming'),
('15MX42', 'Enterprise Computing'),
('15MX43', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

DROP TABLE IF EXISTS `coursedetails`;
CREATE TABLE IF NOT EXISTS `coursedetails` (
  `CourseCode` varchar(20) NOT NULL,
  `CourseTitle` varchar(50) NOT NULL,
  `Credit` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Program` varchar(60) NOT NULL DEFAULT 'Master of Computer Applications',
  `Theory` int(11) NOT NULL,
  `Programming` int(11) NOT NULL,
  `Placement` int(11) NOT NULL,
  `Prerequisite` int(11) NOT NULL,
  `Problematic` int(11) NOT NULL,
  `Rating` decimal(10,3) NOT NULL,
  `TotalVotes` int(11) NOT NULL,
  `Description` varchar(2048) NOT NULL,
  PRIMARY KEY (`CourseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`CourseCode`, `CourseTitle`, `Credit`, `Category`, `Program`, `Theory`, `Programming`, `Placement`, `Prerequisite`, `Problematic`, `Rating`, `TotalVotes`, `Description`) VALUES
('15MXAA', 'NETWORK MANAGEMENT', 3, 'PE', 'Master of Computer Applications', 7, 0, 8, 7, 5, '3.981', 56, 'This course involves the technologies, services, tools utilized by the industry to manage and troubleshoot the networks.'),
('15MXAB', ' WIRELESS NETWORKS', 3, 'PE', 'Master of Computer Applications', 8, 0, 3, 8, 6, '3.562', 90, 'This course builds an understanding of the core issues encountered in the design of wireless (vs wired) networks. It also exposes students to fairly recent paradigms in wireless communication.'),
('15MXAC', 'SECURITY IN COMPUTING', 3, 'PE', 'Master of Computer Applications', 9, 0, 3, 5, 7, '3.925', 15, 'This course will introduce students to basic knowledge of the most current trends and issues related to computer, network, and web security and the investigative and technical skills required to overcome these threats.'),
('15MXAD', 'CLOUD COMPUTING', 3, 'PE', 'Master of Computer Applications', 10, 3, 5, 4, 2, '4.096', 72, 'This introductory course on Cloud computing will teach both the fundamental concepts of how and why Cloud systems works, as well as Cloud technologies that manifest these concepts. Students will learn distributed systems concepts like virtualization, data parallelism etc.'),
('15MXAE', 'PERVASIVE COMPUTING', 3, 'PE', 'Master of Computer Applications', 9, 0, 0, 0, 2, '3.938', 67, 'This course covers the technologies involved in integrating front-end mobile devices into local and global networks.'),
('15MXAF', 'MOBILE COMPUTING', 3, 'PE', 'Master of Computer Applications', 10, 0, 0, 2, 2, '4.413', 45, 'This course will introduce students to mobile computing and mobile application development and also give an overview of various mobile computing applications, technologies and wireless communication.'),
('15MXAG', 'COMPUTER FORENSICS', 3, 'PE', 'Master of Computer Applications', 10, 0, 0, 0, 0, '3.754', 46, 'This course gives an introduction to computer forensics and investigation, and provides a taster in understanding how to conduct investigations to correctly gather, analyse and present digital evidence to both business and legal audiences.'),
('15MXAH', 'HIGH PERFORMANCE COMPUTING', 3, 'PE', 'Master of Computer Applications', 10, 0, 0, 0, 0, '3.530', 71, 'The course focuses on advanced computer architectures, parallel algorithms, parallel languages, and performance-oriented computing. '),
('15MXBA', 'SOCIAL NETWORKING AND WEB MINING', 3, 'PE', 'Master of Computer Applications', 9, 0, 0, 0, 7, '4.388', 32, 'This course is an indepth study of a broad range of topics and techniques in the areas of social media analytics, web mining and social network analysis.'),
('15MXBB', 'XML AND ITS APPLICATIONS', 3, 'PE', 'Master of Computer Applications', 7, 10, 0, 0, 4, '4.849', 71, 'This course provides information about Current XML application areas and uses. Indepth knowledge of XML based technology and its application. XML application areas and environments, use of XML on server side and databases, XML in .NET environment.'),
('15MXBC', 'SEMANTIC WEB TECHNOLOGIES', 3, 'PE', 'Master of Computer Applications', 10, 2, 0, 0, 1, '4.580', 70, 'This course aims to provide the basic overview of the Semantic Web in particular, and data semantics in general, and how they can be applied to enhance data integration and knowledge inference.'),
('15MXCA', 'MACHINE LEARNING', 3, 'PE', 'Master of Computer Applications', 4, 0, 8, 2, 9, '4.854', 86, 'This course will present an introduction to algorithms for machine learning and data mining.'),
('15MXCB', 'SOFT COMPUTING', 3, 'PE', 'Master of Computer Applications', 4, 0, 7, 5, 10, '4.030', 99, 'This course provides an introduction to the basic concepts of Soft Computing methodology and covers three main components Neural Networks, Fuzzy Logic, Genetic Algorithms. Etc'),
('15MXCC', 'ARTIFICIAL INTELLIGENCE', 3, 'PE', 'Master of Computer Applications', 6, 0, 7, 8, 9, '3.587', 11, 'Methods & techniques within the field of artificial intelligence, including problem solving and optimisation by search, representing and reasoning with uncertain knowledge and machine learning.'),
('15MXCD', 'BIOINFORMATICS', 3, 'PE', 'Master of Computer Applications', 8, 0, 0, 0, 2, '3.844', 25, 'This course exposes students to the basic principles of bioinformatics and computational biology.'),
('15MXCE', 'EVOLUTIONARY COMPUTATION', 3, 'PE', 'Master of Computer Applications', 4, 0, 0, 2, 9, '4.960', 71, 'Computational systems inspired by natural evolution; natural and artificial evolution, evolutionary; chromosome representations; search operators; co-evolution; constraint handling techniques; niching and speciation; genetic programming; classifier systems and theoretical foundations; implementation of selected algorithms.'),
('15MXDA', 'ADVANCED DATABASE TECHNOLOGY', 3, 'PE', 'Master of Computer Applications', 7, 0, 8, 6, 1, '3.770', 17, 'This course provides a systematic approach with an in-depth analysis of advanced database areas as well as the basics of database management systems.'),
('15MXDB', 'INFORMATION STORAGE AND MANAGEMENT', 3, 'PE', 'Master of Computer Applications', 9, 0, 0, 0, 1, '4.967', 86, 'Information Storage and Management (ISM) is a unique course that provides a comprehensive understanding of the various storage infrastructure components in data center environments.'),
('15MXDC', 'GREEN COMPUTING', 3, '', 'Master of Computer Applications', 10, 0, 0, 0, 0, '4.026', 79, 'The course will cover emerging problems associated with the rapid growth in energy consumption of modern computing infrastructures, including data centers, and discuss recent research focused on mitigating these problems.'),
('15MXDD', 'MULTIDIMENSIONAL DATA STRUCTURES', 3, 'PE', 'Master of Computer Applications', 8, 0, 10, 6, 4, '4.729', 33, 'The course discusses advanced data structures: heaps, balanced binary search trees, hashing tables, red-black trees, B-trees and their variants, structures for disjoint sets, binomial heaps, Fibonacci heaps, finger trees, persistent data structures, etc. '),
('15MXDE', 'MULTI-CORE PROGRAMMING', 3, 'PE', 'Master of Computer Applications', 7, 0, 0, 2, 6, '3.567', 22, 'The course teaches both the architecture of modern multi-core/many-core processors and the parallel programming principles to exploit the computational power of multi-core/many-core processors.'),
('15MXDF', 'APPLIED GRAPH THEORY', 3, 'PE', 'Master of Computer Applications', 6, 1, 0, 5, 9, '4.100', 23, 'This course focuses on a graph algorithms. It provides basic concepts and facts from the graph theory and algorithms for solving different problems on graphs.'),
('15MXDG', 'COMPUTER GRAPHICS', 3, 'PE', 'Master of Computer Applications', 8, 0, 0, 2, 8, '3.750', 12, 'This course provides a comprehensive introduction to computer graphics modeling, animation, and rendering. Topics covered include basic image processing, geometric transformations, geometric modeling of curves and surfaces'),
('15MXDH', 'OPEN SOURCE SYSTEMS', 3, 'PE', 'Master of Computer Applications', 8, 9, 0, 2, 0, '4.220', 37, 'This course will cover the fundamentals of Free and Open Source software development.'),
('15MXDI', 'HUMAN COMPUTER INTERACTION', 3, 'PE', 'Master of Computer Applications', 10, 0, 0, 5, 0, '4.550', 26, 'This course teaches the theory, design procedure, and programming practices behind effective human interaction with computers.'),
('15MXDJ', 'DESIGN PATTERNS', 3, 'PE', 'Master of Computer Applications', 8, 0, 1, 3, 4, '4.020', 7, 'This course is an introduction to software design patterns. The course covers the rationale and benefits of object-oriented software design patterns.'),
('15MXDK', 'GAMES ENGINEERING', 3, 'PE', 'Master of Computer Applications', 8, 3, 0, 3, 1, '4.320', 5, 'This course is an introduction to the fundamentals of game theory and mechanism design. The course emphasizes theoretical foundations, mathematical tools, modeling, and equilibrium notions in different environments.'),
('15MXDL', 'BIG DATA ANALYTICS', 3, 'PE', 'Master of Computer Applications', 4, 0, 7, 5, 8, '4.420', 31, 'This course is an overview course in Data Science and covers the applications and technologies (data analytics and clouds) needed to process the application data.'),
('15MXDM', 'DATA ANALYTICS', 3, 'PE', 'Master of Computer Applications', 5, 0, 8, 5, 9, '4.320', 21, 'This course seeks to present you with a wide range of data analytic techniques and is structured around the broad contours of the different types of data analytics.'),
('15MXDN', 'INTERNET OF THINGS', 3, 'PE', 'Master of Computer Applications', 8, 2, 2, 3, 1, '4.250', 32, 'This course considers at the Internet of Things (IoT) as the general theme of real  world things becoming increasingly visible and actionable via Internet and Web technologies.'),
('15MXDO', 'SOFTWARE PROJECT MANAGEMENT', 3, 'PE', 'Master of Computer Applications', 9, 0, 2, 0, 0, '3.890', 11, 'This course deals with the Principles of software project management, metrics, cost estimation, software project planning, organizing, resource allocation, directing and controlling, riskmanagement, software configuration management, role of standards,management tools etc.'),
('15MXEA', 'KNOWLEDGE MANAGEMENT', 3, 'PE', 'Master of Computer Applications', 9, 0, 1, 0, 1, '4.310', 25, 'This course addresses contemporary issues in managing knowledge, intellectual capital and other intangible assets.'),
('15MXEB', 'PRINCIPLES OF MANAGEMENT', 3, 'PE', 'Master of Computer Applications', 9, 0, 0, 5, 1, '4.050', 3, 'This course introduces students to the theories, concepts and terminology of the discipline of organizational behavior.'),
('15MXEC', 'ACCOUNTING AND FINANCIAL MANAGEMENT', 3, 'PE', 'Master of Computer Applications', 8, 0, 0, 0, 4, '3.880', 2, 'It aims to provide an understanding of the main accounting concepts and the practical use of accounting and financial information for decision making and the achievement of business goals.'),
('15MXED', 'ENTREPRENEURSHIP', 3, 'PE', 'Master of Computer Applications', 8, 0, 0, 2, 3, '4.180', 10, 'This course is designed to help students evaluate the business skills and commitment necessary to successfully operate an entrepreneurial venture and review the challenges and rewards of entrepreneurship.'),
('15MXFA', 'TEXT MINING', 3, 'PE', 'Master of Computer Applications', 9, 2, 1, 3, 6, '4.300', 6, 'This course will cover the major techniques for mining and analyzing text data to discover interesting patterns, extract useful knowledge, and support decision making.'),
('15MXFB', 'INTELLIGENT INFORMATION RETRIEVAL', 3, 'PE', 'Master of Computer Applications', 9, 2, 0, 6, 3, '4.330', 15, 'This course will examine the design, implementation, and evaluation of information retrieval systems.'),
('15MXGA', 'NUMERICAL METHODS', 3, 'PE', 'Master of Computer Applications', 6, 0, 2, 5, 10, '4.440', 23, 'This course provides an introduction to basic numerical methods for the solution of a number of classes of scientific problems.'),
('15MXGB', 'APPLIED  MATHEMATICAL MODELING', 3, 'PE', 'Master of Computer Applications', 5, 0, 0, 2, 10, '3.750', 2, 'The course will include seminars in which modeling issues are discussed, lectures to provide mathematical background, and computational experiments.');

-- --------------------------------------------------------

--
-- Table structure for table `coursetaken`
--

DROP TABLE IF EXISTS `coursetaken`;
CREATE TABLE IF NOT EXISTS `coursetaken` (
  `RollNo` varchar(32) NOT NULL,
  `CourseCode` varchar(32) NOT NULL,
  `MonthYear` varchar(32) NOT NULL,
  `GradePoints` int(11) NOT NULL,
  `Grade` varchar(10) NOT NULL,
  `Semester` int(11) NOT NULL,
  `RealCourseCode` varchar(50) NOT NULL,
  PRIMARY KEY (`RollNo`,`CourseCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetaken`
--

INSERT INTO `coursetaken` (`RollNo`, `CourseCode`, `MonthYear`, `GradePoints`, `Grade`, `Semester`, `RealCourseCode`) VALUES
('15MX05', '14MX11', 'Dec2015', 7, 'C', 1, '15MX11'),
('15MX05', '14MX12', 'Dec2015', 9, 'A', 1, '15MX12'),
('15MX05', '14MX13', 'Dec2015', 7, 'C', 1, '15MX13'),
('15MX05', '14MX14', 'Dec2015', 6, 'D', 1, '15MX14'),
('15MX05', '14MX15', 'Dec2015', 7, 'C', 1, '15MX15'),
('15MX05', '14MX21', 'Dec2015', 8, 'B', 2, '15MX21'),
('15MX05', '14MX23', 'Dec2015', 9, 'A', 2, '15MX23'),
('15MX05', '14MX24', 'Dec2015', 7, 'C', 2, '15MX24'),
('15MX05', '14MX25', 'Dec2015', 7, 'C', 2, '15MX25'),
('15MX05', '14MX22', 'Dec2015', 7, 'C', 2, '15MX22'),
('15MX09', '14MX22', 'Dec2015', 7, 'C', 2, '15MX22'),
('15MX09', '14MX25', 'Dec2015', 8, 'B', 2, '15MX25'),
('15MX09', '14MX24', 'Dec2015', 7, 'C', 2, '15MX24'),
('15MX09', '14MX23', 'Dec2015', 8, 'B', 2, '15MX23'),
('15MX09', '14MX21', 'Dec2015', 8, 'B', 2, '15MX21'),
('15MX09', '14MX15', 'Dec2015', 6, 'D', 1, '15MX15'),
('15MX09', '14MX14', 'Dec2015', 9, 'A', 1, '15MX15'),
('15MX09', '14MX13', 'Dec2015', 8, 'B', 1, '15MX13'),
('15MX09', '14MX12', 'Dec2015', 9, 'A', 1, '15MX12'),
('15MX09', '14MX11', 'Dec2015', 7, 'C', 1, '15MX11'),
('15MX05', '14MX31', 'Nov2016', 8, 'B', 3, '15MX31'),
('15MX05', '14MX32', 'Nov2016', 9, 'A', 3, '15MX32'),
('15MX05', '14MX33', 'Nov2016', 7, 'C', 3, '15MX33'),
('15MX05', '14MX34', 'Nov2016', 6, 'D', 3, '15MX34'),
('15MX05', '14MXAA', 'Nov2016', 9, 'A', 3, '15MXAA'),
('15MX05', '14MX41', 'May2017', 8, 'B', 4, '15MX41'),
('15MX05', '14MX42', 'May2017', 9, 'A', 4, '15MX42'),
('15MX05', '14MX43', 'May2017', 7, 'C', 4, '15MX43'),
('15MX05', '14MXDD', 'May2017', 7, 'C', 4, '15MXDD'),
('15MX05', '14MXCC', 'May2017', 7, 'C', 4, '15MXCC');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `deptid` varchar(10) NOT NULL,
  `deptname` varchar(60) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `deptname`) VALUES
('MX', 'Master of Computer Applications'),
('I', 'B.E.Electrical and Electronics Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `generaldetails`
--

DROP TABLE IF EXISTS `generaldetails`;
CREATE TABLE IF NOT EXISTS `generaldetails` (
  `RollNo` varchar(15) NOT NULL,
  `CurrentSem` int(11) NOT NULL,
  `CGPA` double NOT NULL,
  `SelectCourse` int(11) NOT NULL,
  PRIMARY KEY (`RollNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generaldetails`
--

INSERT INTO `generaldetails` (`RollNo`, `CurrentSem`, `CGPA`, `SelectCourse`) VALUES
('15MX13', 5, 9.81, 0),
('15MX05', 5, 8.11, 0),
('15MX09', 5, 7.91, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prerequirement`
--

DROP TABLE IF EXISTS `prerequirement`;
CREATE TABLE IF NOT EXISTS `prerequirement` (
  `CourseCode` varchar(20) NOT NULL,
  `Prerequisite` varchar(20) NOT NULL,
  PRIMARY KEY (`CourseCode`,`Prerequisite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequirement`
--

INSERT INTO `prerequirement` (`CourseCode`, `Prerequisite`) VALUES
('15MXCB', '15MX11'),
('15MXCB', '15MX21'),
('15MXDA', '15MX24'),
('15MXDL', '15MX11'),
('15MXDL', '15MX21'),
('15MXDM', '15MX11'),
('15MXDM', '15MX21'),
('15MXDN', '15MX15');

-- --------------------------------------------------------

--
-- Table structure for table `selectedcourse`
--

DROP TABLE IF EXISTS `selectedcourse`;
CREATE TABLE IF NOT EXISTS `selectedcourse` (
  `RollNo` varchar(20) NOT NULL,
  `CourseCode` varchar(20) NOT NULL,
  `Sem` int(11) NOT NULL,
  PRIMARY KEY (`RollNo`,`CourseCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selectedcourse`
--

INSERT INTO `selectedcourse` (`RollNo`, `CourseCode`, `Sem`) VALUES
('15MX05', '15MXDJ', 5),
('15MX05', '15MXAG', 5),
('15MX05', '15MXDM', 5),
('15MX05', '15MXAB', 5),
('15MX05', '15MXDL', 5);

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

DROP TABLE IF EXISTS `studentdetails`;
CREATE TABLE IF NOT EXISTS `studentdetails` (
  `RollNo` varchar(15) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Dept` varchar(60) NOT NULL,
  `Program` varchar(60) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `MobileParent` varchar(15) NOT NULL,
  `MobileStudent` varchar(15) NOT NULL,
  `Address` varchar(1024) NOT NULL,
  `ResStatus` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Active` int(11) NOT NULL,
  `ImageFile` varchar(100) NOT NULL,
  `Email` varchar(60) NOT NULL,
  PRIMARY KEY (`RollNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`RollNo`, `FirstName`, `LastName`, `Dept`, `Program`, `DateOfBirth`, `BloodGroup`, `MobileParent`, `MobileStudent`, `Address`, `ResStatus`, `Password`, `Active`, `ImageFile`, `Email`) VALUES
('15MX13', 'Hewitt', 'V S', 'Computer Applications', 'Master of Computer Application', '1993-05-24', 'A+', '9442761471', '9940836520', 'Chothi Vilai,Payanam,\r\nUnnamalaikadai Post\r\nKanyakumari District-629179', 'Day Scholar', '24may93', 1, '14670890_10205553538237729_8672416322455407822_n.jpg', 'hewittvs@gmail.com'),
('15MX05', 'Augustine', 'Vijay', 'Computer Applications', 'Master of Computer Application', '1994-05-27', 'A-', '9447586566', '9944290406', 'Sowripalayam,\r\nCoimbatore-621004', 'Day Scholar', '27may94', 1, '14670890_10205553538237729_8672416322455507822_n.jpg', 'vijay.augustine@gmail.com'),
('15MX02', 'Abdul', 'Rahim', 'Computer Applications', 'MCA', '1994-02-18', 'O-', '9897654978', '9097546721', '144, Rangasamy Layout, Erode', 'Day scholar', '18feb94', 0, '', ''),
('15MX04', 'Arun', 'Kumar', 'Computer Applications', 'MCA', '1993-06-20', 'O+', '888778904', '987698765', '22, Indira nagar, Ondipudur, Coimbatore', 'Day Scholar', '20jun93', 0, '', ''),
('15MX09', 'Dinesh', 'K', 'Computer Applications', 'MCA', '1994-03-28', 'B+', '8978656781', '9976658912', '9/7, Ramasamy Street, Solaganpettai, Ramanathapuram', 'Day Scholar', 'dinesh', 1, '14670890_10205553538237729_86724163211455407822_n.jpg', 'dinesh@gmail.com'),
('15MX10', 'Ganesan', 'R', 'Computer Applications', 'MCA', '1995-08-30', 'B+', '9786859832', '8796453245', '31, SNR Street No-2, Kamarajar Street, Rajapalayam', 'Day Scholar', '30aug1995', 0, '', ''),
('15MX16', 'Karthik', 'M', 'Computer Applications', 'MCA', '1995-08-15', 'O-', '7895678935', '9600405678', '28, Ashok Nagar, Madurai', 'Day Scholar', '15aug1995', 0, '', ''),
('15MX17', 'Keerthivasan', 'Dharmar', 'Computer Applications', 'MCA', '1994-06-21', 'AB+', '9098907651', '9800760052', '100/110, Karunanithi Street, Ondipudur, Coimbatore', 'Day Scholar', '21jun1994', 0, '', ''),
('15MX18', 'Kishore', 'Kanna', 'Computer Applications', 'MCA', '1994-09-12', 'AB-', '8976895423', '7896543560', '87, Jothivalai Street, Hopes, Coimbatore ', 'Day Scholar', '12sept1994', 0, '', ''),
('15MX19', 'Mathayan', 'M', 'Computer Applications', 'MCA', '1994-12-28', 'AB-', '9098767890', '8789690788', '98,Bannari amman Street, Puliakulam, Coimbatore', 'Day Scholar', '28dec1994', 0, '', ''),
('15MX20', 'Palanisamy', 'P', 'Computer Applications', 'MCA', '1994-06-26', 'A+', '9908978689', '8877898756', '45,Annamalai Nagar, Sivakasi', 'Day Scholar', '26jun1994', 0, '', ''),
('15MX21', 'Parameswaran', 'S', 'Computer Applications', 'MCA', '1994-10-11', 'A-', '9988789421', '7656700213', '56-A, Sethupathi Layout, Sivakasi', 'Day Scholar', '11oct1994', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentsettings`
--

DROP TABLE IF EXISTS `studentsettings`;
CREATE TABLE IF NOT EXISTS `studentsettings` (
  `RollNo` varchar(50) NOT NULL,
  `Theory` int(11) NOT NULL,
  `Programming` int(11) NOT NULL,
  `Placement` int(11) NOT NULL,
  `Prerequisite` int(11) NOT NULL,
  `Problematic` int(11) NOT NULL,
  PRIMARY KEY (`RollNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsettings`
--

INSERT INTO `studentsettings` (`RollNo`, `Theory`, `Programming`, `Placement`, `Prerequisite`, `Problematic`) VALUES
('15MX13', 28, 98, 29, 26, 21),
('15MX05', 79, 52, 67, 43, 65),
('15MX09', 60, 40, 15, 69, 37);

-- --------------------------------------------------------

--
-- Table structure for table `studentsummary`
--

DROP TABLE IF EXISTS `studentsummary`;
CREATE TABLE IF NOT EXISTS `studentsummary` (
  `RollNo` varchar(15) NOT NULL,
  `Program` varchar(70) NOT NULL,
  `Sem` varchar(10) NOT NULL,
  `TotalGP` int(11) NOT NULL,
  `ScoredGP` int(11) NOT NULL,
  `GPA` double NOT NULL,
  PRIMARY KEY (`RollNo`,`Sem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsummary`
--

INSERT INTO `studentsummary` (`RollNo`, `Program`, `Sem`, `TotalGP`, `ScoredGP`, `GPA`) VALUES
('15MX13', 'Master of Computer Application', 'I', 230, 230, 10),
('15MX13', 'Master of Computer Application', 'II', 220, 218, 9.9),
('15MX13', 'Master of Computer Application', 'III', 220, 216, 9.86),
('15MX13', 'Master of Computer Application', 'IV', 220, 209, 9.53),
('15MX05', 'Master of Computer Application', 'I', 230, 184, 8),
('15MX05', 'Master of Computer Application', 'II', 220, 186, 8.12),
('15MX05', 'Master of Computer Application', 'III', 220, 189, 8.35),
('15MX05', 'Master of Computer Application', 'IV', 220, 185, 8.05),
('15MX09', 'Master of Computer Application', 'I', 230, 190, 7.25),
('15MX09', 'Master of Computer Application', 'II', 220, 200, 8.9),
('15MX09', 'Master of Computer Application', 'III', 220, 179, 7),
('15MX09', 'Master of Computer Application', 'IV', 220, 187, 8.23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `rollno` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`rollno`, `password`, `email`, `firstname`, `lastname`) VALUES
('15mx13', '24may93', 'hewittvs@gmail.com', 'Hewitt', 'Vijayan'),
('15mx05', '24may93', 'vijay.augustine@gmail.com', 'Augustine', 'Vijay');

-- --------------------------------------------------------

--
-- Table structure for table `userrating`
--

DROP TABLE IF EXISTS `userrating`;
CREATE TABLE IF NOT EXISTS `userrating` (
  `RollNo` varchar(15) NOT NULL,
  `CourseCode` varchar(15) NOT NULL,
  `Rating` int(11) NOT NULL,
  PRIMARY KEY (`RollNo`,`CourseCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrating`
--

INSERT INTO `userrating` (`RollNo`, `CourseCode`, `Rating`) VALUES
('15MX05', '15MXDD', 5),
('15MX05', '15MXAA', 5);

--
-- Triggers `userrating`
--
DROP TRIGGER IF EXISTS `updrate`;
DELIMITER $$
CREATE TRIGGER `updrate` AFTER INSERT ON `userrating` FOR EACH ROW UPDATE coursedetails set Rating=(Rating*TotalVotes+NEW.Rating)/(TotalVotes+1),TotalVotes=TotalVotes+1 where CourseCode=NEW.CourseCode
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userreviews`
--

DROP TABLE IF EXISTS `userreviews`;
CREATE TABLE IF NOT EXISTS `userreviews` (
  `RollNo` varchar(15) NOT NULL,
  `CourseCode` varchar(15) NOT NULL,
  `Comment` text NOT NULL,
  `TimeOfComment` varchar(30) NOT NULL,
  PRIMARY KEY (`RollNo`,`CourseCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userreviews`
--

INSERT INTO `userreviews` (`RollNo`, `CourseCode`, `Comment`, `TimeOfComment`) VALUES
('15MX05', '15MXDD', 'If you are serious about placements you need to take this course. I will help you in lot more ways. ', '31-Jun-2017 18:56:22'),
('15MX05', '15MXAA', 'This is the best course If you are into networking.', '19-Oct-2017 06:49:07'),
('15MX09', '15MXDD', 'This course helped me to get a refresh on Data Structures. Worth it if you are opting for placements.', '3-Sept-2017 15:23:26'),
('15MX09', '15MXDI', 'Right course if you are into designing UI for applications', '16-Oct-2017 12:56:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
