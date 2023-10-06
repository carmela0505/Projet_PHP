
<br><h2>Entrez un continent à modifier :</h2> <br>

<form action="<?= PATH ?>/continents/updateContinent" method="POST">
<br>
<br>
<input type="hidden" name="id" value="<?= $currentContinentId;?>">
<input type="text" name="updatedContinent">
 <input type="submit" value="Valider">

</form>
