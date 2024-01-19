<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'Artist', targetEntity: Albums::class)]
    private Collection $albums;

    #[ORM\ManyToMany(targetEntity: Tracks::class, inversedBy: 'artists')]
    private Collection $Tracks;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
        $this->Tracks = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Albums>
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Albums $album): static
    {
        if (!$this->albums->contains($album)) {
            $this->albums->add($album);
            $album->setArtist($this);
        }

        return $this;
    }

    public function removeAlbum(Albums $album): static
    {
        if ($this->albums->removeElement($album)) {
            // set the owning side to null (unless already changed)
            if ($album->getArtist() === $this) {
                $album->setArtist(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tracks>
     */
    public function getTracks(): Collection
    {
        return $this->Tracks;
    }

    public function addTrack(Tracks $track): static
    {
        if (!$this->Tracks->contains($track)) {
            $this->Tracks->add($track);
        }

        return $this;
    }

    public function removeTrack(Tracks $track): static
    {
        $this->Tracks->removeElement($track);

        return $this;
    }
}
