-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 19 apr, 2011 at 12:41 AM
-- Versione MySQL: 5.1.44
-- Versione PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sciclub_dev`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `TITLE` (`title`),
  KEY `PUBLISHED` (`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `languages`
--

INSERT INTO `languages` VALUES(1, 'Italiano', 'it', 'it', 1, '2011-02-14 23:39:48', '2011-02-14 23:40:17');
INSERT INTO `languages` VALUES(2, 'Inglese', 'en', 'en', 1, '2011-02-14 23:40:01', '2011-02-14 23:40:01');

-- --------------------------------------------------------

--
-- Struttura della tabella `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(36) DEFAULT NULL,
  `foreign_key` varchar(36) DEFAULT NULL,
  `model` varchar(255) NOT NULL,
  `record_count` int(11) DEFAULT '0',
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT '_blank',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `UNIQUE_MENU_NAME` (`name`),
  KEY `LEFT` (`lft`),
  KEY `RIGHT` (`rght`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `menus`
--

INSERT INTO `menus` VALUES(1, NULL, NULL, '', 0, 1, 6, 'main', 'main', '', '', '_self', '2011-04-19 00:18:02', '2011-04-19 00:18:02');
INSERT INTO `menus` VALUES(2, '1', NULL, '', 0, 2, 3, 'Chi siamo', 'chi_siamo', '', '/page/1', '_self', '2011-04-19 00:20:25', '2011-04-19 00:20:25');
INSERT INTO `menus` VALUES(3, '1', NULL, '', 0, 4, 5, 'Dove siamo', 'dove_siamo', '', '/page/2', '_self', '2011-04-19 00:20:32', '2011-04-19 00:20:32');
INSERT INTO `menus` VALUES(4, '', NULL, '', 0, 7, 10, 'navigator', 'navigator', '', '', '_self', '2011-04-19 00:22:20', '2011-04-19 00:22:20');
INSERT INTO `menus` VALUES(5, '4', NULL, '', 0, 8, 9, 'Foto gallery', 'foto_gallery', '', '/galleries', '_self', '2011-04-19 00:22:50', '2011-04-19 00:22:50');

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `image_mimetype` varchar(255) NOT NULL,
  `image_filesize` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `date_from` date NOT NULL DEFAULT '0000-00-00',
  `date_to` date NOT NULL DEFAULT '0000-00-00',
  `language_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SLUG` (`slug`),
  KEY `TITLE` (`title`),
  KEY `SHORT_DESRCRIPTION` (`short_description`),
  KEY `DATE` (`date`),
  KEY `DATE_FROM` (`date_from`),
  KEY `DATE_TO` (`date_to`),
  KEY `LANGUAGE_ID` (`language_id`),
  KEY `PUBLISHED` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `news`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_html` text,
  `description_text` text,
  `attachment` varchar(255) NOT NULL,
  `attachment_dir` varchar(255) NOT NULL,
  `attachment_mimetype` varchar(255) NOT NULL,
  `attachment_filesize` varchar(255) NOT NULL,
  `attachment_filename` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SLUG` (`slug`),
  KEY `TITLE` (`title`),
  KEY `LANGUAGE_ID` (`language_id`),
  KEY `USER_ID` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `newsletters`
--

INSERT INTO `newsletters` VALUES(1, 'test1', 'test1', 'test1html', 'Per visualizzare correttamente la newsletter si prega di utillizzare il seguente link: http://fruitscake.local/newsletters/view/1', '', '', '', '', '', 1, 1, '2011-02-14 23:40:47', '2011-02-14 23:40:47');
INSERT INTO `newsletters` VALUES(2, 'ciao', 'ciao', 'ciao', ': http://fruitscake.local/admin/newsletters/view/2', '', '', '', '', '', 1, 2, '2011-02-15 00:38:27', '2011-02-15 00:38:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletter_users`
--

