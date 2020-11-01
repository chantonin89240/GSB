<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'selectionVisiteur':{
        $LesMoisFiche = $pdo->getLesMoisFiche();
		$lesCles = array_keys( $LesMoisFiche );
		if(empty($lesCles[0]))
			$moisASelectionner = null;
		else
			$moisASelectionner = $lesCles[0];
		
		$LesVisiteurs = $pdo->getLesVisiteurs($lesCles);
		
		if(empty($LesVisiteurs[0]))
			$visiteurASelectionner = null;
		else
			$visiteurASelectionner = $LesVisiteurs[0];
		include("vues/v_listeVisiteur.php");
	}
	break;
	case 'validationFrais':{
		$leMois = $_REQUEST['lstMois'];
		$idVisiteur = $_REQUEST['lstVisiteur'];

		
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_ficheDuVisiteur.php");
	}
	break;
	case 'changerStatutFiche':{
		$leMois = $_REQUEST['lstMois'];
		$idVisiteur = $_REQUEST['lstVisiteur'];
		$etat = 'VA';
		$changeStatutFiche = $pdo->majEtatFicheFrais($idVisiteur,$leMois,$etat);
		header("location: index.php?uc=validerFrais&action=validationFrais&lstMois=$leMois&lstVisiteur=$idVisiteur");
	}
}
?>