<?php
namespace App\Controller;

use App\Model\ArticleModel;
use Core\Controller\DefaultController;

/**
 * Controller pour CRUD des articles
 */
final class ArticleController extends DefaultController {

    /**
     * Renvoie l'ensemble des articles 
     *
     * @return void
     */
    public function index (): void
    {
        $this->jsonResponse((new ArticleModel())->findAll());
    }

    
}