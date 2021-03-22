-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2018 às 05:25
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `CodAdm` int(6) NOT NULL,
  `NomeAdm` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `EmailAdm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SenhaAdm` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `SexoAdm` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `DataNascAdm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`CodAdm`, `NomeAdm`, `EmailAdm`, `SenhaAdm`, `SexoAdm`, `DataNascAdm`) VALUES
(123456, 'Pedro Nogueira Gonçalves', 'pedraobr96@hotmail.com', '14167464', 'Masculino', '1996-05-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `InicioEv` datetime NOT NULL,
  `FinalEv` datetime NOT NULL,
  `CodEv` int(6) NOT NULL,
  `NomeEv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DescEv` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `RealizadorEv` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `LocalEv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CapacidadeEv` int(4) NOT NULL,
  `ImagemEv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CodAdm` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`InicioEv`, `FinalEv`, `CodEv`, `NomeEv`, `DescEv`, `RealizadorEv`, `LocalEv`, `CapacidadeEv`, `ImagemEv`, `CodAdm`) VALUES
('2018-07-02 14:00:00', '2018-07-03 16:00:00', 1, 'Curso fundamental de programação web ', 'Curso voltado para a área de desenvolvimento web, com o objetivo de introduzir os conceitos básicos de web e das linguagens principais utilizadas atualmente para desenvolver sites (HTML5, CSS3 e JavaScript). O curso tem como objetivo inicializar os alunos no processo de criação de aplicações voltadas à internet, para que possam dar seus primeiros passos nessa área.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 200, '_img/img-evento.jpg', 123456),
('2018-07-03 14:00:00', '2018-07-04 16:00:00', 2, 'Curso fundamental de programação mobile ', 'Curso voltado para a área de desenvolvimento mobile, com o objetivo de introduzir os conceitos básicos de desenvolvimento para dispositivos móveis e das linguagens principais utilizadas atualmente para desenvolver aplicativos (Java e Swift). O curso tem como objetivo inicializar os alunos no processo de criação de aplicações mobile, para que possam dar seus primeiros passos nessa área.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 100, '_img/img-evento.jpg', 123456),
('2018-06-24 12:00:00', '2018-06-25 13:00:00', 3, 'Curso Blender 3D', 'Aprenda modelagem 3D do básico ao modo Game com o Blender. O Blender é uma potente suite de animação, modelagem, criação interativa, pós-produção, com suporte para uma grande quantidade de formatos de arquivo. O uso do Blender é totalmente gratuito para qualquer propósito, incluindo o uso comercial e para educação. Este curso irá incentivar a sua criatividade, ensinando os princípios da modelagem 3D através da ferramenta Blender.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 100, '_img/img-evento.jpg', 123456),
('2018-06-25 10:00:00', '2018-06-25 12:00:00', 4, 'Curso Completo de Python', 'Este Curso de Python ensina o desenvolvimento com Python e Kivy de aplicações profissional para Desktop e/ou dispositivos móveis: Android, iOS, Windows, Linux e MacOSX. Aborda de forma simples, numa linguagem fácil, a construção de software e a geração de produtos digitais destinados a comercialização nas principais lojas de Apps: AppStore e GooglePlay.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 1, '_img/img-evento.jpg', 123456),
('2018-05-05 15:00:00', '2018-05-06 17:00:00', 5, 'Curso de Desenvolvimento Android', '\r\nTá cheio de ideias de aplicativos e não sabe como começar? Quer iniciar sua carreira como desenvolvedor de aplicativos para Android? Este curso de desenvolvimento Android vai te ensinar na prática como criar e programar seus aplicativos para Android, usando a linguagem Java.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 100, '_img/img-evento.jpg', 123456),
('2017-11-03 15:00:00', '2017-11-05 14:00:00', 6, 'Curso de Ruby', 'Ruby é uma linguagem de programação multi-plataforma, totalmente orientada a objetos que pode ser utilizada para construir uma variedade imensa de  programas. Com Ruby, você pode construir jogos com a gem gosu, desenvolver páginas web e construir programas de computador.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 150, '_img/img-evento.jpg', 123456),
('2017-09-07 16:00:00', '2017-11-07 16:00:00', 7, 'Desenvolvimento mobile com Xamarin', 'Você aprenderá a desenvolver aplicativos com Xamarin, a plataforma que te permite desenvolver para Android, iOS, WP e UWP de uma única vez. Com o Xamarin você não precisa aprender Java para programar no Android, Swift ou Objective-C para iOS, você só precisa saber C# e conseguirá desenvolver para qualquer plataforma.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 150, '_img/img-evento.jpg', 123456),
('2017-11-14 15:00:00', '2017-11-15 14:00:00', 8, 'Curso de Unity', 'Este curso foi criado de desenvolvedor para futuros desenvolvedores de jogos, com foco total em produção 3D, nele é apresentado diversas ferramentas e funcionalidades dos mais diversos recursos dentro da Unity 2017. Todo conteúdo foi criado utilizado integralmente a Unity 2017, por esse motivo está sendo utilizado os recursos mais atualizados, como assets, ferramentas e C# scripts.', 'Freedom Lancers', 'PUC Campinas - Campus 1', 200, '_img/img-evento.jpg', 123456);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos_usuario`
--

CREATE TABLE `eventos_usuario` (
  `CodEv` int(6) NOT NULL,
  `CodUs` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `eventos_usuario`
--

INSERT INTO `eventos_usuario` (`CodEv`, `CodUs`) VALUES
(1, 66960298),
(4, 66960298),
(5, 66960298);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `CodUs` int(8) NOT NULL,
  `NomeUs` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `EmailUs` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SenhaUs` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `SexoUs` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `DataNascUs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`CodUs`, `NomeUs`, `EmailUs`, `SenhaUs`, `SexoUs`, `DataNascUs`) VALUES
(12803339, 'Gabriel Floriani', 'floriani@hotmail.com', '14155253', 'Masculino', '1996-03-24'),
(66960298, 'João Matheus', 'joao@hotmail.com', '14273213', 'Masculino', '1990-02-17'),
(16734342, 'Luan Sobreira', 'luan@hotmail.com', '16500209', 'Masculino', '1993-01-22'),
(96255623, 'Rafael Teixeira', 'rafael@hotmail.com', '16170961', 'Masculino', '1995-08-12');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`CodAdm`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`CodEv`,`CodAdm`),
  ADD KEY `Admins_Eventos` (`CodAdm`);

--
-- Indexes for table `eventos_usuario`
--
ALTER TABLE `eventos_usuario`
  ADD PRIMARY KEY (`CodEv`,`CodUs`),
  ADD KEY `Usuarios_Eventos_Usuario` (`CodUs`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CodUs`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `Admins_Eventos` FOREIGN KEY (`CodAdm`) REFERENCES `admins` (`CodAdm`);

--
-- Limitadores para a tabela `eventos_usuario`
--
ALTER TABLE `eventos_usuario`
  ADD CONSTRAINT `Eventos_Eventos_Usuario` FOREIGN KEY (`CodEv`) REFERENCES `eventos` (`CodEv`),
  ADD CONSTRAINT `Usuarios_Eventos_Usuario` FOREIGN KEY (`CodUs`) REFERENCES `usuarios` (`CodUs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
