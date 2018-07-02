-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2018 at 03:09 AM
-- Server version: 5.5.42
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hssite`
--

-- --------------------------------------------------------

--
-- Table structure for table `up_manu`
--

CREATE TABLE `up_manu` (
  `id` int(11) NOT NULL,
  `status` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_manu`
--

INSERT INTO `up_manu` (`id`, `status`) VALUES
(1, 'inativo');

-- --------------------------------------------------------

--
-- Table structure for table `up_menu`
--

CREATE TABLE `up_menu` (
  `id` int(11) NOT NULL,
  `categoria` text
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_menu`
--

INSERT INTO `up_menu` (`id`, `categoria`) VALUES
(4, 'teste1'),
(5, 'teste2');

-- --------------------------------------------------------

--
-- Table structure for table `up_page`
--

CREATE TABLE `up_page` (
  `id` int(11) NOT NULL,
  `pagina` text,
  `content` text
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_page`
--

INSERT INTO `up_page` (`id`, `pagina`, `content`) VALUES
(4, 'pagina', 'teste');

-- --------------------------------------------------------

--
-- Table structure for table `up_posts`
--

CREATE TABLE `up_posts` (
  `id` int(11) NOT NULL,
  `thumb` text,
  `titulo` text,
  `texto` text,
  `categoria` text,
  `data` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `autor` text,
  `valor_real` text,
  `valor_pagseguro` text,
  `visitas` varchar(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_users`
--

CREATE TABLE `up_users` (
  `id` int(11) NOT NULL,
  `usuario` text,
  `senha` text,
  `nivel` text,
  `nome` text,
  `email` text
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_users`
--

INSERT INTO `up_users` (`id`, `usuario`, `senha`, `nivel`, `nome`, `email`) VALUES
(1, 'admin', '12345', 'admin', 'Robson V. Leite 2', 'altere-sua-senha@haquer.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `up_manu`
--
ALTER TABLE `up_manu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_menu`
--
ALTER TABLE `up_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_page`
--
ALTER TABLE `up_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_posts`
--
ALTER TABLE `up_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_users`
--
ALTER TABLE `up_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `up_manu`
--
ALTER TABLE `up_manu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `up_menu`
--
ALTER TABLE `up_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `up_page`
--
ALTER TABLE `up_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `up_posts`
--
ALTER TABLE `up_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `up_users`
--
ALTER TABLE `up_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;