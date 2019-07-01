-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Jul-2019 às 11:37
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `senha`, `email`) VALUES
(10, 'admin', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `preco` double NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`nome`, `categoria`, `imagem`, `preco`, `id`) VALUES
('Deathadder Elite', 'mouse', 'https://images10.newegg.com/BizIntell/item/26/153/26-153-114/pic3.png', 399.9, 4),
('G402', 'mouse', 'https://images.livrariasaraiva.com.br/imagemnet/imagem.aspx/?pro_id=10116900&qld=90&l=430&a=-1', 212.3, 5),
('Harpoon', 'mouse', 'https://www.corsair.com/corsairmedia/sys_master/productcontent/CH-9301011-EU-Harpoon_01_2.png', 131.54, 6),
('Strafe MX', 'teclado', 'https://www.corsair.com/corsairmedia/sys_master/productcontent/CH-9000088-EU-STRAFE_NA_001.png', 285.8, 7),
('Prodigy G2', 'teclado', 'https://images.livrariasaraiva.com.br/imagemnet/imagem.aspx/?pro_id=9440220&qld=90&l=430&a=-1=1003638972', 320, 8),
('G230', 'headset', 'https://loja.login.com.br/wp-content/uploads/2018/09/images.livrariasaraiva.com_.br_.png', 250.3, 9),
('DT3 Sports', 'cadeira', 'https://shopinfo.vteximg.com.br/arquivos/ids/414440-1000-1000/1.png?v=636937888078300000', 380.2, 10),
('Xbox One X', 'console', 'https://i.imgur.com/PLQQrFt.png', 3600, 11),
('Controle Xbox', 'controle', 'https://i2.wp.com/www.xboxpower.com.br/wp-content/uploads/2016/06/xbox-design-lab-xbox-power-Hm01.png?ssl=1', 290, 12),
('AOC 1920', 'monitor', 'https://awstatic-5754.kxcdn.com/EAUdBGzal8VDV0IMhLSIv8Va6-I=/0x0/loja/londritech.com.br/prodimg/31/0515783001553957956.png', 1800, 13),
('Playstation 4', 'Console', 'http://mixpelinfo.com.br/admin/wp-content/uploads/2017/07/playstation4-br-slim.png', 1799.99, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
