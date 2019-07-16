-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2019 at 08:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6227911_eshopperdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `head_id` int(3) NOT NULL,
  `ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`head_id`, `ime`, `keywords`, `description`, `title`) VALUES
(1, '/index.php', 'runforestrun,shop,sneakers,man,woman', 'Runforestruns is web shop selling sneakers for man and woman', 'Home | RunForestRun'),
(2, '/woman.php', 'eshopper,shop,nike,adidas,woman', 'Eshoppers web store for women', 'Woman | RunForestRun'),
(3, '/man.php', 'RunForestRuns ,shop,nike,adidas,man', 'RunForestRuns web store for women', 'Man | RunForestRun'),
(4, '/login.php', 'RunForestRuns ,login,register,user,username', 'RunForestRuns page for login and register', 'Login or Register | RunForestRun'),
(5, '/cart.php', 'RunForestRuns ,cart,product,price,total', 'RunForestRuns cart paga, ', 'Cart | RunForestRun'),
(6, '/contact.php', 'eshopper,contact, message,send,admin', 'RunForestRuns page for contact ', 'Contact | RunForestRun'),
(7, '/product-details.php', 'RunForestRun,details,product,price,name', 'RunForestRuns page for single product information', 'Details | RunForestRun'),
(8, '/survay.php', 'survay,brand,bast,year,2018', 'Survay for users nest brand of 2018', 'Survay | RunForestRun'),
(9, '/autor.php', 'author,runforestrun,information,picture,student', 'RunForestRuns page that represent author of web site', 'Author | RunForestRun');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivacioni_kod` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_registracije` int(50) NOT NULL,
  `aktivan` int(1) NOT NULL DEFAULT '0',
  `uloga_id` int(3) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `adresa`, `telefon`, `email`, `username`, `password`, `aktivacioni_kod`, `datum_registracije`, `aktivan`, `uloga_id`) VALUES
(36, 'Mile', 'Kitic', 'Ruzveltova 12', '065321456', 'stefangrobarstankovic@hotmail.com', 'miki123', '5f4dcc3b5aa765d61d8327deb882cf99', '1aededcd59ae63b9299b81b4d5aedee3', 1529315578, 1, 2),
(37, 'Ivan', 'Strizak', 'Mihajla Milovanovica 41/5', '0659116864', 'ivanstrizak@gmail.com', 'Ixabrat', 'ed57c85378e8d59afc6552bf1c51f3aa', 'de1baa793ca6255852577db53cd2ca69', 1529317863, 1, 2),
(38, 'Stefan', 'Stankovic', 'Kragujevacka 3', '0659061997', 'stefan.stankovic.97.16@ict.edu.rs', 'stele997', '383278e2b0db9df56a2d887d2ba318af', '4770e1cae95e6e5b51bb8da7c8b904a5', 1529322027, 1, 1),
(39, 'Pera', 'Peric', 'Nusiceva 11', '0694445552', 'learning.mix.2018@gmail.com', 'peric', 'f5da2532ae68dbb23f3bc466ec83b18b', 'ea222e933f408252a4bad669c9efef11', 1529423293, 1, 2),
(49, 'Mika', 'Mikic', 'Mikina 32', '065321456', 'mikica123@gmail.com', 'mikica123456', '287bda5aa876b3fa7dbf8e6ec0175738', '43624163298471946193219364', 1529423293, 1, 1),
(53, 'Andrej', 'Andric', 'Andrejeva 12', '065123456', 'asfads@gfs.com', 'andra123', '5f4dcc3b5aa765d61d8327deb882cf99', 'bf7eafde9831f542aa7fbb2fc63c54bf', 1529491146, 0, 2),
(54, 'Petar', 'Peric', 'Zdravka Celara 2', '060555444', 'luka.lukic@ict.edu.rs', 'pera', 'd0aeeef9a9aeddbaa999b7b65101b3a1', 'e9dbdf55c77bbd2689a2bd2f243014f9', 1529783787, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnikodgovor`
--

CREATE TABLE `korisnikodgovor` (
  `korisnikOdgovor_id` int(10) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `odgovor_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnikodgovor`
--

INSERT INTO `korisnikodgovor` (`korisnikOdgovor_id`, `korisnik_id`, `odgovor_id`) VALUES
(3, 36, 2),
(4, 39, 1),
(5, 49, 3);

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `marka_id` int(3) NOT NULL,
  `naziv` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`marka_id`, `naziv`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Reebok'),
(5, 'NB'),
(6, 'Light');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbina`
--

CREATE TABLE `narudzbina` (
  `narudzbina_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `proizvod_id` int(3) NOT NULL,
  `kolicina` int(3) NOT NULL,
  `ime` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vremePorucivanja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narudzbina`
--

INSERT INTO `narudzbina` (`narudzbina_id`, `korisnik_id`, `proizvod_id`, `kolicina`, `ime`, `prezime`, `adresa`, `telefon`, `vremePorucivanja`, `cena`) VALUES
(3, 38, 4, 3, 'Ljubisa', 'Preletacevic', 'Hajduk Stanka 12', '065127845', '1529322212', 222),
(4, 38, 8, 1, 'Ljubisa', 'Preletacevic', 'Ruzveltova 17/3', '063555333', '1529322297', 100),
(5, 38, 12, 1, 'Mica', 'Trofrtaljka', 'Nemanjina 70', '0659561974', '1529322400', 80);

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `id_link` int(3) NOT NULL,
  `naziv` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `putanja` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roditelj` int(3) NOT NULL,
  `pozicija` int(3) NOT NULL,
  `nivo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`id_link`, `naziv`, `putanja`, `roditelj`, `pozicija`, `nivo`) VALUES
(1, 'Home', 'index.php', 0, 1, 0),
(2, 'Shop', 'shop.php', 0, 2, 0),
(3, 'For man', 'man.php', 2, 1, 1),
(4, 'For woman', 'woman.php', 2, 2, 1),
(5, 'Contact us', 'contact.php', 0, 3, 0),
(6, 'Survay', 'survay.php', 0, 4, 0),
(7, 'Author', 'autor.php', 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE `odgovor` (
  `odgovor_id` int(3) NOT NULL,
  `naziv` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`odgovor_id`, `naziv`) VALUES
(1, 'nike'),
(2, 'adidas'),
(3, 'reebok');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `proizvod_id` int(3) NOT NULL,
  `ime` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` float NOT NULL,
  `slika_naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika_alt` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marka_id` int(3) NOT NULL,
  `kolicina` int(4) NOT NULL,
  `pol` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvod_id`, `ime`, `cena`, `slika_naziv`, `slika_alt`, `marka_id`, `kolicina`, `pol`) VALUES
