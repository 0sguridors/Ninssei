-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2023 às 18:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ninssei`
--
CREATE DATABASE IF NOT EXISTS `ninssei` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ninssei`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(9) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `imagem`) VALUES
(5, 'MEDICAMENTOS', 'dipirona.jpg'),
(6, 'SUPLEMENTOS', 'whey.jpg'),
(7, 'SAÚDE BUCAL', 'listerine.jpg'),
(8, 'HIGIENE PESSOAL', 'desodorante.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `dtnasc` date DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `administrador` enum('S','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `dtnasc`, `telefone`, `email`, `endereco`, `cep`, `senha`, `administrador`) VALUES
(1, 'ninssei', NULL, '0001-01-01', 'teste', 'teste@teste', 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', 'S'),
(2, '', NULL, '0000-00-00', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'N'),
(3, 'asdwasd', NULL, '0000-00-00', '1234', 'asdwasd@12344', '124', '1234', 'e0e55c963645752b45a790de09dc7455', 'N'),
(4, 'teste', NULL, '0001-01-01', 'teste', 'teste@teste', 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(20) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` int(5) DEFAULT NULL,
  `id_produto` int(5) DEFAULT NULL,
  `qtd_produto` int(9) DEFAULT NULL,
  `valor` float(12,2) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `quantidade` int(6) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `categoria` int(2) NOT NULL,
  `preco_compra` float(12,2) DEFAULT NULL,
  `preco_venda` float(12,2) DEFAULT NULL,
  `desconto` float(12,2) NOT NULL,
  `arqimagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `quantidade`, `descricao`, `categoria`, `preco_compra`, `preco_venda`, `desconto`, `arqimagem`) VALUES
(1, 'DORIL', 956, 'Alívio de dores leves a moderadas tais como: dor de cabeça, dores causadas por resfriados ou sinusite; artrite; dores musculares e dores de dente.', 5, 2.00, 7.90, 0.00, 'doril.jpg'),
(2, 'RIVOTRIL', 96, 'Provoca a redução da tensão, agitação e o estado de alerta.', 5, 0.99, 9.35, 0.00, 'rivotril.jpg'),
(3, 'ESCITALOPRÁM', 956, 'Tratamento e prevenção da recaída ou recorrência da depressão; Tratamento do transtorno do pânico, com ou sem agorafobia; Tratamento do transtorno de ansiedade generalizada (TAG).', 5, 60.00, 169.90, 0.10, 'medicamento.png'),
(4, 'BENZETACIL', 30, 'Indicado no tratamento de infecções causadas por microrganismos sensíveis à penicilina G.', 5, 15.00, 37.90, 0.00, 'benzetacil.jpg'),
(5, 'RESFENOL', 50, 'Indicado contra os sintomas de gripes e resfriados, como: congestão nasal, coriza, febre, cefaleia, dores musculares e demais sintomas presentes nos estados gripais', 5, 5.00, 19.90, 0.00, 'resfenol.jpg'),
(6, 'DIPIRONA', 100, 'Indicado para agir contra febre, dor de cabeça, dor muscular e cólicas.', 5, 4.00, 14.90, 0.00, 'dipirona.jpg'),
(8, 'PROTEÍNA WHEY GOLD', 100, 'Alimento protéico indicado para quem realiza exercícios, atividades físicas ou dietas com o objetivo de ganhar massa muscular magra', 6, 50.00, 199.90, 0.20, 'whey.jpg'),
(10, 'LISTERINE 500ml', 200, 'Enxaguante antisséptico bucal com álcool, indicado para a eliminação de germes que causam placa bacteriana, mau hálito e gengivite. Listerine penetra em todos os lugares e termina o que a escovação começa, alcançando até 100% da boca.', 7, 12.00, 19.90, 0.00, 'listerine.jpg'),
(11, 'JOHNSON REACH', 120, 'O Fio dental da linha Reach da Johnson & Johnson ajuda a remover os resíduos, elimina a placa bacteriana, além de evitar a formação de manchas entre os dentes, com a finalidade de manter o branco natural do seu sorriso.', 7, 5.00, 11.90, 0.00, 'fio_dental.jpg'),
(12, 'DESODORANTE GILLETE', 0, 'Gillette Hydra Gel Aloe é um desodorante em gel sem álcool e enriquecido com Aloe Vera. Ele hidrata, ajuda a proteger a pele contra irritações e ainda deixa um aroma agradável nas axilas.', 8, 4.00, 12.90, 0.00, 'desodorante.jpg'),
(20, 'Viagra', 99, 'Viagra® atua favorecendo o relaxamento da musculatura lisa dos corpos cavernosos (principal estrutura erétil do pênis) e a dilatação das artérias que levam o sangue até eles, facilitando a entrada de sangue no pênis e consequentemente, favorecendo a ereçã', 5, 4.75, 30.00, 0.05, 'viagra.png'),
(21, 'GLUCERNA 850g', 100, 'Glucerna é um produto que foi desenvolvido especialmente para pessoas com diabetes. Seu exclusivo carboidrato de lenta absorção ajuda a manter estáveis os níveis de açúcar no sangue para que você mantenha sua rotina e siga sendo você.', 6, 5.00, 30.00, 0.05, 'glucerna.jpg');
COMMIT;

CREATE TABLE IF NOT EXISTS log_trigger (
  `id_log` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `data_registro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` INT UNSIGNED,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE log_trigger
ADD CONSTRAINT fk_log_trigger_cliente
FOREIGN KEY (id_cliente)
REFERENCES cliente(id_cliente);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


DELIMITER //
CREATE TRIGGER modificador_quantidade
AFTER INSERT ON pedidos
FOR EACH ROW
BEGIN
    DECLARE adm_flag CHAR(1);
    DECLARE quantidade_produto INT;

    -- Verifica se o cliente é um administrador
    SELECT administrador INTO adm_flag FROM cliente WHERE id_cliente = NEW.id_cliente;

    -- Se o cliente for um administrador, adiciona a quantidade à tabela produtos
    IF adm_flag = 'S' THEN
        SELECT quantidade INTO quantidade_produto FROM produtos WHERE id_produto = NEW.id_produto;
        UPDATE produtos SET quantidade = quantidade_produto + NEW.qtd_produto WHERE id_produto = NEW.id_produto;

        -- Log da operação com o autor
        INSERT INTO log_trigger (descricao, id_cliente) VALUES ('Adição de produtos pelo administrador', NEW.id_cliente);
    -- Se o cliente não for um administrador, reduz a quantidade da tabela produtos
    ELSE
        UPDATE produtos SET quantidade = quantidade - NEW.qtd_produto WHERE id_produto = NEW.id_produto;

        -- Log da operação com o autor
        INSERT INTO log_trigger (descricao, id_cliente) VALUES ('Redução de produtos por cliente regular', NEW.id_cliente);
    END IF;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER log_alteracao_senha_cliente
AFTER UPDATE ON cliente
FOR EACH ROW
BEGIN
    -- Verifica se a senha do cliente foi alterada
    IF NEW.senha <> OLD.senha THEN
        -- Insere um registro na tabela de log com o autor
        INSERT INTO log_trigger (descricao, id_cliente) VALUES ('Senha do cliente ' + OLD.nome + ' alterada..' + 'Senha antiga:' + OLD.senha, NEW.id_cliente);
    END IF;
END;
//
DELIMITER ;


DELIMITER //

CREATE PROCEDURE atualizar_desconto(IN categoria_id INT, IN novo_desconto DECIMAL(5,2))
BEGIN
    DECLARE done INT DEFAULT 0;
    DECLARE produto_id INT;
    DECLARE cur CURSOR FOR SELECT id_produto FROM produtos WHERE categoria = categoria_id;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO produto_id;

        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Atualizar o desconto para o novo valor na tabela produtos
        UPDATE produtos SET desconto = novo_desconto WHERE id_produto = produto_id;
    END LOOP;

    CLOSE cur;
END;

//

DELIMITER ;
