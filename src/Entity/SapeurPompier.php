<?php

namespace App\Entity;

use App\Repository\SapeurPompierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SapeurPompierRepository::class)]
class SapeurPompier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 20)]
    private ?string $tel = null;

    #[ORM\Column(length: 20)]
    private ?string $bip = null;

    #[ORM\ManyToOne(inversedBy: 'sapeurPompiers')]
    private ?caserne $appartenir = null;

    #[ORM\OneToMany(mappedBy: 'sapeurPompier', targetEntity: Role::class)]
    private Collection $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getBip(): ?string
    {
        return $this->bip;
    }

    public function setBip(string $bip): self
    {
        $this->bip = $bip;

        return $this;
    }

    public function getAppartenir(): ?caserne
    {
        return $this->appartenir;
    }

    public function setAppartenir(?caserne $appartenir): self
    {
        $this->appartenir = $appartenir;

        return $this;
    }

    /**
     * @return Collection<int, Role>
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
            $role->setSapeurPompier($this);
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getSapeurPompier() === $this) {
                $role->setSapeurPompier(null);
            }
        }

        return $this;
    }

   
}
