<br><h2>Entrez un fabricant à modifier: </h2><br>

<form action="<?= PATH ?>/fabricants/updateFabricant" method="POST">
<br>
<br>
<input type="hidden" name="id" value="<?= $currentFabricantId;?>">
<input type="text" name="updatedFabricant">
 <input type="submit" value="Valider">

</form>