CREATE TABLE `newsletter_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `language_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FIRST_NAME` (`first_name`),
  KEY `LAST_NAME` (`last_name`),
  KEY `EMAIL` (`email`),
  KEY `LANGUAGE_ID` (`language_id`),
  KEY `IS_ACTIVE` (`is_active`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `newsletter_users`
--

INSERT INTO `newsletter_users` VALUES(1, 'Marco', 'Cunico', 'marco.cunico@gmail.com', 1, 1, '2011-02-14 23:41:50', '2011-02-14 23:41:50');

-- --------------------------------------------------------

--
-- Struttura della tabella `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `BY_SLUG` (`slug`),
  KEY `BY_TITLE` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `pages`
--

INSERT INTO `pages` VALUES(1, 'chi-siamo', 'Chi siamo', '<p>Ciao mondo!</p>', 1, '2011-04-19 00:33:32', '2011-04-19 00:33:32');
INSERT INTO `pages` VALUES(2, 'dove-siamo', 'Dove siamo', 'Dove siamo description', 1, '2011-04-19 00:33:58', '2011-04-19 00:33:58');

-- --------------------------------------------------------

--
-- Struttura della tabella `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `image_mimetype` varchar(255) NOT NULL,
  `image_filesize` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  `photo_gallery_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `TITLE` (`title`),
  KEY `PHOTO_GALLERY_ID` (`photo_gallery_id`),
  KEY `PUBLISHED` (`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `photos`
--

INSERT INTO `photos` VALUES(1, 'New image', '', 1, '4dacb738f12f5.jpg', '{IMAGES}photos', 'image/jpeg', '5971', '_img_proshop.jpg', 1, '2011-04-19 00:12:08', '2011-04-19 00:12:08');

-- --------------------------------------------------------

--
-- Struttura della tabella `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SLUG` (`slug`),
  KEY `TITLE` (`title`),
  KEY `PUBLISHED` (`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `photo_galleries`
--

INSERT INTO `photo_galleries` VALUES(1, 'Test Gallery', 'test-gallery', '<p>Ciao Mondo!</p>', 1, '2011-04-19 00:10:10', '2011-04-19 00:10:10');

-- --------------------------------------------------------

--
-- Struttura della tabella `schema_migrations`
--

CREATE TABLE `schema_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `schema_migrations`
--

INSERT INTO `schema_migrations` VALUES(1, 1, 'migrations', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(2, 1, 'app', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(3, 2, 'app', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(4, 3, 'app', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(5, 4, 'app', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(6, 5, 'app', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(7, 6, 'app', '2011-02-14 22:49:35');
INSERT INTO `schema_migrations` VALUES(8, 7, 'app', '2011-02-14 22:49:36');
INSERT INTO `schema_migrations` VALUES(9, 8, 'app', '2011-02-14 22:51:38');
INSERT INTO `schema_migrations` VALUES(10, 9, 'app', '2011-02-14 22:51:38');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `passwd` varchar(128) DEFAULT NULL,
  `password_token` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_authenticated` tinyint(1) DEFAULT '0',
  `email_token` varchar(255) DEFAULT NULL,
  `email_token_expires` datetime DEFAULT NULL,
  `tos` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `role` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `BY_USERNAME` (`username`),
  UNIQUE KEY `BY_EMAIL` (`email`),
  KEY `BY_PWD` (`passwd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` VALUES(1, 'admin', 'admin', 'Marco', 'Cunico', 'a2593c04af4f12c2313ca8ad6c61015245df90de', NULL, 'sklero@gmail.com', 0, NULL, '2011-04-14 05:05:42', 0, 1, '2011-02-15 00:37:24', NULL, 0, NULL, '2011-02-14 22:56:02', '2011-04-13 15:08:51');
INSERT INTO `users` VALUES(2, 'dalpo', 'dalpo', 'dalpo', 'dalpo', 'f77e3da43d44b731a50aff18dd01973a6e8203e6', NULL, 'dalpo85@gmail.com', 0, NULL, NULL, 0, 1, NULL, NULL, 0, NULL, '2011-04-19 00:01:46', '2011-04-19 00:03:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `variables`
--

CREATE TABLE `variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `KEY` (`key`),
  KEY `VALUE` (`value`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `variables`
--

