    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
      </div>  
         <ul id="menuList">
			   <li class="leVisiteur">
				   <?php echo $_SESSION['prenom']." <br /> ".$_SESSION['nom']  ?>
            </li>
            <li class="visiMedi">
               <?php echo $_SESSION['statut']  ?>
            </li>
            <li class="smenu">
               <a href="index.php?uc=accueil&action=accueil" title="Accueil">Accueil</a>
            </li>
            <li class="smenu">
               <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Se déconnecter</a>
            </li>
            <?php
            if ($_SESSION['statut'] == "visiteur médical")
            {
               ?>
               <li class="smenu">
                  <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
               </li>
               <li class="smenu">
                  <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
               </li>
               <?php
            }
            if ($_SESSION['statut'] == "comptable")
            {
               ?>
               <li class="smenu">
                  <a href="index.php?uc=validerFrais&action=selectionVisiteur" title="valider fiche de frais">valider fiche de frais</a>
               </li>
               <li class="smenu">
                  <a href="index.php?uc=suivreFrais&action=suivreFrais" title="Suivre le paiement de mes fiches de frais">Suivre le paiement</a>
               </li>
               <?php
            }
            ?>
         </ul>
    </div>

    <div id="contenu">
      <h2>Bienvenue sur l'intranet GSB</h2>
    </div>

    

    