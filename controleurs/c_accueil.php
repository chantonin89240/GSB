<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_sommaire.php");
		break;
	}
	
}
?>