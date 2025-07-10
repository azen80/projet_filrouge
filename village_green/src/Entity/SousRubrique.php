<?php

namespace App\Entity;

use App\Repository\SousRubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousRubriqueRepository::class)]
class SousRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom_sous_rubrique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\ManyToOne(inversedBy: 'sousRubriques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rubrique $Rubrique = null;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'Sous_rubrique')]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSousRubrique(): ?string
    {
        return $this->nom_sous_rubrique;
    }

    public function setNomSousRubrique(?string $nom_sous_rubrique): static
    {
        $this->nom_sous_rubrique = $nom_sous_rubrique;

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

    public function getRubrique(): ?Rubrique
    {
        return $this->Rubrique;
    }

    public function setRubrique(?Rubrique $Rubrique): static
    {
        $this->Rubrique = $Rubrique;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setSousRubrique($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getSousRubrique() === $this) {
                $produit->setSousRubrique(null);
            }
        }

        return $this;
    }
}
