<br><h2>Marque à modifier</h2><br>


<form action="<?= PATH ?>/Marques/updateMarque" method="POST">
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
<img src="https://www.jdwetherspoon.com/~/media/images/aut16/san-miguel-11.jpg?h=350&w=550&la=en&hash=A4A006495AA3B97AE26170E248EC0CC259E3CD4E" width="60%" height="500" >