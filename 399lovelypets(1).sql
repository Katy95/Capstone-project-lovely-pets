-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 09:39 AM
-- Server version: 5.7.19-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `399lovelypets`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` varchar(45) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `AppointmentDate` date NOT NULL,
  `CustomerID` varchar(45) NOT NULL,
  `ClinicID` varchar(45) NOT NULL,
  `DoctorID` varchar(45) NOT NULL,
  `AppointmentDescription` varchar(45) NOT NULL,
  `PetID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `starttime`, `endtime`, `AppointmentDate`, `CustomerID`, `ClinicID`, `DoctorID`, `AppointmentDescription`, `PetID`) VALUES
('A10', '2017-09-21 10:00:00', '2017-09-21 13:00:00', '2017-09-21', 'Cu01', 'Cl1', 'D1', '', 'P01'),
('A11', '2017-09-13 09:00:00', '2017-09-13 10:00:00', '2017-09-13', 'Cu01', 'Cl1', 'D1', '', 'P02'),
('A12', '2017-09-22 10:00:00', '2017-09-22 13:00:00', '2017-09-22', 'Cu02', 'Cl4', 'D2', 'No special needs', 'P03'),
('A13', '2017-10-03 00:00:00', '2017-10-03 00:00:00', '2017-10-03', 'Cu02', 'Cl3', 'D4', '666666', 'P04'),
('A14', '2017-10-09 07:00:00', '2017-10-09 10:00:00', '2017-10-09', 'Cu01', 'Cl1', 'D1', '123', 'P01'),
('A15', '2017-11-17 17:00:00', '2017-11-17 18:00:00', '2017-11-17', 'Cu11', 'Cl5', 'D2', '', 'P15'),
('A16', '2017-10-28 00:00:00', '2017-10-28 00:00:00', '2017-10-28', 'Cu01', 'Cl2', 'D3', '', 'P01'),
('A17', '2017-10-28 00:00:00', '2017-10-28 00:00:00', '2017-10-28', 'Cu01', 'Cl1', 'D1', '', 'P01'),
('A18', '2017-10-28 00:00:00', '2017-10-28 00:00:00', '2017-10-28', 'Cu01', 'Cl4', 'D1', '', 'P01'),
('A19', '2017-10-28 16:00:00', '2017-10-28 17:00:00', '2017-10-28', 'Cu01', 'Cl1', 'D7', '', 'P01'),
('A2', '2017-09-05 06:00:00', '2017-09-05 08:00:00', '2017-09-05', 'Cu01', 'Cl4', 'D4', 'Will be late', 'P05'),
('A20', '2017-11-08 15:30:00', '2017-11-08 16:00:00', '2017-11-08', 'Cu09', 'Cl2', 'D6', '', 'P01'),
('A21', '2017-11-08 16:00:00', '2017-11-08 16:30:00', '2017-11-08', 'Cu02', 'Cl2', 'D5', '', 'P08'),
('A3', '2017-08-28 16:00:00', '2017-08-28 16:30:00', '2017-08-28', 'Cu05', 'Cl1', 'D2', 'Null', 'P06'),
('A4', '2017-09-06 08:00:00', '2017-09-06 10:00:00', '2017-09-06', 'Cu06', 'Cl5', 'D5', 'The pet is young', 'P07'),
('A5', '2017-08-28 12:00:00', '2017-08-28 14:00:00', '2017-08-28', 'Cu04', 'Cl3', 'D3', 'Null', 'P08'),
('A6', '2017-08-28 15:00:00', '2017-08-28 16:00:00', '2017-08-28', 'Cu02', 'Cl2', 'D1', 'Old customer', 'P09'),
('A7', '2017-09-13 08:00:00', '2017-09-13 10:00:00', '2017-09-13', 'Cu02', 'Cl4', 'D4', '', 'P01'),
('A8', '2017-09-06 17:00:00', '2017-09-06 19:00:00', '2017-09-06', 'Cu01', 'Cl3', 'D3', '', 'P02'),
('A9', '2017-09-05 09:00:00', '2017-09-05 10:00:00', '2017-09-05', 'Cu02', 'Cl4', 'D3', '', 'P04');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `ClinicID` varchar(11) NOT NULL,
  `ClinicName` varchar(45) NOT NULL,
  `ClinicLocation` varchar(45) NOT NULL,
  `OpenTime` time NOT NULL,
  `CloseTime` time NOT NULL,
  `ClinicPhoneNumber` bigint(20) NOT NULL,
  `ClinicEmail` varchar(45) DEFAULT NULL,
  `ClinicEmergencyContact` varchar(45) NOT NULL,
  `ClinicDescription` varchar(500) DEFAULT NULL,
  `ClinicPhoto` varchar(255) DEFAULT NULL,
  `AddressLink` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`ClinicID`, `ClinicName`, `ClinicLocation`, `OpenTime`, `CloseTime`, `ClinicPhoneNumber`, `ClinicEmail`, `ClinicEmergencyContact`, `ClinicDescription`, `ClinicPhoto`, `AddressLink`) VALUES
