<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Article[] findAll()
 * @method Article find(int $id)
 */
final class CategorieModel extends DefaultModel{

    protected string $table = "categorie";
    protected string $entity = "Categorie";

    public function saveCategorie (array $categorie): ?int
    {
        $stmt = "INSERT INTO $this->table (name) VALUES (:name)";
        $prepare = $this->pdo->prepare($stmt);
        $name = htmlspecialchars($categorie['name']);
        $prepare->bindParam(":name", $name);

        if ($prepare->execute()) {
            // récupère le dernier id inséré en BDD
            return $this->pdo->lastInsertId($this->table);
        } else {
            $this->jsonResponse("Erreur lors de l'ajout d'une catégorie", 400);
        }
    }

    public function updateCategorie (int $id, array $categorie)
    {
        $stmt = "UPDATE $this->table SET name = :name WHERE id = :id";
        $prepare = $this->pdo->prepare($stmt);
        $name = htmlspecialchars($categorie['name']);
        $prepare->bindParam(":name", $name);
        $prepare->bindParam(":id", $id);

        return $prepare->execute();
    }
}