-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/12/2025 às 18:10
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
  `comprados` int(11) DEFAULT 0,
  `desconto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `descricao`, `quantidade`, `imagem`, `categoria_id`, `comprados`, `desconto`) VALUES
(34, 'Telha De PVC Colonial 3,94x0,86 Cerâmica', 169.99, 'A Telha Nortelit Pvc Colonial 3.94x0.88 Ceramica é a escolha perfeita para quem busca qualidade e durabilidade. Com rendimento de 2.96 m², essa telha é ideal para coberturas de diversos tipos de construções. Fabricada pela renomada marca Nortelit, você pode ter a certeza de estar adquirindo um produto de alta qualidade. Feita em PVC, essa telha possui espessura de 2 mm, garantindo resistência e proteção contra intempéries. Com comprimento de 394 cm e largura de 86 cm, ela se adapta facilmente a diferentes projetos. Não perca a oportunidade de adquirir essa telha de excelente custo-benefício para a sua obra.', 300, './img/a05c51329b-xc7szemfr6.webp', 7, 13, 8),
(39, 'Quadro Distribuição Embutir Para 3/4 Disjuntor', 146.90, 'O Quadro de Distribuição de Embutir Tigre é ideal para instalações elétricas residenciais, comerciais ou industriais que exigem organização, segurança e praticidade.  Projetado para comportar 3 a 4 disjuntores, ele permite um acabamento limpo e discreto, sendo embutido diretamente na parede.    Fabricado com materiais de alta resistência e durabilidade, garante proteção eficiente contra choques elétricos e curto-circuitos, mantendo o padrão de qualidade reconhecido da Tigre.', 281, './img/quadroeletrico.png', 9, 19, 15),
(40, 'Tubo Pvc 60mm Soldável 6m Krona', 199.90, 'O Tubo Soldável é uma peça essencial para conduzir fluidos por longas distâncias, mantendo a integridade da instalação e preservando as propriedades do fluido. Desenvolvido para uso em instalações prediais de água fria, garante segurança e eficiência no transporte de água. Com uma vida útil de até 50 anos, conforme ensaios de resistência, é uma opção confiável e durável para sistemas hidráulicos, ideal para projetos que demandam qualidade e longevidade.', 397, './img/tubo_cano_pvc_soldavel_cola_de_60mm_2_barra_6_metros_1659_1_20200224170914.webp', 11, 35, 20),
(41, 'Tijolo Cerâmico de Vedação 14x19x39CM', 73.50, 'O Tijolo Cerâmico de Vedação Tijolo Cerâmico de Vedação 14x19x39CM é um item imprescindível dentro da construção civil, sendo utilizado na alvenaria de vedação e normalmente na estruturação convencional com lajes, ferro, aço, vigas, pilares e também na construção de paredes internas.  A função deste Tijolo Cerâmico de Vedação Tijolo Cerâmico de Vedação 14x19x39CM  é fechar as lacunas de construções comerciais e residenciais. Recebe o nome popular de tijolo baianinho ou bloco baianinho.  Os furos horizontais desse bloco cerâmico facilitam a passagem de tubulações e fios, uma de suas principais características é que ele não precisa ser tão resistente pois conta com o apoio de vigas, armações e pilares para dar suporte e sustentação à estrutura da obra.', 2, './img/tijolo.png', 12, 0, 8),
(42, 'Suvinil Toque Fosco Completo Tempero Sírio 0.8L', 81.90, 'A tinta Suvinil Toque Fosco Completo é perfeita para você ter um acabamento fosco impecável, superliso e uniforme nas paredes internas de casa. Na escala de benefícios, ela entrega máxima performance em pintura lisa e uniforme, além de boa resistência à limpeza e maior disfarce de imperfeições em comparação com a Suvinil Toque Seda e a Suvinil Toque Brilho.', 142, './img/1.webp', 13, 1, 10),
(43, 'Rodapé de MDF 7cm x 15mm x 2.20m', 27.97, 'Os rodapés possuem como principal função proteger a parede de alguns fatores como o atrito com móveis e calçados, mas seu acabamento entre piso e parede também pode combinar perfeitamente com a decoração. A linha MDF CASABLANCA é uma solução inovadora no mercado de rodapés para construção civil. Rodapés produzidos em MDF, revestidos com papel melamínico, já acabado, sem necessidade de pintura.', 300, './img/imagem_2025-12-12_125346279.png', 7, 0, 8),
(44, 'Frontal / Painel / Parede de pinus tratado', 41.12, 'A madeira de pinus apresenta o que chamamos de “nó”, que são pequenas manchas mais escuras, na maior parte das vezes, arredondada na madeira de pinus. Isso é uma característica comum nessa espécie de madeira e não representa nenhum risco à integridade da mesma, sendo apenas um elemento visual. Todos os nossos produtos são feitos utilizando o pinus eliotti, um pinus de qualidade superior, com menor presença de nós que não pegam o produto do tratamento, melhor resistência em relação a torções e melhor qualidade de acabamento.', 213, './img/imagem_2025-12-12_125723923.png', 7, 0, 8),
(45, 'Conjunto Interruptor Simples 10A 250V', 15.34, 'Miluz é a linha de interruptores e tomadas da Schneider Electric que combina com tudo no seu dia a dia.  Ganhadora do prêmio IF de design de produto em 2014 e do Brasil Design Award 2014, a Miluz deixa sua casa ainda mais bonita e moderna em cada detalhe, além de ser um produto Green, ou seja, livre de substâncias tóxicas de acordo com as diretrizes RoHS e Reach.  Com uma versatilidade para compor qualquer ambiente, combine a linha Miluz com o sistema de canalização aparente Dexson para uma instalação limpa, ágil e segura.', 15, './img/imagem_2025-12-12_130044768.png', 9, 0, 8),
(46, 'Conjunto 4x2 02 Tomadas', 19.55, ' A Linha Elétrica MyX da Exatron destaca-se pelo seu design, qualidade e praticidade. Ela pode ser montada de acordo com a sua necessidade, são mais de 15 módulos disponíveis para a composição. Produzido em ABS com acabamento brilho, tem toda sua produção realizada pela Exatron.', 100, './img/imagem_2025-12-12_130310065.png', 9, 0, 8),
(47, 'Cimento CP II F 32 Todas as Obras 50kg Votoran', 33.00, 'Na hora de construir ou reformar, um item que não pode faltar é o cimento. É importante um produto de qualidade para não ter problemas futuros na obra. O Cimento CP II F 32 Todas as Obras 50 kg Votoran é ideal para reboco, contrapiso, concreto convencional e laje.', 322, './img/imagem_2025-12-12_130559503.png', 12, 0, 0),
(48, 'Areia Média Lavada Saco 20kg', 13.50, 'Areia média, especialmente selecionada garantindo uniformidade do agregado, ideal para o preparo de argamassa usada no assentamento de tijolos, blocos e chapisco e no reboco. qualidade e regularizações em sua reforma ou construção.', 231, './img/imagem_2025-12-12_130925700.png', 12, 0, 8),
(49, 'Rolo de pintura 23 cm', 22.99, 'O rolo de lã para pintura profissional 23 cm com cabo da castor apresenta maior rendimento no alastramento da tinta. Melhor cobertura e penetração da tinta em superfícies ásperas e irregulares. Carrega mais tinta por conta da sua lã alta.', 100, './img/imagem_2025-12-12_131144779.png', 13, 0, 8);

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
(11, 'João da Silva', 'joao@gmail.com', '$2y$10$cnZ0gGFErB3WM1C1W4tccOk4jThgMVzw/mnEfm9Hc09vy6ifLEiX.', '1998-11-10');

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
