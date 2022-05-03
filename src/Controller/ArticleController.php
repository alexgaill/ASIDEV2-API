<?php
namespace App\Controller;

use App\Model\ArticleModel;
use Core\Controller\DefaultController;

/**
 * Controller pour CRUD des articles
 */
final class ArticleController extends DefaultController {

    private ArticleModel $model;

    public function __construct ()
    {
        $this->model = new ArticleModel();
    }
    /**
     * Renvoie l'ensemble des articles 
     *
     * @return void
     */
    public function index (): void
    {
        $this->jsonResponse($this->model->findAll());
    }

    public function single (int $id): void
    {
        $this->jsonResponse($this->model->find($id));
    }

    public function save ($article): void
    {
        $lastId = $this->model->saveArticle($article);
        $this->jsonResponse($this->model->find($lastId));
    }

    public function update (int $id, array $article): void
    {
        if ($this->model->updateArticle(id: $id, article: $article)) {
            $this->jsonResponse($this->model->find($id));
        }
    }

    public function delete (int $id): void
    {
        if ($this->model->delete($id)) {
            $this->jsonResponse("Article supprimé avec succés");
        }
    }
}