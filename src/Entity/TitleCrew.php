<?php

namespace App\Entity;

use App\Repository\TitleCrewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitleCrewRepository::class)
 */
class TitleCrew
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=TitleBasic::class, inversedBy="crew", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Title;

    /**
     * @ORM\ManyToMany(targetEntity=NameBasics::class)
     */
    private $directors;

    public function __construct()
    {
        $this->directors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?TitleBasic
    {
        return $this->Title;
    }

    public function setTitle(TitleBasic $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * @return Collection<int, NameBasics>
     */
    public function getDirectors(): Collection
    {
        return $this->directors;
    }

    public function addDirector(NameBasics $director): self
    {
        if (!$this->directors->contains($director)) {
            $this->directors[] = $director;
        }

        return $this;
    }

    public function removeDirector(NameBasics $director): self
    {
        $this->directors->removeElement($director);

        return $this;
    }

}
