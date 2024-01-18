<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Pictures = null;

    #[ORM\Column(length: 255)]
    private ?string $Tracks = null;

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

    public function getPictures(): ?string
    {
        return $this->Pictures;
    }

    public function setPictures(string $Pictures): static
    {
        $this->Pictures = $Pictures;

        return $this;
    }

    public function getTracks(): ?string
    {
        return $this->Tracks;
    }

    public function setTracks(string $Tracks): static
    {
        $this->Tracks = $Tracks;

        return $this;
    }
}
