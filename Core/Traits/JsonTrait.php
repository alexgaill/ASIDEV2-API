<?php
namespace Core\Traits;

/**
 * @see https://www.php.net/manual/fr/function.http-response-code
 */
trait JsonTrait {

    /**
     * Envoie les données passées en paramètre au format json
     *
     * @param mixed $data
     * @param integer $code
     * @return void
     */
    protected function jsonResponse (mixed $data, int $code = 200): void
    {
        header("content-type: application/json");
        http_response_code($code);
        echo json_encode($data);
    }
}