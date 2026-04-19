<?php

namespace App\Entity;

use App\Entity\Produit;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'LigneCommande')]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $quantity = 1;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'LigneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $order = null;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'LigneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $product = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getOrder(): ?Commande
    {
        return $this->order;
    }

    public function setOrder(?Commande $order): static
    {
        $this->order = $order;
        return $this;
    }

    public function getProduct(): ?Produit
    {
        return $this->product;
    }

    public function setProduct(?Produit $product): static
    {
        $this->product = $product;
        return $this;
    }
}
