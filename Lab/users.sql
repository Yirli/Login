CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `lastName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
 `sLastName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
 `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
 `cellphone` int(11) DEFAULT NULL,
 `phone` int(11) DEFAULT NULL,
 `phoneCode` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
