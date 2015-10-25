CREATE TABLE `tb_usuario` (
`id_usuario` int(11) NOT NULL AUTO_INCREMENT,
`nome_usuario` varchar(200) DEFAULT NULL,
`email_usuario` varchar(200) NOT NULL,
`senha_usuario` varchar(200) NOT NULL,
`status_usuario` varchar(200) DEFAULT NULL,
PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
