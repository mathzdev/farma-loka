CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `email_usuario` varchar(200) CHARACTER SET latin1 NOT NULL,
  `senha_usuario` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status_usuario` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=2 ;
