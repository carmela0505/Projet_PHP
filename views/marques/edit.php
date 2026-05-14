<br><h2>Marque à modifier</h2><br>


<form action="<?= PATH ?>/index.php?p=marques/updateMarque" method="POST">
<input type="hidden" name="id" value="<?= $currentMarqueId;?>">

    Entrez une nouvelle marque : <input type="text" name="updatedMarque"> 
    <select name="updatedCountry" >
    <?php foreach ($allCountries as $country): ?>
    <option value="<?= $country['ID_PAYS'] ?>"><?= $country['NOM_PAYS'] ?></option>
    <?php endforeach; ?>
    </select>


    <select name="updatedFabricant" >
    <?php foreach ($allFabricants as $fabricant): ?>
    <option value="<?= $fabricant['ID_FABRICANT'] ?>"><?= $fabricant['NOM_FABRICANT'] ?></option> 
    <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-warning">Valider</button>
</form>
<img src="https://img.freepik.com/premium-photo/three-glasses-with-draft-beer-front-wooden-barrel-decoration-barley-ears-fresh-hops_341862-13588.jpg" width="70%" height="500" >