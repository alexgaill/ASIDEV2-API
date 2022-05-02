<?php
namespace Core\Controller;

use Core\Traits\JsonTrait;

/**
 * @method void jsonResponse( mixed $data, int $code= 200 ) Envoie les données passées en paramètre au format json
 */
class DefaultController {
    use JsonTrait;
}