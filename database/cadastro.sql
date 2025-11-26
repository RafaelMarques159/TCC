-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/11/2025 às 20:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL,
  `img_categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`, `img_categoria`) VALUES
(5, 'Elétrica', 'imagescategoria/1763929844-255625834_940396036900855_7922449245877867200_n - Copia.jpg'),
(6, 'Hidráulicas', 'imagescategoria/1763929856-286534740_2032998840210349_4412841472467977427_n - Copia.jpg'),
(7, 'Acabamento', 'imagescategoria/1763929869-272424970_4526089840850215_283586681245336802_n - Copia.jpg'),
(9, 'One For All User', 'imagescategoria/1763929889-269762495_2011717309010410_6274411840118456497_n - Copia.jpg'),
(10, 'Shigaraki Tomura', 'imagescategoria/1763929917-Captura de tela 2025-11-01 125915.png'),
(11, 'Receptáculo', 'imagescategoria/1763929929-Captura de tela 2025-04-11 151242.png'),
(12, 'Viltrumita Híbrido', 'imagescategoria/1763929947-Captura de tela 2024-10-31 231041.png'),
(13, 'Pias', 'imagescategoria/1763930018-Captura de tela 2024-07-20 231152.png'),
(21, 'Acabamento', 'imagescategoria/1763929720-254552744_116168167527735_4944269650150844603_n - Copia.jpg'),
(23, 'Tua irmã', 'imagescategoria/1763931657-Yuji-Itadori-JJK.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `preco` decimal(10,2) UNSIGNED NOT NULL,
  `descricao` mediumtext NOT NULL,
  `quantidade` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `descricao`, `quantidade`, `imagem`, `categoria_id`) VALUES
(34, 'Telhado', 199.90, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 323, './img/a05c51329b-xc7szemfr6.webp', 7),
(39, 'Midoryia Shounen', 2142.20, 'Izuku Midoriya (緑みどり谷や出いず久く Midoriya Izuku?), também conhecido como Deku (デク?), é o principal protagonista da série de mangá e anime My Hero Academia. Embora tenha nascido sem dom, Izuku conseguiu chamar a atenção do lendário herói All Might devido ao seu heroísmo inato e, desde então, tornou-se seu aprendiz mais próximo, bem como um aluno da Classe 1-A do Colégio U.A.. All Might passou seu dom para Izuku, fazendo dele o nono portador do One For All.', 300, './img/G5d7QNbasAAnykA.jpg', 9),
(40, 'Itadori Yuji', 300.30, 'Yuji Itadori (虎杖悠仁 Itadori Yūji) é o protagonista principal da série Jujutsu Kaisen. Ele é o filho de Jin Itadori e Kaori Itadori e neto de Wasuke Itadori. Yuji vivia uma vida normal na Cidade de Sendai até encontrar Megumi e comer um dos dedos de Sukuna. Após se tornar o receptáculo de Sukuna, Yuji começou a frequentar a Escola Jujutsu de Tóquio junto com Megumi e Nobara como estudantes do primeiro ano.', 432, './img/Yuji-Itadori-JJK.jpg', 11),
(41, 'Invencível', 300.00, 'Mark Grayson nasceu de Nolan Grayson , um vitrumita , e Deborah Grayson , uma humana. Quando Mark tinha sete anos, seu pai lhe contou que ele era um alienígena de outro planeta e o super-herói conhecido como Omni-Man. Mark foi informado de que os vitrumitas são praticamente uma raça de super-homens pacíficos. Mark descobriu que seu pai viera à Terra para protegê-la e que um dia Mark desenvolveria superpoderes como Nolan. [ 1 ] Todos os dias, ele esperava que seus poderes se manifestassem. Certo dia, em seu último ano do ensino médio , enquanto trabalhava em seu emprego de meio período , ele lançou um saco de lixo pelos ares.', 2, './img/INVINCIBLE.webp', 12),
(42, 'Pia do Rafael', 200.00, 'Pia da casa do Rafael', 2, './img/imagem_2025-11-21_195219867.png', 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nasc`) VALUES
(1, 'Gabriel Luiz Oliveira da Silva', 'gabrielluiz3462@outlook.com', '451ab8cf36e5cda7cbd7e84e5a5545c8', '1999-10-06'),
(2, 'Pedro da Silva Silva Silva', 'pedrodasilvasilvasilvasilva@gmail.com', '0f5aaaf14d9a2d371853e46119abba27', '1999-10-05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
