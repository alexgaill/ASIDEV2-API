<?php
namespace App\Controller;

use App\Model\CategorieModel;
use Core\Controller\DefaultController;

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

    public function single (int $id)
    {
        $this->jsonResponse($this->model->find($id));
    }

    public function save(): void
    {
        $lastId = $this->model->saveCategorie($_POST);
        $this->jsonResponse($this->model->find($lastId), 201);
    }
}