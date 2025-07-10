<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $libelle_court = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $reference_fourn = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $prix_achat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $statut_publication = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SousRubrique $Sous_rubrique = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $Fournisseur = null;

    /**
     * @var Collection<int, Ligne>
     */
    #[ORM\OneToMany(targetEntity: Ligne::class, mappedBy: 'produit')]
    private Collection $Ligne;

    public function __construct()
    {
        $this->Ligne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCourt(): ?string
    {
        return $this->libelle_court;
    }

    public function setLibelleCourt(?string $libelle_court): static
    {
        $this->libelle_court = $libelle_court;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReferenceFourn(): ?string
    {
        return $this->reference_fourn;
    }

    public function setReferenceFourn(?string $reference_fourn): static
    {
        $this->reference_fourn = $reference_fourn;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(?string $prix_achat): static
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getStatutPublication(): ?int
    {
        return $this->statut_publication;
    }

    public function setStatutPublication(?int $statut_publication): static
    {
        $this->statut_publication = $statut_publication;

        return $this;
    }

    public function getSousRubrique(): ?SousRubrique
    {
        return $this->Sous_rubrique;
    }

    public function setSousRubrique(?SousRubrique $Sous_rubrique): static
    {
        $this->Sous_rubrique = $Sous_rubrique;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->Fournisseur;
    }

    public function setFournisseur(?Fournisseur $Fournisseur): static
    {
        $this->Fournisseur = $Fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, Ligne>
     */
    public function getLigne(): Collection
    {
        return $this->Ligne;
    }

    public function addLigne(Ligne $ligne): static
    {
        if (!$this->Ligne->contains($ligne)) {
            $this->Ligne->add($ligne);
            $ligne->setProduit($this);
        }

        return $this;
    }

    public function removeLigne(Ligne $ligne): static
    {
        if ($this->Ligne->removeElement($ligne)) {
            // set the owning side to null (unless already changed)
            if ($ligne->getProduit() === $this) {
                $ligne->setProduit(null);
            }
        }

        return $this;
    }
}
