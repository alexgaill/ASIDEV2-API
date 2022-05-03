<?php
namespace App\Entity;

use JsonSerializable;

/**
 * Entité de la table categorie
 * 
 * @see https://www.php.net/manual/fr/class.jsonserializable.php
 */
final class Categorie implements JsonSerializable {
    // Uniquement pour php 8.1
    // readonly met la propriété en lecture seul
    // private readonly int $id;
    private int $id;

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