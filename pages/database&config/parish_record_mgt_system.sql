-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 06:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parish_record_mgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `parish_name` text COLLATE utf8_unicode_520_ci NOT NULL,
  `address` text COLLATE utf8_unicode_520_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `info` text COLLATE utf8_unicode_520_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_520_ci NOT NULL,
  `background_image` text COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `parish_name`, `address`, `contact`, `info`, `logo`, `background_image`) VALUES
(1, 'Your Parish Here', ' 10th Avenue and A. Mabini Street in Poblacion, Caloocan, Metro Manila, Philippines', '09-4156-155', 'The parish started as a small visita (chapel-of-ease) initiated by Manuel Vaquero, assistant priest of Tondo, Manila, who with the cooperation of the people also built a place of worship in one of the districts of Caloocan called Libis Aromahan (Sitio de Espinas) in 1765. The priest gave this community two statues: San Roque and the Nuestra SeÃ±ora de la SoterraÃ±a de Nieva (Virgin of Nieva in Segovia, Spain). The church was erected a parish on April 8, 1815, by the Archbishop of Manila Juan Antonio de Zulaibar, O.P. with Fray Manuel de San Miguel, OAR as the first parish priest. Its formal erection as an independent parish also marked the transfer of the church to its present site. This site was called Paltok, an elevated district in the town of Caloocan. Construction began on a bigger church in 1819 under Fray Vicente de San Francisco Xavier, OAR and was finished in 1847 under Fray Cipriano Garcia, OAR.\r\n\r\nIn 1889, San Roque ceased as a parish as it did not meet requirements posted by the archbishop. The church could not raise the proper tributos y numero de las almas (tributes and alms) prescribed by the archbishop. Jose Aranguren, OAR, revived San Roque into a parish upon his appointment as archbishop in 1892.\r\n\r\n\r\nCaloocan Church shortly after the attack by American forces on February 10, 1899.\r\nDuring the Philippine revolution against the Spaniards and later, against the Americans, San Roque Church played a part as the meeting place of the Katipuneros coming from the west coast of Manila going to Balintawak. On February 10, 1899, the church was partly destroyed by US forces during the Philippineâ€“American War when Philippine revolutionary General Antonio Luna sought refuge at the church. After its capture, the Americans used the whole area as a field hospital. In 1900, American General Arthur MacArthur, Jr. invaded Caloocan and the church of San Roque was made caballeriza by the regiment of Col. Frederick Funston.\r\n\r\nAfter the war, the church was re-constructed in 1914 by the Confradia de Sagrado Corazon de Jesus under the administration of parish priest Victor Raymundo.\r\n\r\nFr. Eusebio Carreon (1934) put black and white tiles along the aisles. Fr. Pedro Abad (1947) renovated the faÃ§ade and Msgr. Pedro Vicedo (1962) built additional wings on both sides of the church.\r\n\r\nThe church deteriorated over the years. In 1977, Msgr. Augurio Juta planned a new church but this plan did not materialize due to his abrupt transfer to Santa Ana, Taguig in December 1979. He was succeeded by Msgr. Boanerges \"Ben\" A. Lechuga, who renovated the church. It was blessed on November 30, 1981 by Manila Cardinal Jaime Sin.\r\n\r\nIn the Jubilee Year 2000, San Roque Church was declared one of the Jubilee Churches in the Roman Catholic Archdiocese of Manila.\r\n\r\nPope John Paul II, in his Apostolic Letter \"Quoniam Quaelibet\" of June 28, 2003, created the new Diocese of Kalookan, consisting of south Caloocan, Malabon and Navotas (CAMANA Area), and elevated the church to a cathedral. The Pope appointed Deogracias S. IÃ±iguez, Bishop of Iba, Zambales, as the first Bishop of the diocese. He took possession of the diocese on August 22, 2003. Msgr. Boanerges \"Ben\" Lechuga, then parish priest during that time, was the first cathedral rector and the first Vicar-General of the diocese. In 2008, Bishop IÃ±iguez took over as Parish Priest soon after Lechuga\'s early retirement, and served until 2013, coterminal to his term as bishop. After, Father Elpidio Erlano Jr. became the acting parish priest and rector of the cathedral for six months, until the diocese\'s Apostolic Administrator, Bishop Francisco M. De Leon, named Father Gaudioso Sustento as parish priest and rector. In February 2017, Rev. Fr. Jerome Cruz, Vicar-General of the Diocese was installed as the new Rector of the Cathedral.\r\n\r\nOn December 12, 2015, the faithful of Caloocan witnessed the Solemn Rite of the Dedication of the San Roque Cathedral as the newly renovated altar-sanctuary has been finally completed. The Eucharistic Celebration for the dedication and opening of the Holy Door for the celebration of the Extraordinary Jubilee of Mercy was officiated by Francisco M. de Leon, D.D., Apostolic Administrator of Kalookan.\r\n\r\nOn December 11, 2015 a relic from the bone of San Roque was brought out for public veneration in a vigil in preparation for the dedication of the cathedral. The relic was a gift from Pope Francis for the 200 year Anniversary of the Parish was deposited to the altar table during the dedication rite.\r\n\r\nLast August 13, 2017, another bone relic of San Roque was given to the Cathedral from the Chapel of the Holy Relics in Cebu.', 'depositphotos_86739130-stock-illustration-church-logo-round-dove-holy.jpg1632985447.jpg', 'photo-1555696958-c5049b866f6f.jpg1632985424.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `document_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `document_name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `content` text COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`document_id`, `category_id`, `document_name`, `content`) VALUES
(1, 28, 'Marriage Cert Ver 1', '<h1 style=\"text-align: center; \"><span style=\"font-size: 48px;\" arial=\"\" black\";\"=\"\"><b>Certificate of Marriage</b></span></h1><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 24px; font-family: Arial;\">This certifies that&nbsp;</span></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 18px; font-family: Arial;\"><span style=\"font-size: 24px;\">__________________________ and&nbsp;__________________________</span>&nbsp;&nbsp;</span></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 24px; font-family: Arial;\">on _____________,&nbsp;_________,</span></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 24px; font-family: Arial;\">were united as husband and wife&nbsp;</span></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 24px; font-family: Arial;\">to the&nbsp;</span><span style=\"font-size: 24px; font-family: Arial;\">honor and glory</span></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 24px; font-family: Arial;\">of&nbsp;</span></p><p style=\"text-align: center; line-height: 2;\"><span style=\"font-size: 24px; font-family: Arial;\">God the Father, the Son and the Holy Spirit, Amen!</span></p><p style=\"\"><br></p><p style=\"\"><br></p><p style=\"\"><br></p><p style=\"\"><br></p><p style=\"\"><br></p><p style=\"\"><br></p><p style=\"line-height: 1;\"><span style=\"font-size: 18px;\"><b><span style=\"font-family: Arial; font-size: 24px;\">REV. FR. </span></b><span style=\"font-family: Arial; font-size: 24px;\">________________________________</span></span></p><p style=\"line-height: 1;\"><span style=\"font-size: 18px;\"><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><span style=\"font-family: Arial;\"> <span style=\"font-size: 24px;\"><b>&nbsp; &nbsp; &nbsp; </b>&nbsp; &nbsp; &nbsp; Parish Priest</span></span></span></p>                 '),
(3, 29, 'Cert of Confirmation v1', '<p style=\"text-align: center;\"><span style=\"font-weight: bolder;\"><span style=\"font-family: Verdana;\">ï»¿</span><span style=\"font-size: 36px; font-family: Verdana;\">ï»¿Certificate of Confirmation</span></span></p><p style=\"text-align: center;\"><span style=\"font-weight: bolder;\"><span style=\"font-size: 36px; font-family: Verdana;\"><br></span></span></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">ï»¿In the Name of the Father, and the Son, and of the Holy Spirit. Amen</span></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"></p><div><table class=\"MsoTableGrid\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"0\" style=\"width: 491.3pt; border: none;\">\r\n <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Name of Child</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:1;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Date of Birth</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:2;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Place of Birth</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:3;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Date of Confirmation</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:4;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Place of Confirmation</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:5;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Nationality</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:6;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Sex</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:7;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Name of Father</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:8;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Name of Mother</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:9;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Residence</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:10;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Officiating Bishop</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:11;mso-yfti-lastrow:yes;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \"Segoe UI\", sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Sponsors</span><o:p></o:p></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size:18.0pt;font-family:\"Segoe UI\",sans-serif\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>Â </o:p></p></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><b>REV. FR.</b></span><span style=\"font-family: Arial; font-size: 24px;\">________________________________</span></div><p style=\"line-height: 1;\"><span style=\"font-size: 18px;\"><span style=\"font-weight: bolder;\">Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â </span><span style=\"font-family: Arial;\">Â <span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Â  Â  Â Â </span>Â  Â  Â  Parish Priest</span></span></span></p><div><span style=\"font-size: 24px;\"><br></span></div>  '),
(4, 30, 'Renewal of Marriage v1', '<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:26.0pt;mso-bidi-font-size:15.0pt;line-height:\r\n107%;font-family:\" arial\",sans-serif\"=\"\">Certificate<o:p></o:p></span></b></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:26.0pt;mso-bidi-font-size:15.0pt;line-height:\r\n107%;font-family:\" arial\",sans-serif\"=\"\">of<o:p></o:p></span></b></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\">\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:26.0pt;mso-bidi-font-size:15.0pt;line-height:\r\n107%;font-family:\" arial\",sans-serif\"=\"\">Renewal of Marriage Vows<o:p></o:p></span></b></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">This\r\ncertifies that<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">_____________________\r\nand _____________________<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">on ________________,\r\n__________,<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">being\r\ntheir _________ Wedding Anniversary,<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">held\r\nat the<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">Church\r\nof ________________________,<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">________________________,\r\n________________________, ________________________,<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">renewed\r\ntheir Marriage Vows to the honor and glory of<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">God\r\nthe Father, the Son and the Holy Spirit. Amen!<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\"><br></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p><p style=\"margin: 0in 0in 0.0001pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 15pt; font-family: Arial, sans-serif;\">REV. FR.&nbsp;</span></b><span style=\"font-size: 15pt; font-family: Arial, sans-serif;\">________________________________<o:p></o:p></span></p><p style=\"margin-top: 0in; margin-right: 0in; margin-left: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 15pt; font-family: Arial, sans-serif;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><span style=\"font-size: 15pt; font-family: Arial, sans-serif;\">Parish\r\nPriest</span><o:p></o:p></p><p class=\"MsoNormal\" align=\"center\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:15.0pt;line-height:107%;font-family:\" arial\",sans-serif\"=\"\">&nbsp;</span></p> '),
(5, 31, 'Baptismal Certificate V1', '<p style=\"text-align: center;\"><span style=\"font-weight: bolder;\"><span style=\"font-family: Verdana;\">ï»¿</span><span style=\"font-size: 36px; font-family: Verdana;\">ï»¿Baptismal Certificate</span></span></p><p style=\"text-align: center;\"><span style=\"font-weight: bolder;\"><span style=\"font-size: 36px; font-family: Verdana;\"><br></span></span></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">ï»¿In the Name of the Father, and the Son, and of the Holy Spirit. Amen</span></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"></p><div><table class=\"MsoNormalTable\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"0\" style=\"width: 491.3pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Name of Child</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:1;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Date of Birth</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:2;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Place of Birth</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:3;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Date of Baptism</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:4;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Place of Baptism</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:5;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Nationality</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:6;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Sex</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:7;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Legitimacy<o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:8;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Name of Father</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:9;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Name of Mother</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:10;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Residence</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:11;height:23.7pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Officiating Minister</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.7pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:12;mso-yfti-lastrow:yes;height:24.5pt\">\r\n  <td width=\"245\" valign=\"top\" style=\"width:183.4pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">Sponsors</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"411\" valign=\"top\" style=\"width:307.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.5pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\">: ________________________________</span><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\",=\"\" sans-serif;\"=\"\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"></p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">REV. FR.</span></span><span style=\"font-family: Arial; font-size: 24px;\">________________________________</span></div><p style=\"line-height: 1;\"><span style=\"font-size: 18px;\"><span style=\"font-weight: bolder;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-family: Arial;\">&nbsp;<span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">&nbsp; &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; Parish Priest</span></span></span></p><div><span style=\"font-size: 18px;\"><span style=\"font-family: Arial;\"><span style=\"font-size: 24px;\"><br></span></span></span></div> ');
INSERT INTO `tbl_document` (`document_id`, `category_id`, `document_name`, `content`) VALUES
(6, 32, 'Burial Cert V1', '<p style=\"text-align: center;\"><span style=\"font-weight: bolder;\"><span style=\"font-family: Verdana; font-size: 36px;\">Burial&nbsp;</span><span style=\"font-size: 36px; font-family: Verdana;\"><span style=\"font-size: 36px;\">Ce</span>rtificate</span></span></p><p style=\"text-align: center;\"><span style=\"font-weight: bolder;\"><span style=\"font-size: 36px; font-family: Verdana;\"><br></span></span></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">ï»¿In the Name of the Father, and the Son, and of the Holy Spirit. Amen</span></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"></p><div><table class=\"MsoNormalTable\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"0\" style=\"width: 498pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Name of Deceased</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:1;height:23.75pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Nationality</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:2;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Sex</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:3;height:23.75pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Name of Father</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:4;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Name of Mother</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:5;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Civil Status</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:6;height:23.75pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Name of Spouse</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:7;height:23.75pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Residence<o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:8;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Date of Birth</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:9;height:23.75pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Place of Birth</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:10;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Date of Death</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:11;height:23.75pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Place of Death</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:23.75pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:12;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Cause of Death</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________</span><span style=\"font-size: 12pt; font-family: &quot;Segoe UI&quot;, sans-serif;\"><o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:13;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Date of Burial Service<o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:14;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Place of Burial Service<o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:15;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Place of Burial<o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:16;mso-yfti-lastrow:yes;height:24.55pt\">\r\n  <td width=\"248\" valign=\"top\" style=\"width:185.9pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">Officiating Bishop<o:p></o:p></span></p>\r\n  </td>\r\n  <td width=\"416\" valign=\"top\" style=\"width:312.1pt;padding:0in 5.4pt 0in 5.4pt;\r\n  height:24.55pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal\"><span style=\"font-size: 18pt; font-family: &quot;Segoe UI&quot;, sans-serif;\">: ________________________________<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"></p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><br></span></div><div><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">REV. FR.</span></span><span style=\"font-family: Arial; font-size: 24px;\">________________________________</span></div><p style=\"line-height: 1;\"><span style=\"font-size: 18px;\"><span style=\"font-weight: bolder;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-family: Arial;\">&nbsp;<span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">&nbsp; &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; Parish Priest</span></span></span></p><div><span style=\"font-size: 18px;\"><span style=\"font-family: Arial;\"><span style=\"font-size: 24px;\"><br></span></span></span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_category`
--

CREATE TABLE `tbl_document_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_document_category`
--

INSERT INTO `tbl_document_category` (`category_id`, `name`, `description`, `user_id`) VALUES
(28, 'Marriage Certificate', 'k', 1),
(29, 'Certificate of Confirmation', 's', 1),
(30, 'Renewal of Marriage', 'd', 1),
(31, 'Baptismal Certificate', 'sd', 1),
(32, 'Burial Certificate', 's', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_request`
--

CREATE TABLE `tbl_document_request` (
  `request_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `remarks_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_request` date NOT NULL,
  `status` int(1) NOT NULL,
  `message_from_management` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_upload` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_document_request`
--

INSERT INTO `tbl_document_request` (`request_id`, `member_id`, `category_id`, `remarks_message`, `date_of_request`, `status`, `message_from_management`, `user_id`, `document_upload`) VALUES
(1, 3, 26, 's', '2021-11-02', 3, 'reject', 1, ''),
(2, 3, 26, 'p', '2021-11-02', 2, 's', 1, 'bdaee0eeede17e237e66cb026d281e06.jpg1635815101.jpg'),
(3, 3, 26, 's', '2021-11-02', 2, 's', 4, 'download (7).jpg1635815344.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE `tbl_donation` (
  `donation_id` int(11) NOT NULL,
  `donated_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_donation` date NOT NULL,
  `donation_type` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash_donation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof_of_donation` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(11) NOT NULL,
  `activity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `activity`, `time`) VALUES
(1, '<b>John Doe Reyes</b> edited document category <b>Live Birth Certificate</b>.', '2021-10-25 09:38:50 pm'),
(2, '<b>John Doe Reyes</b> encoded a donation.', '2021-10-25 09:40:07 pm'),
(3, '<b>John Doe Reyes</b> updated a donation.', '2021-10-25 09:40:19 pm'),
(4, '<b>John Doe Reyes</b> deleted a donation.', '2021-10-25 09:40:29 pm'),
(5, '<b>John Doe Reyes</b> added member <b>Member1 one one</b>.', '2021-11-02 09:03:31 am'),
(6, '<b>Member1 one one</b> added document request.', '2021-11-02 09:04:00 am'),
(7, '<b>John Doe Reyes</b> rejected a document request.', '2021-11-02 09:04:34 am'),
(8, '<b>Member1 one one</b> added document request.', '2021-11-02 09:04:48 am'),
(9, '<b>John Doe Reyes</b> approved a document request.', '2021-11-02 09:05:00 am'),
(10, '<b>Member1 one one</b> added document request.', '2021-11-02 09:08:38 am'),
(11, '<b>Priest   Account</b> approved a document request.', '2021-11-02 09:09:03 am'),
(12, '<b>John Doe Reyes</b> added document <b>Marriage Cert Ver 1</b>.', '2021-11-02 10:20:31 am'),
(13, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:10:18 am'),
(14, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:10:30 am'),
(15, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:10:40 am'),
(16, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:11:13 am'),
(17, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:11:31 am'),
(18, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:11:55 am'),
(19, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:18:37 am'),
(20, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:31:22 am'),
(21, '<b>John Doe Reyes</b> added document <b>d</b>.', '2021-11-02 11:34:10 am'),
(22, '<b>John Doe Reyes</b> deleted document <b>d</b>.', '2021-11-02 11:34:16 am'),
(23, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:55:15 am'),
(24, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:58:21 am'),
(25, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 11:59:27 am'),
(26, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 12:01:32 pm'),
(27, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 12:07:11 pm'),
(28, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 12:07:28 pm'),
(29, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 12:09:22 pm'),
(30, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 12:09:24 pm'),
(31, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 12:14:17 pm'),
(32, '<b>John Doe Reyes</b> deleted a document category.', '2021-11-02 12:55:28 pm'),
(33, '<b>John Doe Reyes</b> added document category <b>Certificate of Confirmation</b>.', '2021-11-02 12:55:46 pm'),
(34, '<b>John Doe Reyes</b> added document <b>Cert of Confirmation v1</b>.', '2021-11-02 01:19:05 pm'),
(35, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 01:22:04 pm'),
(36, '<b>John Doe Reyes</b> edited document <b>Cert of Confirmation v1</b>.', '2021-11-02 01:22:21 pm'),
(37, '<b>John Doe Reyes</b> edited document <b>Cert of Confirmation v1</b>.', '2021-11-02 01:22:50 pm'),
(38, '<b>John Doe Reyes</b> added document category <b>Renewal of Marriage</b>.', '2021-11-02 01:29:11 pm'),
(39, '<b>John Doe Reyes</b> added document <b>Renewal of Marriage v1</b>.', '2021-11-02 01:31:39 pm'),
(40, '<b>John Doe Reyes</b> edited document <b>Renewal of Marriage v1</b>.', '2021-11-02 01:31:55 pm'),
(41, '<b>John Doe Reyes</b> added document category <b>Baptismal Certificate</b>.', '2021-11-02 01:33:28 pm'),
(42, '<b>John Doe Reyes</b> added document <b>Baptismal Certificate V1</b>.', '2021-11-02 01:35:19 pm'),
(43, '<b>John Doe Reyes</b> edited document <b>Baptismal Certificate V1</b>.', '2021-11-02 01:35:56 pm'),
(44, '<b>John Doe Reyes</b> added document category <b>Burial Certificate</b>.', '2021-11-02 01:36:32 pm'),
(45, '<b>John Doe Reyes</b> added document <b>Burial Cert V1</b>.', '2021-11-02 01:40:04 pm'),
(46, '<b>John Doe Reyes</b> edited document <b>Marriage Cert Ver 1</b>.', '2021-11-02 01:42:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `last_name`, `first_name`, `middle_name`, `birth_date`, `age`, `gender`, `complete_address`, `contact`, `email`, `profile_picture`, `username`, `password`, `account_status`) VALUES
(3, 'one', 'Member1', 'one', '2021-11-25', 16, 'Male', 'ok', '09546546545', 's@gmail.com', 'download (1).jpg1635815012.jpg', '1', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_priest_schedule`
--

CREATE TABLE `tbl_priest_schedule` (
  `schedule_id` int(11) NOT NULL,
  `activity_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time_started` time NOT NULL,
  `time_ended` time NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_category` int(1) NOT NULL,
  `account_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `last_name`, `first_name`, `middle_name`, `contact`, `email`, `complete_address`, `username`, `password`, `profile_picture`, `account_category`, `account_status`) VALUES
(1, 'Reyes', 'John', 'Doe', '09090909090', 'parish_mgt@gmail.com', 'Prk. 1, Brgy. 2, This City, Philippines', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'img-default.jpg', 1, 1),
(4, 'Account', 'Priest', ' ', '09234234234', 'p@gmail.com', 'p', 'p', '83878c91171338902e0fe0fb97a8c47a', 'avatar-priest-outline-icon-signs-symbols-can-be-used-web-logo-mobile-app-ui-ux-avatar-priest-outline-icon-signs-138982203.jpg1632984388.jpg', 2, 1),
(5, ' ', 'Secretary', ' ', '09324234234', 's@gmail.com', 's', 's', '03c7c0ace395d80182db07ae2c30f034', 'woman-secretary-office-logo-icon-260nw-1768758878.jpg1632984417.jpg', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `tbl_document_category`
--
ALTER TABLE `tbl_document_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_document_request`
--
ALTER TABLE `tbl_document_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_priest_schedule`
--
ALTER TABLE `tbl_priest_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_document_category`
--
ALTER TABLE `tbl_document_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_document_request`
--
ALTER TABLE `tbl_document_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_priest_schedule`
--
ALTER TABLE `tbl_priest_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
