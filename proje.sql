-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 09 Eyl 2020, 07:55:57
-- Sunucu sürümü: 5.6.49-cll-lve
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(150) COLLATE ucs2_turkish_ci NOT NULL,
  `EMAIL` varchar(250) COLLATE ucs2_turkish_ci NOT NULL,
  `TYPE` varchar(50) COLLATE ucs2_turkish_ci NOT NULL,
  `MESSAGE` varchar(5000) COLLATE ucs2_turkish_ci NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`ID`, `NAME`, `EMAIL`, `TYPE`, `MESSAGE`, `DATE`) VALUES
(6, 'Doğu Nigar', 'dogu_nigar_fb@hotmail.com', 'Destek', 'Selamlar arkadaşlar hepinize selamlarımı iletiyor ruhunuzu elinizden alacağıma yemin ediyorum. Gün intikam günüdür. selamlar-', '2020-04-27 21:37:41'),
(5, 'Doğu Nigar', 'dogu_nigar_fb@hotmail.com', 'Destek', 'test', '2020-04-27 21:31:27'),
(7, 'Doğu Nigar', 'dogu_nigar_fb@hotmail.com', 'Destek', 'Selamlar arkadaşlar hepinize selamlarımı iletiyor ruhunuzu elinizden alacağıma yemin ediyorum. Gün intikam günüdür. selamlar-Selamlar arkadaşlar hepinize selamlarımı iletiyor ruhunuzu elinizden alacağıma yemin ediyorum. Gün intikam günüdür. selamlar-Selamlar arkadaşlar hepinize selamlarımı iletiyor ruhunuzu elinizden alacağıma yemin ediyorum. Gün intikam günüdür. selamlar-', '2020-04-27 21:37:53'),
(8, 'uğur taşdan', 'ugur31@hotmail.com', 'Şikayet', 'ailem beni sevmiyor', '2020-05-14 17:53:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `ID` int(11) NOT NULL,
  `AD` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `SOYAD` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `TELEFON` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `MESAJ` varchar(5000) COLLATE utf8_turkish_ci NOT NULL,
  `RECORD_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DURUM` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`ID`, `AD`, `SOYAD`, `EMAIL`, `TELEFON`, `MESAJ`, `RECORD_DATE`, `DURUM`) VALUES
