<div id="contenu">
  <h2>validation des fiches de frais</h2>

  <h3>Fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?> :
  </h3>
  <a href="index.php?uc=validerFrais&action=selectionMois"><button style="color: blue">Retour</button></a>
  <?php
  if ($lesFraisForfait == "") {
    echo "le visiteur n'a pas de fiche pour ce mois.";
  } else {

  ?>
    <div class="encadre">
      <p>
        Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?>
        <br />
      </p>

      <table class="listeLegere">
        <caption>Eléments forfaitisés </caption>
        <form method="POST" action="index.php?uc=validerFrais&action=modifierFraisFiche&lstMois=<?php echo $leMois ?>&lstVisiteur=<?php echo $idVisiteur ?>">
        <tr>
          <th>Libellé frais</th>
          <th>Prix Unitaire</th>
          <th>Quantité</th>
          <th>Montant Frais</th>
        </tr>
          <?php
          foreach ($lesFraisForfait as $unFraisForfait) 
          {
            $idFrais = $unFraisForfait['idfrais'];
            $libelle = $unFraisForfait['libelle'];
            $montant = $unFraisForfait['montant'];
            $quantite = $unFraisForfait['quantite'];
            $totligne= $montant * $quantite;
          ?>
            <tr>
              <td> <?php echo $libelle ?></td>
              <td class="colorTableMontant"> <?php echo $montant ?></td>
              <td class="qteForfait"><input type="text" id="frais" name="lesFrais[<?php echo $idFrais?>]" size="10" value="<?php echo $quantite ?>" ></td>
              <td class="colorTableMontant"> <?php echo $totligne ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <p>Total frais forfaitisés : <?php echo $totalFF; ?> €</p>
        <p><input id="ok" type="submit" value="Modifier les frais" size="20" /></p>
      </form>
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
        <th class='montant'>État du frais hors forfait</th>
      </tr>
      <?php
      foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
        $idHorsForfait = $unFraisHorsForfait['id'];
        $date = $unFraisHorsForfait['date'];
        $libelle = $unFraisHorsForfait['libelle'];
        $montant = $unFraisHorsForfait['montant'];
      ?>
        <tr>
          <td><?php echo $date ?></td>
          <td><?php echo $libelle ?></td>
          <td><?php echo $montant ?></td>
          <td>
            <form  method='POST' action='index.php?uc=validerFrais&action=modifierFraisHorsForfait&lstMois=<?php echo $leMois ?>&lstVisiteur=<?php echo $idVisiteur ?>' style="text-align: center;">
              
              <input type="radio" id="valider" name="fraisHorsForfait[<?php echo $idHorsForfait?>]" value="valider" checked>
              <label for="valider">Valider</label>

              <input type="radio" id="reporter" name="fraisHorsForfait[<?php echo $idHorsForfait?>]" value="reporter">
              <label for="reporter">Reporter</label>

              <input type="radio" id="refuser" name="fraisHorsForfait[<?php echo $idHorsForfait?>]" value="refuser">
              <label for="refuser">Refuser</label>

          </td>
        </tr>
      <?php
      }
      ?>
    </table>
    <?php
    //}
    ?>
    <p>Total frais hors forfait : <?php if($totalFHF > 0){echo $totalFHF;}else{echo '0';} ?> € </p>
    <input id="ok" type="submit" value="Modifier les frais hors forfait" size="20" /></p>
    </form>
    <br/>
    <p>Total de la fiche : <?php echo $total; ?> € </p>
    <a href="index.php?uc=validerFrais&action=changerStatutFiche&lstMois=<?php echo $leMois ?>&lstVisiteur=<?php echo $idVisiteur ?>"><button style="color: green; width: auto">Valider la fiche</button></a>

    </div>
</div>