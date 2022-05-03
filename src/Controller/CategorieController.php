<?php
namespace App\Controller;

use App\Model\CategorieModel;
use Core\Controller\DefaultController;

/**
 * Controller pour CRUD des catégories
 */
final class CategorieController extends DefaultController {

    private $model;

    public function __construct ()
    {
        $this->model = new CategorieModel();
    }

    /**
     * Retourne la liste des catégories
     *
     * @return void
     */
    public function index ():void
    {
        $this->jsonResponse($this->model->findAll());
    }

    /**
     * Retourne une catégorie en fonction de son id
     *
     * @param integer $id
     * @return void
     */
    public function single (int $id)
    {
        $this->jsonResponse($this->model->find($id));
    }

    /**
     * Enregistre une catégorie en BDD et retourne les informations enregistrées avec l'id
     *
     * @param array $categorie
     * @return void
     */
    public function save(array $categorie): void
    {
        $lastId = $this->model->saveCategorie($categorie);
        $this->jsonResponse($this->model->find($lastId), 201);
    }

    public function update(int $id, array $categorie): void
    {
        if ($this->model->updateCategorie($id, $categorie)) {
            $this->jsonResponse($this->model->find($id), 201);
        }
    }

    public function delete (int $id): void
    {
        if ($this->model->delete($id)) {
            $this->jsonResponse("Categorie supprimée avec succès");
        }
    }
}