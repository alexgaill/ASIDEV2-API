<?php
namespace Core\Controller;

use App\Security\JwTokenSecurity;
use Core\Traits\JsonTrait;

/**
 * @method void jsonResponse( mixed $data, int $code= 200 ) Envoie les données passées en paramètre au format json
 */
class DefaultController {
    // On charge le JsonTrait de façon générique pour l'avoir sur tous nos controller.
    use JsonTrait;

    /**
     * Vérifie l'autorisation d'accès d'un utilisateur à une méthode
     *
     * @param string $role
     * @return boolean|null
     */
    public function isGranted (string $role): ?bool
    {
        $user = (new JwTokenSecurity)->decodeToken();
        if (!in_array($role, $user['roles'])) {
            throw new \Exception("Accès interdit, vous n'avez pas les droits", 403);
        }
        return true;
    }
}