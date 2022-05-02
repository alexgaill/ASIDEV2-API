<?php
namespace App\Controller;

use App\Model\CategorieModel;
use Core\Controller\DefaultController;

class CategorieController extends DefaultController {

    /**
     * Retourne la liste des catégories
     *
     * @return void
     */
    public function index ():void
    {
        $model = new CategorieModel();
        $this->jsonResponse($model->findAll());
    }
}