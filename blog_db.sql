-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 11:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `titre`, `contenu`, `image`) VALUES
(5, 'Marineford', 'Marineford was the island of the base of operations for Marine Headquarters,[2] where now the Marine Base G-1 is situated. It is where former Fleet Admiral Sengoku and the admirals resided, along with many vice admirals and lower officers when they were not assigned to another base. The city surrounding Marineford was inhabited by the families of Marine soldiers.[3', 'Marines_symbol.png'),
(6, 'Hawra distribution SARL', 'Marineford was the island of the base of operations for Marine Headquarters,[2] where now the Marine', 'Marines.png');

-- --------------------------------------------------------

--
-- Table structure for table `about_images`
--

CREATE TABLE `about_images` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(5000) NOT NULL,
  `position` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_images`
--

INSERT INTO `about_images` (`id`, `titre`, `contenu`, `position`, `image`) VALUES
(1, 'Environment', 'The seafood industry has a concern over climate impact, and takes responsibility in any case.', 1, 'service-3 (1).jpg'),
(2, 'Responsibly Sourced', 'Responsibly-sourced seafood is the key to the modern, safe and profitable seafood industry', 2, 'service-4.jpg'),
(3, 'Marketplace', 'Your business becomes benefitial by providing the customers with the best.', 3, 'service-1.jpg'),
(4, 'post title goes here', 'Marineford was the island of the base of operations for Marine Headquarters,[2] where now the Marine', 1, 'Marines_symbol.png');

-- --------------------------------------------------------

--
-- Table structure for table `accueil`
--

CREATE TABLE `accueil` (
  `id` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `contenu` varchar(2000) NOT NULL,
  `position` varchar(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`id`, `titre`, `contenu`, `position`, `image`) VALUES
(12, 'LES PORTS 1.', 'Dénombrant plus de 20 000 places à quai réparties sur plus d’une cinquantaine de ports, le départeme', '2', 'GettyImages-968819844-scaled.png'),
(13, 'LES PORTS 2.', 'Dénombrant plus de 20 000 places à quai réparties sur plus d’une cinquantaine de ports, le départeme', '1', 'la-foret-fouesnant-port-la-foret-nuages-rosesalamoureux-2.jpg'),
(15, 'LES PORTS 3.', 'Dénombrant plus de 20 000 places à quai réparties sur plus d’une cinquantaine de ports, le départeme', '3', 'seafreight3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `article_accueil`
--

CREATE TABLE `article_accueil` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_accueil`
--

