<?php

namespace App\Entity;

use App\Repository\GalerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalerieRepository::class)]
class Galerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\OneToMany(mappedBy: 'galerie', targetEntity: GalerieImages::class)]
    private $galerieImages;

    public function __construct()
    {
        $this->galerieImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, GalerieImages>
     */
    public function getGalerieImages(): Collection
    {
        return $this->galerieImages;
    }

    public function addGalerieImage(GalerieImages $galerieImage): self
    {
        if (!$this->galerieImages->contains($galerieImage)) {
            $this->galerieImages[] = $galerieImage;
            $galerieImage->setGalerie($this);
        }

        return $this;
    }

    public function removeGalerieImage(GalerieImages $galerieImage): self
    {
        if ($this->galerieImages->removeElement($galerieImage)) {
            // set the owning side to null (unless already changed)
            if ($galerieImage->getGalerie() === $this) {
                $galerieImage->setGalerie(null);
            }
        }

        return $this;
    }
}
