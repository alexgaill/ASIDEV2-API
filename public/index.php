<?php

use App\Controller\CategorieController;

define('ROOT', dirname(__DIR__));
require ROOT ."/vendor/autoload.php";

(new CategorieController)->index();