<?php
namespace App\Controller;

use App\Model\ArticleModel;
use Core\Controller\DefaultController;

class ArticleController extends DefaultController {

    public function index (): void
    {
        $this->jsonResponse((new ArticleModel())->findAll());
    }

    
}