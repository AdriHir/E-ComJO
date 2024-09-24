<?php

namespace App\Entity;

use App\Repository\CommandeDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeDetailsRepository::class)]
class CommandeDetails
{
    //onne veux pas d'une propriete Id genere auto on veux uen clé primaire composite.

    #[ORM\Column]
    private ?int $quantité = null;

    #[ORM\Column]
    private ?int $Prix = null;

    #[ORM\Id] // en mettantles deux #[ORM\Id] on genre une clé primaire composite.
    #[ORM\ManyToOne(inversedBy: 'commandeDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commandes $commande = null;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'commandeDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Billets $billets = null;


    public function getQuantité(): ?int
    {
        return $this->quantité;
    }

    public function setQuantité(int $quantité): static
    {
        $this->quantité = $quantité;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getCommande(): ?Commandes
    {
        return $this->commande;
    }

    public function setCommande(?Commandes $commande): static
    {
        $this->commande = $commande;

        return $this;
    }

    public function getBillets(): ?Billets
    {
        return $this->billets;
    }

    public function setBillets(?Billets $billets): static
    {
        $this->billets = $billets;

        return $this;
    }
}
