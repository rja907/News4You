
CREATE TABLE IF NOT EXISTS `api_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `source` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `resetpassword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `key` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(99) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`,`mobile_no`),
  UNIQUE KEY `email_2` (`email`,`username`,`mobile_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;