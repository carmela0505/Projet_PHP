<br><br><h1 >Article à modifier</h1><br><br>


<form action="<?= PATH ?>/Articles/updateArticle" method="POST">
<input type="hidden" name="id" value="<?= $currentArticleId;?>">

    Modifiez un article : <input type="text" name="updatedArticle"> 
    <select name="updatedMarque" >
    <?php foreach ($allMarques as $marque): ?>
    <option value="<?= $marque['ID_MARQUE'] ?>"><?= $marque['NOM_MARQUE'] ?></option>
    <?php endforeach; ?><br>
    </select>


    <select name="updatedCouleur" >
    <?php foreach ($allCouleurs as $couleur): ?>
    <option value="<?= $couleur['ID_COULEUR'] ?>"><?= $couleur['NOM_COULEUR'] ?></option> 
    <?php endforeach; ?>
    </select>
    <!-- <button type="submit" class="btn btn-dark">Valider</button> -->

    <select name="updatedType" >
    <?php foreach ($allTypes as $type): ?>
    <option value="<?= $type['ID_TYPE'] ?>"><?= $type['NOM_TYPE'] ?></option> 
    <?php endforeach; ?>
    </select>

    <div class="row">
<div class="col-12 d-flex align-items-center justify-content-center">
    <div class="form-group">
        <label for="prix">Prix d'achat :</label>
        <input type="number" step="0.01" class="form-control form-control-sm" placeholder="Saisir un Prix" name="prix" id="prix" required />
    </div>
    <div class="form-group">
        <label for="volume">Volume :</label>
        <select name="volume" id="volume" class="form-control form-control-sm">
            <option value="33">33cl</option>
            <option value="75">75cl</option>
        </select>
    </div>
    <div class="form-group">
        <label for="titrage">Titrage en °C :</label>
        <input type="number" step="0.01" class="form-control form-control-sm" placeholder="Saisir un Titrage" name="titrage" id="titrage" required />
    </div>
</div>
</div><br><br>
  <button type="submit" class="btn btn-warning">Valider</button><br>
  
</form>
<img src="https://www.thedailymeal.com/img/gallery/whats-the-difference-between-ipa-and-lager/l-intro-1664205826.jpg" width="70%" height="500" >