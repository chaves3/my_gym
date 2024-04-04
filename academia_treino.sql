-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 12:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia_treino`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes_exercicios`
--

CREATE TABLE `clientes_exercicios` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `peito` varchar(255) NOT NULL,
  `costas` varchar(255) NOT NULL,
  `biceps` varchar(255) NOT NULL,
  `triceps` varchar(255) NOT NULL,
  `ombro` varchar(255) NOT NULL,
  `quadriceps` varchar(255) NOT NULL,
  `posterior_coxas` varchar(255) NOT NULL,
  `pantorrilha` varchar(255) NOT NULL,
  `trapezio` varchar(255) NOT NULL,
  `gluteo` varchar(255) NOT NULL,
  `cardio` varchar(255) NOT NULL,
  `abidominal` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes_exercicios`
--

INSERT INTO `clientes_exercicios` (`id`, `nome_cliente`, `peito`, `costas`, `biceps`, `triceps`, `ombro`, `quadriceps`, `posterior_coxas`, `pantorrilha`, `trapezio`, `gluteo`, `cardio`, `abidominal`, `id_cliente`) VALUES
(3, 'Matheus', 'Supino 30°, Supino com halteres, crucifixo', 'Puxador triângulo, puxador frontal, remada cavalo da morte', 'Rosca martelo, rosca sentado com halter, rosca ivertida', 'Tríceps testa, Tríceps corda, Tríceps supinado', 'Elevação frontal', 'Agachamento, Cadeira extensora, hack', 'Stiff, Cadeira flexora, mesa flexora', 'Panturrilha em pé, Panturrilha no step, Panturrilha no na maquina sentado', 'Adução de escápula na polia baixa, Adução de escápula na polia baixa', 'Step up, Afundo com halteres', 'Pular corda, Esteira ', 'supra', 8),
(17, 'Guilherme ', 'supino reto, supino inclinado, crossover', 'puxador frontal, puxador triangulo, remada', 'rosca sentado, rosca em pé, rosca martelo', 'triângulo, corda, frânces', 'desenvolvimento com halteres, desenvolvimento na máquina ', 'cadeiera, extensora, leg press, agachamento', 'cadeira flexora, mesa flexora', 'panturrilha em pé, panturrilha na maquina', 'com halteres de frente ', 'ELEVAÇÃO PÉLVICA', 'esteira', 'abdominal reto', 17),
(18, 'Maria ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 18),
(19, 'Caroline', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 19),
(20, 'Cara que trabalha na Cs', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 21);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `id_cor_cliente` int(11) NOT NULL,
  `cor1` varchar(255) NOT NULL,
  `cor2` varchar(255) NOT NULL,
  `cor3` varchar(255) NOT NULL,
  `cor4` varchar(255) NOT NULL,
  `cor5` varchar(255) NOT NULL,
  `cor6` varchar(255) NOT NULL,
  `cor7` varchar(255) NOT NULL,
  `cor8` varchar(255) NOT NULL,
  `cor9` varchar(255) NOT NULL,
  `cor10` varchar(255) NOT NULL,
  `cor11` varchar(255) NOT NULL,
  `cor12` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `id_cor_cliente`, `cor1`, `cor2`, `cor3`, `cor4`, `cor5`, `cor6`, `cor7`, `cor8`, `cor9`, `cor10`, `cor11`, `cor12`) VALUES
(1, 8, 'red', 'blue', 'blue', 'red', 'red', 'orange', 'orange', 'orange', 'blue', 'orange', 'yellow', 'yellow'),
(3, 17, 'red', 'red', 'blue', 'blue', 'blue', 'orange', 'orange', 'orange', 'blue', 'red', 'yellow', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dia_nascimento` varchar(255) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `ativo` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `nome`, `email`, `telefone`, `senha`, `dia_nascimento`, `mes`, `ano`, `sexo`, `objetivo`, `status`, `foto`, `cargo`, `ativo`) VALUES
(18, 'Maria ', 'maria.batatinha2021@gmail.com\r\n', '1281040486', 'Imperial83@', '11', '09', '1974', 'Feminino', 'emagrecimento', 'offline', 'foto', 1, 2),
(19, 'Caroline', 'carolinerocha123@gmail.com', '1296288874', 'Imperial83@', '15', '01', '2001', 'Feminino', 'emagreciemnto', 'offilne', 'foto', 1, 2),
(20, 'Gomes de carvalho', 'lucasccp09@gmail.com', '1282103275', 'Imperial82@', '17', '10', '1998', 'masculino', '', 'offline', '66083a79df19f.jpg', 2, 1),
(21, 'Cara que trabalha na Cs', 'Marcelojf.98@gmail.com', '1297272971', 'Imperial83@', '24', '11', '1998', 'masculino', 'hipertrofia', 'offline', '66083db93d4c0.jpg', 1, 2),
(26, 'matheus chaves  da silva', 'matheussilvachaves19@gmail.com', '2997756151', '$2y$10$iusOzf/aQs/JmjrQo/jzzekArurcLmTRL8BUdM6rtKBnjxMyz.kwi', '27', '1', '1960', 'masculino', 'emagrecimento', 'offline', '660dcbb299457.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_clientes_online`
--

CREATE TABLE `tb_clientes_online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_clientes_online`
--

INSERT INTO `tb_clientes_online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(6, '::1', '2024-03-06 13:47:34', '65e89e084041d'),
(7, '::1', '2024-03-07 15:04:20', '65ea019e46851'),
(8, '::1', '2024-03-08 11:52:36', '65eb26327a565'),
(9, '::1', '2024-03-11 14:25:48', '65ef3e94d194f'),
(10, '::1', '2024-03-13 20:11:27', '65f2327c0a95a'),
(11, '::1', '2024-03-16 00:27:06', '65f5117898632'),
(12, '::1', '2024-03-22 19:56:24', '65fdfe09ad494'),
(13, '::1', '2024-03-25 14:38:32', '6601b60915775'),
(14, '::1', '2024-03-26 22:00:45', '66036ed66568a'),
(15, '::1', '2024-03-27 15:12:09', '6604616e25ee7'),
(16, '::1', '2024-03-27 16:36:11', '6604708d63f38'),
(17, '::1', '2024-03-27 19:23:57', '66049c34d0817'),
(18, '::1', '2024-03-28 13:09:16', '6605960cd7911'),
(19, '::1', '2024-03-28 13:51:46', '66059fd59297d'),
(20, '::1', '2024-03-30 13:25:25', '66083b16e5eca'),
(21, '::1', '2024-03-30 14:13:28', '6608471d97bc5'),
(22, '::1', '2024-04-02 14:51:56', '660c446f079cd'),
(23, '::1', '2024-04-03 16:28:46', '660dada67cf8a'),
(24, '::1', '2024-04-03 17:49:39', '660dc0900c52c'),
(25, '::1', '2024-04-03 18:07:03', '660dc49e4e805'),
(26, '::1', '2024-04-03 18:10:06', '660dc5736969d'),
(27, '::1', '2024-04-03 18:26:52', '660dc979c3946');

-- --------------------------------------------------------

--
-- Table structure for table `tb_musculos`
--

CREATE TABLE `tb_musculos` (
  `id` int(11) NOT NULL,
  `peito` varchar(255) NOT NULL,
  `costas` varchar(255) NOT NULL,
  `biceps` varchar(255) NOT NULL,
  `triceps` varchar(255) NOT NULL,
  `ombro` varchar(255) NOT NULL,
  `quadriceps` varchar(255) NOT NULL,
  `posterior_coxas` varchar(255) NOT NULL,
  `pantorrilha` varchar(255) NOT NULL,
  `trapezio` varchar(255) NOT NULL,
  `gluteo` varchar(255) NOT NULL,
  `cardio` varchar(255) NOT NULL,
  `abidominal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_musculos`
--

INSERT INTO `tb_musculos` (`id`, `peito`, `costas`, `biceps`, `triceps`, `ombro`, `quadriceps`, `posterior_coxas`, `pantorrilha`, `trapezio`, `gluteo`, `cardio`, `abidominal`) VALUES
(2, 'Supino 30°', 'Remada cavalo da morte ', 'Rosca scott', 'Tríceps corda ', 'Elevação lateral', 'Cadeira extensora', 'Cadeira flexora ', 'Panturrilha no step', 'Encolhimento de ombros com barra', 'Afundo com halteres', 'Esteira ', 'infra'),
(3, 'Crucifixo máquina ', 'Puxador triângulo ', 'Rosca martelo ', 'Tríceps testa ', 'Elevação frontal', 'Agachamento ', 'Stiff', 'Panturrilha em pé', 'Adução de escápula na polia baixa', 'Step up ', 'Pular corda', 'supra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_visitas`
--

CREATE TABLE `tb_visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes_exercicios`
--
ALTER TABLE `clientes_exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_clientes_online`
--
ALTER TABLE `tb_clientes_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_musculos`
--
ALTER TABLE `tb_musculos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_visitas`
--
ALTER TABLE `tb_visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes_exercicios`
--
ALTER TABLE `clientes_exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_clientes_online`
--
ALTER TABLE `tb_clientes_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_musculos`
--
ALTER TABLE `tb_musculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_visitas`
--
ALTER TABLE `tb_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
