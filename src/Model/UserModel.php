<?php
namespace App\Model;

use App\Entity\User;
use Core\Model\DefaultModel;

class UserModel extends DefaultModel {

    protected string $table = 'user';
    protected string $entity = 'User';

    /**
     * Récupère un user en BDD en fonction de son email
     *
     * @param string $email
     * @return User|false
     */
    public function getUserByEmail(string $email): User|false
    {
        $stmt = "SELECT * FROM $this->table WHERE email = '$email'";
        $query = $this->pdo->query($stmt, \PDO::FETCH_CLASS, "App\Entity\\$this->entity");

        return $query->fetch();
    }

    /**
     * Enregistre un user en BDD
     *
     * @param array $user
     * @return integer|false
     */
    public function saveUser (array $user): int|false
    {
        $stmt = "INSERT INTO $this->table (nom, prenom, email, phone, password, roles) VALUES (:nom, :prenom, :email, :phone, :password, :roles)";
        $prepare = $this->pdo->prepare($stmt);

        if ($prepare->execute($user)) {
            return $this->pdo->lastInsertId('user');
        }
        return false;
    }
}