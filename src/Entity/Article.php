<?php
namespace App\Entity;

use JsonSerializable;

/**
 * Entité de la table article
 */
final class Article implements JsonSerializable {

    private int $id;

    private string $title;

    private string $content;

    private int $categorie_id;

    

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
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of categorie_id
     *
     * @return int
     */
    public function getCategorieId(): int
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of categorie_id
     *
     * @param int $categorie_id
     *
     * @return self
     */
    public function setCategorieId(int $categorie_id): self
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "categorie" => $this->categorie_id,
        ];
    }
}