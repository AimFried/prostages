<?php

namespace App\Entity;

use App\Repository\FORMATIONRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=STAGE::class, mappedBy="formation")
     */
    private $stage;

    public function __construct()
    {
        $this->stage = new ArrayCollection();
    }

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

    /**
     * @return Collection|STAGE[]
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(STAGE $stage): self
    {
        if (!$this->stage->contains($stage)) {
            $this->stage[] = $stage;
            $stage->addFormation($this);
        }

        return $this;
    }

    public function removeStage(STAGE $stage): self
    {
        if ($this->stage->removeElement($stage)) {
            $stage->removeFormation($this);
        }

        return $this;
    }
}
