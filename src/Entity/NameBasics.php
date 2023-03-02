<?php

namespace App\Entity;

use App\Repository\NameBasicsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NameBasicsRepository::class)
 */
class NameBasics
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
    private $primaryName;

    /**
     * @ORM\Column(type="integer")
     */
    private $birthYear;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deathYear;

    /**
     * @ORM\ManyToMany(targetEntity=TitleBasic::class, inversedBy="Acteurs")
     */
    private $knownForTitles;

    /**
     * @ORM\Column(type="json")
     */
    private $primaryProfession = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    public function __construct()
    {
        $this->knownForTitles = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimaryName(): ?string
    {
        return $this->primaryName;
    }

    public function setPrimaryName(string $primaryName): self
    {
        $this->primaryName = $primaryName;

        return $this;
    }

    public function getBirthYear(): ?int
    {
        return $this->birthYear;
    }

    public function setBirthYear(int $birthYear): self
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    public function getDeathYear(): ?int
    {
        return $this->deathYear;
    }

    public function setDeathYear(?int $deathYear): self
    {
        $this->deathYear = $deathYear;

        return $this;
    }


    /**
     * @return Collection<int, TitleBasic>
     */
    public function getKnownForTitles(): Collection
    {
        return $this->knownForTitles;
    }

    public function addKnownForTitle(TitleBasic $knownForTitle): self
    {
        if (!$this->knownForTitles->contains($knownForTitle)) {
            $this->knownForTitles[] = $knownForTitle;
        }

        return $this;
    }

    public function removeKnownForTitle(TitleBasic $knownForTitle): self
    {
        $this->knownForTitles->removeElement($knownForTitle);

        return $this;
    }

    public function getPrimaryProfession(): ?array
    {
        return $this->primaryProfession;
    }

    public function setPrimaryProfession(array $primaryProfession): self
    {
        $this->primaryProfession = $primaryProfession;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }


}
