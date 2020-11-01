<div id="contenu">
      <h2>validation des fiches de frais</h2>
      
      <h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
      <a href="index.php?uc=validerFrais&action=selectionVisiteur"><button style="color: blue">Retour</button></a>
    <?php 
    if($lesFraisForfait == "")
    {
      echo "le visiteur n'a pas de fiche pour ce mois.";
    }
    else{

    ?>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> 
        <br/>
        Total : 
                        
    </p>

    <a  href="index.php?uc=validerFrais&action=changerStatutFiche&lstMois=<?php echo $leMois ?>&lstVisiteur=<?php echo $idVisiteur ?>"><button style="color: green; width: auto">Valider la fiche</button></a>

  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
		 <?php
        }
		?>
		</tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
		?>
		</tr>
    </table>
    
    <?php
    }

    //if()
    //{
    ?>
  	<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>                
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
		  ?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
             </tr>
      <?php 
        }
      ?>
    </table>
  <?php 
    //}
	?>
  </div>
  </div>
 













