<?php

namespace App\Entity;

use App\Repository\TitleBasicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitleBasicRepository::class)
 */
class TitleBasic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $primaryTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $originalTitle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAdult;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $startYear;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endYear;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $runtimeMinutes;

    /**
     * @ORM\Column(type="json")
     */
    private $Genres = [];

    /**
     * @ORM\ManyToMany(targetEntity=NameBasics::class, mappedBy="knownForTitles")
     */
    private $Acteurs;

    /**
     * @ORM\OneToOne(targetEntity=TitleCrew::class, mappedBy="Title", cascade={"persist", "remove"})
     */
    private $crew;

    public function __construct()
    {
        $this->Acteurs = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleType(): ?string
    {
        return $this->titleType;
    }

    public function setTitleType(string $titleType): self
    {
        $this->titleType = $titleType;

        return $this;
    }

    public function getPrimaryTitle(): ?string
    {
        return $this->primaryTitle;
    }

    public function setPrimaryTitle(?string $primaryTitle): self
    {
        $this->primaryTitle = $primaryTitle;

        return $this;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(?string $originalTitle): self
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function isIsAdult(): ?bool
    {
        return $this->isAdult;
    }

    public function setIsAdult(bool $isAdult): self
    {
        $this->isAdult = $isAdult;

        return $this;
    }

    public function getStartYear(): ?\DateTimeInterface
    {
        return $this->startYear;
    }

    public function setStartYear(\DateTimeInterface $startYear): self
    {
        $this->startYear = $startYear;

        return $this;
    }

    public function getEndYear(): ?\DateTimeInterface
    {
        return $this->endYear;
    }

    public function setEndYear(\DateTimeInterface $endYear): self
    {
        $this->endYear = $endYear;

        return $this;
    }

    public function getRuntimeMinutes(): ?int
    {
        return $this->runtimeMinutes;
    }

    public function setRuntimeMinutes(int $runtimeMinutes): self
    {
        $this->runtimeMinutes = $runtimeMinutes;

        return $this;
    }

    public function getGenres(): ?array
    {
        return $this->Genres;
    }

    public function setGenres(array $Genres): self
    {
        $this->Genres = $Genres;

        return $this;
    }

    /**
     * @return Collection<int, NameBasics>
     */
    public function getActeurs(): Collection
    {
        return $this->Acteurs;
    }

    public function addActeur(NameBasics $acteur): self
    {
        if (!$this->Acteurs->contains($acteur)) {
            $this->Acteurs[] = $acteur;
            $acteur->addKnownForTitle($this);
        }

        return $this;
    }

    public function removeActeur(NameBasics $acteur): self
    {
        if ($this->Acteurs->removeElement($acteur)) {
            $acteur->removeKnownForTitle($this);
        }

        return $this;
    }

    public function getCrew(): ?TitleCrew
    {
        return $this->crew;
    }

    public function setCrew(TitleCrew $crew): self
    {
        // set the owning side of the relation if necessary
        if ($crew->getTitle() !== $this) {
            $crew->setTitle($this);
        }

        $this->crew = $crew;

        return $this;
    }



}
