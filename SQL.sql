DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `is_active`)
VALUES
	(1,'test@test.com','$2y$10$tjDreAYXxzpAR.KGI/M6tu4XmM2s2Ik3Rx/2unlJSDuCochooBz.W','Test','Test',1);