(3, 'Adidas run', 125, 'adidas1.jpg', 'adidas', 2, 33, 'M'),
(4, 'Adidas ultra', 74, 'adidas2.jpg', 'adidas ultra', 2, 13, 'M'),
(5, 'Nike Air 227', 98, '15298505252jq82pa.jpg', 'nike air', 1, 32, 'M'),
(6, 'Puma Timon', 43, 'puma1.jpg', 'puma', 3, 44, 'M'),
(7, 'Puma ferrari', 122, 'puma2.jpg', 'puma', 3, 11, 'M'),
(8, 'Reebok classic', 100, 'reebok1.jpg', 'reebok', 4, 25, 'M'),
(9, 'Reebok basket', 210, 'reebok2.jpg', 'reebok ', 4, 11, 'M'),
(10, 'Reebok street', 99, 'reebok3.jpg', 'reebok', 4, 22, 'M'),
(11, 'Fensi', 250, 'A1.png', 'fensi sneakers', 2, 12, 'Z'),
(12, 'NB sport', 80, 'B1.jpg', 'NB sneakers', 5, 33, 'Z'),
(13, 'Light luxure', 119, 'C1.jpg', 'sneakers', 6, 150, 'Z'),
(14, 'Light women sport', 45, 'D1.png', 'sneakers women', 6, 95, 'Z'),
(15, 'Nike Air Beauty', 250, 'E1.jpg', 'nike sneakers', 1, 22, 'Z'),
(16, 'Nike summer 221', 45, 'F1.jpg', 'nike sneakers', 1, 22, 'Z'),
(17, 'Nike summer 19', 250, 'G1.jpg', 'sneakers', 1, 65, 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `slika_id` int(3) NOT NULL,
  `naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proizvod_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`slika_id`, `naziv`, `alt`, `proizvod_id`) VALUES
(2, 'adidas1-1.jpg', 'adidas', 3),
(3, 'adidas1-2.jpg', 'adidas', 3),
(4, 'adidas2-1.jpg', 'adidas', 4),
(5, 'adidas2-2.jpg', 'adidas', 4),
(6, 'nike1-1.jpg', 'nike', 5),
(7, 'puma1-1.jpg', 'puma', 6),
(8, 'puma2-1.jpg', 'puma', 7),
(9, 'reebok1-1.jpg', 'reebok', 8),
(10, 'reebok2-1.jpg', 'reebok', 9),
(11, 'reebok3-1.jpg', 'puma', 10),
(12, 'reebok3-2.jpg', 'puma', 10),
(13, 'A1-1.png', 'fensi sneakers', 11),
(14, 'B1-1.png', 'sneakers', 12),
(15, 'C1-1.jpg', 'sneakers fensi', 13),
(16, 'D1-1.jpg', 'sneakers', 14),
(17, 'E1-1.jpg', 'sneakers fensi', 15),
(18, 'F1-1.jpg', 'nike sneakers', 16),
(19, 'G1-1.jpg', 'nike', 17);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `uloga_id` int(3) NOT NULL,
  `naziv` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`uloga_id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `korisnikodgovor`
--
ALTER TABLE `korisnikodgovor`
  ADD PRIMARY KEY (`korisnikOdgovor_id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `odgovor_id` (`odgovor_id`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`marka_id`);

--
-- Indexes for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD PRIMARY KEY (`narudzbina_id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD PRIMARY KEY (`odgovor_id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvod_id`),
  ADD KEY `marka_id` (`marka_id`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`slika_id`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`uloga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `head`
--
ALTER TABLE `head`
  MODIFY `head_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `korisnikodgovor`
--
ALTER TABLE `korisnikodgovor`
  MODIFY `korisnikOdgovor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `marka_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `narudzbina`
--
ALTER TABLE `narudzbina`
  MODIFY `narudzbina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `id_link` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
  MODIFY `odgovor_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvod_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `slika_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `uloga_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`uloga_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnikodgovor`
--
ALTER TABLE `korisnikodgovor`
  ADD CONSTRAINT `korisnikodgovor_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `korisnikodgovor_ibfk_2` FOREIGN KEY (`odgovor_id`) REFERENCES `odgovor` (`odgovor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD CONSTRAINT `narudzbina_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `narudzbina_ibfk_2` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`proizvod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`marka_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `slike_ibfk_1` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`proizvod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
