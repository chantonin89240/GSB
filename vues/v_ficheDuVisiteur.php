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
        <tr>
          <?php
          foreach ($lesFraisForfait as $unFraisForfait) {
            $libelle = $unFraisForfait['libelle'];
          ?>
            <th> <?php echo $libelle ?></th>
          <?php
          }
          ?>
        </tr>
        <tr>
          <?php
          foreach ($lesFraisForfait as $unFraisForfait) {
            $libelle = $unFraisForfait['montant'];
          ?>
            <td class="colorTableMontant"> <?php echo $libelle ?></td>
          <?php
          }
          ?>
        </tr>
        <tr>
          <?php
          foreach ($lesFraisForfait as $unFraisForfait) {
            $quantite = $unFraisForfait['quantite'];
          ?>
            <td class="qteForfait"><input type="text" id="frais" name="frais" value="<?php echo $quantite ?>" checked></td>
          <?php
            $lesFrais = [$unFraisForfait['idfrais'] => $unFraisForfait['quantite']];
          }
          ?>
          <td><a href="index.php?uc=validerFrais&action=modifierFraisFiche&lstMois=<?php echo $leMois ?>&lstVisiteur=<?php echo $idVisiteur ?>&lesFrais=<?php echo $lesFrais ?>"><button style="width: auto">Modifier les frais</button></a></td>
        </tr>
      </table>
      <p>Total frais forfaitisés : <?php echo $totalFF; ?></p>
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
        $date = $unFraisHorsForfait['date'];
        $libelle = $unFraisHorsForfait['libelle'];
        $montant = $unFraisHorsForfait['montant'];
      ?>
        <tr>
          <td><?php echo $date ?></td>
          <td><?php echo $libelle ?></td>
          <td><?php echo $montant ?></td>
          <td>
            <form  method='POST' action='index.php?uc=' style="text-align: center;">
              
              <input type="radio" id="valider" name="valider" value="valider" checked>
              <label for="valider">Valider</label>

              <input type="radio" id="reporter" name="reporter" value="reporter">
              <label for="reporter">Reporter</label>

              <input type="radio" id="refuser" name="refuser" value="refuser">
              <label for="refuser">Refuser</label>

            </form>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
    <?php
    //}
    ?>
    <p>Total frais hors forfait : <?php echo $totalFHF; ?></p>
    <br/>
    <p>Total de la fiche : <?php echo $total; ?></p>
    <a href="index.php?uc=validerFrais&action=changerStatutFiche&lstMois=<?php echo $leMois ?>&lstVisiteur=<?php echo $idVisiteur ?>"><button style="color: green; width: auto">Valider la fiche</button></a>

    </div>
</div>