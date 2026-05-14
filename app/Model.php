<?php
abstract class Model{
    // Informations de la base de données
    // private $host = "localhost";
    // private $db_name = "";
    // private $username = "";
    // private $password = "";

    private $host;
    private $db_name;
    private $username;
    private $password;

public function __construct() {
    // Charge le .env si il existe (en local)
    $envFile = ROOT . '.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                [$key, $value] = explode('=', $line, 2);
                putenv(trim($key) . '=' . trim($value));
            }
        }
    }
    $this->host = getenv('DB_HOST');
    $this->db_name = getenv('DB_NAME');
    $this->username = getenv('DB_USER');
    $this->password = getenv('DB_PASSWORD');


     // DEBUG temporaire - à supprimer après
    echo "HOST: " . $this->host . "<br>";
    echo "DB: " . $this->db_name . "<br>";
}

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id; 
                
    abstract public function update(int $id, string $nom);
    abstract public function delete(int $id);
    abstract public function insert(string $nom);
    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
          echo "ENTER GETCONNECTION";

    // On supprime la connexion précédente
    $this->_connexion = null;

    // On essaie de se connecter à la base
    try{

   $this->_connexion = new PDO(
    "mysql:host=" . $this->host . ";port=22403;dbname=" . $this->db_name . ";charset=utf8mb4",
    $this->username,
    $this->password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    ]
);

    $this->_connexion->exec("set names utf8");

}catch(PDOException $exception){

    die("Erreur de connexion : " . $exception->getMessage());
}}
    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     *
     * @return void
     */
    public function getOne(){
        // Constitution des conditions de recherche de la clé primaire (pouvant être composée)
        $cle_recherchee = "";
        $tab_cles = array();
        foreach ($this->id as $key => $value){
            $tab_cles[] = $key. "=".$value;
        }
        $cle_recherchee = implode(" AND ",  $tab_cles );

        // Mise en forme de la requete
        //$sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $sql = "SELECT * FROM ".$this->table." WHERE ". $cle_recherchee;
        // echo "<br/>".$sql."<br/>";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function getAll(string $ordre_tri=""){
        $sql = "SELECT * FROM ".$this->table;
        if ($ordre_tri != "") {
            $sql .= " ORDER BY ".$ordre_tri;
        }
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

}