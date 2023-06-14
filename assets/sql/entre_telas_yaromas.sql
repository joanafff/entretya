-----------------------------------------------------------
--------- Base de datos: `entre_telas_yaromas`-------------
-- --------------------------------------------------------


------------Tabla Categorias----------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `descripcion`) VALUES
(1, 'Sacos Térmicos de Semillas', 'Sacos rellenos de semillas y flores aromáticas, con funda de diferentes estampados 100% algodón y extraible para lavar.'),
(2, 'Saquitos Aromáticos', 'Bolsitas de tela aromáticas para armarios y cajones. Bolsitas de diferentes estampados y formas. Relleno: flores de lavanda, rosas, azahar, tila o romero.'),
(3, 'Jabones Naturales', 'Jabones elaborados con aceites y productos naturales y ecológicos. Saponificación en frío.\nPresentados en bolsitas de tela 100% algodón.'),
(4, 'Cosméticos Naturales', 'Bálsamos y ungüentos elaborados con ingredientes 100% naturales .');



-------------- Tabla Milista ------------------

--
-- Estructura de tabla para la tabla `milista`
--

CREATE TABLE `milista` (
  `id_usuario` int NOT NULL,
  `id_producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `milista`
--

INSERT INTO `milista` (`id_usuario`, `id_producto`) VALUES
(1, 12),
(1, 5),
(1, 3);



---------------Tabla Productos------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponibilidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen1` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `imagen2` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen3` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `disponibilidad`, `imagen1`, `imagen2`, `imagen3`, `id_categoria`) VALUES
(1, 'Saco Térmico Cervical', 'Saco térmico para el alivio de las cervicales en frío o en caliente.<br />\r\nRelleno de trigo y flores de lavanda.<br />\r\nCon funda 100% algodón y de diferentes estampados.<br />\r\nFunda extraíble para fácil lavado.<br />\r\n<br />\r\nMODO DE EMPLEO: <br />\r\n- Para su uso en caliente: Calentar en microondas 2 minutos y aplicar en la zona deseada del cuerpo. <br />\r\n- Para su uso en frío: Guardar en la nevera durante unas horas antes de aplicar en la zona deseada.<br />\r\n<br />\r\nDIMENSIONES: 35 cm de largo x 12 cm de ancho <br />\r\n<br />\r\nPESO APROX: 600 gr.', '15.00', 'disponible', 'cerv1.jpg', 'cerv2.jpg', 'cerv3.jpg', 1),
(2, 'Saco Térmico Lumbar', 'Saco térmico para el alivio de los lumbares en frío o en caliente.<br />\r\nRelleno de trigo y flores de lavanda.<br />\r\nCon funda 100% algodón y de diferentes estampados.<br />\r\nFunda extraíble para fácil lavado.<br />\r\n<br />\r\nMODO DE EMPLEO: <br />\r\n- Para su uso en caliente: Calentar en microondas 2 minutos y aplicar en la zona deseada del cuerpo. <br />\r\n- Para su uso en frío: Guardar en la nevera durante unas horas antes de aplicar en la zona deseada.<br />\r\n<br />\r\nDIMENSIONES: 42 cm de largo x 20 cm de ancho <br />\r\n<br />\r\nPESO APROX: 800 gr.', '20.00', 'disponible', 'lum1.jpg', 'lum2.jpg', 'lum3.jpg', 1),
(3, 'Antifaz Térmico para Relajación', 'Antifaz térmico en frío ideal para la relajación de los ojos o para meditación.<br />\r\nRellenos de semillas de linet y flores de lavanda.<br />\r\nIncorporan una cinta elástica para ajustarse al contorno de la cabeza.<br />\r\nCon funda 100% algodón y de diferentes estampados.<br />\r\nFunda extraíble para fácil lavado.<br />\r\n<br />\r\nMODO DE EMPLEO:<br />\r\n- Para relajación: Poner el antifaz en la nevera durante unas horas y aplicar en frío sobre los ojos.<br />\r\n- Para meditación: A temperatura ambiente, a modo de antifaz para meditación.<br />\r\n<br />\r\nDIMENSIONES: 42 cm de largo x 20 cm de ancho <br />\r\n<br />\r\nPESO APROX: 800 gr.', '12.00', 'disponible', 'ant1.jpg', 'ant2.jpg', 'ant3.jpg', 1),
(4, 'Saquito Aromático en forma de Mariposa', 'Bolsita de tela con forma de mariposa, rellena de plantas aromáticas.<br />\r\nPara un olor agradable en armarios y cajones.<br />\r\n<br />\r\nRELLENO: <br />\r\n- Flores de lavanda<br />\r\n- Rosas<br />\r\n- Azahar<br />\r\n- Tila<br />\r\n- Romero<br />\r\n<br />\r\nDIMENSIONES:  9 cm x 12 cm', '8.00', 'disponible', 'mari1.jpg', 'mari2.jpg', 'mari3.jpg', 2),
(5, 'Saquito Aromático en forma de Gato', 'Bolsita de tela con forma de gato, rellena de flores y plantas aromáticas.<br />\r\nPara un olor agradable en armarios y cajones.<br />\r\n<br />\r\nRELLENO: <br />\r\n- Flores de lavanda<br />\r\n- Rosas<br />\r\n- Azahar<br />\r\n- Tila<br />\r\n- Romero<br />\r\n<br />\r\nDIMENSIONES:  9 cm x 12 cm', '8.00', 'disponible', 'gato1.jpg', 'gato2.jpg', 'gato3.jpg', 2),
(6, 'Saquito Aromático Estándar con corazón', 'Bolsita de tela en forma básica con corazón, rellena de flores y plantas aromáticas.<br />\r\nPara un olor agradable en armarios y cajones.<br />\r\n<br />\r\nRELLENO: <br />\r\n- Flores de lavanda<br />\r\n- Rosas<br />\r\n- Azahar<br />\r\n- Tila<br />\r\n- Romero<br />\r\n<br />\r\nDIMENSIONES:  9 cm x 12 cm', '8.00', 'disponible', 'bolsa1.jpg', 'bolsa2.jpg', 'bolsa3.jpg', 2),
(7, 'Bálsamo Reparador de Manos', 'Bálsamo para manos y otras zonas del cuerpo muy resecas.<br />\r\nEn envase de cristal con tapa de aluminio.<br />\r\n<br />\r\nINGREDIENTES: <br />\r\n- Manteca de cacao<br />\r\n- Macerado de árnica y caléndula en aceite de almendras<br />\r\n- Aceite de rosa mosqueta<br />\r\n- Aceites esenciales de mirra y limón<br />\r\n- Ceras naturales<br />\r\n<br />\r\nPESO: 30gr.', '10.00', 'no disponible', 'manos1.jpg', 'manos2.jpg', 'manos3.jpg', 4),
(8, 'Saquito Aromático en forma de Corazón', 'Bolsita de tela con forma de corazón, rellena de flores y plantas aromáticas.<br />\r\nPara un olor agradable en armarios y cajones.<br />\r\n<br />\r\nRELLENO: <br />\r\n- Flores de lavanda<br />\r\n- Rosas<br />\r\n- Azahar<br />\r\n- Tila<br />\r\n- Romero<br />\r\n<br />\r\nDIMENSIONES:  9 cm x 12 cm', '8.00', 'disponible', 'coraz1.jpg', 'coraz2.jpg', 'coraz3.jpg', 2),
(9, 'Ungüento de Caléndula', 'Ungüento para la piel con propiedades hidratantes, calmantes y regeneradoras.<br />\r\nEn envase de cristal con tapa de aluminio.<br />\r\n<br />\r\nINGREDIENTES: <br />\r\n- Macerado de caléndula en aceite de almendras<br />\r\n- Manteca de karité<br />\r\n- Cera de abejas<br />\r\n- Vitamina E.<br />\r\n- Aceite esencial de lavanda y manzanilla alemana<br />\r\n<br />\r\nPESO: 30 gr.', '8.00', 'disponible', 'calen1.jpg', 'calen2.jpg', 'calen3.jpg', 4),
(10, 'Saquito Aromático en forma de Flor', 'Bolsita de tela con forma de flor, rellena de plantas aromáticas.<br />\r\nPara un olor agradable en armarios y cajones.<br />\r\n<br />\r\nRELLENO: <br />\r\n- Flores de lavanda<br />\r\n- Rosas<br />\r\n- Azahar<br />\r\n- Tila<br />\r\n- Romero<br />\r\n<br />\r\nDIMENSIONES:  9 cm x 12 cm', '8.00', 'disponible', 'flor1.jpg', 'flor2.jpg', 'flor3.jpg', 2),
(11, 'Jabón de Rosas', 'Jabón hidratante y regenerativo. <br />\r\nPara pieles maduras.<br />\r\n<br />\r\nINGREDIENTES:<br />\r\n- Rosa mosqueta<br />\r\n- Agua de rosas<br />\r\n- Aceite vegetal de oliva<br />\r\n- Ricino<br />\r\n- Coco<br />\r\n- Manteca de karité<br />\r\n- Vitamina E<br />\r\n- Aceite esencial de palo de rosas.<br />\r\n<br />\r\nPESO APROX: 85gr.', '7.00', 'disponible', 'rosas1.jpg', 'rosas2.jpg', 'rosas3.jpg', 3),
(12, 'Jabón de Lavanda y Salvia', 'Jabón hidratante, calmante y antibacteriano.<br />\r\nPara pieles normales.<br />\r\n<br />\r\nINGREDIENTES:<br />\r\n- Macerado de salvia y lavanda en aceite de oliva <br />\r\n- Aceite vegetal de aguacate<br />\r\n- Coco<br />\r\n- Manteca de cacao<br />\r\n- Vitamina E<br />\r\n- Hidrolato de lavanda y salvia<br />\r\n- Aceite esencial de lavanda y salvia esclarea<br />\r\n<br />\r\nPESO APROX: 85gr.', '7.00', 'disponible', 'lavanda1.jpg', 'lavanda2.jpg', 'lavanda3.jpg', 3),
(13, 'Jabón de Romero', 'Jabón tonificante, antiséptico y cicatrizante.<br />\r\nPara pieles grasas.<br />\r\n<br />\r\nINGREDIENTES: <br />\r\n- Macerado de romero en aceite de almendras y oliva<br />\r\n- Aceite esencial de romero y mandarina<br />\r\n- Hidrolato de romero<br />\r\n- Aceite vegetal de ricino<br />\r\n- Espirulina<br />\r\n- Coco<br />\r\n- Manteca de karité<br />\r\n<br />\r\nPESO APROX: 85 gr.', '7.00', 'disponible', 'romero1.jpg', 'romero2.jpg', 'romero3.jpg', 3),
(14, 'Bálsamo Reparador para Labios', 'Bálsamo para labios muy resecos.<br />\r\nEn envase de cristal con tapa de aluminio<br />\r\n<br />\r\nINGREDIENTES:<br />\r\n- Manteca de karité<br />\r\n- Miel <br />\r\n- Extracto de própolis<br />\r\n- Aceite esencial de tomillo<br />\r\n<br />\r\nPESO: 15gr.', '8.00', 'disponible', 'labios1.jpg', 'labios2.jpg', 'labios3.jpg', 4),
(15, 'Bálsamo Hidratante para Labios en Barra', 'Bálsamo hidratante para labios. <br />\r\nEnvasado en tubo de cartón, en barra.<br />\r\n<br />\r\nINGREDIENTES:<br />\r\n- Manteca de karité<br />\r\n- Manteca de cacao<br />\r\n- Cera de abejas<br />\r\n- Aceite de oliva enriquecido con vitamina E<br />\r\n- Aceite esencial de tomillo<br />\r\n<br />\r\nPESO: 10gr.', '5.00', 'disponible', 'barra1.jpg', 'barra2.jpg', 'barra3.jpg', 4),
(16, 'Ungüento de Hipérico y Árnica', 'Ungüento para la piel con propiedades antiinflamatorias y analgésicas.<br />\r\nEn envase de cristal con tapa de aluminio.<br />\r\n<br />\r\nINGREDIENTES: <br />\r\n- Macerado de hipérico y árnica en aceite de oliva<br />\r\n- Cera de abejas<br />\r\n- Aceite de coco<br />\r\n- Vitamina E<br />\r\n- Aceites esenciales de romero y gaulteria.<br />\r\n<br />\r\nPESO: 30 gr.', '10.00', 'disponible', 'hip-ar1.jpg', 'hip-ar2.jpg', 'hip-ar3.jpg', 4);



---------------Tabla Usuarios-----------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`) VALUES
(1, 'joanafff', 'Joana Forga', 'eaa625a6169e426343b3702924c7939ea508b17b9188e271d2d1cc2b54fc01109f50e14a9425088fb7a294bf54c9e33317e60fdc9cb583b99dec124ba60a1ab5');



-------Índices para tablas volcadas-----------
--
--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `milista`
--
ALTER TABLE `milista`
  ADD KEY `milista_ibfk_1` (`id_usuario`),
  ADD KEY `milista_ibfk_2` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



----------- Restricciones para tablas volcadas -------------
--
--
-- Filtros para la tabla `milista`
--
ALTER TABLE `milista`
  ADD CONSTRAINT `milista_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milista_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;
