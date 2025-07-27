<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $date_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $montant_total = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $reduction = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mode_paiement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_reglement = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?StatutCommande $Statut = null;

    #[ORM\OneToOne(inversedBy: 'commande', cascade: ['persist', 'remove'])]
    private ?Facture $Facture = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $Client = null;

    /**
     * @var Collection<int, Ligne>
     */
    #[ORM\OneToMany(targetEntity: Ligne::class, mappedBy: 'Commande')]
    private Collection $lignes;

    /**
     * @var Collection<int, Livraison>
     */
    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'commande')]
    private Collection $Livraison;

    public function __construct()
    {
        $this->lignes = new ArrayCollection();
        $this->Livraison = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTime
    {
        return $this->date_commande;
    }

    public function setDateCommande(?\DateTime $date_commande): static
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getMontantTotal(): ?string
    {
        return $this->montant_total;
    }

    public function setMontantTotal(string $montant_total): static
    {
        $this->montant_total = $montant_total;

        return $this;
    }

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(?string $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->mode_paiement;
    }

    public function setModePaiement(?string $mode_paiement): static
    {
        $this->mode_paiement = $mode_paiement;

        return $this;
    }

    public function getDateReglement(): ?\DateTime
    {
        return $this->date_reglement;
    }

    public function setDateReglement(?\DateTime $date_reglement): static
    {
        $this->date_reglement = $date_reglement;

        return $this;
    }

    public function getStatut(): ?StatutCommande
    {
        return $this->Statut;
    }

    public function setStatut(?StatutCommande $Statut): static
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->Facture;
    }

    public function setFacture(?Facture $Facture): static
    {
        $this->Facture = $Facture;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    /**
     * @return Collection<int, Ligne>
     */
    public function getLignes(): Collection
    {
        return $this->lignes;
    }

    public function addLigne(Ligne $ligne): static
    {
        if (!$this->lignes->contains($ligne)) {
            $this->lignes->add($ligne);
            $ligne->setCommande($this);
        }

        return $this;
    }

    public function removeLigne(Ligne $ligne): static
    {
        if ($this->lignes->removeElement($ligne)) {
            // set the owning side to null (unless already changed)
            if ($ligne->getCommande() === $this) {
                $ligne->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraison(): Collection
    {
        return $this->Livraison;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->Livraison->contains($livraison)) {
            $this->Livraison->add($livraison);
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->Livraison->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }
}
