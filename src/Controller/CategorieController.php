<?php
namespace App\Controller;

use App\Model\CategorieModel;
use Core\Controller\DefaultController;
use OpenApi\Attributes as OA;

/**
 * Controller pour CRUD des catégories
 */
final class CategorieController extends DefaultController {

    private $model;

    public function __construct ()
    {
        $this->model = new CategorieModel();
    }

    /**
     * Retourne la liste des catégories
     *
     * @return void
     */
    #[OA\Get(
        path:"/categorie",
        summary:"Retourne l'ensemble des catégories",
        responses: [
            new OA\Response(
                response: 200,
                description: "Liste des catégories",
                content: new OA\JsonContent(
                    type:'array',
                    items: new OA\Items(
                        ref: "#/components/schemas/Categorie"
                    )
                )
            ),
            new OA\Response(
                response: 404,
                description: "Not Found",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property:"message",
                            type:"string",
                            example:"Route not found"
                        )
                    ]
                )
            )
        ]
    )]
    public function index ():void
    {
        $this->jsonResponse($this->model->findAll());
    }

    /**
     * Retourne une catégorie en fonction de son id
     *
     * @param integer $id
     * @return void
     */
    #[OA\Get(
        path:"/categorie/{id}",
        parameters: [
            new OA\Parameter(
                name:"id",
                in:"path",
                required:true,
                schema: new OA\Schema(type:"integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Retourne une catégorie en fonction de l'id",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/Categorie"
                )
            )
        ]
    )]
    public function single (int $id)
    {
        $this->isGranted("ROLE_USER");
        $this->jsonResponse($this->model->find($id));
    }

    /**
     * Enregistre une catégorie en BDD et retourne les informations enregistrées avec l'id
     *
     * @param array $categorie
     * @return void
     */
    #[OA\Post(
        path:"/categorie",
        requestBody: new OA\RequestBody(
            request: "Ajout d'une categorie",
            required:true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property:"name", type:"string")
                ]
            )
        )
    )]
    public function save(array $categorie): void
    {
        $this->isGranted("ROLE_ADMIN");
        $lastId = $this->model->saveCategorie($categorie);
        $this->jsonResponse($this->model->find($lastId), 201);
    }

    public function update(int $id, array $categorie): void
    {
        if ($this->model->updateCategorie($id, $categorie)) {
            $this->jsonResponse($this->model->find($id), 201);
        }
    }

    public function delete (int $id): void
    {
        if ($this->model->delete($id)) {
            $this->jsonResponse("Categorie supprimée avec succès");
        }
    }
}