<br><h2>Entrez une type de biere à modifier : </h2><br>

<form action="<?= PATH ?>/bieres/updateBiere" method="POST">
<br>
<br>
<input type="hidden" name="id" value="<?= $currentBiereId;?>">
<input type="text" name="updatedBiere">
 <input type="submit" value="Valider">

</form>
