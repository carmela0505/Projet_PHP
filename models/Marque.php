<?php

class Marque extends Model
{

    public function __construct()
    {
        $this->table = "marque";

        $this->getConnection();
    }

    public function allMarques()
    {
        $sql = "SELECT marque.*, NOM_PAYS, NOM_FABRICANT FROM ".$this->table. 
        " LEFT JOIN pays ON marque.ID_PAYS = pays.ID_PAYS
         LEFT JOIN fabricant ON marque.ID_FABRICANT=fabricant.ID_FABRICANT
         ORDER BY ID_MARQUE DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allCountries()
    {
        $sql = "SELECT * FROM pays";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allFabricants()
    {
        $sql = "SELECT * FROM fabricant";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function insertMarque(string $marque, $idCountry, $idFabricant)
    {
        $sql = "INSERT INTO " . $this->table . "(NOM_MARQUE, ID_PAYS, ID_FABRICANT) 
            VALUES (?,?,?)";
        $query = $this->_connexion->prepare($sql);
        $query->execute([$marque,$idCountry,$idFabricant]);

    }


////////////////////////////////////////////////////////////
    public function updateMarque(array $updatedMarque)
    {
        $sql = "UPDATE " . $this->table . " set NOM_MARQUE=?, ID_PAYS=?, ID_FABRICANT=? WHERE ID_MARQUE=?";
        $query = $this->_connexion->prepare($sql);
        $query->execute([
         $updatedMarque['updatedMarque'],
         intval($updatedMarque['idCountry']),
         intval($updatedMarque['idFabricant']),
         intval($updatedMarque['idMarque'])
        ]);
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE ID_MARQUE=?";
        $query = $this->_connexion->prepare($sql);
        $query->execute([$id]);
    }

    public function insert(string $nom)
    {
    }
    public function update(int $id, string $nom)
    {
    }
}