<?php

class Article extends Model
{

    public function __construct()
    {
        $this->table = "article";

        $this->getConnection();
    }

    public function allArticles()
    {
        $sql = "SELECT article.*, NOM_MARQUE, NOM_COULEUR, NOM_TYPE, PRIX_ACHAT, VOLUME, TITRAGE FROM " . $this->table .
        " LEFT JOIN marque ON article.ID_MARQUE=marque.ID_MARQUE
         LEFT JOIN couleur ON article.ID_COULEUR=couleur.ID_COULEUR
         LEFT JOIN typebiere ON article.ID_TYPE=typebiere.ID_TYPE
         ORDER BY ID_ARTICLE DESC LIMIT 20  ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allMarques()
    {
        $sql = "SELECT * FROM marque";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allCouleurs()
    {
        $sql = "SELECT * FROM couleur";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function allTypes()
    {
        $sql = "SELECT * FROM typebiere";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function insertArticle(string $article, float $prix, string $volume, string $titrage, int $idMarque, int $idCouleur, int $idType)
    {
        $sql = "INSERT INTO " . $this->table . " (NOM_ARTICLE, PRIX_ACHAT, VOLUME, TITRAGE, ID_MARQUE, ID_COULEUR, ID_TYPE) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $this->_connexion->prepare($sql);
        $query->execute([$article, $prix, $volume, $titrage, $idMarque, $idCouleur, $idType]);

    }


////////////////////////////////////////////////////////////
    public function updateArticle(array $updatedArticle)
    {
        $sql = "UPDATE " . $this->table . " set NOM_ARTICLE=?, PRIX_ACHAT=?, VOLUME=?, TITRAGE=?, ID_MARQUE=?, ID_COULEUR=?, ID_TYPE=? WHERE ID_ARTICLE=?";
        $query = $this->_connexion->prepare($sql);
        $query->execute([
         $updatedArticle['updatedArticle'],
         floatval($updatedArticle['prix']),
         intval($updatedArticle['volume']),
         floatval($updatedArticle['titrage']),
         intval($updatedArticle['idMarque']),
         intval($updatedArticle['idCouleur']),
         intval($updatedArticle['idType']),
         intval($updatedArticle['idArticle'])
        ]);
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE ID_ARTICLE=?";
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