-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/07/2019 às 17:15
-- Versão do servidor: 10.3.15-MariaDB
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pw2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `senha`, `email`) VALUES
(12, 'Cristian Cunha', 'b78e049ffc99ec5a4d2599f72a6f9962483b34ce', 'contato@cristiancunha.me');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `preco` double NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`nome`, `categoria`, `imagem`, `preco`, `id`) VALUES
('Deathadder', 'mouse', 'https://images10.newegg.com/BizIntell/item/26/153/26-153-114/pic3.png', 399.9, 4),
('G402', 'mouse', 'https://images.livrariasaraiva.com.br/imagemnet/imagem.aspx/?pro_id=10116900&qld=90&l=430&a=-1', 212.3, 5),
('Harpoon', 'mouse', 'https://www.corsair.com/corsairmedia/sys_master/productcontent/CH-9301011-EU-Harpoon_01_2.png', 131.54, 6),
('Strafe MX', 'teclado', 'https://www.corsair.com/corsairmedia/sys_master/productcontent/CH-9000088-EU-STRAFE_NA_001.png', 285.8, 7),
('Prodigy G2', 'teclado', 'https://images.livrariasaraiva.com.br/imagemnet/imagem.aspx/?pro_id=9440220&qld=90&l=430&a=-1=1003638972', 320, 8),
('G230', 'headset', 'https://loja.login.com.br/wp-content/uploads/2018/09/images.livrariasaraiva.com_.br_.png', 250.3, 9),
('DT3 Sports', 'cadeira', 'https://shopinfo.vteximg.com.br/arquivos/ids/414440-1000-1000/1.png?v=636937888078300000', 380.2, 10),
('Xbox One X', 'console', 'https://i.imgur.com/PLQQrFt.png', 3600, 11),
('Controle Xbox', 'controle', 'https://i2.wp.com/www.xboxpower.com.br/wp-content/uploads/2016/06/xbox-design-lab-xbox-power-Hm01.png?ssl=1', 290, 12),
('AOC 1920', 'monitor', 'https://awstatic-5754.kxcdn.com/EAUdBGzal8VDV0IMhLSIv8Va6-I=/0x0/loja/londritech.com.br/prodimg/31/0515783001553957956.png', 1800, 13),
('Playstation 4', 'console', 'http://mixpelinfo.com.br/admin/wp-content/uploads/2017/07/playstation4-br-slim.png', 1799.99, 18),
('ROG PG258Q', 'monitor', 'https://media.aws.alkosto.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/8/8/889349589892_4.png', 2129, 25),
('Man O War', 'headset', 'https://images-americanas.b2w.io/produtos/01/00/item/128775/5/128775593_1GG.png', 1480.8, 26),
('HS60', 'headset', 'https://images.tcdn.com.br/img/img_prod/642446/headset_gamer_corsair_hs60_carbon_7_1_ca_9011173_na_1517_4_20190116135053.png', 389, 27),
('Trust GXT', 'headset', 'https://static.wixstatic.com/media/eb3e44_8e9f0c9db2c24015af9639e15cbc1a66~mv2.png/v1/fit/w_498,h_634,q_90/file.png', 229, 28),
('Cougar', 'teclado', 'https://images.tcdn.com.br/img/img_prod/448593/teclado_gamer_cougar_usb_200k_padrao_brasileiro_2349_1_20170718150627.png', 299, 29),
('Cougar 600k', 'teclado', 'https://images.tcdn.com.br/img/img_prod/448593/teclado_gamer_cougar_600k_cherry_red_2347_8_20170718150127.png', 559.9, 30),
('Dashe PS4', 'controle', 'https://www.dashcontroles.com.br/wp-content/uploads/2019/04/TheDIvision2ControlePS4.png', 320, 31),
('Xbox Limited', 'controle', 'https://conteudo.imguol.com.br/c/entretenimento/32/2016/03/25/controle-mirrors-edge-catalyst-xbox-one-1458914312992_615x300.png', 720, 32),
('Dazz', 'cadeira', 'https://riobranco.vteximg.com.br/arquivos/ids/155829/624761.png?v=636722604131400000', 530, 33),
('Tech Space', 'cadeira', 'https://images.tcdn.com.br/img/img_prod/313499/cadeira_gamer_thunderx3_air_bc_1_en61881_preto_6671_2_20190212174711.png', 280.8, 34),
('Cougar 450m', 'mouse', 'https://images.tcdn.com.br/img/img_prod/448593/mouse_cougar_450m_iron_grey_2353_1_20170718165249.png', 120, 35);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
