
<?php

    class Continent extends Model{
    
        public function __construct()
        {
            // Nous définissons la table par défaut de ce modèle
            $this->table = "continent";
        
            // Nous ouvrons la connexion à la base de données
            $this->getConnection();
        }
    
        /**
         * Met à jour le nom d'un Continent à partir de son ID
         *
         * @param int $id
         * @param string $slug
         * @return void
         */
        public function update(int $id, string $nom) {
            $sql = "UPDATE ".$this->table." set NOM_CONTINENT=? WHERE ID_CONTINENT=?";
            $query = $this->_connexion->prepare($sql); 
            $query->execute([$nom,$id]);  // I ONLY EAT ARRAYS FOR LAUNCH SORRY.
        }
    
        /**
         * Supprime un Continent à partir de son ID
         *
         * @param int $id
         * @return void
         */   
        public function delete(int $id) {  
            $sql = "DELETE FROM ".$this->table." WHERE ID_CONTINENT = ?"; // shhh i wont tell you now heheheh
            $query = $this->_connexion->prepare($sql);
            $query->execute([$id]); //<---  OK NOW I TELL YOU :D 
        }
    
         /**
         * Ajoute un Continent 
         *
         * @param string $nom
         * @return void
         */
        public function insert(string $nom) {
            $sql = "INSERT INTO ".$this->table." (NOM_CONTINENT) VALUES (?)";
            $query = $this->_connexion->prepare($sql);  
            $query->execute([$nom]);    
        }
    
    }