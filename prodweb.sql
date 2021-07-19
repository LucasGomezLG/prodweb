-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2020 a las 23:46:04
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prodweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `id_padre`, `active`) VALUES
(1, 'Zapatillas', 0, 1),
(2, 'Pantalones', 0, 1),
(3, 'Remeras', 0, 1),
(4, 'Buzos', 0, 1),
(5, 'Futbol', 1, 1),
(6, 'Running', 1, 1),
(7, 'Pantalon Corto', 2, 1),
(8, 'Pantalon Largo', 2, 1),
(9, 'Manga Corta', 3, 1),
(10, 'Manga Larga', 3, 1),
(11, 'Con Cierre', 4, 1),
(12, 'Sin Cierre', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `active`) VALUES
(1, 'AdidasOriginals', 1),
(2, 'AdidasRunning', 1),
(3, 'AdidasFútbol', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `img` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` float NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `destacado` int(11) NOT NULL DEFAULT 0,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_marca`, `id_categoria`, `nombre`, `img`, `descripcion`, `precio`, `active`, `destacado`, `ranking`) VALUES
(1, 2, 6, 'Zapatillas Phosphere', '1.jpg', 'Buscá nuevas experiencias. Estas zapatillas tienen un look muy llamativo y ofrecen una total comodidad. El exterior de tejido circular sin costuras sujeta el pie y la mediasuela ultrasuave les brinda una máxima amortiguación a cada uno de tus pasos. La suela de caucho de color y las 3 Tiras en el costado atraen todas las miradas.', 4500, 1, 0, 0),
(2, 2, 6, 'Zapatillas Pureboost', '2.jpg', 'Sentí el ritmo de la ciudad bajo tus pies. Estas zapatillas diseñadas para correr durante todo el año ofrecen una comodidad y una tracción insuperables. Traen un exterior de nylon balístico que repele el agua y la nieve e incorporan amortiguación receptiva que te devuelve la energía a cada paso que das. La suela de gran resistencia al desgaste garantiza un excelente agarre incluso en superficies resbaladizas.', 7500, 1, 1, 0),
(3, 3, 5, 'Botines Goletoo VII', '3.jpg', 'Dominá a tus rivales en los partidos intensos sobre canchas de terreno firme. Estos botines de fútbol con exterior sintético resistente y liviano les brindan una sensación de ligereza a tus pies. La suela te permite realizar movimientos veloces sin perder el control en césped natural seco.', 6300, 1, 0, 0),
(4, 3, 5, 'Botines Malice', '4.jpg', 'Diseñados para zagueros, estos botines de rugby son una plataforma estable para penetrar corriendo y pateando. El exterior sintético con cordones asimétricos ofrece una superficie de impacto limpia, y los puntos en relieve del antepié aportan un mayor control de la pelota. La suela ligera imprime agilidad a tus movimientos en terreno blando.\r\n', 3500, 1, 0, 0),
(5, 1, 8, 'Pantalón Flamestrike', '5.jpg', 'Esta colección se inspira en la cultura futbolera para darle nueva vida a algunos de los diseños adidas más emblemáticos de los años 90 y la década de 2000. Este pantalón deportivo luce un diseño Flamestrike en las piernas. Está confeccionado en un entretejido suave y presenta un moderno corte cónico.', 3400, 1, 1, 0),
(6, 1, 8, 'Pantalón Bootleague', '6.jpg', 'Este pantalón rompevientos inspirado en las camisetas de los arqueros de fútbol te envuelve con comodidad y te permite moverte con total libertad.+ Está confeccionado en un tejido de poliéster suave y resistente y luce las clásicas 3 Tiras en los costados. Los bolsillos frontales y traseros ofrecen un lugar seguro para esos pequeños objetos indispensables.', 4000, 1, 0, 0),
(7, 2, 7, 'Shorts Run It', '7.jpg', 'Sal a correr bajo el sol o entrená al aire libre en el parque. Estos shorts de running para hombre te ofrecen máxima comodidad. Su tejido transpirable y de secado rápido mantiene la piel fresca y seca y su diseño elástico acompaña cada uno de tus movimientos. Incorporan un bolsillo para las llaves y un estampado inspirado en el paisaje urbano.', 1900, 1, 0, 0),
(8, 2, 7, 'Shorts Own the Run', '8.jpg', 'No dejes que el calor se interponga en tus metas. Estos shorts de running están confeccionados en tejido transpirable de secado rápido que te ayuda a combatir las altas temperaturas. Presentan un diseño con calzoncillo interior y cintura de corte alto para darte un ajuste seguro.', 1600, 1, 0, 0),
(9, 1, 9, 'Remera Outline', '9.jpg', 'Esta colección se inspira en la cultura futbolera para darle nueva vida a algunos de los diseños adidas más emblemáticos de los años 90 y la década de 2000. El gran logo del Trifolio en el pecho sobre las 3 Tiras aporta una actitud única a esta remera. Está confeccionada en punto simple 100% algodón muy cómodo y suave al tacto.', 1500, 1, 1, 0),
(10, 2, 9, 'Remera Running 3', '10.jpg', 'Concentrate en tu rendimiento, no en tu sudor. Esta remera de running liviana está hecha en tejido absorbente que te ayuda a mantenerte fresco y seco. Presenta un cómodo ajuste ceñido al cuerpo que no es ni muy estrecho ni muy holgado.', 1200, 1, 0, 0),
(11, 1, 10, 'Remera Trifolio History', '11.jpg', 'Deporte. Unidad. Diversidad. Estas son las cosas que ha representado el Trifolio desde su debut en los años 70. Esta remera manga larga adidas commemora la evolución del Trifolio con estampados a lo largo de las mangas. Incorpora una etiqueta tejida en el dobladillo que describe la historia del Trifolio.', 1800, 1, 0, 0),
(12, 2, 10, 'Remera Alphaskin', '12.jpg', 'Muy diferente a una capa base tradicional, Alphaskin incorpora una estructura preformada que se adapta a los movimientos del cuerpo al realizar deporte. Esta remera de training brinda un ajuste de compresión liviano y una sensación de sujeción. Está confeccionada en tejido transpirable de secado rápido con protección contra los rayos UV incorporada.', 2100, 1, 0, 0),
(13, 1, 12, 'Buzo Trifolio', '13.jpg', 'El logo del Trifolio debutó en los Juegos Olímpicos de Múnich de 1972 y desde entonces no ha parado de dejar su huella por dondequiera que va. Este cómodo Buzo con capucha celebra su legado con un logo grande del Trifolio que evoca el auténtico estilo deportivo. Su diseño en felpa lo hace cálido y suave.', 3200, 1, 1, 0),
(14, 1, 12, 'Buzo Toolkit', '14.jpg', 'Este buzo con capucha te diferencia del montón. Está confeccionado en felpa suave y cómodo con los puños y el dobladillo acanalados para mantenerlo en su lugar en todo momento. El estampado vintage en el pecho demuestra tu amor por adidas Skateboarding.', 4300, 1, 0, 0),
(15, 3, 11, 'Buzo River Plate', '15.jpg', 'Envolvéte en los únicos colores que importan. Este buzo con capucha adidas se destaca entre la multitud gracias al inconfundible rojo y blanco de River Plate. Está confeccionado en suave felpa francesa para una total comodidad. La capucha con forro interno te permite aislarte del mundo exterior cuando vos querás.', 4700, 1, 0, 0),
(16, 3, 11, 'Buzo Alemania', '16.jpg', 'Súbete la cremallera de esta chaqueta cuando necesites sentir el legado del fútbol alemán. Su tejido suave y elástico acompaña todos tus movimientos. Luce el escudo de la selección germana en el pecho para que presumas de estilo.', 3400, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `pass`, `admin`, `nombre`, `apellido`, `email`) VALUES
(2, 'juanjo', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 'juan', 'gomez', 'juan@gmail.com'),
(3, 'philip', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 0, 'Phlip', 'Johnson', 'johasd@fadfas.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
