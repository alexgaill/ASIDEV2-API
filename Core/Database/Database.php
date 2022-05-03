<?php
namespace Core\Database;

use Core\Traits\JsonTrait;

/**
 * Class de connexion à la BDD
 */
class Database {

    use JsonTrait;

    protected ?\PDO $pdo;

    /**
     * Initialise la connexion à la BDD avec \PDO
     *
     * @param string $host
     * @param string $dbname
     * @param string $user
     * @param string $pass
     */
    public function __construct(
        private string $host = "localhost:8889",
        private string $dbname = "blog",
        private string $user = "root",
        private string $pass = "root"
    ) 
    {
        try {
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", 
                                $this->user, 
                                $this->pass, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
            ]);
            $this->pdo->exec("SET NAMES UTF8");
        } catch (\PDOException $e) {
            $this->jsonResponse("Erreur dans les identifiants de connexion à la BDD", 500);
        }
    }

}