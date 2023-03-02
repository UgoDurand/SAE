<?php

namespace App\Entity;

use App\Repository\TitleRatingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitleRatingsRepository::class)
 */
class TitleRatings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $averageRating;

    /**
     * @ORM\Column(type="integer")
     */
    private $numVotes;

    /**
     * @ORM\OneToOne(targetEntity=titleBasic::class, cascade={"persist", "remove"})
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAverageRating(): ?float
    {
        return $this->averageRating;
    }

    public function setAverageRating(float $averageRating): self
    {
        $this->averageRating = $averageRating;

        return $this;
    }

    public function getNumVotes(): ?int
    {
        return $this->numVotes;
    }

    public function setNumVotes(int $numVotes): self
    {
        $this->numVotes = $numVotes;

        return $this;
    }

    public function getName(): ?titleBasic
    {
        return $this->name;
    }

    public function setName(?titleBasic $name): self
    {
        $this->name = $name;

        return $this;
    }
}
