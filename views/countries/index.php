<br><br>
<h1>Liste des pays</h1>

<form action="<?= PATH ?>/Countries/newCountry" method="POST">

    Entrez un nouveau pays : <input type="text" name="country"> 
    <select name="continent" >
    <?php foreach ($allContinents as $continent): ?>
    <option value="<?= $continent['ID_CONTINENT'] ?>"><?= $continent['NOM_CONTINENT'] ?></option>
    <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Valider</button>
    <br><br>
</form>


<table class="table table-success table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Continent</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($allCountries as $country) : ?>
        <tr>
            <td><?= $country['ID_PAYS'] ?></td>
            <td><?= $country['NOM_PAYS'] ?></td>
            <td><?= $country['NOM_CONTINENT'] ?></td>

            <td>
                <a href="<?= PATH ?>/countries/edit/<?= $country['ID_PAYS'] ?>">
                    <button class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
                <a onclick="return confirm('Etes vous sur de vouloir supprimer ce pays ?')" href="<?= PATH ?>/countries/deleteCountry/<?= $country['ID_PAYS']?>">
                    <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
            </td>
        </tr>
    <?php endforeach ?>

    </table>

    