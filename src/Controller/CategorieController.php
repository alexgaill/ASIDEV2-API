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
     * @return void
     */
    public function save(): void
    {
        $lastId = $this->model->saveCategorie($_POST);
        $this->jsonResponse($this->model->find($lastId), 201);
    }
}