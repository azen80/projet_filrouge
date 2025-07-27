<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RubriqueRepository::class)]
class Rubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom_rubrique = null;

    /**
     * @var Collection<int, SousRubrique>
     */
    #[ORM\OneToMany(targetEntity: SousRubrique::class, mappedBy: 'Rubrique')]
    private Collection $sousRubriques;

    public function __construct()
    {
        $this->sousRubriques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNomRubrique(): ?string
    {
        return $this->nom_rubrique;
    }

    public function setNomRubrique(?string $nom_rubrique): static
    {
        $this->nom_rubrique = $nom_rubrique;

        return $this;
    }

    /**
     * @return Collection<int, SousRubrique>
     */
    public function getSousRubriques(): Collection
    {
        return $this->sousRubriques;
    }

    public function addSousRubrique(SousRubrique $sousRubrique): static
    {
        if (!$this->sousRubriques->contains($sousRubrique)) {
            $this->sousRubriques->add($sousRubrique);
            $sousRubrique->setRubrique($this);
        }

        return $this;
    }

    public function removeSousRubrique(SousRubrique $sousRubrique): static
    {
        if ($this->sousRubriques->removeElement($sousRubrique)) {
            // set the owning side to null (unless already changed)
            if ($sousRubrique->getRubrique() === $this) {
                $sousRubrique->setRubrique(null);
            }
        }

        return $this;
    }
}
