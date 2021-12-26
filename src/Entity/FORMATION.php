<?php

namespace App\Entity;

use App\Repository\FORMATIONRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FORMATIONRepository::class)
 */
class FORMATION
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomLong;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $nomCourt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLong(): ?string
    {
        return $this->nomLong;
    }

    public function setNomLong(?string $nomLong): self
    {
        $this->nomLong = $nomLong;

        return $this;
    }

    public function getNomCourt(): ?string
    {
        return $this->nomCourt;
    }

    public function setNomCourt(?string $nomCourt): self
    {
        $this->nomCourt = $nomCourt;

        return $this;
    }
}
