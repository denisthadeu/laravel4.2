-- --------------------------------------------------------
-- Servidor:                     denisbaptista.com.br
-- Versão do servidor:           5.5.40-36.1 - Percona Server (GPL), Release 36.1, Revision 707
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para denis098_database
CREATE DATABASE IF NOT EXISTS `denis098_database` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `denis098_database`;


-- Copiando estrutura para tabela denis098_database.categorias_solicitadas
CREATE TABLE IF NOT EXISTS `categorias_solicitadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `observacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.categorias_solicitadas: ~1 rows (aproximadamente)
DELETE FROM `categorias_solicitadas`;
/*!40000 ALTER TABLE `categorias_solicitadas` DISABLE KEYS */;
INSERT INTO `categorias_solicitadas` (`id`, `nome_categoria`, `observacao`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Technologie', 'Salut, je veux une nouvelle catégorie que s\'apelle Technologie. Merci!', 1, '2015-08-26 01:05:37', '2015-09-01 18:38:01', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categorias_solicitadas` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.categories: ~9 rows (aproximadamente)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `nome`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Tecnologia', NULL, '2015-08-04 21:00:20', '2015-08-04 21:00:20'),
	(2, 1, 'Tablets', NULL, '2015-08-05 19:15:47', '2015-08-05 19:15:47'),
	(3, 1, 'Smartphones', NULL, '2015-08-05 19:19:05', '2015-08-05 19:19:05'),
	(4, 1, 'Celulares', NULL, '2015-08-05 19:19:30', '2015-08-05 19:19:30'),
	(5, 0, 'Livros', NULL, '2015-08-05 19:21:44', '2015-08-05 19:21:44'),
	(7, 5, 'Comédia', NULL, '2015-08-05 19:22:51', '2015-08-05 19:22:51'),
	(8, 5, 'Ficção', NULL, '2015-08-05 19:22:58', '2015-08-05 19:22:58'),
	(10, 3, 'Apple', NULL, '2015-08-13 00:37:47', '2015-08-13 00:37:47'),
	(11, 10, 'Iphone', NULL, '2015-08-13 00:38:20', '2015-08-13 00:38:20');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.categories_requested
CREATE TABLE IF NOT EXISTS `categories_requested` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `motivo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `visualizado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.categories_requested: ~0 rows (aproximadamente)
DELETE FROM `categories_requested`;
/*!40000 ALTER TABLE `categories_requested` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories_requested` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.centros_comerciais
CREATE TABLE IF NOT EXISTS `centros_comerciais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.centros_comerciais: ~4 rows (aproximadamente)
DELETE FROM `centros_comerciais`;
/*!40000 ALTER TABLE `centros_comerciais` DISABLE KEYS */;
INSERT INTO `centros_comerciais` (`id`, `nome`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Centro', '2015-08-25 23:04:19', '2015-08-25 23:04:19', '0000-00-00 00:00:00'),
	(2, 'Sta. Efigenia', '2015-08-25 23:05:57', '2015-08-25 23:05:57', '0000-00-00 00:00:00'),
	(3, '25 de Março', '2015-08-25 23:06:14', '2015-08-25 23:06:14', '0000-00-00 00:00:00'),
	(4, 'Lapa', '2015-08-25 23:06:22', '2015-08-25 23:06:22', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `centros_comerciais` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.pacotes
CREATE TABLE IF NOT EXISTS `pacotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `valor` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `vezes` int(11) NOT NULL DEFAULT '0',
  `valido_por` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.pacotes: ~1 rows (aproximadamente)
DELETE FROM `pacotes`;
/*!40000 ALTER TABLE `pacotes` DISABLE KEYS */;
INSERT INTO `pacotes` (`id`, `nome`, `valor`, `vezes`, `valido_por`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Pacote Teste 1', 'R$ 100,00', 2, 30, '2015-08-26 00:24:12', '2015-08-26 00:24:12', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pacotes` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.planos_solicitados
CREATE TABLE IF NOT EXISTS `planos_solicitados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.planos_solicitados: ~0 rows (aproximadamente)
DELETE FROM `planos_solicitados`;
/*!40000 ALTER TABLE `planos_solicitados` DISABLE KEYS */;
/*!40000 ALTER TABLE `planos_solicitados` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(355) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `cor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peso` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `garantia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.produtos: ~0 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.produtos_categorias
CREATE TABLE IF NOT EXISTS `produtos_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.produtos_categorias: ~0 rows (aproximadamente)
DELETE FROM `produtos_categorias`;
/*!40000 ALTER TABLE `produtos_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_categorias` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.produtos_imagem
CREATE TABLE IF NOT EXISTS `produtos_imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_id` int(11) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `caminho` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caminho_completo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.produtos_imagem: ~0 rows (aproximadamente)
DELETE FROM `produtos_imagem`;
/*!40000 ALTER TABLE `produtos_imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_imagem` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.ruas
CREATE TABLE IF NOT EXISTS `ruas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `centro_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.ruas: ~1 rows (aproximadamente)
DELETE FROM `ruas`;
/*!40000 ALTER TABLE `ruas` DISABLE KEYS */;
INSERT INTO `ruas` (`id`, `nome`, `centro_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Rua dos Gusmões', 2, '2015-08-25 23:21:52', '2015-08-25 23:21:52', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ruas` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `remember_token` varchar(64) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `cpf` varchar(18) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `perfil` tinyint(4) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `centro_id` int(11) DEFAULT NULL,
  `rua_id` int(11) DEFAULT NULL,
  `company_numero` varchar(10) DEFAULT NULL,
  `company_loja` varchar(10) DEFAULT NULL,
  `company_andar` varchar(10) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_site` varchar(100) DEFAULT NULL,
  `company_telefone` varchar(18) DEFAULT NULL,
  `company_tags` varchar(300) DEFAULT NULL,
  `pacote_id` int(11) DEFAULT NULL,
  `data_vencimento` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela denis098_database.user: ~5 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `password`, `remember_token`, `nome`, `sobrenome`, `cpf`, `telefone`, `celular`, `perfil`, `data_nascimento`, `company_name`, `centro_id`, `rua_id`, `company_numero`, `company_loja`, `company_andar`, `company_email`, `company_site`, `company_telefone`, `company_tags`, `pacote_id`, `data_vencimento`, `status`, `created_at`, `updated_at`) VALUES
	(5, 'denisthadeu@hotmail.com', '$2y$10$QNqTo/3mj6ludx/fHV/CkeHzRAS9sQvn2uP.2DgvTBroRAszbMz0K', 'DIjugwZHbH8rB1AafUNw8LZdx4XA2E5igWspm6EOOvzW3ExAM3rlUFBs3ai9', 'Dênis', 'Baptista', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-08-01 00:58:51', '2015-09-04 19:58:10'),
	(6, 'denis@softbrazil.com.br', '$2y$10$QNqTo/3mj6ludx/fHV/CkeHzRAS9sQvn2uP.2DgvTBroRAszbMz0K', 'uCkNh2nvFQjCP48ein7s8aFlnTsAv25JGKzcfYdPvCkF2yMnywqZe3Zd2ojr', 'Dênis Thadeu', 'Leal Baptista', '042.931.911-86', '(21) 3325-6564', '(21) 9915-48350', 2, NULL, 'Denis LTDA', 2, 1, '209', '214', '2', 'denis.baptista91@gmail.com', 'www.denisbaptista.com.br', '(21) 3325-6564', 'WebDesign, Programador, PHP', NULL, NULL, 1, '2015-08-28 00:46:56', '2015-09-08 17:20:02'),
	(7, 'viniciusfsfaria@gmail.com', '$2y$10$cRVcRXxtqoIy7vuRIjuoV.36JUfbL5SeeBGRHs94zSoHsPe7JkWZm', NULL, 'Vinicius', 'Faria', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-08-31 23:16:13', '2015-08-31 23:16:13'),
	(8, 'antoniovietri@gmail.com', '$2y$10$BiIwpvnSxrIfAVEnONqN3Ojh6HwGBeepO6DIaTPh4kPmbPn.NCb9u', 'eYVhB0tZeDkNJ1To9zC17l4jaAMSyh98ZFBoAO5IX7bDRt12PwKFxGpbQDoU', 'antonio ', 'vietri', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-02 19:56:02', '2015-09-02 19:57:07'),
	(9, 'dudynhaa_91@hotmail.com', '$2y$10$TfRJkUFwwv81nYEH/BBdN.7r/GTkHOnS3wvzkM8dlFERVgtqFcV1a', NULL, 'maria eduarda', 'araujo', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-04 19:33:21', '2015-09-04 19:33:21');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
