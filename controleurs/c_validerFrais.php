<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
	case 'selectionMois': {
			$lesMois = $pdo->getLesMoisFiche();
			$lesCles = array_keys($lesMois);
			if (empty($lesCles[0]))
				$moisASelectionner = null;
			else
				$moisASelectionner = $lesCles[0];
			include("vues/v_listeMoisComptable.php");
		}
		break;
	case 'selectionVisiteur': {
			$leMois = $_REQUEST['lstMois'];
			$LesVisiteurs = $pdo->getLesVisiteurs($leMois);
			if (empty($LesVisiteurs[0]))
				$visiteurASelectionner = null;
			else
				$visiteurASelectionner = $LesVisiteurs[0];
			include("vues/v_listeVisiteur.php");
		}
		break;
	case 'validationFrais': {
			$leMois = $_REQUEST['lstMois'];
			$idVisiteur = $_REQUEST['lstVisiteur'];

			$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
			$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
			$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
			$numAnnee = substr($leMois, 0, 4);
			$numMois = substr($leMois, 4, 2);
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
			$totalFF = $pdo->calculFF($idVisiteur, $leMois);
			$totalFHF = $pdo->calculFHF($idVisiteur, $leMois);
			$total = $totalFF + $totalFHF;

			include("vues/v_ficheDuVisiteur.php");
		}
		break;
	case 'modifierFraisFiche':{
		$leMois = $_REQUEST['lstMois'];
		$idVisiteur = $_REQUEST['lstVisiteur'];
		$lesFrais = $_REQUEST['lesFrais'];
		
		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$leMois,$lesFrais);
			header("location: index.php?uc=validerFrais&action=validationFrais&lstMois=$leMois&lstVisiteur=$idVisiteur");
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
		
	}
	break;
	case 'modifierFraisHorsForfait':{
		$leMois = $_REQUEST['lstMois'];
		$idVisiteur = $_REQUEST['lstVisiteur'];
		$lesHorsForfait = $_REQUEST['fraisHorsForfait'];

		foreach ($lesHorsForfait as $idUnHorsForfait => $valueUnHorsForfait)
		{
			if($valueUnHorsForfait == 'reporter')
			{
				$horsForfait = $pdo->verifMoisHorsForfait($leMois, $idVisiteur);
				if($horsForfait == true)
				{
					$lePremierMois = $pdo->lePremierMoisFiche($leMois, $idVisiteur);
					$changerMoisFrais = $pdo->changerMoisFraisHorsForfait($lePremierMois[0], $idUnHorsForfait);
				}
				else
				{
					$leMois += 1;
					$creeFiche = $pdo->creeNouvellesLignesFrais($idVisiteur, $leMois);
					$changerMoisFrais = $pdo->changerMoisFraisHorsForfait($leMois, $idUnHorsForfait);
				}
			}
			else if($valueUnHorsForfait == 'refuser')
			{
				$verifHorsForfait = $pdo->verifFraisHorsForfait($idUnHorsForfait); 
				if($verifHorsForfait == true)
				{
					$leLibelle = $pdo->recupLibelleHorsforfait($idUnHorsForfait);
					$refusHorsForfait = $pdo->refusFraisHorsForfait($idUnHorsForfait, $leLibelle['libelle']);
				}
			}
			else
			{
				$verifHorsForfait = $pdo->verifFraisHorsForfait($idUnHorsForfait); 
				if($verifHorsForfait == false)
				{
					$leLibelle = $pdo->recupLibelleHorsforfait($idUnHorsForfait);
					$libelle = strstr($leLibelle['libelle'], ' ');
					$validerHorsForfait = $pdo->validerFraisHorsForfait($idUnHorsForfait, $libelle);
				}
			}
		}
		header("location: index.php?uc=validerFrais&action=validationFrais&lstMois=$leMois&lstVisiteur=$idVisiteur");
	}
	break;
	case 'changerStatutFiche': {
			$leMois = $_REQUEST['lstMois'];
			$idVisiteur = $_REQUEST['lstVisiteur'];
			$etat = 'VA';
			$changeStatutFiche = $pdo->majEtatFicheFrais($idVisiteur, $leMois, $etat);
			header("location: index.php?uc=validerFrais&action=validationFrais&lstMois=$leMois&lstVisiteur=$idVisiteur");
		}
}
