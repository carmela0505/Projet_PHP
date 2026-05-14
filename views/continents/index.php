<br>
<?php echo "<h1><center>Liste des Continents</center></h1>" ?>

<form action="<?= PATH ?>/Continents/newContinent" method="POST"> 

Entrez un nouveau continent : <input type="text" name="continent"> 
<button type="submit" class="btn btn-primary">Valider</button><br><br>

</form>
<table class="table table-primary table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach($allContinents as $continent):?> 

    <tr>
        <td><?= $continent['ID_CONTINENT'] ?></td>
        <td><?= $continent['NOM_CONTINENT'] ?></td>
        <td>
        <a href="<?= PATH ?>/continents/edit/<?= $continent['ID_CONTINENT'] ?>">
                    <button class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
                    <a onclick="return confirm('Etes vous sur de vouloir supprimer ce continent ?')" 
                href="<?= PATH ?>/continents/deleteContinent/<?= $continent['ID_CONTINENT']?>">
                    <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
        </td>
    </tr>
    
    <?php endforeach ?>

</table>