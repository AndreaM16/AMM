-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2015 alle 20:43
-- Versione del server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cagliari`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`Codice` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Testo` text NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Codice_Utente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`Codice`, `Titolo`, `Testo`, `Data`, `Ora`, `Codice_Utente`) VALUES
(1, 'FORMAZIONI UFFICIALI - Torino-Cagliari', 'Sono state rese note pochi istanti fa le formazioni ufficiali di Torino e Cagliari, squadre che scenderanno in campo fra meno di un''ora all''Olimpico per la ventitreesima giornata del campionato di Serie A.\r\nL''ex Ventura conferma le attese della vigilia col tradizionale 3-5-2, affidandosi in avanti alla coppia Martinez-Quagliarella.\r\nZola dal canto suo opta per Dessena terzino destro, confermando Conti al centro della mediana dopo la gara con la Roma e rispolverando il 4-3-1-2 con Cossu dietro le punte.\r\n \r\nTORINO (3-5-2): Padelli; Bovo, Glik, Moretti; Bruno Peres, Benassi, Vives, El Kaddouri, Darmian; Martinez, Quagliarella.\r\nA disp.: Castellazzi, Ichazo, Bovo, Jansson, Silva, Molinaro, Masiello, Gazzi, Gonzalez, Amauri, Maxi Lopez\r\nAll. Ventura\r\nCAGLIARI (4-3-1-2): Brkic, Dessena, Rossettini, Capuano, Avelar; Ekdal, Conti, Donsah; Cossu; Sau, Cop.\r\nA disp.: Colombi, Cragno, Ceppitelli, Gonzalez, Diakitè, Murru, Husbauer, Crisetig, M''Poku, Joao Pedo, Farias\r\nAll. Zola', '2015-02-16', '11:19:20', 1),
(2, 'Cagliari: con Zola un altro passo', 'A poco meno di due mesi dal suo arrivo sulla panchina del Cagliari, il primo bilancio sull''avventura di Gianfranco Zola alla guida dei rossoblù ì senz''altro positivo. Il tecnico di Oliena, arrivato alla vigilia di Natale al posto di Zdenek Zeman ereditando una situazione di classifica che recitava ben cinque punti sotto la zona salvezza, sembra aver rigenerato il Cagliari: a parte l''esordio shock di Palermo, sotto la guida di Zola i rossoblù hanno infatti cambiato passo in campionato, viaggiando a una media di 1,16 punti a partita rispetto allo 0,75 della gestione boema. Non solo, con Zola in panchina i rossoblù hanno centrato la prima vittoria stagionale al Sant''Elia e ben due vittorie consecutive tra le mura amiche, che insieme al pareggio sul campo dell''Udinese avevano permesso al Cagliari di lasciare la zona retrocessione. Magic box ha portato una nuova aria nell''ambiente rossoblù, lavorando sulla testa della squadra e imponendo il modulo con due trequartisti che ha regalato solidità ed equilibrio in campo, ma dopo le due sconfitte consecutive contro Atalanta e Roma c''è ancora da lavorare molto per arrivare alla salvezza. ', '2015-02-15', '11:00:00', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE IF NOT EXISTS `ordine` (
`Codice` int(11) NOT NULL,
  `Codice_Prodotto` int(11) NOT NULL,
  `Codice_Utente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Totale` float NOT NULL,
  `Pagato` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`Codice`, `Codice_Prodotto`, `Codice_Utente`, `Data`, `Ora`, `Totale`, `Pagato`) VALUES
(12, 1, 2, '2015-02-18', '19:08:24', 60, 1),
(13, 2, 2, '2015-02-18', '19:22:31', 60, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE IF NOT EXISTS `prodotto` (
`Codice` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Descrizione` text NOT NULL,
  `Prezzo` float NOT NULL,
  `Immagine` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`Codice`, `Nome`, `Descrizione`, `Prezzo`, `Immagine`) VALUES
(1, 'Maglia Home', 'Maglia ufficiale manica corta, vestibilità slim fit.\r\nComposizione: 90% poliestere 10% elastam.\r\n\r\n\r\nTessuto a maglia leggero ed elastico con mano pesca cotoniera.\r\nMaglia girocollo con finto scollo a V, loghi Kappa stampati ad alta densità.', 60, 'home.jpg'),
(2, 'Maglia Away', 'Maglia ufficiale manica corta, vestibilità slim fit.\r\nComposizione: 90% poliestere 10% elastam.\r\nTessuto a maglia leggero ed elastico con mano pesca cotoniera.\r\n\r\nMaglia girocollo con finto scollo a V, loghi Kappa stampati ad alta densità.', 60, 'away.jpg'),
(3, 'Maglia portiere', ' Maglia ufficiale manica corta, vestibilitÃ  slim fit.\r\nComposizione:90% poliestere 10% elastam.\r\nTessuto a maglia leggero ed elastico con mano pesca cotoniera.\r\nMaglia girocollo con finto scollo a V, loghi Kappa s', 50, 'goal.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
`Codice` int(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `Livello` int(255) NOT NULL,
  `Data_Nascita` date NOT NULL,
  `Indirizzo` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Codice`, `User`, `Email`, `Nome`, `Cognome`, `Livello`, `Data_Nascita`, `Indirizzo`, `Telefono`, `Password`) VALUES
(1, 'admin', 'admin@email.it', 'Mario', 'Rossi', 2, '1985-09-10', 'Via Verdi 85 Cagliari', '070841571', 'admin'),
(2, 'user', 'user@email.it', 'Marco', 'Bianchi', 1, '1990-02-02', 'Via Stazione 44 Elmas', '0704842157', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`Codice`);

--
-- Indexes for table `ordine`
--
ALTER TABLE `ordine`
 ADD PRIMARY KEY (`Codice`);

--
-- Indexes for table `prodotto`
--
ALTER TABLE `prodotto`
 ADD PRIMARY KEY (`Codice`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
 ADD PRIMARY KEY (`Codice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ordine`
--
ALTER TABLE `ordine`
MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `prodotto`
--
ALTER TABLE `prodotto`
MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
MODIFY `Codice` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
