<div id="contenu">
  <h2>validation des fiches de frais <?php echo $leMois; ?></h2>
  <h3>Visiteur à sélectionner : </h3>
  <form action="index.php?uc=validerFrais&action=validationFrais" method="post">
    <div class="corpsForm2">

      <p class="formListValide">
        <label for="lstVisiteur" class="ListVisiteurValider">Visiteur : </label>
        <select id="lstVisiteur" name="lstVisiteur">
          <?php
          foreach ($LesVisiteurs as $laListeVisi) {
            $idVisiteur = $laListeVisi['id'];
            $nomVisiteur = $laListeVisi['nom'];
            $prenomVisiteur = $laListeVisi['prenom'];
          ?>
            <option value="<?php echo $idVisiteur ?>"><?php echo  $nomVisiteur . " " . $prenomVisiteur ?> </option>
          <?php

          }
          ?>
        </select>
        <input type="hidden" name="lstMois" value="<?php echo $leMois; ?>">
      </p>
    </div>
    <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
      </p>
    </div>

  </form>