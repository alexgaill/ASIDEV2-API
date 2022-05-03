<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Article[] findAll()
 * @method Article find(int $id)
 */
final class ArticleModel extends DefaultModel {

    protected string $table = "article";
    protected string $entity = "Article";

    public function saveArticle ($article): int|false
    {
        $stmt = "INSERT INTO $this->table (title, content, categorie_id) VALUES (:title, :content, :categorie_id)";
        $prepare = $this->pdo->prepare($stmt);
        if ($prepare->execute($article)) {
            return $this->pdo->lastInsertId($this->table);
        }
        return false;
    }

    public function updateArticle(int $id, array $article): bool
    {
        $stmt = "
            UPDATE $this->table SET
            title = :title,
            content = :content,
            categorie_id = :categorie_id
            WHERE id = :id
        ";
        $prepare = $this->pdo->prepare($stmt);
        $article['id'] = $id;
        return $prepare->execute($article);
    }
}