-- Active: 1663738801222@@127.0.0.1@3306@lets_colonize_db

/** 
  * Author : @sofyanox12
  * Silahkan di run untuk menambahkan database lets_colonize_db dan tabel-tabelnya
  */

CREATE DATABASE IF NOT EXISTS `lets_colonize_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lets_colonize_db`;

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `head_staff` VARCHAR(255) NOT NULL,
  `research_code` VARCHAR(255) NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO projects ( `project_name`, `head_staff`, `research_code`, `status` ) VALUES(
  'Project Test',
  'Head Staff Test',
  'AX_0001',
  'On-Going'
);

/* Tampilkan isi tabel projects */
-- SELECT * FROM projects;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL, -- Username sebagai pengganti full name
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tampilkan isi tabel users */
-- SELECT * FROM users;