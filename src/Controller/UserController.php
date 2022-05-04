<?php
namespace App\Controller;

use App\Model\UserModel;
use App\Security\JwTokenSecurity;
use Core\Controller\DefaultController;

class UserController extends DefaultController {

    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function signup (array $user): void
    {
        if (isset($user["nom"], $user["prenom"], $user["email"], $user["phone"], $user["password"])) {

            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            $user['roles'] = json_encode([]);

            $lastId = $this->model->saveUser($user);

            $this->jsonResponse($this->model->find($lastId));
        }
    }

    public function login (array $userData): void
    {
        // TODO: Vérifier que $userData contient un email et un password sinon on retourne une erreur
        $user = $this->model->getUserByEmail($userData['email']);

        if ($user) {
            if (password_verify($userData['password'], $user->getPassword())) {

                $this->jsonResponse((new JwTokenSecurity)->generateToken($user->jsonSerialize()));

            } else {
                $this->jsonResponse("Mot de passe incorrect", 400);
            }
        } else {
            $this->jsonResponse("Cet utilisateur n'est pas inscrit, veuillez vous inscrire", 400);
        }
    }
}