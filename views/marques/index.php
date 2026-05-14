<br><br>
<h1>Liste des Marques</h1>

<form action="<?= PATH ?>/Marques/newMarque" method="POST">
<input type="hidden" name="id" value="<?= $currentMarqueId;?>">

    Entrez une nouvelle marque : <input type="text" name="marque"> 
    <select name="country" >
    <?php foreach ($allCountries as $country): ?>
    <option value="<?= $country['ID_PAYS'] ?>"><?= $country['NOM_PAYS'] ?></option>
    <?php endforeach; ?>
    </select>


    <select name="fabricant" >

    <?php foreach ($allFabricants as $fabricant): ?>
    <option value="<?= $fabricant['ID_FABRICANT'] ?>"><?= $fabricant['NOM_FABRICANT'] ?></option> 
    <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Valider</button>
</form><br>


<table class="table table-success table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Pays</th>
        <th>Fabricant</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($allMarques as $marque) : ?>
        <tr>
            <td><?= $marque['ID_MARQUE'] ?></td>
            <td><?= $marque['NOM_MARQUE'] ?></td>
            <td><?= $marque['NOM_PAYS'] ?></td>
            <td><?= $marque['NOM_FABRICANT'] ?></td>

            <td>
                <a href="<?= PATH ?>/marques/edit/<?= $marque['ID_MARQUE'] ?>">
                    <button class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
                <a onclick="return confirm('Etes vous sur de vouloir supprimer cette marque ?')" href="<?= PATH ?>/marques/deleteMarque/<?= $marque['ID_MARQUE']?>">
                    <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
            </td>
        </tr>
    <?php endforeach ?>

    </table>

    