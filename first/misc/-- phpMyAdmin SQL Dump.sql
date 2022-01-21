-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 03:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `thedencontacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--
-- Creation: Nov 24, 2021 at 08:49 AM
--

CREATE TABLE `bookings` (
  `bk_id` int(11) NOT NULL,
  `bk_date` int(11) NOT NULL,
  `bk_timeslot` int(11) NOT NULL,
  `bk_slot` int(11) NOT NULL,
  `bk_group` varchar(15) NOT NULL,
  `bk_session` varchar(15) NOT NULL,
  `bk_name` varchar(25) NOT NULL,
  `bk_email` text NOT NULL,
  `bk_subject` varchar(15) NOT NULL,
  `bk_notes` text NOT NULL,
  `bk_confirmed` text NOT NULL DEFAULT 'N',
  `bk_invoiced` text NOT NULL DEFAULT 'N',
  `bk_taught` text NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `bookings`:
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--
-- Creation: Nov 24, 2021 at 09:16 AM
--

CREATE TABLE `enquiries` (
  `en_uid` int(11) NOT NULL,
  `en_name` text NOT NULL,
  `en_mail` text NOT NULL,
  `en_learnerName` text NOT NULL,
  `en_contactPref` text NOT NULL,
  `en_subject` text NOT NULL,
  `en_notes` text NOT NULL,
  `en_openQuery` text NOT NULL DEFAULT 'Y',
  `en_shareOfsted` text NOT NULL DEFAULT 'N',
  `en_evidence` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `enquiries`:
--


-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`en_uid`);


-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `en_uid` int(11) NOT NULL AUTO_INCREMENT;

