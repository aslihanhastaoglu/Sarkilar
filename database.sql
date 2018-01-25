CREATE TABLE `contacts` (
  `id` int(11) NOT NULL auto_increment,
  `sarkiadi` varchar(255) NOT NULL,
  `besteci` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `contacts` (`id`, `sarkiadi`, `besteci`, `tarih`) VALUES
(1, 'Yolla', 'Tarkan', '2017'),
(2, 'Canımsın Sen', 'Sezen Aksu', '2017'),
(3, 'Gönül Dağı', 'Neşet Ertaş', '1974'),
(4, 'Kurşuni Renkler', 'Sezen Aksu', '1985');