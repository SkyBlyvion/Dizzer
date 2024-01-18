<?php

namespace App\Entity;

use App\Repository\AlbumsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumsRepository::class)]
class Albums
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Pictures = null;

    #[ORM\Column(length: 255)]
    private ?string $Tracks = null;

    #[ORM\Column(length: 255)]
    private ?string $Genres = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

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