('Cl1', 'Eastern Vet Clinic', '241 Adelaide Street, Brisbane City, Australia', '07:00:00', '16:30:00', 1826192390, 'EasternClinic@vet.com', '1898328923', 'Eastern Vet Clinic is the first vet clinic in the lovely pet clinic chains. It was set in 2016.', 'pic/clinicphoto/eastern_clinic.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.07437896164!2d153.0253134144059!3d-27.466943682892083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a1cd8869d81%3A0x5d884da15e485787!2s241+Adelaide+St%2C+Brisbane+City+QLD+4000!5e0!3m2!1sen!2sau!4v1508757487345'),
('Cl2', 'Southern Vet Clinic', '189 Grey St, South Brisbane QLD, Australia', '07:00:00', '19:00:00', 4235345434, 'SouthernClinic@vet.com', '1821837322', 'Southern Vet Clinic is the second vet clinic in the lovely pet clinic chains. It was set in 2015.', 'pic/clinicphoto/southern_clinic.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.6505529860015!2d153.02001961440627!3d-27.48013648288653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a0c3cf93c41%3A0x5866e4cedf7bd465!2sSwann+Insurance+PTY+Ltd.!5e0!3m2!1sen!2sau!4v1507458133760'),
('Cl3', 'Western Vet Clinic', '7 Camford St, Milton QLD, Australia', '07:00:00', '19:00:00', 4232312313, 'WesternClinic@vet.com', '1821831202', 'Western Vet Clinic is opened in 2015 and is the third clinic in lovely pet clinics chain.', 'pic/clinicphoto/western_clinic.jpg\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.904740026464!2d152.99925711440608!3d-27.47222488288984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b9150bae06aba61%3A0x6133fdc41243409b!2s7+Camford+St%2C+Milton+QLD+4064!5e0!3m2!1sen!2sau!4v1507458426973'),
('Cl4', 'Northern Vet Clinic', '40 Bega St, Grange QLD, Australia', '07:00:00', '19:00:00', 4242121323, 'NorthernClinic@vet.com', '1812312321', 'Northern Vet Clinic is the 4th clinic in lovely pet clinics chain. It was set in 2016', 'pic/clinicphoto/northern_clinic.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3541.5786079719715!2d153.01460211440462!3d-27.42007298291174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b9159d517a95ea1%3A0x26f5aa90ab7d7caf!2s40+Bega+St%2C+Grange+QLD+4051!5e0!3m2!1sen!2sau!4v1507458934411'),
('Cl5', 'Centre Vet Clinic', '142 Albert St, Brisbane City QLD, Australia', '07:00:00', '19:00:00', 4232131231, 'CentreClinic@vet.com', '1812312312', 'Centre Vet Clinic is the latest vet clinic in clinics chain, which is built in January,2017', 'pic/clinicphoto/centre_clinic.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.951607989338!2d153.02397891440603!3d-27.470765882890472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a04ca730d21%3A0xae126e7ef98dc1b8!2s8+Ball+Pool+Club!5e0!3m2!1sen!2sau!4v1507459478579');

