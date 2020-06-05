-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2020 alle 09:05
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bopleve`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisti`
--

CREATE TABLE `acquisti` (
  `COD_Cliente` int(11) NOT NULL,
  `COD_Evento` int(11) NOT NULL,
  `n_tickets` int(11) NOT NULL,
  `data_acquisto` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `acquisti`
--

INSERT INTO `acquisti` (`COD_Cliente`, `COD_Evento`, `n_tickets`, `data_acquisto`) VALUES
(36, 33, 26, '2020-05-31'),
(36, 31, 10, '2020-05-31'),
(36, 32, 10, '2020-05-31'),
(36, 34, 10, '2020-05-31');

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--

CREATE TABLE `articles` (
  `ID_Articles` int(11) NOT NULL,
  `Article_Title` varchar(40) NOT NULL,
  `Date_Event` date NOT NULL,
  `Costo_Ticket` double DEFAULT NULL,
  `Location_Event` varchar(40) NOT NULL,
  `Time_Event` time(4) NOT NULL,
  `Image_Path` varchar(100) DEFAULT NULL,
  `Author_COD` int(11) NOT NULL,
  `Event_Description` varchar(1000) DEFAULT NULL,
  `num_click` int(11) DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `notifications_status` int(1) DEFAULT NULL,
  `Ticket_Available` int(11) NOT NULL,
  `notification_data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`ID_Articles`, `Article_Title`, `Date_Event`, `Costo_Ticket`, `Location_Event`, `Time_Event`, `Image_Path`, `Author_COD`, `Event_Description`, `num_click`, `Category`, `Status`, `notifications_status`, `Ticket_Available`, `notification_data`) VALUES
(30, 'Molo Street Parade', '2020-06-25', 10, 'Rimini Italia', '21:00:00.0000', 'resources/Users/MartinaCipolla/Articoli/Molo Street Parade.jpg', 2, 'La Molo Street Parade di Rimini è divenuta anno dopo anno uno dei principali eventi dell’estate della riviera romagnola. Come la Notte Rosa, anche la Molo Street Parade ha subito riscosso grande successo fra tutti: giovani, giovanissimi, coppie, famiglie, italiani e stranieri.\r\nTanto che nell’ultima edizione circa 200 mila persone hanno invaso il porto di Rimini per ballare, divertirsi e gustare le prelibatezze della cucina romagnola. Questo lo rende non solo uno dei principali eventi estivi della riviera, ma di tutta Italia.', 17, 'Serate', 1, NULL, 9987, '2020-05-29 14:57:17'),
(31, 'Concerto Red Hot Chlli Peppers', '2020-06-13', 50, 'Firenze', '21:00:00.0000', 'resources/Users/MartinaCipolla/Articoli/Concerto Red Hot Chilli Peppers.jpg', 2, 'I Red Hot Chili Peppers in concerto in Italia – la band statunitense icona della musica rock salirà sul palco della Visarno Arena di Firenze il 13 giugno 2020 nell’ambito del festival Firenze Rocks 2020. Ecco biglietti, prezzi e bus riservati ai fan.\r\nLa band, formata dal cantante Anthony Kiedis, dal bassista Flea, il batterista Chad Smith e il chitarrista Josh Klinghoffer , vanta la vendita di ben 60 milioni di dischi, e 6 Grammy Awards. Sul palco, i Red Hot presenteranno live i brani del loro ultimo album “The Getaway”, il sesto in studio, e i loro più grandi successi.', 10, 'Concerti', 1, NULL, 10974, '2020-05-30 07:55:26'),
(32, 'Festival Cinema Venezia', '2020-09-21', 20, 'Venezia Italia', '21:30:00.0000', 'resources/Users/MartinaCipolla/Articoli/Festival Cinema Venezia.png', 2, 'La Mostra internazionale d\'arte cinematografica è il festival cinematografico che si svolge annualmente a Venezia, Italia (solitamente tra la fine del mese di agosto e l\'inizio di settembre), nello storico Palazzo del Cinema sul lungomare Marconi (ed in altri edifici vicini o non lontani), al Lido di Venezia. Dopo l\'Oscar, è la manifestazione cinematografica più antica al mondo: la prima edizione si tenne tra il 6 e il 21 agosto 1932 (mentre l\'Academy Award, comunemente conosciuto come Premio Oscar, si svolge, in serata unica, dal 1929).', 13, 'Festivals', 1, NULL, 976, '2020-05-30 09:03:30'),
(33, 'Museo de Louvre', '2020-10-20', 10, 'Parigi (France)', '08:00:00.0000', 'resources/Users/MartinaCipolla/Articoli/Museo de Louvre.jpg', 2, 'Fantastica riapertura del museo del Louvre. Il museo del Louvre (in francese Musée du Louvre) di Parigi, in Francia, è uno dei più celebri musei del mondo e il primo per numero di visitatori: 10 milioni nel 2018. Si trova sulla rive droite, nel I arrondissement, tra la Senna e Rue de Rivoli', 36, 'Musei e Cultura', 1, NULL, 95875, '2020-05-30 09:06:47'),
(34, 'Aperitivo in Barca ', '2020-09-15', 15, 'Rimini Italia', '17:00:00.0000', 'resources/Users/MartinaCipolla/Articoli/Aperitivo in Barca .jpg', 2, 'Gli aperitivi in barca sono da sempre il nostro punto di forza, siamo stati i primi a proporli ed oggi è l’attività che tutti associano al nome East Coast Experience. Una veleggiata rilassante lungo il litorale, una sosta per i tuffi nella famosa Baia Spaghetti, lo spettacolo di un romantico ed indimenticabile tramonto, tutto questo ascoltando buona musica e gustando bollicine con sfiziosi spuntini in compagnia degli amici.', 8, 'Altro', 1, NULL, 3, '2020-05-30 10:38:53');

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `COD_Cliente` int(11) NOT NULL,
  `COD_Evento` int(11) NOT NULL,
  `n_tickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `ID_Notifica` int(11) NOT NULL,
  `COD_Cliente` int(11) DEFAULT NULL,
  `notific_content` varchar(600) DEFAULT NULL,
  `status_lettura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `notifiche`
--

INSERT INTO `notifiche` (`ID_Notifica`, `COD_Cliente`, `notific_content`, `status_lettura`) VALUES
(1, 43, 'trick e track bombe a mano noccioline e caramelle\r\n', 0),
(2, 2, 'Congratulazioni il tuo articolo, è stato approvato, ed è ora pubblico sul sito!.', 1),
(4, 2, 'Congratulazioni il tuo articolo, è stato approvato, ed è ora pubblico sul sito!.', 1),
(5, 2, 'Congratulazioni il tuo articolo, è stato approvato, ed è ora pubblico sul sito!.', 0),
(6, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(7, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(8, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(9, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(10, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(11, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(12, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(13, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(14, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(15, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(16, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0),
(17, NULL, 'Complimenti un tuo evento ha ottenuto il SOLD-OUT', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(17) NOT NULL,
  `Cognome` varchar(23) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Data_Nascita` date DEFAULT NULL,
  `Tipo_User` varchar(10) DEFAULT NULL,
  `ProfileImage` varchar(100) DEFAULT NULL,
  `unseen_notifications` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID`, `Nome`, `Cognome`, `email`, `password`, `Data_Nascita`, `Tipo_User`, `ProfileImage`, `unseen_notifications`) VALUES
(1, 'Gino', 'Pino', 'ginopino@gmail.com', '1cc38a37ec6b4ff4f9b0b68b2b8bf956', '1987-04-25', 'Promotore', NULL, '0'),
(2, 'Martina', 'Cipolla', 'cipollina92@gmail.com', 'afb1c68a051f3b32e01ec2b4b1ccf5ee', '1991-06-16', 'Promotore', NULL, '0'),
(36, 'Andrea', 'Stefanini', 'andreastefanini98@gmail.com', 'a8fb5e252cc594cac18a2579455df313', '1998-08-17', 'Admin', 'resources/Users/AndreaStefanini/Profilo/AndreaStefanini.jpg', '1'),
(43, 'Fabio', 'Volo', 'paolodomenico@gmail.com', 'b2067e9c094973b576059555fb81828e', '1977-11-24', 'Promotore', 'resources/Users/FabioVolo/Profilo/FabioVolo.jpg', '1'),
(44, 'Paolo', 'Brosio', 'paolobrosio@libero.it', '72bf4c311d31160b39bfb52cda70cbe7', '1956-09-23', 'Cliente', 'resources/Users/PaoloBrosio/Profilo/PaoloBrosio.jpg', '0'),
(45, 'Alberto', 'Rossi', 'albertoreds98@gmail.com', '6f2102ed8d9dac46586d8d46f22b5713', '1998-03-17', 'Admin', 'resources/Users/AlbertoRossi/Profilo/AlbertoRossi.JPG', '1');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquisti`
--
ALTER TABLE `acquisti`
  ADD KEY `COD_Cliente` (`COD_Cliente`),
  ADD KEY `COD_Evento` (`COD_Evento`);

--
-- Indici per le tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_Articles`),
  ADD KEY `Author_COD` (`Author_COD`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD KEY `COD_Cliente` (`COD_Cliente`),
  ADD KEY `COD_Evento` (`COD_Evento`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`ID_Notifica`),
  ADD KEY `COD_Cliente` (`COD_Cliente`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_Articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `ID_Notifica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquisti`
--
ALTER TABLE `acquisti`
  ADD CONSTRAINT `acquisti_ibfk_1` FOREIGN KEY (`COD_Cliente`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `acquisti_ibfk_2` FOREIGN KEY (`COD_Evento`) REFERENCES `articles` (`ID_Articles`);

--
-- Limiti per la tabella `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`Author_COD`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`COD_Cliente`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`COD_Evento`) REFERENCES `articles` (`ID_Articles`);

--
-- Limiti per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  ADD CONSTRAINT `notifiche_ibfk_1` FOREIGN KEY (`COD_Cliente`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
