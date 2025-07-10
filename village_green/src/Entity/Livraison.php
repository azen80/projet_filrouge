<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_livraison = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $adresse_livraison = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?StatutLivraison $Statut_livraison = null;

    #[ORM\ManyToOne(inversedBy: 'Livraison')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLivraison(): ?\DateTime
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(?\DateTime $date_livraison): static
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(?string $adresse_livraison): static
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getStatutLivraison(): ?StatutLivraison
    {
        return $this->Statut_livraison;
    }

    public function setStatutLivraison(?StatutLivraison $Statut_livraison): static
    {
        $this->Statut_livraison = $Statut_livraison;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