(1, 'Doğu Nigar', 'Nigar', 'dogu_nigar_fb@hotmail.com', '05394462823', 'test', '2019-12-22 16:41:11', 0),
(2, 'Ferhan', 'OLUĞ', 'ferhan.olug@antalya.edu.tr', '0 549 433 07 25', 'Merhaba,\r\nRezervasyon sayısı yanlış oldu , 4 olarak düzeltir misiniz?\r\nİyi çalışmalar,', '2019-12-27 08:15:40', 1),
(3, 'mehmet erkin ', 'Kırcan', 'erkin19999@hotmail.com', '05307858073', 'bence arkaplan hiç olmamış yani iştahım kapantı ve yani neden neden kişi sayısı 4 kişi arkadaşlarım aç kaldı lütfen düzenleyin.', '2020-01-14 13:46:18', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ip`
--

CREATE TABLE `ip` (
  `ID` int(11) NOT NULL,
  `IP` varchar(50) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `USERS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `ip`
--

INSERT INTO `ip` (`ID`, `IP`, `USERS_ID`) VALUES
(1, '78.162.46.110', 1),
(2, '78.162.46.110', 1),
(3, '', 1),
(5, '78.162.46.110', 1),
(6, '', 1),
(7, '78.162.46.26', 1),
(8, '78.162.46.26', 1),
(9, '78.162.46.26', 1),
(10, '78.162.46.26', 2),
(11, '78.162.46.26', 1),
(12, '78.162.46.26', 2),
(13, '78.162.46.26', 3),
(14, '78.162.46.26', 2),
(15, '78.162.46.26', 2),
(16, '78.162.46.26', 2),
(17, '78.162.46.26', 2),
(18, '78.162.46.26', 2),
(19, '78.162.46.26', 2),
(20, '78.162.46.132', 2),
(21, '78.162.46.132', 2),
(22, '78.162.46.132', 2),
(23, '78.162.46.132', 2),
(24, '78.162.46.132', 2),
(25, '78.162.46.132', 2),
(26, '78.162.46.132', 1),
(27, '78.162.46.132', 1),
(28, '78.162.46.132', 1),
(29, '78.162.46.132', 3),
(30, '78.177.11.20', 3),
(31, '78.177.11.20', 3),
(32, '78.177.11.20', 3),
(33, '78.177.11.20', 3),
(34, '78.162.46.132', 2),
(35, '78.162.46.132', 2),
(36, '78.162.46.132', 2),
(37, '78.162.46.132', 2),
(38, '78.162.46.132', 2),
(39, '78.162.46.132', 2),
(40, '88.230.135.228', 8),
(41, '78.162.40.173', 2),
(42, '78.162.40.173', 2),
(43, '78.162.40.173', 2),
(44, '78.162.40.173', 2),
(45, '37.155.0.191', 4),
(46, '78.162.40.173', 2),
(47, '78.162.40.173', 2),
(48, '78.162.40.173', 2),
(49, '78.162.40.173', 2),
(50, '78.162.40.173', 2),
(51, '5.24.223.160', 2),
(52, '5.24.223.160', 1),
(53, '5.24.223.160', 1),
(54, '85.107.125.226', 2),
(55, '85.107.125.226', 2),
(56, '85.107.125.226', 2),
(57, '46.197.116.31', 1),
(58, '85.106.102.28', 2),
(59, '85.107.124.233', 2),
(60, '95.70.160.89', 1),
(61, '78.180.62.242', 1),
(62, '85.106.97.106', 2),
(63, '88.241.48.137', 2),
(64, '88.241.48.137', 2),
(65, '85.106.101.154', 2),
(66, '85.106.101.154', 2),
(67, '85.106.101.154', 2),
(68, '85.106.101.154', 2),
(69, '85.106.100.214', 2),
(70, '85.106.96.107', 2),
(71, '85.106.96.107', 2),
(72, '85.106.96.107', 2),
(73, '85.106.96.107', 2),
(74, '85.106.96.107', 2),
(75, '85.106.96.107', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE `log` (
  `ID` int(11) NOT NULL,
  `LOGIN_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `log`
--

INSERT INTO `log` (`ID`, `LOGIN_TIME`, `USERS_ID`) VALUES
(1, '2020-05-14 17:41:08', 1),
(2, '2020-05-14 17:45:17', 1),
(3, '2020-05-14 17:48:42', 1),
(5, '2020-05-14 17:51:51', 1),
(6, '2020-05-14 22:34:34', 1),
(7, '2020-05-19 10:33:06', 1),
(8, '2020-05-19 18:03:51', 1),
(9, '2020-05-19 18:53:36', 1),
(10, '2020-05-19 20:45:41', 2),
(11, '2020-05-19 21:18:05', 1),
(12, '2020-05-19 21:18:17', 2),
(13, '2020-05-19 21:25:10', 3),
(14, '2020-05-19 21:25:19', 2),
(15, '2020-05-19 22:00:45', 2),
(16, '2020-05-19 22:31:53', 2),
(17, '2020-05-19 22:43:40', 2),
(18, '2020-05-20 18:13:26', 2),
(19, '2020-05-20 22:07:12', 2),
(20, '2020-05-21 11:08:29', 2),
(21, '2020-05-21 13:05:18', 2),
(22, '2020-05-21 17:36:09', 2),
(23, '2020-05-22 00:24:04', 2),
(24, '2020-05-22 13:30:52', 2),
(25, '2020-05-22 14:05:07', 2),
(26, '2020-05-22 14:06:28', 1),
(27, '2020-05-22 22:48:48', 1),
(28, '2020-05-25 00:27:40', 1),
(29, '2020-05-25 00:29:11', 3),
(30, '2020-05-25 10:53:18', 3),
(31, '2020-05-25 12:07:22', 3),
(32, '2020-05-25 12:07:59', 3),
(33, '2020-05-25 12:08:45', 3),
(34, '2020-05-25 23:49:21', 2),
(35, '2020-05-26 02:04:55', 2),
(36, '2020-05-26 02:07:30', 2),
(37, '2020-05-26 21:48:58', 2),
(38, '2020-05-27 18:10:15', 2),
(39, '2020-05-27 18:10:18', 2),
(40, '2020-05-27 18:14:06', 8),
(41, '2020-06-01 21:18:59', 2),
(42, '2020-06-02 08:51:26', 2),
(43, '2020-06-02 15:49:13', 2),
(44, '2020-06-02 16:13:39', 2),
(45, '2020-06-02 16:16:08', 4),
(46, '2020-06-02 19:33:02', 2),
(47, '2020-06-02 20:02:24', 2),
(48, '2020-06-03 19:46:42', 2),
(49, '2020-06-03 21:55:58', 2),
(50, '2020-06-03 22:26:24', 2),
(51, '2020-06-05 18:14:35', 2),
(52, '2020-06-05 18:42:28', 1),
(53, '2020-06-05 18:42:53', 1),
(54, '2020-06-08 20:31:40', 2),
(55, '2020-06-09 13:27:50', 2),
(56, '2020-06-09 18:24:55', 2),
(57, '2020-06-16 20:51:09', 1),
(58, '2020-06-19 22:55:05', 2),
(59, '2020-06-27 16:53:33', 2),
(60, '2020-06-27 16:54:15', 1),
(61, '2020-06-27 16:54:27', 1),
(62, '2020-06-29 12:45:58', 2),
(63, '2020-07-17 00:12:13', 2),
(64, '2020-07-17 00:13:01', 2),
(65, '2020-08-11 22:36:40', 2),
(66, '2020-08-11 22:36:51', 2),
(67, '2020-08-12 23:30:26', 2),
(68, '2020-08-12 23:30:31', 2),
(69, '2020-08-13 18:29:10', 2),
(70, '2020-09-08 18:15:31', 2),
(71, '2020-09-08 18:15:37', 2),
(72, '2020-09-08 18:40:33', 2),
(73, '2020-09-08 18:41:09', 2),
(74, '2020-09-08 18:41:53', 2),
(75, '2020-09-08 18:42:13', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `PASSWORD` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `AKTIF` int(11) NOT NULL,
  `ADMIN` int(11) NOT NULL,
  `YETKILI` int(11) NOT NULL,
  `RECORD_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WHO_CREATED` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `login`
--

INSERT INTO `login` (`ID`, `USERNAME`, `PASSWORD`, `AKTIF`, `ADMIN`, `YETKILI`, `RECORD_DATE`, `UPDATE_DATE`, `WHO_CREATED`) VALUES
(1, 'admin', 'e9fd363bedc114628fe2cdce1493db15', 1, 1, 1, '2019-12-05 19:44:53', '2020-04-03 12:18:30', 'SYSTEM'),
(2, 'dogu', '591f50a6bc95cc9cc7c70ec07f7155e0', 1, 1, 1, '2019-12-06 19:22:39', '2019-12-18 16:58:55', 'SYSTEM'),
(7, 'burak', '7ab22029a54cda59adfa0e5113d61e1f', 0, 1, 0, '2019-12-18 16:59:26', '2020-01-06 09:53:17', 'dogu'),
(8, 'test', '60932e4261fa684006249f4d955f6260', 0, 1, 0, '2019-12-18 17:24:53', '2020-01-06 09:53:25', 'dogu'),
(9, 'halilozmen', 'efc8dadded01aacc47a744c729a109ee', 1, 1, 1, '2020-01-06 09:54:05', '2020-01-06 09:54:05', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logo`
--

CREATE TABLE `logo` (
  `ID` int(11) NOT NULL,
  `LOGO` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `LOGO_ADMIN` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `RECORD_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WHO_ADDED` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `logo`
--

INSERT INTO `logo` (`ID`, `LOGO`, `LOGO_ADMIN`, `RECORD_DATE`, `UPDATE_DATE`, `WHO_ADDED`) VALUES
(1, 'admin/img/logo-icon/logo.png', 'img/logo-icon/logo.png', '2019-12-21 09:02:43', '2019-12-21 09:02:43', 'admin'),
(5, 'admin/img/logo-icon/logo.png', 'img/logo-icon/logo.png', '2019-12-12 00:15:46', '2019-12-12 00:15:46', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profile`
--

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `EDUCATION` varchar(1500) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `LOCATION` varchar(500) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `SKILLS` varchar(1500) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `PINFO` varchar(2000) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `USERS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `profile`
--

INSERT INTO `profile` (`ID`, `EDUCATION`, `LOCATION`, `SKILLS`, `PINFO`, `USERS_ID`) VALUES
(1, '', '', '', '', 1),
(2, 'Antalya Bilim Üniversitesi<br>Bilgisayar Programcılığı', 'Antalya Bilim Üniversitesi<br>Bilgisayar Programcılığı', 'Html-Css-Php, C, C#<br>Photoshop, Premier Pro', '<h5>Ben Doğu Nigar</h5>1999 İstanbul/Şişli doğumluyum.', 2),
(3, 'Bilgi bulunmuyor.', 'Bilgi bulunmuyor.', 'Bilgi bulunmuyor.', 'Bilgi bulunmuyor.', 3),
(4, 'computer programming baby', 'computer programming baby', 'iyi beceririm bilgisayar işlerini yani :)', 'seviyoz bu hayatı', 4),
(5, 'Lüleburgaz Meslek Yüksekokulu', 'Lüleburgaz Meslek Yüksekokulu', 'Vasıfsız', 'Bilgi bulunmuyor.', 5),
(8, 'yüksek mega ögretim', 'yüksek mega ögretim', 'her şey', 'Bilgi bulunmuyor.', 8),
(9, 'Bilgi bulunmuyor.', 'Bilgi bulunmuyor.', 'Bilgi bulunmuyor.', 'Bilgi bulunmuyor.', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `restoranlar`
--

CREATE TABLE `restoranlar` (
  `ID` int(11) NOT NULL,
  `YONLENDIRME` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `RESTORAN_ADI` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `RESIM` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `RESIM_ADMIN` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `ACIKLAMA` varchar(5000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `MUTFAKLAR` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `MENU` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `OGUNLER` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `KONUM` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `EPOSTA` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `TELEFON` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `DURUM` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `restoranlar`
--

INSERT INTO `restoranlar` (`ID`, `YONLENDIRME`, `RESTORAN_ADI`, `RESIM`, `RESIM_ADMIN`, `ACIKLAMA`, `MUTFAKLAR`, `MENU`, `OGUNLER`, `KONUM`, `EPOSTA`, `TELEFON`, `DURUM`) VALUES
(34, 'asmani-restaurant.php', 'Asmani Restaurant', 'admin/img/restoranlar/AsmaniFineDiningRestaurant.jpg', 'img/restoranlar/AsmaniFineDiningRestaurant.jpg', 'Asmani Restaurant, Antalya’nın Akdeniz ve Beydağları’na bakan muhteşem manzarasını enfes kokulu eşsiz tatlarla bezenmiş lezzet şölenleriyle bir araya getiriyor. Barut Ailesi imzalı restaurant, tazeliği rehber alırken en doğal ürünleri bahçeden sofranıza taşıyor. Adını ise Osmanlıca’da ‘gökyüzüne, aya ve güneşe ait olan yer’ olan Asmani’den alıyor. Antalya\'nın en huzurlu manzarasını ayaklarınızın altına almak istiyorsanız, Asmani mutlaka uğramanız gereken bir restaurant.', 'Akdeniz, Avrupa, Dünya Mutfağı', 'Fransız Usulü Soğan Çorbası, Dana Carpaccio, Dana Carpaccio, Penne Siciliano, Pancarlı Somon Gravlaks, Vietnamese Noodle, Ahtapot Carpaccio', 'Akşam Yemeği, Gece Eğlencesi, İçecekler', 'Sirinyali Mahallesi, Lara Caddesi, No:24, Muratpasa Akra Otel, Antalya 07100 Türkiye', 'dogu_nigar_fb@hotmail.com', '05394462823', 1),
(36, 'seraser-fine-dining-restaurant.php', 'Seraser Fine Dining Restaurant', 'admin/img/restoranlar/seraser-exterior.jpg', 'img/restoranlar/seraser-exterior.jpg', 'Kaleiçi\'nde muhteşem bir atmosfer ve en leziz tatlar Seraser\'de buluşuyor. Seraser Fine Dining Restaurant, enternasyonal mutfağı geleneksel motiflerle harmanlayarak sizleri kusursuz bir lezzet deneyimini paylaşmaya davet ediyor.\r\n\r\n', 'Akdeniz, Avrupa, Türk, Uluslararası', 'Fransız Usulü Soğan Çorbası, Dana Carpaccio, Dana Carpaccio, Penne Siciliano, Pancarlı Somon Gravlaks, Vietnamese Noodle, Ahtapot Carpaccio', 'Öğle Yemeği, Akşam Yemeği, Brunch, Gece Eğlencesi, İçecekler', 'Tuzcular Mah. Karanlık Sok. No:18 Kaleiçi, Antalya 07100 Türkiye', 'dogu_nigar_fb@hotmail.com', '+90 242 247 60 15', 1),
(37, '7-mehmet.php', '7 Mehmet', 'admin/img/restoranlar/7-mehmet-restaurant.jpg', 'img/restoranlar/7-mehmet-restaurant.jpg', 'İlginç hikayesiyle yolculuğuna başlamış olan 7 Mehmet, muhteşem deniz manzarasıyla müşterilerinin iştahını açıyor. Ciğerli iç pilavı üzerinde bonfile servisi ve bademli keşkülü ile misafirlerin vazgeçilmezi haline gelmiş durumda. HerAntalya’ya gelenin mutlaka uğraması gereken noktaların başında geliyor.', 'Deniz Mahsülleri, Akdeniz, Türk', 'Barbunya, Mücver, Patlıcan musakka, Tas kebabı, Etli çiğ köfte, İzmir köfte, Et sote, Taze fasulye, Karnıyarık, Mantı, Anne köftesi, Adana kebap, Lahmacun, İçli köfte, Zeytinyağlı yaprak sarma', 'Öğle Yemeği, Akşam Yemeği, Brunch, Gece Eğlencesi, İçecekler', 'Meltem Mah. Dumlupınar Bulv. No: 201 Antalya Kültür Parkı, Antalya 07030 Türkiye', 'dogu_nigar_fb@hotmail.com', '+90 242 238 52 00', 1),
(38, 'b12-steak-&-kasap.php', 'B12 Steak & Kasap', 'admin/img/restoranlar/b12-steak-kasap.jpg', 'img/restoranlar/b12-steak-kasap.jpg', 'Sebze, beyaz et, salata bir yana benim için içi sulu ve yumuşacık bir kırmızı et bir yana\", diyenlerin son gözdesi steakhouse mekanları. ', 'Türk Mutfağı, Lokanta, Et Lokantası', 'Tas kebabı, Etli çiğ köfte, İzmir köfte, Adana, Urfa, Somon Kızartma, Patates Kızartması', 'Öğle Yemeği, Akşam Yemeği, İçecekler', 'Fener Caddesi, Irmak Apt. No:52 Çağlayan Mahallesi, Antalya 07230 Türkiye', '', '+90 242 323 33 10', 1),
(39, 'arma-restaurant.php', 'Arma Restaurant', 'admin/img/restoranlar/arma-restaurant.jpg', 'img/restoranlar/arma-restaurant.jpg', 'Özellikle deniz mahsülleri deyince Antalya’da ilk akla gelenlerden olan Arma, Kaleiçi Yat Limanı\'nın en güzel noktasında bulunuyor. Gün batımını izlerken, özellikle tuzda balık sipariş etmeyi unutmayın.', 'Avrupa, Deniz Mahsülleri, Uluslararası, Akdeniz', 'Ahtapot Carpaccio, Lagos Balığı Çorbası, Karides ve Kalamarlı Tagliolini', 'Brunch, İçecekler, Öğle Yemeği, Akşam Yemeği', 'İskele Cd. No:75 Kaleiçi Yat Limanı, Antalya Türkiye', '', '+90 242 244 97 10', 1),
(40, 'devrez.php', 'Devrez', 'admin/img/restoranlar/images.jpg', 'img/restoranlar/images.jpg', 'Çorbacıyız Mübarek', 'Türk, Çin', 'Çorba, Çorba, Çorba, Daha Fazla Çorba', 'Öğle Yemeği, Mutlu Son', 'Ankara', 'uhauauhauha@gmail.com', '+90 528 631 99 99', 0),
(41, 'sosta-mangalbasi-restaurant.php', 'Sosta Mangalbaşı Restaurant', 'admin/img/restoranlar/ba7e64d5-7fc7-48f7-b065-728b72923e8d.jpg', 'img/restoranlar/ba7e64d5-7fc7-48f7-b065-728b72923e8d.jpg', 'Tüm Mutluluklar Sostada Başlar', 'Dünya Mutfağı,Mangalbaşı', 'Et çeşitleri,Dünya mutfağı,Alkollü içecekler', 'Akşam', 'İstanbul/Bahçelievler bhaçelievler mah. İzzettin çalışlar cad. no60', 'emircan246@gmail.com', '02126440624', 1),
(42, 'arap-nazmi.php', 'Arap Nazmi', 'admin/img/restoranlar/arapnazmi.jpg', 'img/restoranlar/arapnazmi.jpg', 'Köfte', 'Türk, Köfte', 'Köfte, İskender Köfte', 'Öğle, Akşam', 'Lara', 'halil.ozmen@gmail.com', '0535 1234567', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
  `ID` int(11) NOT NULL,
  `ADSOYAD` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `TELEFON` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `SAAT` int(11) NOT NULL,
  `TARIH` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `KISI_SAYISI` int(11) NOT NULL,
  `RESTORAN_ID` int(11) NOT NULL,
  `DURUM` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rezervasyon`
--

INSERT INTO `rezervasyon` (`ID`, `ADSOYAD`, `TELEFON`, `SAAT`, `TARIH`, `KISI_SAYISI`, `RESTORAN_ID`, `DURUM`) VALUES
(25, 'asdfasfd', '1123123', 7, '2019-12-21', 2, 42, 1),
(26, 'Doğu Nigar', '05394462823', 7, '2019-12-22', 2, 41, 1),
(27, 'Joker Erem', '3131313131313', 10, '3131-12-31', 1, 41, 0),
(28, 'Ferhan OLUĞ', '0 549 433 07 25', 6, '2019-12-27', 2, 41, 1),
(29, 'Doğu Nigar', '05394462823', 11, '2020-01-03', 4, 42, 1),
(30, 'Doğu Nigar', '05394462823', 11, '2020-01-03', 4, 42, 1),
(31, 'Doğu Nigar23', '05394462823', 8, '2020-02-14', 2, 42, 1),
(32, 'mehmet erkin kırcan', '05307858073', 6, '1999-10-23', 4, 42, 1),
(33, 'mehmet erkin kırcan', '05307858073', 10, '2020-01-20', 4, 42, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saat`
--

CREATE TABLE `saat` (
  `ID` int(11) NOT NULL,
  `SAAT` varchar(5) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `saat`
--

INSERT INTO `saat` (`ID`, `SAAT`) VALUES
(1, '14:00'),
(2, '15:00'),
(3, '16:00'),
(4, '17:00'),
(5, '18:00'),
(6, '19:00'),
(7, '20:00'),
(8, '21:00'),
(9, '22:00'),
(10, '23:00'),
(11, '00:00'),
(12, '01:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `TMP_NAME` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `IMG` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `IMG_ADMIN` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `P` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIRA` int(11) NOT NULL,
  `RECORD_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`ID`, `NAME`, `TMP_NAME`, `IMG`, `IMG_ADMIN`, `P`, `SIRA`, `RECORD_DATE`) VALUES
(39, 'hamburger.svg', 'C:wamp64	mpphp530.tmp', 'admin/img/index-slider/hamburger.svg', 'img/index-slider/hamburger.svg', '', 2, '2019-12-12 18:49:30'),
(23, 'special-event.svg', 'C:wamp64	mpphpA3EF.tmp', 'admin/img/index-slider/special-event.svg', 'img/index-slider/special-event.svg', 'Restoranını seç, rezerve ettir ve eğlen!', 1, '2019-12-12 00:23:04'),
(25, 'reservation.svg', 'C:wamp64	mpphpE9E.tmp', 'admin/img/index-slider/reservation.svg', 'img/index-slider/reservation.svg', 'Online rezervasyon yapmanın en kolay ve kısa yolu!', 0, '2019-12-12 00:27:54'),
(31, 'wine-tasting.svg', 'C:wamp64	mpphp4A97.tmp', 'admin/img/index-slider/wine-tasting.svg', 'img/index-slider/wine-tasting.svg', 'Eşinle baş başa güzel bir akşam yemeğine ne dersin?', 3, '2019-12-12 00:59:50'),
(21, 'eating_together.svg', 'C:wamp64	mpphp4B22.tmp', 'admin/img/index-slider/eating_together.svg', 'img/index-slider/eating_together.svg', '', 4, '2019-12-12 00:18:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sold`
--

CREATE TABLE `sold` (
  `ID` int(11) NOT NULL,
  `PIECE` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  `URUN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `sold`
--

INSERT INTO `sold` (`ID`, `PIECE`, `PRICE`, `URUN_ID`) VALUES
(1, 1, 4059, 17),
(2, 784, 9251.2, 3),
(3, 1000, 5000, 10),
(4, 500, 4995, 11),
(5, 759, 1138.5, 1),
(6, 1000, 4500, 2),
(7, 29, 8866.75, 16),
(8, 359, 19709.1, 18),
(9, 25, 625, 6),
(10, 15, 4586.25, 16),
(11, 5, 2149.5, 100),
(12, 76, 896.8, 3),
(13, 1, 560, 22),
(14, 162, 29921.4, 86),
(15, 77, 26942.3, 45),
(16, 2, 37, 29),
(17, 21, 2095.8, 39),
(18, 3, 1289.7, 100),
(19, 23, 44367, 44),
(20, 28, 700, 6),
(21, 13, 1157, 93),
(22, 213, 319.5, 1),
(23, 22, 5148, 15),
(24, 182, 6178.9, 79),
(25, 6, 306, 5),
(26, 1, 285, 97),
(27, 30, 2550, 89),
(28, 6, 31.5, 12),
(29, 22, 1647.8, 40),
(30, 112, 3802.4, 79),
(31, 42, 3775.8, 14),
(32, 146, 277254, 28),
(33, 114, 2268.6, 53),
(35, 42, 2446.5, 111),
(36, 1, 234, 15),
(37, 213, 285185.7, 37),
(38, 132, 660, 10),
(40, 15, 14235, 117),
(41, 246, 260268, 27),
(42, 16, 312, 59),
(44, 20, 900, 104),
(45, 164, 3099.6, 55),
(47, 383, 20260.7, 34),
(48, 2, 8118, 17),
(49, 43, 3435.7, 83),
(50, 61, 7930, 103),
(51, 5, 1528.75, 16),
(52, 1, 89, 93),
(53, 3, 917.25, 16),
(55, 286, 7521.8, 63),
(56, 206, 33969.4, 49),
(57, 34, 234.6, 66),
(58, 172, 645, 54),
(59, 67, 127233, 28),
(60, 98, 1813, 29),
(61, 14, 3500, 118),
(62, 126, 1486.8, 3),
(63, 78, 10132.2, 88),
(65, 6, 14394, 25),
(66, 202, 4524.8, 81),
(67, 486, 29111.4, 90),
(68, 95, 1353.75, 108),
(69, 14, 837.2, 4),
(71, 1, 305.75, 16),
(72, 226, 11955.4, 34),
(73, 32, 1692.8, 98),
(74, 1, 234, 15),
(75, 1, 560, 22),
(76, 1, 4059, 17),
(77, 305, 426390, 31),
(78, 273, 3753.75, 60),
(79, 27, 384.75, 108),
(80, 97, 363.75, 54),
(81, 152, 4560, 94),
(82, 1, 11059.6, 9),
(83, 73, 2628, 52),
(84, 122, 2183.8, 84),
(85, 222, 16627.8, 40),
(86, 12, 168, 112),
(87, 124, 6807.6, 82),
(88, 409, 776691, 28),
(89, 80, 3420, 107),
(90, 214, 7704, 52),
(92, 25, 573.75, 56),
(93, 8, 440, 67),
(94, 5, 9495, 28),
(95, 117, 2328.3, 53),
(96, 33, 389.4, 3),
(97, 65, 123435, 24),
(99, 26, 179.4, 66),
(100, 17, 1273.3, 40),
(101, 158, 31584.2, 42),
(102, 22, 614.9, 73),
(103, 541, 2136.95, 62),
(104, 5, 829.75, 75),
(105, 61, 1152.9, 55),
(106, 141, 3489.75, 64),
(107, 4, 1844.8, 113),
(108, 67, 86363, 32),
(109, 4, 298.2, 96),
(110, 6, 989.4, 49),
(111, 8, 11992, 26),
(112, 10, 14990, 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `test`
--

CREATE TABLE `test` (
  `ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(200) COLLATE ucs2_turkish_ci NOT NULL,
  `PRODUCT_BRAND` varchar(100) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `PRODUCT_CATEGORY` varchar(100) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `PIECE` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  `CONTROL` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `test`
--

INSERT INTO `test` (`ID`, `PRODUCT_NAME`, `PRODUCT_BRAND`, `PRODUCT_CATEGORY`, `PIECE`, `PRICE`, `CONTROL`) VALUES
(54, 'Ambilight 50PUS7304/62 Televizyon, 50 inç/126 cm Ekran Akıllı TV', 'Philips', 'Elektronik', 11, 5000, 0),
(37, 'Çikolatalı Gofret', 'Ülker', 'Çikolata', 3430, 1.5, 0),
(38, 'Bitter Çikolata', 'Eti', 'Çikolata', 4300, 4.5, 0),
(39, 'Pirinç', 'Osmancık', 'Pirinç', 24003, 11.03, 0),
(40, 'Mini Ahşap Masa Sandelye Seti', NULL, 'Hediyelik Eşya', 5, 5200, 1),
(41, 'Balta', 'Sonax', 'Kesici Alet', 2, 5200, 1),
(42, 'Araba için Süs Köpeği', 'Erko', 'Hediyelik Eşya', 50, 25, 0),
(43, 'Porselen Bardak', NULL, NULL, 150, 49.44, 0),
(44, 'Şef Bıçak', 'Erko', 'Kesici Alet', 12, 450, 0),
(45, 'Karat Pırlantalı Zümrüt Yüzük (1.64)', '', 'Takı', 1, 5200, 1),
(46, 'Doritos Taco Baharatlı Cips', 'Doritos', 'Cips', 4850, 5, 0),
(47, 'Kaymaksız Yoğurt (1 KG)', 'Sütaş', 'Mandıra Ürünü', 1000, 9.99, 0),
(48, 'LUPPO KEK SÜTLÜ&KAKAOLU', 'Şölen', 'Tatlı', 32, 5.25, 0),
(49, 'Kazma & Kürek', '', 'Kesici Alet', 2, 5200, 1),
(50, '16 Kalibre Av Fişeği', 'Cartucce', 'Delici Aletler', 89, 89.9, 0),
(51, 'Avcı Bıçağı', '', 'Kesici Alet', 23, 234, 0),
(52, 'Chivas Regal (1L) İskoç Viski', 'Chivas Regal', 'Alkol', 59, 305.75, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(200) COLLATE ucs2_turkish_ci NOT NULL,
  `PRODUCT_BRAND` varchar(100) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `PRODUCT_CATEGORY` varchar(100) COLLATE ucs2_turkish_ci DEFAULT NULL,
  `PIECE` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  `EXTRA` double NOT NULL,
  `CONTROL` int(11) NOT NULL,
  `GUNCELLEME_TARIHI` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EKLEME_TARIHI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`ID`, `PRODUCT_NAME`, `PRODUCT_BRAND`, `PRODUCT_CATEGORY`, `PIECE`, `PRICE`, `EXTRA`, `CONTROL`, `GUNCELLEME_TARIHI`, `EKLEME_TARIHI`) VALUES
(1, 'Ülker Çikolatalı Gofret', 'Ülker', 'Çikolata', 54, 1.5, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(2, 'Bitter Çikolata', 'Eti', 'Çikolata', 230, 4.5, 0, 0, '2020-05-01 23:46:19', '2020-05-01 21:25:40'),
(3, 'Pirinç (1kg)', 'Osmancık', 'Bakliyat', 118, 11.8, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(4, 'Mini Ahşap Masa Sandelye Seti', NULL, 'Hediyelik Eşya', 42, 59.8, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(5, 'Balta', 'Sonax', 'Kesici Alet', 23, 51, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(6, 'Araba için Süs Köpeği', 'Erko', 'Hediyelik Eşya', 22, 25, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(7, 'Porselen Bardak', NULL, NULL, 150, 49.9, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(8, 'Şef Bıçak', 'Erko', 'Kesici Alet', 9, 250, 300, 1, '2020-05-19 22:53:33', '2020-05-01 21:25:40'),
(9, 'Karat Pırlantalı Zümrüt Yüzük (1.64)', '', 'Takı', 1, 11059.6, 13271.52, 1, '2020-05-19 22:49:00', '2020-05-01 21:25:40'),
(10, 'Doritos Taco Baharatlı Cips', 'Doritos', 'Cips', 253, 5, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(11, 'Kaymaksız Yoğurt (1 KG)', 'Sütaş', 'Mandıra Ürünü', 250, 9.99, 0, 0, '2020-05-02 00:23:01', '2020-05-01 21:25:40'),
(12, 'LUPPO KEK SÜTLÜ&KAKAOLU', 'Şölen', 'Tatlı', 26, 5.25, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(13, 'Kazma & Kürek', '', 'Kesici Alet', 21, 109.98, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(14, '16 Kalibre Av Fişeği', 'Cartucce', 'Delici Aletler', 47, 89.9, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(15, 'Avcı Bıçağı', '', 'Kesici Alet', 2, 234, 280.8, 1, '2020-05-19 21:01:49', '2020-05-01 21:25:40'),
(16, 'Chivas Regal (1L) İskoç Viski', 'Chivas Regal', 'Alkol', 8, 305.75, 366.9, 1, '2020-05-19 22:02:41', '2020-05-01 21:25:40'),
(17, 'Ambilight 50PUS7304/62 Televizyon, 50 inç/126 cm Ekran Akıllı TV', 'Philips', 'Elektronik', 4, 4059, 4870.8, 1, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(18, 'Un (10kg)', 'Söke', 'Bakliyat', 400, 54.9, 0, 0, '2020-05-01 23:45:52', '2020-05-01 21:25:40'),
(21, 'SYM Varyatör Kayışı / Tahrik Kayışı / BANDO MARKA', 'BANDO', 'Motosiklet Yedek Parça', 18, 480, 0, 0, '2020-05-19 22:56:40', '2020-05-01 21:25:40'),
(22, 'Varyatör Kayışı / Tahrik Kayışı', 'SYM', 'Motosiklet Yedek Parça', 12, 560, 0, 0, '2020-05-19 22:56:40', '2020-05-01 21:25:40'),
(23, 'Ampül Sinyal / Park 12V - 10W Tek Duy', 'HARVA', 'Motosiklet Yedek Parça', 150, 5, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(24, 'Samsung Galaxy M30s 64 GB', 'SAmsung', 'Elektronik', 60, 1899, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(25, 'Xiaomi Redmi Note 8 Pro 64 GB/6 GB', 'Xiaomi', 'Elektronik', 26, 2399, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(26, 'Oppo Realme 5i 64 GB', 'OPPO', 'Elektronik', 280, 1499, 0, 0, '2020-06-01 21:21:26', '2020-05-01 21:25:40'),
(27, 'Xiaomi Redmi 8A 32 GB Duos', 'Xiaomi', 'Elektronik', 213, 1058, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(28, 'Oppo Realme 6i RMX2040 Duos 4 GB 128 GB', 'OPPO', 'Elektronik', 27, 1899, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(29, 'iPhone 6 5 7 8 X Xs Uyumlu Hızlı Şarj Kablosu Adaptör Kablo', 'Apple', 'Elektronik', 58, 18.5, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(30, 'SAMSUNG LEVEL U BLUETOOTH KULAKLIK -EO-BG920', 'Samsung', 'Elektronik', 556, 174, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(31, 'Xiaomi Mi A2 Lite 64 GB/4 GB Duos', 'Xiaomi', 'Elektronik', 52, 1398, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(32, 'Huawei Watch GT2 46mm Sport Akıllı Saat', 'Huawei', 'Elektronik', 92, 1289, 0, 0, '2020-05-21 11:15:07', '2020-05-01 21:25:40'),
(33, 'XT-6 Mıknatıslı Bluetooth Kablosuz Kulaklık', 'XT-6', 'Elektronik', 654, 15.98, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(34, 'MF Product 0071 Akıllı Bileklik Siyah', 'MF', 'Elektronik', 144, 52.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(35, 'Huawei P30 Lite 128 GB', 'Huawei', 'Elektronik', 25, 2354.9, 0, 0, '2020-05-19 21:04:14', '2020-05-01 21:25:40'),
(36, 'Apple iPhone 7 Plus 32 GB', 'Apple', 'Elektronik', 152, 4498.9, 0, 0, '2020-05-19 21:04:04', '2020-05-01 21:25:40'),
(37, 'Samsung Galaxy A10S 32 GB', 'Samsung', 'Elektronik', 639, 1338.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(38, 'Reeder P13 32 GB', 'Reeder', 'Elektronik', 759, 822, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(39, 'LG G4 Batarya BATARYA', 'Deji', 'Elektronik', 101, 99.8, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(40, '3 in 1 Type-C to Hdmi USB 3.0 Çevirici Dönüştürücü Adaptör', 'Whuxe', 'Elektronik', 39, 74.9, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(42, 'Xiaomi Mi Band 4 Akıllı Bileklik', 'Xiaomi', 'Elektronik', 592, 199.9, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(43, 'Xiaomi Mi BOX S 4K Android TV Box Medya Oynatıcı', 'Xiaomi', 'Elektronik', 245, 505, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(44, '  Regal 43R6520FA 43\" Full HD Smart LED TV', 'REGAL', 'Elektronik', 61, 1929, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(45, 'JBL T500BT Bluetooth Kafa Üstü Kulaklık', 'JBL', 'Elektronik', 68, 349.9, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(46, 'TOSHIBA CR 2032 3 V 5Lİ Anakart Bios Hesap Makinesi Pili.', 'TOSHIBA', 'Elektronik', 105, 17.75, 0, 0, '2020-05-02 00:22:53', '2020-05-01 21:25:40'),
(47, 'Altus AL49 8960 5B 49\" 4K Ultra HD Smart LED TV', 'Altus', 'Elektronik', 755, 2457, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(48, 'Nostaljik Radyo Portatif Bluetooth Hoparlör USB Uzaktan Kumandalı', 'Whuxe', 'Elektronik', 245, 139.9, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(49, 'Finish Quantum Max Bulaşık Makinesi Deterjanı 170 Kapsül 85 X 2', 'Finish', 'Market', 53, 164.9, 0, 0, '2020-05-21 11:15:07', '2020-05-01 21:25:40'),
(50, 'Selpak Pofuduk Doku Tuvalet Kağıdı 3 x 24 Rulo', 'Selpak', 'Market', 765, 99.9, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(51, 'Bingo Soft Çamaşır Yumuşatıcısı Mor Çiçekler 1,44 lt x 2 Adet', 'Bingo', 'Market', 325, 44.5, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(52, 'Kahve Dünyası Çikolata Kaplı Portakal 250 G', 'Kahve Dünyası', 'Market', 671, 36, 0, 0, '2020-05-19 20:49:18', '2020-05-01 21:25:40'),
(53, 'Karışık Reçel Paketi (Portakal - Nar)', 'Meyve Ağacım', 'Market', 25, 19.9, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(54, 'Arbella Midye Makarna 500 G', 'Arbella', 'Market', 356, 3.75, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(55, 'Doğal Köy Yumurtası 15’li', 'Mutlu Sebzeler', 'Market', 100, 18.9, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(56, 'Hünkar Dermason Fasulye 1 KG', 'Hünkar Dermason', 'Market', 127, 22.95, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(57, 'Tat Domates Salçası Teneke 830 G', 'Tat', 'Market', 698, 11.45, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(58, 'Tardaş Egenin Organik Naturel Sızma Zeytinyağı 5 L', 'Tardaş', 'Market', 463, 243.8, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(59, 'Reis Kızıltepe Kırmızı Mercimek 1 KG', 'Reis Kızıltepe', 'Market', 146, 19.5, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(60, 'Söke Buğday Un 2 KG', 'Söke', 'Market', 185, 13.75, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(61, 'Nescafe Classic Kahve 200 G', 'Nescafe', 'Market', 245, 39.95, 0, 0, '2020-05-02 00:21:49', '2020-05-01 21:25:40'),
(62, 'Billur Tuz İyotlu Sofra Tuzu 750 G', 'Billur', 'Market', 304, 3.95, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(63, 'Ots Organik Popcorn 750 G', 'Ots', 'Market', 585, 26.3, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(64, 'Dardanel Ton Balığı 3 x 80 G', 'Dardanel', 'Market', 25, 24.75, 0, 0, '2020-05-21 11:15:07', '2020-05-01 21:25:40'),
(65, 'Bağdat Toz Karabiber 45 G', 'Bağdat', 'Market', 289, 8.5, 0, 0, '2020-05-02 00:22:44', '2020-05-01 21:25:40'),
(66, 'Kurukahveci Mehmet Efendi Türk Kahvesi Poşet 100 G', 'Kurukahveci Mehmet Efendi', 'Market', 63, 6.9, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(67, 'Kahve Dünyası Madlen Sütlü - Bitter Çikolata 572 G', 'Kahve Dünyası', 'Market', 3, 55, 66, 1, '2020-05-19 23:01:30', '2020-05-01 21:25:40'),
(68, 'Yerli Patates 1 KG', 'YERLİ', 'Market', 354, 5.95, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(69, 'Elma Kırmızı 3 KG', 'YERLİ', 'Market', 426, 25.95, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(70, 'Kuru Soğan 1 KG', 'YERLİ', 'Market', 458, 6.95, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(71, 'SYM GTS 250i EVO ön fren balatası EBC SFAC355/4 karbon balat', 'EBC', 'Motosiklet Yedek Parça', 32, 150.2, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(72, 'Tardaş Egenin Organik Sofralık Siyah Zeytin Cam 420 G', 'Tardaş', 'Market', 254, 25.7, 0, 0, '2020-05-02 00:21:58', '2020-05-01 21:25:40'),
(73, 'The LifeCo Hindistan Cevizi Sütü 400 ML', 'The LifeCo', 'Market', 524, 27.95, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(74, 'Çaykur Altınbaş Bergamot Aromalı Kol Demlik Siyah Çay 40 x5 G', 'Çaykur', 'Market', 985, 16.05, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(75, 'Doğuş Karadeniz Tiryaki Çay 5000 gr', 'Doğuş', 'Market', 14, 165.95, 0, 0, '2020-05-19 23:01:27', '2020-05-01 21:25:40'),
(76, 'Ariel Professional Sıvı Çamaşır Deterjanı 70 Yıkama 2 x 4550 ML', 'Ariel', 'Market', 456, 160.95, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(77, 'Vileda Easy Wring Temizlik Seti Yedek Paspas 2 Adet', 'Vileda', 'Market', 68, 72.95, 0, 0, '2020-05-02 00:22:05', '2020-05-01 21:25:40'),
(78, 'Fairy Platinum Limon Kokulu Bulaşık Makinesi Deterjanı 3 x 26 Tablet', 'Fairy', 'Market', 984, 145, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(79, 'Vernel Max Supreme Konsantre Çamaşır Yumuşatıcısı Glamour 1200 ML', 'Vernel', 'Market', 293, 33.95, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(80, 'Pril Gold 12 Etki Bulaşık Makinesi Deterjanı 54 Tablet', 'Pril', 'Market', 875, 58.95, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(81, 'Araç Araba İçi Torpido Ledi Renkli İp Neon İp Led 2 Metre', 'Whuxe', 'Araç Aksesuarları', 54, 22.4, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(82, 'Dijital Ekranlı Araç Park Sensörü Ses İkazlı', 'Oem', 'Araç Aksesuarları', 121, 54.9, 0, 0, '2020-05-19 20:49:18', '2020-05-01 21:25:40'),
(83, 'Far Ledi Far Kaşı Sinyalli Kayarlı Gündüz Farı Dıştan Montaj', 'Whuxe', 'Araç Aksesuarları', 80, 79.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(84, 'Far Ledi Far Kaşı Sinyalli Kayarlı Gündüz Farı Dıştan Montaj', 'Oem', 'Araç Aksesuarları', 132, 17.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(85, '12V 60 Ah Amper Akü 540A Varta Akü Blue Dynamic D24-OCAK 2020', 'VARTA', 'Araç Aksesuarları', 84, 353.75, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(86, 'Motul 8100 X-Clean EFE 5w-30 5 Litre Motor Yağı (1 ay 2020)', 'MOTUL', 'Araç Bakım Malzemeleri', 83, 184.7, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(87, 'T10 DİPSİZ W5W CANBUS 24 LEDLİ BEYAZ PARK PLAKA AMPÜLÜ (2 ADET)', 'Whuxe', 'Araç Aksesuarları', 215, 21.9, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(88, 'Angel M609 64 76 89mm Gündüz Sis Farı Cob Su Geçirmez Beyaz Işık', 'GMAX', 'Araç Aksesuarları', 22, 129.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(89, 'Akü Takviye Kablosu 50MM 1200 Amper 2.3 Metre Çantalı', 'Numereuno', 'Araç Aksesuarları', 54, 85, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(90, 'LED XENON SET ŞİMŞEK ETKİLİ LED FAR AMPÜLÜ H7,H1,H3,H11,H8,H27', 'C9', 'Araç Aksesuarları', 404, 59.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(91, 'Supertone Korna Hella Tipi Kromaj Takım 2 Adet Çap 12Cm 12V', 'HELLA', 'Araç Aksesuarları', 84, 42, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(92, 'Carmind Kartal Gözü Oto Ayna Altı Led Beyaz 23mm', 'Carmind', 'Araç Aksesuarları', 32, 32.8, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(93, 'Off Road Sis Farı - Lambası 16 Led Kare Çalışma Lambası (2 ADET)', 'OnOffMoto', 'Araç Aksesuarları', 68, 89, 0, 0, '2020-05-19 21:01:36', '2020-05-01 21:25:40'),
(94, 'PDR DENT Boyasız Göçük Düzeltme Seti 9 Parça 5 Uç + 3 Mum Silikon', 'PDR DENT', 'Araç Aksesuarları', 119, 30, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(95, 'ELM 327 OBD2 SÜPER MİNİ Bluetoothlu V2.1 Arıza Tespit Cihazı', 'ELM', 'Araç Bakım Malzemeleri', 425, 37.5, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(96, 'Fiat Linea Fiorino 1.3 Multijet Euro 4 Opar Filtre Bakım Seti', 'Opar', 'Araç Bakım Malzemeleri', 28, 74.55, 0, 0, '2020-05-21 11:15:07', '2020-05-01 21:25:40'),
(97, 'Shell Rimula R4 X 15w/40 16 Kg Dizel Motor Yağı 2019', 'Shell', 'Araç Bakım Malzemeleri', 31, 285, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(98, 'İNWELLS 4 LÜ OTOMATİK CAM KALDIRMA MODÜLÜ', 'İNWELLS', 'Araç Aksesuarları', 52, 52.9, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(99, 'Sofit Led Canbus C5W Tavan Plaka Ampül 31mm-36mm-39mm-41mm 2 Adet', 'Sofit Led Canbus', 'Araç Aksesuarları', 152, 20.75, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(100, 'Sony PS4 DualShock4', 'Sony', 'Elektronik', 11, 429.9, 0, 0, '2020-05-19 22:01:09', '2020-05-01 21:25:40'),
(101, 'ANDES MTV AIR V2 YAZLIK CEKET', 'ANDES', 'Motosiklet Ekipmanları', 20, 375, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(102, 'Knmaster Alpha Kie', 'Knmaster', 'Motosiklet Ekipmanları', 20, 349.9, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(103, 'Üniversal Deflektör Katlanır Ayarlanır', 'OnOffMoto', 'Motosiklet Ekipmanları', 184, 130, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(104, 'ÇİFT GİRİŞLİ 12 VOLT ŞARJ ALETİ AKÜ ÖLÇER VOLTMETRE', 'AHL', 'Motosiklet Ekipmanları', 229, 45, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(105, 'MOTOSİKLET ŞEFFAF EL KORUMA(ÜNİVERSAL)', 'AHL', 'Motosiklet Ekipmanları', 742, 69, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(106, 'SYM GTS 250i EVO arka fren balatası EBC SFAC427 karbon balata', 'EBC', 'Motosiklet Yedek Parça', 84, 98.8, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(107, 'Castrol 4T Motor Yağı 10/40 - Kısmi Sentetik / 1 Litre', 'Castrol', 'Araç Bakım Malzemeleri', 32, 42.75, 0, 0, '2020-05-19 20:49:18', '2020-05-01 21:25:40'),
(108, 'Balata Spreyi', '404', 'Araç Bakım Malzemeleri', 127, 14.25, 0, 0, '2020-05-19 20:46:02', '2020-05-01 21:25:40'),
(109, 'Castrol Şanzuman Yağı / 1 LİTRE / 90 Numara', 'Castrol', 'Araç Bakım Malzemeleri', 245, 30.82, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(110, 'Maxem SL 45 lt Arka Çanta Beyaz +Sırt+Üst Bagaj SİYAH REFLEKTÖR', 'Maxem', 'Motosiklet Ekipmanları', 45, 294, 0, 0, '2020-05-01 21:25:05', '2020-05-01 21:25:40'),
(111, 'Motorex Fren Hidrolik 250 ML Dot 4', 'Motorex', 'Araç Bakım Malzemeleri', 42, 58.25, 0, 0, '2020-05-19 20:45:53', '2020-05-01 21:25:40'),
(112, 'Yağ Süzgeci / Yağ Filtresi', 'SYM', 'Motosiklet Yedek Parça', 12, 14, 0, 0, '2020-05-19 20:49:18', '2020-05-01 21:25:40'),
(113, 'SYM Varyatör Kayışı / Malossi / KEVLAR', 'Malossi', 'Motosiklet Yedek Parça', 28, 461.2, 0, 0, '2020-05-21 11:15:07', '2020-05-01 21:25:40'),
(116, 'ARPENAZ 4.2 QUECHUA-4 KİŞİLİK ÇADIR - 2 ODALI -', 'Quechua', 'Kamp,Outdoor', 15, 1250, 0, 0, '2020-05-09 21:41:26', '2020-05-09 21:36:48'),
(117, 'The North Face M Hedgehog Hike Gtx Erkek Ayakkabı', 'The North Face', 'Outdoor ', 123, 949, 0, 0, '2020-05-19 21:01:10', '2020-05-09 21:49:02'),
(118, 'The North Face Erkek Tanken Polo T-Shirt', 'The North Face', 'Outdoor ', 31, 250, 0, 0, '2020-05-19 20:46:02', '2020-05-09 21:54:54'),
(119, 'The North Face Antlers Beanie Unisex Bere T93FIB2RR', 'The North Face', 'Outdoor ', 62, 195, 0, 0, '2020-05-09 22:01:02', '2020-05-09 22:01:02'),
(120, 'Karam Gurme', 'Eti', 'Gofret', 200, 1, 0, 0, '2020-05-25 12:13:39', '2020-05-25 10:57:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_turkish_ci NOT NULL,
  `NAME` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_turkish_ci NOT NULL,
  `PASSWORD` varchar(500) CHARACTER SET ucs2 COLLATE ucs2_turkish_ci NOT NULL,
  `AKTIF` int(11) NOT NULL,
  `ADMIN` int(11) NOT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `NAME`, `PASSWORD`, `AKTIF`, `ADMIN`, `UPDATE_DATE`, `DATE`) VALUES
(1, 'admin', 'Admin', 'cf37bf27316d5df58c7673d0f6461184', 1, 1, '2020-06-05 18:42:16', '2020-05-03 12:45:39'),
(2, 'dogu', 'Doğu', '126df673d8dfb20cf9b1c029f3f634af', 1, 1, '2020-09-08 18:42:03', '2020-05-03 12:45:39'),
(3, 'hozmen', 'Halil Özmen', 'd719c099905fd466d143088d31d15ab5', 1, 1, '2020-05-25 12:11:02', '2020-05-03 12:45:39'),
(4, 'burak', 'Burak Yalçın', '3742ed49286f70bbe5755adc67af9db3', 1, 0, '2020-06-02 16:22:54', '2020-05-09 18:41:07'),
(5, 'whuxe', 'Celil Şen', '2f8c301f2ec54dc4aed9e010f20d0edb', 0, 0, '2020-06-02 16:17:36', '2020-05-10 06:10:13'),
(8, 'erkin', 'Erkin Kırcan', '700c8b805a3e2a265b01c77614cd8b21', 0, 0, '2020-06-02 16:15:53', '2020-05-27 18:12:50'),
(9, 'test', 'test', '07d168943e94b0b9feb7b64f028d8e69', 0, 0, '2020-06-08 20:35:16', '2020-06-08 20:32:40');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERS_ID` (`USERS_ID`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERS_ID` (`USERS_ID`);

--
-- Tablo için indeksler `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERS_ID` (`USERS_ID`);

--
-- Tablo için indeksler `restoranlar`
--
ALTER TABLE `restoranlar`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RESTORAN_ID` (`RESTORAN_ID`),
  ADD KEY `SAAT` (`SAAT`);

--
-- Tablo için indeksler `saat`
--
ALTER TABLE `saat`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `URUN_ID` (`URUN_ID`);

--
-- Tablo için indeksler `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ip`
--
ALTER TABLE `ip`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Tablo için AUTO_INCREMENT değeri `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `restoranlar`
--
ALTER TABLE `restoranlar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `saat`
--
ALTER TABLE `saat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `sold`
--
ALTER TABLE `sold`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Tablo için AUTO_INCREMENT değeri `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `ip_ibfk_1` FOREIGN KEY (`USERS_ID`) REFERENCES `users` (`ID`);

--
-- Tablo kısıtlamaları `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`USERS_ID`) REFERENCES `users` (`ID`);

--
-- Tablo kısıtlamaları `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`USERS_ID`) REFERENCES `users` (`ID`);

--
-- Tablo kısıtlamaları `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`URUN_ID`) REFERENCES `urun` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
