<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistRepository::class)]
class Playlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\OneToMany(mappedBy: 'playlist', targetEntity: Tracks::class)]
    private Collection $Playlist;

    public function __construct()
    {
        $this->Playlist = new ArrayCollection();
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
     * @return Collection<int, Tracks>
     */
    public function getPlaylist(): Collection
    {
        return $this->Playlist;
    }

    public function addPlaylist(Tracks $playlist): static
    {
        if (!$this->Playlist->contains($playlist)) {
            $this->Playlist->add($playlist);
            $playlist->setPlaylist($this);
        }

        return $this;
    }

    public function removePlaylist(Tracks $playlist): static
    {
        if ($this->Playlist->removeElement($playlist)) {
            // set the owning side to null (unless already changed)
            if ($playlist->getPlaylist() === $this) {
                $playlist->setPlaylist(null);
            }
        }

        return $this;
    }
}
