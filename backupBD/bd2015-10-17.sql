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
	(1, 'Technologie', 'Salut, je veux une nouvelle catégorie que s\'apelle Technologie. Merci!', 2, '2015-08-26 01:05:37', '2015-10-07 01:40:01', '0000-00-00 00:00:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.produtos: ~4 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `user_id`, `nome`, `descricao`, `preco`, `quantidade`, `cor`, `modelo`, `peso`, `garantia`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 6, 'Produto Teste 1 ', 'Descrição do meu produto teste que tem uma capacidade de 255', 'R$ 2.500,00', 23, 'Preto', 'TGW23', '2kg', '3 meses com a loja', '1', '2015-09-12 12:44:45', '2015-09-12 12:44:45', NULL),
	(2, 6, 'Iphone 6', 'O Apple iPhone 6 é um smartphone iOS com características inovadoras que o tornam uma excelente opção para qualquer tipo de utilização, representando um dos melhores dispositivos móveis já feitos. A tela de 4.7 polegadas é um verdadeiro record que coloca esse Apple no topo de sua categoria. A resolução também é alta: 1334x750 pixel. As funcionalidades of', 'R$ 4.000,00', 23, 'Branco', 'ïphone 6', '120 kg', '1 ano com a própria empresa', '1', '2015-09-27 17:03:52', '2015-09-27 17:03:52', NULL),
	(3, 6, 'Moto x 2º Geração 4g', 'A Motorola inova em tecnologia trazendo a 2ª geração do incrível Moto X, um aparelho com uma série de novas tecnologias que já era capaz de antecipar seus desejos e conta agora com mais interação com usuário através da voz. Seu design renovado e cheio de estilo traz um fino acabamento metálico na borda e Tela Nítida Full HD de 5,2 Polegadas.', 'R$ 1.000,00', 11, 'Branco', 'Moto x 2 geração', '100 kg', '3 meses com a loja e 1 ano com a fabrica', '1', '2015-09-27 17:07:01', '2015-09-27 17:07:01', NULL),
	(4, 6, 'Tablet LG Pad 8', 'Faça tudo o que quiser, sem travar ou ficar lento. O Tablet LG G Pad 8, possui processador Quad-Core 1.2 Ghz da Qualcomm e tela de Smart TV LG com 8" HD de alta definição com tecnologia IPS. Atenda ou rejeite chamadas e responda mensagens do seu Smartphone Android (de qualquer marca) com o QPair 2.0. Além disso, tenha uma fácil usabilidade. Use-o como c', 'R$ 400,00', 21, 'Preto', 'LG', '1 kg', '1 ano com a fábrica', '1', '2015-09-27 17:09:38', '2015-09-27 17:09:38', NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;


-- Copiando estrutura para tabela denis098_database.produtos_categorias
CREATE TABLE IF NOT EXISTS `produtos_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.produtos_categorias: ~16 rows (aproximadamente)
DELETE FROM `produtos_categorias`;
/*!40000 ALTER TABLE `produtos_categorias` DISABLE KEYS */;
INSERT INTO `produtos_categorias` (`id`, `produtos_id`, `categories_id`) VALUES
	(1, 1, 5),
	(2, 1, 7),
	(3, 1, 8),
	(4, 1, 1),
	(5, 1, 2),
	(6, 1, 3),
	(7, 1, 10),
	(8, 1, 11),
	(9, 2, 1),
	(10, 2, 3),
	(11, 2, 10),
	(12, 2, 11),
	(13, 3, 1),
	(14, 3, 3),
	(15, 4, 1),
	(16, 4, 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.produtos_imagem: ~5 rows (aproximadamente)
DELETE FROM `produtos_imagem`;
/*!40000 ALTER TABLE `produtos_imagem` DISABLE KEYS */;
INSERT INTO `produtos_imagem` (`id`, `produtos_id`, `ordem`, `caminho`, `nome`, `caminho_completo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'uploads/produto/1/', 'p_produto-teste_2014-07-28_0.jpg', 'uploads/produto/1/p_produto-teste_2014-07-28_0.jpg', '2015-09-12 12:44:59', '2015-09-12 12:44:59', NULL),
	(2, 1, 2, 'uploads/produto/1/', 'p_produto-teste_2014-07-28_1.jpg', 'uploads/produto/1/p_produto-teste_2014-07-28_1.jpg', '2015-09-12 12:45:10', '2015-09-12 12:45:10', NULL),
	(3, 2, 1, 'uploads/produto/2/', '120998637G1.jpg', 'uploads/produto/2/120998637G1.jpg', '2015-09-27 17:04:51', '2015-09-27 17:04:51', NULL),
	(4, 3, 1, 'uploads/produto/3/', 'url.jpg', 'uploads/produto/3/url.jpg', '2015-09-27 17:07:26', '2015-09-27 17:07:26', NULL),
	(5, 4, 1, 'uploads/produto/4/', 'tablet-lg-g-pad-8-16gb-tela-8-wi-fi-android-4.4processador-quad-core-camera-5mp-frontal-088277500.jp', 'uploads/produto/4/tablet-lg-g-pad-8-16gb-tela-8-wi-fi-android-4.4processador-quad-core-camera-5mp-frontal-088277500.jpg', '2015-09-27 17:10:01', '2015-09-27 17:10:01', NULL);
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


-- Copiando estrutura para tabela denis098_database.texto_site
CREATE TABLE IF NOT EXISTS `texto_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `descricao` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela denis098_database.texto_site: ~3 rows (aproximadamente)
DELETE FROM `texto_site`;
/*!40000 ALTER TABLE `texto_site` DISABLE KEYS */;
INSERT INTO `texto_site` (`id`, `titulo`, `descricao`, `created_at`, `updated_at`) VALUES
	(4, 'quemSomos', '<p style="line-height: 17.1429px;">Hello Dmitry,</p><p style="line-height: 17.1429px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ligula risus, viverra sit amet purus id, ullamcorper venenatis leo. Ut vitae semper neque. Nunc vel lacus vel erat sodales ultricies sed sed massa. Duis non elementum velit. Nunc quis molestie dui. Nullam ullamcorper lectus in mattis volutpat. Nunc egestas felis sit amet ultrices euismod. Donec lacinia neque vel quam pharetra, non dignissim arcu semper. Donec ultricies, neque ut vehicula ultrices, ligula velit sodales purus, eget eleifend libero risus sed turpis. Fusce hendrerit vel dui ut pulvinar. Ut sed tristique ante, sed egestas turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p style="line-height: 17.1429px;">Fusce sit amet dui at nunc laoreet facilisis. Proin consequat orci sollicitudin sem cursus, quis vehicula eros ultrices. Cras fermentum justo at nibh tincidunt, consectetur elementum est aliquam.</p>', '2015-09-28 20:25:57', '2015-09-29 01:54:10'),
	(5, 'termosUso', '<p><span style="line-height: 17.1429px;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span></p><p><span style="line-height: 17.1429px;">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </span></p><p><span style="line-height: 17.1429px;">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? </span></p><p><span style="line-height: 17.1429px;">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,', '2015-09-28 20:25:57', '2015-09-28 20:25:57'),
	(6, 'faleConosco', 'Caso tenha alguma dúvida, sugestão ou reclamação a fazer, por favor, entre em contato conosco, e responderemos ao seu contato o mais rápido possível.', '2015-09-28 20:25:57', '2015-09-28 20:25:57');
/*!40000 ALTER TABLE `texto_site` ENABLE KEYS */;


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
	(5, 'denisthadeu@hotmail.com', '$2y$10$QNqTo/3mj6ludx/fHV/CkeHzRAS9sQvn2uP.2DgvTBroRAszbMz0K', 'fwn5ONz7DG3fbKs6zoenPYgSobmP4zfHnDkYEY1YLFtvbZENQvn9BYcvQmr3', 'Dênis', 'Baptista', '', '', '', 1, NULL, '', 0, 0, '', '', '', '', '', '', '', 1, '2015-11-05 00:00:00', 1, '2015-08-01 00:58:51', '2015-10-17 14:24:04'),
	(6, 'denis@softbrazil.com.br', '$2y$10$QNqTo/3mj6ludx/fHV/CkeHzRAS9sQvn2uP.2DgvTBroRAszbMz0K', 'ud928Zimi9fJ79D2gzIUlI8O2xOnteag5mMPzwyImgyZlsUhOdMRLUahr8Xy', 'Dênis Thadeu', 'Leal Baptista', '042.931.911-86', '(21) 3325-6564', '(21) 9915-48350', 2, NULL, 'Denis LTDA', 2, 1, '209', '214', '2', 'denis.baptista91@gmail.com', 'www.denisbaptista.com.br', '(21) 3325-6564', 'WebDesign, Programador, PHP', 1, '2016-02-19 00:00:00', 1, '2015-08-28 00:46:56', '2015-10-17 14:24:56'),
	(7, 'viniciusfsfaria@gmail.com', '$2y$10$cRVcRXxtqoIy7vuRIjuoV.36JUfbL5SeeBGRHs94zSoHsPe7JkWZm', 'G5NIvBWXXyQf5XA3NUIXwqM19PEkmhTplRAIUhF4UObgCaEkanOTy5l25hwn', 'Vinicius', 'Faria', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-08-31 23:16:13', '2015-10-07 00:48:52'),
	(8, 'antoniovietri@gmail.com', '$2y$10$BiIwpvnSxrIfAVEnONqN3Ojh6HwGBeepO6DIaTPh4kPmbPn.NCb9u', 'eYVhB0tZeDkNJ1To9zC17l4jaAMSyh98ZFBoAO5IX7bDRt12PwKFxGpbQDoU', 'antonio ', 'vietri', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-02 19:56:02', '2015-09-02 19:57:07'),
	(9, 'dudynhaa_91@hotmail.com', '$2y$10$TfRJkUFwwv81nYEH/BBdN.7r/GTkHOnS3wvzkM8dlFERVgtqFcV1a', NULL, 'maria eduarda', 'araujo', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-04 19:33:21', '2015-09-04 19:33:21');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
