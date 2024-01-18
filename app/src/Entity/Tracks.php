<?php

namespace App\Entity;

use App\Repository\TracksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TracksRepository::class)]
class Tracks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Length = null;

    #[ORM\Column(length: 255)]
    private ?string $Genres = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->Length;
    }

    public function setLength(string $Length): static
    {
        $this->Length = $Length;

        return $this;
    }

    public function getGenres(): ?string
    {
        return $this->Genres;
    }

    public function setGenres(string $Genres): static
    {
        $this->Genres = $Genres;

        return $this;
    }
}
