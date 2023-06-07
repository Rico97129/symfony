<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $roleEndosse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?sapeurPompier $role_intervention = null;

    #[ORM\ManyToOne(inversedBy: 'roles')]
    private ?sapeurPompier $sapeurPompier = null;

    #[ORM\ManyToOne]
    private ?intervention $intervention = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleEndosse(): ?string
    {
        return $this->roleEndosse;
    }

    public function setRoleEndosse(string $roleEndosse): self
    {
        $this->roleEndosse = $roleEndosse;

        return $this;
    }

    public function getRoleIntervention(): ?sapeurPompier
    {
        return $this->role_intervention;
    }

    public function setRoleIntervention(?sapeurPompier $role_intervention): self
    {
        $this->role_intervention = $role_intervention;

        return $this;
    }

    public function getSapeurPompier(): ?sapeurPompier
    {
        return $this->sapeurPompier;
    }

    public function setSapeurPompier(?sapeurPompier $sapeurPompier): self
    {
        $this->sapeurPompier = $sapeurPompier;

        return $this;
    }

    public function getIntervention(): ?intervention
    {
        return $this->intervention;
    }

    public function setIntervention(?intervention $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }
}
