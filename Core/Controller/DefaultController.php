<?php
namespace Core\Controller;

use Core\Traits\JsonTrait;

/**
 * @method void jsonResponse( mixed $data, int $code= 200 ) Envoie les données passées en paramètre au format json
 */
class DefaultController {
    // On charge le JsonTrait de façon générique pour l'avoir sur tous nos controller.
    use JsonTrait;
}