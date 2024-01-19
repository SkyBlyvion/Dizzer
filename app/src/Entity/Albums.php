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
    private ?string $AlbumName = null;

    #[ORM\Column(length: 255)]
    private ?string $AlbumTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $AlbumType = null;

    #[ORM\ManyToOne(targetEntity: Artist::class, inversedBy: 'albums')]
    private ?Artist $Artist = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlbumName(): ?string
    {
        return $this->AlbumName;
    }

    public function setAlbumName(string $AlbumName): static
    {
        $this->AlbumName = $AlbumName;

        return $this;
    }

    public function getAlbumTitle(): ?string
    {
        return $this->AlbumTitle;
    }

    public function setAlbumTitle(string $AlbumTitle): static
    {
        $this->AlbumTitle = $AlbumTitle;

        return $this;
    }

    public function getAlbumType(): ?string
    {
        return $this->AlbumType;
    }

    public function setAlbumType(string $AlbumType): static
    {
        $this->AlbumType = $AlbumType;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->Artist;
    }

    public function setArtist(?Artist $Artist): static
    {
        $this->Artist = $Artist;

        return $this;
    }

}
