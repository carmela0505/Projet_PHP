<br><br><h1>Liste des fabricants </h1>


<form action="<?= PATH ?>/Fabricants/newFabricant" method="POST">

  Entrez un nouveau fabricant :<input type="text" name="fabricant"> 
    <input type="submit" value="Valider">
 <br><br>

</form>

<table class="table table-secondary table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($allFabricants as $fabricant) : ?>
        <tr>
            <td><?= $fabricant['ID_FABRICANT'] ?></td>
            <td><?= $fabricant['NOM_FABRICANT'] ?></td>
            <td>
                <a href="<?= PATH ?>/fabricants/edit/<?= $fabricant['ID_FABRICANT'] ?>">
                    <button class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
                <a onclick="return confirm('Etes vous sur de vouloir supprimer ce fabricant ?')" href="<?= PATH ?>/fabricants/deleteFabricant/<?= $fabricant['ID_FABRICANT']?>">
                    <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
            </td>
        </tr>
    <?php endforeach ?>

    </table>