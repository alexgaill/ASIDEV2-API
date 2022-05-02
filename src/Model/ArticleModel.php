<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Categorie[] findAll()
 */
class ArticleModel extends DefaultModel {

    protected string $table = "article";
    protected string $entity = "Article";
}