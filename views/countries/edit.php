<br><br>

<h2 class="display-3">Modifications</h2>

<br><br>
<form action="<?= PATH ?>/Countries/updateCountry" method="POST">
<input type="hidden" name="id" value="<?= $currentCountryId;?>">

    <h2>Entrez un pays à modifier : </h2><input type="text" name="updatedCountry"> 
    <select name="updatedContinent" >
    <?php foreach ($allContinents as $continent): ?>
    <option value="<?= $continent['ID_CONTINENT'] ?>"><?= $continent['NOM_CONTINENT'] ?></option>
    <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-dark">Valider</button>
</form>
