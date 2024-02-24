
<br><br>
<h2>Pays à modifier</h2>


<form action="<?= PATH ?>/Countries/updateCountry" method="POST">
<input type="hidden" name="id" value="<?= $currentCountryId;?>">

    Entrez un nouveau pays : <input type="text" name="updatedCountry"> 
    <select name="updatedContinent" >
    <?php foreach ($allContinents as $continent): ?>
    <option value="<?= $continent['ID_CONTINENT'] ?>"><?= $continent['NOM_CONTINENT'] ?></option>
    <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-warning">Valider</button>
</form>
<img src="https://ec.europa.eu/eurostat/documents/4187653/17240464/Alter-ego_Shutterstock_1818547007_RV.jpg" width="70%" height="500" >