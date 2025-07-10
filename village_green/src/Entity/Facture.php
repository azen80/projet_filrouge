<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_facture = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $total_HT = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $TVA = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $total_TTC = null;

    #[ORM\OneToOne(mappedBy: 'Facture', cascade: ['persist', 'remove'])]
    private ?Commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTime
    {
        return $this->date_facture;
    }

    public function setDateFacture(?\DateTime $date_facture): static
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getTotalHT(): ?string
    {
        return $this->total_HT;
    }

    public function setTotalHT(?string $total_HT): static
    {
        $this->total_HT = $total_HT;

        return $this;
    }

    public function getTVA(): ?string
    {
        return $this->TVA;
    }

    public function setTVA(?string $TVA): static
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getTotalTTC(): ?string
    {
        return $this->total_TTC;
    }

    public function setTotalTTC(?string $total_TTC): static
    {
        $this->total_TTC = $total_TTC;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        // unset the owning side of the relation if necessary
        if ($commande === null && $this->commande !== null) {
            $this->commande->setFacture(null);
        }

        // set the owning side of the relation if necessary
        if ($commande !== null && $commande->getFacture() !== $this) {
            $commande->setFacture($this);
        }

        $this->commande = $commande;

        return $this;
    }
}
