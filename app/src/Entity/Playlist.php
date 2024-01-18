<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistRepository::class)]
class Playlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Tracks = null;

    #[ORM\Column(length: 255)]
    private ?string $Private = null;

    #[ORM\Column(length: 255)]
    private ?string $Public = null;

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

    public function getTracks(): ?string
    {
        return $this->Tracks;
    }

    public function setTracks(string $Tracks): static
    {
        $this->Tracks = $Tracks;

        return $this;
    }

    public function getPrivate(): ?string
    {
        return $this->Private;
    }

    public function setPrivate(string $Private): static
    {
        $this->Private = $Private;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->Public;
    }

    public function setPublic(string $Public): static
    {
        $this->Public = $Public;

        return $this;
    }
}
