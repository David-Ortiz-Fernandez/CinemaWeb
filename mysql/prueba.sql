-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2017 a las 16:00:45
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cine`
--

CREATE TABLE `cine` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `info` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cine`
--

INSERT INTO `cine` (`id`, `nombre`, `info`, `email`) VALUES
(1, 'Cine 1', 'Información Cine 1', 'Cine1@example.org'),
(2, 'Cine 2', 'Información Cine 2', 'Cine2@example.org'),
(3, 'Cine 3', 'Información Cine 3', 'Cine3@example.org'),
(4, 'Cine 4', 'Información Cine 4', 'Cine4@example.org'),
(5, 'Cine 5', 'Información Cine 5', 'Cine5@example.org');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_funcion` int(11) NOT NULL,
  `id_promocion` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL DEFAULT '8',
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `nombreFoto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `urlyoutube` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sinopsis` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  `preestreno` tinyint(1) NOT NULL,
  `comun` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombreFoto`, `nombre`, `urlyoutube`, `descripcion`, `sinopsis`, `preestreno`, `comun`) VALUES
(1, 'kkong.jpg', 'KONG: LA ISLA CALAVERA', 'https://www.youtube.com/embed/8wP_3OO3Res', 'Título original\r\nKong: Skull Islandaka \r\nAño\r\n2017\r\nDuración\r\n120 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nJordan Vogt-Roberts\r\nGuion\r\nDan Gilroy, Max Borenstein, Derek Connolly (Historia: John Gatins)', 'Un grupo de viajeros, exploradores y soldados de lo más dispar se reúne para viajar a una misteriosa isla del Pacífico que no aparece en los mapas. Entre ellos están el Capitán James Conrad (Tom Hiddleston), el Teniente Coronel Packard (Samuel L. Jackson) ', 0, 1),
(2, 'mult.jpg', 'MÚLTIPLE', 'https://www.youtube.com/embed/vxBR7LeYKiw', 'Título original\r\nSplit\r\nAño\r\n2016\r\nDuración\r\n116 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nM. Night Shyamalan\r\nGuion\r\nM. Night Shyamalan\r\nMúsica\r\nWest Dylan Thordson\r\nProductora\r\nUniversal / Blinding Edge Pictures / Blumhouse Productions', 'Debido a un trauma de la infancia temprana, Kevin (James McAvoy) sufre trastorno de identidad disociativo (DID), más comúnmente conocido como trastorno de personalidad múltiple. Dentro de él conviven 23 identidades diferentes. Entre ellas, están las person', 0, 1),
(3, 'life.jpg', 'LIFE (VIDA)', 'https://www.youtube.com/embed/y9hrcbwmYKI', 'Life\r\nAño\r\n2017\r\nDuración\r\n103 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nDaniel Espinosa\r\nGuion\r\nRhett Reese, Paul Wernick\r\nMúsica\r\nJon Ekstrand\r\nFotografía\r\nSeamus McGarvey', 'Roy Adams (Ryan Reynolds), David Jordan (Jake Gyllenhaal) y la tripulación de la Estación Espacial Internacional viajan a Marte con el objetivo de comprobar si las muestras recogidas en el planeta rojo presentan indicios de vida inteligente. Cuando uno de ', 0, 0),
(4, 'logan.jpg', 'LOGAN', 'https://www.youtube.com/embed/3OUSBjG3peI', 'Título original\r\nLoganaka \r\nAño\r\n2017\r\nDuración\r\n135 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nJames Mangold\r\nGuion\r\nScott Frank, James Mangold, Michael Green (Historia: James Mangold)\r\nMúsica\r\nMarco Beltrami\r\nFotografía\r\nJohn Mathieson', 'Es el año 2029. Los mutantes prácticamente han desparecido. Un cansado y abatido Logan (Hugh Jackman) vive retirado en la ciudad mexicana de El Paso. Es una sombra de lo que era. Se gana la vida conduciendo limusinas y se emborracha más de la cuenta. Su co', 0, 0),
(5, 'zonahostil.jpg', 'Zona Hostil', 'https://www.youtube.com/embed/HIaVe_j84Hs', 'Título original\r\nZona hostil\r\nAño\r\n2017\r\nDuración\r\n93 min.\r\nPaís\r\nEspaña España\r\nDirector\r\nAdolfo Martínez\r\nGuion\r\nLuis Arranz, Andrés M. Koppel\r\nMúsica\r\nRoque Baños\r\nFotografía\r\nAlfredo Mayo', 'A un convoy americano escoltado por la Legión española le estalla una mina al norte de Afganistán, y el inexperto Teniente Conte (Raúl Mérida) queda al mando de una dotación para proteger a los heridos hasta que los evacuen. La capitán Varela (Ariadna Gil)', 0, 0),
(6, 'byb.jpg', 'Bella y Bestia', 'https://www.youtube.com/embed/XpMjfUJ1lUc', 'Título original\r\nBeauty and the Beastaka \r\nAño\r\n2017\r\nDuración\r\n123 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nBill Condon\r\nGuion\r\nStephen Chbosky, Evan Spiliotopoulos (Novela: Jeanne-Marie Leprince de Beaumont)\r\nMúsica\r\nAlan Menken\r\nFotografía\r\n', 'Adaptación en imagen real del clásico de Disney \"La bella y la bestia\", que cuenta la historia de Bella (Emma Watson), una joven brillante y enérgica, que sueña con aventuras y un mundo que se extiende más allá de los confines de su pueblo en Francia. Inde', 0, 0),
(7, 'ff.jpg', 'Fast and Furious 8', 'https://www.youtube.com/embed/BLKaI3D9P2E', 'Título original\r\nThe Fate of the Furiousaka \r\nAño\r\n2017\r\nDuración\r\n136 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nF. Gary Gray\r\nGuion\r\nChris Morgan, Gary Scott Thompson\r\nMúsica\r\nBrian Tyler\r\nFotografía\r\nStephen F. Windon', 'Con Dom y Letty de luna de miel, Brian y Mia fuera del juego y el resto de la pandilla exonerada de todo cargo, el equipo está instalado en una vida aparentemente normal. Pero cuando una misteriosa mujer (Theron) seduce a Dom (Diesel) para regresar nuevame', 0, 0),
(8, 'eptb.jpg', 'Es por tu bien', 'https://www.youtube.com/embed/IvbBc2hFN4Q', 'Título original\r\nEs por tu bien\r\nAño\r\n2017\r\nDuración\r\n93 min.\r\nPaís\r\nEspaña España\r\nDirector\r\nCarlos Therón\r\nGuion\r\nManuel Burque, Josep Gatell\r\nMúsica\r\nJavier Rodero\r\nFotografía\r\nMiguel P. Gilaberte', 'La peor pesadilla que un padre puede tener con una hija es que ésta crezca y llegue el día en que le presente a su novio, y que éste sea un tipo despreciable que busca una sola cosa de su preciada y amada niñita. Y ese día es precisamente el que les llega ', 0, 0),
(9, 'cb.jpg', 'La cura del bienestar', 'https://www.youtube.com/embed/YiUPcwzb7tA', 'Título original\r\nA Cure for Wellness\r\nAño\r\n2017\r\nDuración\r\n156 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nGore Verbinski\r\nGuion\r\nJustin Haythe, Gore Verbinski\r\nMúsica\r\nBenjamin Wallfisch\r\nFotografía\r\nBojan Bazelli', 'Un joven y ambicioso ejecutivo de empresa (Dane DeHaan) es enviado para traer de vuelta al CEO de su compañía, que se encuentra en un idílico pero misterioso \"centro de bienestar\", situado en un lugar remoto de los Alpes suizos. El joven pronto sospecha qu', 0, 0),
(10, 'gi.jpg', 'El guardian invisible', 'https://www.youtube.com/embed/ONnr5_un0Qg', 'Título original\r\nEl guardián invisible\r\nAño\r\n2017\r\nDuración\r\n129 min.\r\nPaís\r\nEspaña España\r\nDirector\r\nFernando González Molina\r\nGuion\r\nLuiso Berdejo (Novela: Dolores Redondo)\r\nMúsica\r\nFernando Velázquez\r\nFotografía\r\nFlavio Martínez Labiano', 'En los márgenes del río Baztán, en tierras de Navarra, aparece el cuerpo desnudo de una adolescente en circunstancias que relacionan ese crimen con un asesinato ocurrido un mes atrás. La inspectora Amaia Salazar dirige la investigación, la cual le llevará ', 0, 0),
(11, 'muralla.jpg', 'La gran muralla', 'https://www.youtube.com/embed/Vv1bF_djMAY', 'Título original\r\nThe Great Wallaka \r\nAño\r\n2016\r\nDuración\r\n92 min.\r\nPaís\r\nChina China\r\nDirector\r\nZhang Yimou\r\nGuion\r\nTony Gilroy, Carlo Bernard, Doug Miro (Historia: Max Brooks, Edward Zwick, Marshall Herskovitz)\r\nMúsica\r\nRamin Djawadi\r\nFotografía\r\nStuart D', 'China, siglo XV. Un mercenario inglés (Matt Damon) y otro español (Pedro Pascal) son testigos del misterio que rodea a la construcción de la Gran Muralla China; ambos descubrirán que no se construyó para mantener alejados a los mongoles, sino para algo más', 0, 0),
(12, 'cantabrico.jpg', 'Cantabrico', 'https://www.youtube.com/embed/7I5urHr43o0', 'Título original\r\nCantábrico (Los dominios del oso pardo)\r\nAño\r\n2017\r\nDuración\r\n101 min.\r\nPaís\r\nEspaña España\r\nDirector\r\nJoaquín Gutiérrez Acha\r\nGuion\r\nJoaquín Gutiérrez Acha\r\nMúsica\r\nPablo Martín Caminero\r\nFotografía\r\nJoaquín Gutiérrez Acha', 'Km. como si se tratara de una gran muralla paralela a la costa del Mar Cantábrico. En su otra cara, la cordillera Cantábrica está repleta de cañones y bosques. Gracias a la influencia del mar y las elevadas precipitaciones, se ha originado una amplia veget', 0, 0),
(13, 'bat.jpg', 'Lego Batman', 'https://www.youtube.com/embed/nY42RllYdIU', 'Título original\r\nThe LEGO Batman Movie\r\nAño\r\n2017\r\nDuración\r\n104 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nChris McKay\r\nGuion\r\nSeth Grahame-Smith, Chris McKenna, Erik Sommers, Jared Stern, John Whittington\r\nMúsica\r\nLorne Balfe\r\nFotografía\r\nAnima', 'Spin-off de \"La LEGO Película\", protagonizado por Batman. En esta ocasión, el irreverente Batman, que también tiene algo de artista frustrado, intentará salvar la ciudad de Gotham de un peligroso villano, el Joker. Pero no podrá hacerlo solo, y tendrá que ', 0, 0),
(14, 'power.jpg', 'Power Rangers ', 'https://www.youtube.com/embed/5kIe6UZHSXw', 'Power Rangers\r\nAño\r\n2017\r\nDuración\r\n123 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nDean Israelite\r\nGuion\r\nJohn Gatins\r\nMúsica\r\nBrian Tyler\r\nFotografía\r\nMatthew J. Lloyd', 'La película sigue a cinco jóvenes predestinados a convertirse en algo extraordinario cuando descubren que tanto su modesto poblado, Angel Grove, como el resto del mundo, están al borde de la aniquilación por una amenaza alienígena. Nuestros héroes descubre', 0, 0),
(15, 'babyb.jpg', 'EL BEBÉ JEFAZO', 'https://www.youtube.com/embed/_qLryRS71BY', 'ítulo original\r\nThe Boss Baby\r\nAño\r\n2017\r\nDuración\r\n97 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nTom McGrath\r\nGuion\r\nMichael McCullers (Libro: Marla Frazee)\r\nMúsica\r\nSteve Mazzaro, Hans Zimmer\r\nFotografía\r\nAnimation', 'Tim es un niño de 7 años que tiene los mejores padres del mundo. Su vida es perfecta hasta que un fatídico día todo cambia de forma radical. ¿El motivo? Ya no serán solo tres en la familia, porque ha llegado su nuevo hermanito, un adorable bebé, que hace q', 0, 0),
(16, 'memp.jpg', 'Mañana empieza todo', 'https://www.youtube.com/embed/0I3Jr-b0G_Y', 'Título original\r\nDemain tout commence\r\nAño\r\n2016\r\nDuración\r\n115 min.\r\nPaís\r\nFrancia Francia\r\nDirector\r\nHugo Gélin\r\nGuion\r\nHugo Gélin, Mathieu Oullion, Jean-André Yerles (Historia: Guillermo Ríos, Leticia López Margalli, Eugenio Derbez)\r\nMúsica\r\nRob Simonse', 'Samuel vive la vida sin responsabilidades en la playa en el sur de Francia. Hasta que un día, una de sus antiguos amores le deja en los brazos a un bebé de pocos meses, Gloria: su hija. Incapaz de cuidar de un bebé y decidido a devolverle la niña a su madr', 0, 0),
(17, 'rey.jpg', 'De la nada surge un rey', 'https://www.youtube.com/embed/t0lBYhhSqYE', 'Título original\r\nKing Arthur: Legend of the Swordaka \r\nAño\r\n2017\r\nDuración\r\n120 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nGuy Ritchie\r\nGuion\r\nJoby Harold, Guy Ritchie, Lionel Wigram (Historia: David Dobkin, Joby Harold)\r\nMúsica\r\nDaniel Pemberton', 'Arturo es un joven intrépido que dirige a su pandilla por los callejones de Londonium. Tras sacar la espada de Excalibur, se verá obligado a tomar algunas duras decisiones. Junto a una misteriosa mujer llamada Guinevere, deberá aprender a manejar la espada', 1, 0),
(18, 'gits.jpg', 'Ghost in the shell', 'https://www.youtube.com/embed/8nfFMf6Hg9A', 'Título original\r\nGhost in the Shellaka \r\nAño\r\n2017\r\nDuración\r\n107 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nRupert Sanders\r\nGuion\r\nWilliam Wheeler (Manga: Masamune Shirow)\r\nMúsica\r\nClint Mansell, Lorne Balfe\r\nFotografía\r\nJess Hall', 'En un japón futurista la joven Motoko Kusanagi (Scarlett Johansson), también conocida como \'the Major\' Mira Killian, es la líder de grupo operativo de élite, Sección 9, cuyo objetivo es luchar contra el ciberterrorismo y los crímenes tecnológicos. Al mando', 1, 0),
(19, 'GGvol2.jpg', 'Guardianes de la galaxia v2', 'https://www.youtube.com/embed/12gvJgLE4us', 'Título original\r\nGuardians of the Galaxy Vol. 2aka \r\nAño\r\n2017\r\nDuración\r\n137 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nJames Gunn\r\nGuion\r\nJames Gunn (Cómic: Dan Abnett, Andy Lanning)\r\nMúsica\r\nTyler Bates\r\nFotografía\r\nHenry Braham', 'Continúan las aventuras del equipo en su travesía por los confines del cosmos. Los Guardianes deberán luchar para mantener unida a su nueva familia mientras intentan resolver el misterio de los verdaderos orígenes de Peter Quill. Viejos rivales se converti', 1, 0),
(20, 'ww.jpg', 'Wonder woman', 'https://www.youtube.com/embed/VSB4wGIdDwo', 'Título original\r\nWonder Womanaka \r\nAño\r\n2017\r\nDuración\r\n141 min.\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nPatty Jenkins\r\nGuion\r\nAllan Heinberg (Historia: Zack Snyder, Allan Heinberg, Jason Fuchs; Personajes: William M. Marston)\r\nMúsica\r\nRupert Gregs', 'Antes de ser Wonder Woman (Gal Gadot) era Diana, princesa de las Amazonas entrenada para ser una guerrera invencible. Diana ha sido criada en una isla paradisíaca protegida. Hasta que un día un piloto americano (Chris Pine) que tiene un accidente y acaba e', 1, 0),
(21, 'jl.jpg', 'United', 'https://www.youtube.com/embed/OiAmnKUaNmc', 'Título original\r\nJustice League\r\nAño\r\n2017\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nZack Snyder,  Joss Whedon\r\nGuion\r\nChris Terrio, David S. Goyer (Creador: Gardner Fox)\r\nMúsica\r\nJunkie XL\r\nFotografía\r\nFabian Wagner\r\n', 'Motivado por la fe que había recuperado en la humanidad e inspirado por la acción altruista de Superman, Bruce Wayne recluta la ayuda de su nueva aliada, Diana Prince, para enfrentarse a un enemigo aún mayor. Juntos, Batman y Wonder Woman se mueven rápidam', 1, 0),
(22, 'swviii.jpg', 'Star Wars episode VIII', 'https://www.youtube.com/embed/vvjOTLQ1nSQ', 'Título original\r\nStar Wars: The Last Jediaka \r\nAño\r\n2017\r\nPaís\r\nEstados Unidos Estados Unidos\r\nDirector\r\nRian Johnson\r\nGuion\r\nRian Johnson (Personajes: George Lucas)\r\nMúsica\r\nJohn Williams\r\nFotografía\r\nSteve Yedlin', 'Octavo episodio de la saga. Continuará la historia de Luke Skywalker, Rey y Finn en su lucha contra la Primera Orden. (FILMAFFINITY)', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `porcentaje` decimal(10,0) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreFoto` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id`, `valor`, `porcentaje`, `nombre`, `descripcion`, `nombreFoto`, `activo`) VALUES
(1, '0', '10', 'Promo1', 'Una mañana, tras un sueño intranquilo, Gregorio Samsa se despertó convertido en un monstruoso insecto. Estaba echado de espaldas sobre un duro caparazón y, al alzar la cabeza, vio su vientre convexo y oscuro, surcado por curvadas callosidades, sobre el que casi no se aguantaba la colcha, que estaba a punto de escurrirse hasta el suelo. Numerosas patas, penosamente delgadas en comparación con el grosor normal de sus piernas, se agitaban sin concierto. - ¿Qué me ha ocurrido? No estaba soñando. Su habitación, una habitación normal, aunque muy pequeña, tenía el aspecto habitual. Sobre la mesa había desparramado un muestrario de paños - Samsa era viajante de comercio-, y de la pared colgaba una estampa recientemente recortada de una revista ilustrada y puesta en un marco dorado. La estampa mostraba a una mujer tocada con un gorro de pieles, envuelta en una estola también de pieles, y que, muy erguida, esgrimía un amplio manguito, asimismo de piel, que ocultaba todo su antebrazo. Gregorio miró hacia la ventana; estaba nublado, y sobre el cinc del alféizar repiqueteaban las gotas de lluvia, lo que le hizo sentir una gran melancolía. «Bueno -pensó-; ¿y si siguiese durmiendo un rato y me olvidase de\n\n', 'promo1.jpg', 0),
(2, '0', '20', 'Promo2', 'Quiere la boca exhausta vid, kiwi, piña y fugaz jamón. Fabio me exige, sin tapujos, que añada cerveza al whisky. Jovencillo emponzoñado de whisky, ¡qué figurota exhibes! La cigüeña tocaba cada vez mejor el saxofón y el búho pedía kiwi y queso. El jefe buscó el éxtasis en un imprevisto baño de whisky y gozó como un duque. Exhíbanse politiquillos zafios, con orejas kilométricas y uñas de gavilán. El cadáver de Wamba, rey godo de España, fue exhumado y trasladado en una caja de zinc que pesó un kilo. El pingüino Wenceslao hizo kilómetros bajo exhaustiva lluvia y frío, añoraba a su querido cachorro. El veloz murciélago hindú comía feliz cardillo y kiwi. La cigüeña tocaba el saxofón detrás del palenque de paja.Quiere la boca exhausta vid, kiwi, piña y fugaz jamón. Fabio me exige, sin tapujos, que añada cerveza al whisky. Jovencillo emponzoñado de whisky, ¡qué figurota exhibes! La cigüeña tocaba cada vez mejor el saxofón y el búho pedía kiwi y queso. El jefe buscó el éxtasis en un imprevisto baño de whisky y gozó como un duque. Exhíbanse politiquillos zafios, con orejas kilométricas y uñas de gavilán. El cadáver de Wamba, rey godo de España, fue\n\n', 'promo2.jpg', 0),
(3, '0', '30', 'Promo3', 'Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas.Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no\n\n', 'promo3.jpg', 0),
(4, '0', '40', 'Promo4', 'Reina en mi espíritu una alegría admirable, muy parecida a las dulces alboradas de la primavera, de que gozo aquí con delicia. Estoy solo, y me felicito de vivir en este país, el más a propósito para almas como la mía, soy tan dichoso, mi querido amigo, me sojuzga de tal modo la idea de reposar, que no me ocupo de mi arte. Ahora no sabría dibujar, ni siquiera hacer una línea con el lápiz; y, sin embargo, jamás he sido mejor pintor Cuando el valle se vela en torno mío con un encaje de vapores; cuando el sol de mediodía centellea sobre la impenetrable sombra de mi bosque sin conseguir otra cosa que filtrar entre las hojas algunos rayos que penetran hasta el fondo del santuario, cuando recostado sobre la crecida hierba, cerca de la cascada, mi vista, más próxima a la tierra, descubre multitud de menudas y diversas plantas; cuando siento más cerca de mi corazón los rumores de vida de ese pequeño mundo que palpita en los tallos de las hojas, y veo las formas innumerables e infinitas de los gusanillos y de los insectos; cuando siento, en fin, la presencia del Todopoderoso, que nos ha creado\n\n', 'promo4.jpg', 0),
(5, '0', '50', 'Promo5', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.\n\n', 'promo5.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesusuario`
--

CREATE TABLE `rolesusuario` (
  `usuario` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rolesusuario`
--

INSERT INTO `rolesusuario` (`usuario`, `rol`) VALUES
(1, 1),
(2, 2),
(7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `idCine` int(11) NOT NULL,
  `numSala` int(11) NOT NULL,
  `filas` int(11) NOT NULL,
  `columnas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `idCine`, `numSala`, `filas`, `columnas`) VALUES
(1, 1, 1, 4, 12),
(2, 1, 2, 4, 12),
(3, 1, 3, 4, 12),
(4, 1, 4, 4, 12),
(5, 1, 5, 4, 12),
(6, 2, 1, 4, 12),
(7, 2, 2, 4, 12),
(8, 2, 3, 4, 12),
(9, 2, 4, 4, 12),
(10, 2, 5, 4, 12),
(11, 3, 1, 4, 12),
(12, 3, 2, 4, 12),
(13, 3, 3, 4, 12),
(14, 3, 4, 4, 12),
(15, 3, 5, 4, 12),
(16, 4, 1, 4, 12),
(17, 4, 2, 4, 12),
(18, 4, 3, 4, 12),
(19, 4, 4, 4, 12),
(20, 4, 5, 4, 12),
(21, 5, 1, 4, 12),
(22, 5, 2, 4, 12),
(23, 5, 3, 4, 12),
(24, 5, 4, 4, 12),
(25, 5, 5, 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id`, `id_sala`, `id_pelicula`, `fecha`, `precio`, `activo`) VALUES
(1681, 1, 1, '2017-06-29 18:30:00', '8', 1),
(1682, 26, 1, '2017-06-29 19:30:00', '8', 1),
(1683, 2, 1, '2017-06-29 21:30:00', '8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tlf` int(32) NOT NULL,
  `correoAlternativo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'static.jpg',
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `apellidos`, `tlf`, `correoAlternativo`, `foto`, `activo`) VALUES
(1, 'user@example.org', '$2y$10$l9TOUtx9RfpKXV5kjO8IPOoS31qcemcR9JNKmNcBxNp7VEcYI1gg2', 'Andrés', 'Ortiz', 638456342, 'user2@example.org', 'static.jpg', 1),
(2, 'admin@example.org', '$2y$10$0eR.KhfTH5ybn/jlB86hwe/1nQeCKXk2RcLEjBscJbpUaF504kSOi', 'Paco', 'Perez Córdoba', 693847543, 'admin2@example.org', 'static.jpg', 1),
(7, 'manu@example.org', '$2y$10$11okZYT50Pm2xG1BERxL8.RC5t.pBTraDetpqgWZOt6XgBwFTidA.', 'Manu', 'Carrión', 684823234, 'manu2@example.org', 'static.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cine`
--
ALTER TABLE `cine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_funcion` (`id_funcion`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rolesusuario`
--
ALTER TABLE `rolesusuario`
  ADD PRIMARY KEY (`usuario`,`rol`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_cine` (`idCine`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pelicula` (`id_pelicula`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cine`
--
ALTER TABLE `cine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1684;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_funcion`) REFERENCES `sesion` (`id`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_id_cine` FOREIGN KEY (`idCine`) REFERENCES `cine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `fk_id_pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
