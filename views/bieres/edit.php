<br><br><h2>Bière à modifier  </h2>

<form action="<?= PATH ?>/bieres/updateBiere" method="POST">
<br>
<br>
<input type="hidden" name="id" value="<?= $currentBiereId;?>">
<h6>Entrez une type de bière à modifier: <input type="text" name="updatedBiere">
<button type="submit" class="btn btn-warning">Valider</button>

</form>
<img src="https://img.freepik.com/premium-photo/three-glasses-with-draft-beer-front-wooden-barrel-decoration-barley-ears-fresh-hops_341862-13588.jpg" width="70%" height="500" >