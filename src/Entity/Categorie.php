<?php
namespace App\Entity;

use JsonSerializable;
use OpenApi\Attributes as OA;

/**
 * Entité de la table categorie
 * 
 * @see https://www.php.net/manual/fr/class.jsonserializable.php
 */
#[OA\Schema(title:"Categorie")]
final class Categorie implements JsonSerializable {
    // Uniquement pour php 8.1
    // readonly met la propriété en lecture seul
    // private readonly int $id;
    #[OA\Property(
        type:"integer",
        nullable:false,
        example:3
    )]
    private int $id;

    #[OA\Property(
        type:"string",
        nullable:false,
        example:"Catégorie n°3"
    )]
    private string $name;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "name" => $this->name
        ];
    }
}