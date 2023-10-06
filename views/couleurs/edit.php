<br><h2>Entrez une couleur à modifier: </h2><br>

<form action="<?= PATH ?>/couleurs/updateColor" method="POST">
<br>
<br>
<input type="hidden" name="id" value="<?= $currentColorId;?>">
<input type="text" name="updatedColor">
 <input type="submit" value="Valider">

</form>
