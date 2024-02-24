<br><br>
<h1>Liste des Articles</h1><br>

<form action="<?= PATH ?>/Articles/newArticle" method="POST">
<!-- <input type="hidden" name="id" value="<? //$currentArticleId;?>"> -->

    Entrez un nouvel article : <input type="text" name="article"> 
    <select name="marque" >
    <?php foreach ($allMarques as $marque): ?>
    <option value="<?= $marque['ID_MARQUE'] ?>"><?= $marque['NOM_MARQUE'] ?></option>
    <?php endforeach; ?>
    </select>


    <select name="couleur" >

    <?php foreach ($allCouleurs as $couleur): ?>
    <option value="<?= $couleur['ID_COULEUR'] ?>"><?= $couleur['NOM_COULEUR'] ?></option> 
    <?php endforeach; ?>
    </select>
    <!-- <button type="submit" class="btn btn-dark">Valider</button> -->
   
    <select name="type" >

    <?php foreach ($allTypes as $type): ?>
    <option value="<?= $type['ID_TYPE'] ?>"><?= $type['NOM_TYPE'] ?></option> 
    <?php endforeach; ?>
    </select>

<div class="row">
<div class="col-12 d-flex align-items-center justify-content-center">
    <div class="form-group"><br>
        <label for="prix">Prix d'achat :</label>
        <input type="number" step="0.01" class="form-control form-control-sm" placeholder="Saisir un Prix" name="prix" id="prix" required /><br><br>
    </div>
    <div class="form-group"><br>
        <label for="volume">Volume :</label>
        <select name="volume" id="volume" class="form-control form-control-sm">
            <option value="33">33cl</option>
            <option value="75">75cl</option>
        </select><br><br>
    </div>
    <div class="form-group"><br>
        <label for="titrage">Titrage en °C :</label>
        <input type="number" step="0.01" class="form-control form-control-sm" placeholder="Saisir un Titrage" name="titrage" id="titrage" required /><br><br>
    </div>
</div>
</div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form><br>


<table class="table table-primary table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Volume</th>
        <th>Titrage</th>
        <th>Marque</th>
        <th>Couleur</th>
        <th>Type de bière</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($allArticles as $article) : ?>
        <tr>
            <td><?= $article['ID_ARTICLE'] ?></td>
            <td><?= $article['NOM_ARTICLE'] ?></td>
            <td><?= $article['PRIX_ACHAT'] ?></td>
            <td><?= $article['VOLUME'] ?></td>
            <td><?= $article['TITRAGE'] ?></td>
            <td><?= $article['NOM_MARQUE'] ?></td>
            <td><?= $article['NOM_COULEUR'] ?></td>
            <td><?= $article['NOM_TYPE'] ?></td>

            <td>
                <a href="<?= PATH ?>/articles/edit/<?= $article['ID_ARTICLE'] ?>">
                    <button class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
                <a onclick="return confirm('Etes vous sur de vouloir supprimer cette article ?')" href="<?= PATH ?>/articles/deleteArticle/<?= $article['ID_ARTICLE']?>">
                    <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
            </td>
        </tr>
    <?php endforeach ?>

    </table>

    