<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Name_Product = null;

    #[ORM\Column(length: 255, nullable: true)]

    private ?string $Image_Product = '';

    #[ORM\Column(nullable: true)]
    private ?float $Price_Product = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description_Product = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProduct(): ?string
    {
        return $this->Name_Product;
    }

    public function setNameProduct(?string $Name_Product): static
    {
        $this->Name_Product = $Name_Product;

        return $this;
    }




    public function getImageProduct(): ?string
    {
        return $this->Image_Product;
    }

    public function setImageProduct(?string $image): self
    {
        $this->Image_Product = $image ?: '';

        return $this;
    }

    public function getPriceProduct(): ?float
    {
        return $this->Price_Product;
    }

    public function setPriceProduct(?float $Price_Product): static
    {
        $this->Price_Product = $Price_Product;

        return $this;
    }

    public function getDescriptionProduct(): ?string
    {
        return $this->Description_Product;
    }

    public function setDescriptionProduct(?string $Description_Product): static
    {
        $this->Description_Product = $Description_Product;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
