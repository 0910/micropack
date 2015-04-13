
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `users` (`idUser`, `name`, `password`, `email`, `type`) VALUES
(1, 'Nuevediez', '819d86bb894c17b77ac3fb61359b5a5f', 'admin@nuevediez.com.ar', 'admin');


CREATE TABLE IF NOT EXISTS `products` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `client` text CHARACTER SET utf8 NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `client2` text CHARACTER SET utf8 NOT NULL,
  `title2` text CHARACTER SET utf8 NOT NULL,
  `description2` text CHARACTER SET utf8 NOT NULL,
  `client3` text CHARACTER SET utf8 NOT NULL,
  `title3` text CHARACTER SET utf8 NOT NULL,
  `description3` text CHARACTER SET utf8 NOT NULL,
  `images` text CHARACTER SET utf8 NOT NULL,
  `cover` int(11) NOT NULL,
  `price` int(1) NOT NULL,
  `category` text CHARACTER SET utf8 NOT NULL,
  `orderby` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fPublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fCreacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fModificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idProduct`),
  UNIQUE KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `news` (
  `idNews` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `title3` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `body2` text NOT NULL,
  `body3` text NOT NULL,
  `link` text NOT NULL,
  `images` text NOT NULL,
  `cover` int(11) NOT NULL,
  `orderby` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fCreacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fModificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `idNews` (`idNews`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `quotes` (
  `idQuotes` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `body2` text NOT NULL,
  `body3` text NOT NULL,
  `orderby` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fCreacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fModificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `idQuotes` (`idQuotes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `offices` (
  `idOffices` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `orderby` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fCreacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fModificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `idOffices` (`idOffices`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