-- --------------------------------------------------------

--
-- Table structure for table `docschedule`
--

CREATE TABLE `docschedule` (
  `ClinicID` varchar(8) NOT NULL,
  `MondayM` varchar(50) NOT NULL,
  `MondayA` varchar(50) NOT NULL,
  `TuesdayM` varchar(50) NOT NULL,
  `TuesdayA` varchar(50) NOT NULL,
  `WednesdayM` varchar(50) NOT NULL,
  `WednesdayA` varchar(50) NOT NULL,
  `ThursdayM` varchar(50) NOT NULL,
  `ThursdayA` varchar(50) NOT NULL,
  `FridayM` varchar(50) NOT NULL,
  `FridayA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docschedule`
--

INSERT INTO `docschedule` (`ClinicID`, `MondayM`, `MondayA`, `TuesdayM`, `TuesdayA`, `WednesdayM`, `WednesdayA`, `ThursdayM`, `ThursdayA`, `FridayM`, `FridayA`) VALUES
('Cl1', 'Harry', 'Katy', 'Katy', 'Harry', 'Katy', 'Katy', 'Harry', 'Harry', 'Jerry', 'Jerry'),
('Cl2', 'Eric', '', '', '', '', '', '', '', '', ''),
('Cl3', '', '', '', '', '', '', '', '', '', ''),
('Cl4', '', '', '', '', '', '', '', '', '', ''),
('Cl5', 'Shirley', '', 'Shirley', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pen`
--

CREATE TABLE `pen` (
  `PenID` varchar(48) NOT NULL,
  `PenSize` varchar(45) NOT NULL,
  `PenUseCondition` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pen`
--

INSERT INTO `pen` (`PenID`, `PenSize`, `PenUseCondition`) VALUES
('Large01', 'Large', 'In use'),
('Large02', 'Large', 'Not in use'),
('Large03', 'Large', 'In use'),
('Large04', 'Large', 'In use'),
('Large05', 'Large', 'In use'),
('Large06', 'Large', 'Not in use'),
('Large07', 'Large', 'Not in use'),
('Large08', 'Large', 'Not in use'),
('Large09', 'Large', 'Not in use'),
('Large10', 'Large', 'Not in use'),
('Medium01', 'Medium', 'In use'),
('Medium02', 'Medium', 'In use'),
('Medium03', 'Medium', 'In use'),
('Medium04', 'Medium', 'In use'),
('Medium05', 'Medium', 'In use'),
('Medium06', 'Medium', 'In use'),
('Medium07', 'Medium', 'Not in use'),
('Medium08', 'Medium', 'Not in use'),
('Medium09', 'Medium', 'Not in use'),
('Medium10', 'Medium', 'Not in use'),
('Small01', 'Small', 'In use'),
('Small02', 'Small', 'In use'),
('Small03', 'Small', 'In use'),
('Small04', 'Small', 'In use'),
('Small05', 'Small', 'In use'),
('Small06', 'Small', 'Not in use'),
('Small07', 'Small', 'Not in use'),
('Small08', 'Small', 'Not in use'),
('Small09', 'Small', 'Not in use'),
('Small10', 'Small', 'Not in use');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PetID` varchar(10) NOT NULL,
  `PetName` varchar(45) NOT NULL,
  `PetAge` int(11) NOT NULL,
  `PetSpecies` varchar(45) NOT NULL,
  `PetGender` varchar(6) NOT NULL,
  `ClinicID` varchar(11) NOT NULL,
  `PetOwnerID` varchar(11) NOT NULL,
  `PetDescription` varchar(500) NOT NULL,
  `PenID` varchar(45) NOT NULL,
  `PetCondition` varchar(55) DEFAULT 'Waiting for treatment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PetID`, `PetName`, `PetAge`, `PetSpecies`, `PetGender`, `ClinicID`, `PetOwnerID`, `PetDescription`, `PenID`, `PetCondition`) VALUES
('P01', 'MiaoMiao', 3, 'Cat', 'Male', 'Cl2', 'Cu02', 'One leg of this pet is broken and it has the Penicillin Allergy.', 'Medium02', 'Service finished'),
('P02', 'WangWang', 2, 'Dog', 'Male', 'Cl5', 'Cu01', 'The eyes of this pet get hurt and it has no Penicillin Allergy.', 'Large01', 'Service finished'),
('P03', 'ZhiZhi', 1, 'Mouse', 'Female', 'Cl3', 'Cu05', 'The head of this pet get hurt and it has no Penicillin Allergy.', 'Small01', 'In service'),
('P04', 'YoYo', 6, 'Cat', 'Female', 'Cl1', 'Cu03', 'One eye of this pet get hurt and it has the Penicillin Allergy.', 'Medium01', 'Service finished'),
('P05', 'KiKi', 5, 'Dog', 'Male', 'Cl4', 'Cu04', 'The eyes of this pet got hurt and it has the Penicillin Allergy.', 'Large03', 'In service'),
('P06', 'JoJo', 4, 'Cat', 'Female', 'Cl3', 'Cu07', 'The legs of this pet get hurt and it has no Penicillin Allergy.', 'Medium03', 'Service finished'),
('P07', 'JoJo', 5, 'Dog', 'Female', 'Cl2', 'Cu06', 'The stomach of this pet is broken and it has the Penicillin Allergy.', 'Large04', 'Waiting for treatment'),
('P08', 'GiGi', 6, 'Rabbit', 'Male', 'Cl4', 'Cu08', 'The fur of this pet was dropped and it has the Penicillin Allergy.', 'Small02', 'In service'),
('P09', 'FtFt', 8, 'Cat', 'Male', 'Cl4', 'Cu09', 'The legs of this pet get hurt and it has no Penicillin Allergy.', 'Medium05', 'Waiting for treatment'),
('P10', 'RoRo', 2, 'Mouse', 'Female', 'Cl4', 'Cu10', 'The head of this pet get hurt and it has the Penicillin Allergy.', 'Small03', 'Waiting for treatment'),
('P11', 'NiNi', 1, 'Bird', 'Female', 'Cl5', 'Cu11', 'One leg of this pet get hurt and it has no Penicillin Allergy.', 'Small05', 'Waiting for treatment'),
('P12', 'SiSi', 3, 'Rabbit', 'Male', 'Cl2', 'Cu12', 'The fur of this pet has turned black and it has no Penicillin Allergy.', 'Small04', 'Waiting for treatment'),
('P13', 'QiQi', 5, 'Dog', 'Female', 'Cl2', 'Cu13', 'The eye of this pet get hurt and it has the Penicillin Allergy.', 'Medium06', 'Waiting for treatment'),
('P14', 'EiEi', 6, 'Dog', 'Female', 'Cl3', 'Cu14', 'The head of this pet get hurt and it has no Penicillin Allergy.', 'Large05', 'Waiting for treatment'),
('P15', 'ToTo', 9, 'Cat', 'Male', 'Cl1', 'Cu15', 'One ear of this pet get hurt and it has the Penicillin Allergy.', 'Medium04', 'Waiting for treatment'),
('P16', '47', 147, '147', 'female', 'Cl2', 'Cu01', '147rgy condition of this pet...', 'No', 'Waiting for treatment');

-- --------------------------------------------------------

--
-- Table structure for table `petowner`
--

CREATE TABLE `petowner` (
  `PetOwnerID` varchar(11) NOT NULL,
  `PetOwnerName` varchar(45) NOT NULL,
  `PetOwnerGender` varchar(11) DEFAULT NULL,
  `PetOwnerPhoneNumber` bigint(20) NOT NULL,
  `PetOwnerHomeAddress` varchar(400) NOT NULL,
  `PetOwnerEmailAddress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petowner`
--

INSERT INTO `petowner` (`PetOwnerID`, `PetOwnerName`, `PetOwnerGender`, `PetOwnerPhoneNumber`, `PetOwnerHomeAddress`, `PetOwnerEmailAddress`) VALUES
('Cu01', 'John Lee', 'Mr.', 4231232135, 'Unit 1501, East Street, Kelvin Grove, Queensland, Australia', 'Customer1@email.com'),
('Cu02', 'Hugh Jackman', 'Mr.', 2433242334, 'Unit 1301, West Street, Kelvin Grove, Queensland, Australia', 'Customer2@email.com'),
('Cu03', 'Jimmy', 'Mr.', 4351765328, 'Unit 1201, Centre Street, Kelvin Grove, Queensland, Australia', 'Customer3@email.com'),
('Cu04', 'Lisa Garcia', 'Mrs.', 2354353243, 'Unit 1401, North Street, Kelvin Grove, Queensland, Australia', 'Customer4@email.com'),
('Cu05', 'May Clark', 'Mrs.', 3242343242, 'Unit 1601, South Street, Kelvin Grove, Queensland, Australia', 'Customer5@email.com'),
('Cu06', 'Joe Smiths', 'Mr.', 4568153885, 'Unit 2101, Book Street, Kelvin Grove, Queensland, Australia', 'Customer06@email.com'),
('Cu07', 'Kate White', 'Mrs.', 1849835672, 'Unit 2301, Coffee Street, Kelvin Grove, Queensland, Australia', 'Customer07@email.com'),
('Cu08', 'Rose Job', 'Mrs.', 1548953765, 'Unit 2401, Tea Street, Kelvin Grove, Queensland, Australia', 'Customer08@email.com'),
('Cu09', 'Jack Black', 'Mr.', 7225689463, 'Unit 3401, Secret Street, Kelvin Grove, Queensland, Australia', 'Customer09@email.com'),
('Cu10', 'Pet Fate', 'Mr.', 8246597813, 'Unit 2501, Love Street, Kelvin Grove, Queensland, Australia', 'Customer10@email.com'),
('Cu11', 'Harry Potter', 'Mr.', 9875631852, 'Unit 2601, Question Street, Kelvin Grove, Queensland, Australia', 'Customer11@email.com'),
('Cu12', 'Lucy Black', 'Mrs.', 4857985641, 'Unit 2701, Google Street, Kelvin Grove, Queensland, Australia', 'Customer12@email.com'),
('Cu13', 'Nick Tasty', 'Mr.', 1234848151, 'Unit 2801, Mike Street, Kelvin Grove, Queensland, Australia', 'Customer13@email.com'),
('Cu14', 'Marry White', 'Mrs.', 7894538151, 'Unit 2901, Rod Street, Kelvin Grove, Queensland, Australia', 'Customer14@email.com'),
('Cu15', 'Amy Black', 'Mrs.', 1534898798, 'Unit 3001, Reed Street, Kelvin Grove, Queensland, Australia', 'Customer15@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(6) NOT NULL,
  `TreatmentCategory` varchar(55) CHARACTER SET utf8 NOT NULL,
  `TreatmentName` varchar(55) CHARACTER SET utf8 NOT NULL,
  `Amount` varchar(55) CHARACTER SET utf8 NOT NULL,
  `PetID` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ServiceID`, `TreatmentCategory`, `TreatmentName`, `Amount`, `PetID`) VALUES
(23, 'Surgery', 'Soft tissue surgery', '1', 'P02'),
(27, 'Surgery', 'Soft tissue surgery', '1', 'P04'),
(26, 'Wellness Exam', 'Parvovirus testing', '2', 'P04'),
(25, 'Care and beauty treatment', 'Fur dyeing', '1', 'P02'),
(24, 'Preventative treatment', 'Parasite preventative', '1', 'P02'),
(22, 'Wellness Exam', 'Dental examination', '1', 'P02'),
(28, 'Disease treatment', 'Foreign body removal', '1', 'P04'),
(29, 'Care and beauty treatment', 'Fur beauty', '1', 'P04'),
(30, 'Wellness Exam', 'Dental examination', '11', 'P11'),
(31, 'Wellness Exam', 'Dental examination', '1', 'P01'),
(32, 'Surgery', 'Soft tissue surgery', '1', 'P01'),
(33, 'Care and beauty treatment', 'Fur dyeing', '2', 'P01'),
(34, 'Wellness Exam', 'Dental examination', '1', 'P06'),
(36, 'Surgery', 'Soft tissue surgery', '2', 'P06'),
(39, 'Preventative treatment', 'Nutrition Counseling', '1', 'P06'),
(40, 'Preventative treatment', 'Growth removals', '6', 'P03'),
(41, 'Surgery', 'Growth removals', '3', 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(11) NOT NULL,
  `StaffPosition` varchar(45) NOT NULL,
  `StaffName` varchar(45) NOT NULL,
  `StaffGender` varchar(6) NOT NULL,
  `DateOfBirth` varchar(45) DEFAULT NULL,
  `WorkingClinicID` varchar(11) NOT NULL,
  `StaffAddress` varchar(70) DEFAULT NULL,
  `StaffPhoneNumber` bigint(20) DEFAULT NULL,
  `StaffEmail` varchar(45) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffPosition`, `StaffName`, `StaffGender`, `DateOfBirth`, `WorkingClinicID`, `StaffAddress`, `StaffPhoneNumber`, `StaffEmail`, `HireDate`, `Photo`) VALUES
('D1', 'Doctor', 'Harry', 'Male', '1990-09-04', 'Cl1', '115 Holmead Rd, Eight Mile Plains,Brisbane', 4362382123, 'Harry@gmail.com', '2017-09-03', 'pic/staffphoto/staff icon.png'),
('D2', 'Doctor', 'Leo', 'Male', '1970-3-15', 'Cl2', '6 Russel Street, West End, Brisbane', 4726377455, 'Philips@gmail.com', '2017-05-06', 'pic/staffphoto/staff icon1.png'),
('D3', 'Doctor', 'Eric', 'Male', '1981-1-27', 'Cl2', '172 Reddacliff Road, Kelvin Grove, Brisbane', 4573491705, 'Eric@gmail.com', '2016-03-09', 'pic/staffphoto/staff icon2.png'),
('D4', 'Doctor', 'Gray', 'Male', '1988-12-1', 'Cl2', '17 Victoria Road, Woolloongabba, Brisbane', 4827329212, 'Gray@gmail.com', '2017-06-08', 'pic/staffphoto/staff icon10.png'),
('D5', 'Doctor', 'Eric', 'Male', '1991-4-9', 'Cl2', '24 Lewis Street, Newstead, Brisbane', 4159825624, 'Sherry@gmail.com', '2016-02-25', 'pic/staffphoto/staff icon6.jpg'),
('D6', 'Doctor', 'Katy', 'Female', '2007-10-04', 'Cl1', '201 Alice Street, Brisbane', 451236523, 'Katy@gmail.com', '2017-10-04', NULL),
('D7', 'Doctor', 'Jerry', 'Male', '1998-10-01', 'Cl1', '123 Lovely Street, Brisbane', 461236548, 'Jerry@gmail.com', '2014-10-15', NULL),
('D8', 'Doctor', 'Shirley', 'Female', '1996-03-20', 'Cl5', '201 Alice Street, Brisbane, Australia', 15648962, 'shirley@gmail.com', '2012-10-23', NULL),
('M2', 'Manager', 'John', 'Male', '1985-5-1', 'Cl2', '61 Reddacliff Street, Newstead, Brisbane', 4827391705, 'John@gmail.com', '2015-01-30', 'pic/staffphoto/staff icon4.png'),
('M3', 'Manager', 'Mark', 'Male', '1987-11-11', 'Cl5', '157 Lewis Road, Woolloongabba, Brisbane', 4726382901, 'Mark@gmail.com', '2017-04-24', 'pic/staffphoto/staff icon7.png'),
('Sta1', 'Staff', 'Hobby', 'Male', '1993-12-3', 'Cl1', '187 Albert Street, Brisbane City', 4159829212, 'Hobby@gmail.com', '2016-05-03', 'pic/staffphoto/staff icon8.jpg'),
('Sta2', 'Staff', 'Leo', 'Male', '1993-12-05', 'Cl2', '157 Albert Street, Brisbane City', 456321578, 'Leo@gmail.com', '2017-09-13', 'pic/staffphoto/staff icon.png'),
('Sta4', 'Staff', 'ad', 'Female', '2017-10-02', 'Cl1', '231123', 3132213, '123@qwe', '2017-10-09', 'pic/staffphoto/staff icon11.png'),
('Sta9', 'Staff', 'Jack', 'Male', '1987-02-11', 'Cl1', '102 Alice Street, Brisbane City, QLD', 412930243, 'Jack@gmail.com', '2009-11-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` varchar(45) NOT NULL,
  `StaffID` varchar(45) NOT NULL,
  `CustomerID` varchar(45) NOT NULL,
  `TransactionDate` date NOT NULL,
  `TransactionCostOfService` varchar(45) NOT NULL,
  `TransactionTax` varchar(45) NOT NULL,
  `TransactionDescription` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `StaffID`, `CustomerID`, `TransactionDate`, `TransactionCostOfService`, `TransactionTax`, `TransactionDescription`) VALUES
('Tra1', 'St3', 'Cu2', '2015-12-06', '$150', '$12', 'Tret2, Tret6, Tret3'),
('Tra2', 'St5', 'Cu5', '2015-12-25', '$160', '$10', 'Tret5, Tret1'),
('Tra3', 'St4', 'Cu3', '2016-09-02', '$150', '$15', 'Tret3,Tret7'),
('Tra4', 'St2', 'Cu1', '2017-03-03', '$120', '$12', 'Tret2'),
('Tra5', 'St1', 'Cu4', '2017-09-24', '$110', '$11', 'Tret1,Tret2');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `TreatmentID` int(11) NOT NULL,
  `TreatmentName` varchar(45) NOT NULL,
  `TreatmentCategoryID` varchar(45) NOT NULL,
  `Price` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`TreatmentID`, `TreatmentName`, `TreatmentCategoryID`, `Price`) VALUES
(1, 'Dental examination', 'TC01', '30'),
(2, 'Soft tissue surgery', 'TC02', '30'),
(3, 'Allergy', 'TC01', '70'),
(4, 'Parvovirus testing', 'TC01', '70'),
(5, 'Parasite preventative', 'TC03', '60'),
(6, 'Flea and Tick Prevention', 'TC03', '55'),
(7, 'Nutrition Counseling', 'TC03', '72'),
(9, 'Fever', 'TC04', '80'),
(10, 'Fur cleaning', 'TC05', '50'),
(11, 'Spays and neuters', 'TC02', '30'),
(12, 'Fur beauty', 'TC05', '37'),
(13, 'Growth removals', 'TC02', '40'),
(14, 'Foreign body removal', 'TC02', '58'),
(15, 'Orthopedic', 'TC02', '97'),
(16, 'Nail trim', 'TC05', '120'),
(17, 'Fur dyeing', 'TC05', '88'),
(18, 'Dental Care', 'TC05', '105'),
(19, 'Flu', 'TC05', '75');

-- --------------------------------------------------------

--
-- Table structure for table `treatmentcategory`
--

CREATE TABLE `treatmentcategory` (
  `TreatmentCategoryID` varchar(45) CHARACTER SET utf8 NOT NULL,
  `TreatmentCategory` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatmentcategory`
--

INSERT INTO `treatmentcategory` (`TreatmentCategoryID`, `TreatmentCategory`) VALUES
('TC01', 'Wellness Exam'),
('TC02', 'Surgery'),
('TC03', 'Preventative treatment'),
('TC04', 'Disease treatment'),
('TC05', 'Care and beauty treatment');

-- --------------------------------------------------------

--
-- Table structure for table `treatmentrecord`
--

CREATE TABLE `treatmentrecord` (
  `TreatmentRecordID` int(11) NOT NULL,
  `RoomID` varchar(45) CHARACTER SET utf8 NOT NULL,
  `TreatmentStartTime` varchar(20) NOT NULL,
  `TreatmentDate` date NOT NULL,
  `TreatmentEndTime` varchar(20) DEFAULT NULL,
  `TreatmentEndDate` date DEFAULT NULL,
  `PetID` varchar(45) CHARACTER SET utf8 NOT NULL,
  `DoctorID` varchar(45) CHARACTER SET utf8 NOT NULL,
  `TreatmentProcessDescription` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `TreatmentResult` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `TreatmentResultDescription` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatmentrecord`
--

INSERT INTO `treatmentrecord` (`TreatmentRecordID`, `RoomID`, `TreatmentStartTime`, `TreatmentDate`, `TreatmentEndTime`, `TreatmentEndDate`, `PetID`, `DoctorID`, `TreatmentProcessDescription`, `TreatmentResult`, `TreatmentResultDescription`) VALUES
(7, 'B04', '11:00', '2017-09-27', '15:00', '2017-09-27', 'P04', 'D4', 'Ok', 'Success', 'Success'),
(15, 'B03', '10:00', '2017-08-28', '8:00', '2017-11-09', 'P06', 'D2', 'jhggfg', 'Success', 'If the treatment was failed, please describe the reason and write the future plan...'),
(10, 'B03', '12:00', '2017-09-21', '16:00', '2017-09-21', 'P01', 'D1', 'UWYEGDUYEGU', 'Success', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `userpassword`
--

CREATE TABLE `userpassword` (
  `UserID` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `Authority` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpassword`
--

INSERT INTO `userpassword` (`UserID`, `password`, `Authority`) VALUES
('Doctor', 'doctor1234', 'doctor'),
('Manager', 'manager1234', 'manager'),
('Owner', 'owner1234', 'owner'),
('Staff', 'staff1234', 'staff'),
('Sunny', '12345678', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`ClinicID`);

--
-- Indexes for table `docschedule`
--
ALTER TABLE `docschedule`
  ADD PRIMARY KEY (`ClinicID`);

--
-- Indexes for table `pen`
--
ALTER TABLE `pen`
  ADD PRIMARY KEY (`PenID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `PetOwnerID` (`ClinicID`),
  ADD KEY `PetOwnerID_2` (`PetOwnerID`),
  ADD KEY `PenID` (`PenID`);

--
-- Indexes for table `petowner`
--
ALTER TABLE `petowner`
  ADD PRIMARY KEY (`PetOwnerID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`),
  ADD KEY `PetID` (`PetID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `WorkingClinicID` (`WorkingClinicID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`TreatmentID`),
  ADD KEY `TreatmentCategoryID` (`TreatmentCategoryID`);

--
-- Indexes for table `treatmentcategory`
--
ALTER TABLE `treatmentcategory`
  ADD PRIMARY KEY (`TreatmentCategoryID`);

--
-- Indexes for table `treatmentrecord`
--
ALTER TABLE `treatmentrecord`
  ADD PRIMARY KEY (`TreatmentRecordID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `PetID` (`PetID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `userpassword`
--
ALTER TABLE `userpassword`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `TreatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `treatmentrecord`
--
ALTER TABLE `treatmentrecord`
  MODIFY `TreatmentRecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