INSERT INTO `article_accueil` (`id`, `titre`, `contenu`, `image`) VALUES
(1, 'Articles/', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 'vieux-port-bateaux-1536x1536.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `article_art`
--

CREATE TABLE `article_art` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `box` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_art`
--

INSERT INTO `article_art` (`id`, `titre`, `contenu`, `box`, `image`) VALUES
(2, 'article sur les déchets organiques', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 1, 'article_image_1.jpg'),
(3, 'article sur les déchets organiques', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 1, 'ref.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `titre`, `contenu`, `image`) VALUES
(1, 'post title goes here', 'Dénombrant plus de 20 000 places à quai réparties sur plus d’une cinquantaine de ports, le départeme', 'la-foret-fouesnant-port-la-foret-nuages-rosesalamoureux-2.jpg'),
(2, 'post title goes here', 'Marineford was the island of the base of operations for Marine Headquarters,[2] where now the Marine', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_article`
--

CREATE TABLE `home_article` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `boxx` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_article`
--

INSERT INTO `home_article` (`id`, `titre`, `contenu`, `boxx`, `date`, `image`) VALUES
(5, 'post title goes here', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 1, '2022-08-30', 'article.jpg'),
(7, 'post title goes here', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 3, '2022-08-30', 'R.jpg'),
(8, 'post title goes here !', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 2, '2022-09-07', 'ref.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `resume` varchar(2000) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `video` varchar(1000) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `name`, `title`, `resume`, `content`, `category`, `position`, `image`, `video`, `file_name`, `file`, `date`, `status`) VALUES
(10, 1, 'admin', 'Comment protéger les animaux ', 'Les animaux sont une partie importante de la planète Terre. Sans la vie animale, il est plus que pro', 'Pourquoi les animaux sont en voie de disparition ? Le changement climatique, la dévastation des habitats naturels, la chasse non contrôlée, l&#39;industrie alimentaire de masse, l&#39;activité humaine et beaucoup d&#39;autres facteurs participent de plus en plus à l&#39;inscription d&#39;animaux sur la liste rouge &#34;d&#39;animaux en voie de disparition&#34;, dont certains sont malheureusement déjà éteints, chaque jour les motifs ne manquent regrettablement pas pour ajouter de nouvelles espèces en voie de disparition... Cependant, en tant que personne lambda, on peut changer les choses à notre niveau, des petites actions quotidienne pour aider à freiner cette lamentable réalité. Nous vous invitons à consulter cet article Comment protéger les animaux en voie de disparition afin de vous engager dans la lutte pour protéger les animaux en voie de disparition.', 'les déchets hospitaliers', 1, 'service-1.jpg', NULL, '', '', '2022-09-06', 'active'),
(39, 1, 'admin', 'Pluie', 'La pluie est un phénomène naturel par lequel des gouttes d&#39;eau tombent des nuages vers le sol. ', 'Elle est parfois mêlée de neige, de grêlons ou verglaçante. Elle s&#39;évapore parfois avant de toucher terre pour donner la virga. Ses gouttes sont transparentes ou parfois opaques, chargées de poussières. Les vastes « rideaux de pluies », causés par la rencontre ou l&#39;approche d&#39;un front froid et/ou d&#39;un front chaud, sont des cas typiques de pluies bien prévisibles en météorologie et suivie par satellite ainsi qu&#39;en animation cartographique en temps légèrement différé par les radars météorologiques1.\r\n\r\nLa pluie est naturellement acide par l&#39;effet de dissolution de dioxyde de carbone ou gaz carbonique acide : le potentiel hydrogène ou pH de l&#39;eau de pluie recueillie dans les pluviomètres est de l&#39;ordre de 5,7. Elle contient en conséquence de très faibles quantités d&#39;acide carbonique, en particulier des ions bicarbonates et des ions hydronium. Il peut exister une grande quantité d&#39;ions ou de composés différents, de grandes variétés d&#39;origine y compris radioactives ou toxiques par polluants. Notons qu&#39;en présence d&#39;acide nitrique ou d&#39;acide sulfurique, le pH des gouttes peut descendre exceptionnellement à 2,6. Il s&#39;agit de pluies acides ou à potentiel acidifiant.', 'les déchets hospitaliers', 2, 'service-3.jpg', 'video-631cc8f31cf286.40998554.mp4', 'conception_si_uml.pdf', '1009221662830835conception_si_uml.pdf', '2022-09-10', 'active'),
(44, 1, 'admin', 'Climate change', 'Contemporary climate change includes both global warming and its impacts on Earth&#39;s weather patt', 'Due to climate change, deserts are expanding, while heat waves and wildfires are becoming more common.[5] Increased warming in the Arctic has contributed to melting permafrost, glacial retreat and sea ice loss.[6] Higher temperatures are also causing more intense storms, droughts, and other weather extremes.[7] Rapid environmental change in mountains, coral reefs, and the Arctic is forcing many species to relocate or become extinct.[8] Climate change threatens people with food and water scarcity, increased flooding, extreme heat, more disease, and economic loss. Human migration and conflict can also be a result.[9] The World Health Organization (WHO) calls climate change the greatest threat to global health in the 21st century.[10] Even if efforts to minimise future warming are successful, some effects will continue for centuries. These include sea level rise, and warmer, more acidic oceans.[11] Many of these impacts are already felt at the current 1.2 °C (2.2 °F) level of warming. Additional warming will increase these impacts and may trigger tipping points, such as the melting of the Greenland ice sheet.[12] Under the 2015 Paris Agreement, nations collectively agreed to keep warming &#34;well under 2 °C&#34;. However, with pledges made under the Agreement, global warming would still reach about 2.7 °C (4.9 °F) by the end of the century.[13] Limiting warming to 1.5 °C will require halving emissions by 2030 and achieving net-zero emissions by 2050.[14] Bobcat Fire in Monrovia, CA, September 10, 2020 Bleached colony of Acropora coral A dry lakebed in California, which is experiencing its worst megadrought in 1,200 years.[15] Some effects of climate change, clockwise from top left: Wildfire intensified by heat and drought, worsening droughts compromising water supplies, and bleaching of coral caused by ocean acidification and heating. Making deep cuts in emissions will require switching away from burning fossil fuels and towards using electricity generated from low-carbon sources. This includes phasing out coal-fired power plants, vastly increasing use of wind, solar, and other types of renewable energy, and taking measures to reduce energy use. Electricity will need to replace fossil fuels for powering transportation, heating buildings, and operating industrial facilities.[16][17] Carbon can also be removed from the atmosphere, for instance by increasing forest cover and by farming with methods that capture carbon in soil.[18] While communities may adapt to climate change through efforts like better coastline protection, they cannot avert the risk of severe, widespread, and permanent impacts.[19]', 'les déchets industriels', 3, 'service-4.jpg', 'video-631cd95d6a7cd6.34784405.mp4', 'conception_si_uml.pdf', '1009221662835037conception_si_uml.pdf', '2022-09-10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `position` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `titre`, `prix`, `resume`, `position`, `rating`, `image1`, `image2`, `image3`, `image4`, `status`, `date`) VALUES
(1, 'post title goes raaa', 27, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?\nLorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?\nLorem ipsum dolor sit amet consectetur a', 1, 0, 'R.jpg', 'img_6090_0.png', 'project_image_3.jpg', 'img_6090_0.png', 1, '2023-01-25'),
(2, 'post title goes here', 52, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 2, 0, 'project_image_2.jpg', 'project_image_3.jpg', 'img_6090_0.png', 'img_6090_0.png', 1, '2023-01-25'),
(3, 'post title goes here', 42, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 3, 0, 'project_image_3.jpg', 'project_image_2.jpg', 'project_image_6.jpg', 'project_image_3.jpg', 1, '2023-01-25'),
(4, 'post title goes here', 11, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 4, 0, 'project_image_4.jpg', 'project_image_3.jpg', 'project_image_2.jpg', 'project_image_5.jpg', 1, '2023-01-25'),
(5, 'post title goes here', 72, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 5, 0, 'project_image_5.jpg', 'project_image_3.jpg', 'project_image_4.jpg', 'project_image_2.jpg', 1, '2023-01-25'),
(6, 'post title goes here', 40, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?', 3, 0, 'project_image_6.jpg', 'project_image_3.jpg', 'project_image_5.jpg', 'project_image_2.jpg', 1, '2023-01-25'),
(23, 'karous', 40, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo?\r\nLorem ipsum dolor sit amet consectetur a', 6, 4, 'service-3 (1).jpg', 'service-4.jpg', 'vieux-port-bateaux-1536x1536.jpg', 'service-1.jpg', 1, '2023-01-28'),
(24, 'Capabilities', 40, 'Crypto Wallet for Buying, Staking & Exchanging\r\nManage your Bitcoin, Ethereum, XRP, Litecoin, USDT, and over 300 other coins and tokens.\r\nCrypto Wallet for Buying, Staking & Exchanging\r\nManage your Bi', 2, 4, 'GettyImages-968819844-scaled.png', 'service-1.jpg', 'service-3 (1).jpg', 'salmon-fish-raw-whole-ice-1296x728-header-1200x628.png', 1, '2023-02-12'),
(25, 'spongebob', 17, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo? ', 1, 5, 'service-4.jpg', 'service-3 (1).jpg', 'service-1.jpg', 'la-foret-fouesnant-port-la-foret-nuages-rosesalamoureux-2.jpg', 1, '2023-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `ref_accueil`
--

CREATE TABLE `ref_accueil` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_accueil`
--

INSERT INTO `ref_accueil` (`id`, `titre`, `contenu`, `image`) VALUES
(1, 'SOCIETE TGE accompag', 'AINSI QUE LES COLLECTIVITÉS TERRITORIALES DANS LA GESTION DE LEURS DÉCHETS INDUSTRIELS DANGEREUX. AU', 'la-foret-fouesnant-port-la-foret-nuages-rosesalamoureux-2.jpg'),
(2, 'post title goes here', 'Dénombrant plus de 20 000 places à quai réparties sur plus d’une cinquantaine de ports, le départeme', 'la-foret-fouesnant-port-la-foret-nuages-rosesalamoureux-2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_images`
--
ALTER TABLE `about_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accueil`
--
ALTER TABLE `accueil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_accueil`
--
ALTER TABLE `article_accueil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_art`
--
ALTER TABLE `article_art`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_article`
--
ALTER TABLE `home_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_accueil`
--
ALTER TABLE `ref_accueil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `about_images`
--
ALTER TABLE `about_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accueil`
--
ALTER TABLE `accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article_accueil`
--
ALTER TABLE `article_accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article_art`
--
ALTER TABLE `article_art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_article`
--
ALTER TABLE `home_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ref_accueil`
--
ALTER TABLE `ref_accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
