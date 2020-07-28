-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.10-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para ibijus
CREATE DATABASE IF NOT EXISTS `ibijus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ibijus`;

-- Copiando estrutura para tabela ibijus.locais
CREATE TABLE IF NOT EXISTS `locais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela ibijus.locais: 0 rows
/*!40000 ALTER TABLE `locais` DISABLE KEYS */;
INSERT INTO `locais` (`id`, `nome`, `cep`, `logradouro`, `complemento`, `numero`, `bairro`, `uf`, `cidade`, `data`) VALUES
	(1, 'Florianópolis', '88058660', 'Rua dos Golfinhos', 'Casa', '59', 'Ingleses do Rio Vermelho', 'SC', 'Florianópolis', '2020-07-01'),
	(2, 'Timóteo', '35182354', 'Rua Uruguai', 'Casa', '357', 'Santa Cecília', 'MG', 'Timóteo', '2020-12-31'),
	(3, 'Alphavile Timóteo', '35181615', 'Rua Vinícius de Morais', 'Casa A', '1504', 'Alphaville', 'MG', 'Timóteo', '2020-12-25'),
	(4, 'Curitiba', '81170210', 'Rua 1', 'Casa', '1001', 'Cidade Industrial', 'PR', 'Curitiba', '2020-12-28'),
	(5, 'Foz do Iguaçu', '80010010', 'Rua Marechal Deodoro', 'Apto', '01', 'Centro', 'PR', 'Curitiba', '2019-08-08'),
	(6, 'Belo Horizonte Savassi', '30112024', 'Avenida Getúlio Vargas', 'Casa', '2010', 'Savassi', 'MG', 'Belo Horizonte', '2018-06-01'),
	(7, 'Barueri', '06407085', 'Viela A', 'Apto', '963', 'Vila Universal', 'SP', 'Barueri', '2019-12-01');
/*!40000 ALTER TABLE `locais` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
