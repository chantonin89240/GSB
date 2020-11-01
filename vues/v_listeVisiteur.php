<div id="contenu">
      <h2>validation des fiches de frais</h2>
      <h3>Mois et visiteur à sélectionner : </h3>
      <form action="index.php?uc=validerFrais&action=validationFrais" method="post">
      <div class="corpsForm2">
         
      <p class="formListValide">
	 
        <label for="lstMois">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
			foreach ($LesMoisFiche as $LesMois)
			{
			  $mois = $LesMois['mois'];
				$numAnnee =  $LesMois['numAnnee'];
				$numMois =  $LesMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
      }
		   ?>  

        </select>

        <label for="lstVisiteur" class="ListVisiteurValider">Visiteur : </label>
        <select id="lstVisiteur" name="lstVisiteur">
        <?php
        foreach ($LesVisiteurs as $laListeVisi)
			{
        $idVisiteur = $laListeVisi['id'];
        $nomVisiteur = $laListeVisi['nom'];
        $prenomVisiteur = $laListeVisi['prenom'];
				?>
				<option value="<?php echo $idVisiteur ?>"><?php echo  $nomVisiteur." ". $prenomVisiteur?> </option>
				<?php 
			
      }
		   ?>
        </select>
        
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
      </p> 
      </div>
        
      </form>