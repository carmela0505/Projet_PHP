<h1>Liste des Bieres </h1>


<form action="<?= PATH ?>/Bieres/newBiere" method="POST">

    Entrez une nouvelle type de biere : <input type="text" name="biere"> 
    <input type="submit" value="Valider">
 <br><br>

</form>

<table class="table table-info table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($allBieres as $biere) : ?>
        <tr>
            <td><?= $biere['ID_TYPE'] ?></td>
            <td><?= $biere['NOM_TYPE'] ?></td>
            <td>
                <a href="<?= PATH ?>/bieres/edit/<?= $biere['ID_TYPE'] ?>">
                    <button class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
                <a onclick="return confirm('Etes vous sur de vouloir supprimer cette biere ?')" href="<?= PATH ?>/bieres/deleteBiere/<?= $biere['ID_TYPE']?>">
                    <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
            </td>
        </tr>
    <?php endforeach ?>

    </table>

    