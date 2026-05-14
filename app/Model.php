<?php

abstract class Model
{
    protected $_connexion;

    public $table;
    public $id;

    abstract public function update(int $id, string $nom);
    abstract public function delete(int $id);
    abstract public function insert(string $nom);

    private function loadEnv(): void
    {
        $envFile = ROOT . '.env';

        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) {
                    continue;
                }

                [$key, $value] = explode('=', $line, 2);
                putenv(trim($key) . '=' . trim($value));
            }
        }
    }

    public function getConnection()
    {
        $this->loadEnv();

        $host = getenv('DB_HOST') ?: 'mysql-b5b5c36-symfonyproject-db2026.i.aivencloud.com';
        $port = getenv('DB_PORT') ?: '22403';
        $dbName = getenv('DB_NAME') ?: 'defaultdb';
        $user = getenv('DB_USER') ?: 'avnadmin';
        $password = getenv('DB_PASSWORD');

        if (!$password) {
            die('Erreur : DB_PASSWORD manquant dans .env ou Render Environment Variables');
        }

        try {
            $this->_connexion = new PDO(
                "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8mb4",
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );

            $this->_connexion->exec("set names utf8mb4");

        } catch (PDOException $exception) {
            die("Erreur de connexion : " . $exception->getMessage());
        }
    }

    public function getOne()
    {
        $cle_recherchee = "";
        $tab_cles = [];

        foreach ($this->id as $key => $value) {
            $tab_cles[] = $key . "=" . $value;
        }

        $cle_recherchee = implode(" AND ", $tab_cles);

        $sql = "SELECT * FROM " . $this->table . " WHERE " . $cle_recherchee;
        $query = $this->_connexion->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function getAll(string $ordre_tri = "")
    {
        $sql = "SELECT * FROM " . $this->table;

        if ($ordre_tri != "") {
            $sql .= " ORDER BY " . $ordre_tri;
        }

        $query = $this->_connexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}