-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 21 avr. 2021 à 07:09
-- Version du serveur :  5.7.24
-- Version de PHP :  7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `fichefrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
('a131', '202003', 0, '0.00', '2020-04-01', 'CL'),
('a131', '202004', 0, '0.00', '2020-06-18', 'VA'),
('a131', '202005', 0, '0.00', '2020-06-18', 'VA'),
('a131', '202006', 0, '0.00', '2021-04-20', 'CL'),
('a131', '202104', 0, '0.00', '2021-04-20', 'CR'),
('a17', '202003', 0, '0.00', '2020-11-29', 'VA'),
('a17', '202004', 0, '0.00', '2020-04-07', 'CR'),
('a55', '202003', 0, '0.00', '2020-11-29', 'VA'),
('b13', '202005', 0, '0.00', '2020-05-26', 'CR');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE `fraisforfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', '110.00'),
('KM', 'Frais Kilométrique', '0.62'),
('NUI', 'Nuitée Hôtel', '80.00'),
('REP', 'Repas Restaurant', '25.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE `lignefraisforfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`) VALUES
('a131', '202003', 'ETP', 0),
('a131', '202003', 'KM', 0),
('a131', '202003', 'NUI', 0),
('a131', '202003', 'REP', 0),
('a131', '202004', 'ETP', 0),
('a131', '202004', 'KM', 0),
('a131', '202004', 'NUI', 0),
('a131', '202004', 'REP', 0),
('a131', '202005', 'ETP', 10),
('a131', '202005', 'KM', 50),
('a131', '202005', 'NUI', 0),
('a131', '202005', 'REP', 2),
('a131', '202006', 'ETP', 0),
('a131', '202006', 'KM', 0),
('a131', '202006', 'NUI', 0),
('a131', '202006', 'REP', 0),
('a131', '202104', 'ETP', 0),
('a131', '202104', 'KM', 60),
('a131', '202104', 'NUI', 2),
('a131', '202104', 'REP', 4),
('a17', '202003', 'ETP', 0),
('a17', '202003', 'KM', 0),
('a17', '202003', 'NUI', 0),
('a17', '202003', 'REP', 0),
('a17', '202004', 'ETP', 0),
('a17', '202004', 'KM', 0),
('a17', '202004', 'NUI', 0),
('a17', '202004', 'REP', 0),
('a55', '202003', 'ETP', 0),
('a55', '202003', 'KM', 0),
('a55', '202003', 'NUI', 0),
('a55', '202003', 'REP', 0),
('b13', '202005', 'ETP', 10),
('b13', '202005', 'KM', 50),
('b13', '202005', 'NUI', 0),
('b13', '202005', 'REP', 0);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

CREATE TABLE `lignefraishorsforfait` (
  `id` int(11) NOT NULL,
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idVisiteur`, `mois`, `libelle`, `date`, `montant`) VALUES
(3, 'a55', '202003', 'bus', '2020-03-12', '50.00'),
(4, 'a131', '202004', 'MBP', '2020-03-12', '150.00'),
(6, 'a131', '202005', 'blabla', '2020-05-13', '50.00'),
(7, 'a131', '202005', 'livre', '2020-05-16', '90.00'),
(8, 'a131', '202006', 'voyage', '2020-06-18', '50.00');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `statut` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `statut`) VALUES
('a131', 'Villechalane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21', 'visiteur médical'),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '2016-11-23', 'visiteur médical'),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '2017-01-12', 'visiteur médical'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2015-05-01', 'comptable'),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '2017-07-09', 'visiteur médical'),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '2010-05-11', 'visiteur médical'),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '2009-10-21', 'visiteur médical'),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05', 'visiteur médical'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2015-11-12', 'visiteur médical'),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23', 'visiteur médical'),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12', 'visiteur médical'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2014-08-11', 'visiteur médical'),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2011-11-18', 'visiteur médical'),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2012-02-11', 'comptable'),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14', 'visiteur médical'),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2016-11-23', 'visiteur médical'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2010-05-11', 'visiteur médical'),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2011-04-17', 'visiteur médical'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2015-11-12', 'visiteur médical'),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2017-02-05', 'visiteur médical'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2010-08-01', 'visiteur médical'),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '2015-10-10', 'visiteur médical'),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '2018-09-01', 'visiteur médical'),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '2016-11-01', 'visiteur médical'),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2019-11-10', 'comptable'),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '2014-10-01', 'visiteur médical'),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '2018-11-01', 'visiteur médical');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`idVisiteur`,`mois`),
  ADD KEY `idEtat` (`idEtat`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  ADD KEY `idFraisForfait` (`idFraisForfait`);

--
-- Index pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVisiteur` (`idVisiteur`,`mois`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`);

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `fichefrais` (`idVisiteur`, `mois`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `fraisforfait` (`id`);

--
-- Contraintes pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `fichefrais` (`idVisiteur`, `mois`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
