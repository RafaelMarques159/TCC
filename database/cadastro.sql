-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/12/2025 às 01:07
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
(7, 'Acabamento', 'imagescategoria/1765405070-adelmarc-81-3905.jpg'),
(9, 'Elétrica', 'imagescategoria/1765405078-unnamed.jpg'),
(11, 'Hidráulica', 'imagescategoria/1765405090-2677.jpg'),
(12, 'Alvenaria', 'imagescategoria/1765405144-1.jpg'),
(13, 'Tintas e Pintura', 'imagescategoria/1765405216-shutterstock233670241.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id_item` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `produto_id` int(10) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unit` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_item`, `pedido_id`, `produto_id`, `quantidade`, `preco_unit`, `subtotal`) VALUES
(1, 1, 40, 1, 300.30, 300.30),
(2, 2, 34, 13, 199.90, 2598.70);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `usuario_id`, `total`, `criado_em`) VALUES
(1, 1, 300.30, '2025-12-06 16:09:43'),
(2, 10, 2598.70, '2025-12-06 17:04:06');

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
  `categoria_id` int(11) NOT NULL,
  `comprados` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `descricao`, `quantidade`, `imagem`, `categoria_id`, `comprados`) VALUES
(34, 'Telha De PVC Colonial 3,94x0,86 Cerâmica', 169.99, 'A Telha Nortelit Pvc Colonial 3.94x0.88 Ceramica é a escolha perfeita para quem busca qualidade e durabilidade. Com rendimento de 2.96 m², essa telha é ideal para coberturas de diversos tipos de construções. Fabricada pela renomada marca Nortelit, você pode ter a certeza de estar adquirindo um produto de alta qualidade. Feita em PVC, essa telha possui espessura de 2 mm, garantindo resistência e proteção contra intempéries. Com comprimento de 394 cm e largura de 86 cm, ela se adapta facilmente a diferentes projetos. Não perca a oportunidade de adquirir essa telha de excelente custo-benefício para a sua obra.', 300, './img/a05c51329b-xc7szemfr6.webp', 7, 13),
(39, 'Quadro Distribuição Embutir Para 3/4 Disjuntor', 146.90, 'O Quadro de Distribuição de Embutir Tigre é ideal para instalações elétricas residenciais, comerciais ou industriais que exigem organização, segurança e praticidade.  Projetado para comportar 3 a 4 disjuntores, ele permite um acabamento limpo e discreto, sendo embutido diretamente na parede.    Fabricado com materiais de alta resistência e durabilidade, garante proteção eficiente contra choques elétricos e curto-circuitos, mantendo o padrão de qualidade reconhecido da Tigre.', 286, './img/quadroeletrico.png', 9, 14),
(40, 'Tubo Pvc 60mm Soldável 6m Krona', 199.90, 'O Tubo Soldável é uma peça essencial para conduzir fluidos por longas distâncias, mantendo a integridade da instalação e preservando as propriedades do fluido. Desenvolvido para uso em instalações prediais de água fria, garante segurança e eficiência no transporte de água. Com uma vida útil de até 50 anos, conforme ensaios de resistência, é uma opção confiável e durável para sistemas hidráulicos, ideal para projetos que demandam qualidade e longevidade.', 399, './img/tubo_cano_pvc_soldavel_cola_de_60mm_2_barra_6_metros_1659_1_20200224170914.webp', 11, 33),
(41, 'Tijolo Cerâmico de Vedação 14x19x39CM', 73.50, 'O Tijolo Cerâmico de Vedação Tijolo Cerâmico de Vedação 14x19x39CM é um item imprescindível dentro da construção civil, sendo utilizado na alvenaria de vedação e normalmente na estruturação convencional com lajes, ferro, aço, vigas, pilares e também na construção de paredes internas.  A função deste Tijolo Cerâmico de Vedação Tijolo Cerâmico de Vedação 14x19x39CM  é fechar as lacunas de construções comerciais e residenciais. Recebe o nome popular de tijolo baianinho ou bloco baianinho.  Os furos horizontais desse bloco cerâmico facilitam a passagem de tubulações e fios, uma de suas principais características é que ele não precisa ser tão resistente pois conta com o apoio de vigas, armações e pilares para dar suporte e sustentação à estrutura da obra.', 2, './img/tijolo.png', 12, 0),
(42, 'Suvinil Toque Fosco Completo Tempero Sírio 0.8L', 81.90, 'A tinta Suvinil Toque Fosco Completo é perfeita para você ter um acabamento fosco impecável, superliso e uniforme nas paredes internas de casa. Na escala de benefícios, ela entrega máxima performance em pintura lisa e uniforme, além de boa resistência à limpeza e maior disfarce de imperfeições em comparação com a Suvinil Toque Seda e a Suvinil Toque Brilho.', 143, './img/1.webp', 13, 0);

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
(2, 'Pedro da Silva Silva Silva', 'pedrodasilvasilvasilvasilva@gmail.com', '0f5aaaf14d9a2d371853e46119abba27', '1999-10-05'),
(10, 'Não Sei da Silva Caravalho', 'naosei@gmail.com', '$2y$10$F1DvPeO0/O.z65us3IdiZuNqLKl4kC2gCc4aki3bNH0qvCzDXQsAu', '2001-11-10');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_itens_pedido_pedidos` (`pedido_id`),
  ADD KEY `fk_itens_pedido_produtos` (`produto_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedidos_usuarios` (`usuario_id`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `fk_itens_pedido_pedidos` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_itens_pedido_produtos` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id_produto`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
