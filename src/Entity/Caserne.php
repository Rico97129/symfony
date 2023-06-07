<?php

namespace App\Entity;

use App\Repository\CaserneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaserneRepository::class)]
class Caserne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\OneToMany(mappedBy: 'appartenir', targetEntity: SapeurPompier::class)]
    private Collection $sapeurPompiers;

    public function __construct()
    {
        $this->sapeurPompiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?int
    {
        return $this->libelle;
    }

    public function setLibelle(int $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, SapeurPompier>
     */
    public function getSapeurPompiers(): Collection
    {
        return $this->sapeurPompiers;
    }

    public function addSapeurPompier(SapeurPompier $sapeurPompier): self
    {
        if (!$this->sapeurPompiers->contains($sapeurPompier)) {
            $this->sapeurPompiers->add($sapeurPompier);
            $sapeurPompier->setAppartenir($this);
        }

        return $this;
    }

    public function removeSapeurPompier(SapeurPompier $sapeurPompier): self
    {
        if ($this->sapeurPompiers->removeElement($sapeurPompier)) {
            // set the owning side to null (unless already changed)
            if ($sapeurPompier->getAppartenir() === $this) {
                $sapeurPompier->setAppartenir(null);
            }
        }

        return $this;
    }
}
